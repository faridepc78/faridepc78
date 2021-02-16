<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table='portfolio_category';
    protected $fillable = ['id', 'name', 'slug', 'created_at', 'updated_at'];

    public function path()
    {
        return route('filterWorks', $this->id . '-' . $this->slug);
    }
}
