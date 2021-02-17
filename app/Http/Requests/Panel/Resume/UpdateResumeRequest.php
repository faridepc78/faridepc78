<?php

namespace App\Http\Requests\Panel\Resume;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResumeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'customer' => 'required|max:255',
            'year'=>'required|numeric|digits:4'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام پروژه رزومه',
            'customer' => 'مشتری پروژه رزومه',
            'year' => 'سال تولید پروژه رزومه'
        ];
    }
}
