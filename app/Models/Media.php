<?php

namespace App\Models;

use App\Services\Media\MediaFileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $casts = [
        'files' => 'json'
    ];

    protected static function booted()
    {
        static::deleting(function ($media) {
            MediaFileService::delete($media);
        });
    }

    public function getThumbAttribute()
    {
        return MediaFileService::thumb($this);
    }
}
