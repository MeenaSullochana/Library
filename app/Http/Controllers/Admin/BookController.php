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
use App\Models\bookcopies;
use DB;
use App\Models\Magazine;

use App\Models\Booksubject;
use App\Models\Procurementpaymrnt;
use App\Models\PeriodicalReviewStatus;



use Illuminate\Support\Facades\Session;

class BookController extends Controller
{


  public function bookmanageall()
  {

    $data = Book::where('book_active_status', '=', 1)
      ->where('marks', '>=', 40)
      ->orderBy('marks', 'desc')

      ->get();




    return view('admin.book_manage_all')->with('data', $data);
  }

  public function bookmanageview($id)
  {

    $book = Book::find($id);
    $book->primaryauthor1 = json_decode($book->primaryauthor);
    $book->trans_from1 = json_decode($book->trans_from);
    $book->other_img1 = json_decode($book->other_img);
    $book->series1 = json_decode($book->series);
    // return $book;
    $book->banner_img1 = json_decode($book->banner_img);
    $book->booktag1 = json_decode($book->booktag);
    $book->trans_author1 = json_decode($book->trans_author);
    $book->bookdescription1 = json_decode($book->bookdescription);
    $book->series1 = json_decode($book->series);
    $book->volume1 = json_decode($book->volume);
    if ($book->user_type == "publisher") {
      $pub = Publisher::find($book->user_id);
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else if ($book->user_type == "distributor") {
      $pub = Distributor::find($book->user_id);
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else {
      $pub = PublisherDistributor::find($book->user_id);
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    }
    \Session::put('book', $book);
    // return $book;
    return redirect('admin/bookmanageview');
  }

  public function meta_book_list()
  {
    $data = Book::where("book_procurement_status", '=', 1)
      ->whereNull("book_reviewer_id")
      ->get();

    $existingBooks = Book::where("book_procurement_status", '=', 1)
      ->pluck('book_title');
    $existingbookisbn = Book::where("book_procurement_status", '=', 1)
      ->pluck('isbn');

    $existingTitles = $existingBooks->map(function ($title) {
      return [
        'english' => $this->processBookTitle($title),
        'tamil' => $this->processBookTitle($this->translateToTamil($title)) // Assuming a translate function
      ];
    });
    $existingisbn = $existingbookisbn->map(function ($title) {
      return $this->processBookTitle($title);
    });
    // Check each book for title and ISBN uniqueness
    foreach ($data as $val) {
      $val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks, $existingisbn);
    }
 
    foreach ($data as $val) {
     
      $pub = Publisher::query()
      ->where('id', $val->user_id)
      ->select('id', 'publicationName', 'usertype','mobileNumber','email')
      ->union(
          Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->union(
          PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->first();
      $Procurementpaymrnt1 = Procurementpaymrnt::where('paidstatus', '1')
      ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(bookId, '$')) LIKE ?", ['%"' . $val->id . '"%'])
      ->first(); 
      $val->book_active_status=$pub->publicationName;
      $val->discount = $Procurementpaymrnt1->created_at->format('Y-m-d');

    }

    // Return view with the processed data
    return view('admin.meta_book_list')->with('data', $data);
  }

  // private function processBookTitle($title) {
  //   $title = trim($title);
  //   $title = preg_replace('/(?<!^)[A-Z]/', '_$0', $title);
  //   $title = preg_replace('/\s+/', '', $title);
  //   $title = strtolower($title);
  //   return preg_replace('/[^a-zA-Z0-9]/', '', $title);
  // }
  private function processBookTitle($title)
  {
    $title = trim($title);
    if (!$this->isTamil($title)) {
      $title = preg_replace('/(?<!^)[A-Z]/', '_$0', $title);
    }
    $title = preg_replace('/\s+/', '', $title);
    if (!$this->isTamil($title)) {
      $title = strtolower($title);
    }
    $title = preg_replace('/[^A-Za-z0-9\x{0B80}-\x{0BFF}]/u', '', $title);

    return $title;
  }

  public function translateToTamil($text)
  {
    if ($this->isTamil($text)) {
      return $text; // Return the text as is if it is already in Tamil
    }
  }

  public function isTamil($text)
  {
    // Simple heuristic to check if the text contains Tamil characters
    return preg_match('/[\x{0B80}-\x{0BFF}]+/u', $text);
  }



  public function checkBookTitle($data, $existingTitles, $existingBooks, $existingisbn)
  {
    // Process new book title for comparison
    $newBookTitle = $this->processBookTitle($data->book_title);
    $newBookisbn = $this->processBookTitle($data->isbn);
    // Count occurrences of the processed title in existing titles
    $titleCount = $existingTitles->filter(function ($titles) use ($newBookTitle) {
      return $titles['english'] === $newBookTitle || $titles['tamil'] === $newBookTitle;
    })->count();

    // Count occurrences of the ISBN in existing ISBNs
    $isbnCount = $existingisbn->filter(function ($isbn) use ($newBookisbn) {
      return $isbn === $newBookisbn;
    })->count();

    // Determine uniqueness based on counts
    if ($titleCount > 1) {
      return "duplicate";
    } elseif ($isbnCount > 1) {
      return "repeated";
    } else {
      return "unique";
    }
  }




  // public function meta_book_list(){
  //  $data=Book::where("book_procurement_status",'=',1)->where("book_reviewer_id",'=',null)->get();
  //  $arrdata=[];
  //  foreach($data as $key=>$val){
  //   $check = $this->checkBookTitle($val);
  //   $val->check = $check;

  //  }
  //   return view('admin.meta_book_list')->with('data',$data);
  // }

  // public function checkBookTitle($data)
  // {
  //     $newBookTitle = trim($data->book_title);

  //     $processedNewTitle = preg_replace('/[^a-zA-Z0-9]/', '', strtolower(preg_replace('/\s+/', '', preg_replace('/(?<!^)[A-Z]/', '_$0', $newBookTitle))));

  //     $existingTitles = Book::pluck('book_title')->where("book_procurement_status",'=',1)->map(function ($title) {
  //         return preg_replace('/[^a-zA-Z0-9]/', '', strtolower(trim($title)));
  //     });
  //     $c=0;
  //     foreach($existingTitles as $key=>$val){
  //       if($val == $processedNewTitle){
  //         $c = $c+1;
  //       }
  //       else{
  //         $c= $c;
  //       }
  //     }
  //     $isbn = Book::where('isbn',"=",$data->isbn)->get();
  //    $count = count($isbn);
  //    if($c >1){
  //     return "duplicate"; 
  //    }else if($count >1){
  //          return "repeated";
  //    }else{
  //          return "unique";
  //    }


  // }
  public function metabooks($role)
  {
    $query = Book::where("book_procurement_status", '=', 1)
      ->where("book_reviewer_id", '=', null);

    if ($role != 'All') {
      $query->where("subject", '=', $role);
    }

    $data = $query->get();

    
    $existingBooks = Book::where("book_procurement_status", '=', 1)
      ->pluck('book_title');
    $existingbookisbn = Book::where("book_procurement_status", '=', 1)
      ->pluck('isbn');

    $existingTitles = $existingBooks->map(function ($title) {
      return [
        'english' => $this->processBookTitle($title),
        'tamil' => $this->processBookTitle($this->translateToTamil($title)) // Assuming a translate function
      ];
    });
    $existingisbn = $existingbookisbn->map(function ($title) {
      return $this->processBookTitle($title);
    });
    // Check each book for title and ISBN uniqueness
    foreach ($data as $val) {
      $val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks, $existingisbn);
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
        $pub = Publisher::query()
        ->where('id', $val->user_id)
        ->select('id', 'publicationName', 'usertype','mobileNumber','email')
        ->union(
            Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
        )
        ->union(
            PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
        )
        ->first();
        $Procurementpaymrnt1 = Procurementpaymrnt::where('paidstatus', '1')
        ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(bookId, '$')) LIKE ?", ['%"' . $val->id . '"%'])
        ->first(); 
        if ($val->check == "unique") {
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
          $tbodyHtml .= '<td>' .  $pub->publicationName . '</td>';
          $tbodyHtml .= '<td>' . date('d-m-Y', strtotime($Procurementpaymrnt1->created_at)) . '</td>';
          $tbodyHtml .= '<td data-label="controlq">';
          $tbodyHtml .= '<div class="d-flex mt-p0">';
          $tbodyHtml .= '<a href="/admin/book_manage_view/' . $val->id . '" class="btn btn-success shadow btn-xs sharp me-1">';
          $tbodyHtml .= '<i class="fa fa-eye"></i>';
          $tbodyHtml .= '</a>';
          $tbodyHtml .= '</div>';
          $tbodyHtml .= '</td>';
          $tbodyHtml .= '</tr>';

          $index++;
        } else {
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
          $tbodyHtml .= '<td>' .  $pub->publicationName . '</td>';
          $tbodyHtml .= '<td>' . date('d-m-Y', strtotime($Procurementpaymrnt1->created_at)) . '</td>';
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

  public function meta_pending_book()
  {
    $data = Book::where("book_procurement_status", '=', 1)->where("book_reviewer_id", '!=', null)->where("book_status", '=', null)->get();
    return view('admin.meta_pending_book')->with('data', $data);
  }
  public function meta_book_complete()
  {
    $data = Book::where("book_procurement_status", '=', 1)->where("book_reviewer_id", '!=', null)->where("book_status", '!=', null)->get();
    return view('admin.meta_book_complete')->with('data', $data);
  }

  public function meta_book_assign(Request $req, $id)
  {
    $book = Book::find($id);
    if (isset($req->library)) {
      $lib = Librarian::where("metaChecker", '=', "yes")->where("libraryType", '=', $req->library)->where('status', 1)->get();
      $data = (object)[
        'book' => $book,
        'lib' => $lib,
        'type' => $req->library
      ];
    } else {
      $lib = Librarian::where("metaChecker", '=', "yes")->where('status', 1)->get();
      $data = (object)[
        'book' => $book,
        'lib' => $lib,
        'type' => "",
      ];
    }
    return redirect('admin/meta_book_assign')->with('data', $data);
  }

  public function assignlibrarian(Request $req)
  {

    $validator = Validator::make($req->all(), [

      'bookId' => 'required|array|min:1',
      'metaLibraianId' => 'required|array|size:1',

    ]);

    if ($validator->fails()) {
      $data = [
        'error' => $validator->errors()->first(),
      ];
      return response()->json($data);
    }


    foreach ($req->bookId as $key => $val) {
      $book = Book::find($val);
      $lib = $req->metaLibraianId[0];
      $book->book_reviewer_id = $lib;
      $book->save();
    }

    $notifi = new Notifications();
    $notifi->message = "Book Assigned For Metacheck";
    $notifi->to = $req->metaLibraianId[0];
    $notifi->from = auth('admin')->user()->id;
    $notifi->type = "librarian";
    $notifi->save();
    $data = [
      'success' => 'Book assigned Successfully',
    ];
    return response()->json($data);
  }

  public function procur_book_list()
  {
    $data = Book::where("book_procurement_status", '=', 1)->where("book_reviewer_id", '!=', null)->where("book_status", '=', 1)->get();
    return view('admin.procur_book_list')->with('data', $data);
  }

  public function procur_assign($id)
  {
    $book = Book::find($id);
    $internal1 = Reviewer::where("reviewerType", '=', "internal")->where('status', 1)->get();
    $internal = [];
    $external = [];
    $public = [];
    foreach ($internal1 as $key => $val) {
      $rec = BookReviewStatus::where("book_id", $book->id)->where("reviewer_id", $val->id)->first();
      if ($rec != null) {
        $val->assigned = 1;
        array_push($internal, $val);
      } else {
        $val->assigned = 0;
        array_push($internal, $val);
      }
    }

    $external1 = Reviewer::where("reviewerType", '=', "external")->where('status', 1)->get();
    foreach ($external1 as $key => $val) {
      $rec = BookReviewStatus::where("book_id", $book->id)->where("reviewer_id", $val->id)->first();
      if ($rec != null) {
        $val->assigned = 1;
        array_push($external, $val);
      } else {
        $val->assigned = 0;
        array_push($external, $val);
      }
    }
    $public1 = Reviewer::where("reviewerType", '=', "public")->where('status', 1)->get();
    foreach ($public1 as $key => $val) {
      $rec = BookReviewStatus::where("book_id", $book->id)->where("reviewer_id", $val->id)->first();
      if ($rec != null) {
        $val->assigned = 1;
        array_push($public, $val);
      } else {
        $val->assigned = 0;
        array_push($public, $val);
      }
    }

    $data = (object)[
      'book' => $book,
      'internal' => $internal,
      'external' => $external,
      'public' => $public
    ];

    return redirect('admin/procur_book_assign')->with('data', $data);
  }

  public function assignreviewer(Request $req)
  {
    $book = $req->bookid;
    $rev = Reviewer::where("id", '=', $req->id)->first();
    $bookreview = new BookReviewStatus();
    $bookreview->book_id = $book;
    $bookreview->reviewer_id = $rev->id;
    $bookreview->reviewertype = $rev->reviewerType;
    $bookreview->save();
    $data = [
      'success' => 'Book assigned Successfully',
      'url' => "/admin/procur_book_assign/" . $book
    ];
    return response()->json($data);
  }

  public function procur_pending_list()
  {
    $data = BookReviewStatus::groupBy('book_id')->get('book_id');
    $record = [];
    foreach ($data as $key => $val) {
      $data1 = BookReviewStatus::where('book_id', $val->book_id)->where('mark', '!=', null)->get();
      if (sizeof($data1) == 0) {
        $book = Book::find($val->book_id);
        $internalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'internal')->count();
        $externalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'external')->count();
        $publiccount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'public')->count();

        $obj = (object)[
          'book' => $book,
          'internalcount' => $internalcount,
          'externalcount' => $externalcount,
          'publiccount' => $publiccount,
        ];
        array_push($record, $obj);
      }
    }
    return view('admin.procur_pending_list')->with('record', $record);
  }

