<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = [];
    protected $table = 'resume';
    protected $fillable = ['id', 'name', 'customer', 'year', 'created_at', 'updated_at'];
}
