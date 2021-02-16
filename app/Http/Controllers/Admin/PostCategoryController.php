<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCategory\UpdatePortfolioCategoryRequest;
use App\Http\Requests\PostCategory\CreatePostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class PostCategoryController extends Controller
{
    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function index()
    {
        $postCategory = $this->postCategoryRepository->paginate();
        return view('admin.post_category.index', compact('postCategory'));
    }

    public function create()
    {
        return view('admin.post_category.create');
    }

    public function store(CreatePostCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->postCategoryRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $postCategory = $this->postCategoryRepository->findById($id);
        return view('admin.post_category.edit', compact('postCategory'));
    }

    public function update(UpdatePortfolioCategoryRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $postCategory = $this->postCategoryRepository->findById($id);
                if ($request->hasFile('image')) {
                    $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                    if ($postCategory->image) {
                        $postCategory->image->delete();
                    }
                } else {
                    $request->request->add(['image_id' => $postCategory->image_id]);
                }
                $this->postCategoryRepository->update($request, $id);
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
                $postCategory = $this->postCategoryRepository->findById($id);
                if ($postCategory->image) {
                    $postCategory->image->delete();
                }
                $postCategory->delete();
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