  public function procur_complete_list()
  {
    $data = BookReviewStatus::groupBy('book_id')->get('book_id');
    $record = [];
    foreach ($data as $key => $val) {
      $avginternal = 0;
      $avgexternal = 0;
      $avgpublic = 0;

      $data1 = BookReviewStatus::where('book_id', $val->book_id)->where('mark', '!=', null)->get();
      if (sizeof($data1) != 0) {
        $book = Book::find($val->book_id);
        $internalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'internal')->count();
        $externalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'external')->count();
        $publiccount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'public')->count();
        $rinternalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
        $rexternalcount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
        $rpubliccount = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
        $suminternal = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
        $sumexternal = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
        $sumpublic = BookReviewStatus::where('book_id', $val->book_id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
        if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
          $avgexternal = ($sumexternal / ($rexternalcount)) *3;
          $mark = ($sumexternal / ($rexternalcount)) * 3;
        } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
          $avginternal  = ($suminternal / ($rinternalcount)) *1;
          $mark = ($suminternal / ($rinternalcount)) *1;
        } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
          $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
          $mark = ($sumpublic / ($rpubliccount)) * 1;
        } else if ($externalcount == 0 || $rexternalcount == 0) {
          $avginternal  = ($suminternal / ($rinternalcount)) * 1;
          $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
          $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
        } else if ($internalcount == 0 || $rinternalcount == 0) {
          $avgexternal = ($sumexternal / ($rexternalcount)) *3;
          $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
          $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
        } else if ($publiccount == 0 || $rpubliccount == 0) {
          $avgexternal = ($sumexternal / ($rexternalcount)) *3;
          $avginternal  = ($suminternal / ($rinternalcount)) *1;
          $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
        } else {
      
          $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
          $avginternal  = ($suminternal / ($rinternalcount)) * 1;
          $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
          $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
        }


        $obj = (object)[
          'book' => $book,
          'internalcount' => $internalcount,
          'externalcount' => $externalcount,
          'publiccount' => $publiccount,
          'rinternalcount' => $rinternalcount,
          'rexternalcount' => $rexternalcount,
          'rpubliccount' => $rpubliccount,
          'avginternal' => $avginternal,
          'avgexternal' => $avgexternal,
          'avgpublic' => $avgpublic,
          'total' => $mark
        ];
        array_push($record, $obj);
      }
    }
    return view('admin.procur_complete_list')->with('record', $record);
  }
  public function procur_reject_view()
  {
    $data = Book::where("book_procurement_status", '=', 1)->where("book_reviewer_id", '!=', null)->where("book_status", '=', 0)->get();
    return view('admin.procur_reject_view')->with('data', $data);
  }

  public function get_books($id)
  {

    if ($id == 'all') {
      $books = Book::where('book_procurement_status', '=', '1')->where('book_status', '=', '1')->get();
    } else {
      $books = Book::where('subject', $id)->where('book_procurement_status', '=', '1')->where('book_status', '=', '1')->get();
    }
    $reviewers1 = Reviewer::where('reviewerType', '=', 'external')
      ->where('status', '=', 1)
      ->get();

    $reviewers = [];
    foreach ($reviewers1 as $key => $val) {
      $subjects = json_decode($val->subject);

      if (is_string($subjects)) {
        $subjectsArray = explode(',', $subjects);
      } elseif (is_array($subjects)) {
        $subjectsArray = $subjects;
      } else {
        $subjectsArray = [];
      }

      $revin = in_array($id, $subjectsArray);

      if ($revin) {
        array_push($reviewers, $val);
      }
    }



    $html = '';
    $htmldata = '';

    if ($books->isEmpty()) {
      $html = '<tr><td colspan="3">No books found.</td></tr>';
    } else {
      $i = 0;
      foreach ($books as $key => $val) {
        $datass = BookReviewStatus::where('book_id', $val->id)->first();

        if ($datass == null) {



          if ($val->language == "Other_Indian") {
            $language = $val->other_indian;
          } elseif ($val->language == "other_foreign") {
            $language = $val->other_foreign;
          } else {

            $language = $val->language;
          }
          $i = $i + 1;
          $html .= '<tr>
                    <td>
                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                    <input type="checkbox" class="form-check-input bookitem" id="checkItem_' . $val->id . '" data-book-id="' . $val->id . '" required="">
                    <label class="form-check-label" for="checkItem_' . $val->id . '"></label>
                </div>
                    </td>
                    <td>' . ($i) . '</td>
                    <td><small>' . $val->book_title . '</small></td>
                    <td>' . $language . '</td>
                       <td>' . $val->category . '</td>
                    <td>' . $val->subject . '</td>
                    <td>' . $val->nameOfPublisher . '</td>
                </tr>';
        }
      }
    }

    if (count($reviewers) <= 0) {

      $htmldata = '<tr><td colspan="3">No external reviewers found.</td></tr>';
    } else {


      foreach ($reviewers as $key => $val) {

        $subjects = json_decode($val->subject, true);


        $recdata = '';

        if (is_array($subjects)) {
          foreach ($subjects as $subject) {
            $recdata .= htmlspecialchars($subject) . ' ,';
          }
        }


        $htmldata .= '<tr>
                <td>
                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                <input type="checkbox" class="form-check-input externel" id="checkItem_' . $val->id . '" data-externel-id="' . $val->id . '" required="">
                <label class="form-check-label" for="customCheckBox2" value="' . $val->id . '"></label>
                </div>
                </td>
                <td>' . ($key + 1) . '</td>
                <td>' . $val->name . '</td>
                <td>' . trim($recdata) . '</td>

            </tr>';
      }
    }

    $tbodyHtml2 = '';
    $index1 = 1;

    // $internals1 = Reviewer::where('reviewerType', '=', 'internal')->where('status', '=', 1)->get();
    // $categories = [$cat]; 


    if ($books[0]->category == null) {
      $tbodyHtml2 = '<tr><td colspan="3">No Librarian reviewers found.</td></tr>';
    } else {



      //  $internalsdat = Reviewer::whereJsonContains('Category', $cat)       
      //   ->where('reviewerType', '=', 'internal')
      //     ->where('status', '=', 1)
      //     ->get();
      $cat = $books[0]->category;
      $internalsdat = Reviewer::where('reviewerType', '=', 'internal')
        ->where('status', '=', 1)
        ->get();
      $internalsdat1 = [];
      foreach ($internalsdat as $val) {
        $categories = json_decode($val->Category, true);

        if (is_array($categories) && in_array($cat, $categories)) {
          $internalsdat1[] = $val;
        }
      }

      if (count($internalsdat1) <= 0) {
        $tbodyHtml2 = '<tr><td colspan="3">No Librarian reviewers found.</td></tr>';
      } else {
        foreach ($internalsdat1 as $key => $val) {
          // $subjects = json_decode($val->subject);

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
          // $tbodyHtml2 .= '<td><span>' . $val->Category . '</span></td>';


          $categories = json_decode($val->Category, true);

          $recdata = '';

          if (is_array($categories)) {
            foreach ($categories as $category) {
              $recdata .= htmlspecialchars($category) . ' ,';
            }
          }

          $tbodyHtml2 .= '<td><span>' . trim($recdata) . '</span></td>';




          $tbodyHtml2 .= '</tr>';
          $index1++;
        }
      }
    }
    if (count($books) <= 0) {
      $tbodyHtml3 = '<tr><td colspan="3">No Public reviewers found.</td></tr>';
    } else {
      $tbodyHtml3 = '';
      $index1 = 1;

      if ($books[0]->category == null) {
        $tbodyHtml3 = '<tr><td colspan="3">No external reviewers found.</td></tr>';
      } else {
        $cat = $books[0]->category;
        $internals11 = Reviewer::where('Category', '=', $cat)->where('reviewerType', '=', 'public')->where('status', '=', 1)->get();
        if ($internals11->isEmpty()) {
          $tbodyHtml3 = '<tr><td colspan="3">No external reviewers found.</td></tr>';
        } else {
          foreach ($internals11 as $key => $val) {
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
     $pub = Publisher::query()
    ->where('id', $book->user_id)
    ->select('id', 'publicationName', 'usertype','mobileNumber','email')
    ->union(
        Distributor::query()->where('id', $book->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->union(
        PublisherDistributor::query()->where('id', $book->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->first();
  
    $book->vendorname= $pub->publicationName;
  
  
    $Procurementpaymrnt1 = Procurementpaymrnt::where('paidstatus', '1')
    ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(bookId, '$')) LIKE ?", ['%"' . $book->id . '"%'])
    ->first(); 
  
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
      \Cache::put('data', $data);
    //  return  $data;
    return redirect('admin/procur_complete_view');  
  }

  public function bookassign_data(Request $req)
  {

    $validator = Validator::make($req->all(), [

      'bookId' => 'required|array|min:1',
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
    $bookId = $req->bookId;
    $internalReviewverId = $req->LibrarianReviewverId;
    $externalReviewverId = $req->expectReviewverId;
    $publicReviewverId = $req->publicReviewverId;
    $mergedArray = array_merge($internalReviewverId, $externalReviewverId, $publicReviewverId);
    foreach ($bookId as $key => $val1) {

      foreach ($mergedArray as $key => $val) {
        $rev = Reviewer::where("id", '=', $val)->first();

        $bookreview = new BookReviewStatus();
        $bookreview->book_id = $val1;
        $bookreview->reviewer_id = $rev->id;
        $bookreview->reviewertype = $rev->reviewerType;
        $bookreview->save();
      }
    }

    foreach ($mergedArray as $key => $val) {
      $notifi = new Notifications();
      $notifi->message = "Book Assigned For Review";
      $notifi->to = $val;
      $notifi->from = auth('admin')->user()->id;
      $notifi->type = "reviewer";
      $notifi->save();
    }
    $data = [
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

  public function sendnegotiation(Request $req)
  {

    $id = $req->dataId;
    $data1 = Book::find($id);
    $data1->negotiation_status = "0";
    $data1->save();
    $data = [
      'success' => 'Book Send Negotiation Successfully',
    ];
    return response()->json($data);
  }

  public function multisendnegotiation(Request $req)
  {
    $record = $req->bookId;
    $record1 = [];
    foreach ($record as $key => $val) {
      $data1 = Book::find($val);
      $data1->negotiation_status = "0";
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
    foreach ($record1 as $key => $val) {
      $notifi = new Notifications();
      $notifi->message = "Received a request to negotiate the price of the book";
      $notifi->to = $val->userid;
      $notifi->from = auth('admin')->user()->id;
      $notifi->type = $val->type;
      $notifi->save();
    }

    $data = [
      'success' => 'Book Send Negotiation Successfully',
    ];
    return response()->json($data);
  }


  public function approvenegotiationstatus(Request $req)
  {
    $bookId = $req->bookId;
    $data1 = Book::find($bookId);
    $data1->negotiation_status = "2";
    $data1->final_price = $data1->negotiation_price;
    $data1->save();
    $data = [
      'success' => 'Approved Successfully',
    ];
    return response()->json($data);
  }


  public function rejectnegotiationstatus(Request $req)
  {

    if ($req->Description != null) {
      $data1 = Book::find($req->bookId);
      $data1->negotiation_status = "4";
      $data1->negotiation_reject_message = $req->Description;
      $data1->save();

      $data = [
        'success' => 'The negotiation is on hold.',
      ];

      return response()->json($data);
    } else {
      $data = [
        'error' => 'Description Filed is  Required',
      ];

      return response()->json($data);
    }
  }
  public function bookstatuschange(Request $req)
  {


    $data1 = Book::find($req->bookid);
    $data1->book_active_status = $req->status;
    $data1->save();
    $data = [
      'success' => 'Book Status Change Successfully',
    ];

    return response()->json($data);
  }

  public function get_activebooks(Request $req, $name)
  {
    if ($req->status == "all") {
      $data1 = Book::where('subject', '=', $name)->where('negotiation_status', '=', '2')->get();
    } elseif ($req->status == "1") {
      $data1 = Book::where('subject', '=', $name)->where('negotiation_status', '=', '2')->where('book_active_status', '=', '1')->get();
    } else {
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

  public function multiple_statuschangebook(Request $req)
  {

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
    } else {
      $data = [
        'error' => 'Select Book Id',
      ];
      return response()->json($data);
    }
  }
  public function reviewerlist($id)
  {
    $external =  BookReviewStatus::where('book_id', '=', $id)->where('reviewertype', '=', 'external')->get();
    $internal =  BookReviewStatus::where('book_id', '=', $id)->where('reviewertype', '=', 'internal')->get();
    $public =  BookReviewStatus::where('book_id', '=', $id)->where('reviewertype', '=', 'public')->get();
    $reviewer = (object)[
      'external' => $external,
      'internal' => $internal,
      'public' => $public,
      'bookid' => $id
    ];

    \Session::put('reviewer', $reviewer);

    return redirect('admin/review');
  }

  public function delete_reviewer_data(Request $req)
  {
    $reviewerId = $req->reviewerId;

    if (is_array($reviewerId) && !empty($reviewerId)) {

      $reviewerIdsString = implode(',', array_map(function ($id) {
        return "'" . $id . "'";
      }, $reviewerId));

      $sql = "DELETE FROM book_review_statuses WHERE book_id = ? AND id IN ($reviewerIdsString)";

      $deletedRows = DB::delete($sql, [$req->bookid]);
    } else {
      $data = [
        'error' => 'Please Select Reviewer',
      ];
      return response()->json($data);
    }

    $avginternal = 0;
    $avgexternal = 0;
    $avgpublic = 0;

    $data1 = BookReviewStatus::where('book_id', $req->bookid)->where('mark', '!=', null)->get();

    if (sizeof($data1) != 0) {
      $book = Book::find($req->bookid);
      $internalcount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'internal')->count();
      $externalcount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'external')->count();
      $publiccount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'public')->count();
      $rinternalcount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
      $rexternalcount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
      $rpubliccount = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
      $suminternal = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
      $sumexternal = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
      $sumpublic = BookReviewStatus::where('book_id', $req->bookid)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
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
      $book->marks = $mark;
      $book->save();
    }



    $external =  BookReviewStatus::where('book_id', '=', $req->bookid)->where('reviewertype', '=', 'external')->get();
    $internal =  BookReviewStatus::where('book_id', '=', $req->bookid)->where('reviewertype', '=', 'internal')->get();
    $public =  BookReviewStatus::where('book_id', '=', $req->bookid)->where('reviewertype', '=', 'public')->get();
    $reviewer = (object)[
      'external' => $external,
      'internal' => $internal,
      'public' => $public,
      'bookid' => $req->bookid
    ];

    if (\Session::has('reviewer')) {
      \Session::forget('reviewer');
  }
  \Session::put('reviewer', $reviewer);
  
    $data = [
      'success' => 'Reviewer Delete Successfully',
    ];
    return response()->json($data);
  }




  public function book_manage($id)
  {

    $book = Book::where('book_active_status', '=', '1')
      ->where('user_id', '=', $id)
      ->get();

    \Session::put('book', $book);


    return redirect('admin/book_manageview');
  }
  public function procurement_samplebookpending()
  {
    $data1 = bookcopies::where('status', '=', '1')->get();
    $data = [];
    foreach ($data1 as $key => $val) {
      $bookcopies = bookcopies::where('bookid', '=', $val->bookid)->first();
      $copies =  json_decode($bookcopies->copies);
      $data2 = Book::find($val->bookid);
      $data2->copies = $copies;
      array_push($data, $data2);
    }

    return view('admin.procurement_samplebookpending')->with('data', $data);
  }


  public function procurement_samplebookcomplete()
  {
    $data1 = bookcopies::where('status', '=', '0')->get();
    $data = [];
    foreach ($data1 as $key => $val) {
      $bookcopies = bookcopies::where('bookid', '=', $val->bookid)->first();
      $copies =  json_decode($bookcopies->copies);
      $data2 = Book::find($val->bookid);
      $data2->copies = $copies;
      array_push($data, $data2);
    }

    return view('admin.procurement_samplebookcomplete')->with('data', $data);
  }

  // public function master_book_data(){
  //   $data = Book::get();
  //   // $data=[];
  //   foreach($data as $key=>$val){
  //     if($val->book_reviewer_id != null){
  //       $Librarian  =Librarian::find($val->book_reviewer_id);  
  //       if($Librarian !=null){
  //         $val->reviewername= $Librarian->librarianName;
  //       }else{
  //         $val->reviewername="No Review";
  //       }

  //      }else{
  //       $val->reviewername="No Review";
  //     }
  //    if($val->book_procurement_status == "1" || $val->book_procurement_status == "5" ||  $val->book_procurement_status == "6"){
  //     $val->paystatus= "Success";
  //    }else{
  //     $val->paystatus= "No Payment";
  //    }


  //    if($val->book_status == "1" ){
  //     $val->revstatus= "Success";
  //    }elseif($val->book_status == "0" ){
  //     $val->revstatus= "Reject";
  //    }elseif($val->book_status == "2" ){


  //     $val->revstatus= "Returned To User Correction";
  //    }
  //    elseif($val->book_status == "3" ){
  //     $val->revstatus= "Book Update To Return";
  //    }else{
  //     $val->revstatus= "No Review";
  //    }

  // // array_push($data,$val);

  //   }

  //   return view('admin.master_book_data')->with('data',$data); 

// }
public function master_book_data(Request $request) {

  // Use eager loading to reduce the number of queries
  $query = Book::with('librarian')
  ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
  ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
  ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
  ->leftJoin('unique_authors', 'books.unique_author', '=', 'unique_authors.authorid')

  ->select('books.*', 
      DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname'),
      DB::raw("COALESCE(unique_authors.name, 'not yet unified') as authorname"),

    );

  // Apply filters
  if ($request->has('language_filter') && $request->language_filter != '') {
      $query->where('language', $request->language_filter);
  }

  if ($request->has('subject_filter') && $request->subject_filter != '') {
      $query->where('subject', $request->subject_filter);
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('category', $request->category_filter);
  }

  if ($request->has('payment_filter') && $request->payment_filter != '') {
      if ($request->payment_filter == 'Success') {
          $query->whereIn('book_procurement_status', ['1', '5', '6']);
      } else {
          $query->whereNotIn('book_procurement_status', ['1', '5', '6']);
      }
  }
  if ($request->has('mark_range') && $request->mark_range != '') {
    list($min, $max) = explode('-', $request->mark_range);
    $query->whereBetween('marks', [(int)$min, (int)$max]);
}

  
  if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {
  

    switch ($request->metachecking_filter) {
        case 'Success':
            $query->where('book_status', '1');
            break;
        case 'Reject':
            $query->where('book_status', '0');
            break;
        case 'Returned To User Correction':
            $query->where('book_status', '2');
            break;
        case 'Book Update To Return':
            $query->where('book_status', '3');
            break;
        case 'No Review':
            $query->where('book_status', null);
            break;
    }
}
if ($request->has('negostatus_filter') && $request->negostatus_filter != '') {
  

  switch ($request->negostatus_filter) {
      case 'Negotiation Pending':
          $query->where('negotiation_status', '0');
          break;
      case 'Renegotiation By Vendor':
          $query->where('negotiation_status', '1');
          break;
      case 'Renegotiation By Admin':
         $query->where('negotiation_status', '5');
         break;   
      case 'Agree':
          $query->where('negotiation_status', '2');
          break;
      case 'Disagree':
          $query->where('negotiation_status', '3');
          break;
  
      case 'Not send negotiation':
          $query->where('negotiation_status', null);
          break;
  }
}

  if ($request->has('search') && $request->search != '') {
    $query->where(function ($subQuery) use ($request) {
      $subQuery->where('book_title', 'like', '%' . $request->search . '%')
          ->orWhere('product_code', 'like', '%' . $request->search . '%')
          ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
          ->orWhere('publishers.publicationName', 'like', '%' . $request->search . '%')
          ->orWhere('distributors.distributionName', 'like', '%' . $request->search . '%')
          ->orWhere('publisher_distributors.publicationDistributionName', 'like', '%' . $request->search . '%')
          ->orWhere('unique_authors.name', 'like', '%' . $request->search . '%')
          ->orWhere('books.language', 'like', '%' . $request->search . '%')
          ->orWhere('marks', 'like', '%' . $request->search . '%')
          ->orWhere('isbn', 'like', '%' . $request->search . '%');
  });
  }

  $data = $query->paginate(15); // Adjust the number of records per page as needed

  $procurementStatuses = ["1", "5", "6"];
  $bookStatusLabels = [
      "1" => "Success",
      "0" => "Reject",
      "2" => "Returned To User Correction",
      "3" => "Book Update To Return"
  ];
  $negobookStatus = [
    "0" => "Negotiation Pending",
   "1" => "Renegotiation By Vendor",
   "5" => "Renegotiation By Admin",
   "2" => "Agree",
   "3" => "Disagree",

];
  foreach ($data as $val) {
      $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
      $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
      $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
      $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "Not send negotiation";
      $val->primaryauthor1= json_decode($val->primaryauthor)[0];

    }
    foreach ($data as $val) {
  
      $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->where('paidstatus','1')->first();
      
      if($procurementPayment !=null){
        $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
      }else{
        $val->paymentdate = 'No Date';

      }
      $pub = Publisher::query()
      ->where('id', $val->user_id)
      ->select('id', 'publicationName', 'usertype','mobileNumber','email')
      ->union(
          Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->union(
          PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->first();
      $val->vendorname =  $pub->publicationName;

    }
    foreach ($data as $val) {
      $avginternal = 0;
      $avgexternal = 0;
      $avgpublic = 0;
     $book = Book::find($val->id);
  
  
    $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
    $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
    $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
    $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
    $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
    $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
    $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
    $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
    $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
   if($rinternalcount == 0 &&  $rexternalcount  == 0 &&  $rpubliccount  == 0){
    $mark = 0;
  }else{
  
  
  if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $mark = ($sumexternal / ($rexternalcount)) * 3;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = ($suminternal / ($rinternalcount)) *1;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
    $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
    $mark = ($sumpublic / ($rpubliccount)) * 1;
  } else if ($externalcount == 0 || $rexternalcount == 0) {
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($internalcount == 0 || $rinternalcount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($publiccount == 0 || $rpubliccount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
  } else {
  
    $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
  }
  }
  
   
    $val->internalcount = $internalcount;
    $val->externalcount = $externalcount;
    $val->publiccount = $publiccount;
    $val->rinternalcount = $rinternalcount;
    $val->rexternalcount = $rexternalcount;
    $val->rpubliccount = $rpubliccount;
    $val->avginternal = $avginternal;
    $val->avgexternal = $avgexternal;
    $val->avgpublic = $avgpublic;
    $val->mark = $mark;
   
  }

  return view('admin.master_book_data', compact('data'));
}









  public function reviewer_reviewrec()
  {
    $metBooktotal = Book::where('book_procurement_status', '=', '1')->count();
    $metassignooktotal = Book::where('book_reviewer_id', '!=', Null)->where('book_procurement_status', '=', '1')->count();
    $metcomooktotal = Book::whereNotNull('book_reviewer_id')->where('book_status', '=', '1')->where('book_procurement_status', '=', '1')->count();
    $metnotcomooktotal = Book::where('book_procurement_status', 1)
      ->whereNotNull('book_reviewer_id')
      ->where(function ($query) {
        $query->whereNull('book_status')
          ->orWhere('book_status', 2)
          ->orWhere('book_status', 3);
      })
      ->count();
    $reviewer = (object)[
      'metBooktotal' => $metBooktotal,
      'metassignooktotal' => $metassignooktotal,
      'metcomooktotal' => $metcomooktotal,
      'metnotcomooktotal' => $metnotcomooktotal,
    ];
    $data = [];
    $reviewers = Librarian::where('metaChecker', 'yes')->where('status', '1')->get();

    foreach ($reviewers as $key => $val) {

      $BookReview = Book::where('book_reviewer_id', '=', $val->id)->where('book_procurement_status', '=', '1')->count();
      $BookReviewcom = Book::where('book_reviewer_id', '=', $val->id)->where('book_procurement_status', '=', '1')->where('book_status', '=', '1')->count();
      $BookReviewpen = Book::where('book_procurement_status', 1)
        ->where('book_reviewer_id', '=', $val->id)
        ->where(function ($query) {
          $query->whereNull('book_status')
            ->orWhere('book_status', 2)
            ->orWhere('book_status', 3);
        })->count();


      // $BookReview= BookReviewStatus::where('reviewer_id',$val->id)->get();
      // $BookReviewcom= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','!=',Null)->get();
      // $BookReviewpen= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','=',Null)->get();

      $val->BookReview       = $BookReview;
      $val->BookReviewcom    = $BookReviewcom;
      $val->BookReviewpen    = $BookReviewpen;



      array_push($data, $val);
    }

    return view(
      'admin.metacheck_data',
      compact('data', 'reviewer')
    );
  }


  // public function reviwer_datarec(){

  //   $reviewers= Reviewer::where('reviewerType', '=', 'external')
  //   ->where('status', '=', 1)
  //      ->get();
  //      $data=[];
  //   foreach($reviewers as $key=>$val){
  //    $BookReview= BookReviewStatus::where('reviewer_id',$val->id)->get();
  //   $BookReviewcom= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','!=',Null)->get();
  //   $BookReviewpen= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','=',Null)->get();
  //   $val->BookReview       =count($BookReview);
  //   $val->BookReviewcom    =count($BookReviewcom);
  //   $val->BookReviewpen    =count($BookReviewpen);
  //   array_push($data,$val);

  // }

  // $reviewers1= Reviewer::where('reviewerType', '=', 'internal')
  // ->where('status', '=', 1)
  //    ->get();
  //    $data1=[];
  // foreach($reviewers1 as $key=>$val){
  //  $BookReview= BookReviewStatus::where('reviewer_id',$val->id)->get();
  // $BookReviewcom= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','!=',Null)->get();
  // $BookReviewpen= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','=',Null)->get();
  // $val->BookReview       =count($BookReview);
  // $val->BookReviewcom    =count($BookReviewcom);
  // $val->BookReviewpen    =count($BookReviewpen);
  // array_push($data1,$val);

  // }

  // $reviewers2= Reviewer::where('reviewerType', '=', 'public')
  // ->where('status', '=', 1)
  //    ->get();
  //    $data2=[];
  // foreach($reviewers2 as $key=>$val){
  //  $BookReview= BookReviewStatus::where('reviewer_id',$val->id)->get();
  // $BookReviewcom= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','!=',Null)->get();
  // $BookReviewpen= BookReviewStatus::where('reviewer_id',$val->id)->where('mark','=',Null)->get();
  // $val->BookReview       =count($BookReview);
  // $val->BookReviewcom    =count($BookReviewcom);
  // $val->BookReviewpen    =count($BookReviewpen);
  // array_push($data2,$val);

  // }

  // $metacompletecount = Book::where('book_reviewer_id','!=',Null)->where('book_status','=',1)->where('book_procurement_status','=','1')->count();

  // $reviewerassignCount = BookReviewStatus::
  //      distinct('book_id')
  //      ->count();

  //     $count = count( $reviewers) + count( $reviewers1)+count( $reviewers2);
  // return view('admin.reviwer_data',compact('data','data1','data','metacompletecount','reviewerassignCount')
  // );



  // }
  public function reviwer_datarec() {
    $results = DB::table('reviewer as r')
        ->select(
            'r.id',
            'r.name',
            'r.subject',
            'r.reviewerType',
            DB::raw('COUNT(br.reviewer_id) AS book_reviews_count '),
            DB::raw('COUNT(CASE WHEN br.mark IS NOT NULL THEN 1 END) AS BookReviewcom'),
            DB::raw('COUNT(CASE WHEN br.mark IS NULL THEN 1 END) AS BookReviewpen')
        )
        ->leftJoin('book_review_statuses as br', 'r.id', '=', 'br.reviewer_id')
        ->where('r.status', 1)
        ->whereIn('r.reviewerType', ['external', 'internal', 'public'])
        ->groupBy('r.id', 'r.name', 'r.subject', 'r.reviewerType')
        ->get();
  
    // Ensure $results is not null or empty
  
    if ($results->isEmpty()) {
        // Handle empty results if needed
        return view('admin.reviwer_data', [
            'data' => collect(),
            'data1' => collect(),
            'data2' => collect(),
            'metacompletecount' => 0,
            'reviewerassignCount' => 0,
            'count' => 0
        ]);
    }
  
    $data = $results->filter(function ($item) {
        return $item->reviewerType == 'external';
    });
  
    $data1 = $results->filter(function ($item) {
        return $item->reviewerType == 'internal';
    });
    $reviewerIds1 = collect($data1)->pluck('id');
  
    $reviewCounts1 = DB::table('book_review_statuses')
        ->select('reviewer_id', 
            DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) < 3 THEN 1 ELSE 0 END) as BookReviewpen'), 
            DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) >= 5 THEN 1 ELSE 0 END) as subject'))
        ->whereIn('reviewer_id', $reviewerIds1)
        ->whereNull('remark')
        ->groupBy('reviewer_id')
        ->get();
    
    $countMap = $reviewCounts->keyBy('reviewer_id');
    
    $data2->transform(function ($val) use ($countMap) {
        $val->BookReviewpen = isset($countMap[$val->id]) ? $countMap[$val->id]->BookReviewpen : 0;
        $val->subject = isset($countMap[$val->id]) ? $countMap[$val->id]->subject : 0;
        return $val;
    });
    $data2 = $results->filter(function ($item) {
        return $item->reviewerType == 'public';
    });
  
  $reviewerIds = collect($data2)->pluck('id');
  
  $reviewCounts = DB::table('book_review_statuses')
      ->select('reviewer_id', 
          DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) < 5 THEN 1 ELSE 0 END) as BookReviewpen'), 
          DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) >= 5 THEN 1 ELSE 0 END) as subject'))
      ->whereIn('reviewer_id', $reviewerIds)
      ->whereNull('remark')
      ->groupBy('reviewer_id')
      ->get();
  
  $countMap = $reviewCounts->keyBy('reviewer_id');
  
  $data2->transform(function ($val) use ($countMap) {
      $val->BookReviewpen = isset($countMap[$val->id]) ? $countMap[$val->id]->BookReviewpen : 0;
      $val->subject = isset($countMap[$val->id]) ? $countMap[$val->id]->subject : 0;
      return $val;
  });
  
    $metacompletecount = Book::whereNotNull('book_reviewer_id')
                            ->where('book_status', 1)
                            ->where('book_procurement_status', 1)
                            ->count();
  
    $reviewerassignCount = BookReviewStatus::distinct('book_id')->count();
  
    $count = $data->count() + $data1->count() + $data2->count();
  
    return view('admin.reviwer_data', compact('data', 'data1', 'data2', 'metacompletecount', 'reviewerassignCount', 'count'));
  }
  




//   public function master_book_datareport(Request $request)
//   {

//     // Use eager loading to reduce the number of queries
//     $query = Book::with('librarian');

//     // Apply filters
//     if ($request->has('language_filter') && $request->language_filter != '') {
//       $query->where('language', $request->language_filter);
//     }

//     if ($request->has('subject_filter') && $request->subject_filter != '') {
//       $query->where('subject', $request->subject_filter);
//     }

//     if ($request->has('category_filter') && $request->category_filter != '') {
//       $query->where('category', $request->category_filter);
//     }

//     if ($request->has('payment_filter') && $request->payment_filter != '') {
//       if ($request->payment_filter == 'Success') {
//         $query->whereIn('book_procurement_status', ['1', '5', '6']);
//       } else {
//         $query->whereNotIn('book_procurement_status', ['1', '5', '6']);
//       }
//   }
//   if ($request->has('mark_range') && $request->mark_range != '') {
//     list($min, $max) = explode('-', $request->mark_range);
//     $query->whereBetween('marks', [(int)$min, (int)$max]);
// }
//   if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {
  

//       switch ($request->metachecking_filter) {
//         case 'Success':
//           $query->where('book_status', '1');
//           break;
//         case 'Reject':
//           $query->where('book_status', '0');
//           break;
//         case 'Returned To User Correction':
//             $query->where('book_status', '2');
//             break;
//         case 'Hold':
//             $query->where('book_status', '3');
//             break;
//         case 'No Review':
//             $query->where('book_status', null);
//             break;
//     }
// }
// if ($request->has('negostatus_filter') && $request->negostatus_filter != '') {
  

//   switch ($request->negostatus_filter) {
//       case 'Negotiation from admin':
//           $query->where('negotiation_status', '0');
//           break;
//       case 'Negotiation from user':
//           $query->where('negotiation_status', '1');
//           break;
//       case 'Accepted':
//           $query->where('negotiation_status', '2');
//           break;
//       case 'Rejected':
//           $query->where('negotiation_status', '3');
//           break;
//       case 'Hold':
//             $query->where('negotiation_status', '4');
//             break;
//       case 'No negotiation':
//           $query->where('negotiation_status', null);
//           break;
//   }
// }



// $pub = Publisher::query()
// ->where('id', $val->user_id)
// ->select('id', 'publicationName', 'usertype','mobileNumber','email')
// ->union(
//     Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
// )
// ->union(
//     PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
// )
// ->first();
// $val->vendorname =  $pub->publicationName;

//     if ($request->has('search') && $request->search != '') {
//       $query->where(function ($subQuery) use ($request) {
//         $subQuery->where('book_title', 'like', '%' . $request->search . '%')
//             ->orWhere('product_code', 'like', '%' . $request->search . '%')
//             ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
//             ->orWhere('language', 'like', '%' . $request->search . '%')
//             ->orWhere('marks', 'like', '%' . $request->search . '%')
//             ->orWhere('isbn', 'like', '%' . $request->search . '%');
//     });
//   }

//     $data = $query->get(); // Adjust the number of records per page as needed

//     $procurementStatuses = ["1", "5", "6"];
//     $bookStatusLabels = [
//       "1" => "Success",
//       "0" => "Reject",
//       "2" => "Returned To User Correction",
//       "3" => "Book Update To Return"
//     ];


//   $negobookStatus = [
//        "0" => "Negotiation from admin",
//       "1" => "Negotiation from user",
//       "2" => "Accepted",
//       "3" => "Rejected",
//       "4" => "Hold"
//   ];
//   foreach ($data as $val) {
//       $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
//       $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
//       $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
//       $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "No negotiation";
//   }
//   foreach ($data as $val) {
  
//     $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->first();
    
//     if($procurementPayment !=null){
//       $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
//     }else{
//       $val->paymentdate = 'No Date';

//     }

//   }


//     $actotal = 0;
//     $inactotal = 0;
//     $finaldata = [];
//     $serialNumber = 1;
//     foreach ($data as $val) {



    
//          $finaldata[] = [
//             'S.No' =>  $serialNumber ++,
//             "Book ID"=> $val->product_code,
//             "Book Title"=> $val->book_title,
//             "Book ISBN"=> $val->isbn,
//             "Language of the Book"=> $val->language,
//             "Author Details"=> $val->author_name,
//             "Edition Number"=> $val->edition_number,
//             "Name of Publisher"=> $val->nameOfPublisher,
//             "Vendor Name"=> $val->vendorname,
//             "Year of Publication"=> $val->yearOfPublication,
//             "Place of Publication"=> $val->place,
//             "Subject"=> $val->subject,
//             "Category"=> $val->category,
//             "Binding"=> $val->type,
//             "Size "=> $val->size,
//             "Length x Breadth(in Centimeters)"=> $val->length  *  $val->breadth,
//             "Width(in Centimeters) "=> $val->width,
//             "Weight(in grams)"=> $val->weight,
//             "GSM (Number)"=> $val->gsm,
//             "Type of Paper"=> $val->quality,
//             "Paper Finishing"=> $val->paper_finishing,
//             "Total Number of Pages"=> $val->pages,
//             "Number of Multicolor Pages"=> $val->multicolor,
//             "Number of Mono Color Pages"=> $val->monocolor,
//             "Currency Type"=> $val->currency_type,
//             "Price"=> $val->price,
//             "Discount Offer(%)"=>$val->discount ,
//             "Discounted Price"=> $val->discountedprice,
//             "Payment Status "=> $val->paystatus,
//             "Payment Date "=> $val->paymentdate,
//             "Meta checking Status "=> $val->revstatus,
//             "Meta checker Name"=> $val->reviewername,
//             "Marks"=> $val->marks,
//             "Negotiation Status"=> $val->negostatus,

            
                                      
//         ];
      


      
//      }
     
//      $csvContent ="\xEF\xBB\xBF"; 
//      $csvContent .=   "S.No,Book ID,Book Title,Book ISBN,Language of the Book,Author Details,Edition Number,Name of Publisher,Vendor Name,Year of Publication,Place of Publication,Subject,Category,Binding,Size,Length x Breadth(in Centimeters),Width(in Centimeters),Weight(in grams),GSM (Number),Type of Paper,Paper Finishing,Total Number of Pages,Number of Multicolor Pages,Number of Mono Color Pages,Currency Type,Price,Discount Offer(%),Discounted Price,Payment Status,Payment Date ,Meta checking Status,Meta checker Name,Mark,Negotiation Status\n"; 
//      foreach ($finaldata as $data) {
//          $csvContent .= '"' . implode('","', $data) ."\"\n";
//      }

//     $headers = [
//       'Content-Type' => 'text/csv; charset=utf-8',
//       'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
//     ];

//     return response()->make($csvContent, 200, $headers);
//   }


public function master_book_datareport(Request $request)
{

  $query = Book::with('librarian')
    ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
    ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
    ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
    ->leftJoin('librarians', 'books.book_reviewer_id', '=', 'librarians.id')
    ->leftJoin('unique_authors', 'books.unique_author', '=', 'unique_authors.authorid')


  //   ->leftJoin('procurement_paymrnts', function ($join) {
  //     $join->on(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(procurement_paymrnts.bookid, "$.book_id"))'), '=', 'books.id');
  // })
    ->select(
        'books.*',
        // 'procurement_paymrnts.created_at as procure_created_at',
        DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname'),
        DB::raw("COALESCE(unique_authors.name, 'not yet unified') as authorname"),

        DB::raw('IFNULL(librarians.librarianName, "No Review") as reviewername'),
        DB::raw('IF(books.book_procurement_status IN (1, 5, 6), "Success", "No Payment") as paystatus'),
        DB::raw('CASE
            WHEN books.book_status = 1 THEN "Success"
            WHEN books.book_status = 0 THEN "Reject"
            WHEN books.book_status = 2 THEN "Returned To User Correction"
            WHEN books.book_status = 3 THEN "Book Update To Return"
            ELSE "No Review"
        END as revstatus'),
        DB::raw('CASE
            WHEN books.negotiation_status = 0 THEN "Negotiation Pending"
            WHEN books.negotiation_status = 1 THEN "Renegotiation By Vendor"
            WHEN books.negotiation_status = 5 THEN "Renegotiation By Admin"
            WHEN books.negotiation_status = 2 THEN "Agree"
            WHEN books.negotiation_status = 3 THEN "Disagree"

            ELSE "Not send negotiation"
        END as negostatus'),
          // Subqueries for counts
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "internal") as internalcount'),
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "external") as externalcount'),
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "public") as publiccount'),
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "internal" AND mark IS NOT NULL) as rinternalcount'),
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "external" AND mark IS NOT NULL) as rexternalcount'),
          DB::raw('(SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "public" AND mark IS NOT NULL) as rpubliccount'),
          // Subqueries for sums
          DB::raw('(SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "internal" AND mark IS NOT NULL) as suminternal'),
          DB::raw('(SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "external" AND mark IS NOT NULL) as sumexternal'),
          DB::raw('(SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = "public" AND mark IS NOT NULL) as sumpublic'),
          DB::raw("CASE 
          WHEN 
              (SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND mark IS NOT NULL) = 0 
          THEN 0
          ELSE 
              COALESCE(
                  (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'external' AND mark IS NOT NULL) 
                  / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'external' AND mark IS NOT NULL), 0) * 3, 0
              ) + 
              COALESCE(
                  (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'internal' AND mark IS NOT NULL) 
                  / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'internal' AND mark IS NOT NULL), 0) * 1, 0
              ) + 
              COALESCE(
                  (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'public' AND mark IS NOT NULL) 
                  / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'public' AND mark IS NOT NULL), 0) * 1, 0
              )
      END as mark,
      
      COALESCE(
          (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'internal' AND mark IS NOT NULL) 
          / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'internal' AND mark IS NOT NULL), 0) * 1, 0
      ) AS avginternal,
      
      COALESCE(
          (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'external' AND mark IS NOT NULL) 
          / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'external' AND mark IS NOT NULL), 0) * 3, 0
      ) AS avgexternal,
      
      COALESCE(
          (SELECT SUM(mark) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'public' AND mark IS NOT NULL) 
          / NULLIF((SELECT COUNT(*) FROM book_review_statuses WHERE book_review_statuses.book_id = books.id AND reviewertype = 'public' AND mark IS NOT NULL), 0) * 1, 0
      ) AS avgpublic")
      
      
      
        // Add the payment date field
        // DB::raw('IFNULL(DATE_FORMAT(procurement_paymrnts.created_at, "%d-%m-%Y"), "No Date") as paymentdate')
    )
 

    ->groupBy(
        'books.id',
        'books.product_code',
        'publishers.publicationName',
        'distributors.distributionName',
        'publisher_distributors.publicationDistributionName',
        'unique_authors.name',
        'librarians.librarianName',
        'books.book_procurement_status',
        'books.book_status',
        'books.negotiation_status',
        // 'procurement_paymrnts.created_at'  
    );




