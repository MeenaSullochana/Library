<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publisher\TicketController;
use App\Http\Controllers\Publisher\ApplicationController;
use App\Http\Controllers\Publisher\PublisherController;
use App\Http\Controllers\Publisher\dashboardController;
use App\Http\Controllers\Publisher\FeedbackController;
use App\Http\Controllers\Publisher\BookController;
use App\Http\Controllers\Publisher\notificationController;
use App\Http\Controllers\Publisher\PaymentController;


Route::middleware(['publisher'])->group(function () {

Route::prefix('publisher')->group(function () {
    Route::post('/getlanguage', [BookController::class, 'getlanguage']);
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/payment_receipt/{id}',[PaymentController::class,'payment_recept']);

    // Route::get('/payment_recept',function(){ return view('publisher.payment_recept');});
    Route::get('/paymentreceipt',function(){
       $data = Session::get('paymrnt');
         if($data !==null){
             return view('publisher.receipt')->with("data",$data);
         }

     });
    Route::get('/procurement_payment',function(){ return view('publisher.procurement_paymrnt');});
    Route::post('/isbn',[BookController::class,'isbn']);


    Route::get('/notification',function(){ return view('publisher.notification');});
    // Route::get('/notification_view',function(){ return view('publisher.notification_view');});
    Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);

    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('publisher.notification_view')->with("data",$data);
         }

     });
    Route::get('/book_add',function(){ return view('publisher.book_add');});
    // Route::get('/book_edit',function(){ return view('publisher.book_edit');});
    Route::get('/book_edit/{id}',[BookController::class,'book_edit']);
    Route::get('/bookedit',function(){
        $data = Session::get('book');
         if($data !==null){
             return view('publisher.book_edit')->with("data",$data);
         }

     });
    
    // Route::get('/book_manage_view',function(){ return view('publisher.book_manage_view');});

    // Route::get('/receipt', function () {return view('publisher.receipt');});

    Route::get('/activitymonitor',function(){ return view('publisher.activitymonitor');});
    Route::get('/allocated_location_list',function(){ return view('publisher.allocated_location_list');});
    Route::get('/allocated_location_view',function(){ return view('publisher.allocated_location_view');});
    Route::get('/application_form',function(){ return view('publisher.application_form');});
    Route::get('/application',function(){ return view('publisher.application');});
    Route::get('/dist_profile',function(){ return view('publisher.dist_profile');});
    Route::get('/distriputer_inactive_list',function(){ return view('publisher.distriputer_inactive_list');});
    Route::get('/distriputer_list',function(){ return view('publisher.distriputer_list');});
    Route::get('/distriputer_pending_list',function(){ return view('publisher.distriputer_pending_list');});
    Route::get('/event_create',function(){ return view('publisher.event_create');});
    Route::get('/event_list',function(){ return view('publisher.event_list');});
    Route::get('/event_update',function(){ return view('publisher.event_update');});
    Route::get('/event_view',function(){ return view('publisher.event_view');});
    Route::get('/pub_profile',function(){ return view('publisher.pub_profile');});
    Route::get('/publisher_and_dis_inactive_list',function(){ return view('publisher.publisher_and_dis_inactive_list');});
    Route::get('/publisher_and_dis_list',function(){ return view('publisher.publisher_and_dis_list');});
    Route::get('/publisher_and_dis_pending_list',function(){ return view('publisher.publisher_and_dis_pending_list');});
    Route::get('/publisher_and_dis_profile',function(){ return view('publisher.publisher_and_dis_profile');});
    Route::get('/publisher_inactive_list',function(){ return view('publisher.publisher_inactive_list');});
    Route::get('/publisher_list',function(){ return view('publisher.publisher_list');});
    Route::get('/publisher_pending_list',function(){ return view('publisher.publisher_pending_list');});
    Route::get('/report_download',function(){ return view('publisher.report_download');});
    Route::get('/update_profile',function(){ return view('publisher.update_profile');});
     //ticket
     Route::get('/ticket_create',[TicketController::class,'districtlist']);
     Route::get('getdistric/{id}',[TicketController::class,'getdistric']);
     Route::post('/ticketadd',[TicketController::class,'ticketadd']);
     Route::get('/ticket_list',[TicketController::class,'ticketlist']);
     Route::get('/ticket_chat/{id}',[TicketController::class,'ticketchat']);
     Route::post('/chatmessage/{id}',[TicketController::class,'chatmessage']);

     Route::get('/ticket_chat',function(){
       $data = Session::get('ticdata');
        if($data !==null){
            return view('publisher.ticket_chat')->with("data",$data);
        }else{
            return back();
        }

    });

    Route::get('/ticket_view/{id}',[TicketController::class,'ticketview']);
    Route::get('/ticket_view',function(){
       $data = Session::get('ticket');

         if($data !==null){
             return view('publisher.ticket_view')->with("data",$data);
         }else{
             return back();
         }

     });
     Route::get('/ticket_completed',[TicketController::class,'ticketcompleted']);
     Route::get('/ticket_pending',[TicketController::class,'ticketpending']);
     Route::get('/ticketdelete/{id}',[TicketController::class,'ticketdelete']);
     Route::get('/fair_application/{id}',[ApplicationController::class,'publisherapplication']);
     Route::get('/fair_application_apply',[ApplicationController::class,'fairapplicationapply']);
     Route::get('/fairmanage',function(){
        $data = Session::get('events');
        if($data !==null){
            return view('publisher.fair_application')->with("data",$data);
        }else{
            return back();
        }

    });
    Route::post('/pubapplyadd',[ApplicationController::class,'applyadd']);
    Route::get('/fair_application_list',[ApplicationController::class,'applicationlist']);
    Route::get('/fair_application_view/{id}',[ApplicationController::class,'applicationview']);
    Route::get('/applyview',function(){
        $data = Session::get('events');
        if($data !==null){
            return view('publisher.fair_application_view')->with("data",$data);
        }else{
            return back();
        }
    });
    Route::post('/changepassword',[PublisherController::class,'publisherchangepassword']);
     Route::get('/change_password',function(){ return view('publisher.change_password');});
     Route::get('/index',[dashboardController::class,'pubdistdashboard']);
    //pub profile
     Route::get('/pub_profile/{id}',[PublisherController::class,'pubprofile']);
     Route::get('/pubprofile',function(){
         $data = Session::get('publisher');
         if($data !==null){
             return view('publisher.pub_profile')->with("data",$data);
         }else{
             return back();
         }

     });

     Route::get('/pub_profile_view',[PublisherController::class,'pubprofileview']);

     Route::post('/pubprofileimg',[PublisherController::class,'pubprofileimg']);

     Route::post('/pubbackgroundimg',[PublisherController::class,'pubbackgroundimg']);
     Route::get('/book_updatelist',function(){ return view('publisher.book_updatelist');});
     Route::post('/bookupdatedandreturn',[BookController::class,'bookupdatedandreturn']);

     
     Route::get('/pub_profile_edit',[PublisherController::class,'pubprofileedit']);
     Route::get('/feedback_publisher_add',function(){ return view('publisher.feedback_publisher_add');});
    //  feedbackadd
    Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);

    //BookController
    Route::post('/bookdelete',[BookController::class,'bookdelete']);
    Route::post('/multibookdelete',[BookController::class,'multibookdelete']);


    Route::post('/create/book',[BookController::class,'create']);
    Route::get('/book_manage_all',[BookController::class,'bookmanageall']);
    Route::get('/book_manage_view/{id}',[BookController::class,'bookmanageview']);
     Route::get('/bookmanageview',function(){
         $data = Session::get('book');
         if($data !==null){
             return view('publisher.book_manage_view')->with("data",$data);
         }

     });
    Route::post('/update/book',[BookController::class,'update']);
    Route::post('/remove-image', [BookController::class,'removeImage'])->name('remove.image');
    Route::post('/remove-image-highlights', [BookController::class,'removeImageHighlights'])->name('remove.image.highlights');
     Route::get('/procurement_completed',[BookController::class,'procurecompleted']);
     Route::get('/procurement_list',[BookController::class,'procurelist']);
     Route::get('/procurement_reject',[BookController::class,'procurereject']);
     Route::get('/procurement',[BookController::class,'procurement']);
     Route::post('/procurement',[BookController::class,'procurementstatus']);
     Route::post('/checkBookTitle',[BookController::class,'checkBookTitle']);

     Route::get('/payment',function(){ return view('publisher.payment');});

     Route::post('/applay_procurment',[BookController::class,'applay_procurment']);
     Route::post('/pay-endpoint',[BookController::class,'pay_endpoint']);

// Negotiation

     Route::get('/nego_pending_list',function(){ return view('publisher.nego_pending_list');});
     Route::get('/nego_approved_list',function(){ return view('publisher.nego_approved_list');});
     Route::get('/nego_failed_list',function(){ return view('publisher.nego_failed_list');});
     Route::get('/nego_process_list',function(){ return view('publisher.nego_process_list');});



     Route::post('/sendnegotiationstatus',[BookController::class,'sendnegotiationstatus']);


     Route::post('/sendnegotiationsamount',[BookController::class,'sendnegotiationsamount']);

     Route::get('/procurement_samplebook',[BookController::class,'procurement_samplebook']);
     Route::get('/procurement_samplebookpending',[BookController::class,'procurement_samplebookpending']);
   
     Route::post('/procurementbokkcopies',[BookController::class,'procurementbokkcopies']);
     Route::get('/procurement_samplebookcomplete',[BookController::class,'procurement_samplebookcomplete']);

     Route::post('/procurementbokkcopies-send',[BookController::class,'procurementbokkcopies_send']);


    //  
    });
});
