<?php

namespace App\Http\Requests\Admin\ContactInfo;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactInfoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'val' => 'required|max:255',
            'link' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024',
            'text' => 'required'
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
