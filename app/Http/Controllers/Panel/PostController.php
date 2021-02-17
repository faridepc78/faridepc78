<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Post\UpdatePostRequest;
use App\Http\Requests\Panel\PostCategory\CreatePostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $postCategoryRepository;
    private $postRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository, PostRepository $postRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $post = $this->postRepository->paginate();
        return view('panel.post.index', compact('post'));
    }

    public function create()
    {
        $postCategory = $this->postCategoryRepository->all();
        return view('panel.post.create', compact('postCategory'));
    }

    public function store(CreatePostCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->postRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function show($id)
    {
        $post = $this->postRepository->findById($id);
        return view('panel.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        $postCategory = $this->postCategoryRepository->all();
        return view('panel.post.edit', compact('post', 'postCategory'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $post = $this->postRepository->findById($id);
                if ($request->hasFile('image')) {
                    $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                    if ($post->image) {
                        $post->image->delete();
                    }
                } else {
                    $request->request->add(['image_id' => $post->image_id]);
                }
                $this->postRepository->update($request, $id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post = $this->postRepository->findById($id);
                if ($post->image) {
                    $post->image->delete();
                }
                $post->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
