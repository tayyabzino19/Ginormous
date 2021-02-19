<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm(){
        return view('auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->status != 'active') {
            Auth::logout();
            return redirect(route('login'))->withInput()->with('error', "Your account has been disabled, Please request to administrator to enable your account.");
        }

        $user = Auth::user();
        $user->last_logged_in = now();
        $user->save();

    }

    protected function loggedOut(Request $request)
    {
      return redirect(route('login'));
    }

    public function redirectTo() {
        $role = Auth::user()->type;
        switch ($role) {
          case 'admin':
            return '/admin';
            break;
          case 'bidder':
            return '/bidder';
            break;
        }
    }
}
