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

Route::get('/', function () {return view('index');});
Route::get('/faq',function(){return view('faq');});
Route::get('/guidelines',function(){return view('guidelines');});
Route::get('/contact-us',function(){return view('contact-us');});
Route::get('/about',function(){return view('about');});
Route::get('/procurement-policy',function(){return view('procurement-policy');});
Route::get('/thirukkural-view',function(){return view('thirukkural-view');});
Route::get('/splash-screen',function(){return view('splash-screen');});