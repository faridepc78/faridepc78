<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioCategory\CreatePortfolioCategoryRequest;
use App\Http\Requests\PortfolioCategory\UpdatePortfolioCategoryRequest;
use App\Repositories\PortfolioCategoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;

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
            DB::transaction(function () use ($request) {
                $this->portfolioCategoryRepository->store($request);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function edit($id)
    {
        $portfolio_category = $this->portfolioCategoryRepository->findById($id);
        return view('admin.portfolio_category.edit', compact('portfolio_category'));
    }

    public function update(UpdatePortfolioCategoryRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $this->portfolioCategoryRepository->update($request, $id);
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
            DB::transaction(function () use ($id){
                $portfolio_category = $this->portfolioCategoryRepository->findById($id);
                $portfolio_category->delete();
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
