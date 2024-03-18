<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\BookReviewStatus;
use App\Models\Publisher;
use App\Models\Librarian;
use App\Models\Notifications;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Str;
use App\Models\ApplicationApply;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 

class BookController extends Controller
{
    

public function bookmanageall(){
      
  $data = Book::
  where('book_active_status', '=', '1')
  ->orderBy('marks', 'desc')
  ->get();
      return view('admin.book_manage_all')->with('data',$data);   
}

public function bookmanageview($id){
   
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
    return redirect('admin/bookmanageview'); 
    
}



   
  






  

public function meta_book_list(){
 $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'=',null)->get();
 $arrdata=[];
 foreach($data as $key=>$val){
  $check = $this->checkBookTitle($val);
  $val->check = $check;
    
 }
  return view('admin.meta_book_list')->with('data',$data);
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
  public function metabooks($role){
  $query = Book::where("book_procurement_status", '=', 1)
      ->where("book_reviewer_id", '=', null);

  if ($role !='All' ) {
      $query->where("subject", '=', $role);
  }

  $data = $query->get();
  foreach($data as $key=>$val){
    $check = $this->checkBookTitle($val);
    $val->check = $check;
      
   }
  $tbodyHtml = '';

  if ($data->isEmpty()) {
      $tbodyHtml = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
  } else {
      $index = 1;

      foreach ($data as $val) {
          $language = '';
          if ($val->language == "Other_Indian") {
              $language = $val->other_indian;
          } elseif ($val->language == "other_foreign") {
              $language = $val->other_foreign;
          } else {
              $language = $val->language;
          }
       if($val->check == "unique"){
        $tbodyHtml .= '<tr>';
        $tbodyHtml .= '<td>';
        $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
        $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val->id . '" data-book-id="' . $val->id . '" >';
        $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '<td>' . $index . '</td>';
        $tbodyHtml .= '<td>';
        $tbodyHtml .= '<div class="products">';
        $tbodyHtml .= '<div>';
        $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val->id . '">' . $val->book_title . '</a></h6>';
        $tbodyHtml .= '<span class="text-left">' . $val->subtitle . '</span>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '<td>' . $language . '</td>';
$tbodyHtml .= '<td>' . $val->subject . '</td>';
        $tbodyHtml .= '<td>' . $val->isbn . '</td>';
        $tbodyHtml .= '<td>' . $val->author_name . '</td>';
        $tbodyHtml .= '<td>' . $val->user_type . '</td>';
        $tbodyHtml .= '<td>' . $val->nameOfPublisher . '</td>';
        $tbodyHtml .= '<td data-label="controlq">';
        $tbodyHtml .= '<div class="d-flex mt-p0">';
        $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
        $tbodyHtml .= '<i class="fa fa-eye"></i>';
        $tbodyHtml .= '</a>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '</tr>';

        $index++;
       }else{
        $tbodyHtml .= '<tr class="red-row">';
        $tbodyHtml .= '<td>';
        $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
        $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val->id . '" data-book-id="' . $val->id . '" >';
        $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '<td>' . $index . '</td>';
        $tbodyHtml .= '<td>';
        $tbodyHtml .= '<div class="products">';
        $tbodyHtml .= '<div>';
        $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val->id . '">' . $val->book_title . '</a></h6>';
        $tbodyHtml .= '<span class="text-left">' . $val->subtitle . '</span>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '<td>' . $language . '</td>';
$tbodyHtml .= '<td>' . $val->subject . '</td>';
        $tbodyHtml .= '<td>' . $val->isbn . '</td>';
        $tbodyHtml .= '<td>' . $val->author_name . '</td>';
        $tbodyHtml .= '<td>' . $val->user_type . '</td>';
        $tbodyHtml .= '<td>' . $val->nameOfPublisher . '</td>';
        $tbodyHtml .= '<td data-label="controlq">';
        $tbodyHtml .= '<div class="d-flex mt-p0">';
        $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
        $tbodyHtml .= '<i class="fa fa-eye"></i>';
        $tbodyHtml .= '</a>';
        $tbodyHtml .= '</div>';
        $tbodyHtml .= '</td>';
        $tbodyHtml .= '</tr>';

        $index++;
       }
         
      }
  }


        $rev = Librarian::where("status", '=', '1')
                        ->where("metaChecker", '=', 'yes')
                        ->get();

        $tbodyHtml2 = ''; // Initialize the variable to store HTML
        $index1 = 1; // Initialize the index variable

        foreach ($rev as $key => $val) {
            $rec = json_decode($val->subject, true); // Decode the JSON string to an array

            if (in_array($role, $rec)) {
             
                // Prepare the HTML for each record based on the conditions
                $tbodyHtml2 .= '<tr>';
                $tbodyHtml2 .= '<td>';
                $tbodyHtml2 .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
                $tbodyHtml2 .= '<input type="checkbox" class="form-check-input librarianitem" id="customCheckBox' . ($index1 + 3) . '" required="" data-librarian-id="' . $val->id . '" value="' . $val->id . '">';
                $tbodyHtml2 .= '<label class="form-check-label" for="customCheckBox' . ($index1 + 3) . '"></label>';
                $tbodyHtml2 .= '</div>';
                $tbodyHtml2 .= '</td>';                
                $tbodyHtml2 .= '<td>' . $index1 . '</td>';
                $tbodyHtml2 .= '<td><span>' . $val->librarianName . '</span></td>';
                $tbodyHtml2 .= '<td><span>' . $val->libraryName . '</span></td>';
                $tbodyHtml2 .= '<td>';

                // Loop through each subject in $rec
                $count = count($rec);
foreach ($rec as $key => $subject) {
    $tbodyHtml2 .= '<span>' . $subject . '</span>';
    if ($key < $count - 1) {
        $tbodyHtml2 .= ' '; 
    }
}

                $tbodyHtml2 .= '</td>';
                $tbodyHtml2 .= '<td data-label="controlq">';
                $tbodyHtml2 .= '<div class="d-flex mt-p0">';
                $tbodyHtml2 .= '<a href="/admin/librarianview/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
                $tbodyHtml2 .= '<i class="fa fa-eye"></i>';
                $tbodyHtml2 .= '</a>';
                $tbodyHtml2 .= '</div>';
                $tbodyHtml2 .= '</td>';
                $tbodyHtml2 .= '</tr>';
                $index1++; // Increment the index after each iteration
            }
        }
        
       

        return response()->json(['success' => $tbodyHtml, 'success2' => $tbodyHtml2]);
    }


// public function metabooks($role) {
//   $query = Book::where("book_procurement_status", '=', 1)
//       ->where("book_reviewer_id", '=', null);

//   if ($role !='All' ) {
//       $query->where("subject", '=', $role);
//   }

//   $data = $query->get();
//   foreach($data as $key=>$val){
//     $check = $this->checkBookTitle($val);
//     $val->check = $check;
      
//    }
//   $tbodyHtml = '';

//   if ($data->isEmpty()) {
//       $tbodyHtml = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
//   } else {
//       $index = 1;

//       foreach ($data as $val) {
//           $language = '';
//           if ($val->language == "Other_Indian") {
//               $language = $val->other_indian;
//           } elseif ($val->language == "other_foreign") {
//               $language = $val->other_foreign;
//           } else {
//               $language = $val->language;
//           }
//        if($val->check == "unique"){
//         $tbodyHtml .= '<tr>';
//         $tbodyHtml .= '<td>';
//         $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
//         $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val->id . '" data-book-id="' . $val->id . '" >';
//         $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '<td>' . $index . '</td>';
//         $tbodyHtml .= '<td>';
//         $tbodyHtml .= '<div class="products">';
//         $tbodyHtml .= '<div>';
//         $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val->id . '">' . $val->book_title . '</a></h6>';
//         $tbodyHtml .= '<span class="text-left">' . $val->subtitle . '</span>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '<td>' . $language . '</td>';
// $tbodyHtml .= '<td>' . $val->subject . '</td>';
//         $tbodyHtml .= '<td>' . $val->isbn . '</td>';
//         $tbodyHtml .= '<td>' . $val->author_name . '</td>';
//         $tbodyHtml .= '<td>' . $val->user_type . '</td>';
//         $tbodyHtml .= '<td>' . $val->nameOfPublisher . '</td>';
//         $tbodyHtml .= '<td data-label="controlq">';
//         $tbodyHtml .= '<div class="d-flex mt-p0">';
//         $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
//         $tbodyHtml .= '<i class="fa fa-eye"></i>';
//         $tbodyHtml .= '</a>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '</tr>';

//         $index++;
//        }else{
//         $tbodyHtml .= '<tr class="red-row">';
//         $tbodyHtml .= '<td>';
//         $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
//         $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val->id . '" data-book-id="' . $val->id . '" >';
//         $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '<td>' . $index . '</td>';
//         $tbodyHtml .= '<td>';
//         $tbodyHtml .= '<div class="products">';
//         $tbodyHtml .= '<div>';
//         $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val->id . '">' . $val->book_title . '</a></h6>';
//         $tbodyHtml .= '<span class="text-left">' . $val->subtitle . '</span>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '<td>' . $language . '</td>';
// $tbodyHtml .= '<td>' . $val->subject . '</td>';
//         $tbodyHtml .= '<td>' . $val->isbn . '</td>';
//         $tbodyHtml .= '<td>' . $val->author_name . '</td>';
//         $tbodyHtml .= '<td>' . $val->user_type . '</td>';
//         $tbodyHtml .= '<td>' . $val->nameOfPublisher . '</td>';
//         $tbodyHtml .= '<td data-label="controlq">';
//         $tbodyHtml .= '<div class="d-flex mt-p0">';
//         $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
//         $tbodyHtml .= '<i class="fa fa-eye"></i>';
//         $tbodyHtml .= '</a>';
//         $tbodyHtml .= '</div>';
//         $tbodyHtml .= '</td>';
//         $tbodyHtml .= '</tr>';

//         $index++;
//        }
         
//       }
//   }

//   $rev = Librarian::where("status", '=', '1')
//   ->where("metaChecker", '=', 'yes')
//   ->get();

// $tbodyHtml2 = ''; // Initialize the variable to store HTML
// $index1 = 1; // Initialize the index variable
// foreach ($rev as $key => $val) {
// $rec = json_decode($val->subject, true); // Decode the JSON string to an array

// if (in_array($role, $rec)) {
// // Prepare the HTML for each record based on the conditions
// $tbodyHtml2 .= '<tr>';
// $tbodyHtml2 .= '<td>';
// $tbodyHtml2 .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
// $tbodyHtml2 .= '<input type="checkbox" class="form-check-input librarianitem" id="customCheckBox' . ($index + 3) . '" required="" data-librarian-id="' . $val->id . '" value="' . $val->id . '">';
// $tbodyHtml2 .= '<label class="form-check-label" for="customCheckBox' . ($index + 3) . '"></label>';
// $tbodyHtml2 .= '</div>';
// $tbodyHtml2 .= '</td>';
// $tbodyHtml2 .= '<td>' . $index1  . '</td>';
// $tbodyHtml2 .= '<td><span>' . $val->librarianName . '</span></td>';
// $tbodyHtml2 .= '<td><span>' . $val->libraryName . '</span></td>';
// $tbodyHtml2 .= '<td>';

// // Loop through each subject in $rec
// foreach ($rec as $subject) {
// $tbodyHtml2 .= '<span>' . $subject . '</span>';
// }

// $tbodyHtml2 .= '</td>';
// $tbodyHtml2 .= '<td data-label="controlq">';
// $tbodyHtml2 .= '<div class="d-flex mt-p0">';
// $tbodyHtml2 .= '<a href="/admin/librarianview/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
// $tbodyHtml2 .= '<i class="fa fa-eye"></i>';
// $tbodyHtml2 .= '</a>';
// $tbodyHtml2 .= '</div>';
// $tbodyHtml2 .= '</td>';
// $tbodyHtml2 .= '</tr>';
// $index1++; // Increment the index after each iteration
// }
// }

// if (empty($tbodyHtml2)) {
// $tbodyHtml2 = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
// }


//   return response()->json(['success' => $tbodyHtml,'success2' => $tbodyHtml2]);
// }

public function meta_pending_book(){
  $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'!=',null)->where("book_status",'=',null)->get();
  return view('admin.meta_pending_book')->with('data',$data);
}
public function meta_book_complete(){
  $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'!=',null)->where("book_status",'!=',null)->get();
  return view('admin.meta_book_complete')->with('data',$data);
}

