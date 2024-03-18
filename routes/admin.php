<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubadminController;
use App\Http\Controllers\Admin\FairController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PublisherDistributorController;
use App\Http\Controllers\Admin\notificationController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ReviewerController;
use App\Http\Controllers\Admin\LibrarianController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\LibraryTypeController;
use App\Http\Controllers\Admin\PaymentController;




Route::middleware(['admin'])->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('/notifications',[notificationController::class,'notifi']);
    Route::get('/notificationstatus',[notificationController::class,'notificationstatus']);
    Route::get('/Notification_virw/{id}/{type}',[notificationController::class,'Notification_virw']);

    Route::get('/notificationview',function(){
        $data = Session::get('notification1');
         if($data !==null){
             return view('admin.notification_view')->with("data",$data);
         }

     });

Route::get('/activitymonitor',function(){return view('admin.activitymonitor');});
Route::get('/application_approved',function(){return view('admin.application_approved');});
Route::get('/application_list',function(){return view('admin.application_list');});
Route::get('/application_rejected',function(){return view('admin.application_rejected');});
Route::get('/application_view',function(){return view('admin.application_view');});
Route::get('/banner_setting',function(){return view('admin.banner_setting');});
Route::get('/banner_setting_list',function(){return view('admin.banner_setting_list');});
Route::get('/book_section_add_new',function(){return view('admin.book_section_add_new');});
Route::get('/book_section_print',function(){return view('admin.book_section_print');});
Route::get('/book_section',function(){return view('admin.book_section');});
Route::get('/city_add',function(){return view('admin.city_add');});
Route::get('/city_edit',function(){return view('admin.city_edit');});
Route::get('/city_list',function(){return view('admin.city_list');});
Route::get('/country_add',function(){return view('admin.country_add');});
Route::get('/country_edit',function(){return view('admin.country_edit');});
Route::get('/country_list',function(){return view('admin.country_list');});

Route::get('/demo',function(){return view('admin.demo');});
Route::get('/demo1',function(){return view('admin.demo1');});
Route::get('/dist_application_approve_view',function(){return view('admin.dist_application_approve_view');});
Route::get('/dist_application_approved_list',function(){return view('admin.dist_application_approved_list');});
Route::get('/dist_application_list',function(){return view('admin.dist_application_list');});
Route::get('/dist_application_rejected_list',function(){return view('admin.dist_application_rejected_list');});
Route::get('/dist_application_rejected_view',function(){return view('admin.dist_application_rejected_view');});
Route::get('/dist_pub_application_approve_list',function(){return view('admin.dist_pub_application_approve_list');});
Route::get('/dist_pub_application_approve_view',function(){return view('admin.dist_pub_application_approve_view');});
Route::get('/dist_pub_application_list',function(){return view('admin.dist_pub_application_list');});
Route::get('/dist_pub_application_rejecte_list',function(){return view('admin.dist_pub_application_rejecte_list');});
Route::get('/dist_pub_application_rejecte_view',function(){return view('admin.dist_pub_application_rejecte_view');});
Route::get('/dist_pub_application_list',function(){return view('admin.dist_pub_application_list');});
Route::get('/dist_pub_application_rejecte_list',function(){return view('admin.dist_pub_application_rejecte_list');});
Route::get('/dist_pub_application_rejecte_view',function(){return view('admin.dist_pub_application_rejecte_view');});
Route::get('/dist_pub_application_view',function(){return view('admin.dist_pub_application_view');});
Route::get('/district_add',function(){return view('admin.district_add');});
Route::get('/district_edit',function(){return view('admin.district_edit');});
Route::get('/district_list',function(){ return view('admin.district_list');});
Route::get('/distriputer_inactive_list',function(){ return view('admin.distriputer_inactive_list');});
Route::get('/distriputer_list',function(){ return view('admin.distriputer_list');});
Route::get('/distriputer_pending_list',function(){ return view('admin.distriputer_pending_list');});
Route::get('/empty',function(){ return view('admin.empty');});
Route::get('/event_create',function(){ return view('admin.event_create');});
Route::get('/event_list',function(){ return view('admin.event_list');});
Route::get('/event_update',function(){ return view('admin.event_update');});
Route::get('/event_view',function(){ return view('admin.event_view');});
Route::get('/fair_manage_edit',function(){ return view('admin.fair_manage_edit');});
Route::get('/feedback_distributor_list',function(){ return view('admin.feedback_distributor_list');});
Route::get('/feedback_distributor',function(){ return view('admin.feedback_distributor');});
Route::get('/feedback_pub_dist_view',function(){ return view('admin.feedback_pub_dist_view');});
Route::get('/feedback_public_list',function(){ return view('admin.feedback_public_list');});
Route::get('/feedback_public_view',function(){ return view('admin.feedback_public_view');});
Route::get('/feedback_publisher_list',function(){ return view('admin.feedback_publisher_list');});
Route::get('/footer',function(){ return view('admin.footer');});
Route::get('/manage_categories_add',function(){ return view('admin.manage_categories_add');});
Route::get('/manage_categories_edit',function(){ return view('admin.manage_categories_edit');});
Route::get('/manage_categories',function(){ return view('admin.manage_categories');});
Route::get('/manage_child_category_add',function(){ return view('admin.manage_child_category_add');});
Route::get('/manage_child_category_edit',function(){ return view('admin.manage_child_category_edit');});
Route::get('/manage_child_category',function(){ return view('admin.manage_child_category');});
Route::get('/manage_general_setting',function(){ return view('admin.manage_general_setting');});
Route::get('/manage_sub_categories_add',function(){ return view('admin.manage_sub_categories_add');});
Route::get('/manage_sub_categories_edit',function(){ return view('admin.manage_sub_categories_edit');});
Route::get('/manage_sub_categories',function(){ return view('admin.manage_sub_categories');});
Route::get('/navigation',function(){ return view('admin.navigation');});
Route::get('/publisher_and_dis_inactive_list',function(){ return view('admin.publisher_and_dis_inactive_list');});
Route::get('/publisher_and_dis_list',function(){ return view('admin.publisher_and_dis_list');});
Route::get('/publisher_and_dis_pending_list',function(){ return view('admin.publisher_and_dis_pending_list');});
Route::get('/site_announcement',function(){ return view('admin.site_announcement');});
Route::get('/state_add',function(){ return view('admin.state_add');});
Route::get('/state_edit',function(){ return view('admin.state_edit');});
Route::get('/state_list',function(){ return view('admin.state_list');});
// next
Route::get('/book_price_manage',function(){ return view('admin.book_price_manage');});
Route::get('/member_active',function(){ return view('admin.member_active');});
Route::get('/member_create',function(){ return view('admin.member_create');});
Route::get('/member_inactive',function(){ return view('admin.member_inactive');});
Route::get('/member_list',function(){ return view('admin.member_list');});

