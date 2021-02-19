<?php

namespace App\Repositories;

use App\Models\Post;
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
        return Post::query()->orderBy('id','desc')->limit(3)->get();
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
}
