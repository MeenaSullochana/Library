<?php

namespace App\Http\Controllers\PublisherAndDistributor;
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
    public function pubdistdashboard(){

       $allpubdist=PublisherDistributor::all();
      
       return view('publisher_and_distributor.index',compact('allpubdist')
       );
}
}

