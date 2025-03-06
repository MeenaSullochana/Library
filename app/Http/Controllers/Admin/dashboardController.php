<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\Procurementpaymrnt;
use App\Models\Specialcategories;
use App\Models\Book;
use App\Models\PeriodicalPublisher;
use App\Models\PeriodicalDistributor;
use App\Models\BookReviewStatus;
use DB;


class dashboardController extends Controller
{
//     public function admindashboard(){
//         $currentYear = date('Y');
//         $categoryCountsPerMonth = [];
        
      
//         $months = [
//             'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
//         ];
        
    
//         foreach ($months as $month) {
           
//             $targetMonth = date('n', strtotime($month));
        
          
//             $books = Book::whereYear('created_at', '=', $currentYear)
//                          ->whereMonth('created_at', '=', $targetMonth)
//                          ->get();
        
         
//             $categoryCounts = [];
//             $specialCategories = Specialcategories::where('status', '=', 1)->get();
        
//             foreach ($specialCategories as $category) {
//                 $categoryCounts[$category->name] = 0;
//             }
        
         
//             foreach ($books as $book) {
//                 if (isset($categoryCounts[$book->category])) {
//                     $categoryCounts[$book->category]++;
//                 }
//             }
        
          
//             $categoryCountsPerMonth[$month] = [
//                 'totalBooks' => count($books),
//                 'categoryCounts' => $categoryCounts
//             ];
//         }
        
      
//         $categoryCountsPerMonth;
        
        
        

//        $allpub=Publisher::all();
//        $activepub=Publisher::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
//        $inactivepub=Publisher::where('status', '=', '0')->get();
//        $allpubcount=count($allpub);
//        $activepubcount=count($activepub);
//        $inactivepubcount=count($inactivepub);

//        $alldist=Distributor::all();
//        $activedist=Distributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
//        $inactivedist=Distributor::where('status', '=', '0')->get();
//        $alldistcount=count($alldist);
//        $activedistcount=count($activedist);
//        $inactivedistcount=count($inactivedist);


//        $allpubdist=PublisherDistributor::all();
//        $activepubdist=PublisherDistributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
//        $inactivepubdist=PublisherDistributor::where('status', '=', '0')->get();
//        $allpubdistcount=count($allpubdist);
//        $activepubdistcount=count($activepubdist);
//        $inactivepubdistcount=count($inactivepubdist);
//        return view('admin.index',compact('allpub','activepub','inactivepub','allpubcount','activepubcount','inactivepubcount',
//        'alldist','activedist','inactivedist', 'alldistcount','activedistcount','inactivedistcount',
//        'allpubdist','activepubdist','inactivepubdist','categoryCountsPerMonth', 'allpubdistcount','activepubdistcount','inactivepubdistcount',)
//        );
// }

public function admindashboard(){
//     $currentYear = date('Y');
//     $categoryCountsPerCategory = [];
    
//     $months = [
//         'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
//     ];
    
//     $specialCategories = Specialcategories::where('status', '=', 1)->get();
//     foreach ($specialCategories as $category) {
//         $categoryCountsPerCategory[$category->name] = [];
//         foreach ($months as $month) {
//             $categoryCountsPerCategory[$category->name][$month] = 0;
//         }
//     }
    
//     foreach ($months as $month) {
//         $targetMonth = date('n', strtotime($month));
    
//         $books = Book::whereYear('created_at', '=', $currentYear)
//                      ->whereMonth('created_at', '=', $targetMonth)
//                      ->where("book_procurement_status", '=', 1)
//                      ->get();
    
//         foreach ($books as $book) {
//             if (isset($categoryCountsPerCategory[$book->category][$month])) {
//                 $categoryCountsPerCategory[$book->category][$month]++;
//             }
//         }
//     }
    
//   return $categoryCountsPerCategory;
    
$currentYear = date('Y');
$categoryCountsPerCategory = [];
$categoryTotalCountsPerMonth = []; // Store total book counts per month

$months = [
    'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
];

$specialCategories = Specialcategories::where('status', '=', 1)->get();
foreach ($specialCategories as $category) {
    $categoryCountsPerCategory[$category->name] = [];
    foreach ($months as $month) {
        $categoryCountsPerCategory[$category->name][$month] = 0;
    }
}

foreach ($months as $month) {
    $targetMonth = date('n', strtotime($month));

    $books = Book::whereYear('created_at', '=', $currentYear)
                 ->whereMonth('created_at', '=', $targetMonth)
                 ->where("book_procurement_status", '=', 1)
                 ->get();

    $categoryTotalCountsPerMonth[$month] = $books->count(); // Total books for this month

    foreach ($books as $book) {
        if (isset($categoryCountsPerCategory[$book->category][$month])) {
            $categoryCountsPerCategory[$book->category][$month]++;
        }
    }
}

foreach ($categoryCountsPerCategory as $category => &$countsPerMonth) {
    foreach ($countsPerMonth as $month => &$count) {
        if ($categoryTotalCountsPerMonth[$month] > 0) {
            $count = ($count / $categoryTotalCountsPerMonth[$month]) * 100; // Calculate percentage
        } else {
            $count = 0; // Set to 0 if there are no books for this month
        }
    }
}

 $categoryCountsPerCategory;

    
    
    

   $allpub=Publisher::all();
   $activepub=Publisher::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
   $inactivepub=Publisher::where('status', '=', '0')->get();
   $allpubcount=count($allpub);
   $activepubcount=count($activepub);
   $inactivepubcount=count($inactivepub);

   $alldist=Distributor::all();
   $activedist=Distributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
   $inactivedist=Distributor::where('status', '=', '0')->get();
   $alldistcount=count($alldist);
   $activedistcount=count($activedist);
   $inactivedistcount=count($inactivedist);


   $allpubdist=PublisherDistributor::all();
   $activepubdist=PublisherDistributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
   $inactivepubdist=PublisherDistributor::where('status', '=', '0')->get();
   $allpubdistcount=count($allpubdist);
   $activepubdistcount=count($activepubdist);
   $inactivepubdistcount=count($inactivepubdist);
   //Periodical Users
   $allperpub=PeriodicalPublisher::all();
   $activeperpub=PeriodicalPublisher::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
   $inactiveperpub=PeriodicalPublisher::where('status', '=', '0')->get();
   $allperpubcount=count($allperpub);
   $activeperpubcount=count($activeperpub);
   $inactiveperpubcount=count($inactiveperpub);

   $allperdist=PeriodicalDistributor::all();
   $activeperdist=PeriodicalDistributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
   $inactiveperdist=PeriodicalDistributor::where('status', '=', '0')->get();
   $allperdistcount=count($allperdist);
   $activeperdistcount=count($activeperdist);
   $inactiveperdistcount=count($inactiveperdist);

    //Procurement Payments
   //Book
   $total_book_pay = Procurementpaymrnt::where('type','Book')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
   $pub_book_pay = Procurementpaymrnt::where('type','Book')->where('userType','publisher')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
   $dis_book_pay = Procurementpaymrnt::where('type','Book')->where('userType','distributor')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
   $pubdis_book_pay = Procurementpaymrnt::where('type','Book')->where('userType','publisher_distributor')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
//    dd($total_book_pay,$pub_book_pay,$dis_book_pay,$pubdis_book_pay);

   //Periodical
    $total_periodical_pay = Procurementpaymrnt::where('type','Periodical')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
    $pub_periodical_pay = Procurementpaymrnt::where('type','Periodical')->where('userType','publisher')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
    $dis_periodical_pay = Procurementpaymrnt::where('type','Periodical')->where('userType','distributor')->where('paymentstatus','Success')->where('responsecode','00')->sum('totalAmount');
   

    $languages = ['Tamil', 'English', 'Other_Indian', 'Other_Foreign'];
    $userTypes = ['publisher', 'distributor', 'publisher_distributor'];
    $procurementStatuses = ['!=0', '=1'];
    
    $bookTotals = [
        'Booktotal' => Book::count()
    ];
    
    // General counts by language
    foreach ($languages as $language) {
        $bookTotals["{$language}Booktotal"] = Book::where('language', $language)->count();
    }
    
    // Counts by user type and language
    foreach ($userTypes as $userType) {
        $bookTotals["{$userType}Booktotal"] = Book::where('user_Type', $userType)->count();
        foreach ($languages as $language) {
            $bookTotals["{$userType}{$language}Booktotal"] = Book::where('language', $language)
                                                               ->where('user_Type', $userType)
                                                               ->count();
        }
    }
    
    // Procurement status counts
    $bookTotals['payBooktotal'] = Book::where('book_procurement_status', '!=', '0')->count();
    foreach ($languages as $language) {
        $bookTotals["pay{$language}Booktotal"] = Book::where('language', $language)
                                                      ->where('book_procurement_status', '!=', '0')
                                                      ->count();
    }
    
    foreach ($userTypes as $userType) {
        $bookTotals["pay{$userType}Booktotal"] = Book::where('user_Type', $userType)
                                                      ->where('book_procurement_status', '!=', '0')
                                                      ->count();
        foreach ($languages as $language) {
            $bookTotals["pay{$userType}{$language}Booktotal"] = Book::where('language', $language)
                                                                    ->where('user_Type', $userType)
                                                                    ->where('book_procurement_status', '!=', '0')
                                                                    ->count();
        }
    }
    
    $bookTotals['copyBooktotal'] = Book::where('book_procurement_status', '=', '1')->count();
    foreach ($languages as $language) {
        $bookTotals["copy{$language}Booktotal"] = Book::where('language', $language)
                                                      ->where('book_procurement_status', '=', '1')
                                                      ->count();
    }
    
    // Additional metrics for 'metBook'
    $bookTotals['metBooktotal'] = Book::where('book_procurement_status', '=', '1')->count();
    $bookTotals['metassignooktotal'] = Book::where('book_reviewer_id', '!=', null)
                                           
                                            ->where('book_procurement_status', '=', '1')
                                            ->count();
    $bookTotals['metcomooktotal'] = Book::where('book_reviewer_id', '!=', null)
                                         ->where('book_status', '=', '1')
                                         ->where('book_procurement_status', '=', '1')
                                         ->count();
    $bookTotals['metrejooktotal'] = Book::whereNotNull('book_reviewer_id')
                                         ->where('book_status', '=', '0')
                                         ->where('book_procurement_status', '=', '1')
                                         ->count();                                    
   
     $bookTotals['metnotcomooktotal'] = Book::where('book_procurement_status', 1)
    ->whereNotNull('book_reviewer_id')
    ->where(function ($query) {
        $query->whereNull('book_status')
              ->orWhere('book_status', 2)
              ->orWhere('book_status', 3);
    })
    ->count();
    

    
    
   $metacompletecount = Book::where('book_reviewer_id','!=',Null)->where('book_status','=','1')->where('book_procurement_status','=','1')->count();
     
    $reviewerCompleteCount = BookReviewStatus::
         distinct('book_id')
         ->count();
   
         $reviCompleteCount = BookReviewStatus::where('mark','!=',null)->
         distinct('book_id')
         ->count();


         $results = DB::table('book_review_statuses')
         ->select('book_id',
             DB::raw('SUM(CASE WHEN reviewertype = "internal" AND mark IS NOT NULL THEN 1 ELSE 0 END) as rinternalcount'),
             DB::raw('SUM(CASE WHEN reviewertype = "external" AND mark IS NOT NULL THEN 1 ELSE 0 END) as rexternalcount'),
             DB::raw('SUM(CASE WHEN reviewertype = "public" AND mark IS NOT NULL THEN 1 ELSE 0 END) as rpubliccount'),
             DB::raw('SUM(CASE WHEN reviewertype = "internal" THEN 1 ELSE 0 END) as internalcount'),
             DB::raw('SUM(CASE WHEN reviewertype = "external" THEN 1 ELSE 0 END) as externalcount'),
             DB::raw('SUM(CASE WHEN reviewertype = "public" THEN 1 ELSE 0 END) as publiccount'),
             DB::raw('SUM(CASE WHEN mark IS NOT NULL THEN mark ELSE 0 END) as summarks')
         )
         ->groupBy('book_id')
         ->get();
 
     // Initialize counters
     $allthree=0;
     $exp_lib=0;
     $exp_pub=0;
     $lib_pub = 0;
     $exp=0;
     $lib=0;
     $pub=0;
 
     // Process the results
     foreach ($results as $val) {
         if (($val->internalcount == 0 || $val->rinternalcount == 0) && ($val->publiccount == 0 || $val->rpubliccount == 0)) {
             $exp++;
         } elseif (($val->externalcount == 0 || $val->rexternalcount == 0) && ($val->publiccount == 0 || $val->rpubliccount == 0)) {
             $lib++;
         } elseif (($val->externalcount == 0 || $val->rexternalcount == 0) && ($val->internalcount == 0 || $val->rinternalcount == 0)) {
             $pub++;
         } elseif ($val->externalcount == 0 || $val->rexternalcount == 0) {
             $lib_pub++;
         } elseif ($val->internalcount == 0 || $val->rinternalcount == 0) {
             $exp_pub++;
         } elseif ($val->publiccount == 0 || $val->rpubliccount == 0) {
             $exp_lib++;
         } else {
             $allthree++;
         }
     }
//      $resultscount=0;
//      $resultscount1=0;
//      $resultscount2=0;
//    foreach($results as $results1){
//           $boook=Book::find($results1->book_id);
//         if($boook->marks >=40   &&  $results1->rexternalcount  >=2){
//             $resultscount=  $resultscount + 1;
//         }elseif($boook->marks >=40   &&  $results1->rexternalcount  == 1){
//             $resultscount2=  $resultscount2 + 1;
//         }
//    }
 
//    foreach($results as $results1){
//     if($results1->summarks >=40 ){
//         $resultscount1=  $resultscount1 + 1;
//     }
// }

   $rdatacountval = BookReviewStatus::distinct()
    ->select('book_id')
    ->get();
    $revdataqualdetal = 0;
    $revnotdataqualdetal = 0;
    $revdataqualdetal1 = 0;
    $revnotdataqualdetal1 = 0;
    
    foreach ($rdatacountval as $rval) {
        $Bookrv = Book::find($rval->book_id);
        $Bookrvstatus = BookReviewStatus::where('book_id', '=', $rval->book_id)->get();
    
        $comextcount = 0;
        $comintcount = 0;
        $compubcount = 0;
        $penextcount = 0;
        $penintcount = 0;
        $penpubcount = 0;
    
        foreach ($Bookrvstatus as $rvalst) {
            switch ($rvalst->reviewertype) {
                case 'external':
                    $rvalst->mark === null ?  $penextcount++ :$comextcount++;
                    break;
                case 'internal':
                    $rvalst->mark === null ?  $penintcount++ : $comintcount++;
                    break;
                default: // public
                    $rvalst->mark === null ? $penpubcount++: $compubcount++ ;
            }
        }
    
        $isQualifiedReviewData = $comextcount == $comextcount + $penextcount  && $comintcount >= 3 && $compubcount >= 5;
        $isPassMark = $Bookrv->marks >= 40;
    
        if ($isQualifiedReviewData) {
            if ($isPassMark) {
                $revdataqualdetal++;
            } else {
              
                $revdataqualdetal1++;
            }
        } else {
            if ($isPassMark) {
             
                $revnotdataqualdetal++;
            } else {
                $revnotdataqualdetal1++;
            }
        }
    }
    
    $resultscount=$revdataqualdetal + $revnotdataqualdetal;
   
    $resultscount1=$revdataqualdetal1 + $revnotdataqualdetal1;





    $negofinalreport = DB::table('books')
    ->select(
        DB::raw('SUM(CASE WHEN nego_status = "No_Negotiation" AND negotiation_status IS NOT NULL AND books.marks >= 40 THEN 1 ELSE 0 END) as Nonegotiation'),
        DB::raw('SUM(CASE WHEN nego_status = "Below25" AND negotiation_status IS NOT NULL AND books.marks >= 40 THEN 1 ELSE 0 END) as Below25'),
        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status IS NOT NULL AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiation'),
        
        DB::raw('SUM(CASE WHEN nego_status = "Below25" AND negotiation_status = 0 AND books.marks >= 40 THEN 1 ELSE 0 END) as Below25pending'),
        DB::raw('SUM(CASE WHEN nego_status = "Below25" AND negotiation_status = 2 AND books.marks >= 40 THEN 1 ELSE 0 END) as Below25agree'),
        DB::raw('SUM(CASE WHEN nego_status = "Below25" AND negotiation_status = 3 AND books.marks >= 40 THEN 1 ELSE 0 END) as Below25disagree'),


        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status = 0 AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiationpending'),
        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status = 1 AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiationrenegotiationbyvendor'),
        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status = 5 AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiationrenegotiationbyadmin'),

        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status = 2 AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiationagree'),
        DB::raw('SUM(CASE WHEN nego_status = "Negotiation" AND negotiation_status = 3 AND books.marks >= 40 THEN 1 ELSE 0 END) as Negotiationdisagree'),

    )
    ->first();




    // $revdataqualdetal;
    // $revnotdataqualdetal;
    // $revdataqualdetal1;
    // $revnotdataqualdetal1;

    // return $revdataqualdetal . ' ' . $revnotdataqualdetal . ' ' . $revdataqualdetal1 . ' ' . $revnotdataqualdetal1;

   return view('admin.index',compact('allpub','activepub','inactivepub','allpubcount','activepubcount','inactivepubcount',
   'alldist','activedist','inactivedist', 'alldistcount','activedistcount','inactivedistcount',
   'allpubdist','activepubdist','inactivepubdist','categoryCountsPerCategory', 'allpubdistcount','activepubdistcount','inactivepubdistcount',
   'allperpub','activeperpub','inactiveperpub','allperpubcount','activeperpubcount','inactiveperpubcount','allperdist','activeperdist',
   'inactiveperdist','allperdistcount','activeperdistcount','inactiveperdistcount','total_periodical_pay','pub_periodical_pay','dis_periodical_pay','total_book_pay','pub_book_pay','dis_book_pay','pubdis_book_pay'
   ,'bookTotals','reviewerCompleteCount','reviCompleteCount','allthree','exp_lib','exp_pub','lib_pub','exp','lib','pub','resultscount','resultscount1'
   ,'revdataqualdetal','revnotdataqualdetal','revdataqualdetal1','revnotdataqualdetal1','negofinalreport')
   );
}
}

