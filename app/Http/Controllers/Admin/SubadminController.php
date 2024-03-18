<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\Notifications;
use App\Models\Publisher;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubAdmindetailNotification;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
 use Illuminate\Http\UploadedFile;
use App\Models\Subadmin;
use Illuminate\Support\Facades\Hash;
use App\Models\Mailurl;



class SubadminController extends Controller
{
    public function district(){
        $district = District::all();
      
        return view('admin/sub_admin_add')->with('district',$district);   
    }
    public function subadminlist(){
      $subadmin = Subadmin::all();
      return view('admin/sub_admin_list')->with('subadmin',$subadmin);   
        }
        public function subadminactive(){
          $subadmin = Subadmin::where('status', '1')->get();
         
          return view('admin/sub_admin_active')->with('subadmin',$subadmin);   
            }
        public function subadmininactive(){
          $subadmin = Subadmin::where('status', '0')->get();
          return view('admin/sub_admin_inactive')->with('subadmin',$subadmin);   
            }
    
        
        public function subadminview($id){
          $subadmin = Subadmin::find($id);
        return redirect('/admin/sub_admin_view')->with('subadmin',$subadmin);   
      }
      public function subadminedit($id){
        $subadmin = Subadmin::find($id);
        $district = District::all();
        $subadmin->District= $district;

      return redirect('/admin/sub_admin_edit')->with('subadmin',$subadmin);   
      }
     
      
      public function subadmindelete($id){
        $subadmin = Subadmin::find($id);
        $path = 'sub_admin/SubAdminImage/'.$subadmin->subadminImage;
        if(File::exists($path)){
         File::delete($path);
        }
        $subadmin->delete();
        return back()->with('success','Subadmin Deleted Successfully');
      }
      public function subadminstatus(Request $req){
       
        if($req->status=="1"){
          $subadmins = Subadmin::find($req->subadminid);
          $subadmin = Subadmin::where('status', '1')->where('district', $subadmins->district)->first();
            if($subadmin == null){
              $subadmins->status=$req->status;
              $subadmins->save();
              $data= [
                'success' => 'Subadmin Status Changed Successfully'
               ];
            return response()->json($data);
            }else{
              $data= [
                'error' => 'This District Was Already Assigned'
               ];
            return response()->json($data);
            }
        }else{
          $subadmins = Subadmin::find($req->subadminid);
          $subadmins->status=$req->status;
          $subadmins->save();
          $data= [
            'success' => 'Subadmin Status Changed Successfully'
           ];
        return response()->json($data);
        }
      }
    
    public function  subadminadd(Request $req){

        try{
          $validator = Validator::make($req->all(),[
              'name'=>'required|string',
              'userName'=>'required|string',
               'designation'=>'required|string',
               'postalCode'=>'required',
               'address'=>'required',
               'district'=>'required',
               'email'=>'required|email',
               'password'=>'required|string|max:8',
               'confirmPassword'=>'required|string|max:8',
               'mobileNumber'=>'required|string|min:10',
               'subadminImage'=>'required',
          ]);
        if($validator->fails()){
          return back()->withInput()->withErrors($validator->errors()->first());
      }   
          $subad = Subadmin::where('email', $req->email)->first();
          if($subad != null){
           $district=$req->district;
           $subadmin = Subadmin::where('status', '1')->where('district', $district)->first();
             if($subadmin == null){
          if($req->password == $req->confirmPassword){
            $subadmin = new Subadmin();
            $image = $req->file('subadminImage');
            $name= $req->name.time().'.'.$image->getClientOriginalExtension();
            $image->move(('sub_admin/SubAdminImage'),$name);
            $subadmin->subadminImage=$name;
            $subadmin->password=Hash::make($req->password);
            $subadmin->name = $req->name;
            $subadmin->userName = $req->userName;
            $subadmin->designation = $req->designation;
            $subadmin->postalCode = $req->postalCode;
            $subadmin->district = $req->district;
            $subadmin->mobileNumber = $req->mobileNumber;
            $subadmin->email = $req->email;
            $subadmin->address = $req->address;
            $id=auth('admin')->user()->id; 
            $subadmin->createdBy=  $id;
            $subadmin->role="Subadmin";
       
            if($subadmin->save()){
           
              $user = $subadmin->email;
              $record = $subadmin;
              $password = $req->password;
              // $url = "http://127.0.0.1:8000/admin/login";
              $rev =Mailurl::first();
              $url = $rev->name . "/admin/login";
              Notification::route('mail',$subadmin->email)->notify(new SubAdmindetailNotification($user, $url,$record,$password));  
             
                         
             

            return back()->with('success','Subadmin Created Successfully '); 
           }
          }else{
            return back()->withInput()->with('error','newPassword and confirmPassword is mishmatch'); 
          }
        }else{
          return back()->withInput()->with('error','This District To Alredy Subadmin there'); 
        }
      }else{
        return back()->withInput()->with('error','This Email Alredy Exist'); 
      }
      }catch(Throwable $e){
        return back()->with('error', $e->getMessage());
      }
    }
    public function subadmineditdata(Request $req){

      try{
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'userName'=>'required|string',
             'designation'=>'required|string',
             'postalCode'=>'required',
             'address'=>'required',
             'district'=>'required',
             'email'=>'required|string|email',
             'mobileNumber'=>'required|string|min:10',
            
        ]);
      if($validator->fails()){
        $data= [
          'error' => $validator->errors()
               ];
      return response()->json($data);
      }
    
