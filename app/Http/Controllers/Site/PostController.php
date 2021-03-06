<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Post\CreatePostCommentRequest;
use App\Http\Requests\Site\Post\CreateReplyPostCommentRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostCommentRepository;
use App\Repositories\PostLikeRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostViewRepository;
use App\Responses\AjaxResponses;
use Exception;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postRepository;
    private $postViewRepository;
    private $postLikeRepository;
    private $postCommentRepository;
    private $postCategoryRepository;

    public function __construct(PostRepository $postRepository,
                                PostViewRepository $postViewRepository,
                                PostLikeRepository $postLikeRepository,
                                PostCommentRepository $postCommentRepository,
                                PostCategoryRepository $postCategoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->postViewRepository = $postViewRepository;
        $this->postLikeRepository = $postLikeRepository;
        $this->postCommentRepository = $postCommentRepository;
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        $post = $this->postRepository->get6();
        $postCategory = $this->postCategoryRepository->all();
        return view('site.blog.index', compact('post', 'postCategory'));
    }

    public function search()
    {
        $keyword = request()->input('keyword');
        if (!isset($keyword)) abort(404);
        $post = $this->postRepository->search($keyword);
        return view('site.blog.search', compact('keyword', 'post'));
    }

    public function filter($slug)
    {
        $post_category_id = $this->extractId($slug);
        $post = $this->postRepository->findByCategoryId($post_category_id);
        $postCategory = $this->postCategoryRepository->all();
        return view('site.blog.index',
            compact('post_category_id', 'post', 'postCategory'));
    }

    public function show($slug)
    {
        $post_id = $this->extractId($slug);
        $post_view = $this->postViewRepository->isRegisterIpForPostView($post_id);
        if ($post_view != true) {
            $this->postViewRepository->storePostView($post_id);
        }
        $post = $this->postRepository->findById($post_id);
        $comments = $this->postCommentRepository->getParentComment($post_id);
        return view('site.blog.post.index',
            compact('post', 'comments'));
    }

    public function like($id): \Illuminate\Http\JsonResponse
    {
        try {
            $post_like = $this->postLikeRepository->isRegisterIpForPostLike($id);
            if ($post_like != true) {
                $this->postLikeRepository->storePostLike($id);
            } else {
                $this->postLikeRepository->destroyPostLike($id);
            }
            return AjaxResponses::LikeSuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function dislike($id): \Illuminate\Http\JsonResponse
    {
        try {
            $post_like = $this->postLikeRepository->isRegisterIpForPostLike($id);
            if ($post_like != false) {
                $this->postLikeRepository->destroyPostLike($id);
            }
            return AjaxResponses::DisLikeSuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function storeComment(CreatePostCommentRequest $request, $post_id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->postCommentRepository->storePostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function replyComment(CreateReplyPostCommentRequest $request, $post_id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->postCommentRepository->replyPostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function extractId($slug): string
    {
        return Str::before($slug, '-');
    }
}
