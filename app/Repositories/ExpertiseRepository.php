<?php

namespace App\Repositories;

use App\Models\Expertise;
use Illuminate\Support\Str;

class ExpertiseRepository
{
    public function store($values)
    {
        return Expertise::create([
            'name' => $values->name,
            'slug' => Str::slug($values->slug),
            'image_id' => $values->image_id,
            'text' => $values->text
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

    public function update($values, $id)
    {
        return Expertise::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => Str::slug($values->slug),
            'image_id' => $values->image_id,
            'text' => $values->text
        ]);
    }

    public function all()
    {
        return Expertise::all();
    }

    public function get20()
    {
        return Expertise::query()->orderBy('id','desc')->limit(20)->get();
    }
}
