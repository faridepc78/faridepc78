<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;

class PageController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function terms()
    {
        $setting = $this->settingRepository->firstOrFail();
        return view('site.terms.index', compact('setting'));
    }

    public function about()
    {

    }
}
