<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Magazine;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\MagazineCategory;
use DB;
use App\Models\Specialcategories;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use App\Models\Cartbooks;


class ProductController extends Controller
{
    //
    public function product_two(){

        $librarian = auth('librarian')->user();

        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();
    
        if ($magazinebudget) {
            $cartdata = Cart::where('librarianid', '=', $librarian->id) 
                ->where('budgetid', '=', $magazinebudget->id)
                ->where('status', '=', '1')
                ->get();
    
            if (Session::has('magazinecartcount')) {
                Session::forget('magazinecartcount');
            }
            $magazinecartcount = count($cartdata);
            Session::put('magazinecartcount', $magazinecartcount);
    
            $bud_arr = [];
            $magazinebudget->CategorieAmount1 = json_decode($magazinebudget->CategorieAmount); 
    
        foreach ($magazinebudget->CategorieAmount1 as $val) {
            $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
                              ->where('category', '=', $val->name)
                              ->where('budgetid', '=', $magazinebudget->id)
                              ->where('status', '=', '1')
                              ->sum('totalAmount');
        
                              $percentage = $val->amount !== 0 ? round(($cartdata1 / max(1, $val->amount)) * 100) : 0;
            
            $obj = (object)[
                "category" => $val->name,
                "budget_price" => $val->amount,
                "cart_price" => $cartdata1,
                "percentage" => $percentage
                
            ];
            array_push($bud_arr, $obj);
        }
    
    }else{
        
        $magazinecartcount=0;
        Session::put('magazinecartcount', $magazinecartcount);
        $bud_arr = [];
        $magazinebudget1 = MagazineCategory::where('status', '=', '1')
        ->orderBy('created_at', 'ASC')
        ->get();
    
            foreach ($magazinebudget1 as $val) {
                $obj = (object)[
                    "category" => $val->name,
                    "budget_price" =>0,
                    "cart_price" => 0,
                    "percentage" => 0,
                ];
                array_push($bud_arr, $obj);
            }
        }
    
        if (Session::has('bud_arr')) {
            Session::forget('bud_arr');
        }
    
        Session::put('bud_arr', $bud_arr);
        
            $magazines = Magazine::paginate(10);
            $min = Magazine::where('status', '=', '1')->where('status', '=', '1')->min(\DB::raw('CAST(annual_cost_after_discount AS UNSIGNED)'));

            $max = Magazine::where('status', '=', '1')->max(\DB::raw('CAST(annual_cost_after_discount AS UNSIGNED)'));
            
            return view('product-two', compact('magazines','min','max'));
    }
    public function filter(Request $request)
    {
        $query = Magazine::query();
        
        // Check if category parameter is provided and not empty
        if ($request->has('category')) {
            $categoryParam = $request->input('category');
            if (!empty($categoryParam)) {
                if ($categoryParam != 'all') {
                    $categories = explode(',', $categoryParam);
                    foreach($categories as $val){
                        if($val == "இளைஞர் நலன்"){
                            array_push($categories , 'இளைஞர் நலன், விளையாட்டு, அறிவியல் & தொழில்நுட்பம்');
                        }
                        if($val == "Youth"){
                            array_push($categories , 'Youth, Sports Science & Technology');
                        }
                    }
                    $query->whereIn('category', $categories);
                }
            }
        }

        // Apply search filter if provided
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->where(function ($query) use ($searchQuery) {
                $query->where('title', 'like', "%{$searchQuery}%")
                    ->orWhere('category', 'like', "%{$searchQuery}%")
                    ->orWhere('annual_cost_after_discount', 'like', "%{$searchQuery}%")
                    ->orWhere('periodicity', 'like', "%{$searchQuery}%");
            });
        }

    // Apply price range filter if provided
    // if ($request->has('minPrice') && $request->has('maxPrice')) {
    //     $minPrice = $request->input('minPrice');
    //     $maxPrice = $request->input('maxPrice');
    //     $query->whereBetween('annual_cost_after_discount', [$minPrice, $maxPrice]);
    // }
        
    $perPage = 10;   
    // Apply search filter if provided
    if ($request->has('showrecord')) {
        $perPage = $request->input('showrecord');
        
    }else{
         // Retrieve paginated records
         $perPage = 10;
        //  dd($perPage);
    }
    // dd($perPage);
    
