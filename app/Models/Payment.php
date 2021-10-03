<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable =
        [
            'user_name',
            'user_mobile',
            'user_email',
            'user_ip',
            'title',
            'price',
            'ref_number',
            'order_number',
            'status',
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';
    const PENDING_STATUS = 'pending';
    static $statuses =
        [
            self::ACTIVE_STATUS,
            self::INACTIVE_STATUS,
            self::PENDING_STATUS
        ];
}
