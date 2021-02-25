<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSlider extends Model
{
    protected $guarded = [];
    protected $table = 'portfolio_slider';
    protected $fillable = ['id', 'portfolio_id', 'image_id', 'created_at', 'updated_at'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class,'portfolio_id','id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class,'image_id','id')->withDefault();
    }
}
