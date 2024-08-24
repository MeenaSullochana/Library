<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Librarian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\District;
use App\Models\HidelinsTitle;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Subadmin;
use Illuminate\Support\Collection;
use App\Models\Ticket;
use App\Models\Distributor;
use msztorc\LaravelEnv\Env;
use App\Mail\SmtpTestEmail;
use App\Models\Loginhidelins;
use App\Models\Fogothidelins;
use App\Models\Mailconfirmtitle;
use App\Models\Homepagebooks;
use App\Models\Ordermagazine;
use App\Models\MagazineCategory;
use App\Models\Dispatch;
use App\Models\Subscription;
use App\Models\Magazine;

use File;
use Illuminate\Support\Str;
use App\Models\Homefooter;
use App\Models\Homebanner;
use App\Models\Fogotpasswordhidelins;
use App\Models\Reviewerbatch;
use App\Models\Mailurl;
use App\Models\Thirukkural;
use App\Models\Newsfeed;
use App\Models\Manualguidelines;
use TCPDF; 
use PDF;
use App\Models\Publisher;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PublisherDistributor;
use App\Models\Librarian;


class SettingController extends Controller
{

  public function report_downl_order()
  {
  $maga= Ordermagazine::where('status', '=', '1')
    ->orderBy('created_at', 'asc')
    ->get();
      
      $librariandata = [];
      $serialNumber = 1;
      foreach ($maga as $val1) {
       $Magazine =Librarian::find($val1->librarianid);
         if($Magazine->dlo_id == auth('librarian')->user()->librarianId){

             
          $librariandata[] = [
              'S.No' => $serialNumber++,

              'Library Code' => $val1->libraryid,
              'Type of Library' => $val1->libraryType,
              'Library Name' => $Magazine->libraryName,
              'District' => $Magazine->district,
              'Contact Number' => $Magazine->phoneNumber,
              'OrderId' => $val1->orderid,

              'Quantity' => $val1->quantity,
              'Total Amount' => round($val1->totalBudget),
              'Purchased Amount' => round($val1->totalPurchased),
              'Balance Amount' => round($val1->totalBal),
              'Order Status' => 'Submitted',
              'Order Date' => \Carbon\Carbon::parse($val1->created_at)->format('Y-m-d'),
              'Percentage of Utilization' => ($val1->totalPurchased /  $val1->totalBudget)  *100 ,

                
          ];
      }
    }

 
      $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Library Id,Type Of Library,Library Name,District,Contact Number,OrderId,Quantity,Total Amount,Purchased Amount,Balance Amount,Order Status,Order Date,Percentage of Utilization(%)\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) . "\"\n";
      }
  
      $headers = [
          'Content-Type' => 'text/csv; charset=utf-8',
          'Content-Disposition' => 'attachment; filename="Order_report.csv"',
      ];
  
      return response()->make($csvContent, 200, $headers);
  }
  public function magazineorder_down(Request $request){
  

     if($request->librarytype !=null){
       
      $orders1 = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();
      $orders=[];
  
      foreach ($orders1 as $val) {

          $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
         if( $Librarian->isNotEmpty()){
          array_push($orders,$val);
         }
          
      }

     }
    else if($request->librarytype ==null ){

       
        $orders1 = Ordermagazine::where('status', '=', '1')->get();
        $orders=[];
  
        foreach ($orders1 as $val) {

            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
           if( $Librarian->isNotEmpty()){
            array_push($orders,$val);
           }
            
        }

     }
      
    
    $magazineCounts = [];
    
    foreach ($orders as $order) {
        $magazineProducts = json_decode($order->magazineProduct, true);
    
        foreach ($magazineProducts as $magazineProduct) {
            $magazineId = $magazineProduct['magazineid'];
    
            if (!isset($magazineCounts[$magazineId])) {
                $magazineCounts[$magazineId] = [
                    'id' => $magazineId,
                    'count' => 0
                ];
            }
    
            $magazineCounts[$magazineId]['count']++;
        }
    }
    
    $magazineCounts = array_values($magazineCounts);
  
    $magazinedata = [];
    foreach ($magazineCounts as $val) {
         if($request->category !=null &&  $request->language ==null ){
            $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->first();

         }
       else if($request->category ==null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('language', '=', $request->language)->first();

       }
      else if($request->category !=null &&  $request->language !=null){
        $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->where('language', '=', $request->language)->first();

       }else{
        $magazine = Magazine::find($val['id']);

       }
        if ($magazine) {
            $magazine->count = $val['count'];
            $magazinedata[] = $magazine;
        }
    }
    $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();

    $datas=[];
      foreach($magazinebudget  as $val1){
     foreach($magazinedata  as $val){
      if($val1->name == $val->category){
      
          array_push($datas,$val);
      }
     
  
     }
    }
    $totalAmount = 0;
    $finaldata = [];
    $serialNumber = 1;
    foreach ($datas as $val1) {
        $finaldata[] = [
            'S.No' => $serialNumber++,
            'Language' => $val1->language,
            'Category' => $val1->category,
            'Title of the Magazine' => $val1->title,
            'Periodicity' => $val1->periodicity,
            'Type of Library' => $request->librarytype ?? "All",
            'District' =>  auth('librarian')->user()->district,
            'No.of Subscription' => $val1->count,
            'Cover Price' =>$val1->single_issue_rate,
            'Annual Subscription' =>$val1->annual_subscription,
            'Discount' => $val1->discount,
            'Single Issue After Discount'=>$val1->single_issue_after_discount,
            'Annual Subscription After Discount'=>$val1->annual_cost_after_discount,
            'RNI Details'=>$val1->rni_details,
            'Total No.of Pages'=>$val1->total_pages,
            'Total No.of Multicolour Pages'=>$val1->total_multicolour_pages,
            'Total No.of Monocolour Pages'=>$val1->total_monocolour_pages,
            'Paper Quality'=>$val1->paper_qualitity,
            'Size of Magazine' =>$val1->magazine_size,
            'Contact Person'=>$val1->contact_person,
            'Phone'=>$val1->phone,
            'Email'=>$val1->email,
            'Address'=>$val1->address,
         

              
        ];
        $totalAmount =$totalAmount + $val1->count * $val1->annual_cost_after_discount ;
    }
    
    $finaldata[] = [
        'S.No' => '',
        'Language' =>'',
        'Category' => '',
        'Title of the Magazine' =>'',
        'Periodicity' => '',
        'Type of Library' => '',
        'District' => '',
        'No.of Subscription' => '',
        'Cover Price' =>'',
        'Annual Subscription' =>'',
        'Discount' => '',
        'Single Issue After Discount'=>'',
        'Annual Subscription After Discount'=>'',
        'RNI Details'=>'',
        'Total No.of Pages'=>'',
        'Total No.of Multicolour Pages'=>'',
        'Total No.of Monocolour Pages'=>'',
        'Paper Quality'=>'',
        'Size of Magazine' =>'',
        'Contact Person'=>'',
        'Phone'=>'',
        'Email'=>'',
        'Address'=>'',
       
    ];
    $finaldata[] = [
        'Total Amount' => '',
      
        'Language' =>'',
        'Category' => '',
        'Title of the Magazine' =>'',
        'Periodicity' => '',
        'Type of Library' => '',
        'District' => '',
        'No.of Subscription' => '',
        'Cover Price' =>'',
        'Annual Subscription' =>'',
        'Discount' => '',
        'Single Issue After Discount'=>'',
        'Annual Subscription After Discount'=>'',
        'RNI Details'=>'',
        'Total No.of Pages'=>'',
        'Total No.of Multicolour Pages'=>'',
        'Total No.of Monocolour Pages'=>'',
        'Paper Quality'=>'',
        'Size of Magazine' =>'',
        'Contact Person'=>'',
        'Phone'=>'',
        'Email'=>'Total Amount:',
        'Address'=>round($totalAmount),
       
    ];
//  return $finaldata;
    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
    $csvContent .=  "S.No,Language,Category,Title of the Magazine,Periodicity,Type of Library,District,No.of Subscription,Cover Price,Annual Subscription,Discount,Single Issue After Discount,Annual Subscription After Discount,RNI Details,Total No.of Pages,Total No.of Multicolour Pages,Total No.of Monocolour Pages,Paper Quality,Size of Magazine,Contact Person,Phone,Email,Address\n"; 
    foreach ($finaldata as $data) {
        $csvContent .= '"' . implode('","', $data) . "\"\n";
    }

    $headers = [
        'Content-Type' => 'text/csv; charset=utf-8',
        'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
    ];

    return response()->make($csvContent, 200, $headers);


  }   
  public function magazine_order_list(Request $request){


    if($request->librarytype !=null){
       
        $orders1 = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();
        $orders=[];
    
        foreach ($orders1 as $val) {
  
            $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
           if( $Librarian->isNotEmpty()){
            array_push($orders,$val);
           }
            
        }
  
       }
      else if($request->librarytype ==null ){
  
         
          $orders1 = Ordermagazine::where('status', '=', '1')->get();
          $orders=[];
    
          foreach ($orders1 as $val) {
  
              $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
             if( $Librarian->isNotEmpty()){
              array_push($orders,$val);
             }
              
          }
  
       }
        
      
      $magazineCounts = [];
      
      foreach ($orders as $order) {
          $magazineProducts = json_decode($order->magazineProduct, true);
      
          foreach ($magazineProducts as $magazineProduct) {
              $magazineId = $magazineProduct['magazineid'];
      
              if (!isset($magazineCounts[$magazineId])) {
                  $magazineCounts[$magazineId] = [
                      'id' => $magazineId,
                      'count' => 0
                  ];
              }
      
              $magazineCounts[$magazineId]['count']++;
          }
      }
      
      $magazineCounts = array_values($magazineCounts);
    
      $magazinedata = [];
      foreach ($magazineCounts as $val) {
           if($request->category !=null &&  $request->language ==null ){
              $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->first();
  
           }
         else if($request->category ==null &&  $request->language !=null){
          $magazine = Magazine::where('id', '=', $val['id'])->where('language', '=', $request->language)->first();
  
         }
        else if($request->category !=null &&  $request->language !=null){
          $magazine = Magazine::where('id', '=', $val['id'])->where('category', '=', $request->category)->where('language', '=', $request->language)->first();
  
         }else{
          $magazine = Magazine::find($val['id']);
  
         }
          if ($magazine) {
              $magazine->count = $val['count'];
              $magazinedata[] = $magazine;
          }
      }
    
      $magazinebudget = MagazineCategory::orderBy('created_at', 'asc')->get();
      $totalAmount =0;
      $datas=[];
        foreach($magazinebudget  as $val1){
       foreach($magazinedata  as $val){
        if($val1->name == $val->category){
            $totalAmount =$totalAmount + $val->count * $val->annual_cost_after_discount ;
            $val->librarytype=$request->librarytype;
            array_push($datas,$val);
        }
       
    
       }
      }

   
    return view('librarian/magazine_order_list', compact('datas','totalAmount'));
    }

  public function report_downl_not_order()
  {
        $maga= Ordermagazine::where('status', '=', '1')
            ->orderBy('created_at', 'asc')
            ->get();
       
              $Librarian = Librarian::where('status', '=', '1')
             ->where('allow_status', '=', '1')
             ->where('dlo_id', '=', auth('librarian')->user()->librarianId)
             ->orderBy('created_at', 'asc')
             ->get();
             $count =count($Librarian);


            $firstArray = collect($maga);
              $secondArray = collect($Librarian);
             
              $secondNames = $firstArray->pluck('librarianid')->toArray(); 
              $firstNames= $secondArray->pluck('id')->toArray();
          
            $uniqueNames = collect($firstNames)->filter(function ($name) use ($secondNames) {
                 return !in_array($name, $secondNames);
             })->toArray();
            
      $librariandata = [];
      $serialNumber = 1;
      $count = 0;
      foreach ($uniqueNames as $val1) {
       $Librarian =Librarian::find($val1);
          $librariandata[] = [
              'S.No' => $serialNumber++,
              'Library Code' => $Librarian->librarianId,
              'Type of Library' => $Librarian->libraryType,
              'Library Name' => $Librarian->libraryName,
              'Librarian Name' => $Librarian->libraryName,
              'Contact Number' => $Librarian->phoneNumber,
              'District' => $Librarian->district,
             
                
          ];
          $count=$count + 1;
      }
      $librariandata[] = [
        'Total Amount' => '',
        'Library Code' => '',
        'Type of Library' => '',
        'Library Name' => '',
        'Librarian Name' => '',
        'Contact Number' => 'Total Amount:',
        'District' => $count,
       
       
          
    ];
  
      $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
      $csvContent .= "S.No,Library Id,Type Of Library,Library Name,Librarian Name,Contact Number,District\n"; 
      foreach ($librariandata as $data) {
          $csvContent .= '"' . implode('","', $data) . "\"\n";
      }
  
      $headers = [
          'Content-Type' => 'text/csv; charset=utf-8',
          'Content-Disposition' => 'attachment; filename="non-orderers_report.csv"',
      ];
  
      return response()->make($csvContent, 200, $headers);
  }


 
  public function recordr()
  {
    return   $maga = Ordermagazine::whereIn('librarianId', function ($query) {
        $query->select('librarianId')
            ->from('ordermagazines')
            ->where('status', '=', '1')
            ->groupBy('librarianId')
            ->havingRaw('COUNT(*) > 1');
    })
    ->orderBy('created_at', 'asc')
    ->get();

               $data=[];
            foreach ($maga as $val) {
           $maga1 = json_decode($val->magazineProduct);
                $count=0;
                foreach ($maga1 as $val1) {
                    $price = (float) $val1->magazine_price;
                    $quantity = (float) $val1->quantity;
                    
                  
                    $count += $price * $quantity;

                }
                return [floatval($count),floatval($val->totalPurchased)];

                if(floatval($count) != floatval($val->totalPurchased)){
                    return "hi";
                    $obj = (object)[
                        "library id" => $val->librarianid,
                        "order id" => $val->orderid,
                        "type of library" => $val->libraryType,
                        "purchase amount" => $val->totalPurchased,
                        "quantity amount" => $count

                    ];
                   array_push($data,$obj);
                }
            }
            return $data;



  }
  


  public function magazineorder_down_NON(Request $request){
  
      $orders = Ordermagazine::where('status', '=', '1')->get();
      $magazineCounts = [];
   
   foreach ($orders as $order) {
     return  $magazineProducts = json_decode($order->balanceAmount, true);
   
       foreach ($magazineProducts as $magazineProduct) {
        
   
        //    if ( $magazineProduct->budget_price   ) {
        //        $magazineCounts[$magazineId] = [
             
        //        ];
        //    }
   
       
       }
   }
   
   return  $magazineCounts = array_values($magazineCounts);

//    return $magazine = Magazine::where('status', '=', '1')->get('id');
//     foreach ($magazine as $val) {
//         foreach ($magazineCounts as $val1) {
        //    if($val->id   == $val1-> id)
           

       }
 
       public function magazine_district_order(Request $request){
        if($request->librarytype !=null){
       
            $orders1 = Ordermagazine::where('libraryType', '=', $request->librarytype)->where('status', '=', '1')->get();
            $orders=[];
        
            foreach ($orders1 as $val) {
      
                $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
               if( $Librarian->isNotEmpty()){
                array_push($orders,$val);
               }
                
            }
      
           }
          else if($request->librarytype ==null ){
      
             
              $orders1 = Ordermagazine::where('status', '=', '1')->get();
              $orders=[];
        
              foreach ($orders1 as $val) {
      
                  $Librarian=Librarian::where('id', '=', $val->librarianid)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get();
                 if( $Librarian->isNotEmpty()){
                  array_push($orders,$val);
                 }
                  
              }
      
           }
            
                 
        
               $magazineCounts = [];
        
               foreach ($orders as $order) {
                  $magazineProducts = json_decode($order->magazineProduct, true);
               
                   foreach ($magazineProducts as $magazineProduct) {
                       $magazineId = $magazineProduct['magazineid'];
               
                       if ($magazineId == $request->title) {
                        $magazine = Magazine::find($request->title);
                     $Librarian =Librarian::find($order->librarianid);
        
                     
                      $librarianAdressString = ($Librarian->door_no ?? "") . ' ' . $Librarian->street . ' ' . $Librarian->place . ' ' . $Librarian->Village . ' ' . $Librarian->post . ' ' . $Librarian->taluk . ' ' . $Librarian->district . ' ' . $Librarian->pincode . ' ' . $Librarian->landmark;
                      
                      $obj = (object)[
                          'title' => $magazine->title,
                          'contactperson' => $magazine->contact_person,
                          'phone' => $magazine->phone,
                          'email' => $magazine->email,
                          'address' => $magazine->address,
                          'librarytype' => $Librarian->libraryType,
                          'libraryid' => $Librarian->librarianId,
                          'libraryname' => $Librarian->libraryName,
                          'district' => $Librarian->district,
                          'librarianadress' => $librarianAdressString,
                          'librarianName' => $Librarian->librarianName,
                          'librarianphone' => $Librarian->phoneNumber,
                          'librariandes' => $Librarian->librarianDesignation,
                          'librarianadress' => $librarianAdressString,
                      ];
                      
                    
                    array_push($magazineCounts, $obj);
                    
               
                      
                }
               }
            }
            //    $magazineCounts = array_values($magazineCounts);
             
               
               $total = 0;
               $finaldata = [];
               $serialNumber = 1;
               foreach ($magazineCounts as $val1) {
                   $finaldata[] = [
                       'S.No' => $serialNumber++,
                       'Title of the Magazine' => $val1->title,
                       'Contact Person'=> $val1->contactperson,
                       'Phone'=> $val1->phone,
                       'Email'=> $val1->email,
                       'Address'=> $val1->address,
                       'Type of Library' => $val1->librarytype,
                       'Library Code' => $val1->libraryid,
                       'Library Name' => $val1->libraryname,
                       'District' => $val1->district,
                       'Librarian Name' => $val1->librarianName,
                       'Librarian Phone Number' => $val1->librarianphone,
                       'Librarian Designation' => $val1->librariandes,
                       'Library Address' => $val1->librarianadress,
                   ];
                   $total = $total +1;
               }
              
        
               $finaldata[] = [
                'S.No' =>"",
                       'Title of the Magazine' => "",
                       'Contact Person'=> "",
                       'Phone'=> "",
                       'Email'=> "",
                       'Address'=> "",
                       'Type of Library' => "",
                       'Library Code' => "",
                       'Library Name' => "",
                       'District' =>"",
                       'Librarian Name' => "",
                       'Librarian Phone Number' => "",
                       'Librarian Designation' => "",
                       'Library Address' => "",
                  
               ];
               $finaldata[] = [
                   'Total Amount' => '',
                   'Title of the Magazine' => "",
                   'Contact Person'=> "",
                   'Phone'=> "",
                   'Email'=> "",
                   'Address'=> "",
                   'Type of Library' => "",
                   'Library Code' => "",
                   'Library Name' => "",
                   'District' =>"",
                   'Librarian Name' => "",
                   'Librarian Phone Number' => "",
                   'Librarian Designation' => "",
                   'Library Address' => $total,
                  
               ];
           //  return $finaldata;
               $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
               $csvContent .=  "S.No,Title of the Magazine,Contact Person,Phone,Email,Address,Type of Library,Library Code,Library Name,District,Librarian Name,Librarian Phone Number,Librarian Designation,Library Address\n"; 
               foreach ($finaldata as $data) {
                   $csvContent .= '"' . implode('","', $data) . "\"\n";
               }
           
               $headers = [
                   'Content-Type' => 'text/csv; charset=utf-8',
                   'Content-Disposition' => 'attachment; filename="MagazineOrderReport.csv"',
               ];
           
               return response()->make($csvContent, 200, $headers);
           
           
             }   



             public function Dispatch_libraryreport(Request $req) {
   
                if ($req->monthyear !== null && $req->monthyear1 !== null) {
                    $query = Dispatch::query();
            
                    if ($req->Frequency !== null) {
                        $query->where('periodicity', $req->Frequency);
                    }
                    if ($req->id !== null) {
                       
                        $query->where('magazine_id', $req->id);
                    }
                    $startDate = new \DateTime($req->monthyear);
                    $endDate = new \DateTime($req->monthyear1);
                    
                    $startDate->modify('first day of this month');
                    
                    $endDate->modify('last day of this month');
                    
                    $startDateFormatted = $startDate->format('Y-m-d');
                    $endDateFormatted = $endDate->format('Y-m-d');
                    // $startDate = new \DateTime($req->monthyear);
                    // $endDate = new \DateTime($req->monthyear1);
                    // $startDateFormatted = $startDate->format('Y-m-d');
                    //  $endDateFormatted = $endDate->format('Y-m-d');
                    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);
            
                    $query->orderBy('magazine_name', 'Desc');
                    $query->orderBy('expected_date', 'asc');
                    $dispatches = $query->get();
            
                    if ($dispatches->isEmpty()) {
                        return back()->with('error', "No Record Found");
                    }
            
                    // Collect all library IDs from dispatches
                    $libraryIds = [];
                    foreach ($dispatches as $dispatch) {
                        $libraryIds = array_merge($libraryIds, json_decode($dispatch->library_id, true));
                    }
                    $libraryIds = array_unique($libraryIds);
            
                    // Fetch all librarians in a single query
                    // $librarians = Librarian::whereIn('id', $libraryIds)->get()->keyBy('id');
                  $librarians = Librarian::whereIn('id', $libraryIds)->where('dlo_id', '=', auth('librarian')->user()->librarianId)->get()->keyBy('id');

                    $data = [];
                    foreach ($dispatches as $dispatch) {
                        $libraryIds = json_decode($dispatch->library_id, true);
                        $receivedIds = json_decode($dispatch->received_id, true);
                        $notReceivedIds = json_decode($dispatch->not_received_id, true);
            
                        foreach ($libraryIds as $libraryId) {
                            if (!isset($librarians[$libraryId])) {
                                continue;
                            }
                            $librarian = $librarians[$libraryId];
            
                            $received = in_array($libraryId, $receivedIds) ? 1 : 0;
                            $notReceived = in_array($libraryId, $notReceivedIds) ? 1 : 0;
            
                            if ($req->librarytype != null && $req->librarytype != $librarian->libraryType) {
                                continue;
                            }
            
                            $data[$libraryId]['library_name'] = $librarian->libraryName;
                                            $data[$libraryId]['library_id'] = $librarian->librarianId;
                                            $data[$libraryId]['library_district'] = $librarian->district;
                                            $data[$libraryId]['library_type'] = $librarian->libraryType;
                                            $magazine1 = Magazine::find( $dispatch->magazine_id);
                                           
                                           $data[$libraryId]['dispatches'][] = [
                                                'magazine_name' => $dispatch->magazine_name,
                                                'periodicity' => $dispatch->periodicity,
                                                'single_issue_rate' => $magazine1->single_issue_rate,
                                                'discount' => $magazine1->discount,
                                                'single_issue_after_discount' => $magazine1->single_issue_after_discount,
                                                'expected_date' => $dispatch->expected_date,
                                                'received' => $received,
                                                'not_received' => $notReceived,
                                            ];
                        }
                    }
                
                    $serialNumber = 1;
                    $csvData = [];
                    foreach ($data as $libraryId => $libraryData) {
                     
                        // Sort dispatches by magazine name
                        usort($libraryData['dispatches'], function($a, $b) {
                            return strcmp($a['magazine_name'], $b['magazine_name']);
                        });
            
                        foreach ($libraryData['dispatches'] as $val) {
                            $csvData[] = [
                                'S.No' => $serialNumber++,
                                'Library Name' => $libraryData['library_name'],
                                'Librarian Id' => $libraryData['library_id'],
                                'District' => $libraryData['library_district'],
                                'Library Type' => $libraryData['library_type'],
                                'Magazine Name' => $val['magazine_name'],
                                'Periodicity' => $val['periodicity'],
                                'Single Issue Rate' => $val['single_issue_rate'],
                                'Discount' => $val['discount'],
                                'Single Issue After Discount' =>$val['single_issue_after_discount'],
                                'Expected Date' => (new \DateTime( $val['expected_date']))->format('d-m-y'),
                                'Total Received' => $val['received'],
                                'Total Not Received' => $val['not_received'],
                               'Total pending' => ($val['received'] != 1 && $val['not_received'] != 1) ? 1 : 0,
                            ];
                        }
                        // Adding an empty row after each group for spacing
                        // $csvData[] = array_fill_keys(array_keys($csvData[0]), '');
                    }
              
                    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
                    $csvContent .= "S.No, Library Name,Librarian Id, District, Library Type, Magazine Name, Periodicity,Single Issue Rate,Discount,Single Issue After Discount, Expected Date, Total Received, Total Not Received,Total  Non Entered\n";
                    foreach ($csvData as $row) {
                        $csvContent .= '"' . implode('","', $row) . '"' . "\n";
                    }
            
                    $headers = [
                        'Content-Type' => 'text/csv; charset=utf-8',
                        'Content-Disposition' => 'attachment; filename="LibraryDispatchReport.csv"',
                    ];
            
                    return response()->make($csvContent, 200, $headers);
            
                } else {
                    return back()->with('error', "Month Year field is required");
                }
            } 
            public function Dispatch_magazinereport(Request $req){
  
                if ($req->monthyear !== null && $req->monthyear1 !== null) {
                    $query = Dispatch::query();
            
                    if ($req->id !== null) {
                        $query->where('magazine_id', $req->id);
                    }
                    
                    if ($req->Frequency !== null) {
                        $query->where('periodicity', $req->Frequency);
                    }
                    
                    if ($req->monthyear !== null && $req->monthyear1 !== null) {
                        $startDate = new \DateTime($req->monthyear);
                        $endDate = new \DateTime($req->monthyear1);
                        
                        $startDate->modify('first day of this month');
                        
                        $endDate->modify('last day of this month');
                        
                        $startDateFormatted = $startDate->format('Y-m-d');
                        $endDateFormatted = $endDate->format('Y-m-d');
                        
                        $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);
                    }
                    
                    
                    $query->orderBy('magazine_name', 'Desc');
                    $query->orderBy('expected_date', 'asc');
                    
                    $Dispatch = $query->get();
                
             
            
                  if( $Dispatch->isNotEmpty()){
                    $finaldata = [];
                    $serialNumber = 1;
                    
                    $librarianIds = Librarian::where('dlo_id', auth('librarian')->user()->librarianId)
                        ->pluck('id')->toArray();
                    
                    foreach ($Dispatch as $val) {
                        $library_ids = json_decode($val->library_id, true);
                        $received_ids = array_flip(json_decode($val->received_id, true));
                        $not_received_ids = array_flip(json_decode($val->not_received_id, true));
                    
                        $received_count = 0;
                        $not_received_count = 0;
                        $pending_count = 0;
                        $totaldata = 0;
                    
                        foreach ($library_ids as $val1) {
                            if (in_array($val1, $librarianIds)) {
                                $totaldata++;
                                if (isset($received_ids[$val1])) {
                                    $received_count++;
                                } elseif (isset($not_received_ids[$val1])) {
                                    $not_received_count++;
                                } else {
                                    $pending_count++;
                                }
                            }
                        }
                        $magazine1 = Magazine::find( $val->magazine_id);

                        $finaldata[] = [
                            'S.No' => $serialNumber++,
                            'Magazine Name' => $val->magazine_name,
                            'Periodicity' => $val->periodicity,
                            'Single Issue Rate' => $magazine1->single_issue_rate,
                            'Discount' => $magazine1->discount,
                            'Single Issue After Discount' => $magazine1->single_issue_after_discount,
                            'Expected Date' => (new \DateTime($val->expected_date))->format('d-m-y'),
                            'Total Subscription' => $totaldata,
                            'Total Library' => $totaldata,
                            'Total Received' => $received_count,
                            'Total Not Received' => $not_received_count,
                            'Pending' => $pending_count,
                        ];
                    }
                    
                    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
                    $csvContent .= "S.No, Magazine Name, Periodicity,Single Issue Rate,Discount,Single Issue After Discount, Expected Date,Total Subscription, Total Library, Total Received, Total Not Received, Total  Non Entered\n"; 
                    foreach ($finaldata as $data) {
                        $csvContent .= '"' . implode('","', $data) . "\"\n";
                    }
                    
                    $headers = [
                        'Content-Type' => 'text/csv; charset=utf-8',
                        'Content-Disposition' => 'attachment; filename="MagazineDispatchReport.csv"',
                    ];
                    
                    return response()->make($csvContent, 200, $headers);
                    
            
            
                  }else{
                    return back()->with('error',"No Record Found");
                }
                   
                }else{
                    return back()->with('error',"Mounth Year field  is required");
                }
            
            
            
            
            }
            public function dispatch_finalreport(Request $req){
  
                if ($req->monthyear && $req->monthyear1) {
                    $query = Dispatch::query();
            
                    if ($req->id) {
                        $query->where('magazine_id', $req->id);
                    }
            
                    if ($req->Frequency) {
                        $query->where('periodicity', $req->Frequency);
                    }
            
                    $startDate = (new \DateTime($req->monthyear))->modify('first day of this month')->format('Y-m-d');
                    $endDate = (new \DateTime($req->monthyear1))->modify('last day of this month')->format('Y-m-d');
                    $query->whereBetween('expected_date', [$startDate, $endDate])
                          ->orderBy('magazine_name', 'desc')
                          ->orderBy('expected_date', 'asc');
            
                    $Dispatch = $query->get();
            
                    if ($Dispatch->isNotEmpty()) {
                        $finaldata = [];
                        $librarianIds = Librarian::where('dlo_id', auth('librarian')->user()->librarianId)
                            ->pluck('id')->toArray();
            
                        foreach ($Dispatch as $key => $val) {
                            $library_ids = json_decode($val->library_id, true);
                            $received_ids = array_flip(json_decode($val->received_id, true));
                            $not_received_ids = array_flip(json_decode($val->not_received_id, true));
            
                            $counts = [
                                'totaldata' => 0,
                                'received_count' => 0,
                                'not_received_count' => 0,
                                'pending_count' => 0
                            ];
            
                            foreach ($library_ids as $library_id) {
                                if (in_array($library_id, $librarianIds)) {
                                    $counts['totaldata']++;
                                    if (isset($received_ids[$library_id])) {
                                        $counts['received_count']++;
                                    } elseif (isset($not_received_ids[$library_id])) {
                                        $counts['not_received_count']++;
                                    } else {
                                        $counts['pending_count']++;
                                    }
                                }
                            }
            
                            $magazine = Magazine::find($val->magazine_id);
                            $singleIssueAfterDiscount = (float) $magazine->single_issue_after_discount;
                            $totalSubscription = (int) $counts['totaldata'];
                            $totalReceived = (int) $counts['received_count'];
                            $totalNotReceived = (int) $counts['not_received_count'];
                            $pending = (int) $counts['pending_count'];
            
                            $finaldata[] = [
                                'S.No' => $key + 1,
                                'Magazine Name' => $val->magazine_name,
                                'Periodicity' => $val->periodicity,
                                'Single Issue Rate' => (float) $magazine->single_issue_rate,
                                'Discount' => (float) $magazine->discount,
                                'Single Issue After Discount' => round($singleIssueAfterDiscount),
                                'Total Subscription' => $totalSubscription,
                                'Total Library' => $totalSubscription,
                                'Total Received' => $totalReceived,
                                'Total Not Received' => $totalNotReceived,
                                'Pending' => $pending,
                            ];
                        }
            
                        $result = collect($finaldata)
                        ->groupBy('Magazine Name')
                        ->map(function ($group, $index) {
                            $index = (int) $index;  // Ensure $index is an integer
                            $singleIssueAfterDiscount = (float) round($group->first()['Single Issue After Discount']);
                            $totalSubscription = (int) $group->sum('Total Subscription');
                            $totalReceived = (int) $group->sum('Total Received');
                            $totalNotReceived = (int) $group->sum('Total Not Received');
                            $pending = (int) $group->sum('Pending');

                                                                        
                         return [
                                'S.No' => $index + 1,
                                'Magazine Name' =>$group->first()['Magazine Name'],
                                'Periodicity' => $group->first()['Periodicity'],
                                'Single Issue Rate' => (float) $group->first()['Single Issue Rate'],
                                'Discount' => (float) $group->first()['Discount'],
                                'Single Issue After Discount' => $singleIssueAfterDiscount,
                                'Total Subscription' => $totalSubscription,
                                'Total Library' => $totalSubscription,
                                'Amount' => round($singleIssueAfterDiscount * $totalSubscription),
                                'Total Received' => $totalReceived,
                                'Amount1' => round($singleIssueAfterDiscount * $totalReceived),
                                'Total Not Received' => $totalNotReceived,
                                'Amount2' => round($singleIssueAfterDiscount * $totalNotReceived),
                                'Pending' => $pending,
                                'Amount3' => round($singleIssueAfterDiscount * $pending),
                                'Difference' => round($singleIssueAfterDiscount * ($totalSubscription - $totalReceived)),
                            ];
                        })
                        ->values();
                 
                    
                    //   foreach($result as $val){
                    //      return $val;
                    //   }
                    $csvContent = "\xEF\xBB\xBF"; // UTF-8 BOM
                    $csvContent .= "S.No,Magazine Name,Periodicity,Single Issue Rate,Discount,Single Issue After Discount,Total Subscription,Total Library,Amount,Total Received,Amount,Total Not Received,Amount,Total Non Entered,Amount,Difference\n"; 
                    
                    foreach ($result as $data) {
                        // Ensure each field is enclosed in double quotes and escape quotes inside fields
                        $escapedData = array_map(function($field) {
                            return '"' . str_replace('"', '""', $field) . '"';
                        }, $data);
                        $csvContent .= implode(',', $escapedData) . "\n";
                    }
                    
                    // Set headers for the CSV file
                    $headers = [
                        'Content-Type' => 'text/csv; charset=utf-8',
                        'Content-Disposition' => 'attachment; filename="DespatchfinalReport.csv"',
                    ];
                    
                    // Output the CSV content with headers
                    return response($csvContent)
                        ->header('Content-Type', $headers['Content-Type'])
                        ->header('Content-Disposition', $headers['Content-Disposition']);
                    
                    
            
            
                  }else{
                    return back()->with('error',"No Record Found");
                }
                   
                }else{
                    return back()->with('error',"Mounth Year field  is required");
                }
            
            
            
            
            }
            
         

