<?php

namespace App\Repositories;

use App\Models\ContactInfo;

class ContactInfoRepository
{
    public function store($values)
    {
        return ContactInfo::create([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => $values->image_id
        ]);
    }

    public function paginate()
    {
        return ContactInfo::query()->orderBy('id', 'desc')->paginate();
    }

    public function findById($id)
    {
        return ContactInfo::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return ContactInfo::query()->where('id', $id)->update([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => $values->image_id
        ]);
    }
}
