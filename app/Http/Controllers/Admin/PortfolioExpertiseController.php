<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioExpertise\CreatePortfolioExpertiseRequest;
use App\Repositories\ExpertiseRepository;
use App\Repositories\PortfolioExpertiseRepository;
use App\Repositories\PortfolioRepository;
use Exception;

class PortfolioExpertiseController extends Controller
{
    private $portfolioRepository;
    private $portfolioExpertiseRepository;
    private $expertiseRepository;

    public function __construct(PortfolioRepository $portfolioRepository, PortfolioExpertiseRepository $portfolioExpertiseRepository, ExpertiseRepository $expertiseRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioExpertiseRepository = $portfolioExpertiseRepository;
        $this->expertiseRepository = $expertiseRepository;
    }

    public function index($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $expertise = $this->expertiseRepository->all();
        $portfolioExpertise = $this->portfolioExpertiseRepository->all();
        return view('admin.portfolio.expertise.management', compact('portfolio', 'expertise', 'portfolioExpertise'));
    }

    public function store(CreatePortfolioExpertiseRequest $request)
    {
        try {
            $portfolio_id = $request->input('portfolio_id');
            $values = $request->input('expertise_id');
            $this->portfolioExpertiseRepository->store($portfolio_id, $values);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            $portfolioExpertise = $this->portfolioExpertiseRepository->findById($id);
            $portfolioExpertise->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
