<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\HidelinsTitle;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\Distributor;
use msztorc\LaravelEnv\Env;
use App\Mail\SmtpTestEmail;
use App\Models\Loginhidelins;
use App\Models\Fogothidelins;
use App\Models\Mailconfirmtitle;
use App\Models\Homepagebooks;
use File;
use Illuminate\Support\Str;
use App\Models\Homefooter;
use App\Models\Homebanner;
use App\Models\Fogotpasswordhidelins;
use App\Models\Reviewerbatch;
use App\Models\Mailurl;
use App\Models\Thirukkural;
use App\Models\Newsfeed;
use App\Models\Manualguidelines;



class SettingController extends Controller
{

    public function email(){
        return view('admin.smtp');
    }
    /**
     * Update mail configuration settings on .env file
     *
     * @param Request $request
     * @return void
     */
    public function emailUpdate(Request $request)
    {
        $request->validate([
            'mail_host'     =>  ['required',],
            'mail_port'     =>  ['required', 'numeric'],
            'mail_username'     =>  ['required',],
            'mail_password'     =>  ['required',],
            'mail_encryption'     =>  ['required',],
            'mail_from_name'     =>  ['required',],
            'mail_from_address'     =>  ['required', 'email'],
        ]);

        $data = $request->only(['mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_name', 'mail_from_address']);

        foreach ($data as $key => $value) {
            $env = new Env();
            $env->setValue(strtoupper($key), $value);
        }
        return back()->with('success', 'Mail configuration update successfully');
    }


    /**
     * Send a test email for check mail configuration credentials
     *
     * @return void
     */
    public function testEmailSent(Request $request)
    {
        $request->validate(['test_email' => ['required', 'email']]);
        // try {
            \Mail::to(request()->test_email)->send(new SmtpTestEmail);
            return back()->with('success', 'Test email sent successfully.');
        // } catch (\Throwable $th) {
        //     return back()->with('error', $th->getMessage());
        //     return back()->with('error', 'Invalid email configuration. Mail send failed.');
        // }
    }
    public function mailverification_title(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'userType'=>'required|string',
            'hidelineTitle'=>'required|string',
            'hidelineContent'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
        $record = Mailconfirmtitle::where('userType','=',$req->userType)->first();
        if ($record == null) {
            $hidelin = new Mailconfirmtitle();
            $hidelin->userType = $req->userType;
            $hidelin->hidelineTitle = $req->hidelineTitle;
            $hidelin->hidelineContent = json_encode($req->hidelineContent);
            $hidelin->save();
        
            $data = [
                'success' => 'Mailconfirmtitle Hidelin Created Successfully',
            ];
        
            return response()->json($data);
        } else {
           
            $record->userType = $req->userType;
            $record->hidelineTitle = $req->hidelineTitle;
            $record->hidelineContent = json_encode($req->hidelineContent);
            $record->save();
        
            $data = [
                'success' => 'Mailconfirmtitle Hidelin Updated Successfully',
            ];
        
            return response()->json($data);
        }
        
    }

    public function hidelins_title(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'userType'=>'required|string',
            'hidelineTitle'=>'required|string',
            'hidelineContent'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
        $record = HidelinsTitle::where('userType','=',$req->userType)->first();
      
        if ($record == null) {
            $hidelin = new HidelinsTitle();
            $hidelin->userType = $req->userType;
            $hidelin->hidelineTitle = $req->hidelineTitle;
            $hidelin->hidelineContent = json_encode($req->hidelineContent);
            $hidelin->save();
        
            $data = [
                'success' => 'Hidelin Created Successfully',
            ];
        
            return response()->json($data);
        } else {
           
            $record->userType = $req->userType;
            $record->hidelineTitle = $req->hidelineTitle;
            $record->hidelineContent = json_encode($req->hidelineContent);
            $record->save();
        
            $data = [
                'success' => 'Hidelin Updated Successfully',
            ];
        
            return response()->json($data);
        }
        
    }
    
    public function mailurl(Request $req){
        // $hidelin = new Mailurl();
        $record = Mailurl::first();
        if ($record == null) {
            $hidelin = new Mailurl();
            $hidelin->name = $req->mailurl;
            $hidelin->save();
        
            return back()->with('success' , 'Mail urln Updated Successfully');

        } else {
           
            $record->name = $req->mailurl;
            $record->save();
        
          
                
          
        
            return back()->with('success' , 'Mail urln Updated Successfully');
        }
    
}

