<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'post_comment';
    protected $fillable = ['id', 'post_id', 'user_name', 'user_email', 'user_ip', 'text', 'status', 'users', 'created_at', 'updated_at'];

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    static $statuses = [self::ACTIVE_STATUS, self::INACTIVE_STATUS];

    const COMMON_USER = 'user';
    const ADMIN_USER = 'admin';
    static $users = [self::COMMON_USER, self::ADMIN_USER];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id')->withDefault();
    }
}
