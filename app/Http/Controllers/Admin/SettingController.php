<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $setting = $this->settingRepository->first();
        return view('admin.setting.index', compact('setting'));
    }

    public function create()
    {
        $setting = $this->settingRepository->first();
        if (!empty($setting)) return redirect()->route('setting.edit', $setting->id);
        return view('admin.setting.create');
    }

    public function store(CreateSettingRequest $request): \Illuminate\Http\RedirectResponse
    {
        $setting = $this->settingRepository->first();
        if (!empty($setting)) return redirect()->route('setting.edit', $setting->id);
        try {
            DB::transaction(function () use ($request) {
                $setting = $this->settingRepository->store($request);
                if ($request->hasFile('image')) {
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->settingRepository->addImage($image_id, $setting->id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('setting.create');
    }

    public function edit($id)
    {
        $setting = $this->settingRepository->findById($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $setting = $this->settingRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->settingRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->settingRepository->addImage($image_id, $setting->id);
                    if ($setting->image) {
                        $setting->image->delete();
                    }
                } else {
                    $this->settingRepository->update($request, $setting->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('setting.edit', $id);
    }
}
