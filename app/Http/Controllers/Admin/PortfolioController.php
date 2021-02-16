<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\CreatePortfolioRequest;
use App\Http\Requests\Portfolio\CreatePortfolioSliderRequest;
use App\Http\Requests\Portfolio\UpdatePortfolioRequest;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use App\Services\Media\ImageFileService;
use App\Services\Media\MediaFileService;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    private $portfolioRepository;
    private $portfolioCategoryRepository;

    public function __construct(PortfolioRepository $portfolioRepository, PortfolioCategoryRepository $portfolioCategoryRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
    }

    public function index()
    {
        $portfolio = $this->portfolioRepository->paginate();
        return view('admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        return view('admin.portfolio.create', compact('portfolioCategory'));
    }

    public function store(CreatePortfolioRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                $this->portfolioRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function show($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = $this->portfolioRepository->findById($id);
        $portfolioCategory = $this->portfolioCategoryRepository->all();
        return view('admin.portfolio.edit', compact('portfolio', 'portfolioCategory'));
    }

    public function update(UpdatePortfolioRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $portfolio = $this->portfolioRepository->findById($id);
                if ($request->hasFile('image')) {
                    $request->request->add(['image_id' => MediaFileService::publicUpload($request->file('image'))->id]);
                    if ($portfolio->image) {
                        $portfolio->image->delete();
                    }
                } else {
                    $request->request->add(['image_id' => $portfolio->image_id]);
                }
                $this->portfolioRepository->update($request, $id);
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
                $portfolio = $this->portfolioRepository->findById($id);
                if ($portfolio->image) {
                    $portfolio->image->delete();
                }
                $portfolio->delete();
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
