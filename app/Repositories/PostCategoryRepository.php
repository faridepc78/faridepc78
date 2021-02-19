<?php

namespace App\Repositories;

use App\Models\PostCategory;
use Illuminate\Support\Str;

class PostCategoryRepository
{
    public function store($values)
    {
        return PostCategory::create([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => $values->image_id
        ]);
    }

    public function paginate()
    {
        return PostCategory::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function findById($id)
    {
        return PostCategory::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return PostCategory::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => $values->image_id
        ]);
    }

    public function all()
    {
        return PostCategory::all();
    }
}
