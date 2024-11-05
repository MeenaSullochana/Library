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
use App\Models\periodicalcopies;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\PeriodicalReviewStatus;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Subscription;
 use App\Models\Notifications;

 use App\Models\Reviewer;
 use App\Models\Procurementpaymrnt;

 
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
      $magazines = Magazine::where('user_type','=','admin')->where('status','=','1')->get();

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
      'address.required' => 'The address field is required.'
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
    dd($errors);
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
     \Session::put('magazine', $magazine);
     return redirect('admin/magazineupdate')->with('success',"Magazine updated successfully");; 
    
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

  public function procurement_sampleperiodicalpending(){
    $data1=periodicalcopies::where('status','=','1')->get(); 
    $data=[];
    foreach($data1 as $key=>$val){
     $bookcopies=periodicalcopies::where('periodicalid','=',$val->periodicalid)->first();
          $copies=  json_decode($bookcopies->copies);
          $data2=Magazine::find($val->periodicalid);
         $data2->copies=$copies;
     
          array_push($data,$data2);
        }
    
    return view('admin.procurement_sampleperiodicalpending')->with('data',$data); 
}


public function procurement_sampleperiodicalcomplete(){
  $data1=periodicalcopies::where('status','=','0')->get(); 
  $data=[];
  foreach($data1 as $key=>$val){
   $bookcopies=periodicalcopies::where('periodicalid','=',$val->periodicalid)->first();
        $copies=  json_decode($bookcopies->copies);
        $data2=Magazine::find($val->periodicalid);
       $data2->copies=$copies;
   
        array_push($data,$data2);
      }

  
  return view('admin.procurement_sampleperiodicalcomplete')->with('data',$data); 
}



public function meta_periodical_list() {
  $data=  Magazine::where("periodical_procurement_status", '=', "1")

  ->whereNull("periodical_reviewer_id")
  ->get();
  return view('admin.meta_periodical_list')->with('data',$data); 

}

// 


public function assignlibrarianperiodical (Request $req){
 
  $validator = Validator::make($req->all(), [
    
    'periodicalId'=> 'required|array|min:1',
    'metaLibraianId' => 'required|array|size:1',
  
]);

if ($validator->fails()) {
    $data = [
        'error' => $validator->errors()->first(),
    ];
    return response()->json($data);
}


foreach($req->periodicalId as $key=>$val){
  $Magazine = Magazine::find($val);
  $lib = $req->metaLibraianId[0];
  $Magazine->periodical_reviewer_id = $lib;
  $Magazine->save();

}

$notifi= new Notifications();
$notifi->message = "Periodical Assigned For Metacheck";
$notifi->to=$req->metaLibraianId[0];
$notifi->from=auth('admin')->user()->id;
$notifi->type="librarian";
$notifi->save();
  $data= [
    'success' => 'Periodical assigned Successfully',
         ];
return response()->json($data);   
}


// 
public function meta_pending_periodical(){
   $data = Magazine::where('periodical_procurement_status', '=', '1')
  ->whereNotNull('periodical_reviewer_id')
  ->whereNull('periodical_status')
  ->get();
return view('admin.meta_pending_periodical')->with('data',$data);
}
public function meta_periodical_complete(){
  $data=Magazine::where('periodical_procurement_status', '=', '1')

  ->whereNotNull('periodical_reviewer_id')
  ->whereNotNull('periodical_status')
  ->get();
   return view('admin.meta_periodical_complete')->with('data',$data);
 }
