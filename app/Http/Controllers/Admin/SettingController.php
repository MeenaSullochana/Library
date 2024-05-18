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
use Illuminate\Support\Collection;
use App\Models\Ticket;
use App\Models\Distributor;
use msztorc\LaravelEnv\Env;
use App\Mail\SmtpTestEmail;
use App\Models\Loginhidelins;
use App\Models\Fogothidelins;
use App\Models\Mailconfirmtitle;
use App\Models\Homepagebooks;
use App\Models\Ordermagazine;
use App\Models\MagazineCategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMailMailable;
use App\Models\Magazine;
use App\Models\Procurementpaymrnt;

use App\Models\PeriodicalPublisher;
use App\Models\PeriodicalDistributor;
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
use TCPDF; 
use PDF;
use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PublisherDistributor;
use App\Models\Librarian;
use App\Models\Book;

use Illuminate\Support\Facades\Notification;
use App\Notifications\newmail;
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

                                                    public function report_down_publisher (Request $request)
                                                    {

                                                        $validator = Validator::make($request->all(),[
                                                            'fromDate'=>'required',
                                                            'toDate'=>'required',
                                                            'documentType'=>'required',
                                                       
                                                    
                                                        ]); 
                                                        if($validator->fails()){
                                                            $data= [
                                                                'error' => $validator->errors()->first(),
                                                                     ];
                                                            return response()->json($data);  
                                                           
                                                        }
                                                       try {
                                                        $publisher = Publisher::whereBetween('created_at', [$request->fromDate, $request->toDate])->get();
                                                           if ($publisher->isEmpty()) {
                                                            return response()->json([
                                                                'error' => 'No data found for the given date range.',
                                                            ]);

                                                             
                                                           }
                                                           if( $request->documentType == "Excel") {
                                                        $excelData = [
                                                            ['S.No', 'Publication Name', 'Publisher Name', 'Email', 'Mobile Number', 'Publication Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                        ];
                                                        $index=0;
                                                        foreach ($publisher as $publisher) {
                                                            $excelData[] = [
                                                                $index=  $index + 1,
                                                                $publisher->publicationName,
                                                                $publisher->firstName." ".$publisher->lastName,
                                                                $publisher->email,
                                                                $publisher->mobileNumber,
                                                                $publisher->publicationAddress,
                                                                $publisher->country,
                                                                $publisher->state,
                                                                $publisher->District,
                                                                $publisher->city,
                                                                $publisher->postalCode,
                                                            ];
                                                        }
                                                
                                                        return response()->json([
                                                            'excelData' => $excelData,
                                                            'success' => 'Excel Downloaded Successfully'
                                                        ]);
                                                     }else{
                                                        $pdfContent = View::make('admin.pdfview', ['publisher' => $publisher])->render();
                                                           
                                                        if (empty($pdfContent)) {
                                                            throw new \Exception("PDF content is empty.");
                                                        }
                                                    
                                                        $pdf = PDF::loadHTML($pdfContent);
                                                        $pdfData = $pdf->output(); 
                                                  
                                                        if (empty($pdfData)) {
                                                            throw new \Exception("PDF data is empty.");
                                                        }
                                                    
                                                        return response()->json([
                                                            'pdfData' => base64_encode($pdfData),
                                                            'filename' => 'data1111.pdf' ,
                                                            'success' => 'Psf Downloaded Successfully'
                                                        ]);
                                                       }
                                                         
                                                       } catch (\Exception $e) {
                                                           return response()->json([
                                                               'error' => $e->getMessage()
                                                           ], 500);
                                                       }
                                                       
                                                   }
                                                       
                                                                                                             
                                                     public function report_downl_distributor(Request $request)
                                                     {
                                                       $validator = Validator::make($request->all(),[
                                                           'fromDate'=>'required',
                                                           'toDate'=>'required',
                                                           'documentType'=>'required',
                                                      
                                                   
                                                       ]); 
                                                       if($validator->fails()){
                                                           $data= [
                                                               'error' => $validator->errors()->first(),
                                                                    ];
                                                           return response()->json($data);  
                                                          
                                                       }
                                                       
                                                       
                                                       try {
                                                            $distributor = Distributor::whereBetween('created_at', [$request->fromDate, $request->toDate])->get();
                                                       
                                                            if ($distributor->isEmpty()) {
                                                                return response()->json([
                                                                    'error' => 'No data found for the given date range.',
                                                                ]);
    
                                                                 
                                                               }
                                                               if( $request->documentType == "Excel") {
                                                            $excelData = [
                                                                ['S.No', 'Distribution Name', 'Distributor Name', 'Email', 'Mobile Number', 'Distribution Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                            ];
                                                        
                                                            $index=0;
                                                            foreach ($distributor as $distributor) {
                                                                $excelData[] = [
                                                                    $index=  $index + 1,
                                                                    $distributor->distributionName,
                                                                    $distributor->firstName." ".$distributor->lastName,
                                                                    $distributor->email,
                                                                    $distributor->mobileNumber,
                                                                    $distributor->distributionAddress,
                                                                    $distributor->country,
                                                                    $distributor->state,
                                                                    $distributor->District,
                                                                    $distributor->city,
                                                                    $distributor->postalCode,
                                                                ];
                                                            }
                                                    
                                                            return response()->json([
                                                                'excelData' => $excelData,
                                                                'success' => 'Excel Downloaded Successfully'
                                                            ]);
                                                         }else{
                                                        
                                                            $pdfContent = View::make('admin.pdfviewdist', ['distributor' => $distributor])->render();
                                                            
                                                            if (empty($pdfContent)) {
                                                                throw new \Exception("PDF content is empty.");
                                                            }
                                                        
                                                            $pdf = PDF::loadHTML($pdfContent);
                                                           
                                                            $pdfData = $pdf->output(); 
                                                        
                                                            if (empty($pdfData)) {
                                                                throw new \Exception("PDF data is empty.");
                                                            }
                                                        
                                                            return response()->json([
                                                                'pdfData' => base64_encode($pdfData),
                                                                'filename' => 'data.pdf' 
                                                            ]);
                                                        }
                                                        } catch (\Exception $e) {
                                                            return response()->json([
                                                                'error' => $e->getMessage()
                                                            ], 500);
                                                        }
                                                        
                                             }
                                             public function report_downl_pubdist(Request $request)
                                             {
                                               $validator = Validator::make($request->all(),[
                                                   'fromDate'=>'required',
                                                   'toDate'=>'required',
                                                   'documentType'=>'required',
                                              
                                           
                                               ]); 
                                               if($validator->fails()){
                                                   $data= [
                                                       'error' => $validator->errors()->first(),
                                                            ];
                                                   return response()->json($data);  
                                                  
                                               }
                                               
                                               
                                               try {
                                                    $PubDist = PublisherDistributor::whereBetween('created_at', [$request->fromDate, $request->toDate])->get();
                                                    // $table->string('publicationDistributionAddress');

                                                    if ($PubDist->isEmpty()) {
                                                        return response()->json([
                                                            'error' => 'No data found for the given date range.',
                                                        ]);

                                                         
                                                       }
                                                       if( $request->documentType == "Excel") {
                                                    $excelData = [
                                                        ['S.No', 'publication Distribution Name', 'Distributor Name', 'Email', 'Mobile Number', 'publication Distribution Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                    ];
                                                
                                                    $index=0;
                                                    foreach ($PubDist as $PubDist) {
                                                        $excelData[] = [
                                                            $index=  $index + 1,
                                                            $PubDist->publicationDistributionName,
                                                            $PubDist->firstName." ".$PubDist->lastName,
                                                            $PubDist->email,
                                                            $PubDist->mobileNumber,
                                                            $PubDist->publicationDistributionAddress,
                                                            $PubDist->country,
                                                            $PubDist->state,
                                                            $PubDist->District,
                                                            $PubDist->city,
                                                            $PubDist->postalCode,
                                                        ];
                                                    }
                                            
                                                    return response()->json([
                                                        'excelData' => $excelData,
                                                        'success' => 'Excel Downloaded Successfully'
                                                    ]);
                                                 }else{
                                                
                                                    $pdfContent = View::make('admin.pdfviewdist', ['PubDist' => $PubDist])->render();
                                                    
                                                    if (empty($pdfContent)) {
                                                        throw new \Exception("PDF content is empty.");
                                                    }
                                                
                                                    $pdf = PDF::loadHTML($pdfContent);
                                                   
                                                    $pdfData = $pdf->output(); 
                                                
                                                    if (empty($pdfData)) {
                                                        throw new \Exception("PDF data is empty.");
                                                    }
                                                
                                                    return response()->json([
                                                        'pdfData' => base64_encode($pdfData),
                                                        'filename' => 'data1111.pdf' 
                                                    ]);
                                                }
                                                } catch (\Exception $e) {
                                                    return response()->json([
                                                        'error' => $e->getMessage()
                                                    ], 500);
                                                }
                                                
  }
   
  

  public function report_downl_login()
  {
    $librarian = Librarian::where('status', '=', '1')
                              ->where('checkstatus', '=', '1')
                              ->where('allow_status', '=', '1')

                              ->get();
      
      $librariandata = [];
      $serialNumber = 1;
      foreach ($librarian as $val1) {
          $librariandata[] = [
              'S.No' => $serialNumber++,
              'Library Code' => $val1->librarianId,
              'Library Name' => $val1->libraryName,
              'Type Of Library' => $val1->libraryType,
              'District' => $val1->district,
              'Dooe Number' => $val1->door_no,
              'Strwwt Name' => $val1->street,
              'Place' => $val1->place,
              'Village' => $val1->Village,
              'Taluk' => $val1->taluk,
              'Landmark' => $val1->landmark,
              'Post' => $val1->post,
              'Pin Code' => $val1->pincode,
              'Name' => $val1->librarianName,
              'Designation' => $val1->librarianDesignation,
              'Email' => $val1->email,
              'Contact Number' => $val1->phoneNumber,

          ];
      }
  
      $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Library Code,Library Name,Type Of Library,District,Dooe Number,Strwwt Name,Place,Village,Taluk,Landmark,Post,Pin Code,Name,Designation,Email,Contact Number\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) . "\"\n";
      }
  
      $headers = [
          'Content-Type' => 'text/csv; charset=utf-8',
          'Content-Disposition' => 'attachment; filename="librarian_report.csv"',
      ];
  
      return response()->make($csvContent, 200, $headers);
  }
  public function report_downl_notlogin()
  {
      $librarian = Librarian::where('status', '=', '1')
                              ->where('checkstatus', '=', Null)
                              ->where('allow_status', '=', '1')
                              ->get();
      
        
                              $librariandata = [];
                              $serialNumber = 1;
                              foreach ($librarian as $val1) {
                                  $librariandata[] = [
                                      'S.No' => $serialNumber++,
                                      'Library Code' => $val1->librarianId,
                                      'Library Name' => $val1->libraryName,
                                      'Type Of Library' => $val1->libraryType,
                                      'District' => $val1->district,
                                      'Dooe Number' => $val1->door_no,
                                      'Strwwt Name' => $val1->street,
                                      'Place' => $val1->place,
                                      'Village' => $val1->Village,
                                      'Taluk' => $val1->taluk,
                                      'Landmark' => $val1->landmark,
                                      'Post' => $val1->post,
                                      'Pin Code' => $val1->pincode,
                                      'Name' => $val1->librarianName,
                                      'Designation' => $val1->librarianDesignation,
                                      'Email' => $val1->email,
                                      'Contact Number' => $val1->phoneNumber,
                        
                                  ];
                              }
                          
                              $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
                              $csvContent .= "S.No,Library Code,Library Name,Type Of Library,District,Dooe Number,Strwwt Name,Place,Village,Taluk,Landmark,Post,Pin Code,Name,Designation,Email,Contact Number\n"; 

                              foreach ($librariandata as $data) {
                                  $csvContent .= '"' . implode('","', $data) . "\"\n";
                              }
                          
                              $headers = [
                                  'Content-Type' => 'text/csv; charset=utf-8',
                                  'Content-Disposition' => 'attachment; filename="librarian_report.csv"',
                              ];
                          
                              return response()->make($csvContent, 200, $headers);
  }


  public function report_downl_order()
  {
  $maga= Ordermagazine::where('status', '=', '1')
    ->orderBy('created_at', 'asc')
    ->get();
      
      $librariandata = [];
      $serialNumber = 1;
      foreach ($maga as $val1) {
       $Magazine =Librarian::find($val1->librarianid);

          $librariandata[] = [
              'S.No' => $serialNumber++,

              'Library Code' => $val1->libraryid,
              'Type of Library' => $val1->libraryType,
              'Library Name' => $Magazine->libraryName,
              'District' => $Magazine->district,
              'Contact Number' => $Magazine->phoneNumber,
              'OrderId' => $val1->orderid,

              'Quantity' => $val1->quantity,
              'Total Amount' => round($val1->totalBudget),
              'Purchased Amount' => round($val1->totalPurchased),
              'Balance Amount' => round($val1->totalBal),
              'Order Status' => 'Submitted',
              'Order Date' => \Carbon\Carbon::parse($val1->created_at)->format('Y-m-d'),
              'Percentage of Utilization' => ($val1->totalPurchased /  $val1->totalBudget)  *100 ,

                
          ];
      }
  
      $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Library Id,Type Of Library,Library Name,District,Contact Number,OrderId,Quantity,Total Amount,Purchased Amount,Balance Amount,Order Status,Order Date,Percentage of Utilization(%)\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) . "\"\n";
      }
  
      $headers = [
          'Content-Type' => 'text/csv; charset=utf-8',
          'Content-Disposition' => 'attachment; filename="Order_report.csv"',
      ];
  
      return response()->make($csvContent, 200, $headers);
  }
  public function magazineorder_down(Request $request){
  
     if($request->librarytype !=null &&  $request->district ==null  ){
       
      $orders = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();


     }else if( $request->district  !=null && $request->librarytype ==null){

        
        $orders1 = Ordermagazine::where('status', '=', '1')->get();
        $orders=[];
  
        foreach ($orders1 as $val) {

            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
           if( $Librarian !=null){
            array_push($orders,$val);
           }
            
        }

     }
    else if($request->librarytype !=null && $request->district !=null ){

       
        $orders1 = Ordermagazine::where('status', '=', '1')->get();
        $orders=[];
  
        foreach ($orders1 as $val) {

            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
           if( $Librarian->isNotEmpty()){
            array_push($orders,$val);
           }
            
        }

     }else{
      
        $orders = Ordermagazine::where('status', '=', '1')->get();

     }
      
    
    $magazineCounts = [];
    
    foreach ($orders as $order) {
        $magazineProducts = json_decode($order->magazineProduct, true);
    
        foreach ($magazineProducts as $magazineProduct) {
            $magazineId = $magazineProduct['magazineid'];
    
            if (!isset($magazineCounts[$magazineId])) {
                $magazineCounts[$magazineId] = [
                    'id' => $magazineId,
                    'count' => 0
                ];
            }
    
            $magazineCounts[$magazineId]['count']++;
        }
    }
    
    $magazineCounts = array_values($magazineCounts);
  
    $magazinedata = [];
    foreach ($magazineCounts as $val) {
         if($request->category !=null &&  $request->language ==null ){
            $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->first();

         }
       else if($request->category ==null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('language', '=', $request->language)->first();

       }
      else if($request->category !=null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->where('language', '=', $request->language)->first();

       }else{
        $magazine = Magazine::find($val['id']);

       }
        if ($magazine) {
            $magazine->count = $val['count'];
            $magazinedata[] = $magazine;
        }
    }
    $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();

    $datas=[];
      foreach($magazinebudget  as $val1){
     foreach($magazinedata  as $val){
      if($val1->name == $val->category){
      
          array_push($datas,$val);
      }
     
  
     }
    }
    $totalAmount = 0;
    $finaldata = [];
    $serialNumber = 1;
    foreach ($datas as $val1) {
        $finaldata[] = [
            'S.No' => $serialNumber++,
            'Language' => $val1->language,
            'Category' => $val1->category,
            'Title of the Magazine' => $val1->title,
            'Periodicity' => $val1->periodicity,
            'Type of Library' => $request->librarytype ?? "All",
            'District' => $request->district ?? "All",
            'No.of Subscription' => $val1->count,
            'Cover Price' =>$val1->single_issue_rate,
            'Annual Subscription' =>$val1->annual_subscription,
            'Discount' => $val1->discount,
            'Single Issue After Discount'=>$val1->single_issue_after_discount,
            'Annual Subscription After Discount'=>$val1->annual_cost_after_discount,
            'RNI Details'=>$val1->rni_details,
            'Total No.of Pages'=>$val1->total_pages,
            'Total No.of Multicolour Pages'=>$val1->total_multicolour_pages,
            'Total No.of Monocolour Pages'=>$val1->total_monocolour_pages,
            'Paper Quality'=>$val1->paper_qualitity,
            'Size of Magazine' =>$val1->magazine_size,
            'Contact Person'=>$val1->contact_person,
            'Phone'=>$val1->phone,
            'Email'=>$val1->email,
            'Address'=>$val1->address,
         

              
        ];
        $totalAmount =$totalAmount + $val1->count * $val1->annual_cost_after_discount ;
    }
    
    $finaldata[] = [
        'S.No' => '',
        'Language' =>'',
        'Category' => '',
        'Title of the Magazine' =>'',
        'Periodicity' => '',
        'Type of Library' => '',
        'District' => '',
        'No.of Subscription' => '',
        'Cover Price' =>'',
        'Annual Subscription' =>'',
        'Discount' => '',
        'Single Issue After Discount'=>'',
        'Annual Subscription After Discount'=>'',
        'RNI Details'=>'',
        'Total No.of Pages'=>'',
        'Total No.of Multicolour Pages'=>'',
        'Total No.of Monocolour Pages'=>'',
        'Paper Quality'=>'',
        'Size of Magazine' =>'',
        'Contact Person'=>'',
        'Phone'=>'',
        'Email'=>'',
        'Address'=>'',
       
    ];
    $finaldata[] = [
        'Total Amount' => '',
      
        'Language' =>'',
        'Category' => '',
        'Title of the Magazine' =>'',
        'Periodicity' => '',
        'Type of Library' => '',
        'District' => '',
        'No.of Subscription' => '',
        'Cover Price' =>'',
        'Annual Subscription' =>'',
        'Discount' => '',
        'Single Issue After Discount'=>'',
        'Annual Subscription After Discount'=>'',
        'RNI Details'=>'',
        'Total No.of Pages'=>'',
        'Total No.of Multicolour Pages'=>'',
        'Total No.of Monocolour Pages'=>'',
        'Paper Quality'=>'',
        'Size of Magazine' =>'',
        'Contact Person'=>'',
        'Phone'=>'',
        'Email'=>'Total Amount:',
        'Address'=>round($totalAmount),
       
    ];
//  return $finaldata;
    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .=  "S.No,Language,Category,Title of the Magazine,Periodicity,Type of Library,District,No.of Subscription,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
    foreach ($finaldata as $data) {
        $csvContent .= '"' . implode('","', $data) . "\"\n";
    }

    $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
    ];

    return response()->make($csvContent, 200, $headers);


  }   
  

  public function report_downl_not_order()
  {
        $maga= Ordermagazine::where('status', '=', '1')
            ->orderBy('created_at', 'asc')
            ->get();
             
              $Librarian = Librarian::where('status', '=', '1')
             ->where('allow_status', '=', '1')
             ->orderBy('created_at', 'asc')
             ->get();
               $count =count($Librarian);


            $firstArray = collect($maga);
              $secondArray = collect($Librarian);
             
              $secondNames = $firstArray->pluck('librarianid')->toArray(); 
              $firstNames= $secondArray->pluck('id')->toArray();
          
            $uniqueNames = collect($firstNames)->filter(function ($name) use ($secondNames) {
                 return !in_array($name, $secondNames);
             })->toArray();
            
      $librariandata = [];
      $serialNumber = 1;
      $count = 0;
      foreach ($uniqueNames as $val1) {
       $Librarian =Librarian::find($val1);
          $librariandata[] = [
              'S.No' => $serialNumber++,
              'Library Code' => $Librarian->librarianId,
              'Type of Library' => $Librarian->libraryType,
              'Library Name' => $Librarian->libraryName,
              'Librarian Name' => $Librarian->libraryName,
              'Contact Number' => $Librarian->phoneNumber,
              'District' => $Librarian->district,
             
                
          ];
          $count=$count + 1;
      }
      $librariandata[] = [
        'Total Amount' => '',
        'Library Code' => '',
        'Type of Library' => '',
        'Library Name' => '',
        'Librarian Name' => '',
        'Contact Number' => 'Total Amount:',
        'District' => $count,
       
       
          
    ];
  
      $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Library Id,Type Of Library,Library Name,Librarian Name,Contact Number,District\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) . "\"\n";
      }
  
      $headers = [
          'Content-Type' => 'text/csv; charset=utf-8',
          'Content-Disposition' => 'attachment; filename="non-orderers_report.csv"',
      ];
  
      return response()->make($csvContent, 200, $headers);
  }


 
  public function recordr()
  {
    return   $maga = Ordermagazine::whereIn('librarianId', function ($query) {
        $query->select('librarianId')
            ->from('ordermagazines')
            ->where('status', '=', '1')
            ->groupBy('librarianId')
            ->havingRaw('COUNT(*) > 1');
    })
    ->orderBy('created_at', 'asc')
    ->get();

               $data=[];
            foreach ($maga as $val) {
           $maga1 = json_decode($val->magazineProduct);
                $count=0;
                foreach ($maga1 as $val1) {
                    $price = (float) $val1->magazine_price;
                    $quantity = (float) $val1->quantity;
                    
                  
                    $count += $price * $quantity;

                }
                return [floatval($count),floatval($val->totalPurchased)];

                if(floatval($count) != floatval($val->totalPurchased)){
                    return "hi";
                    $obj = (object)[
                        "library id" => $val->librarianid,
                        "order id" => $val->orderid,
                        "type of library" => $val->libraryType,
                        "purchase amount" => $val->totalPurchased,
                        "quantity amount" => $count

                    ];
                   array_push($data,$obj);
                }
            }
            return $data;



  }
  


  public function magazineorder_down_NON(Request $request){
  
      $orders = Ordermagazine::where('status', '=', '1')->get();
      $magazineCounts = [];
   
   foreach ($orders as $order) {
     return  $magazineProducts = json_decode($order->balanceAmount, true);
   
       foreach ($magazineProducts as $magazineProduct) {
        
   
        //    if ( $magazineProduct->budget_price   ) {
        //        $magazineCounts[$magazineId] = [
             
        //        ];
        //    }
   
       
       }
   }
   
   return  $magazineCounts = array_values($magazineCounts);

//    return $magazine = Magazine::where('status', '=', '1')->get('id');
//     foreach ($magazine as $val) {
//         foreach ($magazineCounts as $val1) {
        //    if($val->id   == $val1-> id)
           

       }
       
       public function magazine_district_order(Request $request){
//   return $request;
        if($request->librarytype !=null &&  $request->district ==null  ){
       
         $orders = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();
   
   
        }else if( $request->district  !=null && $request->librarytype ==null){
   
          
           $orders1 = Ordermagazine::where('status', '=', '1')->get();
           $orders=[];
     
           foreach ($orders1 as $val) {
   
               $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
              if( $Librarian->isNotEmpty()){
               array_push($orders,$val);
              }
               
           }
          
        }
       else if($request->librarytype !=null && $request->district !=null ){
      
          
           $orders1 = Ordermagazine::where('status', '=', '1')->get();
           $orders=[];
     
           foreach ($orders1 as $val) {
   
               $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
              if( $Librarian->isNotEmpty()){
               array_push($orders,$val);
              }
               
           }
   
        }else{
       
           $orders = Ordermagazine::where('status', '=', '1')->get();
   
        }
         

       $magazineCounts = [];

       foreach ($orders as $order) {
          $magazineProducts = json_decode($order->magazineProduct, true);
       
           foreach ($magazineProducts as $magazineProduct) {
               $magazineId = $magazineProduct['magazineid'];
       
               if ($magazineId == $request->title) {
                $magazine = Magazine::find($request->title);
             $Librarian =Librarian::find($order->librarianid);

             
              $librarianAdressString = ($Librarian->door_no ?? "") . ' ' . $Librarian->street . ' ' . $Librarian->place . ' ' . $Librarian->Village . ' ' . $Librarian->post . ' ' . $Librarian->taluk . ' ' . $Librarian->district . ' ' . $Librarian->pincode . ' ' . $Librarian->landmark;
              
              $obj = (object)[
                  'title' => $magazine->title,
                  'contactperson' => $magazine->contact_person,
                  'phone' => $magazine->phone,
                  'email' => $magazine->email,
                  'address' => $magazine->address,
                  'librarytype' => $Librarian->libraryType,
                  'libraryid' => $Librarian->librarianId,
                  'libraryname' => $Librarian->libraryName,
                  'district' => $Librarian->district,
                  'librarianadress' => $librarianAdressString,
                  'librarianName' => $Librarian->librarianName,
                  'librarianphone' => $Librarian->phoneNumber,
                  'librariandes' => $Librarian->librarianDesignation,
                  'librarianadress' => $librarianAdressString,
              ];
              
            
            array_push($magazineCounts, $obj);
            
       
              
        }
       }
    }
    //    $magazineCounts = array_values($magazineCounts);
     
       
       $total = 0;
       $finaldata = [];
       $serialNumber = 1;
       foreach ($magazineCounts as $val1) {
           $finaldata[] = [
               'S.No' => $serialNumber++,
               'Title of the Magazine' => $val1->title,
               'Contact Person'=> $val1->contactperson,
               'Phone'=> $val1->phone,
               'Email'=> $val1->email,
               'Address'=> $val1->address,
               'Type of Library' => $val1->librarytype,
               'Library Code' => $val1->libraryid,
               'Library Name' => $val1->libraryname,
               'District' => $val1->district,
               'Librarian Name' => $val1->librarianName,
               'Librarian Phone Number' => $val1->librarianphone,
               'Librarian Designation' => $val1->librariandes,
               'Library Address' => $val1->librarianadress,
           ];
           $total = $total +1;
       }
      

       $finaldata[] = [
        'S.No' =>"",
               'Title of the Magazine' => "",
               'Contact Person'=> "",
               'Phone'=> "",
               'Email'=> "",
               'Address'=> "",
               'Type of Library' => "",
               'Library Code' => "",
               'Library Name' => "",
               'District' =>"",
               'Librarian Name' => "",
               'Librarian Phone Number' => "",
               'Librarian Designation' => "",
               'Library Address' => "",
          
       ];
       $finaldata[] = [
           'Total Amount' => '',
           'Title of the Magazine' => "",
           'Contact Person'=> "",
           'Phone'=> "",
           'Email'=> "",
           'Address'=> "",
           'Type of Library' => "",
           'Library Code' => "",
           'Library Name' => "",
           'District' =>"",
           'Librarian Name' => "",
           'Librarian Phone Number' => "",
           'Librarian Designation' => "",
           'Library Address' => $total,
          
       ];
   //  return $finaldata;
       $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .=  "S.No,Title of the Magazine,Contact Person,Phone,Email,Address,Type of Library,Library Code,Library Name,District,Librarian Name,Librarian Phone Number,Librarian Designation,Library Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) . "\"\n";
       }
   
       $headers = [
           'Content-Type' => 'text/csv; charset=utf-8',
           'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
       ];
   
       return response()->make($csvContent, 200, $headers);
   
   
     }   



     


     public function report_nonoeder_magazine(Request $request){
  
        if($request->librarytype !=null &&  $request->district ==null  ){
          
         $orders = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();
   
   
        }else if( $request->district  !=null && $request->librarytype ==null){
   
           
           $orders1 = Ordermagazine::where('status', '=', '1')->get();
           $orders=[];
     
           foreach ($orders1 as $val) {
   
               $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
              if( $Librarian !=null){
               array_push($orders,$val);
              }
               
           }
   
        }
       else if($request->librarytype !=null && $request->district !=null ){
   
          
           $orders1 = Ordermagazine::where('status', '=', '1')->get();
           $orders=[];
     
           foreach ($orders1 as $val) {
   
               $Librarian=Librarian::where('id', '=', $val->librarianid)->where('district', '=', $request->district)->get();
              if( $Librarian->isNotEmpty()){
               array_push($orders,$val);
              }
               
           }
   
        }else{
         
           $orders = Ordermagazine::where('status', '=', '1')->get();
   
        }
         
       
       $magazineCounts = [];
       
       foreach ($orders as $order) {
           $magazineProducts = json_decode($order->magazineProduct, true);
       
           foreach ($magazineProducts as $magazineProduct) {
               $magazineId = $magazineProduct['magazineid'];
       
               if (!isset($magazineCounts[$magazineId])) {
                   $magazineCounts[$magazineId] = [
                       'id' => $magazineId,
                       'count' => 0
                   ];
               }
       
               $magazineCounts[$magazineId]['count']++;
           }
       }
       
       $magazineCounts = array_values($magazineCounts);
     
       $magazinedata = [];
       foreach ($magazineCounts as $val) {
            if($request->category !=null &&  $request->language ==null ){
               $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->first();
   
            }
          else if($request->category ==null &&  $request->language !=null){
           $magazine = Magazine::where('id', '=', $val['id'])->where('language', '=', $request->language)->first();
   
          }
         else if($request->category !=null &&  $request->language !=null){
           $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->where('language', '=', $request->language)->first();
   
          }else{
           $magazine = Magazine::find($val['id']);
   
          }
           if ($magazine) {
               $magazine->count = $val['count'];
               $magazinedata[] = $magazine;
           }
       }
       $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();
   
       $datas=[];
         foreach($magazinebudget  as $val1){
        foreach($magazinedata  as $val){
         if($val1->name == $val->category){
         
             array_push($datas,$val);
         }
        
     
        }
       }
       if($request->category !=null &&  $request->language ==null ){
        $magazine1 = Magazine::where('status', '=', '1')->where('category', '=', $request->category)->get();

     }
   else if($request->category ==null &&  $request->language !=null){
    $magazine1 = Magazine::where('status', '=', '1')->where('language', '=', $request->language)->get();

   }
  else if($request->category !=null &&  $request->language !=null){
    $magazine1 = Magazine::where('status', '=', '1')->where('category', '=', $request->category)->where('language', '=', $request->language)->get();

   }else{
    $magazine1 = Magazine::where('status', '=', '1')->get();

   }
    //   $magazine = Magazine::where('status','=','1')->get();
    //  return  count($magazine1);
    //  return $datas;
     $firstArray = collect($magazine1);
       $secondArray = collect($datas);
     
      $firstNames = $firstArray->pluck('id')->toArray(); 
      $secondNames= $secondArray->pluck('id')->toArray();
  
    $uniqueNames = collect($firstNames)->filter(function ($name) use ($secondNames) {
         return !in_array($name, $secondNames);
     })->toArray();
     
      
       $totalAmount = 0;
       $finaldata = [];
       $serialNumber = 1;
       foreach ($uniqueNames as $val1) {
      

           $finaldata[] = [
               'S.No' => $serialNumber++,
               'Language' => $val1->language,
               'Category' => $val1->category,
               'Title of the Magazine' => $val1->title,
               'Periodicity' => $val1->periodicity,
               'Type of Library' => $request->librarytype ?? "All",
               'District' => $request->district ?? "All",
               'No.of Subscription' => "0",
               'Cover Price' =>$val1->single_issue_rate,
               'Annual Subscription' =>$val1->annual_subscription,
               'Discount' => $val1->discount,
               'Single Issue After Discount'=>$val1->single_issue_after_discount,
               'Annual Subscription After Discount'=>$val1->annual_cost_after_discount,
               'RNI Details'=>$val1->rni_details,
               'Total No.of Pages'=>$val1->total_pages,
               'Total No.of Multicolour Pages'=>$val1->total_multicolour_pages,
               'Total No.of Monocolour Pages'=>$val1->total_monocolour_pages,
               'Paper Quality'=>$val1->paper_qualitity,
               'Size of Magazine' =>$val1->magazine_size,
               'Contact Person'=>$val1->contact_person,
               'Phone'=>$val1->phone,
               'Email'=>$val1->email,
               'Address'=>$val1->address,
            
   
                 
           ];
           $totalAmount =$totalAmount + $val1->count * $val1->annual_cost_after_discount ;
       }
       
       $finaldata[] = [
           'S.No' => '',
           'Language' =>'',
           'Category' => '',
           'Title of the Magazine' =>'',
           'Periodicity' => '',
           'Type of Library' => '',
           'District' => '',
           'No.of Subscription' => '',
           'Cover Price' =>'',
           'Annual Subscription' =>'',
           'Discount' => '',
           'Single Issue After Discount'=>'',
           'Annual Subscription After Discount'=>'',
           'RNI Details'=>'',
           'Total No.of Pages'=>'',
           'Total No.of Multicolour Pages'=>'',
           'Total No.of Monocolour Pages'=>'',
           'Paper Quality'=>'',
           'Size of Magazine' =>'',
           'Contact Person'=>'',
           'Phone'=>'',
           'Email'=>'',
           'Address'=>'',
          
       ];
       $finaldata[] = [
           'Total Amount' => '',
         
           'Language' =>'',
           'Category' => '',
           'Title of the Magazine' =>'',
           'Periodicity' => '',
           'Type of Library' => '',
           'District' => '',
           'No.of Subscription' => '',
           'Cover Price' =>'',
           'Annual Subscription' =>'',
           'Discount' => '',
           'Single Issue After Discount'=>'',
           'Annual Subscription After Discount'=>'',
           'RNI Details'=>'',
           'Total No.of Pages'=>'',
           'Total No.of Multicolour Pages'=>'',
           'Total No.of Monocolour Pages'=>'',
           'Paper Quality'=>'',
           'Size of Magazine' =>'',
           'Contact Person'=>'',
           'Phone'=>'',
           'Email'=>'Total Amount:',
           'Address'=>round($totalAmount),
          
       ];
   //  return $finaldata;
       $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .=  "S.No,Language,Category,Title of the Magazine,Periodicity,Type of Library,District,No.of Subscription,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) . "\"\n";
       }
   
       $headers = [
           'Content-Type' => 'text/csv; charset=utf-8',
           'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
       ];
   
       return response()->make($csvContent, 200, $headers);
   
   
     } 
     
     
     
     public function exportexcelmagazine(){
  
       $magazine1 = Magazine::get();
       $total = 0;
       $finaldata = [];
       $serialNumber = 1;
       foreach ($magazine1 as $val1) {
      

           $finaldata[] = [
               'S.No' => $serialNumber++,
               'Language' => $val1->language,
               'Category' => $val1->category,
               'Title of the Magazine' => $val1->title,
               'Periodicity' => $val1->periodicity,
               'Cover Price' =>$val1->single_issue_rate,
               'Annual Subscription' =>$val1->annual_subscription,
               'Discount' => $val1->discount,
               'Single Issue After Discount'=>$val1->single_issue_after_discount,
               'Annual Subscription After Discount'=>$val1->annual_cost_after_discount,
               'RNI Details'=>$val1->rni_details,
               'Total No.of Pages'=>$val1->total_pages,
               'Total No.of Multicolour Pages'=>$val1->total_multicolour_pages,
               'Total No.of Monocolour Pages'=>$val1->total_monocolour_pages,
               'Paper Quality'=>$val1->paper_qualitity,
               'Size of Magazine' =>$val1->magazine_size,
               'Contact Person'=>$val1->contact_person,
               'Phone'=>$val1->phone,
               'Email'=>$val1->email,
               'Address'=>$val1->address,
            
   
                 
           ];
           $total =  $total + 1;
       }
       
       $finaldata[] = [
           'S.No' => '',
           'Language' =>'',
           'Category' => '',
           'Title of the Magazine' =>'',
           'Periodicity' => '',
           'Cover Price' =>'',
           'Annual Subscription' =>'',
           'Discount' => '',
           'Single Issue After Discount'=>'',
           'Annual Subscription After Discount'=>'',
           'RNI Details'=>'',
           'Total No.of Pages'=>'',
           'Total No.of Multicolour Pages'=>'',
           'Total No.of Monocolour Pages'=>'',
           'Paper Quality'=>'',
           'Size of Magazine' =>'',
           'Contact Person'=>'',
           'Phone'=>'',
           'Email'=>'',
           'Address'=>'',
          
       ];
       $finaldata[] = [
           'Total Amount' => '',
         
           'Language' =>'',
           'Category' => '',
           'Title of the Magazine' =>'',
           'Periodicity' => '',
           'Cover Price' =>'',
           'Annual Subscription' =>'',
           'Discount' => '',
           'Single Issue After Discount'=>'',
           'Annual Subscription After Discount'=>'',
           'RNI Details'=>'',
           'Total No.of Pages'=>'',
           'Total No.of Multicolour Pages'=>'',
           'Total No.of Monocolour Pages'=>'',
           'Paper Quality'=>'',
           'Size of Magazine' =>'',
           'Contact Person'=>'',
           'Phone'=>'',
           'Email'=>'Total Amount:',
           'Address'=>$total,
          
       ];
   //  return $finaldata;
       $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .=  "S.No,Language,Category,Title of the Magazine,Periodicity,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) . "\"\n";
       }
   
       $headers = [
           'Content-Type' => 'text/csv; charset=utf-8',
           'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
       ];
   
       return response()->make($csvContent, 200, $headers);
   
   
     } 

     public function mailsend(Request $request){
    
        $publishers = Publisher::pluck('email')->toArray();
        $distributors = Distributor::pluck('email')->toArray();
        $publisherDistributors = PublisherDistributor::pluck('email')->toArray();
        
        $allEmails = array_unique(array_merge($publishers, $distributors, $publisherDistributors));

        $batchSize = 10;
    
        $emailBatches = array_chunk($allEmails, $batchSize);
    
        foreach ($emailBatches as $batch) {
            $mail = new NewMailMailable();
    
            $mail->bcc($batch);
    
            Mail::to('directorate@tnpubliclibraries.in')->send($mail);
        }
    
        return "Successfully sent mail in batches.";
    }
     
    
     
    public function exportexcelpayment($type){
  
        $Procurementpaymrnt1 = Procurementpaymrnt::where('type',$type)->get();
        $total = 0;
        $finaldata = [];
        $serialNumber = 1;
        foreach ($Procurementpaymrnt1 as $val1) {
       
 
            $finaldata[] = [
                'S.No' => $serialNumber++,
                'User Name' => $val1->userName,
                'User Type' => $val1->userTame,
                'Amount' => $val1->amount,
                "Total Book" => $val1->totalAmount / $val1->amount ,
                'Total Amount' => $val1->totalAmount,
                'Payment Status' =>$val1->paymentstatus,
                
            ];
            $total =  $total + 1;
        }
        
        $finaldata[] = [
            'S.No'=> '',
                'User Name'=> '',
                'User Type'=> '',
                'Amount' =>  '',
                "Total Book"=> '',
                'Total Amount' => '',
                'Payment Status' => '',
           
        ];

        $finaldata[] = [
            'Total Amount' => '',
                'User Name'=> '',
                'User Type'=> '',
                'Amount' => '',
                "Total Book"=> '',
                'Total Amount' => '',
                'Address'=>$total,
           
        ];
       
    //  return $finaldata;
        $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .=  "S.No,User Name,User Type,Amount,Total Book,Total Amount,Payment Status\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) . "\"\n";
        }
    
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="paymentReport.csv"',
        ];
    
        return response()->make($csvContent, 200, $headers);
    
    
      } 

      public function books_daycount(Request $request){

        $books = Book::whereBetween('created_at', [$request->fromDate, $request->toDate])
                     ->selectRaw('DATE(created_at) as date, count(*) as count')
                     ->groupBy('date')
                     ->get();
    
        if($books->isNotEmpty()){
            $total = 0;
            $finaldata = [];
            $serialNumber = 1;
    
            foreach ($books as $book) {
                $finaldata[] = [
                    'S.No' => $serialNumber++,
                    'Date' => $book->date,
                    'Total Book' => $book->count,
                ];
                $total += $book->count;
            }
            
            // Add empty row
            $finaldata[] = [
                'S.No' => '',
                'Date' => '',
                'Total Book' => '',
            ];
    
            // Add total count row
            $finaldata[] = [
                'S.No' => '',
                'Date' => 'Total',
                'Total Book' => $total,
            ];
    
            $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
            $csvContent .=  "S.No,Date,Total Book\n"; 
            foreach ($finaldata as $data) {
                $csvContent .= '"' . implode('","', $data) . "\"\n";
            }
    
            $headers = [
                'Content-Type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="bookReport.csv"',
            ];
    
            return response()->make($csvContent, 200, $headers);
        } else {
            return back()->with('error', "No Records In The Date");
        }
    }
 
    
