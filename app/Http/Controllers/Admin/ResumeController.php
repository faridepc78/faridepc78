<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resume\CreateResumeRequest;
use App\Http\Requests\Admin\Resume\UpdateResumeRequest;
use App\Repositories\ResumeRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    private $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    public function index()
    {
        $resume = $this->resumeRepository->paginate();
        return view('admin.resume.index',compact('resume'));
    }

    public function create()
    {
        return view('admin.resume.create');
    }

    public function store(CreateResumeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->resumeRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            dd($exception);
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $resume = $this->resumeRepository->findById($id);
        return view('admin.resume.edit', compact('resume'));
    }

    public function update(UpdateResumeRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $this->resumeRepository->update($request, $id);
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
                $resume = $this->resumeRepository->findById($id);
                $resume->delete();
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
