<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resume\CreateResumeRequest;
use App\Http\Requests\Admin\Resume\UpdateResumeRequest;
use App\Repositories\ResumeRepository;
use Exception;

class ResumeController extends Controller
{
    private $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $resume = $this->resumeRepository->paginate();
        return view('admin.resume.index', compact('resume'));
    }

    public function create()
    {
        return view('admin.resume.create');
    }

    public function store(CreateResumeRequest $request)
    {
        try {
            $this->resumeRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('resume.create');
    }

    public function edit($id)
    {
        $resume = $this->resumeRepository->findById($id);
        return view('admin.resume.edit', compact('resume'));
    }

    public function update(UpdateResumeRequest $request, $id)
    {
        try {
            $this->resumeRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('resume.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $resume = $this->resumeRepository->findById($id);
            $resume->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('resume.index');
    }
}