// 
public function periodicaldist_excel(Request $request){

       $PublisherDistributor = PublisherDistributor::whereBetween('created_at', [$request->fromDate, $request->toDate])->get();


    if($PublisherDistributor->isNotEmpty()){
        $total = 0;
        $finaldata = [];
        $serialNumber = 1;
        
            foreach ($PublisherDistributor as $PublisherDistributor) {
                $finaldata[] = [
                    'S.No' =>  $serialNumber ++,
                    'publication Distribution Name' =>   $PublisherDistributor->publicationDistributionName,
                    'Distributor Name' =>  $PublisherDistributor->firstName." ".$PublisherDistributor->lastName,
                    'Email' => $PublisherDistributor->email,
                    'Mobile Number' =>  $PublisherDistributor->mobileNumber,
                    'publication  Address' =>  $PublisherDistributor->publicationDistributionAddress,
                    'Country' =>  $PublisherDistributor->country,
                    'State' =>  $PublisherDistributor->state,
                    'District' =>  $PublisherDistributor->District,
                    'City' =>  $PublisherDistributor->city,
                    'Postal Code' =>  $PublisherDistributor->postalCode,
                ];

                $total += $total + 1;
            }
    
        
     
        $finaldata[] = [
            'S.No' => '',
            'publication Distribution Name' =>  '',
            'Distributor Name' =>  '',
            'Email' => '',
            'Mobile Number' =>  '',
            'publication  Address' =>  '',
            'Country' =>  '',
            'State' =>  '',
            'District' =>  '',
            'City' =>  '',
            'Postal Code' =>  '',
        ];

     
        $finaldata[] = [
            'S.No' => '',
            'publication Distribution Name' =>  '',
            'Distributor Name' =>  '',
            'Email' => '',
            'Mobile Number' =>  '',
            'publication  Address' =>  '',
            'Country' =>  '',
            'State' =>  '',
            'District' =>  '',
            'City' =>  '',
            'Total' => $total,
        ];

        $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .=  "S.No, publication Distribution Name, Distributor Name, Email, Mobile Number, publication Distribution Address, Country, State, District, City, Postal Code\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) . "\"\n";
        }

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="periodicaldistributor.csv"',
        ];

        return response()->make($csvContent, 200, $headers);
    } else {
        return back()->with('error', "No Records In The Date");
    }
}






