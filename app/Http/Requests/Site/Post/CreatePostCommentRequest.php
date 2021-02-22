<?php

namespace App\Http\Requests\Site\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_id' => 'required|exists:post,id',
            'user_name' => 'required|max:255',
            'user_email' => 'required|max:255|email',
            'text' => 'required',
            'recaptcha_token' => 'required|captcha',
        ];
    }

    public function attributes()
    {
        return [
            'post_id' => 'آیدی پست',
            'user_name' => 'نام',
            'user_email' => 'ایمیل',
            'text' => 'پیام',
            'recaptcha_token' => 'ریکپچا'
        ];
    }
}
