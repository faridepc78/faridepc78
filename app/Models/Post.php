<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $table = 'post';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'post_category_id',
        'image_id',
        'text',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id','id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id')->withDefault();
    }

    public function path()
    {
        return route('singlePost', $this->id . '-' . $this->slug);
    }

    public function view()
    {
        return $this->hasMany(PostView::class)->count();
    }

    public function like()
    {
        return $this->hasMany(PostLike::class)->count();
    }

    public function countComment()
    {
        return $this->hasMany(PostComment::class)->count();
    }

    public function isLikePostByIp()
    {
        return PostLike::query()->where('post_id', $this->id)->where('ip', request()->ip())->exists();
    }
}
