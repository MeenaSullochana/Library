<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Librarian\LibrarianController;
use App\Http\Controllers\Librarian\QuoteController;
use App\Http\Controllers\Librarian\FeedbackController;
use App\Http\Controllers\Librarian\notificationController;
use App\Http\Controllers\WebsitebookController;
use App\Http\Controllers\Payment\SaleController;
use App\Http\Controllers\Payment\ResponseSaleController;
Route::get('/salesapi',function(){return view('payment.saleapi');});

Route::post('/process-sale', [SaleController::class, 'processSale']);
Route::post('/sale/response', [ResponseSaleController::class,'processPaymentResponse']);
// Route::get('/test',function(){return view('payment.test');});