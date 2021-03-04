<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];
    protected $table = 'portfolio';
    protected $fillable = [
        'id',
        'name',
        'headline',
        'slug',
        'portfolio_category_id',
        'image_id',
        'text',
        'customer',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id', 'id')->withDefault();
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function slider(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioSlider::class, 'portfolio_id', 'id');
    }

    public function expertise(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Expertise::class, 'portfolio_expertise', 'portfolio_id', 'expertise_id');
    }

    public function path(): string
    {
        return route('singleWork', $this->id . '-' . $this->slug);
    }
}
