<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Payment\CreatePaymentRequest;
use App\Repositories\PaymentRepository;
use Exception;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use SoapFault;


class PaymentController extends Controller
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        return view('site.payment.index');
    }

    public function request(CreatePaymentRequest $request)
    {
        try {
            $invoice = new Invoice();

            config()->set('payment.drivers.zarinpal.description', $request->title);

            $invoice->amount(intval($request->price));
            $payment_id = randomNumbers(10);

            $payment = Payment::callbackUrl(route('payment.verify'));

            $payment->purchase($invoice, function ($driver, $transactionId) use ($request, $payment_id) {
                $this->paymentRepository->store($request, $transactionId, $payment_id);
            });

            return $payment->pay()->render();
        } catch (Exception | PurchaseFailedException | SoapFault $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
            return redirect()->back();
        }
    }

    public function verify(Request $request)
    {
        if ($request->missing('Authority')) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
            return redirect()->route('index');
        }

        $transaction = $this->paymentRepository->getPaymentByAuthority($request->Authority);
        if (empty($transaction)) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
            return redirect(route('payment.result', $transaction->order_number));
        }

        if ($transaction->status <> \App\Models\Payment::PENDING_STATUS) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
            return redirect(route('payment.result', $transaction->order_number));
        }

        try {
            if ($request->Status !== 'OK') {
                $this->paymentRepository->updateStatus($request->Authority, \App\Models\Payment::INACTIVE_STATUS);
                newFeedback('پیام', 'پرداخت توسط شما کنسل شد', 'info');
                return redirect(route('payment.result', $transaction->order_number));
            }

            Payment::amount($transaction->price)
                ->transactionId($transaction->ref_number)
                ->verify();

            $transaction->status = \App\Models\Payment::ACTIVE_STATUS;
            $transaction->save();
            $this->paymentRepository->updateStatus($request->Authority, \App\Models\Payment::ACTIVE_STATUS);

            return redirect(route('payment.result', $transaction->order_number));

        } catch (Exception | InvalidPaymentException $e) {
            $transaction->status = \App\Models\Payment::INACTIVE_STATUS;
            $transaction->save();
            return redirect(route('payment.result', $transaction->order_number));
        }
    }

    public function result($order_number)
    {
        $data = $this->paymentRepository->getPaymentOrderNumber($order_number);
        return view('site.payment.result', compact('data'));
    }
}
