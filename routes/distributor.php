<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Distributor\TicketController;
use App\Http\Controllers\Distributor\ApplicationController;
use App\Http\Controllers\Distributor\DistributorController;
use App\Http\Controllers\Distributor\dashboardController;
use App\Http\Controllers\Distributor\FeedbackController;
use App\Http\Controllers\Distributor\BookController;
use App\Http\Controllers\Distributor\notificationController;
use App\Http\Controllers\Distributor\PaymentController;

Route::middleware(['distributor'])->group(function () {
Route::prefix('distributor')->group(function () {
    Route::post('/getlanguage', [BookController::class, 'getlanguage']);
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/notification',function(){ return view('distributor.notification');});
    Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);
    Route::post('/isbn',[BookController::class,'isbn']);

    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('distributor.notification_view')->with("data",$data);
         }
         
     });

     Route::get('/payment_recept/{id}',[PaymentController::class,'payment_recept']);

     Route::get('/paymentrecept',function(){
        $data = Session::get('paymrnt');
          if($data !==null){
              return view('distributor.payment_recept')->with("data",$data);
          }
          
      });
     Route::get('/procurement_paymrnt',function(){ return view('distributor.procurement_paymrnt');});
     
Route::get('/index', function () {return view('distributor.index');});
Route::get('/allocated_location_list', function () {return view('distributor.allocated_location_list');});
Route::get('/allocated_location_view', function () {return view('distributor.allocated_location_view');});
Route::get('/application_form', function () {return view('distributor.application_form');});
Route::get('/application', function () {return view('distributor.application');});
Route::get('/dist_profile', function () {return view('distributor.dist_profile');});
Route::get('/distriputer_inactive_list', function () {return view('distributor.distriputer_inactive_list');});
Route::get('/distriputer_list', function () {return view('distributor.distriputer_list');});
Route::get('/distriputer_pending_list', function () {return view('distributor.distriputer_pending_list');});
Route::get('/event_create', function () {return view('distributor.event_create');});
Route::get('/event_list', function () {return view('distributor.event_list');});
Route::get('/event_update', function () {return view('distributor.event_update');});
Route::get('/event_view', function () {return view('distributor.event_view');});
Route::get('/fair_application_list', function () {return view('distributor.fair_application_list');});
Route::get('/fair_application_view', function () {return view('distributor.fair_application_view');});
Route::get('/footer', function () {return view('distributor.footer');});
Route::get('/navigation', function () {return view('distributor.navigation');});
Route::get('/update_profile', function () {return view('distributor.update_profile');});
Route::get('/report_download', function () {return view('distributor.report_download');});

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
         return view('distributor.ticket_chat')->with("data",$data);
     }else{
         return back();
     }
     
 });
  
 Route::get('/ticket_view/{id}',[TicketController::class,'ticketview']);
 Route::get('/ticket_view',function(){
    $data = Session::get('ticket');
      if($data !==null){
          return view('distributor.ticket_view')->with("data",$data);
      }else{
          return back();
      }
      
  });
  Route::get('/ticket_completed',[TicketController::class,'ticketcompleted']);
  Route::get('/ticket_pending',[TicketController::class,'ticketpending']);
  Route::get('/ticketdelete/{id}',[TicketController::class,'ticketdelete']);

  Route::get('/fair_application/{id}',[ApplicationController::class,'distributorapplication']);
  Route::get('/fair_application_apply',[ApplicationController::class,'fairapplicationapply']);
  Route::get('/fairmanage',function(){
     $data = Session::get('events');
     if($data !==null){
         return view('distributor.fair_application')->with("data",$data);
     }else{
         return back();
     }
     
 });
 Route::post('/distapplyadd',[ApplicationController::class,'applyadd']);
 Route::get('/fair_application_list',[ApplicationController::class,'applicationlist']);
 Route::get('/fair_application_view/{id}',[ApplicationController::class,'applicationview']);
 Route::get('/applyview',function(){
     $data = Session::get('events');
     if($data !==null){
         return view('distributor.fair_application_view')->with("data",$data);
     }else{
         return back();
     }
 }); 
 Route::post('/changepassword',[DistributorController::class,'distributorchangepassword']);
 Route::get('/change_password',function(){ return view('distributor.change_password');});
 Route::get('/index',[dashboardController::class,'distdashboard']);
 Route::get('/dist_profile/{id}',[DistributorController::class,'distprofile']);
 Route::get('/distprofile',function(){
     $data = Session::get('distributor');
     if($data !==null){
         return view('distributor.dist_profile')->with("data",$data);
     }else{
         return back();
     }
     
 });

 Route::get('/dist_profile_view',[DistributorController::class,'distprofileview']);
 Route::post('/distprofileimg',[DistributorController::class,'distprofileimg']);
     
 Route::post('/distbackgroundimg',[DistributorController::class,'distbackgroundimg']);
 Route::get('/dist_profile_edit',[DistributorController::class,'distprofileedit']);
  //  feedbackadd
  Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
 Route::get('/feedback_distributor_add',function(){ return view('distributor.feedback_distributor_add');});
 Route::post('/bookdelete',[BookController::class,'bookdelete']);
 Route::post('/multibookdelete',[BookController::class,'multibookdelete']);

 Route::get('/book_add',function(){ return view('distributor.book_add');});
 Route::post('/create/book',[BookController::class,'create']);
    Route::get('/book_manage_all',[BookController::class,'bookmanageall']);
    Route::get('/book_manage_view/{id}',[BookController::class,'bookmanageview']);
     Route::get('/bookmanageview',function(){
         $data = Session::get('book');
         if($data !==null){
             return view('distributor.book_manage_view')->with("data",$data);
         }
         
     });
     Route::get('/procurement_completed',[BookController::class,'procurecompleted']);
     Route::get('/procurement_list',[BookController::class,'procurelist']);
     Route::get('/procurement_reject',[BookController::class,'procurereject']);
     Route::get('/procurement',[BookController::class,'procurement']);
     Route::post('/procurement',[BookController::class,'procurementstatus']);
     Route::post('/checkBookTitle',[BookController::class,'checkBookTitle']);
     Route::get('/payment',function(){ return view('distributor.payment');});
     Route::post('/applay_procurment',[BookController::class,'applay_procurment']);
     Route::post('/pay-endpoint',[BookController::class,'pay_endpoint']);

     // Negotiation 

     Route::get('/nego_pending_list',function(){ return view('distributor.nego_pending_list');});
     Route::get('/nego_approved_list',function(){ return view('distributor.nego_approved_list');});
     Route::get('/nego_failed_list',function(){ return view('distributor.nego_failed_list');});
     Route::get('/nego_process_list',function(){ return view('distributor.nego_process_list');});
     Route::post('/sendnegotiationstatus',[BookController::class,'sendnegotiationstatus']);
     Route::post('/sendnegotiationsamount',[BookController::class,'sendnegotiationsamount']);
     Route::get('/book_updatelist',function(){ return view('distributor.book_updatelist');});
     Route::post('/bookupdatedandreturn',[BookController::class,'bookupdatedandreturn']);
     Route::get('/book_edit/{id}',[BookController::class,'book_edit']);
     Route::get('/bookedit',function(){
         $data = Session::get('book');
          if($data !==null){
              return view('distributor.book_edit')->with("data",$data);
          }
 
      });
      Route::post('/update/book',[BookController::class,'update']);
      Route::post('/remove-image', [BookController::class,'removeImage']);
      Route::post('/remove-image-highlights', [BookController::class,'removeImageHighlights']);

      Route::get('/procurement_samplebook',[BookController::class,'procurement_samplebook']);
      Route::get('/procurement_samplebookpending',[BookController::class,'procurement_samplebookpending']);
    
      Route::post('/procurementbokkcopies',[BookController::class,'procurementbokkcopies']);
 

    });
});