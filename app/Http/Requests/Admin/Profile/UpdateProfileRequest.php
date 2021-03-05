<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|max:255|email|string',
            'image' => 'mimes:jpg,png,jpeg|max:1024',
            'password' => 'sometimes|min:8|confirmed|nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'full_name' => 'نام و نام خانوادگی',
            'email' => 'ایمیل',
            'image' => 'تصویر پروفایل',
            'password' => 'رمز عبور'
        ];
    }
}
