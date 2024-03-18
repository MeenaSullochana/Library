<?php

namespace App\Http\Controllers\Subadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use Illuminate\Support\Facades\Hash;
class SubadminController extends Controller
{

    public function subadminchangepassword(Request $req){
     
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
        $subadmin=auth('subadmin')->user()->first();
        if((Hash::check($req->currentPassword,$subadmin->password))){
           if($req->newPassword == $req->confirmPassword){
             $subadmin->password=Hash::make($req->newPassword);
             $subadmin->save();
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
    