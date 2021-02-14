<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\CreateSocialRequest;
use App\Http\Requests\Social\UpdateSocialRequest;
use App\Repositories\SocialRepository;
use Exception;
use Illuminate\Support\Facades\DB;

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
            DB::transaction(function () use ($request) {
                $this->socialRepository->store($request);
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
        //
    }

    public function edit($id)
    {
        $social = $this->socialRepository->findById($id);
        return view('admin.social.edit', compact('social'));
    }

    public function update(UpdateSocialRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $this->socialRepository->update($request, $id);
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
                $social = $this->socialRepository->findById($id);
                $social->delete();
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
