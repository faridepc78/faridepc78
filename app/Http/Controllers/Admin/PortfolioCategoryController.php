<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioCategory\CreatePortfolioCategoryRequest;
use App\Http\Requests\Admin\PortfolioCategory\UpdatePortfolioCategoryRequest;
use App\Repositories\PortfolioCategoryRepository;
use Exception;

class PortfolioCategoryController extends Controller
{
    private $portfolioCategoryRepository;

    public function __construct(PortfolioCategoryRepository $portfolioCategoryRepository)
    {
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
    }

    public function index()
    {
        $portfolio_category = $this->portfolioCategoryRepository->paginate();
        return view('admin.portfolio_category.index', compact('portfolio_category'));
    }

    public function create()
    {
        return view('admin.portfolio_category.create');
    }

    public function store(CreatePortfolioCategoryRequest $request)
    {
        try {
            $this->portfolioCategoryRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('portfolio_category.create');
    }

    public function edit($id)
    {
        $portfolio_category = $this->portfolioCategoryRepository->findById($id);
        return view('admin.portfolio_category.edit', compact('portfolio_category'));
    }

    public function update(UpdatePortfolioCategoryRequest $request, $id)
    {
        try {
            $this->portfolioCategoryRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('portfolio_category.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $portfolio_category = $this->portfolioCategoryRepository->findById($id);
            $portfolio_category->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('portfolio_category.index');
    }
}