    public function loginhidelins_title(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'userType'=>'required|string',
            'hidelineTitle'=>'required|string',
            'hidelineContent'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
        $record = Loginhidelins::where('userType','=',$req->userType)->first();
        if ($record == null) {
            $hidelin = new Loginhidelins();
            $hidelin->userType = $req->userType;
            $hidelin->hidelineTitle = $req->hidelineTitle;
            $hidelin->hidelineContent = json_encode($req->hidelineContent);
            $hidelin->save();
        
            $data = [
                'success' => 'Login Page Hidelin Created Successfully',
            ];
        
            return response()->json($data);
        } else {
           
            $record->userType = $req->userType;
            $record->hidelineTitle = $req->hidelineTitle;
            $record->hidelineContent = json_encode($req->hidelineContent);
            $record->save();
        
            $data = [
                'success' => 'Login Page Hidelin Updated Successfully',
            ];
        
            return response()->json($data);
        }
        
    }

    public function forgothidelins_title(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'userType'=>'required|string',
            'hidelineTitle'=>'required|string',
            'hidelineContent'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
        $record = Fogothidelins::where('userType','=',$req->userType)->first();
      
        if ($record == null) {
            $hidelin = new Fogothidelins();
            $hidelin->userType = $req->userType;
            $hidelin->hidelineTitle = $req->hidelineTitle;
            $hidelin->hidelineContent = json_encode($req->hidelineContent);
            $hidelin->save();
        
            $data = [
                'success' => 'Forgot Page Hidelin Created Successfully',
            ];
        
            return response()->json($data);
        } else {
           
            $record->userType = $req->userType;
            $record->hidelineTitle = $req->hidelineTitle;
            $record->hidelineContent = json_encode($req->hidelineContent);
            $record->save();
        
            $data = [
                'success' => 'Forgot Page Hidelin Updated Successfully',
            ];
        
            return response()->json($data);
        }
        
    }


