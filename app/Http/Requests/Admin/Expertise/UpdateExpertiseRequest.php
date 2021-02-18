<?php

namespace App\Http\Requests\Admin\Expertise;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpertiseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:expertise,slug,'.request()->route('expertise'),
            'image'=>'mimes:jpg,png,jpeg,|max:1024',
            'text'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام تخصص',
            'slug' => 'اسلاگ تخصص',
            'image'=>'تصویر تخصص',
            'text'=>'توضیحات تخصص'
        ];
    }
}
