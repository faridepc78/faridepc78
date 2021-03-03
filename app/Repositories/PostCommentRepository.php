<?php

namespace App\Repositories;

use App\Models\PostComment;

class PostCommentRepository
{
    public function storePostComment($values, $post_id)
    {
        return PostComment::query()->create([
            'post_id' => $post_id,
            'parent_id' => null,
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_ip' => request()->ip(),
            'text' => $values->text,
            'status' => $values->status,
            'users' => $values->users
        ]);
    }

    public function replyPostComment($values, $post_id)
    {
        return PostComment::query()->create([
            'post_id' => $post_id,
            'parent_id' => $values->post_comment_id,
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_ip' => request()->ip(),
            'text' => $values->text,
            'status' => $values->status,
            'users' => $values->users
        ]);
    }

    public function getParentComment($post_id)
    {
        $whereData = [
            ['post_id', '=', $post_id],
            ['status', '=', PostComment::ACTIVE_STATUS]
        ];
        return PostComment::query()
            ->whereNull('parent_id')
            ->with('childrenComments')
            ->where($whereData)->paginate(10);
    }

    public function getAllPostCommentByPostId($id): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $data = [
            'parent_id' => null,
            'post_id' => $id
        ];
        return PostComment::query()
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->where($data)
            ->paginate(20);
    }

    public function pendingPostComment($id): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $data = [
            'parent_id' => null,
            'status' => PostComment::PENDING_STATUS,
            'post_id' => $id
        ];
        return PostComment::query()
            ->latest()
            ->where($data)
            ->paginate(20);
    }

    public function activePostComment($id): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $data = [
            'parent_id' => null,
            'status' => PostComment::ACTIVE_STATUS,
            'post_id' => $id
        ];
        return PostComment::query()
            ->latest()
            ->where($data)
            ->paginate(20);
    }

    public function inactivePostComment($id): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $data = [
            'parent_id' => null,
            'status' => PostComment::INACTIVE_STATUS,
            'post_id' => $id
        ];
        return PostComment::query()
            ->latest()
            ->where($data)
            ->paginate(20);
    }

    public function showPostComment($id)
    {
        return PostComment::query()->findOrFail($id);
    }

    public function existIdInTable($id)
    {
        return PostComment::query()->where('parent_id', $id)->exists();
    }

    public function updatePostCommentStatus($id, bool $read, bool $unread)
    {
        if ($read == true && $unread == false) $status = PostComment::ACTIVE_STATUS;
        if ($read == false && $unread == true) $status = PostComment::INACTIVE_STATUS;
        return PostComment::query()->where('id', '=', $id)->update(['status' => $status]);
    }
}
