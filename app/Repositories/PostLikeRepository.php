<?php

namespace App\Repositories;

use App\Models\PostLike;

class PostLikeRepository
{
    public function isRegisterIpForPostLike($post_id)
    {
        return PostLike::query()->
        where('post_id', $post_id)->
        where('ip', request()->ip())->
        exists();
    }

    public function storePostLike($post_id)
    {
        return PostLike::query()
            ->create(['post_id' => $post_id, 'ip' => request()->ip()]);
    }

    public function destroyPostLike($post_id)
    {
        return PostLike::query()
            ->where('post_id', $post_id)
            ->where('ip', request()->ip())
            ->delete();
    }
}
