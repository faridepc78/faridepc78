<?php

namespace App\Repositories;

use App\Models\Resume;

class ResumeRepository
{
    public function store($values)
    {
        return Resume::create([
            'name' => $values->name,
            'customer' => $values->customer,
            'year' => $values->year
        ]);
    }

    public function paginate()
    {
        return Resume::query()->orderBy('id', 'desc')->paginate();
    }

    public function findById($id)
    {
        return Resume::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Resume::query()->where('id', $id)->update([
            'name' => $values->name,
            'customer' => $values->customer,
            'year' => $values->year
        ]);
    }
}
