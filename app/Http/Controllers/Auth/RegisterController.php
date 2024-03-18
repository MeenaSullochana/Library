<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Distributor;
use App\Models\PublisherDistributor;
use App\Models\District;
use App\Models\State;
use App\Models\Admin;
use App\Models\Reviewer;
use App\Models\Notifications;
use App\Models\Country;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserCreatedNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use App\Models\Otp;
use Illuminate\Support\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    public function __construct()
    {
        $this->middleware('guest:publisher')->except('logout');
    }

    public function showRegistrationForm(Request $request)
    {
        $user= $request->usertype;
        $state = State::all();
       $district = District ::all();
       $country = Country ::where('status','=',1)->get();
        return view('Auth.register',compact('state','district','country','user'));
    }

    // <!-- ###############################################################################-->
    // <!-- ++++++++++++++++++++++++++Publisher +++++++++++++++++++++++++++-->
    // <!-- ###############################################################################-->

  public function pub_create(Request $request)
    {
    
           $validator= Validator::make($request->all(),[
            'usertype'                                  =>['required'],
            'publication_name'                          => ['required', 'string', 'max:255'],
            'userName'                                 => ['required', 'string', 'max:255','unique:publishers'],
            'password'                                  => ['required', 'string', 'min:8'],
            'pub_first_name'                            =>['required', 'string', 'max:255'],
            'pub_last_name'                             =>['required', 'string', 'max:255'],
            'email'                                     =>['required', 'string','email','unique:publishers'],
            'contact_number'                            =>['required','max:10'],
            'pub_address'                               =>['required', 'string', 'max:255'],
            'pub_city'                                  =>['required', 'string', 'max:255'],
            'pub_district'                              =>['required', 'string', 'max:255'],
            'pub_state'                                 =>['required', 'string', 'max:255'],
            'pub_country'                               =>['required', 'string', 'max:255'],
            'pub_pin_code'                              =>['required', 'string', 'max:255'],
            'contact_person_name'                       =>['required', 'string', 'max:255'],
            'con_email_id'                              =>['required', 'string','email'],
            'con_contact_number'                        =>['required','max:10'],
            'con_publication_address'                   =>['required', 'string', 'max:255'],
            'con_city'                                  =>['required', 'string', 'max:255'],
            'con_district'                              =>['required', 'string', 'max:255'],
            'con_state'                                 =>['required', 'string', 'max:255'],
            'con_country'                               =>['required', 'string', 'max:255'],
            'con_pin_code'                              =>['required', 'string', 'max:255'],
            'publication_shop_established_year'         =>['required','max:4'],
            'number_of_books_published_so_for'          =>['required'],
            'number_of_books_published_latest_year'     =>['required'],
            'publications_shope_book_title.*'           =>['required'],
            'publications_shope_book_author.*'          =>['required'],
            // 'trs_state_awarded.*'                       =>['required'],
            // 'trs_central_awarded.*'                     =>['required'],
            'member_in_publishers_yes_old'                          =>['required'],
            'member_in_publishers_yes_old_asr'                               =>['required'],
            'category_of_books_published.*'             =>['required'],
            'specialized_category_books.*'              =>['required'],
            'primary_language_of_publication.*'         =>['required'],
            'pub_ownership'                             =>['required'],
            'subsidiary_publications'                   =>['required'],
            'declaration'                               =>['required'],
        ]);
        if($validator->fails()){
            // return $validator->errors();
            return redirect()->back()->withInput()->withErrors($validator->errors());
           }

           $publisher=new Publisher();
        //top title
                    $title_array = $request->publications_shope_book_title;
                    $author_array = $request->publications_shope_book_author;
                    $title_len = sizeof($title_array);
                    $top_titles=[];
                    for($i=0;$i<$title_len;$i++){
                        $obj=(Object)[
                            "title"=>$title_array[$i],
                            "author"=>$author_array[$i],
                        ];
                        array_push($top_titles,$obj);
                    }

       //translatebooks
       if($request->member_in_publishers_yes_old == 'yes'){
        if($request->trans_title &&$request->trans_author && $request->trans_from && $request->trans_to ){
            $trs_book_title = $request->trans_title;
            $trs_book_author = $request->trans_author;
            $trs_book_lan_one = $request->trans_from;
            $trs_book_lan_two = $request->trans_to;
            $trans_len = sizeof($trs_book_title);
            $trans_books=[];
            for($i=0;$i<$trans_len;$i++){
                $obj=(Object)[
                    "title"=> $trs_book_title[$i],
                    "author"=>$trs_book_author[$i],
                    "lan_from"=>$trs_book_lan_one[$i],
                    "lan_to"=>$trs_book_lan_two[$i]
                ];
                array_push($trans_books,$obj);
            }
            $publisher->topTranslatedBooks =   json_encode($trans_books);
        }
        else{
            return redirect()->back()->with('error',"Best translated books required");
        }
       }
    
         //award
         if($request->member_in_publishers_yes_old_asr == 'yes'){
            if($request->trs_state_awarded && $request->trs_central_awarded){
             $trs_state_awarded = $request->trs_state_awarded;
            $trs_central_awarded = $request->trs_central_awarded;
            $award_len = sizeof($trs_state_awarded);
           
            $awards=[];
            for($i=0;$i<$award_len;$i++){
                $obj=(Object)[
                    "award_name"=> $trs_state_awarded[$i],
                    "book_title"=>$trs_central_awarded[$i],
                ];
                array_push($awards,$obj);
            }
            $publisher->awardTitle  = json_encode($awards);
         }
         else{
            return redirect()->back()->with('error',"Awarded title details required");         }
           
         }
                

           //association
                    // if($request->member_in_publishers_yes == "yes"){
                    //     $member_in_publishers_name = $request->member_in_publishers_name;
                    //     $member_in_publishers_id = $request->member_in_publishers_id;
                    //     $mem_len = sizeof($member_in_publishers_name);
                    //     $membership=[];
                    //     for($i=0;$i<$mem_len;$i++){
                    //         $obj=(Object)[
                    //             "association_name"=> $member_in_publishers_name[$i],
                    //             "association_id"=>$member_in_publishers_id[$i],
                    //         ];
                    //         array_push($membership,$obj);
                    //     }
                    //     $publisher->association  = json_encode($membership);
                    // }
                    

            //subsidiary
            if($request->subsidiary_publications == "yes"){
                if($request->name_of_the_subsidiary_publication && $request->name_of_the_subsidiary_publisher && $request->stack_holder_percentage && $request->subsidiary_doc ){
                    $subsidiary_no_publications_content = $request->name_of_the_subsidiary_publication;
                    $name_of_the_subsidiary_publisher = $request->name_of_the_subsidiary_publisher;
                    $stack_holder_percentage = $request->stack_holder_percentage;
                    $subsidiary_doc = $request->subsidiary_doc;
                    
                    $mem_len = sizeof($subsidiary_no_publications_content);
                    $subsidiary=[];
                    for($i=0;$i<$mem_len;$i++){
                        $pub_doc = $subsidiary_doc[$i];
                        $pub_doc_name=$request->pub_first_name.time().'_'.$pub_doc->getClientOriginalName();
                        $pub_doc->move(('publisher/images/proof/sub_doc'),$pub_doc_name);  
                        $obj=(Object)[
                            "subsidiary_publication_name" => $subsidiary_no_publications_content[$i],
                            "subsidiary_publisher_name"   =>$name_of_the_subsidiary_publisher[$i],
                            "stack_holder_percentage"      =>$stack_holder_percentage[$i],
                            "subsidiary_doc" =>$pub_doc_name
                            ];
                        array_push($subsidiary,$obj);
                    }
                      
                 $publisher->subsidiary = json_encode($subsidiary);
                }else{
                    return redirect()->back()->with('error',"Subsidiary details required");
                }
                    
                }
            // //publication proof
            //         if($request->hasFile('publication_proof'))
            //         {
                       
            //         $path = 'publisher/images/proof/Publication'.$request->publication_proof;
            //         if(File::exists($path)){
            //          File::delete($path);
            //         }
            //         $pub_proof = $request->file('publication_proof');
            //         $pub_proof_name= $request->pub_first_name.time().'_'.$pub_proof->getClientOriginalName();
            //         $request->publication_proof->move(('publisher/images/proof/Publication'),$pub_proof_name);  
            //     }

            //book catalogue
                 if($request->hasFile('latest_book_categories'))
                 {
                    
                 $path = 'publisher/images/proof/BookCatalogue'.$request->latest_book_categories;
                 if(File::exists($path)){
                  File::delete($path);
                 }
                 $book_proof = $request->file('latest_book_categories');
                 $book_proof_name= $request->pub_first_name.time().'_'.$book_proof->getClientOriginalName();
                 $request->latest_book_categories->move(('publisher/images/proof/BookCatalogue'),$book_proof_name);  
             }
              //Membership proof
        //       if($request->hasFile('associate_membership_proof'))
        //       {
                  
        //       $path = 'publisher/images/proof/Membership'.$request->associate_membership_proof;
        //       if(File::exists($path)){
        //       File::delete($path);
        //       }
        //       $member_proof = $request->file('associate_membership_proof');
        //       $member_proof_name=$request->pub_first_name.time().'_'.$member_proof->getClientOriginalName();
        //       $request->associate_membership_proof->move(('publisher/images/proof/Membership'),$member_proof_name);  
        //   }
           //ownership proof
           if($request->pub_ownership =="Partnership"){
            if($request->hasFile('gst') && $request->hasFile('udayam') && $request->hasFile('pan_tan') && $request->hasFile('pan_deed')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="Private"){
            if($request->hasFile('gst') && $request->hasFile('pan_tan') && $request->hasFile('certification_incon') &&$request->hasFile('moa') && $request->hasFile('aoa')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="Publication"){
            if($request->hasFile('gst') && $request->hasFile('certification_incon') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="oneperson"){
            if($request->hasFile('gst') && $request->hasFile('udayam') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="limited"){
            if($request->hasFile('gst') && $request->hasFile('udayam') && $request->hasFile('pan_tan')&& $request->hasFile('llp_agre')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="trust"){
            if($request->hasFile('gst') && $request->hasFile('private_trust') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="society"){
            if($request->hasFile('gst') && $request->hasFile('private_society') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="institutional"){
            if($request->hasFile('gst') && $request->hasFile('institution') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="trust-foundation"){
            if($request->hasFile('gst') && $request->hasFile('trust_foundation') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
           if($request->pub_ownership =="government-society"){
            if($request->hasFile('gst') && $request->hasFile('society') && $request->hasFile('pan_tan')){

            }else{
                return redirect()->back()->with('error',"Publication Ownership Documents required");
            }

           }
          //gst
                if($request->hasFile('gst'))
                {
                    
                $path = 'publisher/images/proof/gst'.$request->gst;
                if(File::exists($path)){
                File::delete($path);
                }
                $gst_proof = $request->file('gst');
                $gst_proof_name= $request->pub_first_name.time().'_'.$gst_proof->getClientOriginalName();
                $request->gst->move(('publisher/images/proof/gst'),$gst_proof_name);  
                $publisher->gstProof = $gst_proof_name;
            }
            //udyam
            if($request->hasFile('udayam'))
            {
                
            $path = 'publisher/images/proof/udayam'.$request->udayam;
            if(File::exists($path)){
            File::delete($path);
            }
            $udayam_proof = $request->file('udayam');
            $udayam_proof_name= $request->pub_first_name.time().'_'.$udayam_proof->getClientOriginalName();
            $request->udayam->move(('publisher/images/proof/udayam'),$udayam_proof_name);  
            $publisher->udyamProof =  $udayam_proof_name;
        }


                   //certification_incon
                   if($request->hasFile('certification_incon'))
                   {
                       
                   $path = 'publisher/images/proof/certification_incon'.$request->certification_incon;
                   if(File::exists($path)){
                   File::delete($path);
                   }
                   $certification_incon_proof = $request->file('certification_incon');
                   $certification_incon_proof_name= $request->pub_first_name.time().'_'.$certification_incon_proof->getClientOriginalName();
                   $request->certification_incon->move(('publisher/images/proof/certification_incon'),$certification_incon_proof_name);  
                   $publisher->certificationIncorporationProof =  $certification_incon_proof_name;
                }

                //pan_tan
                if($request->hasFile('pan_tan'))
                {
                    
                $path = 'publisher/images/proof/pan_tan'.$request->pan_tan;
                if(File::exists($path)){
                File::delete($path);
                }
                $pan_tan_proof = $request->file('pan_tan');
                $pan_tan_proof_name= $request->pub_first_name.time().'_'.$pan_tan_proof->getClientOriginalName();
                $request->pan_tan->move(('publisher/images/proof/pan_tan'),$pan_tan_proof_name);  
                
                $publisher->panOrTanProof=  $pan_tan_proof_name;
            }
                //cgReg
                if($request->hasFile('cgReg'))
                {
                     
                $path = 'publisher/images/proof/cgReg'.$request->cgReg;
                if(File::exists($path)){
                File::delete($path);
                }
                $cgReg_proof = $request->file('cgReg');
                $cgReg_proof_name= $request->pub_first_name.time().'_'.$cgReg_proof->getClientOriginalName();
                $request->cgReg->move(('publisher/images/proof/cgReg'),$cgReg_proof_name);  
                $publisher->certificationRegistrationProof  =   $cgReg_proof_name;
                }
            //pan_deed
            if($request->hasFile('pan_deed'))
            {
                
            $path = 'publisher/images/proof/pan_deed'.$request->pan_deed;
            if(File::exists($path)){
            File::delete($path);
            }
            $pan_deed_proof = $request->file('pan_deed');
            $pan_deed_proof_name= $request->pub_first_name.time().'_'.$pan_deed_proof->getClientOriginalName();
            $request->pan_deed->move(('publisher/images/proof/pan_deed'),$pan_deed_proof_name); 
            $publisher->partnershipDeedProof  =   $pan_deed_proof_name; 
            }

             //llp_agre
             if($request->hasFile('llp_agre'))
             {
                
             $path = 'publisher/images/proof/llp_agre'.$request->llp_agre;
             if(File::exists($path)){
             File::delete($path);
             }
             $llp_agre_proof = $request->file('llp_agre');
             $llp_agre_proof_name= $request->pub_first_name.time().'_'.$llp_agre_proof->getClientOriginalName();
             $request->llp_agre->move(('publisher/images/proof/llp_agre'),$llp_agre_proof_name);  
             $publisher->llpProof  =   $llp_agre_proof_name; 
             }
            //moa
            if($request->hasFile('moa'))
            {
                 
            $path = 'publisher/images/proof/moa'.$request->moa;
            if(File::exists($path)){
            File::delete($path);
            }
            $moa_proof = $request->file('moa');
            $moa_proof_name= $request->pub_first_name.time().'_'.$moa_proof->getClientOriginalName();
            $request->moa->move(('publisher/images/proof/moa'),$moa_proof_name);  
            $publisher->moaProof    =   $moa_proof_name; 
            }

              //aoa
              if($request->hasFile('aoa'))
              {
              
              $path = 'publisher/images/proof/aoa'.$request->aoa;
              if(File::exists($path)){
              File::delete($path);
              }
              $aoa_proof = $request->file('aoa');
              $aoa_proof_name= $request->pub_first_name.time().'_'.$aoa_proof->getClientOriginalName();
              $request->aoa->move(('publisher/images/proof/aoa'),$aoa_proof_name);
              $publisher->aoaProof    =  $aoa_proof_name; 
              }
//private_society
         if($request->hasFile('private_society'))
         {
             
         $path = 'publisher/images/proof/privatesociety'.$request->private_society;
         if(File::exists($path)){
         File::delete($path);
         }
         $private_society_proof = $request->file('private_society');
         $private_society_proof_name= $request->pub_first_name.time().'_'.$private_society_proof->getClientOriginalName();
         $request->private_society->move(('publisher/images/proof/privatesociety'),$private_society_proof_name);  
         $publisher->privateSocietyProof =  $private_society_proof_name;
     }
     //private_trust
     if($request->hasFile('private_trust'))
     {
         
     $path = 'publisher/images/proof/privatetrust'.$request->private_trust;
     if(File::exists($path)){
     File::delete($path);
     }
     $private_trust_proof = $request->file('private_trust');
     $private_trust_proof_name= $request->pub_first_name.time().'_'.$private_trust_proof->getClientOriginalName();
     $request->private_trust->move(('publisher/images/proof/privatetrust'),$private_trust_proof_name);  
     $publisher->privateTrustProof =  $private_trust_proof_name;
 }
      //institution
      if($request->hasFile('institution'))
      {
          
      $path = 'publisher/images/proof/institution'.$request->institution;
      if(File::exists($path)){
      File::delete($path);
      }
      $institution_proof = $request->file('institution');
      $institution_proof_name= $request->pub_first_name.time().'_'.$institution_proof->getClientOriginalName();
      $request->institution->move(('publisher/images/proof/institution'),$institution_proof_name);  
      $publisher->institutionProof =  $institution_proof_name;
  }
        //trust_foundation
        if($request->hasFile('trust_foundation'))
        {
            
        $path = 'publisher/images/proof/trustfoundation'.$request->trust_foundation;
        if(File::exists($path)){
        File::delete($path);
        }
        $trust_foundation_proof = $request->file('trust_foundation');
        $trust_foundation_proof_name= $request->pub_first_name.time().'_'.$trust_foundation_proof->getClientOriginalName();
        $request->trust_foundation->move(('publisher/images/proof/trustfoundation'),$trust_foundation_proof_name);  
        $publisher->trustFoundationProof =  $trust_foundation_proof_name;
    }
         //govt society
         if($request->hasFile('society'))
         {
             
         $path = 'publisher/images/proof/society'.$request->society;
         if(File::exists($path)){
         File::delete($path);
         }
         $society_proof = $request->file('society');
         $society_proof_name= $request->pub_first_name.time().'_'.$society_proof->getClientOriginalName();
         $request->society->move(('publisher/images/proof/society'),$society_proof_name);  
         $publisher->societyProof =  $society_proof_name;
     }
      
//special category
                $special = $request->specialized_category_books;
                foreach ($special as $key=>$val){
                if($val == "Other If Any"){
                    $publisher->otherSpecial  = $request->other_specialized_category_books;
                }
                }
//language
                $lang = $request->primary_language_of_publication;
                foreach ($lang as $key=>$val){
                if($val == "Other"){
                    $publisher->otherIndian  = $request->other_indian_language;
                }
                else if($val == "foreign languages"){
                    $publisher->otherForeign  = $request->other_foreign_language;
                }
                }

           $publisher->publicationName              =$request->publication_name;
           $publisher->userName                     =$request->userName;
           $publisher->password                     =Hash::make($request->password);
           $publisher->firstName                    =$request->pub_first_name;
           $publisher->lastName                     =$request->pub_last_name;
           $publisher->email                        =$request->email;
           $publisher->mobileNumber                 =$request->contact_number;
           $publisher->publicationAddress           =$request->pub_address;
           $publisher->city                         =$request->pub_city;
           $publisher->District                     =$request->pub_district;
           $publisher->state                        =$request->pub_state;
           $publisher->country                      =$request->pub_country;
           $publisher->postalCode                   =$request->pub_pin_code;
           $publisher->contactName                  =$request->contact_person_name;
           $publisher->contactEmail                 =$request->con_email_id;
           $publisher->contactMobileNumber          =$request->con_contact_number;
           $publisher->contactAddress               =$request->con_publication_address;
           $publisher->contactCity                  =$request->con_city;
           $publisher->contactDistrict              =$request->con_district;
           $publisher->contactState                 =$request->con_state;
           $publisher->contactCountry               =$request->con_country;
           $publisher->contactPostalCode            =$request->con_pin_code;
           $publisher->yearOfEstablishment          =$request->publication_shop_established_year;
           $publisher->bookCountSoFar               =$request->number_of_books_published_so_for;
           $publisher->bookCountLast3               =$request->number_of_books_published_latest_year;
           $publisher->topTitles                    =json_encode($top_titles);
           $publisher->bookCategories               =$request->category_of_books_published;
           $publisher->specialCategories            =$request->specialized_category_books;
           $publisher->language                     =$request->primary_language_of_publication;
           $publisher->pubOwnership                =$request->pub_ownership;
           $publisher->haveSubsidiary              =$request->subsidiary_publications;
           $publisher->declaration                 =$request->declaration;
           $publisher->bookCatalogue               =$book_proof_name;
           $publisher->usertype                    = $request->usertype;
           $publisher->have_translated_books            = $request->member_in_publishers_yes_old;
           $publisher->have_award_title                 = $request ->member_in_publishers_yes_old_asr; 
           $publisher->approved_status        ="approve";
           $publisher->status                 ="1";
            if ($publisher->save()) {
        
                $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
                Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCode));
                $notifi= new Notifications();
                $admin=Admin::first();
                $notifi->message="new user register";
                $notifi->to= $admin->id;
                $notifi->from=$publisher->id;
                $notifi->type="publisher";
                $notifi->save();
                $otps= new Otp();
                $otps->otp=$randomCode;
                $otps->userId= $publisher->id;
                $otps->dateTime= Carbon::now();
                $otps->save();
           } 
           Session::put('publisher',$publisher);
        //    return view('mailconfirm',compact('publisher'));
           return redirect('/mailconfirmation'); 
        //   return back()->with('success',"You are registered successfully!! Please wait for admin apporval mail");
    }
//username check
public function usernameCheck(Request $request){
    $Publisher = Publisher::where('userName','=',$request->userName)->get();
    if(sizeof($Publisher) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
}

//email check
public function emailCheck(Request $request){
    $Publisher = Publisher::where('email','=',$request->email)->get();
    if(sizeof($Publisher) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
}

  // <!-- ###############################################################################-->
    // <!-- ++++++++++++++++++++++++++ Distributor +++++++++++++++++++++++++++-->
    // <!-- ###############################################################################-->

    public function dis_create(Request $request)
    {
           $validator= Validator::make($request->all(),[
            'usertype'                                    =>['required'],
            'book_dis_company_name'                       => ['required', 'string', 'max:255'],
            'userName'                                    => ['required', 'string', 'max:255'],
            'password'                                    => ['required', 'string', 'min:8'],
            'distn_first_name'                            =>['required', 'string', 'max:255'],
            'distn_last_name'                             =>['required', 'string', 'max:255'],
            'distn_email_id'                              =>['required', 'string','email'],
            'distn_contact_number'                        =>['required','max:10'],
            'distn_address'                               =>['required', 'string', 'max:255'],
            'distn_city'                                  =>['required', 'string', 'max:255'],
            'distn_district'                              =>['required', 'string', 'max:255'],
            'distn_state'                                 =>['required', 'string', 'max:255'],
            'distn_country'                               =>['required', 'string', 'max:255'],
            'distn_pincode'                               =>['required', 'string', 'max:255'],
            'contact_person_name'                         =>['required', 'string', 'max:255'],
            'cont_per_email_id'                           =>['required', 'string','email'],
            'cont_per_contact_no'                         =>['required','max:10'],
            'cont_per_address'                            =>['required', 'string', 'max:255'],
            'cont_per_city'                               =>['required', 'string', 'max:255'],
            'cont_per_district'                           =>['required', 'string', 'max:255'],
            'cont_per_state'                              =>['required', 'string', 'max:255'],
            'cont_per_country'                            =>['required', 'string', 'max:255'],
            'cont_per_pincode'                            =>['required', 'string', 'max:255'],
            'yr_of_establishment'                         =>['required','max:4'],
            'number_of_files_available_in_shop'           =>['required'],
            'language_of_books_you_dealing_with'          =>['required'],
            'publisher_name.*'                            =>['required'],
            'publisher_place.*'                           =>['required'],
            'authorization_letter.*'                    =>['required'],
            'latest_book_categories'                      =>['required'],
            'subsidiary_distributor_dis'                  =>['required'],
            'dis_ownership'                             =>['required'],
            'declaration'                                 =>['required'],
        ]);
        if($validator->fails()){
           return $validator->errors();
            return redirect()->back()->withInput()->withErrors($validator->errors());
           }

           $distributor=new Distributor();
        //publisher
                    $pub_name = $request->publisher_name;
                    $pub_place = $request->publisher_place;
                    $letter = $request->authorization_letter;
                    $title_len = sizeof($pub_name);
                    $publishers=[];
                    for($i=0;$i<$title_len;$i++){
                        $auth_letter = $letter[$i];
                        $auth_letter_name=$request->distn_first_name.time().'_'.$auth_letter->getClientOriginalName();
                        $auth_letter->move(('distributor/images/proof/authorization'),$auth_letter_name);  
                        $obj=(Object)[
                            "publisher_name"=>$pub_name[$i],
                            "publisher_place"=>$pub_place[$i],
                            "authorization_letter"=>$auth_letter_name
                        ];
                        array_push($publishers,$obj);
                    }

  //subsidiary
            if($request->subsidiary_distributor_dis == "yes"){
                $name_of_the_subsidiary_distributor = $request->substidiary_name_account_transaction_content_distributor;
                $subsidiary_no_distributions_content = $request->substidiary_name_account_transaction_content_distribution;
                $stack_holder_percentage = $request->subsidiary_name_distributor_content;
                $subsidiary_doc = $request->subsidiary_name_distributor_file;
                
                $mem_len = sizeof($subsidiary_no_distributions_content);
                $subsidiary=[];
                for($i=0;$i<$mem_len;$i++){
                    $dis_doc = $subsidiary_doc[$i];
                    $dis_doc_name=$request->distn_first_name.time().'_'.$dis_doc->getClientOriginalName();
                    $dis_doc->move(('distributor/images/proof/sub_doc'),$dis_doc_name);  
                    $obj=(Object)[
                        "subsidiary_distribution_name" => $subsidiary_no_distributions_content[$i],
                        "subsidiary_distributor_name"   =>$name_of_the_subsidiary_distributor[$i],
                        "stack_holder_percentage"      =>$stack_holder_percentage[$i],
                        "subsidiary_doc" =>$dis_doc_name
                        ];
                    array_push($subsidiary,$obj);
                }
                
            $distributor->subsidiary = json_encode($subsidiary);
            }


            // //publication proof
            //         if($request->hasFile('distribution_proof'))
            //         {
                       
            //         $path = 'distributor/images/proof/Distribution'.$request->distribution_proof;
            //         if(File::exists($path)){
            //          File::delete($path);
            //         }
            //         $dis_proof = $request->file('distribution_proof');
            //         $dis_proof_name= $request->distn_first_name.time().'_'.$dis_proof->getClientOriginalName();
            //         $request->distribution_proof->move(('distributor/images/proof/Distribution'),$dis_proof_name);  
            //     }

            //book catalogue
                 if($request->hasFile('latest_book_categories'))
                 {
                    
                 $path = 'distributor/images/proof/BookCatalogue'.$request->latest_book_categories;
                 if(File::exists($path)){
                  File::delete($path);
                 }
                 $book_proof = $request->file('latest_book_categories');
                 $book_proof_name= $request->distn_first_name.time().'_'.$book_proof->getClientOriginalName();
                 $request->latest_book_categories->move(('distributor/images/proof/BookCatalogue'),$book_proof_name);  
             }

                      //ownership proof
          //gst
          if($request->hasFile('gst'))
          {
              
          $path = 'distributor/images/proof/gst'.$request->gst;
          if(File::exists($path)){
          File::delete($path);
          }
          $gst_proof = $request->file('gst');
          $gst_proof_name= $request->distn_first_name.time().'_'.$gst_proof->getClientOriginalName();
          $request->gst->move(('distributor/images/proof/gst'),$gst_proof_name);  
          $distributor->gstProof = $gst_proof_name;
      }
      //udyam
      if($request->hasFile('udayam'))
      {
          
      $path = 'distributor/images/proof/udayam'.$request->udayam;
      if(File::exists($path)){
      File::delete($path);
      }
      $udayam_proof = $request->file('udayam');
      $udayam_proof_name= $request->distn_first_name.time().'_'.$udayam_proof->getClientOriginalName();
      $request->udayam->move(('distributor/images/proof/udayam'),$udayam_proof_name);  
      $distributor->udyamProof =  $udayam_proof_name;
  }
             //certification_incon
             if($request->hasFile('certification_incon'))
             {
                 
             $path = 'distributor/images/proof/certification_incon'.$request->certification_incon;
             if(File::exists($path)){
             File::delete($path);
             }
             $certification_incon_proof = $request->file('certification_incon');
             $certification_incon_proof_name= $request->distn_first_name.time().'_'.$certification_incon_proof->getClientOriginalName();
             $request->certification_incon->move(('distributor/images/proof/certification_incon'),$certification_incon_proof_name);  
             $distributor->certificationIncorporationProof =  $certification_incon_proof_name;
          }

          //pan_tan
          if($request->hasFile('pan_tan'))
          {
              
          $path = 'distributor/images/proof/pan_tan'.$request->pan_tan;
          if(File::exists($path)){
          File::delete($path);
          }
          $pan_tan_proof = $request->file('pan_tan');
          $pan_tan_proof_name= $request->distn_first_name.time().'_'.$pan_tan_proof->getClientOriginalName();
          $request->pan_tan->move(('distributor/images/proof/pan_tan'),$pan_tan_proof_name);  
          
          $distributor->panOrTanProof=  $pan_tan_proof_name;
      }
          //cgReg
          if($request->hasFile('cgReg'))
          {
               
          $path = 'distributor/images/proof/cgReg'.$request->cgReg;
          if(File::exists($path)){
          File::delete($path);
          }
          $cgReg_proof = $request->file('cgReg');
          $cgReg_proof_name= $request->distn_first_name.time().'_'.$cgReg_proof->getClientOriginalName();
          $request->cgReg->move(('distributor/images/proof/cgReg'),$cgReg_proof_name);  
          $distributor->certificationRegistrationProof  =   $cgReg_proof_name;
          }
      //pan_deed
      if($request->hasFile('pan_deed'))
      {
          
      $path = 'distributor/images/proof/pan_deed'.$request->pan_deed;
      if(File::exists($path)){
      File::delete($path);
      }
      $pan_deed_proof = $request->file('pan_deed');
      $pan_deed_proof_name= $request->distn_first_name.time().'_'.$pan_deed_proof->getClientOriginalName();
      $request->pan_deed->move(('distributor/images/proof/pan_deed'),$pan_deed_proof_name); 
      $distributor->partnershipDeedProof  =   $pan_deed_proof_name; 
      }

       //llp_agre
       if($request->hasFile('llp_agre'))
       {
          
       $path = 'distributor/images/proof/llp_agre'.$request->llp_agre;
       if(File::exists($path)){
       File::delete($path);
       }
       $llp_agre_proof = $request->file('llp_agre');
       $llp_agre_proof_name= $request->distn_first_name.time().'_'.$llp_agre_proof->getClientOriginalName();
       $request->llp_agre->move(('distributor/images/proof/llp_agre'),$llp_agre_proof_name);  
       $distributor->llpProof  =   $llp_agre_proof_name; 
       }
      //moa
      if($request->hasFile('moa'))
      {
           
      $path = 'distributor/images/proof/moa'.$request->moa;
      if(File::exists($path)){
      File::delete($path);
      }
      $moa_proof = $request->file('moa');
      $moa_proof_name= $request->distn_first_name.time().'_'.$moa_proof->getClientOriginalName();
      $request->moa->move(('distributor/images/proof/moa'),$moa_proof_name);  
      $distributor->moaProof    =   $moa_proof_name; 
      }

        //aoa
        if($request->hasFile('aoa'))
        {
        
        $path = 'distributor/images/proof/aoa'.$request->aoa;
        if(File::exists($path)){
        File::delete($path);
        }
        $aoa_proof = $request->file('aoa');
        $aoa_proof_name= $request->distn_first_name.time().'_'.$aoa_proof->getClientOriginalName();
        $request->aoa->move(('distributor/images/proof/aoa'),$aoa_proof_name);
        $distributor->aoaProof    =  $aoa_proof_name; 
        }

 //private_society
         if($request->hasFile('private_society'))
         {
             
         $path = 'distributor/images/proof/privatesociety'.$request->private_society;
         if(File::exists($path)){
         File::delete($path);
         }
         $private_society_proof = $request->file('private_society');
         $private_society_proof_name= $request->distn_first_name.time().'_'.$private_society_proof->getClientOriginalName();
         $request->private_society->move(('distributor/images/proof/privatesociety'),$private_society_proof_name);  
         $distributor->privateSocietyProof =  $private_society_proof_name;
     }
     //private_trust
     if($request->hasFile('private_trust'))
     {
         
     $path = 'distributor/images/proof/privatetrust'.$request->private_trust;
     if(File::exists($path)){
     File::delete($path);
     }
     $private_trust_proof = $request->file('private_trust');
     $private_trust_proof_name= $request->distn_first_name.time().'_'.$private_trust_proof->getClientOriginalName();
     $request->private_trust->move(('distributor/images/proof/privatetrust'),$private_trust_proof_name);  
     $distributor->privateTrustProof =  $private_trust_proof_name;
 }
      //institution
      if($request->hasFile('institution'))
      {
          
      $path = 'distributor/images/proof/institution'.$request->institution;
      if(File::exists($path)){
      File::delete($path);
      }
      $institution_proof = $request->file('institution');
      $institution_proof_name= $request->distn_first_name.time().'_'.$institution_proof->getClientOriginalName();
      $request->institution->move(('distributor/images/proof/institution'),$institution_proof_name);  
      $distributor->institutionProof =  $institution_proof_name;
  }
        //trust_foundation
        if($request->hasFile('trust_foundation'))
        {
            
        $path = 'distributor/images/proof/trustfoundation'.$request->trust_foundation;
        if(File::exists($path)){
        File::delete($path);
        }
        $trust_foundation_proof = $request->file('trust_foundation');
        $trust_foundation_proof_name= $request->distn_first_name.time().'_'.$trust_foundation_proof->getClientOriginalName();
        $request->trust_foundation->move(('distributor/images/proof/trustfoundation'),$trust_foundation_proof_name);  
        $distributor->trustFoundationProof =  $trust_foundation_proof_name;
    }
         //govt society
         if($request->hasFile('society'))
         {
             
         $path = 'distributor/images/proof/society'.$request->society;
         if(File::exists($path)){
         File::delete($path);
         }
         $society_proof = $request->file('society');
         $society_proof_name= $request->distn_first_name.time().'_'.$society_proof->getClientOriginalName();
         $request->society->move(('distributor/images/proof/society'),$society_proof_name);  
         $distributor->societyProof =  $society_proof_name;
     }
            
     //language
     $lang = $request->language_of_books_you_dealing_with;
     foreach ($lang as $key=>$val){
     if($val == "otherIndia"){
         $distributor->otherIndian  = $request->otherIndian;
     }
     else if($val == "otherForeign"){
         $distributor->otherForeign  = $request->otherForeign;
     }
     }
        
           $distributor->distributionName              =$request->book_dis_company_name;
           $distributor->userName                     =$request->userName;
           $distributor->password                     =Hash::make($request->password);
           $distributor->firstName                    =$request->distn_first_name;
           $distributor->lastName                     =$request->distn_last_name;
           $distributor->email                        =$request->distn_email_id;
           $distributor->mobileNumber                 =$request->distn_contact_number;
           $distributor->distributionAddress           =$request->distn_address;
           $distributor->city                         =$request->distn_city;
           $distributor->District                     =$request->distn_district;
           $distributor->state                        =$request->distn_state;
           $distributor->country                      =$request->distn_country;
           $distributor->postalCode                   =$request->distn_pincode;
           $distributor->contactName                  =$request->contact_person_name;
           $distributor->contactEmail                 =$request->cont_per_email_id;
           $distributor->contactMobileNumber          =$request->cont_per_contact_no;
           $distributor->contactAddress               =$request->cont_per_address;
           $distributor->contactCity                  =$request->cont_per_city;
           $distributor->contactDistrict              =$request->cont_per_district;
           $distributor->contactState                 =$request->cont_per_state;
           $distributor->contactCountry               =$request->cont_per_country;
           $distributor->contactPostalCode            =$request->cont_per_pincode;
           $distributor->yearOfEstablishment          =$request->yr_of_establishment;
           $distributor->noOfBooksAvailable           =$request->number_of_files_available_in_shop;
           $distributor->publisher                    =json_encode($publishers);
           $distributor->language                     =$request->language_of_books_you_dealing_with;
           $distributor->haveSubsidiary              =$request->subsidiary_distributor_dis;
           $distributor->declaration                 =$request->declaration;
           $distributor->dis_ownership                   = $request->dis_ownership;
           $distributor->bookCatalogue               =$book_proof_name;
           $distributor->usertype                    = $request->usertype;
           $distributor->approved_status="approve";
           $distributor->status="1";
          if ($distributor->save()) {
            $publisher=$distributor;
            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCode));
            $notifi= new Notifications();
            $admin=Admin::first();
            $notifi->message="new user register";
            $notifi->to= $admin->id;
            $notifi->from=$publisher->id;
            $notifi->type="distributor";
            $notifi->save();
            $otps= new Otp();
            $otps->otp=$randomCode;
            $otps->userId= $publisher->id;
            $otps->dateTime= Carbon::now();
            $otps->save();
       } 
       Session::put('publisher',$publisher);
    //    return view('mailconfirm',compact('publisher'));
       return redirect('/mailconfirmation'); 

    }
   
//username check
public function disusernameCheck(Request $request){
    $distributor = Distributor::where('userName','=',$request->userName)->get();
    if(sizeof($distributor) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
}

//email check
public function disemailCheck(Request $request){
    $distributor = Distributor::where('email','=',$request->email)->get();
    if(sizeof($distributor) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
}

  // <!-- ###############################################################################-->
    // <!-- ++++++++++++++++++++++++++Publisher And Distributor+++++++++++++++++++++++++++-->
    // <!-- ###############################################################################-->

    public function pub_dis_create(Request $request)
    {
       

           $validator= Validator::make($request->all(),[
            'usertype'                                              =>['required'],
            'publication_name_dist_name'                            => ['required', 'string', 'max:255'],
            'userName'                                             => ['required', 'string', 'max:255'],
            'password'                                              => ['required', 'string', 'min:8'],
            'publication_first_name'                                =>['required', 'string', 'max:255'],
            'publication_last_name'                                 =>['required', 'string', 'max:255'],
            'publication_email_id'                                  =>['required', 'string','email'],
            'publication_contact_no'                                =>['required','max:10'],
            'publication_address'                                   =>['required', 'string', 'max:255'],
            'publication_city'                                      =>['required', 'string', 'max:255'],
            'publication_district'                                  =>['required', 'string', 'max:255'],
            'publication_state'                                     =>['required', 'string', 'max:255'],
            'publication_country'                                   =>['required', 'string', 'max:255'],
            'publication_pincode'                                   =>['required', 'string', 'max:255'],
            'publication_contact_person_name'                       =>['required', 'string', 'max:255'],
            'publication_person_email_id'                           =>['required', 'string','email'],
            'publication_contact_person_number'                     =>['required','max:10'],
            'publication_contact_person_address'                    =>['required', 'string', 'max:255'],
            'publication_contact_person_city'                       =>['required', 'string', 'max:255'],
            'publication_contact_person_district'                   =>['required', 'string', 'max:255'],
            'publication_contact_person_state'                      =>['required', 'string', 'max:255'],
            'publication_contact_person_country'                    =>['required', 'string', 'max:255'],
            'publication_contact_person_pincode'                    =>['required', 'string', 'max:255'],
            'year_of_establishment'                                 =>['required','max:4'],
            'number_of_books_published_so_for'                      =>['required'],
            'number_of_books_published_latest_year'                 =>['required'],
            'number_of_files_available_your_shop'                     =>['required'],
            'publisher_name.*'                                      =>['required'],
            'publisher_place.*'                                     =>['required'],
            'authorization_letter.*'                                     =>['required'],
            'publication_title.*'                                   =>['required'],
            'publication_author.*'                                  =>['required'],
            'pub_dis_category_of_books_published.*'                 =>['required'],
            'pub_dis_specialized_category_books.*'                    =>['required'],
            'pub_dis_primary_language_of_publication.*'             =>['required'],
            'latest_book_categories'                                =>['required'],
            'pub_dis_ownership'                                      =>['required'],
            'member_in_publishers_yes_old_lby'                      =>['required'],
            'member_in_publishers_yes_old_asrmy'                                           =>['required'],
            // 'trs_state_awarded_dis_pub.*'                           =>['required'],
            // 'trs_central_awarded_dis_pub.*'                         =>['required'],
            'subsidiary_pub_yes'                                    =>['required'],
            'declaration'                                           =>['required'],
        ]);
        if($validator->fails()){
            return $validator->errors();
            // return redirect()->back()->withInput()->withErrors($validator->errors());
           }

           
           $publisher=new PublisherDistributor();
        //top title
                    $title_array = $request->publication_title;
                    $author_array = $request->publication_author;
                    $title_len = sizeof($title_array);
                    $top_titles=[];
                    for($i=0;$i<$title_len;$i++){
                        $obj=(Object)[
                            "title"=>$title_array[$i],
                            "author"=>$author_array[$i],
                        ];
                        array_push($top_titles,$obj);
                    }

       //translatebooks
       if($request->member_in_publishers_yes_old_lby == "yes"){
        if($request->trans_title &&$request->trans_author && $request->trans_from && $request->trans_to ){
            $trs_book_title = $request->trans_title;
            $trs_book_author = $request->trans_author;
            $trs_book_lan_one = $request->trans_from;
            $trs_book_lan_two = $request->trans_to;
            $trans_len = sizeof($trs_book_title);
            $trans_books=[];
            for($i=0;$i<$trans_len;$i++){
                $obj=(Object)[
                    "title"=> $trs_book_title[$i],
                    "author"=>$trs_book_author[$i],
                    "lan_from"=>$trs_book_lan_one[$i],
                    "lan_to"=>$trs_book_lan_two[$i]
                ];
                array_push($trans_books,$obj);
            }
            $publisher->topTranslatedBooks =   json_encode($trans_books);
        }
      
       }
      
         //award
         if($request->member_in_publishers_yes_old_asrmy == "yes"){
            $trs_state_awarded = $request->trs_state_awarded_dis_pub;
            $trs_central_awarded = $request->trs_central_awarded_dis_pub;
           
            $award_len = sizeof($trs_state_awarded);
            $awards=[];
            for($i=0;$i<$award_len;$i++){
                $obj=(Object)[
                    "award_name"=> $trs_state_awarded[$i],
                    "book_title"=>$trs_central_awarded[$i],
                ];
                array_push($awards,$obj);
            }
               
           $publisher->awardTitle                               =   json_encode($awards);
         }
                 

            //    //association
            //    if($request->member_in_publ_dis_yes == "yes"){
            //                 $member_in_publishers_name = $request->member_in_publishers_name;
            //                 $member_in_publishers_id = $request->member_in_publishers_id;
            //                 $mem_len = sizeof($member_in_publishers_name);
            //                 $membership=[];
            //                 for($i=0;$i<$mem_len;$i++){
            //                     $obj=(Object)[
            //                         "association_name"=> $member_in_publishers_name[$i],
            //                         "association_id"=>$member_in_publishers_id[$i],
            //                     ];
            //                     array_push($membership,$obj);
            //                 }
            //     $publisher->association  = json_encode($membership);
            // }
            

    //subsidiary
    if($request->subsidiary_pub_yes == "yes"){
                $subsidiary_publisher_distributor = $request->subsidiary_publisher_distributor;
                $subsidiary_publication_distribution = $request->subsidiary_publication_distribution;
                $stack_holder_percentage = $request->subsidiary_stackpercentage;
                $subsidiary_doc = $request->subsidiary_publication_distribution_file;
                $mem_len = sizeof($subsidiary_publisher_distributor);
            
            $mem_len = sizeof($subsidiary_publisher_distributor);
            $subsidiary=[];
            for($i=0;$i<$mem_len;$i++){
                $pub_doc = $subsidiary_doc[$i];
                $pub_doc_name=$request->publication_first_name.time().'_'.$pub_doc->getClientOriginalName();
                $pub_doc->move(('publisher_and_distributor/images/proof/sub_doc'),$pub_doc_name);  
                $obj=(Object)[
                    "subsidiary_publisher_distributor_name" => $subsidiary_publisher_distributor[$i],
                    "subsidiary_publication_distribution_name"   =>$subsidiary_publication_distribution[$i],
                    "stack_holder_percentage"      =>$stack_holder_percentage[$i],
                    "subsidiary_doc" =>$pub_doc_name
                    ];
                array_push($subsidiary,$obj);
            }
              
         $publisher->subsidiary = json_encode($subsidiary);
        }

        //publisher
                    $pub_name = $request->publisher_name;
                    $pub_place = $request->publisher_place;
                    $letter = $request->authorization_letter;
                    $title_len = sizeof($pub_name);
                    $publishers=[];
                    for($i=0;$i<$title_len;$i++){
                        $auth_letter = $letter[$i];
                        $auth_letter_name=$request->publication_first_name.time().'_'.$auth_letter->getClientOriginalName();
                        $auth_letter->move(('publisher_and_distributor/images/proof/authorization'),$auth_letter_name);  
                        $obj=(Object)[
                            "publisher_name"=>$pub_name[$i],
                            "publisher_place"=>$pub_place[$i],
                            "authorization_letter" =>$auth_letter_name
                        ];
                        array_push($publishers,$obj);
                    }
            // //publication proof
            //         if($request->hasFile('publication_proof'))
            //         {
                       
            //         $path = 'publisher_and_distributor/images/proof/Pub_Dis_Proof'.$request->publication_proof;
            //         if(File::exists($path)){
            //          File::delete($path);
            //         }
            //         $pub_proof = $request->file('publication_proof');
            //         $pub_proof_name= $request->publication_first_name.time().'_'.$pub_proof->getClientOriginalName();
            //         $request->publication_proof->move(('publisher_and_distributor/images/proof/Pub_Dis_Proof'),$pub_proof_name);  
            //     }

            //book catalogue
                 if($request->hasFile('latest_book_categories'))
                 {
                    
                 $path = 'publisher_and_distributor/images/proof/BookCatalogue'.$request->latest_book_categories;
                 if(File::exists($path)){
                  File::delete($path);
                 }
                 $book_proof = $request->file('latest_book_categories');
                 $book_proof_name= $request->publication_first_name.time().'_'.$book_proof->getClientOriginalName();
                 $request->latest_book_categories->move(('publisher_and_distributor/images/proof/BookCatalogue'),$book_proof_name);  
             }

        // //Membership proof
        //       if($request->hasFile('associate_membership_proof'))
        //       {
                  
        //       $path = 'publisher_and_distributor/images/proof/Membership'.$request->associate_membership_proof;
        //       if(File::exists($path)){
        //       File::delete($path);
        //       }
        //       $member_proof = $request->file('associate_membership_proof');
        //       $member_proof_name=$request->publication_first_name.time().'_'.$member_proof->getClientOriginalName();
        //       $request->associate_membership_proof->move(('publisher_and_distributor/images/proof/Membership'),$member_proof_name);  
        //   }
        //    //ownership proof

        //         if($request->hasFile('rel_doc'))
        //         {
                    
        //         $path = 'publisher_and_distributor/images/proof/Ownership'.$request->rel_doc;
        //         if(File::exists($path)){
        //         File::delete($path);
        //         }
        //         $owner_proof = $request->file('rel_doc');
        //         $owner_proof_name=$request->publication_first_name.time().'_'.$owner_proof->getClientOriginalName();
        //         $request->rel_doc->move(('publisher_and_distributor/images/proof/Ownership'),$owner_proof_name);  
        //     }
             //ownership proof
          //gst
          if($request->hasFile('gst'))
          {
              
          $path = 'publisher_and_distributor/images/proof/gst'.$request->gst;
          if(File::exists($path)){
          File::delete($path);
          }
          $gst_proof = $request->file('gst');
          $gst_proof_name= $request->pub_first_name.time().'_'.$gst_proof->getClientOriginalName();
          $request->gst->move(('publisher_and_distributor/images/proof/gst'),$gst_proof_name);  
          $publisher->gstProof = $gst_proof_name;
      }
      //udyam
      if($request->hasFile('udayam'))
      {
          
      $path = 'publisher_and_distributor/images/proof/udayam'.$request->udayam;
      if(File::exists($path)){
      File::delete($path);
      }
      $udayam_proof = $request->file('udayam');
      $udayam_proof_name= $request->pub_first_name.time().'_'.$udayam_proof->getClientOriginalName();
      $request->udayam->move(('publisher_and_distributor/images/proof/udayam'),$udayam_proof_name);  
      $publisher->udyamProof =  $udayam_proof_name;
  }

             //certification_incon
             if($request->hasFile('certification_incon'))
             {
                 
             $path = 'publisher_and_distributor/images/proof/certification_incon'.$request->certification_incon;
             if(File::exists($path)){
             File::delete($path);
             }
             $certification_incon_proof = $request->file('certification_incon');
             $certification_incon_proof_name= $request->pub_first_name.time().'_'.$certification_incon_proof->getClientOriginalName();
             $request->certification_incon->move(('publisher_and_distributor/images/proof/certification_incon'),$certification_incon_proof_name);  
             $publisher->certificationIncorporationProof =  $certification_incon_proof_name;
          }

          //pan_tan
          if($request->hasFile('pan_tan'))
          {
              
          $path = 'publisher_and_distributor/images/proof/pan_tan'.$request->pan_tan;
          if(File::exists($path)){
          File::delete($path);
          }
          $pan_tan_proof = $request->file('pan_tan');
          $pan_tan_proof_name= $request->pub_first_name.time().'_'.$pan_tan_proof->getClientOriginalName();
          $request->pan_tan->move(('publisher_and_distributor/images/proof/pan_tan'),$pan_tan_proof_name);  
          
          $publisher->panOrTanProof=  $pan_tan_proof_name;
      }
          //cgReg
          if($request->hasFile('cgReg'))
          {
               
          $path = 'publisher_and_distributor/images/proof/cgReg'.$request->cgReg;
          if(File::exists($path)){
          File::delete($path);
          }
          $cgReg_proof = $request->file('cgReg');
          $cgReg_proof_name= $request->pub_first_name.time().'_'.$cgReg_proof->getClientOriginalName();
          $request->cgReg->move(('publisher_and_distributor/images/proof/cgReg'),$cgReg_proof_name);  
          $publisher->certificationRegistrationProof  =   $cgReg_proof_name;
          }
      //pan_deed
      if($request->hasFile('pan_deed'))
      {
          
      $path = 'publisher_and_distributor/images/proof/pan_deed'.$request->pan_deed;
      if(File::exists($path)){
      File::delete($path);
      }
      $pan_deed_proof = $request->file('pan_deed');
      $pan_deed_proof_name= $request->pub_first_name.time().'_'.$pan_deed_proof->getClientOriginalName();
      $request->pan_deed->move(('publisher_and_distributor/images/proof/pan_deed'),$pan_deed_proof_name); 
      $publisher->partnershipDeedProof  =   $pan_deed_proof_name; 
      }

       //llp_agre
       if($request->hasFile('llp_agre'))
       {
          
       $path = 'publisher_and_distributor/images/proof/llp_agre'.$request->llp_agre;
       if(File::exists($path)){
       File::delete($path);
       }
       $llp_agre_proof = $request->file('llp_agre');
       $llp_agre_proof_name= $request->pub_first_name.time().'_'.$llp_agre_proof->getClientOriginalName();
       $request->llp_agre->move(('publisher_and_distributor/images/proof/llp_agre'),$llp_agre_proof_name);  
       $publisher->llpProof  =   $llp_agre_proof_name; 
       }
      //moa
      if($request->hasFile('moa'))
      {
           
      $path = 'publisher_and_distributor/images/proof/moa'.$request->moa;
      if(File::exists($path)){
      File::delete($path);
      }
      $moa_proof = $request->file('moa');
      $moa_proof_name= $request->pub_first_name.time().'_'.$moa_proof->getClientOriginalName();
      $request->moa->move(('publisher_and_distributor/images/proof/moa'),$moa_proof_name);  
      $publisher->moaProof    =   $moa_proof_name; 
      }

        //aoa
        if($request->hasFile('aoa'))
        {
        
        $path = 'publisher_and_distributor/images/proof/aoa'.$request->aoa;
        if(File::exists($path)){
        File::delete($path);
        }
        $aoa_proof = $request->file('aoa');
        $aoa_proof_name= $request->pub_first_name.time().'_'.$aoa_proof->getClientOriginalName();
        $request->aoa->move(('publisher_and_distributor/images/proof/aoa'),$aoa_proof_name);
        $publisher->aoaProof    =  $aoa_proof_name; 
        }
//private_society
         if($request->hasFile('private_society'))
         {
             
         $path = 'publisher_and_distributor/images/proof/privatesociety'.$request->private_society;
         if(File::exists($path)){
         File::delete($path);
         }
         $private_society_proof = $request->file('private_society');
         $private_society_proof_name= $request->pub_first_name.time().'_'.$private_society_proof->getClientOriginalName();
         $request->private_society->move(('publisher_and_distributor/images/proof/privatesociety'),$private_society_proof_name);  
         $publisher->privateSocietyProof =  $private_society_proof_name;
     }
     //private_trust
     if($request->hasFile('private_trust'))
     {
         
     $path = 'publisher_and_distributor/images/proof/privatetrust'.$request->private_trust;
     if(File::exists($path)){
     File::delete($path);
     }
     $private_trust_proof = $request->file('private_trust');
     $private_trust_proof_name= $request->pub_first_name.time().'_'.$private_trust_proof->getClientOriginalName();
     $request->private_trust->move(('publisher_and_distributor/images/proof/privatetrust'),$private_trust_proof_name);  
     $publisher->privateTrustProof =  $private_trust_proof_name;
 }
      //institution
      if($request->hasFile('institution'))
      {
          
      $path = 'publisher_and_distributor/images/proof/institution'.$request->institution;
      if(File::exists($path)){
      File::delete($path);
      }
      $institution_proof = $request->file('institution');
      $institution_proof_name= $request->pub_first_name.time().'_'.$institution_proof->getClientOriginalName();
      $request->institution->move(('publisher_and_distributor/images/proof/institution'),$institution_proof_name);  
      $publisher->institutionProof =  $institution_proof_name;
  }
        //trust_foundation
        if($request->hasFile('trust_foundation'))
        {
            
        $path = 'publisher_and_distributor/images/proof/trustfoundation'.$request->trust_foundation;
        if(File::exists($path)){
        File::delete($path);
        }
        $trust_foundation_proof = $request->file('trust_foundation');
        $trust_foundation_proof_name= $request->pub_first_name.time().'_'.$trust_foundation_proof->getClientOriginalName();
        $request->trust_foundation->move(('publisher_and_distributor/images/proof/trustfoundation'),$trust_foundation_proof_name);  
        $publisher->trustFoundationProof =  $trust_foundation_proof_name;
    }
         //govt society
         if($request->hasFile('society'))
         {
             
         $path = 'publisher_and_distributor/images/proof/society'.$request->society;
         if(File::exists($path)){
         File::delete($path);
         }
         $society_proof = $request->file('society');
         $society_proof_name= $request->pub_first_name.time().'_'.$society_proof->getClientOriginalName();
         $request->society->move(('publisher_and_distributor/images/proof/society'),$society_proof_name);  
         $publisher->societyProof =  $society_proof_name;
     }

      //special category
                $special = $request->pub_dis_specialized_category_books;
                foreach ($special as $key=>$val){
                if($val == "Other"){
                    $publisher->otherSpecial  = $request->otherSpecial;
                }
                }
     //language
                $lang = $request->pub_dis_primary_language_of_publication;
                foreach ($lang as $key=>$val){
                if($val == "others"){
                    $publisher->otherIndian  = $request->otherIndian;
                }
                else if($val == "otherForeign"){
                    $publisher->otherForeign  = $request->otherForeign;
                }
                }

           $publisher->publicationDistributionName              =$request->publication_name_dist_name;
           $publisher->userName                                 =  $request->userName;
           $publisher->password                                 =  Hash::make($request->password);
           $publisher->firstName                                =  $request->publication_first_name;
           $publisher->lastName                                 =  $request->publication_last_name;
           $publisher->email                                    =  $request->publication_email_id;
           $publisher->mobileNumber                             =  $request->publication_contact_no;
           $publisher->publicationDistributionAddress           =  $request->publication_address;
           $publisher->city                                     =  $request->publication_city;
           $publisher->District                                 =  $request->publication_district;
           $publisher->state                                    =  $request->publication_state;
           $publisher->country                                  =  $request->publication_country;
           $publisher->postalCode                               =  $request->publication_pincode;
           $publisher->contactName                              =  $request->publication_contact_person_name;
           $publisher->contactEmail                             =  $request->publication_person_email_id;
           $publisher->contactMobileNumber                      =  $request->publication_contact_person_number;
           $publisher->contactAddress                           =  $request->publication_contact_person_address;
           $publisher->contactCity                              =  $request->publication_contact_person_city;
           $publisher->contactDistrict                          =  $request->publication_contact_person_district;
           $publisher->contactState                             =  $request->publication_contact_person_state;
           $publisher->contactCountry                           =  $request->publication_contact_person_country;
           $publisher->contactPostalCode                        =  $request->publication_contact_person_pincode;
           $publisher->yearOfEstablishment                      =  $request->year_of_establishment;
           $publisher->bookCountSoFar                           =  $request->number_of_books_published_so_for;
           $publisher->bookCountLast3                           =  $request->number_of_books_published_latest_year;
           $publisher->noOfBooksAvailable                       =  $request->number_of_files_available_your_shop;
           $publisher->topTitles                                =  json_encode($top_titles);
           $publisher->publishers                               =   json_encode($publishers);
           $publisher->bookCategories                           =  $request->pub_dis_category_of_books_published;
           $publisher->specialCategories                        =  $request->pub_dis_specialized_category_books;
           $publisher->language                                 =  $request->pub_dis_primary_language_of_publication;
           $publisher->pubOwnership                             =  $request->pub_dis_ownership;
           $publisher->haveSubsidiary                           =  $request->subsidiary_pub_yes;
           $publisher->declaration                              =  $request->declaration;
           $publisher->bookCatalogue                            =  $book_proof_name;
           $publisher->usertype                                 =   $request->usertype;
           $publisher->have_translated_books                    = $request->member_in_publishers_yes_old_lby;
           $publisher->have_award_title                         = $request ->member_in_publishers_yes_old_asrmy; 
           $publisher->approved_status="approve";
           $publisher->status="1";
          if ( $publisher->save()) {
          
            $randomCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
            Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCode));
            $notifi= new Notifications();
            $admin=Admin::first();
            $notifi->message="new user register";
            $notifi->to= $admin->id;
            $notifi->from=$publisher->id;
            $notifi->type="publisher_distributor";
            $notifi->save();
            $otps= new Otp();
            $otps->otp=$randomCode;
            $otps->userId= $publisher->id;
            $otps->dateTime= Carbon::now();
            $otps->save();
       } 
       Session::put('publisher',$publisher);
    //    return view('mailconfirm',compact('publisher'));
       return redirect('/mailconfirmation'); 

       
           

    }
   //username check
public function pub_dis_usernameCheck(Request $request){
    $distributor = PublisherDistributor::where('userName','=',$request->userName)->get();
    if(sizeof($distributor) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
}

//email check
public function pub_dis_emailCheck(Request $request){
    $distributor = PublisherDistributor::where('email','=',$request->email)->get();
    if(sizeof($distributor) == 0){
        return response()->json(['success'=>"true"]);
    }else{
        return response()->json(['error'=>"true"]);
    }
} 

      
public function publicregister(Request $req){
     

        
    $validator = Validator::make($req->all(),[
      
        'name'=>'required|string',
        'phoneNumber'=>'required|string|min:10|max:10',
        'email'=>'required|unique:reviewer',
        'membershipId'=>'required',
        'district'=>'required',
        'password'=>'required|min:8|max:8',
    ]);

    if($validator->fails()){
        $data= [
            'error' => $validator->errors()->first(),
                 ];
        return response()->json($data);  
       
    }
    
        $reviewer=new Reviewer();
        $reviewer->reviewerType = "public";
        $reviewer->name = $req->name;
        $reviewer->email = $req->email;
        $reviewer->phoneNumber = $req->phoneNumber; 
        $reviewer->membershipId = $req->membershipId;
        $reviewer->district = $req->district;

        $reviewer->password=Hash::make($req->password);
        $reviewer->role = "reviewer";
        $randomCode = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        $reviewer->reviewerId= $randomCode;
        if($reviewer->save()){
          
            $publisher=Reviewer::find($reviewer->id);
            $publisher->firstName=$publisher->name;
            $publisher->usertype=$publisher->role;
             $randomCod = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);
             Notification::route('mail',  $publisher->email)->notify(new UserCreatedNotification($publisher, $publisher->password,$randomCod));
             $otps= new Otp();
             $otps->otp=$randomCod;
             $otps->userId= $publisher->id;
             $otps->dateTime= Carbon::now();
             $otps->save();
             \Session::put('publisher', $publisher);
               $data= [
                     'success' =>'Otp Resend Successfully'
                           ];
            return response()->json($data); 
  }
        }

        public function getDistricts(Request $request)
        {
            $stateId = $request->state_id;
            $state = State::where('name',$stateId)->first();
            $districts = District::where('state_id', $state->id)->get();
            
            return response()->json(['districts' => $districts]);
        }
      
    }
      


