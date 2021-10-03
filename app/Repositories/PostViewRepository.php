<?php

namespace App\Repositories;

use App\Models\PostView;

class PostViewRepository
{
    public function isRegisterIpForPostView($post_id)
    {
        return PostView::query()->
        where('post_id', $post_id)->
        where('ip', request()->ip())->
        exists();
    }

    public function storePostView($post_id)
    {
        return PostView::query()
            ->create(['post_id' => $post_id, 'ip' => request()->ip()]);
    }
}
