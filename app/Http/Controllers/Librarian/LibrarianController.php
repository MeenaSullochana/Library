<?php

namespace App\Http\Controllers\Librarian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Librarian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use File;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Notification;
use App\Notifications\Member1detailNotification;
use DB;
class LibrarianController extends Controller
{
        
//    public function metabooklist(){

//       $id=auth('librarian')->user()->id; 
//       $book = Book::where('book_reviewer_id','=',$id)->get();
//       return view('librarian/meta_book_list')->with('book',$book); 
     
//    }

   public function metabooklist(){

      $id=auth('librarian')->user()->id; 
      $book = Book::where('book_reviewer_id','=',$id)->get();
foreach($book as $key=>$val){
      $check = $this->checkBookTitle($val);
      $val->check = $check;
        
     }
      return view('librarian/meta_book_list')->with('book',$book); 
     
   }

 public function checkBookTitle($data)
{
  $newBookTitle = trim($data->book_title);

  $processedNewTitle = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(preg_replace('/\s+/', '', preg_replace('/(?<!^)[A-Z]/', '_$0', $newBookTitle))));

  $existingTitles = Book::pluck('book_title')->where("book_procurement_status",'=',1)->map(function ($title) {
      return preg_replace('/[^a-zA-Z0-9]/', '', strtolower(trim($title)));
  });
  $c=0;
  foreach($existingTitles as $key=>$val){
    if($val == $processedNewTitle){
      $c = $c+1;
    }
    else{
      $c= $c;
    }
  }
  $isbn = Book::where('isbn',"=",$data->isbn)->get();
 $count = count($isbn);
 if($c >1){
  return "duplicate"; 
 }else if($count >1){
       return "repeated";
 }else{
       return "unique";
 }


}

   public function librarianapprovestatus(Request $req){
    $book = Book::find($req->id);
    $book->book_status="1";
    $book->save();
    $data= [
        'success' => 'Book review status change Successfully',
             ];
    return response()->json($data); 

   }
   public function librarianrejectstatus(Request $req){
    $book = Book::find($req->id);
    $book->book_status="0";
    $book->reject_message=$req->rejectmessage;
    $book->save();
    $data= [
        'success' => 'Book review status change Successfully',
             ];
    return response()->json($data); 

   }
   public function meta_complete_book_list(){
    $id=auth('librarian')->user()->id; 
    $book = Book::where('book_reviewer_id','=',$id)->where('book_status','=','1')->get();
    return view('librarian/meta_complete_book_list')->with('book',$book); 
   }
   public function meta_pending(){
    $id=auth('librarian')->user()->id; 
    $book = Book::where('book_reviewer_id','=',$id)->where('book_status','=',Null)->get();
    return view('librarian/meta_pending')->with('book',$book); 
   }
   
public function bookview($id){
   
    $book=Book::find($id);
    $book->primaryauthor1= json_decode($book->primaryauthor); 
    $book->trans_from1= json_decode($book->trans_from); 
    $book->other_img1= json_decode($book->other_img); 
    $book->series1= json_decode($book->series); 
    // return $book;
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
  \Session::put('book', $book);
  // return $book;
    return redirect('librarian/bookview')->with('book',$book); 
    
}

public function meta_return(){
  $id=auth('librarian')->user()->id; 
  $book = Book::where('book_reviewer_id','=',$id)->where('book_status','=','2')->get();
  return view('librarian/meta_return')->with('book',$book); 
 }
 public function meta_update_return(){
  $id=auth('librarian')->user()->id; 
  $book = Book::where('book_reviewer_id','=',$id)->where('book_status','=','3')->get();
  return view('librarian/meta_update_return')->with('book',$book); 
 }
 
