<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    protected $table = 'payment';

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    static $statuses = [self::ACTIVE_STATUS, self::INACTIVE_STATUS];
}
