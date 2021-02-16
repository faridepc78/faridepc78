<?php

namespace App\Repositories;

use App\Models\Portfolio;
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

    public function get4()
    {
        return Portfolio::query()->orderBy('id', 'desc')->limit(4)->get();
    }

    public function all()
    {
        return Portfolio::query()->orderBy('id', 'desc')->get();
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

    public function findByCategoryId($portfolio_category_id)
    {
        return Portfolio::query()->where('portfolio_category_id', $portfolio_category_id)->orderBy('id', 'desc')->paginate();
    }
}
