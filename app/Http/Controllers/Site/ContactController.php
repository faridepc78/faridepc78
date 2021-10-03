<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Contact\CreateContactRequest;
use App\Repositories\ContactInfoRepository;
use App\Repositories\ContactRepository;
use App\Responses\AjaxResponses;
use Exception;

class ContactController extends Controller
{
    private $contactInfoRepository;
    private $contactRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository,
                                ContactRepository     $contactRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contactInfo = $this->contactInfoRepository->all();
        return view('site.contact.index', compact('contactInfo'));
    }

    public function store(CreateContactRequest $request)
    {
        try {
            $this->contactRepository->storeContact($request);
            return AjaxResponses::SuccessResponse();
        } catch (Exception $exception) {
            return AjaxResponses::FailedResponse();
        }
    }
}
