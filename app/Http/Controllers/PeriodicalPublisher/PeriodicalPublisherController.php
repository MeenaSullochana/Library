<?php

namespace App\Http\Controllers\PeriodicalPublisher;
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
use App\Models\PeriodicalPublisher;
use File;
class PeriodicalPublisherController extends Controller
{
    
    public function peripubchangepassword(Request $req){
     
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
        $publisher=auth('periodical_publisher')->user();
        if((Hash::check($req->currentPassword,$publisher->password))){
           if($req->newPassword == $req->confirmPassword){
             $publisher->password=Hash::make($req->newPassword);
             $publisher->save();
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
    

        

    public function publisher_profile_view(){
          $data=auth('periodical_publisher')->user();
        return view('periodical_publisher.publisher_profile_view')->with('data',$data);

    }

   
    public function pubprofileimg(Request $request){

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
            $id=auth('periodical_publisher')->user()->id;

            $publisher=PeriodicalPublisher::find($id);
            if($request->hasFile('profileImage'))
            {

            if($publisher->profileImage != Null){
                $path1 = 'periodical_publisher/images/profile/'.$publisher->profileImage;
                File::delete($path1);
            }

            $pub_profile = $request->file('profileImage');
            $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
            $request->profileImage->move(public_path('periodical_publisher/images/profile'),$pub_profileNamename);
        }
            $publisher->profileImage=$pub_profileNamename;
            if($publisher->save()){
                // return "hiii";
                $data= [
                    'success' => 'Profile Image Updated Successfully',
                    'profileImageFilename'=>$publisher->profileImage
                         ];
                return response()->json($data);
            }

        }catch(Throwable $e){
            return response()->error($e);
        }



     }
     public function pubbackgroundimg(Request $request){

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
            $id=auth('periodical_publisher')->user()->id;

            $publisher=PeriodicalPublisher::find($id);
            if($request->hasFile('backgroundImage'))
            {

            if($publisher->backgroundImage != Null){
                $path1 = 'periodical_publisher/images/profile/'.$publisher->backgroundImage;
                File::delete($path1);
            }

            $pub_profile = $request->file('backgroundImage');
            $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
            $request->backgroundImage->move(public_path('periodical_publisher/images/profile'),$pub_profileNamename);
        }
        $publisher->backgroundImage=$pub_profileNamename;
            if($publisher->save()){
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
