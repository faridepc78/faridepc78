<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table='expertise';

    public function image()
    {
        return $this->belongsTo(Media::class,'image_id');
    }
}