// new
public function get_periodicals($id)
{
 
  if ($id == 'all') {
    $Magazines = Magazine::where('periodical_procurement_status', '=', '1')->where('periodical_status', '=', '1')->whereNotNull('periodical_reviewer_id')
    ->get();
  } else {
    $Magazines = Magazine::where('category', $id)->where('periodical_procurement_status', '=', '1')->where('periodical_status', '=', '1')->whereNotNull('periodical_reviewer_id')
    ->get();
  }
  
  $reviewers1 = Reviewer::where('reviewerType', '=', 'external')
    ->where('status', '=', 1)
    ->get();

  $reviewers = [];
  $cat1 = $Magazines[0]->category;
    foreach ($reviewers1 as $val) {
      $categories = json_decode($val->per_category, true);

      if (is_array($categories) && in_array($cat1, $categories)) {
        $reviewers[] = $val;
      }
    }



  $html = '';
  $htmldata = '';

  if ($Magazines->isEmpty()) {
    $html = '<tr><td colspan="3">No books found.</td></tr>';
  } else {
    $i = 0;
    foreach ($Magazines as $key => $val) {
      $datass = PeriodicalReviewStatus::where('periodical_id', $val->id)->first();
      
      if ($datass == null) {
          $language = $val->language;
        $i = $i + 1;
        $html .= '<tr>
                  <td>
                  <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                  <input type="checkbox" class="form-check-input bookitem" id="checkItem_' . $val->id . '" data-book-id="' . $val->id . '" required="">
                  <label class="form-check-label" for="checkItem_' . $val->id . '"></label>
              </div>
                  </td>
                  <td>' . ($i) . '</td>
                  <td><small>' . $val->title . '</small></td>
                   <td>' . $val->periodicity . '</td>
                  <td>' . $language . '</td>
                     <td>' . $val->category . '</td>
                  <td>' . $val->publisher_name . '</td>
              </tr>';
      }
      
  }

  if (count($reviewers) <= 0) {

    $htmldata = '<tr><td colspan="3">No external reviewers found.</td></tr>';
  } else {


    foreach ($reviewers as $key => $val) {

      $categories = json_decode($val->per_category, true);

      $recdata = '';

      if (is_array($categories)) {
        foreach ($categories as $category) {
          $recdata .= htmlspecialchars($category) . ' ,';
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
  if ($Magazines[0]->category == null) {
    $tbodyHtml2 = '<tr><td colspan="3">No Librarian reviewers found.</td></tr>';
  } else {


    $cat = $Magazines[0]->category;
    $internalsdat = Reviewer::where('reviewerType', '=', 'internal')
      ->where('status', '=', 1)
      ->get();
    $internalsdat1 = [];
    foreach ($internalsdat as $val) {
      $categories = json_decode($val->per_category, true);

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


        $categories = json_decode($val->per_category, true);

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
  if (count($Magazines) <= 0) {
    $tbodyHtml3 = '<tr><td colspan="3">No Public reviewers found.</td></tr>';
  } else {
    $tbodyHtml3 = '';
    $index1 = 1;

    if ($Magazines[0]->category == null) {
      $tbodyHtml3 = '<tr><td colspan="3">No external reviewers found.</td></tr>';
    } else {
            $internals1122 = Reviewer::where('reviewerType', '=', 'public')->where('status', '=', 1)->get();

      $cat = $Magazines[0]->category;
      $internals11 = [];
      foreach ($internals1122 as $val) {
        $categories = json_decode($val->per_category, true);
  
        if (is_array($categories) && in_array($cat, $categories)) {
          $internals11[] = $val;
        }
      }
      if (count($internals11) <= 0) {
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
          $categories = json_decode($val->per_category, true);

          $recdata = '';
  
          if (is_array($categories)) {
            foreach ($categories as $category) {
              $recdata .= htmlspecialchars($category) . ' ,';
            }
          }
          $tbodyHtml3 .= '<td><span>' .  trim($recdata) . '</span></td>';
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


   } 


  //  

  public function periodicalassign_data(Request $req)
  {

    $validator = Validator::make($req->all(), [

      'periodicalId' => 'required|array|min:1',
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
    $periodicalId = $req->periodicalId;
    $internalReviewverId = $req->LibrarianReviewverId;
    $externalReviewverId = $req->expectReviewverId;
    $publicReviewverId = $req->publicReviewverId;
    $mergedArray = array_merge($internalReviewverId, $externalReviewverId, $publicReviewverId);
    foreach ($periodicalId as $key => $val1) {

      foreach ($mergedArray as $key => $val) {
        $rev = Reviewer::where("id", '=', $val)->first();

        $bookreview = new PeriodicalReviewStatus();
        $bookreview->periodical_id = $val1;
        $bookreview->reviewer_id = $rev->id;
        $bookreview->reviewertype = $rev->reviewerType;
        $bookreview->save();
      }
    }

    foreach ($mergedArray as $key => $val) {
      $notifi = new Notifications();
      $notifi->message = "Periodical Assigned For Review";
      $notifi->to = $val;
      $notifi->from = auth('admin')->user()->id;
      $notifi->type = "reviewer";
      $notifi->save();
    }
    $data = [
      'success' => 'Periodical assigned Successfully',
    ];
    return response()->json($data);
  }
  public function procur_pending_periodical_list()
  {
    $data = PeriodicalReviewStatus::groupBy('periodical_id')->get('periodical_id');
    $record = [];
    foreach ($data as $key => $val) {
      $data1 = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('mark', '!=', null)->get();
      if (sizeof($data1) == 0) {
        $periodical = Magazine::find($val->periodical_id);
        $internalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'internal')->count();
        $externalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'external')->count();
        $publiccount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'public')->count();

        $obj = (object)[
          'periodical' => $periodical,
          'internalcount' => $internalcount,
          'externalcount' => $externalcount,
          'publiccount' => $publiccount,
        ];
        array_push($record, $obj);
      }
    }
    return view('admin.procur_pending_periodical_list')->with('record', $record);
  }
  public function periodical_reviewerlist($id)
  {
    $external =  PeriodicalReviewStatus::where('periodical_id', '=', $id)->where('reviewertype', '=', 'external')->get();
    $internal =  PeriodicalReviewStatus::where('periodical_id', '=', $id)->where('reviewertype', '=', 'internal')->get();
    $public =  PeriodicalReviewStatus::where('periodical_id', '=', $id)->where('reviewertype', '=', 'public')->get();
       $periodical_reviewer = (object)[
      'external' => $external,
      'internal' => $internal,
      'public' => $public,
      'periodicalid' => $id
    ];
    \Session::put('periodical_reviewer', $periodical_reviewer);

    return redirect('admin/periodical_review');
  }
// 


public function periodicalreassign_data(Request $req)
{
 
  $validator = Validator::make($req->all(), [

    'periodicalId' => 'required|array|min:1',
  
  ]);

  if ($validator->fails()) {
    $data = [
      'error' => $validator->errors()->first(),
    ];
    return response()->json($data);
  }
  if (!empty($req->LibrarianReviewverId) || !empty($req->expectReviewverId) || !empty($req->publicReviewverId)) {

  $periodicalId = $req->periodicalId;
  $internalReviewverId = $req->LibrarianReviewverId;
  $externalReviewverId = $req->expectReviewverId;
  $publicReviewverId = $req->publicReviewverId;
  $mergedArray = array_merge(
    array_filter($internalReviewverId ?? [], fn($value) => $value !== null && $value !== ''),
    array_filter($externalReviewverId ?? [], fn($value) => $value !== null && $value !== ''),
    array_filter($publicReviewverId ?? [], fn($value) => $value !== null && $value !== '')
);
  foreach ($periodicalId as $key => $val1) {

    foreach ($mergedArray as $key => $val) {
      $rev = Reviewer::where("id", '=', $val)->first();
      $revdata = PeriodicalReviewStatus::where("reviewer_id", '=', $rev->id)->where("periodical_id", '=',  $periodicalId[0])->first();
         
      if( $revdata == null){
      $periodicalreview = new PeriodicalReviewStatus();
      $periodicalreview->periodical_id = $val1;
      $periodicalreview->reviewer_id = $rev->id;
      $periodicalreview->reviewertype = $rev->reviewerType;
      $periodicalreview->save();
    }
  }
  }

  foreach ($mergedArray as $key => $val) {
    $notifi = new Notifications();
    $notifi->message = "Periodical Assigned For Review";
    $notifi->to = $val;
    $notifi->from = auth('admin')->user()->id;
    $notifi->type = "reviewer";
    $notifi->save();
  }
  $avginternal = 0;
  $avgexternal = 0;
  $avgpublic = 0;
$periodical_id=$periodicalId[0];
  $data1 = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('mark', '!=', null)->get();

  if (sizeof($data1) != 0) {
    $Magazine = Magazine::find($periodical_id);
    $internalcount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'internal')->count();
    $externalcount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'external')->count();
    $publiccount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'public')->count();
    $rinternalcount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
    $rexternalcount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
    $rpubliccount = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
    $suminternal = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
    $sumexternal = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
    $sumpublic = PeriodicalReviewStatus::where('periodical_id',$periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
    if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $mark = ($sumexternal / ($externalcount * 20)) * 100;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $mark = ($suminternal / ($internalcount * 20)) * 100;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
      $mark = ($sumpublic / ($publiccount * 20)) * 100;
    } else if ($externalcount == 0 || $rexternalcount == 0) {
      $mark = (($suminternal / ($internalcount * 20)) * 50) + (($sumpublic / ($publiccount * 20)) * 50);
    } else if ($internalcount == 0 || $rinternalcount == 0) {
      $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($sumpublic / ($publiccount * 20)) * 30);
    } else if ($publiccount == 0 || $rpubliccount == 0) {
      $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($suminternal / ($internalcount * 20)) * 30);
    } else {
      $mark = (($sumexternal / ($externalcount * 20)) * 60) + (($suminternal / ($internalcount * 20)) * 20) + (($sumpublic / ($publiccount * 20)) * 20);
    }
     $Magazine->marks = $mark;
    $Magazine->save();
  }

  $external =  PeriodicalReviewStatus::where('periodical_id', '=', $periodicalId[0])->where('reviewertype', '=', 'external')->get();
  $internal =  PeriodicalReviewStatus::where('periodical_id', '=', $periodicalId[0])->where('reviewertype', '=', 'internal')->get();
  $public =  PeriodicalReviewStatus::where('periodical_id', '=', $periodicalId[0])->where('reviewertype', '=', 'public')->get();
  $periodical_reviewer = (object)[
    'external' => $external,
    'internal' => $internal,
    'public' => $public,
    'periodicalid' => $periodicalId[0]
  ];

  if (\Session::has('periodical_reviewer')) {
    \Session::forget('periodical_reviewer');
}
\Session::put('periodical_reviewer', $periodical_reviewer);





  $data = [
    'success' => 'Periodical assigned Successfully',
  ];
  return response()->json($data);


} else {
  $data = [
    'error' => 'Select  any one reviewer',
  ];
  return response()->json($data);
}
}




public function periodical_delete_reviewer_data(Request $req)
{
  $reviewerId = $req->reviewerId;

  if (is_array($reviewerId) && !empty($reviewerId)) {

    $reviewerIdsString = implode(',', array_map(function ($id) {
      return "'" . $id . "'";
    }, $reviewerId));

    $sql = "DELETE FROM periodical_review_statuses WHERE periodical_id = ? AND id IN ($reviewerIdsString)";

    $deletedRows = DB::delete($sql, [$req->periodicalid]);
  } else {
    $data = [
      'error' => 'Please Select Reviewer',
    ];
    return response()->json($data);
  }
  $periodical_id=$req->periodicalid;
  $data1 = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('mark', '!=', null)->get();

  if (sizeof($data1) != 0) {
    $Magazine = Magazine::find($periodical_id);
    $internalcount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'internal')->count();
    $externalcount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'external')->count();
    $publiccount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'public')->count();
    $rinternalcount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
    $rexternalcount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
    $rpubliccount = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
    $suminternal = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
    $sumexternal = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
    $sumpublic = PeriodicalReviewStatus::where('periodical_id', $periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
    if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $mark = ($sumexternal / ($externalcount * 20)) * 100;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
      $mark = ($suminternal / ($internalcount * 20)) * 100;
    } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
      $mark = ($sumpublic / ($publiccount * 20)) * 100;
    } else if ($externalcount == 0 || $rexternalcount == 0) {
      $mark = (($suminternal / ($internalcount * 20)) * 50) + (($sumpublic / ($publiccount * 20)) * 50);
    } else if ($internalcount == 0 || $rinternalcount == 0) {
      $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($sumpublic / ($publiccount * 20)) * 30);
    } else if ($publiccount == 0 || $rpubliccount == 0) {
      $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($suminternal / ($internalcount * 20)) * 30);
    } else {
      $mark = (($sumexternal / ($externalcount * 20)) * 60) + (($suminternal / ($internalcount * 20)) * 20) + (($sumpublic / ($publiccount * 20)) * 20);
    }
    $Magazine->marks = $mark;
    $Magazine->save();
  }
  $external =  PeriodicalReviewStatus::where('periodical_id', '=', $req->periodicalid)->where('reviewertype', '=', 'external')->get();
  $internal =  PeriodicalReviewStatus::where('periodical_id', '=', $req->periodicalid)->where('reviewertype', '=', 'internal')->get();
  $public =  PeriodicalReviewStatus::where('periodical_id', '=', $req->periodicalid)->where('reviewertype', '=', 'public')->get();
   $periodical_reviewer = (object)[
    'external' => $external,
    'internal' => $internal,
    'public' => $public,
    'periodicalid' => $req->periodicalid
  ];
  
  if (\Session::has('periodical_reviewer')) {
    \Session::forget('periodical_reviewer');
}
\Session::put('periodical_reviewer', $periodical_reviewer);

  $data = [
    'success' => 'Reviewer Delete Successfully',
  ];
  return response()->json($data);
}
public function procur_complete_periodical_list()
{
  $periodical = PeriodicalReviewStatus::groupBy('periodical_id')->get('periodical_id');
  $record = [];
  foreach ($periodical as $key => $val) {
    $avginternal = 0;
    $avgexternal = 0;
    $avgpublic = 0;

    $data1 = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('mark', '!=', null)->get();
    if (sizeof($data1) != 0) {
      $Magazine = Magazine::find($val->periodical_id);
      $internalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'internal')->count();
      $externalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'external')->count();
      $publiccount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'public')->count();
      $rinternalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->count();
      $rexternalcount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->count();
      $rpubliccount = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->count();
      $suminternal = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'internal')->where('mark', '!=', null)->sum('mark');
      $sumexternal = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'external')->where('mark', '!=', null)->sum('mark');
      $sumpublic = PeriodicalReviewStatus::where('periodical_id', $val->periodical_id)->where('reviewertype', 'public')->where('mark', '!=', null)->sum('mark');
      if (($internalcount == 0 || $rinternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
        $avgexternal = ($sumexternal / ($externalcount * 20)) * 100;
        $mark = ($sumexternal / ($externalcount * 20)) * 100;
      } else if (($externalcount == 0 || $rexternalcount == 0) && ($publiccount == 0 || $rpubliccount == 0)) {
        $avginternal  = ($suminternal / ($internalcount * 20)) * 100;
        $mark = ($suminternal / ($internalcount * 20)) * 100;
      } else if (($externalcount == 0 || $rexternalcount == 0) && ($internalcount == 0 || $rinternalcount == 0)) {
        $avgpublic  = ($sumpublic / ($publiccount * 20)) * 100;
        $mark = ($sumpublic / ($publiccount * 20)) * 100;
      } else if ($externalcount == 0 || $rexternalcount == 0) {
        $avginternal  = ($suminternal / ($internalcount * 20)) * 50;
        $avgpublic  = ($sumpublic / ($publiccount * 20)) * 50;
        $mark = (($suminternal / ($internalcount * 20)) * 50) + (($sumpublic / ($publiccount * 20)) * 50);
      } else if ($internalcount == 0 || $rinternalcount == 0) {
        $avgexternal = ($sumexternal / ($externalcount * 20)) * 70;
        $avgpublic  = ($sumpublic / ($publiccount * 20)) * 30;
        $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($sumpublic / ($publiccount * 20)) * 30);
      } else if ($publiccount == 0 || $rpubliccount == 0) {
        $avgexternal = ($sumexternal / ($externalcount * 20)) * 70;
        $avginternal  = ($suminternal / ($internalcount * 20)) * 30;
        $mark = (($sumexternal / ($externalcount * 20)) * 70) + (($suminternal / ($internalcount * 20)) * 30);
      } else {

        $avgexternal = ($sumexternal / ($externalcount * 20)) * 60;
        $avginternal  = ($suminternal / ($internalcount * 20)) * 20;
        $avgpublic  = ($sumpublic / ($publiccount * 20)) * 20;
        $mark = (($sumexternal / ($externalcount * 20)) * 60) + (($suminternal / ($internalcount * 20)) * 20) + (($sumpublic / ($publiccount * 20)) * 20);
      }


      $obj = (object)[
        'Magazine' => $Magazine,
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
  // return $record;
  return view('admin.procur_complete_periodical_list')->with('record', $record);
}

