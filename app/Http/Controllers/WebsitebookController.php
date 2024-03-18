<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Budget;
use App\Models\Specialcategories;
use Illuminate\Support\Facades\Session;
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
                 <a href="/shope/' . $val->id . '"><img src="' . asset("Books/full/".$val->full_img) . '" class="w-100" alt=""></a>
                 <a class="tpproduct__thumb-img" href="/shope/' . $val->id . '""><img src="' . asset("Books/full/".$val->full_img) . '" alt=""></a>
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

//   return $book;
// return view('shope', compact('data'));
Session::put('book', $book);
    return redirect('singlebookview');   
    // return redirect('shope');    
}


public function addToCart(Request $request,$id)
    {
        if(Session::get('msg') || Session::get('qty')){
            Session::forget('msg');
            Session::forget('qty');
            
        }
        $msg = $this->store($request,$id);
        $qty = count(Session::get('cart'));
        Session::put('msg',$msg);
        Session::put('qty',$qty);
        return redirect()->back()->with('success',$msg);
          
    }

    public function store($request,$id)
    {

        $msg = '';
        $qty_check  = 0;
        $input = $request->all();
        $qty = isset($input['quantity']) ? $input['quantity'] : 1 ;
        $qty = is_numeric($qty) ? $qty : 1;
        $cart = Session::get('cart');
        $item = Book::where('id',$id)->first();
        $single = isset($request->type) ? ($request->type == '1' ? 1 : 0 ) : 0;
        if(Session::has('cart')){
                $check = array_key_exists($id,Session::get('cart'));

                if($check){
                    return __('Product all-ready added');
                }else{
                    if(array_key_exists($id.'-',Session::get('cart'))){
                        return __('Product all-ready added');
                    }
                }
        }

        $option_id = [];
        if($single == 1){
         
            if($request->quantity != 'NaN'){
                $qty = $request->quantity;
                $qty_check = 1;
            }else{
                $qty = 1;
            }

        }else{ 
        $cart = Session::get('cart');
        // if cart is empty then this the first product
        if (!$cart || !isset($cart[$item->id.'-'])) {
                 $cart [$item->id.'-'] = [
                    "name" =>$item->book_title,
                    "code" =>$item->product_code,
                    "image"=>$item->front_img,
                    "subject"=>$item->category,
                    "qty" => $qty,
                    "price"=>$item->final_price,
                    "finalprice" => $qty* $item->final_price,
                    "id" => $item->id
                   ];

            Session::put('cart', $cart);
            return __('Product add successfully');
        }


        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$item->id.'-'])) {

            $cart = Session::get('cart');

            if($qty_check == 1){
                $cart[$item->id.'-']['qty'] =  $qty;
            }else{
                $cart[$item->id.'-']['qty'] +=  $qty;
            }


            Session::put('cart', $cart);
            
            if($qty_check == 1){
                $mgs = __('Product add successfully');
            }else{
                $mgs = __('Product add successfully');
            }

            $qty_check = 0;
            return $mgs;
        }

            return __('Product add successfully');


    }
}

public function updatecart(Request $request){
    $id = $request->id;
    $check = $this->checkamount($request,$id);
    if($check == "true"){
        $msg = $this->updatestore($request,$id);
        $data =$this->budgetcal();
        $bud_arr = Session::get('bud_arr');
        $total = Session::get('total');
        return response()->json(['success' => "true",'msg'=>$msg, 'bud_arr' => $bud_arr,'total'=>$total]);
    }else if($check == "false"){
        $msg1 = "You purchase limit for this category is more than a budget ..." ;
        $msg = $this->updatestore($request,$id);
        $data =$this->budgetcal();
        $bud_arr = Session::get('bud_arr');
        $total = Session::get('total');
        return response()->json(['success' => "false",'msg'=>$msg1, 'bud_arr' => $bud_arr,'total'=>$total]);
    }else{
        return $check;
    }
 
}

public function checkamount($request,$id){
    $input = $request->all();
    $qty = isset($input['quantity']) ? $input['quantity'] : 1 ;
    $qty = is_numeric($qty) ? $qty : 1;
    $cart = Session::get('cart');
    $budget = Session::get('bud_arr');
    $item = Book::where('id',$id)->first();
    if($qty != 0){
        if (isset($cart[$item->id.'-'])) {
           $cart_qty =  $cart[$item->id.'-']['qty'];
        
           if($cart_qty > $qty){
       
              $added_qty =$cart_qty - $qty;
              $price=  $cart[$item->id.'-']['price'] * $added_qty;
              $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
              $final_cart_price = $cart_price - $price;
           }else if($cart_qty < $qty){
              $added_qty = $qty - $cart_qty;
              $price=  $cart[$item->id.'-']['price'] * $added_qty;
              $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
              $final_cart_price = $cart_price + $price;
            }else{
                $cart_price = collect($budget)->firstWhere('category', $item->category)->cart_price ?? 0;
                $final_cart_price = $cart_price; 
            }
          
            $budget_price =  collect($budget)->firstWhere('category', $item->category)->budget_price ?? 0;
            if($budget_price >= $final_cart_price){
             return "true";
            }else{
             return "false";
            }
           
         
    }
}
}

