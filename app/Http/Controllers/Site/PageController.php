<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ResumeRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;

class PageController extends Controller
{
    private $settingRepository;
    private $socialRepository;
    private $resumeRepository;

    public function __construct(SettingRepository $settingRepository,
                                SocialRepository $socialRepository,
                                ResumeRepository $resumeRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->socialRepository = $socialRepository;
        $this->resumeRepository = $resumeRepository;
    }

    public function terms()
    {
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.terms.index', compact('setting', 'social'));
    }

    public function about()
    {
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        $resume = $this->resumeRepository->all();
        return view('site.about.index', compact('setting', 'social', 'resume'));
    }
}
