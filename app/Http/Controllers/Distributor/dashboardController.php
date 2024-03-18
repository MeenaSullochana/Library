<?php

namespace App\Http\Controllers\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
class dashboardController extends Controller
{
    public function distdashboard(){

       $alldist=Distributor::all();
      
       return view('distributor.index',compact('alldist')
       );
}
}

