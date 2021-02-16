<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function store($values)
    {
        return Setting::create([
            'rule' => $values->rule,
            'full_name' => $values->full_name,
            'bio' => $values->bio,
            'trust' => $values->trust,
            'trust_reason1' => $values->trust_reason1,
            'trust_reason2' => $values->trust_reason2,
            'trust_reason3' => $values->trust_reason3,
            'trust_reason4' => $values->trust_reason4,
            'about1' => $values->about1,
            'about2' => $values->about2,
            'footer_text' => $values->footer_text
        ]);
    }

    public function update($values, $id)
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
            'about1' => $values->about1,
            'about2' => $values->about2,
            'footer_text' => $values->footer_text
        ]);
    }

    public function findById($id)
    {
        return Setting::query()->findOrFail($id);
    }

    public function firstOrFail()
    {
        return Setting::query()->firstOrFail();
    }
}
