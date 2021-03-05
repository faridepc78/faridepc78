<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rule' => 'required|string',
            'full_name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
            'trust' => 'required|string',
            'trust_reason1' => 'required|string',
            'trust_reason2' => 'required|string',
            'trust_reason3' => 'required|string',
            'trust_reason4' => 'required|string',
            'blog_text' => 'nullable|string',
            'portfolio_text' => 'nullable|string',
            'work_text' => 'nullable|string',
            'contact_text' => 'nullable|string',
            'telegram_text' => 'nullable|string',
            'telegram_channel_link' => 'nullable|url',
            'about1' => 'required|string',
            'about2' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'footer_text' => 'required|string'
        ];
    }

    public function attributes(): array
    {
        return [
            'rule' => 'قوانین و مقررات سایت',
            'full_name' => 'نام و نام خانوادگی مدیر سایت',
            'bio' => 'بیو مدیر سایت',
            'trust' => 'اعتماد مدیر سایت',
            'trust_reason1' => 'دلیل 1 اعتماد مدیر سایت',
            'trust_reason2' => 'دلیل 2 اعتماد مدیر سایت',
            'trust_reason3' => 'دلیل 3 اعتماد مدیر سایت',
            'trust_reason4' => 'دلیل 4 اعتماد مدیر سایت',
            'blog_text' => 'توضیحات بلاگ',
            'portfolio_text' => 'توضیحات نمونه کارها',
            'work_text' => 'توضیحات کارها',
            'telegram_text' => 'توضیحات کانال تلگرام',
            'telegram_channel_link' => 'لینک کانال تلگرام',
            'about1' => 'درباره من 1',
            'about2' => 'درباره من 2',
            'image' => 'عکس مدیر سایت (درباره من)',
            'footer_text' => 'متن فوتر سایت'
        ];
    }
}