// 


public function reviewperiodical(){

  $data = PeriodicalReviewStatus::groupBy('periodical_id')->get('periodical_id');
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
 
  

    $data1 = PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('mark','!=',null)->get();
    if(sizeof($data1) != 0){
       $periodical = Magazine::find($val->periodical_id);
       $internalcount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','internal')->count();
       $externalcount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','external')->count();
       $publiccount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','public')->count();
       $rinternalcount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','internal')->where('mark','!=',null)->count();
       $rexternalcount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','external')->where('mark','!=',null)->count();
       $rpubliccount= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','public')->where('mark','!=',null)->count();
       $suminternal= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','internal')->where('mark','!=',null)->sum('mark');
       $sumexternal= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','external')->where('mark','!=',null)->sum('mark');
       $sumpublic= PeriodicalReviewStatus::where('periodical_id',$val->periodical_id)->where('reviewertype','public')->where('mark','!=',null)->sum('mark');
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
         'Total periodical' =>count($data)
         
     ];
   
  
  $csvContent ="\xEF\xBB\xBF"; 
  $csvContent .= "S.No,All Three Review, Expert And Librarian,Expert And Public,Librarian And Public,Expert,Librarian,Public,No Review periodical,Total periodical Assign\n"; 
  foreach ($finaldata as $data) {
      $csvContent .= '"' . implode('","', $data) ."\"\n";
  }

  $headers = [
      'Content-Type' => 'text/csv; charset=utf-8',
      'Content-Disposition' => 'attachment; filename="Report.csv"',
  ];

  return response()->make($csvContent, 200, $headers);


}
public function despatch_periodical(Request $request){

    // Fetch the record with the status '0'
$rev = DB::table('periodicaldates')->where('status', '=', '0')->first();

// Check if a record was found
if ($rev) {
    // Update the record
    DB::table('periodicaldates')
        ->where('status', '=', '0')
        ->update([
            'startdate' => $request->startdate,
            'enddate' => $request->enddate
        ]);

    return back()->with('success', "Despatch Periodical Changed successfully");
} else {
    return back()->with('error', "No record found with the specified status");
}

}
public function master_periodical_data(Request $request) {
  // return $request;
  // Use eager loading to reduce the number of queries
  $query = Magazine::with('librarian');


    if ($request->has('language_filter') && $request->language_filter != '') {
      $query->where('language', $request->language_filter);
    }

    if ($request->has('periodicity_filter') && $request->periodicity_filter != '') {
      $query->where('periodicity', $request->periodicity_filter);
    }

    if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('category', $request->category_filter);
    }

    if ($request->has('payment_filter') && $request->payment_filter != '') {
      if ($request->payment_filter == 'Success') {
        $query->whereIn('periodical_procurement_status', ['1', '5', '6']);
      } else {
        $query->whereNotIn('periodical_procurement_status', ['1', '5', '6']);
      }
  }

  if ($request->has('mark_range') && $request->mark_range != '') {
    list($min, $max) = explode('-', $request->mark_range);
    $query->whereBetween('marks', [(int)$min, (int)$max]);
}
  
  if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {
  

      switch ($request->metachecking_filter) {
        case 'Success':
          $query->where('periodical_status', '1');
          break;
        case 'Reject':
          $query->where('periodical_status', '0');
          break;
        case 'Returned To User Correction':
          $query->where('periodical_status', '2');
          break;
        case 'Periodical Update To Return':
          $query->where('periodical_status', '3');
          break;
        case 'No Review':
            $query->where('periodical_status', null);
            break;
    }
}
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

    if ($request->has('search') && $request->search != '') {
      $query->where(function ($subQuery) use ($request) {
        $subQuery->where('title', 'like', '%' . $request->search . '%')
        ->orWhere('periodicity', 'like', '%' . $request->search . '%')
        ->orWhere('rni_details', 'like', '%' . $request->search . '%')
        ->orWhere('language', 'like', '%' . $request->search . '%')
        ->orWhere('publisher_name', 'like', '%' . $request->search . '%')
        ->orWhere('Gsm', 'like', '%' . $request->search . '%')
        ->orWhere('marks', 'like', '%' . $request->search . '%');
    });
  }

    $data = $query->paginate(15); // Adjust the number of records per page as needed

    $procurementStatuses = ["1", "5", "6"];
    $bookStatusLabels = [
      "1" => "Success",
      "0" => "Reject",
      "2" => "Returned To User Correction",
      "3" => "Periodical Update To Return"
  ];
