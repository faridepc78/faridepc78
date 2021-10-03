<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $table = 'post_like';

    protected $fillable =
        [
            'post_id',
            'ip'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id')->withDefault();
    }
}
