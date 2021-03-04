<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Work\CreateWorkRequest;
use App\Http\Requests\Admin\Work\UpdateWorkRequest;
use App\Repositories\WorkRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    private $workRepository;

    public function __construct(WorkRepository $workRepository)
    {
        $this->workRepository = $workRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $work = $this->workRepository->get();
        return view('admin.work.index', compact('work'));
    }

    public function create()
    {
        return view('admin.work.create');
    }

    public function store(CreateWorkRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $work = $this->workRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                $this->workRepository->addImage($image_id, $work->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('work.create');
    }

    public function edit($id)
    {
        $work = $this->workRepository->findById($id);
        return view('admin.work.edit', compact('work'));
    }

    public function update(UpdateWorkRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $work = $this->workRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->workRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->workRepository->addImage($image_id, $work->id);
                    if ($work->image) {
                        $work->image->delete();
                    }
                } else {
                    $this->workRepository->update($request, $work->image_id, $id);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('work.edit', $id);
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {
                $work = $this->workRepository->findById($id);
                if ($work->image) {
                    $work->image->delete();
                }
                $work->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('work.index');
    }
}
