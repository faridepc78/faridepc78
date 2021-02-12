<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\CreatePortfolioSliderRequest;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use App\Services\Media\MediaFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioSliderController extends Controller
{
    private $portfolioRepository;
    private $portfolioCategoryRepository;
    private $portfolioSliderRepository;

    public function __construct(PortfolioRepository $portfolioRepository,
                                PortfolioCategoryRepository $portfolioCategoryRepository,
                                PortfolioSliderRepository $portfolioSliderRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
        $this->portfolioSliderRepository = $portfolioSliderRepository;
    }

    public function index($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $portfolioCategory = $this->portfolioCategoryRepository->paginate();
        return view('admin.portfolio.slider.management', compact('portfolio', 'portfolioCategory'));
    }

    public function store(CreatePortfolioSliderRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->portfolioRepository->store_slider($request);
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

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $portfolioSlider = $this->portfolioSliderRepository->findById($id);
                if ($portfolioSlider->image) {
                    $portfolioSlider->image->delete();
                }
                $portfolioSlider->delete();
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