    public function forgotpasswordhidelins_title(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'userType'=>'required|string',
            'hidelineTitle'=>'required|string',
            'hidelineContent'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
        $record = Fogotpasswordhidelins::where('userType','=',$req->userType)->first();
        if ($record == null) {
            $hidelin = new Fogotpasswordhidelins();
            $hidelin->userType = $req->userType;
            $hidelin->hidelineTitle = $req->hidelineTitle;
            $hidelin->hidelineContent = json_encode($req->hidelineContent);
            $hidelin->save();
        
            $data = [
                'success' => 'Forgot Page Hidelin Created Successfully',
            ];
        
            return response()->json($data);
        } else {
           
            $record->userType = $req->userType;
            $record->hidelineTitle = $req->hidelineTitle;
            $record->hidelineContent = json_encode($req->hidelineContent);
            $record->save();
        
            $data = [
                'success' => 'Forgot Page Hidelin Updated Successfully',
            ];
        
            return response()->json($data);
        }
        
    }

public function reviewerbatchadd(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $reviewerbatch= New Reviewerbatch();
             $reviewerbatch->name=$req->name;
             $reviewerbatch->status=$req->status;
             $reviewerbatch->save();
             $data= [
                'success' => 'Reviewer Batch  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    public function homepageboookadd(Request $req){

        $validator = Validator::make($req->all(),[
            'slidertype'=>'required|string',
            'category'=>'required|string',
            'booktitle'=>'required|string',
          
            'description'=>'required|string',
           
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
     if($req->bookImage == "undefined"){
        $data= [
            'error' => 'bookImage Filed Is Required',
                 ];
        return response()->json($data);   
       
     }else{
     
              $Homepagebooks=New Homepagebooks();
              $Homepagebooks->type=$req->slidertype;
              $Homepagebooks->category=$req->category;
              $Homepagebooks->booktitle=$req->booktitle;
              $Homepagebooks->subtitle=$req->subtitle;
              $Homepagebooks->description=$req->description;
              $image = $req->file('bookImage');
              $imagename = $req->booktitle . time() . '.' . $image->getClientOriginalExtension();
              $image->move('admin/bookImage', $imagename);
             
              $Homepagebooks->bookImage = $imagename;
              $Homepagebooks->save();
              $data= [
                 'success' => 'Homepage Boook Create Successfully',
                      ];
             return response()->json($data);  
     }
   

    }
    public function bannerstatus(Request $req){
        $Homepagebooks= Homepagebooks::find($req->bannerid);
        if($req->status == '0'){
            $Homepagebooks->status="0";
        }else{
            $Homepagebooks->status="1";
        }
       
       
        $Homepagebooks->update();
        $data= [
            'success' => 'Homepage Boook status change Successfully',
                 ];
        return response()->json($data); 
    }
    public function book_banner_delete(Request $req){
        $Homepagebooks= Homepagebooks::find($req->id);
        $Homepagebooks->delete();
        $data= [
            'success' => 'Homepage Boook delete Successfully',
                 ];
        return response()->json($data); 
    }
    public function banner_settingedit($id){
        $banner= Homepagebooks::find($id);
        \Session::put('banner', $banner);
     
          return redirect('admin/bannerview'); 
    }
    public function homepageboookedit(Request $req){
        $Homepagebooks= Homepagebooks::find($req->id);
        $Homepagebooks->type=$req->slidertype;
              $Homepagebooks->category=$req->category;
              $Homepagebooks->booktitle=$req->booktitle;
              $Homepagebooks->subtitle=$req->subtitle;
              $Homepagebooks->description=$req->description;
              if($req->bookImage != "undefined"){
                File::delete(public_path('admin/bookImage/' . $Homepagebooks->bookImage));
              $image = $req->file('bookImage');
              $imagename = $req->booktitle . time() . '.' . $image->getClientOriginalExtension();
              $image->move('admin/bookImage', $imagename);
              $Homepagebooks->bookImage = $imagename;
              }
              $Homepagebooks->save();
              $data= [
                 'success' => 'Homepage Boook Update Successfully',
                      ];
             return response()->json($data);
        
    }

    
    public function footeradd(Request $req){

        $validator = Validator::make($req->all(),[
            'about'=>'required|string',
            'address'=>'required',
            'phoneNumber'=>'required|string',
            'faxNumber'=>'required|string',
            'email'=>'required|string',
            'copyright'=>'required|string',


        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
        $record=Homefooter::first();
        if($record == null){
            $Homefooter=New Homefooter();
            $Homefooter->about=$req->about;
            $Homefooter->address=$req->address;
            $Homefooter->phoneNumber=$req->phoneNumber;
            $Homefooter->faxNumber=$req->faxNumber;
            $Homefooter->email=$req->email;
            $Homefooter->copyright=$req->copyright;
            $Homefooter->facebook=$req->facebook;
            $Homefooter->twitter=$req->twitter;
            $Homefooter->youtube=$req->youtube;
            $Homefooter->save();
            $data= [
                'success' => 'Home footer Create Successfully',
                     ];
            return response()->json($data);
        }else{
          
            $record->about=$req->about;
            $record->address=$req->address;
            $record->phoneNumber=$req->phoneNumber;
            $record->faxNumber=$req->faxNumber;
            $record->email=$req->email;
            $record->copyright=$req->copyright;
            $record->facebook=$req->facebook;
            $record->twitter=$req->twitter;
            $record->youtube=$req->youtube;
            $record->save();
            $data= [
                'success' => 'Home footer Update Successfully',
                     ];
            return response()->json($data);
        }
      
    }
    

    public function banneradd(Request $req){
        $validator = Validator::make($req->all(),[
            'bannerImage'=>'required',
           


        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
           dd($req);
        //    $image = $req->file('bookImage');
        //    $imagename = $req->booktitle . time() . '.' . $image->getClientOriginalExtension();
        //    $image->move('admin/bookImage', $imagename);
        //    $Homepagebooks->bookImage = $imagename;


    }
    // public function websitelogo(Request $req)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'websitelogo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    
    //     if ($validator->fails()) {
    //         $data = [
    //             'error' => $validator->errors()->first(),
    //         ];
    //         return response()->json($data);  
    //     }
      

    //     $imageName = 'logo.png';
    //     $imagename1 = 'logo.png';

    //     if($req->websitelogo != "undefined"){
    //         File::delete(public_path('images/' . $imageName));
    //         File::delete(public_path('assets/img/logo/' . $imagename1));
    //       $image = $req->file('websitelogo');
    //       $image1 = $req->file('websitelogo');
    //       $imagename = $imageName;
    //       $imagename1 = $imageName1;
    //       $image->move('images', $imagename);
    //       $image1->move('assets/img/logo', $imagename1);
    //     }
        
    //     $data= [
    //         'success' => 'Home footer Update Successfully',
    //              ];
    //     return response()->json($data);
    // }
    public function websitelogo(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'websitelogo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            $data = [
                'error' => $validator->errors()->first(),
            ];
            return response()->json($data);
        }
    
        $imageName = 'logo.png';
    
        if ($req->hasFile('websitelogo')) {
            $image = $req->file('websitelogo');
    
            File::delete(public_path('assets/img/logo/' . $imageName));
    
            try {
             
                $image->move(public_path('assets/img/logo'), $imageName);
            } catch (\Exception $e) {
                // If an error occurs during file move, return error response
                $data = [
                    'error' => 'Error occurred while uploading the file.',
                ];
                return response()->json($data);
            }
        }
    
        $data = [
            'success' => 'Home footer Update Successfully',
        ];
        return response()->json($data);
    }
    public function thirukkuraladd(Request $req){

        $validator = Validator::make($req->all(),[
            'thirukkuralFirstLine'=>'required|string',
            'thirukkuralSecondLine'=>'required|string',
            'shortDescription'=>'required',
            'longDescription'=>'required|string',
    
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
     
            $Thirukkural=New Thirukkural();
            $Thirukkural->thirukkuralFirstLine=$req->thirukkuralFirstLine;
            $Thirukkural->thirukkuralSecondLine=$req->thirukkuralSecondLine;
            $Thirukkural->shortDescription=$req->shortDescription;
            $Thirukkural->longDescription=$req->longDescription;
            $Thirukkural->save();
            $data= [
                'success' => 'Thirukkuralr Create Successfully',
                     ];
            return response()->json($data);
 }



                    public function newsfeedadd(Request $req){

                        $validator = Validator::make($req->all(),[
                            'newsFeed'=>'required|string',
                       
                        ]);
                        if($validator->fails()){
                            $data= [
                                'error' => $validator->errors()->first(),
                                     ];
                            return response()->json($data);  
                           
                        }
                      
                        $record = Newsfeed::first();
                        if ($record == null) {
                            $newsFeed = new Newsfeed();
                            $newsFeed->newsFeed = $req->newsFeed;
                         
                            $newsFeed->save();
                        
                            $data = [
                                'success' => 'NewsFeed Created Successfully',
                            ];
                        
                            return response()->json($data);
                        } else {
                           
                            $record->newsFeed = $req->newsFeed;
                        
                            $record->save();
                        
                            $data = [
                                'success' => 'NewsFeed Created Successfully',
                            ];
                        
                            return response()->json($data);
                        }
                                    }
                    
                                    public function thirukkuralstatus(Request $req){
                                        $Thirukkural= Thirukkural::find($req->id);
                                        $Thirukkural->status=$req->status;
                                        $Thirukkural->update();
                                        $data= [
                                            'success' => 'Thirukkural Status Change Successfully',
                                                 ];
                                        return response()->json($data); 
                                    }   
                                    
                                    public function thirukkuraldelete(Request $req){
                                        $Thirukkural= Thirukkural::find($req->id);
                                
                                        $Thirukkural->delete();
                                        $data= [
                                            'success' => 'Thirukkural Status Change Successfully',
                                                 ];
                                        return response()->json($data); 
                                    }   
                                    

                                    public function manualguidelines(Request $req){

                                        $validator = Validator::make($req->all(),[
                                            'userType'=>'required|string',
                                            'descriptionConten'=>'required',

                                            
                                        ]);
                                        if($validator->fails()){
                                            $data= [
                                                'error' => $validator->errors()->first(),
                                                     ];
                                            return response()->json($data);  
                                           
                                        }
                                      
                                        $record = Manualguidelines::where('userType','=',$req->userType)->first();
                                        if ($record == null) {
                                            $Manualguidelines = new Manualguidelines();
                                            $Manualguidelines->usertype = $req->userType;
                                            $Manualguidelines->content = json_encode($req->descriptionConten);


                                            $Manualguidelines->save();
                                         
                                            $data = [
                                                'success' => 'Manual guidelines Created Successfully',
                                            ];
                                        
                                            return response()->json($data);
                                        } else {
                                           
                                        
                                            $record->content = json_encode($req->descriptionConten);

                                            $record->save();
                                        
                                            $data = [
                                                'success' => 'Manual guidelines Created Successfully',
                                            ];
                                        
                                            return response()->json($data);
                                        }
                                                    }


                                    
                                }
