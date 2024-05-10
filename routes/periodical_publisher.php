<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodicalPublisher\MagazineController;
use App\Http\Controllers\PeriodicalPublisher\PeriodicalPublisherController;



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
    Route::get('/procurement',function(){ return view('periodical_publisher.procurement');});
    Route::get('/procurement_samplemagazine',function(){ return view('periodical_publisher.procurement_samplemagazine');});
    Route::get('/procurement_samplemagazinepending',function(){ return view('periodical_publisher.procurement_samplemagazinepending');});
    Route::get('/procurement_samplemagazinecomplete',function(){ return view('periodical_publisher.procurement_samplemagazinecomplete');});

    // payment
    Route::get('/procurement_payment_list',function(){ return view('periodical_publisher.procurement_payment_list');});
    Route::get('/paymentreceipt',function(){ return view('periodical_publisher.paymentreceipt');});

    // feedback
    Route::get('/feedback_add',function(){ return view('periodical_publisher.feedback_add');});

    // payment
    Route::get('/payment',function(){ return view('periodical_publisher.payment');});
});

