<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Budget;
use App\Models\Magazine;
use App\Models\MagazinePeriodicity;
use App\Models\Subscription;
use App\Models\Dispatch;

class SubscriptionController extends Controller
{
   public function subscription(){
       $magazine = Magazine::all();
       $periodicity = MagazinePeriodicity::where('status',1)->get();
       $currentDate = Carbon::now();
       $endDate = $currentDate->copy()->addMonths(12);
       $daysDifference = $endDate->diffInDays($currentDate);
       foreach($periodicity as $key=>$val){
            foreach($magazine as $key=>$val1){
                if($val->name == $val1->periodicity){
                    $subscription = new Subscription();
                    $subscription->magazine_id = $val1->id;
                    $subscription->issue_date = $currentDate;
                    $subscription->end_date = $endDate;
                    $subscription->periodicity = $val->name;
                    $subscription->created_by = auth('admin')->user()->id;
                    $subscription->status = 0;
                    $subscription->save();

                    $freq = $val->frequency;
                    $res = $daysDifference / $freq;
                    if($res >= 30){

                        $data = $res/30;
                      while ($currentDate->lt($endDate)) {
                      
                                $monthlyDates[] = $currentDate->copy();
                                $currentDate->addMonths($data);

                            }
                            
                            foreach ($monthlyDates as $date) {
                                $dispatch = new Dispatch();
                                $dispatch->magazine_id = $val1->id;
                                $dispatch->subscription_id = $subscription->id;
                                $dispatch->expected_date = $date->toDateString();
                                $dispatch->library_id = "[]";
                                $dispatch->order_id = "[]";
                                $dispatch->received_id = "[]";
                                $dispatch->pending_id = "[]";
                                $dispatch->not_received_id = "[]";
                                $dispatch->status=0;
                                $dispatch->save();
                            }

                    } else{
                        $currentDate1 = Carbon::now();
                        $endDate1= $currentDate1->copy()->addMonths(12);
                        while ($currentDate1->lt($endDate1)) {
                         
                            $dates[] = $currentDate1->copy(); 
                          
                            $currentDate1->addDays($res); 
                        }
                        foreach ($dates as $date1) {
                            $dispatch = new Dispatch();
                            $dispatch->magazine_id = $val1->id;
                            $dispatch->subscription_id = $subscription->id;
                            $dispatch->expected_date = $date1->toDateString();
                            $dispatch->order_id = "[]";
                            $dispatch->library_id = "[]";
                            $dispatch->received_id = "[]";
                            $dispatch->pending_id = "[]";
                            $dispatch->not_received_id = "[]";
                            $dispatch->status=0;
                            $dispatch->save();
                        }
                    }
                }
            }
       }
    return redirect('/admin/index');
}
}