Route::get('/procur_book_assign',function(){ return view('admin.procur_book_assign');});
Route::get('/procur_book_list',function(){ return view('admin.procur_book_list');});
Route::get('/procur_book_view',function(){ return view('admin.procur_book_view');});
Route::get('/procur_complete_list',function(){ return view('admin.procur_complete_list');});
Route::get('/procur_pending_list',function(){ return view('admin.procur_pending_list');});
Route::get('/procur_reject_view',function(){ return view('admin.procur_reject_view');});


Route::get('/manage_complete_quote_list',function(){ return view('admin.manage_complete_quote_list');});
Route::get('/manage_pending_quote_list',function(){ return view('admin.manage_pending_quote_list');});
Route::get('/manage_quote_list',function(){ return view('admin.manage_quote_list');});
Route::get('/manage_rejected_quote_list',function(){ return view('admin.manage_rejected_quote_list');});
Route::get('/manage_view_quote_details',function(){ return view('admin.manage_view_quote_details');});

Route::get('/manage_book_list',function(){ return view('admin.manage_book_list');});
Route::get('/manage_active_book_list',function(){ return view('admin.manage_active_book_list');});
Route::get('/manage_inactive_book_list',function(){ return view('admin.manage_inactive_book_list');});


Route::get('/manage_completed_order_list',function(){ return view('admin.manage_completed_order_list');});
Route::get('/manage_pending_order_list',function(){ return view('admin.manage_pending_order_list');});
Route::get('/manage_rejected_order_list',function(){ return view('admin.manage_rejected_order_list');});
Route::get('/manage_order_list',function(){ return view('admin.manage_order_list');});
Route::get('/manage_view_order_details',function(){ return view('admin.manage_view_order_details');});

Route::get('/library_active_list',function(){ return view('admin.library_active_list');});
Route::get('/library_list',function(){ return view('admin.library_list');});
Route::get('/library_manage_create',function(){ return view('admin.library_manage_create');});
Route::get('/library_unactive_list',function(){ return view('admin.library_unactive_list');});
Route::get('/library_view',function(){ return view('admin.library_view');});


Route::get('/reviewer_all_user_payment',function(){ return view('admin.reviewer_all_user_payment');});
Route::get('/reviewer_view',function(){ return view('admin.reviewer_view');});
Route::get('/reviewer_widthra_request',function(){ return view('admin.reviewer_widthra_request');});
Route::get('/reviwer_profile',function(){ return view('admin.reviwer_profile');});
Route::get('/review_view_data',function(){ return view('admin.review_view_data');});



Route::get('/report_download_order',function(){ return view('admin.report_download_order');});
Route::get('/report_download_payment',function(){ return view('admin.report_download_payment');});
Route::get('/report_download_pub_revi',function(){ return view('admin.report_download_pub_revi');});
Route::get('/report_download_publisher',function(){ return view('admin.report_download_publisher');});
Route::get('/report_download_reviwer',function(){ return view('admin.report_download_reviwer');});
Route::get('/report_download',function(){ return view('admin.report_download');});


