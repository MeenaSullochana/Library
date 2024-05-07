<?php

namespace App\Http\Controllers\PeriodicalDistributor;
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
use App\Models\Distributor;
use Illuminate\Support\Facades\Hash;
use File;
class PeriodicalDistributorController extends Controller
{
    
    public function peridistchangepassword(Request $req){
     
        $validator = Validator::make($req->all(),[
            'currentPassword'=>'required|string',
            'newPassword'=>'required|string',
            'confirmPassword'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
        $distributor=auth('periodical_distributor')->user();
        if((Hash::check($req->currentPassword,$distributor->password))){
           if($req->newPassword == $req->confirmPassword){
             $distributor->password=Hash::make($req->newPassword);
             $distributor->save();
             $data= [
                'success' => 'Passdword Change  Successfully',
                     ];
            return response()->json($data);  
           
            }else{
                $data= [
                    'error' => 'newPassword and confirmPassword is mishmatch',
                         ];
                return response()->json($data);  
            }
        }else{
            $data= [
                'error' => 'Current password is incorrect',
                     ];
            return response()->json($data);  
           
        }
    
    }
    

        

     

   
             
           
       
    }
