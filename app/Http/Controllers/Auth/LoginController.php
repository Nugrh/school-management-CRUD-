<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        /**
         * Login to the application
         *
         * @return redirect
         */
        if (Auth::guard('user')->attempt(['username' => $input['username'], 'password' => $input['password']])){
            return redirect()->route('home');
        } elseif (Auth::guard('student')->attempt(['username' => $input['username'], 'password' => $input['password']])){
            return redirect()->route('home');
        } elseif (Auth::guard('teacher')->attempt(['username' => $input['username'], 'password' => $input['password']])){
            return redirect()->route('home');
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('student')->check()){
            Auth::guard('student')->logout();
        } elseif (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        } elseif (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        }
        return redirect('/');

    }

}