Route::get('/ticker_reply',function(){ return view('admin.ticker_reply');});
Route::get('/ticket_cleared',function(){ return view('admin.ticket_cleared');});
Route::get('/ticket_completed',function(){ return view('admin.ticket_completed');});
Route::get('/ticket_list',function(){ return view('admin.ticket_list');});
Route::get('/ticket_pending',function(){ return view('admin.ticket_pending');});
Route::get('/ticket_view',function(){ return view('admin.ticket_view');});
Route::get('/publisher_payment_list',function(){ return view('admin.publisher_payment_list');});
Route::get('/publisher_payment_cancel_list',function(){ return view('admin.publisher_payment_cancel_list');});
Route::get('/publisher_payment_pending_list',function(){ return view('admin.publisher_payment_pending_list');});
Route::get('/pub_payment_invoice',function(){ return view('admin.pub_payment_invoice');});
Route::get('/pub_payment_list',function(){ return view('admin.pub_payment_list');});
Route::get('/distributor_all_payment_list',function(){ return view('admin.distributor_all_payment_list');});
Route::get('/distributor_cencel_payment_list',function(){ return view('admin.distributor_cencel_payment_list');});
Route::get('/distributor_pending_payment_list',function(){ return view('admin.distributor_pending_payment_list');});
Route::get('/publisher_and_dis_all_payment_list',function(){ return view('admin.publisher_and_dis_all_payment_list');});
Route::get('/publisher_and_dis_cencel_payment_list',function(){ return view('admin.publisher_and_dis_cencel_payment_list');});
Route::get('/publisher_and_dis_pending_payment_list',function(){ return view('admin.publisher_and_dis_pending_payment_list');});
Route::get('/reviewer_all_user_payment',function(){ return view('admin.reviewer_all_user_payment');});
Route::get('/reviewer_cencelled_payment',function(){ return view('admin.reviewer_cencelled_payment');});
Route::get('/reviewer_pending_payment',function(){ return view('admin.reviewer_pending_payment');});
// Route::get('/editreviewer/{id}',function(){ return view('editreviewerrecord');});
Route::get('/editreviewer/{id}',[ReviewerController::class,'editreviewerrecord']);
Route::get('/editreviewer',function(){
    $data = Session::get('reviewer');
    if($data !==null){
        return view('admin.librarianreviewer_edit')->with("data",$data);
    }

});





Route::get('/sub_admin_forgot_password',function(){ return view('admin.sub_admin_forgot_password');});

Route::get('/mailurl',function(){ return view('admin.mailurl');});
Route::post('/mailurl',[SettingController::class,'mailurl']);


Route::get('/zone_name_add',function(){ return view('admin.zone_name_add');});
Route::get('/zone_name_edit',function(){ return view('admin.zone_name_edit');});
Route::get('/zone_name_list',function(){ return view('admin.zone_name_list');});
Route::get('/zone_name_view',function(){ return view('admin.zone_name_view');});
Route::get('/zone_type_add',function(){ return view('admin.zone_type_add');});
Route::get('/zone_type_edit',function(){ return view('admin.zone_type_edit');});
Route::get('/zone_type_list',function(){ return view('admin.zone_type_list');});
Route::get('/zone_view_all',function(){ return view('admin.zone_view_all');});
// subadmin
Route::get('/sub_admin_add',[SubadminController::class,'district']);
Route::post('/subadminadd',[SubadminController::class,'subadminadd']);
Route::get('/sub_admin_list',[SubadminController::class,'subadminlist']);
Route::get('/sub_admin_active',[SubadminController::class,'subadminactive']);
Route::get('/sub_admin_inactive',[SubadminController::class,'subadmininactive']);
Route::get('/sub_admin_view/{id}',[SubadminController::class,'subadminview']);
Route::put('/subadminstatus',[SubadminController::class,'subadminstatus']);
Route::post('/subadmineditdata',[SubadminController::class,'subadmineditdata']);
Route::get('/sub_admin_view',function(){
    $data = Session::get('subadmin');
    if($data !==null){
        return view('admin.sub_admin_view')->with("data",$data);
    }else{
        return back();
    }

});
Route::get('/sub_admin_edit/{id}',[SubadminController::class,'subadminedit']);
Route::get('/sub_admin_edit',function(){
    $data = Session::get('subadmin');
    if($data !==null){
        return view('admin.sub_admin_edit')->with("data",$data);
    }else{
        return back();
    }

});
// fair
Route::get('/fair_manage_add',[FairController::class,'district']);
Route::post('/fairmanageadd',[FairController::class,'fairmanageadd']);
Route::get('/fair_manage_list',[FairController::class,'fairmanagelist']);
Route::get('/fair_manage_view/{id}',[FairController::class,'fairmanageview']);
Route::get('/fair_manage_view',function(){
    $data = Session::get('event');
    if($data !==null){
        return view('admin.fair_manage_view')->with("data",$data);
    }else{
        return back();
    }

});
Route::get('/fair_manage_edit/{id}',[FairController::class,'fairmanageedit']);
Route::get('/fair_manage_edit',function(){
    $data = Session::get('event');
    if($data !==null){
        return view('admin.fair_manage_edit')->with("data",$data);
    }else{
        return back();
    }

});
Route::post('/fairupdate/{id}',[FairController::class,'fairupdate']);
Route::get('/fair_manage_delete/{id}',[FairController::class,'fairmanagedelete']);
Route::get('/fair_manage_current',[FairController::class,'fairmanagecurrent']);
Route::get('/fair_manage_previous',[FairController::class,'fairmanageprevious']);
Route::get('/fair_manage_upcomming',[FairController::class,'fairmanageupcomming']);
Route::get('/aplication_fair_list',[FairController::class,'aplicationfairlist']);
Route::get('/aplication_fair_view/{id}',[FairController::class,'aplicationfairview']);
Route::get('/aplication_fairview',function(){
  $data = Session::get('apply');
     if($data !==null){
         return view('admin.aplication_fair_view')->with("data",$data);
     }else{
         return back();
     }

 });