public function periodicalpub_excel(Request $request){

    $PeriodicalPublisher = PeriodicalPublisher::whereBetween('created_at', [$request->fromDate, $request->toDate])->get();


 if($PeriodicalPublisher->isNotEmpty()){
     $total = 0;
     $finaldata = [];
     $serialNumber = 1;
     
         foreach ($PeriodicalPublisher as $PeriodicalPublisher) {
             $finaldata[] = [
                 'S.No' =>  $serialNumber ++,
                 'publication  Name' =>   $PeriodicalPublisher->publicationName,
                 'Publisher Name' =>  $PeriodicalPublisher->firstName." ".$PeriodicalPublisher->lastName,
                 'Email' => $PeriodicalPublisher->email,
                 'Mobile Number' =>  $PeriodicalPublisher->mobileNumber,
                 'publication  Address' =>  $PeriodicalPublisher->publicationAddress,
                 'Country' =>  $PeriodicalPublisher->country,
                 'State' =>  $PeriodicalPublisher->state,
                 'District' =>  $PeriodicalPublisher->District,
                 'City' =>  $PeriodicalPublisher->city,
                 'Postal Code' =>  $PeriodicalPublisher->postalCode,
             ];

             $total += $total + 1;
         }
 
       $finaldata;
  
     $finaldata[] = [
         'S.No' => '',
         'publication  Name' =>  '',
         'Publisher Name' =>  '',
         'Email' => '',
         'Mobile Number' =>  '',
         'publication  Address' =>  '',
         'Country' =>  '',
         'State' =>  '',
         'District' =>  '',
         'City' =>  '',
         'Postal Code' =>  '',
     ];

  
     $finaldata[] = [
         'S.No' => '',
         'publication  Name' =>  '',
         'Publisher Name' =>  '',
         'Email' => '',
         'Mobile Number' =>  '',
         'publication  Address' =>  '',
         'Country' =>  '',
         'State' =>  '',
         'District' =>  '',
         'City' =>  '',
         'Total' => $total,
     ];

     $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
     $csvContent .=  "S.No, publication  Name, Publisher Name, Email, Mobile Number, publication  Address, Country, State, District, City, Postal Code\n"; 
     foreach ($finaldata as $data) {
         $csvContent .= '"' . implode('","', $data) . "\"\n";
     }

     $headers = [
         'Content-Type' => 'text/csv; charset=utf-8',
         'Content-Disposition' => 'attachment; filename="periodicalpublisher.csv"',
     ];

     return response()->make($csvContent, 200, $headers);
 } else {
     return back()->with('error', "No Records In The Date");
 }
}
}
      




  