<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function store($values, $ref_number, $order_number)
    {
        return Payment::query()
            ->create([
                'user_name' => $values['user_name'],
                'user_mobile' => $values['user_mobile'],
                'user_email' => $values['user_email'],
                'user_ip' => request()->ip(),
                'title' => $values['title'],
                'price' => $values['price'],
                'ref_number' => $ref_number,
                'order_number' => $order_number,
                'status' => Payment::PENDING_STATUS
            ]);
    }

    public function getPaymentByAuthority($authority)
    {
        return Payment::query()
            ->where('ref_number', '=', $authority)
            ->firstOrFail();
    }

    public function getPaymentOrderNumber($order_number)
    {
        return Payment::query()
            ->where('order_number', '=', $order_number)
            ->firstOrFail();
    }

    public function updateStatus($authority, $status)
    {
        return Payment::query()
            ->where('ref_number', '=', $authority)
            ->update([
                'status' => $status
            ]);
    }

    /*Admin Panel*/

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
