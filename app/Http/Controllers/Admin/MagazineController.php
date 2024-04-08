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
use File;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Magazine;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use App\Models\Mailurl;
 use App\Models\Budget;

 
 use Illuminate\Support\Facades\Auth;

 use App\Models\Ordermagazine;

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
  public function magazine_order_list(){
    $orders = Ordermagazine::where('status', '=', '1')->get();
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
        // Assuming you have a Magazine model
        $magazine = Magazine::find($val['id']);
    
        if ($magazine) {
            $magazine->count = $val['count'];
            $magazinedata[] = $magazine;
        }
    }
    
    return $magazinedata;
  }    
}