<?php

namespace App\Http\Controllers\Periodicalauth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subadmin;
use App\Models\Admin;
use App\Models\Otp;
use App\Models\PeriodicalPublisher;
use App\Models\Reviewer;
use App\Models\PeriodicalDistributor;
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
    public function forgotpassword(Request $request){
        if($request->email !== null){
        if($request->usertype !== null){
            if($request->usertype == "publisher"){
                $record2=PeriodicalPublisher::where('email', '=', $request->email)->first();
                if($record2 !=null){
                    $record=PeriodicalPublisher::where('email', '=', $request->email)->where('approved_status', '=', 'approve')->first();
                if($record !=null){
                    $record1=PeriodicalPublisher::where('email', '=', $request->email)->where('status', '=', '1')->first();
                    $user = $request->email;
                    $rev =Mailurl::first();
                    $url = $rev->name ."/periodical/forgotform/$user/$request->usertype";
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
                        'error' => 'You Account Was Not Approve',
                    ];
                    return response()->json($data);
                }
            }else{
                $data= [
                    'error' => 'No User Found',
                ];
                return response()->json($data);
            }
               
               }elseif($request->usertype == "distributor"){
                $record2=PeriodicalDistributor::where('email', '=', $request->email)->first();
                if($record2 !=null){
                    $record=PeriodicalDistributor::where('email', '=', $request->email)->where('approved_status', '=', 'approve')->first();
                if($record !=null){
                    $record1=PeriodicalDistributor::where('email', '=', $request->email)->where('status', '=', '1')->first();
                    $user = $request->email;
                    $rev =Mailurl::first();
                    $url = $rev->name ."/periodical/forgotform/$user/$request->usertype";
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
                        'error' => 'You Account Was Not Approve',
                    ];
                    return response()->json($data);
                }
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

    public function resetpassword($email,$type){
        $obj = (Object)[
            "email"=>$email,
            "type"=>$type,
        ];
        // return view('Auth.resetpassword');
       return redirect('/periodical/reset-password')->with('obj',$obj); 
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
            if($req->usertype == "publisher"){
           if($req->newpassword == $req->conformpassword ){
            $publisher = PeriodicalPublisher::where('email', '=',$req->email)->first();
             $publisher->password =Hash::make($req->newpassword);
             if($publisher->save()){
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
        } elseif($req->usertype == "distributor"){
          
            if($req->newpassword == $req->conformpassword ){
                $distributor = PeriodicalDistributor::where('email', '=',$req->email)->first();
                 $distributor->password =Hash::make($req->newpassword);
                 if($distributor->save()){
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

    public function otpverification(Request $req){
  
       $otps=Otp::where('userId','=',$req->id)->first();
       $carbonDate = Carbon::parse($otps->dateTime);
       $expirationTime = $carbonDate->addMinutes(5);
    
       if (Carbon::now()->greaterThan($expirationTime)) {
        $data= [
            'error' =>'Your Otp Is Expired Please resend Otp'
                 ];
        return response()->json($data);
       } else {
        
            if($otps->otp == $req->otp){
              
                  if($req->usertype == "publisher"){
                  $record = PeriodicalPublisher::where('id', '=',$req->id)->first();
                  $record->verfication="1";
                  $record->save();
                  Notification::route('mail',  $record->email)->notify(new UserNotification($record, $record->password));
                  $data = [
                    // 'success' => 'Registration waiting for approval. You\'ll receive an email when it\'s approved',
                    'success' => 'Registered Successfully',
                    'type' => 'publisher'
                ];
                
                return response()->json($data);
                
                }
                elseif($req->usertype == "distributor"){
                    $record = PeriodicalDistributor::where('id', '=',$req->id)->first();
                    $record->verfication="1";
                    $record->save();
                    Notification::route('mail',  $record->email)->notify(new UserNotification($record, $record->password));
                    $data = [
                        // 'success' => 'Registration waiting for approval. You\'ll receive an email when it\'s approved',
                        'success' => 'Registered Successfully',
                        'type' => 'distributor'
                    ];
                    
                    return response()->json($data);
                    
                  } 

          }else{
            $data= [
                'error' =>'Otp Is Msmatch Please Enter Valid Otp'
                     ];
            return response()->json($data);
            }
          }
       
       }
       public function resendcode(Request $req){
        if($req->usertype == "publisher"){
            $record = PeriodicalPublisher::where('id', '=',$req->id)->first();
            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $otps=  Otp::where('userId','=',$req->id)->first();
            if($otps){
                $otps->otp=$randomCode;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }else{
                $otps= new Otp();
                $otps->otp=$randomCode;
                $otps->userId= $req->id;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }
       
            Notification::route('mail',  $record->email)->notify(new UserCreatedNotification( $record, $record->email,$randomCode));
            $data= [
                'success' =>'Otp Resend Successfully',
                'type' =>'publisher'
                     ];
            return response()->json($data); 
          }
          elseif($req->usertype == "distributor"){
            $record = PeriodicalDistributor::where('id', '=',$req->id)->first();

            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            $otps=  Otp::where('userId','=',$req->id)->first();
            if($otps){
                $otps->otp=$randomCode;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }else{
                $otps= new Otp();
                $otps->otp=$randomCode;
                $otps->userId= $req->id;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }
            Notification::route('mail',  $record->email)->notify(new UserCreatedNotification( $record, $record->email,$randomCode));
            $data= [
                'success' =>'Otp Resend Successfully',
                'type' =>'distributor'
                     ];
            return response()->json($data); 
            }
          
        
       }
       public function changemail(Request $req){
        
        if($req->usertype == "publisher"){
            $validator = Validator::make($req->all(),[
                'email'=>'required|email|unique:periodical_publishers',
            ]);
            if($validator->fails()){
                $data= [
                    'error' => $validator->errors()->first(),
                         ];
                return response()->json($data);  
               
            }
            $publisher = PeriodicalPublisher::where('id', '=',$req->id)->first();
            $publisher->email=$req->email;
            $publisher->save();
            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCode));
            $otps=  Otp::where('userId','=',$req->id)->first();
            if($otps){
                $otps->otp=$randomCode;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }else{
                $otps= new Otp();
                $otps->otp=$randomCode;
                $otps->userId= $req->id;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }
            $data= [
                'success' =>'Mail Change Successfully PLease Enter Otp',
                'email'=>$publisher->email
                     ];
            return response()->json($data); 

          }
          elseif($req->usertype == "distributor"){
            $validator = Validator::make($req->all(),[
                'email'=>'required|unique:periodical_distributors',
            ]);
            if($validator->fails()){
                $data= [
                    'error' => $validator->errors()->first(),
                         ];
                return response()->json($data);  
               
            }
            $publisher = PeriodicalDistributor::where('id', '=',$req->id)->first();
            $publisher->email=$req->email;
            $publisher->save();
            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCode));
            $otps=  Otp::where('userId','=',$req->id)->first();
            if($otps){
                $otps->otp=$randomCode;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }else{
                $otps= new Otp();
                $otps->otp=$randomCode;
                $otps->userId= $req->id;
                $otps->dateTime= Carbon::now();
                $otps->save();
            }
                $data= [
                    'success' =>'Mail Change Successfully PLease Enter Otp',
                    'email'=>$publisher->email
                         ];
                return response()->json($data); 

            }
          

       }

      
    //    public function memberforgotpassword(Request $request){
    //     if($request->email !== null){
        
    //     if($request->usertype !== null){
         
    //         if($request->usertype == "reviewer"){
    //             $record2=Reviewer::where('email', '=', $request->email)->first();
    //             // if($record2 !=null){
    //             //     $record=reviewer::where('email', '=', $request->email)->first();
    //             if($record2 !=null){
    //                 $record1=reviewer::where('email', '=', $request->email)->where('status', '=', '1')->first();
    //                 $user = $request->email;
    //                 $url = "http://127.0.0.1:8000/forgotform/$user/$request->usertype";
    //                     if($record1 !== null){
                          
    //                             Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                        
    //                         $data= [
    //                             'success' => 'Mail Sent Successfully',
    //                                  ];
    //                         return response()->json($data);
    //                     }else{
    //                         $data= [
    //                             'error' => 'You Account Was Not Active',
    //                         ];
    //                         return response()->json($data);
    //                     }
            
    //         }else{
    //             $data= [
    //                 'error' => 'No User Found',
    //             ];
    //             return response()->json($data);
    //         }
               
    //         }else{
    //             $record2=PublisherDistributor::where('email', '=', $request->email)->first();
    //             if($record2 !=null){
    //                 $record=PublisherDistributor::where('email', '=', $request->email)->where('approved_status', '=', 'approve')->first();
    //             if($record !=null){
    //                 $record1=PublisherDistributor::where('email', '=', $request->email)->where('status', '=', '1')->first();
    //                 $user = $request->email;
    //                 $url = "http://127.0.0.1:8000/forgotform/$user/$request->usertype";
    //                     if($record1 !== null){
                          
    //                             Notification::route('mail',  $request->email)->notify(new ForgotPasswordNotification($user, $url));
                        
    //                         $data= [
    //                             'success' => 'Mail Sent Successfully',
    //                                  ];
    //                         return response()->json($data);
    //                     }else{
    //                         $data= [
    //                             'error' => 'You Account Was Not Active',
    //                         ];
    //                         return response()->json($data);
    //                     }
    //             }else{
    //                 $data= [
    //                     'error' => 'You Account Was Not Approve',
    //                 ];
    //                 return response()->json($data);
    //             }
    //         }else{
    //             $data= [
    //                 'error' => 'No User Found',
    //             ];
    //             return response()->json($data);
    //         }
    //     }
    //     }else{
    //         $data= [
    //             'error' => 'Select your usertype',
    //         ];
    //         return response()->json($data);
    //     }
    // }else{
    //     $data= [
    //         'error' => 'Enter your Email',
    //     ];
    //     return response()->json($data);
    // }
   


    // }

       

    }
    
    
