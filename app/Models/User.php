<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];
    protected $table = 'users';
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'image_id',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id','id')->withDefault();
    }
}
