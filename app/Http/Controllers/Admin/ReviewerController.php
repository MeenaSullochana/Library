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
use App\Models\Specialcategories;
use App\Models\Booksubject;



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

                $Admin=auth('admin')->user()->id;
                $reviewer=new Reviewer();
                $reviewer->reviewerType = $req->reviewerType;
                $reviewer->name = $req->librarianName;
             
                $reviewer->libraryType = $req->libraryType;
                $reviewer->libraryName = $req->libraryName;
                $reviewer->email = $req->email;
                $reviewer->subject = json_encode($req->subject);
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
            $Admin=auth('admin')->user()->id;
            $reviewer=new Reviewer();
            $reviewer->reviewerType = $req->reviewerType;
            $reviewer->name = $req->name;
            $reviewer->subject = json_encode($req->subject);
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
    $reviewer->subject= json_decode($reviewer->subject, true);
    $review=BookReviewStatus::where('reviewer_id','=',$req->id)->get();
    $data=[];
    foreach($review as $key=>$val){
        $book= Book::find($val->book_id);
        $val->bookname=$book->book_title;
        $val->subbookname=$book->subtitle;
        $val->nameOfPublisher=$book->nameOfPublisher;

        
        
        array_push($data,$val);
    }
    $reviewer->record= $data;

    return redirect('/admin/reviewerdata')->with('reviewer',$reviewer); 

   }
   public function memberedit($id){
    $reviewer= Reviewer::find($id);
    
    if (json_decode($reviewer->subject, true) !== null) {

        $selectedSubjects = json_decode( $reviewer->subject);
        if (is_array($selectedSubjects)) {
        } else {
            $selectedSubjects = explode(',', $selectedSubjects);
        }

       $SpecialSubjects = Booksubject::where('status', '1')
       ->whereNotIn('name', $selectedSubjects)
       ->get();
    
                $reviewer->SpecialSubjects =$SpecialSubjects;
                $reviewer->selectedSubjects =$selectedSubjects;
     }else{
      
        $SpecialSubjects = Booksubject::where('status', '1')
      
       ->get();
        $reviewer->SpecialSubjects = $SpecialSubjects;
                $reviewer->selectedSubjects =[];
     }



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
            'designation'=>'required|string',

            'district'=>'required|string',
            'librarianName'=>'required|string',
            'Category'=>'required',
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
            $reviewer->designation = $req->designation;

            
            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
            $categories = [];

            $categoryArray = explode(',', $req->Category);
            
            $categoryArray = array_map('trim', $categoryArray);
            
            foreach ($categoryArray as $category) {
                $categories[] = $category;
            }
            $reviewer->Category =$categories ;
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
            //  $user =  $reviewer->email;
            //  $record =  $reviewer;
            //  $password = "Your Old Password";
            //  $rev =Mailurl::first();
            //  $url = $rev->name . "/member/login";
            //  $url = "http://127.0.0.1:8000/member/login";
            //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
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
            $reviewer->designation = $req->designation;

            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
  
            $categories = [];

            $categoryArray = explode(',', $req->Category);
            
            $categoryArray = array_map('trim', $categoryArray);
            
            foreach ($categoryArray as $category) {
                $categories[] = $category;
            }
            $reviewer->Category =$categories ;
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
                //  $user =  $reviewer->email;
                //  $record =  $reviewer;
                //  $password = $req->newpassword;
                //  $url = "http://127.0.0.1:8000/member/login";
                // $rev =Mailurl::first();
                // $url = $rev->name . "/member/login";
                //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
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
            'acc_hol_name'=>'required|string',
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
            $subjects = [];

            $subjectArray = explode(',', $req->subject);
            
            $subjectArray = array_map('trim', $subjectArray);
            
            foreach ($subjectArray as $subject) {
                if($subject == "Sports"){
                    $subjects[] = "Sports, Games";
                   }else  if($subject == "Games" ||  $subject == "கலைக்களஞ்சியங்கள்"  || $subject == "நிகண்டுகள்" ){
                   
                   }else  if($subject == "அகராதிகள்"){
                    $subjects[] = "அகராதிகள், கலைக்களஞ்சியங்கள், நிகண்டுகள்";
                    

                   }
                   else  if($subject == "English Literature_ critisim"){
                    $subjects[] = "English Literature_ critisim, essays, letter";
                    
    
                   }
                // }else  if($subject == "Games" || $subject == "essays" || $subject == "letter" || 
                // $subject == "Short stories" || $subject == "Custom" || $subject == "Folklore)" ||$subject == "கலைக்களஞ்சியங்கள்"  || $subject == "நிகண்டுகள்" ){
                // }



                   else{
                    $subjects[] = $subject;
    
                   }
            }

        
            $reviewer->subject = json_encode($subjects);


            $reviewer->designation = $req->designation;
            $reviewer->bankName = $req->bankName;
            $reviewer->accountNumber = $req->accountNumber;
            $reviewer->branch = $req->branch;
            $reviewer->acc_hol_name = $req->acc_hol_name;

            
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
            //  $user =  $reviewer->email;
            //  $record =  $reviewer;
            //  $password = "Your Old Password";
            //  $rev =Mailurl::first();
            //  $url = $rev->name . "/member/login";
            //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
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
                $subjects = [];

                $subjectArray = explode(',', $req->subject);
                
                $subjectArrays = array_map('trim', $subjectArray);
                


                foreach ($subjectArrays as $subject) {
                    if($subject == "Sports"){
                        $subjects[] = "Sports, Games";
                       }else  if($subject == "Games" ||  $subject == "கலைக்களஞ்சியங்கள்"  || $subject == "நிகண்டுகள்" ){
                       
                       }else  if($subject == "அகராதிகள்"){
                        $subjects[] = "அகராதிகள், கலைக்களஞ்சியங்கள், நிகண்டுகள்";
                        

                       }
                       else  if($subject == "English Literature_ critisim"){
                        $subjects[] = "English Literature_ critisim, essays, letter";
                        
        
                       }
                       else{
                        $subjects[] = $subject;
        
                       }
                }
    
                $reviewer->subject = json_encode($subjects);

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
                //  $user =  $reviewer->email;
                //  $record =  $reviewer;
                //  $password = $req->newpassword;
                //  $rev =Mailurl::first();
                //  $url = $rev->name . "/member/login";
                //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
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

     $reviewer = Reviewer::find($id);

    
  
    //  if (is_array($reviewer->Category)){
        // return "hi";
      $selectedSubjects = json_decode( $reviewer->Category);
        $Specialcategories = Specialcategories::where('status', '1')
       ->whereNotIn('name', $selectedSubjects)
       ->get();

     $reviewer->Specialcategories =$Specialcategories;
     $reviewer->selectedSubjects =$selectedSubjects;
    //  }else{
    //       return "bye";
    //      $Specialcategories = Specialcategories::where('status', '1')
    //     ->whereNotIn('name', $categories)
    //     ->get();

    //   $reviewer->Specialcategories =$Specialcategories;
    //   $reviewer->selectedSubjects =$categories;
    //  }
     
    //  $selectedSubjects1 = explode(',', $reviewer->Category);
      

   
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


public function importFile(Request $request)
{
    try {
        $admin = auth('admin')->user();
        if ($request->hasFile('file_reviewer')) {
            $file = $request->file('file_reviewer');
            $fileContents = file($file->getPathname());
            unset($fileContents[0]);

            $batchSize = 100; 

            $chunks = array_chunk($fileContents, $batchSize);

            foreach ($chunks as $chunk) {
                $librarianId = [];
                foreach ($chunk as $line) {
                    $data = str_getcsv($line);
                     $email = $data[9] ?? null;
                     if($email != null){
                        $reviewer = Reviewer::where('email', $data[9])->exists();
                        if ($reviewer ) {
                            return redirect()->back()->with('errorlib', $data[9] . " already exists");
                        }
    
                        if (in_array($data[7], $librarianId)) {
                            return redirect()->back()->with('errorlib', $data[9] . " Duplicate entry");
                        } else {
                            array_push($librarianId, $data[9]);
                        }
                     }
                  
                }
                $check =[];
                foreach ($chunk as $line) {
                    $data = str_getcsv($line);
                    $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
                    $reviewer = new Reviewer();
    
                    $reviewer->reviewerType = $data[0];
                    $reviewer->libraryType = $data[1]??null;
                    $reviewer->reviewerId= $data[2]??$randomCode;
                    $reviewer->libraryName =$data[3]??null;
                    $reviewer->name = $data[4]??null;
                    $reviewer->designation = $data[5]??null;
                    $reviewer->district = $data[6]??null;
                    $reviewer->category = $data[7] ?? null;
                    $reviewer->phoneNumber =$data[8]??null; 
                    $reviewer->email = $data[9]??null;
                    $reviewer->password=Hash::make('12345678');

                    $subjects1 = $data[11]??null;
                    if($subjects1 != null){
                        $subjects = json_encode($subjects1);
                        $sub = json_decode($subjects,true);
                        $sub1 = json_decode($sub,true);
                        $reviewer->subject = json_encode($sub1);
                    }else{
                        $reviewer->subject = $subjects1; 
                    }
                

                    $reviewer->organisationdetails = $data[12] ?? null;
                    $reviewer->profileImage = $data[13] ?? null;
                    $reviewer->bankName = $data[14] ?? null;
                    $reviewer->accountNumber = $data[15]??null;
                    $reviewer->batch = $data[16] ?? null;
                    $reviewer->branch = $data[17] ?? null;
                    $reviewer->ifscNumber = $data[18] ?? null;
                    $reviewer->membershipId = $data[19] ?? null;
                    $reviewer->role = "reviewer";
                    $reviewer->creater = $admin->id; 
                   
                    $reviewer->save();

                }
            }

            return redirect()->back()->with('successlib', 'File imported successfully');
        } else {
            return redirect()->back()->with('errorlib', 'No file uploaded');
        }
    } catch (\Throwable $e) {
         return $e;
        // Handle the exception (e.g., log it)
        return redirect()->back()->with('errorlib', 'An error occurred while importing.');
    }
}





public function create_reviewer(Request $req){
     
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
            'district'=>'required|string',
            'reviewerType'=>'required|string',
            'libraryType'=>'required',
            'libraryName'=>'required|string',
            'designation'=>'required|string',
           
            'librarianName'=>'required|string',
            'Librarian_code'=>'required|string',

            
            'Category'=>'required',
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

            $Admin=auth('admin')->user()->id;
            $reviewer=new Reviewer();
        
            $reviewer->reviewerId = $req->Librarian_code;

     
            $reviewer->reviewerType = $req->reviewerType;
            $reviewer->name = $req->librarianName;
            $reviewer->designation = $req->designation;
            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
            $categories = [];
            
            $categoryArray = explode(',', $req->Category);
       
            $categoryArray1 = array_map('trim', $categoryArray);
            $jsonCategories = json_encode($categoryArray1, JSON_UNESCAPED_UNICODE);
             
            $reviewer->Category = $jsonCategories;

            $reviewer->district = $req->district;
            $reviewer->phoneNumber = $req->phoneNumber; 
    
            $reviewer->password=Hash::make($req->password);
            $reviewer->role = "reviewer";
          
            $reviewer->creater = $Admin; 
            $reviewer->email = $req->email;
        
            $image = $req->file('profileImage');
            $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
            $image->move('reviewer/ProfileImage', $imagename);
           
            $reviewer->profileImage = $imagename;

        
              if($reviewer->save()){
               
                $data = [
                    'success' => 'Reviewer Create Successfully',
                    'type' => asset("reviewer/ProfileImage/" . $reviewer->profileImage)
                ];
                
                return response()->json($data);
              }
            
          
            
        }else{
                $data= [
                    'error' => 'ProfileImage Filed Is Required',
                         ];
                return response()->json($data);   
               } 
     

    }else{
        $validator = Validator::make($req->all(),[
            'reviewerType'=>'required|string',
            'name'=>'required|string',
            'subject'=>'required',
            'designation'=>'required|string',
            'organisationDetails'=>'required|string',
            'phoneNumber'=>'required|string|min:10|max:10',
            'acc_hol_name'=>'required|string',
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
        $Admin=auth('admin')->user()->id;
        $reviewer=new Reviewer();
        $reviewer->reviewerType = $req->reviewerType;
        $reviewer->name = $req->name;
        $subjects = [];

        $subjectArray = explode(',', $req->subject);
        
        $subjectArrays = array_map('trim', $subjectArray);
        


        foreach ($subjectArrays as $subject) {
               if($subject == "Sports"){
                $subjects[] = "Sports, Games";
               }
               else if($subject == "English Literature_ critisim"){
                $subjects[] = "English Literature_ critisim, essays, letter";
               }
               else if($subject == "English Literature_Novel"){
                $subjects[] = "English Literature_Novel, Short stories";
               }
               else if($subject == "Folklore (Culture"){
                $subjects[] = "Folklore (Culture, Custom, Folklore)";

               }
               else  if($subject == "அகராதிகள்"){
                $subjects[] = "அகராதிகள், கலைக்களஞ்சியங்கள், நிகண்டுகள்";
                

               }else  if($subject == "English Literature_ critisim"){
                $subjects[] = "English Literature_ critisim, essays, letter";
                

               }
               
               else{
                $subjects[] = $subject;

               }


        }

        $reviewer->subject = json_encode($subjects);

    
        $reviewer->designation = $req->designation;
        $reviewer->organisationDetails = $req->organisationDetails;
        $reviewer->email = $req->email;
        $reviewer->phoneNumber = $req->phoneNumber; 
        $reviewer->bankName = $req->bankName;
        $reviewer->accountNumber = $req->accountNumber;
        $reviewer->acc_hol_name = $req->acc_hol_name;

        
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


public function public_edit($id){
    $publicedit= Reviewer::find($id);
    \Session::put('publicedit', $publicedit);
    return redirect('/admin/public_edit')->with('publicedit',$publicedit); 
    }


    public function editpublicreviewer(Request $req){
        $validator = Validator::make($req->all(),[
            'publicreviewername'=>'required|string',
            'Category'=>'required',
            'district'=>'required|string',
            'membershipId'=>'required|string',
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
        $reviewer = Reviewer::find($req->id);
     
        $reviewer->name = $req->publicreviewername;
        $reviewer->Category = $req->Category;
        $reviewer->membershipId = $req->membershipId;
        $reviewer->district = $req->district;
        $reviewer->phoneNumber = $req->phoneNumber;  
        if ($reviewer->email == $req->email) {
            $reviewer->email = $req->email;
        } else {
            $existingReviewer = Reviewer::where('email','=', $req->email)->first();
        
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
            $reviewer = Reviewer::find($req->id);
            $reviewer->name = $req->publicreviewername;
            $reviewer->Category = $req->Category;
            $reviewer->membershipId = $req->membershipId;
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
          
             $data = [
                'success' => 'Reviewer update Successfully',
              
            ];
            
            return response()->json($data);
        
       
      }else{
        $data= [
          'error' => 'Newpassword must be at least 8 characters long',
               ];
           return response()->json($data);
            }
     }else{
      $data= [
        'error' => 'Newpassword and confirmPassword is mishmatch',
             ];
         return response()->json($data);
    }
    
     }
    }
    


}

	
		