<?php

namespace App\Http\Requests\Admin\Expertise;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpertiseRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:expertise,slug'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام تخصص',
            'slug' => 'اسلاگ تخصص',
            'image' => 'تصویر تخصص',
            'text' => 'توضیحات تخصص'
        ];
    }
}
