<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customer';
    protected $fillable = ['id', 'name', 'from', 'text', 'created_at', 'updated_at'];
}
