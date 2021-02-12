<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Models\PortfolioSlider;
use Illuminate\Support\Str;

class PortfolioRepository
{
    public function store($values)
    {
        return Portfolio::create([
            'name' => $values->name,
            'headline' => $values->headline,
            'slug' => Str::slug($values->slug),
            'portfolio_category_id' => $values->portfolio_category_id,
            'image_id' => $values->image_id,
            'text' => $values->text,
            'customer' => $values->customer,
            'start_date' => $values->start_date,
            'end_date' => $values->end_date
        ]);
    }

    public function paginate()
    {
        return Portfolio::query()->orderBy('id', 'desc')->paginate();
    }

    public function findById($id)
    {
        return Portfolio::query()->findOrFail($id);
    }

    public function update($values, $id)
    {
        return Portfolio::query()->where('id', $id)->update([
            'name' => $values->name,
            'headline' => $values->headline,
            'slug' => Str::slug($values->slug),
            'portfolio_category_id' => $values->portfolio_category_id,
            'image_id' => $values->image_id,
            'text' => $values->text,
            'customer' => $values->customer,
            'start_date' => $values->start_date,
            'end_date' => $values->end_date
        ]);
    }

    public function store_slider($values)
    {
        return PortfolioSlider::create([
            'portfolio_id' => $values->portfolio_id,
            'image_id' => $values->image_id
        ]);
    }
}
