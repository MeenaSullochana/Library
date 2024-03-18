<?php

namespace App\Http\Controllers\Distributor;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\Notifications;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
 use Illuminate\Http\UploadedFile;
use App\Models\Subadmin;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class notificationController extends Controller
{
    public function notifi(){
      $id=auth('distributor')->user()->id;
         $notification=Notifications::where('to','=',$id)->orderBy('created_at','DESC')->get();
         $notification1=Notifications::where('to','=',$id)->where('status','=','unread')->get();
         $count=count($notification1);
         $data=[];
         foreach($notification as $key=>$val){
               if($val->type == "distributor"){
                $Admin=Admin::find($val->from);
              
                if($Admin !=null){
                $val->profileImage=$Admin->adminImage;
     
                $val->firstName=$Admin->name;
              
                array_push($data,$val);
                }
              }
        }   
     
        $data1='';
        $html='';   
        foreach($data as $key=>$val){
          
          if($val->profileImage == null){
           $path =asset("admin/images/default.png");
          }
      else{
     
            $path=asset("/admin/AdminImage/".$val->profileImage);
      
       
      }
          $date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
          $html = "<li>
          <div class=\"timeline-panel\">
              <div class=\"media me-2\">
                  <img alt=\"image\" width=\"50\" src=\"{$path}\">
              </div>
              <div class=\"media-body\">
                  <h6 class=\"mb-1\">{$val->firstName} - Admin</h6>
                  <small class=\"d-block\">{$date}</small>
                  <h6 class=\"mb-0\">{$val->message}</h6>
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
           
          $id=auth('distributor')->user()->id;
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
         
         public function Notification_virw($id){
      
            $notification1=Notifications::find($id);
            $Admin=Admin::find($notification1->from);
            $notification1->profileImage=$Admin->adminImage;
     
            $notification1->firstName=$Admin->name;

            \Session::put('notification1', $notification1);
             return redirect('distributor/notificationview');    
       
         }
         

        }
        
     
      
  



