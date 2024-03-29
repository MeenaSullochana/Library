<?php

namespace App\Http\Controllers\Memberauth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    //     $this->middleware('guest:subadmin')->except('logout');
    // }

    public function showMemberLoginForm()
    {
        return view('Memberauth.login');
    }



    public function usercheck($user,$redirect_route,$guard){
       
            if($user->status == 1){
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
             return redirect($redirect_route)->with('success',"Logged in successfully");
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
             \Auth::guard($guard)->logout();
             return back()->withInput()->with('error',"Your account was inactive");
            }
    }
    
    public function memberLogin(Request $request)
    {
        if(isset($request->usertype)){
               $validator=Validator::make($request->all(),[
                    "email"=>"required",
                    "password"=>"required|min:8",
                    "usertype"=>"required"
                   ],[
                    'user_name.required'=> 'The user name is required.',
                    'password.required'=> 'The password is required.',
                    'password.min'=> 'The password must be at least 8 characters.',
                    'type.required'=> 'User type is required.',
                   ]);
                   if($validator->fails()){
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->back();
                   }

         $u=Validator::make($request->all(),[
            "email"=>"email",
           ]);
           if($u->fails())
            {
                if($request->usertype == "librarian"){
                    $user = "librarianId";
                }else if($request->usertype == "reviewer"){
                    $user = "reviewerId";
                }
              
            }
             else{
              $user = "email";
             }

           $credentials = [$user => $request->email, 'password' => $request->password];
         
        } else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error','Please select user type');
            return redirect()->back();
        }
            if($request->usertype == "reviewer"){
                if (\Auth::guard('reviewer')->attempt($credentials)){
                        $login_user = auth('reviewer')->user();
                        $redirect_route = '/reviewer/index';
                        $guard = 'reviewer';
                        return $this->usercheck($login_user,$redirect_route,$guard);
                    }
                return back()->withInput($request->only('email', 'remember'))->with('error',"Invalid Credentials");
            }
           else if($request->usertype == "librarian"){
            if (\Auth::guard('librarian')->attempt($credentials)){
                $login_user = auth('librarian')->user();
                $redirect_route = '/librarian/index';
                $guard = 'librarian';
                return $this->usercheck($login_user,$redirect_route,$guard);  
                }
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                return back()->withInput($request->only('email', 'remember'))->with('error',"Invalid Credentials");
            }
        }
       
       
      

      
    

    //  /**
    //  * Log the user out of the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    //  */
    public function logout()
    {

        if((\Auth::guard('reviewer')->check())){
            \Auth::guard('reviewer')->logout();
        }
       else if((\Auth::guard('librarian')->check())){
            \Auth::guard('librarian')->logout();
        }
      

        return view('Memberauth.login');
    //   return redirect()->route('Reviewer.login');
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
