<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Librarian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use App\Models\Ordermagazine;
use DB;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Magazine;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use App\Models\Mailurl;
 use App\Models\Budget;
 use App\Models\Dispatch;
 use App\Models\MagazineCategory;
 use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
 
 use Illuminate\Support\Facades\Auth;
 use App\Models\Subscription;

 

 use Illuminate\Support\Facades\Notification;
use App\Notifications\Member1detailNotification;
class MagazineController extends Controller
{

public function importFile(Request $request){
    $admin = Auth::guard('admin')->user();

    if ($request->hasFile('file_magazine')) {
        $file = $request->file('file_magazine');
        $fileContents = file($file->getPathname());
        unset($fileContents[0]);
    
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
    
            if (isset($data[11])) {
             
                $magazine = new Magazine();
                $magazine->language = $data[0];
                $magazine->category = $data[1];
                $magazine->title = $data[2];
                $magazine->periodicity = $data[3];
                $magazine->single_issue_rate = $data[4];
                $magazine->annual_subscription = $data[5];
                $magazine->discount = $data[6];
                $magazine->single_issue_after_discount = $data[7];
                $magazine->annual_cost_after_discount = $data[8];
                $magazine->rni_details = $data[9];
                $magazine->total_pages = $data[10];
                $magazine->total_multicolour_pages = $data[11];
                $magazine->total_monocolour_pages = $data[12] ?? null; 
                $magazine->paper_quality = $data[13] ?? null; 
                $magazine->magazine_size = $data[14] ?? null; 
                $magazine->contact_person = $data[15] ?? null; 
                $magazine->phone = $data[16] ?? null; 
                $magazine->email = $data[17] ?? null; 
                $magazine->address = $data[18] ?? null; 
                $magazine->user_type = "admin";
                $magazine->user_id = $admin->id;
                $magazine->save();
            }
        }
    
        return redirect()->back()->with('successlib', 'File imported successfully');
    } else {
        return redirect()->back()->with('errorlib', 'No file uploaded');
    }
    

    
}

