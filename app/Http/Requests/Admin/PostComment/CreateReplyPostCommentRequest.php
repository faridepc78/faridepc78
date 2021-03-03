<?php

namespace App\Http\Requests\Admin\PostComment;

use App\Models\PostComment;
use App\Repositories\PostCommentRepository;
use Illuminate\Foundation\Http\FormRequest;

class CreateReplyPostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
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
            'post_comment_id' => 'required|numeric|exists:post_comment,id',
            'text' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'post_comment_id' => 'آیدی کامنت',
            'text' => 'پیام'
        ];
    }
}
