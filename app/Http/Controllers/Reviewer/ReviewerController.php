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
use DB;
use App\Models\PeriodicalReviewStatus;


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
        // $data = BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->get();
        $totalreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->count();
        // $pendingreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
        $completedreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
      
        $recordcont = 0;
        $user = auth('reviewer')->user();
        $id = $user->id;
        $pendingreview = 0;
        
        if ($user->reviewerType == "external") {
            $revget = DB::table('book_review_statuses')
            ->where('reviewer_id', $id)
            ->whereNull('mark')
            ->get();
        $pendingreview = $revget->count();
        } else if (in_array($user->reviewerType, ['public', 'internal'])) {
            $reviewTypeLimit = $user->reviewerType == "public" ? 5 : 3;
    
            $revget = DB::table('book_review_statuses as brs')
            ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
            ->where('brs.reviewer_id', $id)
            ->where('brs.reviewertype', $user->reviewerType)
            ->whereNull('brs.mark')
            ->whereRaw('(
                SELECT COUNT(*) 
                FROM book_review_statuses 
                WHERE book_id = brs.book_id 
                AND reviewertype = brs.reviewertype
                AND mark IS NOT NULL
            ) < ?', [$reviewTypeLimit])
            ->get();
        
            // Get count of pending reviews
            $pendingreview = $revget->count();
        
            $anotherVariable = DB::table('book_review_statuses as brs')
            ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
            ->where('brs.reviewer_id', $id)
                ->where('brs.reviewertype', $user->reviewerType)
    
                ->whereNull('brs.mark')
                ->whereRaw('(
                    SELECT COUNT(*) 
                    FROM book_review_statuses 
                    WHERE book_id = brs.book_id 
                    AND reviewertype =brs.reviewertype
                    AND mark IS NOT NULL
                ) >= ?', [$reviewTypeLimit])
                ->get();
        
        $recordcont = $anotherVariable->count();
        
        }
        $data= $revget;
        if(sizeof($data) != 0){
            foreach($data as $key=>$val){
                $rec = Book::find($val->book_id);
                $val->book = $rec;
            }
          }
        return view('reviewer.review_book_list',compact('data','totalreview','pendingreview','completedreview','recordcont'));
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
       
        //Mark calculation
        $avginternal=0;
        $avgexternal=0;
        $avgpublic=0;
    
        $data1 = BookReviewStatus::where('book_id',$req->bookid)->where('mark','!=',null)->get();
        if(sizeof($data1) != 0){
           $book = Book::find($req->bookid);
           $internalcount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','internal')->count();
           $externalcount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','external')->count();
           $publiccount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','public')->count();
           $rinternalcount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','internal')->where('mark','!=',null)->count();
           $rexternalcount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','external')->where('mark','!=',null)->count();
           $rpubliccount= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','public')->where('mark','!=',null)->count();
           $suminternal= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','internal')->where('mark','!=',null)->sum('mark');
           $sumexternal= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','external')->where('mark','!=',null)->sum('mark');
           $sumpublic= BookReviewStatus::where('book_id',$req->bookid)->where('reviewertype','public')->where('mark','!=',null)->sum('mark');
           if(($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
                     $mark = ($sumexternal/($rexternalcount))*3;
           }else if(($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
                     $mark = ($suminternal/($rinternalcount))*1;
           }else if(($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)){
                      $mark = ($sumpublic/($rpubliccount))*1;
           }else if($externalcount == 0 || $rexternalcount == 0){
                    $mark = (($suminternal/($rinternalcount))*1)+(($sumpublic/($rpubliccount))*1);
           }else if($internalcount == 0 || $rinternalcount == 0){
                    $mark = (($sumexternal/($rexternalcount))*3)+(($sumpublic/($rpubliccount))*1);
           }else if($publiccount == 0 || $rpubliccount == 0){
                  $mark = (($sumexternal/($rexternalcount))*3)+(($suminternal/($rinternalcount))*1);
           }else{
                  $mark = (($sumexternal/($rexternalcount))*3)+(($suminternal/($rinternalcount))*1)+(($sumpublic/($rpubliccount))*1);
           }
       }
      

        $book->marks = $mark;
        $book->save();
      
        return redirect('reviewer/review_book_list');

    }

    public function completedlist(){
        $reviewer=auth('reviewer')->user();
        $data = BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->get();
        $totalreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->count();
        // $pendingreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
        $completedreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
        if(sizeof($data) != 0){
        foreach($data as $key=>$val){
            $rec = Book::find($val->book_id);
            $val->book = $rec;
        }
      }
      $recordcont = 0;
    $user = auth('reviewer')->user();
    $id = $user->id;
    $pendingreview = 0;
    
    if ($user->reviewerType == "external") {
        $pendingReviewCount = DB::table('book_review_statuses')
        ->where('reviewer_id', $id)
        ->whereNull('mark')
        ->get();
    $pendingreview = $pendingReviewCount->count();
    } else if (in_array($user->reviewerType, ['public', 'internal'])) {
        $reviewTypeLimit = $user->reviewerType == "public" ? 5 : 3;

        $revget = DB::table('book_review_statuses as brs')
        ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
        ->where('brs.reviewer_id', $id)
        ->where('brs.reviewertype', $user->reviewerType)
        ->whereNull('brs.mark')
        ->whereRaw('(
            SELECT COUNT(*) 
            FROM book_review_statuses 
            WHERE book_id = brs.book_id 
            AND reviewertype = brs.reviewertype
            AND mark IS NOT NULL
        ) < ?', [$reviewTypeLimit])
        ->get();
    
        // Get count of pending reviews
        $pendingreview = $revget->count();
    
        $anotherVariable = DB::table('book_review_statuses as brs')
        ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
        ->where('brs.reviewer_id', $id)
            ->where('brs.reviewertype', $user->reviewerType)

            ->whereNull('brs.mark')
            ->whereRaw('(
                SELECT COUNT(*) 
                FROM book_review_statuses 
                WHERE book_id = brs.book_id 
                AND reviewertype =brs.reviewertype
                AND mark IS NOT NULL
            ) >= ?', [$reviewTypeLimit])
            ->get();
    
    $recordcont = $anotherVariable->count();
    
    }
    
        return view('reviewer.review_complete',compact('data','totalreview','pendingreview','completedreview','recordcont'));
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
        $reviewer->subject = json_encode($req->subject);
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
    $Admin=auth('reviewer')->user()->id;
    $Reviewer=Reviewer::where('creater',$Admin)->where('status','1')->get();

    if( count($Reviewer)  <"10"){
   
     

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
            if($req->profileImage !="undefined"){
            $image = $req->file('profileImage');
            $imagename = $req->name . time() . '.' . $image->getClientOriginalExtension();
            $image->move('reviewer/ProfileImage', $imagename);
           
            $reviewer->profileImage = $imagename;
            }
             $reviewer->save();
         
            //  $user =  $reviewer->email;
            //  $record =  $reviewer;
            //  $password = $req->password;
            //  $url = "http://127.0.0.1:8000/member/login";
            //  Notification::route('mail',$reviewer->email)->notify(new MemberdetailNotification($user, $url,$record,$password));  
             $data= [
                'success' => 'Reviewer Create Successfully',
                     ];
            return response()->json($data);   
    

 

    }else{
        $data= [
            'error' => 'Maximum Limit Is 10 Public Reviewer',
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
   if($req->status == "1"){
    $Admin=auth('reviewer')->user()->id;
    $Reviewer=Reviewer::where('creater',$Admin)->where('status','1')->get();

    if( count($Reviewer)  <"10"){
        $reviewer->status =$req->status;
        $reviewer->save();
        $data= [
            'success' => 'Status Change Sucessfully',
                 ];
        return response()->json($data);  
    }else{
        $data= [
            'error' => 'Maximum Limit Is 10 Public Reviewer',
                 ];
        return response()->json($data); 
     }

    
   }else{
    $reviewer->status =$req->status;
    $reviewer->save();
    $data= [
        'success' => 'Status Change Sucessfully',
             ];
    return response()->json($data);  
   }

 
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
            'phoneNumber'=>'required|string|min:10|max:10',
            'email'=>'required',
            'designation'=>'required',

            
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
            $reviewer->designation = $req->designation;

            
            $reviewer->libraryType = $req->libraryType;
            $reviewer->libraryName = $req->libraryName;
  
            $reviewer->subject =json_encode($req->subject);
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
            $reviewer->designation = $req->designation;

            $reviewer->subject = json_encode($req->subject);
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
            $reviewer->subject = json_encode($req->subject);
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
                $reviewer->subject = json_encode($req->subject);
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
public function magazine_view($id,$rid){
    $magazine = Magazine::find($id);
    $magazine->revid= $rid;
    \Session::put('magazine', $magazine);
    return redirect('reviewer/magazineview');    

  }
  
  public function review_post_periodical($id,$revid){

    $rev = PeriodicalReviewStatus::find($revid);
  
    $periodical = Magazine::find($id);
    $data=(Object)[
        'periodical'=>$periodical,
        'rev'=>$rev
      ];

    return redirect('reviewer/review_post_periodical')->with('data',$data);  
}
// 
public function periodicalreview(Request $req){
       
    $rev = PeriodicalReviewStatus::find($req->rev);
    $periodical = Magazine::find($req->bookid);
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

    $rev->remark=$req->about_periodical;
 
    $rev->save();
   
    //Mark calculation
    $avginternal=0;
    $avgexternal=0;
    $avgpublic=0;

    $data1 = PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('mark','!=',null)->get();
    if(sizeof($data1) != 0){
       $periodical = Magazine::find($req->periodicalid);
       $internalcount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','internal')->count();
       $externalcount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','external')->count();
       $publiccount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','public')->count();
       $rinternalcount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','internal')->where('mark','!=',null)->count();
       $rexternalcount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','external')->where('mark','!=',null)->count();
       $rpubliccount= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','public')->where('mark','!=',null)->count();
       $suminternal= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','internal')->where('mark','!=',null)->sum('mark');
       $sumexternal= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','external')->where('mark','!=',null)->sum('mark');
       $sumpublic= PeriodicalReviewStatus::where('periodical_id',$req->periodicalid)->where('reviewertype','public')->where('mark','!=',null)->sum('mark');
       if(($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
                 $mark = ($sumexternal/($externalcount * 20))*100;
       }else if(($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
                 $mark = ($suminternal/($internalcount * 20))*100;
       }else if(($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)){
                  $mark = ($sumpublic/($publiccount * 20))*100;
       }else if($externalcount == 0 || $rexternalcount == 0){
                $mark = (($suminternal/($internalcount * 20))*50)+(($sumpublic/($publiccount * 20))*50);
       }else if($internalcount == 0 || $rinternalcount == 0){
                $mark = (($sumexternal/($externalcount * 20))*70)+(($sumpublic/($publiccount * 20))*30);
       }else if($publiccount == 0 || $rpubliccount == 0){
              $mark = (($sumexternal/($externalcount * 20))*70)+(($suminternal/($internalcount * 20))*30);
       }else{
              $mark = (($sumexternal/($externalcount * 20))*60)+(($suminternal/($internalcount * 20))*20)+(($sumpublic/($publiccount * 20))*20);
       }
   }
  

    $periodical->marks = $mark;
    $periodical->save();
  
    return redirect('reviewer/review_periodical_list');

}
public function reviewperiodicallist(){

    $reviewer=auth('reviewer')->user();
    $data = PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->get();
    $totalreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->count();
    $pendingreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
    $completedreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
    if(sizeof($data) != 0){
    foreach($data as $key=>$val){
        $rec =  Magazine::find($val->periodical_id);
        $val->periodical = $rec;
    }
  }

    return view('reviewer.review_periodical_list',compact('data','totalreview','pendingreview','completedreview'));
}

public function review_periodical_complete(){
    $reviewer=auth('reviewer')->user();
    $data = PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->get();
    $totalreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->count();
    $pendingreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
    $completedreview =  PeriodicalReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
    if(sizeof($data) != 0){
    foreach($data as $key=>$val){
        $rec = Magazine::find($val->periodical_id);
        $val->periodical = $rec;
    }
  }
  
    return view('reviewer.review_periodical_complete',compact('data','totalreview','pendingreview','completedreview'));
}


public function review_hold_book_list(){

    $reviewer=auth('reviewer')->user();
    // $data = BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->get();
    $totalreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->count();
    // $pendingreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','=',null)->count();
    $completedreview =  BookReviewStatus::where('reviewer_id',$reviewer->id)->where('mark','!=',null)->count();
    $recordcont = 0;
    $user = auth('reviewer')->user();
    $id = $user->id;
    $pendingreview = 0;
    
    if ($user->reviewerType == "external") {
        $pendingReviewCount = DB::table('book_review_statuses')
        ->where('reviewer_id', $id)
        ->whereNull('mark')
        ->get();
    $pendingreview = $pendingReviewCount->count();
    } else if (in_array($user->reviewerType, ['public', 'internal'])) {
        $reviewTypeLimit = $user->reviewerType == "public" ? 5 : 3;

        $revget = DB::table('book_review_statuses as brs')
        ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
        ->where('brs.reviewer_id', $id)
        ->where('brs.reviewertype', $user->reviewerType)
        ->whereNull('brs.mark')
        ->whereRaw('(
            SELECT COUNT(*) 
            FROM book_review_statuses 
            WHERE book_id = brs.book_id 
            AND reviewertype = brs.reviewertype
            AND mark IS NOT NULL
        ) < ?', [$reviewTypeLimit])
        ->get();
    
        // Get count of pending reviews
        $pendingreview = $revget->count();
    
        $anotherVariable = DB::table('book_review_statuses as brs')
        ->select('brs.id', 'brs.book_id', 'brs.created_at', 'brs.reviewer_id', 'brs.mark')
        ->where('brs.reviewer_id', $id)
            ->where('brs.reviewertype', $user->reviewerType)

            ->whereNull('brs.mark')
            ->whereRaw('(
                SELECT COUNT(*) 
                FROM book_review_statuses 
                WHERE book_id = brs.book_id 
                AND reviewertype =brs.reviewertype
                AND mark IS NOT NULL
            ) >= ?', [$reviewTypeLimit])
            ->get();
    
    $recordcont = $anotherVariable->count();
    
    }

    $data= $anotherVariable;
    if(sizeof($data) != 0){
        foreach($data as $key=>$val){
            $rec = Book::find($val->book_id);
            $val->book = $rec;
        }
      }



    return view('reviewer.review_hold_book_list',compact('data','totalreview','pendingreview','completedreview','recordcont'));
}

}