// publisherget
Route::get('/publisher_list',[PublisherController::class,'publisherget']);
Route::get('/publisher_active_list',[PublisherController::class,'publisheractive']);
Route::get('/publisher_inactive_list',[PublisherController::class,'publisherinactive']);
Route::get('/publisher_pending_list',[PublisherController::class,'publisherpending']);

Route::post('/publisherstatus',[PublisherController::class,'publisherstatus']);
Route::post('/publisherapprovestatus',[PublisherController::class,'approvestatus']);
Route::post('/publisherrejectstatus',[PublisherController::class,'rejectstatus']);
Route::get('/publisher_reject_list',[PublisherController::class,'publisherrejectlist']);

Route::get('/pub_profile/{id}',[PublisherController::class,'pubprofile']);
Route::get('/pubprofile',function(){
    $data = Session::get('publisher');
    if($data !==null){
        return view('admin.pub_profile')->with("data",$data);
    }else{
        return back();
    }

});
// distributorget
Route::get('/distributor_list',[DistributorController::class,'distributorget']);
Route::get('/distributor_active_list',[DistributorController::class,'distributoractive']);
Route::get('/distributor_inactive_list',[DistributorController::class,'distributorinactive']);
Route::get('/distributor_pending_list',[DistributorController::class,'distributorpending']);

Route::post('/distributorstatus',[DistributorController::class,'distributorstatus']);
Route::post('/distributorapprovestatus',[DistributorController::class,'approvestatus']);
Route::post('/distributorrejectstatus',[DistributorController::class,'rejectstatus']);
Route::get('/distributor_reject_list',[DistributorController::class,'distributorrejectlist']);


Route::get('/dist_profile/{id}',[DistributorController::class,'distprofile']);
Route::get('/distprofile',function(){
    $data = Session::get('distributor');
    if($data !==null){
        return view('admin.dist_profile')->with("data",$data);
    }else{
        return back();
    }

});
// pubdist

Route::get('/publisher_and_dis_list',[PublisherDistributorController::class,'pubdistget']);
Route::get('/publisher_and_dis_active_list',[PublisherDistributorController::class,'pubdistactive']);
Route::get('/publisher_and_dis_inactive_list',[PublisherDistributorController::class,'pubdistinactive']);
Route::get('/publisher_and_dis_pending_list',[PublisherDistributorController::class,'pubdistpending']);

Route::post('/pubdiststatus',[PublisherDistributorController::class,'pubdiststatus']);
Route::post('/approvestatus',[PublisherDistributorController::class,'approvestatus']);
Route::post('/rejectstatus',[PublisherDistributorController::class,'rejectstatus']);
Route::get('/publisher_and_dis_reject_list',[PublisherDistributorController::class,'pubdistrejectlist']);


