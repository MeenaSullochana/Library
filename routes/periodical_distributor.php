<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodicalDistributor\MagazineController;
use App\Http\Controllers\PeriodicalDistributor\PeriodicalDistributorController;
use App\Http\Controllers\PeriodicalDistributor\FeedbackController;
use App\Http\Controllers\PeriodicalDistributor\PaymentController;
use App\Http\Controllers\PeriodicalDistributor\notificationController;

Route::middleware(['periodical_distributor'])->group(function () {


Route::prefix('periodical_distributor')->group(function () { 
    Route::get('/index',function(){ return view('periodical_distributor.index');});

    Route::get('/Magazine_add',function(){ return view('periodical_distributor.Magazine_add');});
    Route::get('/magazine_list',[MagazineController::class,'list']);
    Route::get('/magazine_view/{id}',[MagazineController::class,'magazine_view']);
    Route::get('/magazineview',function(){
        $data = \Session::get('magazine');
        if($data !==null){
            return view('periodical_distributor.magazine_view')->with("data",$data);
        }
    
    });
    Route::get('/magazine_edit/{id}', [MagazineController::class, 'magazine_edit']);
    Route::get('/magazineupdate',function(){
        $data = Session::get('magazine');
        if($data !==null){
            return view('periodical_distributor.magazine_edit')->with("data",$data);
        }
    
    });
    Route::post('/magazine/update/{id}',[MagazineController::class,'magazineupdate']);
    Route::post('/getlanguage', [MagazineController::class, 'getcategory']);
    Route::post('/magazine_delete', [MagazineController::class, 'magazine_delete']);
    Route::post('/changepassword',[PeriodicalDistributorController::class,'peridistchangepassword']);
Route::get('/change_password',function(){ return view('periodical_distributor.change_password');});
Route::post('/magazine/add',[MagazineController::class,'createmagazine']);
Route::post('/getcategory', [MagazineController::class, 'getcategory']);
Route::post('/getdistrict', [MagazineController::class, 'getDistricts']);


   // procurement
   Route::get('/procurement', [MagazineController::class, 'procurement']);
   Route::post('/applay_procurment',[MagazineController::class,'applay_procurment']);
   Route::get('/procurement_sampleperiodical',[MagazineController::class,'procurement_sampleperiodical']);
   Route::post('/procurementperiodicalcopies', [MagazineController::class, 'procurementperiodicalcopies']);
   Route::get('/procurement_sampleperiodicalpending', [MagazineController::class, 'procurement_sampleperiodicalpending']);
   Route::get('/procurement_sampleperiodicalcomplete', [MagazineController::class, 'procurement_sampleperiodicalcomplete']);
   Route::post('/periodicalcopiesstatus', [MagazineController::class, 'periodicalcopiesstatus']);

 // payment
 Route::get('/payment',function(){ return view('periodical_distributor.payment');});
 
    // Procurement
    Route::get('/procurement_payment_list',function(){ return view('periodical_distributor.procurement_payment_list');});
    Route::get('/paymentreceipt/{id}',[PaymentController::class,'payment_recept']);
    Route::get('/paymentreceipt',function(){
       $data = Session::get('paymrnt');
         if($data !==null){
             return view('periodical_distributor.paymentreceipt')->with("data",$data);
         }

     });
// feedback
Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
Route::get('/feedback_add',function(){ return view('periodical_distributor.feedback_add');});

 // profile
 

 Route::get('/distributor_profile_view',[PeriodicalDistributorController::class,'distributor_profile_view']);

 Route::post('/distbackgroundimg',[PeriodicalDistributorController::class,'distbackgroundimg']);
 Route::post('/distprofileimg',[PeriodicalDistributorController::class,'distprofileimg']);




 Route::get('/notifications',[notificationController::class,'notifi']);
 Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
 Route::get('/notification',function(){ return view('periodical_distributor.notification');});
 Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);
 Route::post('/isbn',[BookController::class,'isbn']);

 Route::get('/notificationview',function(){
     $data = Session::get('notification1');
      if($data !==null){
          return view('periodical_distributor.notification_view')->with("data",$data);
      }
      
  });

      Route::get('/periodical_procurement_complete',[MagazineController::class,'periodical_procurement_complete']);
     Route::get('/periodical_procurement_list',[MagazineController::class,'periodical_procurement_list']);
     Route::get('/periodical_procurement_reject',[MagazineController::class,'periodical_procurement_reject']);
     Route::get('/periodical_updatelist',function(){ return view('periodical_distributor.periodical_updatelist');});
     
     Route::post('/periodicalupdatedandreturn',[MagazineController::class,'periodicalupdatedandreturn']);

     Route::get('/periodical_procurement_return_update',[MagazineController::class,'periodical_procurement_return_update']);

     Route::get('/nego_pending_list',function(){ return view('periodical_distributor.nego_pending_list');});
     Route::get('/nego_approved_list',function(){ return view('periodical_distributor.nego_approved_list');});
     Route::get('/nego_hold_list',function(){ return view('periodical_distributor.nego_hold');});
     
     Route::get('/nego_failed_list',function(){ return view('periodical_distributor.nego_failed_list');});
     Route::get('/nego_process_list',function(){ return view('periodical_distributor.nego_process_list');});



     Route::post('/sendnegotiationstatus',[MagazineController::class,'sendnegotiationstatus']);


     Route::post('/sendnegotiationsamount',[MagazineController::class,'sendnegotiationsamount']);

});

});