<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ExpertiseRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use App\Repositories\WorkRepository;

class IndexController extends Controller
{
    private $expertiseRepository;
    private $workRepository;
    private $settingRepository;
    private $portfolioRepository;
    private $postRepository;
    private $socialRepository;

    public function __construct(ExpertiseRepository $expertiseRepository,
                                WorkRepository $workRepository,
                                SettingRepository $settingRepository,
                                PortfolioRepository $portfolioRepository,
                                PostRepository $postRepository,
                                SocialRepository $socialRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
        $this->workRepository = $workRepository;
        $this->settingRepository = $settingRepository;
        $this->portfolioRepository = $portfolioRepository;
        $this->postRepository = $postRepository;
        $this->socialRepository = $socialRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->all();
        $expertise = $this->expertiseRepository->get20();
        $work = $this->workRepository->get();
        $setting = $this->settingRepository->firstOrFail();
        $portfolio = $this->portfolioRepository->get4();
        $post = $this->postRepository->get3();
        return view('site.index.index', compact('social', 'expertise', 'work', 'setting', 'portfolio', 'post'));
    }
}