Route::get('/publisherdisprofile/{id}',[PublisherDistributorController::class,'pubdistprofile']);
Route::get('/pubdistprofile',function(){
    $data = Session::get('pubdist');
    if($data !==null){
        return view('admin.publisher_and_dis_profile')->with("data",$data);
    }else{
        return back();
    }

});
// reviewer
Route::get('/reviewer_list',function(){ return view('admin.reviewer_list');});
Route::put('/reviewerstatus',[ReviewerController::class,'reviewerstatus']);
Route::put('/librarianstatus',[LibrarianController::class,'librarianstatus']);
Route::post('/editreviewer',[ReviewerController::class,'editreviewer']);
Route::post('/multiple-librarianstatus',[LibrarianController::class,'multiple_librarianstatus']);
Route::post('/multiple-reviewerstatus',[ReviewerController::class,'multiple_reviewerstatus']);
Route::get('/multimember_create',function(){ return view('admin.multimember_create');});
Route::post('/reviewer/import', [ReviewerController::class,'importFile']);
Route::get('/mailverificationcontent',function(){ return view('admin.mailverificationcontent');});


 Route::post('/addreviewer',[ReviewerController::class,'createreviewer']);
 Route::get('/memberview/{id}',[ReviewerController::class,'memberview']);
 Route::get('/reviewerdata',function(){
    $data = Session::get('reviewer');
    if($data !==null){
        return view('admin.member_view')->with("data",$data);
    }else{
        return back();
    }

 });

 Route::get('/libraryedit/{id}',[LibrarianController::class,'libraryedit']);
 Route::get('/librarydata',function(){
    $data = Session::get('librarian');
    if($data !==null){
        return view('admin.library_edit')->with("data",$data);
    }else{
        return back();
    }

 });
 Route::post('/librarianedit',[LibrarianController::class,'librarianedit']);
 Route::get('/member_publicedit/{id}',[ReviewerController::class,'reviewerpublic']);
 Route::get('/reviewerpublic',function(){
    $data = Session::get('reviewer');
    if($data !==null){
        return view('admin.member_publicedit')->with("data",$data);
    }else{
        return back();
    }

 });
 Route::post('/publicedit',[ReviewerController::class,'publicedit']);


 Route::get('/member_edit/{id}',[ReviewerController::class,'memberedit']);
 Route::get('/revieweredit',function(){
    $data = Session::get('reviewer');
    if($data !==null){
        return view('admin.member_edit')->with("data",$data);
    }else{
        return back();
    }

 });


//librarian
Route::post('/librarian',[LibrarianController::class,'createlibrarian']);
Route::get('/librarianview/{id}',[LibrarianController::class,'librarianview']);

Route::get('/librariandata',function(){
   $data = Session::get('librarian');
   if($data !==null){
       return view('admin.library_view')->with("data",$data);
   }else{
       return back();
   }

});

//smtp
Route::get('/smtp',[SettingController::class,'email']);
Route::post('/smtp',[SettingController::class,'emailUpdate']);
Route::post('/test-email',[SettingController::class,'testEmailSent']);
// dashboard
Route::get('/index',[dashboardController::class,'admindashboard']);
Route::post('/changepassword',[AdminController::class,'adminchangepassword']);

Route::get('/change_password',function(){ return view('admin.change_password');});
// feedback publisher
Route::get('/feedback_publisher_list',[FeedbackController::class,'feedbackpublisherlist']);
Route::get('/feedback_publisher/{id}',[FeedbackController::class,'feedbackpublisher']);
Route::get('/feedback_publisher',function(){
    $data = Session::get('feedback');
    if($data !==null){
        return view('admin.feedback_publisher')->with("data",$data);
    }else{
        return back();
    }

});
// feedback_distributor
Route::get('/feedback_distributor_list',[FeedbackController::class,'feedbackdistributorlist']);
Route::get('/feedback_distributor/{id}',[FeedbackController::class,'feedbackdistributor']);
Route::get('/feedback_distributor',function(){
    $data = Session::get('feedback');
    if($data !==null){
        return view('admin.feedback_distributor')->with("data",$data);
    }else{
        return back();
    }

});
// feedback_publisher_distributor
Route::get('/feedback_publisher_distributor_list',[FeedbackController::class,'feedbackpubdistlist']);
Route::get('/feedback_publisher_distributor/{id}',[FeedbackController::class,'feedbackpubdist']);
Route::get('/feedbackpubdist',function(){
    $data = Session::get('feedback');
    if($data !==null){
        return view('admin.feedback_publisher_distributor')->with("data",$data);
    }else{
        return back();
    }

});
Route::get('/feedbackdelete/{id}',[FeedbackController::class,'feedbackdelete']);
Route::get('/book_manage_all',[BookController::class,'bookmanageall']);
Route::get('/book_manage_view/{id}',[BookController::class,'bookmanageview']);
 Route::get('/bookmanageview',function(){
     $data = Session::get('book');
     if($data !==null){
         return view('admin.book_manage_view')->with("data",$data);
     }

 });
 Route::get('/user_view/{id}/{type}',[BookController::class,'user_view']);
 Route::get('/userview',function(){
    $data = Session::get('pub');
    if($data !==null){
        return view('admin.book_manage_view')->with("data",$data);
    }

});

 Route::get('/meta_book_list',[BookController::class,'meta_book_list']);
 Route::get('/meta_pending_book',[BookController::class,'meta_pending_book']);
 Route::get('/meta_book_complete',[BookController::class,'meta_book_complete']);
 Route::get('/meta_book_assign/{id}',[BookController::class,'meta_book_assign']);
 Route::get('/meta_book_assign/{id}',[BookController::class,'meta_book_assign'])->name('meta_book_assign.search');

 Route::get('/meta_book_assign',function(){
    $data = Session::get('data');
    if($data !==null){
        $book = $data->book;
        $lib = $data->lib;
        $type = $data->type;
        return view('admin.meta_book_assign',compact('book','lib','type'));
    }else{
        return back();
    }

});
 Route::get('/procur_book_list',[BookController::class,'procur_book_list']);
 Route::get('/procur_pending_list',[BookController::class,'procur_pending_list']);
 Route::get('/procur_complete_list',[BookController::class,'procur_complete_list']);
 Route::get('/procur_reject_view',[BookController::class,'procur_reject_view']);
