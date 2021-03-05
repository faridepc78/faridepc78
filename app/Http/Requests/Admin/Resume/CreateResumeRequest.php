<?php

namespace App\Http\Requests\Admin\Resume;

use Illuminate\Foundation\Http\FormRequest;

class CreateResumeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:resume,name',
            'customer' => 'required|string|max:255',
            'year'=>'required|numeric|digits:4'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'نام پروژه رزومه',
            'customer' => 'مشتری پروژه رزومه',
            'year' => 'سال تولید پروژه رزومه'
        ];
    }
}
