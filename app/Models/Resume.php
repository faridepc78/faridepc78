<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resume';

    protected $fillable =
        [
            'name',
            'customer',
            'year'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];
}
