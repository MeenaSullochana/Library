<?php

namespace App\Http\Controllers\Subadmin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    protected $redirectTo = '/sub_admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:subadmin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('sub_admin.auth.login');
    }

    public function subadminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (\Auth::guard('subadmin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/sub_admin/index');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
