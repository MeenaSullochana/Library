<?php

namespace App\Http\Controllers\Publisher;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\Publisher;
use App\Models\Country;
use App\Models\Events;
use App\Models\ApplicationApply;
use Illuminate\Support\Str;


class ApplicationController extends Controller
{

    public function publisherchangepassword(Request $req,$id){
        $validator = Validator::make($req->all(),[
            'oldPassword'=>'required|string',
            'newPassword'=>'required|string',
            'confirmPassword'=>'required',
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $publisher=Publisher::find($id);;
        if((Hash::check($req->oldPassword,$user->password))){
           if($req->newPassword == $req->confirmPassword){
             $publisher->password=Hash::make($req->newPassword);
             $publisher->save();
             return back()->with('success','Passdword Change  Successfully ');
            }else{
                return back()->with('error','newPassword and confirmPassword is mishmatch');
            }
        }else{
            return back()->with('error','Old password is incorrect');
        }
    
    }
    public function applyadd(Request $req){
       
        if($req->totalStall !== null){
            if($req->status == "true"){
                $apply= New ApplicationApply();
                $apply->event_id=$req->event_id;
                $apply->apply_id=$req->apply_id;
                $apply->totalStall=$req->totalStall;
                $apply->allocatedStall='0';
                $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
                 $apply->applicationNumber= $randomCode;
                  if($apply->save()){
                    $data= [
                        'success' => 'Application Applyed Successfully',
                             ];
                        return response()->json($data);

                  }
            }else{
                $data= [
                    'error' => 'Please click terms and conditions',
                         ];
                    return response()->json($data);
            }
        }else{
            $data= [
                'error' => 'Please enter How many seats you want',
                     ];
                return response()->json($data);
        }
      
            
        }
        public function applicationlist(){
            $id=auth('publisher')->user()->id;
            $apply= ApplicationApply::where('apply_id', '=', $id)->get();
            $data=[];
           foreach($apply as $key=>$val){
           
            $events=events::where('id', '=', $val->event_id)->first();
             $val->eventTitle= $events->eventTitle;
             $val->contactPersonName= $events->contactPersonName;
             $val->mobileNumber= $events->mobileNumber;
             $val->district= $events->district;
             array_push($data,$val);
           }
        
           return view('publisher.fair_application_list')->with('data',$data);   
        }

        
        public function applicationview($id){
            $events=events::where('id', '=', $id)->first();
           $publisher=auth('publisher')->user()->first();
           $event=ApplicationApply::where('apply_id', '=',$publisher->id)->where('event_id', '=', $id)->first();
           $events->record1 = $publisher;
           $events->record = $event;
        //   return   $events;
          return redirect('publisher/applyview')->with('events',$events);   
 
     }
        public function publisherapplication($id){
           $events=events::where('id', '=', $id)->first();
          $publisher=auth('publisher')->user()->first();
           $events->publisherrecord = $publisher;
        //    return   $events;
         return redirect('publisher/fairmanage')->with('events',$events);   

    }


    public function fairapplicationapply(){
        $date=Carbon::now()->format('Y-m-d');
         $id=auth('publisher')->user()->id;
        
        $event =Events::whereDate('applyFromDate', '<=', $date)
       ->whereDate('applyToDate', '>=', $date)
       ->get();
       $events=[];
       foreach($event as $key=>$val){
         $apply= ApplicationApply::where('event_id', '=', $val->id)->where('apply_id', '=', $id)->first();
        if($apply == null){
            array_push($events,$val);
        }

       } 
    //  return $events;
        return view('publisher.fair_application_apply')->with('events',$events);   
 }
    
}