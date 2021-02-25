<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\ContactInfo;

class ContactInfoRepository
{
    public function store($values)
    {
        return ContactInfo::query()->create([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => null
        ]);
    }

    public function addImage($image_id, $id)
    {
        return ContactInfo::query()->where('id', $id)->update([
            'image_id' => $image_id,
        ]);
    }

    public function paginate()
    {
        return ContactInfo::query()->orderBy('id', 'desc')->paginate(10);
    }

    public function all()
    {
        return ContactInfo::all();
    }

    public function findById($id)
    {
        return ContactInfo::query()->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return ContactInfo::query()->where('id', $id)->update([
            'name' => $values->name,
            'val' => $values->val,
            'link' => $values->link,
            'text' => $values->text,
            'image_id' => $image_id
        ]);
    }

    public function storeContact($values)
    {
        return Contact::query()->create([
            'user_name' => $values->user_name,
            'user_email' => $values->user_email,
            'user_mobile' => $values->user_mobile,
            'user_ip' => request()->ip(),
            'know' => $values->know,
            'text' => $values->text,
            'status' => Contact::UNREAD_STATUS
        ]);
    }

    public function paginateContact()
    {
        return Contact::query()->latest()->paginate();
    }

    public function readContact()
    {
        return Contact::query()->where('status', '=', Contact::READ_STATUS)->latest()->paginate();
    }

    public function unreadContact()
    {
        return Contact::query()->where('status', '=', Contact::UNREAD_STATUS)->latest()->paginate();
    }

    public function showContact($id)
    {
        return Contact::query()->findOrFail($id);
    }

    public function updateContactStatus($id)
    {
        $contact = $this->showContact($id);
        $contact->status == Contact::READ_STATUS ? $status = Contact::UNREAD_STATUS : $status = Contact::READ_STATUS;
        return Contact::query()->where('id', '=', $id)->update(['status' => $status]);
    }
}
