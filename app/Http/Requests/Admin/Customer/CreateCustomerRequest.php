<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'from' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام مشتری',
            'from' => 'سمت مشتری',
            'text' => 'نظر مشتری'
        ];
    }
}
