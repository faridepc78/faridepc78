<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $postComment = $this->postCommentRepository->getAllPostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function pending()
    {
        $postComment = $this->postCommentRepository->pendingPostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function active()
    {
        $postComment = $this->postCommentRepository->activePostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function inactive()
    {
        $postComment = $this->postCommentRepository->inactivePostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function show($id)
    {
        $postComment = $this->postCommentRepository->showPostComment($id);
        return view('admin.post_comment.show', compact('postComment'));
    }

    public function destroy($id)
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            $postComment->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    /*public function change_status($id)
    {
        try {
            $postComment = $this->postCommentRepository->showPostComment($id);
            $this->postCommentRepository->updateContactStatus($postComment->id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }*/

    public function reply($id)
    {
        $postComment = $this->postCommentRepository->showPostComment($id);
        return view('admin.post_comment.reply', compact('postComment'));
    }
}
