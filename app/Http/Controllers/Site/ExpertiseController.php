<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ExpertiseRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    private $expertiseRepository;
    private $socialRepository;
    private $settingRepository;

    public function __construct(ExpertiseRepository $expertiseRepository,
                                SocialRepository $socialRepository,
                                SettingRepository $settingRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
        $this->socialRepository = $socialRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $expertise = $this->expertiseRepository->all();
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        return view('site.expertise.index', compact('expertise', 'social', 'setting'));
    }

    public function show($slug)
    {
        $expertise_id = $this->extractId($slug);
        $expertise = $this->expertiseRepository->findById($expertise_id);
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        return view('site.expertise.post.index', compact('expertise', 'social', 'setting'));
    }

    public function extractId($slug): string
    {
        return Str::before($slug, '-');
    }
}
