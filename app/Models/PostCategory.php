<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $guarded = [];
    protected $table = 'post_category';
    protected $fillable = ['id', 'name', 'slug', 'image_id', 'created_at', 'updated_at'];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'id', 'post_category_id');
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function path(): string
    {
        return route('filterPosts', $this->id . '-' . $this->slug);
    }

    public function countPostByCategoryId($id): int
    {
        return Post::query()->where('post_category_id', $id)->count();
    }
}
