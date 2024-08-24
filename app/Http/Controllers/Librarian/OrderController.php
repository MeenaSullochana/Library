<?php

namespace App\Http\Controllers\Librarian;
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
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Notification;
use App\Notifications\Member1detailNotification;
use DB;
use App\Models\Ordermagazine;
use App\Models\Magazine;
use App\Models\Budget;
use App\Models\bookcopies;
use App\Models\Dispatch;
use App\Models\Subscription;
use App\Models\MagazineCategory;



class OrderController extends Controller
{
  
     public function dispatch_magazine_list($id){
      $Ordermagazine=Ordermagazine::find($id);
      $balanceAmount =json_decode($Ordermagazine->balanceAmount);
     $magazineProduct =json_decode($Ordermagazine->magazineProduct);
     $dispatch_magazin=[];
     $dispatch_magazin1=[];

     foreach($balanceAmount  as $val1){
    foreach($magazineProduct  as $val){
       
        $magazinesrec = Magazine::find($val->magazineid);
    
        $magazinesrec->orderid=$Ordermagazine->id;
        // if($val1->category == $magazinesrec->category){
        //     array_push($dispatch_magazin1,$magazinesrec);
        // }
        if($val1->category == $magazinesrec->category){
            $ldate = date('Y-m-d');
           $Subscription = Subscription::where('magazine_id' ,'=',$magazinesrec->id)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
            $total=0;
            $recived=0;
            $notrecived=0;
        
            if($Subscription !=null){
                $Dispatchdata = Dispatch::where('magazine_id', '=', $magazinesrec->id)    
                 ->where(function ($query) use ($Ordermagazine) {
                         $query->whereJsonContains('library_id', $Ordermagazine->librarianid)
                              ->orWhereJsonContains('library_id', (string) $Ordermagazine->librarianid); 
         
                 })
                 ->where(function ($query) use ($Ordermagazine) {
                     $query->whereJsonContains('order_id', $Ordermagazine->id)
                           ->orWhereJsonContains('order_id', (string) $Ordermagazine->id); 
                 })
                 ->orderBy('expected_date','ASC')
                 ->where('subscription_id','=',$Subscription->id)
                 ->get();
          if($Dispatchdata->isNotEmpty()){
                 $total= count($Dispatchdata);
              foreach($Dispatchdata  as $val){
                 $received_id = json_decode($val->received_id);
                 $received_id1=[];
                 array_push($received_id1, $Ordermagazine->librarianid);
                 $result = array_filter($received_id1, function($element) use ($received_id) {
                     return in_array($element, $received_id);
                     });
                  
                 $not_received_id = json_decode($val->not_received_id);
                 $not_received_id1=[];
                 array_push($not_received_id1,  $Ordermagazine->librarianid);
                 $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
                     return in_array($element, $not_received_id);
                     });
             
             
                if(count($result) !=0){
                 $recived=$recived + 1;
                
                }elseif(count($result2) !=0){
              
                 $notrecived = $notrecived + 1;
        
                }
                
        
                $magazinesrec->totalorder=$total;
                $magazinesrec->recived=$recived;
                $magazinesrec->notrecived=$notrecived;
                $magazinesrec->orderid=$Ordermagazine->id;
              }
             }
          }
        
        
        
        
              array_push($dispatch_magazin,$magazinesrec);
          }
    }

}




    \Session::put('dispatch_magazin', $dispatch_magazin);
 
    return redirect('librarian/dispatchmagazine');    

   }
    

   public function magazine_view_freq($id,$orderid){
   $Ordermagazine=Ordermagazine::find($orderid);
   $ldate = date('Y-m-d');
   $Subscription = Subscription::where('magazine_id' ,'=',$id)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
  
   if($Subscription != null){
   $Dispatchdata = Dispatch::where('magazine_id', '=', $id)
          ->where(function ($query) use ($Ordermagazine) {
                  $query->whereJsonContains('library_id', $Ordermagazine->librarianid)
                       ->orWhereJsonContains('library_id', (string) $Ordermagazine->librarianid); 

          })
          ->where(function ($query) use ($Ordermagazine) {
              $query->whereJsonContains('order_id', $Ordermagazine->id)
                    ->orWhereJsonContains('order_id', (string) $Ordermagazine->id); 
          })
          ->orderBy('expected_date','ASC')
          ->where('subscription_id','=',$Subscription->id)
          ->get();

       $data=[];
    foreach($Dispatchdata  as $val){
    $datedata =  $val->expected_date;
   $ldate = date('Y-m-d');




   if($datedata > $ldate){

    $val->status="1";
    $val->order=$Ordermagazine->id;
    array_push($data,$val);
   }else{
    $received_id = json_decode($val->received_id);
    $received_id1=[];
    array_push($received_id1, auth('librarian')->user()->id);
    $result = array_filter($received_id1, function($element) use ($received_id) {
        return in_array($element, $received_id);
        });
     

     $pending_id = json_decode($val->pending_id);
     $pending_id1=[];
     array_push($pending_id1, auth('librarian')->user()->id);
     $result1 = array_filter($pending_id1, function($element) use ($pending_id) {
        return in_array($element, $pending_id);
        });

    $not_received_id = json_decode($val->not_received_id);
    $not_received_id1=[];
    array_push($not_received_id1, auth('librarian')->user()->id);
    $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
        return in_array($element, $not_received_id);
        });


   if(count($result) !=0){
    $val->order=$Ordermagazine->id;

    $val->status="2";
    array_push($data,$val);
   }elseif(count($result1) !=0){
    $val->order=$Ordermagazine->id;

    $val->status="4";
    array_push($data,$val);
   }elseif(count($result2) !=0){
    $val->order=$Ordermagazine->id;

    $val->status="3";
    array_push($data,$val);
   }else{
    $val->order=$Ordermagazine->id;

    $val->status="0";
    array_push($data,$val);
   }
     

   }


   }
}
// return $data;
   \Session::put('data', $data);

   return redirect('librarian/dispatchdata');    


   
}