//   $query = Book::with('librarian')
//   ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
//   ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
//   ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
//   ->leftJoin('librarians', 'books.book_reviewer_id', '=', 'librarians.id')
//   ->select([
//       'books.*',
//       DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname'),
//       DB::raw('IFNULL(librarians.librarianName, "No Review") as reviewername'),
//       DB::raw('IF(books.book_procurement_status IN (1, 5, 6), "Success", "No Payment") as paystatus'),
//       DB::raw('CASE
//           WHEN books.book_status = 1 THEN "Success"
//           WHEN books.book_status = 0 THEN "Reject"
//           WHEN books.book_status = 2 THEN "Returned To User Correction"
//           WHEN books.book_status = 3 THEN "Book Update To Return"
//           ELSE "No Review"
//       END as revstatus'),
//       DB::raw('CASE
//           WHEN books.negotiation_status = 0 THEN "Negotiation Pending"
//           WHEN books.negotiation_status = 1 THEN "Renegotiation By Vendor"
//           WHEN books.negotiation_status = 5 THEN "Renegotiation By Admin"
//           WHEN books.negotiation_status = 2 THEN "Agree"
//           WHEN books.negotiation_status = 3 THEN "Disagree"
//           ELSE "No Srnd negotiation"
//       END as negostatus'),

//       // Ensure count values do not return NULL
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "internal") AS internalcount'),
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "external") AS externalcount'),
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "public") AS publiccount'),