      $subadmin = Subadmin::find($req->id);

      if(empty($req->password) && empty($confirmPassword)) {
        if($req->subadminImage !="undefined"){
          $path = 'sub_admin/SubAdminImage/'.$subadmin->subadminImage;
          if(File::exists($path)){
           File::delete($path);
          }
          File::delete($path);
          $image = $req->file('subadminImage');
          $name= $req->name.time().'.'.$image->getClientOriginalExtension();
          $image->move(('sub_admin/SubAdminImage'),$name);
          $subadmin->subadminImage=$name;
        }
        $subadmin->name = $req->name;
        $subadmin->userName = $req->userName;
        $subadmin->designation = $req->designation;
        $subadmin->postalCode = $req->postalCode;
        $subadmin->mobileNumber = $req->mobileNumber;
        $subadmin->email = $req->email;
        $subadmin->address = $req->address;
        if($subadmin->save()){
          $data= [
            'success' => 'Subadmin Updated Successfully',
                 ];
        return response()->json($data);
        }
         
     }elseif(!empty($req->password) && empty($req->confirmPassword) ){
      $data= [
        'error' => 'please enter password and confirmPassword',
             ];
         return response()->json($data);
     }elseif(empty($req->password) && !empty($req->confirmPassword) ){
      $data= [
        'error' => 'please enter password and confirmPassword',
             ];
         return response()->json($data);
     }else{
      if($req->password == $req->confirmPassword){
        if (strlen($req->password ) == 8 && strlen($req->confirmPassword) == 8) {
        
          if($req->subadminImage !="undefined"){
            $path = 'sub_admin/SubAdminImage/'.$subadmin->subadminImage;
            if(File::exists($path)){
             File::delete($path);
            }
            File::delete($path);
            $image = $req->file('subadminImage');
            $name= $req->name.time().'.'.$image->getClientOriginalExtension();
            $image->move(('sub_admin/SubAdminImage'),$name);
            $subadmin->subadminImage=$name;
          }
      $subadmin->name = $req->name;
      $subadmin->userName = $req->userName;
      $subadmin->designation = $req->designation;
      $subadmin->postalCode = $req->postalCode;
      $subadmin->district = $req->district;
      $subadmin->mobileNumber = $req->mobileNumber;
      $subadmin->password=Hash::make($req->password);
      $subadmin->email = $req->email;
      $subadmin->address = $req->address;
      if($subadmin->save()){
      
        $data= [
          'success' => 'Subadmin Updated Successfully',
               ];
      return response()->json($data);
       }
      }else{
        $data= [
          'error' => 'Password must be at least 8 characters long',
               ];
           return response()->json($data);
      }
     }else{
      $data= [
        'error' => 'Password and confirmPassword is mishmatch',
             ];
         return response()->json($data);
    }
  }
}catch(Throwable $e){
  $data= [
    'error' => $e->getMessage(),
         ];
     return response()->json($data);
}
 
    } 
    public function navigation(){
      $id=auth('admin')->user()->id;
         $notification=Notifications::where('from','=',$id)->get();
         $notification1=Notifications::where('from','=',$id)->where('status','=','unread')->get();
         $count=count($notification1);
         $data=[];
         foreach($notification as $key=>$val){
               if($val->type == "publisher"){
                $publisher=Publisher::find($val->to);
                 $val->profileImage=$publisher->profileImage;
                 $val->firstName=$publisher->firstName;
                 $val->lastName=$publisher->lastName;
                 array_push($data,$val);
              }
        }   
        $data1='';
        $html='';   
        foreach($data as $key=>$val){
          
          if($val->profileImage == null){
           $path =asset("images/default.png");
          }
      else{

        $path=asset($val->type."/images/profile/".$val->profileImage);
      }
          $date = Carbon::parse($val->created_at)->format('d F Y - h:i A');
          $html=  "<li>
          <div class=\"timeline-panel\">
              <div class=\"media me-2\">
                  <img alt=\"image\" width=\"50\" src=\"{{$path}}\">
              </div>
              <div class=\"media-body\">
                  <h6 class=\"mb-1\">$val->firstName $val->lastName - $val->type</h6>
                  <small class=\"d-block\">$date</small>
                  <h6 class=\"mb-0\">$val->message</h6>
              </div>
          </div>
       </li>";
       $data1 = $data1.$html;
        }
             


               $data= [
                'record' =>  $data1,
                'count' => $count
            ];
            return response()->json($data);
         }


         public function notificationstatus(Request $req){
           
          $id=auth('admin')->user()->id;
          $notification1=Notifications::where('from','=',$id)->where('status','=','unread')->get();
          foreach($notification1 as $key=>$val){
               $noti= Notifications::find($val->id);
               $noti->status="read";
               $noti->save();
          }

          
          $data= [
            'sucess' =>  'status change',
          
        ];
        return response()->json($data);
         }
         

        }
        
     
      
  



