<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function store($values)
    {
        return Customer::create([
            'name' => $values->name,
            'from' => $values->from,
            'text' => $values->text
        ]);
    }

    public function paginate()
    {
        return Customer::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function findById($id)
    {
        return Customer::query()->findOrFail($id);
    }

    public function all()
    {
        return Customer::query()->orderBy('id', 'desc')->get();
    }

    public function update($values, $id)
    {
        return Customer::query()->where('id', $id)->update([
            'name' => $values->name,
            'from' => $values->from,
            'text' => $values->text
        ]);
    }
}