public function dispatch_final_report_pdf(Request $req)
{
 
    if ($req->monthyear === null || $req->monthyear1 === null) {
        $data=[];
        return view('librarian.dispatch_final_report_pdf', compact('data'));

    }

    $query = Dispatch::query();

  

    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    
    $startDate->modify('first day of this month');
    
    $endDate->modify('last day of this month');
    
    $startDateFormatted = $startDate->format('Y-m-d');
    $endDateFormatted = $endDate->format('Y-m-d');
    $query->whereBetween('expected_date', [$startDateFormatted, $endDateFormatted]);

    $query->orderBy('magazine_name', 'Desc');
    $query->orderBy('expected_date', 'asc');
    $Dispatch = $query->get();

    if ($Dispatch->isEmpty()) {
        return back()->with('error', "No Record Found");
    }

    $orders = Ordermagazine::where('status', '0')->get();
    $magazineCounts = $orders->flatMap(function ($order) {
        return collect(json_decode($order->magazineProduct, true))
            ->map(function ($magazineProduct) use ($order) {
                
                return [
                    'id' => $magazineProduct['magazineid'],
                    'count' => 1,
                ];
            });
    })
    ->groupBy('id')

    ->map(function ($items) {
        return [
            'id' => $items->first()['id'],
            'count' => $items->sum('count'),
        ];
    })
    ->values()
    ->toArray();
    

    $finaldata = [];
    $serialNumber = 1;

  
    $librarianIds = Librarian::where('dlo_id', auth('librarian')->user()->librarianId)
    ->pluck('id')->toArray();
    $district= auth('librarian')->user()->district;
foreach ($Dispatch as $key => $val) {
    $library_ids = json_decode($val->library_id, true);
    $received_ids = array_flip(json_decode($val->received_id, true));
    $not_received_ids = array_flip(json_decode($val->not_received_id, true));

    $counts = [
        'totaldata' => 0,
        'received_count' => 0,
        'not_received_count' => 0,
        'pending_count' => 0
    ];

    foreach ($library_ids as $library_id) {
        if (in_array($library_id, $librarianIds)) {
            $counts['totaldata']++;
            if (isset($received_ids[$library_id])) {
                $counts['received_count']++;
            } elseif (isset($not_received_ids[$library_id])) {
                $counts['not_received_count']++;
            } else {
                $counts['pending_count']++;
            }
        }
    }

    $magazine = Magazine::find($val->magazine_id);
    $singleIssueAfterDiscount = (float) $magazine->single_issue_after_discount;
    $totalSubscription = (int) $counts['totaldata'];
    $totalReceived = (int) $counts['received_count'];
    $totalNotReceived = (int) $counts['not_received_count'];
    $pending = (int) $counts['pending_count'];
    $startDate = new \DateTime($req->monthyear);
    $endDate = new \DateTime($req->monthyear1);
    $startDateFormatted = $startDate->format('M-Y');
    $endDateFormatted = $endDate->format('M-Y');
        $finaldata[] = [
        'S.No' => $key + 1,
        'Magazine Name' => $val->magazine_name,
        'Periodicity' => $val->periodicity,
        'Single Issue Rate' => (float) $magazine->single_issue_rate,
        'Discount' => (float) $magazine->discount,
        'Single Issue After Discount' => round($singleIssueAfterDiscount),
        'Total Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Total Received' => $totalReceived,
        'Total Not Received' => $totalNotReceived,
        'Pending' => $pending,
        'District' => $district,
        'month' => $startDateFormatted. ' - ' .  $endDateFormatted
    ];
}

$result = collect($finaldata)
->groupBy('Magazine Name')
->map(function ($group, $index) {
    $index = (int) $index;  // Ensure $index is an integer
    $singleIssueAfterDiscount = (float) round($group->first()['Single Issue After Discount']);
    $totalSubscription = (int) $group->sum('Total Subscription');
    $totalReceived = (int) $group->sum('Total Received');
    $totalNotReceived = (int) $group->sum('Total Not Received');
    $pending = (int) $group->sum('Pending');

                                                
 return [
        'S_No' => $index + 1,
        'Magazine_Name' =>$group->first()['Magazine Name'],
        'Periodicity' => $group->first()['Periodicity'],
        'Single_Issue_Rate' => (float) $group->first()['Single Issue Rate'],
        'Discount' => (float) $group->first()['Discount'],
        'Single_Issue_After_Discount' => $singleIssueAfterDiscount,
        'Total_Subscription' => $totalSubscription,
        'Total Library' => $totalSubscription,
        'Amount' => round($singleIssueAfterDiscount * $totalSubscription),
        'Total_Received' => $totalReceived,
        'Amount1' => round($singleIssueAfterDiscount * $totalReceived),
        'Total_Not_Received' => $totalNotReceived,
        'Amount2' => round($singleIssueAfterDiscount * $totalNotReceived),
        'Pending' => $pending,
        'Amount3' => round($singleIssueAfterDiscount * $pending),
        'Difference' => round($singleIssueAfterDiscount * ($totalSubscription - $totalReceived)),
        'District' => $group->first()['District'],
        'month' =>$group->first()['month']
    ];
})
->values();
    $data=$result;
return view('admin.dispatch_final_report_pdf', compact('data'));

 

}       
}



  