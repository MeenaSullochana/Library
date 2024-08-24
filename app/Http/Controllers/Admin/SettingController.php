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
use DB;
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
use App\Models\Reviewer;
use App\Models\Dispatch;


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
     if($req->bookImage =="undefined"){
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
              if($req->bookImage !="undefined"){
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

    //     if($req->websitelogo !="undefined"){
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
                                                           if( $request->documentType =="Excel") {
                                                        $excelData = [
                                                            ['S.No', 'Publication Name', 'Publisher Name', 'Email', 'Mobile Number', 'Publication Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                        ];
                                                        $index=0;
                                                        foreach ($publisher as $publisher) {
                                                            $excelData[] = [
                                                                $index=  $index + 1,
                                                                $publisher->publicationName,
                                                                $publisher->firstName."".$publisher->lastName,
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
                                                               if( $request->documentType =="Excel") {
                                                            $excelData = [
                                                                ['S.No', 'Distribution Name', 'Distributor Name', 'Email', 'Mobile Number', 'Distribution Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                            ];
                                                        
                                                            $index=0;
                                                            foreach ($distributor as $distributor) {
                                                                $excelData[] = [
                                                                    $index=  $index + 1,
                                                                    $distributor->distributionName,
                                                                    $distributor->firstName."".$distributor->lastName,
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
                                                       if( $request->documentType =="Excel") {
                                                    $excelData = [
                                                        ['S.No', 'publication Distribution Name', 'Distributor Name', 'Email', 'Mobile Number', 'publication Distribution Address', 'Country', 'State', 'District', 'City', 'Postal Code']
                                                    ];
                                                
                                                    $index=0;
                                                    foreach ($PubDist as $PubDist) {
                                                        $excelData[] = [
                                                            $index=  $index + 1,
                                                            $PubDist->publicationDistributionName,
                                                            $PubDist->firstName."".$PubDist->lastName,
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
  
      $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .="S.No,Library Code,Library Name,Type Of Library,District,Dooe Number,Strwwt Name,Place,Village,Taluk,Landmark,Post,Pin Code,Name,Designation,Email,Contact Number\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) ."\"\n";
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
                          
                              $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
                              $csvContent .="S.No,Library Code,Library Name,Type Of Library,District,Dooe Number,Strwwt Name,Place,Village,Taluk,Landmark,Post,Pin Code,Name,Designation,Email,Contact Number\n"; 

                              foreach ($librariandata as $data) {
                                  $csvContent .= '"' . implode('","', $data) ."\"\n";
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
  
      $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .="S.No,Library Id,Type Of Library,Library Name,District,Contact Number,OrderId,Quantity,Total Amount,Purchased Amount,Balance Amount,Order Status,Order Date,Percentage of Utilization(%)\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) ."\"\n";
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
            'Type of Library' => $request->librarytype ??"All",
            'District' => $request->district ??"All",
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
    $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .= "S.No,Language,Category,Title of the Magazine,Periodicity,Type of Library,District,No.of Subscription,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
    foreach ($finaldata as $data) {
        $csvContent .= '"' . implode('","', $data) ."\"\n";
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
  
      $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .="S.No,Library Id,Type Of Library,Library Name,Librarian Name,Contact Number,District\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) ."\"\n";
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
                    return"hi";
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

             
              $librarianAdressString = ($Librarian->door_no ??"") . ' ' . $Librarian->street . ' ' . $Librarian->place . ' ' . $Librarian->Village . ' ' . $Librarian->post . ' ' . $Librarian->taluk . ' ' . $Librarian->district . ' ' . $Librarian->pincode . ' ' . $Librarian->landmark;
              
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
               'Title of the Magazine' =>"",
               'Contact Person'=>"",
               'Phone'=>"",
               'Email'=>"",
               'Address'=>"",
               'Type of Library' =>"",
               'Library Code' =>"",
               'Library Name' =>"",
               'District' =>"",
               'Librarian Name' =>"",
               'Librarian Phone Number' =>"",
               'Librarian Designation' =>"",
               'Library Address' =>"",
          
       ];
       $finaldata[] = [
           'Total Amount' => '',
           'Title of the Magazine' =>"",
           'Contact Person'=>"",
           'Phone'=>"",
           'Email'=>"",
           'Address'=>"",
           'Type of Library' =>"",
           'Library Code' =>"",
           'Library Name' =>"",
           'District' =>"",
           'Librarian Name' =>"",
           'Librarian Phone Number' =>"",
           'Librarian Designation' =>"",
           'Library Address' => $total,
          
       ];
   //  return $finaldata;
       $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .= "S.No,Title of the Magazine,Contact Person,Phone,Email,Address,Type of Library,Library Code,Library Name,District,Librarian Name,Librarian Phone Number,Librarian Designation,Library Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) ."\"\n";
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
               'Type of Library' => $request->librarytype ??"All",
               'District' => $request->district ??"All",
               'No.of Subscription' =>"0",
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
       $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .= "S.No,Language,Category,Title of the Magazine,Periodicity,Type of Library,District,No.of Subscription,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) ."\"\n";
       }
   
       $headers = [
           'Content-Type' => 'text/csv; charset=utf-8',
           'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
       ];
   
       return response()->make($csvContent, 200, $headers);
   
   
     } 
     
     
     
     public function exportexcelmagazine(){
  
       $magazine1 = Magazine::where('status', '=', '1')->get();
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
       $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
       $csvContent .= "S.No,Language,Category,Title of the Magazine,Periodicity,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
       foreach ($finaldata as $data) {
           $csvContent .= '"' . implode('","', $data) ."\"\n";
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
    
        return"Successfully sent mail in batches.";
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
                'User Type' => $val1->userType,
                'Merchant Ref Number' => $val1->txnrefno,
                'Invoice Number'=>$val1->invoiceNumber,
                'Amount' => $val1->amount,
               "Total Book" => $val1->totalAmount / $val1->amount ,
                'Total Amount' => $val1->totalAmount,
                'Payment Status' =>$val1->paymentstatus,
                'Date'=>\Carbon\Carbon::parse($val1->created_at)->format('Y-m-d ') 
                
            ];
            $total =  $total + $val1->totalAmount;
        }
        
        $finaldata[] = [
            'S.No'=> '',
                'User Name'=> '',
                'User Type'=> '',
                'Merchant Ref Number'=>'',
                'Invoice Number'=>'',
                'Amount' =>  '',
               "Total Book"=> '',
                'Total Amount' => '',
                'Payment Status' => '',
                'Date'=>''
           
        ];

        $finaldata[] = [
            'Total Amount' => '',
                'User Name'=> '',
                'User Type'=> '',
                'Merchant Ref Number'=>'',
                'Invoice Number'=>'',
                'Amount' => '',
               "Total Book"=> '',
                'Total Amount' => '',
                'Payment Status' => '',
                'Address'=>$total,
           
        ];
       
    //  return $finaldata;
        $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .= "S.No,User Name,User Type,Merchant Ref Number,Invoice Number,Amount,Total Book,Total Amount,Payment Status,Date\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) ."\"\n";
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
    
            $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
            $csvContent .= "S.No,Date,Total Book\n"; 
            foreach ($finaldata as $data) {
                $csvContent .= '"' . implode('","', $data) ."\"\n";
            }
    
            $headers = [
                'Content-Type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename="bookReport.csv"',
            ];
    
            return response()->make($csvContent, 200, $headers);
        } else {
            return back()->with('error',"No Records In The Date");
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
                    'Distributor Name' =>  $PublisherDistributor->firstName."".$PublisherDistributor->lastName,
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

        $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .= "S.No, publication Distribution Name, Distributor Name, Email, Mobile Number, publication Distribution Address, Country, State, District, City, Postal Code\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) ."\"\n";
        }

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="periodicaldistributor.csv"',
        ];

        return response()->make($csvContent, 200, $headers);
    } else {
        return back()->with('error',"No Records In The Date");
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
                 'Publisher Name' =>  $PeriodicalPublisher->firstName."".$PeriodicalPublisher->lastName,
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

     $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
     $csvContent .= "S.No, publication  Name, Publisher Name, Email, Mobile Number, publication  Address, Country, State, District, City, Postal Code\n"; 
     foreach ($finaldata as $data) {
         $csvContent .= '"' . implode('","', $data) ."\"\n";
     }

     $headers = [
         'Content-Type' => 'text/csv; charset=utf-8',
         'Content-Disposition' => 'attachment; filename="periodicalpublisher.csv"',
     ];

     return response()->make($csvContent, 200, $headers);
 } else {
     return back()->with('error',"No Records In The Date");
 }
}


public function publication()
{
    $procurementPayments = Procurementpaymrnt::get();

    foreach ($procurementPayments as $payment) {
      $userName = 'N/A';
      if($payment->type =="Book"){
        
          if ($payment->userType == 'publisher') {
              $user = DB::table('publishers')->find($payment->userId);
              $userName = $user->publicationName ?? 'N/A';
          } elseif ($payment->userType == 'distributor') {
              $user = DB::table('distributors')->find($payment->userId);
              $userName = $user->distributionName ?? 'N/A';
          } else {
              $user = DB::table('publisher_distributors')->find($payment->userId);
              $userName = $user->publicationDistributionName ?? 'N/A';
          }
      }else if($payment->type =="Periodical"){
        
          if ($payment->userType == 'publisher') {
              $user = DB::table('periodical_publishers')->find($payment->userId);
              $userName = $user->publicationName ?? 'N/A';
          } elseif ($payment->userType == 'distributor') {
              $user = DB::table('periodical_distributors')->find($payment->userId);
              $userName = $user->distributionName ?? 'N/A';
          } 
      }
       

        $payment->userName = $userName;
        $payment->save();
    }
}


public function publicreviewercount(Request $request){

   
      $Reviewer = Reviewer::where('reviewerType','=','internal')->where('rev_status','=','1')->get();
  

 if($Reviewer->isNotEmpty()){
    
     $actotal = 0;
     $inactotal = 0;
     $finaldata = [];
     $serialNumber = 1;
     foreach ($Reviewer as $val) {
          
           $Reviewerac = Reviewer::where('reviewerType','=','public')->where('creater','=',$val->id)->where('status','=','1')->get();
           $Reviewerinac = Reviewer::where('reviewerType','=','public')->where('creater','=',$val->id)->where('status','=','0')->get();
         $finaldata[] = [
            'S.No' =>  $serialNumber ++,
            'Library Name' =>    $val->libraryName,
            'Library Type' =>   $val->libraryType,
            'Reviwer Name' =>  $val->name,
            'Email' =>   $val->email,
            'Mobile Number' =>   $val->phoneNumber,
            'Active Public Reviwer' =>   count( $Reviewerac),
            'Inactive Public Reviwer' =>  count( $Reviewerinac),
        ];
      
        $actotal = $actotal + count( $Reviewerac);

        $inactotal = $inactotal + count($Reviewerinac);

      
     }
     

     $finaldata[] = [
        'S.No' => '',
        'Library Name' =>   '',
        'Library Type' =>   '',
        'Reviwer Name' =>  '',
        'Email' =>   '',
        'Mobile Number' =>   '',
        'Active Public Reviwer' =>   '',
        'Inactive Public Reviwer' =>  '',
     ];
     $finaldata[] = [
        'S.No' => '',
        'Library Name' =>   '',
        'Library Type' =>   '',
        'Reviwer Name' =>  '',
        'Email' =>   '',
        'Mobile Number' =>   '',
     
         'Active Reviewer Total' => $actotal,
         'Inactive Reviewer Total' => $inactotal,
     ];
 
     $finaldata[] = [
        'S.No' => '',
        'Library Name' =>   '',
        'Library Type' =>   '',
        'Reviwer Name' =>  '',
        'Email' =>   '',
        'Mobile Number' =>   '',
        'Active Public Reviwer' =>   '',
        'Inactive Public Reviwer' =>  '',
         'Total' => $actotal + $inactotal,
     ];

     $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
     $csvContent .= "S.No, Library Name, Library Type,Reviwer Name, Email, Mobile Number,Active Public Reviwer, Inactive Public Reviwer\n"; 
     foreach ($finaldata as $data) {
         $csvContent .= '"' . implode('","', $data) ."\"\n";
     }

     $headers = [
         'Content-Type' => 'text/csv; charset=utf-8',
         'Content-Disposition' => 'attachment; filename="publicrev.csv"',
     ];

     return response()->make($csvContent, 200, $headers);
 } else {
     return back()->with('error',"No Records In The Date");
 }
}



// public function Dispatch_magazinereport(Request $req){
  
//     if ($req->monthyear !== null && $req->monthyear1 !== null) {
//         $query = Dispatch::query();

//         if ($req->id !== null) {
//             $query->where('magazine_id', $req->id);
//         }
        
//         if ($req->Frequency !== null) {
//             $query->where('periodicity', $req->Frequency);
//         }
        
//         if ($req->monthyear !== null && $req->monthyear1 !== null) {
//             $startDate = new \DateTime($req->monthyear);
//             $endDate = new \DateTime($req->monthyear1);
            
//             $startDateFormatted = $startDate->format('Y-m-d');
//             $endDateFormatted = $endDate->format('Y-m-d');
            
//             $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);
//         }
        
        
//         $query->orderBy('created_at', 'asc');
        
//         $Dispatch = $query->get();
    
  

//       if( $Dispatch->isNotEmpty()){
//         foreach($Dispatch  as $val){
//             $recived=0;
//                 $notrecived=0;
//             $library_id = json_decode($val->library_id);
//             foreach($library_id  as $val1){
              
//                 $received_id = json_decode($val->received_id);
//                 $received_id1=[];
//                 array_push($received_id1, $val1);
//                 $result = array_filter($received_id1, function($element) use ($received_id) {
//                     return in_array($element, $received_id);
//                     });
                 
//                 $not_received_id = json_decode($val->not_received_id);
//                 $not_received_id1=[];
//                 array_push($not_received_id1,  $val1);
//                 $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
//                     return in_array($element, $not_received_id);
//                     });
            

   
                 
                    
             

     
//                if(count($result) !=0){
//                 $recived=$recived + 1;
               
//                }elseif(count($result2) !=0){
             
//                 $notrecived = $notrecived + 1;
        
//                }else{
//                 $notrecived = $notrecived + 1;
//                }
             
            
//             }
      
//                 $val->count= count( $library_id);
//                 $val->recived=$recived;
//                 $val->notrecived=$notrecived;
            
                 
//          }
//          $actotal = 0;
//          $inactotal = 0;
//          $finaldata = [];
//          $serialNumber = 1;
//          foreach ($Dispatch as $val) {
            
        
//              $finaldata[] = [
//                 'S.No' =>  $serialNumber ++,
//                 'Magazine Name' =>    $val->magazine_name,
//                 'Periodicity' =>   $val->periodicity,
//                 'Expected Date ' =>  $val->expected_date,
//                 'Total Library' =>   $val->count,
//                 'Total Recived' =>   $val->recived,
//                 'Total Notrecived' =>  $val->notrecived,
                
//             ];
          
         
    
          
//          }
         
    
//          $finaldata[] = [
//             'S.No' => '',
//             'Magazine Name' =>    '',
//             'Periodicity' =>  '',
//             'Expected Date ' =>  '',
//             'Total Library' =>   '',
//             'Total Recived' =>   '',
//             'Total Notrecived' =>  '',
//          ];
//          $finaldata[] = [
//             'S.No' => '',
//             'Magazine Name' =>    '',
//             'Periodicity' =>  '',
//             'Expected Date ' =>  '',
//             'Total Library' =>   '',
//             'Total Recived' =>   '',
//             'Total Notrecived' =>  '',
//          ];
     

    
//          $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
//          $csvContent .= "S.No, Magazine Name, Periodicity,Expected Date, Total Library,Total Recived,Total Notrecived\n"; 
//          foreach ($finaldata as $data) {
//              $csvContent .= '"' . implode('","', $data) ."\"\n";
//          }
    
//          $headers = [
//              'Content-Type' => 'text/csv; charset=utf-8',
//              'Content-Disposition' => 'attachment; filename="MagazineDispatchReport.csv"',
//          ];
    
//          return response()->make($csvContent, 200, $headers);


//       }else{
//         return back()->with('error',"No Record Found");
//     }
       
//     }else{
//         return back()->with('error',"Mounth Year field  is required");
//     }




// }


// public function Dispatch_libraryreport(Request $req){
  
//     if ($req->monthyear !== null && $req->monthyear1 !== null) {
//         $query = Dispatch::query();

     
        
//         if ($req->Frequency !== null) {
//             $query->where('periodicity', $req->Frequency);
//         }
        
//         if ($req->monthyear !== null && $req->monthyear1 !== null) {
//             $startDate = new \DateTime($req->monthyear);
//             $endDate = new \DateTime($req->monthyear1);
            
//             $startDateFormatted = $startDate->format('Y-m-d');
//             $endDateFormatted = $endDate->format('Y-m-d');
            
//             $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);
//         }
        
//         $query->orderBy('created_at', 'asc');
        
//         $Dispatch = $query->get();
    
//         $Dispatch = $query->get();
//            $data=[];
//       if( $Dispatch->isNotEmpty()){
//         foreach($Dispatch  as $val){
//             $recived=0;
//                 $notrecived=0;
//             $library_id = json_decode($val->library_id);
//             foreach($library_id  as $val1){
              
//                 $received_id = json_decode($val->received_id);
//                 $received_id1=[];
//                 array_push($received_id1, $val1);
//                 $result = array_filter($received_id1, function($element) use ($received_id) {
//                     return in_array($element, $received_id);
//                     });
                 
//                 $not_received_id = json_decode($val->not_received_id);
//                 $not_received_id1=[];
//                 array_push($not_received_id1,  $val1);
//                 $result2 = array_filter($not_received_id1, function($element) use ($not_received_id) {
//                     return in_array($element, $not_received_id);
//                     });
            
                 
                   
                 
                    
             

     
//                if(count($result) !=0){
//                 $recived=$recived + 1;
               
//                }elseif(count($result2) !=0){
             
//                 $notrecived = $notrecived + 1;
        
//                }else{
//                 $notrecived = $notrecived + 1;
//                }
//               $Librarian =Librarian::find($val1);

//                if($req->librarytype != null){
//                 if($req->librarytype == $Librarian->libraryType){
                      
//                     $val->libraryname= $Librarian->libraryName;
//                     $val->librarytype=$Librarian->libraryType;
//                     $val->recived=$recived;
//                     $val->notrecived=$notrecived;
//                     array_push($data,$val);
                  
//                 }
//                }else{
              
//                 $val->libraryname= $Librarian->libraryName;
//                 $val->librarytype=$Librarian->libraryType;
//                 $val->recived=$recived;
//                 $val->notrecived=$notrecived;
//                 array_push($data,$val);
//                }
                   
                   
            
//             }
      
       
            
                 
//          }

         
//          $actotal = 0;
//          $inactotal = 0;
//          $finaldata = [];
//          $serialNumber = 1;
//          foreach ($data as $val) {
            
        
//              $finaldata[] = [
//                 'S.No' =>  $serialNumber ++,
//                 'Magazine Name' =>    $val->magazine_name,
//                 'Periodicity' =>   $val->periodicity,
//                 'Expected Date ' =>  $val->expected_date,
//                 'Librarian Name' =>   $val->libraryname,
//                 'Library Type' =>   $val->librarytype,
//                 'Total Recived' =>   $val->recived,
//                 'Total Notrecived' =>  $val->notrecived,
                
//             ];
          
         
    
          
//          }
         
    
//          $finaldata[] = [
//             'S.No' => '',
//             'Magazine Name' =>    '',
//             'Periodicity' =>  '',
//             'Expected Date ' =>  '',
//             'Librarian Name' =>  '',
//                 'Library Type' =>   '',
//             'Total Recived' =>   '',
//             'Total Notrecived' =>  '',
//          ];
//          $finaldata[] = [
//             'S.No' => '',
//             'Magazine Name' =>    '',
//             'Periodicity' =>  '',
//             'Expected Date ' =>  '',
//             'Librarian Name' =>  '',
//                 'Library Type' =>   '',
//             'Total Recived' =>   '',
//             'Total Notrecived' =>  '',
//          ];
     

    
//          $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
//          $csvContent .= "S.No, Magazine Name, Periodicity,Expected Date, Librarian Name,Library Type,Total Recived,Total Notrecived\n"; 
//          foreach ($finaldata as $data) {
//              $csvContent .= '"' . implode('","', $data) ."\"\n";
//          }
    
//          $headers = [
//              'Content-Type' => 'text/csv; charset=utf-8',
//              'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
//          ];
    
//          return response()->make($csvContent, 200, $headers);


//       }else{
//         return back()->with('error',"No Record Found");
//     }
       
//     }else{
//         return back()->with('error',"Mounth Year field  is required");
//     }




// }
public function Dispatch_magazinereport(Request $req)
{
    if ($req->monthyear === null || $req->monthyear1 === null) {
        return back()->with('error', "Month Year field is required");
    }

    $query = Dispatch::query();

    if ($req->id !== null) {
        $query->where('magazine_id', $req->id);
    }

    if ($req->Frequency !== null) {
        $query->where('periodicity', $req->Frequency);
    }

    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    
    $startDate->modify('first day of this month');
    
    $endDate->modify('last day of this month');
    
    $startDateFormatted = $startDate->format('Y-m-d');
    $endDateFormatted = $endDate->format('Y-m-d');
    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

    $query->orderBy('magazine_name', 'Desc');
    $query->orderBy('expected_date', 'asc');
    $Dispatch = $query->get();

    if ($Dispatch->isEmpty()) {
        return back()->with('error', "No Record Found");
    }

    $orders = Ordermagazine::where('status', '0')->get();
    $magazineCounts = $orders->flatMap(function ($order) {
        return collect(json_decode($order->magazineProduct, true))
            ->map(function ($magazineProduct) use ($order) {
                
                return [
                    'id' => $magazineProduct['magazineid'],
                    'count' => 1,
                ];
            });
    })
    ->groupBy('id')

    ->map(function ($items) {
        return [
            'id' => $items->first()['id'],
            'count' => $items->sum('count'),
        ];
    })
    ->values()
    ->toArray();
    

    $finaldata = [];
    $serialNumber = 1;

    foreach ($Dispatch as $val) {
        $library_ids1 = json_decode($val->library_id, true);
        $received_ids1 = json_decode($val->received_id, true);
        $not_received_ids1 = json_decode($val->not_received_id, true);
        $library_ids = array_unique($library_ids1);
        $received_ids = array_unique($received_ids1);
        $not_received_ids = array_unique($not_received_ids1);

        $recived = count(array_intersect($library_ids, $received_ids));
        $notrecived = count(array_intersect($library_ids, $not_received_ids));
        $pending = count($library_ids)-($recived +$notrecived);
        
        $val->count = count($library_ids);
        $val->recived = $recived;
        $val->notrecived = $notrecived;
        $val->pending = $pending;
        $totalrecc=0;
        foreach($magazineCounts  as $value){
             
            if($val->magazine_id == $value['id']){
                $totalrecc =$totalrecc + $value['count'];
            }
        }
        $magazine1 = Magazine::find( $val->magazine_id);

        $finaldata[] = [
            'S.No' => $serialNumber++,
            'Magazine Name' => $val->magazine_name,
            'Periodicity' => $val->periodicity,
            'Single Issue Rate' => $magazine1->single_issue_rate,
            'Discount' => $magazine1->discount,
            'Single Issue After Discount' => $magazine1->single_issue_after_discount,
            'Expected Date' => (new \DateTime($val->expected_date))->format('d-m-y'),
            'Total Subscription' => $totalrecc,
            'Total Library' => $val->count,
            'Total Recived' => $val->recived,
            'Total Notrecived' => $val->notrecived,
          'pending' =>  $val->pending


        ];
    }

    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .= "S.No, Magazine Name, Periodicity,Single Issue Rate,Discount,Single Issue After Discount,Expected Date,Total Subscription, Total Library, Total Recived, Total Notrecived, Total  Non Entered\n";
    foreach ($finaldata as $data) {
        $csvContent .= '"' . implode('","', $data) . "\"\n";
    }

    $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="MagazineDispatchReport.csv"',
    ];

    return response()->make($csvContent, 200, $headers);
}

// public function Dispatch_libraryreport(Request $req) {

//     if ($req->monthyear !== null && $req->monthyear1 !== null) {
//         $query = Dispatch::query();

//         if ($req->Frequency !== null) {
//             $query->where('periodicity', $req->Frequency);
//         }
//         if ($req->id !== null) {
       
//             $query->where('magazine_id', $req->id);
//         }

//         $startDate = new \DateTime($req->monthyear);
//         $endDate = new \DateTime($req->monthyear1);
//         $startDateFormatted = $startDate->format('Y-m-d');
//         $endDateFormatted = $endDate->format('Y-m-d');
//         $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

//         $query->orderBy('created_at', 'asc');
//         $dispatches = $query->get();
       
//         if ($dispatches->isEmpty()) {
//             return back()->with('error', "No Record Found");
//         }

//         // Collect all library IDs from dispatches
//         $libraryIds = [];
//         foreach ($dispatches as $dispatch) {
//              $rec11 =json_decode($dispatch->library_id, true);
//             $libraryIds = array_merge($libraryIds,$rec11 );
//         }
   
//         // $libraryIds = array_unique($libraryIds);
   
//         // Fetch all librarians in a single query
//         $librarians = Librarian::whereIn('id', $libraryIds)->get()->keyBy('id');

//         $data = [];
//         foreach ($dispatches as $dispatch) {
//             $libraryIds = json_decode($dispatch->library_id, true);
//             $receivedIds = json_decode($dispatch->received_id, true);
//             $notReceivedIds = json_decode($dispatch->not_received_id, true);

//             foreach ($libraryIds as $libraryId) {
//                 if (!isset($librarians[$libraryId])) {
//                     continue;
//                 }
//                  $librarian = $librarians[$libraryId];

//                 if ($req->librarytype != null && $req->librarytype != $librarian->libraryType) {
//                     continue;
//                 }

//                  $received = in_array($libraryId, $receivedIds) ? 1 : 0;
//                 $notReceived = in_array($libraryId, $notReceivedIds) ? 1 : 0;

//                 $data[$libraryId]['library_name'] = $librarian->libraryName;
//                 $data[$libraryId]['library_id'] = $librarian->librarianId;
//                 $data[$libraryId]['library_district'] = $librarian->district;
//                 $data[$libraryId]['library_type'] = $librarian->libraryType;
           
           
//                $data[$libraryId]['dispatches'][] = [
//                     'magazine_name' => $dispatch->magazine_name,
//                     'periodicity' => $dispatch->periodicity,
//                     'expected_date' => $dispatch->expected_date,
//                     'received' => $received,
//                     'not_received' => $notReceived
//                 ];
//             }
//         }

//         $serialNumber = 1;
//         $csvData = [];
//         foreach ($data as $libraryId => $libraryData) {
     
//             // Sort dispatches by magazine name
//             usort($libraryData['dispatches'], function($a, $b) {
//                 return strcmp($a['magazine_name'], $b['magazine_name']);
//             });

//             foreach ($libraryData['dispatches'] as $val) {
//                 $csvData[] = [
//                     'S.No' => $serialNumber++,
//                     'Library Name' => $libraryData['library_name'],
//                     'Librarian Id' => $libraryData['library_id'],
//                     'District' => $libraryData['library_district'],
//                     'Library Type' => $libraryData['library_type'],
//                     'Magazine Name' => $val['magazine_name'],
//                     'Periodicity' => $val['periodicity'],
//                     'Expected Date' => $val['expected_date'],
//                     'Total Received' => $val['received'],
//                     'Total Not Received' => $val['not_received'],
//                 ];
//             }
//             // Adding an empty row after each group for spacing
//             $csvData[] = array_fill_keys(array_keys($csvData[0]), '');
//         }

//         $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
//         $csvContent .= "S.No, Library Name,Librarian Id, District, Library Type, Magazine Name, Periodicity, Expected Date, Total Received, Total Not Received\n";
//         foreach ($csvData as $row) {
//             $csvContent .= '"' . implode('","', $row) . '"' . "\n";
//         }

//         $headers = [
//             'Content-Type' => 'text/csv; charset=utf-8',
//             'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
//         ];

//         return response()->make($csvContent, 200, $headers);

//     } else {
//         return back()->with('error', "Month Year field is required");
//     }
// }
public function Dispatch_libraryreport(Request $req) {

if ($req->monthyear !== null && $req->monthyear1 !== null) {
    $query = Dispatch::query();

    if ($req->Frequency !== null) {
        $query->where('periodicity', $req->Frequency);
    }
    if ($req->id !== null) {
       
        $query->where('magazine_id', $req->id);
    }
    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    
    $startDate->modify('first day of this month');
    
    $endDate->modify('last day of this month');
    
    $startDateFormatted = $startDate->format('Y-m-d');
    $endDateFormatted = $endDate->format('Y-m-d');
    // $startDate = new \DateTime($req->monthyear);
    // $endDate = new \DateTime($req->monthyear1);
    // $startDateFormatted = $startDate->format('Y-m-d');
    //  $endDateFormatted = $endDate->format('Y-m-d');
    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

    $query->orderBy('magazine_name', 'Desc');
    $query->orderBy('expected_date', 'asc');
    $dispatches = $query->get();

    if ($dispatches->isEmpty()) {
        return back()->with('error', "No Record Found");
    }

    // Collect all library IDs from dispatches
    $libraryIds = [];
    foreach ($dispatches as $dispatch) {
        $libraryIds = array_merge($libraryIds, json_decode($dispatch->library_id, true));
    }
    $libraryIds = array_unique($libraryIds);

    // Fetch all librarians in a single query
    $librarians = Librarian::whereIn('id', $libraryIds)->get()->keyBy('id');

    $data = [];
    foreach ($dispatches as $dispatch) {
        $libraryIds = json_decode($dispatch->library_id, true);
        $receivedIds = json_decode($dispatch->received_id, true);
        $notReceivedIds = json_decode($dispatch->not_received_id, true);

        foreach ($libraryIds as $libraryId) {
            if (!isset($librarians[$libraryId])) {
                continue;
            }
            $librarian = $librarians[$libraryId];

            $received = in_array($libraryId, $receivedIds) ? 1 : 0;
            $notReceived = in_array($libraryId, $notReceivedIds) ? 1 : 0;

            if ($req->librarytype != null && $req->librarytype != $librarian->libraryType) {
                continue;
            }

            $data[$libraryId]['library_name'] = $librarian->libraryName;
                            $data[$libraryId]['library_id'] = $librarian->librarianId;
                            $data[$libraryId]['library_district'] = $librarian->district;
                            $data[$libraryId]['library_type'] = $librarian->libraryType;
                            $magazine1 = Magazine::find( $dispatch->magazine_id);

                           
                           $data[$libraryId]['dispatches'][] = [
                                'magazine_name' => $dispatch->magazine_name,
                                'periodicity' => $dispatch->periodicity,
                                'single_issue_rate' => $magazine1->single_issue_rate,
                                'discount' => $magazine1->discount,
                                'single_issue_after_discount' => $magazine1->single_issue_after_discount,
                                'expected_date' => $dispatch->expected_date,
                                'received' => $received,
                                'not_received' => $notReceived,
                            ];
        }
    }

    $serialNumber = 1;
    $csvData = [];
    foreach ($data as $libraryId => $libraryData) {
     
        // Sort dispatches by magazine name
        usort($libraryData['dispatches'], function($a, $b) {
            return strcmp($a['magazine_name'], $b['magazine_name']);
        });

        foreach ($libraryData['dispatches'] as $val) {
            $csvData[] = [
                'S.No' => $serialNumber++,
                'Library Name' => $libraryData['library_name'],
                'Librarian Id' => $libraryData['library_id'],
                'District' => $libraryData['library_district'],
                'Library Type' => $libraryData['library_type'],
                'Magazine Name' => $val['magazine_name'],
                'Periodicity' => $val['periodicity'],
                'Single Issue Rate' => $val['single_issue_rate'],
                'Discount' => $val['discount'],
                'Single Issue After Discount' =>$val['single_issue_after_discount'],
                'Expected Date' => (new \DateTime( $val['expected_date']))->format('d-m-y'),
                'Total Received' => $val['received'],
                'Total Not Received' => $val['not_received'],
               'Total pending' => ($val['received'] != 1 && $val['not_received'] != 1) ? 1 : 0,
            ];
        }
        // Adding an empty row after each group for spacing
        // $csvData[] = array_fill_keys(array_keys($csvData[0]), '');
    }

    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .= "S.No, Library Name,Librarian Id, District, Library Type, Magazine Name, Periodicity,Single Issue Rate,Discount,Single Issue After Discount,Expected Date, Total Received, Total Not Received,Total  Non Entered\n";
    foreach ($csvData as $row) {
        $csvContent .= '"' . implode('","', $row) . '"' . "\n";
    }

    $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
    ];

    return response()->make($csvContent, 200, $headers);

} else {
    return back()->with('error', "Month Year field is required");
}
} 
public function reviewer_report(Request $request){

     if($request->reviewer !=null) {
      $Reviewer = Reviewer::where('reviewerType','=',$request->reviewer)->where('status','=','1')->get();

     }else{
        return back()->with('error',"Select Reviewer Type");
     }


if($Reviewer->isNotEmpty()){
    if($request->reviewer == "internal"){
        $finaldata = [];
        $serialNumber = 1;
        foreach ($Reviewer as $val) {
     
         $Categorys=json_decode($val->Category) ;
         $string = implode(", ", $Categorys);
     
              $finaldata[] = [
               'S.No' =>  $serialNumber ++,
               'Library Name' =>    $val->libraryName,
               'Library Type' =>   $val->libraryType,
               'Reviwer Name' =>  $val->name,
               'Reviwer Code'=>   $val->reviewerId,
               'Designation'=>   $val->designation,
               'Category'=>    $string,
               'District' =>   $val->district,
               'Email' =>   $val->email,
               'Mobile Number' =>   $val->phoneNumber,
           
     
               
     
           ];
         
        
         
        }
        
        $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .= "S.No, Library Name, Library Type,Reviwer Name,Reviwer Code,Designation,Category,District, Email, Mobile Number\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) ."\"\n";
        }
     
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="LibrarianReviewer.csv"',
        ];
     
        return response()->make($csvContent, 200, $headers);
    }else if($request->reviewer == "external"){
       
        $finaldata = [];
        $serialNumber = 1;
        foreach ($Reviewer as $val) {
   
      $Subject=json_decode($val->subject) ;

      if (is_string($Subject)) {
        $array = explode(',', $Subject);
        $string = implode(", ", array_map('trim', $array));  // Ensure no extra spaces
    } elseif (is_array($Subject)) {
        $string = implode(", ", array_map('trim', $Subject));  // Ensure no extra spaces
    }
      
     
              $finaldata[] = [
               'S.No' =>  $serialNumber ++,
               'Reviwer Name' =>  $val->name,
               'Reviwer Code'=>   $val->reviewerId,
               'Designation'=>   $val->designation,
               'Organisation Details'=>   $val->organisationDetails,
               'Subject'=>    $string,
               'Bank Name'=>   $val->bankName,
               'Account Number'=>   $val->accountNumber,
               'branch'=>   $val->branch,
               'Ifsc Number'=>   $val->ifscNumber,
               'District' =>   $val->district,
               'Email' =>   $val->email,
               'Mobile Number' =>   $val->phoneNumber,
           
     
               
     
           ];
         
        
         
        }
       
        $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .= "S.No,Reviwer Name,Reviwer Code,Designation,Organisation Details,Subject,Bank Name,Account Number,branch,Ifsc Number,District, Email, Mobile Number\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) ."\"\n";
        }
     
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="ExpertReviewer.csv"',
        ];
     
        return response()->make($csvContent, 200, $headers);
    }else{
        $finaldata = [];
        $serialNumber = 1;
        foreach ($Reviewer as $val) {
     

     
              $finaldata[] = [
               'S.No' =>  $serialNumber ++,
               'Reviwer Name' =>  $val->name,
               'Membership Id' =>  $val->membershipId,
               'Category'=>   $val->Category,
               'District' =>   $val->district,
               'Email' =>   $val->email,
               'Mobile Number' =>   $val->phoneNumber,
           
     
               
     
           ];
         
        
         
        }
        
        $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
        $csvContent .= "S.No,Reviwer Name,Membership Id,Category,District, Email, Mobile Number\n"; 
        foreach ($finaldata as $data) {
            $csvContent .= '"' . implode('","', $data) ."\"\n";
        }
     
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="PublicReviewer.csv"',
        ];
     
        return response()->make($csvContent, 200, $headers);
    }


} else {
   return back()->with('error',"No Records Found");
}
}


 
public function Dispatch_library_report(Request $req){
  
    if ($req->monthyear !== null && $req->monthyear1 !== null) {
        $query = Dispatch::query();

     
        
        if ($req->Frequency !== null) {
            $query->where('periodicity', $req->Frequency);
        }
        
        if ($req->monthyear !== null && $req->monthyear1 !== null) {
            $startDate = new \DateTime($req->monthyear);
            $endDate = new \DateTime($req->monthyear1);
            
            $startDateFormatted = $startDate->format('Y-m-d');
            $endDateFormatted = $endDate->format('Y-m-d');
            
            $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);
        }
        
        $query->orderBy('created_at', 'asc');
        
        $Dispatch = $query->get();

      if( $Dispatch->isNotEmpty()){
   $data1 = [];
       $data2 = [];
       foreach ($Dispatch as $val) {
        $library_id = json_decode($val->library_id);
        $data2 = array_merge($data2, $library_id);

           $received_id = json_decode($val->received_id, true);
           $not_received_id1 = json_decode($val->not_received_id, true);
           $data1 = array_merge($data1, $not_received_id1);

           $data1 = array_merge($data1, $received_id);
       }

       $data1 = array_unique($data1);
       $data2 = array_unique($data2);
       $diff = array_diff($data2, $data1);
       $librarians = Librarian::whereIn('id', $diff)->get();
      
     
         
          
         $finaldata = [];
         $serialNumber = 1;
         foreach ($librarians as $val) {
            
        
             $finaldata[] = [
                'S.No' =>  $serialNumber ++,
               'Library Name' =>    $val->libraryName,
               'Library Type' =>   $val->libraryType,
               'Librarian Name' =>  $val->librarianName,
               'Library Code'=>   $val->librarianId,
               'District' =>   $val->district,
               'Email' =>   $val->email,
               'Mobile Number' =>   $val->phoneNumber,
                
            ];
          
         
    
          
         }
         

         $csvContent ="\xEF\xBB\xBF"; // UTF-8 BOM
         $csvContent .= "S.No,Library Name,Library Type,Librarian Name, Library Code,District,Email,Mobile Number\n"; 
         foreach ($finaldata as $data) {
             $csvContent .= '"' . implode('","', $data) ."\"\n";
         }
    
         $headers = [
             'Content-Type' => 'text/csv; charset=utf-8',
             'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
         ];
    
         return response()->make($csvContent, 200, $headers);


      }else{
        return back()->with('error',"No Record Found");
    }
       
    }else{
        return back()->with('error',"Mounth Year field  is required");
    }




}

public function dispatch_finalreport(Request $req)
{
    if ($req->monthyear === null || $req->monthyear1 === null) {
        return back()->with('error', "Month Year field is required");
    }

    $query = Dispatch::query();

    if ($req->id !== null) {
        $query->where('magazine_id', $req->id);
    }

    if ($req->Frequency !== null) {
        $query->where('periodicity', $req->Frequency);
    }

    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    
    $startDate->modify('first day of this month');
    
    $endDate->modify('last day of this month');
    
    $startDateFormatted = $startDate->format('Y-m-d');
    $endDateFormatted = $endDate->format('Y-m-d');
    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

    $query->orderBy('magazine_name', 'Desc');
    $query->orderBy('expected_date', 'asc');
    $Dispatch = $query->get();

    if ($Dispatch->isEmpty()) {
        return back()->with('error', "No Record Found");
    }

    $orders = Ordermagazine::where('status', '0')->get();
    $magazineCounts = $orders->flatMap(function ($order) {
        return collect(json_decode($order->magazineProduct, true))
            ->map(function ($magazineProduct) use ($order) {
                
                return [
                    'id' => $magazineProduct['magazineid'],
                    'count' => 1,
                ];
            });
    })
    ->groupBy('id')

    ->map(function ($items) {
        return [
            'id' => $items->first()['id'],
            'count' => $items->sum('count'),
        ];
    })
    ->values()
    ->toArray();
    

    $finaldata = [];
    $serialNumber = 1;
  if($req->district != null){
  
    $librarianIds = Librarian::where('district', $req->district)
    ->pluck('id')->toArray();

foreach ($Dispatch as $key => $val) {
    $library_ids = json_decode($val->library_id, true);
    $received_ids = array_flip(json_decode($val->received_id, true));
    $not_received_ids = array_flip(json_decode($val->not_received_id, true));

    $counts = [
        'totaldata' => 0,
        'received_count' => 0,
        'not_received_count' => 0,
        'pending_count' => 0
    ];

    foreach ($library_ids as $library_id) {
        if (in_array($library_id, $librarianIds)) {
            $counts['totaldata']++;
            if (isset($received_ids[$library_id])) {
                $counts['received_count']++;
            } elseif (isset($not_received_ids[$library_id])) {
                $counts['not_received_count']++;
            } else {
                $counts['pending_count']++;
            }
        }
    }

    $magazine = Magazine::find($val->magazine_id);
    $singleIssueAfterDiscount = (float) $magazine->single_issue_after_discount;
    $totalSubscription = (int) $counts['totaldata'];
    $totalReceived = (int) $counts['received_count'];
    $totalNotReceived = (int) $counts['not_received_count'];
    $pending = (int) $counts['pending_count'];

    $finaldata[] = [
        'S.No' => $key + 1,
        'Magazine Name' => $val->magazine_name,
        'Periodicity' => $val->periodicity,
        'Single Issue Rate' => (float) $magazine->single_issue_rate,
        'Discount' => (float) $magazine->discount,
        'Single Issue After Discount' => round($singleIssueAfterDiscount),
        'Total Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Total Received' => $totalReceived,
        'Total Not Received' => $totalNotReceived,
        'Pending' => $pending,
    ];
}

$result = collect($finaldata)
->groupBy('Magazine Name')
->map(function ($group, $index) {
    $index = (int) $index;  // Ensure $index is an integer
    $singleIssueAfterDiscount = (float) round($group->first()['Single Issue After Discount']);
    $totalSubscription = (int) $group->sum('Total Subscription');
    $totalReceived = (int) $group->sum('Total Received');
    $totalNotReceived = (int) $group->sum('Total Not Received');
    $pending = (int) $group->sum('Pending');

                                                
 return [
        'S.No' => $index + 1,
        'Magazine Name' =>$group->first()['Magazine Name'],
        'Periodicity' => $group->first()['Periodicity'],
        'Single Issue Rate' => (float) $group->first()['Single Issue Rate'],
        'Discount' => (float) $group->first()['Discount'],
        'Single Issue After Discount' => $singleIssueAfterDiscount,
        'Total Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Amount' => round($singleIssueAfterDiscount * $totalSubscription),
        'Total Received' => $totalReceived,
        'Amount1' => round($singleIssueAfterDiscount * $totalReceived),
        'Total Not Received' => $totalNotReceived,
        'Amount2' => round($singleIssueAfterDiscount * $totalNotReceived),
        'Pending' => $pending,
        'Amount3' => round($singleIssueAfterDiscount * $pending),
        'Difference' => round($singleIssueAfterDiscount * ($totalSubscription - $totalReceived)),
    ];
})
->values();


//   foreach($result as $val){
//      return $val;
//   }
$csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
$csvContent .= "S.No,Magazine Name,Periodicity,Single Issue Rate,Discount,Single Issue After Discount,Total Subscription,Total Library,Amount,Total Received,Amount,Total Not Received,Amount,Total Non Entered,Amount,Difference\n"; 

foreach ($result as $data) {
// Ensure each field is enclosed in double quotes and escape quotes inside fields
$escapedData = array_map(function($field) {
    return '"' . str_replace('"', '""', $field) . '"';
}, $data);
$csvContent .= implode(',', $escapedData) . "\n";
}

// Set headers for the CSV file
$headers = [
'Content-Type' => 'text/csv; charset=utf-8',
'Content-Disposition' => 'attachment; filename="DespatchfinalReport.csv"',
];

// Output the CSV content with headers
return response($csvContent)
->header('Content-Type', $headers['Content-Type'])
->header('Content-Disposition', $headers['Content-Disposition']);
  }else{

  
    foreach ($Dispatch as $val) {
        $library_ids1 = json_decode($val->library_id, true);
        $received_ids1 = json_decode($val->received_id, true);
        $not_received_ids1 = json_decode($val->not_received_id, true);
        $library_ids = array_unique($library_ids1);
        $received_ids = array_unique($received_ids1);
        $not_received_ids = array_unique($not_received_ids1);

        $recived = count(array_intersect($library_ids, $received_ids));
        $notrecived = count(array_intersect($library_ids, $not_received_ids));
        $pending = count($library_ids)-($recived +$notrecived);
        
        $val->count = count($library_ids);
        $val->recived = $recived;
        $val->notrecived = $notrecived;
        $val->pending = $pending;
        $totalrecc=0;
        foreach($magazineCounts  as $value){
             
            if($val->magazine_id == $value['id']){
                $totalrecc =$totalrecc + $value['count'];
            }
        }
        $magazine1 = Magazine::find( $val->magazine_id);

        $finaldata[] = [
            'S.No' => $serialNumber++,
            'Magazine Name' => $val->magazine_name,
            'Periodicity' => $val->periodicity,
            'Single Issue Rate' => $magazine1->single_issue_rate,
            'Discount' => $magazine1->discount,
            'Single Issue After Discount' => $magazine1->single_issue_after_discount,
            'Expected Date' => (new \DateTime($val->expected_date))->format('d-m-y'),
            'Total Subscription' => $totalrecc,
            'Total Library' => $val->count,
            'Total Received' => $val->recived,
            'Total Not Received' => $val->notrecived,
          'Pending' =>  $val->pending


        ];
    }
  
    $result = collect($finaldata)
    ->groupBy('Magazine Name')
    ->map(function ($group, $index) {
        $index = (int) $index;  // Ensure $index is an integer
        $singleIssueAfterDiscount = (float) round($group->first()['Single Issue After Discount']);
        $totalSubscription = (int) $group->sum('Total Subscription');
        $totalReceived = (int) $group->sum('Total Received');
        $totalNotReceived = (int) $group->sum('Total Not Received');
        $pending = (int) $group->sum('Pending');

                                                    
     return [
            'S.No' => $index + 1,
            'Magazine Name' =>$group->first()['Magazine Name'],
            'Periodicity' => $group->first()['Periodicity'],
            'Single Issue Rate' => (float) $group->first()['Single Issue Rate'],
            'Discount' => (float) $group->first()['Discount'],
            'Single Issue After Discount' => $singleIssueAfterDiscount,
            'Total Subscription' => $totalSubscription,
            'Total Library' => $totalSubscription,
            'Amount' => round($singleIssueAfterDiscount * $totalSubscription),
            'Total Received' => $totalReceived,
            'Amount1' => round($singleIssueAfterDiscount * $totalReceived),
            'Total Not Received' => $totalNotReceived,
            'Amount2' => round($singleIssueAfterDiscount * $totalNotReceived),
            'Pending' => $pending,
            'Amount3' => round($singleIssueAfterDiscount * $pending),
            'Difference' => round($singleIssueAfterDiscount * ($totalSubscription - $totalReceived)),
        ];
    })
    ->values();

    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .= "S.No,Magazine Name,Periodicity,Single Issue Rate,Discount,Single Issue After Discount,Total Subscription,Total Library,Amount,Total Received,Amount,Total Not Received,Amount,Total Non Entered,Amount,Difference\n"; 
    
    foreach ($result as $data) {
        // Ensure each field is enclosed in double quotes and escape quotes inside fields
        $escapedData = array_map(function($field) {
            return '"' . str_replace('"', '""', $field) . '"';
        }, $data);
        $csvContent .= implode(',', $escapedData) . "\n";
    }
    
    // Set headers for the CSV file
    $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="DespatchfinalReport.csv"',
    ];
    
    // Output the CSV content with headers
    return response($csvContent)
        ->header('Content-Type', $headers['Content-Type'])
        ->header('Content-Disposition', $headers['Content-Disposition']);
}
}


public function dispatch_final_report_pdf(Request $req)
{
 
    if ($req->monthyear === null || $req->monthyear1 === null) {
        $data=[];
        return view('admin.dispatch_final_report_pdf', compact('data'));

    }
    if ($req->district === null ) {
        $data=[];
        return back()->with('error', "District field is required");

    }
    $query = Dispatch::query();

  

    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    
    $startDate->modify('first day of this month');
    
    $endDate->modify('last day of this month');
    
    $startDateFormatted = $startDate->format('Y-m-d');
    $endDateFormatted = $endDate->format('Y-m-d');
    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

    $query->orderBy('magazine_name', 'Desc');
    $query->orderBy('expected_date', 'asc');
    $Dispatch = $query->get();

    if ($Dispatch->isEmpty()) {
        return back()->with('error', "No Record Found");
    }

    $orders = Ordermagazine::where('status', '0')->get();
    $magazineCounts = $orders->flatMap(function ($order) {
        return collect(json_decode($order->magazineProduct, true))
            ->map(function ($magazineProduct) use ($order) {
                
                return [
                    'id' => $magazineProduct['magazineid'],
                    'count' => 1,
                ];
            });
    })
    ->groupBy('id')

    ->map(function ($items) {
        return [
            'id' => $items->first()['id'],
            'count' => $items->sum('count'),
        ];
    })
    ->values()
    ->toArray();
    

    $finaldata = [];
    $serialNumber = 1;

  
    $librarianIds = Librarian::where('district', $req->district)
    ->pluck('id')->toArray();

foreach ($Dispatch as $key => $val) {
    $library_ids = json_decode($val->library_id, true);
    $received_ids = array_flip(json_decode($val->received_id, true));
    $not_received_ids = array_flip(json_decode($val->not_received_id, true));

    $counts = [
        'totaldata' => 0,
        'received_count' => 0,
        'not_received_count' => 0,
        'pending_count' => 0
    ];

    foreach ($library_ids as $library_id) {
        if (in_array($library_id, $librarianIds)) {
            $counts['totaldata']++;
            if (isset($received_ids[$library_id])) {
                $counts['received_count']++;
            } elseif (isset($not_received_ids[$library_id])) {
                $counts['not_received_count']++;
            } else {
                $counts['pending_count']++;
            }
        }
    }

    $magazine = Magazine::find($val->magazine_id);
    $singleIssueAfterDiscount = (float) $magazine->single_issue_after_discount;
    $totalSubscription = (int) $counts['totaldata'];
    $totalReceived = (int) $counts['received_count'];
    $totalNotReceived = (int) $counts['not_received_count'];
    $pending = (int) $counts['pending_count'];
    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    $startDateFormatted = $startDate->format('M-Y');
    $endDateFormatted = $endDate->format('M-Y');
        $finaldata[] = [
        'S.No' => $key + 1,
        'Magazine Name' => $val->magazine_name,
        'Periodicity' => $val->periodicity,
        'Single Issue Rate' => (float) $magazine->single_issue_rate,
        'language' => (float) $magazine->language,
        'Discount' => (float) $magazine->discount,
        'Single Issue After Discount' => round($singleIssueAfterDiscount),
        'Total Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Total Received' => $totalReceived,
        'Total Not Received' => $totalNotReceived,
        'Pending' => $pending,
        'District' =>$req->district,
        'month' => $startDateFormatted. ' - ' .  $endDateFormatted
    ];
}

$result = collect($finaldata)
->groupBy('Magazine Name')
->map(function ($group, $index) {
    $index = (int) $index;  // Ensure $index is an integer
    $singleIssueAfterDiscount = (float) round($group->first()['Single Issue After Discount']);
    $totalSubscription = (int) $group->sum('Total Subscription');
    $totalReceived = (int) $group->sum('Total Received');
    $totalNotReceived = (int) $group->sum('Total Not Received');
    $pending = (int) $group->sum('Pending');

                                                
 return [
        'S_No' => $index + 1,
        'Magazine_Name' =>$group->first()['Magazine Name'],
        'Periodicity' => $group->first()['Periodicity'],
        'Single_Issue_Rate' => (float) $group->first()['Single Issue Rate'],
        'Discount' => (float) $group->first()['Discount'],
        'language' => (float) $group->first()['language'],
        'Single_Issue_After_Discount' => $singleIssueAfterDiscount,
        'Total_Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Amount' => round($singleIssueAfterDiscount * $totalSubscription),
        'Total_Received' => $totalReceived,
        'Amount1' => round($singleIssueAfterDiscount * $totalReceived),
        'Total_Not_Received' => $totalNotReceived,
        'Amount2' => round($singleIssueAfterDiscount * $totalNotReceived),
        'Pending' => $pending,
        'Amount3' => round($singleIssueAfterDiscount * $pending),
        'Difference' => round($singleIssueAfterDiscount * ($totalSubscription - $totalReceived)),
        'District' => $group->first()['District'],
        'month' =>$group->first()['month']
    ];
})
->values();
    $data=$result;
return view('admin.dispatch_final_report_pdf', compact('data'));

 

}
}
      




  