public function meta_book_assign(Request $req,$id){
  $book = Book::find($id);
if(isset($req->library)){
  $lib = Librarian::where("metaChecker",'=',"yes")->where("libraryType",'=',$req->library)->where('status',1)->get();
  $data=(Object)[
    'book'=>$book,
    'lib'=>$lib,
    'type'=>$req->library
  ];
}else{
  $lib = Librarian::where("metaChecker",'=',"yes")->where('status',1)->get();
$data=(Object)[
  'book'=>$book,
  'lib'=>$lib,
  'type'=>"",
];
}
return redirect('admin/meta_book_assign')->with('data',$data);
}

public function assignlibrarian(Request $req){
 
  $validator = Validator::make($req->all(), [
    
    'bookId'=> 'required|array|min:1',
    'metaLibraianId' => 'required|array|size:1',
  
]);

if ($validator->fails()) {
    $data = [
        'error' => $validator->errors()->first(),
    ];
    return response()->json($data);
}


foreach($req->bookId as $key=>$val){
  $book = Book::find($val);
  $lib = $req->metaLibraianId[0];
  $book->book_reviewer_id = $lib;
  $book->save();

}

$notifi= new Notifications();
$notifi->message = "Book Assengend For Metacheck";
$notifi->to=$req->metaLibraianId[0];
$notifi->from=auth('admin')->user()->id;
$notifi->type="librarian";
$notifi->save();
  $data= [
    'success' => 'Book assigned Successfully',
         ];
return response()->json($data);   
}

