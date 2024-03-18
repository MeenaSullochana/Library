<?php

namespace App\Http\Controllers\Reviewer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\BookReviewStatus;
use App\Models\Reviewer;
use App\Models\Mailurl;


use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MemberdetailNotification;
use App\Notifications\MemberupdateNotification;
class ReviewerController extends Controller
{
    public function reviewlist(){

        $reviewer=auth('reviewer')->user();
        $data = BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->get();
        $totalreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->count();
        $pendingreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
        $completedreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
        if(sizeof($data) != 0){
        foreach($data as $key=>$val){
            $rec = Book::find($val->book_id);
            $val->book = $rec;
        }
      }

        return view('reviewer.review_book_list',compact('data','totalreview','pendingreview','completedreview'));
    }

    public function reviewpost($bookid,$revid){
     
        $rev = BookReviewStatus::find($revid);
      
        $book = Book::find($bookid);
        $data=(Object)[
            'book'=>$book,
            'rev'=>$rev
          ];
        return redirect('reviewer/review_post_book')->with('data',$data);  
    }

    public function review(Request $req){
      
        $rev = BookReviewStatus::find($req->rev);
        $book = Book::find($req->bookid);
        $review = $req->review;
        if($review == "Highly Recommended"){
           $mark = 20;
        }else if($review == "May Be Considered"){
           $mark = 10;
        }else if($review == "Not Recommended"){
            $mark = 0;
        }else{
            $mark = 0;
        }

        $rev->mark = $mark;
        $rev->category = $req->category;
        $rev->review_remark =      json_encode( $req->review_remark);

    
        $rev->review_type = $review;
        $rev->remark=$req->about_book;
        $rev->save();
       if($rev->reviewertype == "external"){
            // $rmark = 2 * $mark;
            $rmark = $mark;
       }else{
           $rmark = $mark;
       }
        $book->marks = $book->marks + $rmark;
        $book->save();
        return redirect('reviewer/review_book_list');

    }

    public function completedlist(){
        $reviewer=auth('reviewer')->user();
        $data = BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->get();
        $totalreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->count();
        $pendingreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
        $completedreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
        if(sizeof($data) != 0){
        foreach($data as $key=>$val){
            $rec = Book::find($val->book_id);
            $val->book = $rec;
        }
      }
        return view('reviewer.review_complete',compact('data','totalreview','pendingreview','completedreview'));
    }

    public function bookview($id,$revid){
   
        $book=Book::find($id);
        $book->primaryauthor1= json_decode($book->primaryauthor); 
        $book->trans_from1= json_decode($book->trans_from); 
        $book->other_img1= json_decode($book->other_img); 
        $book->series1= json_decode($book->series); 
        $book->banner_img1= json_decode($book->banner_img); 
        $book->booktag1= json_decode($book->booktag); 
        $book->trans_author1= json_decode($book->trans_author); 
        $book->bookdescription1= json_decode($book->bookdescription); 
        $book->series1= json_decode($book->series); 
        $book->volume1= json_decode($book->volume); 
      if($book->user_type == "publisher"){
       $pub=Publisher::find( $book->user_id);
       $book->firstName= $pub->firstName;
       $book->lastName= $pub->lastName;
      }else if($book->user_type == "distributor"){
        $pub=Distributor::find( $book->user_id);
        $book->firstName= $pub->firstName;
        $book->lastName= $pub->lastName;
      }else{
        $pub=PublisherDistributor::find( $book->user_id);
        $book->firstName= $pub->firstName;
        $book->lastName= $pub->lastName;
      }
      $book->revid= $revid;
      \Session::put('book', $book);
        return redirect('reviewer/bookview'); 
        
    }

    public function reviewerchangepassword(Request $req){
    
      $validator = Validator::make($req->all(),[
          'currentPassword'=>'required|string',
          'newPassword'=>'required|string',
          'confirmPassword'=>'required',
      ]);
      if($validator->fails()){
          $data= [
              'error' => $validator->errors()->first(),
                   ];
          return response()->json($data);  
         
      }
      $Reviewer=auth('reviewer')->user()->first();
      if((Hash::check($req->currentPassword,$Reviewer->password))){
         if($req->newPassword == $req->confirmPassword){
           $Reviewer->password=Hash::make($req->newPassword);
           $Reviewer->save();
           $data= [
              'success' => 'Passdword Change  Successfully',
                   ];
          return response()->json($data);  
         
          }else{
              $data= [
                  'error' => 'newPassword and confirmPassword is mishmatch',
                       ];
              return response()->json($data);  
          }
      }else{
          $data= [
              'error' => 'Current password is incorrect',
                   ];
          return response()->json($data);  
         
      }
  
  }
  public function createreviewer(Request $req){
     

        
    $validator = Validator::make($req->all(),[
        'reviewerType'=>'required|string',
        'name'=>'required|string',
        'subject'=>'required',
        'designation'=>'required|string',
        'organisationDetails'=>'required|string',
        'phoneNumber'=>'required|string|min:10|max:10',
        'email'=>'required|unique:reviewer',
        'profileImage'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'bankName'=>'required',
        'accountNumber'=>'required|string',
        'branch'=>'required|string',
        'ifscNumber'=>'required',
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
         $url = "http://127.0.0.1:8000/member/login";
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


  public function createpublicreviewer(Request $req){

    $validator = Validator::make($req->all(),[
        'publicreviewername'=>'required|string',
        'Category'=>'required',
        'district'=>'required|string',
        'membershipId'=>'required|string',
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
     
        $Admin=auth('reviewer')->user()->first();
        $reviewer=new Reviewer();
      
        $reviewer->name = $req->publicreviewername;
        $reviewer->Category = $req->Category;
        $reviewer->membershipId = $req->membershipId;
        $reviewer->email = $req->email;
        $reviewer->district = $req->district;
        $reviewer->phoneNumber = $req->phoneNumber; 
        $reviewer->password=Hash::make($req->password);
        $reviewer->role = "reviewer";
        $reviewer->reviewerType = "public";

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
         $url = "http://127.0.0.1:8000/member/login";
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

public function reviewer_edit($id){
          
    $revieweredit= Reviewer::find($id);

  
    \Session::put('revieweredit', $revieweredit);
    return redirect('reviewer/revieweredit'); 
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
   public function reviewer_view($id){
          
    $reviewer= Reviewer::find($id);

  
    \Session::put('reviewer', $reviewer);
    return redirect('reviewer/reviewer-view'); 
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
        
            // $Admin=auth('admin')->user()->first();
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
            //  $rev =Mailurl::first();
            //  $url = $rev->name . "/member/login";
            //  $url = "http://127.0.0.1:8000/member/login";
            //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
             $data = [
                'success' => 'profile update Successfully',
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
                // $Admin=auth('admin')->user()->first();
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
                // $rev =Mailurl::first();
                // $url = $rev->name . "/member/login";
                //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
                 $data = [
                    'success' => 'profile update Successfully',
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
            //  $rev =Mailurl::first();
            //  $url = $rev->name . "/member/login";
            //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
             $data = [
                'success' => 'profile update Successfully',
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
                //  $rev =Mailurl::first();
                //  $url = $rev->name . "/member/login";
                //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
                 $data = [
                    'success' => 'profile update Successfully',
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


public function editpublicprofile(Request $req){
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
        //  $user =  $reviewer->email;
        //  $record =  $reviewer;
        //  $password = $req->newpassword;
        //  $rev =Mailurl::first();
   
        //   $url = $rev->name . "/member/login";
        //  Notification::route('mail',$reviewer->email)->notify(new MemberupdateNotification($user, $url,$record,$password));  
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