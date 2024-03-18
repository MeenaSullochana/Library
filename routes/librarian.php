<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Librarian\LibrarianController;
use App\Http\Controllers\Librarian\QuoteController;
use App\Http\Controllers\Librarian\FeedbackController;
use App\Http\Controllers\Librarian\notificationController;
use App\Http\Controllers\WebsitebookController;

Route::middleware(['librarian'])->group(function () {
Route::prefix('librarian')->group(function () { 

    Route::get('/index',function(){ return view('librarian.index');});
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/notification',function(){ return view('librarian.notification');});
    Route::get('/Notification_virw/{id}',[notificationController::class,'Notification_virw']);
    
    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('librarian.notification_view')->with("data",$data);
         }
         
     });
    Route::get('/book_cancel_list',function(){ return view('librarian.book_cancel_list');});
    Route::get('/book_complete_list',function(){ return view('librarian.book_complete_list');});
    Route::get('/book_order_cancel_list',function(){ return view('librarian.book_order_cancel_list');});
    Route::get('/book_order_list',function(){ return view('librarian.book_order_list');});
    Route::get('/book_order_pending',function(){ return view('librarian.book_order_pending');});
    Route::get('/book_pending_list',function(){ return view('librarian.book_pending_list');});
    Route::get('/book_profile',function(){ return view('librarian.book_profile');});
    Route::get('/book_return_list',function(){ return view('librarian.book_return_list');});
    Route::get('/book_stock_list',function(){ return view('librarian.book_stock_list');});
    Route::get('/book_view',function(){ return view('librarian.book_view');});
    Route::get('/cart_books',function(){ return view('librarian.cart_books');});
    Route::get('/forgot_new_pass',function(){ return view('librarian.forgot_new_pass');});
    Route::get('/change_password',function(){ return view('librarian.change_password');});
    Route::get('/invoice',function(){ return view('librarian.invoice');});
    Route::get('/login',function(){ return view('librarian.login');});
    Route::get('/logout',function(){ return view('librarian.logout');});
    Route::get('/navigation_old',function(){ return view('librarian.navigation_old');});
    Route::get('/order_item_list',function(){ return view('librarian.order_item_list');});
    Route::get('/order_scheme_read',function(){ return view('librarian.order_scheme_read');});
    Route::get('/order_scheme',function(){ return view('librarian.order_scheme');});
    Route::get('/profile',function(){ return view('librarian.profile');});
    Route::get('/publisher_list',function(){ return view('librarian.publisher_list');});
    Route::get('/pub_profile',function(){ return view('librarian.pub_profile');});
    Route::get('/publisher_pending_list',function(){ return view('librarian.publisher_pending_list');});
    Route::get('/quote_item_list',function(){ return view('librarian.quote_item_list');});
    Route::get('/quote_pending',function(){ return view('librarian.quote_pending');});
    Route::get('/quote_reject_list',function(){ return view('librarian.quote_reject_list');});
    Route::get('/quote',function(){ return view('librarian.quote');});
    Route::get('/report_download',function(){ return view('librarian.report_download');});
    Route::get('/review_book_list',function(){ return view('librarian.review_book_list');});
    Route::get('/review_post_book',function(){ return view('librarian.review_post_book');});
    Route::get('/store_book_view',function(){ return view('librarian.store_book_view');});
    Route::get('/store_books',function(){ return view('librarian.store_books');});
    Route::get('/update_profile',function(){ return view('librarian.update_profile');});

    Route::get('/meta_book_list',[LibrarianController::class,'metabooklist']);
    Route::post('/librarianapprovestatus',[LibrarianController::class,'librarianapprovestatus']);
    Route::post('/librarianrejectstatus',[LibrarianController::class,'librarianrejectstatus']);
    Route::get('/meta_complete_book_list',[LibrarianController::class,'meta_complete_book_list']);
    Route::get('/meta_pending',[LibrarianController::class,'meta_pending']);
    Route::get('/meta_reject',[LibrarianController::class,'meta_reject']);
    Route::get('/meta_return',[LibrarianController::class,'meta_return']);

 
    Route::get('/book_view/{id}',[LibrarianController::class,'bookview']);
    Route::get('/bookview',function(){
        $data = Session::get('book');
        if($data !==null){
            return view('librarian.book_view')->with("data",$data);
        }
        
    });
    Route::post('/changepassword',[LibrarianController::class,'librarianchangepassword']);

    Route::get('/order_scheme_read/{id}',[QuoteController::class,'orderschemeread']);
    Route::get('/orderschemeread',function(){
        $data = Session::get('budget');
        if($data !==null){
            return view('librarian.order_scheme_read')->with("data",$data);
        }
        
    });
  


       //  feedbackadd
       Route::post('/feedbackadd',[FeedbackController::class,'feedbackadd']);
      
     Route::get('/feedback_librarian_add',function(){ return view('librarian.feedback_librarian_add');});
     Route::post('/categoryupdate',[LibrarianController::class,'categoryupdate']);

     Route::post('/subjectupdate',[LibrarianController::class,'subjectupdate']);
     Route::post('/librarianreturnmessage',[LibrarianController::class,'librarianreturnmessage']);

     Route::get('/library_edit',function(){ return view('librarian.library_edit');});
     Route::post('/librarianedit',[LibrarianController::class,'librarianedit']);


     Route::get('/meta_update_return',[LibrarianController::class,'meta_update_return']);



     
});
});