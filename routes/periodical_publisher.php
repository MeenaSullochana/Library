<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodicalPublisher\MagazineController;



Route::prefix('periodical_publisher')->group(function () { 
    Route::get('/index',function(){ return view('periodical_publisher.index');});

    Route::get('/Magazine_add',function(){ return view('periodical_publisher.Magazine_add');});
    Route::get('/magazine_list',[MagazineController::class,'list']);
    Route::get('/magazine_view/{id}',[MagazineController::class,'magazine_view']);
    Route::get('/magazineview',function(){
        $data = \Session::get('magazine');
        if($data !==null){
            return view('periodical_publisher.magazine_view')->with("data",$data);
        }
    
    });
    
});

