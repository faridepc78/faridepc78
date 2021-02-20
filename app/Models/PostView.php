<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'post_view';
    protected $fillable = ['id', 'post_id', 'ip', 'created_at', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id')->withDefault();
    }
}
