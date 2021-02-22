<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;

use App\Http\Requests\Site\Contact\CreateContactRequest;
use App\Repositories\ContactInfoRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use App\Responses\AjaxResponses;
use Exception;

class ContactController extends Controller
{
    private $contactInfoRepository;
    private $socialRepository;
    private $settingRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository,
                                SocialRepository $socialRepository,
                                SettingRepository $settingRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
        $this->socialRepository = $socialRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        $contactInfo = $this->contactInfoRepository->all();
        return view('site.contact.index', compact('contactInfo', 'social', 'setting'));
    }

    public function store(CreateContactRequest $request)
    {
        try {
            $this->contactInfoRepository->storeContact($request);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }
}