//  Route::get('/procur_book_assign/{id}',[BookController::class,'procur_assign']);

//  Route::get('/procur_book_assign',function(){
//     $data = Session::get('data');
//     if($data !==null){
//         $book = $data->book;
//         $internal = $data->internal;
//         $external = $data->external;
//         $public = $data->public;
//         return view('admin.procur_book_assign',compact('book','internal','external','public'));
//     }else{
//         return back();
//     }

// });
Route::get('/procur_complete_view/{bookid}',[BookController::class,'reviewpost']);
Route::get('/procur_complete_view',function(){
    $data = Session::get('data');
    if($data !==null){
        $book = $data->book;
        $rev = $data->rev;

        return view('admin.procur_complete_view',compact('book','rev'));
    }else{
        return back();
    }

});
 Route::post('/assign/librarian',[BookController::class,'assignlibrarian']);
 Route::post('/assign/reviewer',[BookController::class,'assignreviewer']);

 Route::get('/anoncement',function(){ return view('admin.anoncement');});
 Route::post('/announcementsend',[notificationController::class,'announcementsend']);
 Route::get('/announcementsvirw',function(){

    $data = Session::get('Announce');
     if($data !==null){

         return view('admin.anouncemenview')->with("data",$data);
     }

 });
 Route::get('/paymentinvoice',function(){

   $data = Session::get('paymrnt');
     if($data !==null){

         return view('admin.payment_invoice')->with("data",$data);
     }

 });


 Route::get('/procurement_paymrnt',function(){ return view('admin.procurement_paymrnt');});

 Route::get('/',function(){ return view('admin.payment_invoice');});
 Route::get('/payment_invoice/{id}',[PaymentController::class,'payment_invoice']);


 Route::get('/announcements_virw/{id}',[notificationController::class,'announcements_virw']);


 Route::get('/anouncemenlist',function(){ return view('admin.anouncemenlist');});

 Route::get('/anouncemenview',function(){ return view('admin.anouncemenview');});
// budget
 Route::get('/budget',function(){ return view('admin.budget');});
 Route::post('/budgetadd',[BudgetController::class,'budgetadd']);
 Route::get('/budgetview/{id}',[BudgetController::class,'budgetview']);
 Route::get('/budget_view',function(){

   $data = Session::get('budget');
    if($data !==null){

        return view('admin.budgetview')->with("data",$data);
    }

});

 Route::get('/budgetlist',function(){ return view('admin.budgetlist');});
//  Route::get('/budgetview',function(){ return view('admin.budgetview');});
// categories
Route::get('/categories_add',function(){ return view('admin.categories_add');});
Route::get('/categories_list',function(){ return view('admin.categories_list');});
Route::post('/change-status',[CategorieController::class,'change_status']);

Route::post('/categoryedit',[CategorieController::class,'categoryedit']);

Route::post('/categoryadd',[CategorieController::class,'categoryadd']);
Route::get('/categories_edit/{id}',[CategorieController::class,'categories_edit']);
Route::get('/categoriesedit',function(){

    $data = Session::get('category');
     if($data !==null){

         return view('admin.categories_edit')->with("data",$data);
     }

 });
 Route::post('/categories_delete',[CategorieController::class,'categoriesdelete']);

 Route::get('/library_type_create',function(){ return view('admin.library_type_create');});
 Route::get('/library_type_list',function(){ return view('admin.library_type_list');});
 Route::post('/librarytypeadd',[LibraryTypeController::class,'librarytype']);
 Route::post('/librarystatuschange',[LibraryTypeController::class,'librarystatuschanges']);
 Route::get('/library_type_edit/{id}',[LibraryTypeController::class,'librarytypeedit']);
 Route::get('/librarytypeedit',function(){
     $data = Session::get('category');
      if($data !==null){

          return view('admin.library_type_edit')->with("data",$data);
      }

  });
  Route::post('/librarytypeedit',[LibraryTypeController::class,'librarytype_edit']);
  Route::post('/library_type_delete',[LibraryTypeController::class,'librarytypedelete']);


//   homecontent
Route::get('/homecontent',function(){ return view('admin.homecontent');});
  Route::post('/hidelins_title',[SettingController::class,'hidelins_title']);
  Route::post('/mailverification_title',[SettingController::class,'mailverification_title']);
//   homepageboookadd
Route::get('/homecontent',function(){ return view('admin.homecontent');});
  Route::post('/homepageboookadd',[SettingController::class,'homepageboookadd']);
  Route::post('/mailverification_title',[SettingController::class,'mailverification_title']);

  
