<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        try {
            if (request()->input('token')) {
                $token = request()->input('token');

                if ($token == env('PANEL_TOKEN')) {
                    return view('admin.login.index');
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } catch (Exception $exception) {
            abort(404);
        }
    }

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ],
            [
                'g-recaptcha-response.required' => 'فیلد ریکپچا الزامی است',
                'g-recaptcha-response.captcha' => 'لطفا فیلد ریکپچا را مجداد پر کنید'
            ]
        );
    }
}
