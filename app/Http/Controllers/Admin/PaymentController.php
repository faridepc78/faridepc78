<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;
use Exception;

class PaymentController extends Controller
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->middleware('auth:web');
    }

    public function index()
    {
        $payment = $this->paymentRepository->all();
        return view('admin.payment.index', compact('payment'));
    }

    public function pending()
    {
        $payment = $this->paymentRepository->pending();
        return view('admin.payment.index', compact('payment'));
    }

    public function success()
    {
        $payment = $this->paymentRepository->success();
        return view('admin.payment.index', compact('payment'));
    }

    public function fail()
    {
        $payment = $this->paymentRepository->fail();
        return view('admin.payment.index', compact('payment'));
    }

    public function show($id)
    {
        $payment = $this->paymentRepository->show($id);
        return view('admin.payment.show', compact('payment'));
    }

    public function destroy($id)
    {
        try {
            $payment = $this->paymentRepository->show($id);
            $payment->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('payment.index');
    }
}
