<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subadmin\FairController;
use App\Http\Controllers\Adminauth\LoginController;
use App\Http\Controllers\Subadmin\TicketController;
use App\Http\Controllers\Adminauth\ForgotPasswordController;



//ADMIN
Route::prefix('admin')->group(function () {
Route::get('/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/login',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('/forgotpassword', [ForgotPasswordController::class,'forgotpassword']);
// Route::get('/forgot/{email}/{type}',function(){ return view('Adminauth.forgot');});

Route::get('/forgot/{email}/{type}', [ForgotPasswordController::class, 'forgotform']);

Route::get('/forget-password',function(){
    $data = Session::get('obj');
    if($data !==null){
        return view('Adminauth.forgot')->with("data",$data);
    }else{
        return back();
    }
    
});
Route::post('/password/change', [ForgotPasswordController::class, 'passwordchange']);


});
