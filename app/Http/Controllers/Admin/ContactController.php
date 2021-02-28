<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactInfoRepository;
use App\Repositories\ContactRepository;
use Exception;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contact = $this->contactRepository->paginate();
        return view('admin.contact.index', compact('contact'));
    }

    public function pending()
    {
        $contact = $this->contactRepository->pending();
        return view('admin.contact.index', compact('contact'));
    }

    public function read()
    {
        $contact = $this->contactRepository->read();
        return view('admin.contact.index', compact('contact'));
    }

    public function unread()
    {
        $contact = $this->contactRepository->unread();
        return view('admin.contact.index', compact('contact'));
    }

    public function show($id)
    {
        $contact = $this->contactRepository->show($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        try {
            $contact = $this->contactRepository->show($id);
            $contact->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }

    //todo check this function
    /*public function change_status($id)
    {
        try {
            $contact = $this->contactRepository->show($id);
            $this->contactRepository->updateContactStatus($contact->id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return back();
    }*/
}
