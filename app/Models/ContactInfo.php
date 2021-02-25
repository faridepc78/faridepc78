<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $guarded = [];
    protected $table = 'contact_info';
    protected $fillable = ['id', 'name', 'val', 'link', 'text', 'image_id', 'created_at', 'updated_at'];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
