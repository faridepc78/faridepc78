<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Payment\CreatePaymentRequest;
use App\Repositories\PaymentRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialRepository;
use Exception;
use Illuminate\Http\Request;
use Zarinpal\Zarinpal;


class PaymentController extends Controller
{
    private $socialRepository;
    private $settingRepository;
    private $paymentRepository;

    public function __construct(SocialRepository $socialRepository,
                                SettingRepository $settingRepository,
                                PaymentRepository $paymentRepository)
    {
        $this->socialRepository = $socialRepository;
        $this->settingRepository = $settingRepository;
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        return view('site.payment.index', compact('social', 'setting'));
    }

    public function request(CreatePaymentRequest $request, Zarinpal $zarinpal): \Illuminate\Http\RedirectResponse
    {
        $payment = [
            'callback_url' => route('payment.verify'),
            'amount' => $request->price,
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
            return back();
        }
    }

    public function verify(Request $request, Zarinpal $zarinpal)
    {
        $authority = $request->input('Authority');

        $data = $this->paymentRepository->getPaymentByAuthority($authority);

        $payment = [
            'authority' => $request->input('Authority'),
            'amount' => $data->price
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
        $social = $this->socialRepository->all();
        $setting = $this->settingRepository->first();
        return view('site.payment.result', compact('data', 'social', 'setting'));
    }
}
