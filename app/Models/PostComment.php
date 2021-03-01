<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id')->withDefault();
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['user_email'])));
        return "http://www.gravatar.com/avatar/$hash?d=mm";
    }

    /*START SITE*/

    /*public function comments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')
            ->where('status','=',PostComment::ACTIVE_STATUS);
    }

    public function childrenComments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')
            ->with('comments')->where('status','=',PostComment::ACTIVE_STATUS);
    }*/

    /*END SITE*/

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id');
    }

    public function childrenComments()
    {
        return $this->hasMany(PostComment::class, 'parent_id', 'id')->with('comments');
    }

    public function countChildrenComments()
    {
        //return $this->load('childrenComments')->count();
        $sum = 0;
        foreach ($this->comments as $child) {
            $sum += $child->countChildrenComments();
        }
        return $this->childrenComments->where('status','=',PostComment::ACTIVE_STATUS)->count() + $sum;
    }
}
