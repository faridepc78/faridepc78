<?php

namespace App\Http\Requests\Admin\Expertise;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpertiseRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('expertise');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:expertise,slug,' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024'],
            'text' => ['required', 'string']
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
