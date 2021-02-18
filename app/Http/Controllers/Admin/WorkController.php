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

    public function store(CreateWorkRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->workRepository->store($request);
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
        $work = $this->workRepository->findById($id);
        return view('admin.work.edit', compact('work'));
    }

    public function update(UpdateWorkRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $work = $this->workRepository->findById($id);
                if ($request->hasFile('image')) {
                    $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                    if ($work->image) {
                        $work->image->delete();
                    }
                } else {
                    $request->request->add(['image_id' => $work->image_id]);
                }
                $this->workRepository->update($request, $id);
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
        return back();
    }
}
