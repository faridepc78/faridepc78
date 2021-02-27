<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Exception;

class PostCommentController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $postComment = $this->postRepository->getAllPostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function active()
    {
        $postComment = $this->postRepository->activePostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function inactive()
    {
        $postComment = $this->postRepository->inactivePostComment();
        return view('admin.post_comment.index', compact('postComment'));
    }

    public function show($id)
    {
        $postComment = $this->postRepository->showPostComment($id);
        return view('admin.post_comment.show', compact('postComment'));
    }

    public function destroy($id)
    {
        try {
            $postComment = $this->postRepository->showPostComment($id);
            $postComment->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function change_status($id)
    {
        try {
            $postComment = $this->postRepository->showPostComment($id);
            $this->postRepository->updateContactStatus($postComment->id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function reply($id)
    {
        $postComment = $this->postRepository->showPostComment($id);
        return view('admin.post_comment.reply', compact('postComment'));
    }
}
