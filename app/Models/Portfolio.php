<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

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

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function slider()
    {
        return $this->hasMany(PortfolioSlider::class);
    }

    public function expertise()
    {
        return $this->belongsToMany(Expertise::class,'portfolio_expertise','portfolio_id','expertise_id');
    }

    public function path()
    {
        return route('singleWork', $this->id . '-' . $this->slug);
    }
}
