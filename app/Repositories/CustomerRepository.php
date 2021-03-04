<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function store($values)
    {
        return Customer::query()->create([
            'name' => $values->name,
            'from' => $values->from,
            'text' => $values->text
        ]);
    }

    public function paginate(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Customer::query()->latest()->paginate(10);
    }

    public function findById($id)
    {
        return Customer::query()->findOrFail($id);
    }

    public function all()
    {
        return Customer::query()->latest()->get();
    }

    public function update($values, $id): int
    {
        return Customer::query()->where('id', $id)->update([
            'name' => $values->name,
            'from' => $values->from,
            'text' => $values->text
        ]);
    }
}
