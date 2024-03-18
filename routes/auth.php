<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subadmin\FairController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Subadmin\TicketController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\WebsitebookController;
use Illuminate\Support\Facades\Session;


//USER
Route::get('/clear-cache', function () {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear route cache
    Artisan::call('route:cache');

    // Clear config cache
    Artisan::call('config:cache');

    // Clear view cache
    Artisan::call('view:clear');

    return 'Caches have been cleared';
});
// Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/create/publisher', [RegisterController::class, 'pub_create']);
Route::post('/create/distributor', [RegisterController::class, 'dis_create']);
Route::post('/create/publisher_distributor', [RegisterController::class, 'pub_dis_create']);
Route::post('/check/username', [RegisterController::class, 'usernameCheck']);
Route::post('/check/email', [RegisterController::class, 'emailCheck']);
Route::post('/check/dis_username', [RegisterController::class, 'disusernameCheck']);
Route::post('/check/dis_email', [RegisterController::class, 'disemailCheck']);
Route::post('/check/both_username', [RegisterController::class, 'pub_dis_usernameCheck']);
Route::post('/check/both_email', [RegisterController::class, 'pub_dis_emailCheck']);
Route::get('/register',function(){return view('newindex');});
 Route::post('/userregister', [RegisterController::class, 'showRegistrationForm'])->name('userregister');


//login
Route::get('/login',[LoginController::class,'showLoginForm'])->name('user.login-view');
Route::post('/login',[LoginController::class,'userLogin'])->name('user.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');
// Route::get('/resetpassword',function(){ return view('Auth.resetpassword');});
Route::get('/forgotform',function(){ return view('Auth.forgotform');});
Route::post('/forgotpassword', [ForgotPasswordController::class,'forgotpassword']);
Route::get('/forgotform/{email}/{type}', [ForgotPasswordController::class, 'resetpassword']);
Route::post('/getdistrict', [RegisterController::class, 'getDistricts']);
Route::get('/reset-password',function(){
    $data = Session::get('obj');
    if($data !==null){
        return view('Auth.resetpassword')->with("data",$data);
    }else{
        return back();
    }

});
Route::get('/mailconfirmation',function(){
    $data = Session::get('publisher');
    if($data !==null){
        return view('mailconfirm')->with("data",$data);
    }

});


Route::post('/otpverification', [ForgotPasswordController::class, 'otpverification']);
Route::post('/resendcode', [ForgotPasswordController::class, 'resendcode']);
Route::post('/changemail', [ForgotPasswordController::class, 'changemail']);


Route::post('/password/change', [ForgotPasswordController::class, 'passwordchange']);
// Route::get('/mailconfirm',function(){ return view('mailconfirm');});
Route::get('/public_register',function(){return view('public_register');});
Route::post('/publicregister', [RegisterController::class, 'publicregister']);



// Route::get('/cart_books',function(){ return view('cart_books');});
// Route::get('/product',function(){ return view('product');});
// Route::get('/shope',function(){ return view('shope');});
// Route::get('/wishlist',function(){ return view('wishlist');});
// Route::get('/checkout',function(){ return view('checkout');});
// Route::get('/product', [WebsitebookController::class, 'websitebook']);
// Route::get('/product/add/cart/{id}',[WebsitebookController::class, 'addToCart']);
// Route::post('/product/update/cart',[WebsitebookController::class, 'updatecart']);
// Route::get('/product/destroy/cart/{id}',[WebsitebookController::class, 'destroy']); 
// Route::get('/book_categories', [WebsitebookController::class, 'book_categories']);


// Route::get('/cart',[WebsitebookController::class, 'bookcart']);
// Route::get('/shope/{id}', [WebsitebookController::class, 'bookview']);

Route::get('/singlebookview',function(){
    $data = Session::get('book');
    if($data !==null){
        return view('shope')->with("data",$data);
    }

});