//       // Ensure valid review counts return 0 instead of NULL
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "internal" AND mark IS NOT NULL) AS rinternalcount'),
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "external" AND mark IS NOT NULL) AS rexternalcount'),
//       DB::raw('(SELECT COALESCE(COUNT(*), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "public" AND mark IS NOT NULL) AS rpubliccount'),

//       // Ensure sum values return 0 instead of NULL
//       DB::raw('(SELECT COALESCE(SUM(mark), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "internal" AND mark IS NOT NULL) AS suminternal'),
//       DB::raw('(SELECT COALESCE(SUM(mark), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "external" AND mark IS NOT NULL) AS sumexternal'),
//       DB::raw('(SELECT COALESCE(SUM(mark), 0) FROM book_review_statuses WHERE book_id = books.id AND reviewertype = "public" AND mark IS NOT NULL) AS sumpublic')
//   ]);

// return $data = $query->get(5);











     
  // Apply filters based on request
  if ($request->has('language_filter') && $request->language_filter != '') {
      $query->where('books.language', $request->language_filter); // Specify the table for 'language'
  }

  if ($request->has('subject_filter') && $request->subject_filter != '') {
      $query->where('books.subject', $request->subject_filter); // Specify the table for 'subject'
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('books.category', $request->category_filter); // Specify the table for 'category'
  }

  if ($request->has('payment_filter') && $request->payment_filter != '') {
      if ($request->payment_filter == 'Success') {
          $query->whereIn('books.book_procurement_status', ['1', '5', '6']);
      } else {
          $query->whereNotIn('books.book_procurement_status', ['1', '5', '6']);
      }
  }

  
  
 
  if ($request->has('mark_range') && $request->mark_range != '') {
      list($min, $max) = explode('-', $request->mark_range);
      $query->whereBetween('books.marks', [(int)$min, (int)$max]); // Specify the table for 'marks'
  }

  if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {
      switch ($request->metachecking_filter) {
          case 'Success':
              $query->where('books.book_status', '1');
              break;
          case 'Reject':
              $query->where('books.book_status', '0');
              break;
          case 'Returned To User Correction':
              $query->where('books.book_status', '2');
              break;
          case 'Hold':
              $query->where('books.book_status', '3');
              break;
          case 'No Review':
              $query->where('books.book_status', null);
              break;
      }
  }

  if ($request->has('negostatus_filter') && trim($request->negostatus_filter) != '') {
    $query->where('marks', '>=', 40) // Common condition
    ->whereNotNull('final_price');

    switch (trim($request->negostatus_filter)) {
        case 'Negotiation Pending':
            $query->where('negotiation_status', '0');
            break;
        case 'Agree':
            $query->where('negotiation_status','=',2);
            break;
        case 'Disagree':
            $query->where('negotiation_status', '3');
            break;
        case 'Renegotiation By Vendor':
            $query->where('negotiation_status', '1');
            break;
        case 'Renegotiation By Admin':
            $query->where('negotiation_status', '5');
            break;
        case 'Not send negotiation':
            $query->whereNull('negotiation_status'); // Proper handling of NULL
            break;
    }
}

  if ($request->has('search') && $request->search != '') {
      $query->where(function ($subQuery) use ($request) {
          $subQuery->where('books.book_title', 'like', '%' . $request->search . '%')
              ->orWhere('books.product_code', 'like', '%' . $request->search . '%')
              ->orWhere('books.nameOfPublisher', 'like', '%' . $request->search . '%')
              ->orWhere('publishers.publicationName', 'like', '%' . $request->search . '%')
              ->orWhere('distributors.distributionName', 'like', '%' . $request->search . '%')
              ->orWhere('publisher_distributors.publicationDistributionName', 'like', '%' . $request->search . '%')
              ->orWhere('unique_authors.name', 'like', '%' . $request->search . '%')
              ->orWhere('books.language', 'like', '%' . $request->search . '%')
              ->orWhere('books.marks', 'like', '%' . $request->search . '%')
              ->orWhere('books.isbn', 'like', '%' . $request->search . '%');
      });
  }

 $data =$query->get()->unique('id');
  
  // return $uniqueIdCount = $data->pluck('id')->unique()->count();

//   foreach ($data as $val) {
 
//     $avginternal = 0;
//     $avgexternal = 0;
//     $avgpublic = 0;
//    $book = Book::find($val->id);


//   $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
//   $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
//   $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
//   $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
//   $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
//   $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
//   $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
//   $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
//   $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
//  if($rinternalcount == 0 &&  $rexternalcount  == 0 &&  $rpubliccount  == 0){
//   $mark = 0;
// }else{


// if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
//   $avgexternal = ($sumexternal / ($rexternalcount)) *3;
//   $mark = ($sumexternal / ($rexternalcount)) * 3;
// } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
//   $avginternal  = ($suminternal / ($rinternalcount)) *1;
//   $mark = ($suminternal / ($rinternalcount)) *1;
// } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
//   $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
//   $mark = ($sumpublic / ($rpubliccount)) * 1;
// } else if ($externalcount == 0 || $rexternalcount == 0) {
//   $avginternal  = ($suminternal / ($rinternalcount)) * 1;
//   $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
//   $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
// } else if ($internalcount == 0 || $rinternalcount == 0) {
//   $avgexternal = ($sumexternal / ($rexternalcount)) *3;
//   $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
//   $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
// } else if ($publiccount == 0 || $rpubliccount == 0) {
//   $avgexternal = ($sumexternal / ($rexternalcount)) *3;
//   $avginternal  = ($suminternal / ($rinternalcount)) *1;
//   $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
// } else {

//   $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
//   $avginternal  = ($suminternal / ($rinternalcount)) * 1;
//   $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
//   $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
// }
// }

 
//   $val->internalcount = $internalcount;
//   $val->externalcount = $externalcount;
//   $val->publiccount = $publiccount;
//   $val->rinternalcount = $rinternalcount;
//   $val->rexternalcount = $rexternalcount;
//   $val->rpubliccount = $rpubliccount;
//   $val->avginternal = $avginternal;
//   $val->avgexternal = $avgexternal;
//   $val->avgpublic = $avgpublic;
//   $val->mark = $mark;

