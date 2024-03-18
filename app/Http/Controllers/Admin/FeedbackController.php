<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
use App\Models\Publisher;
use App\Models\ApplicationApply;
use App\Models\Distributor;
use App\Models\Librarian;
use App\Models\Reviewer;


use App\Models\PublisherDistributor; 
class FeedbackController extends Controller
{

  public function  feedbackpublisherlist(){
    $feedback=Feedback::where('userType','=','publisher')->get();
    $data=[];
    foreach($feedback as $key=>$val){
    $pub=Publisher::where('id','=',$val->userId)->first();
    $val->firstname=$pub->firstName;
    $val->lastname=$pub->lastName;
    $val->email=$pub->email;
    $val->phone=$pub->mobileNumber;
    $val->image=$pub->profileImage;

    array_push($data,$val);
    }
    // return $data;
    return view('admin/feedback_publisher_list')->with('data',$data);  
  }
  public function  feedbackdistributorlist(){
    $feedback=Feedback::where('userType','=','distributor')->get();
    $data=[];
    foreach($feedback as $key=>$val){
    $dist=Distributor::where('id','=',$val->userId)->first();
    $val->firstname=$dist->firstName;
    $val->lastname=$dist->lastName;
    $val->email=$dist->email;
    $val->phone=$dist->mobileNumber;
    $val->image=$dist->profileImage;

    array_push($data,$val);
    }
    // return $data;
    return view('admin/feedback_distributor_list')->with('data',$data);  
  }
  public function  feedbackpubdistlist(){
    $feedback=Feedback::where('userType','=','publisherdistributor')->get();
    $data=[];
    foreach($feedback as $key=>$val){
    $pubdist=PublisherDistributor::where('id','=',$val->userId)->first();
    $val->firstname=$pubdist->firstName;
    $val->lastname=$pubdist->lastName;
    $val->email=$pubdist->email;
    $val->phone=$pubdist->mobileNumber;
    $val->image=$pubdist->profileImage;

    array_push($data,$val);
    }
    // return $data;
    return view('admin/feedback_publisher_distributor_list')->with('data',$data);  
  }
  public function  feedbackpublisher($id){
    $feedback=Feedback::where('id','=',$id)->first();
    $dist=Publisher::where('id','=',$feedback->userId)->first();
    $feedback->firstname=$dist->firstName;
    $feedback->lastname=$dist->lastName;
    $feedback->image=$dist->profileImage;
    
    return redirect('/admin/feedback_publisher')->with('feedback',$feedback); 
  
    
  }

  public function  feedbackdistributor($id){
    $feedback=Feedback::where('id','=',$id)->first();
    $pub=Distributor::where('id','=',$feedback->userId)->first();
    $feedback->firstname=$pub->firstName;
    $feedback->lastname=$pub->lastName;
    $feedback->image=$pub->profileImage;
    
    return redirect('/admin/feedback_distributor')->with('feedback',$feedback); 
  
    
  }
  
  public function  feedbackpubdist($id){
    $feedback=Feedback::where('id','=',$id)->first();
    $pub=PublisherDistributor::where('id','=',$feedback->userId)->first();
    $feedback->firstname=$pub->firstName;
    $feedback->lastname=$pub->lastName;
    $feedback->image=$pub->profileImage;
    
    return redirect('/admin/feedbackpubdist')->with('feedback',$feedback); 
  
    
  }
  
  public function  feedbackdelete($id){
    $feedback=Feedback::where('id','=',$id)->first();
    $feedback->delete();
    return back()->with('success','Feedback Deleted Sucessfully');
  }
  
  public function  feedbacklibrarian(){
    $feedback=Feedback::where('userType','=','librarian')->get();
    $data=[];
    foreach($feedback as $key=>$val){
    $librarian=Librarian::where('id','=',$val->userId)->first();
    $val->firstname=$librarian->librarianName;
    $val->email=$librarian->email;
    $val->phone=$librarian->phoneNumber;
   
    array_push($data,$val);
    }
    // return $data;
    return view('admin/feedback_librarian_list')->with('data',$data);  
  }

  public function  feedback_librarian($id){
    $feedback=Feedback::where('id','=',$id)->first();
     $librarian=Librarian::where('id','=',$feedback->userId)->first();
    $librarian->firstname=$librarian->librarianName;
   
    
    return redirect('/admin/feedbacklibrariant')->with('feedback',$feedback); 
  
    
  }
  
  public function  feedbackreviewer(){
    $feedback=Feedback::where('userType','=','reviewer')->get();
    $data=[];
    foreach($feedback as $key=>$val){
    $reviewer=Reviewer::where('id','=',$val->userId)->first();
    $val->firstname=$reviewer->name;
    $val->email=$reviewer->email;
    $val->phone=$reviewer->phoneNumber;
    $feedback->image=$reviewer->profileImage;
    array_push($data,$val);
    }
    // return $data;
    return view('admin/feedback_reviewer_list')->with('data',$data);  
  }

  public function  feedback_reviewer($id){
    $feedback=Feedback::where('id','=',$id)->first();
     $reviewer=Reviewer::where('id','=',$feedback->userId)->first();
    $feedback->firstname=$reviewer->name;
    $feedback->image=$reviewer->profileImage;
   
    return redirect('/admin/feedbackreviewer')->with('feedback',$feedback); 
  
    
  }
  
}
