<?php

namespace App\Http\Controllers\Periodicalauth;

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

    public function index(){
        if(Session::has('validation_error')){
            Session::forget('validation_error');
        }
        if(Session::has('error')){
            Session::forget('error');
        }
        return view('periodicalnewindex');
    }
    public function showRegistrationForm(Request $request)
    {
        if ($request->isMethod('GET')) {
          
            $user = $request->session()->get('usertype'); 
            $state = State::all();
            $district = District::all();
            $country = Country::where('status', 1)->get();
            if($user == "publisher"){
                return view('Auth.register', compact('state', 'district', 'country', 'user'));
            }else{
                return view('Auth.register', compact('state', 'district', 'country', 'user'));
            }
           

        } elseif ($request->isMethod('POST')) {
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            $user= $request->usertype;
            $state = State::all();
           $district = District ::all();
           $country = Country ::where('status','=',1)->get();
           if($user == "publisher"){
            return view('Auth.register', compact('state', 'district', 'country', 'user'));
        }else{
            return view('Auth.register', compact('state', 'district', 'country', 'user'));
        }
          
        }
        
    }

    // <!-- ###############################################################################-->
    // <!-- ++++++++++++++++++++++++++Publisher +++++++++++++++++++++++++++-->
    // <!-- ###############################################################################-->

  public function pub_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usertype'                                  => 'required',
            'publication_name'                          => 'required|string|max:255',
            'userName'                                  => 'required|string|max:255|unique:publishers',
            'password'                                  => 'required|string|min:8',
            'pub_first_name'                            => 'required|string|max:255',
            'pub_last_name'                             => 'required|string|max:255',
            'email'                                     => 'required|string|email|unique:publishers',
            'contact_number'                            => 'required|string|max:10',
            'pub_address'                               => 'required|string|max:255',
            'pub_city'                                  => 'required|string|max:255',
            'pub_district'                              => 'required|string|max:255',
            'pub_state'                                 => 'required|string|max:255',
            'pub_country'                               => 'required|string|max:255',
            'pub_pin_code'                              => 'required|string|max:255',
            'contact_person_name'                       => 'required|string|max:255',
            'con_email_id'                              => 'required|string|email',
            'con_contact_number'                        => 'required|string|max:10',
            'con_publication_address'                   => 'required|string|max:255',
            'con_city'                                  => 'required|string|max:255',
            'con_district'                              => 'required|string|max:255',
            'con_state'                                 => 'required|string|max:255',
            'con_country'                               => 'required|string|max:255',
            'con_pin_code'                              => 'required|string|max:255',
            'publication_shop_established_year'         => 'required|numeric|max:'.date('Y'),
            'number_of_books_published_so_for'          => 'required|numeric',
            'number_of_books_published_latest_year'     => 'required|numeric',
            'publications_shope_book_title'              => 'required|array',
            'publications_shope_book_author'             => 'required|array',
            'member_in_publishers_yes_old'              => 'required',
            'member_in_publishers_yes_old_asr'          => 'required',
            'category_of_books_published'               => 'required|array',
            'specialized_category_books'                 => 'required|array',
            'primary_language_of_publication'            => 'required|array',
            'latest_book_categories'                     => 'required|mimes:xls,xlsx',
            'pub_ownership'                             => 'required',
            'subsidiary_publications'                   => 'required',
            'declaration'                               => 'required',
            'declaration-two'                           => 'required',
            'declaration-three'                         => 'required',
            'declaration-four'                          => 'required',
        ], [
            'usertype.required'                         => 'The user type is required.',
            'publication_name.required'                 => 'The publication name is required.',
            'userName.required'                         => 'The username is required.',
            'userName.unique'                           => 'The username has already been taken.',
            'password.required'                         => 'The password is required.',
            'password.min'                              => 'The password must be at least 8 characters.',
            'pub_first_name.required'                   => 'The publisher\'s first name is required.',
            'pub_last_name.required'                    => 'The publisher\'s last name is required.',
            'email.required'                            => 'The email address is required.',
            'email.email'                               => 'Please provide a valid email address.',
            'email.unique'                              => 'The email address has already been taken.',
            'contact_number.required'                   => 'The contact number is required.',
            'contact_number.max'                        => 'The contact number must be at most 10 characters long.',
            'pub_address.required'                      => 'The publisher\'s address is required.',
            'pub_city.required'                         => 'The city is required.',
            'pub_district.required'                     => 'The district is required.',
            'pub_state.required'                        => 'The state is required.',
            'pub_country.required'                      => 'The country is required.',
            'pub_pin_code.required'                     => 'The pin code is required.',
            'contact_person_name.required'              => 'The contact person\'s name is required.',
            'con_email_id.required'                     => 'The contact person\'s email is required.',
            'con_email_id.email'                        => 'Please provide a valid email address for the contact person.',
            'con_contact_number.required'               => 'The contact person\'s number is required.',
            'con_contact_number.max'                    => 'The contact person\'s number must be at most 10 characters long.',
            'con_publication_address.required'          => 'The contact person\'s address is required.',
            'con_city.required'                         => 'The contact person\'s city is required.',
            'con_district.required'                     => 'The contact person\'s district is required.',
            'con_state.required'                        => 'The contact person\'s state is required.',
            'con_country.required'                      => 'The contact person\'s country is required.',
            'con_pin_code.required'                     => 'The contact person\'s pin code is required.',
            'publication_shop_established_year.required' => 'The establishment year is required.',
            'publication_shop_established_year.max'      => 'The establishment year cannot be in the future.',
            'number_of_books_published_so_for.required'  => 'The number of books published so far is required.',
            'number_of_books_published_latest_year.required' => 'The number of books published in the latest 3 years is required.',
            'publications_shope_book_title.required'   => 'Best Seller Titles in Your Publication\'s title is required.',
            'publications_shope_book_author.required'  => 'Best Seller Titles in Your Publication\'s author is required.',
            'member_in_publishers_yes_old.required'      => 'Please specify if you have a list of the top 5 translated books.',
            'member_in_publishers_yes_old_asr.required'  => 'Please indicate if there are any awarded titles in your publication',
            'category_of_books_published.required'       => 'Please select at least one category of books.',
            'specialized_category_books.required'      => 'The specialized category of each book published is required.',
            'primary_language_of_publication.required' => 'The primary language of publication for each book is required.',
            'latest_book_categories.required'            => 'The book catalogue file is required.',
            'latest_book_categories.mimes'               => 'The book catalogue must be a file of type: xls, xlsx.',
            'pub_ownership.required'                    => 'The publication ownership information is required.',
            'subsidiary_publications.required'           => 'Please specify if there are any subsidiary publications.',
            'declaration.required'                       => 'Please agree to the first declaration.',
            'declaration-two.required'                       => 'Please agree to the second declaration.',
            'declaration-three.required'                       => 'Please agree to the third declaration.',
            'declaration-four.required'                       => 'Please agree to the fourth declaration.',
        ]);
      
        if ($validator->fails()) {
            $errors = $validator->errors();
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('validation_error',$errors);
            return redirect()->route('register.form')->with('usertype', $request->usertype);
        }
       
        //Best Seller Titles
            if ($request->has('publications_shope_book_title') && $request->has('publications_shope_book_author')  &&
            count(array_filter($request->publications_shope_book_title)) !=0  && count(array_filter($request->publications_shope_book_author)) != 0 )  {
               
                    // Check if all fields have the same count
                $stateCount = count(array_filter($request->publications_shope_book_title));
                $centralCount = count(array_filter($request->publications_shope_book_author));
                if ($stateCount == $centralCount) {
                } else {
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'The number of elements in best seller titles in your publications fields must be the same.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
          
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'All fields in best seller titles in your publications are required and must not be empty.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
               
            }

        //Best Translated Books
        if ($request->member_in_publishers_yes_old == 'yes') {
            
            // Check if all fields are present and not empty
            if ($request->has('trans_title') && $request->has('trans_author') && $request->has('trans_from') && $request->has('trans_to') &&
            count(array_filter($request->trans_title)) !=0  && count(array_filter($request->trans_author)) != 0 && count(array_filter($request->trans_from)) != 0 && count(array_filter($request->trans_to)) != 0)  {
               
                    // Check if all fields have the same count
                $titleCount = count(array_filter($request->trans_title));
                $authorCount = count(array_filter($request->trans_author));
                $fromCount = count(array_filter($request->trans_from));
                $toCount = count(array_filter($request->trans_to));
                
                if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                } else {
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'The number of elements in translated books fields must be the same.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
          
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'All fields in translated books are required and must not be empty.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
               
            }
        }

        //Awarded Titles
        if ($request->member_in_publishers_yes_old_asr == 'yes') {
            
            // Check if all fields are present and not empty
            if ($request->has('trs_state_awarded') && $request->has('trs_central_awarded')  &&
            count(array_filter($request->trs_state_awarded)) !=0  && count(array_filter($request->trs_central_awarded)) != 0 )  {
               
                    // Check if all fields have the same count
                $stateCount = count(array_filter($request->trs_state_awarded));
                $centralCount = count(array_filter($request->trs_central_awarded));
                if ($stateCount == $centralCount) {
                } else {
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'The number of elements in awarded titles in your publications fields must be the same.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
          
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'All fields in awarded titles in your publications are required and must not be empty.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
               
            }
        }

          //ownership proof
           if($request->pub_ownership =="Partnership"){
            if($request->hasFile('pan_tan') && $request->hasFile('pan_deed')){
                $validator = Validator::make($request->all(), [
                    'pan_tan' => 'required',
                    'pan_deed' => 'required',
                    'udayam' => 'nullable', // Allow udayam file if uploaded, and validate it as PDF
                    'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
                ], [
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                   
                    'pan_deed.required' => 'The Partnership Deed document file is required.',
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                      if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                    Session::put('validation_error', $errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="Private"){
            if($request->hasFile('pan_tan') && $request->hasFile('certification_incon')){
                $validator = Validator::make($request->all(), [
                    'pan_tan' => 'required', 
                    'certification_incon' => 'required', 
                    'moa' => 'nullable', // Allow moa file if uploaded, and validate it as PDF
                    'aoa' => 'nullable', // Allow aoa file if uploaded, and validate it as PDF
                    'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
                ], [
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                  
                    'certification_incon.required' => 'The Certification document file is required.',
                 
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error', $errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="Publication"){
            if( $request->hasFile('certification_incon') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'certification_incon' => 'required',
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                   
                    'certification_incon.required' => 'The Certification document file is required.',
                  
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="oneperson"){
            if( $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'pan_tan' => 'required', 
                    'gst' => 'nullable', 
                    'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
                ], [
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                  
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="limited"){
            if(  $request->hasFile('pan_tan')&& $request->hasFile('llp_agre')){
                $validator = Validator::make($request->all(), [
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'llp_agre' => 'required', // Ensure LLP Agreement document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
                ], [
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                  
                    'llp_agre.required' => 'The LLP Agreement document file is required.',
                  
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="trust"){
            if( $request->hasFile('private_trust') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'private_trust' => 'required', // Ensure Private Trust document is a PDF file
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'private_trust.required' => 'The Private Trust document file is required.',
                
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                    
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="society"){
            if($request->hasFile('private_society') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'private_society' => 'required', // Ensure Private Society document is a PDF file
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'private_society.required' => 'The Private Society document file is required.',
                  
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                   
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="institutional"){
            if( $request->hasFile('institution') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'institution' => 'required', // Ensure Institutional document is a PDF file
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'institution.required' => 'The Institutional document file is required.',
                  
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                   
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="trust-foundation"){
            if( $request->hasFile('trust_foundation') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'trust_foundation' => 'required', // Ensure Trust/Foundation document is a PDF file
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'trust_foundation.required' => 'The Trust/Foundation document file is required.',
                 
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                    
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }
           if($request->pub_ownership =="government-society"){
            if( $request->hasFile('society') && $request->hasFile('pan_tan')){
                $validator = Validator::make($request->all(), [
                    'society' => 'required', // Ensure Society document is a PDF file
                    'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                    'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                ], [
                    'society.required' => 'The Society document file is required.',
                    'pan_tan.required' => 'The PAN/TAN document file is required.',
                ]);
        
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('validation_error',$errors);
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            }else{
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                    Session::put('error', 'Publication Ownership Documents required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
            }

           }

           //Subsidiary Publications

            if ($request->subsidiary_publications== 'yes') {
            if ($request->has('name_of_the_subsidiary_publication') && $request->has('name_of_the_subsidiary_publisher') && $request->has('stack_holder_percentage') && $request->has('subsidiary_doc') &&
            count(array_filter($request->name_of_the_subsidiary_publication)) !=0  && count(array_filter($request->name_of_the_subsidiary_publisher)) != 0 && count(array_filter($request->stack_holder_percentage)) != 0 && count(array_filter($request->subsidiary_doc)) != 0)  {
               
                    // Check if all fields have the same count
                $titleCount = count(array_filter($request->name_of_the_subsidiary_publication));
                $authorCount = count(array_filter($request->name_of_the_subsidiary_publisher));
                $fromCount = count(array_filter($request->stack_holder_percentage));
                $toCount = count(array_filter($request->subsidiary_doc));
                
                if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                    $validator = Validator::make($request->all(), [
                        'subsidiary_doc.*' => 'required',
                    ], [
                        'subsidiary_doc.*.required' => 'The subsidiary document file is required.',
                        
                    ]);
        
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                            Session::put('validation_error',$errors);
                            return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'The number of elements in subsidiary publication fields must be the same.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
          
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'All fields in subsidiary publication are required and must not be empty.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
               
            }
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
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error', 'Best translated books required');
            return redirect()->route('register.form')->with('usertype', $request->usertype);
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
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error', 'Awarded title details required');
            return redirect()->route('register.form')->with('usertype', $request->usertype);
         }
           
         }
           
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

                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'Subsidiary details required');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                   
                }
                    
                }
 

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
           if(Session::has('validation_error')){
            Session::forget('validation_error');
        }
        if(Session::has('error')){
            Session::forget('error');
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
        $validator = Validator::make($request->all(), [
            'usertype' => 'required',
            'book_dis_company_name' => ['required', 'string', 'max:255'],
            'userName' => ['required', 'string', 'max:255', 'unique:distributors'],
            'password' => ['required', 'string', 'min:8'],
            'distn_first_name' => ['required', 'string', 'max:255'],
            'distn_last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:distributors'],
            'distn_contact_number' => ['required', 'max:10'],
            'distn_address' => ['required', 'string', 'max:255'],
            'distn_city' => ['required', 'string', 'max:255'],
            'distn_district' => ['required', 'string', 'max:255'],
            'distn_state' => ['required', 'string', 'max:255'],
            'distn_country' => ['required', 'string', 'max:255'],
            'distn_pincode' => ['required', 'string', 'max:255'],
            'contact_person_name' => ['required', 'string', 'max:255'],
            'cont_per_email_id' => ['required', 'string', 'email'],
            'cont_per_contact_no' => ['required', 'max:10'],
            'cont_per_address' => ['required', 'string', 'max:255'],
            'cont_per_city' => ['required', 'string', 'max:255'],
            'cont_per_district' => ['required', 'string', 'max:255'],
            'cont_per_state' => ['required', 'string', 'max:255'],
            'cont_per_country' => ['required', 'string', 'max:255'],
            'cont_per_pincode' => ['required', 'string', 'max:255'],
            'yr_of_establishment' => ['required', 'max:4'],
            'number_of_files_available_in_shop' => ['required'],
            'language_of_books_you_dealing_with' => ['required'],
            'publisher_name.*' => ['required', 'nullable', 'string', 'max:255'],
            'publisher_place.*' => ['required', 'nullable', 'string', 'max:255'],
            'authorization_letter'                                   => ['required','array'],
            'latest_book_categories' => ['required', 'mimes:xls,xlsx'],
            'subsidiary_distributor_dis' => ['required'],
            'dis_ownership' => ['required'],
            'declaration' => ['required'],
            'declaration-two' => ['required'],
            'declaration-three' => ['required'],
            'declaration-four' => ['required'],
        ], [
            'usertype.required' => 'Please specify the user type.',
            'book_dis_company_name.required' => 'Please provide the distribution company name.',
            'userName.required' => 'Please provide the username.',
            'userName.unique' => 'The username has already been taken.',
            'password.required' => 'Please provide the password.',
            'password.min' => 'The password must be at least 8 characters.',
            'distn_first_name.required' => 'Please provide the distributor\'s first name.',
            'distn_last_name.required' => 'Please provide the distributor\'s last name.',
            'distn_email_id.required' => 'Please provide the distributor\'s email.',
            'distn_email_id.email' => 'Please provide a valid email address for the distributor.',
            'distn_email_id.unique' => 'The email address has already been taken.',
            'distn_contact_number.required' => 'Please provide the distributor\'s contact number.',
            'distn_address.required' => 'Please provide the distributor\'s address.',
            'distn_city.required' => 'Please provide the distributor\'s city.',
            'distn_district.required' => 'Please provide the distributor\'s district.',
            'distn_state.required' => 'Please provide the distributor\'s state.',
            'distn_country.required' => 'Please provide the distributor\'s country.',
            'distn_pincode.required' => 'Please provide the distributor\'s pin code.',
            'contact_person_name.required' => 'Please provide the contact person\'s name.',
            'cont_per_email_id.required' => 'Please provide the contact person\'s email.',
            'cont_per_email_id.email' => 'Please provide a valid email address for the contact person.',
            'cont_per_contact_no.required' => 'Please provide the contact person\'s contact number.',
            'cont_per_address.required' => 'Please provide the contact person\'s address.',
            'cont_per_city.required' => 'Please provide the contact person\'s city.',
            'cont_per_district.required' => 'Please provide the contact person\'s district.',
            'cont_per_state.required' => 'Please provide the contact person\'s state.',
            'cont_per_country.required' => 'Please provide the contact person\'s country.',
            'cont_per_pincode.required' => 'Please provide the contact person\'s pin code.',
            'yr_of_establishment.required' => 'Please provide the year of establishment.',
            'number_of_files_available_in_shop.required' => 'Please provide the number of files available in the shop.',
            'language_of_books_you_dealing_with.required' => 'Please provide the language of books you are dealing with.',
            'publisher_name.*.required'                         => 'Publisher name is required.',
            'publisher_place.*.required'                        => 'Publisher place is required.',
            'authorization_letter.required'                   => 'Authorization letter is required.',
            'latest_book_categories.required' => 'The latest book categories file is required.',
            'latest_book_categories.mimes' => 'The latest book categories file must be an Excel file (XLS or XLSX).',
            'subsidiary_distributor_dis.required' => 'Subsidiary distributor dis is required.',
            'dis_ownership.required' => 'Distribution ownership is required.',
            'declaration.required' => 'Declaration is required.',
            'declaration-two.required' => 'Second declaration is required.',
            'declaration-three.required' => 'Third declaration is required.',
            'declaration-four.required' => 'Fourth declaration is required.']);
        
        if($validator->fails()){
            $errors = $validator->errors();
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('validation_error',$errors);
            return redirect()->route('register.form')->with('usertype', $request->usertype);
           }

    //publisher in distribution
        if ($request->has('publisher_name') && $request->has('publisher_place')  && $request->has('authorization_letter') &&
        count(array_filter($request->publisher_name)) !=0  && count(array_filter($request->publisher_place)) != 0 && count(array_filter($request->authorization_letter)) != 0)  {
           
                // Check if all fields have the same count
            $titleCount = count(array_filter($request->publisher_name));
            $authorCount = count(array_filter($request->publisher_place));
            $toCount = count(array_filter($request->authorization_letter));
            
            if ($titleCount == $authorCount && $titleCount == $toCount) {
                $validator = Validator::make($request->all(), [
                    'authorization_letter.*' => 'required',
                ], [
                    'authorization_letter.*.required' => 'The authorization letter is required.',
                ]);
    
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'The number of elements in publisher in distribution fields must be the same.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        } else {
      
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error', 'All fields in publisher in distribution are required and must not be empty.');
            return redirect()->route('register.form')->with('usertype', $request->usertype);
           
        }

//Distribution ownership
     //ownership proof
     if($request->dis_ownership =="Partnership"){
        if($request->hasFile('pan_tan') && $request->hasFile('pan_deed')){
            $validator = Validator::make($request->all(), [
                'pan_tan' => 'required',
                'pan_deed' => 'required',
                'udayam' => 'nullable', // Allow udayam file if uploaded, and validate it as PDF
                'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
            ], [
                'pan_tan.required' => 'The PAN/TAN document file is required.',
               
                'pan_deed.required' => 'The Partnership Deed document file is required.',
               
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error', $errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="Private"){
        if($request->hasFile('pan_tan') && $request->hasFile('certification_incon')){
            $validator = Validator::make($request->all(), [
                'pan_tan' => 'required', 
                'certification_incon' => 'required', 
                'moa' => 'nullable', // Allow moa file if uploaded, and validate it as PDF
                'aoa' => 'nullable', // Allow aoa file if uploaded, and validate it as PDF
                'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
            ], [
                'pan_tan.required' => 'The PAN/TAN document file is required.',
             
                'certification_incon.required' => 'The Certification document file is required.',
              
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error', $errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="Publication"){
        if( $request->hasFile('certification_incon') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'certification_incon' => 'required', // Ensure Certification document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'pan_tan.required' => 'The PAN/TAN document file is required.',
              
                'certification_incon.required' => 'The Certification document file is required.',
              
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="oneperson"){
        if( $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
            ], [
                'pan_tan.required' => 'The PAN/TAN document file is required.',
              
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="limited"){
        if(  $request->hasFile('pan_tan')&& $request->hasFile('llp_agre')){
            $validator = Validator::make($request->all(), [
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'llp_agre' => 'required', // Ensure LLP Agreement document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
            ], [
                'pan_tan.required' => 'The PAN/TAN document file is required.',
                
                'llp_agre.required' => 'The LLP Agreement document file is required.',
              
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="trust"){
        if( $request->hasFile('private_trust') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'private_trust' => 'required', // Ensure Private Trust document is a PDF file
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'private_trust.required' => 'The Private Trust document file is required.',
             
                'pan_tan.required' => 'The PAN/TAN document file is required.',
              
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="society"){
        if($request->hasFile('private_society') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'private_society' => 'required', // Ensure Private Society document is a PDF file
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'private_society.required' => 'The Private Society document file is required.',
               
                'pan_tan.required' => 'The PAN/TAN document file is required.',
                
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="institutional"){
        if( $request->hasFile('institution') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'institution' => 'required', // Ensure Institutional document is a PDF file
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'institution.required' => 'The Institutional document file is required.',
                
                'pan_tan.required' => 'The PAN/TAN document file is required.',
                
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="trust-foundation"){
        if( $request->hasFile('trust_foundation') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'trust_foundation' => 'required', // Ensure Trust/Foundation document is a PDF file
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'trust_foundation.required' => 'The Trust/Foundation document file is required.',
               
                'pan_tan.required' => 'The PAN/TAN document file is required.',
               
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }
       if($request->dis_ownership =="government-society"){
        if( $request->hasFile('society') && $request->hasFile('pan_tan')){
            $validator = Validator::make($request->all(), [
                'society' => 'required', // Ensure Society document is a PDF file
                'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
            ], [
                'society.required' => 'The Society document file is required.',
              
                'pan_tan.required' => 'The PAN/TAN document file is required.',
                
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        }else{
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
                Session::put('error', 'Publication Ownership Documents required');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
        }

       }

       //Subsidiary Publications

        if ($request->subsidiary_distributor_dis== 'yes') {
        if ($request->has('substidiary_name_account_transaction_content_distributor') && $request->has('substidiary_name_account_transaction_content_distribution') && $request->has('subsidiary_name_distributor_content') && $request->has('subsidiary_name_distributor_file') &&
        count(array_filter($request->substidiary_name_account_transaction_content_distributor)) !=0  && count(array_filter($request->substidiary_name_account_transaction_content_distribution)) != 0 && count(array_filter($request->subsidiary_name_distributor_content)) != 0 && count(array_filter($request->subsidiary_name_distributor_file)) != 0)  {
           
                // Check if all fields have the same count
            $titleCount = count(array_filter($request->substidiary_name_account_transaction_content_distributor));
            $authorCount = count(array_filter($request->substidiary_name_account_transaction_content_distribution));
            $fromCount = count(array_filter($request->subsidiary_name_distributor_content));
            $toCount = count(array_filter($request->subsidiary_name_distributor_file));
            
            if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                $validator = Validator::make($request->all(), [
                    'subsidiary_name_distributor_file.*' => 'required',
                ], [
                    'subsidiary_name_distributor_file.*.required' => 'The subsidiary document file is required.',
                  
                ]);
    
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'The number of elements in subsidiary distributor fields must be the same.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        } else {
      
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error', 'All fields in subsidiary distributor are required and must not be empty.');
            return redirect()->route('register.form')->with('usertype', $request->usertype);
           
        }
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
           $distributor->email                        =$request->email;
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
       if(Session::has('validation_error')){
        Session::forget('validation_error');
    }
    if(Session::has('error')){
        Session::forget('error');
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
       
        $validator = Validator::make($request->all(), [
            'usertype'                                              => ['required'],
            'publication_name_dist_name'                            => ['required', 'string', 'max:255'],
            'userName'                                              => ['required', 'string', 'max:255', 'unique:publisher_distributors'],
            'password'                                              => ['required', 'string', 'min:8'],
            'publication_first_name'                                => ['required', 'string', 'max:255'],
            'publication_last_name'                                 => ['required', 'string', 'max:255'],
            'email'                                  => ['required', 'string', 'email', 'unique:publisher_distributors'],
            'publication_contact_no'                                => ['required','string', 'max:10'],
            'publication_address'                                   => ['required', 'string', 'max:255'],
            'publication_city'                                      => ['required', 'string', 'max:255'],
            'publication_district'                                  => ['required', 'string', 'max:255'],
            'publication_state'                                     => ['required', 'string', 'max:255'],
            'publication_country'                                   => ['required', 'string', 'max:255'],
            'publication_pincode'                                   => ['required', 'string', 'max:255'],
            'publication_contact_person_name'                       => ['required', 'string', 'max:255'],
            'publication_person_email_id'                           => ['required', 'string', 'email'],
            'publication_contact_person_number'                     => ['required', 'string', 'max:10'],
            'publication_contact_person_address'                    => ['required', 'string', 'max:255'],
            'publication_contact_person_city'                       => ['required', 'string', 'max:255'],
            'publication_contact_person_district'                   => ['required', 'string', 'max:255'],
            'publication_contact_person_state'                      => ['required', 'string', 'max:255'],
            'publication_contact_person_country'                    => ['required', 'string', 'max:255'],
            'publication_contact_person_pincode'                    => ['required', 'string', 'max:255'],
            'year_of_establishment'                                 => ['required', 'string', 'max:4'],
            'number_of_books_published_so_for'                      => ['required', 'string'],
            'number_of_books_published_latest_year'                 => ['required', 'string'],
            'number_of_files_available_your_shop'                   => ['required', 'string'],
            'publisher_name.*' => ['required', 'nullable', 'string', 'max:255'],
            'publisher_place.*' => ['required', 'nullable', 'string', 'max:255'],
            'publication_title.*' => ['required', 'nullable', 'string', 'max:255'],
            'publication_author.*' => ['required', 'nullable', 'string', 'max:255'],
            'authorization_letter'                                   => ['required', 'array'],
            'pub_dis_category_of_books_published'                => ['required', 'array'],
            'pub_dis_specialized_category_books'                 => ['required', 'array'],
            'pub_dis_primary_language_of_publication'            => ['required', 'array'],
            'latest_book_categories'                                => ['required', 'mimes:xls,xlsx'],
            'pub_dis_ownership'                                     => ['required'],
            'member_in_publishers_yes_old_lby'                     => ['required'],
            'member_in_publishers_yes_old_asrmy'                   => ['required'],
            'subsidiary_pub_yes'                                    => ['required'],
            'declaration'                                           => ['required'],
            'declaration-two'                                        => ['required'],
            'declaration-three'                                      => ['required'],
            'declaration-four'                                          => ['required'],
        ], [
            'usertype.required'                                    => 'User type is required.',
            'publication_name_dist_name.required'                  => 'Publication name is required.',
            'userName.required'                                    => 'Username is required.',
            'userName.unique'                                      => 'Username is already taken.',
            'password.required'                                    => 'Password is required.',
            'password.min'                                         => 'Password must be at least 8 characters.',
            'publication_first_name.required'                      => 'Publisher/Distributor first name is required.',
            'publication_last_name.required'                       => 'Publisher/Distributor last name is required.',
            'email.required'                        => 'Publisher/Distributor email is required.',
            'email.email'                           => 'Invalid email format for publisher.',
            'email.unique'                          => 'Publisher/Distributor email is already taken.',
            'publication_contact_no.required'                      => 'Publisher/Distributor contact number is required.',
            'publication_contact_no.max'                           => 'Publisher/Distributor contact number must not exceed 10 characters.',
            'publication_address.required'                         => 'Publisher/Distributor address is required.',
            'publication_city.required'                            => 'City is required.',
            'publication_district.required'                        => 'District is required.',
            'publication_state.required'                           => 'State is required.',
            'publication_country.required'                         => 'Country is required.',
            'publication_pincode.required'                         => 'Pin code is required.',
            'publication_contact_person_name.required'             => 'Contact person\'s name is required.',
            'publication_person_email_id.required'                 => 'Contact person\'s email is required.',
            'publication_person_email_id.email'                    => 'Invalid email format for contact person.',
            'publication_contact_person_number.required'           => 'Contact person\'s number is required.',
            'publication_contact_person_number.max'                => 'Contact person\'s number must not exceed 10 characters.',
            'publication_contact_person_address.required'          => 'Contact person\'s address is required.',
            'publication_contact_person_city.required'             => 'Contact person\'s city is required.',
            'publication_contact_person_district.required'         => 'Contact person\'s district is required.',
            'publication_contact_person_state.required'            => 'Contact person\'s state is required.',
            'publication_contact_person_country.required'          => 'Contact person\'s country is required.',
            'publication_contact_person_pincode.required'          => 'Contact person\'s pin code is required.',
            'year_of_establishment.required'                    => 'Year of establishment is required.',
            'year_of_establishment.max'                         => 'Year of establishment must not exceed 4 characters.',
            'number_of_books_published_so_for.required'         => 'Number of books published so far is required.',
            'number_of_books_published_latest_year.required'    => 'Number of books published in the latest year is required.',
            'number_of_files_available_your_shop.required'      => 'Number of files available in your shop is required.',
            'publisher_name.*.required'                         => 'Publisher name is required.',
            'publisher_place.*.required'                        => 'Publisher place is required.',
            'authorization_letter.required'                   => 'Authorization letter is required.',
            'publication_title.*.required'                      => 'Best Seller Titles in Your Publication\'s title is required.',
            'publication_author.*.required'                     => 'Best Seller Titles in Your Publication\'s author is required.',
            'pub_dis_category_of_books_published.required'    => 'Category of books published is required.',
            'pub_dis_specialized_category_books.required'     => 'Specialized category of books is required.',
            'pub_dis_primary_language_of_publication.required'=> 'Primary language of publication is required.',
            'latest_book_categories.required'                   => 'Latest book categories must be provided.',
            'latest_book_categories.mimes'                      => 'Latest book categories must be in XLSX or XLS format.',
            'pub_dis_ownership.required'                        => 'Publication ownership is required.',
            'member_in_publishers_yes_old_lby.required'         => 'Please specify if you have a list of the top 5 translated books.',
            'member_in_publishers_yes_old_asrmy.required'       => 'Please indicate if there are any awarded titles in your publication.',
            'subsidiary_pub_yes.required'                       => 'Please specify if there are any subsidiary publisher/distributor.',
            'declaration.required' => 'First declaration is required.',
            'declaration-two.required' => 'Second declaration is required.',
            'declaration-three.required' => 'Third declaration is required.',
            'declaration-four.required' => 'Fourth declaration is required.']);
        
        
            if ($validator->fails()) {
                $errors = $validator->errors();
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('validation_error',$errors);
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
            //publisher in distribution
            if ($request->has('publisher_name') && $request->has('publisher_place')  && $request->has('authorization_letter') &&
            count(array_filter($request->publisher_name)) !=0  && count(array_filter($request->publisher_place)) != 0 && count(array_filter($request->authorization_letter)) != 0)  {
               
                    // Check if all fields have the same count
                $titleCount = count(array_filter($request->publisher_name));
                $authorCount = count(array_filter($request->publisher_place));
                $toCount = count(array_filter($request->authorization_letter));
                
                if ($titleCount == $authorCount && $titleCount == $toCount) {
                    $validator = Validator::make($request->all(), [
                        'authorization_letter.*' => 'required',
                    ], [
                        'authorization_letter.*.required' => 'The authorization letter is required.',
                       
                    ]);
        
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                            Session::put('validation_error',$errors);
                            return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'The number of elements in publisher in distribution fields must be the same.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
          
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'All fields in publisher in distribution are required and must not be empty.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
               
            }
            //Best Seller Titles
                if ($request->has('publication_title') && $request->has('publication_author')  &&
                count(array_filter($request->publication_title)) !=0  && count(array_filter($request->publication_author)) != 0 )  {
                   
                        // Check if all fields have the same count
                    $stateCount = count(array_filter($request->publication_title));
                    $centralCount = count(array_filter($request->publication_author));
                    if ($stateCount == $centralCount) {
                    } else {
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('error', 'The number of elements in best seller titles in your publications fields must be the same.');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
              
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'All fields in best seller titles in your publications are required and must not be empty.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                   
                }
    
            //Best Translated Books
            if ($request->member_in_publishers_yes_old_lby == 'yes') {
                
                // Check if all fields are present and not empty
                if ($request->has('trans_title') && $request->has('trans_author') && $request->has('trans_from') && $request->has('trans_to') &&
                count(array_filter($request->trans_title)) !=0  && count(array_filter($request->trans_author)) != 0 && count(array_filter($request->trans_from)) != 0 && count(array_filter($request->trans_to)) != 0)  {
                   
                        // Check if all fields have the same count
                    $titleCount = count(array_filter($request->trans_title));
                    $authorCount = count(array_filter($request->trans_author));
                    $fromCount = count(array_filter($request->trans_from));
                    $toCount = count(array_filter($request->trans_to));
                    
                    if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                    } else {
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('error', 'The number of elements in translated books fields must be the same.');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
              
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'All fields in translated books are required and must not be empty.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                   
                }
            }
    
            //Awarded Titles
            if ($request->member_in_publishers_yes_old_asrmy == 'yes') {
                
                // Check if all fields are present and not empty
                if ($request->has('trs_state_awarded_dis_pub') && $request->has('trs_central_awarded_dis_pub')  &&
                count(array_filter($request->trs_state_awarded_dis_pub)) !=0  && count(array_filter($request->trs_central_awarded_dis_pub)) != 0 )  {
                   
                        // Check if all fields have the same count
                    $stateCount = count(array_filter($request->trs_state_awarded_dis_pub));
                    $centralCount = count(array_filter($request->trs_central_awarded_dis_pub));
                    if ($stateCount == $centralCount) {
                    } else {
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('error', 'The number of elements in awarded titles in your publications fields must be the same.');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
              
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'All fields in awarded titles in your publications are required and must not be empty.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                   
                }
            }
    
              //ownership proof
               if($request->pub_dis_ownership =="Partnership"){
                if($request->hasFile('pan_tan') && $request->hasFile('pan_deed')){
                    $validator = Validator::make($request->all(), [
                        'pan_tan' => 'required',
                        'pan_deed' => 'required',
                        'udayam' => 'nullable', // Allow udayam file if uploaded, and validate it as PDF
                        'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
                    ], [
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                        'pan_deed.required' => 'The Partnership Deed document file is required.',
                       
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error', $errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="Private"){
                if($request->hasFile('pan_tan') && $request->hasFile('certification_incon')){
                    $validator = Validator::make($request->all(), [
                        'pan_tan' => 'required', 
                        'certification_incon' => 'required', 
                        'moa' => 'nullable', // Allow moa file if uploaded, and validate it as PDF
                        'aoa' => 'nullable', // Allow aoa file if uploaded, and validate it as PDF
                        'gst' => 'nullable', // Allow gst file if uploaded, and validate it as PDF
                    ], [
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                        'certification_incon.required' => 'The Certification document file is required.',
                       
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error', $errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="Publication"){
                if( $request->hasFile('certification_incon') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'certification_incon' => 'required', // Ensure Certification document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                    
                        'certification_incon.required' => 'The Certification document file is required.',
                       
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="oneperson"){
                if( $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                        'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
                    ], [
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="limited"){
                if(  $request->hasFile('pan_tan')&& $request->hasFile('llp_agre')){
                    $validator = Validator::make($request->all(), [
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'llp_agre' => 'required', // Ensure LLP Agreement document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                        'udayam' => 'nullable', // Allow Udayam file if uploaded, and validate it as PDF
                    ], [
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                        'llp_agre.required' => 'The LLP Agreement document file is required.',
                     
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="trust"){
                if( $request->hasFile('private_trust') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'private_trust' => 'required', // Ensure Private Trust document is a PDF file
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'private_trust.required' => 'The Private Trust document file is required.',
                       
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                    
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="society"){
                if($request->hasFile('private_society') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'private_society' => 'required', // Ensure Private Society document is a PDF file
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'private_society.required' => 'The Private Society document file is required.',
                      
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="institutional"){
                if( $request->hasFile('institution') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'institution' => 'required', // Ensure Institutional document is a PDF file
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'institution.required' => 'The Institutional document file is required.',
                      
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                   
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="trust-foundation"){
                if( $request->hasFile('trust_foundation') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'trust_foundation' => 'required', // Ensure Trust/Foundation document is a PDF file
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'trust_foundation.required' => 'The Trust/Foundation document file is required.',
                      
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                      
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }  if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
               if($request->pub_dis_ownership =="government-society"){
                if( $request->hasFile('society') && $request->hasFile('pan_tan')){
                    $validator = Validator::make($request->all(), [
                        'society' => 'required', // Ensure Society document is a PDF file
                        'pan_tan' => 'required', // Ensure PAN/TAN document is a PDF file
                        'gst' => 'nullable', // Allow GST file if uploaded, and validate it as PDF
                    ], [
                        'society.required' => 'The Society document file is required.',
                       
                        'pan_tan.required' => 'The PAN/TAN document file is required.',
                       
                    ]);
            
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                }else{
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('error', 'Publication Ownership Documents required');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
    
               }
    
               //Subsidiary Publications
    
                if ($request->subsidiary_publications== 'yes') {
                if ($request->has('subsidiary_publisher_distributor') && $request->has('subsidiary_publication_distribution') && $request->has('subsidiary_stackpercentage') && $request->has('subsidiary_publication_distribution_file') &&
                count(array_filter($request->subsidiary_publisher_distributor)) !=0  && count(array_filter($request->subsidiary_publication_distribution)) != 0 && count(array_filter($request->subsidiary_stackpercentage)) != 0 && count(array_filter($request->subsidiary_publication_distribution_file)) != 0)  {
                   
                        // Check if all fields have the same count
                    $titleCount = count(array_filter($request->subsidiary_publisher_distributor));
                    $authorCount = count(array_filter($request->subsidiary_publication_distribution));
                    $fromCount = count(array_filter($request->subsidiary_stackpercentage));
                    $toCount = count(array_filter($request->subsidiary_publication_distribution_file));
                    
                    if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                        $validator = Validator::make($request->all(), [
                            'subsidiary_publication_distribution_file.*' => 'required',
                        ], [
                            'subsidiary_publication_distribution_file.*.required' => 'The subsidiary document file is required.',
                           
                        ]);
            
                        if ($validator->fails()) {
                            $errors = $validator->errors();
                            if(Session::has('validation_error')){
                                Session::forget('validation_error');
                            }
                            if(Session::has('error')){
                                Session::forget('error');
                            }
                                Session::put('validation_error',$errors);
                                return redirect()->route('register.form')->with('usertype', $request->usertype);
                        }
                    } else {
                        if(Session::has('validation_error')){
                            Session::forget('validation_error');
                        }
                        if(Session::has('error')){
                            Session::forget('error');
                        }
                        Session::put('error', 'The number of elements in subsidiary publisher/distributor fields must be the same.');
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                    }
                } else {
              
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                    Session::put('error', 'All fields in subsidiary publisher/distributor are required and must not be empty.');
                    return redirect()->route('register.form')->with('usertype', $request->usertype);
                   
                }
            }
     //Subsidiary Publications

     if ($request->subsidiary_pub_yes== 'yes') {
        if ($request->has('subsidiary_publisher_distributor') && $request->has('subsidiary_publication_distribution') && $request->has('subsidiary_stackpercentage') && $request->has('subsidiary_publication_distribution_file') &&
        count(array_filter($request->subsidiary_publisher_distributor)) !=0  && count(array_filter($request->subsidiary_publication_distribution)) != 0 && count(array_filter($request->subsidiary_stackpercentage)) != 0 && count(array_filter($request->subsidiary_publication_distribution_file)) != 0)  {
           
                // Check if all fields have the same count
            $titleCount = count(array_filter($request->subsidiary_publisher_distributor));
            $authorCount = count(array_filter($request->subsidiary_publication_distribution));
            $fromCount = count(array_filter($request->subsidiary_stackpercentage));
            $toCount = count(array_filter($request->subsidiary_publication_distribution_file));
            
            if ($titleCount == $authorCount && $titleCount == $fromCount && $titleCount == $toCount) {
                $validator = Validator::make($request->all(), [
                    'subsidiary_publication_distribution_file.*' => 'required',
                ], [
                    'subsidiary_publication_distribution_file.*.required' => 'The subsidiary document file is required.',
                   
                ]);
    
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    if(Session::has('validation_error')){
                        Session::forget('validation_error');
                    }
                    if(Session::has('error')){
                        Session::forget('error');
                    }
                        Session::put('validation_error',$errors);
                        return redirect()->route('register.form')->with('usertype', $request->usertype);
                }
            } else {
                if(Session::has('validation_error')){
                    Session::forget('validation_error');
                }
                if(Session::has('error')){
                    Session::forget('error');
                }
                Session::put('error', 'The number of elements in subsidiary publisher and distributor fields must be the same.');
                return redirect()->route('register.form')->with('usertype', $request->usertype);
            }
        } else {
      
            if(Session::has('validation_error')){
                Session::forget('validation_error');
            }
            if(Session::has('error')){
                Session::forget('error');
            }
            Session::put('error', 'All fields in subsidiary publisher and distributor are required and must not be empty.');
            return redirect()->route('register.form')->with('usertype', $request->usertype);
           
        }
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
           $publisher->email                                    =  $request->email;
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
       if(Session::has('validation_error')){
        Session::forget('validation_error');
    }
    if(Session::has('error')){
        Session::forget('error');
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
      


