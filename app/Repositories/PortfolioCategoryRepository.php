<?php

namespace App\Repositories;

use App\Models\PortfolioCategory;

class PortfolioCategoryRepository
{
    public function store($values)
    {
        return PortfolioCategory::query()->create([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug)
        ]);
    }

    public function paginate()
    {
        return PortfolioCategory::query()->latest()->paginate(10);
    }

    public function findById($id)
    {
        return PortfolioCategory::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return PortfolioCategory::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => str_slug_persian($values->slug),
        ]);
    }

    public function all()
    {
        return PortfolioCategory::all();
    }
}
