<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;
use Exception;

class DashboardController extends Controller
{
    private $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $countExpertise = $this->dashboardRepository->countExpertise();
        $countPortfolio = $this->dashboardRepository->countPortfolio();
        $countPost = $this->dashboardRepository->countPost();
        $countResume = $this->dashboardRepository->countResume();
        return view('admin.dashboard.index',
            compact('countExpertise', 'countPortfolio', 'countPost', 'countResume'));
    }
}