public function procur_book_list(){
  $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'!=',null)->where("book_status",'=',1)->get();
  return view('admin.procur_book_list')->with('data',$data);
}

public function procur_assign($id){
  $book = Book::find($id);
  $internal1 = Reviewer::where("reviewerType",'=',"internal")->where('status',1)->get();
  $internal=[];
  $external=[];
  $public=[];
  foreach($internal1 as $key=>$val){
    $rec = BookReviewStatus::where("book_id",$book->id)->where("reviewer_id",$val->id)->first();
    if($rec != null){
        $val->assigned = 1;
        array_push($internal,$val);
    }else{
      $val->assigned = 0;
      array_push($internal,$val);
    }
  }
  
  $external1 = Reviewer::where("reviewerType",'=',"external")->where('status',1)->get();
  foreach($external1 as $key=>$val){
    $rec = BookReviewStatus::where("book_id",$book->id)->where("reviewer_id",$val->id)->first();
    if($rec != null){
        $val->assigned = 1;
        array_push($external,$val);
    }else{
      $val->assigned = 0;
      array_push($external,$val);
    }
  }
  $public1 = Reviewer::where("reviewerType",'=',"public")->where('status',1)->get();
  foreach($public1 as $key=>$val){
    $rec = BookReviewStatus::where("book_id",$book->id)->where("reviewer_id",$val->id)->first();
    if($rec != null){
        $val->assigned = 1;
        array_push($public,$val);
    }else{
      $val->assigned = 0;
      array_push($public,$val);
    }
  }

  $data=(Object)[
    'book'=>$book,
    'internal'=>$internal,
    'external'=>$external,
    'public'=>$public
  ];

  return redirect('admin/procur_book_assign')->with('data',$data);
}

