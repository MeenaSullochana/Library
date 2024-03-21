<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Librarian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use File;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use App\Models\Mailurl;

 
 use Illuminate\Support\Facades\Notification;
use App\Notifications\Member1detailNotification;
class LibrarianController extends Controller
{
        
    public function createlibrarian(Request $req){
     
     
        
        $validator = Validator::make($req->all(),[
            'libraryType'=>'required|string',
            'libraryName'=>'required|string',
           'subject'=>'required',
            'state'=>'required',
            'district'=>'required|string',
            'city'=>'required|string',
            'Village'=>'required',
            'metaChecker'=>'required',
            'librarianName'=>'required',
            'librarianDesignation'=>'required|string',
            'phoneNumber'=>'required|string|min:10|max:10',
            'email'=>'required|unique:librarians',
            'password'=>'required|min:8|max:8',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
            $Admin=auth('admin')->user();
            $librarian=new Librarian();
            $librarian->libraryType = $req->libraryType;
            $librarian->libraryName = $req->libraryName;
            $librarian->subject = json_encode($req->subject);
           
            $librarian->state = $req->state;
            $librarian->district = $req->district;
            $librarian->city = $req->city;
            $librarian->email = $req->email;
            $librarian->phoneNumber = $req->phoneNumber; 
            $librarian->Village = $req->Village;
            $librarian->role = "librarian";
            $librarian->metaChecker = $req->metaChecker;
           
             $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
             $librarian->librarianId= $randomCode;
            $librarian->librarianName = $req->librarianName;
            $librarian->librarianDesignation = $req->librarianDesignation;
            $librarian->password=Hash::make($req->password);
             $librarian->save();
             $user =  $librarian->email;
             $record =  $librarian;
             $password = $req->password;
            //  $url = "http://127.0.0.1:8000/member/login";
            $rev =Mailurl::first();
            if($rev == null){
                $data= [
                    'error' => "Mail Url not updated",
                         ];
                return response()->json($data);  
            }
            $url = $rev->name . "/member/login";
             Notification::route('mail',$librarian->email)->notify(new Member1detailNotification($user, $url,$record,$password));  
             $data= [
                'success' => 'librarian Create Successfully',
                     ];
            return response()->json($data);    
    
}
public function multiple_librarianstatus(Request $req){
    if (!empty($req->requestData['librarianId'])) {
        $librarians = $req->requestData['librarianId'];
  
      foreach ($librarians as $key => $val) {
       $librarian= Librarian::find($val);
    $librarian->status =$req->status;
    $librarian->save();
      }
      $data = [
        'success' => 'Status Change Successfully',
    ];
    return response()->json($data);
  
  }else{
    $data = [
      'error' => 'Select  Librarian Id',
  ];
  return response()->json($data);
 
   }  

}

public function librarianstatus(Request $req){
          
    $librarian= Librarian::find($req->id);
    $librarian->status =$req->status;
    $librarian->save();
    $data= [
        'success' => 'Status Change Sucessfully',
             ];
    return response()->json($data);   
   }  
   public function metabooklist(){

    $id=auth('librarian')->user()->id; 
      $book = Book::where('book_reviewer_id','=','$id')->get();
      return  $book;
   }
   public function librarianview(Request $req){
    $librarian= Librarian::find($req->id);
$librarian->subject1=json_decode($librarian->subject); 
    return redirect('/admin/librariandata')->with('librarian',$librarian); 

   }

   public function libraryedit(Request $req){
    $librarian= Librarian::find($req->id);
   
   $librarian->subject1= json_decode($librarian->subject); 

    return redirect('/admin/librarydata')->with('librarian',$librarian); 

   }
   public function librarianedit(Request $req){
    $validator = Validator::make($req->all(),[
        'libraryType'=>'required|string',
        'libraryName'=>'required|string',
        'state'=>'required',
        'district'=>'required|string',
        'subject'=>'required',
        'city'=>'required|string',
        'Village'=>'required',
        'metaChecker'=>'required',
        'librarianName'=>'required',
        'librarianDesignation'=>'required|string',
        'phoneNumber'=>'required|string|min:10|max:10',
        'email'=>'required',
      
    ]);
    if($validator->fails()){
        $data= [
            'error' => $validator->errors()->first(),
                 ];
        return response()->json($data);  
       
    }
  
    if(empty($req->newpassword) && empty($req->confirmpassword)) {
       
             $librarian=Librarian::find($req->id);
           
            $librarian->libraryType = $req->libraryType;
            $librarian->libraryName = $req->libraryName;
            $librarian->state = $req->state;
            $librarian->district = $req->district;
            $librarian->city = $req->city;
            if ($librarian->email == $req->email) {
                $librarian->email = $req->email;
            } else {
                $existinglibrarian = Librarian::where('email', $req->email)->first();
            
                if ($existinglibrarian == null) {
                    $librarian->email = $req->email;
                } else {
                    $data = [
                        'error' => 'Email is already taken',
                    ];
                    return response()->json($data);
                }
            }
            $librarian->phoneNumber = $req->phoneNumber; 
            $librarian->Village = $req->Village;
            $librarian->metaChecker = $req->metaChecker;
            $librarian->librarianName = $req->librarianName;
            $librarian->librarianDesignation = $req->librarianDesignation;
            $librarian->subject = json_encode($req->subject);

             $librarian->save();

             $user =  $librarian->email;
             $record =  $librarian;
           
             $password = "Your Old Password";
             $rev =Mailurl::first();
             $url = $rev->name . "/member/login";
            //  $url = "http://127.0.0.1:8000/member/login";
             Notification::route('mail',$librarian->email)->notify(new Member1detailNotification($user, $url,$record,$password));  
             $data= [
                'success' => 'librarian Update Successfully',
                     ];
            return response()->json($data);
        
     }elseif(!empty($req->newpassword) && empty($req->confirmpassword) ){
      $data= [
        'error' => 'please enter confirmPassword',
             ];
         return response()->json($data);
   
     }elseif(empty($req->newpassword) && !empty($req->confirmpassword) ){
      $data= [
        'error' => 'please enter newpassword ',
             ];
         return response()->json($data);
     }else{

      if($req->newpassword == $req->confirmpassword){
        if (strlen($req->newpassword ) == 8 && strlen($req->confirmpassword) == 8) {
            $librarian=Librarian::find($req->id);
            $librarian->libraryType = $req->libraryType;
            $librarian->libraryName = $req->libraryName;
            $librarian->state = $req->state;
            $librarian->district = $req->district;
            $librarian->city = $req->city;
            if ($librarian->email == $req->email) {
                $librarian->email = $req->email;
            } else {
                $existinglibrarian = Librarian::where('email', $req->email)->first();
            
                if ($existinglibrarian == null) {
                    $librarian->email = $req->email;
                } else {
                    $data = [
                        'error' => 'Email is already taken',
                    ];
                    return response()->json($data);
                }
            }
            $librarian->phoneNumber = $req->phoneNumber; 
            $librarian->Village = $req->Village;
            $librarian->subject = json_encode($req->subject);

            $librarian->metaChecker = $req->metaChecker;
            $librarian->librarianName = $req->librarianName;
            $librarian->librarianDesignation = $req->librarianDesignation;
            $librarian->password=Hash::make($req->newpassword);
             $librarian->save();
             $user =  $librarian->email;
             $record =  $librarian;
             $password = $req->password;
            //  $url = "http://127.0.0.1:8000/member/login";
            $rev =Mailurl::first();
            $url = $rev->name . "/member/login";
             Notification::route('mail',$librarian->email)->notify(new Member1detailNotification($user, $url,$record,$password));  
             $data= [
                'success' => 'librarian update Successfully',
                     ];
            return response()->json($data);
        
       
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

    return redirect('/admin/librarydata')->with('librarian',$librarian); 

   }
   
    }

//     public function importFile(Request $request)
// {
//     try {    
//         $admin = auth('admin')->user();
//         if ($request->hasFile('file_library')) {
//             $file = $request->file('file_library');
//             $fileContents = file($file->getPathname());
//             $librarianId = [];
//             foreach ($fileContents as $line) {
//                         $data = str_getcsv($line);
               
//                         // Check if the reviewer with the same email already exists
//                         $librarian = Librarian::where('librarianId', $data[7])->exists();
//                         if ($librarian) {
//                             return redirect()->back()->with('error', $data[7] . " already exists");
//                         }
//                         // Check if the email is duplicated in the file
//                         if (in_array($data[7], $librarianId)) {
//                             return redirect()->back()->with('error', $data[7] . " Duplicate entry");
//                         } else {
//                             $librarianId[] = $data[7];
//                         }
//             }
                
            
//             $librarian = [];
//             foreach ($fileContents as $line) {
//                 $data = str_getcsv($line);
//                     $library = new Librarian();
//                     $library->libraryType = $data[0];
//                     $library->libraryName =$data[1];
//                     $library->state = $data[2];
//                     $library->district = $data[3];
//                     $library->city = $data[4];
//                     $library->Village = $data[5];
//                     $library->password=Hash::make($data[6]);
//                     $library->role = "librarian";
//                     $library->creater = $admin->id; 
//                     $library->librarianId= $data[7];
                   
//                     $library->save();
                 
//                 }
       
           
//             return redirect()->back();
//         } else {
//             return redirect()->back();
//         }
//     } catch (Throwable $e) {
//         // Handle the exception (e.g., log it)
//         // return $e;
//         return redirect()->back()->with('error', 'An error occurred while importing.');
//     }
// }

// public function importFile(Request $request)
// {
//     try {
//         $admin = auth('admin')->user();
//         if ($request->hasFile('file_library')) {
//             $file = $request->file('file_library');
//             $fileContents = file($file->getPathname());

//             // Remove the first row (header row)
//             unset($fileContents[0]);

//             $librarianId = [];
//             foreach ($fileContents as $line) {
//                 $data = str_getcsv($line);

//                 $librarian = Librarian::where('librarianId', $data[1])->exists();
//                 if ($librarian) {
//                     return redirect()->back()->with('errorlib', $data[1] . " already exists");
//                 }

//                 if (in_array($data[1], $librarianId)) {
//                     return redirect()->back()->with('errorlib', $data[1] . " Duplicate entry");
//                 } else {
//                    array_push($librarianId,$data[1]);
//                 }
//             }
//             foreach ($fileContents as $line) {
//                 $data = str_getcsv($line);
//                 $library = new Librarian();
//                 $library->libraryType = $data[3];
//                 $library->libraryName =$data[2];
//                 $library->state = "Tamil Nadu";
//                 $library->district = $data[4];
//                 $library->password = Hash::make("12345678");
//                 $library->role = "librarian";
//                 $library->metaChecker = "no";
//                 $library->librarianId =$data[1];
//                 $library->sNo = $data[0];
//                 $library->save();
                
//             }

//             return redirect()->back()->with('successlib', 'File imported successfully');
//         } else {
//             return redirect()->back()->with('errorlib', 'No file uploaded');
//         }
//     } catch (\Throwable $e) {
//         // Handle the exception (e.g., log it)
//         return redirect()->back()->with('errorlib', 'An error occurred while importing.');
//     }
// }
public function importFile(Request $request)
{
    try {
        $admin = auth('admin')->user();
        if ($request->hasFile('file_library')) {
            $file = $request->file('file_library');
            $fileContents = file($file->getPathname());

            // Remove the first row (header row)
            unset($fileContents[0]);

            $batchSize = 100; // Set your desired batch size

            $chunks = array_chunk($fileContents, $batchSize);

            foreach ($chunks as $chunk) {
                $librarianId = [];
                foreach ($chunk as $line) {
                    $data = str_getcsv($line);

                    $librarian = Librarian::where('librarianId', $data[1])->exists();
                    if ($librarian) {
                        return redirect()->back()->with('errorlib', $data[1] . " already exists");
                    }

                    if (in_array($data[1], $librarianId)) {
                        return redirect()->back()->with('errorlib', $data[1] . " Duplicate entry");
                    } else {
                        array_push($librarianId, $data[1]);
                    }
                }
                
                foreach ($chunk as $line) {
                    $data = str_getcsv($line);
                    $library = new Librarian();
                    $library->libraryType = $data[3];
                    $library->libraryName = $data[2];
                    $library->state = "Tamil Nadu";
                    $library->district = $data[4];
                    $library->password = Hash::make("12345678");
                    $library->role = "librarian";
                    $library->metaChecker = "no";
                    $library->librarianId = $data[1];
                    $library->sNo = $data[0];
                    $library->save();
                }
            }

            return redirect()->back()->with('successlib', 'File imported successfully');
        } else {
            return redirect()->back()->with('errorlib', 'No file uploaded');
        }
    } catch (\Throwable $e) {
        // Handle the exception (e.g., log it)
        return redirect()->back()->with('errorlib', 'An error occurred while importing.');
    }
}

}