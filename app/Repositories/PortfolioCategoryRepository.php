<?php

namespace App\Repositories;

use App\Models\PortfolioCategory;
use Illuminate\Support\Str;

class PortfolioCategoryRepository
{
    public function store($values)
    {
        return PortfolioCategory::create([
            'name' => $values->name,
            'slug' => Str::slug($values->slug)
        ]);
    }

    public function paginate()
    {
        return PortfolioCategory::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function findById($id)
    {
        return PortfolioCategory::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return PortfolioCategory::query()->where('id', $id)->update([
            'name' => $values->name,
            'slug' => Str::slug($values->slug)
        ]);
    }

    public function all()
    {
        return PortfolioCategory::all();
    }
}
