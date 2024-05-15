<?php

namespace App\Http\Controllers\Subadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use App\Models\Ticket;
use App\Models\Publisher;
use App\Models\Distributor;
use Illuminate\Support\Facades\Hash;
use App\Models\PeriodicalPublisher;
use App\Models\Magazine;
use App\Models\PeriodicalDistributor;



use File;
class PeriodicalPublisherController extends Controller
{
    

    public function periodical_publisher_view($id){
         $PeriodicalPublisher=PeriodicalPublisher::find($id);
         \Session::put('PeriodicalPublisher', $PeriodicalPublisher);
       
           return redirect('sub_admin/publisher_profileview'); 

    }

    
     
    public function periodical_manage($id){
        $Magazine=Magazine::where('user_id',$id)->get();
        \Session::put('Magazine', $Magazine);
      
          return redirect('sub_admin/periodical_manageview'); 

   } 
       
   public function periodical_manage_view($id){
    $Magazines=Magazine::find($id);
    \Session::put('Magazines', $Magazines);
  
      return redirect('sub_admin/periodical_manageviews'); 

} 
   


    }
