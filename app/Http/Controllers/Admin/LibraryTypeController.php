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
use App\Models\MagazineCategory;
use App\Models\MagazinePeriodicity;
use App\Models\Uniqueauthor;
use  DB;
use App\Models\Periodicalgsm;


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
            'language'=>'required|string',

            
           
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
             $Booksubject->type=$req->language;

             
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
            'language'=>'required|string',

            
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
             $Booksubject->type=$req->language;

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



// MagazineCategory


    public function magazinecategoryadd(Request $req){
    
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'language'=>'required|string',

            'status'=>'required|string',
            
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $MagazineCategory= New MagazineCategory();
             $MagazineCategory->name=$req->name;
             $MagazineCategory->language=$req->language;

             $MagazineCategory->status=$req->status;
             $MagazineCategory->save();
             $data= [
                'success' => 'Magazine Category  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    
    public function  magazinecategory_statuschange(Request $req){
     
        $MagazineCategory=MagazineCategory::find($req->id);
        $MagazineCategory->status=$req->status;
        $MagazineCategory->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    


    public function magazinecategoryedit($id){
       
        $MagazineCategory=MagazineCategory::find($id);
      
          \Session::put('MagazineCategory', $MagazineCategory);
          return redirect('admin/MagazineCategorydata');
      }
      


      public function magazinecategory_edit(Request $req){
   
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',

            'language'=>'required|string',
            'status'=>'required|string',


        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $MagazineCategory=MagazineCategory::find($req->id);
             $MagazineCategory->name=$req->name;
             $MagazineCategory->language=$req->language;

             $MagazineCategory->status=$req->status;
             $MagazineCategory->save();
             $data= [
                'success' => 'Magazine Category Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function magazinecategory_delete(Request $req){
        $MagazineCategory=MagazineCategory::find($req->id);
        $MagazineCategory->delete();
        $data= [
            'success' => 'Magazine Category delete Successfully',
                 ];
        return response()->json($data);  
    }
    // MagazinePeriodicity
   public function magazineperiodicityadd(Request $req){
    
        $validator = Validator::make($req->all(),[
            'name'=>'required|string',
            'frequency'=>'required|string',
            'status'=>'required|string',
            
           
        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
      
      
             $MagazinePeriodicity= New MagazinePeriodicity();
             $MagazinePeriodicity->name=$req->name;
             $MagazinePeriodicity->frequency=$req->frequency;
             $MagazinePeriodicity->status=$req->status;
             $MagazinePeriodicity->save();
             $data= [
                'success' => 'Magazine Periodicity  Create Successfully',
                     ];
            return response()->json($data);  
    
    }
    
    public function  magazineperiodicity_statuschange(Request $req){
     
        $MagazinePeriodicity=MagazinePeriodicity::find($req->id);
        $MagazinePeriodicity->status=$req->status;
        $MagazinePeriodicity->save();
        $data= [
            'success' => 'Status Change  Successfully',
                 ];
        return response()->json($data);  
    }
    


    public function magazineperiodicityedit($id){
       
        $MagazinePeriodicity=MagazinePeriodicity::find($id);
      
          \Session::put('MagazinePeriodicity', $MagazinePeriodicity);
          return redirect('admin/MagazinePeriodicitydata');
      }
      


      public function magazineperiodicity_edit(Request $req){
    
        $validator = Validator::make($req->all(),[
            'status'=>'required|string',
            'name'=>'required|string',
            'frequency'=>'required|string'
           

        ]);
        if($validator->fails()){
            $data= [
                'error' => $validator->errors()->first(),
                     ];
            return response()->json($data);  
           
        }
       
             $MagazinePeriodicity=MagazinePeriodicity::find($req->id);
             $MagazinePeriodicity->name=$req->name;
             $MagazinePeriodicity->frequency=$req->frequency;
             $MagazinePeriodicity->status=$req->status;
             $MagazinePeriodicity->save();
             $data= [
                'success' => 'Magazine Periodicity Update Successfully',
                     ];
            return response()->json($data);  
           
          
      
    
    }
    public function magazineperiodicity_delete(Request $req){
        $MagazinePeriodicity=MagazinePeriodicity::find($req->id);
        $MagazinePeriodicity->delete();
        $data= [
            'success' => 'Magazine Periodicity delete Successfully',
                 ];
        return response()->json($data);  
    }


  // Uniqueauthor
  public function uniqueauthoradd(Request $req){
    
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
  
    
         $Uniqueauthor= New Uniqueauthor();
         $Uniqueauthor->name=$req->name;
         $randomCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
       $Uniqueauthor->authorid =       $randomCode ;



         $Uniqueauthor->status=$req->status;
         $Uniqueauthor->save();
         $data= [
            'success' => 'Uniqueauthor  Create Successfully',
                 ];
        return response()->json($data);  

}

public function  uniqueauthor_statuschange(Request $req){
 
    $Uniqueauthor=Uniqueauthor::find($req->id);
    $Uniqueauthor->status=$req->status;
    $Uniqueauthor->save();
    $data= [
        'success' => 'Status Change  Successfully',
             ];
    return response()->json($data);  
}



public function uniqueauthoredit($id){
   
    $Uniqueauthor=Uniqueauthor::find($id);
  
      \Session::put('Uniqueauthor', $Uniqueauthor);
      return redirect('admin/Uniqueauthordata');
  }
  


  public function uniqueauthor_edit(Request $req){

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
   
         $Uniqueauthor=Uniqueauthor::find($req->id);
         $Uniqueauthor->name=$req->name;
         $Uniqueauthor->status=$req->status;
         $Uniqueauthor->save();
         $data= [
            'success' => 'Uniqueauthor Update Successfully',
                 ];
        return response()->json($data);  
       
      
  

}


public function authorupload(Request $req){



    // // Validate the file
    // $validator = Validator::make($req->all(), [
    //     'authorfile' => 'required|mimes:csv|max:10240',
    // ]);
    
    // // If validation fails, return the first error
    // if ($validator->fails()) {
    //     $data = [
    //         'error' => $validator->errors()->first(),
    //     ];
    //     return response()->json($data);
    // }
    
    try {
    
        // Check for file upload
        if (!$req->hasFile('authorfile')) {
            return redirect()->back()->with('errorlib', 'No file uploaded');
        }

        $file = $req->file('authorfile');
        $fileContents = file($file->getPathname());
 
        
        // Skip the first line (headers)
        unset($fileContents[0]);

        // Batch processing setup
        $batchSize = 100;  // Suitable for handling 10,000 rows
        $chunks = array_chunk($fileContents, $batchSize);

        foreach ($chunks as $chunk) {
         
            // Arrays to track data for processing
            $authorfiles = [];
          

            // Prepare list of product codes to check existence once
            foreach ($chunk as $line) {
                $data = str_getcsv($line);
              
                 $authorfile = $data[0];
         
                if (empty($authorfile)) {
                    continue;
                }

                // Check if product code is already processed, if yes, mark as duplicate
                if (in_array($authorfile, $authorfiles)) {
                    $authorfiles[] = $authorfile;
                    continue;
                }

                $authorfiles[] = $authorfile;
                $randomCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
           
                $authorToUpdate[] = [
                    'name' => $authorfile,
                    'authorid' => $randomCode,
                    'status' => "1",

                ];
                
            }
           
            DB::beginTransaction();
       
            try {
                foreach ($authorToUpdate as $author) {

                  
                     $Uniqueauthor = Uniqueauthor::where('name', '=', $author['name'])->first();
                         
                     if (!$Uniqueauthor) {
                         
                        $Uniqueauthor= New Uniqueauthor();
                        $Uniqueauthor->name=$author['name'];
                        $Uniqueauthor->authorid =   $author['authorid']  ;
                        $Uniqueauthor->status=$author['status'];
                  
                        $Uniqueauthor->save();
                       }else{
                        continue;
                       }

                      

                 
                }

                DB::commit();  // Commit the transaction
            } catch (\Exception $e) {
                \Log::error('Error: ' . $e->getMessage(), ['exception' => $e]);

    
                return redirect()->back()->with('error', $e->getMessage());

                DB::rollBack();  // Rollback on error
                throw $e;
            }
        }
         
        // Successful upload
        return redirect()->back()->with('success', 'File Uploded successfully');
    } catch (\Throwable $e) {
    
        // Log the exception
        \Log::error('Error importing book prices: ', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', $e->getMessage());
    }
    
}

  // periodicalgsm
  public function periodicalgsmadd(Request $req){
    
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
  
   
    for ($i = 40; $i <= 160; $i++) {
        $Periodicalgsm = new Periodicalgsm();
        $Periodicalgsm->name = $i . " " ." GSM"; // Optionally append the loop index to the name
        $Periodicalgsm->status = $req->status;
        $Periodicalgsm->save();
    }
    
    $data = [
        'success' => 'Periodicalgsm Created Successfully 150 times',
    ];
    
    return response()->json($data);
    


        //  $Periodicalgsm= New Periodicalgsm();
        //  $Periodicalgsm->name=$req->name;
        //  $Periodicalgsm->status=$req->status;
        //  $Periodicalgsm->save();
        //  $data= [
        //     'success' => 'Periodicalgsm  Create Successfully',
        //          ];
        // return response()->json($data);  

}

public function  periodicalgsm_statuschange(Request $req){
 
    $Periodicalgsm=Periodicalgsm::find($req->id);
    $Periodicalgsm->status=$req->status;
    $Periodicalgsm->save();
    $data= [
        'success' => 'Status Change  Successfully',
             ];
    return response()->json($data);  
}



public function periodicalgsmedit($id){
   
    $Periodicalgsm=Periodicalgsm::find($id);
  
      \Session::put('Periodicalgsm', $Periodicalgsm);
      return redirect('admin/periodicalgsmdata');
  }
  


  public function periodicalgsm_edit(Request $req){

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
   
         $Periodicalgsm=Periodicalgsm::find($req->id);
         $Periodicalgsm->name=$req->name;
         $Periodicalgsm->status=$req->status;
         $Periodicalgsm->save();
         $data= [
            'success' => 'Periodicalgsm Update Successfully',
                 ];
        return response()->json($data);  
       
      
  

}
}


