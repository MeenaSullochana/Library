<?php

namespace App\Http\Controllers\Publisher;
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
use Illuminate\Support\Facades\Hash;
use File;

use App\Models\Accountdetail;


class PublisherController extends Controller
{

    public function publisherchangepassword(Request $req){

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
        $publisher=auth('publisher')->user();
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

    public function pubprofile($id){
        $publisher=Publisher::find($id);
        $publisher->topTitles1= json_decode($publisher->topTitles);
        $publisher->topTranslatedBooks1= json_decode($publisher->topTranslatedBooks);
        $publisher->awardTitle1= json_decode($publisher->awardTitle);
        $publisher->association1= json_decode($publisher->association);
        $publisher->subsidiary1= json_decode($publisher->subsidiary);
        // return $publisher;
        return redirect('/publisher/pubprofile')->with('publisher',$publisher);

         }
         public function pubprofileview(){
            $data=auth('publisher')->user();
            $data->topTitles1= json_decode($data->topTitles);
            $data->topTranslatedBooks1= json_decode($data->topTranslatedBooks);
            $data->awardTitle1= json_decode($data->awardTitle);
            $data->association1= json_decode($data->association);
            $data->subsidiary1= json_decode($data->subsidiary);
            return view('publisher.pub_profile_view',compact('data'));

             }
             public function pubprofileedit(){
                $data=auth('publisher')->user();
                $data->topTitles1= json_decode($data->topTitles);
                $data->topTranslatedBooks1= json_decode($data->topTranslatedBooks);
                $data->awardTitle1= json_decode($data->awardTitle);
                $data->association1= json_decode($data->association);
                $data->subsidiary1= json_decode($data->subsidiary);
                // return $data;
                return view('publisher.pub_profile_edit')->with('data',$data);

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
                    $id=auth('publisher')->user()->id;

                    $publisher=Publisher::find($id);
                    if($request->hasFile('profileImage'))
                    {

                    if($publisher->profileImage != Null){
                        $path1 = 'publisher/images/profile/'.$publisher->profileImage;
                        File::delete($path1);
                    }

                    $pub_profile = $request->file('profileImage');
                    $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
                    $request->profileImage->move(public_path('publisher/images/profile'),$pub_profileNamename);
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
                    $id=auth('publisher')->user()->id;

                    $publisher=Publisher::find($id);
                    if($request->hasFile('backgroundImage'))
                    {

                    if($publisher->backgroundImage != Null){
                        $path1 = 'publisher/images/profile/'.$publisher->backgroundImage;
                        File::delete($path1);
                    }

                    $pub_profile = $request->file('backgroundImage');
                    $pub_profileNamename= $publisher->firstName.time().'_'.$pub_profile->getClientOriginalName();
                    $request->backgroundImage->move(public_path('publisher/images/profile'),$pub_profileNamename);
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
        $id=auth('publisher')->user()->id;
        $data =Accountdetail::where('user_id', $id)->first();
        return view('publisher.aacountdetails')->with('data',$data);

    }
    public function pub_basic_details(){
        $data=auth('publisher')->user();
      
        return view('publisher.pub_basic_details')->with('data',$data);

    }
    public function update_accountdetails(Request $req){
     
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
    
             
            $Accountdetail = Accountdetail::find($req->id);
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
   
         
            if($Accountdetail->save()){
                
                $data= [
                'success' => 'Account Details  Updated  Successfully',
                        ];
            return response()->json($data);
            }
            

        
    }
}
