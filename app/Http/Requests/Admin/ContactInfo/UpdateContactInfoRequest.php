<?php

namespace App\Http\Requests\Admin\ContactInfo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'val' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg|max:1024',
            'text' => 'required|string'
        ];
    }

    public function attributes(): array
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
