<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $table = 'portfolio_category';

    protected $fillable =
        [
            'name',
            'slug'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'id', 'portfolio_category_id');
    }

    public function path()
    {
        return route('filterWorks', $this->id . '-' . $this->slug);
    }
}
