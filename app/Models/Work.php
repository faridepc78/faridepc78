<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'work';

    protected $fillable =
        [
            'title',
            'text',
            'image_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