public function assignreviewer(Request $req){
  $book =$req->bookid;
  $rev = Reviewer::where("id",'=',$req->id)->first();
  $bookreview = new BookReviewStatus();
  $bookreview->book_id= $book;
  $bookreview->reviewer_id= $rev->id;
  $bookreview->reviewertype= $rev->reviewerType;
  $bookreview->save();
  $data= [
    'success' => 'Book assigned Successfully',
    'url'=>"/admin/procur_book_assign/".$book
         ];
return response()->json($data);   
}

public function procur_pending_list(){
  $data = BookReviewStatus::groupBy('book_id')->get('book_id');
  $record = [];
  foreach($data as $key=>$val){
    $data1 = BookReviewStatus::where('book_id',$val->book_id)->where('mark','!=',null)->get();
    if(sizeof($data1) == 0){
       $book = Book::find($val->book_id);
       $internalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','internal')->count();
       $externalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','external')->count();
       $publiccount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','public')->count();

      $obj=(Object)[
           'book'=>$book,
           'internalcount'=>$internalcount,
           'externalcount'=>$externalcount,
           'publiccount'=>$publiccount,
      ];
      array_push($record,$obj);
   }
  }
  return view('admin.procur_pending_list')->with('record',$record);
}
public function procur_complete_list(){
  $data = BookReviewStatus::groupBy('book_id')->get('book_id');
  $record = [];
  foreach($data as $key=>$val){
    $avginternal=0;
    $avgexternal=0;
    $avgpublic=0;

    $data1 = BookReviewStatus::where('book_id',$val->book_id)->where('mark','!=',null)->get();
    if(sizeof($data1) != 0){
       $book = Book::find($val->book_id);
       $internalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','internal')->count();
       $externalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','external')->count();
       $publiccount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','public')->count();
       $rinternalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','internal')->where('mark','!=',null)->count();
       $rexternalcount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','external')->where('mark','!=',null)->count();
       $rpubliccount= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','public')->where('mark','!=',null)->count();
       $suminternal= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','internal')->where('mark','!=',null)->sum('mark');
       $sumexternal= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','external')->where('mark','!=',null)->sum('mark');
       $sumpublic= BookReviewStatus::where('book_id',$val->book_id)->where('reviewertype','public')->where('mark','!=',null)->sum('mark');
     if($rinternalcount != 0){
      $avginternal = $suminternal/$rinternalcount;
     }
      if($rexternalcount != 0){
        // $avgexternal = $sumexternal/$rexternalcount;
        $avgexternal = ($externalcount/$rexternalcount) * $sumexternal;
      }
      if($rpubliccount != 0){
        $avgpublic = $sumpublic/$rpubliccount;
      }
     
      // $total = (2*$avgexternal) + $avginternal + $avgpublic;
      $total = ($avgexternal) + $avginternal + $avgpublic;
       $obj=(Object)[
           'book'=>$book,
           'internalcount'=>$internalcount,
           'externalcount'=>$externalcount,
           'publiccount'=>$publiccount,
           'rinternalcount'=>$rinternalcount,
           'rexternalcount'=>$rexternalcount,
           'rpubliccount'=>$rpubliccount,
           'avginternal'=>$avginternal,
           'avgexternal'=>$avgexternal,
           'avgpublic'=>$avgpublic,
           'total'=>$total
      ];
      array_push($record,$obj);
   }
  }
  return view('admin.procur_complete_list')->with('record',$record);
}
public function procur_reject_view(){
  $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'!=',null)->where("book_status",'=',0)->get();
  return view('admin.procur_reject_view')->with('data',$data);
}

