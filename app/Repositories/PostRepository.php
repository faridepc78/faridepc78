<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\PostView;
use Illuminate\Support\Str;

class PostRepository
{
    public function store($values)
    {
        return Post::create([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'post_category_id' => $values->post_category_id,
            'image_id' => $values->image_id,
            'text' => $values->text
        ]);
    }

    public function paginate()
    {
        return Post::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function get3()
    {
        return Post::query()->orderBy('id', 'desc')->limit(3)->get();
    }

    public function get6()
    {
        return Post::query()->orderBy('id', 'desc')->paginate(6);
    }

    public function findById($id)
    {
        return Post::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Post::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'post_category_id' => $values->post_category_id,
            'image_id' => $values->image_id,
            'text' => $values->text
        ]);
    }

    public function findByCategoryId($post_category_id)
    {
        return Post::query()->where('post_category_id', $post_category_id)->orderBy('id', 'desc')->paginate(12);
    }

    public function isRegisterIpForPostView($post_id): bool
    {
        return PostView::query()->
        where('post_id', $post_id)->
        where('ip', request()->ip())->
        exists();
    }

    public function isRegisterIpForPostLike($post_id): bool
    {
        return PostLike::query()->
        where('post_id', $post_id)->
        where('ip', request()->ip())->
        exists();
    }

    public function storePostView($post_id)
    {
        return PostView::create(['post_id' => $post_id, 'ip' => request()->ip()]);
    }

    public function storePostLike($post_id)
    {
        return PostLike::create(['post_id' => $post_id, 'ip' => request()->ip()]);
    }

    public function destroyPostLike($post_id)
    {
        return PostLike::query()->where('post_id', $post_id)->where('ip', request()->ip())->delete();
    }

    public function storePostComment($values, $post_id)
    {
        return PostComment::create([
            'post_id' => $post_id,
            'parent_id' => null,
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_ip' => request()->ip(),
            'text' => $values->text,
            'status' => PostComment::INACTIVE_STATUS,
            'users' => PostComment::COMMON_USER
        ]);
    }

    public function replyPostComment($values, $post_id)
    {
        return PostComment::create([
            'post_id' => $post_id,
            'parent_id' => $values->post_comment_id,
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_ip' => request()->ip(),
            'text' => $values->text,
            'status' => PostComment::INACTIVE_STATUS,
            'users' => PostComment::COMMON_USER
        ]);
    }

    public function getParentComment($post_id)
    {
        $whereData = [
            ['post_id', '=', $post_id],
            ['status', '=', 'active']
        ];
        return PostComment::query()
            ->whereNull('parent_id')
            ->with('childrenComments')
            ->where($whereData)->paginate(10);
    }
}
