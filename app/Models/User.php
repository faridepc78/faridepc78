<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'email',
        'image_id',
        'password',
        'remember_token'
    ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function getProfileAttribute()
    {
        return empty($this->image->files)
            ? asset('common/images/profile.png')
            : "/uploads/" . $this->image->files['original'];
    }
}
