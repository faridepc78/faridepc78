<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioExpertise extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'portfolio_expertise';
    protected $fillable = ['id', 'portfolio_id', 'expertise_id', 'created_at', 'updated_at'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id');
    }
}
