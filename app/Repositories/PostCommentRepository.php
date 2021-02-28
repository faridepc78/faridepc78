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

    public function getAllPostComment()
    {
        return PostComment::query()->orderByDesc('status')->paginate(20);
    }

    public function pendingPostComment()
    {
        return PostComment::query()->latest()->where('status', '=', PostComment::PENDING_STATUS)->paginate(20);
    }

    public function activePostComment()
    {
        return PostComment::query()->latest()->where('status', '=', PostComment::ACTIVE_STATUS)->paginate(20);
    }

    public function inactivePostComment()
    {
        return PostComment::query()->latest()->where('status', '=', PostComment::INACTIVE_STATUS)->paginate(20);
    }

    public function showPostComment($id)
    {
        return PostComment::query()->findOrFail($id);
    }
}
