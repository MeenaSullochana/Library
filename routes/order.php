<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Librarian\LibrarianController;
use App\Http\Controllers\Librarian\QuoteController;
use App\Http\Controllers\Librarian\FeedbackController;
use App\Http\Controllers\Librarian\notificationController;
use App\Http\Controllers\WebsitebookController;

Route::middleware(['librarian'])->group(function () {
    Route::get('/product', [WebsitebookController::class, 'websitebook']);
    Route::get('/product/add/cart/{id}',[WebsitebookController::class, 'addToCart']);
    Route::post('/product/update/cart',[WebsitebookController::class, 'updatecart']);
    Route::get('/product/destroy/cart/{id}',[WebsitebookController::class, 'destroy']); 
    Route::get('/book_categories', [WebsitebookController::class, 'book_categories']);
    Route::get('/checkout', [WebsitebookController::class, 'checkout']);
    Route::get('/shope',function(){ return view('shope');});
    Route::get('/wishlist',function(){ return view('wishlist');});
    // Route::get('/checkout',function(){ return view('checkout');});
    Route::get('/cart',[WebsitebookController::class, 'bookcart']);
    Route::get('/shope/{id}', [WebsitebookController::class, 'bookview']);
    Route::get('/product-two', [WebsitebookController::class, 'product_two']);
    Route::get('/megazine_categories', [WebsitebookController::class, 'megazine_categories']);
    Route::get('/shope-magazine/{id}', [WebsitebookController::class, 'shope_magazine']);
    Route::get('/shopemagazine',function(){
        $data = Session::get('shopemagazine');
         if($data !==null){
             return view('shope-two')->with("data",$data);
         }
         
     });
     Route::get('/cart-magazine',[WebsitebookController::class, 'cart_magazine']);
   
     Route::get('/cart-add/{id}',[WebsitebookController::class, 'cart_add']);
     Route::post('/add-to-cart',[WebsitebookController::class, 'add_to_cart']);
     Route::post('/delete-to-cart',[WebsitebookController::class, 'delete_to_cart']);
     Route::post('/updateQuantity',[WebsitebookController::class, 'updateQuantity']);
     Route::post('/updatecart',[WebsitebookController::class, 'update_cart']);

     
    });