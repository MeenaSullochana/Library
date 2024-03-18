<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subadmin\FairController;
use App\Http\Controllers\Subadmin\Auth\LoginController;
use App\Http\Controllers\Subadmin\TicketController;
use App\Http\Controllers\Subadmin\PublisherController;
use App\Http\Controllers\Subadmin\DistributorController;
use App\Http\Controllers\Subadmin\dashboardController;
use App\Http\Controllers\Subadmin\SubadminController;
use App\Http\Controllers\Subadmin\PublisherDistributorController;

Route::middleware(['subadmin'])->group(function () {
Route::prefix('sub_admin')->group(function () {
   
    // Route::get('/aplication_fair_view',function(){return view('sub_admin.aplication_fair_view');});

    Route::get('/activitymonitor',function(){return view('sub_admin.activitymonitor');});
    Route::get('/application_approved',function(){return view('sub_admin.application_approved');});
    Route::get('/application_list',function(){return view('sub_admin.application_list');});
    Route::get('/application_rejected',function(){return view('sub_admin.application_rejected');});
    Route::get('/application_view',function(){return view('sub_admin.application_view');});
    Route::get('/dist_application_approve_view',function(){return view('sub_admin.dist_application_approve_view');});
    Route::get('/dist_application_approved_list',function(){return view('sub_admin.dist_application_approved_list');});
    Route::get('/dist_application_list',function(){return view('sub_admin.dist_application_list');});
    Route::get('/dist_application_rejected_list',function(){return view('sub_admin.dist_application_rejected_list');});
    Route::get('/dist_application_rejected_view',function(){return view('sub_admin.dist_application_rejected_view');});
   
    Route::get('/dist_pub_application_approve_list',function(){return view('sub_admin.dist_pub_application_approve_list');});
    Route::get('/dist_pub_application_approve_view',function(){return view('sub_admin.dist_pub_application_approve_view');});
    Route::get('/dist_pub_application_list',function(){return view('sub_admin.dist_pub_application_list');});
    Route::get('/dist_pub_application_rejecte_list',function(){return view('sub_admin.dist_pub_application_rejecte_list');});
    Route::get('/dist_pub_application_rejecte_view',function(){return view('sub_admin.dist_pub_application_rejecte_view');});
    Route::get('/dist_pub_application_view',function(){return view('sub_admin.dist_pub_application_view');});
    Route::get('/district_add',function(){return view('sub_admin.district_add');});
    Route::get('/district_edit',function(){return view('sub_admin.district_edit');});
    Route::get('/district_list',function(){return view('sub_admin.district_list');});

    Route::get('/feedback_distributor_list',function(){return view('sub_admin.feedback_distributor_list');});
    Route::get('/feedback_distributor',function(){return view('sub_admin.feedback_distributor');});
    Route::get('/feedback_pub_dist_view',function(){return view('sub_admin.feedback_pub_dist_view');});
    Route::get('/feedback_public_list',function(){return view('sub_admin.feedback_public_list');});
    Route::get('/feedback_public_view',function(){return view('sub_admin.feedback_public_view');});
    Route::get('/feedback_publisher_distributor_list',function(){ return view('sub_admin.feedback_publisher_distributor_list');});
    Route::get('/feedback_publisher_list',function(){ return view('sub_admin.feedback_publisher_list');});
    Route::get('/feedback_publisher',function(){ return view('sub_admin.feedback_publisher');});
 
  
    Route::get('/navigation',function(){ return view('sub_admin.navigation');});
    //fair
    Route::get('/fair_manage_add',[FairController::class,'district']);
    Route::post('/fairmanageadd',[FairController::class,'fairmanageadd']);
    Route::get('/fair_manage_list',[FairController::class,'fairmanagelist']);
    Route::get('/fair_manage_view/{id}',[FairController::class,'fairmanageview']);
    Route::get('/fair_manage_view',function(){
        $data = Session::get('event');
        if($data !==null){
            return view('sub_admin.fair_manage_view')->with("data",$data);
        }else{
            return back();
        } 
    });
    Route::get('/fair_manage_edit/{id}',[FairController::class,'fairmanageedit']);
    Route::get('/fair_manage_edit',function(){
        $data = Session::get('event');
        if($data !==null){
            return view('sub_admin.fair_manage_edit')->with("data",$data);
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
    Route::get('/aplication_fair_view',function(){
       $data = Session::get('apply');
         if($data !==null){
             return view('sub_admin.aplication_fair_view')->with("data",$data);
         }else{
             return back();
         }
         
     });
    
    //ticket

    Route::get('/ticket_list',[TicketController::class,'ticketlist']);
    Route::get('/ticket_chat/{id}',[TicketController::class,'ticketchat']);
    Route::post('/chatmessage/{id}',[TicketController::class,'chatmessage']);
    
    Route::get('/ticket_chat',function(){
      $data = Session::get('ticdata');
       if($data !==null){
           return view('sub_admin.ticket_chat')->with("data",$data);
       }else{
           return back();
       }
       
   });
    
   Route::get('/ticket_view/{id}',[TicketController::class,'ticketview']);
   Route::get('/ticket_view',function(){
      $data = Session::get('ticket');
   
        if($data !==null){
            return view('sub_admin.ticket_view')->with("data",$data);
        }else{
            return back();
        }
        
    });
    Route::get('/ticket_completed',[TicketController::class,'ticketcompleted']);
    Route::get('/ticket_pending',[TicketController::class,'ticketpending']);
    Route::get('/ticketdelete/{id}',[TicketController::class,'ticketdelete']);
    Route::get('/changestatus/{id}',[TicketController::class,'changestatus']);

// publisherget
Route::get('/publisher_list',[PublisherController::class,'publisherget']);
Route::get('/publisher_active_list',[PublisherController::class,'publisheractive']);
Route::get('/publisher_inactive_list',[PublisherController::class,'publisherinactive']);
Route::get('/publisher_pending_list',[PublisherController::class,'publisherpending']);

Route::post('/publisherstatus',[PublisherController::class,'publisherstatus']);
Route::post('/approvestatus',[PublisherController::class,'approvestatus']);
Route::post('/rejectstatus',[PublisherController::class,'rejectstatus']);
Route::get('/publisher_reject_list',[PublisherController::class,'publisherrejectlist']);

Route::get('/pub_profile/{id}',[PublisherController::class,'pubprofile']);
Route::get('/pubprofile',function(){
    $data = Session::get('publisher');
    if($data !==null){
        return view('sub_admin.pub_profile')->with("data",$data);
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
Route::post('/approvestatus',[DistributorController::class,'approvestatus']);
Route::post('/rejectstatus',[DistributorController::class,'rejectstatus']);
Route::get('/distributor_reject_list',[DistributorController::class,'distributorrejectlist']);


Route::get('/dist_profile/{id}',[DistributorController::class,'distprofile']);
Route::get('/distprofile',function(){
    $data = Session::get('distributor');
    if($data !==null){
        return view('sub_admin.dist_profile')->with("data",$data);
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
        return view('sub_admin.publisher_and_dis_profile')->with("data",$data);
    }else{
        return back();
    }
    
});
Route::get('/index',[dashboardController::class,'subadmindashboard']);
Route::post('/changepassword',[SubadminController::class,'subadminchangepassword']);

Route::get('/change_password',function(){ return view('sub_admin.change_password');});


    });
    
});