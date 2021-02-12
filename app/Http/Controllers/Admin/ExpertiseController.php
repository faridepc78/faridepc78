<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expertise\CreateExpertiseRequest;
use App\Http\Requests\Expertise\UpdateExpertiseRequest;
use App\Repositories\ExpertiseRepository;
use App\Services\Media\MediaFileService;
use Exception;

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

    public function store(CreateExpertiseRequest $request)
    {
        try {
            $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
            $this->expertiseRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $expertise = $this->expertiseRepository->findById($id);
        return view('admin.expertise.edit', compact('expertise'));
    }

    public function update(UpdateExpertiseRequest $request, $id)
    {
        try {
            $expertise = $this->expertiseRepository->findById($id);
            if ($request->hasFile('image')) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                if ($expertise->image) {
                    $expertise->image->delete();
                }
            } else {
                $request->request->add(['image_id' => $expertise->image_id]);
            }
            $this->expertiseRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            $expertise = $this->expertiseRepository->findById($id);
            if ($expertise->image) {
                $expertise->image->delete();
            }
            $expertise->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
