<?php

namespace App\Http\Controllers\Memberauth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subadmin;
use App\Models\Admin;
use App\Models\Otp;
use App\Models\Publisher;
use App\Models\Librarian;
use App\Models\Reviewer;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ForgotPasswordNotification;
use App\Notifications\UserNotification;
use App\Notifications\UserCreatedNotification;
use Illuminate\Support\Str;
use DateTime;
use Carbon\Carbon;
use App\Models\Mailurl;


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


    public function forgotform($email,$type){
        $obj = (Object)[
            "email"=>$email,
            "type"=>$type,
        ];
        // $data=$obj;
        // return view('Memberauth.memberforgotform')->with('data',$data);

      return redirect('/member/forget-password')->with('obj',$obj); 
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
            if($req->usertype == "reviewer"){
           if($req->newpassword == $req->conformpassword ){
            $reviewer = Reviewer::where('email', '=',$req->email)->first();
             $reviewer->password =Hash::make($req->newpassword);
             if($reviewer->save()){
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
                $pubdist = Librarian::where('email', '=',$req->email)->first();
                 $pubdist->password =Hash::make($req->newpassword);
                 if($pubdist->save()){
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
      
       public function memberforgotpassword(Request $request){
        if($request->email !== null){
        
        if($request->usertype !== null){
         
            if($request->usertype == "reviewer"){
                $record2=Reviewer::where('email', '=', $request->email)->first();
                // if($record2 !=null){
                //     $record=reviewer::where('email', '=', $request->email)->first();
                if($record2 !=null){
                    $record1=reviewer::where('email', '=', $request->email)->where('status', '=', '1')->first();
                    $user = $request->email;
                    $rev =Mailurl::first();
                    $url = $rev->name ."/member/forgot/$user/$request->usertype";
        
                        if($record1 !== null){
                          
                                Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                        
                            $data= [
                                'success' => 'Mail Sent Successfully',
                                     ];
                            return response()->json($data);
                        }else{
                            $data= [
                                'error' => 'You Account Was Not Active',
                            ];
                            return response()->json($data);
                        }
            
            }else{
                $data= [
                    'error' => 'No User Found',
                ];
                return response()->json($data);
            }
               
            }else{
                $record2=Librarian::where('email', '=', $request->email)->first();
                // if($record2 !=null){
                //     $record=PublisherDistributor::where('email', '=', $request->email)->where('approved_status', '=', 'approve')->first();
                if($record2 !=null){
                    $record1=Librarian::where('email', '=', $request->email)->where('status', '=', '1')->first();
                    $user = $request->email;
                    $rev =Mailurl::first();
                    $url = $rev->name ."/member/forgot/$user/$request->usertype";
        
                        if($record1 !== null){
                          
                                Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                        
                            $data= [
                                'success' => 'Mail Sent Successfully',
                                     ];
                            return response()->json($data);
                        }else{
                            $data= [
                                'error' => 'You Account Was Not Active',
                            ];
                            return response()->json($data);
                        }
                // }else{
                //     $data= [
                //         'error' => 'You Account Was Not Approve',
                //     ];
                //     return response()->json($data);
                // }
            }else{
                $data= [
                    'error' => 'No User Found',
                ];
                return response()->json($data);
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

       

    }
    
    

