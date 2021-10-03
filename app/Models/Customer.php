<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable =
        [
            'name',
            'from',
            'text'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];
}
