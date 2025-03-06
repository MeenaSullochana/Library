<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Budget;
use App\Models\Notifications;
use App\Models\Budgetrestriction;


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
         if($req->type == "magazinebudget"){
            foreach ($req->CategorieAmount as $category) {
                $count += $category['amount'];
                }
         }else{
            foreach ($req->CategorieAmount as $category) {
                $count += $category['tamilAmount'];
                $count += $category['englishAmount'];
                }
         }
     
  


       if($count  == $req->totalAmount  ){
        $budget = new Budget();
        $budget->libraryType = $req->libraryType;
        $budget->subject = $req->subject;
        $budget->description = $req->description;
        $budget->totalAmount = $req->totalAmount;
        $budget->purchaseid = "[]";
        $budget->type = $req->type;
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
    public function magazinebudget_view($id){
        $budget = Budget::find($id);
        $lines = explode(';', $budget->description);

        // Prepare the text for display in a list format
        $formattedText = '<ul style="font-family: Arial, sans-serif;">';
        foreach ($lines as $line) {
            $formattedText .= '<li>' . trim($line) . '</li>'; // Trim whitespace from each line
        }
        $formattedText .= '</ul>';
         $budget->CategorieAmount1= json_decode($budget->CategorieAmount); 
          \Session::put('budget', $budget);
          \Session::put('desc', $formattedText);
         return redirect('admin/magazinebudgetview');
     }

     
     public function budeget_restriction(Request $req){
        $validator = Validator::make($req->all(),[
            'vendor'=>'required|min:1|max:2',
            'publication'=>'required|min:1|max:2',
            'author'=>'required|min:1|max:2',
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
    
        $Budgetrestriction1 =  Budgetrestriction::first();

        
       if( $Budgetrestriction1){
     

        $Budgetrestriction1->vendor = $req->vendor;
        $Budgetrestriction1->publication = $req->publication;
        $Budgetrestriction1->author = $req->author;
 
        $Budgetrestriction1->save();

        $data= [
            'success' => 'Updated Successfully',
                 ];
        return response()->json($data);  
       }else{
        $Budgetrestriction = new Budgetrestriction();

        $Budgetrestriction->vendor = $req->vendor;
        $Budgetrestriction->publication = $req->publication;
        $Budgetrestriction->author = $req->author;
 
        $Budgetrestriction->save();

        $data= [
            'success' => 'Create Successfully',
                 ];
        return response()->json($data);  
       }
      
       
       
    }    
}