//  loginecontent
Route::get('/logincontent',function(){ return view('admin.logincontent');});
  Route::post('/loginhidelins_title',[SettingController::class,'loginhidelins_title']);
//
Route::get('/forgotcontent',function(){ return view('admin.forgotcontent');});
  Route::post('/forgothidelins_title',[SettingController::class,'forgothidelins_title']);
  Route::get('/forgotpasswordcontent',function(){ return view('admin.forgotpasswordcontent');});
  Route::post('/forgotpasswordhidelins_title',[SettingController::class,'forgotpasswordhidelins_title']);
  Route::post('/bannerstatus',[SettingController::class,'bannerstatus']);
  
  Route::post('/book_banner_delete',[SettingController::class,'book_banner_delete']);

  Route::get('/banner_settingedit/{id}',[SettingController::class,'banner_settingedit']);
  Route::get('/bannerview',function(){
   $data = Session::get('banner');
    if($data !==null){
        return view('admin.banner_setting_edit')->with("data",$data);
    }

});
Route::post('/homepageboookedit',[SettingController::class,'homepageboookedit']);
// footer
Route::post('/footeradd',[SettingController::class,'footeradd']);
Route::post('/websitelogo',[SettingController::class,'websitelogo']);
Route::post('/thirukkuraladd',[SettingController::class,'thirukkuraladd']);
Route::post('/newsfeedadd',[SettingController::class,'newsfeedadd']);
Route::post('/thirukkuralstatus',[SettingController::class,'thirukkuralstatus']);
Route::post('/thirukkuraldelete',[SettingController::class,'thirukkuraldelete']);
Route::get('/usermanualguidelines',function(){ return view('admin.usermanualguidelines');});

Route::post('/manualguidelines',[SettingController::class,'manualguidelines']);


// feedback_librarian
Route::get('/feedback_librarian_list',[FeedbackController::class,'feedbacklibrarian']);
Route::get('/feedback_librarian/{id}',[FeedbackController::class,'feedback_librarian']);
Route::get('/feedbacklibrariant',function(){
    $data = Session::get('feedback');
    if($data !==null){
        return view('admin.feedback_librarian_edit')->with("data",$data);
    }else{
        return back();
    }

});

// feedback_reviewer
Route::get('/feedback_reviewer_list',[FeedbackController::class,'feedbackreviewer']);
Route::get('/feedback_reviewer_edit/{id}',[FeedbackController::class,'feedback_reviewer']);
Route::get('/feedbackreviewer',function(){
    $data = Session::get('feedback');
    if($data !==null){
        return view('admin.feedback_reviewer_edit')->with("data",$data);
    }else{
        return back();
    }

});
Route::get('/booksubject_add',function(){ return view('admin.booksubject_add');});
Route::post('/booksubjectadd',[LibraryTypeController::class,'booksubject']);
Route::get('/booksubject_list',function(){ return view('admin.booksubject_list');});
Route::post('/booksubject_statuschange',[LibraryTypeController::class,'booksubject_statuschange']);
Route::post('/booksubject_delete',[LibraryTypeController::class,'booksubject_delete']);

Route::get('/booksubject_edit/{id}',[LibraryTypeController::class,'booksubject_edit']);
Route::get('/Booksubjectedit',function(){
    $data = Session::get('Booksubject');
     if($data !==null){

         return view('admin.booksubject_edit')->with("data",$data);
     }

 });

 Route::post('/book_subject_edit',[LibraryTypeController::class,'book_subject_edit']);

 Route::get('/get-books/{id}',[BookController::class,'get_books']);

 Route::post('/bookassign-data',[BookController::class,'bookassign_data']);

//gsm

Route::get('/bookgsm_add',function(){ return view('admin.bookgsm_add');});
 Route::post('/bookgsmadd',[LibraryTypeController::class,'bookgsmadd']);
 Route::get('/bookgsm_list',function(){ return view('admin.bookgsm_list');});
Route::post('/bookgsm_statuschange',[LibraryTypeController::class,'bookgsm_statuschange']);
Route::post('/bookgsm_delete',[LibraryTypeController::class,'bookgsm_delete']);


 Route::get('/bookgsm-edit/{id}',[LibraryTypeController::class,'bookgsm_edit']);
Route::get('/Bookgsmdata',function(){
    $data = Session::get('Bookgsm');

    return view('admin.bookgsm_edit')->with("data",$data);


 });
 Route::post('/book_gsm_edit',[LibraryTypeController::class,'book_gsm_edit']);


//bookdimension

