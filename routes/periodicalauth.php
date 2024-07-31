<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Subadmin\FairController;
use App\Http\Controllers\Periodicalauth\LoginController;
use App\Http\Controllers\Periodicalauth\RegisterController;
// use App\Http\Controllers\Subadmin\TicketController;
use App\Http\Controllers\Periodicalauth\ForgotPasswordController;
// use App\Http\Controllers\WebsitebookController;
// use Illuminate\Support\Facades\Session;

Route::prefix('periodical')->group(function () {
Route::post('/create/publisher', [RegisterController::class, 'pub_create']);
Route::post('/create/distributor', [RegisterController::class, 'dis_create']);
Route::post('/check/username', [RegisterController::class, 'usernameCheck']);
Route::post('/check/email', [RegisterController::class, 'emailCheck']);
Route::post('/check/dis_username', [RegisterController::class, 'disusernameCheck']);
Route::post('/check/dis_email', [RegisterController::class, 'disemailCheck']);
Route::post('/getdistrict', [RegisterController::class, 'getDistricts']);
Route::get('/login',function(){return view('periodicalauth.login');});

Route::post('/login',[LoginController::class,'userLogin'])->name('periodical.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('periodical.logout');


Route::get('/forgotform',function(){ return view('periodicalauth.forgotform');});
Route::post('/forgotpassword', [ForgotPasswordController::class,'forgotpassword']);
Route::get('/forgotform/{email}/{type}', [ForgotPasswordController::class, 'resetpassword']);
Route::get('/reset-password',function(){
    $data = Session::get('obj');
    if($data !==null){
        return view('periodicalauth.resetpassword')->with("data",$data);
    }else{
        return back();
    }

});

Route::post('/password/change', [ForgotPasswordController::class, 'passwordchange']);
Route::get('/register',[RegisterController::class, 'index']);
Route::get('/userregister', [RegisterController::class, 'showRegistrationForm'])->name('periodical.register.form');
Route::post('/userregister', [RegisterController::class, 'showRegistrationForm']);

Route::get('/mailconfirmation',function(){
    $data = Session::get('publisher');
    if($data !==null){
        return view('periodical_mailconfirm')->with("data",$data);
    }

});


Route::post('/otpverification', [ForgotPasswordController::class, 'otpverification']);
Route::post('/resendcode', [ForgotPasswordController::class, 'resendcode']);
Route::post('/changemail', [ForgotPasswordController::class, 'changemail']);


// Route::get('/public_register',function(){return view('public_register');});
// Route::post('/publicregister', [RegisterController::class, 'publicregister']);


// Route::get('/singlebookview',function(){
//     $data = Session::get('book');
//     if($data !==null){
//         return view('shope')->with("data",$data);
//     }

});
