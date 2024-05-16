<?php

namespace App\Http\Controllers\Subadmin;

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
    public function payment_invoice($id){
        $paymrnt = Procurementpaymrnt::find($id);
        $record = json_decode($paymrnt->bookId);
        $data1 = [];
        foreach ($record as $item) {
            $book = Book::find($item);
            $object = [
                "bookname" => $book->book_title,
                "booknum" => $book->product_code
            ];
            array_push($data1, $object);
        }
        $paymrnt['bookdata'] = $data1; 
    
        \Session::put('paymrnt', $paymrnt);
        return redirect('sub_admin/paymentinvoice');   
        
    }
    
    public function payment_periodical_invoice($id){
        $paymrnt = Procurementpaymrnt::find($id);
        $record = json_decode($paymrnt->bookId);
        $data1 = [];
        foreach ($record as $item) {
            $periodical = Magazine::find($item);
            $object = [
                "periodicalname" => $periodical->title,
                'periodical'  =>$periodical->periodicity
            ];
            array_push($data1, $object);
        }
        $paymrnt['periodical'] = $data1; 
    
        \Session::put('paymrnt', $paymrnt);
        return redirect('sub_admin/periodical_paymentinvoice');   
        
    }
    
}
