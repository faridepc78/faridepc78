<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';

    protected $fillable =
        [
            'name',
            'slug',
            'image_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function post()
    {
        return $this->hasMany(Post::class, 'id', 'post_category_id');
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function path()
    {
        return route('filterPosts', $this->id . '-' . $this->slug);
    }

    public function countPostByCategoryId($id)
    {
        return Post::query()->where('post_category_id', $id)->count();
    }
}
