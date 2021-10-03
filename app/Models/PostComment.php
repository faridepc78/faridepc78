<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table = 'post_comment';

    protected $fillable =
        [
            'post_id',
            'parent_id',
            'user_name',
            'user_email',
            'user_ip',
            'text',
            'status',
            'users'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    const PENDING_STATUS = 'pending';
    static $statuses =
        [
            self::ACTIVE_STATUS,
            self::INACTIVE_STATUS,
            self::PENDING_STATUS
        ];

    const COMMON_USER = 'user';
    const ADMIN_USER = 'admin';
    static $users =
        [
        self::COMMON_USER,
        self::ADMIN_USER
        ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id')->withDefault();
    }

    public function getGravatarAttribute(): string
    {
        $hash = md5(strtolower(trim($this->attributes['user_email'])));
        return "https://www.gravatar.com/avatar/$hash?d=mm";
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id');
    }

    public function childrenComments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')->with('comments');
    }

    public function ActiveComments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')
            ->where('status', '=', PostComment::ACTIVE_STATUS);
    }

    public function ActiveChildrenComments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')
            ->where('status', '=', PostComment::ACTIVE_STATUS)
            ->with('ActiveComments');
    }

    public function countAllChildrenComments()
    {
        $sum = 0;

        foreach ($this->comments as $child) {
            $sum += $child->countAllChildrenComments();
        }

        return $this->childrenComments->count() + $sum;
    }

    public function countActiveChildrenComments()
    {
        $sum = 0;

        foreach ($this->comments as $child) {
            $sum += $child->countActiveChildrenComments();
        }

        return $this->childrenComments->where('status', '=', PostComment::ACTIVE_STATUS)->count() + $sum;
    }

    public function countInactiveChildrenComments()
    {
        $sum = 0;

        foreach ($this->comments as $child) {
            $sum += $child->countInactiveChildrenComments();
        }
        return $this->childrenComments->where('status', '=', PostComment::INACTIVE_STATUS)->count() + $sum;
    }

    public function countPendingChildrenComments()
    {
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countPendingChildrenComments();
        }

        return $this->childrenComments->where('status', '=', PostComment::PENDING_STATUS)->count() + $sum;
    }

    public function role()
    {
        return $this->users == PostComment::ADMIN_USER ? 'Admin' : 'User';
    }

    public function status()
    {
        if ($this->status == PostComment::ACTIVE_STATUS)
            return $data = '<button class="btn btn-success">فعال</button>';
        if ($this->status == PostComment::INACTIVE_STATUS)
            return $data = '<button class="btn btn-danger">غیر فعال</button>';
        if ($this->status == PostComment::PENDING_STATUS)
            return $data = '<button class="btn btn-warning">در حال برسی</button>';
    }
}
