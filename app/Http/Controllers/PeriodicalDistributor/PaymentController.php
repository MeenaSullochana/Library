<?php

namespace App\Http\Controllers\PeriodicalDistributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\Notifications;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\Librarian;
use App\Models\Procurementpaymrnt;
use App\Models\Book;
use App\Models\Magazine;



class PaymentController extends Controller
{
    public function payment_recept($id){
        $paymrnt = Procurementpaymrnt::find($id);
        $record = json_decode($paymrnt->bookId);
        $data1 = [];
        foreach ($record as $item) {
            $magazine = Magazine::find($item);
            $object = [
                "name" => $magazine->title,
                "rni" => $magazine->rni_details
            ];
            array_push($data1, $object);
        }
        $paymrnt['magazinedata'] = $data1; 
    
        \Session::put('paymrnt', $paymrnt);
        return redirect('periodical_distributor/paymentreceipt');   
        
    }
    
}
