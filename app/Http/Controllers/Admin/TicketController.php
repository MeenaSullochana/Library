<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\TicketChat;
class TicketController extends Controller
{
    public function ticketlist(){
        $loginid ="dfgt-grfgfg-gdgsd-sdgsd-dsgd";
         $ticket= Ticket::where('subAdminId',$loginid)->where('subAdmin',"1")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('from',$val->userId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
        
         return view('admin.ticket_list')->with('data',$data);   
     }

     public function ticketcompleted(){
        $loginid ="5e4a1235-7a3c-11ee-be88-a0b3cc23d195";
          $ticket= Ticket::where('userId',$loginid)->where('user',"1")->where('status',"0")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('from',$val->subAdminId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
     
         return view('admin.ticket_completed')->with('data',$data);   
     }
     public function ticketpending(){
        $loginid ="5e4a1235-7a3c-11ee-be88-a0b3cc23d195";
          $ticket= Ticket::where('userId',$loginid)->where('user',"1")->where('status',"1")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('from',$val->subAdminId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
     
         return view('admin.ticket_pending')->with('data',$data);   
     }
     
     public function ticketview($id){
       $ticket = Ticket::find($id);
        $ticket->date = Carbon::parse($ticket->created_at)->format('d F Y');
        $ticket->time = Carbon::parse($ticket->created_at)->format('h:i A');
       
        return redirect('admin/ticket_view')->with('ticket',$ticket);   
    }
     
    
     public function ticketdelete($id){
        $ticket = Ticket::find($id);
             if($ticket->user == "1" && $ticket->subAdmin == "1" ){
                $ticket->user="0";
                $ticket->save();
                return back()->with('success','Ticket Deleted Successfully '); 
             }else{
                $ticket->delete();
                return back()->with('success','Ticket Deleted Successfully '); 
             }           

          
    }
             public function ticketchat($id){
                 $ticket= Ticket::find($id);
                 $ticdata=[];
                 $publisher = Publisher::find($ticket->userId);
                 $distributor = Distributor::find($ticket->userId);
                 $publisheranddistributor = PublisherAndDistributor::find($ticket->userId);
                 if($publisher !=null){
                    $publisher->status="2";
                   array_push($ticdata,$publisher);
                 }elseif($distributor !=null){
                    $distributor->status="2";
                   array_push($ticdata,$distributor);
                 }else{
                    $publisheranddistributor->status="2";
                   array_push($ticdata,$publisheranddistributor);
                 }
                 
                 $tickets = (Object)[
                    'ticketid' => $id,
                    'status'=>"4",
                ];
                array_push($ticdata,$tickets);
               $ticketchat=TicketChat::where('ticket_Id',$ticket->id)->orderBy('created_at','ASC')->get();
               foreach($ticketchat as $key=>$val){
                if($val->status =="1"){
                    $ticketsave= TicketChat::find($val->id);
                    $ticketsave->readStatus="0";
                    $ticketsave->save();
                    $suadmin= Subadmin::find($val->from);
                    $val->name= $suadmin->name;
                    $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
                  
                    array_push($ticdata,$val);
                    
                }else{
                    $val->name="publisher";
                    $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
                    array_push($ticdata,$val);
                }
            }
            return ticdata;
            return redirect('admin/ticket_chat')->with('ticdata',$ticdata);
            
             
}
     public function chatmessage(Request $req,$id){
   
   $ticket = Ticket::where('id', $id)->where('status',"1")->first();
   if($ticket !=null){
   $districts = Subadmin::where('id',  $ticket->subAdminId)->where('status',"1")->first();
   if($districts !=null){
        $tickets = new TicketChat();
        $tickets->from=$ticket->userId;
        $tickets->to=$ticket->subAdminId;
        $tickets->message=$req->message;
        $tickets->ticket_Id=$id;
        $tickets->status="0";
        $tickets->save();
        $ticketchats = TicketChat::where('ticket_Id', $id)->orderBy('created_at','ASC')->get();
        $data1='';
        $html='';   
        foreach($ticketchats as $key=>$val){
         if($val->status=="0")  {
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