<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository
{
    public function store($values)
    {
        return Portfolio::query()
            ->create([
                'name' => $values['name'],
                'headline' => $values['headline'],
                'slug' => str_slug_persian($values['slug']),
                'portfolio_category_id' => $values['portfolio_category_id'],
                'image_id' => null,
                'text' => $values['text'],
                'customer' => $values['customer'],
                'start_date' => $values['start_date'],
                'end_date' => $values['end_date']
            ]);
    }

    public function addImage($image_id, $id): int
    {
        return Portfolio::query()
            ->where('id', $id)
            ->update([
                'image_id' => $image_id,
            ]);
    }

    public function paginate()
    {
        return Portfolio::query()
            ->latest()
            ->paginate(10);
    }

    public function get12()
    {
        return Portfolio::query()
            ->latest()
            ->paginate(12);
    }

    public function get4()
    {
        return Portfolio::query()
            ->latest()
            ->limit(4)
            ->get();
    }

    public function all()
    {
        return Portfolio::query()
            ->latest()
            ->get();
    }

    public function findById($id)
    {
        return Portfolio::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Portfolio::query()
            ->where('id', $id)
            ->update([
                'name' => $values['name'],
                'headline' => $values['headline'],
                'slug' => str_slug_persian($values['slug']),
                'portfolio_category_id' => $values['portfolio_category_id'],
                'image_id' => $image_id,
                'text' => $values['text'],
                'customer' => $values['customer'],
                'start_date' => $values['start_date'],
                'end_date' => $values['end_date']
            ]);
    }

    public function findByCategoryId($portfolio_category_id)
    {
        return Portfolio::query()
            ->where('portfolio_category_id', $portfolio_category_id)
            ->latest()
            ->paginate(12);
    }
}
