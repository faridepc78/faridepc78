<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $guarded = [];
    protected $table = 'social';
    protected $fillable = ['id', 'name', 'icon', 'link', 'color', 'created_at', 'updated_at'];
}
