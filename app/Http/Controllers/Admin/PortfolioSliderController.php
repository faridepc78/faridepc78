<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioSlider\CreatePortfolioSliderRequest;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioSliderController extends Controller
{
    private $portfolioRepository;
    private $portfolioSliderRepository;

    public function __construct(PortfolioRepository $portfolioRepository, PortfolioSliderRepository $portfolioSliderRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioSliderRepository = $portfolioSliderRepository;
        $this->middleware('auth:web');
    }

    public function index($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        return view('admin.portfolio.slider.management', compact('portfolio'));
    }

    public function store(CreatePortfolioSliderRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->portfolioSliderRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('portfolio.slider.index', request()->id);
    }

    public function destroy($portfolio_id, $id)
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
        return redirect()->route('portfolio.slider.index', $portfolio_id);
    }
}
