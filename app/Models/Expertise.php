<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $table = 'expertise';

    protected $fillable =
        [
            'name',
            'slug',
            'image_id',
            'text'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function portfolio_expertise()
    {
        return $this->hasOne(PortfolioExpertise::class, 'expertise_id', 'id')->withDefault();
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
