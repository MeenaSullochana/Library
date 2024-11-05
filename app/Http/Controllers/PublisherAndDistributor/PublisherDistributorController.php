<?php

namespace App\Http\Controllers\PublisherAndDistributor;
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
use App\Models\PublisherDistributor;
use Illuminate\Support\Facades\Hash;
use File;
use App\Models\Accountdetail;

class PublisherDistributorController extends Controller
{
    
    public function pubdistchangepassword(Request $req){
     
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
        $pubdist=auth('publisher_distributor')->user();
        if((Hash::check($req->currentPassword,$pubdist->password))){
           if($req->newPassword == $req->confirmPassword){
             $pubdist->password=Hash::make($req->newPassword);
             $pubdist->save();
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
        public function pubdistprofileview(){
         
            $data=auth('publisher_distributor')->user();
           
            $data->topTitles1= json_decode($data->topTitles);
            $data->topTranslatedBooks1= json_decode($data->topTranslatedBooks);
            $data->publishers1= json_decode($data->publishers); 
            $data->association1= json_decode($data->association);
            $data->subsidiary1= json_decode($data->subsidiary);
            $data->awardTitle1= json_decode($data->awardTitle);

            // return $pubdist;
            return view('publisher_and_distributor.publisher_and_dis_profile_view')->with('data',$data); 
            
             } 
             public function pubdistprofileedit(){
         
                $data=auth('publisher_distributor')->user();
               
                $data->topTitles1= json_decode($data->topTitles);
                $data->topTranslatedBooks1= json_decode($data->topTranslatedBooks);
                $data->publishers1= json_decode($data->publishers); 
                $data->association1= json_decode($data->association);
                $data->subsidiary1= json_decode($data->subsidiary);
                $data->awardTitle1= json_decode($data->awardTitle);
    
                // return $pubdist;
                return view('publisher_and_distributor.publisher_and_dis_profile_edit')->with('data',$data); 
                
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
                return redirect('/publisher_and_distributor/pubdistprofile')->with('pubdist',$pubdist); 
                
                 } 
              
                
                     public function pubdistprofileimg(Request $request){
                           
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
                            $id=auth('publisher_distributor')->user()->id;
                           
                            $publisher=PublisherDistributor::find($id);
                            if($request->hasFile('profileImage'))
                            {
                               
                            if($publisher->profileImage != Null){
                                $path1 = 'publisher_and_distributor/images/profile/'.$publisher->profileImage;
                                File::delete($path1);
                            }
                           
                            $pub_profile = $request->file('profileImage');
                            $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
                            $request->profileImage->move(public_path('publisher_and_distributor/images/profile'),$pub_profileNamename);  
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
                     public function pubdistbackgroundimg(Request $request){
                           
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
                            $id=auth('publisher_distributor')->user()->id;
                           
                            $publisher=PublisherDistributor::find($id);
                            if($request->hasFile('backgroundImage'))
                            {
                               
                            if($publisher->backgroundImage != Null){
                                $path1 = 'publisher_and_distributor/images/profile/'.$publisher->backgroundImage;
                                File::delete($path1);
                            }
                           
                            $pub_profile = $request->file('backgroundImage');
                            $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
                            $request->backgroundImage->move(public_path('publisher_and_distributor/images/profile'),$pub_profileNamename);  
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

            public function accountdetails(Request $req){
     
                $validator = Validator::make($req->all(),[
                    'ven_gst_category'=>'required',
                    'pan_num'=>'required|string',
                    'pan_hol_name'=>'required',
                    'pan_father_name'=>'required',
                    'pan_hol_dob'=>'required',
                    'address'=>'required',
                    'pincode'=>'required',
                    'acc_num'=>'required',
                    'ifsc_code'=>'required',
                    'beneficary_name'=>'required',
                ]);
                if($validator->fails()){
                    $data= [
                        'error' => $validator->errors()->first(),
                             ];
                    return response()->json($data);
        
                }
            
                      $publisher=auth('publisher')->user();
                    
                        $Accountdetail = new Accountdetail();
        
        
                     $Accountdetail->ven_gst_category= $req->ven_gst_category;
                     $Accountdetail->pan_num= $req->pan_num;
                     $Accountdetail->pan_hol_name= $req->pan_hol_name;
                     $Accountdetail->pan_father_name= $req->pan_father_name;           
                     $Accountdetail->pan_hol_dob= $req->pan_hol_dob;
                     $Accountdetail->address= $req->address;
                     $Accountdetail->pincode= $req->pincode;
                     $Accountdetail->acc_num= $req->acc_num;
                     $Accountdetail->ifsc_code= $req->ifsc_code;
                     $Accountdetail->beneficary_name= $req->beneficary_name;
                     $Accountdetail->service_type= "Book Purchase";
                     $Accountdetail->user_id= $publisher->id;
                     $Accountdetail->user_type= $publisher->usertype;
                 
                    if($Accountdetail->save()){
                        
                        $data= [
                        'success' => 'Account Details  Updated  Successfully',
                                ];
                    return response()->json($data);
                    }
                    
        
                
            }
            public function aacountdetail(){
                $id=auth('publisher_distributor')->user()->id;
                $data =Accountdetail::where('user_id', $id)->first();
                return view('publisher_and_distributor.aacountdetails')->with('data',$data);
        
            }
    }
    
    
 
        
       
    
