<?php

namespace App\Http\Requests\Admin\Work;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'mimes:jpg,png,jpeg|max:1024'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'نام کار',
            'text' => 'توضیحات کار',
            'image' => 'تصویر کار'
        ];
    }
}
