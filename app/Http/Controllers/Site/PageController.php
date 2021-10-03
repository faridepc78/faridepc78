<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ResumeRepository;

class PageController extends Controller
{
    private $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    public function terms()
    {
        return view('site.terms.index');
    }

    public function about()
    {
        $resume = $this->resumeRepository->all();
        return view('site.about.index', compact('resume'));
    }
}
