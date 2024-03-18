<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\District;
use App\Models\State;
use App\Models\Country;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
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
        $this->middleware('guest:publisher')->except('logout');
        $this->middleware('guest:distributor')->except('logout');
        $this->middleware('guest:publisher_distributor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Auth.login');
    }

    // public function userLogin(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'email'   => 'required|email',
    //     //     'password' => 'required|min:6'
    //     // ]);
    //     if(isset($request->type)){
    //         if($request->type == "publisher"){
           
    //             $validator=Validator::make($request->all(),[
    //                 "user_name"=>"required",
    //                 "password"=>"required|min:8",
    //                 "type"=>"required"
    //                ]);
    //                if($validator->fails()){
    //                 return redirect()->back()->withInput()->withErrors($validator->errors());
    //                }

    //                $u=Validator::make($request->all(),[
    //                 "user_name"=>"email",
    //                ]);
    //                if($u->fails())
    //                 {
    //                     $user = "userName";
    //                 }
    //                  else{
    //                   $user = "email";
    //                  }

    //                $credentials = [$user => $request->user_name, 'password' => $request->password];

    //             if (\Auth::guard('publisher')->attempt($credentials)){
    //                 $pub = auth('publisher')->user();
                   
    //                if($pub->approved_status == "approve"){
    //                    if($pub->status == 1){
    //                     return redirect('/publisher/index')->with('success',"Logged in successfully");
    //                    }else{
    //                     \Auth::guard('publisher')->logout();
    //                     return back()->withInput()->with('error',"Your account was inactive");
    //                    }
    //                }
    //                else if($pub->approved_status == "pending"){
    //                 \Auth::guard('publisher')->logout();
    //                 return back()->withInput()->with('error',"Your account was in pending status !! Please wait for admin approval");
    //                }
    //               else if($pub->approved_status == "reject"){
    //                 \Auth::guard('publisher')->logout();
    //                 return back()->withInput()->with('error',"Your account was rejected");
    //                }
    //                 }
    //             return back()->withInput()->with('error',"Invalid Credentials");
    //         }
    //        else if($request->usertype == "subadmin"){
    //         if (\Auth::guard('subadmin')->attempt($request->only(['email','password']), $request->get('remember'))){
    //                return redirect('/sub_admin/index')->with('success',"Logged in successfully");
    //             }
    //             return back()->withInput()->with('error',"Invalid Credentials");
    //         }
    //     }
    //     else{
    //         return back()->withInput()->with('error',"Please select your usertype ");
    //     }
       
    //   }

    public function usercheck($user,$redirect_route,$guard){
        if($user->approved_status == "approve"){
            if($user->status == 1 && $user->verfication == 1){
             return redirect($redirect_route)->with('success',"Logged in successfully");
            }else if($user->status != 1 && $user->verfication == 1){
             \Auth::guard($guard)->logout();
             return back()->withInput()->with('error',"Your account was inactive");
            }else if($user->status == 1 && $user->verfication != 1){
                \Auth::guard($guard)->logout();
                Session::put('publisher',$user);
                return redirect('/mailconfirmation')->with('error',"Your account was not verified yet..Please verify");
            }
        }
        else if($user->approved_status == "pending"){
         \Auth::guard($guard)->logout();
         return back()->withInput()->with('error',"Your account was in pending status !! Please wait for admin approval");
        }
       else if($user->approved_status == "reject"){
         \Auth::guard($guard)->logout();
         return back()->withInput()->with('error',"Your account was rejected");
        }
    }

    public function userLogin(Request $request)
    {
           if(isset($request->type)){
                $validator=Validator::make($request->all(),[
                    "user_name"=>"required",
                    "password"=>"required|min:8",
                    "type"=>"required"
                   ]);
                   if($validator->fails()){
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                   }

                   $u=Validator::make($request->all(),[
                    "user_name"=>"email",
                   ]);
                   if($u->fails())
                    {
                        $user = "userName";
                    }
                     else{
                      $user = "email";
                     }

                   $credentials = [$user => $request->user_name, 'password' => $request->password];
            }
            else{
                return back()->withInput()->with('error',"Please select your usertype ");
            }
            if($request->type == "publisher"){
                if (\Auth::guard('publisher')->attempt($credentials)){
                    $login_user = auth('publisher')->user();
                    $redirect_route = '/publisher/index';
                    $guard = 'publisher';
                    return $this->usercheck($login_user,$redirect_route,$guard);
                    }
                return back()->withInput()->with('error',"Invalid Credentials");
            }
            if($request->type == "distributor"){
                if (\Auth::guard('distributor')->attempt($credentials)){
                    $login_user = auth('distributor')->user();
                    $redirect_route = '/distributor/index';
                    $guard = 'distributor';
                    return $this->usercheck($login_user,$redirect_route,$guard);
                    }
                return back()->withInput()->with('error',"Invalid Credentials");
            }
            if($request->type == "publisher_distributor"){
                if (\Auth::guard('publisher_distributor')->attempt($credentials)){
                    $login_user = auth('publisher_distributor')->user();
                    $redirect_route = '/publisher_and_distributor/index';
                    $guard = 'publisher_distributor';
                    return $this->usercheck($login_user,$redirect_route,$guard);
                    }
                return back()->withInput()->with('error',"Invalid Credentials");
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
        
        if((\Auth::guard('publisher')->check())){
            \Auth::guard('publisher')->logout();
        }
       else if((\Auth::guard('distributor')->check())){
            \Auth::guard('distributor')->logout();
        }
       else if((\Auth::guard('publisher_distributor')->check())){
            \Auth::guard('publisher_distributor')->logout();
        }


      return redirect()->route('user.login-view');
    //     $this->guard('publisher')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     if ($response = $this->loggedOut($request)) {
    //         return $response;
    //     }

    //     return $request->wantsJson()
    //         ? new JsonResponse([], 204)
    //         : redirect()->route('user.login-view');
    }
}
