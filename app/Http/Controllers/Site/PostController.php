<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use App\Responses\AjaxResponses;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postRepository;
    private $postCategoryRepository;
    private $settingRepository;
    private $socialRepository;

    public function __construct(PostRepository $postRepository,
                                PostCategoryRepository $postCategoryRepository,
                                SettingRepository $settingRepository,
                                SocialRepository $socialRepository)
    {
        $this->postRepository = $postRepository;
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
        $post_view = $this->postRepository->isRegisterIpForPostView($post_id);
        if ($post_view != true) {
            $this->postRepository->storePostView($post_id);
        }
        $post = $this->postRepository->findById($post_id);
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.blog.post.index',
            compact('post', 'setting', 'social'));
    }

    public function like($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post_like = $this->postRepository->isRegisterIpForPostLike($id);
                if ($post_like != true) {
                    $this->postRepository->storePostLike($id);
                } else {
                    $this->postRepository->destroyPostLike($id);
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
                $post_like = $this->postRepository->isRegisterIpForPostLike($id);
                if ($post_like != false) {
                    $this->postRepository->destroyPostLike($id);
                }
            });
            DB::commit();
            return AjaxResponses::DisLikeSuccessResponse();
        } catch (Exception $exception) {
            DB::rollBack();
            return AjaxResponses::FailedResponse();
        }
    }

    public function comment($id)
    {
        dd($id);
    }

    public function extractId($slug)
    {
        return Str::before($slug, '-');
    }
}
