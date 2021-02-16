<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'setting';
    protected $fillable = [
        'id',
        'rule',
        'full_name',
        'bio',
        'trust',
        'trust_reason1',
        'trust_reason2',
        'trust_reason3',
        'trust_reason4',
        'about1',
        'about2',
        'footer_text',
        'created_at',
        'updated_at'
    ];
}
