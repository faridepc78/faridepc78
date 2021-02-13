<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'post';

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