public function get_books($id)
{  

  if($id == 'all'){
    $books = Book::where('book_procurement_status', '=', '1')->where('book_status', '=', '1')->get();
  }else{
    $books = Book::where('subject', $id)->where('book_procurement_status', '=', '1')->where('book_status', '=', '1')->get();

}
    $reviewers = Reviewer::where('subject',$id)->where('reviewerType', '=', 'external')->where('status', '=', 1)->get();

    $html = '';
    $htmldata = '';

    if ($books->isEmpty()) {
        $html = '<tr><td colspan="3">No books found.</td></tr>';
    } else {
      $i=0;
        foreach ($books as $key => $val) {
            $datass = BookReviewStatus::where('book_id', $val->id)->first();
             
            if ($datass == null) {
            
             
             
              if ($val->language =="Other_Indian") {
                $language = $val->other_indian;
              }elseif ($val->language =="other_foreign") {
                  $language = $val->other_foreign;
              
              }else{
             
                $language= $val->language;
              }
              $i=$i + 1;
                $html .= '<tr>
                    <td>
                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                    <input type="checkbox" class="form-check-input bookitem" id="checkItem_' . $val->id . '" data-book-id="' . $val->id . '" required="">
                    <label class="form-check-label" for="checkItem_' . $val->id . '"></label>
                </div>
                    </td>
                    <td>' . ($i) . '</td>
                    <td><small>' . $val->book_title . '</small></td>
                    <td>' .$language . '</td>
                    <td>' .$val->subject . '</td>
                    <td>' .$val->nameOfPublisher . '</td>
                </tr>';
            }
        }
    }

    if 
    ($reviewers->isEmpty()) {
        $htmldata = '<tr><td colspan="3">No expert reviewers found.</td></tr>';
    } else
     {
        foreach ($reviewers as $key => $val) {
            $htmldata .= '<tr>
                <td>
                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                <input type="checkbox" class="form-check-input externel" id="checkItem_' . $val->id . '" data-externel-id="' . $val->id . '" required="">
                <label class="form-check-label" for="customCheckBox2" value="' . $val->id . '"></label>
            </div>
                </td>
                <td>' . ($key + 1) . '</td>
                <td>' . $val->name . '</td>
                <td>' .$val->subject . '</td>

            </tr>';
        }
    }
    $tbodyHtml2 = ''; 
    $index1 = 1; 
    $internals = Reviewer::where('subject',$id)->where('reviewerType', '=', 'internal')->where('status', '=', 1)->get();
    if 
    ($internals->isEmpty()) {
        $tbodyHtml2 = '<tr><td colspan="3">No Librarian reviewers found.</td></tr>';
    } else
     {
    foreach ($internals as $key => $val) {         
            $tbodyHtml2 .= '<tr>';
            $tbodyHtml2 .= '<td>';
            $tbodyHtml2 .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
            $tbodyHtml2 .= '<input type="checkbox" class="form-check-input internalitem" id="customCheckBox' . ($index1 + 3) . '" required="" data-librarian-id="' . $val->id . '" value="' . $val->id . '">';
            $tbodyHtml2 .= '<label class="form-check-label" for="customCheckBox' . ($index1 + 3) . '"></label>';
            $tbodyHtml2 .= '</div>';
            $tbodyHtml2 .= '</td>';                
            $tbodyHtml2 .= '<td>' . $index1 . '</td>';
            $tbodyHtml2 .= '<td><span>' . $val->name . '</span></td>';
            $tbodyHtml2 .= '<td><span>' . $val->libraryName . '</span></td>';
            $tbodyHtml2 .= '<td><span>' . $val->subject . '</span></td>';
           
            $tbodyHtml2 .= '</tr>';
            $index1++; 
        
    }
  }
  if 
  ($books->isEmpty()) {
      $tbodyHtml3 = '<tr><td colspan="3">No Public reviewers found.</td></tr>';
  } else
   {
  $tbodyHtml3 = ''; 
  $index1 = 1; 
  $cat=$books[0]->category;
  $internals = Reviewer::where('Category','=',$cat)->where('reviewerType', '=', 'public')->where('status', '=', 1)->get();
  if 
  ($internals->isEmpty()) {
      $tbodyHtml3 = '<tr><td colspan="3">No external reviewers found.</td></tr>';
  } else
   {
  foreach ($internals as $key => $val) {         
          $tbodyHtml3 .= '<tr>';
          $tbodyHtml3 .= '<td>';
          $tbodyHtml3 .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
          $tbodyHtml3 .= '<input type="checkbox" class="form-check-input publiclitem" id="customCheckBox' . ($index1 + 3) . '" required="" data-public-id="' . $val->id . '" value="' . $val->id . '">';
          $tbodyHtml3 .= '<label class="form-check-label" for="customCheckBox' . ($index1 + 3) . '"></label>';
          $tbodyHtml3 .= '</div>';
          $tbodyHtml3 .= '</td>';                
          $tbodyHtml3 .= '<td>' . $index1 . '</td>';
          $tbodyHtml3 .= '<td><span>' . $val->name . '</span></td>';
          $tbodyHtml3 .= '<td><span>' . $val->Category . '</span></td>';
          $tbodyHtml3 .= '<td><span>' . $val->district . '</span></td>';
         
          $tbodyHtml3 .= '</tr>';
          $index1++; 
      
  }
}
   }

    $data = [
        'success' => $html,
        'success11' => $htmldata,
        'success22' => $tbodyHtml2,
        'success33' => $tbodyHtml3,

    ];

    return response()->json($data);
}

