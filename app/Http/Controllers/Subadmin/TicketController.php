<?php

namespace App\Http\Controllers\Subadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Publisher;

use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\Ticket;
use App\Models\TicketChat;
class TicketController extends Controller
{
    public function ticketlist(){
       
         $id=auth('subadmin')->user()->id;
          $ticket= Ticket::where('subAdminId',$id)->where('subAdmin',"1")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->userId)->where('readStatus',"1")->get();
              if($val->ticketType == "publisher"){
               $publisher=Publisher::where('id',$val->userId)->first();
               $val->image= $publisher->profileImage;
               $val->firstname= $publisher->firstName;
               $val->lastname= $publisher->lastName;
               $val->messagecount=count($ticketcount);

              }elseif($val->ticketType == "distributor"){
                $distributor=Distributor::where('id',$val->userId)->first();
                $val->image= $distributor->profileImage;
                $val->firstname= $distributor->firstName;
                $val->lastname= $distributor->lastName;
                $val->messagecount=count($ticketcount);
              }else{
                $pubdist=PublisherDistributor::where('id',$val->userId)->first();
                $val->image= $pubdist->profileImage;
                $val->firstname= $pubdist->firstName;
                $val->lastname= $pubdist->lastName;
                $val->messagecount=count($ticketcount);
              }
            