// }

  $ids = $data->pluck('id')->toArray(); // Collect all ids from $data into an array

 $payments = Procurementpaymrnt::where(function($query) use ($ids) {

      foreach ($ids as $id) {
          $query->orWhereJsonContains('bookId', (string) $id)->where('paidstatus','1'); 
      }
  })
  ->select('bookId', 'created_at') 
  ->get()
  ->keyBy('bookId');
  $csvContent = "\xEF\xBB\xBF"; 
  $csvContent .= "S.No,Book ID,Book Title,Book ISBN,Language of the Book,Author Details,Primary Author Details,Unique Author,Edition Number,Name of Publisher,Vendor Name,Year of Publication,Place of Publication,Subject,Category,Binding,Size,Length x Breadth(in Centimeters),Width(in Centimeters),Weight(in grams),GSM (Number),Type of Paper,Paper Finishing,Total Number of Pages,Number of Multicolor Pages,Number of Mono Color Pages,Currency Type,Price,Discount Offer(%),Discounted Price,Payment Status,Payment Date,Meta checking Status,Meta checker Name,Librarian Review/Assign,Expert Review/Assign,Public Review/Assign,Librarian,Expert,Public,Marks,Negotiation Status,Expected Price,Final Price\n";

  $serialNumber = 1;
  foreach ($data as $val) {
    $payment = $payments->firstWhere(function($payment) use ($val) {
      return in_array((string) $val->id, json_decode($payment->bookId)); // Check if $val->id exists in the JSON array
  });

  if ($payment) {
      $val->paymentdate = \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y');
      $val->primaryauthor1= json_decode($val->primaryauthor)[0];

  } else {
      $val->paymentdate = 'No Date';
  }
      $csvContent .= '"' . implode('","', [
          $serialNumber++,
          $val->product_code,
          $val->book_title,
          $val->isbn,
          $val->language,
          $val->author_name,
          $val->primaryauthor1,
          $val->authorname,
          $val->edition_number,
          $val->nameOfPublisher,
          $val->vendorname,
          $val->yearOfPublication,
          $val->place,
          $val->subject,
          $val->category,
          $val->type,
          $val->size,
          $val->length * $val->breadth,
          $val->width,
          $val->weight,
          $val->gsm,
          $val->quality,
          $val->paper_finishing,
          $val->pages,
          $val->multicolor,
          $val->monocolor,
          $val->currency_type,
          $val->price,
          $val->discount,
          $val->discountedprice,
          $val->paystatus,
          $val->paymentdate,
          $val->revstatus,
          $val->reviewername,
          $val->internalcount .'|'.$val->rinternalcount,
          $val->externalcount.'|'. $val->rexternalcount,
          $val->publiccount.'|'.$val->rpubliccount,
          $val->avginternal,
          $val->avgexternal,
          $val->avgpublic,
          $val->marks,
          $val->negostatus,
          $val->calculated_price ?? 0 ,
          $val->final_price ?? 0,
      ]) . "\"\n";
     
  }

  $headers = [
      'Content-Type' => 'text/csv; charset=utf-8',
      'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
  ];

  return response()->make($csvContent, 200, $headers);
}




  public function categoryupdate(Request $req)
  {
    $book = Book::find($req->id);
    $book->category = $req->category;
    $book->update();

    $data = [
      'success' => 'Category Updated Successfully',
    ];
    return response()->json($data);
  }
  public function subjectupdate(Request $req)
  {

    $book = Book::find($req->id);
    $book->subject = $req->subject;
    $book->update();
    $data = [
      'success' => 'Subject Updated Successfully',
    ];
    return response()->json($data);
  }

  public function book_edit($id)
  {
    $book = Book::find($id);
    $book->primaryauthor1 = json_decode($book->primaryauthor);
    $book->trans_from1 = json_decode($book->trans_from);
    $book->other_img1 = json_decode($book->other_img);
    $book->booktag1 = json_decode($book->booktag);
    $book->trans_author1 = json_decode($book->trans_author);
    $book->bookdescription1 = json_decode($book->bookdescription);
    $book->series1 = json_decode($book->series);
    $book->volume1 = json_decode($book->volume);
    $book->banner_img1 = json_decode($book->banner_img);
    if ($book->user_type == "publisher") {
      $pub = Publisher::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else if ($book->user_type == "distributor") {
      $pub = Distributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else {
      $pub = PublisherDistributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    }
    \Session::put('book', $book);
    return redirect('admin/bookedit');
  }

  public function getlanguage(Request $request)
  {
    $lang = $request->lang;
    if ($lang == "Tamil") {
      $subjects = Booksubject::where('type', $lang)->get();
    } else {
      $subjects = Booksubject::where('type', "English")->get();
    }



    return response()->json(['subjects' => $subjects]);
  }
  public function removeImage(Request $request)
  {
    $book = Book::find($request->bookId);
    $imageFileName = $request->input('imageFileName');
    $otherImages = json_decode($book->other_img, true);
    $index = array_search($imageFileName, $otherImages);
    if ($index !== false) {
      unset($otherImages[$index]);
      $otherImages = array_values($otherImages);
    }
    if (count($otherImages) > 0) {
      $book->other_img = json_encode($otherImages);
    } else {
      $book->other_img = null;
    }

    $book->save();


    $book->primaryauthor1 = json_decode($book->primaryauthor);
    $book->trans_from1 = json_decode($book->trans_from);
    $book->other_img1 = json_decode($book->other_img);
    $book->booktag1 = json_decode($book->booktag);
    $book->trans_author1 = json_decode($book->trans_author);
    $book->bookdescription1 = json_decode($book->bookdescription);
    $book->series1 = json_decode($book->series);
    $book->volume1 = json_decode($book->volume);
    $book->banner_img1 = json_decode($book->banner_img);
    if ($book->user_type == "publisher") {
      $pub = Publisher::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else if ($book->user_type == "distributor") {
      $pub = Distributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else {
      $pub = PublisherDistributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    }
    if (Session::has('book')) {
      Session::forget('book');
    }
    Session::put('book', $book);
    $filePath = public_path('Books/other_img/' . $imageFileName);
    if (file_exists($filePath)) {
      unlink($filePath);
    }
    return response()->json(['success' => true, "otherImages" => $otherImages]);
  }

  public function removeImageHighlights(Request $request)
  {
    $book = Book::find($request->bookId);
    $imageFileName = $request->input('imageFileName');
    $otherImages = json_decode($book->banner_img, true);
    $index = array_search($imageFileName, $otherImages);
    if ($index !== false) {
      unset($otherImages[$index]);
      $otherImages = array_values($otherImages);
    }
    if (count($otherImages) > 0) {
      $book->banner_img = json_encode($otherImages);
    } else {
      $book->banner_img = null;
    }

    $book->save();
    if (Session::has('book')) {
      Session::forget('book');
    }
    $book->primaryauthor1 = json_decode($book->primaryauthor);
    $book->trans_from1 = json_decode($book->trans_from);
    $book->other_img1 = json_decode($book->other_img);
    $book->booktag1 = json_decode($book->booktag);
    $book->trans_author1 = json_decode($book->trans_author);
    $book->bookdescription1 = json_decode($book->bookdescription);
    $book->series1 = json_decode($book->series);
    $book->volume1 = json_decode($book->volume);
    $book->banner_img1 = json_decode($book->banner_img);
    if ($book->user_type == "publisher") {
      $pub = Publisher::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else if ($book->user_type == "distributor") {
      $pub = Distributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else {
      $pub = PublisherDistributor::find($book->user_id);

      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    }
    Session::put('book', $book);
    $filePath = public_path('Books/other_img/' . $imageFileName);
    if (file_exists($filePath)) {
      unlink($filePath);
    }
    return response()->json(['success' => true, "otherImages" => $otherImages]);
  }

  public function update(Request $request)
  {


    $validator = Validator::make($request->all(), [
      'book_title'                          => ['required'],
      'size'                          => ['required'],
      'weight'                          => ['required'],
      'type'                          => ['required'],
      'length_breadth'                          => ['required'],
      'paper_finishing'                          => ['required'],
      'currency_type'                          => ['required'],
      'width'                          => ['required'],
      'gsm'                          => ['required'],
      'quality'                          => ['required'],
      'multicolor'                          => ['required'],
      'monocolor'                          => ['required'],
      'pages'                          => ['required'],
      'isbn'                          => ['required'],
      'place'                          => ['required'],
      'price'                          => ['required'],
      'language.*'                          => ['required'],
      'banner_img.*'                    => ['required'],
      'category'                          => ['required'],
      'description'                          => ['required'],
      'author_name'                          => ['required'],
      'author_description'                          => ['required'],
      'bookdescription.*'                          => ['required'],
      'productdescription'                          => ['required'],

    ]);
    if ($validator->fails()) {
      // return $validator->errors();
      return redirect()->back()->withInput()->withErrors($validator->errors());
    }
    $book = Book::find($request->id);
    if (!isset($request->banner_img)) {
      if ($book->banner_img == null) {
        return back()->with('imageerror', "Books highlights image is required field");
      }
    }
    $heightWidthString = $request->length_breadth;


    $dimensionsArray = explode('x', $heightWidthString);
    $length = trim($dimensionsArray[0]);
    $breadth = trim($dimensionsArray[1]);
    if ($request->series_number[0] != null && $request->series_title[0] != null && $request->isbn_number[0] != null) {
      $series_number = $request->series_number;
      $series_title = $request->series_title;
      $isbn_number = $request->isbn_number;
      $series_num = sizeof($series_number);
      $series = [];
      for ($i = 0; $i < $series_num; $i++) {
        $obj = (object)[
          "series_number" => $series_number[$i],
          "series_title" => $series_title[$i],
          "isbn_number" => $isbn_number[$i],
        ];
        array_push($series, $obj);
      }
      $book->series =        json_encode($series);
    }
    //    volume
    if ($request->volume_number[0] != null && $request->volume_title[0] != null && $request->isbn_number1[0] != null) {

      $volume_number = $request->volume_number;
      $volume_title = $request->volume_title;
      $isbn_number1 = $request->isbn_number1;
      $volume_num = sizeof($volume_number);
      $volume = [];
      for ($i = 0; $i < $volume_num; $i++) {
        $obj = (object)[
          "volume_number" => $volume_number[$i],
          "volume_title" => $volume_title[$i],
          "isbn_number" => $isbn_number1[$i],
        ];
        array_push($volume, $obj);
      }
      $book->volume =        json_encode($volume);
    }

    //Sample Files
    if (isset($request->sample_file)) {
      $oldfiletype = $book->sample_file;
      if ($oldfiletype == "Pdf") {
        $oldFilePath = $book->sample_pdf;
        if ($oldFilePath) {
          if (File::exists(public_path('Books/samplepdf/' . $oldFilePath))) {
            File::delete(public_path('Books/samplepdf/' . $oldFilePath));
          }
        }
        $book->sample_pdf = null;
      } else {
        $oldFilePath = $book->sample_epub;
        if ($oldFilePath) {
          if (File::exists(public_path('Books/sampleepub/' . $oldFilePath))) {
            File::delete(public_path('Books/sampleepub/' . $oldFilePath));
          }
        }
        $book->sample_epub = null;
      }
      if ($request->sample_file == "Pdf") {
        if ($request->hasFile('sample_pdf')) {
          $samplepdf = $request->file('sample_pdf');
          $samplepdf_name = time() . '_' . $samplepdf->getClientOriginalName();
          $samplepdf->move(('Books/samplepdf'), $samplepdf_name);
          $book->sample_pdf = $samplepdf_name;
          $book->sample_file = $request->sample_file;
        }
      } else {
        if ($request->hasFile('sample_epub')) {
          $sampleepub = $request->file('sample_epub');
          $sampleepub_name = time() . '_' . $sampleepub->getClientOriginalName();
          $sampleepub->move(('Books/sampleepub'), $sampleepub_name);
          $book->sample_epub = $sampleepub_name;
          $book->sample_file = $request->sample_file;
        }
      }
    }

    //Front Img
    if (isset($request->front_img)) {
      $oldFilePath = $book->front_img;
      if ($oldFilePath) {
        if (File::exists(public_path('Books/front/' . $oldFilePath))) {
          File::delete(public_path('Books/front/' . $oldFilePath));
        }
      }
      if ($request->hasFile('front_img')) {
        $front = $request->file('front_img');
        $front_name = time() . '_' . $front->getClientOriginalName();
        $front->move(('Books/front'), $front_name);
        $book->front_img = $front_name;
      }
    }

    // Back Image
    if (isset($request->back_img)) {
      $oldFilePath = $book->back_img;
      if ($oldFilePath) {
        if (File::exists(public_path('Books/back/' . $oldFilePath))) {
          File::delete(public_path('Books/back/' . $oldFilePath));
        }
      }
      if ($request->hasFile('back_img')) {
        $back = $request->file('back_img');
        $back_name = time() . '_' . $back->getClientOriginalName();
        $back->move(('Books/back'), $back_name);
        $book->back_img = $back_name;
      }
    }

    //Other Image
    if (isset($request->full_img)) {
      $oldFilePath = $book->full_img;
      if ($oldFilePath) {
        if (File::exists(public_path('Books/full/' . $oldFilePath))) {
          File::delete(public_path('Books/full/' . $oldFilePath));
        }
      }
      if ($request->hasFile('full_img')) {
        $full = $request->file('full_img');
        $full_name = time() . '_' . $full->getClientOriginalName();
        $full->move(public_path('Books/full'), $full_name);
        $book->full_img = $full_name;
      }
    }

    //Author Image
    if (isset($request->author_img)) {
      $oldFilePath = $book->author_img;
      if ($oldFilePath) {
        if (File::exists(public_path('Books/author_img/' . $oldFilePath))) {
          File::delete(public_path('Books/author_img/' . $oldFilePath));
        }
      }
      if ($request->hasFile('author_img')) {
        $author_img = $request->file('author_img');
        $author_img_name = time() . '_' . $author_img->getClientOriginalName();
        $author_img->move(('Books/author_img'), $author_img_name);
        $book->author_img = $author_img_name;
      }
    }
    //Highlights
    if (isset($request->banner_img)) {
      $bannerimg = $request->banner_img;
      $mem_len = sizeof($bannerimg);
      if ($book->banner_img != null) {
        $banner = json_decode($book->banner_img);
        $banner = $banner;
      } else {
        $banner = [];
      }
      for ($i = 0; $i < $mem_len; $i++) {
        $bannerim = $bannerimg[$i];
        $banner_name = $request->book_title . time() . '_' . $bannerim->getClientOriginalName();
        $bannerim->move(('Books/banner'), $banner_name);
        array_push($banner, $banner_name);
      }
      $book->banner_img = json_encode($banner);
    }

    //Product Image
    if (isset($request->product_img)) {
      $oldFilePath = $book->product_img;
      if ($oldFilePath) {
        if (File::exists(public_path('Books/product/' . $oldFilePath))) {
          File::delete(public_path('Books/product/' . $oldFilePath));
        }
      }
      if ($request->hasFile('product_img')) {
        $product = $request->file('product_img');
        $product_name = time() . '_' . $product->getClientOriginalName();
        $product->move(('Books/product'), $product_name);
        $book->product_img = $product_name;
      }
    }

    //otherImg
    if (isset($request->other_img)) {
      $other_image = $request->other_img;
      $mem_len = sizeof($other_image);
      if ($book->other_img != null) {
        $others = json_decode($book->other_img);
        $others = $others;
      } else {
        $others = [];
      }
      for ($i = 0; $i < $mem_len; $i++) {
        $other = $other_image[$i];

        $other_name = $request->book_title . time() . '_' . $other->getClientOriginalName();
        $other->move(('Books/other_img'), $other_name);
        array_push($others, $other_name);
      }
      $book->other_img = json_encode($others);
    }
    $book->book_title = $request->book_title;
    $book->subtitle =       $request->subtitle ?? Null;
    $book->booktag =        json_encode($request->tag)  ?? Null;
    $book->edition_number =       $request->edition_number  ?? Null;
    $book->primaryauthor =      json_encode($request->primaryauthor);
    if ($request->trans_author[0] != null || $request->trans_author[1] != null || $request->trans_author[2] != null) {
      $book->trans_author =        json_encode($request->trans_author)  ?? Null;
    }
    if ($request->trans_from[0] != null || $request->trans_from[1] != null) {
      $book->trans_from =        json_encode($request->trans_from)  ?? Null;
    }
    $book->discountedprice =        $request->discountedprice1;
    $book->discount =       $request->discount;
    $book->type =        $request->type;
    $book->length =       $length;
    $book->breadth =       $breadth;
    $book->paper_finishing =      $request->paper_finishing;
    $book->length_breadth =      $request->length_breadth;
    $book->currency_type =      $request->currency_type;
    $book->size =       $request->size;
    $book->width =       $request->width;
    $book->weight =       $request->weight;
    $book->gsm =       $request->gsm;
    $book->quality =       $request->quality;
    $book->multicolor =       $request->multicolor;
    $book->monocolor =       $request->monocolor;
    $book->pages =       $request->pages;
    $book->isbn =       $request->isbn;
    $book->subject =       $request->subject;
    $book->product_code = $book->product_code;
    $book->others =       $request->others  ?? Null;
    $book->place =       $request->place;
    $book->price =       $request->price;
    $book->language =       $request->language;
    $book->other_indian = $request->Other_Indian ?? Null;
    $book->other_foreign = $request->Other_Foreign ?? Null;
    $book->category =       $request->category;
    $book->description =       $request->description;
    $book->notes =       $request->notes  ?? Null;
    $book->author_name =       $request->author_name;
    $book->author_description =       $request->author_description;
    $book->bookdescription =       json_encode($request->bookdescription);
    $book->productdescription =       $request->productdescription;
    $book->nameOfPublisher =       $request->nameOfPublisher;
    $book->yearOfPublication =       $request->yearOfPublication;

    $book->save();



    $book->primaryauthor1 = json_decode($book->primaryauthor);
    $book->trans_from1 = json_decode($book->trans_from);
    $book->other_img1 = json_decode($book->other_img);
    $book->booktag1 = json_decode($book->booktag);
    $book->trans_author1 = json_decode($book->trans_author);
    $book->bookdescription1 = json_decode($book->bookdescription);
    $book->series1 = json_decode($book->series);
    $book->volume1 = json_decode($book->volume);
    $book->banner_img1 = json_decode($book->banner_img);
    if ($book->user_type == "publisher") {
      $pub = Publisher::find($book->user_id);
      $publicationName = $pub->publicationName;
      $book->publicationName = $publicationName;
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else if ($book->user_type == "distributor") {
      $pub = Distributor::find($book->user_id);
      $publicationName = $pub->distributionName;
      $book->publicationName = $publicationName;
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    } else {
      $pub = PublisherDistributor::find($book->user_id);
      $publicationName = $pub->publicationDistributionName;
      $book->publicationName = $publicationName;
      $book->firstName = $pub->firstName;
      $book->lastName = $pub->lastName;
    }
    if (Session::has('book')) {
      Session::forget('book');
    }
    Session::put('book', $book);
    return back()->with('success', "Books updated successfully");
  }

  public function master_nego_book_data(Request $request)
  {
    $query = Book::with('librarian')->where('marks', '>=', 40)->where('negotiation_status','=', null)->where('self_nominated','=', 0);
  
    // Apply filters
    if ($request->has('language_filter') && $request->language_filter != '') { 
      $query->where('language', $request->language_filter);
    }
  
    if ($request->has('subject_filter') && $request->subject_filter != '') {
      $query->where('subject', $request->subject_filter);
    }
  
    if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('category', $request->category_filter);
  } 
   if ($request->has('mark_range') && $request->mark_range != '') {
    list($min, $max) = explode('-', $request->mark_range);
    $query->whereBetween('marks', [(int)$min, (int)$max]);
  }
  if ($request->has('search') && $request->search != '') {
  $query->where(function ($subQuery) use ($request) {
      $subQuery->where('book_title', 'like', '%' . $request->search . '%')
          ->orWhere('product_code', 'like', '%' . $request->search . '%')
          ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
          ->orWhere('language', 'like', '%' . $request->search . '%')
          ->orWhere('marks', 'like', '%' . $request->search . '%')
          ->orWhere('isbn', 'like', '%' . $request->search . '%');
  });
  
  
  }
  
  $query ->orderBy('marks', 'desc');
  $data = $query->paginate(15);
  
    $procurementStatuses = ["1", "5", "6"];
    $bookStatusLabels = [
      "1" => "Success",
      "0" => "Reject",
      "2" => "Returned To User Correction",
      "3" => "Book Update To Return"
    ];
  
    foreach ($data as $val) {
      $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
      $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
      $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
    
      $pub = Publisher::query()
      ->where('id', $val->user_id)
      ->select('id', 'publicationName', 'usertype','mobileNumber','email')
      ->union(
          Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->union(
          PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->first();
      $val->vendorname =  $pub->publicationName;
  
    }
    foreach ($data as $val) {
      $avginternal = 0;
      $avgexternal = 0;
      $avgpublic = 0;
    $book = Book::find($val->id);
    $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
    $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
    $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
    $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
    $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
    $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
    $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
    $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
    $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
  
    if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $avgexternal = ($sumexternal / ($rexternalcount)) *3;
      $mark = ($sumexternal / ($rexternalcount)) * 3;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $avginternal  = ($suminternal / ($rinternalcount)) *1;
      $mark = ($suminternal / ($rinternalcount)) *1;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
      $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
      $mark = ($sumpublic / ($rpubliccount)) * 1;
    } else if ($externalcount == 0 || $rexternalcount == 0) {
      $avginternal  = ($suminternal / ($rinternalcount)) * 1;
      $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
      $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
    } else if ($internalcount == 0 || $rinternalcount == 0) {
      $avgexternal = ($sumexternal / ($rexternalcount)) *3;
      $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
      $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
    } else if ($publiccount == 0 || $rpubliccount == 0) {
      $avgexternal = ($sumexternal / ($rexternalcount)) *3;
      $avginternal  = ($suminternal / ($rinternalcount)) *1;
      $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
    } else {
  
      $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
      $avginternal  = ($suminternal / ($rinternalcount)) * 1;
      $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
      $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
    }
  
  
  
   
    $val->internalcount = $internalcount;
    $val->externalcount = $externalcount;
    $val->publiccount = $publiccount;
    $val->rinternalcount = $rinternalcount;
    $val->rexternalcount = $rexternalcount;
    $val->rpubliccount = $rpubliccount;
    $val->avginternal = $avginternal;
    $val->avgexternal = $avgexternal;
    $val->avgpublic = $avgpublic;
    $val->mark = $mark;
  
  }
   
  
    return view('admin.master_nego_book_data', compact('data'));
  }
  
  public function master_nego_book_datareport(Request $request)
  {
  
    $query = Book::with('librarian')->where('marks', '>=', 40)->where('negotiation_status','=', null)->where('self_nominated','=', 0);
  
    // Apply filters
    if ($request->has('language_filter') && $request->language_filter != '') { 
      $query->where('language', $request->language_filter);
    }
  
    if ($request->has('subject_filter') && $request->subject_filter != '') {
      $query->where('subject', $request->subject_filter);
    }
  
    if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('category', $request->category_filter);
  } 
   if ($request->has('mark_range') && $request->mark_range != '') {
    list($min, $max) = explode('-', $request->mark_range);
    $query->whereBetween('marks', [(int)$min, (int)$max]);
  }
  if ($request->has('search') && $request->search != '') {
  $query->where(function ($subQuery) use ($request) {
      $subQuery->where('book_title', 'like', '%' . $request->search . '%')
          ->orWhere('product_code', 'like', '%' . $request->search . '%')
          ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
          ->orWhere('language', 'like', '%' . $request->search . '%')
          ->orWhere('marks', 'like', '%' . $request->search . '%')
          ->orWhere('isbn', 'like', '%' . $request->search . '%');
  });
  
  
  }
  
  $query ->orderBy('marks', 'desc');
  
   $data = $query->get(); 
  
    $procurementStatuses = ["1", "5", "6"];
    $bookStatusLabels = [
      "1" => "Success",
      "0" => "Reject",
      "2" => "Returned To User Correction",
      "3" => "Book Update To Return"
    ];
  
    foreach ($data as $val) {
      $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
      $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
      $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
      $pub = Publisher::query()
      ->where('id', $val->user_id)
      ->select('id', 'publicationName', 'usertype','mobileNumber','email')
      ->union(
          Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->union(
          PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
      )
      ->first();
      $val->vendorname =  $pub->publicationName;
    }
  
    foreach ($data as $val) {
      $avginternal = 0;
      $avgexternal = 0;
      $avgpublic = 0;
     $book = Book::find($val->id);
  
  
    $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
    $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
    $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
    $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
    $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
    $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
    $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
    $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
    $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
  //  if($rinternalcount == 0 &&  $rexternalcount  == 0 &&  $rpubliccount  == 0){
  //       return  $book;
  // }
  if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $mark = ($sumexternal / ($rexternalcount)) * 3;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = ($suminternal / ($rinternalcount)) *1;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
    $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
    $mark = ($sumpublic / ($rpubliccount)) * 1;
  } else if ($externalcount == 0 || $rexternalcount == 0) {
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($internalcount == 0 || $rinternalcount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($publiccount == 0 || $rpubliccount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
  } else {
  
    $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
  }
  
  
   
    $val->internalcount = $internalcount;
    $val->externalcount = $externalcount;
    $val->publiccount = $publiccount;
    $val->rinternalcount = $rinternalcount;
    $val->rexternalcount = $rexternalcount;
    $val->rpubliccount = $rpubliccount;
    $val->avginternal = $avginternal;
    $val->avgexternal = $avgexternal;
    $val->avgpublic = $avgpublic;
    $val->mark = $mark;
   
  }
  
  
    $actotal = 0;
    $inactotal = 0;
    $finaldata = [];
    $serialNumber = 1;
    foreach ($data as $val) {
  
     
  
     if($val->rexternalcount >=1){
        
      $finaldata[] = [
        'S.No' =>  $serialNumber++,
        "Book ID" => $val->product_code,
        "Book Title" => $val->book_title,
        "Book ISBN" => $val->isbn,
        "Language of the Book" => $val->language,
        "Author Details" => $val->author_name,
        "Edition Number" => $val->edition_number,
        "Name of Publisher" => $val->nameOfPublisher,
        "Vendor Name" => $val->vendorname,
        "Year of Publication" => $val->yearOfPublication,
        "Place of Publication" => $val->place,
        "Subject" => $val->subject,
        "Category" => $val->category,
        "Binding" => $val->type,
        "Size " => $val->size,
        "Length x Breadth(in Centimeters)" => $val->length  *  $val->breadth,
        "Width(in Centimeters) " => $val->width,
        "Weight(in grams)" => $val->weight,
        "GSM (Number)" => $val->gsm,
        "Type of Paper" => $val->quality,
        "Paper Finishing" => $val->paper_finishing,
        "Total Number of Pages" => $val->pages,
        "Number of Multicolor Pages" => $val->multicolor,
        "Number of Mono Color Pages" => $val->monocolor,
        "Currency Type" => $val->currency_type,
        "Price" => $val->price,
        "Discount Offer(%)" => $val->discount,
        "Discounted Price" => $val->discountedprice,
        "Payment Status " => $val->paystatus,
        "Meta checking Status " => $val->revstatus,
        "Meta checker Name" => $val->reviewername,
        "Librarian Review/Assign" =>$val->internalcount .'|'.$val->rinternalcount,
        "Expert Review/Assign" => $val->externalcount.'|'. $val->rexternalcount,
        "Public Review/Assign" =>$val->publiccount.'|'.$val->rpubliccount,
        "Librarian" => $val->avginternal,
        "Expert" => $val->avgexternal,
        "Public" => $val->avgpublic,
        "RTotal Review Mark" => $val->mark
        
      ];
  
    }
      
    }
    // return $finaldata;
    $csvContent = "\xEF\xBB\xBF";
    $csvContent .=   "S.No,Book ID,Book Title,Book ISBN,Language of the Book,Author Details,Edition Number,Name of Publisher,Vendor Name,Year of Publication,Place of Publication,Subject,Category,Binding,Size,Length x Breadth(in Centimeters),Width(in Centimeters),Weight(in grams),GSM (Number),Type of Paper,Paper Finishing,Total Number of Pages,Number of Multicolor Pages,Number of Mono Color Pages,Currency Type,Price,Discount Offer(%),Discounted Price,Payment Status ,Meta checking Status,Meta checker Name,Librarian Review/Assign,Expert Review/Assign,Public Review/Assign,Librarian,Expert,Public,RTotal Review Mark\n";
    foreach ($finaldata as $data) {
      $csvContent .= '"' . implode('","', array_map('strval', $data)) . "\"\n";
    }
  
    $headers = [
      'Content-Type' => 'text/csv; charset=utf-8',
      'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
    ];
  
    return response()->make($csvContent, 200, $headers);
  }
  

  // public function calculatedBookPrice(Request $request)
  // {
  //   try {
  //     $admin = auth('admin')->user();
  //     if (!$request->hasFile('file_book_price')) {
  //       return redirect()->back()->with('errorlib', 'No file uploaded');
  //     }

  //     $file = $request->file('file_book_price');
  //     $fileContents = file($file->getPathname());
  //     unset($fileContents[0]);

  //     $batchSize = 100;
  //     $chunks = array_chunk($fileContents, $batchSize);

  //     foreach ($chunks as $chunk) {
  //       $productCodes = [];
  //       $duplicateCodes = [];
  //       $booksToUpdate = [];

  //       foreach ($chunk as $line) {
  //         $data = str_getcsv($line);
  //         $productCode = str_pad($data[1] ?? '', 8, '0', STR_PAD_LEFT);

  //         if (empty($productCode)) {
  //           continue;
  //         }

  //         if (Book::where('product_code', $productCode)->exists()) {
  //           if (in_array($productCode, $productCodes)) {
  //             $duplicateCodes[] = $productCode;
  //           } else {
  //             $productCodes[] = $productCode;
  //             $booksToUpdate[] = ['product_code' => $productCode, 'calculated_price' => $data[2], 'calculated_percentage' => $data[3], 'reason' => $data[4]];
  //           }
  //         } else {
  //           return redirect()->back()->with('errorlib', $productCode . " Not Found");
  //         }
  //       }
  //       if (!empty($duplicateCodes)) {
  //         return redirect()->back()->with('errorlib', implode(', ', $duplicateCodes) . " Duplicate entries");
  //       }
  //       // Update books
  //       foreach ($booksToUpdate as $bookData) {
  //         $book = Book::where('product_code', $bookData['product_code'])->first();
  //         if ($book) {
  //           $book->calculated_price = $bookData['calculated_price'];
  //           $book->calculated_percentage = $bookData['calculated_percentage'];
  //           $book->calculated_reason = $bookData['reason'];
  //           $book->save();
  //         }
  //       }
  //     }

  //     return redirect()->back()->with('successlib', 'File imported successfully');
  //   } catch (\Throwable $e) {
  //     // Log the exception
  //     \Log::error('Error importing book prices: ', ['error' => $e->getMessage()]);
  //     return redirect()->back()->with('errorlib', 'An error occurred while importing.');
  //   }
  // }
 
public function calculatedBookPrice(Request $request)
{


    try {
        // Authentication check
        $admin = auth('admin')->user();
   
        // Check for file upload
        if (!$request->hasFile('file_book_price')) {
            return redirect()->back()->with('errorlib', 'No file uploaded');
        }

        $file = $request->file('file_book_price');
        $fileContents = file($file->getPathname());

        // Skip the first line (headers)
        unset($fileContents[0]);

        // Batch processing setup
        $batchSize = 100;  // Suitable for handling 10,000 rows
        $chunks = array_chunk($fileContents, $batchSize);

        foreach ($chunks as $chunk) {
         
            // Arrays to track data for processing
            $productCodes = [];
            $duplicateCodes = [];
            $booksToUpdate = [];

            // Prepare list of product codes to check existence once
            foreach ($chunk as $line) {
                $data = str_getcsv($line);
              
                 $productCode = str_pad($data[1] ?? '', 8, '0', STR_PAD_LEFT);
         
                if (empty($productCode)) {
                    continue;
                }

                // Check if product code is already processed, if yes, mark as duplicate
                if (in_array($productCode, $productCodes)) {
                    $duplicateCodes[] = $productCode;
                    continue;
                }

                $productCodes[] = $productCode;
              
                $booksToUpdate[] = [
                    'product_code' => $productCode,
                    'calculated_price' => $data[2] ,
                    'calculated_percentage' => $data[3] ,
                    // 'reason' => $data[4],
                    'nego_status' => $data[4]
                ];
               
            }
            $No_Negotiation="No Negotiation: 
                Price accepted.
               விலை ஏற்றுக்கொள்ளப்பட்டது.";
            
              $below_negotiation="Minimum Criteria of 25% :
              பொது நூலகங்களுக்கு வெளிப்படைத் தன்மையான நூல்கள் கொள்முதல் செய்ய ஏதுவாக, தங்களால் சமர்ப்பிக்கப்பட்ட நூலின் ஏற்பு விலையின் கழிவு சதவீதம் பொது நூலக இயக்கக விலை நிர்ணயக்கொள்கையின் படி குறைவாக உள்ளது. எனவே கழிவு சதவீதம் 25 % அல்லது அதற்கு மேல் தாங்கள் வழங்கும் பட்சத்தில் தங்களுடைய நூல்கள் பொது நூலகங்களுக்கு கொள்முதல் செய்ய ஏதுவாக நூலகர்கள் மற்றும் வாசகர் வட்டங்களின் தேர்வுக்கு அனுப்பப்படும். 
              To facilitate the procurement of transparent books for public libraries under the Directorate of Public Libraries in alignment with the Transparent Book Procurement Policy, the discount percentage for the book you submitted is lower than the prescribed price negotiation policy of the Directorate. Therefore, if you provide a discount of 25% or more, your books shall be forwarded for selection by designated librarians and reader forums to enable procurement by the Directorate of Public Libraries.";
             $outlayer="Negotiation (Discount Percentage):
             தங்களால் சமர்ப்பிக்கப்பட்ட  நூல் விலையின்  கழிவு சதவீதம்  பொது நூலக இயக்கக விலை நிர்ணயக்கொள்கையின் படி நிர்ணயிக்கப்பட்ட கழிவு சதவீதத்தை விட குறைவாக உள்ளது. எனவே 25 % கழிவை  தாங்கள் வழங்கும் பட்சத்தில், தங்களுடைய நூல்கள் பொது நூலகங்களுக்கு கொள்முதல் செய்ய ஏதுவாக நூலகர்கள் மற்றும் வாசகர் வட்டங்களின் தேர்வுக்கு அனுப்பப்படும்.
             To facilitate the procurement of books for public libraries under the Directorate of Public Libraries in alignment with the Transparent Book Procurement Policy, the discount percentage for the book you submitted is lower than the discount percentage prescribed in the policy. Therefore if you agree to provide a discount of 25%, your books shall be forwarded to the designated librarians and reader forums for selection.";
           
          
            // Return error for duplicate product codes
            if (!empty($duplicateCodes)) {
                return redirect()->back()->with('errorlib', implode(', ', $duplicateCodes) . " Duplicate entries");
            }
          
            // Fetch existing books for the product codes in this batch
             $existingBooks = Book::whereIn('product_code', $productCodes)
                                 ->pluck('product_code')  // Only fetch the 'product_code'
                                 ->toArray();

            // Identify books not found in the database
            $notFoundCodes = array_diff($productCodes, $existingBooks);

            if (!empty($notFoundCodes)) {
                return redirect()->back()->with('errorlib', implode(', ', $notFoundCodes) . " Not Found");
            }

            // Bulk update the books to be updated
            DB::beginTransaction();
       
            try {
                foreach ($booksToUpdate as $bookData) {
                    $book = Book::where('product_code', $bookData['product_code'])->first();
                    if ($book) {
                        $book->calculated_price = $bookData['calculated_price'];
                        $book->calculated_percentage = $bookData['calculated_percentage'];
                             if($bookData['nego_status'] == "non_negotiation"){
                              $book->calculated_reason = $No_Negotiation;
                             }else if($bookData['nego_status'] == "below_negotiation"){
                              $book->calculated_reason = $below_negotiation;
                             }else{
                              $book->calculated_reason = $outlayer;
                             }

                 
                        $book->nego_status = $bookData['nego_status'];

                        
                        if( $book->save()){
                          BookReviewStatus::where('book_id', $book->id)
                          ->update(['status' => '1']);
                        }
                    }

                 
                }

                DB::commit();  // Commit the transaction
            } catch (\Exception $e) {
                DB::rollBack();  // Rollback on error
                throw $e;
            }
        }
         
        // Successful upload
        return redirect()->back()->with('successlib', 'File imported successfully');
    } catch (\Throwable $e) {
    
        // Log the exception
        \Log::error('Error importing book prices: ', ['error' => $e->getMessage()]);
        return redirect()->back()->with('errorlib', $e->getMessage());
    }
}
  public function sendnegotiationstatus(Request $req)
  {
    $bookId = $req->bookId;
    $status = $req->status;

    if ($status == "Approve") {
      $data1 = Book::find($bookId);
      $data1->final_price = $data1->discountedprice;
      $data1->negotiation_status = "2";
      $data1->save();
      $data = [
        'success' => 'Approved Successfully',
      ];
      return response()->json($data);
    }
  }

 
public function negotiationlist()
{
  $categori = Book::where('marks', '>=', 40)
  ->whereNull('negotiation_status')
  ->whereNotNull('calculated_price')
  ->whereNotIn('nego_status', ['below_negotiation', 'non_negotiation'])
  ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
  ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
  ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
  ->select('books.*', 
      DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
  )

  ->get();


  $existingBooks = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
    ->pluck('book_title');
  $existingbookisbn = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
    ->pluck('isbn');
  $existingTitles = $existingBooks->map(function ($title) {
    return [
      'english' => $this->processBookTitle($title),
      'tamil' => $this->processBookTitle($this->translateToTamil($title))
    ];
  });

  $existingisbn = $existingbookisbn->map(function ($title) {
    return $this->processBookTitle($title);
  });

foreach ($categori as $val) {
$val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks,$existingisbn);
}
return view('admin.negotiation_list')->with('categori', $categori);

}


public function reviewbook(){
  $data = BookReviewStatus::groupBy('book_id')->get('book_id');
  $record = [];
  $allthree=0;
  $exp_lib=0;
  $exp_pub=0;
  $lib_pub = 0;
  $exp=0;
  $lib=0;
  $pub=0;
  $notyetreviewed=0;
  foreach($data as $key=>$val){
 
  

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
       if(($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
              $exp = $exp+1;
    
}else if(($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)){
  $lib = $lib+1;
}else if(($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)){
  $pub = $pub+1;
}else if($externalcount == 0 || $rexternalcount == 0){
  $lib_pub =  $lib_pub+1;
}else if($internalcount == 0 || $rinternalcount == 0){
  $exp_pub=  $exp_pub+1; 
}else if($publiccount == 0 || $rpubliccount == 0){
  $exp_lib=$exp_lib +1;
}else{
  $allthree= $allthree +1;
} 
   }else{
    $notyetreviewed = $notyetreviewed + 1;
   }
  }



  $finaldata = [];


     
 
      $finaldata[] = [
         'S.No' => 1,
         'Allthree' =>    $allthree,
         'exp_lib' =>   $exp_lib,
         'exp_pub ' =>  $exp_pub,
         'lib_pub' =>   $lib_pub,
         'exp' =>   $exp,
         'lib' =>  $lib,
         'pub' =>  $pub,
         'notyet' =>  $notyetreviewed,
         'Total Book' =>count($data)
         
     ];
   
  
  $csvContent ="\xEF\xBB\xBF"; 
  $csvContent .= "S.No,All Three Review, Expert And Librarian,Expert And Public,Librarian And Public,Expert,Librarian,Public,No Review Book,Total Book Assign\n"; 
  foreach ($finaldata as $data) {
      $csvContent .= '"' . implode('","', $data) ."\"\n";
  }

  $headers = [
      'Content-Type' => 'text/csv; charset=utf-8',
      'Content-Disposition' => 'attachment; filename="Report.csv"',
  ];

  return response()->make($csvContent, 200, $headers);


}



public function bookreassign_data(Request $req)
{

  $validator = Validator::make($req->all(), [

    'bookId' => 'required|array|min:1',
  
  ]);

  if ($validator->fails()) {
    $data = [
      'error' => $validator->errors()->first(),
    ];
    return response()->json($data);
  }
  if (!empty($req->LibrarianReviewverId) || !empty($req->expectReviewverId) || !empty($req->publicReviewverId)) {
    
    $bookId = $req->bookId;
  
    $internalReviewverId = $req->LibrarianReviewverId;
    $externalReviewverId = $req->expectReviewverId;
  
    $publicReviewverId = $req->publicReviewverId;
    $mergedArray = array_merge(
      array_filter($internalReviewverId ?? [], fn($value) => $value !== null && $value !== ''),
      array_filter($externalReviewverId ?? [], fn($value) => $value !== null && $value !== ''),
      array_filter($publicReviewverId ?? [], fn($value) => $value !== null && $value !== '')
  );
  

      foreach ($bookId as $key => $val1) {
  
      foreach ($mergedArray as $key => $val) {
        $rev = Reviewer::where("id", '=', $val)->first();
        $revdata = BookReviewStatus::where("reviewer_id", '=', $rev->id)->where("book_id", '=',  $bookId[0])->first();
         
         if( $revdata == null){
          $bookreview = new BookReviewStatus();
          $bookreview->book_id = $val1;
          $bookreview->reviewer_id = $rev->id;
          $bookreview->reviewertype = $rev->reviewerType;
          $bookreview->save();
         }
     
      }
    }
  
    foreach ($mergedArray as $key => $val) {
      $notifi = new Notifications();
      $notifi->message = "Book Assigned For Review";
      $notifi->to = $val;
      $notifi->from = auth('admin')->user()->id;
      $notifi->type = "reviewer";
      $notifi->save();
    }
    $avginternal = 0;
    $avgexternal = 0;
    $avgpublic = 0;

    $data1 = BookReviewStatus::where('book_id', $bookId[0])->where('mark', '!=', null)->get();

    if (sizeof($data1) != 0) {
      $book = Book::find($bookId[0]);
   
      $internalcount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'internal')->count();
      $externalcount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'external')->count();
      $publiccount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'public')->count();
      $rinternalcount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
      $rexternalcount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'external')->where('mark', '!=', null)->count();
      $rpubliccount = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'public')->where('mark', '!=', null)->count();
      $suminternal = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
      $sumexternal = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
      $sumpublic = BookReviewStatus::where('book_id', $bookId[0])->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
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
      $book->marks = $mark;
      $book->save();
    }

    $external =  BookReviewStatus::where('book_id', '=', $bookId[0])->where('reviewertype', '=', 'external')->get();
    $internal =  BookReviewStatus::where('book_id', '=', $bookId[0])->where('reviewertype', '=', 'internal')->get();
    $public =  BookReviewStatus::where('book_id', '=', $bookId[0])->where('reviewertype', '=', 'public')->get();
    $reviewer = (object)[
      'external' => $external,
      'internal' => $internal,
      'public' => $public,
      'bookid' => $bookId[0]
    ];
    if (\Session::has('reviewer')) {
      \Session::forget('reviewer');
  }
  \Session::put('reviewer', $reviewer);
  
    $data = [
      'success' => 'Book Reassigned Successfully',
    ];
    return response()->json($data);
 
  } else {
    $data = [
      'error' => 'Select  any one reviewer',
    ];
    return response()->json($data);
}
 
  
}

public function exportrevdetailsreport()
{
  $results = DB::table('reviewer as r')
    ->select(
      'r.id',
      'r.name',
      'r.subject',
      'r.reviewerType',
      DB::raw('COUNT(br.reviewer_id) AS book_reviews_count '),
      DB::raw('COUNT(CASE WHEN br.mark IS NOT NULL THEN 1 END) AS BookReviewcom'),
      DB::raw('COUNT(CASE WHEN br.mark IS NULL THEN 1 END) AS BookReviewpen')
    )
    ->leftJoin('book_review_statuses as br', 'r.id', '=', 'br.reviewer_id')
    ->where('r.status', 1)
    ->whereIn('r.reviewerType', ['external', 'internal', 'public'])
    ->groupBy('r.id', 'r.name', 'r.subject', 'r.reviewerType')
    ->get();




  foreach($results as $val){
   
       
     $Reviewer=Reviewer::find($val->id);
   
    
      
      if($Reviewer->reviewerType=="internal"){
       
      
          $categories = json_decode($Reviewer->Category, true);

          $recdata = '';
  
          if (is_array($categories)) {
            foreach ($categories as $category) {
              $recdata .= htmlspecialchars($category) . ' ,';
            }
          }
         
          $val->subject = $recdata;
      
          if($val->book_reviews_count == "0"   && $val->BookReviewcom == "0" ) {  
            $val->BookReviewpen ="0";
        }
       
      
        $val->district =$Reviewer->district;
        $val->libraryType =$Reviewer->libraryType;
        $val->libraryName =$Reviewer->libraryName;
      }elseif($Reviewer->reviewerType=="public"){
        $val->subject =  $Reviewer->Category;
        $Reviewer1=Reviewer::find($Reviewer->creater);
        if($val->book_reviews_count == "0"   && $val->BookReviewcom == "0" ) {  
          $val->BookReviewpen ="0";
      }
     
        $val->district =$Reviewer->district;
        $val->libraryType =$Reviewer1->libraryType;
        $val->libraryName =$Reviewer1->libraryName;
      }else{
        $subjects = json_decode($val->subject, true);

        $recdata = '';
        
        if (is_array($subjects)) {
            $count = count($subjects);
            foreach ($subjects as $index => $subject) {
                $recdata .= htmlspecialchars($subject);
                if ($index < $count - 1) {
                    $recdata .= ', ';
                }
            }
        } 
         $val->subject =$recdata;
         if($val->book_reviews_count == "0"   && $val->BookReviewcom == "0" ) {  
          $val->BookReviewpen ="0";
      }
      $val->district =$Reviewer->district;
        $val->libraryType =""; 
        $val->libraryName ="";
      }
    
  }    

  $data = $results->filter(function ($item) {
    return $item->reviewerType == 'external';
  });  
   
  $data1 = $results->filter(function ($item) {
    return $item->reviewerType == 'internal';
  });
  $reviewerIds1 = collect($data1)->pluck('id');

  $reviewCounts1 = DB::table('book_review_statuses')
    ->select('reviewer_id', 
        DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) < 5 THEN 1 ELSE 0 END) as BookReviewpen'), 
        DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) >= 5 THEN 1 ELSE 0 END) as hold'))
    ->whereIn('reviewer_id', $reviewerIds1)
    ->whereNull('remark')
    ->groupBy('reviewer_id')
    ->get();
  
  $countMap1 = $reviewCounts1->keyBy('reviewer_id');
  
  $data1->transform(function ($val) use ($countMap1) {
    $val->BookReviewpen = isset($countMap1[$val->id]) ? $countMap1[$val->id]->BookReviewpen : 0;
    $val->hold = isset($countMap1[$val->id]) ? $countMap1[$val->id]->hold : 0;
    return $val;
  });
  $data2 = $results->filter(function ($item) {
    return $item->reviewerType == 'public';
});

