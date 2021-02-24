<?php

namespace App\Repositories;

use App\Models\Expertise;

class ExpertiseRepository
{
    public function store($values)
    {
        return Expertise::create([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => null,
            'text' => $values->text
        ]);
    }

    public function addImage($image_id, $id)
    {
        return Expertise::query()->where('id', $id)->update([
            'image_id' => $image_id,
        ]);
    }

    public function paginate()
    {
        return Expertise::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function findById($id)
    {
        return Expertise::query()->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Expertise::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
            'image_id' => $image_id,
            'text' => $values->text
        ]);
    }

    public function all()
    {
        return Expertise::all();
    }

    public function get20()
    {
        return Expertise::query()->orderBy('id', 'desc')->limit(20)->get();
    }
}
