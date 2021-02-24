<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\CreatePortfolioRequest;
use App\Http\Requests\Admin\Portfolio\UpdatePortfolioRequest;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PortfolioSliderRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

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
                $portfolio = $this->portfolioRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                $this->portfolioRepository->addImage($image_id, $portfolio->id);
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
                    $this->portfolioRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'))->id;
                    $this->portfolioRepository->addImage($image_id, $portfolio->id);
                    if ($portfolio->image) {
                        $portfolio->image->delete();
                    }
                } else {
                    $this->portfolioRepository->update($request, $portfolio->image_id, $id);
                }
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

                if (count($portfolio->slider)) {
                    foreach ($portfolio->slider as $value) {
                        if ($value->image)
                            $value->image->delete();
                    }
                }

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