//   $negobookStatus = [
//     "0" => "Negotiation from admin",
//    "1" => "Negotiation from user",
//    "2" => "Accepted",
//    "3" => "Rejected",
//    "4" => "Hold"
// ];
  foreach ($data as $val) {
      $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
      $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
      $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
      // $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "No negotiation";

    }
    foreach ($data as $val) {
  
      $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->first();
      
      if($procurementPayment !=null){
        $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
      }else{
        $val->paymentdate = 'No Date';

      }

    }

  //  return $data;
  return view('admin.master_periodical_data', compact('data'));
}
public function magazine_views($id){
  $magazineviews = Magazine::find($id);
  \Session::put('magazineviews', $magazineviews);
  return redirect('admin/magazine-views');    

}



public function master_periodical_datareport(Request $request)
{

  $query = Magazine::with('librarian');

  // Apply filters
  if ($request->has('language_filter') && $request->language_filter != '') {
    $query->where('language', $request->language_filter);
  }

  if ($request->has('periodicity_filter') && $request->periodicity_filter != '') {
    $query->where('periodicity', $request->periodicity_filter);
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
    $query->where('category', $request->category_filter);
  }

  if ($request->has('payment_filter') && $request->payment_filter != '') {
    if ($request->payment_filter == 'Success') {
      $query->whereIn('periodical_procurement_status', ['1', '5', '6']);
    } else {
      $query->whereNotIn('periodical_procurement_status', ['1', '5', '6']);
    }
}

if ($request->has('mark_range') && $request->mark_range != '') {
  list($min, $max) = explode('-', $request->mark_range);
  $query->whereBetween('marks', [(int)$min, (int)$max]);
}

if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {


    switch ($request->metachecking_filter) {
      case 'Success':
        $query->where('periodical_status', '1');
        break;
      case 'Reject':
        $query->where('periodical_status', '0');
        break;
      case 'Returned To User Correction':
        $query->where('periodical_status', '2');
        break;
      case 'Periodical Update To Return':
        $query->where('periodical_status', '3');
        break;
      case 'No Review':
          $query->where('periodical_status', null);
          break;
  }
}
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

  if ($request->has('search') && $request->search != '') {
    $query->where(function ($subQuery) use ($request) {
      $subQuery->where('title', 'like', '%' . $request->search . '%')
          ->orWhere('periodicity', 'like', '%' . $request->search . '%')
          ->orWhere('rni_details', 'like', '%' . $request->search . '%')
          ->orWhere('language', 'like', '%' . $request->search . '%')
          ->orWhere('publisher_name', 'like', '%' . $request->search . '%')
          ->orWhere('Gsm', 'like', '%' . $request->search . '%')
          ->orWhere('marks', 'like', '%' . $request->search . '%');
  });
}

  $data = $query->get(); // Adjust the number of records per page as needed

  $procurementStatuses = ["1", "5", "6"];
  $bookStatusLabels = [
    "1" => "Success",
    "0" => "Reject",
    "2" => "Returned To User Correction",
    "3" => "Periodical Update To Return"
];
//   $negobookStatus = [
//     "0" => "Negotiation from admin",
//    "1" => "Negotiation from user",
//    "2" => "Accepted",
//    "3" => "Rejected",
//    "4" => "Hold"
// ];
foreach ($data as $val) {
    $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
    $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
    $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
    // $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "No negotiation";

  }
  foreach ($data as $val) {

    $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->first();
    
    if($procurementPayment !=null){
      $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
    }else{
      $val->paymentdate = 'No Date';

    }

  }


  $actotal = 0;
  $inactotal = 0;
  $finaldata = [];
  $serialNumber = 1;
  foreach ($data as $val) {


  
       $finaldata[] = [
          'S.No' =>  $serialNumber ++,
          "Language"=> $val->language,
          "Category"=> $val->category,
          "Title of the Periodical"=> $val->title,
          "Periodicity"=> $val->periodicity,
          "Publication Name"=> $val->publisher_name,
          "Editor Name"=> $val->editor_name,
          "First Issue Year"=> $val->first_issue_year,
          "Issue Per Yea"=> $val->issue_per_year,
          "Everyv Issue Date"=> $val->every_issue_date,
          "Gsm"=> $val->gsm,
          "Paper Type"=> $val->papertype,
          "Paper Finishing"=> $val->paperfinishing,
          "Cover Price"=> $val->single_issue_rate,
          "Annual Subscription"=> $val->annual_subscription,
          "Discount"=> $val->discount,
          "Single Issue After Discount"=> $val->single_issue_after_discount,
          "Annual Subscription After Discount"=> $val->annual_cost_after_discount,
          "RNI Details"=> $val->rni_details,
          "Total No.of Pages"=> $val->total_pages,
          "Total No.of Multicolour Pages"=> $val->total_multicolour_pages,
          "Total No.of Monocolour Pages"=> $val->total_monocolour_pages,
          "Paper Quality"=> $val->paper_qualitity,
          "Size of Magazine"=> $val->magazine_size,
          "Contact Person"=> $val->contact_person,
          "Phone"=> $val->phone,
          "Email"=> $val->email,
          "Address"=> $val->address,
          "Payment Status "=> $val->paystatus,
          "Payment Date "=> $val->paymentdate,
          "Meta checking Status "=> $val->revstatus,
          "Meta checker Name"=> $val->reviewername,
          "Marks"=> $val->marks,
       

          
                                    
      ];
    
    

    
   }

   $csvContent ="\xEF\xBB\xBF"; 
   $csvContent .=  "S.No,Language,Category,Title of the Periodical,Periodicity,Publication Name,Editor Name,First Issue Year,Issue Per Yea,Everyv Issue Date,Gsm, Paper Type,Paper Finishing,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address,Payment Status,Payment Date,Meta checking Status,Meta checker Name,Marks,Negotiation Status\n"; 
   foreach ($finaldata as $data) {
       $csvContent .= '"' . implode('","', $data) ."\"\n";
   }

  $headers = [
    'Content-Type' => 'text/csv; charset=utf-8',
    'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
  ];

  return response()->make($csvContent, 200, $headers);
}

