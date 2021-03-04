<?php

namespace App\Services\Media;

use Illuminate\Support\Facades\Storage;

class DefaultFileService
{
    public static $media;

    public static function delete($media)
    {
        foreach ($media->files as $file) {
            if ($media->is_private) {
                Storage::delete('private\\' . $file);
            } else {
                Storage::delete('public\\' . $file);
            }
        }
    }
}
