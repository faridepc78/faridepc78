<?php

namespace App\Repositories;

use App\Models\PortfolioSlider;

class PortfolioSliderRepository
{
    public function findById($id)
    {
        return PortfolioSlider::query()->findOrFail($id);
    }

    public function store($values)
    {
        return PortfolioSlider::query()->create([
            'portfolio_id' => $values->portfolio_id,
            'image_id' => $values->image_id
        ]);
    }

    public function findByPortfolioId($portfolio_id)
    {
        return PortfolioSlider::query()->where('portfolio_id', $portfolio_id)->latest()->get();
    }
}