// 


public function metacheck_periodical_data()
{
  $metperiodicaltotal = Magazine::where('periodical_procurement_status', '=', '1')->count();
  $metassignperiodicaltotal = Magazine::where('periodical_reviewer_id', '!=', Null)->where('periodical_procurement_status', '=', '1')->count();
  $metcomperiodicaltotal = Magazine::whereNotNull('periodical_reviewer_id')->where('periodical_status', '=', '1')->where('periodical_procurement_status', '=', '1')->count();
  $metnotcomperiodicalktotal = Magazine::where('periodical_procurement_status', 1)
    ->whereNotNull('periodical_reviewer_id')
    ->where(function ($query) {
      $query->whereNull('periodical_status')
        ->orWhere('periodical_status', 2)
        ->orWhere('periodical_status', 3);
    })
    ->count();
  $reviewer = (object)[
    'metperiodicaltotal' => $metperiodicaltotal,
    'metassignperiodicaltotal' => $metassignperiodicaltotal,
    'metcomperiodicaltotal' => $metcomperiodicaltotal,
    'metnotcomperiodicalktotal' => $metnotcomperiodicalktotal,
  ];
  $data = [];
  $reviewers = Librarian::where('metaChecker', 'yes')->where('status', '1')->get();

  foreach ($reviewers as $key => $val) {

    $periodicalReview = Magazine::where('periodical_reviewer_id', '=', $val->id)->where('periodical_procurement_status', '=', '1')->count();
    $periodicalReviewcom = Magazine::where('periodical_reviewer_id', '=', $val->id)->where('periodical_procurement_status', '=', '1')->where('periodical_status', '=', '1')->count();
    $periodicalReviewpen = Magazine::where('periodical_procurement_status', 1)
      ->where('periodical_reviewer_id', '=', $val->id)
      ->where(function ($query) {
        $query->whereNull('periodical_status')
          ->orWhere('periodical_status', 2)
          ->orWhere('periodical_status', 3);
      })->count();


   

    $val->periodicalReview       = $periodicalReview;
    $val->periodicalReviewcom    = $periodicalReviewcom;
    $val->periodicalReviewpen    = $periodicalReviewpen;



    array_push($data, $val);
  }

  return view(
    'admin.metacheck_periodical_data',
    compact('data', 'reviewer')
  );
}


 
public function reviwer_periodical_data()
{
  $results = DB::table('reviewer as r')
    ->select(
      'r.id',
      'r.name',
      'r.per_category',
      'r.reviewerType',
      DB::raw('COUNT(br.reviewer_id) AS periodical_reviews_count '),
      DB::raw('COUNT(CASE WHEN br.mark IS NOT NULL THEN 1 END) AS periodicalReviewcom'),
      DB::raw('COUNT(CASE WHEN br.mark IS NULL THEN 1 END) AS periodicalReviewpen')
    )
    ->leftJoin('periodical_review_statuses as br', 'r.id', '=', 'br.reviewer_id')
    ->where('r.status', 1)
    ->whereIn('r.reviewerType', ['external', 'internal', 'public'])
    ->groupBy('r.id', 'r.name', 'r.per_category', 'r.reviewerType')
    ->get();

  // Ensure $results is not null or empty
  if ($results->isEmpty()) {
    // Handle empty results if needed
    return view('admin.reviwer_periodical_data', [
      'data' => collect(),
      'data1' => collect(),
      'data2' => collect(),
      'metacompletecount' => 0,
      'reviewerassignCount' => 0,
      'count' => 0
    ]);
  }

  // Filter the results based on reviewer type
  $data = $results->filter(function ($item) {
    return $item->reviewerType == 'external';
  });

  $data1 = $results->filter(function ($item) {
    return $item->reviewerType == 'internal';
  });

  $data2 = $results->filter(function ($item) {
    return $item->reviewerType == 'public';
  });

  $metacompletecount = Magazine::whereNotNull('periodical_reviewer_id')
    ->where('periodical_status', 1)
    ->where('periodical_procurement_status', 1)
    ->count();

  $reviewerassignCount = PeriodicalReviewStatus::distinct('periodical_id')->count();

  $count = $data->count() + $data1->count() + $data2->count();

  return view('admin.reviwer_periodical_data', compact('data', 'data1', 'data2', 'metacompletecount', 'reviewerassignCount', 'count'));
}


