<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Expertise\CreateExpertiseRequest;
use App\Http\Requests\Admin\Expertise\UpdateExpertiseRequest;
use App\Repositories\ExpertiseRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ExpertiseController extends Controller
{
    private $expertiseRepository;

    public function __construct(ExpertiseRepository $expertiseRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
    }

    public function index()
    {
        $expertises = $this->expertiseRepository->paginate();
        return view('admin.expertise.index', compact('expertises'));
    }

    public function create()
    {
        return view('admin.expertise.create');
    }

    public function store(CreateExpertiseRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $expertise = $this->expertiseRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                $this->expertiseRepository->addImage($image_id, $expertise->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('expertise.create');
    }

    public function edit($id)
    {
        $expertise = $this->expertiseRepository->findById($id);
        return view('admin.expertise.edit', compact('expertise'));
    }

    public function update(UpdateExpertiseRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $expertise = $this->expertiseRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->expertiseRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->expertiseRepository->addImage($image_id, $expertise->id);
                    if ($expertise->image) {
                        $expertise->image->delete();
                    }
                } else {
                    $this->expertiseRepository->update($request, $expertise->image_id, $id);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('expertise.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $expertise = $this->expertiseRepository->findById($id);
                if ($expertise->image) {
                    $expertise->image->delete();
                }
                $expertise->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('expertise.index');
    }
}
