<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'payment';

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    static $statuses = [self::ACTIVE_STATUS, self::INACTIVE_STATUS];
}
