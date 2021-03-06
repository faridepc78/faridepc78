<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\ExpertiseRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PostRepository;
use App\Repositories\WorkRepository;
use Exception;

class IndexController extends Controller
{
    private $expertiseRepository;
    private $workRepository;
    private $portfolioRepository;
    private $postRepository;
    private $customerRepository;

    public function __construct(ExpertiseRepository $expertiseRepository,
                                WorkRepository $workRepository,
                                PortfolioRepository $portfolioRepository,
                                PostRepository $postRepository,
                                CustomerRepository $customerRepository)
    {
        $this->expertiseRepository = $expertiseRepository;
        $this->workRepository = $workRepository;
        $this->portfolioRepository = $portfolioRepository;
        $this->postRepository = $postRepository;
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $expertise = $this->expertiseRepository->get20();
        $work = $this->workRepository->get();
        $portfolio = $this->portfolioRepository->get4();
        $post = $this->postRepository->get3();
        $customer = $this->customerRepository->all();
        return view('site.index.index', compact('expertise', 'work', 'portfolio', 'post', 'customer'));
    }
}
