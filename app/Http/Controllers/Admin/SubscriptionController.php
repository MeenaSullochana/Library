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
    public function subscription()
    {
        $magazine = Magazine::all();
        $periodicity = MagazinePeriodicity::where('status', 1)->get();
       
        $arr =[];
        foreach ($periodicity as $key => $val) {
            foreach ($magazine as $key => $val1) {
                $currentDate = Carbon::now()->subday(32);
                $endDate = $currentDate->copy()->addMonths(12);
                $daysDifference = $endDate->diffInDays($currentDate);
                 if($val->name == $val1->periodicity ){
                    $subscription = new Subscription();
                    $subscription->magazine_id = $val1->id;
                    $subscription->issue_date = $currentDate->toDateString();
                    $subscription->end_date = $endDate->toDateString();
                    $subscription->periodicity = $val->name;
                    $subscription->created_by = auth('admin')->user()->id;
                    $subscription->status = 0;
                    $subscription->save();

                    $freq = $val->frequency;
                    $res = $daysDifference / $freq;
                    if ($res >= 30) {
                        $arrdate = [];
                        $data = $res / 30;
                        while ($currentDate->lt($endDate)) {

                            $monthlyDates[] = $currentDate->copy();
                            $currentDate->addMonths($data);
                        }
                        foreach ($monthlyDates as $date) {
                            // array_push($arrdate, $date->toDateString());
                            $dispatch = new Dispatch();
                            $dispatch->magazine_id = $val1->id;
                            $dispatch->magazine_name = $val1->title;
                            $dispatch->periodicity = $val->name;
                            $dispatch->subscription_id = $subscription->id;
                            $dispatch->expected_date = $date->toDateString();
                            $dispatch->library_id = "[]";
                            $dispatch->order_id = "[]";
                            $dispatch->received_id = "[]";
                            $dispatch->pending_id = "[]";
                            $dispatch->not_received_id = "[]";
                            $dispatch->status = 0;
                            $dispatch->save();
                        }
                        $count = count($monthlyDates);
                        $subscription->frequency = $count;
                        $subscription->save();
                        // $obj = (Object)[
                        //     'currentdate'=>$currentDate,
                        //     "name" => $val->name,
                        //     "date" => $arrdate,
                        //     'res'=>$res,
                        //     'data'=>$data
                        // ];
                        // array_push($arr, $obj);
                        $monthlyDates=[];
                    } else {
                        $currentDate1 = Carbon::now()->subday(32);
                        $endDate1 = $currentDate1->copy()->addMonths(12);
                        $arrdate1=[];
                        while ($currentDate1->lt($endDate1)) {

                            $dates[] = $currentDate1->copy();

                            $currentDate1->addDays($res);
                        }
                      
                        foreach ($dates as $date1) {
                            // array_push($arrdate1, $date1->toDateString());
                            $dispatch = new Dispatch();
                            $dispatch->magazine_id = $val1->id;
                            $dispatch->magazine_name = $val1->title;
                            $dispatch->periodicity = $val->name;
                            $dispatch->subscription_id = $subscription->id;
                            $dispatch->expected_date = $date1->toDateString();
                            $dispatch->order_id = "[]";
                            $dispatch->library_id = "[]";
                            $dispatch->received_id = "[]";
                            $dispatch->pending_id = "[]";
                            $dispatch->not_received_id = "[]";
                            $dispatch->status = 0;
                            $dispatch->save();
                        }
                        $count = count($dates);
                        $subscription->frequency = $count;
                        $subscription->save();
                        // $obj1 = (Object)[
                        //     'currentdate'=>$currentDate,
                        //     "name" => $val->name,
                        //     "date" => $arrdate1,
                        //     'res'=>$res
                        // ];
                        // array_push($arr, $obj1);
                        $dates=[];
                    }
                }
            }
        }
    
        return redirect('/admin/index');
    }
}
