<?php

namespace App\Repositories;

use App\Models\Work;

class WorkRepository
{
    public function store($values)
    {
        return Work::create([
            'title' => $values->title,
            'text' => $values->text,
            'image_id' => $values->image_id,
        ]);
    }

    public function paginate()
    {
        return Work::query()->orderBy('id', 'desc')->paginate();
    }

    public function findById($id)
    {
        return Work::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Work::query()->where('id', $id)->update([
            'title' => $values->title,
            'text' => $values->text,
            'image_id' => $values->image_id
        ]);
    }
}
