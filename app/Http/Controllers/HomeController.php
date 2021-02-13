<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use App\Models\Portfolio;
use App\Repositories\ExpertiseRepository;
use App\Repositories\PortfolioExpertiseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


}
