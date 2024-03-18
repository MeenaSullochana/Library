<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reviewer\ReviewerController;
use App\Http\Controllers\Reviewer\FeedbackController;
use App\Http\Controllers\Reviewer\notificationController;

Route::middleware(['reviewer'])->group(function () {
Route::prefix('reviewer')->group(function () { 
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/notification',function(){ return view('reviewer.notification');});
    Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);
    
    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('reviewer.notification_view')->with("data",$data);
         }
         
     });
    Route::get('/update_profile',function(){ return view('reviewer.update_profile');});
    Route::get('/ticket_view',function(){ return view('reviewer.ticket_view');});
    Route::get('/ticket_pending',function(){ return view('reviewer.ticket_pending');});
    Route::get('/ticket_list',function(){ return view('reviewer.ticket_list');});
    Route::get('/ticket_create',function(){ return view('reviewer.ticket_create');});
    Route::get('/ticket_completed',function(){ return view('reviewer.ticket_completed');});
   
    Route::get('/report_download',function(){ return view('reviewer.report_download');});
    Route::get('/publisher_pending_list',function(){ return view('reviewer.publisher_pending_list');});
    Route::get('/publisher_list',function(){ return view('reviewer.publisher_list');});
    Route::get('/publisher_inactive_list',function(){ return view('reviewer.publisher_inactive_list');});
    Route::get('/publisher_and_dis_profile',function(){ return view('reviewer.publisher_and_dis_profile');});
    Route::get('/publisher_and_dis_pending_list',function(){ return view('reviewer.publisher_and_dis_pending_list');});
    Route::get('/publisher_and_dis_list',function(){ return view('reviewer.publisher_and_dis_list');});
    Route::get('/publisher_and_dis_inactive_list',function(){ return view('reviewer.publisher_and_dis_inactive_list');});
    Route::get('/pub_profile',function(){ return view('reviewer.pub_profile');});
    Route::get('/payment_raciept',function(){ return view('reviewer.payment_raciept');});
    Route::get('/payment_pending',function(){ return view('reviewer.payment_pending');});
    Route::get('/payment_list',function(){ return view('reviewer.payment_list');});
    Route::get('/payment_complete',function(){ return view('reviewer.payment_complete');});
    Route::get('/payment_cancel',function(){ return view('reviewer.payment_cancel');});
    Route::get('/logout',function(){ return view('reviewer.logout');});
    Route::get('/login',function(){ return view('reviewer.login');});
    Route::get('/index',function(){ return view('reviewer.index');});
    Route::get('/footer',function(){ return view('reviewer.footer');});
    Route::get('/event_view',function(){ return view('reviewer.allocated_location_list');});
    Route::get('/event_update',function(){ return view('reviewer.event_update');});
    Route::get('/event_list',function(){ return view('reviewer.event_list');});
    Route::get('/event_create',function(){ return view('reviewer.event_create');});
    Route::get('/distriputer_pending_list',function(){ return view('reviewer.distriputer_pending_list');});
    Route::get('/distriputer_list',function(){ return view('reviewer.distriputer_list');});
    Route::get('/distriputer_inactive_list',function(){ return view('reviewer.distriputer_inactive_list');});
    Route::get('/dist_profile',function(){ return view('reviewer.dist_profile');});
    Route::get('/change_password',function(){ return view('reviewer.change_password');});
  
    Route::get('/book_pending_list',function(){ return view('reviewer.book_pending_list');});
    Route::get('/book_complete_list',function(){ return view('reviewer.book_complete_list');});
    Route::get('/book_cancel_list',function(){ return view('reviewer.book_cancel_list');});
    Route::get('/application',function(){ return view('reviewer.application');});

    Route::get('/application_form',function(){ return view('reviewer.application_form');});
    Route::get('/allocated_location_view',function(){ return view('reviewer.allocated_location_view');});
    Route::get('/allocated_location_list',function(){ return view('reviewer.allocated_location_list');});
   


    
    Route::get('/review_book_list',[ReviewerController::class,'reviewlist']);
    // Route::get('/review_complete',function(){ return view('reviewer.review_complete');});
    Route::get('/review_post_book/{bookid}/{revid}',[ReviewerController::class,'reviewpost']);
    Route::get('/review_post_book',function(){
        $data = Session::get('data');
        if($data !==null){
            $book = $data->book;
            $rev = $data->rev; 
            
            return view('reviewer.review_post_book',compact('book','rev'));
        }else{
            return back();
        }
        
    });
    Route::post('/review',[ReviewerController::class,'review']);
    Route::get('/review_complete',[ReviewerController::class,'completedlist']);
    Route::get('/book_view/{id}/{revid}',[ReviewerController::class,'bookview']);
    Route::get('/bookview',function(){
        $data = Session::get('book');
        if($data !==null){
            return view('reviewer.book_view')->with("data",$data);
        }
        
    });
    Route::post('/changepassword',[ReviewerController::class,'reviewerchangepassword']);
    Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
    Route::get('/feedback_reviewer_add',function(){ return view('reviewer.feedback_reviewer_add');});
    Route::get('/reviewer_create',function(){ return view('reviewer.reviewer_create');});
    Route::post('/createpublicreviewer',[ReviewerController::class,'createpublicreviewer']);
    Route::get('/reviewer_list',function(){ return view('reviewer.reviewer_list');});
    Route::get('/reviewer_active',function(){ return view('reviewer.reviewer_active');});
    Route::get('/reviewer_inactive',function(){ return view('reviewer.reviewer_inactive');});
    Route::post('/multiple-reviewerstatus',[ReviewerController::class,'multiple_reviewerstatus']);

    Route::put('/reviewerstatus',[ReviewerController::class,'reviewerstatus']);

    Route::get('/reviewerview/{id}',[ReviewerController::class,'reviewer_view']);
    Route::get('/reviewer-view',function(){
        $data = Session::get('reviewer');
        if($data !==null){
            return view('reviewer.reviewer_view')->with("data",$data);
        }
        
    });

    Route::get('/reviewer_edit/{id}',[ReviewerController::class,'reviewer_edit']);
    Route::get('/revieweredit',function(){
        $data = Session::get('revieweredit');
        if($data !==null){
            return view('reviewer.reviewer_edit')->with("data",$data);
        }
        
    });

    Route::post('/editpublicreviewer',[ReviewerController::class,'editpublicreviewer']);
    Route::get('/publicedit',function(){ return view('reviewer.publicedit');});
    Route::get('/librarianedit',function(){ return view('reviewer.librarianedit');});
    Route::get('/expertedit',function(){ return view('reviewer.expertedit');});
    Route::post('/editreviewer',[ReviewerController::class,'editreviewer']);
    Route::post('/editpublicprofile',[ReviewerController::class,'editpublicprofile']);

    
});
    });