<?php

namespace App\Repositories;

use App\Models\PortfolioExpertise;

class PortfolioExpertiseRepository
{
    public function store($portfolio_id, $values)
    {
        foreach ($values as $value) {
            if (!empty($value)) {
                PortfolioExpertise::create([
                    'portfolio_id' => $portfolio_id,
                    'expertise_id' => $value
                ]);
            }
        }
    }

    public function findById($id)
    {
        return PortfolioExpertise::query()->findOrFail($id);
    }

    public function allToArray()
    {
        return PortfolioExpertise::query()->get('expertise_id');
    }
}
