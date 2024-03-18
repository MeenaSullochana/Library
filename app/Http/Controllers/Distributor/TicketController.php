<?php

namespace App\Http\Controllers\Distributor;
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
        $loginid=auth('distributor')->user()->id;
          $ticket= Ticket::where('userId',$loginid)->where('user',"1")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->subAdminId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
       
         return view('distributor.ticket_list')->with('data',$data);   
     }

     public function ticketcompleted(){
        $loginid=auth('distributor')->user()->id;
          $ticket= Ticket::where('userId',$loginid)->where('user',"1")->where('status',"0")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->subAdminId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
     
         return view('distributor.ticket_completed')->with('data',$data);   
     }
     public function ticketpending(){
        $loginid=auth('distributor')->user()->id;
          $ticket= Ticket::where('userId',$loginid)->where('user',"1")->where('status',"1")->get();
          $data=[];
          foreach($ticket as $key=>$val){
              $val->date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
              $ticketcount= TicketChat::where('ticket_Id',$val->id)->where('from',$val->subAdminId)->where('readStatus',"1")->get();
              $val->messagecount=count($ticketcount);
              array_push($data, $val);
          }
     
         return view('distributor.ticket_pending')->with('data',$data);   
     }
     
     public function ticketview($id){
       $ticket = Ticket::find($id);
        $ticket->date = Carbon::parse($ticket->created_at)->format('d F Y');
        $ticket->time = Carbon::parse($ticket->created_at)->format('h:i A');
       
        return redirect('distributor/ticket_view')->with('ticket',$ticket);   
    }
     
     public function districtlist(){
         $district = District::all();
         return view('distributor.ticket_create')->with('district',$district);   
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

        return view('distributor.ticket_create')->with('district',$district);   
    }
     
     public function getdistric($district){
         $districts = Subadmin::where('district', $district)->where('status',"1")->first();
         if($districts !=null){
             $html= " <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\" name=\"district\"><strong>District Name :</strong></span> $districts->district</li>
             <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"name\"><strong>Authority Person Name :</strong></span> $districts->name </li>
             <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"phone\"><strong>Phone  Number :</strong></span>$districts->mobileNumber</li>
             <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"email\"><strong>Email Id :</strong></span>$districts->email</li>";
             $data= [
                 'success' => $html ,
                      ];
                 return response()->json($data);
              } else{
                 $html= " <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\" name=\"district\"><strong>District Name :</strong></span> </li>
                 <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"name\"><strong>Authority Person Name :</strong></span>  </li>
                 <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"phone\"><strong>Phone  Number :</strong></span>r</li>
                 <li class=\"list-group-item d-flex justify-content-between p-3\"><span class=\"mb-0 m-0\"  name=\"email\"><strong>Email Id :</strong></span></li>";
                 $data= [
                     'error' => 'Your Select District To No subadmin' ,
                     "value"=> $html ,
                          ];
                     return response()->json($data);
                  }  
              } 
 
              public function  ticketadd(Request $req){
                
                 try{
                     $validator = Validator::make($req->all(),[
                          'district'=>'required|string',
                          'description'=>'required|string',
                          'subject'=>'required|string'
                     ]);
                   if($validator->fails()){
                     return back()->with('error$',validator->errors()->getMessage());
                 }
                 
                $subadmin = Subadmin::where('district', $req->district)->first();
                if($subadmin !=null){
                    $loginid=auth('distributor')->user()->id;
                    $ticket=  New Ticket();
                 $ticket->district = $req->district;
                 $ticket->description = $req->description;
                 $ticket->subject = $req->subject;
                 $ticket->userId = $loginid;
                 $ticket->subAdminId = $subadmin->id;
                 $ticket->ticketType = "distributor";
                 if($ticket->save()){
                     return back()->with('success','Ticket Created Successfully '); 
                    }
                }else{
                 return back()->withInput()->with('error','No Subadmin Allocated For This District '); 
                }
 
                
             }catch(Throwable $e){
                  return back()->with('error', $e->getMessage());
               } 
             }
             public function ticketchat($id){
                 $ticket= Ticket::find($id);
                 $ticdata=[];
                  $subadmins = Subadmin::find($ticket->subAdminId);
                  $subadmins->status="2";
                 array_push($ticdata,$subadmins);
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
            
            return redirect('distributor/ticket_chat')->with('ticdata',$ticdata);
            
             
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