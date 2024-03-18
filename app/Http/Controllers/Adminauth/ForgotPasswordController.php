<?php

namespace App\Http\Controllers\Adminauth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subadmin;
use App\Models\Admin;
use App\Models\Mailurl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ForgotPasswordNotification;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    public function forgotpassword(Request $request){
        if($request->email !== null){
        if($request->usertype !== null){
            if($request->usertype == "admin"){
                $record=Admin::where('email', '=', $request->email)->first();
                $user = $request->email;
                $rev =Mailurl::first();
                $url = $rev->name ."/admin/forgot/$user/$request->usertype";
    
             
                    if($record !== null){
                      
                            Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                    
                        $data= [
                            'success' => 'Mail Sent Successfully',
                                 ];
                        return response()->json($data);
                    }else{
                        $data= [
                            'error' => 'No User Found',
                        ];
                        return response()->json($data);
                    }
            }else{
                $record=Subadmin::where('email', '=', $request->email)->first();
                if($record !== null){
                    $user = $request->email;
                    $rev =Mailurl::first();
                    $url = $rev->name ."/admin/forgot/$user/$request->usertype";
                                if($record !== null){
                          
                                Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                    $data= [
                        'success' => 'Mail Sent Successfully',
                             ];
                    return response()->json($data);
                }else{
                    $data= [
                        'error' => 'No User Found',
                    ];
                    return response()->json($data);
                }
            }
        }
        }else{
            $data= [
                'error' => 'Select your usertype',
            ];
            return response()->json($data);
        }
    }else{
        $data= [
            'error' => 'Enter your Email',
        ];
        return response()->json($data);
    }
   


    }

    public function forgotform($email,$type){
        $obj = (Object)[
            "email"=>$email,
            "type"=>$type,
        ];
       
       return redirect('/admin/forget-password')->with('obj',$obj); 
    }
    public function passwordchange(Request $req){
     
            $validator = Validator::make($req->all(),[
                'email'=>'required|string|email',
                'newpassword'=>'required|string|min:8',
                'conformpassword'=>'required|string|min:8',
                'usertype'=>'required|string',
            ]);
          
            if($validator->fails()){
                $data= [
                    'error' => $validator->errors()->first(),
                         ];
                return response()->json($data);
            }
            if($req->usertype == "admin"){
              
           if($req->newpassword == $req->conformpassword ){
            $admin = Admin::where('email', '=',$req->email)->first();
             $admin->password =Hash::make($req->newpassword);
             if($admin->save()){
                $data= [
                    'success' => 'Password Change Successfully'
                         ];
                return response()->json($data);
             }
            
           }else{
            $data= [
                'error' =>'newPassword and confirmPassword is mishmatch'
                     ];
            return response()->json($data);
           
           }
        }else{
          
            if($req->newpassword == $req->conformpassword ){
              
                $subadmin = Subadmin::where('email', '=',$req->email)->first();
                 $subadmin->password =Hash::make($req->newpassword);
                 if($subadmin->save()){
                    $data= [
                        'success' => 'Password Change Successfully'
                             ];
                    return response()->json($data);
                 }
                
               }else{
                $data= [
                    'error' =>'newPassword and confirmPassword is mishmatch'
                         ];
                return response()->json($data);
               
               }

        }
    }
    
}