Route::get('/bookdimension_add',function(){ return view('admin.bookdimension_add');});
Route::post('/bookdimensionadd',[LibraryTypeController::class,'bookdimensionadd']);
Route::get('/bookdimension_list',function(){ return view('admin.bookdimension_list');});
Route::post('/dimension_statuschange',[LibraryTypeController::class,'dimension_statuschange']);
 Route::post('/book_dimension_delete',[LibraryTypeController::class,'book_dimension_delete']);


 Route::get('/bookdimension-edit/{id}',[LibraryTypeController::class,'bookdimension_edit']);
 Route::get('/bookdimensiondata',function(){
    $data = Session::get('Bookdimension');

    return view('admin.bookdimension_edit')->with("data",$data);


 });
  Route::post('/book_dimension_edit',[LibraryTypeController::class,'book_dimension_edit']);

//bookpapertype

Route::get('/slider_setting',function(){ return view('admin.slider_setting');});

Route::get('/slider_setting_list',function(){ return view('admin.slider_setting_list');});


Route::get('/bookpapertype_add',function(){ return view('admin.bookpapertype_add');});
Route::post('/bookpapertypeadd',[LibraryTypeController::class,'bookpapertypeadd']);
Route::get('/bookpapertype_list',function(){ return view('admin.bookpapertype_list');});
Route::post('/papertype_statuschange',[LibraryTypeController::class,'papertype_statuschange']);
 Route::post('/book_papertype_delete',[LibraryTypeController::class,'book_papertype_delete']);


 Route::get('/bookpapertype-edit/{id}',[LibraryTypeController::class,'bookpapertype_edit']);
 Route::get('/bookpapertypedata',function(){
    $data = Session::get('Bookpapertype');

    return view('admin.bookpapertype_edit')->with("data",$data);


 });
  Route::post('/book_papertype_edit',[LibraryTypeController::class,'book_papertype_edit']);

//bookpaperfinishing
Route::get('/bookpaperfinishing_add',function(){ return view('admin.bookpaperfinishing_add');});
Route::post('/bookpaperfinishingadd',[LibraryTypeController::class,'bookpaperfinishingadd']);
Route::get('/bookpaperfinishing_list',function(){ return view('admin.bookpaperfinishing_list');});
Route::post('/paperfinishing_statuschange',[LibraryTypeController::class,'paperfinishing_statuschange']);
 Route::post('/book_paperfinishing_delete',[LibraryTypeController::class,'book_paperfinishing_delete']);

 Route::get('/bookpaperfinishing-edit/{id}',[LibraryTypeController::class,'bookpaperfinishing_edit']);
 Route::get('/bookpaperfinishingdata',function(){
    $data = Session::get('Bookpaperfinishing');

    return view('admin.bookpaperfinishing_edit')->with("data",$data);


 });
  Route::post('/book_paperfinishing_edit',[LibraryTypeController::class,'book_paperfinishing_edit']);



//currencytype
Route::get('/currencytype_add',function(){ return view('admin.currencytype_add');});
Route::post('/currencytypeadd',[LibraryTypeController::class,'currencytypeadd']);
Route::get('/currencytype_list',function(){ return view('admin.currencytype_list');});
Route::post('/currencytype_statuschange',[LibraryTypeController::class,'currencytype_statuschange']);
 Route::post('/currencytype_delete',[LibraryTypeController::class,'currencytype_delete']);


 Route::get('/currencytype-edit/{id}',[LibraryTypeController::class,'currencytypeedit']);
 Route::get('/currencytypedata',function(){
    $data = Session::get('Currencytype');

    return view('admin.currencytype_edit')->with("data",$data);


 });
  Route::post('/currencytype_edit',[LibraryTypeController::class,'currencytype_edit']);



Route::get('/get-metabooks/{id}',[BookController::class,'metabooks']);

// negotiation
Route::post('/sendnegotiation',[BookController::class,'sendnegotiation']);
Route::post('/multisendnegotiation',[BookController::class,'multisendnegotiation']);
Route::get('/negotiation_process_list',function(){ return view('admin.negotiation_process_list');});
Route::get('/nego_approved_list',function(){ return view('admin.nego_approved_list');});
Route::get('/nego_failed_list',function(){ return view('admin.nego_failed_list');});
Route::get('/nego_pending_list',function(){ return view('admin.nego_pending_list');});
Route::get('/negotiation_list',function(){ return view('admin.negotiation_list');});
Route::post('/approvenegotiationstatus',[BookController::class,'approvenegotiationstatus']);
Route::post('/rejectnegotiationstatus',[BookController::class,'rejectnegotiationstatus']);
Route::get('/notification',function(){ return view('admin.notification');});

// book  manage
Route::put('/bookstatuschange',[BookController::class,'bookstatuschange']);
Route::get('/get-activebooks/{id}',[BookController::class,'get_activebooks']);
Route::post('/multiple-statuschangebook',[BookController::class,'multiple_statuschangebook']);
Route::get('/reviewerlist/{id}',[BookController::class,'reviewerlist']);
Route::get('/review',function(){
    $data = Session::get('reviewer');

    return view('admin.assign-user-list')->with("data",$data);
  
     
 });


Route::get('/assign-user-list',function(){ return view('admin.assign-user-list');});
    });
});
