<?php

namespace App\Http\Requests\Admin\Work;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'نام کار',
            'text' => 'توضیحات کار',
            'image' => 'تصویر کار'
        ];
    }
}
