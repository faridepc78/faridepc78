<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social';

    protected $fillable =
        [
            'name',
            'icon',
            'link',
            'color'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];
}
