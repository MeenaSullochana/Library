<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublisherAndDistributor\TicketController;
use App\Http\Controllers\PublisherAndDistributor\ApplicationController;
use App\Http\Controllers\PublisherAndDistributor\dashboardController;
use App\Http\Controllers\PublisherAndDistributor\FeedbackController;

use App\Http\Controllers\PublisherAndDistributor\PublisherDistributorController;
use App\Http\Controllers\PublisherAndDistributor\BookController;
use App\Http\Controllers\PublisherAndDistributor\notificationController;
use App\Http\Controllers\PublisherAndDistributor\PaymentController;

Route::middleware(['publisher_distributor'])->group(function () {


Route::prefix('publisher_and_distributor')->group(function () {
    Route::post('/getlanguage', [BookController::class, 'getlanguage']);
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/notification',function(){ return view('publisher_and_distributor.notification');});
    Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);
    Route::post('/isbn',[BookController::class,'isbn']);

    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('publisher_and_distributor.notification_view')->with("data",$data);
         }
         
     });


     Route::get('/payment_receipt/{id}',[PaymentController::class,'payment_recept']);

     Route::get('/paymentreceipt',function(){
        $data = Session::get('paymrnt');
          if($data !==null){
              return view('publisher_and_distributor.receipt')->with("data",$data);
          }
          
      });
     Route::get('/procurement_payment',function(){ return view('publisher_and_distributor.procurement_paymrnt');});
    //  Route::get('/receipt', function () {return view('publisher_and_distributor.receipt');});
     
Route::get('/allocated_location_list', function () {return view('publisher_and_distributor.allocated_location_list');});
Route::get('/allocated_location_view', function () {return view('publisher_and_distributor.allocated_location_view');});
Route::get('/application_form', function () {return view('publisher_and_distributor.application_form');});
Route::get('/application', function () {return view('publisher_and_distributor.application');});
Route::get('/change_password', function () {return view('publisher_and_distributor.change_password');});
Route::get('/publisher_and_dis_profile', function () {return view('publisher_and_distributor.publisher_and_dis_profile');});
Route::get('/publisher_and_dis_inactive_list', function () {return view('publisher_and_distributor.publisher_and_dis_inactive_list');});
Route::get('/publisher_and_dis_list', function () {return view('publisher_and_distributor.publisher_and_dis_list');});
Route::get('/publisher_and_dis_pending_list', function () {return view('publisher_and_distributor.publisher_and_dis_pending_list');});
Route::get('/event_create', function () {return view('publisher_and_distributor.event_create');});
Route::get('/event_list', function () {return view('publisher_and_distributor.event_list');});
Route::get('/event_update', function () {return view('publisher_and_distributor.event_update');});
Route::get('/event_view', function () {return view('publisher_and_distributor.event_view');});
Route::get('/fair_application_list', function () {return view('publisher_and_distributor.fair_application_list');});
Route::get('/fair_application_view', function () {return view('publisher_and_distributor.fair_application_view');});
Route::get('/footer', function () {return view('publisher_and_distributor.footer');});
Route::get('/navigation', function () {return view('publisher_and_distributor.navigation');});
Route::get('/update_profile', function () {return view('publisher_and_distributor.update_profile');});
// Route::get('/ticket_view', function () {return view('publisher_and_distributor.ticket_view');});
// Route::get('/ticket_pending', function () {return view('publisher_and_distributor.ticket_pending');});
// Route::get('/ticket_list', function () {return view('publisher_and_distributor.ticket_list');});
// Route::get('/ticket_create', function () {return view('publisher_and_distributor.ticket_create');});
// Route::get('/ticket_completed', function () {return view('publisher_and_distributor.ticket_completed');});
Route::get('/report_download', function () {return view('publisher_and_distributor.report_download');});
Route::post('/changepassword',[PublisherDistributorController::class,'pubdistchangepassword']);
Route::get('/change_password',function(){ return view('publisher_and_distributor.change_password');});
// Route::get('/index', function () {return view('publisher_and_distributor.index');});
Route::get('/index',[dashboardController::class,'pubdistdashboard']);


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
          return view('publisher_and_distributor.ticket_chat')->with("data",$data);
      }else{
          return back();
      }
      
  });
   
  Route::get('/ticket_view/{id}',[TicketController::class,'ticketview']);
  Route::get('/ticket_view',function(){
     $data = Session::get('ticket');
  
       if($data !==null){
           return view('publisher_and_distributor.ticket_view')->with("data",$data);
       }else{
           return back();
       }
       
   });
   Route::get('/ticket_completed',[TicketController::class,'ticketcompleted']);
   Route::get('/ticket_pending',[TicketController::class,'ticketpending']);
   Route::get('/ticketdelete/{id}',[TicketController::class,'ticketdelete']);

   Route::get('/fair_application/{id}',[ApplicationController::class,'pubdistapplication']);
   Route::get('/fair_application_apply',[ApplicationController::class,'fairapplicationapply']);
   Route::get('/fairmanage',function(){
      $data = Session::get('events');
      if($data !==null){
          return view('publisher_and_distributor.fair_application')->with("data",$data);
      }else{
          return back();
      }
      
  });
  Route::post('/pubdistapplyadd',[ApplicationController::class,'applyadd']);
  Route::get('/fair_application_list',[ApplicationController::class,'applicationlist']);
  Route::get('/fair_application_view/{id}',[ApplicationController::class,'applicationview']);
  Route::get('/applyview',function(){
      $data = Session::get('events');
      if($data !==null){
          return view('publisher_and_distributor.fair_application_view')->with("data",$data);
      }else{
          return back();
      }
  }); 

