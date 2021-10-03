<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function store($values, $authority)
    {
        return Payment::query()
            ->create([
                'user_name' => $values['user_name'],
                'user_mobile' => $values['user_mobile'],
                'user_email' => $values['user_email'],
                'user_ip' => request()->ip(),
                'title' => $values['title'],
                'price' => $values['price'],
                'ref_number' => $authority,
                'order_number' => make_token(10),
                'status' => Payment::PENDING_STATUS
            ]);
    }

    public function getPaymentByAuthority($authority)
    {
        return Payment::query()
            ->where('ref_number', '=', $authority)
            ->firstOrFail();
    }

    public function getPaymentByOrderNumber($order_number)
    {
        return Payment::query()
            ->where('order_number', '=', $order_number)
            ->firstOrFail();
    }

    public function updateInactive($authority)
    {
        return Payment::query()
            ->where('ref_number', '=', $authority)
            ->update([
                'status' => Payment::INACTIVE_STATUS
            ]);
    }

    public function updateActive($authority, $refId)
    {
        return Payment::query()
            ->where('ref_number', '=', $authority)
            ->update([
                'status' => Payment::ACTIVE_STATUS,
                'ref_number' => $refId
            ]);
    }

    public function all()
    {
        return Payment::query()
            ->latest()
            ->paginate(10);
    }

    public function pending()
    {
        return Payment::query()
            ->where('status', '=', Payment::PENDING_STATUS)
            ->latest()
            ->paginate(10);
    }

    public function success()
    {
        return Payment::query()
            ->where('status', '=', Payment::ACTIVE_STATUS)
            ->latest()
            ->paginate(10);
    }

    public function fail()
    {
        return Payment::query()
            ->where('status', '=', Payment::INACTIVE_STATUS)
            ->latest()
            ->paginate(10);
    }

    public function show($id)
    {
        return Payment::query()
            ->findOrFail($id);
    }
}
