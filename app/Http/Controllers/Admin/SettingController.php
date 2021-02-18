<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Repositories\SettingRepository;
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
        $setting = $this->settingRepository->first();
        return view('admin.setting.index',compact('setting'));
    }

    public function create()
    {
        $setting = $this->settingRepository->first();
        if (!empty($setting)) return redirect()->route('setting.edit',$setting->id);
        return view('admin.setting.create');
    }

    public function store(CreateSettingRequest $request)
    {
        $setting = $this->settingRepository->first();
        if (!empty($setting)) return redirect()->route('setting.edit',$setting->id);
        try {
            DB::transaction(function () use ($request) {
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