//pubdistprofile
Route::get('/publisherdisprofile/{id}',[PublisherDistributorController::class,'pubdistprofile']);
Route::get('/pubdistprofile',function(){
    $data = Session::get('pubdist');
    if($data !==null){
        return view('publisher_and_distributor.publisher_and_dis_profile')->with("data",$data);
    }else{
        return back();
    }
    
});
Route::get('/publisher_and_dis_profile_view',[PublisherDistributorController::class,'pubdistprofileview']);
Route::post('/pubdistprofileimg',[PublisherDistributorController::class,'pubdistprofileimg']);
     
Route::post('/pubdistbackgroundimg',[PublisherDistributorController::class,'pubdistbackgroundimg']);
Route::get('/publisher_and_dis_profile_edit',[PublisherDistributorController::class,'pubdistprofileedit']);
 //  feedbackadd
 Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
 Route::get('/feedback_pub_dist_add',function(){ return view('publisher_and_distributor.feedback_pub_dist_add');});

// book

Route::post('/bookdelete',[BookController::class,'bookdelete']);
Route::post('/multibookdelete',[BookController::class,'multibookdelete']);

 Route::get('/book_add',function(){ return view('publisher_and_distributor.book_add');});
 Route::post('/create/book',[BookController::class,'create']);
 Route::get('/book_manage_all',[BookController::class,'bookmanageall']);
 Route::get('/book_manage_view/{id}',[BookController::class,'bookmanageview']);
  Route::get('/bookmanageview',function(){
      $data = Session::get('book');
      if($data !==null){
          return view('publisher_and_distributor.book_manage_view')->with("data",$data);
      }
      
  });
  
  Route::get('/procurement_samplebook',[BookController::class,'procurement_samplebook']);
  Route::get('/procurement_samplebookpending',[BookController::class,'procurement_samplebookpending']);

     Route::get('/procurement_completed',[BookController::class,'procurecompleted']);
     Route::get('/procurement_list',[BookController::class,'procurelist']);
     Route::get('/procurement_reject',[BookController::class,'procurereject']);
     Route::get('/procurement',[BookController::class,'procurement']);
     Route::post('/procurement',[BookController::class,'procurementstatus']);
     Route::post('/checkBookTitle',[BookController::class,'checkBookTitle']);
     Route::get('/payment',function(){ return view('publisher_and_distributor.payment');});

     Route::post('/applay_procurment',[BookController::class,'applay_procurment']);
     Route::post('/pay-endpoint',[BookController::class,'pay_endpoint']);
     Route::post('/procurementbokkcopies',[BookController::class,'procurementbokkcopies']);

     
          // Negotiation 

          Route::get('/nego_pending_list',function(){ return view('publisher_and_distributor.nego_pending_list');});
          Route::get('/nego_approved_list',function(){ return view('publisher_and_distributor.nego_approved_list');});
          Route::get('/nego_failed_list',function(){ return view('publisher_and_distributor.nego_failed_list');});
          Route::get('/nego_process_list',function(){ return view('publisher_and_distributor.nego_process_list');});
          Route::post('/sendnegotiationstatus',[BookController::class,'sendnegotiationstatus']);
          Route::post('/sendnegotiationsamount',[BookController::class,'sendnegotiationsamount']);
          Route::get('/book_updatelist',function(){ return view('publisher_and_distributor.book_updatelist');});
          Route::post('/bookupdatedandreturn',[BookController::class,'bookupdatedandreturn']);
          Route::get('/book_edit/{id}',[BookController::class,'book_edit']);
          Route::get('/bookedit',function(){
              $data = Session::get('book');
               if($data !==null){
                   return view('publisher_and_distributor.book_edit')->with("data",$data);
               }
      
           });
           Route::post('/update/book',[BookController::class,'update']);
           Route::post('/remove-image', [BookController::class,'removeImage']);
           Route::post('/remove-image-highlights', [BookController::class,'removeImageHighlights']);

           Route::get('/procurement_samplebookcomplete',[BookController::class,'procurement_samplebookcomplete']);

});
});