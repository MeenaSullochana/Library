<?php

namespace App\Http\Controllers\PublisherAndDistributor;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;
class FeedbackController extends Controller
{
    public function  feedbackadd(Request $req){
                
        try{
            $validator = Validator::make($req->all(),[
                 'description'=>'required|string',
                 'subject'=>'required|string'
            ]);
          if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        
       $feedback = new  Feedback();
       $loginid=auth('publisher_distributor')->user()->id;
        $feedback->description = $req->description;
        $feedback->subject = $req->subject;
        $feedback->userId = $loginid;
        $feedback->userType = "publisherdistributor";
        if($feedback->save()){
            return back()->with('success','Feedback Created Successfully '); 
           }
       
    }catch(Throwable $e){
         return back()->with('error', $e->getMessage());
      } 
    }
}
