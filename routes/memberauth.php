<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Memberauth\LoginController;
use App\Http\Controllers\Memberauth\ForgotPasswordController;




//ADMIN
Route::prefix('member')->group(function () {
Route::get('/login',[LoginController::class,'showMemberLoginForm'])->name('member.login-view');
 Route::post('/login',[LoginController::class,'memberLogin'])->name('member.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('member.logout');
Route::post('/memberforgotpassword', [ForgotPasswordController::class,'memberforgotpassword']);
Route::get('/forgot/{email}/{type}', [ForgotPasswordController::class, 'forgotform']);

Route::get('/forget-password',function(){
    $data = Session::get('obj');
    if($data !==null){
        return view('Memberauth.memberforgotform')->with("data",$data);
    }else{
        return back();
    }
    
});
Route::post('/passwordchange', [ForgotPasswordController::class, 'passwordchange']);

});
