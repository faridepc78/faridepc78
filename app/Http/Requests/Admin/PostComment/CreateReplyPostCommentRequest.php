<?php

namespace App\Http\Requests\Admin\PostComment;

use App\Models\PostComment;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyPostCommentRequest extends FormRequest
{
    public function authorize(): bool
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
            return false;
        }
        return $this->merge([
            'user_name' => $user_name,
            'user_email' => $user_email,
            'users' => $users,
            'status' => $status
        ]);
    }

    public function rules(): array
    {
        return [
            'post_comment_id' => 'required|numeric|exists:post_comment,id',
            'text' => 'required|string'
        ];
    }

    public function attributes(): array
    {
        return [
            'post_comment_id' => 'آیدی کامنت',
            'text' => 'پیام'
        ];
    }
}
