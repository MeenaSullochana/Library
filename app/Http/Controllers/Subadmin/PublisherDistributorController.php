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
use App\Models\Ticket;
use App\Models\PublisherDistributor;


class PublisherDistributorController extends Controller
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
    public function rejectstatus(Request $req){
        $pubdist=PublisherDistributor::find($req->id);
            $pubdist->approved_status="reject";
             $pubdist->save();
             $data= [
                 'success' => 'Statuas Updated Successfully',
                      ];
             return response()->json($data);
         }
 
    public function approvestatus(Request $req){
       $pubdist=PublisherDistributor::find($req->pubdistid);
           $pubdist->approved_status="approve";
           $pubdist->status="1";
            $pubdist->save();
            $data= [
                'success' => 'Statuas Updated Successfully',
                     ];
            return response()->json($data);
        }


    public function pubdiststatus(Request $req){
        $pubdist=PublisherDistributor::find($req->pubdistid);
       
        if($pubdist->approved_status == "approve"){
            $pubdist->status=$req->status;
            $pubdist->save();
            $data= [
                'success' => 'Statuas Updated Successfully',
                     ];
            return response()->json($data);
        }else{
            $data= [
                'error' => 'Your can only change status for approved persons',
                     ];
            return response()->json($data);
        }
        }

    public function pubdistget(){
        $pubdist=PublisherDistributor::all();
        return view('sub_admin/publisher_and_dis_list')->with('pubdist',$pubdist);  
        }

    public function pubdistactive(){
      $pubdist=PublisherDistributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
     return view('sub_admin/publisher_and_dis_active_list')->with('pubdist',$pubdist);  
      }
      public function pubdistinactive(){
        $pubdist=PublisherDistributor::where('status', '=', '0')->where('approved_status', '=', 'approve')->get();
         return view('sub_admin/publisher_and_dis_inactive_list')->with('pubdist',$pubdist);  
         }         
     public function pubdistpending(){
       $pubdist=PublisherDistributor::where('status', '=', '0')->where('approved_status', '=', 'pending')->get();
       return view('sub_admin/publisher_and_dis_pending_list')->with('pubdist',$pubdist);  
       }                      
     public function pubdistrejectlist(){
        $pubdist=PublisherDistributor::where('status', '=', '0')->where('approved_status', '=', 'reject')->get();
         return view('sub_admin/publisher_and_dis_reject_list')->with('pubdist',$pubdist);  
         }     
         public function pubdistprofile($id){
            $pubdist=PublisherDistributor::find($id);
           
            $pubdist->topTitles1= json_decode($pubdist->topTitles);
            $pubdist->topTranslatedBooks1= json_decode($pubdist->topTranslatedBooks);
            $pubdist->publishers1= json_decode($pubdist->publishers); 
            $pubdist->association1= json_decode($pubdist->association);
            $pubdist->subsidiary1= json_decode($pubdist->subsidiary);
            $pubdist->awardTitle1= json_decode($pubdist->awardTitle);

            // return $pubdist;
            return redirect('/sub_admin/pubdistprofile')->with('pubdist',$pubdist); 
            
             } 

         
    }
    