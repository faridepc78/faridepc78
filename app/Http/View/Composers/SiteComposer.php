<?php


namespace App\Http\View\Composers;


use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use Illuminate\View\View;

class SiteComposer
{
    protected $socialRepository;
    protected $settingRepository;

    public function __construct(SocialRepository $socialRepository, SettingRepository $settingRepository)
    {
        $this->socialRepository = $socialRepository;
        $this->settingRepository = $settingRepository;
    }

    public function compose(View $view)
    {
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();

        $view->with([
            'social' => $social,
            'setting' => $setting
        ]);
    }
}
