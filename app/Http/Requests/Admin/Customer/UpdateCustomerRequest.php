<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'text' => 'required|string'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'نام مشتری',
            'from' => 'سمت مشتری',
            'text' => 'نظر مشتری'
        ];
    }
}
