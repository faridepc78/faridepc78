<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSlider extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'portfolio_slider';
    protected $fillable = ['id', 'portfolio_id', 'image_id', 'created_at', 'updated_at'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class,'portfolio_id');
    }

    public function image()
    {
        return $this->belongsTo(Media::class,'image_id');
    }
}
