<?php

namespace App\Repositories;

use App\Models\Work;

class WorkRepository
{
    public function store($values)
    {
        return Work::query()->create([
            'title' => $values->title,
            'text' => $values->text,
            'image_id' => null
        ]);
    }

    public function addImage($image_id, $id)
    {
        return Work::query()->where('id', $id)->update([
            'image_id' => $image_id
        ]);
    }

    public function get()
    {
        return Work::query()->latest()->get();
    }

    public function findById($id)
    {
        return Work::query()->findOrFail($id);
    }

    public function update($values,$image_id, $id)
    {
        return Work::query()->where('id', $id)->update([
            'title' => $values->title,
            'text' => $values->text,
            'image_id' => $image_id
        ]);
    }
}
