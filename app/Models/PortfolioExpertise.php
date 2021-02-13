<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioExpertise extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table='portfolio_expertise';

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class,'portfolio_id');
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class,'expertise_id');
    }
}