public function master_nego_periodical_data(Request $request) {
  // return $request;
  // Use eager loading to reduce the number of queries
  $query = Magazine::with('librarian')->where('marks', '>=', 40)->where('negotiation_status','=', null);


    if ($request->has('language_filter') && $request->language_filter != '') {
      $query->where('language', $request->language_filter);
    }

    if ($request->has('periodicity_filter') && $request->periodicity_filter != '') {
      $query->where('periodicity', $request->periodicity_filter);
    }

    if ($request->has('category_filter') && $request->category_filter != '') {
      $query->where('category', $request->category_filter);
    }

    if ($request->has('payment_filter') && $request->payment_filter != '') {
      if ($request->payment_filter == 'Success') {
        $query->whereIn('periodical_procurement_status', ['1', '5', '6']);
      } else {
        $query->whereNotIn('periodical_procurement_status', ['1', '5', '6']);
      }
  }

  if ($request->has('mark_range') && $request->mark_range != '') {
    list($min, $max) = explode('-', $request->mark_range);
    $query->whereBetween('marks', [(int)$min, (int)$max]);
}
  
  if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {
  

      switch ($request->metachecking_filter) {
        case 'Success':
          $query->where('periodical_status', '1');
          break;
        case 'Reject':
          $query->where('periodical_status', '0');
          break;
        case 'Returned To User Correction':
          $query->where('periodical_status', '2');
          break;
        case 'Periodical Update To Return':
          $query->where('periodical_status', '3');
          break;
        case 'No Review':
            $query->where('periodical_status', null);
            break;
    }
}
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

    if ($request->has('search') && $request->search != '') {
      $query->where(function ($subQuery) use ($request) {
        $subQuery->where('title', 'like', '%' . $request->search . '%')
        ->orWhere('periodicity', 'like', '%' . $request->search . '%')
        ->orWhere('rni_details', 'like', '%' . $request->search . '%')
        ->orWhere('language', 'like', '%' . $request->search . '%')
        ->orWhere('publisher_name', 'like', '%' . $request->search . '%')
        ->orWhere('Gsm', 'like', '%' . $request->search . '%')
        ->orWhere('marks', 'like', '%' . $request->search . '%');
    });
  }

    $data = $query->paginate(15); // Adjust the number of records per page as needed

    $procurementStatuses = ["1", "5", "6"];
    $bookStatusLabels = [
      "1" => "Success",
      "0" => "Reject",
      "2" => "Returned To User Correction",
      "3" => "Periodical Update To Return"
  ];
//   $negobookStatus = [
//     "0" => "Negotiation from admin",
//    "1" => "Negotiation from user",
//    "2" => "Accepted",
//    "3" => "Rejected",
//    "4" => "Hold"
// ];
  foreach ($data as $val) {
      $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
      $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
      $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
      // $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "No negotiation";

    }
    foreach ($data as $val) {
  
      $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->first();
      
      if($procurementPayment !=null){
        $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
      }else{
        $val->paymentdate = 'No Date';

      }

    }

   
  return view('admin.master_nego_periodical_data', compact('data'));
}


