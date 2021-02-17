<?php

namespace App\Http\Requests\Panel\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rule' => 'required',
            'full_name' => 'required|max:255',
            'bio' => 'required|max:255',
            'trust'=>'required',
            'trust_reason1'=>'required',
            'trust_reason2'=>'required',
            'trust_reason3'=>'required',
            'trust_reason4'=>'required',
            'about1' => 'required',
            'about2' => 'required',
            'footer_text'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'rule' => 'قوانین و مقررات سایت',
            'full_name' => 'نام و نام خانوادگی مدیر سایت',
            'bio'=>'بیو مدیر سایت',
            'trust'=>'اعتماد مدیر سایت',
            'trust_reason1'=>'دلیل 1 اعتماد مدیر سایت',
            'trust_reason2'=>'دلیل 2 اعتماد مدیر سایت',
            'trust_reason3'=>'دلیل 3 اعتماد مدیر سایت',
            'trust_reason4'=>'دلیل 4 اعتماد مدیر سایت',
            'about1' => 'درباره من 1',
            'about2' => 'درباره من 2',
            'footer_text'=>'متن فوتر سایت'
        ];
    }
}
