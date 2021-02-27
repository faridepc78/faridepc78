<?php

namespace App\Http\Requests\Site\Post;

use App\Models\PostComment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        if (auth()->user()) {
            $user_name = auth()->user()->full_name;
            $user_email = auth()->user()->email;
            $users = PostComment::ADMIN_USER;
            $status = PostComment::ACTIVE_STATUS;
        } else {
            $user_name = request()->user_name;
            $user_email = request()->user_email;
            $users = PostComment::COMMON_USER;
            $status = PostComment::PENDING_STATUS;
        }
        return $this->merge([
            'user_name' => $user_name,
            'user_email' => $user_email,
            'users' => $users,
            'status' => $status
        ]);
    }

    public function rules()
    {
        return [
            'post_id' => 'required|numeric|exists:post,id',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|max:255|email',
            'text' => 'required|string',
            'status' => ['required', Rule::in(PostComment::$statuses)],
            'users' => ['required', Rule::in(PostComment::$users)],
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
