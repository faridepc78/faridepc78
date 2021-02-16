<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioExpertiseRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    private $portfolioRepository;
    private $portfolioCategoryRepository;
    private $portfolioSliderRepository;
    private $portfolioExpertiseRepository;

    public function __construct(PortfolioRepository $portfolioRepository,
                                PortfolioCategoryRepository $portfolioCategoryRepository,
                                PortfolioSliderRepository $portfolioSliderRepository,
                                PortfolioExpertiseRepository $portfolioExpertiseRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
        $this->portfolioSliderRepository = $portfolioSliderRepository;
        $this->portfolioExpertiseRepository = $portfolioExpertiseRepository;
    }

    public function index()
    {
        $portfolio = $this->portfolioRepository->paginate();
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        return view('site.portfolio.index', compact('portfolio', 'portfolioCategory'));
    }

    public function filter($slug)
    {
        $portfolio_category_id = $this->extractId($slug);
        $portfolio = $this->portfolioRepository->findByCategoryId($portfolio_category_id);
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        return view('site.portfolio.index', compact('portfolio_category_id', 'portfolio', 'portfolioCategory'));
    }

    public function show($slug)
    {
        $portfolio_id = $this->extractId($slug);
        $portfolio = $this->portfolioRepository->findById($portfolio_id);
        $portfolioSlider = $this->portfolioSliderRepository->findByPortfolioId($portfolio_id);
        $portfolioExpertise = $this->portfolioExpertiseRepository->findByPortfolioId();
        return view('site.portfolio.work.index', compact('portfolio', 'portfolioSlider', 'portfolioExpertise'));
    }

    public function extractId($slug)
    {
        return Str::before($slug, '-');
    }
}
