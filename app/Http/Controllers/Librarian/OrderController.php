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



class OrderController extends Controller
{
  
     public function dispatch_magazine_list($id){
      $Ordermagazine=Ordermagazine::find($id);
      $balanceAmount =json_decode($Ordermagazine->balanceAmount);
     $magazineProduct =json_decode($Ordermagazine->magazineProduct);
     $dispatch_magazin=[];
     foreach($balanceAmount  as $val1){
    foreach($magazineProduct  as $val){
        $magazinesrec = Magazine::find($val->magazineid);
        $magazinesrec->orderid=$Ordermagazine->id;
        if($val1->category == $magazinesrec->category){
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
   if($datedata >= $ldate){
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
    if($req->selectval == "Arrived"){
             $Dispatchdata = Dispatch::find($req->id);
             $not_received_id = json_decode($Dispatchdata->not_received_id);
             $not_received_id1=[];
             array_push($not_received_id1, auth('librarian')->user()->id);
             $result = array_filter($not_received_id1, function($element) use ($not_received_id) {
                 return in_array($element, $not_received_id);
                 });
              
           if(count($result) == 0){
            $dataarr = [];
            array_push($dataarr,auth('librarian')->user()->id );
            $received_id = json_decode($Dispatchdata->received_id);
           $merged = array_merge($dataarr,$received_id);
           $Dispatchdata->received_id=json_encode($merged);
           if($Dispatchdata->save()){
            $data= [
                'success' => 'Status change Successfully',
                'url' => '/librarian/magazine-view-freq/' . $req->magazineid . '/' . $req->orderid
            ];
            return response()->json($data); 
           }
           }else{
            $Dispatchdata = Dispatch::find($req->id);
            $not_received_id = json_decode($Dispatchdata->not_received_id);
            $not_received_id1=[];
            array_push($not_received_id1, auth('librarian')->user()->id);
            $merged = array_diff($not_received_id1,$not_received_id);
           
            $Dispatchdata->not_received_id=json_encode($merged);
        
            $dataarr = [];
            array_push($dataarr,auth('librarian')->user()->id );
            $received_id = json_decode($Dispatchdata->received_id);
           $merged1 = array_merge($dataarr,$received_id);
           $Dispatchdata->received_id=json_encode($merged1);
           if($Dispatchdata->save()){
            $data= [
                'success' => 'Status change Successfully',
                'url' => '/librarian/magazine-view-freq/' . $req->magazineid . '/' . $req->orderid
            ];
            return response()->json($data); 
        }
           
           }

            
          
    }else{
        $Dispatchdata = Dispatch::find($req->id);
        $dataarr = [];
       array_push($dataarr,auth('librarian')->user()->id );
       $not_received_id = json_decode($Dispatchdata->not_received_id);
      $merged = array_merge($dataarr,$not_received_id);
      $Dispatchdata->not_received_id=json_encode($merged);
      if($Dispatchdata->save()){
       $data= [
           'success' => 'Status change Successfully',
           'url' => '/librarian/magazine-view-freq/' . $req->magazineid . '/' . $req->orderid
       ];
       return response()->json($data); 
      }
    }

}

}