$reviewerIds = collect($data2)->pluck('id');

$reviewCounts = DB::table('book_review_statuses')
  ->select('reviewer_id', 
      DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) < 5 THEN 1 ELSE 0 END) as BookReviewpen'), 
      DB::raw('SUM(CASE WHEN (SELECT COUNT(*) FROM book_review_statuses br WHERE br.book_id = book_review_statuses.book_id AND br.reviewertype = "public" AND br.mark IS NOT NULL) >= 5 THEN 1 ELSE 0 END) as hold'))
  ->whereIn('reviewer_id', $reviewerIds)
  ->whereNull('remark')
  ->groupBy('reviewer_id')
  ->get();

$countMap = $reviewCounts->keyBy('reviewer_id');

$data2->transform(function ($val) use ($countMap) {
  $val->BookReviewpen = isset($countMap[$val->id]) ? $countMap[$val->id]->BookReviewpen : 0;
  $val->hold = isset($countMap[$val->id]) ? $countMap[$val->id]->hold : 0;
  return $val;
});

  $metacompletecount = Book::whereNotNull('book_reviewer_id')
    ->where('book_status', 1)
    ->where('book_procurement_status', 1)
    ->count();

  $reviewerassignCount = BookReviewStatus::distinct('book_id')->count();

  $count = $data->count() + $data1->count() + $data2->count();




  $finaldata = [];
  $serialNumber = 1;
  
  // Concatenate the collections
   $allData = $data->concat($data1)->concat($data2);
  
  foreach ($allData as $val) {

      $finaldata[] = [
          'S.No' => $serialNumber++,
          'Reviewer Name' => $val->name,
          'Reviewer Type' => $val->reviewerType,
          'No. of Books Assigned' => $val->book_reviews_count,
          'No. of Review Completed' => $val->BookReviewcom,
          'No. of Review Pending' => $val->BookReviewpen,
           'No. of Review hold' => isset($val->hold) ? $val->hold : "",

          'Subject' => $val->subject,
          'Library Type' => $val->libraryType,
          'Library Name' => $val->libraryName,
          'District' => $val->district ? $val->district : "",
      ];
  }
  

