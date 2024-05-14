<?php

namespace App\Http\Controllers\PeriodicalPublisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Librarian;
use App\Models\State;
use App\Models\District;
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
 use App\Models\periodicalcopies;

 

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
    $user= auth('periodical_publisher')->user()->id;

  $magazines = Magazine::where('user_id',$user)->get();
 
      return view('periodical_publisher.magazine_list',compact('magazines'));
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
    return redirect('periodical_publisher/magazineview');    

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
      'sample_pdf' => 'required|mimes:pdf',
 
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
      'sample_pdf.mimes' => 'The sample PDF must be a PDF file.',


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


  public function createmagazine(Request $request){
    $validator = Validator::make($request->all(), [
      'rni' => 'required',
      'rni_attachment_proof'=>'required|mimes:pdf',
      'language' => 'required',
      'category' => 'required',
      'title' => 'required',
      'name_of_publisher'=>'required',
      'name_of_editor'=>'required',
      'frequency' => 'required',
      'first_issue' => 'required',
      'per_year' => 'required',
      'every_issue' => 'required',
      'single_issue_rate' => 'required',
      'annual_subscription' => 'required',
      'discount' => 'required',
      'single_issue_after_discount' => 'required',
      'annual_subscription_after_discount' => 'required',
      'quotes_one' => 'required',
      'clip_attachment' => 'required|image',
      'periodical_short_info' => 'required',
      'editor_profile_image' => 'required|image',
      'about_editor' => 'required',
      'magazine_size' => 'required',
      'gsm' => 'required',
      'magazine_size' => 'required',
      'type_paper' => 'required',
      'paper_finishing' => 'required',
      'number_of_pages' => 'required',
      'multicolour_pages' => 'required',
      'monocolour_pages' => 'required',
      'contact_person_name' => 'required',
      'email_id' => 'required|email',
      'phone_number' => 'required',
      'country' => 'required',
      'state' => 'required',
      'district' => 'required',
      'city' => 'required',
      'pincode' => 'required',
      'contact_person_address' => 'required',
      'offcial_address' => 'required',
      'front_img' => 'required|image',
      'back_img' => 'required|image',
      'full_img' => 'required|image',
      'pdf_content_one' => 'required|mimes:pdf',
      'pdf_content_two' => 'required|mimes:pdf',
      'pdf_content_three' => 'required|mimes:pdf',
      'bank_Name' => 'required',
      'ifsc_Code' => 'required',
      'ban_Acc_Num' => 'required',
      'acc_Hol_Nam' => 'required',
  
  ], [
      'language.required' => 'The language field is required.',
      'category.required' => 'The category field is required.',
      'title.required' => 'The title field is required.',
      'name_of_publisher.required' => 'The Name of Publisher field is required.',
      'name_of_editor.required' => 'The Name of Editor field is required.',
      'frequency.required' => 'The periodicity field is required.',
      'first_issue' =>  'The year of first issue field is required.',
      'per_year' =>  'Total number of issue per year field is required.',
      'every_issue' =>  'Date of publication of every issue field is required.',
      'single_issue_rate.required' => 'The single issue rate field is required.',
      'annual_subscription.required' => 'The annual subscription field is required.',
      'discount.required' => 'The discount field is required.',
      'single_issue_after_discount.required' => 'The single issue after discount field is required.',
      'annual_subscription_after_discount.required' => 'The annual cost after discount field is required.',
      'quotes_one' => 'Highlights field is required',
      'clip_attachment' => 'Highlights file filed is required',
      'clip_attachment.image' => 'Highlights image must be an image file.',
      'periodical_short_info' => 'Short description about periodical is required',
      'editor_profile_image' => 'Publisher / Editor image field is required',
      'editor_profile_image.image' => 'Publisher / Editor image must be an image file.',
      'about_editor' => 'About publisher / editor field is required',
      'rni.required' => 'The RNI details field is required.',
      'gsm' => 'GSM field is required',
      'magazine_size' => 'Magazine size field is required',
      'type_paper' => 'Paper type field is required',
      'paper_finishing' => 'Paper finishing field is required',
      'number_of_pages' => 'The number of pages field is required.',
      'multicolour_pages' => 'The number of multicolour pages field is required.',
      'monocolour_pages' => 'The number of monocolour pages field is required.',
      'contact_person_name' => 'The contact person name field is required.',
      'email_id' => 'The contact person email is required.',
      'email_id.email' => 'The email must be a valid email address.',
      'phone_number' => 'The contact person phone number field is required.',
      'country' => 'The country field is required.',
      'state' => 'The state field is required.',
      'district' => 'The district field is required.',
      'city' => 'The city field is required.',
      'pincode' => 'The pincode field is required.',
      'contact_person_address' => 'The contact person address field is required.',
      'offcial_address' => 'The offcial address field is required.',
      'front_img.required' => 'The front image field is required.',
      'front_img.image' => 'The front image must be an image file.',
      'back_img.required' => 'The back image field is required.',
      'back_img.image' => 'The back image must be an image file.',
      'full_img.required' => 'The full image field is required.',
      'full_img.image' => 'The full image must be an image file.',
      'pdf_content_one.required' => 'The sample PDF field is required.',
      'pdf_content_one.mimes' => 'The sample PDF must be a PDF file.',
      'pdf_content_two.required' => 'The sample PDF field is required.',
      'pdf_content_two.mimes' => 'The sample PDF must be a PDF file.',
      'pdf_content_three.required' => 'The sample PDF field is required.',
      'pdf_content_three.mimes' => 'The sample PDF must be a PDF file.',
      'rni_attachment_proof.required' => 'The sample PDF field is required.',
      'rni_attachment_proof.mimes' => 'The sample PDF must be a PDF file.',
      'bank_Name' => 'The bank Name field is required.',
      'ifsc_Code' => 'The ifsc code field is required.',
      'ban_Acc_Num' => 'The bank Account Number field is required.',
      'acc_Hol_Nam' => 'The Account Holder name field is required.',
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
  }
  $user = auth('periodical_publisher')->user();
  
     $magazine = new Magazine();

     //highlights image
     if(isset($request->clip_attachment)){
      $oldFilePath = $magazine->clip_attachment;
      if ($oldFilePath) {
          File::delete(public_path('Magazine/highlightimg/' . $oldFilePath));
      }
      if ($request->hasFile('clip_attachment')) {
          $front = $request->file('clip_attachment');
          $front_name =time() . '_' . $front->getClientOriginalName();
          $front->move(('Magazine/highlightimg'), $front_name);
          $magazine->highlightimg = $front_name;
      }
    }
  
    //editor profile
    if(isset($request->editor_profile_image)){
      $oldFilePath = $magazine->editor_profile_image;
      if ($oldFilePath) {
          File::delete(public_path('Magazine/editorprofile/' . $oldFilePath));
      }
      if ($request->hasFile('editor_profile_image')) {
          $front = $request->file('editor_profile_image');
          $front_name =time() . '_' . $front->getClientOriginalName();
          $front->move(('Magazine/editorprofile'), $front_name);
          $magazine->editorprofile = $front_name;
      }
    }
     //Front Img
  if(isset($request->front_img)){
    $oldFilePath = $magazine->front_img;
    if ($oldFilePath) {
        File::delete(public_path('Magazine/front/' . $oldFilePath));
    }
    if ($request->hasFile('front_img')) {
        $front = $request->file('front_img');
        $front_name =time() . '_' . $front->getClientOriginalName();
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
        $back_name =time() . '_' . $back->getClientOriginalName();
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
            $full_name =time() . '_' . $full->getClientOriginalName();
            $full->move(public_path('Magazine/full'), $full_name);
            $magazine->full_img = $full_name;
        }
     } 
  
     //pdf 
     if(isset($request->pdf_content_one)){
      $oldFilePath = $magazine->pdf_content_one;
      if ($oldFilePath) {
          File::delete(public_path('Magazine/pdf1/' . $oldFilePath));
      }
      if ($request->hasFile('pdf_content_one')) {
          $full = $request->file('pdf_content_one');
          $full_name = time() . '_' . $full->getClientOriginalName();
          $full->move(public_path('Magazine/pdf1'), $full_name);
          $magazine->pdf1 = $full_name;
      }
   }  
   if(isset($request->pdf_content_two)){
    $oldFilePath = $magazine->pdf_content_two;
    if ($oldFilePath) {
        File::delete(public_path('Magazine/pdf2/' . $oldFilePath));
    }
    if ($request->hasFile('pdf_content_two')) {
        $full = $request->file('pdf_content_two');
        $full_name =time() . '_' . $full->getClientOriginalName();
        $full->move(public_path('Magazine/pdf2'), $full_name);
        $magazine->pdf2 = $full_name;
    }
 }  

 if(isset($request->pdf_content_three)){
  $oldFilePath = $magazine->pdf_content_three;
  if ($oldFilePath) {
      File::delete(public_path('Magazine/pdf3/' . $oldFilePath));
  }
  if ($request->hasFile('pdf_content_three')) {
      $full = $request->file('pdf_content_three');
      $full_name =time() . '_' . $full->getClientOriginalName();
      $full->move(public_path('Magazine/pdf3'), $full_name);
      $magazine->pdf3 = $full_name;
  }
}  

if(isset($request->rni_attachment_proof)){
  $oldFilePath = $magazine->rni_attachment_proof;
  if ($oldFilePath) {
      File::delete(public_path('Magazine/rniproof/' . $oldFilePath));
  }
  if ($request->hasFile('rni_attachment_proof')) {
      $full = $request->file('rni_attachment_proof');
      $full_name =time() . '_' . $full->getClientOriginalName();
      $full->move(public_path('Magazine/rniproof'), $full_name);
      $magazine->rniproof = $full_name;
  }
}
     $magazine->rni_details = $request->rni;
     $magazine->language =$request->language;
     $magazine->category =  $request->category;
     $magazine->title =  $request->title;
     $magazine->periodicity =  $request->frequency;
     $magazine->publisher_name = $request->name_of_publisher;
     $magazine->editor_name = $request->name_of_editor;
     $magazine->first_issue_year = $request->first_issue;
     $magazine->issue_per_year = $request->per_year;
     $magazine->every_issue_date = $request->every_issue;
     $magazine->single_issue_rate = $request->single_issue_rate;
     $magazine->annual_subscription = $request->annual_subscription;
     $magazine->discount = $request->discount;
     $magazine->single_issue_after_discount =  $request->single_issue_after_discount;
     $magazine->annual_cost_after_discount =  $request->annual_subscription_after_discount;

     $magazine->total_pages = $request->number_of_pages;
     $magazine->total_multicolour_pages = $request->multicolour_pages;
     $magazine->total_monocolour_pages =  $request->monocolour_pages; 
     $magazine->magazine_size = $request->magazine_size; 
     $magazine->gsm = $request->gsm;
     $magazine->papertype = $request->type_paper;
     $magazine->paperfinishing = $request->paper_finishing;
     $magazine->highlights = $request->quotes_one;
     $magazine->periodical_short_info = $request->periodical_short_info;
     $magazine->about_editor = $request->about_editor;
     $magazine->contact_person = $request->contact_person_name; 
     $magazine->phone =  $request->phone_number; 
     $magazine->email =$request->email_id; 
     $magazine->address = $request->contact_person_address; 
     $magazine->country = $request->country;
     $magazine->state = $request->state;
     $magazine->district = $request->district;
     $magazine->city = $request->city;
     $magazine->pincode = $request->pincode;
     $magazine->official_address = $request->offcial_address;
     $magazine->user_type = "publisher";
     $magazine->user_id = $user->id;
     $magazine->bank_Name =$request->bank_Name;
     $magazine->ifsc_Code = $request->ifsc_Code;
     $magazine->ban_Acc_Num = $request->ban_Acc_Num;
     $magazine->acc_Hol_Nam =$request->acc_Hol_Nam;
     $magazine->save();
     return back()->with('success',"Magazine Create successfully");
  } 

  public function getDistricts(Request $request)
  {
      $stateId = $request->state_id;
      $state = State::where('name',$stateId)->first();
      $districts = District::where('state_id', $state->id)->get();
      
      return response()->json(['districts' => $districts]);
  }


  public function procurement(){
   $id=auth('periodical_publisher')->user()->id;
    $data=Magazine::where('user_id','=',$id)->where('periodical_procurement_status','=',"0")->get();
    return view('periodical_publisher.procurement')->with('data',$data);
}
  
public function applay_procurment(Request $request){
  $validator = Validator::make($request->all(), [

      'periodicalId'=> 'required|array|min:1',
    
  ]);

  if ($validator->fails()) {
      $data = [
          'error' => $validator->errors()->first(),
      ];
      return response()->json($data);
  }
  $periodicalitem=[];
  $periodicalIds = $request->input('periodicalId', []);
  foreach($periodicalIds as $key=>$val){
 
      $periodicals = Magazine::find($val);
      array_push($periodicalitem,$periodicals);

  }

  \Session::put('periodicalitem', $periodicalitem);
  $user = auth('periodical_publisher')->user();
  \Session::put('user',$user);
  $data= [
      'success' => 'Periodical Applied For Procurement',
           ];
  return response()->json($data);  
}

// 

public function procurement_sampleperiodical(){

  $id=auth('periodical_publisher')->user()->id;
  $data=Magazine::where('user_id','=',$id)->where('periodical_procurement_status','=',"5")->where('periodical_status','=',null)->get(); 
  return view('periodical_publisher.procurement_sampleperiodical')->with('data',$data); 
}

public function procurementperiodicalcopies(Request $request){
 
  $datarec1=[];
  
  $datarecJson = json_decode($request->datarec);
  foreach ($datarecJson as $key => $val) {
   $pdfcopies = $request->file('profileImage'.$key);

    $pdf_name = $request->librarytype . time() . '_' . $pdfcopies->getClientOriginalName();
    $pdfcopies->move(('Magazine/copies'), $pdf_name);
    $val->profileImage = $pdf_name;
    
    array_push($datarec1,$val);
}
  
    $periodicalcopies=new periodicalcopies();
    $periodicalcopies->periodicalid =  $request->periodicalid;
    $periodicalcopies->periodicaltitle =  $request->periodicaltitle;
    $periodicalcopies->copies =  json_encode($datarec1);
    $periodicalcopies->userid =  auth('periodical_publisher')->user()->id;
    $periodicalcopies->usertype =  auth('periodical_publisher')->user()->usertype;
    if($periodicalcopies->save()){

        $Magazine =Magazine::find($request->periodicalid);
        $Magazine->periodical_procurement_status="6";
        $Magazine->save();
        return response()->json(['success' => 'copies send successfull']);

    }


}

public function procurement_sampleperiodicalpending(){

 $id=auth('periodical_publisher')->user()->id;
   $data1=Magazine::where('user_id','=',$id)->where('periodical_procurement_status','=',"6")->where('periodical_status','=',null)->get(); 
   $data=[];
   foreach($data1 as $key=>$val){
       $periodicalcopies=periodicalcopies::where('periodicalid','=',$val->id)->first();
         $copies=  json_decode($periodicalcopies->copies);
         $val->copies=$copies;
         array_push($data,$val);
       }
    
  return view('periodical_publisher.procurement_sampleperiodicalpending')->with('data',$data); 
}
public function procurement_sampleperiodicalcomplete(){
  $id=auth('periodical_publisher')->user()->id;
   $data1=Magazine::where('user_id','=',$id)->where('periodical_procurement_status','=',"1")->where('periodical_status','=',null)->get(); 
   $data=[];
   foreach($data1 as $key=>$val){
       $periodicalcopies=periodicalcopies::where('periodicalid','=',$val->id)->first();
         $copies=  json_decode($periodicalcopies->copies);
         $val->copies=$copies;
         array_push($data,$val);
       }
  
  return view('periodical_publisher.procurement_sampleperiodicalcomplete')->with('data',$data); 
}

public function magazine_edit($id){
  $magazine = Magazine::find($id);
  \Session::put('magazine', $magazine);
  return redirect('periodical_publisher/magazineupdate'); 
}
  }

  