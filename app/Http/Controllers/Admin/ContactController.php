<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactInfoRepository;
use Exception;

class ContactController extends Controller
{
    private $contactInfoRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
    }

    public function index()
    {
        $contact = $this->contactInfoRepository->paginateContact();
        return view('admin.contact.index', compact('contact'));
    }

    public function read()
    {
        $contact = $this->contactInfoRepository->readContact();
        return view('admin.contact.index', compact('contact'));
    }

    public function unread()
    {
        $contact = $this->contactInfoRepository->unreadContact();
        return view('admin.contact.index', compact('contact'));
    }

    public function show($id)
    {
        $contact = $this->contactInfoRepository->showContact($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        try {
            $contact = $this->contactInfoRepository->showContact($id);
            $contact->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    public function change_status($id)
    {
        try {
            $contact = $this->contactInfoRepository->showContact($id);
            $this->contactInfoRepository->updateContactStatus($contact->id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }
}
