<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ExpertiseRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $expertiseRepository;

    public function __construct(ExpertiseRepository $expertiseRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
    }

    public function index()
    {
        $expertise = $this->expertiseRepository->get20();
        return view('site.index.index', compact('expertise'));
    }
}