              array_push($data, $val);
          }
        //  return $data;
         return view('sub_admin.ticket_list')->with('data',$data);   
     }

     public function ticketcompleted(){
        $id=auth('subadmin')->user()->id;
        $ticket= Ticket::where('status','0')->where('subAdminId',$id)->where('subAdmin',"1")->get();
        $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->userId)->where('readStatus',"1")->get();
              if($val->ticketType == "publisher"){
                $publisher=Publisher::where('id',$val->userId)->first();
                $val->image= $publisher->profileImage;
                $val->firstname= $publisher->firstName;
                $val->lastname= $publisher->lastName;
 
               }elseif($val->ticketType == "distributor"){
                 $distributor=Distributor::where('id',$val->userId)->first();
                 $val->image= $distributor->profileImage;
                 $val->firstname= $distributor->firstName;
                 $val->lastname= $distributor->lastName;
               }else{
                 $pubdist=PublisherDistributor::where('id',$val->userId)->first();
                 $val->image= $pubdist->profileImage;
                 $val->firstname= $pubdist->firstName;
                 $val->lastname= $pubdist->lastName;
               }
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
     
         return view('sub_admin.ticket_completed')->with('data',$data);   
     }
     public function ticketpending(){
        $id=auth('subadmin')->user()->id;
        $ticket= Ticket::where('status','1')->where('subAdminId',$id)->where('subAdmin',"1")->get();
        $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->userId)->where('readStatus',"1")->get();
              if($val->ticketType == "publisher"){
                $publisher=Publisher::where('id',$val->userId)->first();
                $val->image= $publisher->profileImage;
                $val->firstname= $publisher->firstName;
                $val->lastname= $publisher->lastName;
 
               }elseif($val->ticketType == "distributor"){
                 $distributor=Distributor::where('id',$val->userId)->first();
                 $val->image= $distributor->profileImage;
                 $val->firstname= $distributor->firstName;
                 $val->lastname= $distributor->lastName;
               }else{
                 $pubdist=PublisherDistributor::where('id',$val->userId)->first();
                 $val->image= $pubdist->profileImage;
                 $val->firstname= $pubdist->firstName;
                 $val->lastname= $pubdist->lastName;
               }
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
      
         return view('sub_admin.ticket_pending')->with('data',$data);   
     }
     
     public function ticketview($id){
         $ticket = Ticket::find($id);
        $ticket->date = Carbon::parse($ticket->created_at)->format('d F Y');
        $ticket->time = Carbon::parse($ticket->created_at)->format('h:i A');
        if($ticket->ticketType == "publisher"){
            $publisher=Publisher::where('id',$ticket->userId)->first();
            $ticket->image= $publisher->profileImage;
            $ticket->firstname= $publisher->firstName;
            $ticket->lastname= $publisher->lastName;

           }elseif($ticket->ticketType == "distributor"){
             $distributor=Distributor::where('id',$ticket->userId)->first();
             $ticket->image= $distributor->profileImage;
             $ticket->firstname= $distributor->firstName;
             $ticket->lastname= $distributor->lastName;
           }else{
            $pubdist=PublisherDistributor::where('id',$ticket->userId)->first();
             $ticket->image= $pubdist->profileImage;
             $ticket->firstname= $pubdist->firstName;
             $ticket->lastname= $pubdist->lastName;
           }
         
        return redirect('sub_admin/ticket_view')->with('ticket',$ticket);   
    }
     
    
     public function ticketdelete($id){
        $ticket = Ticket::find($id);
        if($ticket->user == "1" && $ticket->subAdmin == "1" ){
            $ticket->subAdmin="0";
            $ticket->save();
            return back()->with('success','Ticket Deleted Successfully '); 
         }else{
            $ticket->delete();
            return back()->with('success','Ticket Deleted Successfully '); 
         }             

        
    }
    public function changestatus($id){
        $ticket = Ticket::find($id);
        if($ticket->status == "1" ){
            $ticket->status="0";
            $ticket->save();
            return back()->with('success','Ticket Status Change Successfully '); 
         }else{
            $ticket->status="1";
            $ticket->save();
            return back()->with('success','Ticket Status Change Successfully '); 
         }             

        
    }
    
             public function ticketchat($id){
                 $ticket= Ticket::find($id);
                 $ticdata=[];
                 if($ticket->ticketType == "publisher"){
                    $publisher=Publisher::where('id',$ticket->userId)->first();
                    $ticket->image= $publisher->profileImage;
                    $ticket->firstname= $publisher->firstName;
                    $ticket->lastname= $publisher->lastName;
                    $ticket->status="2";
                    array_push($ticdata,$ticket);
        
                   }elseif($ticket->ticketType == "distributor"){
                     $distributor=Distributor::where('id',$ticket->userId)->first();
                     $ticket->image= $distributor->profileImage;
                     $ticket->firstname= $distributor->firstName;
                     $ticket->lastname= $distributor->lastName;
                     $ticket->status="2";
                     array_push($ticdata,$ticket);
                   }else{
                     $pubdist=PublisherDistributor::where('id',$ticket->userId)->first();
                     $ticket->image= $pubdist->profileImage;
                     $ticket->firstname= $pubdist->firstName;
                     $ticket->lastname= $pubdist->lastName;
                     $ticket->status="2";
                     array_push($ticdata,$ticket);
                   }
                 
               
                 $tickets = (Object)[
                    'ticketid' => $id,
                    'status'=>"4",
                ];
                array_push($ticdata,$tickets);
               $ticketchat=TicketChat::where('ticket_Id',$ticket->id)->orderBy('created_at','ASC')->get();
               foreach($ticketchat as $key=>$val){
                if($val->status =="1"){
                    $suadmin= Subadmin::find($val->from);
                    $val->name= $suadmin->name;
                    $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
                  
                    array_push($ticdata,$val);
                    
                }else{
                    $val->name="publisher";
                    $ticketsave= TicketChat::find($val->id);
                    $ticketsave->readStatus="0";
                    $ticketsave->save();
                    $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
                    array_push($ticdata,$val);
                }
            }
          
            return redirect('sub_admin/ticket_chat')->with('ticdata',$ticdata);
            
             
}
public function chatmessage(Request $req,$id){
   
   $ticket = Ticket::where('id', $id)->where('status',"1")->first();
   if($ticket !=null){
   $districts = Subadmin::where('id',  $ticket->subAdminId)->where('status',"1")->first();
   if($districts !=null){
        $tickets = new TicketChat();
        $tickets->from=$ticket->subAdminId;
        $tickets->to=$ticket->userId;
        $tickets->message=$req->message;
        $tickets->ticket_Id=$id;
        $tickets->status="1";
        $tickets->save();
        $ticketchats = TicketChat::where('ticket_Id', $id)->orderBy('created_at','ASC')->get();
        $data1='';
        $html='';   
        foreach($ticketchats as $key=>$val){
         if($val->status=="1")  {
            $date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
           $html="<li class='clearfix'>
               <div class=\"message-data align-right\">
                   <span class=\"message-data-time\">$date</span> &nbsp; &nbsp;
                   <span class=\"message-data-name\">$val->name</span> <i
                       class=\"fa fa-circle me\"></i>

               </div>
               <div class=\"message other-message float-right\">
               $val->message
               </div>
           </li>";
         $data1 = $data1.$html;
         }
         else{
            $date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
           $html= "<li>
               <div class=\"message-data\">
                   <span class=\"message-data-name\"><i class=\"fa fa-circle online\"></i>
                   $val->name</span>
                   <span class=\"message-data-time\">$date</span>
               </div>
               <div class=\"message my-message\">
               $val->message
               </div>
           </li>";
           $data1=$data1.$html;
           }
        }
       
        $data= [
            'success' => $data1 ,
                 ];
            return response()->json($data);
         } else{
                $data= [
                    'error' => 'Subadmin Not Active' ,
                         ];
                    return response()->json($data);
              
             } 
            }else{
              
                $data= [
                    'error' => 'Chat Exist Ticket Alredy Completed This Ticket' ,
                ];
           return response()->json($data);
            }
         } 


}