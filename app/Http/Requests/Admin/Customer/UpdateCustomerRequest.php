<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'from' => 'required|max:255',
            'text' => 'required'
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
