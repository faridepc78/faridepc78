<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'expertise';

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function portfolio_expertise()
    {
        return $this->hasOne(PortfolioExpertise::class,'expertise_id');
    }

    public function portfolio()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_expertise', 'expertise_id', 'portfolio_id');
    }
}
