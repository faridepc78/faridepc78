<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'post_category';
    protected $fillable = ['id', 'name', 'slug', 'image_id', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }
}
