<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'work';

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
