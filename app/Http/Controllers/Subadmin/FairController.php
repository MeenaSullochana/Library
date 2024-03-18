<?php

namespace App\Http\Controllers\Subadmin;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Events;
use App\Models\ApplicationApply;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
class FairController extends Controller
{
  public function district(){
      $district = District::all();
    
      return view('sub_admin/fair_manage_add')->with('district',$district);   
  }

  public function fairmanagelist(){
 
    $district=auth('subadmin')->user()->district;
    $event = Events::where('district', '=', $district)->orderBy('created_at', 'desc')->get();      
    foreach($event as $key=>$val){
      $date=Carbon::now()->format('Y-m-d');
      $Time=Carbon::now()->format('H:i');
      $events =Events::where('id', '=',$val->id)->whereDate('startDate', '<=', $date)
     ->whereDate('clossingDate', '>=', $date)
     ->first();
       if($events !=null){
      $eventdata = Events::where('id', '=', $val->id)
     ->whereDate('clossingDate', '=', $date)
     ->first();
     if($eventdata !== null){
      $eventdatas = Events::where('id', '=', $val->id)
      ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '>=', $Time)
      ->first();
      if($eventdatas == null){
         $event = Events::find($val->id);
        $event->status="0";
         $event->save();
      }else{
        $event = Events::find($val->id);
        $event->status="1";
        $event->save();
       }
     }else{
      $event = Events::find($val->id);
      $event->status="1";
      $event->save();
     }
     }
     $events1 =Events::where('id', '=',$val->id)
     ->whereDate('clossingDate', '<=', $date)
     ->first();
       if($events1 !=null){
      $eventdata1 = Events::where('id', '=', $val->id)
     ->whereDate('clossingDate', '=', $date)
     ->first();
     if($eventdata1 !== null){
      $eventdatas1 = Events::where('id', '=', $val->id)
      ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '<=', $Time)
      ->first();
      if($eventdatas1 == null){
        $event = Events::find($val->id);
        $event->status="1";
        $event->save();
      }else{
        $event = Events::find($val->id);
        $event->status="0";
        $event->save();
       }
     }else{
      $event = Events::find($val->id);
      $event->status="0";
      $event->save();
     }
     }

