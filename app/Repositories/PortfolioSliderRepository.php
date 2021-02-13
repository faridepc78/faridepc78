<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Models\PortfolioSlider;

class PortfolioSliderRepository
{
    public function findById($id)
    {
        return PortfolioSlider::query()->findOrFail($id);
    }

    public function store($values)
    {
        return PortfolioSlider::create([
            'portfolio_id' => $values->portfolio_id,
            'image_id' => $values->image_id
        ]);
    }
}
