<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'contact_info';

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }
}
