<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Repositories\PortfolioRepository;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    private $portfolioRepository;

    public function __construct(PortfolioRepository $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    public function index()
    {
        $portfolio = $this->portfolioRepository->all();
        return view('site.portfolio.index', compact('portfolio'));
    }

    public function show($slug)
    {
        $portfolio_id = $this->extractId($slug);
        $portfolio = $this->portfolioRepository->findById($portfolio_id);
        return view('site.portfolio.work.index', compact('portfolio'));
    }

    public function extractId($slug)
    {
        return Str::before($slug, '-');
    }
}
