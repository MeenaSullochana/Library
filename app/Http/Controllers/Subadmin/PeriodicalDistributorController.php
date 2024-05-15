<?php

namespace App\Http\Controllers\Subadmin;
use App\Http\Controllers\Controller;
use App\Models\PeriodicalDistributor;

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
use File;
class PeriodicalDistributorController extends Controller
{
    
   
    public function periodical_distributor_view($id){
        $PeriodicalDistributor=PeriodicalDistributor::find($id);
        \Session::put('PeriodicalDistributor', $PeriodicalDistributor);
      
          return redirect('sub_admin/distriputor_profileview'); 
    
    }
    
   
             
 
       
    }