public function master_nego_periodical_datareport(Request $request)
{

  $query = Magazine::with('librarian')->where('marks', '>=', 40)->where('negotiation_status','=', null);

  // Apply filters
  if ($request->has('language_filter') && $request->language_filter != '') {
    $query->where('language', $request->language_filter);
  }

  if ($request->has('periodicity_filter') && $request->periodicity_filter != '') {
    $query->where('periodicity', $request->periodicity_filter);
  }

  if ($request->has('category_filter') && $request->category_filter != '') {
    $query->where('category', $request->category_filter);
  }

  if ($request->has('payment_filter') && $request->payment_filter != '') {
    if ($request->payment_filter == 'Success') {
      $query->whereIn('periodical_procurement_status', ['1', '5', '6']);
    } else {
      $query->whereNotIn('periodical_procurement_status', ['1', '5', '6']);
    }
}

if ($request->has('mark_range') && $request->mark_range != '') {
  list($min, $max) = explode('-', $request->mark_range);
  $query->whereBetween('marks', [(int)$min, (int)$max]);
}

if ($request->has('metachecking_filter') && $request->metachecking_filter != '') {


    switch ($request->metachecking_filter) {
      case 'Success':
        $query->where('periodical_status', '1');
        break;
      case 'Reject':
        $query->where('periodical_status', '0');
        break;
      case 'Returned To User Correction':
        $query->where('periodical_status', '2');
        break;
      case 'Periodical Update To Return':
        $query->where('periodical_status', '3');
        break;
      case 'No Review':
          $query->where('periodical_status', null);
          break;
  }
}
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

  if ($request->has('search') && $request->search != '') {
    $query->where(function ($subQuery) use ($request) {
      $subQuery->where('title', 'like', '%' . $request->search . '%')
          ->orWhere('periodicity', 'like', '%' . $request->search . '%')
          ->orWhere('rni_details', 'like', '%' . $request->search . '%')
          ->orWhere('language', 'like', '%' . $request->search . '%')
          ->orWhere('publisher_name', 'like', '%' . $request->search . '%')
          ->orWhere('Gsm', 'like', '%' . $request->search . '%')
          ->orWhere('marks', 'like', '%' . $request->search . '%');
  });
}

  $data = $query->get(); // Adjust the number of records per page as needed

  $procurementStatuses = ["1", "5", "6"];
  $bookStatusLabels = [
    "1" => "Success",
    "0" => "Reject",
    "2" => "Returned To User Correction",
    "3" => "Periodical Update To Return"
];
//   $negobookStatus = [
//     "0" => "Negotiation from admin",
//    "1" => "Negotiation from user",
//    "2" => "Accepted",
//    "3" => "Rejected",
//    "4" => "Hold"
// ];
foreach ($data as $val) {
    $val->reviewername = $val->librarian ? $val->librarian->librarianName : "No Review";
    $val->paystatus = in_array($val->book_procurement_status, $procurementStatuses) ? "Success" : "No Payment";
    $val->revstatus = $bookStatusLabels[$val->book_status] ?? "No Review";
    // $val->negostatus = $negobookStatus[$val->negotiation_status] ?? "No negotiation";

  }
  foreach ($data as $val) {

    $procurementPayment = Procurementpaymrnt::whereJsonContains('bookid', $val->id)->first();
    
    if($procurementPayment !=null){
      $val->paymentdate = $procurementPayment->created_at->format('d-m-Y');
    }else{
      $val->paymentdate = 'No Date';

    }

  }


  $actotal = 0;
  $inactotal = 0;
  $finaldata = [];
  $serialNumber = 1;
  foreach ($data as $val) {


  
       $finaldata[] = [
          'S.No' =>  $serialNumber ++,
          "Language"=> $val->language,
          "Category"=> $val->category,
          "Title of the Periodical"=> $val->title,
          "Periodicity"=> $val->periodicity,
          "Publication Name"=> $val->publisher_name,
          "Editor Name"=> $val->editor_name,
          "First Issue Year"=> $val->first_issue_year,
          "Issue Per Yea"=> $val->issue_per_year,
          "Everyv Issue Date"=> $val->every_issue_date,
          "Gsm"=> $val->gsm,
          "Paper Type"=> $val->papertype,
          "Paper Finishing"=> $val->paperfinishing,
          "Cover Price"=> $val->single_issue_rate,
          "Annual Subscription"=> $val->annual_subscription,
          "Discount"=> $val->discount,
          "Single Issue After Discount"=> $val->single_issue_after_discount,
          "Annual Subscription After Discount"=> $val->annual_cost_after_discount,
          "RNI Details"=> $val->rni_details,
          "Total No.of Pages"=> $val->total_pages,
          "Total No.of Multicolour Pages"=> $val->total_multicolour_pages,
          "Total No.of Monocolour Pages"=> $val->total_monocolour_pages,
          "Paper Quality"=> $val->paper_qualitity,
          "Size of Magazine"=> $val->magazine_size,
          "Contact Person"=> $val->contact_person,
          "Phone"=> $val->phone,
          "Email"=> $val->email,
          "Address"=> $val->address,
          "Payment Status "=> $val->paystatus,
          "Payment Date "=> $val->paymentdate,
          "Meta checking Status "=> $val->revstatus,
          "Meta checker Name"=> $val->reviewername,
          "Marks"=> $val->marks,
       

          
                                    
      ];
    
    

    
   }

   $csvContent ="\xEF\xBB\xBF"; 
   $csvContent .=  "S.No,Language,Category,Title of the Periodical,Periodicity,Publication Name,Editor Name,First Issue Year,Issue Per Yea,Everyv Issue Date,Gsm, Paper Type,Paper Finishing,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address,Payment Status,Payment Date,Meta checking Status,Meta checker Name,Marks\n"; 
   foreach ($finaldata as $data) {
       $csvContent .= '"' . implode('","', $data) ."\"\n";
   }

  $headers = [
    'Content-Type' => 'text/csv; charset=utf-8',
    'Content-Disposition' => 'attachment; filename="masterbookdata.csv"',
  ];

  return response()->make($csvContent, 200, $headers);
}

