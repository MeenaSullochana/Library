<?php

namespace App\Http\Controllers\PeriodicalDistributor;
use App\Http\Controllers\Controller;
use App\Models\PeriodicalDistributor;

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
    

        
    
     
    public function distributor_profile_view(){
    $data=auth('periodical_distributor')->user();
      return view('periodical_distributor.distributor_profile_view')->with('data',$data);

  }
   
             
  public function distprofileimg(Request $request){

    try{
        $validator = Validator::make($request->all(),[
            'profileImage'=>'required',

        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);

        }
        $id=auth('periodical_distributor')->user()->id;

        $distributor=PeriodicalDistributor::find($id);
        if($request->hasFile('profileImage'))
        {

        if($distributor->profileImage != Null){
            $path1 = 'periodical_distributor/images/profile/'.$distributor->profileImage;
            File::delete($path1);
        }

        $pub_profile = $request->file('profileImage');
        $pub_profileNamename= $distributor->firstName.time().'_'.$pub_profile->getClientOriginalName();
        $request->profileImage->move(public_path('periodical_distributor/images/profile'),$pub_profileNamename);
    }
        $distributor->profileImage=$pub_profileNamename;
        if($distributor->save()){
            // return "hiii";
            $data= [
                'success' => 'Profile Image Updated Successfully',
                'profileImageFilename'=>$distributor->profileImage
                     ];
            return response()->json($data);
        }

    }catch(Throwable $e){
        return response()->error($e);
    }



 }
 public function distbackgroundimg(Request $request){

    try{
        $validator = Validator::make($request->all(),[
            'backgroundImage'=>'required',

        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);

        }
        $id=auth('periodical_distributor')->user()->id;

        $distributor=PeriodicalDistributor::find($id);
        if($request->hasFile('backgroundImage'))
        {

        if($distributor->backgroundImage != Null){
            $path1 = 'periodical_distributor/images/profile/'.$distributor->backgroundImage;
            File::delete($path1);
        }

        $pub_profile = $request->file('backgroundImage');
        $pub_profileNamename= $distributor->firstName.time().'_'.$pub_profile->getClientOriginalName();
        $request->backgroundImage->move(public_path('periodical_distributor/images/profile'),$pub_profileNamename);
    }
    $distributor->backgroundImage=$pub_profileNamename;
        if($distributor->save()){
            // return "hiii";
            $data= [
                'success' => 'Background Image Updated Successfully',
                     ];
            return response()->json($data);
        }

    }catch(Throwable $e){
        return response()->error($e);
    }

}           
       
    }