public function reviewpost($bookid){
  $book = Book::find($bookid);
  $rev = BookReviewStatus::where('book_id',$book->id)->where('mark','!=',null)->get();
  if(sizeof($rev) != 0){
    foreach($rev as $key=>$val){
      $reviewer = Reviewer::find($val->reviewer_id);
      $val->reviewer = $reviewer;
    }
  }
  $data=(Object)[
      'book'=>$book,
      'rev'=>$rev
    ];
  return redirect('admin/procur_complete_view')->with('data',$data);  
}


     public function bookassign_data(Request $req){
 
      $validator = Validator::make($req->all(), [
      
        'bookId'=> 'required|array|min:1',
        'LibrarianReviewverId' => 'required|array|min:1',
        'expectReviewverId' => 'required|array|min:1',
        'publicReviewverId'   => 'required|array|min:1',
    ]);

    if ($validator->fails()) {
        $data = [
            'error' => $validator->errors()->first(),
        ];
        return response()->json($data);
    }
   $bookId=$req->bookId;
   $internalReviewverId=$req->LibrarianReviewverId;
   $externalReviewverId=$req->expectReviewverId;
   $publicReviewverId=$req->publicReviewverId;
   $mergedArray = array_merge($internalReviewverId, $externalReviewverId, $publicReviewverId);
   foreach($bookId as $key=>$val1){
         
           foreach($mergedArray as $key=>$val){
            $rev = Reviewer::where("id",'=',$val)->first();
       
          $bookreview = new BookReviewStatus();
          $bookreview->book_id= $val1;
           $bookreview->reviewer_id= $rev->id;
           $bookreview->reviewertype= $rev->reviewerType;
           $bookreview->save();
           }
   }
  
   foreach($mergedArray as $key=>$val){
   $notifi= new Notifications();
      $notifi->message = "Book Assengend For Review";
      $notifi->to=$val;
      $notifi->from=auth('admin')->user()->id;
      $notifi->type="reviewer";
      $notifi->save();

   }
    $data= [
      'success' => 'Book assigned Successfully',
           ];
  return response()->json($data);   
  }

  // public function metabooks($role) {
  //   if ($role == "publisher") {
  //       $data1 = Book::where("book_procurement_status", '=', 1)
  //           ->where("book_reviewer_id", '=', null)
  //           ->where("user_type", '=', $role)
  //           ->get();
  //   } else if ($role == "distributor") {
  //       $data1 = Book::where("book_procurement_status", '=', 1)
  //           ->where("book_reviewer_id", '=', null)
  //           ->where("user_type", '=', $role)
  //           ->get();
  //   } else if ($role == "publisher_distributor") {
  //       $data1 = Book::where("book_procurement_status", '=', 1)
  //           ->where("book_reviewer_id", '=', null)
  //           ->where("user_type", '=', $role)
  //           ->get();
  //   } else {
  //       $data1 = Book::where("book_procurement_status", '=', 1)
  //           ->where("book_reviewer_id", '=', null)
  //           ->get();
  //   }

  //   $tbodyHtml = '';
  //   if (isset($data1)) {
  //       if ($data1->isEmpty()) {
  //           $tbodyHtml = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
  //       } else {
  //           $index = 1; // Manually incrementing variable to replace $loop
  //           foreach ($data1 as $key => $val1) {
  //             if ($val->language =="Other_Indian") {
  //               $language = $val->other_indian;
  //             }elseif ($val->language =="other_foreign") {
  //                 $language = $val->other_foreign;
              
  //             }else{
             
  //               $language= $val->language;
  //             }
  //               $tbodyHtml .= '<tr>';
  //               $tbodyHtml .= '<td>';
  //               $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
  //               $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val1->id . '" data-book-id="' . $val1->id . '" >';
  //               $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
  //               $tbodyHtml .= '</div>';
  //               $tbodyHtml .= '</td>';
  //               $tbodyHtml .= '<td>' . $index . '</td>';
  //               $tbodyHtml .= '<td>';
  //               $tbodyHtml .= '<div class="products">';
  //               $tbodyHtml .= '<div>';
  //               $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val1->id . '">' . $val1->book_title . '</a></h6>';
  //               $tbodyHtml .= '<span class="text-left">' . $val1->subtitle . '</span>';
  //               $tbodyHtml .= '</div>';
  //               $tbodyHtml .= '</div>';
  //               $tbodyHtml .= '</td>';
  //               $tbodyHtml .= '<td>' . $language . '</td>';
  //               $tbodyHtml .= '<td data-label="controlq">';
  //               $tbodyHtml .= '<div class="d-flex mt-p0">';
  //               $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val1->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
  //               $tbodyHtml .= '<i class="fa fa-eye"></i>';
  //               $tbodyHtml .= '</a>';
  //               $tbodyHtml .= '</div>';
  //               $tbodyHtml .= '</td>';
  //               $tbodyHtml .= '</tr>';
  //               $index++;
  //           }
  //       }
  //   }

  //   return response()->json(['success' => $tbodyHtml]);
  // }