public function list(){
    try{
      $magazines = Magazine::where('status', '=', '1')->get();
 
      return view('admin.magazine_list',compact('magazines'));
    }catch(\Throwable $e){
        return redirect()->back()->with('errorlist', 'An error occurred while listing magazine details.');
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
    return redirect('admin/magazine-order-view');    

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
    return redirect('admin/magazine-invoice-view');    

  }
  public function magazine_view($id){
    $magazine = Magazine::find($id);

 
    \Session::put('magazine', $magazine);
    return redirect('admin/magazineview');    

  }
  public function magazine_order_list(Request $request){
    if($request->librarytype !=null &&  $request->district ==null  ){
       
      $orders = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();


     }else if( $request->district  !=null && $request->librarytype ==null){

        
        $orders1 = Ordermagazine::where('status', '=', '1')->get();
        $orders=[];
  
        foreach ($orders1 as $val) {

            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
           if( $Librarian !=null){
            array_push($Librarian,$orders);
           }
            
        }

     }
    else if($request->librarytype !=null && $request->district !=null ){

       
        $orders1 = Ordermagazine::where('status', '=', '1')->get();
        $orders=[];
  
        foreach ($orders1 as $val) {

            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
           if( $Librarian->isNotEmpty()){
            array_push($orders,$val);
           }
            
        }

     }else{
      
        $orders = Ordermagazine::where('status', '=', '1')->get();

     }
      
    
    $magazineCounts = [];
    
    foreach ($orders as $order) {
        $magazineProducts = json_decode($order->magazineProduct, true);
    
        foreach ($magazineProducts as $magazineProduct) {
            $magazineId = $magazineProduct['magazineid'];
    
            if (!isset($magazineCounts[$magazineId])) {
                $magazineCounts[$magazineId] = [
                    'id' => $magazineId,
                    'count' => 0
                ];
            }
    
            $magazineCounts[$magazineId]['count']++;
        }
    }
    
    $magazineCounts = array_values($magazineCounts);
  
    $magazinedata = [];
    foreach ($magazineCounts as $val) {
         if($request->category !=null &&  $request->language ==null ){
            $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->first();

         }
       else if($request->category ==null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('language', '=', $request->language)->first();

       }
      else if($request->category !=null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->where('language', '=', $request->language)->first();

       }else{
        $magazine = Magazine::find($val['id']);

       }
        if ($magazine) {
            $magazine->count = $val['count'];
            $magazinedata[] = $magazine;
        }
    }
    $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();
    $totalAmount=0;
    $datas=[];
      foreach($magazinebudget  as $val1){
     foreach($magazinedata  as $val){
      if($val1->name == $val->category){
        $val->librarytype = $request->librarytype ?? "";
        $val->district = $request->district ?? "";
        $totalAmount =$totalAmount + $val->count * $val->annual_cost_after_discount ;

          array_push($datas,$val);
      }
     
  
     }
    }
    return view('admin/magazine_order_list', compact('datas','totalAmount'));


  }   
  public function magazineedit($id){
    $magazine = Magazine::find($id);
    \Session::put('magazine', $magazine);
    return redirect('admin/magazineupdate'); 
  }
  public function getcategory(Request $request){
    $lang = $request->lang;
    if($lang == "Tamil"){
        $subjects = MagazineCategory::where('language',$lang)->get();
    }else{
        $subjects = MagazineCategory::where('language',$lang)->get();
    }
    return response()->json(['categories' => $subjects]);
  }
  
  public function magazineupdate(Request $request , $id){
  
    $validator = Validator::make($request->all(), [
      'language' => 'required',
      'category' => 'required',
      'title' => 'required',
      'periodicity' => 'required',
      'single_issue_rate' => 'required',
      'annual_subscription' => 'required',
      'discount' => 'required',
      'single_issue_after_discount' => 'required',
      'annual_cost_after_discount' => 'required',
      'rni_details' => 'required',
      'paper_quality' => 'required',
      'total_pages' => 'required',
      'total_multicolour_pages' => 'required',
      'total_monocolour_pages' => 'required',
      'magazine_size' => 'required',
      'contact_person' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'address' => 'required',
      'front_img' => 'required|image',
      'back_img' => 'required|image',
      'full_img' => 'required|image',
      'sample_pdf' => 'required|mimes:pdf'
  ], [
      'language.required' => 'The language field is required.',
      'category.required' => 'The category field is required.',
      'title.required' => 'The title field is required.',
      'periodicity.required' => 'The periodicity field is required.',
      'single_issue_rate.required' => 'The single issue rate field is required.',
      'annual_subscription.required' => 'The annual subscription field is required.',
      'discount.required' => 'The discount field is required.',
      'single_issue_after_discount.required' => 'The single issue after discount field is required.',
      'annual_cost_after_discount.required' => 'The annual cost after discount field is required.',
      'rni_details.required' => 'The RNI details field is required.',
      'paper_quality.required' => 'The paper quality field is required.',
      'total_pages.required' => 'The total pages field is required.',
      'total_multicolour_pages.required' => 'The total multicolour pages field is required.',
      'total_monocolour_pages.required' => 'The total monocolour pages field is required.',
      'magazine_size.required' => 'The magazine size field is required.',
      'contact_person.required' => 'The contact person field is required.',
      'email.required' => 'The email field is required.',
      'email.email' => 'The email must be a valid email address.',
      'phone.required' => 'The phone field is required.',
      'address.required' => 'The address field is required.',
      'front_img.required' => 'The front image field is required.',
      'front_img.image' => 'The front image must be an image file.',
      'back_img.required' => 'The back image field is required.',
      'back_img.image' => 'The back image must be an image file.',
      'full_img.required' => 'The full image field is required.',
      'full_img.image' => 'The full image must be an image file.',
      'sample_pdf.required' => 'The sample PDF field is required.',
      'sample_pdf.mimes' => 'The sample PDF must be a PDF file.'
  ]);
  if ($validator->fails()) {
    $errors = $validator->errors();
    if(Session::has('validation_error')){
        Session::forget('validation_error');
    }
    if(Session::has('error')){
        Session::forget('error');
    }
    Session::put('validation_error',$errors);
  dd('error');
  }
  $admin = auth('admin')->user();
  
     $magazine = Magazine::find($id);
  
  
     //Front Img
  if(isset($request->front_img)){
    $oldFilePath = $magazine->front_img;
    if ($oldFilePath) {
        File::delete(public_path('Magazine/front/' . $oldFilePath));
    }
    if ($request->hasFile('front_img')) {
        $front = $request->file('front_img');
        $front_name = $request->title . time() . '_' . $front->getClientOriginalName();
        $front->move(('Magazine/front'), $front_name);
        $magazine->front_img = $front_name;
    }
  }
  
  // Back Image
  if(isset($request->back_img)){
    $oldFilePath = $magazine->back_img;
    if ($oldFilePath) {
        File::delete(public_path('Magazine/back/' . $oldFilePath));
    }
    if ($request->hasFile('back_img')) {
        $back = $request->file('back_img');
        $back_name = $request->title . time() . '_' . $back->getClientOriginalName();
        $back->move(('Magazine/back'), $back_name);
        $magazine->back_img = $back_name;
    }
  }
  
  //Other Image
     if(isset($request->full_img)){
        $oldFilePath = $magazine->full_img;
        if ($oldFilePath) {
            File::delete(public_path('Magazine/full/' . $oldFilePath));
        }
        if ($request->hasFile('full_img')) {
            $full = $request->file('full_img');
            $full_name = $request->title . time() . '_' . $full->getClientOriginalName();
            $full->move(public_path('Magazine/full'), $full_name);
            $magazine->full_img = $full_name;
        }
     } 
  
     //pdf 
     if(isset($request->sample_pdf)){
      $oldFilePath = $magazine->sample_pdf;
      if ($oldFilePath) {
          File::delete(public_path('Magazine/pdf/' . $oldFilePath));
      }
      if ($request->hasFile('sample_pdf')) {
          $full = $request->file('sample_pdf');
          $full_name = $request->title . time() . '_' . $full->getClientOriginalName();
          $full->move(public_path('Magazine/pdf'), $full_name);
          $magazine->sample_pdf = $full_name;
      }
   }  
     $magazine->language =$request->language;
     $magazine->category =  $request->category;
     $magazine->title =  $request->title;
     $magazine->periodicity =  $request->periodicity;
     $magazine->single_issue_rate = $request->single_issue_rate;
     $magazine->annual_subscription = $request->annual_subscription;
     $magazine->discount = $request->discount;
     $magazine->single_issue_after_discount =  $request->single_issue_after_discount;
     $magazine->annual_cost_after_discount =  $request->annual_cost_after_discount;
     $magazine->rni_details = $request->rni_details;
     $magazine->total_pages = $request->total_page;
     $magazine->total_multicolour_pages = $request->total_multicolour_pages;
     $magazine->total_monocolour_pages =  $request->total_monocolour_pages; 
     $magazine->paper_quality = $request->paper_quality; 
     $magazine->magazine_size = $request->magazine_size; 
     $magazine->contact_person = $request->contact_person; 
     $magazine->phone =  $request->phone; 
     $magazine->email =$request->email; 
     $magazine->address = $request->address; 
     $magazine->user_type = "admin";
     $magazine->user_id = $admin->id;
     $magazine->save();
     return back()->with('success',"Magazine updated successfully");
  } 
  public function order_delete(Request $request){
    
 
    $magazine = Ordermagazine::find($request->id);
    $magazine->status='2';
    $magazine->save();

    $Budget = Budget::find($magazine->budgetid);
     $data=[];
      array_push($data,$magazine->librarianid);
     $data2 =$Budget->purchaseid;
     $data1Array = json_decode($data2, true);
     $data1Array1 = array_diff($data1Array, $data);
     $Budget->purchaseid=$data1Array1;

     if($Budget->save()){
      $records = DB::table('carts')
      ->where('budgetid', '=', $magazine->budgetid)
      ->where('librarianid', '=', $magazine->librarianid)
      ->get();
  
  foreach ($records as $val) {
      DB::table('carts')->where('id', '=', $val->id)->delete();
  }

  $records1 = DB::table('exist_magazines')
      ->where('budgetid', '=', $magazine->budgetid)
      ->where('librarianid', '=', $magazine->librarianid)
      ->get();
      foreach ($records1 as $val) {
        DB::table('exist_magazines')->where('id', '=', $val->id)->delete();
    }
     $data= [
      'success' => 'Order Deleted Successfully',
           ];
  return response()->json($data);  
     }

   

  }

  public function order_complete_status(Request $request){
 
   if(count($request->orderId) == 1){


   
      $magazine = Ordermagazine::find($request->orderId[0]);
      $magazineProduct =json_decode($magazine->magazineProduct);
        foreach($magazineProduct as $val1){
          $ldate = date('Y-m-d');
          $Subscription = Subscription::where('magazine_id' ,'=',$val1->magazineid)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
          if($Subscription != null){
            $Dispatch=Dispatch::where('magazine_id' ,'=',$val1->magazineid)->where('subscription_id','=',$Subscription->id)->get();
       
            foreach($Dispatch as $val2){
              $orderdata = [];
              array_push($orderdata, $magazine->id);
             $array = json_decode($val2->order_id, true);
             $merged = array_merge($orderdata, $array);


             $librarydata = [];
             array_push($librarydata, $magazine->librarianid);
            $array1 = json_decode($val2->library_id, true);
            $merged1 = array_merge($librarydata, $array1);


             $Dispatchdata=Dispatch::find($val2->id);
             $Dispatchdata->library_id = $merged1;
             $Dispatchdata->order_id = $merged;
             $Dispatchdata->save();
             }
          }else{
            $data= [
              'success' => 'Please Create Subscription Successfully',
                   ];
          return response()->json($data);
          }
   
          }
          $magazine->status="0";
           $magazine->save();
         
         $data= [
          'success' => 'Order status change Successfully',
               ];
      return response()->json($data);
   }
   else{
    $data= [
      'error' => 'Onely One Order Update',
           ];
  return response()->json($data);

   }
  }

  }

  