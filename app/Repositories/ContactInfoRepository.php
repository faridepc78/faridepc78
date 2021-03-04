<?php

namespace App\Repositories;

use App\Models\ContactInfo;

class ContactInfoRepository
{
    public function store($values)
    {
        return ContactInfo::query()->create([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => null
        ]);
    }

    public function addImage($image_id, $id): int
    {
        return ContactInfo::query()->where('id', $id)->update([
            'image_id' => $image_id
        ]);
    }

    public function paginate(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return ContactInfo::query()->latest()->paginate(10);
    }

    public function all()
    {
        return ContactInfo::all();
    }

    public function findById($id)
    {
        return ContactInfo::query()->findOrFail($id);
    }

    public function update($values, $image_id, $id): int
    {
        return ContactInfo::query()->where('id', $id)->update([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => $image_id
        ]);
    }
}
