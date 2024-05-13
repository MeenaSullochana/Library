<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodicalPublisher\MagazineController;
use App\Http\Controllers\PeriodicalPublisher\PeriodicalPublisherController;
use App\Http\Controllers\PeriodicalPublisher\FeedbackController;


Route::middleware(['periodical_publisher'])->group(function () {

Route::prefix('periodical_publisher')->group(function () { 
    Route::get('/index',function(){ return view('periodical_publisher.index');});

    Route::get('/Magazine_add',function(){ return view('periodical_publisher.Magazine_add');});
    Route::post('/magazine/add',[MagazineController::class,'createmagazine']);
    Route::get('/magazine_list',[MagazineController::class,'list']);
    Route::get('/magazine_view/{id}',[MagazineController::class,'magazine_view']);
    Route::get('/magazineview',function(){
        $data = \Session::get('magazine');
        if($data !==null){
            return view('periodical_publisher.magazine_view')->with("data",$data);
        }
    
    });
    Route::post('/changepassword',[PeriodicalPublisherController::class,'peripubchangepassword']);
    Route::get('/change_password',function(){ return view('periodical_publisher.change_password');});
    Route::post('/getcategory', [MagazineController::class, 'getcategory']);
    Route::post('/getdistrict', [MagazineController::class, 'getDistricts']);
    Route::get('/publisher_profile_view',function(){ return view('periodical_publisher.publisher_profile_view');});

    // notification
    Route::get('/publisher_notification',function(){ return view('periodical_publisher.publisher_notification');});
    Route::get('/publisher_notification_view',function(){ return view('periodical_publisher.publisher_notification_view');});
    
    // procurement
    Route::get('/procurement', [MagazineController::class, 'procurement']);
    Route::post('/applay_procurment',[MagazineController::class,'applay_procurment']);
    Route::get('/procurement_sampleperiodical',[MagazineController::class,'procurement_sampleperiodical']);
    Route::post('/procurementperiodicalcopies', [MagazineController::class, 'procurementperiodicalcopies']);
    Route::get('/procurement_sampleperiodicalpending', [MagazineController::class, 'procurement_sampleperiodicalpending']);
    Route::get('/procurement_sampleperiodicalcomplete', [MagazineController::class, 'procurement_sampleperiodicalcomplete']);

    Route::post('/periodicalcopiesstatus', [MagazineController::class, 'periodicalcopiesstatus']);

    
    // Route::get('/procurement_sampleperiodical',function(){ return view('periodical_publisher.procurement_samplemagazine');});
    // Route::get('/procurement_samplemagazinepending',function(){ return view('periodical_publisher.procurement_samplemagazinepending');});
    // Route::get('/procurement_samplemagazinecomplete',function(){ return view('periodical_publisher.procurement_samplemagazinecomplete');});

    // payment
    Route::get('/procurement_payment_list',function(){ return view('periodical_publisher.procurement_payment_list');});
    Route::get('/paymentreceipt',function(){ return view('periodical_publisher.paymentreceipt');});

    // feedback
    Route::get('/feedback_add',function(){ return view('periodical_publisher.feedback_add');});

    // payment
    Route::get('/payment',function(){ return view('periodical_publisher.payment');});
// feedback
    Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
    Route::get('/publisher_profile_view',[PeriodicalPublisherController::class,'publisher_profile_view']);
    Route::post('/pubbackgroundimg',[PeriodicalPublisherController::class,'pubbackgroundimg']);
    Route::post('/pubprofileimg',[PeriodicalPublisherController::class,'pubprofileimg']);

        
});
});
