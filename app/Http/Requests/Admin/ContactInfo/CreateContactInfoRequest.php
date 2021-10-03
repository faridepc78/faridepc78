<?php

namespace App\Http\Requests\Admin\ContactInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactInfoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'val' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255', 'url'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:1024'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام راه ارتباطی',
            'val' => 'مقدار راه ارتباطی',
            'link' => 'لینک راه ارتباطی',
            'image' => 'تصویر راه ارتباطی',
            'text' => 'توضیح راه ارتباطی'
        ];
    }
}
