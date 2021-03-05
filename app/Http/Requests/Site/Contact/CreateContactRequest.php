<?php

namespace App\Http\Requests\Site\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|max:255|email',
            'user_mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'know' => 'required|string|max:255',
            'text' => 'required|string',
            'recaptcha_token' => 'required|captcha',
        ];
    }

    public function attributes(): array
    {
        return [
            'user_name' => 'نام',
            'user_email' => 'ایمیل',
            'user_mobile' => 'تلفن همراه',
            'know' => 'طریقه آشنایی',
            'text' => 'پیام',
            'recaptcha_token' => 'ریکپچا'
        ];
    }
}
