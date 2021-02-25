<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function store($values)
    {
        return Setting::query()->create([
            'rule' => $values->rule,
            'full_name' => $values->full_name,
            'bio' => $values->bio,
            'trust' => $values->trust,
            'trust_reason1' => $values->trust_reason1,
            'trust_reason2' => $values->trust_reason2,
            'trust_reason3' => $values->trust_reason3,
            'trust_reason4' => $values->trust_reason4,
            'blog_text' => $values->blog_text,
            'portfolio_text' => $values->portfolio_text,
            'work_text' => $values->work_text,
            'telegram_text' => $values->telegram_text,
            'telegram_channel_link' => $values->telegram_channel_link,
            'about1' => $values->about1,
            'about2' => $values->about2,
            'image_id' => null,
            'footer_text' => $values->footer_text
        ]);
    }

    public function addImage($image_id, $id)
    {
        return Setting::query()->where('id', $id)->update([
            'image_id' => $image_id,
        ]);
    }

    public function update($values, $image_id, $id)
    {
        return Setting::query()->where('id', $id)->update([
            'rule' => $values->rule,
            'full_name' => $values->full_name,
            'bio' => $values->bio,
            'trust' => $values->trust,
            'trust_reason1' => $values->trust_reason1,
            'trust_reason2' => $values->trust_reason2,
            'trust_reason3' => $values->trust_reason3,
            'trust_reason4' => $values->trust_reason4,
            'blog_text' => $values->blog_text,
            'portfolio_text' => $values->portfolio_text,
            'work_text' => $values->work_text,
            'telegram_text' => $values->telegram_text,
            'telegram_channel_link' => $values->telegram_channel_link,
            'about1' => $values->about1,
            'about2' => $values->about2,
            'image_id' => $image_id,
            'footer_text' => $values->footer_text
        ]);
    }

    public function findById($id)
    {
        return Setting::query()->findOrFail($id);
    }

    public function first()
    {
        return Setting::query()->first();
    }
}
