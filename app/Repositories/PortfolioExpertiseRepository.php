<?php

namespace App\Repositories;

use App\Models\Expertise;
use App\Models\PortfolioExpertise;

class PortfolioExpertiseRepository
{
    public function store($portfolio_id, $values)
    {
        foreach ($values as $value) {
            if (!empty($value)) {
                PortfolioExpertise::query()->create([
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

    public function all()
    {
        return PortfolioExpertise::query()->get('expertise_id');
    }

    public function findByPortfolioId($id)
    {
        return Expertise::query()->
        join('portfolio_expertise', 'expertise.id', '=', 'portfolio_expertise.expertise_id')
            ->select('expertise.*')
            ->where('portfolio_id',$id)
            ->get();
    }
}
