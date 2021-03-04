<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = [];
    protected $table = 'work';
    protected $fillable = ['id', 'title', 'text', 'image_id', 'created_at', 'updated_at'];

    public function image(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id','id')->withDefault();
    }
}
