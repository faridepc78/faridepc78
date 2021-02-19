<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioExpertiseRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    private $portfolioRepository;
    private $portfolioCategoryRepository;
    private $portfolioSliderRepository;
    private $portfolioExpertiseRepository;
    private $settingRepository;
    private $socialRepository;

    public function __construct(PortfolioRepository $portfolioRepository,
                                PortfolioCategoryRepository $portfolioCategoryRepository,
                                PortfolioSliderRepository $portfolioSliderRepository,
                                PortfolioExpertiseRepository $portfolioExpertiseRepository,
                                SettingRepository $settingRepository,
                                SocialRepository $socialRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
        $this->portfolioSliderRepository = $portfolioSliderRepository;
        $this->portfolioExpertiseRepository = $portfolioExpertiseRepository;
        $this->settingRepository = $settingRepository;
        $this->socialRepository = $socialRepository;
    }

    public function index()
    {
        $portfolio = $this->portfolioRepository->get12();
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.portfolio.index',
            compact('portfolio', 'portfolioCategory', 'setting', 'social'));
    }

    public function filter($slug)
    {
        $portfolio_category_id = $this->extractId($slug);
        $portfolio = $this->portfolioRepository->findByCategoryId($portfolio_category_id);
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.portfolio.index',
            compact('portfolio_category_id', 'portfolio', 'portfolioCategory', 'setting', 'social'));
    }

    public function show($slug)
    {
        $portfolio_id = $this->extractId($slug);
        $portfolio = $this->portfolioRepository->findById($portfolio_id);
        $portfolioSlider = $this->portfolioSliderRepository->findByPortfolioId($portfolio_id);
        $portfolioExpertise = $this->portfolioExpertiseRepository->findByPortfolioId($portfolio_id);
        $setting = $this->settingRepository->first();
        $social = $this->socialRepository->all();
        return view('site.portfolio.work.index',
            compact('portfolio', 'portfolioSlider', 'portfolioExpertise', 'setting', 'social'));
    }

    public function extractId($slug)
    {
        return Str::before($slug, '-');
    }
}
