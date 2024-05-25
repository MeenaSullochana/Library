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

}
