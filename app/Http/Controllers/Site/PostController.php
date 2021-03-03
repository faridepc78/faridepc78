<?php


namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Post\CreatePostCommentRequest;
use App\Http\Requests\Site\Post\CreateReplyPostCommentRequest;
use App\Models\Post;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostCommentRepository;
use App\Repositories\PostLikeRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostViewRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use App\Responses\AjaxResponses;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postRepository;
    private $postViewRepository;
    private $postLikeRepository;
    private $postCommentRepository;
    private $postCategoryRepository;
    private $settingRepository;
    private $socialRepository;

    public function __construct(PostRepository $postRepository,
                                PostViewRepository $postViewRepository,
                                PostLikeRepository $postLikeRepository,
                                PostCommentRepository $postCommentRepository,
                                PostCategoryRepository $postCategoryRepository,
                                SettingRepository $settingRepository,
                                SocialRepository $socialRepository)
    {
        $this->postRepository = $postRepository;
        $this->postViewRepository = $postViewRepository;
        $this->postLikeRepository = $postLikeRepository;
        $this->postCommentRepository = $postCommentRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->settingRepository = $settingRepository;
        $this->socialRepository = $socialRepository;
    }

    public function index()
    {
        $post = $this->postRepository->get6();
        $postCategory = $this->postCategoryRepository->all();
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.blog.index',
            compact('post', 'postCategory', 'setting', 'social'));
    }

    public function search()
    {
        $keyword = request()->input('keyword');
        if (!isset($keyword)) abort(404);
        $post = $this->postRepository->search($keyword);
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.blog.search', compact('keyword', 'post', 'setting', 'social'));
    }

    public function filter($slug)
    {
        $post_category_id = $this->extractId($slug);
        $post = $this->postRepository->findByCategoryId($post_category_id);
        $postCategory = $this->postCategoryRepository->all();
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.blog.index',
            compact('post_category_id', 'post', 'postCategory', 'setting', 'social'));
    }

    public function show($slug)
    {
        $post_id = $this->extractId($slug);
        $post_view = $this->postViewRepository->isRegisterIpForPostView($post_id);
        if ($post_view != true) {
            $this->postViewRepository->storePostView($post_id);
        }
        $post = $this->postRepository->findById($post_id);
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        $comments = $this->postCommentRepository->getParentComment($post_id);
        return view('site.blog.post.index',
            compact('post', 'setting', 'social', 'comments'));
    }

    public function like($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post_like = $this->postLikeRepository->isRegisterIpForPostLike($id);
                if ($post_like != true) {
                    $this->postLikeRepository->storePostLike($id);
                } else {
                    $this->postLikeRepository->destroyPostLike($id);
                }
            });
            DB::commit();
            return AjaxResponses::LikeSuccessResponse();
        } catch (Exception $exception) {
            DB::rollBack();
            return AjaxResponses::FailedResponse();
        }
    }

    public function dislike($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post_like = $this->postLikeRepository->isRegisterIpForPostLike($id);
                if ($post_like != false) {
                    $this->postLikeRepository->destroyPostLike($id);
                }
            });
            DB::commit();
            return AjaxResponses::DisLikeSuccessResponse();
        } catch (Exception $exception) {
            DB::rollBack();
            return AjaxResponses::FailedResponse();
        }
    }

    public function storeComment(CreatePostCommentRequest $request, $post_id)
    {
        try {
            $this->postCommentRepository->storePostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function replyComment(CreateReplyPostCommentRequest $request, $post_id)
    {
        try {
            $this->postCommentRepository->replyPostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    /*public function storeAdminComment(CreatePostCommentRequest $request, $post_id)
    {
        try {
            $this->postRepository->storePostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }

    public function replyAdminComment(CreateReplyPostCommentRequest $request, $post_id)
    {
        try {
            $this->postRepository->replyPostComment($request, $post_id);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }*/

    public function extractId($slug)
    {
        return Str::before($slug, '-');
    }
}
