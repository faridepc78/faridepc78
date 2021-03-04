<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $guarded = [];
    protected $table = 'expertise';
    protected $fillable = ['id', 'name', 'slug', 'image_id', 'text', 'created_at', 'updated_at'];

    public function image(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id','id')->withDefault();
    }

    public function portfolio_expertise(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PortfolioExpertise::class, 'expertise_id','id')->withDefault();
    }

    public function portfolio(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_expertise', 'expertise_id', 'portfolio_id');
    }

    public function path(): string
    {
        return route('singleExpertise', $this->id . '-' . $this->slug);
    }
}
