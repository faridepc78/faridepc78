<?php

namespace App\Services\Media;

use App\Contracts\FileServiceContract;
use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageFileService extends DefaultFileService implements FileServiceContract
{
    public static function upload(UploadedFile $file,$filename, $dir) :array
    {
        Storage::putFileAs( $dir , $file, $filename . '.' . $file->getClientOriginalExtension());
        return self::resize($filename, $file->getClientOriginalExtension());
    }

    private static function resize($filename, $extension): array
    {
        $imgs['original'] =  $filename . '.' . $extension;
        return $imgs;
    }

    public static function thumb(Media $media): string
    {
        return "/storage/" . $media->files['original'];
    }
}
