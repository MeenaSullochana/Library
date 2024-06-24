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
use App\Models\PeriodicalPublisher;
use App\Models\PeriodicalDistributor;
use App\Models\Procurementpaymrnt;
use App\Models\Specialcategories;
use App\Models\Book;


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
     
// // all rec

//     $Booktotal = Book::count();
//     $Tamilooktotal = Book::where('language','Tamil')->count();
//     $Englishbooktotal = Book::where('language','English')->count();
//     $OtherIndianbooktotal = Book::where('language','Other_Indian')->count();
//     $Other_Foreignbooktotal = Book::where('language','Other_Foreign')->count();
   

//     $pubBooktotal = Book::where('user_Type','publisher')->count();
//     $pubTamilooktotal = Book::where('language','Tamil')->where('user_Type','publisher')->count();
//     $pubEnglishbooktotal = Book::where('language','English')->where('user_Type','publisher')->count();
//     $pubOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','publisher')->count();
//     $pubOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','publisher')->count();
   
//     $distBooktotal = Book::where('user_Type','distributor')->count();
//     $distTamilooktotal = Book::where('language','Tamil')->where('user_Type','distributor')->count();
//     $distEnglishbooktotal = Book::where('language','English')->where('user_Type','distributor')->count();
//     $distOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','distributor')->count();
//     $distOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','distributor')->count();
   
//     $pubdistBooktotal = Book::where('user_Type','publisher_distributor')->count();
//     $pubdistTamilooktotal = Book::where('language','Tamil')->where('user_Type','publisher_distributor')->count();
//     $pubdistEnglishbooktotal = Book::where('language','English')->where('user_Type','publisher_distributor')->count();
//     $pubdistOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','publisher_distributor')->count();
//     $pubdistOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','publisher_distributor')->count();
   
// // pay


//     $payBooktotal = Book::where('book_procurement_status','!=','0')->count();
//     $payTamilooktotal = Book::where('language','Tamil')->where('book_procurement_status','!=','0')->count();
//     $payEnglishbooktotal = Book::where('language','English')->where('book_procurement_status','!=','0')->count();
//     $payOtherIndianbooktotal = Book::where('language','Other_Indian')->where('book_procurement_status','!=','0')->count();
//     $payOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('book_procurement_status','!=','0')->count();
  
    
//     $paypubBooktotal = Book::where('user_Type','publisher')->where('book_procurement_status','!=','0')->count();
//     $paypubTamilooktotal = Book::where('language','Tamil')->where('user_Type','publisher')->where('book_procurement_status','!=','0')->count();
//     $paypubEnglishbooktotal = Book::where('language','English')->where('user_Type','publisher')->where('book_procurement_status','!=','0')->count();
//     $paypubOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','publisher')->where('book_procurement_status','!=','0')->count();
//     $paypubOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','publisher')->where('book_procurement_status','!=','0')->count();
   
//     $paydistBooktotal = Book::where('user_Type','distributor')->where('book_procurement_status','!=','0')->count();
//     $paydistTamilooktotal = Book::where('language','Tamil')->where('user_Type','distributor')->where('book_procurement_status','!=','0')->count();
//     $paydistEnglishbooktotal = Book::where('language','English')->where('user_Type','distributor')->where('book_procurement_status','!=','0')->count();
//     $paydistOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','distributor')->where('book_procurement_status','!=','0')->count();
//     $paydistOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','distributor')->where('book_procurement_status','!=','0')->count();
   
//     $paypubdistBooktotal = Book::where('user_Type','publisher_distributor')->where('book_procurement_status','!=','0')->count();
//     $paypubdistTamilooktotal = Book::where('language','Tamil')->where('user_Type','publisher_distributor')->where('book_procurement_status','!=','0')->count();
//     $paypubdistEnglishbooktotal = Book::where('language','English')->where('user_Type','publisher_distributor')->where('book_procurement_status','!=','0')->count();
//     $paypubdistOtherIndianbooktotal = Book::where('language','Other_Indian')->where('user_Type','publisher_distributor')->where('book_procurement_status','!=','0')->count();
//     $paypubdistOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('user_Type','publisher_distributor')->where('book_procurement_status','!=','0')->count();
   

//     $copyBooktotal = Book::where('book_procurement_status','1=','')->count();
//     $copyTamilooktotal = Book::where('language','Tamil')->where('book_procurement_status','=','1')->count();
//     $copyEnglishbooktotal = Book::where('language','English')->where('book_procurement_status','=','1')->count();
//     $copyOtherIndianbooktotal = Book::where('language','Other_Indian')->where('book_procurement_status','=','1')->count();
//     $copyOther_Foreignbooktotal = Book::where('language','Other_Foreign')->where('book_procurement_status','=','1')->count();
  
   
//     $metBooktotal = Book::where('book_procurement_status','1=','')->count();
//     $metassignooktotal = Book::where('book_reviewer_id','!=',Null)->where('book_status','=',Null)->where('book_procurement_status','=','1')->count();
//     $metcomooktotal = Book::where('book_reviewer_id','!=',Null)->where('book_status','=','1')->where('book_procurement_status','=','1')->count();
//     $metnotcomooktotal = Book::where('book_reviewer_id','!=',Null)->where('book_status','!=','1')->where('book_procurement_status','=','1')->count();



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
                                            ->where('book_status', '!=', null)
                                            ->where('book_procurement_status', '=', '1')
                                            ->count();
    $bookTotals['metcomooktotal'] = Book::where('book_reviewer_id', '!=', null)
                                         ->where('book_status', '=', '1')
                                         ->where('book_procurement_status', '=', '1')
                                         ->count();
    $bookTotals['metnotcomooktotal'] = Book::where('book_reviewer_id', '!=', null)
                                            ->where('book_status', '!=', '1')
                                            ->where('book_procurement_status', '=', '1')
                                            ->count();
    

    
    







    

   
   return view('admin.index',compact('allpub','activepub','inactivepub','allpubcount','activepubcount','inactivepubcount',
   'alldist','activedist','inactivedist', 'alldistcount','activedistcount','inactivedistcount',
   'allpubdist','activepubdist','inactivepubdist','categoryCountsPerCategory', 'allpubdistcount','activepubdistcount','inactivepubdistcount',
   'allperpub','activeperpub','inactiveperpub','allperpubcount','activeperpubcount','inactiveperpubcount','allperdist','activeperdist',
   'inactiveperdist','allperdistcount','activeperdistcount','inactiveperdistcount','total_periodical_pay','pub_periodical_pay','dis_periodical_pay','total_book_pay','pub_book_pay','dis_book_pay','pubdis_book_pay'
   ,'bookTotals')
   );
}
}

