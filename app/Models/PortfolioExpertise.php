<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioExpertise extends Model
{
    protected $guarded = [];
    protected $table = 'portfolio_expertise';
    protected $fillable = ['id', 'portfolio_id', 'expertise_id', 'created_at', 'updated_at'];

    public function portfolio(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id','id')->withDefault();
    }

    public function expertise(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Expertise::class, 'expertise_id','id')->withDefault();
    }
}
