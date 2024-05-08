<?php

use Illuminate\Support\Facades\Route;

include(base_path('routes/auth.php'));
include(base_path('routes/adminauth.php'));
include(base_path('routes/admin.php'));
include(base_path('routes/sub_admin.php'));
include(base_path('routes/publisher.php'));
include(base_path('routes/distributor.php'));
include(base_path('routes/publisher_and_distributor.php'));
include(base_path('routes/reviewer.php'));
include(base_path('routes/memberauth.php'));
include(base_path('routes/librarian.php'));
include(base_path('routes/order.php'));
include(base_path('routes/payment.php'));
include(base_path('routes/periodicalauth.php'));
include(base_path('routes/periodical_publisher.php'));
include(base_path('routes/periodical_distributor.php'));
Route::get('/', function () {return view('index');});
Route::get('/faq',function(){return view('faq');});
Route::get('/guidelines',function(){return view('guidelines');});
Route::get('/contact-us',function(){return view('contact-us');});
Route::get('/about',function(){return view('about');});
Route::get('/procurement-policy',function(){return view('procurement-policy');});
Route::get('/thirukkural-view',function(){return view('thirukkural-view');});
Route::get('/splash-screen',function(){return view('splash-screen');});
Route::get('/invoice-pdf',function(){return view('invoice-view');});
// Route::get('/cart-magazine',function(){return view('cart-magazine');});



Route::get('/policy',function(){return view('policy');});

Route::get('/payment',function(){return view('payment.payment');});
Route::get('/testpdf',function(){return view('cartpdfview');});

Route::get('/privacy-policy',function(){return view('privacy-policy');});
Route::get('/return-and-refund-policy',function(){return view('return-and-refund-policy');});
Route::get('/terms-and-conditions',function(){return view('terms-and-conditions');});
 

