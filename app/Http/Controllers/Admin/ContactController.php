<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Exception;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->middleware('auth:web');
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
        return redirect()->route('contact.index');
    }

    public function read_status($id)
    {
        try {
            $contact = $this->contactRepository->show($id);
            if ($contact->status == Contact::READ_STATUS) return false;
            $this->contactRepository->updateContactStatus($contact->id, true, false);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact.index');
    }

    public function unread_status($id)
    {
        try {
            $contact = $this->contactRepository->show($id);
            if ($contact->status == Contact::UNREAD_STATUS) return false;
            $this->contactRepository->updateContactStatus($contact->id, false, true);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact.index');
    }
}
