<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\CreateSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;
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
    }

    public function index()
    {
        $setting = $this->settingRepository->firstOrFail();
        return view('admin.setting.index',compact('setting'));
    }

    public function create()
    {
        $setting = $this->settingRepository->firstOrFail();
        if (!empty($setting)) return redirect()->route('setting.edit',$setting->id);
        return view('admin.setting.create');
    }

    public function store(CreateSettingRequest $request)
    {
        $setting = $this->settingRepository->firstOrFail();
        if (!empty($setting)) return redirect()->route('setting.edit',$setting->id);
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->settingRepository->store($request);
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
        $setting = $this->settingRepository->findById($id);
        return view('admin.setting.edit',compact('setting'));
    }

    public function update(UpdateSettingRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $setting = $this->settingRepository->findById($id);
                if ($request->hasFile('image')) {
                    $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                    if ($setting->image) {
                        $setting->image->delete();
                    }
                } else {
                    $request->request->add(['image_id' => $setting->image_id]);
                }
                $this->settingRepository->update($request, $id);
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
