<?php

namespace App\Http\Controllers\Librarian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Budget;



class QuoteController extends Controller
{
    public function orderschemeread($id){

       
        $Admin = Admin::first();
        $budget = Budget::find($id);
        $budget->CategorieAmount1= json_decode($budget->CategorieAmount); 
        $budget->admindata=$Admin;
         \Session::put('budget', $budget);
        return redirect('librarian/orderschemeread');


       
       
     }
}
