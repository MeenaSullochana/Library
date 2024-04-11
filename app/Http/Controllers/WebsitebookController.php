<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Budget;
use App\Models\Magazine;
use App\Models\Cart;
use DB;
use App\Models\Ordermagazine;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Specialcategories;
use Illuminate\Support\Facades\Session;
use App\Models\MagazineCategory;
use App\Models\existMagazine;
use App\Models\Librarian;
use Illuminate\Support\Facades\Validator;
use Throwable;
use TCPDF;
use PDF;
use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class WebsitebookController extends Controller
{
    // Import your Book model

    public function  websitebook()
    {

        $books = Book::where('negotiation_status', '=', 2)
            ->where('book_active_status', '=', 1)
            ->orderBy('marks', 'desc')
            ->paginate(6); // Adjust the pagination size as needed

        $popularBooks = Book::where('negotiation_status', '=', 2)
            ->where('book_active_status', '=', 1)
            ->orderBy('marks', 'desc')
            ->paginate(6);

        return view('product', compact('books', 'popularBooks'));

        // return view('product', compact('books'));

    }


    public function book_categories(Request $req)
    {
        $checkedIds = $req->input('checkedIds', []);

        $books = Book::where('negotiation_status', '=', 2)
            ->where('book_active_status', '=', 1);

        if (!empty($checkedIds)) {
            $books->whereIn('category', $checkedIds); // Apply whereIn() to the $books query builder
        }

        $books = $books->orderBy('marks', 'desc')->paginate(1);

        $html = '<div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">';

        foreach ($books as $val) {
            $html .= '
        <div class="col">
           <div class="tpproduct p-relative">
              <div class="tpproduct__thumb p-relative text-center">
                 <a href="/shope/' . $val->id . '"><img src="' . asset("Books/full/" . $val->full_img) . '" class="w-100" alt=""></a>
                 <a class="tpproduct__thumb-img" href="/shope/' . $val->id . '""><img src="' . asset("Books/full/" . $val->full_img) . '" alt=""></a>
                 <div class="tpproduct__info bage"></div>
                 <div class="tpproduct__shopping">
                    <a class="tpproduct__shopping-wishlist" href="/wishlist"><i class="icon-heart icons"></i></a>
                    <a class="tpproduct__shopping-wishlist" href="#"><i class="icon-layers"></i></a>
                    <a class="tpproduct__shopping-cart" href="#"><i class="icon-eye"></i></a>
                 </div>
              </div>
              <div class="tpproduct__content">
                 <span class="tpproduct__content-weight">
                    <a href="/shope/' . $val->id . '">' . $val->category . '</a>
                 </span>
                 <h4 class="tpproduct__title">
                    <a href="/shope/' . $val->id . '">' . $val->book_title . '</a>
                 </h4>
                 <p class="text-primary"><b>By</b> Name</p> | ' . \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') . '
                 <div class="tpproduct__price">
                    <span>$' . $val->final_price . '</span>
                 </div>
              </div>
              <div class="tpproduct__hover-text">
                 <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                    <a class="tp-btn-2" href="/cart">Add to cart</a>
                 </div>
                 <div class="tpproduct__descrip">
                    <ul>
                       <li>Subject: ' . $val->subject . '</li>
                       <li>MFG: August 4, 2021</li>
                       <li>LIFE: 60 days</li>
                    </ul>
                 </div>
              </div>
           </div>
        </div>';
        }

        $html .= '</div>';

        $html .= '<div class="basic-pagination text-center mt-35">
        <nav>
            <ul>';

        if ($books->onFirstPage()) {
            $html .= '<li><span class="current">1</span></li>';
        } else {
            $html .= '<li><a href="' . $books->previousPageUrl() . '">1</a></li>';
        }

        if ($books->currentPage() >= 2) {
            $html .= '<li><a href="' . $books->url(2) . '">2</a></li>';
        }

        if ($books->currentPage() >= 3) {
            $html .= '<li><a href="' . $books->url(3) . '">3</a></li>';
        }

        if ($books->hasMorePages()) {
            $html .= '<li><a href="' . $books->nextPageUrl() . '"><i class="icon-chevrons-right"></i></a></li>';
        }

        $html .= '</ul>
        </nav>
    </div>';

        $data = [
            "success" => $html,
        ];

        return response()->json($data);
    }


    public function bookview($id)
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

        //   return $book;
        // return view('shope', compact('data'));
        Session::put('book', $book);
        return redirect('singlebookview');
        // return redirect('shope');    
    }


    public function addToCart(Request $request, $id)
    {
        if (Session::get('msg') || Session::get('qty')) {
            Session::forget('msg');
            Session::forget('qty');
        }
        $msg = $this->store($request, $id);
        $qty = count(Session::get('cart'));
        Session::put('msg', $msg);
        Session::put('qty', $qty);
        return redirect()->back()->with('success', $msg);
    }

    public function store($request, $id)
    {

        $msg = '';
        $qty_check  = 0;
        $input = $request->all();
        $qty = isset($input['quantity']) ? $input['quantity'] : 1;
        $qty = is_numeric($qty) ? $qty : 1;
        $cart = Session::get('cart');
        $item = Book::where('id', $id)->first();
        $single = isset($request->type) ? ($request->type == '1' ? 1 : 0) : 0;
        if (Session::has('cart')) {
            $check = array_key_exists($id, Session::get('cart'));

            if ($check) {
                return __('Product all-ready added');
            } else {
                if (array_key_exists($id . '-', Session::get('cart'))) {
                    return __('Product all-ready added');
                }
            }
        }

        $option_id = [];
        if ($single == 1) {

            if ($request->quantity != 'NaN') {
                $qty = $request->quantity;
                $qty_check = 1;
            } else {
                $qty = 1;
            }
        } else {
            $cart = Session::get('cart');
            // if cart is empty then this the first product
            if (!$cart || !isset($cart[$item->id . '-'])) {
                $cart[$item->id . '-'] = [
                    "name" => $item->book_title,
                    "code" => $item->product_code,
                    "image" => $item->front_img,
                    "subject" => $item->category,
                    "qty" => $qty,
                    "price" => $item->final_price,
                    "finalprice" => $qty * $item->final_price,
                    "id" => $item->id
                ];

                Session::put('cart', $cart);
                return __('Product add successfully');
            }


            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$item->id . '-'])) {

                $cart = Session::get('cart');

                if ($qty_check == 1) {
                    $cart[$item->id . '-']['qty'] =  $qty;
                } else {
                    $cart[$item->id . '-']['qty'] +=  $qty;
                }


                Session::put('cart', $cart);

                if ($qty_check == 1) {
                    $mgs = __('Product add successfully');
                } else {
                    $mgs = __('Product add successfully');
                }

                $qty_check = 0;
                return $mgs;
            }

            return __('Product add successfully');
        }
    }

    public function updatecart(Request $request)
    {
        $id = $request->id;
        $check = $this->checkamount($request, $id);
        if ($check == "true") {
            $msg = $this->updatestore($request, $id);
            $data = $this->budgetcal();
            $bud_arr = Session::get('bud_arr');
            $total = Session::get('total');
            return response()->json(['success' => "true", 'msg' => $msg, 'bud_arr' => $bud_arr, 'total' => $total]);
        } else if ($check == "false") {
            $msg1 = "You purchase limit for this category is more than a budget ...";
            $msg = $this->updatestore($request, $id);
            $data = $this->budgetcal();
            $bud_arr = Session::get('bud_arr');
            $total = Session::get('total');
            return response()->json(['success' => "false", 'msg' => $msg1, 'bud_arr' => $bud_arr, 'total' => $total]);
        } else {
            return $check;
        }
    }

    public function checkamount($request, $id)
    {
        $input = $request->all();
        $qty = isset($input['quantity']) ? $input['quantity'] : 1;
        $qty = is_numeric($qty) ? $qty : 1;
        $cart = Session::get('cart');
        $budget = Session::get('bud_arr');
        $item = Book::where('id', $id)->first();
        if ($qty != 0) {
            if (isset($cart[$item->id . '-'])) {
                $cart_qty =  $cart[$item->id . '-']['qty'];

                if ($cart_qty > $qty) {

                    $added_qty = $cart_qty - $qty;
                    $price =  $cart[$item->id . '-']['price'] * $added_qty;
                    $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
                    $final_cart_price = $cart_price - $price;
                } else if ($cart_qty < $qty) {
                    $added_qty = $qty - $cart_qty;
                    $price =  $cart[$item->id . '-']['price'] * $added_qty;
                    $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
                    $final_cart_price = $cart_price + $price;
                } else {
                    $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
                    $final_cart_price = $cart_price;
                }

                $budget_price =  collect($budget)->firstWhere('category', $item->category)->budget_price ?? 0;
                if ($budget_price >= $final_cart_price) {
                    return "true";
                } else {
                    return "false";
                }
            }
        }
    }

    public function updatestore($request, $id)
    {
        $msg = '';
        $qty_check  = 0;
        $input = $request->all();
        $qty = isset($input['quantity']) ? $input['quantity'] : 1;
        $qty = is_numeric($qty) ? $qty : 1;
        $cart = Session::get('cart');
        $item = Book::where('id', $id)->first();
        $single = isset($request->type) ? ($request->type == '1' ? 1 : 0) : 0;
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$item->id . '-'])) {

            $cart = Session::get('cart');
            $cart[$item->id . '-']['qty'] =  $qty;
            $cart[$item->id . '-']['finalprice'] =  $cart[$item->id . '-']['price'] * $qty;
            Session::put('cart', $cart);
            $mgs = __('Product add successfully');
            return $mgs;
        }
    }

    public function bookcart()
    {
        $bud_arr = [];
        $cart = Session::get('cart');
        $data = $this->budgetcal();
        if ($data) {
            return view('cart', compact('cart'));
        }
    }
    public function budgetcal()
    {
        $bud_arr = [];
        $cart = Session::get('cart');
        $librarian = auth('librarian')->user();
        $lib_type = $librarian->libraryType;
        $category = Specialcategories::all();
        $budget = Budget::where('libraryType', $lib_type)->orderBy('created_at', 'DESC')->first();
        $cat_budget = json_decode($budget['CategorieAmount']);
        $total_purchase = 0;
        if (count($cart) > 0) {
            $cartrec = array_reduce($cart, function ($carry, $item) {
                $subject = $item['subject'];
                if (!isset($carry[$subject])) {
                    $carry[$subject] = ['price' => 0]; // Initialize price to 0 if subject doesn't exist in the result array
                }
                $carry[$subject]['name'] = $item['subject'];
                $carry[$subject]['price'] += $item['finalprice']; // Add the final price to the total price for this subject
                return $carry;
            }, []);

            foreach ($category as $key => $val) {
                $name = $val->name;
                $budget_price = collect($cat_budget)->firstWhere('name', $name)->amount ?? 0;
                $cart_price = $cartrec[$name]['price'] ?? 0;
                if ($cart_price != null) {
                    $percentage = $budget_price ? round(($cart_price / $budget_price) * 100, 2) : 0;
                } else {
                    $percentage = 0;
                }

                $total_purchase = $total_purchase + $cart_price;
                $obj = (object)[
                    "category" => $name,
                    "budget_price" => $budget_price,
                    "cart_price" => $cart_price,
                    "percentage" => $percentage
                ];
                array_push($bud_arr, $obj);
            }
        } else {
            foreach ($category as $key => $val) {
                $name = $val->name;
                $budget_price = collect($cat_budget)->firstWhere('name', $name)->amount ?? 0;
                $obj = (object)[
                    "category" => $name,
                    "budget_price" => $budget_price,
                    "cart_price" => 0,
                    "percentage" => 0
                ];
                array_push($bud_arr, $obj);
            }
        }

        if (Session::has('bud_arr')) {
            Session::forget('bud_arr');
        }
        Session::put('bud_arr', $bud_arr);
        if (Session::has('total')) {
            Session::forget('total');
        }
        Session::put('total', $total_purchase);
        return "true";
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $cart = Session::get('cart');
        unset($cart[$id . '-']);
        if (count($cart) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::put('cart', $cart);
        }
        // Session::flash('success',__('Cart item remove successfully.'));
        return back()->with('success', 'Cart item remove successfully.');
        // return back();
    }

    public function checkout()
    {
        // "category" => $name,
        // "budget_price" => $budget_price,
        // "cart_price" =>0,
        // "percentage" => 0
        $total = Session::get('total');
        $bud_arr = Session::get('bud_arr');
        $total_price = 0;
        foreach ($bud_arr as $key => $val) {
            $total_price = $total_price + $val->budget_price;
            if ($val->budget_price != $val->cart_price) {
                if ($val->budget_price < $val->cart_price) {
                    return back()->with('error', "You Purchased more than a budget amount in " . $val->category);
                } else {
                    $bal = $val->budget_price - $val->cart_price;
                    $book = Book::where('category', $val->category)->where('negotiation_status', 2)->where('book_active_status', 1)->where('final_price', '<=', $bal)->get();
                    if (count($book) > 0) {
                        return back()->with('error', "You Still have amount for this category" . $val->category);
                        // return "You Still have amount for this category".$val->category;
                    }
                }
            }
        }

        // if($total != $total_price){
        //     $over_bal = $total- $total_price;
        //     $over_book = Book::where('negotiation_status',2)->where('book_active_status',1)->where('final_price','<=',$over_bal)->get();
        //     if(count($over_book)>0){
        //         return "You Still have amount please book";
        //     }
        // }
        return view('checkout');
    }


    // public function product_two(Request $request)
    // {
    //     $librarian = auth('librarian')->user();

    //     $magazinebudget = Budget::where('type', 'magazinebudget')
    //     ->where(function ($query) use ($librarian) {
    //         $query->whereNotIn('purchaseid', [$librarian->id])
    //             ->whereJsonDoesntContain('purchaseid', $librarian->id);
    //     })
    //     ->where('libraryType', $librarian->libraryType)
    //     ->orderBy('created_at', 'ASC')
    //     ->first();
    //    IF($magazinebudget){
    //     $cartdata = Cart::where('librarianid', '=', $librarian->id) 
    //         ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
    //         ->get();

    //     if(Session::has('magazinecartcount')) {
    //         Session::forget('magazinecartcount');
    //     }
    //     $magazinecartcount=count($cartdata);
    //     Session::put('magazinecartcount', $magazinecartcount);
    //     $bud_arr = [];

    //         $magazinebudget->CategorieAmount1 = json_decode($magazinebudget->CategorieAmount); 

    //     foreach ($magazinebudget->CategorieAmount1 as $val) {
    //         $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
    //                           ->where('category', '=', $val->name)
    //                           ->where('budgetid', '=', $magazinebudget->id)
    //                           ->where('status', '=', '1')
    //                           ->sum('totalAmount');

    //         $percentage = $cartdata1 ? round(($cartdata1 /$val->amount ) * 100) : 0;

    //         $obj = (object)[
    //             "category" => $val->name,
    //             "budget_price" => $val->amount,
    //             "cart_price" => $cartdata1,
    //             "percentage" => $percentage
    //         ];
    //         array_push($bud_arr, $obj);
    //     }




    // }else{

    //     $magazinecartcount=0;
    //     Session::put('magazinecartcount', $magazinecartcount);
    //     $bud_arr = [];
    //     $magazinebudget1 = MagazineCategory::where('status', '=', '1')
    //     ->orderBy('created_at', 'ASC')
    //     ->get();

    //     foreach ($magazinebudget1 as $val) {
    //         $obj = (object)[
    //             "category" => $val->name,
    //             "budget_price" =>0,
    //             "cart_price" => 0,
    //             "percentage" => 0,
    //         ];
    //         array_push($bud_arr, $obj);
    //     }
    // }
    // if(Session::has('bud_arr')) {
    //     Session::forget('bud_arr');
    // }

    // Session::put('bud_arr', $bud_arr);


    //         $magazines = Magazine::orderBy('sNo', 'Asc')->paginate(12);


    //     return view('product-two', compact('magazines'));
    // }
    public function product_two(Request $request)
    {
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
        } else {

            $magazinecartcount = 0;
            Session::put('magazinecartcount', $magazinecartcount);
            $bud_arr = [];
            $magazinebudget1 = MagazineCategory::where('status', '=', '1')
                ->orderBy('created_at', 'ASC')
                ->get();

            foreach ($magazinebudget1 as $val) {
                $obj = (object)[
                    "category" => $val->name,
                    "budget_price" => 0,
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


        $magazines = Magazine::where('status', '=', '1')->orderBy('sNo', 'Asc')->paginate(96);
        $min = Magazine::where('status', '=', '1')->orderBy('sNo', 'Asc')->min('annual_cost_after_discount');
        $max = Magazine::where('status', '=', '1')->orderBy('sNo', 'Asc')->min('annual_cost_after_discount');

        return view('product-test', compact('magazines', 'min', 'max'));
    }

    public function product_two_category(Request $request)
    {




        $checkedIds = $request->input('category', []);

        $magazines = Magazine::query()->when(!empty($checkedIds), function ($query) use ($checkedIds) {
            return $query->whereIn('category', $checkedIds);
        })->orderBy('sNo', 'Asc')->paginate(12);


        $selectedCategory = $checkedIds;

        return view('product-two-category', compact('magazines', 'selectedCategory'));
    }

    public function megazine_categories(Request $req)
    {




        $checkedIds = $req->input('checkedIds', []);
        $checkedIds1 = $req->input('checkedIds1', []);

        $Magazine = Magazine::query()
            ->where(function ($query) use ($checkedIds, $checkedIds1) {
                if (!empty($checkedIds) && !empty($checkedIds1)) {
                    $query->where(function ($query) use ($checkedIds, $checkedIds1) {
                        $query->whereIn('category', $checkedIds)
                            ->whereIn('periodicity', $checkedIds1);
                    });
                } else {
                    if (!empty($checkedIds)) {
                        $query->whereIn('category', $checkedIds);
                    }

                    if (!empty($checkedIds1)) {
                        $query->orWhereIn('periodicity', $checkedIds1);
                    }
                }
            })->where('status', '=', '1')->orderBy('sNo', 'Asc')
            ->paginate($req->selectedValue);



        $html = '';
        $html = '<div class="tab-pane fade fade" id="nav-all" role="tabpanel"
    aria-labelledby="nav-all-tab">';
        $html .= ' <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">';

        foreach ($Magazine as $val) {
            $html .= '<div class="col">
        <div class="tpproduct p-relative mb-20">
            <div class="tpproduct__thumb p-relative text-center">
                <a href="/shope-magazine/' . $val->id . '"><img src="' . asset("Magazine/front/" . $val->front_img) . '" alt="No Image"></a>
                <a class="tpproduct__thumb-img" href="/shope-magazine/' . $val->id . '"><img src="' . asset("Magazine/back/" . $val->back_img) . '" alt="No Image"></a>
                <div class="tpproduct__shopping">
                    <a class="tpproduct__shopping-cart" href="/shope-magazine/' . $val->id . '"><i class="icon-eye"></i></a>
                </div>
            </div>
            <div class="tpproduct__content">
                <span class="tpproduct__content-weight">
                    <a href="#">' . $val->category . '</a>,
                    <a href="#">' . $val->language . '</a>
                </span>
                <h4 class="tpproduct__title">
                    <a href="/shope-magazine/' . $val->id . '"> Magazine Title: ' . $val->title . ' </a>
                </h4>
                <div class="tpproduct__price">
                    <span>₹' . $val->annual_cost_after_discount . '</span>
                    <!-- <del>₹19.00</del> -->
                </div>
            </div>
            <div class="tpproduct__hover-text">
                <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                <button  class="tp-btn-2  Add-to-cart3" data-id3="' . $val->id . '">Add to cart</button>

                </div>
                <div class="tpproduct__descrip">
                    <ul>
                        <li>category: ' . $val->category . '</li>
                        <li>periodicity: ' . $val->periodicity . '</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
        }
        $html .= '</div>';
        $html .= '</div>';


        $html .= '<div class="tab-pane whight-product" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">';
        $html .= '<div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">';
        foreach ($Magazine as $val) {
            $html .= '<div class="col">
                    <div class="tpproduct p-relative mb-20">
                        <div class="tpproduct__thumb p-relative text-center">
                            <a href="/shope-magazine/' . $val->id . '"><img src="' . asset("Magazine/front/" . $val->front_img) . '" alt="No Image"></a>
                            <a class="tpproduct__thumb-img" href="/shope-magazine/' . $val->id . '"><img src="' . asset("Magazine/back/" . $val->back_img) . '" alt="No Image"></a>
                            <div class="tpproduct__shopping">
                                <a class="tpproduct__shopping-cart" href="/shope-magazine/' . $val->id . '"><i class="icon-eye"></i></a>
                            </div>
                        </div>
                        <div class="tpproduct__content">
                            <span class="tpproduct__content-weight">
                                <a href="#">' . $val->category . '</a>,
                                <a href="#">' . $val->language . '</a>
                            </span>
                            <h4 class="tpproduct__title">
                                <a href="/shope-magazine/' . $val->id . '">Magazine Title: ' . $val->title . '</a>
                            </h4>
                            <div class="tpproduct__price">
                                <span>₹' . $val->annual_cost_after_discount . '</span>
                            </div>
                        </div>
                        <div class="tpproduct__hover-text">
                            <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                            <button  class="tp-btn-2  Add-to-cart2" data-id2="' . $val->id . '"">Add to cart</button>

                            </div>
                            <div class="tpproduct__descrip">
                                <ul>
                                    <li>Category: ' . $val->category . '</li>
                                    <li>Periodicity: ' . $val->periodicity . '</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="tab-pane fade show active whight-product" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">';

        foreach ($Magazine as $val) {
            $html .= '<div class="row">
                    <div class="col-lg-12">
                        <div class="tplist__product d-flex align-items-center justify-content-between mb-20">
                            <div class="tplist__product-img">
                                <a href="/shope-magazine/' . $val->id . '" class="tplist__product-img-one"><img src="' . asset("Magazine/front/" . $val->front_img) . '" alt="No Image"></a>
                                <a class="tplist__product-img-two" href="/shope-magazine/' . $val->id . '"><img src="' . asset("Magazine/back/" . $val->back_img) . '" alt="No Image"></a>
                            </div>
                            <div class="tplist__content">
                                <span>' . $val->category . '</span>,
                                <span>' . $val->language . '</span>
                                <h4 class="tplist__content-title"><a href="/shope-magazine/' . $val->id . '">Magazine Title: ' . $val->title . '</a></h4>
                                <ul class="tplist__content-info">
                                    <li>Category: ' . $val->category . '</li>
                                    <li>Periodicity: ' . $val->periodicity . '</li>
                                </ul>
                            </div>
                            <div class="tplist__price justify-content-end">
                                <h3 class="tplist__count mb-15">₹' . $val->annual_cost_after_discount . '</h3>
                                <button class="tp-btn-2 mb-10 Add-to-cart1" data-id1="' . $val->id . '">Add to cart</button>

                                <div class="tplist__shopping"></div>
                            </div>
                        </div>
                    </div>
                </div>';
        }

        $html .= '</div>';
        // $html = '<div class="basic-pagination text-center mt-35">';
        // $html .= $Magazine->links();
        // $html .= '</div>';

        // $html .= '<div class="basic-pagination text-center mt-35">
        // <nav>
        //     <ul>';
        //     $paginationLinks = $Magazine->appends(['checkedIds' => $checkedIds])->links();


        //     $html .= $paginationLinks;

        //     $html .= '</ul>
        //         </nav>
        //     </div>';
        $html .= '<div class="basic-pagination text-center mt-35">
    <nav aria-label="...">
        <ul class="pagination">
        <li class="page-item disabled">';

        $paginationLinks = $Magazine->appends(['selectedValuedata' => $req->selectedValue, 'checkedIds' => $checkedIds, 'checkedIds1' => $checkedIds1])->links();


        $html .= $paginationLinks;

        $html .= '</li></ul>
    </nav>
</div>';

        // return response()->json(['success' => $html]);

        // $data = [
        //     "success" => $html,
        // ];

        return response()->json($html);
    }

    public function shope_magazine($id)
    {

        $shopemagazine = Magazine::find($id);
        $cart = Cart::where('magazineid', '=', $shopemagazine->id)
            ->where('status', '=', '1')
            ->first();

        if ($cart == null) {
            $shopemagazine->quantity = '1';
        } else {
            $shopemagazine->quantity = $cart->quantity;
        }

        Session::put('shopemagazine', $shopemagazine);
        return redirect('shopemagazine');
    }
    public function cart_magazine()
    {

        $librarian = auth('librarian')->user();

        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();


        // return  $librarian;
        if ($magazinebudget != null) {
            $cartdata = [];
            $maga = json_decode($magazinebudget->CategorieAmount);
            $cartdata22 = Cart::where('librarianid', '=', $librarian->id)
                ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                ->get();
            foreach ($maga as $val) {
                foreach ($cartdata22 as $val1) {
                    if ($val->name == $val1->category) {
                        array_push($cartdata, $val1);
                    }
                }
            }


            $bud_arr = [];
            if ($magazinebudget != null) {
                $magazinebudget->CategorieAmount1 = json_decode($magazinebudget->CategorieAmount);

                foreach ($magazinebudget->CategorieAmount1 as $val) {
                    $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
                        ->where('category', '=', $val->name)
                        ->where('budgetid', '=', $magazinebudget->id)
                        ->where('status', '=', '1')
                        ->sum('totalAmount');

                    $percentage = $val->amount !== 0 ? round(($cartdata1 / max(1, $val->amount)) * 100) : 0;

                    $obj = (object)[
                        "category" => is_numeric($val->name) ? round($val->name) : $val->name,
                        "budget_price" => is_numeric($val->amount) ? round($val->amount) : $val->amount,
                        "cart_price" => is_numeric($cartdata1) ? round($cartdata1) : $cartdata1,
                        "percentage" => is_numeric($percentage) ? round($percentage) : $percentage
                    ];

                    array_push($bud_arr, $obj);
                }
            }
            $cartdatacount = Cart::where('librarianid', '=', $librarian->id)
                ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                ->sum('totalAmount');

            if (Session::has('magazinecartcount')) {
                Session::forget('magazinecartcount');
            }
            $magazinecartcount = count($cartdata);
            Session::put('magazinecartcount', $magazinecartcount);
            $totalbudgetcount = $magazinebudget->totalAmount;
            return view('cart-magazine', compact('bud_arr', 'cartdata', 'cartdatacount', 'totalbudgetcount'));
        } else {
            $cartdata = null;
            $bud_arr = null;
            $cartdatacount = 0;
            $totalbudgetcount = 0;

            return view('cart-magazine', compact('bud_arr', 'cartdata', 'cartdatacount', 'totalbudgetcount'));
        }
    }

    public function add_to_cart(Request $req)
    {
        $librarian = auth('librarian')->user();

        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();

        if ($magazinebudget != null) {

            $magazinebudgetdata = json_decode($magazinebudget->CategorieAmount);
            $magazinedata = Magazine::find($req->id);
            $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
                ->where('category', '=', $magazinedata->category)
                ->where('budgetid', '=', $magazinebudget->id)
                ->where('status', '=', '1')
                ->sum('totalAmount');
            $totalcost = 0;

            foreach ($magazinebudgetdata as $val) {
                if ($val->name == $magazinedata->category) {
                    $totalcost = $val->amount;
                }
            }
            $cartdata2 = $cartdata1 + $magazinedata->annual_cost_after_discount;



            $balAmt = $totalcost - $cartdata1;

            if ($totalcost >= $cartdata2) {
                $Cartdata = Cart::where('librarianid', '=', $librarian->id)
                    ->where('magazineid', '=', $req->id)
                    ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                    ->first();

                if (is_null($Cartdata)) {

                    $magazine = Magazine::find($req->id);

                    $cart = new Cart();
                    $cart->title = $magazine->title;
                    $cart->image = $magazine->front_img;
                    $cart->librarianid = $librarian->id;
                    $cart->magazineid = $magazine->id;
                    $cart->amount = $magazine->annual_cost_after_discount;
                    $cart->quantity = 1;
                    $cart->budgetid = $magazinebudget->id;
                    $cart->totalAmount = $magazine->annual_cost_after_discount;
                    $cart->category = $magazine->category;
                    $cart->save();
                    if (Session::has('magazinecartcount')) {
                        Session::forget('magazinecartcount');
                    }
                    $cartdata = Cart::where('librarianid', '=', $librarian->id)
                        ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                        ->get();
                    $magazinecartcount = count($cartdata);
                    Session::put('magazinecartcount', $magazinecartcount);

                    $bud_arr = [];

                    $magazinebudget->CategorieAmount1 = json_decode($magazinebudget->CategorieAmount);

                    foreach ($magazinebudget->CategorieAmount1 as $val) {
                        $cartdata2 = Cart::where('librarianid', '=', $librarian->id)
                            ->where('category', '=', $val->name)
                            ->where('budgetid', '=', $magazinebudget->id)
                            ->where('status', '=', '1')
                            ->sum('totalAmount');
                        $percentage = $val->amount !== 0 ? round(($cartdata2 / max(1, $val->amount)) * 100) : 0;


                        $obj = (object)[
                            "category" => $val->name,
                            "budget_price" => $val->amount,
                            "cart_price" => $cartdata1,
                            "percentage" => $percentage
                        ];
                        array_push($bud_arr, $obj);
                    }
                    if (Session::has('bud_arr')) {
                        Session::forget('bud_arr');
                    }

                    Session::put('bud_arr', $bud_arr);


                    $data = [
                        'success' => 'Product add successfully',
                        'magazinecartcount' => $magazinecartcount,
                    ];
                    return response()->json($data);
                } else {

                    // $Cartdata->quantity += 1;
                    // $Cartdata->totalAmount = $Cartdata->amount * $Cartdata->quantity;
                    // $Cartdata->save();
                    // if(Session::has('magazinecartcount')) {
                    //     Session::forget('magazinecartcount');
                    // }
                    // $cartdata = Cart::where('librarianid', '=', $librarian->id)
                    //  ->where('budgetid', '=', $magazinebudget->id)
                    // ->get();
                    // $magazinecartcount=count($cartdata);
                    // Session::put('magazinecartcount', $magazinecartcount);
                    $data = [
                        'error' => 'This magazine already added in your cart',
                    ];
                    return response()->json($data);
                }
            } else {
                $data = [
                    'error' =>  'Your balance amount is ' . $balAmt . '. You have selected the magazine more than your balance. Please select magazines whose cost is under ' . $balAmt . '.',
                ];
                return response()->json($data);
            }
        } else {
            $data = [
                'error' => 'No Budget Allacated',
            ];
            return response()->json($data);
        }
    }
    public function delete_to_cart(Request $req)
    {
        $librarian = auth('librarian')->user();
        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();

        $Cartdata = Cart::find($req->id);

        if (Session::has('shopemagazine')) {
            Session::forget('shopemagazine');
        }
        $magazine = Magazine::find($Cartdata->magazineid);
        $shopemagazine = $magazine;
        $shopemagazine->quantity = '1';
        Session::put('shopemagazine', $shopemagazine);
        if (Session::has('magazinecartcount')) {
            Session::forget('magazinecartcount');
        }


        if ($Cartdata->delete()) {
            $cartdata = Cart::where('librarianid', '=', $librarian->id)
                ->where('budgetid', '=', $magazinebudget->id)
                ->get();

            $magazinecartcount = count($cartdata);
            Session::put('magazinecartcount', $magazinecartcount);

            $cartdatacount = Cart::where('librarianid', '=', $librarian->id)
                ->where('budgetid', '=', $magazinebudget->id)
                ->sum('totalAmount');
            $data = [
                'success' => 'Product Removed successfully',
                'magazinecartcount' => $magazinecartcount,
                'cartdatacount' => $cartdatacount,
                'budgetcount'   =>       $magazinebudget->totalAmount,
            ];
            return response()->json($data);
        }
    }

    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::find($request->id);
        $librarian = auth('librarian')->user();
        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();
        $magazinebudgetdata = json_decode($magazinebudget->CategorieAmount);
        $totalcost = 0;
        foreach ($magazinebudgetdata as $val) {
            if ($val->name = $cartItem->category) {
                $totalcost = $val->amount;
            }
        }
        $cartdata2 = $cartItem->amount * $request->quantity;

        if ($totalcost >= $cartdata2) {

            if ($cartItem) {

                $cartItem->quantity = $request->quantity;
                $cartItem->totalAmount = $cartItem->amount * $request->quantity;
                $cartItem->save();
                if (Session::has('shopemagazine')) {
                    Session::forget('shopemagazine');
                }
                $magazine = Magazine::find($cartItem->magazineid);
                $shopemagazine = $magazine;
                $shopemagazine->quantity =  $cartItem->quantity;
                Session::put('shopemagazine', $shopemagazine);
                $cartdatacount = Cart::where('librarianid', '=', $librarian->id)
                    ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                    ->sum('totalAmount');
                return response()->json(['totalAmount' => $cartItem->totalAmount, 'cartdatacount' => $cartdatacount]);
            } else {
                return response()->json(['error' => 'Cart item not found.'], 404);
            }
        } else {
            $data = [
                'error' => 'Purchase Amount Exceeds Budget',
            ];
            return response()->json($data);
        }
    }



    public function update_cart(Request $req)
    {
        $librarian = auth('librarian')->user();
        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();
        if ($magazinebudget != null) {
            $magazinebudgetdata = json_decode($magazinebudget->CategorieAmount);
            $magazinedata = Magazine::find($req->id);
            $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
                ->where('category', '=', $magazinedata->category)
                ->where('budgetid', '=', $magazinebudget->id)
                ->where('status', '=', '1')
                ->sum('totalAmount');
            $totalcost = 0;
            foreach ($magazinebudgetdata as $val) {
                if ($val->name = $magazinedata->category) {
                    $totalcost = $val->amount;
                }
            }
            $cartdata2 = $cartdata1 + $magazinedata->annual_cost_after_discount;

            if ($totalcost >= $cartdata2) {

                $Cartdata = Cart::where('librarianid', '=', $librarian->id)
                    ->where('magazineid', '=', $req->id)
                    ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                    ->first();

                if (is_null($Cartdata)) {
                    $magazine = Magazine::find($req->id);
                    $cart = new Cart();
                    $cart->title = $magazine->title;
                    $cart->image = $magazine->front_img;
                    $cart->librarianid = $librarian->id;
                    $cart->magazineid = $magazine->id;
                    $cart->budgetid = $magazinebudget->id;
                    $cart->amount = $magazine->annual_cost_after_discount;
                    $cart->quantity = $req->quantity;
                    $cart->totalAmount = $req->quantity * $magazine->annual_cost_after_discount;
                    $cart->category = $magazine->category;
                    $cart->save();
                    if (Session::has('shopemagazine')) {
                        Session::forget('shopemagazine');
                    }

                    $shopemagazine = $magazine;
                    $shopemagazine->quantity = $req->quantity;
                    Session::put('shopemagazine', $shopemagazine);
                    if (Session::has('magazinecartcount')) {
                        Session::forget('magazinecartcount');
                    }
                    $cartdata = Cart::where('librarianid', '=', $librarian->id)
                        ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                        ->get();
                    $magazinecartcount = count($cartdata);

                    Session::put('magazinecartcount', $magazinecartcount);

                    $data = [
                        'success' => 'Product add successfully',
                        'magazinecartcount' => $magazinecartcount,
                    ];
                    return response()->json($data);
                } else {

                    $Cartdata->quantity = $req->quantity;
                    $Cartdata->totalAmount = $Cartdata->amount * $req->quantity;
                    $Cartdata->save();
                    $magazine = Magazine::find($req->id);
                    if (Session::has('shopemagazine')) {
                        Session::forget('shopemagazine');
                    }

                    $shopemagazine = $magazine;
                    $shopemagazine->quantity = $req->quantity;
                    Session::put('shopemagazine', $shopemagazine);



                    $data = [
                        'success' => 'Product Updated successfully',
                    ];
                    return response()->json($data);
                }
            } else {
                $data = [
                    'error' => 'Purchase Amount Exceeds Budget',
                ];
                return response()->json($data);
            }
        } else {
            $data = [
                'error' => 'No Budget Allacated',
            ];
            return response()->json($data);
        }
    }

    public function magazineCheckout(Request $req)
    {

        $librarian = auth('librarian')->user();
        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();

             $magazinebudgetdata = json_decode($magazinebudget->CategorieAmount);

            $bud_arr = [];
            $balanceamount = 0;
            $count = 0;
            foreach ($magazinebudgetdata as $val) {
                $cartdata1 = Cart::where('librarianid', '=', $librarian->id)
                    ->where('category', '=', $val->name)
                    ->where('budgetid', '=', $magazinebudget->id)
                    ->where('status', '=', '1')
                    ->sum('totalAmount');
                $categoryamount = $val->amount - $cartdata1;
                $magazinedata = Magazine::where(DB::raw('CAST(annual_cost_after_discount AS UNSIGNED)'), '<=', $categoryamount)
                    ->where(DB::raw('CAST(annual_cost_after_discount AS UNSIGNED)'), '!=', '0')
                    ->where('category', '=', $val->name)
                    ->get();

                $existMagazine = existMagazine::where('librarianid', '=', $librarian->id)
                    ->where('category', '=', $val->name)
                    ->where('budgetid', '=', $magazinebudget->id)->first();
                if ($magazinedata->isNotEmpty()) {

                    $cartdatarecord = Cart::where('librarianid', '=', $librarian->id)
                        ->where('category', '=', $val->name)
                        ->where('budgetid', '=', $magazinebudget->id)
                        ->where('status', '=', '1')
                        ->get();

                    if ($cartdatarecord->isNotEmpty()) {
                        $firstArray = collect($magazinedata);
                        $secondArray = collect($cartdatarecord);

                        $firstNames = $firstArray->pluck('id')->toArray();
                        $secondNames = $secondArray->pluck('magazineid')->toArray();

                        $uniqueNames = collect($firstNames)->filter(function ($name) use ($secondNames) {
                            return !in_array($name, $secondNames);
                        })->toArray();

                        if (count($uniqueNames) > 0) {

                            if ($existMagazine == null) {
                                $balanceamount = 0;
                                $count = 0;
                                $bud_arr = array();
                                $data = [
                                    'status' => '2',
                                    'budgetid' => $magazinebudget->id,
                                    'category' => $val->name,
                                    'amount' => $categoryamount,
                                    'message' => 'நீங்கள் ' . $val->name . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $categoryamount . ' உள்ளது. நீங்கள் இந்த தொகையை திரும்ப ஒப்பளிப்பு செய்கிறீர்களா?',
                                    'error' => $val->name . ' பிரிவில் ₹' . $categoryamount .  ' நிதி எஞ்சியுள்ளது. இந்த நிதி வரம்புக்கு உட்பட்ட பருவ இதழ்கள் - ' . $val->name . ' பிரிவில் உள்ளன. எனவே, நிதி ஒப்பளிப்பு செய்ய இயலாது. மீண்டும் இதழ்களைத் தேர்வு செய்க',
                                ];
                                return response()->json($data);
                            } else {


                                if ($existMagazine->status == 0) {
                                    $balanceamount = 0;
                                    $count = 0;
                                    $bud_arr = array();
                                    $data = [
                                        'status' => '2',
                                        'budgetid' => $magazinebudget->id,
                                        'category' => $val->name,
                                        'amount' => $categoryamount,
                                        'message' => 'நீங்கள் ' . $val->name . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $categoryamount . ' உள்ளது. நீங்கள் இந்த தொகையை திரும்ப ஒப்பளிப்பு செய்கிறீர்களா?',
                                        'error' => $val->name . ' பிரிவில் ₹' . $categoryamount .  ' நிதி எஞ்சியுள்ளது. இந்த நிதி வரம்புக்கு உட்பட்ட பருவ இதழ்கள் - ' . $val->name . ' பிரிவில் உள்ளன. எனவே, நிதி ஒப்பளிப்பு செய்ய இயலாது. மீண்டும் இதழ்களைத் தேர்வு செய்க',
                                    ];
                                    return response()->json($data);
                                } else {

                                    $balanceamount =  $balanceamount +  $categoryamount;
                                    $count =  $count + 1;
                                    $obj = (object)[
                                        "category" => $val->name,
                                        "budget_price" => $val->amount,
                                        "balance_price" =>  $categoryamount,

                                    ];
                                    array_push($bud_arr, $obj);
                                }
                            }
                        } else {
                            $balanceamount =  $balanceamount +  $categoryamount;
                            $count =  $count + 1;
                            $obj = (object)[
                                "category" => $val->name,
                                "budget_price" => $val->amount,
                                "balance_price" =>  $categoryamount,

                            ];
                            array_push($bud_arr, $obj);
                        }
                    } else {

                        if ($existMagazine == null) {
                            $balanceamount = 0;
                            $count = 0;
                            $bud_arr = array();
                            $data = [
                                'status' => '2',
                                'budgetid' => $magazinebudget->id,
                                'category' => $val->name,
                                'amount' => $categoryamount,
                                'message' => 'நீங்கள் ' . $val->name . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $categoryamount . ' உள்ளது. நீங்கள் இந்த தொகையை திரும்ப ஒப்பளிப்பு செய்கிறீர்களா?',
                                'error' => $val->name . ' பிரிவில் ₹' . $categoryamount .  ' நிதி எஞ்சியுள்ளது. இந்த நிதி வரம்புக்கு உட்பட்ட பருவ இதழ்கள் - ' . $val->name . ' பிரிவில் உள்ளன. எனவே, நிதி ஒப்பளிப்பு செய்ய இயலாது. மீண்டும் இதழ்களைத் தேர்வு செய்க',
                            ];
                            return response()->json($data);
                        } else {


                            if ($existMagazine->status == 0) {
                                $balanceamount = 0;
                                $count = 0;
                                $bud_arr = array();
                                $data = [
                                    'status' => '2',
                                    'budgetid' => $magazinebudget->id,
                                    'category' => $val->name,
                                    'amount' => $categoryamount,
                                    'message' => 'நீங்கள் ' . $val->name . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $categoryamount . ' உள்ளது. நீங்கள் இந்த தொகையை திரும்ப ஒப்பளிப்பு செய்கிறீர்களா?',
                                    'error' => $val->name . ' பிரிவில் ₹' . $categoryamount .  ' நிதி எஞ்சியுள்ளது. இந்த நிதி வரம்புக்கு உட்பட்ட பருவ இதழ்கள் - ' . $val->name . ' பிரிவில் உள்ளன. எனவே, நிதி ஒப்பளிப்பு செய்ய இயலாது. மீண்டும் இதழ்களைத் தேர்வு செய்க',
                                ];
                                return response()->json($data);
                            } else {

                                $balanceamount =  $balanceamount +  $categoryamount;
                                $count =  $count + 1;
                                $obj = (object)[
                                    "category" => $val->name,
                                    "budget_price" => $val->amount,
                                    "balance_price" =>  $categoryamount,

                                ];
                                array_push($bud_arr, $obj);
                            }
                        }
                    }
                } else {
                    $balanceamount =  $balanceamount +  $categoryamount;
                    $count =  $count + 1;
                    $obj = (object)[
                        "category" => $val->name,
                        "budget_price" => $val->amount,
                        "balance_price" =>  $categoryamount,

                    ];
                    array_push($bud_arr, $obj);
                }
            }



            if ($count == count($magazinebudgetdata)) {
                $cartdatas = Cart::where('librarianid', '=', $librarian->id)
                    ->where('budgetid', '=', $magazinebudget->id)
                    ->where('status', '=', '1')->get();
                $finalquantity = (count($cartdatas));
                $magazineorder = [];
                foreach ($cartdatas as $val) {
                    $magazinesrec = Magazine::find($val->magazineid);
                    $obj = (object)[
                        "category" => $magazinesrec->category,
                        "title" => $magazinesrec->title,
                        "magazine_price" => $magazinesrec->annual_cost_after_discount,
                        "quantity" =>  $val->quantity,
                        "magazineid" =>  $val->magazineid,

                    ];
                    // $val->status='0';
                    // $val->save();
                    array_push($magazineorder, $obj);
                }

                if ($req->specialcat != 0) {




                    $Ordermagazine = new Ordermagazine();
                    $Ordermagazine->librarianid = $librarian->id;
                    $Ordermagazine->budgetid = $magazinebudget->id;
                    $Ordermagazine->balanceAmount = json_encode($bud_arr);
                    $Ordermagazine->magazineProduct = json_encode($magazineorder);
                    $Ordermagazine->libraryType = $librarian->libraryType;
                    $Ordermagazine->totalBudget = $magazinebudget->totalAmount;
                    $Ordermagazine->totalPurchased = $magazinebudget->totalAmount - $balanceamount;
                    $Ordermagazine->totalBal = $balanceamount;
                    $Ordermagazine->libraryid = $librarian->librarianId;
                    $Ordermagazine->quantity = $finalquantity;
                    $randomCode = str_pad(random_int(0, 99999999), 12, '0', STR_PAD_LEFT);
                    $Ordermagazine->orderid = $randomCode;
                    $librariandata = [];
                    $validator = Validator::make($req->all(), [

                        'street' => 'required',
                        'place' => 'required',
                        'Village' => 'required',
                        'taluk' => 'required',
                        'post' => 'required',
                        'pincode' => 'required',
                        'landmark' => 'required',

                        'district' => 'required|string',
                        'readersForum' => 'required',


                    ]);
                    if ($validator->fails()) {
                        $data = [
                            'error' => $validator->errors()->first(),
                        ];
                        return response()->json($data);
                    }

                    if ($req->readersForum == 'undefined') {
                        $data = [
                            'error' => 'ReadersForum filed is required',
                        ];
                        return response()->json($data);
                    }
                    $librarian = Librarian::find(auth('librarian')->user()->id);
                    $librarian->door_no = $req->door_no;
                    $librarian->street = $req->street;
                    $librarian->place = $req->place;
                    $librarian->Village = $req->Village;
                    $librarian->taluk = $req->taluk;
                    $librarian->landmark = $req->landmark;
                    $librarian->post = $req->post;
                    $librarian->pincode = $req->pincode;
                    $librarian->district = $req->district;
                    if ($librarian->save()) {

                        $image = $req->file('readersForum');
                        $imagename = time() . '.' . $image->getClientOriginalExtension();
                        $image->move('reviewer/readersForum', $imagename);

                        $Ordermagazine->readersForum = $imagename;
                        if ($Ordermagazine->save()) {
                            foreach ($cartdatas as $val) {
                                $magazinesrec = Magazine::find($val->magazineid);
                                $val->status = '0';
                                $val->save();
                            }

                            if ($magazinebudget->purchaseid == null) {
                                $librariandata = [];
                                array_push($librariandata, $librarian->id);
                                $magazinebudget->purchaseid = $librariandata;
                                $magazinebudget->save();
                            }
                            array_push($librariandata, $librarian->id);
                            $array = json_decode($magazinebudget->purchaseid, true);
                            $merged = array_merge($librariandata, $array);

                            $magazinebudget->purchaseid = $merged;
                            $magazinebudget->save();
                            if (Session::has('magazinecartcount')) {
                                Session::forget('magazinecartcount');
                            }
                            $cartdata = Cart::where('librarianid', '=', $librarian->id)
                                ->where('budgetid', '=', $magazinebudget->id)
                                ->where('status', '=', '1')
                                ->get();
                            $magazinecartcount = count($cartdata);

                            Session::put('magazinecartcount', $magazinecartcount);
                            $data = [
                                'success' => 'Magazine Purchased Successfully.'
                            ];
                            return response()->json($data);
                        }
                    }
                } else {
                    $data = [
                        'spccat' => '1',
                    ];
                    return response()->json($data);
                }
            }
        } else {
            $data = [
                'error' => 'No Budget Allacated',
            ];
            return response()->json($data);
        }
    }
    public function cartpdfview()
    {

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
            $cartdata = [];
            $maga = json_decode($magazinebudget->CategorieAmount);
            $cartdata22 = Cart::where('librarianid', '=', $librarian->id)
                ->where('budgetid', '=', $magazinebudget->id)->where('status', '=', '1')
                ->get();
            foreach ($maga as $val) {
                foreach ($cartdata22 as $val1) {
                    if ($val->name == $val1->category) {
                        array_push($cartdata, $val1);
                    }
                }
            }



            $pdfContent = View::make('cartpdfview', ['cartdata' => $cartdata])->render();
            $filename = 'downloaded_view.html';

            return response($pdfContent)
                ->header('Content-Type', 'text/html')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        } else {
            return response()->json([
                'error' => 'No Budget Allacated.',
            ]);
        }
    }



    public function report_downl_cart(Request $request)
    {
        $librarian = Auth::guard('librarian')->user();
        $magazinebudget = Budget::where('type', 'magazinebudget')
            ->where(function ($query) use ($librarian) {
                $query->whereNotIn('purchaseid', [$librarian->id])
                    ->whereJsonDoesntContain('purchaseid', $librarian->id);
            })
            ->where('libraryType', $librarian->libraryType)
            ->orderBy('created_at', 'ASC')
            ->first();

        if (!$magazinebudget) {
            return response()->json([
                'error' => 'No Budget Allocated.',
            ]);
        }

        $cartdata = [];
        $totalAmount = 0;
        $maga = json_decode($magazinebudget->CategorieAmount);
        $cartdata22 = Cart::where('librarianid', $librarian->id)
            ->where('budgetid', $magazinebudget->id)
            ->where('status', '1')
            ->get();

        foreach ($maga as $val) {
            foreach ($cartdata22 as $val1) {
                if ($val->name == $val1->category) {
                    $cartdata[] = [
                        'Magazine Title' => $val1->title,
                        'Category' => $val1->category,
                        'Quantity' => $val1->quantity,
                        'Amount' => $val1->totalAmount,
                    ];
                    $totalAmount += $val1->totalAmount;
                }
            }
        }

        // Add row for total amount
        $cartdata[] = [
            'Magazine Title' => 'Total Amount:',
            'Category' => '',
            'Quantity' => '',
            'Amount' => $totalAmount,
        ];

        if (empty($cartdata)) {
            return response()->json([
                'error' => 'No data available for Excel download.',
            ]);
        }

        $csvContent = "\xEF\xBB\xBF";
        $csvContent .= "Magazine Title,Category,Quantity,Amount\n";
        foreach ($cartdata as $data) {
            $csvContent .= '"' . implode('","', $data) . "\"\n";
        }

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="magazine_report.csv"',
        ];

        return response()->make($csvContent, 200, $headers);
    }


    public function budgetcategurystatus(Request $req)
    {
        $librarian = Auth::guard('librarian')->user();
        $existMagazin = existMagazine::where('budgetid', '=', $req->budget)->where('librarianid', '=', $librarian->id)
            ->where('category', '=', $req->category)->first();
        if ($existMagazin == null) {
            $existMagazine = new existMagazine();
            $existMagazine->librarianid = $librarian->id;
            $existMagazine->budgetid = $req->budget;
            $existMagazine->category = $req->category;
            $existMagazine->status = $req->status;
            $existMagazine->save();


            if ($existMagazine->status == '1') {
                $data = [

                    'success' => 'நீங்கள் ' . $req->category . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $req->amount2 . 'திரும்ப ஒப்பளிப்பு செய்யப்பட்டது',
                ];
                return response()->json($data);
            } else {
                return response()->json([
                    'error' => $req->messageValue,
                ]);
            }
        } else {
            $existMagazin->librarianid = $librarian->id;
            $existMagazin->budgetid = $req->budget;
            $existMagazin->category = $req->category;
            $existMagazin->status = $req->status;
            $existMagazin->save();

            if ($existMagazin->status == '1') {
                $data = [

                    'success' => 'நீங்கள் ' . $req->category . ' பிரிவில் தேர்வு செய்தது போக மீதம் தொகை ரூபாய் ' . $req->amount2 . 'திரும்ப ஒப்பளிப்பு செய்யப்பட்டது',
                ];
                return response()->json($data);
            } else {
                return response()->json([
                    'error' => $req->messageValue,
                ]);
            }
        }
    }
}