public function magazinestatuschange(Request $req){
    $librarianId = auth('librarian')->user()->id;
    $Dispatchdata = Dispatch::find($req->id);
    
    if (!$Dispatchdata) {
        return response()->json(['error' => 'Dispatch not found'], 404);
    }
    
    $not_received_id = json_decode($Dispatchdata->not_received_id, true);
    $received_id = json_decode($Dispatchdata->received_id, true);
    
    if ($req->selectval == "Arrived") {
        if (!in_array($librarianId, $not_received_id)) {
            $received_id[] = $librarianId;
            $Dispatchdata->received_id = json_encode($received_id);
        } else {
            $not_received_id = array_diff($not_received_id, [$librarianId]);
            $Dispatchdata->not_received_id = json_encode(array_values($not_received_id));
            $received_id[] = $librarianId;
            $Dispatchdata->received_id = json_encode($received_id);
        }
    } else {
        if (!in_array($librarianId, $received_id)) {
            $not_received_id[] = $librarianId;
            $Dispatchdata->not_received_id = json_encode($not_received_id);
        } else {
            $received_id = array_diff($received_id, [$librarianId]);
            $Dispatchdata->received_id = json_encode(array_values($received_id));
            $not_received_id[] = $librarianId;
            $Dispatchdata->not_received_id = json_encode($not_received_id);
        }
    }
    
    if ($Dispatchdata->save()) {
        $data = [
            'success' => 'Status changed successfully',
            'url' => '/librarian/magazine-view-freq/' . $req->magazineid . '/' . $req->orderid
        ];
        return response()->json($data);
    } else {
        return response()->json(['error' => 'Failed to change status'], 500);
    }
}