$finaldata[] = [
  'S.No' =>  '',
 'Reviewer Name' =>   '',
 'Reviewer Type' =>   '',
 'No. of Books Assigned' =>  '',
 'No. of Review Completed'=>   '',
 'No. of Review Pending' =>   '',
 'No. of Review hold' =>   '',
 'Subject' =>   '',
 'Library Type' =>  '',
 'Library Name' =>  '',
 'District' =>   '',
  
];
   

  $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
  $csvContent .= "S.No,Reviewer Name,Reviewer Type,No. of Books Assigned, No. of Review Completed,No. of Review Pending,No. of Review hold,Subject,Library Type,Library Name,District\n"; 
  foreach ($finaldata as $data) {
      $csvContent .= '"' . implode('","', $data) ."\"\n";
  }

  $headers = [
      'Content-Type' => 'text/csv; charset=utf-8',
      'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
  ];

  return response()->make($csvContent, 200, $headers);
  return view('admin.reviwer_data', compact('data', 'data1', 'data2', 'metacompletecount', 'reviewerassignCount', 'count'));
}

public function master_nego_notqualified_book_data(Request $request)
{
  $query = Book::with('BookReviewStatus')
  ->where('negotiation_status', null)
  ->where('self_nominated', 0)
  ->where('marks', '<', 40) 
  ->whereHas('BookReviewStatus', function ($query) {
      $query->whereNotNull('review_type');
  }, '>=', 1);

  if ($request->has('subject_filter') && $request->subject_filter != '') {
    $query->where('subject', $request->subject_filter);
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
    $query->where('category', $request->category_filter);
} 
 if ($request->has('mark_range') && $request->mark_range != '') {
  list($min, $max) = explode('-', $request->mark_range);
  $query->whereBetween('marks', [(int)$min, (int)$max]);
}
if ($request->has('search') && $request->search != '') {
$query->where(function ($subQuery) use ($request) {
    $subQuery->where('book_title', 'like', '%' . $request->search . '%')
        ->orWhere('product_code', 'like', '%' . $request->search . '%')
        ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
        ->orWhere('language', 'like', '%' . $request->search . '%')
        ->orWhere('marks', 'like', '%' . $request->search . '%')
        ->orWhere('isbn', 'like', '%' . $request->search . '%');
});


}

$query ->orderBy('marks', 'desc');
$data = $query->paginate(150);

  $procurementStatuses = ["1", "5", "6"];
  $bookStatusLabels = [
    "1" => "Success",
    "0" => "Reject",
    "2" => "Returned To User Correction",
    "3" => "Book Update To Return"
  ];

  foreach ($data as $val) {
    $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
    $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
    $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
    $pub = Publisher::query()
    ->where('id', $val->user_id)
    ->select('id', 'publicationName', 'usertype','mobileNumber','email')
    ->union(
        Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->union(
        PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->first();
    $val->vendorname =  $pub->publicationName;
  }
  foreach ($data as $val) {
    $avginternal = 0;
    $avgexternal = 0;
    $avgpublic = 0;
  $book = Book::find($val->id);
  $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
  $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
  $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
  $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
  $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
  $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
  $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
  $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
  $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
  if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $mark = ($sumexternal / ($rexternalcount)) * 3;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = ($suminternal / ($rinternalcount)) *1;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
    $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
    $mark = ($sumpublic / ($rpubliccount)) * 1;
  } else if ($externalcount == 0 || $rexternalcount == 0) {
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($internalcount == 0 || $rinternalcount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($publiccount == 0 || $rpubliccount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
  } else {
  
    $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
  }


 
  $val->internalcount = $internalcount;
  $val->externalcount = $externalcount;
  $val->publiccount = $publiccount;
  $val->rinternalcount = $rinternalcount;
  $val->rexternalcount = $rexternalcount;
  $val->rpubliccount = $rpubliccount;
  $val->avginternal = $avginternal;
  $val->avgexternal = $avgexternal;
  $val->avgpublic = $avgpublic;
  $val->mark = $mark;
 
}


  return view('admin.master_nego_notqualified_book_data', compact('data'));
}


public function master_nego_notqualified_book_datareport(Request $request)
{

  $query = Book::with('BookReviewStatus')
  ->where('negotiation_status', null)
  ->where('self_nominated', 0)
  ->where('marks', '<', 40) 
  ->whereHas('BookReviewStatus', function ($query) {
      $query->whereNotNull('review_type');
  }, '>=', 1);

// $query = Book::with('BookReviewStatus')->where('negotiation_status','=', null)->where('self_nominated','=', 0);


  // Apply filters
  if ($request->has('language_filter') && $request->language_filter != '') { 
    $query->where('language', $request->language_filter);
  }

  if ($request->has('subject_filter') && $request->subject_filter != '') {
    $query->where('subject', $request->subject_filter);
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
    $query->where('category', $request->category_filter);
} 
 if ($request->has('mark_range') && $request->mark_range != '') {
  list($min, $max) = explode('-', $request->mark_range);
  $query->whereBetween('marks', [(int)$min, (int)$max]);
}
if ($request->has('search') && $request->search != '') {
$query->where(function ($subQuery) use ($request) {
    $subQuery->where('book_title', 'like', '%' . $request->search . '%')
        ->orWhere('product_code', 'like', '%' . $request->search . '%')
        ->orWhere('nameOfPublisher', 'like', '%' . $request->search . '%')
        ->orWhere('language', 'like', '%' . $request->search . '%')
        ->orWhere('marks', 'like', '%' . $request->search . '%')
        ->orWhere('isbn', 'like', '%' . $request->search . '%');
});


}

$query ->orderBy('marks', 'desc');

 $data = $query->get(); 

  $procurementStatuses = ["1", "5", "6"];
  $bookStatusLabels = [
    "1" => "Success",
    "0" => "Reject",
    "2" => "Returned To User Correction",
    "3" => "Book Update To Return"
  ];

  foreach ($data as $val) {
    $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
    $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
    $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
    $pub = Publisher::query()
    ->where('id', $val->user_id)
    ->select('id', 'publicationName', 'usertype','mobileNumber','email')
    ->union(
        Distributor::query()->where('id', $val->user_id)->select('id', 'distributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->union(
        PublisherDistributor::query()->where('id', $val->user_id)->select('id', 'publicationDistributionName as publicationName', 'usertype','mobileNumber','email')
    )
    ->first();
    $val->vendorname =  $pub->publicationName;
  }
  foreach ($data as $val) {
    $avginternal = 0;
    $avgexternal = 0;
    $avgpublic = 0;
   $book = Book::find($val->id);


  $internalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->count();
  $externalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->count();
  $publiccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->count();
  $rinternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
  $rexternalcount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
  $rpubliccount = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
  $suminternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
  $sumexternal = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
  $sumpublic = BookReviewStatus::where('book_id', $val->id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
  if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $mark = ($sumexternal / ($rexternalcount)) * 3;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = ($suminternal / ($rinternalcount)) *1;
  } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
    $avgpublic  = ($sumpublic / ($rpubliccount)) * 1;
    $mark = ($sumpublic / ($rpubliccount)) * 1;
  } else if ($externalcount == 0 || $rexternalcount == 0) {
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($internalcount == 0 || $rinternalcount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($sumpublic / ($rpubliccount)) *1);
  } else if ($publiccount == 0 || $rpubliccount == 0) {
    $avgexternal = ($sumexternal / ($rexternalcount)) *3;
    $avginternal  = ($suminternal / ($rinternalcount)) *1;
    $mark = (($sumexternal / ($rexternalcount)) *3) + (($suminternal / ($rinternalcount)) * 1);
  } else {
  
    $avgexternal = ($sumexternal / ($rexternalcount)) * 3;
    $avginternal  = ($suminternal / ($rinternalcount)) * 1;
    $avgpublic  = ($sumpublic / ($rpubliccount)) *1;
    $mark = (($sumexternal / ($rexternalcount )) *3) + (($suminternal / ($rinternalcount)) *1) + (($sumpublic / ($rpubliccount)) * 1);
  }



 
  $val->internalcount = $internalcount;
  $val->externalcount = $externalcount;
  $val->publiccount = $publiccount;
  $val->rinternalcount = $rinternalcount;
  $val->rexternalcount = $rexternalcount;
  $val->rpubliccount = $rpubliccount;
  $val->avginternal = $avginternal;
  $val->avgexternal = $avgexternal;
  $val->avgpublic = $avgpublic;
  $val->mark = $mark;
 
}


  $actotal = 0;
  $inactotal = 0;
  $finaldata = [];
  $serialNumber = 1;
  foreach ($data as $val) {




  
    
      $finaldata[] = [
        'S.No' =>  $serialNumber++,
        "Book ID" => $val->product_code,
        "Book Title" => $val->book_title,
        "Book ISBN" => $val->isbn,
        "Language of the Book" => $val->language,
        "Author Details" => $val->author_name,
        "Edition Number" => $val->edition_number,
        "Name of Publisher" => $val->nameOfPublisher,
        "Vendor Name" => $val->vendorname,
        "Year of Publication" => $val->yearOfPublication,
        "Place of Publication" => $val->place,
        "Subject" => $val->subject,
        "Category" => $val->category,
        "Binding" => $val->type,
        "Size " => $val->size,
        "Length x Breadth(in Centimeters)" => $val->length  *  $val->breadth,
        "Width(in Centimeters) " => $val->width,
        "Weight(in grams)" => $val->weight,
        "GSM (Number)" => $val->gsm,
        "Type of Paper" => $val->quality,
        "Paper Finishing" => $val->paper_finishing,
        "Total Number of Pages" => $val->pages,
        "Number of Multicolor Pages" => $val->multicolor,
        "Number of Mono Color Pages" => $val->monocolor,
        "Currency Type" => $val->currency_type,
        "Price" => $val->price,
        "Discount Offer(%)" => $val->discount,
        "Discounted Price" => $val->discountedprice,
        "Payment Status " => $val->paystatus,
        "Meta checking Status " => $val->revstatus,
        "Meta checker Name" => $val->reviewername,
        "Librarian Review/Assign" =>$val->internalcount .'|'.$val->rinternalcount,
        "Expert Review/Assign" => $val->externalcount.'|'. $val->rexternalcount,
        "Public Review/Assign" =>$val->publiccount.'|'.$val->rpubliccount,
        "Librarian" => $val->avginternal,
        "Expert" => $val->avgexternal,
        "Public" => $val->avgpublic,
        "RTotal Review Mark" => $val->mark
        
      ];
  
    
  }
count($finaldata);
  $csvContent = "\xEF\xBB\xBF";
  $csvContent .=   "S.No,Book ID,Book Title,Book ISBN,Language of the Book,Author Details,Edition Number,Name of Publisher,Vendor Name,Year of Publication,Place of Publication,Subject,Category,Binding,Size,Length x Breadth(in Centimeters),Width(in Centimeters),Weight(in grams),GSM (Number),Type of Paper,Paper Finishing,Total Number of Pages,Number of Multicolor Pages,Number of Mono Color Pages,Currency Type,Price,Discount Offer(%),Discounted Price,Payment Status ,Meta checking Status,Meta checker Name,Librarian Review/Assign,Expert Review/Assign,Public Review/Assign,Librarian,Expert,Public,RTotal Review Mark\n";
  foreach ($finaldata as $data) {
    $csvContent .= '"' . implode('","', $data) . "\"\n";
  }

  $headers = [
    'Content-Type' => 'text/csv; charset=utf-8',
    'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
  ];

  return response()->make($csvContent, 200, $headers);
}

public function negotiation_notverified_list()
{
  $categori = Book::where('marks', '>=', 40)
    ->where('negotiation_status', '=', null)
    ->whereNull('calculated_price')
    ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
                                    ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
                                    ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
                                    ->select('books.*', 
                                        DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
                                    )
                                    ->get();
  $existingBooks = Book::where('marks', '>=', 40)
  ->whereNull('calculated_price')
    ->pluck('book_title');
  $existingbookisbn = Book::where('marks', '>=', 40)
  ->whereNull('calculated_price')
    ->pluck('isbn');
  $existingTitles = $existingBooks->map(function ($title) {
    return [
      'english' => $this->processBookTitle($title),
      'tamil' => $this->processBookTitle($this->translateToTamil($title))
    ];
  });

  $existingisbn = $existingbookisbn->map(function ($title) {
    return $this->processBookTitle($title);
  });

foreach ($categori as $val) {
$val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks,$existingisbn);
}
return view('admin.negotiation_notverified_list')->with('categori', $categori);

}


public function non_negotiation_list()
{
  $categori = Book::where('marks', '>=', 40)
  ->whereNull('negotiation_status')
  ->whereNotNull('calculated_price')
  ->where('nego_status', '=', "non_negotiation")
  ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
  ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
  ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
  ->select('books.*', 
      DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
  )
  ->get();




  $existingBooks = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
  ->pluck('book_title');
  $existingbookisbn = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
    ->pluck('isbn');
  $existingTitles = $existingBooks->map(function ($title) {
    return [
      'english' => $this->processBookTitle($title),
      'tamil' => $this->processBookTitle($this->translateToTamil($title))
    ];
  });

  $existingisbn = $existingbookisbn->map(function ($title) {
    return $this->processBookTitle($title);
  });

foreach ($categori as $val) {
$val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks,$existingisbn);
}
return view('admin.non_negotiation_list')->with('categori', $categori);

}



public function percentage_negotiation_list()
{
  $categori = Book::where('marks', '>=', 40)
  ->whereNull('negotiation_status')
  ->whereNotNull('calculated_price')
  ->where('nego_status', '=', "below_negotiation")
  ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
  ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
  ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
  ->select('books.*', 
      DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
  )
  ->get();




  $existingBooks = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
  ->pluck('book_title');
  $existingbookisbn = Book::where('marks', '>=', 40)
  ->whereNotNull('calculated_price') 
    ->pluck('isbn');
  $existingTitles = $existingBooks->map(function ($title) {
    return [
      'english' => $this->processBookTitle($title),
      'tamil' => $this->processBookTitle($this->translateToTamil($title))
    ];
  });

  $existingisbn = $existingbookisbn->map(function ($title) {
    return $this->processBookTitle($title);
  });

foreach ($categori as $val) {
$val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks,$existingisbn);
}
return view('admin.percentage_negotiation_list')->with('categori', $categori);

}

