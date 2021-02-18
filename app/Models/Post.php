<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'post';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'post_category_id',
        'image_id',
        'text',
        'view',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function path()
    {
        return route('singlePost', $this->id . '-' . $this->slug);
    }
}
