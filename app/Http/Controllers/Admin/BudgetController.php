<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Budget;
class BudgetController extends Controller
{
    public function budgetadd(Request $req){
        $validator = Validator::make($req->all(),[
            'libraryType'=>'required|string',
            'subject'=>'required|string',
            'description'=>'required|string',
            'totalAmount'=>'required|string',
            'CategorieAmount'=>'required',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
    
      
       
    
      $count = 0;
    foreach ($req->CategorieAmount as $category) {
    $count += $category['amount'];
    }

       if($count  == $req->totalAmount  ){
        $budget = new Budget();
        $budget->libraryType = $req->libraryType;
        $budget->subject = $req->subject;
        $budget->description = $req->description;
        $budget->totalAmount = $req->totalAmount;
        $budget->CategorieAmount = json_encode($req->CategorieAmount); 
        $budget->save();
        
        $data= [
            'success' => 'Budget Create Successfully',
                 ];
        return response()->json($data);  
       }else{
        $data= [
            'error' => 'Total amount and categories total amount are mismatch',
                 ];
        return response()->json($data);  
       }
       
    }    
          
    public function budgetview($id){
       $budget = Budget::find($id);
        $budget->CategorieAmount1= json_decode($budget->CategorieAmount); 
         \Session::put('budget', $budget);
        return redirect('admin/budget_view');
    }
    
    
}
