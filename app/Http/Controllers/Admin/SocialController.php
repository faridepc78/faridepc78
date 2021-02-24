<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Social\CreateSocialRequest;
use App\Http\Requests\Admin\Social\UpdateSocialRequest;
use App\Repositories\SocialRepository;
use Exception;

class SocialController extends Controller
{
    private $socialRepository;

    public function __construct(SocialRepository $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->paginate();
        return view('admin.social.index', compact('social'));
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(CreateSocialRequest $request)
    {
        try {
            $this->socialRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $social = $this->socialRepository->findById($id);
        return view('admin.social.edit', compact('social'));
    }

    public function update(UpdateSocialRequest $request, $id)
    {
        try {
            $this->socialRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            $social = $this->socialRepository->findById($id);
            $social->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
