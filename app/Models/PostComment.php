<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed comments
 * @property mixed childrenComments
 */
class PostComment extends Model
{
    protected $guarded = [];
    protected $table = 'post_comment';
    protected $fillable = ['id', 'post_id', 'parent_id', 'user_name', 'user_email', 'user_ip', 'text', 'status', 'users', 'created_at', 'updated_at'];

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    const PENDING_STATUS = 'pending';
    static $statuses = [self::ACTIVE_STATUS, self::INACTIVE_STATUS, self::PENDING_STATUS];

    const COMMON_USER = 'user';
    const ADMIN_USER = 'admin';
    static $users = [self::COMMON_USER, self::ADMIN_USER];

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id')->withDefault();
    }

    public function getGravatarAttribute(): string
    {
        $hash = md5(strtolower(trim($this->attributes['user_email'])));
        return "http://www.gravatar.com/avatar/$hash?d=mm";
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id');
    }

    public function childrenComments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')->with('comments');
    }

    public function countAllChildrenComments(): int
    {
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countAllChildrenComments();
        }

        return $this->childrenComments->count() + $sum;
    }

    public function countActiveChildrenComments(): int
    {
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countActiveChildrenComments();
        }
        return $this->childrenComments->where('status', '=', PostComment::ACTIVE_STATUS)->count() + $sum;
    }

    public function countInactiveChildrenComments(): int
    {
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countInactiveChildrenComments();
        }
        return $this->childrenComments->where('status', '=', PostComment::INACTIVE_STATUS)->count() + $sum;
    }

    public function countPendingChildrenComments(): int
    {
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countPendingChildrenComments();
        }
        return $this->childrenComments->where('status', '=', PostComment::PENDING_STATUS)->count() + $sum;
    }

    public function role(): string
    {
        return $this->users == PostComment::ADMIN_USER ? 'Admin' : 'User';
    }

    public function status(): string
    {
        if ($this->status == PostComment::ACTIVE_STATUS)
            return $data = '<button class="btn btn-success">فعال</button>';
        if ($this->status == PostComment::INACTIVE_STATUS)
            return $data = '<button class="btn btn-danger">غیر فعال</button>';
        if ($this->status == PostComment::PENDING_STATUS)
            return $data = '<button class="btn btn-warning">در حال برسی</button>';
    }
}
