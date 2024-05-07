<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;




Route::prefix('periodical_publisher')->group(function () { 
    Route::get('/index',function(){ return view('periodical_publisher.index');});

});

