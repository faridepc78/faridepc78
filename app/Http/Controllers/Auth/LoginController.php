<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

    public function showLoginForm()
    {
        return view('admin.login.index');
    }
}
