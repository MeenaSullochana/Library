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
use App\Models\Ordermagazine;
use App\Models\Magazine;
use App\Models\Budget;
use App\Models\bookcopies;
use App\Models\periodicalcopies;
use App\Models\Orderbooks;


use App\Models\PeriodicalPublisher;
use App\Models\PeriodicalDistributor;
class LibrarianController extends Controller
{
        
//    public function metabooklist(){

//       $id=auth('librarian')->user()->id; 
//       $book = Book::where('book_reviewer_id','=',$id)->get();
//       return view('librarian/meta_book_list')->with('book',$book); 
     
//    }

//    public function metabooklist(){

//       $id=auth('librarian')->user()->id; 
//       $book = Book::where('book_reviewer_id','=',$id)->get();
// foreach($book as $key=>$val){
//       $check = $this->checkBookTitle($val);
//       $val->check = $check;
        
//      }
//       return view('librarian/meta_book_list')->with('book',$book); 
     
//    }

//  public function checkBookTitle($data)
// {
//   $newBookTitle = trim($data->book_title);

//   $processedNewTitle = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(preg_replace('/\s+/', '', preg_replace('/(?<!^)[A-Z]/', '_$0', $newBookTitle))));

//   $existingTitles = Book::pluck('book_title')->where("book_procurement_status",'=',1)->map(function ($title) {
//       return preg_replace('/[^a-zA-Z0-9]/', '', strtolower(trim($title)));
//   });
//   $c=0;
//   foreach($existingTitles as $key=>$val){
//     if($val == $processedNewTitle){
//       $c = $c+1;
//     }
//     else{
//       $c= $c;
//     }
//   }
//   $isbn = Book::where('isbn',"=",$data->isbn)->get();
//  $count = count($isbn);
//  if($c >1){
//   return "duplicate"; 
//  }else if($count >1){
//        return "repeated";
//  }else{
//        return "unique";
//  }


// }
public function metabooklist()
{
    $id = auth('librarian')->user()->id;
    $books = Book::where('book_reviewer_id', '=', $id)->get();

    // Get all existing titles and ISBNs to reduce database queries
    $existingTitles = Book::where('book_procurement_status', '=', 1)->pluck('book_title')->map(function ($title) {
        return preg_replace('/[^a-zA-Z0-9]/', '', strtolower(trim($title)));
    })->toArray();

    $existingIsbns = Book::pluck('isbn')->toArray();

    foreach ($books as $book) {
        $check = $this->checkBookTitle($book, $existingTitles, $existingIsbns);
        $book->check = $check;
    }

    return view('librarian/meta_book_list')->with('book', $books);
}

public function checkBookTitle($book, $existingTitles, $existingIsbns)
{
    $newBookTitle = trim($book->book_title);
    $processedNewTitle = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(preg_replace('/\s+/', '', preg_replace('/(?<!^)[A-Z]/', '_$0', $newBookTitle))));

    // Check for duplicate titles
    $titleCount = array_count_values($existingTitles);
    $isDuplicate = isset($titleCount[$processedNewTitle]) && $titleCount[$processedNewTitle] > 1;

    // Check for repeated ISBNs
    $isbnCount = array_count_values($existingIsbns);
    $isRepeated = isset($isbnCount[$book->isbn]) && $isbnCount[$book->isbn] > 1;

