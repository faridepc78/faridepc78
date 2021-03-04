<?php

namespace App\Models;

use App\Services\Media\MediaFileService;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];
    protected $table = 'media';
    protected $fillable = ['id', 'files', 'type', 'filename', 'created_at', 'updated_at'];

    const IMAGE = 'image';
    static $types = [self::IMAGE];

    protected $casts = [
        'files' => 'json'
    ];

    protected static function booted()
    {
        static::deleting(function ($media) {
            MediaFileService::delete($media);
        });
    }

    public function getThumbAttribute(): string
    {
        return MediaFileService::thumb($this);
    }
}
