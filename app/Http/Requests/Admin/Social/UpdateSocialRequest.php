<?php

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Colour\Hex;

class UpdateSocialRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255', 'url'],
            'color' => ['required', new Hex]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام شبکه اجتماعی',
            'icon' => 'آیکون شبکه اجتماعی',
            'link' => 'لینک شبکه اجتماعی',
            'color'=>'رنگ آیکون شبکه اجتماعی'
        ];
    }
}