public function updatestore($request,$id){
    $msg = '';
    $qty_check  = 0;
    $input = $request->all();
    $qty = isset($input['quantity']) ? $input['quantity'] : 1 ;
    $qty = is_numeric($qty) ? $qty : 1;
    $cart = Session::get('cart');
    $item = Book::where('id',$id)->first();
    $single = isset($request->type) ? ($request->type == '1' ? 1 : 0 ) : 0;
    // if cart not empty then check if this product exist then increment quantity
    if (isset($cart[$item->id.'-'])) {

        $cart = Session::get('cart');
        $cart[$item->id.'-']['qty'] =  $qty;
        $cart[$item->id.'-']['finalprice'] =  $cart[$item->id.'-']['price'] * $qty;
        Session::put('cart', $cart);
        $mgs = __('Product add successfully');
        return $mgs;
}
}

public function bookcart(){
    $bud_arr = [];
    $cart = Session::get('cart');
    $data =$this->budgetcal();
    if($data){
        return view('cart', compact('cart'));
    }
}
public function budgetcal(){
    $bud_arr = [];
    $cart = Session::get('cart');
    $librarian = auth('librarian')->user();
    $lib_type = $librarian->libraryType;
    $category = Specialcategories::all();
    $budget = Budget::where('libraryType', $lib_type)->orderBy('created_at', 'DESC')->first();
    $cat_budget = json_decode($budget['CategorieAmount']);
    $total_purchase = 0;
    if(count($cart)>0){
        $cartrec = array_reduce($cart, function ($carry, $item) {
            $subject = $item['subject'];
            if (!isset($carry[$subject])) {
                $carry[$subject] = ['price' => 0]; // Initialize price to 0 if subject doesn't exist in the result array
            }
            $carry[$subject]['name'] = $item['subject']; 
            $carry[$subject]['price'] += $item['finalprice']; // Add the final price to the total price for this subject
            return $carry;
        }, []);
    
        foreach($category as $key => $val){
            $name = $val->name;
            $budget_price = collect($cat_budget)->firstWhere('name', $name)->amount ?? 0;
            $cart_price = $cartrec[$name]['price'] ?? 0;
            if($cart_price != null){
              $percentage = $budget_price ? round(($cart_price / $budget_price) * 100, 2) : 0;
            }else{
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
    }else{
        foreach($category as $key => $val){
            $name = $val->name;
            $budget_price = collect($cat_budget)->firstWhere('name', $name)->amount ?? 0;
            $obj = (object)[
                "category" => $name,
                "budget_price" => $budget_price,
                "cart_price" =>0,
                "percentage" => 0
            ];
            array_push($bud_arr, $obj);
        }
    }
 
    if(Session::has('bud_arr')){
        Session::forget('bud_arr');
    }
    Session::put('bud_arr',$bud_arr);
    if(Session::has('total')){
        Session::forget('total');
    }
    Session::put('total',$total_purchase);
    return "true";
}
public function destroy(Request $request)
{
  $id = $request->id;
    $cart = Session::get('cart');
    unset($cart[$id.'-']);
    if(count($cart) > 0){
        Session::put('cart',$cart);
    }else{
        Session::put('cart',$cart);
    }
    // Session::flash('success',__('Cart item remove successfully.'));
    return back()->with('success','Cart item remove successfully.');
    // return back();
}

public function checkout(){ 
    // "category" => $name,
    // "budget_price" => $budget_price,
    // "cart_price" =>0,
    // "percentage" => 0
    $total = Session::get('total');
    $bud_arr = Session::get('bud_arr');
    $total_price =0;
    foreach($bud_arr as $key=>$val){
        $total_price = $total_price + $val->budget_price;
        if($val->budget_price != $val->cart_price){
            if($val->budget_price < $val->cart_price){
                return back()->with('error',"You Purchased more than a budget amount in ".$val->category);
            }else{
                $bal = $val->budget_price - $val->cart_price;
                $book = Book::where('category',$val->category)->where('negotiation_status',2)->where('book_active_status',1)->where('final_price','<=',$bal)->get();
                if(count($book)>0){
                    return back()->with('error',"You Still have amount for this category".$val->category);
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

}