<?php

namespace App\Services\Media;

use App\Contracts\FileServiceContract;
use App\Models\Media;
use Illuminate\Http\UploadedFile;

class MediaFileService
{
    private static $file;
    private static $dir;
    private static $isPrivate;

    public static function publicUpload(UploadedFile $file): Media
    {
        self::$file = $file;
        self::$dir = 'public/';
        self::$isPrivate = false;
        return self::upload();
    }

    private static function upload(): Media
    {
        $extension = self::normalizeExtension(self::$file);
        foreach (config('mediaFile.MediaTypeServices') as $type => $service) {
            if (in_array($extension, $service['extensions'])) {
                return self::uploadByHandler(new $service['handler'], $type);
            }
        }
    }

    public static function delete(Media $media)
    {
        foreach (config('mediaFile.MediaTypeServices') as $type => $service) {
            if ($media->type == $type) {
                return $service['handler']::delete($media);
            }
        }
    }

    private static function normalizeExtension($file): string
    {
        return strtolower($file->getClientOriginalExtension());
    }

    private static function filenameGenerator(): string
    {
        return uniqid();
    }

    private static function uploadByHandler(FileServiceContract $service, $key): Media
    {
        $media = new Media();
        $media->files = $service::upload(self::$file, self::filenameGenerator(), self::$dir);
        $media->type = $key;
        $media->filename = self::$file->getClientOriginalName();
        $media->save();
        return $media;
    }

    public static function thumb(Media $media): string
    {
        foreach (config('mediaFile.MediaTypeServices') as $type => $service) {
            if ($media->type == $type) {
                return $service['handler']::thumb($media);
            }else{
                return '/site_assets/img/customer_comment/no_pic.png';
            }
        }
    }

    public static function getExtensions(): string
    {
        $extensions = [];
        foreach (config('mediaFile.MediaTypeServices') as  $service) {
            foreach ($service['extensions'] as $extension) {
                $extensions[] = $extension;
            }
        }

        return implode(',', $extensions);
    }
}
