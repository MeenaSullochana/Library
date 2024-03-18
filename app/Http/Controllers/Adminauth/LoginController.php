<?php

namespace App\Http\Controllers\Adminauth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:subadmin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('Adminauth.login');
    }

    public function adminLogin(Request $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        if(isset($request->usertype)){
            if($request->usertype == "admin"){
           
                $validator=Validator::make($request->all(),[
                    "email"=>"required|email",
                    "password"=>"required|min:6",
                    "usertype"=>"required"
                   ]);
                   if($validator->fails()){
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                   }
                if (\Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
                    return redirect('/admin/index')->with('success',"Logged in successfully");
                    }
                return back()->withInput($request->only('email', 'remember'))->with('error',"Invalid Credentials");
            }
           else if($request->usertype == "subadmin"){
            if (\Auth::guard('subadmin')->attempt($request->only(['email','password']), $request->get('remember'))){
                   return redirect('/sub_admin/index')->with('success',"Logged in successfully");
                }
                return back()->withInput($request->only('email', 'remember'))->with('error',"Invalid Credentials");
            }
        }
        else{
            return back()->withInput($request->only('email', 'remember'))->with('error',"Please select your usertype ");
        }
       
      }

      
    

     /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout()
    {

        if((\Auth::guard('admin')->check())){
            \Auth::guard('admin')->logout();
        }
       else if((\Auth::guard('subadmin')->check())){
            \Auth::guard('subadmin')->logout();
        }
      


      return redirect()->route('admin.login');
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     if ($response = $this->loggedOut($request)) {
    //         return $response;
    //     }

    //     return $request->wantsJson()
    //         ? new JsonResponse([], 204)
    //         : redirect()->route('admin.login');
    }
}