// ****************************************************************************************
// metabooks
// ****************************************************************************************
//   public function metabooks($role) {
//     $query = Book::where("book_procurement_status", '=', 1)
//         ->where("book_reviewer_id", '=', null);

//     if ($role == "publisher" || $role == "distributor" || $role == "publisher_distributor") {
//         $query->where("user_type", '=', $role);
//     }

//     $data = $query->get();
    
//     $tbodyHtml = '';

//     if ($data->isEmpty()) {
//         $tbodyHtml = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
//     } else {
//         $index = 1;

//         foreach ($data as $val) {
//             $language = '';
//             if ($val->language == "Other_Indian") {
//                 $language = $val->other_indian;
//             } elseif ($val->language == "other_foreign") {
//                 $language = $val->other_foreign;
//             } else {
//                 $language = $val->language;
//             }

//             $tbodyHtml .= '<tr>';
//             $tbodyHtml .= '<td>';
//             $tbodyHtml .= '<div class="form-check custom-checkbox checkbox-success check-lg me-3">';
//             $tbodyHtml .= '<input type="checkbox" class="form-check-input bookitem" id="customCheckBox' . ($index + 2) . '" required="" value="' . $val->id . '" data-book-id="' . $val->id . '" >';
//             $tbodyHtml .= '<label class="form-check-label" for="customCheckBox' . ($index + 2) . '" ></label>';
//             $tbodyHtml .= '</div>';
//             $tbodyHtml .= '</td>';
//             $tbodyHtml .= '<td>' . $index . '</td>';
//             $tbodyHtml .= '<td>';
//             $tbodyHtml .= '<div class="products">';
//             $tbodyHtml .= '<div>';
//             $tbodyHtml .= '<h6><a class="text-left" href="/admin/book_manage_view/' . $val->id . '">' . $val->book_title . '</a></h6>';
//             $tbodyHtml .= '<span class="text-left">' . $val->subtitle . '</span>';
//             $tbodyHtml .= '</div>';
//             $tbodyHtml .= '</div>';
//             $tbodyHtml .= '</td>';
//             $tbodyHtml .= '<td>' . $language . '</td>';
//             $tbodyHtml .= '<td data-label="controlq">';
//             $tbodyHtml .= '<div class="d-flex mt-p0">';
//             $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
//             $tbodyHtml .= '<i class="fa fa-eye"></i>';
//             $tbodyHtml .= '</a>';
//             $tbodyHtml .= '</div>';
//             $tbodyHtml .= '</td>';
//             $tbodyHtml .= '</tr>';

//             $index++;
//         }
//     }

//     return response()->json(['success' => $tbodyHtml]);
// }

  public function sendnegotiation(Request $req) {
  
      $id=$req->dataId;
      $data1 = Book::find($id);
      $data1->negotiation_status ="0";
      $data1->save();
      $data= [
        'success' => 'Book Send Negotiation Successfully',
             ];
    return response()->json($data); 
     

  }
  
  public function multisendnegotiation(Request $req) {
    $record=$req->bookId;
     $record1=[];
    foreach($record as $key=>$val){
    $data1 = Book::find($val);
    $data1->negotiation_status ="0";
    $data1->save();
    $data2 = (object)[
      'userid' => $data1->user_id,
      'type' => $data1->user_type,
  ];
    $exists = false;
  foreach ($record1 as $item) {
      if ($item->userid == $data2->userid) {
          $exists = true;
          break;
      }
  }
  if (!$exists) {
      array_push($record1, $data2);
  }
    }
    foreach($record1 as $key=>$val){
      $notifi= new Notifications();
      $notifi->message = "Received a request to negotiate the price of the book";
      $notifi->to=$val->userid;
      $notifi->from=auth('admin')->user()->id;
      $notifi->type=$val->type;
      $notifi->save();
    }

    $data= [
      'success' => 'Book Send Negotiation Successfully',
           ];
  return response()->json($data); 
   

}

  
public function approvenegotiationstatus(Request $req) {
  $bookId=$req->bookId;
  $data1 = Book::find($bookId);
  $data1->negotiation_status ="2";
  $data1->final_price= $data1->negotiation_price;
  $data1->save();
  $data= [
      'success' => 'Approved Successfully',
           ];
  return response()->json($data); 
 
}


