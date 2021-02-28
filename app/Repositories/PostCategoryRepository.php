<?php

namespace App\Repositories;

use App\Models\PostCategory;

class PostCategoryRepository
{
    public function store($values)
    {
        return PostCategory::query()->create([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => null
        ]);
    }

    public function addImage($image_id, $id)
    {
        return PostCategory::query()->where('id', $id)->update([
            'image_id' => $image_id
        ]);
    }

    public function paginate()
    {
        return PostCategory::query()->latest()->paginate(10);
    }

    public function findById($id)
    {
        return PostCategory::query()->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return PostCategory::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => $image_id
        ]);
    }

    public function all()
    {
        return PostCategory::all();
    }
}
