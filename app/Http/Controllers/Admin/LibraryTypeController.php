<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\LibraryType;
use App\Models\Booksubject;
use App\Models\Bookgsm;
use App\Models\Bookdimension;
use App\Models\Bookpapertype;
use App\Models\Bookpaperfinishing;
use App\Models\Currencytype;



class LibraryTypeController extends Controller
{
    public function librarytype(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
      
             $libraryType= New LibraryType();
             $libraryType->name=$req->name;
             $libraryType->status=$req->status;
             $libraryType->save();
             $data= [
                'success' => 'libraryType  Create Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function  librarystatuschanges(Request $req){
   
        $libraryType=LibraryType::find($req->id);
        $libraryType->status=$req->status;
        $libraryType->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    public function  librarytypeedit($id){
   
        $category=LibraryType::find($id);
        \Session::put('category', $category);
        return redirect('admin/librarytypeedit');
    }
    
    public function librarytype_edit(Request $req){
      
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $libraryType=LibraryType::find($req->id);
             $libraryType->name=$req->name;
             $libraryType->status=$req->status;
             $libraryType->save();
             $data= [
                'success' => 'libraryType  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function  librarytypedelete(Request $req){
        $libraryType=LibraryType::find($req->id);
        $libraryType->delete();
        $data= [
            'success' => 'libraryType delete Successfully',
                 ];
        return response()->json($data);  
    }
    
    public function booksubject(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Booksubject= New Booksubject();
             $Booksubject->name=$req->name;
             $Booksubject->status=$req->status;
             $Booksubject->save();
             $data= [
                'success' => 'Booksubject  Create Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }

    public function  booksubject_statuschange(Request $req){
   
        $Booksubject=Booksubject::find($req->id);
        $Booksubject->status=$req->status;
        $Booksubject->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    public function  booksubject_delete(Request $req){
        $Booksubject=Booksubject::find($req->id);
        $Booksubject->delete();
        $data= [
            'success' => 'booksubject delete Successfully',
                 ];
        return response()->json($data);  
    }

    public function  booksubject_edit($id){
   
      $Booksubject=Booksubject::find($id);
        \Session::put('Booksubject', $Booksubject);
        return redirect('admin/Booksubjectedit');
    }


    public function book_subject_edit(Request $req){
      
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Booksubject=Booksubject::find($req->id);
             $Booksubject->name=$req->name;
             $Booksubject->status=$req->status;
             $Booksubject->save();
             $data= [
                'success' => 'Book subject  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function bookgsmadd(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Bookgsm= New Bookgsm();
             $Bookgsm->name=$req->name;
             $Bookgsm->status=$req->status;
             $Bookgsm->save();
             $data= [
                'success' => 'Book Gsm  Create Successfully',
                     ];
            return response()->json($data);  
    
    }

    public function  bookgsm_statuschange(Request $req){
   
        $Bookgsm=Bookgsm::find($req->id);
        $Bookgsm->status=$req->status;
        $Bookgsm->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    public function  bookgsm_edit($id){
       
        $Bookgsm=Bookgsm::find($id);
      
          \Session::put('Bookgsm', $Bookgsm);
          return redirect('admin/Bookgsmdata');
      }

      public function book_gsm_edit(Request $req){
      
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Bookgsm=Bookgsm::find($req->id);
             $Bookgsm->name=$req->name;
             $Bookgsm->status=$req->status;
             $Bookgsm->save();
             $data= [
                'success' => 'Book Gsm  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }


    public function  bookgsm_delete(Request $req){
        $Bookgsm=Bookgsm::find($req->id);
        $Bookgsm->delete();
        $data= [
            'success' => 'Book Gsm delete Successfully',
                 ];
        return response()->json($data);  
    }
    public function bookdimensionadd(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Bookdimension= New Bookdimension();
             $Bookdimension->name=$req->name;
             $Bookdimension->status=$req->status;
             $Bookdimension->save();
             $data= [
                'success' => 'Book dimension  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    public function  dimension_statuschange(Request $req){
     
        $Bookdimension=Bookdimension::find($req->id);
        $Bookdimension->status=$req->status;
        $Bookdimension->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }

    public function  bookdimension_edit($id){
       
        $Bookdimension=Bookdimension::find($id);
      
          \Session::put('Bookdimension', $Bookdimension);
          return redirect('admin/bookdimensiondata');
      }
      


      public function book_dimension_edit(Request $req){
    
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Bookdimension=Bookdimension::find($req->id);
             $Bookdimension->name=$req->name;
             $Bookdimension->status=$req->status;
             $Bookdimension->save();
             $data= [
                'success' => 'Book Dimension  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }


    public function book_dimension_delete(Request $req){
        $Bookdimension=Bookdimension::find($req->id);
        $Bookdimension->delete();
        $data= [
            'success' => 'Book Dimension delete Successfully',
                 ];
        return response()->json($data);  
    }

    public function bookpapertypeadd(Request $req){
     
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Bookpapertype= New Bookpapertype();
             $Bookpapertype->name=$req->name;
             $Bookpapertype->status=$req->status;
             $Bookpapertype->save();
             $data= [
                'success' => 'Book Papertype  Create Successfully',
                     ];
            return response()->json($data);  
    
    }

    public function  papertype_statuschange(Request $req){
     
        $Bookpapertype=Bookpapertype::find($req->id);
        $Bookpapertype->status=$req->status;
        $Bookpapertype->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }

    public function  bookpapertype_edit($id){
       
        $Bookpapertype=Bookpapertype::find($id);
      
          \Session::put('Bookpapertype', $Bookpapertype);
          return redirect('admin/bookpapertypedata');
      }
      


      public function book_papertype_edit(Request $req){
    
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Bookpapertype=Bookpapertype::find($req->id);
             $Bookpapertype->name=$req->name;
             $Bookpapertype->status=$req->status;
             $Bookpapertype->save();
             $data= [
                'success' => 'Book papertype  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }

    public function book_papertype_delete(Request $req){
        $Bookpapertype=Bookpapertype::find($req->id);
        $Bookpapertype->delete();
        $data= [
            'success' => 'Book  Papertypen delete Successfully',
                 ];
        return response()->json($data);  
    }
 
    
    public function bookpaperfinishingadd(Request $req){
    
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Bookpaperfinishing= New Bookpaperfinishing();
             $Bookpaperfinishing->name=$req->name;
             $Bookpaperfinishing->status=$req->status;
             $Bookpaperfinishing->save();
             $data= [
                'success' => 'Book Paperfinishing  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    

    public function  paperfinishing_statuschange(Request $req){
     
        $Bookpaperfinishing=Bookpaperfinishing::find($req->id);
        $Bookpaperfinishing->status=$req->status;
        $Bookpaperfinishing->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }


    public function  bookpaperfinishing_edit($id){
       
        $Bookpaperfinishing=Bookpaperfinishing::find($id);
      
          \Session::put('Bookpaperfinishing', $Bookpaperfinishing);
          return redirect('admin/bookpaperfinishingdata');
      }
      


      public function book_paperfinishing_edit(Request $req){
    
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Bookpaperfinishing=Bookpaperfinishing::find($req->id);
             $Bookpaperfinishing->name=$req->name;
             $Bookpaperfinishing->status=$req->status;
             $Bookpaperfinishing->save();
             $data= [
                'success' => 'Book Paperfinishing  Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }

    public function book_paperfinishing_delete(Request $req){
        $Bookpaperfinishing=Bookpaperfinishing::find($req->id);
        $Bookpaperfinishing->delete();
        $data= [
            'success' => 'Book paperfinishing delete Successfully',
                 ];
        return response()->json($data);  
    }
 

    

    public function currencytypeadd(Request $req){
    
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'status'=>'required|string',
          
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $Currencytype= New Currencytype();
             $Currencytype->name=$req->name;
             $Currencytype->status=$req->status;
             $Currencytype->save();
             $data= [
                'success' => 'Book Currencytype  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    
    public function  currencytype_statuschange(Request $req){
     
        $Currencytype=Currencytype::find($req->id);
        $Currencytype->status=$req->status;
        $Currencytype->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    


    public function  currencytypeedit($id){
       
        $Currencytype=Currencytype::find($id);
      
          \Session::put('Currencytype', $Currencytype);
          return redirect('admin/currencytypedata');
      }
      


      public function currencytype_edit(Request $req){
    
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $Currencytype=Currencytype::find($req->id);
             $Currencytype->name=$req->name;
             $Currencytype->status=$req->status;
             $Currencytype->save();
             $data= [
                'success' => 'Currencytype Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function currencytype_delete(Request $req){
        $Currencytype=Currencytype::find($req->id);
        $Currencytype->delete();
        $data= [
            'success' => 'Currencytype delete Successfully',
                 ];
        return response()->json($data);  
    }

    
}


