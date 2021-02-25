<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
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
        'blog_text',
        'portfolio_text',
        'work_text',
        'telegram_text',
        'telegram_channel_link',
        'footer_text',
        'about1',
        'about2',
        'image_id',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
    protected $table = 'setting';

    public function image()
    {
        return $this->hasOne(Media::class, 'id', 'image_id')->withDefault();
    }
}
