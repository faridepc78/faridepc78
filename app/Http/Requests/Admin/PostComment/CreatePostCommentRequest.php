<?php

namespace App\Http\Requests\Admin\PostComment;

use App\Models\PostComment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        if (Auth::check()) {
            $user_name = auth()->user()->full_name;
            $user_email = auth()->user()->email;
            $users = PostComment::ADMIN_USER;
            $status = PostComment::ACTIVE_STATUS;
        } else {
            return false;
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
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'پیام'
        ];
    }
}
