<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'work';
    protected $fillable = ['id', 'title', 'text', 'image_id', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
