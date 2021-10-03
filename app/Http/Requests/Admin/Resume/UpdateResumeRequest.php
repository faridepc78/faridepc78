<?php

namespace App\Http\Requests\Admin\Resume;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResumeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('resume');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:resume,name,' . $id],
            'customer' => ['required', 'string', 'max:255'],
            'year' => ['required', 'numeric', 'digits:4']
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