public function meta_reject(){
    $id=auth('librarian')->user()->id; 
    $book = Book::where('book_reviewer_id','=',$id)->where('book_status','=','0')->get();
    return view('librarian/meta_reject')->with('book',$book); 
   }



   public function librarianchangepassword(Request $req){
    
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
    $Librarian=auth('librarian')->user()->first();
    if((Hash::check($req->currentPassword,$Librarian->password))){
       if($req->newPassword == $req->confirmPassword){
         $Librarian->password=Hash::make($req->newPassword);
         $Librarian->save();
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


public function categoryupdate(Request $req){
  $book = Book::find($req->id);
  $book->category=$req->category;
  $book->update();

  $data= [
    'success' => 'Category Updated Successfully',
         ];
return response()->json($data);  


}
public function subjectupdate(Request $req){
  
  $book = Book::find($req->id);
  $book->subject=$req->subject;
  $book->update();
    $data= [
    'success' => 'Subject Updated Successfully',
         ];
return response()->json($data);  


}

public function librarianreturnmessage(Request $req){
  $book = Book::find($req->id);
  $book->book_status="2";
  $book->return_message=$req->returnmessage;
  $book->save();
  $data= [
      'success' => 'Book review status change Successfully',
           ];
  return response()->json($data); 

 }


 public function librarianedit(Request $req){
  $validator = Validator::make($req->all(),[
      'libraryType'=>'required|string',
      'libraryName'=>'required|string',
      'state'=>'required',
      'district'=>'required|string',
      'subject'=>'required',
      'city'=>'required|string',
      'Village'=>'required',
      'metaChecker'=>'required',
      'librarianName'=>'required',
      'librarianDesignation'=>'required|string',
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
     
           $librarian=Librarian::find($req->id);
         
          $librarian->libraryType = $req->libraryType;
          $librarian->libraryName = $req->libraryName;
          $librarian->state = $req->state;
          $librarian->district = $req->district;
          $librarian->city = $req->city;
          if ($librarian->email == $req->email) {
              $librarian->email = $req->email;
          } else {
              $existinglibrarian = Librarian::where('email', $req->email)->first();
          
              if ($existinglibrarian == null) {
                  $librarian->email = $req->email;
              } else {
                  $data = [
                      'error' => 'Email is already taken',
                  ];
                  return response()->json($data);
              }
          }
          $librarian->phoneNumber = $req->phoneNumber; 
          $librarian->Village = $req->Village;
          $librarian->metaChecker = $req->metaChecker;
          $librarian->librarianName = $req->librarianName;
          $librarian->librarianDesignation = $req->librarianDesignation;
          $librarian->subject = json_encode($req->subject);

           $librarian->save();

           $user =  $librarian->email;
           $record =  $librarian;
         
           $password = "Your Old Password";
          //  $rev =Mailurl::first();
          //  $url = $rev->name . "/member/login";
          //  $url = "http://127.0.0.1:8000/member/login";
          //  Notification::route('mail',$librarian->email)->notify(new Member1detailNotification($user, $url,$record,$password));  
           $data= [
              'success' => 'librarian Update Successfully',
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
          $librarian=Librarian::find($req->id);
          $librarian->libraryType = $req->libraryType;
          $librarian->libraryName = $req->libraryName;
          $librarian->state = $req->state;
          $librarian->district = $req->district;
          $librarian->city = $req->city;
          if ($librarian->email == $req->email) {
              $librarian->email = $req->email;
          } else {
              $existinglibrarian = Librarian::where('email', $req->email)->first();
          
              if ($existinglibrarian == null) {
                  $librarian->email = $req->email;
              } else {
                  $data = [
                      'error' => 'Email is already taken',
                  ];
                  return response()->json($data);
              }
          }
          $librarian->phoneNumber = $req->phoneNumber; 
          $librarian->Village = $req->Village;
          $librarian->subject = json_encode($req->subject);

          $librarian->metaChecker = $req->metaChecker;
          $librarian->librarianName = $req->librarianName;
          $librarian->librarianDesignation = $req->librarianDesignation;
          $librarian->password=Hash::make($req->newpassword);
           $librarian->save();
           $user =  $librarian->email;
           $record =  $librarian;
           $password = $req->password;
          //  $url = "http://127.0.0.1:8000/member/login";
          // $rev =Mailurl::first();
          // $url = $rev->name . "/member/login";
          //  Notification::route('mail',$librarian->email)->notify(new Member1detailNotification($user, $url,$record,$password));  
           $data= [
              'success' => 'librarian update Successfully',
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

  return redirect('/admin/librarydata')->with('librarian',$librarian); 

 }
 
  }
    }
    