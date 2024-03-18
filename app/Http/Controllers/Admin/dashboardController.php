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
   return view('admin.index',compact('allpub','activepub','inactivepub','allpubcount','activepubcount','inactivepubcount',
   'alldist','activedist','inactivedist', 'alldistcount','activedistcount','inactivedistcount',
   'allpubdist','activepubdist','inactivepubdist','categoryCountsPerCategory', 'allpubdistcount','activepubdistcount','inactivepubdistcount',)
   );
}
}

