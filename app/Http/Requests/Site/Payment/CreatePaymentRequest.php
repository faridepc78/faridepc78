<?php

namespace App\Http\Requests\Site\Payment;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace(',', '', request('price'))
        ]);
    }

    public function rules()
    {
        return [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|max:255|email',
            'user_mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:1000|max:999999999',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'نام',
            'user_email' => 'ایمیل',
            'user_mobile' => 'تلفن همراه',
            'title' => 'عنوان پرداخت',
            'g-recaptcha-response' => 'ریکپچا'
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'فیلد ریکپچا الزامی است',
            'g-recaptcha-response.captcha' => 'لطفا فیلد ریکپچا را مجداد پر کنید'
        ];
    }
}