        $items = $query->paginate($perPage);

        if ($items->isEmpty()) {
            // Return response indicating no data found
            return response()->json(['message' => 'No records found.']);
        }

        $magazines = new LengthAwarePaginator(
            $items->items(),
            $items->total(),
            $items->perPage(),
            $items->currentPage(),
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        $eight = view('magazine.magazine-eight', compact('magazines'))->render();
        $four = view('magazine.magazine-four', compact('magazines'))->render();
        $single = view('magazine.magazine-single', compact('magazines'))->render();

        // Combine the rendered views into one
        $viewCombined = $eight . $four . $single;

        // Get the pagination links separately and customize the URLs
        $pagination = $magazines->render();
        $pagination = str_replace($magazines->url(1), '/tesproduct?page=1', $pagination); // Customize first page URL
        $pagination = str_replace($magazines->url($magazines->lastPage()), '/products?page=' . $magazines->lastPage(), $pagination); // Customize last page URL

        return response()->json([
            'html' => [
                'eight' => $eight,
                'four' => $four,
                'single' => $single,
            ],
            'pagination' => $pagination
        ]);
    }


    public function product(){

        $librarian = auth('librarian')->user();

        $bookbudget = Budget::where('type', 'bookbudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();
      
        if ($bookbudget) {
            $cartdata = Cartbooks::where('librarianid', '=', $librarian->id) 
                ->where('budgetid', '=', $bookbudget->id)
                ->where('status', '=', '1')
                ->get();
    
            if (Session::has('bookcartcount')) {
                Session::forget('bookcartcount');
            }
            $bookcartcount = count($cartdata);
            Session::put('bookcartcount', $bookcartcount);
    
            $bud_arr1 = [];
            $bookbudget->CategorieAmount1 = json_decode($bookbudget->CategorieAmount); 
    
        foreach ($bookbudget->CategorieAmount1 as $val) {

            $cartdata1 = Cartbooks::where('librarianid', '=', $librarian->id)
                              ->where('Type', '=', "Tamil")
                              ->where('category', '=', $val->name)
                              ->where('budgetid', '=', $bookbudget->id)
                              ->where('status', '=', '1')
                              ->sum('totalAmount');
          $cartdata11 = Cartbooks::where('librarianid', '=', $librarian->id)
                              ->where('category', '=', $val->name)
                              ->where('Type', '=', "English")
                              ->where('budgetid', '=', $bookbudget->id)
                              ->where('category', '=', $val->name)
                              ->where('status', '=', '1')
                              ->sum('totalAmount');
                              $percentage = $val->tamilAmount !== 0 ? round(($cartdata1 / max(1, $val->tamilAmount)) * 100) : 0;
                              $percentage1 = $val->englishAmount !== 0 ? round(($cartdata11 / max(1, $val->englishAmount)) * 100) : 0;
                              $obj = (object)[
                                "category" => $val->name,
                                "budget_price" => $val->tamilAmount,
                                 "Type"   =>"Tamil",
                                "cart_price" => $cartdata1,
                                "percentage" => $percentage
                                
                            ];
                            array_push($bud_arr1, $obj);
                        
            $obj = (object)[
                "category" => $val->name,
                "budget_price" => $val->englishAmount,
                 "Type"   =>"English",
                "cart_price" => $cartdata11,
                "percentage" => $percentage1
                
            ];
            array_push($bud_arr1, $obj);
        }
    
    }else{
        
        $bookcartcount=0;
        Session::put('bookcartcount', $bookcartcount);
        $bud_arr1 = [];
        $bookbudget1 = Specialcategories::where('status', '=', '1')
        ->orderBy('created_at', 'ASC')
        ->get();
    
            foreach ($bookbudget1 as $val) {
                $obj = (object)[
                    "category" => $val->name,
                    "budget_price" =>0,
                    "Type"   =>"Tamil",
                    "cart_price" => 0,
                    "percentage" => 0,
                ];
                array_push($bud_arr1, $obj);
                $obj = (object)[
                    "category" => $val->name,
                    "budget_price" =>0,
                    "cart_price" => 0,
                    "Type"   =>"English",
                    "percentage" => 0,
                ];
                array_push($bud_arr1, $obj);
            }
        }
    
        if (Session::has('bud_arr1')) {
            Session::forget('bud_arr1');
        }
    
        Session::put('bud_arr1', $bud_arr1);

            $books = Book::where('book_active_status', '=', 1)
            ->where('negotiation_status', '=', "2")
            ->where('marks', '>=', 40)->where('book_status', '=', '1')
            ->orderBy('marks', 'desc')->paginate(24);
            $min = Book::where('book_active_status', '=', 1)
            ->where('negotiation_status', '=', "2")
            ->where('marks', '>=', 40)->where('book_status', '=', '1')->min(\DB::raw('CAST(final_price AS UNSIGNED)'));

            $max = Book::where('book_active_status', '=', 1)
            ->where('negotiation_status', '=', "2")
            ->where('marks', '>=', 40)->where('book_status', '=', '1')->max(\DB::raw('CAST(final_price AS UNSIGNED)'));
         
            return view('product', compact('books','min','max'));
    }

    // productfilter
    public function productfilter(Request $request)
    {
      
        $query = Book::query();
        $query->where('book_active_status', '=', 1)
        ->where('negotiation_status', '=', "2")
        ->where('marks', '>=', 40)->where('book_status', '=', '1');
        // Check if category parameter is provided and not empty
        if ($request->has('category')) {
            $categoryParam = $request->input('category');
            if (!empty($categoryParam)) {
                if ($categoryParam != 'all') {
                    $categories = explode(',', $categoryParam);
       
                    $query->whereIn('category', $categories);
                }
            }
        }
        if ($request->has('subject')) {
            $subjectParam = $request->input('subject');
            if (!empty($subjectParam)) {
                if ($subjectParam != 'all') {
                    $subjects = explode(',', $subjectParam);
                
                    $query->whereIn('subject', $subjects);
                }
            }
        }

        if ($request->has('language')) {
            $languageParam = $request->input('language');
            if (!empty($languageParam)) {
              
            
                    $query->where('language', $languageParam);
                
            }
        }
        
        // Apply search filter if provided
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->where(function ($query) use ($searchQuery) {
                $query->where('book_title', 'like', "%{$searchQuery}%")
                    ->orWhere('category', 'like', "%{$searchQuery}%")
                    ->orWhere('final_price', 'like', "%{$searchQuery}%")
                    ->orWhere('author_name', 'like', "%{$searchQuery}%")
                    ->orWhere('isbn', 'like', "%{$searchQuery}%")
                    ->orWhere('yearOfPublication', 'like', "%{$searchQuery}%")
                    ->orWhere('language', 'like', "%{$searchQuery}%")
                    ->orWhere('subject', 'like', "%{$searchQuery}%");
            });
        }

    // Apply price range filter if provided
    if ($request->has('minPrice') && $request->has('maxPrice')) {
        $minPrice = (int) $request->input('minPrice');
        $maxPrice = (int) $request->input('maxPrice');
        $query->whereBetween('final_price', [$minPrice, $maxPrice]);
    }
    
       
    $perPage = 0;   
    // Apply search filter if provided
    if ($request->has('showRecord')) {
        $perPage = $request->input('showRecord');
        
    }else{
         // Retrieve paginated records
         $perPage = 24;
        //  dd($perPage);
    }
    // dd($perPage);
    
        $items = $query->paginate($perPage);

        if ($items->isEmpty()) {
            // Return response indicating no data found
            return response()->json(['message' => 'No records found.']);
        }

        $books = new LengthAwarePaginator(
            $items->items(),
            $items->total(),
            $items->perPage(),
            $items->currentPage(),
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        $eight = view('book.book-eight', compact('books'))->render();
        $four = view('book.book-four', compact('books'))->render();
        $single = view('book.book-single', compact('books'))->render();

        // Combine the rendered views into one
        $viewCombined = $eight . $four . $single;

        // Get the pagination links separately and customize the URLs
        $pagination = $books->render();
        $pagination = str_replace($books->url(1), '/tesproduct?page=1', $pagination); // Customize first page URL
        $pagination = str_replace($books->url($books->lastPage()), '/products?page=' . $books->lastPage(), $pagination); // Customize last page URL
      
        return response()->json([
            'html' => [
                'eight' => $eight,
                'four' => $four,
                'single' => $single,
            ],
            'pagination' => $pagination
        ]);
       
    }
}
