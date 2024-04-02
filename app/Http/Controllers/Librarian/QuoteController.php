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
        $lines = explode(';', $budget->description);

    // Prepare the text for display in a list format
    $formattedText = '<ul style="font-family: Arial, sans-serif;">';
    foreach ($lines as $line) {
        $formattedText .= '<li>' . trim($line) . '</li>'; // Trim whitespace from each line
    }
    $formattedText .= '</ul>';
        $budget->CategorieAmount1= json_decode($budget->CategorieAmount); 
        $budget->admindata=$Admin;
         \Session::put('budget', $budget);
         \Session::put('desc', $formattedText);
        return redirect('librarian/orderschemeread');


       
       
     }
}
