<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $guarded = [];
    protected $table = 'post_like';
    protected $fillable = ['id', 'post_id', 'ip', 'created_at', 'updated_at'];

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id','id')->withDefault();
    }
}
