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
use App\Models\Distributor;


class DistributorController extends Controller
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
        $publisher=Distributor::find($req->id);
            $publisher->approved_status="reject";
             $publisher->save();
             $data= [
                 'success' => 'Statuas Updated Successfully',
                      ];
             return response()->json($data);
         }
 
    public function approvestatus(Request $req){
       $distributor=Distributor::find($req->distributorid);
           $distributor->approved_status="approve";
           $distributor->status="1";
            $distributor->save();
            $data= [
                'success' => 'Statuas Updated Successfully',
                     ];
            return response()->json($data);
        }


    public function distributorstatus(Request $req){
        $distributor=Distributor::find($req->distributorid);
        if($distributor->approved_status == "approve"){
            $distributor->status=$req->status;
            $distributor->save();
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

    public function distributorget(){
          $distributor=Distributor::all();
        return view('sub_admin.distributor_list')->with('distributor',$distributor);  
        }

    public function distributoractive(){
      $distributor=Distributor::where('status', '=', '1')->where('approved_status', '=', 'approve')->get();
     return view('sub_admin/distributor_active_list')->with('distributor',$distributor);  
      }
      public function distributorinactive(){
       $distributor=Distributor::where('status', '=', '0')->where('approved_status', '=', 'approve')->get();
         return view('sub_admin/distributor_inactive_list')->with('distributor',$distributor);  
         }         
     public function distributorpending(){
       $distributor=Distributor::where('status', '=', '0')->where('approved_status', '=', 'pending')->get();
       return view('sub_admin/distributor_pending_list')->with('distributor',$distributor);  
       }                      
     public function distributorrejectlist(){
        $distributor=Distributor::where('status', '=', '0')->where('approved_status', '=', 'reject')->get();
         return view('sub_admin/distributor_reject_list')->with('distributor',$distributor);  
         }     

         public function distprofile($id){
            $distributor=Distributor::find($id);
           $distributor->publisher1= json_decode($distributor->publisher);
            $distributor->subsidiary1= json_decode($distributor->subsidiary);
            // return $distributor;
            return redirect('/sub_admin/distprofile')->with('distributor',$distributor); 
            
             } 
    }
    