<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostComment\CreatePostCommentRequest;
use App\Http\Requests\Admin\PostComment\CreateReplyPostCommentRequest;
use App\Models\PostComment;
use App\Repositories\PostCommentRepository;
use App\Repositories\PostRepository;
use Exception;

class PostCommentController extends Controller
{
    private $postRepository;
    private $postCommentRepository;

    public function __construct(PostRepository $postRepository, PostCommentRepository $postCommentRepository)
    {
        $this->postRepository = $postRepository;
        $this->postCommentRepository = $postCommentRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $post = $this->postRepository->showPostSortByPendingComment();
        return view('admin.post_comment.list', compact('post'));
    }

    public function showComment($id)
    {
        $post = $this->postRepository->findById($id);
        $postComment = $this->postCommentRepository->getAllPostCommentByPostId($id);
        return view('admin.post_comment.index', compact('post', 'postComment'));
    }

    public function pending($id)
    {
        $post = $this->postRepository->findById($id);
        $postComment = $this->postCommentRepository->pendingPostComment($id);
        return view('admin.post_comment.index', compact('post', 'postComment'));
    }

    public function active($id)
    {
        $post = $this->postRepository->findById($id);
        $postComment = $this->postCommentRepository->activePostComment($id);
        return view('admin.post_comment.index', compact('post', 'postComment'));
    }

    public function inactive($id)
    {
        $post = $this->postRepository->findById($id);
        $postComment = $this->postCommentRepository->inactivePostComment($id);
        return view('admin.post_comment.index', compact('post', 'postComment'));
    }

    public function show($id)
    {
        $postComment = $this->postCommentRepository->showPostComment($id);
        return view('admin.post_comment.show', compact('postComment'));
    }

    public function reply($id)
    {
        $postComment = $this->postCommentRepository->showPostComment($id);
        return view('admin.post_comment.reply', compact('postComment'));
    }

    public function active_status($parent_id, $id)
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            if ($postComment->status == PostComment::ACTIVE_STATUS) return false;
            $this->postCommentRepository->updatePostCommentStatus($postComment->id, true, false);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postComment.reply', $parent_id);
    }

    public function inactive_status($parent_id, $id)
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            if ($postComment->status == PostComment::INACTIVE_STATUS) return false;
            $this->postCommentRepository->updatePostCommentStatus($postComment->id, false, true);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postComment.reply', $parent_id);
    }

    public function destroy($parent_id, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            $postComment->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        $check = $this->postCommentRepository->existIdInTable($parent_id);
        if ($check) {
            return redirect()->route('postComment.reply', $parent_id);
        } else {
            return redirect()->route('postComment.showComment', $postComment->post_id);
        }
    }

    public function admin_comment($parent_id, CreatePostCommentRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($parent_id);
            $this->postCommentRepository->storePostComment($request, $postComment->post_id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postComment.showComment', $postComment->post_id);
    }

    public function admin_reply($parent_id, $id, CreateReplyPostCommentRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            $this->postCommentRepository->replyPostComment($request, $postComment->post_id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('postComment.reply', $parent_id);
    }
}