// magazine_overview_list
public function dispatch_overview(Request $req){

      $orders1 = Ordermagazine::where('status', '=', '0')->get();
    
      $orders=[];

      foreach ($orders1 as $val) {

          $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
         if( $Librarian->isNotEmpty()){
          array_push($orders,$val);
         }
          
      }
   
  
  
  $magazineCounts = [];
  
  foreach ($orders as $order) {
  
      $magazineProducts = json_decode($order->magazineProduct, true);
  
      foreach ($magazineProducts as $magazineProduct) {
          $magazineId = $magazineProduct['magazineid'];
  
          if (!isset($magazineCounts[$magazineId])) {
              $magazineCounts[$magazineId] = [
                  'id' => $magazineId,
                  'orderid' => [], 
                  'count' => 0
              ];
          }
          $magazineCounts[$magazineId]['orderid'][] = $order->id;
          $magazineCounts[$magazineId]['count']++;
      }
  }
 
  $magazineCounts = array_values($magazineCounts);

  $magazinedata = [];
  foreach ($magazineCounts as $val) {

      $magazine = Magazine::find($val['id']);

      if ($magazine) {
          $magazine->count = $val['count'];

          $magazine->orderid = $val['orderid'];
          $magazinedata[] = $magazine;
      }
  }

 
  $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();

  $datas=[];
    foreach($magazinebudget  as $val1){
   foreach($magazinedata  as $val){
    if($val1->name == $val->category){
    
        array_push($datas,$val);
    }
   
      
   }
  }
  
//   return $datas;
       return view('librarian.dispatch_overview')->with('datas',$datas); 

}
public function dispatch_library_over_magazine_list($id,$orderid){
  $orderidArray = explode(',', $orderid);

    $rec = [];
    foreach($orderidArray  as $val){
        // return $val;
        $Ordermagazine = Ordermagazine::find($val);
        $ldate = date('Y-m-d');
        $Subscription = Subscription::where('magazine_id' ,'=',$id)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
       $total=0;
       $recived=0;
       $notrecived=0;

       if($Subscription !=null){
             $Dispatchdata = Dispatch::where('magazine_id', '=', $id)    
            ->where(function ($query) use ($Ordermagazine) {
                    $query->whereJsonContains('library_id', $Ordermagazine->librarianid)
                         ->orWhereJsonContains('library_id', (string) $Ordermagazine->librarianid); 
    
            })
            ->where(function ($query) use ($Ordermagazine) {
                $query->whereJsonContains('order_id', $Ordermagazine->id)
                      ->orWhereJsonContains('order_id', (string) $Ordermagazine->id); 
            })
            ->orderBy('expected_date','ASC')
            ->where('subscription_id','=',$Subscription->id)
            ->get();
         if($Dispatchdata->isNotEmpty()){
            $total= count($Dispatchdata);
         foreach($Dispatchdata  as $val){
            $received_id = json_decode($val->received_id);
            $received_id1=[];
            array_push($received_id1, $Ordermagazine->librarianid);
            $result = array_filter($received_id1, function($element) use ($received_id) {
                return in_array($element, $received_id);
                });
             
            $not_received_id = json_decode($val->not_received_id);
            $not_received_id1=[];
            array_push($not_received_id1,  $Ordermagazine->librarianid);
            $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
                return in_array($element, $not_received_id);
                });
        
        
           if(count($result) !=0){
            $recived=$recived + 1;
           
           }elseif(count($result2) !=0){
         
            $notrecived = $notrecived + 1;

           }
           
 

         }
        }
     }
        $magazine = Magazine::find($id);
        $Ordermagazine->magazinetitle=$magazine->title;
        $Ordermagazine->periodicity=$magazine->periodicity;
        $Ordermagazine->magazineid=$magazine->id;
      $librarian = Librarian::find($Ordermagazine->librarianid);
        $Ordermagazine->librarytype=$librarian->libraryType;
        $Ordermagazine->libraryid=$librarian->librarianId;
        $Ordermagazine->libraryname=$librarian->libraryName;
        $Ordermagazine->district=$librarian->district;
        $Ordermagazine->totalorder=$total;
        $Ordermagazine->recived=$recived;
        $Ordermagazine->notrecived=$notrecived;

    
 
     array_push($rec,$Ordermagazine);
    }

      $dispatchlibrary = $rec ;
    \Session::put('dispatchlibrary', $dispatchlibrary);

    return redirect('librarian/dispatch_library');    
}
public function order_library_item_list($id){

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
    $ldate = date('Y-m-d');
   $Subscription = Subscription::where('magazine_id' ,'=',$magazinesrec->id)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
    $total=0;
    $recived=0;
    $notrecived=0;

    if($Subscription !=null){
        $Dispatchdata = Dispatch::where('magazine_id', '=', $magazinesrec->id)    
         ->where(function ($query) use ($Ordermagazine) {
                 $query->whereJsonContains('library_id', $Ordermagazine->librarianid)
                      ->orWhereJsonContains('library_id', (string) $Ordermagazine->librarianid); 
 
         })
         ->where(function ($query) use ($Ordermagazine) {
             $query->whereJsonContains('order_id', $Ordermagazine->id)
                   ->orWhereJsonContains('order_id', (string) $Ordermagazine->id); 
         })
         ->orderBy('expected_date','ASC')
         ->where('subscription_id','=',$Subscription->id)
         ->get();
  if($Dispatchdata->isNotEmpty()){
         $total= count($Dispatchdata);
      foreach($Dispatchdata  as $val){
         $received_id = json_decode($val->received_id);
         $received_id1=[];
         array_push($received_id1, $Ordermagazine->librarianid);
         $result = array_filter($received_id1, function($element) use ($received_id) {
             return in_array($element, $received_id);
             });
          
         $not_received_id = json_decode($val->not_received_id);
         $not_received_id1=[];
         array_push($not_received_id1,  $Ordermagazine->librarianid);
         $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
             return in_array($element, $not_received_id);
             });
     
     
        if(count($result) !=0){
         $recived=$recived + 1;
        
        }elseif(count($result2) !=0){
      
         $notrecived = $notrecived + 1;

        }
        

        $magazinesrec->totalorder=$total;
        $magazinesrec->recived=$recived;
        $magazinesrec->notrecived=$notrecived;
        $magazinesrec->orderid=$Ordermagazine->id;
      }
     }
  }




      array_push($datas,$magazinesrec);
  }
 

 }
}