public function rejectnegotiationstatus(Request $req) {
  
  if($req->Description !=null){
   $data1 = Book::find($req->bookId);
   $data1->negotiation_status = "3";
   $data1->negotiation_reject_message = $req->Description;
   $data1->save();

   $data = [
       'success' => 'Negotiation Reject send Successfully',
   ];

   return response()->json($data);
  }else{
   $data = [
       'error' => 'Description Filed is  Required',
   ];

   return response()->json($data);
  }

  
}
public function bookstatuschange(Request $req) {
  

   $data1 = Book::find($req->bookid);
   $data1->book_active_status = $req->status;
   $data1->save();
   $data = [
    'success' => 'Book Status Change Successfully',
];

return response()->json($data);

     }

     public function get_activebooks(Request $req,$name) {
      if($req->status == "all"){
        $data1 = Book::where('subject', '=', $name)->where('negotiation_status', '=', '2')->get();
      }elseif($req->status == "1"){
        $data1 = Book::where('subject', '=', $name)->where('negotiation_status', '=', '2')->where('book_active_status', '=', '1')->get();
      }else{
        $data1 = Book::where('subject', '=', $name)->where('negotiation_status', '=', '2')->where('book_active_status', '=', '0')->get();
      }
    
      $tbodyHtml = '';
  
      if (isset($data1)) {
          if ($data1->isEmpty()) {
              $tbodyHtml = '<tr><td colspan="5" class="text-center">No records found</td></tr>';
          } else {
              $index = 1;
  
              foreach ($data1 as $key => $val) {
                  $tbodyHtml .= '<tr role="row" class="odd">
                      <td class="sorting_1">
                          <div class="form-check custom-checkbox">
                              <input type="checkbox" class="form-check-input bookitem"  data-book-id="' . $val->id . '" val="' . $val->id . '" id="customCheckBox' . $index . '" required="">
                              <label class="form-check-label" for="customCheckBox' . $index . '"></label>
                          </div>
                      </td>
                      <td><span>' . ($index++) . '</span></td>
                      <td>
                          <div class="d-flex align-items-center">
                              <img src="' . asset("Books/front/" . $val->front_img) . '" class="avatar avatar-md" alt="">
                              <p class="mb-0 ms-2">' . $val->book_title . '</p>
                          </div>
                      </td>
                      <td>' . $val->final_price . '</td>';
  
                  if ($val->user_type == "publisher_distributor") {
                      $tbodyHtml .= '<td><span> publisher cum distributor</span></td>';
                  } else {
                      $tbodyHtml .= '<td><span>' . $val->user_type . '</span></td>';
                  }
  
                  $tbodyHtml .= '<td>';
                  if ($val->book_active_status == 1) {
                      $tbodyHtml .= '<span class="btn btn-success shadow btn-xs me-1">Active</span>';
                  } else {
                      $tbodyHtml .= '<span class="badge bg-danger">Inactive</span>';
                  }
                  $tbodyHtml .= '</td>
                  <td class="sorting_1">
                  <div class="form-check form-switch" id="load">
                      <input class="form-check-input toggle-class" type="checkbox"
                          data-id="' . $val->id . '" name="featured_status"
                          data-isprm="1" data-onstyle="success"
                          data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" ' . ($val->book_active_status ? 'checked' : '') . '>
                      <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                  </div>
              </td>
                  <td data-label="controlq text-center">
                      <div class="d-flex mt-p0">
                          <a href="../website/shope.php" class="btn btn-success shadow btn-xs sharp me-1">
                              <i class="fa fa-eye"></i>
                          </a>
                          <a href="#" class="btn btn-danger  shadow btn-xs sharp me-1">
                              <i class="fa fa-trash"></i>
                          </a>
                      </div>
                  </td>
                  </tr>';
              }
          }
      }
  
      return response()->json(['html' => $tbodyHtml]);
  }
  
  public function multiple_statuschangebook(Request $req) {
  
    if (!empty($req->requestData['bookId'])) {
      $bookIds = $req->requestData['bookId'];

    foreach ($bookIds as $key => $val) {
      $data1 = Book::find($val);
      $data1->book_active_status = $req->status;
      $data1->save();
    }
    $data = [
      'success' => 'Book Status Change Successfully',
  ];
  return response()->json($data);

}else{
  $data = [
    'error' => 'Select Book Id',
];
return response()->json($data);

}
  }
  public function reviewerlist($id) {
 $external =  BookReviewStatus::where('book_id','=',$id)->where('reviewertype','=','external')->get();
 $internal =  BookReviewStatus::where('book_id','=',$id)->where('reviewertype','=','internal')->get();
 $public =  BookReviewStatus::where('book_id','=',$id)->where('reviewertype','=','public')->get();
 $reviewer=(Object)[
  'external'=>$external,
  'internal'=>$internal,
  'public'=>$public
];

 \Session::put('reviewer', $reviewer);
  
      return redirect('admin/review'); 
  }
    } 
    
    







