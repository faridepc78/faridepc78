<?php

namespace App\Http\Requests\Site\Post;

use App\Models\PostComment;
use App\Repositories\PostCommentRepository;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyPostCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): CreateReplyPostCommentRequest
    {
        $PostCommentRepository = new  PostCommentRepository();
        $showPostComment = $PostCommentRepository->showPostComment(request()->post_comment_id);
        $parent_status = $showPostComment->status;
        if (auth()->user()) {
            $user_name = auth()->user()->full_name;
            $user_email = auth()->user()->email;
            $users = PostComment::ADMIN_USER;
            $parent_status == PostComment::ACTIVE_STATUS ? $status = PostComment::ACTIVE_STATUS : $status = PostComment::PENDING_STATUS;
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
            'post_comment_id' => 'required|numeric|exists:post_comment,id',
            'post_id' => 'required|numeric|exists:post,id',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|max:255|email',
            'text' => 'required|string',
            'recaptcha_token' => 'required|captcha',
        ];
    }

    public function attributes()
    {
        return [
            'post_comment_id' => 'آیدی کامنت',
            'post_id' => 'آیدی پست',
            'user_name' => 'نام',
            'user_email' => 'ایمیل',
            'text' => 'پیام',
            'recaptcha_token' => 'ریکپچا'
        ];
    }
}