    if ($isDuplicate) {
        return "duplicate";
    } elseif ($isRepeated) {
        return "repeated";
    } else {
        return "unique";
    }
}
   public function librarianapprovestatus(Request $req){
    $book = Book::find($req->id);
    $book->book_status="1";
    $book->ddc=$req->ddc;
    $book->cc=$req->cc;
    $book->issueCommentc=$req->issueComment;
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

   public function librarianchangepasswordnew(Request $req){
    
    $validator = Validator::make($req->all(),[
        'currentPassword'=>'required|string',
        'newPassword'=>'required|string',
        'confirmPassword'=>'required',
        'email'=>'required',

    ]);
    if($validator->fails()){
        $data= [
            'error' => $validator->errors()->first(),
                 ];
        return response()->json($data);  
       
    }
    $Librarian=auth('librarian')->user();

    if((Hash::check($req->currentPassword,$Librarian->password))){
       if($req->newPassword == $req->confirmPassword){
         $Librarian->password=Hash::make($req->newPassword);
         $Librarian->checkstatus='1';
         $Librarian->email=$req->email;

         
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
    $Librarian=auth('librarian')->user();

    if((Hash::check($req->currentPassword,$Librarian->password))){
       if($req->newPassword == $req->confirmPassword){
         $Librarian->password=Hash::make($req->newPassword);
         $Librarian->checkstatus='1';

         
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
  $book->return_message_date=\Carbon\Carbon::now();
  $book->save();
  $data= [
      'success' => 'Book review status change Successfully',
           ];
  return response()->json($data); 

 }


 public function librarianedit(Request $req){
  $user = auth('librarian')->user();
  if($user->metaChecker == "yes"){
    $validator = Validator::make($req->all(),[
      'libraryType'=>'required|string',
      'libraryName'=>'required|string',
      'door_no'=>'required',
      'street'=>'required',
      'place'=>'required',
      'Village'=>'required',
      'taluk'=>'required',
      'post'=>'required',
      'pincode'=>'required',
      'landmark'=>'required',
      'state'=>'required',
      'district'=>'required|string',
      'subject'=>'required',
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
          $librarian->door_no = $req->door_no;
          $librarian->street = $req->street;
          $librarian->place = $req->place;
          $librarian->Village = $req->Village;
          $librarian->taluk = $req->taluk;
          $librarian->landmark = $req->landmark;
          $librarian->post = $req->post;
          $librarian->pincode = $req->pincode;
          $librarian->state = $req->state;
          $librarian->district = $req->district;
          if ($librarian->email == $req->email){
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
          $librarian->door_no = $req->door_no;
          $librarian->street = $req->street;
          $librarian->place = $req->place;
          $librarian->Village = $req->Village;
          $librarian->taluk = $req->taluk;
          $librarian->landmark = $req->landmark;
          $librarian->post = $req->post;
          $librarian->pincode = $req->pincode;
          $librarian->state = $req->state;
          $librarian->district = $req->district;

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
  }else{
    $validator = Validator::make($req->all(),[
      'libraryType'=>'required|string',
      'libraryName'=>'required|string',
      'door_no'=>'required',
      'street'=>'required',
      'place'=>'required',
      'Village'=>'required',
      'taluk'=>'required',
      'post'=>'required',
      'pincode'=>'required',
      'landmark'=>'required',
      'state'=>'required',
      'district'=>'required|string',
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
          $librarian->door_no = $req->door_no;
          $librarian->street = $req->street;
          $librarian->place = $req->place;
          $librarian->Village = $req->Village;
          $librarian->taluk = $req->taluk;
          $librarian->landmark = $req->landmark;
          $librarian->post = $req->post;
          $librarian->pincode = $req->pincode;
          $librarian->state = $req->state;
          $librarian->district = $req->district;

          if ($librarian->email == $req->email){
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
          $librarian->librarianName = $req->librarianName;
          $librarian->librarianDesignation = $req->librarianDesignation;
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
          $librarian->door_no = $req->door_no;
          $librarian->street = $req->street;
          $librarian->place = $req->place;
          $librarian->Village = $req->Village;
          $librarian->taluk = $req->taluk;
          $librarian->landmark = $req->landmark;
          $librarian->post = $req->post;
          $librarian->pincode = $req->pincode;
          $librarian->state = $req->state;
          $librarian->district = $req->district;
     
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

  public function magazine_orderview($id){
    $Ordermagazine=Ordermagazine::find($id);
    $magazineProduct =json_decode($Ordermagazine->magazineProduct);
    $magazinebudget = Budget::where('id', $Ordermagazine->budgetid)
    ->first();
    $magazinebudget1 = json_decode($magazinebudget->CategorieAmount);
    $datas=[];
      foreach($magazinebudget1  as $val1){
     foreach($magazineProduct  as $val){
      $magazinesrec = Magazine::find($val->magazineid);
      if($val1->name == $magazinesrec->category){
        $val->image=$magazinesrec->front_img;
        $val->language=$magazinesrec->language;
          array_push($datas,$val);
      }
     

     }
    }
     $Ordermagazine->magazineProduct = $datas;
 
 


    \Session::put('Ordermagazine', $Ordermagazine);
    return redirect('librarian/magazine-order-view');    

  }

  public function magazine_invoiceview($id){

     $Ordermagazineinvoice=Ordermagazine::find($id);
    $magazineProduct =json_decode($Ordermagazineinvoice->magazineProduct);
    $magazinebudget = Budget::where('id', $Ordermagazineinvoice->budgetid)
    ->first();
    $magazinebudget1 = json_decode($magazinebudget->CategorieAmount);
    $datas=[];
      foreach($magazinebudget1  as $val1){
     foreach($magazineProduct  as $val){
      $magazinesrec = Magazine::find($val->magazineid);
      if($val1->name == $magazinesrec->category){
        $val->image=$magazinesrec->front_img;
        $val->language=$magazinesrec->language;
          array_push($datas,$val);
      }
     

     }
    }
     $Ordermagazineinvoice->magazineProduct = $datas;
 
 
    \Session::put('Ordermagazineinvoice', $Ordermagazineinvoice);
    return redirect('librarian/magazine-invoice-view');    

  }
  public function magazineview($id){
    $magazineview = Magazine::find($id);

 
    \Session::put('magazineview', $magazineview);
    return redirect('librarian/magazine-view');    

  }
  public function librarianview($id){
    $Librarian = Librarian::find($id);

 
    \Session::put('Librarian', $Librarian);
    return redirect('librarian/librarian-view');    

  }
  
  public function bookcopies_pendinglist(){
    $bookcopies = bookcopies::where('status','=',"1")->get();
   $data=[];
    foreach($bookcopies as $val){
      $copies= json_decode($val->copies);
      foreach($copies as $val1){
           if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "0"){
            $val->copiesrec=$val1;
            if($val->usertype == "publisher"){
               $publisher=Publisher::find($val->userid);
              if($publisher !=null){
                $val->name=$publisher->publicationName;
                $val->phone=$publisher->mobileNumber;
              }
               
            }elseif($val->usertype== "distributor"){
        
                $distributor=Distributor::find($val->userid);
              if($distributor !=null){
                $val->name=$distributor->distributionName;
                $val->phone=$distributor->mobileNumber;
              }
            }else{
              $pubdist=PublisherDistributor::find($val->userid);
              if($pubdist !=null){
                $val->name=$pubdist->publicationDistributionName;
                $val->phone=$pubdist->mobileNumber;
              }
            }
               array_push($data,$val);

        }
     }

    }

    return view('librarian.bookcopies_pendinglist')->with('data',$data); 

 
    

  }
  
  public function periodicalcopies_pendinglist(){
   $periodicalcopies = periodicalcopies::where('status','=',"1")->get();
   $data=[];
    foreach($periodicalcopies as $val){
      $copies= json_decode($val->copies);
      foreach($copies as $val1){
           if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "0"){
            $val->copiesrec=$val1;
            if($val->usertype == "publisher"){
            $publisher=PeriodicalPublisher::find($val->userid);
              if($publisher !=null){
                $val->name=$publisher->publicationName;
                $val->phone=$publisher->mobileNumber;

                
              }
               
            }elseif($val->usertype== "distributor"){
        
              $distributor=PeriodicalDistributor::find($val->userid);
              if($distributor !=null){
                $val->name=$distributor->distributionName;
                $val->phone=$distributor->mobileNumber;

              }
            }
               array_push($data,$val);

        }
     }

    }

    return view('librarian.periodicalcopies_pendinglist')->with('data',$data); 

 
    

  }
  public function bookcopiesstatus(Request $req){
    $bookcopies = bookcopies::find($req->id);

    $copies= json_decode($bookcopies->copies);
    $rec=[];
   $count =0;
   $countdata = 0;
    foreach($copies as $val1){
      if($val1->status  == "0"){
        if($val1->librarytype  ==  auth('librarian')->user()->libraryName){
              if($val1->librarytype == "Anna Centenary Library"){
                $book = Book::find($bookcopies->bookid);
                $book->book_procurement_status="1";
                $book->save();
              }
          
            $val1->status="1";
            $count =$count + 1;
            array_push($rec,$val1);
          
        }else{
          array_push($rec,$val1);

        }
     
      
      }else if($val1->status  == "1"){
        $count =$count +1;
        array_push($rec,$val1);
      }
      $countdata = $countdata +1;

    }

     if($count == $countdata ){

      $bookcopies->status="0";
      $bookcopies->save();
     }
     $bookcopies->copies=json_encode($rec);
     if($bookcopies->save()){
      return response()->json(['success' => 'copies status  change successfull']);

     }

  }
   

  public function periodicalcopiesstatus(Request $req){


    $periodicalcopies = periodicalcopies::find($req->id);

    $copies= json_decode($periodicalcopies->copies);
    $rec=[];
   $count =0;
   $countdata = 0;
    foreach($copies as $val1){
      if($val1->status  == "0"){
        if($val1->librarytype  ==  auth('librarian')->user()->libraryName){
             $val1->status="1";
        
            $count =$count + 1;
            array_push($rec,$val1);
          
        }else{
          array_push($rec,$val1);

        }
     
      
      }else if($val1->status  == "1"){
        $count =$count +1;
        array_push($rec,$val1);
      }
      $countdata = $countdata +1;

    }

     if($count == $countdata ){
      $periodical = Magazine::find($periodicalcopies->periodicalid);
      $periodical->periodical_procurement_status="1";
      $periodical->save();
      $periodicalcopies->status="0";
      $periodicalcopies->save();
     }
     $periodicalcopies->copies=json_encode($rec);
     if($periodicalcopies->save()){
      return response()->json(['success' => 'copies status  change successfull']);

     }

  }
  public function bookcopies_completelist(){
    $bookcopies = bookcopies::get();
   $data=[];
    foreach($bookcopies as $val){
      $copies= json_decode($val->copies);
      foreach($copies as $val1){
    
           if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){
            $val->copiesrec=$val1;
            if($val->usertype == "publisher"){
              $publisher=Publisher::find($val->userid);
              if($publisher !=null){
                $val->name=$publisher->publicationName;
                $val->phone=$publisher->mobileNumber;

              }
               
            }elseif($val->usertype == "distributor"){
        
              $distributor=Distributor::find($val->userid);
              if($distributor !=null){
                $val->name=$distributor->distributionName;
                $val->phone=$distributor->mobileNumber;

              }
            }else{
              $pubdist=PublisherDistributor::find($val->userid);
              if($pubdist !=null){
                $val->name=$pubdist->publicationDistributionName;
                $val->phone=$pubdist->mobileNumber;
              }
            }
               array_push($data,$val);

        }
     }

    }
  
    return view('librarian.bookcopies_completelist')->with('data',$data); 

 
    

  }
  // 
  public function periodicalcopies_completelist(){

  $periodicalcopies = periodicalcopies::where('status','=',"0")->get();
   $data=[];
    foreach($periodicalcopies as $val){
      $copies= json_decode($val->copies);
      foreach($copies as $val1){
           if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){
            $val->copiesrec=$val1;
            if($val->usertype == "publisher"){
              $publisher=PeriodicalPublisher::find($val->userid);
              if($publisher !=null){
                $val->name=$publisher->publicationName;
              }
               
            }elseif($val->usertype== "distributor"){
        
              $distributor=PeriodicalDistributor::find($val->userid);
              if($distributor !=null){
                $val->name=$distributor->distributionName;
      
              }
            }
               array_push($data,$val);

        }
     }

    }

    return view('librarian.periodicalcopies_completelist')->with('data',$data); 


  }
  public function magazine_views($id){
    $magazine = Magazine::find($id);


   \Session::put('magazine', $magazine);
   return redirect('librarian/magazineview');    

 }



 


 public function multibookcopiesstatus(Request $req){
  $datacount =0;
  foreach($req->book as $bookval){
  $bookcopies = bookcopies::find($bookval);

  $copies= json_decode($bookcopies->copies);
  $rec=[];
 $count =0;
 $countdata = 0;
  foreach($copies as $val1){
    if($val1->status  == "0"){
      if($val1->librarytype  ==  auth('librarian')->user()->libraryName){
            if($val1->librarytype == "Anna Centenary Library"){
              $book = Book::find($bookcopies->bookid);
              $book->book_procurement_status="1";
              $book->save();
            }
        
          $val1->status="1";
          $count =$count + 1;
          array_push($rec,$val1);
        
      }else{
        array_push($rec,$val1);

      }
   
    
    }else if($val1->status  == "1"){
      $count =$count +1;
      array_push($rec,$val1);
    }
    $countdata = $countdata +1;

  }

   if($count == $countdata ){

    $bookcopies->status="0";
    $bookcopies->save();
   }
   $bookcopies->copies=json_encode($rec);
   if($bookcopies->save()){
    $datacount=$datacount + 1;

   }
  }
    if($datacount == count($req->book)){
          return response()->json(['success' => 'copies status  change successfull']);

    }
}

public function book_orderview($id){
 
  $Orderbook=Orderbooks::find($id);
  $bookProduct =json_decode($Orderbook->bookProduct);
  $bookbudget = Budget::where('id', $Orderbook->budgetid)
  ->first();
  $bookbudget1 = json_decode($bookbudget->CategorieAmount);
  $datas=[];
    foreach($bookbudget1  as $val1){
   foreach($bookProduct  as $val){
    $booksrec = Book::find($val->bookid);
    if($val1->name == $booksrec->category){
      $val->image=$booksrec->front_img;
      $val->language=$booksrec->language;
        array_push($datas,$val);
    }
   

   }
  }
   $Orderbook->bookProduct = $datas;




  \Session::put('Orderbook', $Orderbook);
  return redirect('librarian/book-order-view');    

}



public function metaperiodicallist()
{
    $id = auth('librarian')->user()->id;
    $Magazine = Magazine::where('periodical_reviewer_id', '=', $id)->get();

 

    return view('librarian/meta_periodical_list')->with('Magazine', $Magazine);
}

public function librarianrejectstatus_perio(Request $req){
  if($req->rejectmessage != null){
    $Magazine = Magazine::find($req->id);
    $Magazine->periodical_status="0";
    $Magazine->reject_message=$req->rejectmessage;
    $Magazine->save();
    $data= [
        'success' => 'Periodical review status change Successfully',
             ];
    return response()->json($data); 
  }else{
    $data= [
      'error' => 'Remark field is required',
           ];
  return response()->json($data); 

  }


 }

 
 public function meta_periodical_reject(){
   $id=auth('librarian')->user()->id; 
     $Magazine = Magazine::where('periodical_reviewer_id','=',$id)->where('periodical_status','=','0')->get();
   return view('librarian/meta_periodical_reject')->with('Magazine',$Magazine); 
  }

 
  public function meta_periodical_pending(){
    $id=auth('librarian')->user()->id; 
    $Magazine = Magazine::where('periodical_reviewer_id','=',$id)->where('periodical_status','=',Null)->get();
    return view('librarian/meta_periodical_pending')->with('Magazine',$Magazine); 
   }



  public function meta_complete_periodical_list(){
    $id=auth('librarian')->user()->id; 
    $Magazine = Magazine::where('periodical_reviewer_id','=',$id)->where('periodical_status','=','1')->get();
    return view('librarian/meta_complete_periodical_list')->with('Magazine',$Magazine); 
   }

   public function meta_periodical_return(){
    $id=auth('librarian')->user()->id; 
    $Magazine = Magazine::where('periodical_reviewer_id','=',$id)->where('periodical_status','=','2')->get();
    return view('librarian/meta_periodical_return')->with('Magazine',$Magazine); 
   }

   public function meta_periodical_update_return(){
    $id=auth('librarian')->user()->id; 
    $Magazine = Magazine::where('periodical_reviewer_id','=',$id)->where('periodical_status','=','3')->get();
    return view('librarian/meta_periodical_update_return')->with('Magazine',$Magazine); 
   }
  //  
  public function librarianreturnmessage_perio(Request $req){

   
    $Magazine = Magazine::find($req->id);
    $Magazine->periodical_status="2";
    $Magazine->return_message=$req->returnmessage;
    $Magazine->save();
    $data= [
        'success' => 'Periodical review status change Successfully',
             ];
    return response()->json($data); 
  
   }

   public function librarianapprovestatus_perio(Request $req){
    $Magazine = Magazine::find($req->id);
    $Magazine->periodical_status="1";
    $Magazine->ddc=$req->ddc;
    $Magazine->cc=$req->cc;
    $Magazine->issueComment=$req->issueComment;
    $Magazine->save();
    $data= [
        'success' => 'Periodical review status change Successfully',
             ];
    return response()->json($data); 

   }

    }
    