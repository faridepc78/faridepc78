<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'contact';
    protected $fillable = ['id', 'user_name', 'user_email', 'user_mobile', 'user_ip', 'know', 'text', 'status', 'created_at', 'updated_at'];

    const READ_STATUS = 'read';
    const UNREAD_STATUS = 'unread';
    static $statuses = [self::READ_STATUS, self::UNREAD_STATUS];
}