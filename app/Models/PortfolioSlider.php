<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSlider extends Model
{
    protected $table = 'portfolio_slider';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'portfolio_id',
            'image_id'
        ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
