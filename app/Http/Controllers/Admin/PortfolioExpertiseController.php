<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioExpertise\CreatePortfolioExpertiseRequest;
use App\Repositories\ExpertiseRepository;
use App\Repositories\PortfolioExpertiseRepository;
use App\Repositories\PortfolioRepository;
use Exception;
use Illuminate\Support\Facades\DB;

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
        //dd('ok');
        $portfolio = $this->portfolioRepository->findById($id);
        $expertise = $this->expertiseRepository->all();
        $portfolioExpertise = $this->portfolioExpertiseRepository->allToArray();
        return view('admin.portfolio.expertise.management', compact('portfolio', 'expertise', 'portfolioExpertise'));
    }

    public function store(CreatePortfolioExpertiseRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $portfolio_id = $request->input('portfolio_id');
                $values = $request->input('expertise_id');
                $this->portfolioExpertiseRepository->store($portfolio_id, $values);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $portfolioExpertise = $this->portfolioExpertiseRepository->findById($id);
                $portfolioExpertise->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            //dd($exception);
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