     $events2 =Events::where('id', '=',$val->id)
     ->whereDate('startDate', '>=', $date)
     ->first();
       if($events2 !=null){
        
      $eventdata1 = Events::where('id', '=', $val->id)
     ->whereDate('startDate', '=', $date)
     ->first();
     if($eventdata1 !== null){
      $eventdatas1 = Events::where('id', '=', $val->id)
      ->whereDate('startDate', '=', $date)->whereTime('startTime', '>=', $Time)
      ->first();
      if($eventdatas1 !== null){
        $event = Events::find($val->id);
        $event->status="2";
        $event->save();
      }
     }else{
      $event = Events::find($val->id);
      $event->status="2";
      $event->save();
     }
     }

  }
     $events = Events::where('district', '=', $district)->orderBy('created_at', 'desc')->get();
      return view('sub_admin/fair_manage_list')->with('events',$events);   
 }
 

  public function fairmanageprevious(){
  
    $district=auth('subadmin')->user()->district;
    $event = Events::where('district', '=', $district)->orderBy('created_at', 'desc')->get();      
    foreach($event as $key=>$val){
      $date=Carbon::now()->format('Y-m-d');
      $Time=Carbon::now()->format('H:i');
      $events =Events::where('id', '=',$val->id)->whereDate('startDate', '<=', $date)
     ->whereDate('clossingDate', '>=', $date)
     ->first();
       if($events !=null){
      $eventdata = Events::where('id', '=', $val->id)
     ->whereDate('clossingDate', '=', $date)
     ->first();
     if($eventdata !== null){
      $eventdatas = Events::where('id', '=', $val->id)
      ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '>=', $Time)
      ->first();
      if($eventdatas == null){
         $event = Events::find($val->id);
        $event->status="0";
         $event->save();
      }else{
        $event = Events::find($val->id);
        $event->status="1";
        $event->save();
       }
     }else{
      $event = Events::find($val->id);
      $event->status="1";
      $event->save();
     }
     }
     $events1 =Events::where('id', '=',$val->id)
     ->whereDate('clossingDate', '<=', $date)
     ->first();
       if($events1 !=null){
      $eventdata1 = Events::where('id', '=', $val->id)
     ->whereDate('clossingDate', '=', $date)
     ->first();
     if($eventdata1 !== null){
      $eventdatas1 = Events::where('id', '=', $val->id)
      ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '<=', $Time)
      ->first();
      if($eventdatas1 == null){
        $event = Events::find($val->id);
        $event->status="1";
        $event->save();
      }else{
        $event = Events::find($val->id);
        $event->status="0";
        $event->save();
       }
     }else{
      $event = Events::find($val->id);
      $event->status="0";
      $event->save();
     }
     }

     $events2 =Events::where('id', '=',$val->id)
     ->whereDate('startDate', '>=', $date)
     ->first();
       if($events2 !=null){
        
      $eventdata1 = Events::where('id', '=', $val->id)
     ->whereDate('startDate', '=', $date)
     ->first();
     if($eventdata1 !== null){
      $eventdatas1 = Events::where('id', '=', $val->id)
      ->whereDate('startDate', '=', $date)->whereTime('startTime', '>=', $Time)
      ->first();
      if($eventdatas1 !== null){
        $event = Events::find($val->id);
        $event->status="2";
        $event->save();
      }
     }else{
      $event = Events::find($val->id);
      $event->status="2";
      $event->save();
     }
     }

  }
     $events = Events::where('district', '=', $district)->where('status', '0')->orderBy('created_at', 'desc')->get();
      return view('sub_admin/fair_manage_previous')->with('events',$events);   
 }
 public function fairmanagecurrent(){
  
    $district=auth('subadmin')->user()->district;
    $event = Events::where('district', '=', $district)->orderBy('created_at', 'desc')->get();    
  foreach($event as $key=>$val){
    $date=Carbon::now()->format('Y-m-d');
    $Time=Carbon::now()->format('H:i');
    $events =Events::where('id', '=',$val->id)->whereDate('startDate', '<=', $date)
   ->whereDate('clossingDate', '>=', $date)
   ->first();
     if($events !=null){
    $eventdata = Events::where('id', '=', $val->id)
   ->whereDate('clossingDate', '=', $date)
   ->first();
   if($eventdata !== null){
    $eventdatas = Events::where('id', '=', $val->id)
    ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '>=', $Time)
    ->first();
    if($eventdatas == null){
       $event = Events::find($val->id);
      $event->status="0";
       $event->save();
    }else{
      $event = Events::find($val->id);
      $event->status="1";
      $event->save();
     }
   }else{
    $event = Events::find($val->id);
    $event->status="1";
    $event->save();
   }
   }
   $events1 =Events::where('id', '=',$val->id)
   ->whereDate('clossingDate', '<=', $date)
   ->first();
     if($events1 !=null){
    $eventdata1 = Events::where('id', '=', $val->id)
   ->whereDate('clossingDate', '=', $date)
   ->first();
   if($eventdata1 !== null){
    $eventdatas1 = Events::where('id', '=', $val->id)
    ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '<=', $Time)
    ->first();
    if($eventdatas1 == null){
      $event = Events::find($val->id);
      $event->status="1";
      $event->save();
    }else{
      $event = Events::find($val->id);
      $event->status="0";
      $event->save();
     }
   }else{
    $event = Events::find($val->id);
    $event->status="0";
    $event->save();
   }
   }

   $events2 =Events::where('id', '=',$val->id)
   ->whereDate('startDate', '>', $date)
   ->first();
     if($events2 !=null){
      
    $eventdata1 = Events::where('id', '=', $val->id)
   ->whereDate('startDate', '=', $date)
   ->first();
   if($eventdata1 !== null){
    $eventdatas1 = Events::where('id', '=', $val->id)
    ->whereDate('startDate', '=', $date)->whereTime('startTime', '>=', $Time)
    ->first();
    if($eventdatas1 !== null){
      $event = Events::find($val->id);
      $event->status="2";
      $event->save();
    }
   }else{
    $event = Events::find($val->id);
    $event->status="2";
    $event->save();
   }
   }

}
   $events = Events::where('district', '=', $district)->where('status', '1')->orderBy('created_at', 'desc')->get();
    return view('sub_admin/fair_manage_previous')->with('events',$events);   
}
public function fairmanageupcomming(){
  $district=auth('subadmin')->user()->district;
    $event = Events::where('district', '=', $district)->orderBy('created_at', 'desc')->get();    
 
foreach($event as $key=>$val){
  $date=Carbon::now()->format('Y-m-d');
  $Time=Carbon::now()->format('H:i');
  $events =Events::where('id', '=',$val->id)->whereDate('startDate', '<=', $date)
 ->whereDate('clossingDate', '>=', $date)
 ->first();
   if($events !=null){
  $eventdata = Events::where('id', '=', $val->id)
 ->whereDate('clossingDate', '=', $date)
 ->first();
 if($eventdata !== null){
  $eventdatas = Events::where('id', '=', $val->id)
  ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '>=', $Time)
  ->first();
  if($eventdatas == null){
    $event = Events::find($val->id);
    $event->status="0";
    $event->save();
  }else{
    $event = Events::find($val->id);
    $event->status="1";
    $event->save();
   }
 }else{
  $event = Events::find($val->id);
  $event->status="1";
  $event->save();
 }
 }
 $events1 =Events::where('id', '=',$val->id)
 ->whereDate('clossingDate', '>=', $date)
 ->first();
   if($events1 !=null){
  $eventdata1 = Events::where('id', '=', $val->id)
 ->whereDate('clossingDate', '=', $date)
 ->first();
 if($eventdata1 !== null){
  $eventdatas1 = Events::where('id', '=', $val->id)
  ->whereDate('clossingDate', '=', $date)->whereTime('clossingTime', '<=', $Time)
  ->first();
  if($eventdatas1 == null){
    $event = Events::find($val->id);
    $event->status="1";
    $event->save();
  }else{
    $event = Events::find($val->id);
    $event->status="0";
    $event->save();
   }
 }else{
  $event = Events::find($val->id);
  $event->status="0";
  $event->save();
 }
 }

 $events2 =Events::where('id', '=',$val->id)
 ->whereDate('startDate', '>=', $date)
 ->first();
   if($events2 !=null){
  $eventdata2 = Events::where('id', '=', $val->id)
 ->whereDate('startDate', '=', $date)
 ->first();
 if($eventdata2 !== null){
  $eventdatas2 = Events::where('id', '=', $val->id)
  ->whereDate('startDate', '=', $date)->whereTime('startTime', '>=', $Time)
  ->first();
  if($eventdatas2 !== null){
    $event = Events::find($val->id);
    $event->status="2";
    $event->save();
  }
 }else{
  $event = Events::find($val->id);
  $event->status="2";
  $event->save();
 }
 }

}
 return $events = Events::where('district', '=', $district)->where('status', '2')->orderBy('created_at', 'desc')->get();
  return view('sub_admin/fair_manage_upcomming')->with('events',$events);   
}
  public function fairmanageview($id){
      $event = Events::find($id);
    
      return redirect('sub_admin/fair_manage_view')->with('event',$event);   
  }
  public function fairmanagedelete($id){
    $events = Events::find($id);
    $events->delete();
    return back()->with('success','Events Deleted Successfully');
  }
  
  public function fairmanageedit($id){

    $event = Events::find($id);
    $event->startdatetime= date('Y-m-d\TH:i', strtotime("$event->startDate $event->startTime"));
    $event->clossingdatetime= date('Y-m-d\TH:i', strtotime("$event->clossingDate $event->clossingTime"));
    $district = District::all();
    $event->District= $district;
    return redirect('sub_admin/fair_manage_edit')->with('event',$event);   
}
  


  public function fairmanageadd(Request $req){

      try{
          $validator = Validator::make($req->all(),[
              'eventTitle'=>'required|string',
              'contactPersonName'=>'required|string',
               'startdatetime'=>'required|string',
               'clossingdatetime'=>'required',
               'location'=>'required',
               'district'=>'required',
               'email'=>'required|email',
               'website'=>'required|string',
               'address'=>'required|string',
               'mobileNumber'=>'required|string|min:10',
               'description'=>'required',
               'comment'=>'required',
               
               'emergencyMobileNumber'=>'required|string|min:10',
               'authorityMobileNumber'=>'required|string|min:10',
               'emergencyContactnName'=>'required',
               'emergencyDesignation'=>'required',
               'authorityContactnName'=>'required',
               'authorityDesignation'=>'required',
               'applyFromDate'=>'required',
               'applyToDate'=>'required',
               'totalStall'=>'required',
          ]);
        if($validator->fails()){
          return back()->withInput()->with('error',$validator->errors());
      }
            $disti=$req->district;
            $district=auth('subadmin')->user()->district;
             if( $district == $disti){

             
            $stdate = date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
            $cldate = date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
            $events = Events::where('district', '=', $disti)
            ->where(function($query) use ($stdate, $cldate) {
                $query->whereDate('startDate', '<=', $stdate)
                      ->whereDate('clossingDate', '>=', $stdate)
                      ->orWhere(function($query) use ($stdate, $cldate) {
                          $query->whereDate('startDate', '<=', $cldate)
                                ->whereDate('clossingDate', '>=', $cldate);
                      });
            })
            ->get();
             
             if($events->isNotEmpty()){
              $data=[];
              foreach($events as $key=>$val){
              $stdate = date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
              $cldate = date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
              $startTime = date("H:i", strtotime($req->startdatetime));
              $clTime = date("H:i", strtotime($req->clossingdatetime));
              $eventdatas = Events::where('id', '=', $val->id)
                  ->where(function($query) use ($stdate, $startTime, $cldate, $clTime) {
                      $query->whereDate('clossingDate', '=', $stdate)
                            ->whereTime('clossingTime', '<=', $startTime)
                            ->orWhereDate('startDate', '=', $cldate)
                            ->whereTime('startTime', '>=', $clTime);
                  })
                  ->first();
                   if($eventdatas !=null){
                  array_push($data,$eventdatas);
                   }
                }
             if(count($data) === count($events)){ 
            $events = new Events();
            $events->eventTitle = $req->eventTitle;
            $events->contactPersonName = $req->contactPersonName;
            $events->location = $req->location;
            $events->district = $req->district;
            $events->website = $req->website;
            $events->mobileNumber = $req->mobileNumber;
            $events->email = $req->email;
            $events->address = $req->address;
            $events->description = $req->description;
            $events->comment = $req->comment;
            $stdate= date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
            $cldate= date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
            $events->startDate =  $stdate;
            $events->startTime =date("H:i", strtotime($req->startdatetime));;
            $events->clossingDate = $cldate;
             $events->clossingTime = date("H:i", strtotime($req->clossingdatetime));;
            $id=auth('subadmin')->user()->id;
            $events->createdBy =$id;
            $events->emergencyContactnName = $req->emergencyContactnName;
            $events->emergencyMobileNumber = $req->emergencyMobileNumber;
            $events->emergencyDesignation = $req->emergencyDesignation;
            $events->authorityContactnName = $req->authorityContactnName;
            $events->authorityMobileNumber = $req->authorityMobileNumber;
            $events->authorityDesignation = $req->authorityDesignation;
            // if( ($stdate<=$req->applyFromDate)  && ($req->applyToDate<=$cldate)){
              $events->applyFromDate = $req->applyFromDate;
              $events->applyToDate = $req->applyToDate;
            //  }else{
            //   return back()->withInput()->with('error','Your Selected Valied Application Formdate And Todate'); 
            //  }
            $events->totalStall = $req->totalStall;
            $events->creater = 'subadmin';
           if($events->save()){
            return back()->with('success','Event Created Successfully '); 
           }
              }else{
               
                return back()->withInput()->with('error','Alredy Event Scheduled For The Date'); 
              }
             }else{
              // return "bye";
            $events = new Events();
            $events->eventTitle = $req->eventTitle;
            $events->contactPersonName = $req->contactPersonName;
            $events->location = $req->location;
            $events->district = $req->district;
            $events->website = $req->website;
           $events->mobileNumber = $req->mobileNumber;
            $events->email = $req->email;
            $events->address = $req->address;
            $events->description = $req->description;
            $events->comment = $req->comment;
            $stdate= date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
            $cldate= date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
            $events->startDate =  $stdate;
            $events->startTime =date("H:i", strtotime($req->startdatetime));;
            $events->clossingDate = $cldate;
            $events->clossingTime = date("H:i", strtotime($req->clossingdatetime));;
            $id=auth('subadmin')->user()->id;
            $events->createdBy =$id;
            $events->emergencyContactnName = $req->emergencyContactnName;
            $events->emergencyMobileNumber = $req->emergencyMobileNumber;
            $events->emergencyDesignation = $req->emergencyDesignation;
            $events->authorityContactnName = $req->authorityContactnName;
            $events->authorityMobileNumber = $req->authorityMobileNumber;
            $events->authorityDesignation = $req->authorityDesignation;
            // if( ($stdate<=$req->applyFromDate)  && ($req->applyToDate<=$cldate)){
              $events->applyFromDate = $req->applyFromDate;
              $events->applyToDate = $req->applyToDate;
            //  }else{
            //   return back()->withInput()->with('error','Your Selected Valied Application Formdate And Todate'); 
            //  }
            $events->totalStall = $req->totalStall;
            $events->creater = 'subadmin';
           if($events->save()){
          
            return back()->with('success','Event Created Successfully '); 
           }
          }
        }else{
          return back()->withInput()->with('error','You Only create Your District Event'); 
        }
      }catch(Throwable $e){
        return back()->withInput()->with('error', $e->getMessage());
      }
  }


  public function fairupdate(Request $req,$id){
    try{
        $validator = Validator::make($req->all(),[
            'eventTitle'=>'required|string',
            'contactPersonName'=>'required|string',
             'startdatetime'=>'required|string',
             'clossingdatetime'=>'required',
             'location'=>'required',
             'district'=>'required',
             'email'=>'required|email',
             'website'=>'required|string',
             'address'=>'required|string',
             'mobileNumber'=>'required|string|min:10',
             'description'=>'required',
             'comment'=>'required',
             'emergencyMobileNumber'=>'required|string|min:10',
             'authorityMobileNumber'=>'required|string|min:10',
             'emergencyContactnName'=>'required',
             'emergencyDesignation'=>'required',
             'authorityContactnName'=>'required',
             'authorityDesignation'=>'required',
             'applyFromDate'=>'required',
             'applyToDate'=>'required',
             'totalStall'=>'required',
        ]);
        if($validator->fails()){
          $data= [
            'error' => $validator->errors()
                 ];
        return response()->json($data);
        }
        $disti=$req->district;

        $stdate = date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
        $cldate = date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
        $events = Events::where('id', '!=', $id)
        ->where('district', '=', $disti)
        ->where(function($query) use ($stdate, $cldate) {
            $query->whereDate('startDate', '<=', $stdate)
                  ->whereDate('clossingDate', '>=', $stdate)
                  ->orWhere(function($query) use ($stdate, $cldate) {
                      $query->whereDate('startDate', '<=', $cldate)
                            ->whereDate('clossingDate', '>=', $cldate);
                  });
        })
        ->get();
         if($events->isNotEmpty()){
          $data=[];
          foreach($events as $key=>$val){
          $stdate = date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
          $cldate = date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
          $startTime = date("H:i", strtotime($req->startdatetime));
          $clTime = date("H:i", strtotime($req->clossingdatetime));
          $eventdatas = Events::where('id', '=', $val->id)
              ->where(function($query) use ($stdate, $startTime, $cldate, $clTime) {
                  $query->whereDate('clossingDate', '=', $stdate)
                        ->whereTime('clossingTime', '<=', $startTime)
                        ->orWhereDate('startDate', '=', $cldate)
                        ->whereTime('startTime', '>=', $clTime);
              })
              ->first();
               if($eventdatas !=null){
              array_push($data,$eventdatas);
               }
            }
         if(count($data) === count($events)){ 
          $events = Events::find($id);
          $events->eventTitle = $req->eventTitle;
          $events->contactPersonName = $req->contactPersonName;
          $events->location = $req->location;
          $events->district = $req->district;
          $events->website = $req->website;
          $events->mobileNumber = $req->mobileNumber;
          $events->email = $req->email;
          $events->address = $req->address;
          $events->description = $req->description;
          $events->comment = $req->comment;
          $stdate= date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
          $cldate= date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
          $events->startDate =  $stdate;
          $events->startTime =date("H:i", strtotime($req->startdatetime));;
          $events->clossingDate = $cldate;
          $events->clossingTime = date("H:i", strtotime($req->clossingdatetime));;
          $events->emergencyContactnName = $req->emergencyContactnName;
          $events->emergencyMobileNumber = $req->emergencyMobileNumber;
          $events->emergencyDesignation = $req->emergencyDesignation;
          $events->authorityContactnName = $req->authorityContactnName;
          $events->authorityMobileNumber = $req->authorityMobileNumber;
          $events->authorityDesignation = $req->authorityDesignation;
          // $events->applyFromDate = $req->applyFromDate;
          // $events->applyToDate = $req->applyToDate;
          $events->totalStall = $req->totalStall;
          if( ($stdate<=$req->applyFromDate)  && ($req->applyToDate<=$cldate)){
            $events->applyFromDate = $req->applyFromDate;
            $events->applyToDate = $req->applyToDate;
           }else{
            return back()->withInput()->with('error','Your Selected Valied Application Formdate And Todate'); 
           }
       if($events->save()){
        $data= [
          'success' => 'Event Updated Successfully',
               ];
          return response()->json($data);
       }
          }else{
           
            $data= [
              'error' => 'Alredy Event Scheduled For The Date',
                   ];
              return response()->json($data);
          }
         }else{
          $events = Events::find($id);
          $events->eventTitle = $req->eventTitle;
          $events->contactPersonName = $req->contactPersonName;
          $events->location = $req->location;
          $events->district = $req->district;
          $events->website = $req->website;
          $events->mobileNumber = $req->mobileNumber;
          $events->email = $req->email;
          $events->address = $req->address;
          $events->description = $req->description;
          $events->comment = $req->comment;
          $stdate= date(Carbon::parse($req->startdatetime)->format('Y-m-d'));
          $cldate= date(Carbon::parse($req->clossingdatetime)->format('Y-m-d'));
          $events->startDate =  $stdate;
          $events->startTime =date("H:i", strtotime($req->startdatetime));;
          $events->clossingDate = $cldate;
          $events->clossingTime = date("H:i", strtotime($req->clossingdatetime));;
          $events->emergencyContactnName = $req->emergencyContactnName;
          $events->emergencyMobileNumber = $req->emergencyMobileNumber;
          $events->emergencyDesignation = $req->emergencyDesignation;
          $events->authorityContactnName = $req->authorityContactnName;
          $events->authorityMobileNumber = $req->authorityMobileNumber;
          $events->authorityDesignation = $req->authorityDesignation;
          // $events->applyFromDate = $req->applyFromDate;
          // $events->applyToDate = $req->applyToDate;
          $events->totalStall = $req->totalStall;
          if( ($stdate<=$req->applyFromDate)  && ($req->applyToDate<=$cldate)){
            $events->applyFromDate = $req->applyFromDate;
            $events->applyToDate = $req->applyToDate;
           }else{
            return back()->withInput()->with('error','Your Selected Valied Application Formdate And Todate'); 
           }
       if($events->save()){
      
        $data= [
          'success' => 'Event Updated Successfully',
               ];
          return response()->json($data);
       }
      }
    }catch(Throwable $e){
      $data= [
        'error' => $e->getMessage(),
             ];
         return response()->json($data);
    }
}

        public function aplicationfairlist(){
            $district=auth('subadmin')->user()->district;
            $date=Carbon::now()->format('Y-m-d');
            $event=Events::where('district', '=',  $district)->whereDate('applyFromDate', '<=', $date)
            ->whereDate('applyToDate', '>=', $date)
            ->get();
         
            return view('sub_admin/aplication_fair_list')->with('event',$event);  
        }
        public function aplicationfairview($id){
        $apply=ApplicationApply::where('event_id', '=',  $id)
          ->get();
            $pubdata=[];
            $distdata=[];
            $pubdistdata=[];
            foreach($apply as $key=>$val){
                 $pub=Publisher::where('id','=',$val->apply_id)->first();
                  $dist=Distributor::where('id','=',$val->apply_id)->first();
                  $dist=Distributor::where('id','=',$val->apply_id)->first();
                  $pubdist=PublisherDistributor::where('id','=',$val->apply_id)->first();
                  if($pub !=null){
                    $val->firstname=$pub->firstName;
                    $val->lastname=$pub->lastName;
                    $val->district=$pub->District;
                    $val->type=$pub->usertype;
                    $val->pubid=$pub->id;              


                    array_push($pubdata,$val);
                  }elseif($dist !=null){
                    $val->firstname=$dist->firstName;
                    $val->lastname=$dist->lastName;
                    $val->district=$dist->District;
                    $val->type=$dist->usertype;
                    $val->distid=$dist->id;
                    array_push($distdata,$val);
                  } else{
                    $val->firstname=$pubdist->firstName;
                    $val->lastname=$pubdist->lastName;
                    $val->district=$pubdist->District;
                    $val->type="Publisher And Distributor";
                    $val->pubdistid=$pubdist->id;
                    array_push($pubdistdata,$val);
                  }
           
            }
            $apply->publisher= $pubdata;
            $apply->distributor= $distdata;
            $apply->publisherdistributor= $pubdistdata;
         
            return redirect('sub_admin/aplication_fair_view')->with('apply',$apply);   

         
      }
        
}
 