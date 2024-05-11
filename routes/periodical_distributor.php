<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodicalDistributor\MagazineController;
use App\Http\Controllers\PeriodicalDistributor\PeriodicalDistributorController;

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
    Route::post('/changepassword',[PeriodicalDistributorController::class,'peridistchangepassword']);
Route::get('/change_password',function(){ return view('periodical_distributor.change_password');});
Route::post('/magazine/add',[MagazineController::class,'createmagazine']);
Route::post('/getcategory', [MagazineController::class, 'getcategory']);
Route::post('/getdistrict', [MagazineController::class, 'getDistricts']);
});

});