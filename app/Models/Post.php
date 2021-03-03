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
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id')->withDefault();
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function path(): string
    {
        return route('singlePost', $this->id . '-' . $this->slug);
    }

    public function view(): int
    {
        return $this->hasMany(PostView::class, 'post_id', 'id')->count();
    }

    public function like(): int
    {
        return $this->hasMany(PostLike::class, 'post_id', 'id')->count();
    }

    public function comment()
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id');
    }

    public function countAllComment(): int
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id')->count();
    }

    public function countPendingComment(): int
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id')
            ->where('status', '=', PostComment::PENDING_STATUS)
            ->count();
    }

    public function countActiveComment(): int
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id')
            ->where('status', '=', PostComment::ACTIVE_STATUS)
            ->count();
    }

    public function countInactiveComment(): int
    {
        return $this->hasMany(PostComment::class, 'post_id', 'id')
            ->where('status', '=', PostComment::INACTIVE_STATUS)
            ->count();
    }

    public function isLikePostByIp(): bool
    {
        return PostLike::query()->where('post_id', $this->id)->where('ip', request()->ip())->exists();
    }
}