\Session::put('datas', $datas);
return redirect('librarian/order_library_item_list');   
}





public function dispatch_magazine_view($id,$orderid){

    $Ordermagazine=Ordermagazine::find($orderid);
    $ldate = date('Y-m-d');
    $Subscription = Subscription::where('magazine_id' ,'=',$id)->whereDate('issue_date','<=',$ldate)->where('end_date','>=',$ldate)->first();
   
    if($Subscription != null){
    $Dispatchdata = Dispatch::where('magazine_id', '=', $id)
           ->where(function ($query) use ($Ordermagazine) {
                   $query->whereJsonContains('library_id', $Ordermagazine->librarianid)
                        ->orWhereJsonContains('library_id', (string) $Ordermagazine->librarianid); 
 
           })
           ->where(function ($query) use ($Ordermagazine) {
               $query->whereJsonContains('order_id', $Ordermagazine->id)
                     ->orWhereJsonContains('order_id', (string) $Ordermagazine->id); 
           })
           ->orderBy('expected_date','ASC')
           ->where('subscription_id','=',$Subscription->id)
           ->get();
 
        $data=[];
     foreach($Dispatchdata  as $val){
     $datedata =  $val->expected_date;
     $ldate = date('Y-m-d');
    if($datedata > $ldate){
     $val->status="1";
     $val->order=$Ordermagazine->id;
     array_push($data,$val);
    }else{
     $received_id = json_decode($val->received_id);
     $received_id1=[];
     array_push($received_id1,  $Ordermagazine->librarianid);
     $result = array_filter($received_id1, function($element) use ($received_id) {
         return in_array($element, $received_id);
         });
      
 
      $pending_id = json_decode($val->pending_id);
      $pending_id1=[];
      array_push($pending_id1, $Ordermagazine->librarianid);
      $result1 = array_filter($pending_id1, function($element) use ($pending_id) {
         return in_array($element, $pending_id);
         });
 
     $not_received_id = json_decode($val->not_received_id);
     $not_received_id1=[];
     array_push($not_received_id1, $Ordermagazine->librarianid);
     $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
         return in_array($element, $not_received_id);
         });
 
 
    if(count($result) !=0){
     $val->order=$Ordermagazine->id;
 
     $val->status="2";
     array_push($data,$val);
    }elseif(count($result1) !=0){
     $val->order=$Ordermagazine->id;
 
     $val->status="4";
     array_push($data,$val);
    }elseif(count($result2) !=0){
     $val->order=$Ordermagazine->id;
 
     $val->status="3";
     array_push($data,$val);
    }else{
     $val->order=$Ordermagazine->id;
 
     $val->status="0";
     array_push($data,$val);
    }
      
 
    }
 
 
    }
 }

     $fredata= $data;
    \Session::put('fredata', $fredata);
 
    return redirect('librarian/dispatch-magazine-view');    
 
 
    
 }
 
 
}