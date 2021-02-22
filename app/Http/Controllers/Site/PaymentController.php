<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;

class PaymentController extends Controller
{
    private $socialRepository;
    private $settingRepository;

    public function __construct(   SocialRepository $socialRepository,
                                   SettingRepository $settingRepository)
    {
        $this->socialRepository = $socialRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        return view('site.payment.index', compact('social', 'setting'));
    }
}
