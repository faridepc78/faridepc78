<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ExpertiseRepository;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    private $expertiseRepository;

    public function __construct(ExpertiseRepository $expertiseRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
    }

    public function index()
    {
        $expertise = $this->expertiseRepository->all();
        return view('site.expertise.index', compact('expertise'));
    }

    public function show($slug)
    {
        $expertise_id = $this->extractId($slug);
        $expertise = $this->expertiseRepository->findById($expertise_id);
        return view('site.expertise.post.index', compact('expertise'));
    }

    public function extractId($slug): string
    {
        return Str::before($slug, '-');
    }
}