public function multiapprovenegotiation(Request $req)
{
  $record = $req->bookId;
  $record1 = [];
  foreach ($record as $key => $val) {
    $data1 = Book::find($val);
    $data1->final_price = $data1->discountedprice;
    $data1->negotiation_status = "2";
    $data1->save();
  }
  $data = [
    'success' => 'Book Approved Successfully',
  ];
  return response()->json($data);
}


public function duplicate_bookreport(Request $request)
{

  $negotiationStatuses = [
    'Negotiation Pending' => '0',
    'Renegotiation By Vendor' => '1',
    'Renegotiation By Admin' => '5',
    'Agree' => '2',
    'Disagree' => '3',
    'Not send negotiation' => null
];

$query = Book::where('marks', '>=', 40)
    ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
    ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
    ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
    ->select('books.*', 
        DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
    );

if ($request->has('negostatus_filter') && $request->negostatus_filter != '') {
    $status = $negotiationStatuses[$request->negostatus_filter] ?? null;
    
    if ($status !== null) {
        $query->where('negotiation_status', $status);
    } else {
        $query->whereNull('negotiation_status');
    }
}

$categori = $query->get();



  $existingBooks = Book::where('marks', '>=', 40)

  ->pluck('book_title');
  $existingbookisbn = Book::where('marks', '>=', 40)

    ->pluck('isbn');
  $existingTitles = $existingBooks->map(function ($title) {
    return [
      'english' => $this->processBookTitle($title),
      'tamil' => $this->processBookTitle($this->translateToTamil($title))
    ];
  });

  $existingisbn = $existingbookisbn->map(function ($title) {
    return $this->processBookTitle($title);
  });

  $duplicate = [];
  $finaldata = [];
  $serialNumber = 1;
  foreach ($categori as $val) {
      $val->check = $this->checkBookTitle($val, $existingTitles, $existingBooks, $existingisbn);
      
      if ($val->check !== "unique") {
     

        $statuses = [
          "0" => "Negotiation Pending",
          "1" => "Renegotiation By Vendor",
          "5" => "Renegotiation By Vendor",
          "2" => "Agree",
          "3" => "Disagree",
      ];
      
      $status = $statuses[$val->negotiation_status] ?? "Not send negotiation";
      


        $finaldata[] = [
          'S.No' => $serialNumber++,
          'Book Id' => $val->product_code ?? 'N/A',  // Ensure default value if null
          'Title Of The Book' => $val->book_title ?? 'N/A',
          'Publication Name' => $val->nameOfPublisher ?? 'N/A',
          'Vendor Name' => $val->vendorname  ??  'N/A',
          'Vendor Type' => $val->user_type ?? 'N/A',
          'Language' => $val->language ?? 'N/A',
          'Author Name' => $val->author_name ?? 'N/A',
          'ISBN Number' => $val->isbn ?? 'N/A',
          'Negotiation Status' => $status ,
      ];
      
      

        
      }
  }

     $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Book Id,Title Of The Book,Publication Name,Vendor Name,Vendor Type,Language,Author Name,ISBN Number,Negotiation Status\n";
       
      // // Append data rows to CSV
      foreach ($finaldata as $data) {
      $csvContent .= '"' . implode('","', (array)$data) . "\"\n";
      }
      $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="duplicatedata.csv"',
      ];
    
      return response()->make($csvContent, 200, $headers);
return view('admin.percentage_negotiation_list')->with('categori', $categori);

}

public function sendnegotiationsamount(Request $req) {
          
  if($req->amount !=null){
    if($req->Description != null){
       $data1 = Book::find($req->bookId);
    
          $data1->negotiation_status = "5";
          $data1->renegotiation_price = $req->amount;
          $data1->renegotiation_message = $req->Description;

   
          $data1->save();
      
          $data = [
              'success' => 'Renegotiation send Successfully',
          ];
      
          return response()->json($data);
     
    
    }else{
       $data = [
           'error' => 'Description Filed is  Required',
       ];
   
       return response()->json($data);
    }
 
  }else{
   $data = [
       'error' => 'Amount Filed is  Required',
   ];

   return response()->json($data);
  }

  
}


public function nego_stopdate(Request $request){

  // Fetch the record with the status '0'
$rev = DB::table('negostopdates')->where('status', '=', '0')->first();

// Check if a record was found
if ($rev) {
  // Update the record
  DB::table('negostopdates')
      ->where('status', '=', '0')
      ->update([
          'startdate' => $request->startdate,
          'enddate' => $request->enddate
      ]);

  return back()->with('success', "Negotiation Date Changed successfully");
} else {
  return back()->with('error', "No record found with the specified status");
}

}


public function renegotiationupload(Request $req){

  try {
     
      // Check for file upload
      if (!$req->hasFile('remegofile')) {
          return redirect()->back()->with('errorlib', 'No file uploaded');
      }

      $file = $req->file('remegofile');
      $fileContents = file($file->getPathname());

      
      // Skip the first line (headers)
      unset($fileContents[0]);

      // Batch processing setup
      $batchSize = 100;  // Suitable for handling 10,000 rows
      $chunks = array_chunk($fileContents, $batchSize);

      foreach ($chunks as $chunk) {
         
          // Arrays to track data for processing
          $bookfiles = [];
        

          // Prepare list of product codes to check existence once
          foreach ($chunk as $line) {
              $data = str_getcsv($line);
            
               $bookfile = $data[0];
       
              if (empty($bookfile)) {
                  continue;
              }
         
              // Check if product code is already processed, if yes, mark as duplicate
              if (in_array($bookfile, $bookfiles)) {
                  $bookfiles[] = $bookfile;
                  continue;
              }
             
              $bookfiles[] = $bookfile;
           

              $bookToUpdate[] = [
                  'bookid' => $bookfile,
                  'bookprice' => $data[1],
                  'reason' =>$data[2],

              ];
              
          }
          DB::beginTransaction();
     
          try {
              foreach ($bookToUpdate as $book) {

                 
                $books = Book::where('negotiation_status', '=', '1')
                ->where('product_code', '=', $book['bookid'])
                ->first();
          
                     
                   if ($books) {
              
                     
                        //  $books->negotiation_status="5";
                         $books->renegotiation_price =   $book['bookprice']  ;
                         $books->renegotiation_message=$book['reason'];
                      
                       
                         $books->save();


                     }else{
              
                      continue;
                     }

                    

               
              }

              DB::commit();  // Commit the transaction
          } catch (\Exception $e) {
              \Log::error('Error: ' . $e->getMessage(), ['exception' => $e]);

  
              return redirect()->back()->with('error', $e->getMessage());

              DB::rollBack();  // Rollback on error
              throw $e;
          }
      }
       
      // Successful upload
      return redirect()->back()->with('success', 'File Uploded successfully');
  } catch (\Throwable $e) {
  
      // Log the exception
      \Log::error('Error importing book prices: ', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', $e->getMessage());
  }
  
}

public function multirenegotiation(Request $req)
{
  $record = $req->bookId;
  $record1 = [];
  foreach ($record as $key => $val) {
    $data1 = Book::find($val);
  
    $data1->negotiation_status = "5";
    $data1->save();
  }
  $data = [
    'success' => 'Renegotiation Send Successfully',
  ];
  return response()->json($data);
}

  }