public function negotiation_periodicallist()
{
   $categori = Magazine::where('marks', '>=', 40)
    ->where('negotiation_status', '=', null)
    ->get();
 
return view('admin.negotiation_periodical_list')->with('categori', $categori);

}


public function approveperiodicalnegotiationstatus (Request $req)
{
  $periodicalId = $req->periodicalId;
 
    $data1 = Magazine::find($periodicalId);

    if($data1->negotiation_price == null){
      $data1->final_price = $data1->calculated_price;

    }else{
      $data1->final_price = $data1->negotiation_price;

    } 

    
    $data1->negotiation_status = "2";
    $data1->save();
    $data = [
      'success' => 'Approved Successfully',
    ];
    return response()->json($data);
  
}
public function sendnegotiation_periodical(Request $req)
{
 
  $id = $req->dataId;
  $data1 = Magazine::find($id);
  $data1->negotiation_status = "0";
  $data1->save();

  $notifi = new Notifications();
  $notifi->message = "Received a request to negotiate the price of the Periodical";
  $notifi->to = $data1->user_id;
  $notifi->from = auth('admin')->user()->id;
  $notifi->type = $data1->user_type;
  $notifi->save();
  $data = [
    'success' => 'Periodical Send Negotiation Successfully',
  ];
  return response()->json($data);
}


public function multisendperiodicalnegotiation(Request $req)
{
  $record = $req->periodicalId;
  $record1 = [];
  foreach ($record as $key => $val) {
    $data1 = Magazine::find($val);
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
    $notifi->message = "Received a request to negotiate the price of the Periodical";
    $notifi->to = $val->userid;
    $notifi->from = auth('admin')->user()->id;
    $notifi->type = $val->type;
    $notifi->save();
  }

  $data = [
    'success' => 'Periodical Send Negotiation Successfully',
  ];
  return response()->json($data);
}



public function holdperiodicalnegotiationstatus(Request $req)
{

  if ($req->Description != null) {
    $data1 = Magazine::find($req->periodicalId);
    $data1->negotiation_status = "4";
    $data1->negotiation_hold_message = $req->Description;
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
public function rejectperiodicalnegotiationstatus(Request $req)
{

  if ($req->Description != null) {
    $data1 = Magazine::find($req->periodicalId);
    $data1->negotiation_status = "3";
    $data1->negotiation_reject_message = $req->Description;
    $data1->save();

    $data = [
      'success' => 'The negotiation is on Reject.',
    ];

    return response()->json($data);
  } else {
    $data = [
      'error' => 'Description Filed is  Required',
    ];

    return response()->json($data);
  }
}
public function periodical_dispatch_list($magazineid)
{
  $ldate = date('Y-m-d');
  $Subscription = Subscription::where('magazine_id' ,'=',$magazineid)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
  if($Subscription != null){
    $Dispatch=Dispatch::where('magazine_id' ,'=',$magazineid)->where('subscription_id','=',$Subscription->id)->orderBy('expected_date','ASC')->get();
    \Session::put('Dispatch', $Dispatch);
    return redirect('admin/periodical-dispatch');   

  }


}

public function periodical_dispatch_update(Request $request)
{


  foreach ($request->records as $record) {
    $id = $record['id'];
    $date = $record['date'];
    $formattedDate = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');

    $dispatch = Dispatch::where('id', $id)->first();
 
    if ($dispatch) {
  
        $dispatch->expected_date = $formattedDate;
        $dispatch->save();
    
    } 
    }
     $rec= $request->records[0];
       $id = $rec['id'];
       $Dispatch1=Dispatch::find($id);

       
      $Dispatch=Dispatch::where('magazine_id' ,'=',$Dispatch1->magazine_id)->where('subscription_id','=',$Dispatch1->subscription_id)->orderBy('expected_date','ASC')->get();
 
      \Session::put('Dispatch', $Dispatch);
      $data = [
        'success' => 'Dispatch records updated successfully.',
      ];
      return response()->json($data);

  
    
  



}
  }

  