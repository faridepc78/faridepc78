<?php

namespace App\Repositories;

use App\Models\Social;

class SocialRepository
{
    public function store($values)
    {
        return Social::create([
            'name' => $values->name,
            'icon' => $values->icon,
            'link' => $values->link
        ]);
    }

    public function paginate()
    {
        return Social::query()->orderBy('id', 'desc')->paginate();
    }

    public function findById($id)
    {
        return Social::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Social::query()->where('id', $id)->update([
            'name' => $values->name,
            'icon' => $values->icon,
            'link' => $values->link
        ]);
    }

    public function all()
    {
        return Social::query()->orderBy('id', 'desc')->get();
    }
}
