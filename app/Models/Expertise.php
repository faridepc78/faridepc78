<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $guarded = [];
    protected $table = 'expertise';
    protected $fillable = ['id', 'name', 'slug', 'image_id', 'text', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function portfolio_expertise()
    {
        return $this->hasOne(PortfolioExpertise::class, 'expertise_id')->withDefault();
    }

    public function portfolio()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_expertise', 'expertise_id', 'portfolio_id');
    }

    public function path()
    {
        return route('singleExpertise', $this->id . '-' . $this->slug);
    }
}
