<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'نام و نام خانوادگی',
            'email' => 'ایمیل',
            'image' => 'تصویر پروفایل',
            'password' => 'رمز عبور'
        ];
    }
}
