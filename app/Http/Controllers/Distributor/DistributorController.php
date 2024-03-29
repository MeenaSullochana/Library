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
use App\Models\Publisher;
use App\Models\Distributor;
use Illuminate\Support\Facades\Hash;
use File;
class DistributorController extends Controller
{
    
    public function distributorchangepassword(Request $req){
     
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
        $distributor=auth('distributor')->user();
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
    
   
    public function distprofile($id){
        $distributor=Distributor::find($id);
       $distributor->publisher1= json_decode($distributor->publisher);
        $distributor->subsidiary1= json_decode($distributor->subsidiary);
       
        return redirect('/distributor/distprofile')->with('distributor',$distributor); 
        
         } 
        

         public function distprofileview(){
           $data=auth('distributor')->user();

           $data->publisher1= json_decode($data->publisher);
            $data->subsidiary1= json_decode($data->subsidiary);
           
            return view('distributor.dist_profile_view',compact('data')); 
            
             } 

             public function distprofileedit(){
                $data=auth('distributor')->user();
     
                $data->publisher1= json_decode($data->publisher);
                 $data->subsidiary1= json_decode($data->subsidiary);
                
                 return view('distributor.dist_profile_edit')->with('data',$data); 
                 
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
                    $id=auth('distributor')->user()->id;
                   
                    $distributor=Distributor::find($id);
                    if($request->hasFile('profileImage'))
                    {
                       
                    if($distributor->profileImage != Null){
                        $path1 = 'distributor/images/profile/'.$distributor->profileImage;
                        File::delete($path1);
                    }
                   
                    $pub_profile = $request->file('profileImage');
                    $pub_profileNamename= $distributor->firstName.time().'_'.$pub_profile->getClientOriginalName();
                    $request->profileImage->move(public_path('distributor/images/profile'),$pub_profileNamename);  
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
                    $id=auth('distributor')->user()->id;
                   
                    $distributor=Distributor::find($id);
                    if($request->hasFile('backgroundImage'))
                    {
                       
                    if($distributor->backgroundImage != Null){
                        $path1 = 'distributor/images/profile/'.$distributor->backgroundImage;
                        File::delete($path1);
                    }
                   
                    $pub_profile = $request->file('backgroundImage');
                    $pub_profileNamename= $distributor->firstName.time().'_'.$pub_profile->getClientOriginalName();
                    $request->backgroundImage->move(public_path('distributor/images/profile'),$pub_profileNamename);  
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
