<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Reviewer;
use App\Models\BookReviewStatus;
use App\Models\Book;
use App\Models\Mailurl;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Notification;
use App\Notifications\MemberdetailNotification;
use App\Notifications\MemberupdateNotification;
class ReviewerController extends Controller
{
        
    public function createreviewer(Request $req){
     
        $validator = Validator::make($req->all(),[
            'reviewerType'=>'required|string',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }

        if($req->reviewerType == "internal"){
            $validator = Validator::make($req->all(),[
                'reviewerType'=>'required|string',
                'libraryType'=>'required',
                'libraryName'=>'required|string',
                'district'=>'required|string',
                'librarianName'=>'required|string',
                'subject'=>'required',
                'phoneNumber'=>'required|string|min:10|max:10',
                'email'=>'required|unique:reviewer',
                'password'=>'required|min:8|max:8',

            ]);
            if($validator->fails()){
                $data= [
                    'error' => $validator->errors()->first(),
                         ];
                return response()->json($data);  
               
            }
            
            if($req->profileImage !="undefined"){

                $Admin=auth('admin')->user()->first();
                $reviewer=new Reviewer();
                $reviewer->reviewerType = $req->reviewerType;
                $reviewer->name = $req->librarianName;
             
                $reviewer->libraryType = $req->libraryType;
                $reviewer->libraryName = $req->libraryName;
                $reviewer->email = $req->email;
                $reviewer->subject = $req->subject;
                $reviewer->district = $req->district;
                $reviewer->phoneNumber = $req->phoneNumber; 
                $reviewer->password=Hash::make($req->password);
                $reviewer->role = "reviewer";
                $reviewer->creater = $Admin; 

                $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
                $reviewer->reviewerId= $randomCode;
                $image = $req->file('profileImage');
                $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
                $image->move('reviewer/ProfileImage', $imagename);
               
                $reviewer->profileImage = $imagename;
            
                 $reviewer->save();
                 $user =  $reviewer->email;
                 $record =  $reviewer;
                 $password = $req->password;
                 $rev =Mailurl::first();
                 $url = $rev->name . "/member/login";
                //  $url = "http://127.0.0.1:8000/member/login";
                 Notification::route('mail',$reviewer->email)->notify(new MemberdetailNotification($user, $url,$record,$password));  
                 $data= [
                    'success' => 'Reviewer Create Successfully',
                         ];
                return response()->json($data);   
            }
               else{
                $data= [
                    'error' => 'ProfileImage Filed Is Required',
                         ];
                return response()->json($data);   
               } 
        }
        else{
            $validator = Validator::make($req->all(),[
                'reviewerType'=>'required|string',
                'name'=>'required|string',
                'subject'=>'required',
                'designation'=>'required|string',
                'organisationDetails'=>'required|string',
                'phoneNumber'=>'required|string|min:10|max:10',
                'bankName'=>'required|string',
                'accountNumber'=>'required',
                'branch'=>'required|string',
                'ifscNumber'=>'required',
                'email'=>'required|unique:reviewer',
                'profileImage'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password'=>'required|min:8|max:8',
            ]);
            if($validator->fails()){
                $data= [
                    'error' => $validator->errors()->first(),
                         ];
                return response()->json($data);  
               
            }
        if($req->profileImage !=null){
            $Admin=auth('admin')->user()->first();
            $reviewer=new Reviewer();
            $reviewer->reviewerType = $req->reviewerType;
            $reviewer->name = $req->name;
            $reviewer->subject = $req->subject;
            $reviewer->designation = $req->designation;
            $reviewer->organisationDetails = $req->organisationDetails;
            $reviewer->email = $req->email;
            $reviewer->phoneNumber = $req->phoneNumber; 
            $reviewer->bankName = $req->bankName;
            $reviewer->accountNumber = $req->accountNumber;
            $reviewer->branch = $req->branch;
            $reviewer->creater = $Admin; 

            $reviewer->ifscNumber = $req->ifscNumber;
            $reviewer->password=Hash::make($req->password);
            $reviewer->role = "reviewer";
            $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
            $reviewer->reviewerId= $randomCode;
            $image = $req->file('profileImage');
            $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
            $image->move('reviewer/ProfileImage', $imagename);
           
            $reviewer->profileImage = $imagename;
        
             $reviewer->save();
             $user =  $reviewer->email;
             $record =  $reviewer;
             $password = $req->password;
             $rev =Mailurl::first();
             $url = $rev->name . "/member/login";
            //  $url = "http://127.0.0.1:8000/member/login";
             Notification::route('mail',$reviewer->email)->notify(new MemberdetailNotification($user, $url,$record,$password));  
             $data= [
                'success' => 'Reviewer Create Successfully',
                     ];
            return response()->json($data);   
        }
           else{
            $data= [
                'error' => 'ProfileImage Filed Is Rdquired',
                     ];
            return response()->json($data);   
           } 
        }
       
      
    
}

public function multiple_reviewerstatus(Request $req){
    if (!empty($req->requestData['reviewerId'])) {
        $reviewers = $req->requestData['reviewerId'];
  
      foreach ($reviewers as $key => $val) {
        $reviewer= Reviewer::find($val);
    $reviewer->status =$req->status;
    $reviewer->save();
      }
      $data = [
        'success' => 'Status Change Successfully',
    ];
    return response()->json($data);
  
  }else{
    $data = [
      'error' => 'Select  reviewer Id',
  ];
  return response()->json($data);
 
   }  

}




public function reviewerstatus(Request $req){
          
    $reviewer= Reviewer::find($req->id);
    $reviewer->status =$req->status;
    $reviewer->save();
    $data= [
        'success' => 'Status Change Sucessfully',
             ];
    return response()->json($data);   
   } 
   public function memberview(Request $req){
    $reviewer= Reviewer::find($req->id);
    $review=BookReviewStatus::where('reviewer_id','=',$req->id)->get();
    $data=[];
    foreach($review as $key=>$val){
        $book= Book::find($val->book_id);
        $val->bookname=$book->book_title;
        $val->subbookname=$book->subtitle;

        
        array_push($data,$val);
    }
    $reviewer->record= $data;
// return $reviewer;
    return redirect('/admin/reviewerdata')->with('reviewer',$reviewer); 

   }
   public function memberedit($id){
    $reviewer= Reviewer::find($id);

    return redirect('/admin/revieweredit')->with('reviewer',$reviewer); 

   }
   public function editreviewer(Request $req){
     
    $validator = Validator::make($req->all(),[
        'reviewerType'=>'required|string',
    ]);
    if($validator->fails()){
        $data= [
            'error' => $validator->errors()->first(),
                 ];
        return response()->json($data);  
       
    }
    if($req->reviewerType == "internal"){
     
        $validator = Validator::make($req->all(),[
            'reviewerType'=>'required|string',
            'libraryType'=>'required',
            'libraryName'=>'required|string',
            'district'=>'required|string',
            'librarianName'=>'required|string',
            'subject'=>'required',
            'phoneNumber'=>'required|string|min:10|max:10',
            'email'=>'required',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
   
        if(empty($req->newpassword) && empty($req->confirmpassword)) {
        
            $Admin=auth('admin')->user()->first();
            $reviewer = Reviewer::find($req->id);
            $reviewer->reviewerType = $req->reviewerType;
            $reviewer->name = $req->librarianName;
         
            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
  
            $reviewer->subject = $req->subject;
            $reviewer->district = $req->district;
            $reviewer->phoneNumber = $req->phoneNumber; 
            if ($reviewer->email == $req->email) {
                $reviewer->email = $req->email;
            } else {
                $existingReviewer = Reviewer::where('email', $req->email)->first();
            
                if ($existingReviewer == null) {
                    $reviewer->email = $req->email;
                } else {
                    $data = [
                        'error' => 'Email is already taken',
                    ];
                    return response()->json($data);
                }
            }
            
           
          
            if($req->profileImage !="undefined"){
                $path = 'reviewer/ProfileImage/'.$reviewer->profileImage;
                if(File::exists($path)){
                 File::delete($path);
                }
                File::delete($path);
                $image = $req->file('profileImage');
                $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
                $image->move('reviewer/ProfileImage', $imagename);
                $reviewer->profileImage = $imagename;
              }
       
             $reviewer->save();
             $user =  $reviewer->email;
             $record =  $reviewer;
             $password = "Your Old Password";
             $rev =Mailurl::first();
             $url = $rev->name . "/member/login";
            //  $url = "http://127.0.0.1:8000/member/login";
             Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
             $data = [
                'success' => 'Reviewer update Successfully',
                'type' => asset("reviewer/ProfileImage/" . $reviewer->profileImage)
            ];
            
            return response()->json($data);

         }elseif(!empty($req->newpassword) && empty($req->confirmpassword) ){
          
            $data= [
            'error' => 'please enter confirmPassword',
                 ];
             return response()->json($data);
       
         }elseif(empty($req->newpassword) && !empty($req->confirmpassword) ){
           
            $data= [
            'error' => 'please enter newpassword ',
                 ];
             return response()->json($data);
         }else{

          if($req->newpassword == $req->confirmpassword){
           
            if (strlen($req->newpassword ) == 8 && strlen($req->confirmpassword) == 8) {
                $Admin=auth('admin')->user()->first();
                $reviewer = Reviewer::find($req->id);
            $reviewer->name = $req->librarianName;
         
            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
  
            $reviewer->subject = $req->subject;
            $reviewer->district = $req->district;
            $reviewer->phoneNumber = $req->phoneNumber; 
                if ($reviewer->email == $req->email) {
                    $reviewer->email = $req->email;
                } else {
                    $existingReviewer = Reviewer::where('email', $req->email)->first();
                
                    if ($existingReviewer == null) {
                        $reviewer->email = $req->email;
                    } else {
                        $data = [
                            'error' => 'Email is already taken',
                        ];
                        return response()->json($data);
                    }
                }
                $reviewer->password=Hash::make($req->newpassword);
                if($req->profileImage !="undefined"){
                    $path = 'reviewer/ProfileImage/'.$reviewer->profileImage;
                    if(File::exists($path)){
                     File::delete($path);
                    }
                    File::delete($path);
                    $image = $req->file('profileImage');
                    $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
                    $image->move('reviewer/ProfileImage', $imagename);
                    $reviewer->profileImage = $imagename;
                  }
           
                 $reviewer->save();
                 $user =  $reviewer->email;
                 $record =  $reviewer;
                 $password = $req->newpassword;
                //  $url = "http://127.0.0.1:8000/member/login";
                $rev =Mailurl::first();
                $url = $rev->name . "/member/login";
                 Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
                 $data = [
                    'success' => 'Reviewer update Successfully',
                    'type' => asset("reviewer/ProfileImage/" . $reviewer->profileImage)
                ];
                
                return response()->json($data);
            
           
          }else{
            $data= [
              'error' => 'newpassword must be at least 8 characters long',
                   ];
               return response()->json($data);
                }
         }else{
          $data= [
            'error' => 'newpassword and confirmPassword is mishmatch',
                 ];
             return response()->json($data);
        }
    }
    }else{
        $validator = Validator::make($req->all(),[
            'reviewerType'=>'required|string',
            'name'=>'required|string',
            'subject'=>'required',
            'designation'=>'required|string',
            'organisationDetails'=>'required|string',
            'phoneNumber'=>'required|string|min:10|max:10',
            'bankName'=>'required|string',
            'accountNumber'=>'required',
            'branch'=>'required|string',
            'ifscNumber'=>'required',
            'email'=>'required',
          
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
        if(empty($req->newpassword) && empty($req->confirmpassword)) {
          
            $reviewer = Reviewer::find($req->id);
            $reviewer->name = $req->name;
            $reviewer->subject = $req->subject;
            $reviewer->designation = $req->designation;
            $reviewer->bankName = $req->bankName;
            $reviewer->accountNumber = $req->accountNumber;
            $reviewer->branch = $req->branch;
            $reviewer->ifscNumber = $req->ifscNumber;
            $reviewer->organisationDetails = $req->organisationDetails;
            if ($reviewer->email == $req->email) {
                $reviewer->email = $req->email;
            } else {
                $existingReviewer = Reviewer::where('email', $req->email)->first();
            
                if ($existingReviewer == null) {
                    $reviewer->email = $req->email;
                } else {
                    $data = [
                        'error' => 'Email is already taken',
                    ];
                    return response()->json($data);
                }
            }
            
           
            $reviewer->phoneNumber = $req->phoneNumber; 
            if($req->profileImage !="undefined"){
                $path = 'reviewer/ProfileImage/'.$reviewer->profileImage;
                if(File::exists($path)){
                 File::delete($path);
                }
                File::delete($path);
                $image = $req->file('profileImage');
                $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
                $image->move('reviewer/ProfileImage', $imagename);
                $reviewer->profileImage = $imagename;
              }
       
             $reviewer->save();
             $user =  $reviewer->email;
             $record =  $reviewer;
             $password = "Your Old Password";
             $rev =Mailurl::first();
             $url = $rev->name . "/member/login";
             Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
             $data = [
                'success' => 'Reviewer update Successfully',
            ];
            
            return response()->json($data);

         }elseif(!empty($req->newpassword) && empty($req->confirmpassword) ){
          $data= [
            'error' => 'please enter confirmPassword',
                 ];
             return response()->json($data);
       
         }elseif(empty($req->newpassword) && !empty($req->confirmpassword) ){
          $data= [
            'error' => 'please enter newpassword ',
                 ];
             return response()->json($data);
         }else{

          if($req->newpassword == $req->confirmpassword){
            if (strlen($req->newpassword ) == 8 && strlen($req->confirmpassword) == 8) {
                $Admin=auth('admin')->user()->first();
                $reviewer = Reviewer::find($req->id);
                $reviewer->name = $req->name;
                $reviewer->subject = $req->subject;
                $reviewer->designation = $req->designation;
                $reviewer->bankName = $req->bankName;
                $reviewer->accountNumber = $req->accountNumber;
                $reviewer->branch = $req->branch;
                $reviewer->ifscNumber = $req->ifscNumber;
                $reviewer->organisationDetails = $req->organisationDetails;
                if ($reviewer->email == $req->email) {
                    $reviewer->email = $req->email;
                } else {
                    $existingReviewer = Reviewer::where('email', $req->email)->first();
                
                    if ($existingReviewer == null) {
                        $reviewer->email = $req->email;
                    } else {
                        $data = [
                            'error' => 'Email is already taken',
                        ];
                        return response()->json($data);
                    }
                }
                $reviewer->password=Hash::make($req->newpassword);
                $reviewer->phoneNumber = $req->phoneNumber; 
                if($req->profileImage !="undefined"){
                    $path = 'reviewer/ProfileImage/'.$reviewer->profileImage;
                    if(File::exists($path)){
                     File::delete($path);
                    }
                    File::delete($path);
                    $image = $req->file('profileImage');
                    $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
                    $image->move('reviewer/ProfileImage', $imagename);
                    $reviewer->profileImage = $imagename;
                  }
           
                 $reviewer->save();
                 $user =  $reviewer->email;
                 $record =  $reviewer;
                 $password = $req->newpassword;
                 $rev =Mailurl::first();
                 $url = $rev->name . "/member/login";
                 Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
                 $data = [
                    'success' => 'Reviewer update Successfully',
                ];
                
                return response()->json($data);
            
           
          }else{
            $data= [
              'error' => 'Password must be at least 8 characters long',
                   ];
               return response()->json($data);
                }
         }else{
          $data= [
            'error' => 'Password and confirmPassword is mishmatch',
                 ];
             return response()->json($data);
        }
    }
  

}
   
}


public function editreviewerrecord($id){
    $reviewer= Reviewer::find($id);
    \Session::put('reviewer', $reviewer);
    return redirect('/admin/editreviewer'); 

   }

public function publicedit(Request $req){
     

   
    $validator = Validator::make($req->all(),[
      
        'name'=>'required|string',
        'phoneNumber'=>'required|string|min:10|max:10',
        'email'=>'required',
        'membershipId'=>'required',
        'district'=>'required',
       
    ]);

    if($validator->fails()){
        $data= [
            'error' => $validator->errors()->first(),
                 ];
        return response()->json($data);  
       
    }

   

    if(empty($req->newpassword) && empty($req->confirmpassword)) {
    
        $reviewer=Reviewer::find($req->id);
        $reviewer->name = $req->name;
                if ($reviewer->email == $req->email) {
                    $reviewer->email = $req->email;
                } else {
                    $existingReviewer = Reviewer::where('email', $req->email)->first();
                
                    if ($existingReviewer == null) {
                        $reviewer->email = $req->email;
                    } else {
                        $data = [
                            'error' => 'Email is already taken',
                        ];
                        return response()->json($data);
                    }
                }
                $reviewer->phoneNumber = $req->phoneNumber; 
                $reviewer->membershipId = $req->membershipId;
                $reviewer->district = $req->district;

                if($reviewer->save()){
                    $user =  $reviewer->email;
                    $record =  $reviewer;
                    $password = "########";
                    $url = "http://127.0.0.1:8000/member/login";
                    Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
                        $data= [
                            'success' => 'Public Reviewer Uodate Successfully',
                                    ];
                    return response()->json($data); 
            }
        }elseif(!empty($req->newpassword) && empty($req->confirmpassword) ){
           
            $data= [
              'error' => 'please enter confirmPassword',
                   ];
               return response()->json($data);
         
           }elseif(empty($req->newpassword) && !empty($req->confirmpassword) ){
           

            $data= [
              'error' => 'please enter newpassword ',
                   ];
               return response()->json($data);
           }else{
          
      if($req->newpassword == $req->confirmpassword){
       

        if (strlen($req->newpassword ) == 8 && strlen($req->confirmpassword) == 8) {
       $reviewer=Reviewer::find($req->id);
       $reviewer->name = $req->name;
    if ($reviewer->email == $req->email) {
        $reviewer->email = $req->email;
    } else {
        $existingReviewer = Reviewer::where('email', $req->email)->first();
    
        if ($existingReviewer == null) {
            $reviewer->email = $req->email;
        } else {
            $data = [
                'error' => 'Email is already taken',
            ];
            return response()->json($data);
        }
    }
    $reviewer->password=Hash::make($req->newpassword);
    $reviewer->phoneNumber = $req->phoneNumber; 
    $reviewer->membershipId = $req->membershipId;
    $reviewer->district = $req->district;
    // $reviewer->password=Hash::make($req->password);
    if($reviewer->save()){
        $user =  $reviewer->email;
        $record =  $reviewer;
        $password = $req->newpassword;
        $url = "http://127.0.0.1:8000/member/login";
        Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
        $data= [
            'success' => 'Public Reviewer Uodate Successfully',
                 ];
             return response()->json($data);
              }
       
      }else{
        $data= [
          'error' => 'Password must be at least 8 characters long',
               ];
           return response()->json($data);
            }
     }else{
      $data= [
        'error' => 'Password and confirmPassword is mishmatch',
             ];
         return response()->json($data);
    
      }
    
    
}
}
public function reviewerpublic($id){
   $reviewer= Reviewer::find($id);
   return redirect('/admin/reviewerpublic')->with('reviewer',$reviewer); 
   }

//Import Excel File
// public function importFile(Request $request){
//     try{    
//         $Admin=auth('admin')->user();
//         if ($request->hasFile('file_reviewer')) {
             
//               $file = $request->file('file_reviewer');
//               $fileContents = file($file->getPathname());
//          $emails =[];
//           foreach ($fileContents as $line) {
//               $data = str_getcsv($line);
//               if($data[0] == "internal"){
//                    if(!empty($data[1]) && !empty($data[5]) && !empty($data[7]) && !empty($data[8])){
//                     $reviewer = Reviewer::where('email',$data[7])->get();
//                     if(count($reviewer) > 0){
//                         return redirect()->back()->with('error',$data[7]."already exist");
//                     }
//                     if (in_array($data[7], $emails)) {
//                         return redirect()->back()->with('error',$data[7]."Duplicate entry");
//                     } else {
//                         array_push($emails,$data[7]);
//                     }
//                    }
             
//               }
           
//           }
//              foreach ($fileContents as $line) {
//               $data = str_getcsv($line);
//               if($data[0] == "internal"){
//               $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
//               Reviewer::create([
//                 'reviewerType'=>$data[0],
//                 'libraryType'=>$data[1],
//                 'libraryName'=>$data[2],
//                 'district'=>$data[3],
//                 'librarianName'=>$data[4],
//                 'subject'=>$data[5],
//                 'phoneNumber'=>$data[6],
//                 'email'=>$data[7],
//                 'password'=>Hash::make($data[8]),
//                 'role' => "reviewer",
//                 'creater' => $Admin->id, 
//                 "reviewerId"=> $randomCode,
//               ]);
//             }
//           }
                  
//                    return redirect()->back();
//          }else{
              
//                    return redirect()->back();
//          }
                
//             }
//          catch(Throwable $e){
            
//          }
// }
public function importFile(Request $request)
{
    try {    
        $admin = auth('admin')->user();
        if ($request->hasFile('file_reviewer')) {
            $file = $request->file('file_reviewer');
            $fileContents = file($file->getPathname());
            $emails = [];
            foreach ($fileContents as $line) {
                $data = str_getcsv($line);
                if ($data[0] == "internal") {
                    if (!empty($data[1]) && !empty($data[5]) && !empty($data[7]) && !empty($data[8])) {
                        // Check if the reviewer with the same email already exists
                        $reviewer = Reviewer::where('email', $data[7])->exists();
                        if ($reviewer) {
                            return redirect()->back()->with('error', $data[7] . " already exists");
                        }
                        // Check if the email is duplicated in the file
                        if (in_array($data[7], $emails)) {
                            return redirect()->back()->with('error', $data[7] . " Duplicate entry");
                        } else {
                            $emails[] = $data[7];
                        }
                    }
                }
            }
            $review = [];
            foreach ($fileContents as $line) {
                $data = str_getcsv($line);
              
                if ($data[0] == "internal" && isset($data[1]) && isset($data[5]) && isset($data[7]) && isset($data[8])) {
                    $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
                    $reviewer = new Reviewer();
            
                    $reviewer->reviewerType = $data[0];
                    $reviewer->name = $data[4];
                    $reviewer->libraryType = $data[1];
                    $reviewer->libraryName =$data[2];
                    $reviewer->email = $data[7];
                    $reviewer->subject = $data[5];
                    $reviewer->district = $data[3];
                    $reviewer->phoneNumber =$data[6]; 
                    $reviewer->password=Hash::make($data[8]);
                    $reviewer->role = "reviewer";
                    $reviewer->creater = $admin->id; 
                    $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
                    $reviewer->reviewerId= $randomCode;
                   
                    $reviewer->save();
                 
                }
            }
            // return $review;
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    } catch (Throwable $e) {
        // Handle the exception (e.g., log it)
        // return $e;
        return redirect()->back()->with('error', 'An error occurred while importing.');
    }
}

        }

	
									