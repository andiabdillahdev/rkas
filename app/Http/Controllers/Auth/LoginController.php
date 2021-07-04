<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

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
        $this->middleware('guest:administrator')->except('logout');
        $this->middleware('guest:bendahara')->except('logout');
        $this->middleware('guest:kepsek')->except('logout');
    }

    public function logins(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $credential = [
			'email' => request('email'),
			'password' => request('password'),
        ];
        
        if(Auth::guard('administrator')->attempt($credential)) {
            $data = Auth::guard('administrator')->user();
            return redirect()->intended(route('home'));
		} else if(Auth::guard('bendahara')->attempt($credential)) {
			$data = Auth::guard('bendahara')->user();
            return redirect()->intended(route('bendahara.home'));
		}else if(Auth::guard('kepsek')->attempt($credential)) {
			$data = Auth::guard('kepsek')->user();
            return redirect()->intended(route('kepsek.home'));
		}

        return redirect()->back()->withInput($request->only('email','password'))->with('errors','Username atau Password Tidak Sesuai');
    }

}
