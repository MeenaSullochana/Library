<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\Notifications;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\Librarian;
use App\Models\Announcement;
use App\Models\Reviewer;


use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
 use Illuminate\Http\UploadedFile;
use App\Models\Subadmin;
use Illuminate\Support\Facades\Hash;
class notificationController extends Controller
{
    public function notifi(){
      $id=auth('admin')->user()->id;
         $notification=Notifications::where('to','=',$id)->orderBy('created_at','DESC')->get();
         $notification1=Notifications::where('to','=',$id)->where('status','=','unread')->get();
         $count=count($notification1);
         $data=[];
         foreach($notification as $key=>$val){
               if($val->type == "publisher"){
                $publisher=Publisher::find($val->from);
                if($publisher !=null){
                  $val->profileImage=$publisher->profileImage;
                  $val->firstName=$publisher->firstName;
                  $val->lastName=$publisher->lastName;
                  array_push($data,$val);
                }
                 
              }elseif($val->type == "distributor"){
          
                $distributor=Distributor::find($val->from);
                if($distributor !=null){
                $val->profileImage=$distributor->profileImage;
                $val->firstName=$distributor->firstName;
                $val->lastName=$distributor->lastName;
                array_push($data,$val);
                }
              }else{
                $pubdist=PublisherDistributor::find($val->from);
                if($pubdist !=null){
                $val->profileImage=$pubdist->profileImage;
                $val->firstName=$pubdist->firstName;
                $val->lastName=$pubdist->lastName;
                array_push($data,$val);
                }
              }
        }   
       
        $data1='';
        $html='';   
        foreach($data as $key=>$val){
          
          if($val->profileImage == null){
           $path =asset("images/default.png");
          }
      else{
         if($val->type == "publisher_distributor"){
            $path=asset("publisher_and_distributor/images/profile/".$val->profileImage);
         }else{
            $path=asset($val->type."/images/profile/".$val->profileImage);
         }
       
      }
          $date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
          $html=  "<li>
          <div class=\"timeline-panel\">
              <div class=\"media me-2\">
                  <img alt=\"image\" width=\"50\" src=\"{$path}\">
              </div>
              <div class=\"media-body\">
                  <h6 class=\"mb-1\">$val->firstName $val->lastName - $val->type</h6>
                  <small class=\"d-block\">$date</small>
                  <h6 class=\"mb-0\">$val->message</h6>
              </div>
          </div>
       </li>";
       $data1 = $data1.$html;
        }
             
     

               $data= [
                'record' =>  $data1,
                'count' => $count
            ];
            return response()->json($data);
         }


         public function notificationstatus(Request $req){
           
          $id=auth('admin')->user()->id;
          $notification1=Notifications::where('to','=',$id)->where('status','=','unread')->get();
          foreach($notification1 as $key=>$val){
               $noti= Notifications::find($val->id);
               $noti->status="read";
               $noti->save();
          }

          
          $data= [
            'sucess' =>  'status change',
          
        ];
        return response()->json($data);
         }
         
         public function Notification_virw($id,$type){
      
          if($type == "publisher"){
           
            $notification1=Notifications::find($id);
            if($notification1 !=null){
              $publisher=Publisher::find($notification1->from);
              $notification1->profileImage=$publisher->profileImage;
              $notification1->firstName=$publisher->firstName;
              $notification1->lastName=$publisher->lastName;
             
            }
           
          }elseif($type == "distributor"){
      
            $notification1=Notifications::find($id);
            if($notification1 !=null){
              $distributor=Distributor::find($notification1->from);
            $notification1->profileImage=$distributor->profileImage;
            $notification1->firstName=$distributor->firstName;
            $notification1->lastName=$distributor->lastName;
          
            }
          }else{
          
            $notification1=Notifications::find($id);
            if($notification1 !=null){
                 
           $pubdist=PublisherDistributor::find($notification1->from);
            $notification1->profileImage=$pubdist->profileImage;
            $notification1->firstName=$pubdist->firstName;
            $notification1->lastName=$pubdist->lastName;
      
            }
   
         
     
       }
    

       \Session::put('notification1', $notification1);
        return redirect('admin/notificationview');   
        }
        public function announcementsend(Request $req){
        
          if ( !($req->tag)) {
            $data= [
              'error' => 'To filed Is Required',
                   ];
          return response()->json($data);  
        } 
          $validator = Validator::make($req->all(), [
           
            'message' => 'required|string',  
        ]);
        
        if ($validator->fails()) {
            $data = [
                'error' => $validator->errors()->first(),
            ];
            return response()->json($data);  
        }
        
          if($req->hasFile('attachment')){
            $attachment = $req->file('attachment');
            $filename = auth('admin')->user()->name. '_' . time() . '_' . $attachment->getClientOriginalName();
             
            $attachment->move(public_path('attachment'), $filename);
           
        }
        $Announce = new Announcement();
        $Announce->message = $req->message;
        $Announce->to =  json_encode($req->tag);
        $Announce->attachment = $filename;
        $Announce->save();

          foreach($req->tag as $val){
              switch($val){
                  case "publisher":
                      $data = Publisher::where('status', '=', '1')->get();
                      $type = "publisher";
                
                      break;
                  case "distributor":
                      $data = Distributor::where('status', '=', '1')->get();
                      $type = "distributor";
                      break;
                  case "publisher_and_distributor":
                      $data = PublisherDistributor::where('status', '=', '1')->get();
                      $type = "publisher_distributor";
                      break;
                  case "reviewer":
                      $data = Reviewer::where('status', '=', '1')->get();
                      $type = "reviewer";
                      break;
                  case "librarian":
                      $data = Librarian::where('status', '=', '1')->get();
                     
                      $type = "librarian";
                      break;
                  default:
                      $data = null;
                      break;
              }
      
              if($data != null){
                  foreach($data as $item){
                      $notifi = new Notifications();
                      $notifi->message = "Admin Send New Announcement";
                      $notifi->to = $item->id;
                      $notifi->from = auth('admin')->user()->id;
                      $notifi->type = $type;
                      $notifi->subject = $req->message;
                      $notifi->announce_id = $Announce->id;
                      $notifi->attachment = $filename;
                      $notifi->save();
                  }
              }
          }
          $data= [
            'success' => 'Announcement  Create Successfully',
                 ];
        return response()->json($data);  
      }
      
      public function announcements_virw($id){
       $Announce =Announcement::find($id);
       $Announce->to1= json_decode($Announce->to); 
      
     \Session::put('Announce', $Announce);
     return redirect('admin/announcementsvirw');   
      }
      
  }