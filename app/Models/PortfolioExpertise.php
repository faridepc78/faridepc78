<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioExpertise extends Model
{
    protected $table = 'portfolio_expertise';

    protected $fillable =
        [
            'portfolio_id',
            'expertise_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id')->withDefault();
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id', 'id')->withDefault();
    }
}
