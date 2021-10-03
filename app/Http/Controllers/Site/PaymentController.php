<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Payment\CreatePaymentRequest;
use App\Repositories\PaymentRepository;
use Exception;
use Illuminate\Http\Request;
use Zarinpal\Zarinpal;


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

    public function request(CreatePaymentRequest $request, Zarinpal $zarinpal)
    {
        $payment = [
            'callback_url' => route('payment.verify'),
            'amount' => $request->price . '0',
            'description' => $request->title,
            'email' => $request->user_email,
            'mobile' => $request->user_mobile
        ];

        try {
            $response = $zarinpal->request($payment);
            $code = $response['data']['code'];
            if ($code === 100) {
                $authority = $response['data']['authority'];
                $this->paymentRepository->store($request, $authority);
                return $zarinpal->redirect($authority);
            }

        } catch (Exception $exception) {
            newFeedback('شکست', 'عملیات با شکست مواجه شد', 'error');
            return redirect()->route('payment');
        }
    }

    public function verify(Request $request, Zarinpal $zarinpal)
    {
        $authority = $request->input('Authority');

        $data = $this->paymentRepository->getPaymentByAuthority($authority);

        $payment = [
            'authority' => $request->input('Authority'),
            'amount' => $data->price . '0'
        ];

        if ($request->input('Status') !== 'OK') {
            $this->paymentRepository->updateInactive($authority);
            newFeedback('پیام', 'پرداخت توسط شما کنسل شد', 'info');
            return redirect(route('payment.result', $data->order_number));
        }

        try {
            $response = $zarinpal->verify($payment);
            $code = $response['data']['code'];

            if ($code === 100) {
                $refId = $response['data']['ref_id'];
                $this->paymentRepository->updateActive($authority, $refId);
                return redirect(route('payment.result', $data->order_number));
            }

        } catch (Exception $exception) {
            return redirect(route('payment.result', $data->order_number));
        }
    }

    public function result($order_number)
    {
        $data = $this->paymentRepository->getPaymentByOrderNumber($order_number);
        return view('site.payment.result', compact('data'));
    }
}
