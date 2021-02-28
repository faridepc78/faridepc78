<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function storeContact($values)
    {
        return Contact::query()->create([
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_mobile' => $values->user_mobile,
            'user_ip' => request()->ip(),
            'know' => $values->know,
            'text' => $values->text,
            'status' => Contact::PENDING_STATUS
        ]);
    }

    public function paginate()
    {
        return Contact::query()->latest()->paginate(10);
    }

    public function pending()
    {
        return Contact::query()->where('status', '=', Contact::PENDING_STATUS)->latest()->paginate(10);
    }

    public function read()
    {
        return Contact::query()->where('status', '=', Contact::READ_STATUS)->latest()->paginate(10);
    }

    public function unread()
    {
        return Contact::query()->where('status', '=', Contact::UNREAD_STATUS)->latest()->paginate(10);
    }

    public function show($id)
    {
        return Contact::query()->findOrFail($id);
    }

    //todo check this function
    /*public function updateContactStatus($id)
    {
        $contact = $this->showContact($id);
        $contact->status == Contact::READ_STATUS ? $status = Contact::UNREAD_STATUS : $status = Contact::READ_STATUS;
        return Contact::query()->where('id', '=', $id)->update(['status' => $status]);
    }*/
}
