<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
         include "plugin/css.php";
      ?>
      {{-- <style>
         input::placeholder {
            text-transform: capitalize;
         }
      </style> --}}
      <style>
         .validation-errors {
          position: fixed;
          top: 250px;
          right: 20px;
          background-color: #ffcccc;
          border: 1px solid #ff0000;
          border-radius: 5px;
          padding: 10px;
          max-width: 500px;
          max-height: 200px; /* Set a fixed height */
          overflow-y: auto; /* Add vertical scrollbar */
          z-index: 1000; /* Ensure it appears above other content */
      }
      
      .validation-errors ul {
          list-style-type: none;
          padding: 0;
          margin: 0;
      }
      
      .validation-errors ul li {
          color: #ff0000;
          margin-bottom: 5px;
      }
      
      </style>
      <style>
         h5 {
            color: #ffffff;
            font-weight: 400;
            background: linear-gradient(58deg, #1e631e, #c8dac8);
            width: auto;
            font-size: 20px;
            line-height: 1;
            margin: 10px 10px 30px 0px;
            padding: 14px;
            border-left: 10px solid #ffc10799;
            box-shadow: 4px 2px 15px 0px rgb(199 199 199);
         }
      
         span.mt-055 {
            font-size: 14px;
            font-weight: 900;
         }
      
         span.mt-056 {
            font-size: 11px;
            font-weight: 200;
         }
         .toggle-password {
            float: right;
            cursor: pointer;
            margin-right: 10px;
            margin-top: -25px;
         }
         /* Style to make form semi-transparent when loading bar is shown */
         #reg_publisher_and_distributor_form.loading2 {
                     opacity: 0.5;
               }
               .card.card-padding {
            padding: 3rem;
         }
         /* Style for loading bar */
         .loading-bar {
            display: none; /* Initially hide the loading bar */
            position: fixed;
            top: 50%; /* Position from the top */
            left: 50%; /* Position from the left */
            transform: translate(-50%, -50%); /* Center the loading bar both horizontally and vertically */
            width: 200px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 5px; /* Add border radius for rounded corners */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Ensure loading bar is above other elements */
         }
      
         /* Style for loading spinner */
         .spinner-border {
            width: 1.5rem; /* Adjust the width of the spinner */
            height: 1.5rem; /* Adjust the height of the spinner */
            color: #007bff; /* Set the color of the spinner */
         }
         button#nav-profile-tab {
            border-color: white !important;
         }
         .nav-tabs {
    --bs-nav-tabs-border-color: none !important;
   }
         /* Style to make form semi-transparent when loading bar is shown */
         #form_publisher.loading {
                     opacity: 0.5;
               }
                  /* Style to make form semi-transparent when loading bar is shown */
                  #form_distriputor.loading1 {
                     opacity: 0.5;
               }
                     /* Extra small devices (phones, 600px and down) */
         @media only screen and (max-width: 600px) {
            .card.card-padding {
               padding: 7px;
            }
            .custom-control.custom-checkbox {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row-reverse;
            padding: 7px;
            border: 0.5px solid #bfbfbf7a;
         }
         .form-check {
            padding-left: 30px;
         }
         .tpmobile-menu {
            background-color: white;
         }
         }

         /* Small devices (portrait tablets and large phones, 600px and up) */
         @media only screen and (min-width: 600px) {
            
         }

         /* Medium devices (landscape tablets, 768px and up) */
         @media only screen and (min-width: 768px) {
            
         }

         /* Large devices (laptops/desktops, 992px and up) */
         @media only screen and (min-width: 992px) {
            
         }
      </style>
</head>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->
        @include("header.top_header")
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->
        @include("header.middile_navigation")
        @include("header.navigation")
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->
        @include("header.mobile_navigation")
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->

    <main>

        <!-- Your Content Use Here -->
        <div class="container-fluid">

            <section class="about_register">
               <!-- <h2 class="text-center p-3"></h2> -->
               <h5>Transparent Book Procurement-2024</h5>
               @if (Session::has('validation_error'))
    <div class="validation-errors">
        <div class="error-list">
            <ul>
                @foreach (Session::get('validation_error')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
               <div class="card card-padding">
                  <nav>
                     <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        @if($user == "Publisher" || $user == "publisher")
                        <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab"
                           data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                           aria-selected="false">Book Publisher - <span class="mt-056"> புத்தக
                        பதிப்பாளர்</span></button>
                        @elseif($user == "Distributor" || $user == "distributor")
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                           data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                           aria-selected="false">Book Distributor - <span class="mt-056"> புத்தக
                        விற்பனையாளர்</span></button> --}}
                        <h4 class="fw-bold">Book Distributor - <span class="mt-055"> புத்தக
                           விற்பனையாளர்</span></h4>
                        @else
                        {{-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                           data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile"
                           aria-selected="false">Book Publisher Cum Distributor - <span class="mt-056">புத்தக
                        பதிப்பாளர் மற்றும் விற்பனையாளர்</span></button> --}}
                        <h4 class="fw-bold">Book Publisher Cum Distributor - <span class="mt-055"> புத்தக
                           பதிப்பாளர் மற்றும் விற்பனையாளர்</span></h4>
                        @endif
                     </div>
                  </nav>
                  <div class="tab-content bg-white" id="nav-tabContent">
                  @if($user == "Publisher" || $user == "publisher")
                     <!-- ###############################################################################-->
                     <!-- ++++++++++++++++++++++++++First Tab Registration +++++++++++++++++++++++++++-->
                     <!-- ###############################################################################-->
                   <!-- <div> -->
                     <!-- <div class="tab-pane fade active show" role="tabpanel"
                        aria-labelledby="nav-home-tab"> -->
                          <div>
                        <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id="form_publisher"
                           action="/create/publisher" autocomplete="on">
                           @csrf
                           <input type="text" class="form-control"
                           name="usertype" hidden value="publisher"
                           required />
                           <h4 class="fw-bold">Publication Details - <span class="mt-055"> பதிப்பு விவரம்</span></h4>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Publication Name - <span
                                 class="mt-056">பதிப்பகத்தின் பெயர்</span> <span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control @error('publication_name') is-invalid @enderror" id="inputEmail4"
                                 name="publication_name" placeholder="Enter the publication name"
                                 required value="{{ old('publication_name') }}"/>
                                 @error('publication_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                           </div>
                           <div class="row pt-2 pb-2 bo    rder-0">
                                    <h4 class="fw-bold">Login Details  - <span class="mt-055">உள்நுழைவு விவரங்கள்</span></h4>


                           <div class="col-md-6 mt-3">
                              <label for="inputEmail4" class="form-label">User Name <span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('userName') }}" class="form-control @error('userName') is-invalid @enderror" id="user_name" name="userName"
                                 placeholder=" Enter your user name" required>
                                 <p id="checkusername" style="color: rgb(202, 14, 14)"></p>
                             <input id="usernameval" type="text" name="usernameval" value="" hidden/>
                           </div>
                           <div class="col-md-6 mt-3">
                              <label for="inputPassword4" class="form-label">Password <span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                 placeholder=" Enter your password" minlength="8" maxlength="8" required >
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                            <p id="divCheckPasswordMatch" style="color: rgb(202, 14, 14)"></p>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Confirm Password <span
                                 class="text-danger maditory">*</span></label>
                              <input type="password" value="{{ old('password_confirmation') }}" class="form-control" id="password_confirmation"
                                 name="password_confirmation" placeholder="Enter your confirm password" minlength="8" maxlength="8" required >
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                           </div>
                        </div>
                                <h4 class="fw-bold">Publisher Details - <span class="mt-055">பதிப்பக உரிமையாளரின் விவரங்கள்</span></h4>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                              பெயர் </span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="pub_first_name" name="pub_first_name"
                                 placeholder=" Enter your first name" value="{{ old('pub_first_name') }}"required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Last Name - <span
                                 class="mt-056">கடைசி பெயர்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('pub_last_name') }}" class="form-control" id="pub_last_name" name="pub_last_name"
                                 placeholder=" Enter your last name" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id -<span class="mt-056">
                              மின்னஞ்சல் முகவரி </span><span class="text-danger maditory">*</span></label>
                              <input type="email" value="{{ old('email') }}" class="form-control" id="pub_email_id" name="email"
                                 placeholder="Enter your email id" required>
                                 <p id="checkemail" style="color: rgb(202, 14, 14)"></p>
                                 <input id="emailval" type="text" name="emailval" value="" hidden/>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span
                                 class="mt-056">தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label></label>
                                 <input type="text" oninput="numberOnly(this.id)" value="{{ old('contact_number') }}" class="form-control" id="contact_number" name="contact_number"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >

                              </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">Publication Address - <span
                                 class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text"  value="{{ old('pub_address') }}" class="form-control" id="pub_address" name="pub_address"
                                 placeholder="Enter the publication address." required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span
                                 class="mt-056">நாடு</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="pub_country" class="wide form-control" name="pub_country" required>
                                 @if(old('pub_country'))
                                 <option value="{{old('pub_country')}}" selected>{{old('pub_country')}}</option>
                                 @endif
                                @foreach ($country as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="pub_state" class="wide form-control" name="pub_state" required>
                              <option value="" selected>Select State</option>
                                 @if(old('pub_state'))
                                 <option value="{{old('pub_state')}}" selected>{{old('pub_state')}}</option>
                                 @endif
                            @foreach ($state as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="pub_district" class="wide form-control" name="pub_district" required>
                                 <option value="" selected>Select District</option>
                            @foreach ($district as $val)
                                  <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>

                           <div class="col-md-3">
                              <label for="inputCity" class="form-label">City -<span class="mt-056">
                              நகரம்</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('pub_city') }}" class="form-control" id="pub_city" name="pub_city"
                                 placeholder="Enter your city" required>
                           </div>
                           <div class="col-md-3">
                              <label for="inputZip" class="form-label">Pincode -<span class="mt-056"> அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                              <input type="number" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="pub_pin_code"
                                 name="pub_pin_code" placeholder="Enter your pincode" required>
                           </div>
                           <h4 class="fw-bold">Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய நபரின் விவரங்கள்</span> </h4>
                           <small>Same as above - (மேற்கூறியவாறு)
                              @if(old('option1') == "samething")
                              <input class="form-check-input"
                              type="checkbox" id="publication_check" name="option1" onclick="myFunction(this)"
                              value="samething" checked></small>
                              @else
                              <input class="form-check-input"
                              type="checkbox" id="publication_check" name="option1" onclick="myFunction(this)"
                              value="samething"></small>
                              @endif

                           </hr>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Contact Person Name - <span
                                 class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('contact_person_name') }}" class="form-control" id="contact_person_name"
                                 name="contact_person_name" placeholder="Enter contact person's name" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id - <span
                                 class="mt-056">மின்னஞ்சல் முகவரி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="email" value="{{ old('con_email_id') }}" class="form-control" id="con_email_id" name="con_email_id"
                                 placeholder="Enter your email id" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span
                                 class="mt-056">தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              {{-- <input type="text" value="{{ old('con_contact_number') }}" class="form-control" id="con_contact_number"
                                 name="con_contact_number" placeholder=" Enter your contact number" minlength="10" maxlength="10" required> --}}

                                 <input type="text" oninput="numberOnly(this.id)" value="{{ old('con_contact_number') }}" class="form-control" id="con_contact_number" name="con_contact_number"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >
                              </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">Publication Address - <span
                                 class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('con_publication_address') }}" class="form-control" id="con_publication_address"
                                 name="con_publication_address" placeholder="Enter the publication address." required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span
                                 class="mt-056">நாடு</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="con_country" class="wide form-control" name="con_country" required>
                                 @if(old('con_country'))
                                 <option value="{{old('con_country')}}" selected>{{old('con_country')}}</option>
                                 @endif
                                @foreach ($country as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="con_state" class="wide form-control" name="con_state" required>
                              <option value="" selected>Select State</option>
                                 @if(old('con_state'))
                                 <option value="{{old('con_state')}}" selected>{{old('con_state')}}</option>
                                 @endif
                                @foreach ($state as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="con_district" class="wide form-control" name="con_district" required>
                                 <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputCity" class="form-label">City -<span class="mt-056">
                              நகரம்</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" value="{{ old('con_city') }}" class="form-control" id="con_city" name="con_city"
                                 placeholder="Enter your city" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="con_pin_code" name="con_pin_code"
                                 placeholder="Enter your pincode" required>
                           </div>

                           <h4 class="fw-bold">Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h4>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Year of Establishment - <span
                                 class="mt-056">தொடங்கப்பட்ட ஆண்டு</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" value="{{ old('publication_shop_established_year') }}" minlength="4" maxlength="4" id="inputAddress"
                                 name="publication_shop_established_year"
                                 placeholder="Enter the year of establishment" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Number of Books Published so far -
                              <span class="mt-056">இதுவரை பதிப்பித்துள்ள நூல்களின் எண்ணிக்கை</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="number" value="{{ old('number_of_books_published_so_for') }}" class="form-control" id="inputAddress"
                                 name="number_of_books_published_so_for"
                                 placeholder="Enter the number of books published so far" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Number of Books Published in the Last 3
                              Years -<span class="mt-056"> கடைசி மூன்று வருடங்களில் பதிப்பகத்தில் வெளியிடப்பட்ட  நூல்களின் எண்ணிக்கை</span><span class="text-danger maditory">*</span></label></label>
                              <input type="number" value="{{ old('number_of_books_published_latest_year') }}" class="form-control" id="inputAddress"
                                 name="number_of_books_published_latest_year"
                                 placeholder="Enter the number of books published in the last 3 years" required>
                           </div>
                           <h4 class="mt-4 fw-bold">Best Seller Titles in Your Publication - <span class="mt-055">நன்கு விற்பனையாகும் நூல்கள் </span></h4>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div name="add_name" id="add_name" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dynamic_field">
                                             <tr>
                                                <th> Title - <span class="mt-056">தலைப்பு</span><span
                                                      class="text-danger maditory">*</span></label>
                                                </th>
                                                <th> Author -<span class="mt-056"> நூலாசிரியர்</span><span
                                                      class="text-danger maditory">*</span></label>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text"
                                                   name="publications_shope_book_title[]"
                                                   placeholder="Enter the title*"
                                                    class="form-control name_list" required /></td>
                                                <td><input type="text"
                                                   name="publications_shope_book_author[]"
                                                   placeholder="Enter the author*"
                                                  class="form-control name_list" required /></td>
                                                <td><button type="button" name="add" id="add"
                                                   class="btn btn-success" onclick="">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Best 5 Translated Books (if any) -<span class="mt-055"> சிறந்த 5 மொழிபெயர்க்கப்பட்ட புத்தகங்கள் (ஏதேனும் இருந்தால் குறிப்பிடவும்)<span class="text-danger maditory">*</span></span></h4>
                           <div class="col-md-6 form-group ">
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus_old"
                                    id="member_in_publishers_yes_old" name="member_in_publishers_yes_old"
                                    value="yes" required>Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input member_in_publishers_no_yes_old"
                                    id="member_in_publishers_yes_old" name="member_in_publishers_yes_old"
                                    value="No">No - <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_bg_old" name="member_in_publishers_old"
                                 id="member_in_publishers_new_old" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="trans_book_pub">
                                             <tr>
                                                <th> Title - <span class="mt-056">தலைப்பு</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Author - <span class="mt-056">நூலாசிரியர்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Language From - <span class="mt-056">எந்த
                                                   மொழியிலிருந்து</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Language To - <span class="mt-056">எந்த மொழிக்கு</span><span
                                                   class="text-danger maditory">*</span>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" id="trans_title1" name="trans_title[]"
                                                   placeholder="Enter the title *"
                                                   class="form-control name_list"  /></td>
                                                <td><input type="text" id="trans_author1" name="trans_author[]"
                                                   placeholder="Enter the author *"
                                                   class="form-control name_list"  /></td>
                                                <td><input type="text" id="trans_from1" name="trans_from[]"
                                                   placeholder="Enter the language from *"
                                                   class="form-control name_list"  /></td>
                                                <td><input type="text" id="trans_to1" name="trans_to[]"
                                                   placeholder="Enter the language to * "
                                                   class="form-control name_list"  /></td>
                                                <td><button type="button" name="translated1"
                                                   id="translated_pub"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           {{-- <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div name="add_name" id="add_name" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="practical_mark">
                                             <tr>
                                                <th>Enter Title - <span class="mt-056">தலைப்பினை
                                                   அளிக்கவும்</span><span
                                                      class="text-danger maditory"></span></label>
                                                </th>
                                                <th>Enter Author -<span class="mt-056"> ஆசிரியர் பெயரினை
                                                   அளிக்கவும்</span><span
                                                      class="text-danger maditory"></span></label>
                                                </th>
                                                <th>Language From - <span class="mt-056">எந்த
                                                   மொழியிலிருந்து</span><span
                                                      class="text-danger maditory"></span></label>
                                                </th>
                                                <th>Language To - <span class="mt-056">எந்த
                                                   மொழிக்கு</span><span
                                                      class="text-danger maditory"></span></label>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" id="trs_book_title1" name="trs_book_title[]"
                                                   placeholder="Enter title*"
                                                   class="form-control name_list" /></td>
                                                <td><input type="text" name="trs_book_author[]"
                                                   placeholder="Enter author*"
                                                   class="form-control name_list" /></td>
                                                <td><input type="text" name="trs_book_lan_one[]"
                                                   placeholder="Enter language from*"
                                                   class="form-control name_list" /></td>
                                                <td><input type="text" name="trs_book_lan_two[]"
                                                   placeholder="Enter language to*"
                                                   class="form-control name_list" /></td>
                                                <td><button type="button" name="practical" id="practical"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div> --}}
                           </hr>
                           <h4 class="fw-bold">Awarded Titles in Your Publication -<span class="mt-055"> பதிப்பகத்தில் விருது பெற்ற தலைப்புகள்<span class="text-danger maditory">*</span></span></h4>
                           <div class="col-md-6 form-group ">
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus_old_asr"
                                    id="member_in_publishers_yes_old_asr" name="member_in_publishers_yes_old_asr"
                                    value="yes" required>Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input member_in_publishers_no_yes_old_asr"
                                    id="member_in_publishers_yes_old_asr" name="member_in_publishers_yes_old_asr"
                                    value="No">No - <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_bg_old" name="member_in_publishers_old_asr"
                                 id="member_in_publishers_new_old_asr" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="trans_book_pub_asr">
                                             <tr>
                                                <th> Award Name  <span class="mt-056"></span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Book Title  <span class="mt-056"></span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" id="pub_state_awarded" name="trs_state_awarded[]"
                                                   placeholder="Enter the award name*"
                                                   class="form-control name_list"/></td>
                                                <td><input type="text" id="pub_central" name="trs_central_awarded[]"
                                                   placeholder="Enter the title*"
                                                   class="form-control name_list"/></td>
                                                <td><button type="button" name="trs_central_awarded"
                                                   id="translated_pub_asr"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           </hr>
                           <div class="col-xl-3 col-md-6 col-sm-12 col-12 form-group">
                              <label for="text">Category of Books Published - <span
                                 class="mt-056">பதிப்பிக்கப்பட்ட நூல்களின் வகை</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox11"
                                    name="category_of_books_published[]" value="Academic"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox11">Academic - <span
                                    class="mt-056">கல்வி </span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox22"
                                    name="category_of_books_published[]" value="Treds"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox22">Trade Books - <span
                                    class="mt-056">வணிகரீதியான , நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox33"
                                    name="category_of_books_published[]" value="Children"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox33">Children
                                 Books - <span class="mt-056">குழந்தைகள் நூல்கள்</span></label>
                              </div>
                           </div>
                           <div class="col-xl-4 col-md-12 col-sm-12 col-12 form-group">
                              <label for="text">Specialized Category Books - <span class="mt-056">தங்களின்
                              பதிப்பகத்தின் குறிப்பிடத்தகுந்த பிரிவு</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox10" name="specialized_category_books[]"
                                    value="Children" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox10"> Children Books - <span
                                    class="mt-056">சிறுவர் நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox20" name="specialized_category_books[]"
                                    value="Academic" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox20">Academic Text Books - <span
                                    class="mt-056">பாட நூல்கள் </span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox30" name="specialized_category_books[]"
                                    value="Competitive" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Competitive Examination Books -
                                 <span class="mt-056">போட்டித்தேர்வு நூல்கள் </span></label>
                              </div>

                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="fiction" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Fiction - <span
                                    class="mt-056">புனைவு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="nonfiction" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Non Fiction - <span
                                    class="mt-056">புனைவிலி நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="rkdocument" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Documentation Editions - <span
                                    class="mt-056">ஆவணப் பதிப்பு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                    value="Translate" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Translated Books - <span
                                    class="mt-056">மொழிபெயர்ப்பு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                   value="government-publications" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox30">Government Publications - <span
                                   class="mt-056">அரசு வெளியீடுகள்</span>
                                </label>
                             </div>
                             <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                   value="foreign-books" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox30">Foreign Books - <span
                                   class="mt-056">வெளிநாட்டில் அச்சடிக்கப்பட்ட நூல்கள்</span>
                                </label>
                             </div>
                              {{-- <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="specialized_category_books[]"
                                    id="specialized_category_check" value="Other If Any"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Others -<span
                                    class="mt-056"> பிற</span>
                                 </label>
                              </div>
                              <div class="specialized_category_other">
                                 <div class="col-md-12">
                                    <!-- <label for="inputAddress" class="form-label">Other Category Books</label> -->
                                    <input type="text" class="form-control" id="specialized_category_books_no"
                                       name="other_specialized_category_books"
                                       placeholder="Enter other category books">
                                 </div>
                              </div> --}}
                           </div>
                           <div class="col-xl-5 col-md-12 col-sm-12 col-12 form-group">
                              <label for="text">Primary Language of Publication - <span
                                 class="mt-056">வெளியீட்டின் முதன்மை மொழி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox"
                                    name="primary_language_of_publication[]" value="Tamil"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                    class="mt-056">தமிழ்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox2"
                                    name="primary_language_of_publication[]" value="English"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox2">English - <span
                                    class="mt-056">ஆங்கிலம்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_indian_lag"
                                    name="primary_language_of_publication[]" value="Other"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox3">Other Indian
                                 Languages -<span class="mt-056"> மற்ற இந்திய மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 other_indian_lang mt-1 mb-1">
                                 <input type="text" class="form-control" id="other_indian_lang"
                                    name="other_indian_language"
                                    placeholder="Enter other Indian languages">
                              </div>

                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_forign_lag"
                                    name="primary_language_of_publication[]" value="foreign languages"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox3">Other Foreign
                                 Languages - <span class="mt-056">மற்ற வெளிநாட்டு மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 mt-1 other_foreign_lang mt-1 mb-1">
                                 <input type="text" class="form-control" id="other_foreign_lang"
                                    name="other_foreign_language"
                                    placeholder="Enter other foreign languages">
                              </div>
                           </div>
                           {{-- <h4>Member in Publishers Association - <span class="mt-055">பதிப்பாளர் சங்கத்தின்
                              உறுப்பினராக </span>
                           </h4>
                           </hr>
                           <div class="col-md-6 form-group ">
                              <label for="text">Member in Publishers
                              Association- <span class="mt-056">பதிப்பாளர் சங்கத்தின் உறுப்பினராக</span><span
                                 class="text-danger maditory">*</span> </label>
                              <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus"
                                    id="member_in_publishers_yes" name="member_in_publishers_yes"
                                    value="yes" required>Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input member_in_publishers_no_yes"
                                    id="member_in_publishers_yes" name="member_in_publishers_yes"
                                    value="No">No - <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_bg" name="member_in_publishers"
                                       id="member_in_publishers_new" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered"
                                             id="tbl_subsidiary_pub_name_bg_no">
                                             <tr>
                                                <th>Enter Publishers Association Name*</th>
                                                <th>Enter Publishers Association Id*</th>
                                                <!-- <th><button type="button" name="sub_pub_name_op"
                                                   id="sub_pub_name_op" class="btn btn-success">+</button>
                                                   </th> -->
                                             </tr>
                                             <tr>
                                                <td><input type="text" name="member_in_publishers_name[]"
                                                   placeholder="Enter Publishers Association Name"
                                                   class="form-control name_list"
                                                   id="pub_dis_subsidiary_publication_name" /></td>
                                                <td><input type="text" name="member_in_publishers_id[]"
                                                   placeholder="Enter Publishers Association id"
                                                   class="form-control name_list"
                                                   id="pub_dis_subsidiary_publication_conten" /></td>
                                                <td><button type="button"
                                                   name="member_in_publishers_name_op"
                                                   id="member_in_publishers_name_op"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div> --}}
                           <!-- <div class="col-md-4 form-group">
                              <label for="text">Member in Publishers
                                  Association<span class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" id="bapasi_member" name="member_in_publisher_Association_depart_pub_book_pub[]" class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox">Bapasi - <span class="mt-056">பபாசி</span></label>
                              </div>
                              <div class="col-md-12 bapasi_en mb-2">
                                  <input type="text" class="form-control" id="bapasi" name="bapasi_value"
                                      placeholder="Enter bapasi member id">
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" id="tamil_pathipu_thurai_new"
                                      name="member_in_publisher_Association_depart_pub_book_pub[]"
                                      class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox3">Tamil Padhipu thurai - <span class="mt-056">தமிழ் பதிப்பு துறை</span></label>
                              </div>

                              <div class="col-md-12 tamil_pathipu_thurai_en mb-2">
                                  <input type="text" class="form-control" id="tamil_pathipu_thurai"
                                      name="tamil_pathipu_value" placeholder="Tamil Padhipu thurai">
                              </div>
                              <div class="custom-control custom-checkbox others_new_pub_old">
                                  <input type="checkbox" id="others_new_pub"
                                      name="member_in_publisher_Association_depart_pub_book_pub[]"
                                      class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox3">Others - <span class="mt-056">பிற</span></label>
                              </div>
                              </div>
                              <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="other_name_id_en" id="pub_association_name" >
                                          <div class="table-responsive">
                                              <table class="table table-bordered"
                                                  id="tbl_pub_member_no">

                                                  <tr>
                                                      <th>Enter member name*</th>
                                                      <th>Enter member id*</th> -->
                           <!-- <th><button type="button" name="sub_pub_name_op"
                              id="sub_pub_name_op" class="btn btn-success">+</button>
                              </th> -->
                           <!-- </tr>
                              <tr>
                                  <td><input type="text"
                                          name="member_name_new_up[]"
                                          placeholder="Enter member name"
                                          class="form-control name_list"
                                          id="member_name_new" /></td>
                                  <td><input type="text"
                                          name="member_id_new_up[]"
                                          placeholder="Enter member id"
                                          class="form-control name_list"
                                          id="member_id_new" /></td>
                                  <td><button type="button" name="sub_pub_name_op"
                                          id="member_name_new_id"
                                          class="btn btn-success">+</button></td>
                              </tr>

                              </table>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div> -->
                           <!-- <div class="col-md-6">
                              <label for="inputState" class="form-label">Member In Publisher's
                                  Association<span class="text-danger maditory">*</span></label></label>
                              <select id="inputState" class="wide form-control" name="member_in_publisher_Association_depart" required>
                                  <option selected>Choose...</option>
                                  <option>Bapasi</option>
                                  <option>Tamil Padhipu thurai </option>
                                  <option>Other</option>
                              </select>
                              </div>
                              <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Enter The Member Id<span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="other_member" name="member_in_publisher_Association_depart_values" placeholder="Enter the member id" required>
                              </div> -->
                           <h4 class="fw-bold">Required Documents -<span class="mt-055"> தேவைப்படும் ஆவணங்கள்<span class="text-danger maditory">*</span>
                            </span></h4>
                           {{-- <div class="col-md-6 form-group">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Publication Proof- <span
                                    class="mt-056">பதிப்பகத்தின் சான்றிதழ்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <input class="form-control" id="publication_proof" type="file"
                                    name="publication_proof" value="{{ old('publication_proof') }}" required >
                                 <span class="text-danger"><small>PDF format</small></span>
                              </div>
                           </div> --}}
{{-- Latest catalogue --}}
                           {{-- <div class="col-md-6 form-group">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Latest Book Catalogue - <span
                                    class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <input class="form-control" id="latest_book_categories1" type="file"
                                    name="latest_book_categories" required>
                                 <span class="text-success"><a href="{{ asset('Excel/Book catalogue _Sample Excel Format.xlsx') }}" download><small>Download Sample Excel Format</small></a></span>
                              </div>
                           </div> --}}
                           <div class="col-md-6 form-group">
                              <div class="mb-3">
                                  <label for="latest_book_categories1" class="form-label">Latest Book Catalogue - <span
                                          class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                          class="text-danger maditory">*</span></label>
                                  <input class="form-control" id="latest_book_categories1" type="file" name="latest_book_categories"accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                      required>
                                  <span class="text-success"><a href="{{ asset('Excel/Book catalogue _Sample Excel Format.xlsx') }}" download><small>Download Sample
                                              Excel Format</small></a></span>
                              </div>
                          </div>
                           {{-- <div class="col-md-6 form-group">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Membership Proof - <span
                                    class="mt-056">உறுப்பினர் சான்றிதழ்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                       <input class="form-control" id="associate_membership_proof" type="file"
                                          name="associate_membership_proof" required>
                                       <span class="text-danger"><small>Doc, PDF other format</small></span>
                                    </div>
                                 </div>
                              </div>
                           </div> --}}
                           <h4 class="fw-bold">Nature of Your Publication Ownership</h4>
                           <div class="col-md-6  form-group ">
                              <label for="inputState" class="form-label" for="for">
                              Nature of Your Publication Ownership<br>
                              <small class="text-danger">Please Ensure All File Are PDF Format Only</small>
                              <span class="text-danger maditory">*</span>
                              </label>
                              <select name="pub_ownership" class="wide form-control" id="pub_ownership" required>

                                 <option value="" selected>Select Anyone</option>

                                 <option value="Publication">Public Limited</option>
                                 <option value="Private">Private Limited</option>
                                 <option value="limited">Limited Liability Partnership(LLP)</option>
                                 <option value="Partnership">Partnership Firm</option>
                                 <option value="oneperson">Proprietorship</option>
                                 <option value="trust">Private Trust</option>
                                 <option value="society">Private Society</option>
                                 <option value="institutional">Government Institutional Publication</option>
                                 <option value="trust-foundation">Government Trust/Foundation Publication</option>
                                 <option value="government-society">Government Society Publication</option>
                              </select>
                           </div>
                           <div class="col-md-6" id="id_proof_data">
                              <div class="user_file_input"></div>

                           </div>
                           <div class="col-md-12 form-group ">
                              <label for="text">Do you have any subsidiary publications? If yes, list the
                              subsidiary publication - <span class="mt-056">தங்கள் பதிப்பகத்திற்கு துணை
                              பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                              தரவும்</span><span class="text-danger maditory">*</span></label></label>
                              <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus"
                                    id="subsidiary_publications" name="subsidiary_publications" value="yes"
                                    required>Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio"
                                    class="form-check-input subsidiary_publications_no_yes no_qus"
                                    id="subsidiary_publications" name="subsidiary_publications"
                                    value="No">No -
                                 <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6 subsidiaryEnable">

                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name" name="subsidiary_publishcation_no"
                                       id="subsidiary_publishcation_no" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered"
                                             id="subsidiary_publishcation_no_tbl">
                                             <tr>
                                                <th>Name of the subsidiary publication<span
                                                   class="text-danger maditory">*</span></th>
                                                <th>Name of the subsidiary Publisher<span
                                                   class="text-danger maditory">*</span></th>
                                                <th>Stock holder percentage<span
                                                   class="text-danger maditory">*</span></th>
                                                <th>Document<span class="text-danger maditory">*</span></th>
                                                <th>Add</th>

                                             </tr>
                                             <tr>
                                                <td><input type="text"
                                                   id="name_of_the_subsidiary_publication"
                                                   name="name_of_the_subsidiary_publication[]"
                                                   placeholder="Enter the name of the subsidiary publication "
                                                   class="form-control name_list" /></td>
                                                <td><input type="text"
                                                   id="content_of_the_subsidiary_publication"
                                                   name="name_of_the_subsidiary_publisher[]"
                                                   placeholder="Enter the name of the subsidiary publisher"
                                                   class="form-control name_list" /></td>
                                                <td><input type="number"
                                                   id="content_of_the_subsidiary_publication_stack"
                                                   name="stack_holder_percentage[]"
                                                   placeholder="Enter the stock holder percentage"
                                                   class="form-control name_list" /></td>
                                                <td> <input class="form-control"
                                                   id="content_of_the_subsidiary_publication_file"
                                                   name="subsidiary_doc[]"
                                                   placeholder="Enter the document" type="file" accept="application/pdf,application/vnd.ms-excel" multiple
                                                   >
                                                   <span class="text-danger"><small> Please Ensure All File Are PDF Format Only</small></span>
                                                </td>
                                                <td><button type="button" name="sub_pub_add"
                                                   id="sub_pub_add" class="btn btn-success">+</button>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Declaration:</h4>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                                 value="yes" required>
                              <label class="form-check-label">I, hereby, do solemnly declare and affirm that the information provided in this application form is true, complete, and accurate to the best of my knowledge and belief. I understand that any false or misleading information may result in the rejection of my application or other appropriate legal actions.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check2" name="declaration-two"
                                 value="yes" required>
                              <label class="form-check-label">Acknowledge that I will submit five copies each book for review and selection purposes.
                                 Archiving purpose: To comply with the delivery of books (Public Libraries) Act, 1954, send one copy of all published books to Connemara Public Library. Additionally, send one copy to state libraries such as Anna Centenary Library,Chennai and Kalaignar Centenary Library in Madurai for archiving of Books.
                                 Review purpose:  send two copies for review of books in Chennai for review. Address to be sent: Anna Centenary Library, Chennai.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check3" name="declaration-three"
                                 value="yes" required> 
                              <label class="form-check-label">Acknowledge that I will send the purchased books to the central facility in Chennai, from where the delivery partner distributes the books to various libraries across Tamil Nadu.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check4" name="declaration-four"
                                 value="yes" required>
                              <label class="form-check-label">I acknowledge that a payment of an application fee is required for each book submission. This fee is necessary to ensure that submissions are taken seriously and to cover the costs associated with evaluating the submissions.</label>
                           </div>
                           <div class="col-12 text-end">
                              <button type="submit" name="reg_publisher" class="btn btn-primary"
                                 id="submitBtnPublisher">Submit</button>
                           </div>
                        </form>
                        <div id="loadingBar" class="loading-bar" style="display: none;">
                        <div class="spinner-border" role="status">
                           <span class="sr-only">Loading...</span>
                        </div>
                        <div class="loading-text">Loading...</div>
            </div>
                     </div>
                     @elseif($user == "Distributor"  || $user == "distributor")
                     <!-- ###############################################################################-->
                     <!-- ++++++++++++++++++++++++++Second Tab Registration +++++++++++++++++++++++++++-->
                     <!-- ###############################################################################-->
                     <!-- <div class="tab-pane fade"  role="tabpanel" aria-labelledby="nav-profile-tab"> -->
                           <div>
                     <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id="form_distriputor"
                           action="/create/distributor" autocomplete="on">
                           @csrf
                           <input type="text" class="form-control"
                           name="usertype" hidden value="distributor"
                           required />

                           <h4 class="fw-bold">Distribution Details  <span class="mt-055"></span></h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Book Distribution Company Name  <span
                                 class="mt-056"></span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="book_disttion_company_name"
                                 name="book_dis_company_name"
                                 placeholder="Enter the name of the book distribution company" required>
                           </div>
                           <h4 class="fw-bold">Login Details - <span class="mt-055">உள்நுழைவு விவரங்கள்</span><span class="mt-055"> </span></h4>
                            </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">User Name <span
                                 class="text-danger maditory">*</span></label></label>
                                 <input type="text" value="{{ old('userName') }}" class="form-control @error('userName') is-invalid @enderror" id="dis_user_name" name="userName"
                                 placeholder=" Enter your user name" required>
                                 @error('userName')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                             <p id="discheckusername" style="color: rgb(202, 14, 14)"></p>
                             <input id="disusernameval" type="text" value="" hidden/>
                           </div>
                           <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Password <span
                                 class="text-danger maditory">*</span></label></label>
                                 <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="dis_password" name="password"
                                 placeholder=" Enter your password" minlength="8" maxlength="8" required >
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                            <p id="disdivCheckPasswordMatch" style="color: rgb(202, 14, 14)"></p>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Confirm Password <span
                                 class="text-danger maditory">*</span></label>
                              <input type="password" class="form-control" id="dis_conform_password"
                                 name="conform_password" placeholder="Enter your confirm password"  minlength="8" maxlength="8" required>
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                           </div>
                           <h4 class="fw-bold">Book Distributor Details - <span class="mt-055">புத்தக விற்பனையாளரின் விவரங்கள் </span></h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                              பெயர் </span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="distn_first_name"
                                 name="distn_first_name" placeholder=" Enter your first name" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Last Name - <span class="mt-056">
                              கடைசி பெயர்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="distn_last_name" name="distn_last_name"
                                 placeholder=" Enter your last name" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id - <span
                                 class="mt-056">மின்னஞ்சல்
                              முகவரி</span><span class="text-danger maditory">*</span></label></label>
                              <input type="email" value="{{ old('distn_email_id') }}" class="form-control" id="distn_email_id" name="email"
                                 placeholder="Enter your email id" required>
                                 <p id="discheckemail" style="color: rgb(202, 14, 14)"></p>
                                 <input id="disemailval" type="text" value="" hidden/>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span class="mt-056">
                              தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              {{-- <input type="number" class="form-control" id="distn_contact_number"
                                 name="distn_contact_number" placeholder=" Enter your contact number" minlength="10" maxlength="10" required> --}}
                                 <input type="text" oninput="numberOnly(this.id)"  class="form-control" id="distn_contact_number" name="distn_contact_number"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >
                              </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">Distributor's address - <span
                                 class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="distn_address" name="distn_address"
                                 placeholder="Enter the distributor's address" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span
                                 class="mt-056">நாடு</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="distn_country" class="wide form-control" name="distn_country" required>
                                @foreach ($country as $val)
                                <option value="{{$val->name}}">{{$val->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="distn_state" class="wide form-control" name="distn_state" required>
                              <option value="" selected>Select State</option>
                                @foreach ($state as $val)
                                <option value="{{$val->name}}">{{$val->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="distn_district" class="wide form-control" name="distn_district" required>
                                 <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputCity" class="form-label">City - <span
                                 class="mt-056">நகரம்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="distn_city" name="distn_city"
                                 placeholder="Enter your city" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="distn_pincode" name="distn_pincode"placeholder="Enter your pincode"
                                 required>
                           </div>

                           <h4 class="fw-bold">Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய நபரின் விவரங்கள்</span></h4>
                           </hr>
                           <small>Same as above - <span class="mt-056">
                           (மேற்கூறியவாறு)</span><input class="form-check-input" type="checkbox"
                              id="distributor_check" name="distributor_check"
                              onclick="dustrubutir_details(this)" value="samething"></small>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Contact Person Name - <span
                                 class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="con_contact_person_name"
                                 name="contact_person_name" placeholder="Enter contact person's name" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id - <span
                                 class="mt-056">மின்னஞ்சல்
                              முகவரி</span><span class="text-danger maditory">*</span></label></label>
                              <input type="email" class="form-control" id="cont_per_email_id"
                                 name="cont_per_email_id" placeholder="Enter your email id" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span
                                 class="mt-056">தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              {{-- <input type="number" class="form-control" id="cont_per_contact_no"
                                 name="cont_per_contact_no" placeholder=" Enter your contact number" minlength="10" maxlength="10" required> --}}
                                 <input type="text" oninput="numberOnly(this.id)"  class="form-control" id="cont_per_contact_no" name="cont_per_contact_no"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >
                              </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label">Distributor's address - <span
                                 class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="cont_per_address"
                                 name="cont_per_address" placeholder="Enter the distributor's address" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span class="mt-056">
                              நாடு</span><span class="text-danger maditory">*</span></label></label>
                              <select id="cont_per_country" class="wide form-control" name="cont_per_country" required>
                                @foreach ($country as $val)
                                <option value="{{$val->name}}">{{$val->name}}</option>
                              @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="cont_per_state" class="wide form-control" name="cont_per_state" required>
                              <option value="" selected>Select State</option>
                                @foreach ($state as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="cont_per_district" class="wide form-control" name="cont_per_district" required>
                                 <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputCity" class="form-label">City - <span class="mt-056">
                              நகரம்</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="cont_per_city" name="cont_per_city"
                                 placeholder="Enter your city" required>
                           </div>


                           <div class="col-md-6">
                              <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="cont_per_pincode"
                                 name="cont_per_pincode"placeholder="Enter your pincode" required>
                           </div>

                           <h4 class="fw-bold">Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h4>
                           </hr>
                           <div class="col-md-6 ">
                              <label for="inputAddress" class="form-label">Year of Establishment - <span
                                 class="mt-056">தொடங்கப்பட்ட ஆண்டு</span> <span
                                 class="text-danger maditory">*</span></label></label>
                              {{-- <input type="number" class="form-control" id="yr_of_establishment"
                                 name="yr_of_establishment" placeholder="Enter year of establishment" minlength="4" maxlength="4" required> --}}
                                 <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="4" maxlength="4" id="yr_of_establishment"
                                 name="yr_of_establishment"
                                 placeholder="Enter the year of establishment" required>
                              </div>
                           <div class="col-md-6 ">
                              <label for="inputavailable" class="form-label">Number of Titles Available in Your Shop
                              - <span class="mt-056">உங்கள் கடையில் கிடைக்கும் தலைப்புகளின்
                              எண்ணிக்கை</span><span class="text-danger maditory">*</span></label></label>
                              <input type="number" class="form-control" id="number_of_files_available_in_shop"
                                 name="number_of_files_available_in_shop"
                                 placeholder="Enter the number of titles available in your shop" required>
                           </div>
                           <h4 class="fw-bold">Language Details - <span class="mt-055">மொழி விவரங்கள்</span></h4>
                           </hr>
                           <div class="col-md-6 form-group">
                              <label for="text">Language of Books you are Dealing with - <span
                                 class="mt-056">நீங்கள்
                              கையாளும் புத்தகங்களின் மொழி</span><span
                                 class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="language_of_books_you_dealing_with"
                                    name="language_of_books_you_dealing_with[]" value="Tamil"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                    class="mt-056">தமிழ்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox2"
                                    name="language_of_books_you_dealing_with[]" value="English"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox2">English - <span
                                    class="mt-056">ஆங்கிலம்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              </div>
                              <!-- <div class="col-md-12 other_indian_lang2">
                                 <input type="text" class="form-control" id="other_indian_lang2"
                                     name="other_indian_lang2" placeholder="Enter other indian languages">
                                 </div> -->
                              <!--<div class="col-md-6">
                                 <input type="text" class="form-control" id="inother_indian_lang"
                                     name="other_indian_lang" placeholder="Enter Other Indian Languages">
                                 </div> -->
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_indian_lang3" value="otherIndia"
                                    class="custom-control-input"  name="language_of_books_you_dealing_with[]">
                                 <label class="custom-control-label" for="customCheckbox3">Other Indian Languages - <span class="mt-056"> மற்ற இந்திய மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 mt-1 mb-1 other_indian_lang2">
                                 <input type="text" class="form-control" id="other_indian_lang2"
                                    name="otherIndian" placeholder="Enter other Indian languages">
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_forign_lag2" value="otherForeign"
                                    class="custom-control-input"  name="language_of_books_you_dealing_with[]">
                                 <label class="custom-control-label" for="customCheckbox3">Other Foreign Languages - <span class="mt-056"> மற்ற வெளிநாட்டு மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 mt-1 other_foreign_lang2">
                                 <input type="text" class="form-control" id="other_foreign_lang"
                                    name="otherForeign" placeholder="Enter other foreign languages">
                              </div>
                           </div>
                           <h4 class="fw-bold">Name of Publishers in your Distribution - <span class="mt-055">உங்கள் விநியோகத்தில்
                              உள்ள வெளியீட்டாளர்களின் பெயர்</span>
                           </h4>
                           </hr>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div name="add_name" id="add_name" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="distribution_table"
                                             class="distribution_table">
                                             <tr>
                                                <th>Publisher Name - <span
                                                   class="mt-056">வெளியீட்டாளர்களின் பெயர்</span><span
                                                   class="text-danger maditory">*</span></label></th>
                                                <th> Place - <span class="mt-056">இடம்</span><span
                                                   class="text-danger maditory">*</span></label></th>
                                                <th> Authorization Letter From Publisher - <span class="mt-056">வெளியீட்டாளரிடமிருந்து அங்கீகார கடிதம்</span><span
                                                    class="text-danger maditory">*</span></label></th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td data-title="Publisher Name"><input type="text" name="publisher_name[]"
                                                   placeholder="Enter  the publisher name*"
                                                   class="form-control name_list" required /></td>
                                                <td data-title="Place"><input type="text" name="publisher_place[]"
                                                   placeholder="Enter the place*"
                                                   class="form-control name_list" required /></td>
                                                <td data-title="Authorization Letter From Publisher"><input type="file" name="authorization_letter[]"
                                                    class="form-control name_list" accept="application/pdf,application/vnd.ms-excel" required /></td>
                                                <td data-title="Add"><button type="button" name="distribution_book"
                                                   id="distribution_book"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Required Documents - <span class="mt-055">தேவைப்படும் ஆவணங்கள்<span class="text-danger maditory">*</span></span></h4>
                           </hr>
                           {{-- <div class="col-md-6 form-group">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Distributor Proof - <span
                                    class="mt-056">விற்பனையாளர் சான்றிதழ்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <input class="form-control" id="distribution_proof" type="file"
                                    name="distribution_proof" required>
                                 <span class="text-danger"><small>Doc, PDF other format</small></span>
                              </div>
                           </div> --}}
                           <div class="col-md-6 form-group">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Latest Book Catalogue - <span
                                    class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <input class="form-control" id="latest_book_categories2" type="file"
                                    name="latest_book_categories" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                 <span class="text-success"><a href="{{ asset('Excel/Book catalogue _Sample Excel Format.xlsx') }}" download><small>Download Sample Excel Format</small></a></span>
                              </div>
                           </div>
                           <h4 class="fw-bold">Nature of Your Publication Ownership</h4>
                           </hr>
                           <div class="col-md-6  form-group ">
                              <label for="inputState" class="form-label" for="for">
                              Nature of Your Publication Ownership 
                              {{-- <span class="mt-056">உங்கள் வெளியீட்டு உரிமையின் தன்மை
                            </span> --}}
                              <span class="text-danger maditory">*</span>
                              </label><br>
                              <small class="text-danger">Please Ensure All File Are PDF Format Only</small>
                              <select name="dis_ownership" class="wide form-control" id="dis_ownership" required>

                                 <option value="" selected>Select Anyone</option>

                                 <option value="Publication">Public Limited</option>
                                 <option value="Private">Private Limited</option>
                                 <option value="limited">Limited Liability Partnership(LLP)</option>
                                 <option value="Partnership">Partnership Firm</option>
                                 <option value="oneperson">Proprietorship</option>
                                 {{-- <option value="Proprietorship">Sole Proprietorship</option> --}}
                                 {{-- <option value="society">Society-Trust</option> --}}
                                 <option value="trust">Private Trust</option>
                                 <option value="society">Private Society</option>
                                 <option value="institutional">Government Institutional Publication</option>
                                 <option value="trust-foundation">Government Trust/Foundation Publication</option>
                                 <option value="government-society">Government Society Publication</option>
                              </select>
                           </div>
                           <div class="col-md-6" id="id_proof_data">
                              <div class="dis_user_file_input"></div>

                           </div>
                           <div class="col-md-6 form-group ">
                              <label for="text">Do you have any subsidiary Distributors? If yes, list the
                              subsidiary distributor - <span class="mt-056">தங்கள் பதிப்பகத்திற்கு துணை
                              பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                              தரவும்</span><span class="text-danger maditory">*</span></label>
                              <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus"
                                    id="subsidiary_distributor_dis" name="subsidiary_distributor_dis"
                                    value="yes">Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio"
                                    class="form-check-input subsidiary_distributor_dis_no_yes no_qus"
                                    id="subsidiary_distributor_dis" name="subsidiary_distributor_dis"
                                    value="No" required>No - <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_new"
                                       name="subsidiary_distributor_distribution_no"
                                       id="subsidiary_distributor_distribution_no" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered"
                                             id="subsidiary_subsidiary_distributor_no_tbl">
                                             <tr>
                                                <th>Name of the subsidiary distributor*</th>
                                                <th>Name of the subsidiary distribution*</th>
                                                <th>Stock holder percentage<span class="text-danger maditory">*</span></th>
                                                <th>Document<span class="text-danger maditory">*</span></th>
                                                <th>Add</th>
                                                <!-- <th><button type="button" name="sub_pub_add"
                                                   id="sub_pub_add" class="btn btn-success">+</button>
                                                   </th> -->
                                             </tr>
                                             <tr>
                                                <td><input type="text"
                                                   id="name_of_the_subsidiary_distributor"
                                                   name="substidiary_name_account_transaction_content_distributor[]"
                                                   placeholder="Enter name of the subsidiary distributor "
                                                   class="form-control name_list" /></td>
                                                <td>
                                                   <input type="text"
                                                      id="content_of_the_subsidiary_account_transaction"
                                                      name="substidiary_name_account_transaction_content_distribution[]"
                                                      placeholder="Enter name of the subsidiary distribution"
                                                      class="form-control name_list" />
                                                </td>
                                                <td><input type="number"
                                                   id="content_of_the_subsidiary_distributor"
                                                   name="subsidiary_name_distributor_content[]"
                                                   placeholder="Enter stock holder percentage"
                                                   class="form-control name_list" /></td>
                                                <td> <input class="form-control"
                                                   id="file_of_the_subsidiary_distributor"
                                                   name="subsidiary_name_distributor_file[]"
                                                   placeholder="Enter Document" type="file" accept="application/pdf,application/vnd.ms-excel" multiple
                                                 >
                                                   <span class="text-danger"><small>Please Ensure All File Are PDF Format Only</small></span>
                                                </td>
                                                <td><button type="button" name="sub_dis_add_newdis"
                                                   id="sub_dis_add_newdis"
                                                   class="btn btn-success">+</button>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Declaration:</h4>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                                 value="yes" required>
                              <label class="form-check-label">I, hereby, do solemnly declare and affirm that the information provided in this application form is true, complete, and accurate to the best of my knowledge and belief. I understand that any false or misleading information may result in the rejection of my application or other appropriate legal actions.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check2" name="declaration-two"
                                 value="yes" required>
                              <label class="form-check-label">Acknowledge that i will submit five copies each book for review and selection purposes.
Archiving purpose: To comply with the delivery of books (Public Libraries) Act, 1954, send one copy of all published books to Connemara Public Library. Additionally, send one copy to state libraries such as Anna Centenary Library,Chennai and Kalaignar Centenary Library in Madurai for archiving of Books.
Review purpose:  send two copies for review of books in Chennai for review. Address to be sent: Anna Centenary Library, Chennai.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check3" name="declaration-three"
                                 value="yes" required>
                              <label class="form-check-label">Acknowledge that I will send the purchased books to the central facility in Chennai, from where the delivery partner distributes the books to various libraries across Tamil Nadu.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check4" name="declaration-four"
                                 value="yes" required>
                              <label class="form-check-label">I acknowledge that a payment of an application fee is required for each book submission. This fee is necessary to ensure that submissions are taken seriously and to cover the costs associated with evaluating the submissions.</label>
                           </div>
                           <div class="col-12 text-end">
                              <button type="submit" name="book_distributor" class="btn btn-primary"
                                 id="submitbtn_book_distributor">Submit</button>
                           </div>
                        </form>
                        <div id="loadingBar1" class="loading-bar" style="display: none;">
                           <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                         </div>
                <div class="loading-text">Loading...</div>
                     </div>
                     @else
                     <!-- ###############################################################################-->
                     <!-- ++++++++++++++++++++++++++Third Tab Registration +++++++++++++++++++++++++++-->
                     <!-- ###############################################################################-->
                     <!-- <div class="tab-pane fade"  role="tabpanel" aria-labelledby="nav-profile-tab"> -->
                     <div>
                     <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id="reg_publisher_and_distributor_form"
                          action="/create/publisher_distributor" autocomplete="on">
                           @csrf
                           <input type="text" class="form-control"
                           name="usertype" hidden value="publisher_distributor"
                           required />
                           <h4 class="fw-bold">Publication Details - <span class="mt-055">பதிப்பு விவரம்</span></h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label"> Book Publisher Cum Distributor - <span
                                 class="mt-056">பதிப்பாளரின் பெயர் / விற்பனையாளரின் பெயர் </span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_name_dist_name"
                                 name="publication_name_dist_name"
                                 placeholder="Enter the book publisher cum distributor" required>
                           </div>
                           <h4 class="fw-bold">Login Details - <span class="mt-055">உள்நுழைவு விவரங்கள்</span> <span class="mt-055"> </span></h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">User Name <span
                                 class="text-danger maditory">*</span></label>
                                 <input type="text" value="{{ old('userName') }}" class="form-control @error('userName') is-invalid @enderror" id="pub_dis_user_name" name="userName"
                                 placeholder=" Enter your user name" required>
                                 @error('userName')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                             <p id="bothcheckusername" style="color: rgb(202, 14, 14)"></p>
                             <input id="bothusernameval" type="text" value="" hidden/>
                           </div>
                           <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Password <span
                                 class="text-danger maditory">*</span></label></label>
                                 <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="pub_dis_password" name="password"
                                 placeholder=" Enter your password" minlength="8" maxlength="8"  required >
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                 @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                            <p id="bothdivCheckPasswordMatch" style="color: rgb(202, 14, 14)"></p>

                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Confirm Password <span
                                 class="text-danger maditory">*</span></label>
                              <input type="password" class="form-control" id="pub_dis_conform_password"
                                 name="conform_password" placeholder="Enter your confirm password"  minlength="8" maxlength="8" required>
                                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                           </div>
                           <h4 class="fw-bold">Book Publisher Cum Distributor Details - <span class="mt-055"> புத்தக பதிப்பாளர்
                              மற்றும் விற்பனையாளர் விவரங்கள்</span>
                           </h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                              பெயர்</span><span class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_first_name"
                                 name="publication_first_name" placeholder=" Enter your first name" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Last Name - <span
                                 class="mt-056">கடைசி
                              பெயர்</span><span class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_last_name"
                                 name="publication_last_name" placeholder=" Enter your last name" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id - <span
                                 class="mt-056">மின்னஞ்சல்
                              முகவரி</span><span class="text-danger maditory">*</span></label>
                                 <input type="email" value="" class="form-control" id="dis_publication_email_id" name="email"
                                 placeholder="Enter your email id" required>
                                 <p id="bothcheckemail" style="color: rgb(202, 14, 14)"></p>
                                 <input id="bothemailval" type="text" value="" hidden/>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span
                                 class="mt-056">தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label>

                                 <input type="text" oninput="numberOnly(this.id)"  class="form-control" id="publication_contact_no" name="publication_contact_no"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >
                              </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label"> Address - <span
                                 class="mt-056"> அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_address"
                                 name="publication_address" placeholder="Enter your address" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span
                                 class="mt-056">நாடு</span><span
                                 class="text-danger maditory">*</span></label>
                              <select id="dist_publication_country" class="wide form-control" name="publication_country"
                                 required>
                                 @foreach ($country as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label>
                              <select id="dst_publication_state" class="wide form-control" name="publication_state"
                                 required>
                                 <option value="" selected>Select State</option>
                                 @foreach ($state as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="dst_publication_district" class="wide form-control" name="publication_district" required>
                                 <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputCity" class="form-label">City - <span
                                 class="mt-056">நகரம்</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="dst_publication_city_pub"
                                 name="publication_city" placeholder="Enter your city" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputZip" class="form-label">Pincode - <span class="mt-056"> அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="dst_publication_pincode"
                                 name="publication_pincode"placeholder="Enter your pincode" required>
                           </div>

                           <h4 class="fw-bold">Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய நபரின் விவரங்கள்</span></h4>
                           </hr>
                           <small>Same as above - <span class="mt-056"> (மேற்கூறியவாறு)</span>
                           <input class="form-check-input" type="checkbox"
                              id="book_publisher_and_distributor_check" name="distributor_check"
                              onclick="publisher_and_distributor_details(this)" value="samething"></small>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Contact Person Name - <span
                                 class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_contact_person_name"
                                 name="publication_contact_person_name" placeholder="Enter contact person's name"
                                 required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputAddress" class="form-label">Email Id - <span
                                 class="mt-056">மின்னஞ்சல்
                              முகவரி</span><span class="text-danger maditory">*</span></label>
                              <input type="email" class="form-control" id="dist_publication_person_email_id"
                                 name="publication_person_email_id" placeholder="Enter your email id" required>
                           </div>
                           <div class=" col-md-6">
                              <label for="inputEmail4" class="form-label">Contact Number - <span
                                 class="mt-056">தொடர்பு எண்</span><span
                                 class="text-danger maditory">*</span></label>

                                 <input type="text" oninput="numberOnly(this.id)"  class="form-control" id="publication_contact_person_number" name="publication_contact_person_number"
                                 placeholder=" Enter your contact number" pattern="[0-9]{10}" minlength="10" maxlength="10" required title="Enter a 10-digit mobile number" >
                           </div>
                           <div class="col-md-6">
                              <label for="inputAddress2" class="form-label"> Address - <span
                                 class="mt-056">அலுவலக முகவரி</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_contact_person_address"
                                 name="publication_contact_person_address" placeholder="Enter your address"
                                 required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">Country - <span
                                 class="mt-056">நாடு</span><span
                                 class="text-danger maditory">*</span></label>
                              <select id="publication_contact_person_country" class="wide form-control"
                                 name="publication_contact_person_country" required>
                                 @foreach ($country as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputState" class="form-label">State - <span
                                 class="mt-056">மாநிலம்</span><span
                                 class="text-danger maditory">*</span></label>
                              <select id="publication_contact_person_state" class="wide form-control"
                                 name="publication_contact_person_state" required>
                                 <option value="" selected>Select State</option>
                                 @foreach ($state as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                              </select>
                           </div>
                           <div class="col-md-6">
                              <label for="inputDistrict" class="form-label">District - <span
                                 class="mt-056">மாவட்டம் </span><span
                                 class="text-danger maditory">*</span></label></label>
                              <select id="publication_contact_person_district" class="wide form-control" name="publication_contact_person_district" required>
                                <option value="" selected>Select District</option>
                                 @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                              </select>
                           </div>

                           <div class="col-md-6">
                              <label for="inputCity" class="form-label">City - <span
                                 class="mt-056">நகரம்</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" id="publication_contact_person_city"
                                 name="publication_contact_person_city" placeholder="Enter your city" required>
                           </div>

                           <div class="col-md-6">
                              <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                              குறியீடு</span><span class="text-danger maditory">*</span></label>
                              <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="6" maxlength="6" id="publication_contact_person_pincode"
                                 name="publication_contact_person_pincode"placeholder="Enter your pincode" required>
                           </div>

                           <h4 class="fw-bold">Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h4>
                           </hr>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Year of Establishment - <span
                                 class="mt-056">தொடங்கப்பட்ட ஆண்டு</span><span
                                 class="text-danger maditory">*</span></label>

                                 <input type="text" class="form-control" oninput="numberOnly(this.id);"
                                 class="test_css" minlength="4" maxlength="4" id="year_of_establishment"
                                 name="year_of_establishment"
                                 placeholder="Enter the year of establishment" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Number of Books Published so
                              far - <span class="mt-056">இதுவரை பதிப்பித்துள்ள நூல்களின் எண்ணிக்கை</span><span
                                 class="text-danger maditory">*</span></label>
                              <input type="number" class="form-control" id="number_of_books_published_so_for"
                                 name="number_of_books_published_so_for"
                                 placeholder="Enter the number of books published so for" required>
                           </div>
                           <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Number of Books Published in the last 3
                              years - <span class="mt-056">கடைசி மூன்று வருடங்களில்  பதிப்பகத்தில் வெளியிடப்பட்ட நூல்களின் எண்ணிக்கை</span><span class="text-danger maditory">*</span></label>
                              <input type="number" class="form-control" id="number_of_books_published_latest_year"
                                 name="number_of_books_published_latest_year"
                                 placeholder="Enter the number of books published in the last 3 years" required>
                           </div>

                           <div class="col-md-6 ">
                              <label for="inputAddress" class="form-label">Number of Titles Available in Your Shop
                              - <span class="mt-056">உங்கள் கடையில் கிடைக்கும் தலைப்புகளின் எண்ணிக்கை</span><span class="text-danger maditory">*</span></label>
                              <input type="number" class="form-control" id="number_of_files_available_your_shop"
                                 name="number_of_files_available_your_shop"
                                 placeholder="Enter the number of titles available in your shop" required>
                           </div>
                           <h4 class="fw-bold">Name of Publishers in your Distribution other then your Publication - <span
                              class="mt-055">உங்கள் விற்பனையாளர் உள்ள பதிப்பாளர் பெயர் மற்றொன்று உங்கள்
                              வெளியீடு</span>
                           </h4>
                           </hr>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div name="add_name_dis_pub" id="add_name_dis_pub" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" name="distribution_dis_pub"
                                             id="distribution_dis_pub">
                                             <tr>
                                                <th> Publisher Name - <span class="mt-056"> பதிப்பாளர்
                                                   பெயர் அளிக்கவும்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Place - <span class="mt-056">இடம்
                                                   அளிக்கவும்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Authorization Letter From Publisher - <span class="mt-056">வெளியீட்டாளரிடமிருந்து அங்கீகார கடிதம்
                                                </span><span
                                                       class="text-danger maditory">*</span>
                                                 </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" name="publisher_name[]"
                                                   placeholder="Enter the publisher name *"
                                                   class="form-control name_list" required /></td>
                                                <td><input type="text" name="publisher_place[]"
                                                   placeholder="Enter the place *"
                                                   class="form-control name_list" required /></td>
                                                   <td><input type="file" accept="application/pdf,application/vnd.ms-excel" name="authorization_letter[]"
                                                    class="form-control name_list" required /></td>
                                                <td><button type="button" name="distribution2" 
                                                   id="publisher_distribution_add"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Best Seller Titles in Your Publication - <span class="mt-055">நன்கு விற்பனையாகும் நூல்கள்</span></h4>
                           </hr>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div name="add_name" id="add_name" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" names="public_titles"
                                             id="pub_dis_publications">
                                             <tr>
                                                <th> Title - <span class="mt-056">தலைப்பு</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Author - <span class="mt-056">நூலாசிரியர்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" name="publication_title[]"
                                                   placeholder="Enter the title *"
                                                   class="form-control name_list" required /></td>
                                                <td><input type="text" name="publication_author[]"
                                                   placeholder="Enter the author *"
                                                   class="form-control name_list" required /></td>
                                                <td><button type="button"
                                                   name="publisher_distribution_add_btn"
                                                   id="publisher_distribution_addb10"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Best 5 Translated Books (if any) -<span class="mt-055"> சிறந்த 5 மொழிபெயர்க்கப்பட்ட புத்தகங்கள் (ஏதேனும் இருந்தால் குறிப்பிடவும்)<span class="text-danger maditory">*</span></h4>
                           </hr>
                           <div class="col-md-6 form-group ">


                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus_old_lby"
                                    id="member_in_publishers_yes_old_lby" name="member_in_publishers_yes_old_lby"
                                    value="yes" required>Yes - <span class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input member_in_publishers_no_yes_old_lby"
                                    id="member_in_publishers_yes_old_lby" name="member_in_publishers_yes_old_lby"
                                    value="No">No - <span class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_bg_old" name="member_in_publishers_old_lby"
                                 id="member_in_publishers_new_old_lby" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="trans_book_pub_dis_lby">
                                             <tr>
                                                <th> Title - <span class="mt-056">தலைப்பினை
                                                   அளிக்கவும்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th> Author - <span class="mt-056">ஆசிரியர் பெயரினை
                                                   அளிக்கவும்</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Language From - <span class="mt-056">எந்த
                                                   மொழியிலிருந்து</span><span
                                                      class="text-danger maditory">*</span>
                                                </th>
                                                <th>Language To - <span class="mt-056">எந்த மொழிக்கு</span><span
                                                   class="text-danger maditory">*</span>
                                                </th>
                                                <th>Add</th>
                                             </tr>
                                             <tr>
                                                <td><input type="text" id="trans_title2" name="trans_title[]"
                                                   placeholder="Enter the title *"
                                                   class="form-control name_list"/></td>
                                                <td><input type="text" id="trans_author2" name="trans_author[]"
                                                   placeholder="Enter the author *"
                                                   class="form-control name_list"/></td>
                                                <td><input type="text" id="trans_from2" name="trans_from[]"
                                                   placeholder="Enter the language from *"
                                                   class="form-control name_list"/></td>
                                                <td><input type="text"id="trans_to2" name="trans_to[]"
                                                   placeholder="Enter the language to  * "
                                                   class="form-control name_list"/></td>
                                                <td><button type="button" name="translated1_lby"
                                                   id="translated_pub_dis_lby"
                                                   class="btn btn-success">+</button></td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </hr>
                           <h4 class="fw-bold">Awarded Titles in Your Publication -<span class="mt-055"> பதிப்பகத்தில் விருது பெற்ற தலைப்புகள்<span class="text-danger maditory">*</span></span></h4>
                           </hr>
                           <div class="col-md-6 form-group ">

                              <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input yes_qus_old_asrmy"
                                          id="member_in_publishers_yes_old_asrmy"
                                          name="member_in_publishers_yes_old_asrmy" value="yes" required>Yes -
                                      <span class="mt-056">ஆம்</span>
                                  </label>
                              </div>
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input type="radio"
                                          class="form-check-input"
                                          id="member_in_publishers_yes_old_asrmy"
                                          name="member_in_publishers_yes_old_asrmy" value="No">No - <span
                                          class="mt-056">இல்லை</span>
                                  </label>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="subsidiary_pub_name_bg_oldmy" name="member_in_publishers_old_asrmy"
                                          id="member_in_publishers_new_old_asrmy" method="post">
                                          <div class="table-responsive">
                                              <table class="table table-bordered" id="trans_book_pub_dis_asrmy">
                                                  <tr>
                                                      <th> Award Name  <span class="mt-056"></span><span
                                                              class="text-danger maditory">*</span>
                                                      </th>
                                                      <th> Book Title <span class="mt-056"></span><span
                                                              class="text-danger maditory">*</span>
                                                      </th>
                                                      <th>Add</th>
                                                  </tr>
                                                  <tr>
                                                      <td><input type="text" name="trs_state_awarded_dis_pub[]" id="pub_test"
                                                              placeholder="Enter the award name*"
                                                              class="form-control name_list" /></td>
                                                      <td><input type="text" name="trs_central_awarded_dis_pub[]" id="pub_testone"
                                                              placeholder="Enter the title*"
                                                              class="form-control name_list" /></td>
                                                      <td><button type="button" name="trs_central_awarded"
                                                              id="translated_pub_dis_asrmy"
                                                              class="btn btn-success">+</button></td>
                                                  </tr>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                           </hr>
                           <div class="col-xl-3 col-md-6 col-sm-12 col-12 form-group">
                              <label for="text">Category of Books Published - <span
                                 class="mt-056">பதிப்பிக்கப்பட்ட
                              நூல்களின் வகை</span><span class="text-danger maditory">*</span></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox11"
                                    name="pub_dis_category_of_books_published[]" value="Academic"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox11">Academic - <span
                                    class="mt-056">கல்வி </span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox22"
                                    name="pub_dis_category_of_books_published[]" value="Treds"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox22">Trade Books - <span
                                    class="mt-056">வணிகரீதியான நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox33"
                                    name="pub_dis_category_of_books_published[]" value="Children"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox33">Children
                                 Books - <span class="mt-056">குழந்தைகள் நூல்கள்</span></label>
                              </div>
                           </div>
                           <div class="col-xl-4 col-md-12 col-sm-12 col-12 form-group">
                              <label for="text">Specialized Category Books - <span class="mt-056">தங்களின்
                              பதிப்பகத்தின் குறிப்பிடத்தகுந்த பிரிவு</span><span
                                 class="text-danger maditory">*</span></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox10"
                                    name="pub_dis_specialized_category_books[]" value="Children"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox10">Children Book - <span
                                    class="mt-056">சிறுவர் நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox20"
                                    name="pub_dis_specialized_category_books[]" value="Academic"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox20"> Academic Text Books - <span
                                    class="mt-056">பாட நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox30"
                                    name="pub_dis_specialized_category_books[]" value="Competitive"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Competitive Examination Books - <span class="mt-056">போட்டித்தேர்வு நூல்கள்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="fiction" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Fiction - <span
                                    class="mt-056">புனைவு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="nonfiction" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Non Fiction - <span
                                    class="mt-056">புனைவிலி நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                    value="rkdocument" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Documentation Editions - <span
                                    class="mt-056"> ஆவணப் பதிப்பு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox50"
                                    name="pub_dis_specialized_category_books[]" value="Tanslated"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30"> Translated Books - <span
                                    class="mt-056">மொழிபெயர்ப்பு நூல்கள்</span>
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                   value="government-publications" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox30">Government Publications - <span
                                   class="mt-056">அரசு வெளியீடுகள்</span>
                                </label>
                             </div>
                             <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                   value="foreign-books" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox30">Foreign Books - <span
                                   class="mt-056">வெளிநாட்டில் அச்சடிக்கப்பட்ட நூல்கள்</span>
                                </label>
                             </div>
                              {{-- <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="pub_dis_specialized_category_books[]"
                                    id="specialized_category_check2" value="Other" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox30">Others - <span
                                    class="mt-056">பிற</span></label>
                              </div>
                              <div class="specialized_category_other2">
                                 <div class="col-md-12">

                                    <input type="text" class="form-control" id="specialized_category_books_no2"
                                       name="otherSpecial"
                                       placeholder="Enter Other Category Books">
                                 </div>
                              </div> --}}
                           </div>
                           <div class="col-xl-5 col-md-12 col-sm-12 col-12 form-group">
                              <label for="text">Primary Language of Publication - <span class="mt-056">
                              வெளியீட்டின் முதன்மை மொழி</span><span
                                 class="text-danger maditory">*</span></label>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox"
                                    name="pub_dis_primary_language_of_publication[]" value="Tamil"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                    class="mt-056">தமிழ்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="customCheckbox2"
                                    name="pub_dis_primary_language_of_publication[]" value="English"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox2">English - <span
                                    class="mt-056">ஆங்கிலம்</span></label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_indian_lag3" value="others" name="pub_dis_primary_language_of_publication[]" class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox3">Other Indian Languages
                                 - <span class="mt-056">மற்ற இந்திய மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 other_indian_lang3">
                                 <input type="text" class="form-control" id="other_indian_lang3"
                                    name="otherIndian" placeholder="Enter other indian languages">
                              </div>

                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" id="other_forign_lag3" value="otherForeign" name="pub_dis_primary_language_of_publication[]" value="foreign languages"
                                    class="custom-control-input">
                                 <label class="custom-control-label" for="customCheckbox3">Other Foreign
                                 Languages - <span class="mt-056">மற்ற வெளிநாட்டு மொழிகள்</span></label>
                              </div>
                              <div class="col-md-12 mt-1 other_foreign_lang3">
                                 <input type="text" class="form-control" id="other_foreign_lang3"
                                    name="otherForeign"
                                    placeholder="Enter other foreign languages">
                              </div>
                           </div>

                                        <h4 class="fw-bold">Required Documents - <span class="mt-055">தேவைப்படும் ஆவணங்கள்<span class="text-danger maditory">*</span></span></h4>
                           {{-- <div class="card-header"> --}}
                            </hr>
                         </div>
                              <div class="col-md-6 form-group">
                              <div class="mb-3">
                                  <label for="latest_book_categories3" class="form-label">Latest Book Catalogue - <span
                                          class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                          class="text-danger maditory">*</span></label>
                                  <input class="form-control" id="latest_book_categories3" type="file" name="latest_book_categories" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                      required>
                                  <span class="text-success"><a href="{{ asset('Excel/Book catalogue _Sample Excel Format.xlsx') }}" download><small>Download Sample
                                              Excel Format</small></a></span>
                              </div>
                          </div>
                           <h4 class="fw-bold">Nature of Your Publication Ownership</h4>
                           </hr>
                           <div class="row">
                              <div class="col-md-6  form-group ">
                                 <label for="inputState" class="form-label" for="for">
                                 Nature of Your Publication Ownership - <span class="mt-056">உங்கள் வெளியீட்டு உரிமையின் தன்மை
                               </span><br>
                               <small class="text-danger">Please Ensure All File Are PDF Format Only</small>
                                 <span class="text-danger maditory">*</span>
                                 </label>
                                 <select name="pub_dis_ownership" class="wide form-control" id="pub_dis_ownership" required>
   
                                    <option value="" selected>Select Anyone</option>
   
                                    <option value="Publication">Public Limited</option>
                                    <option value="Private">Private Limited</option>
                                    <option value="limited">Limited Liability Partnership(LLP)</option>
                                    <option value="Partnership">Partnership Firm</option>
                                    <option value="oneperson">Proprietorship</option>
                                    {{-- <option value="society">Society-Trust</option> --}}
                                    <option value="trust">Private Trust</option>
                                    <option value="society">Private Society</option>
                                    <option value="institutional">Government Institutional Publication</option>
                                    <option value="trust-foundation">Government Trust/Foundation Publication</option>
                                    <option value="government-society">Government Society Publication</option>
                                 </select>
                              </div>
                              <div class="col-md-6" id="id_proof_data">
                                 <div class="pub_dis_user_file_input"></div>
   
                              </div>
                           </div>

                           </hr>
                           <div class="col-md-6 form-group ">
                              <label for="text">Do you have any subsidiary publisher and distributor? If yes, list
                              the subsidiary publisher and distributor - <span class="mt-056">பதிப்பகத்திற்கு
                              துணை பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                              தரவும்</span><span class="text-danger maditory">*</span> </label>
                              <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input yes_qus" id="subsidiary_pub_yes"
                                    name="subsidiary_pub_yes" value="yes" required>Yes - <span
                                    class="mt-056">ஆம்</span>
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input type="radio" class="form-check-input subsidiary_publications_no_yes"
                                    id="subsidiary_pub_yes" name="subsidiary_pub_yes" value="No">No - <span
                                    class="mt-056">இல்லை</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="subsidiary_pub_name_bg" name="sub_pub_name_os"
                                       id="sub_pub_name_os" method="post">
                                       <div class="table-responsive">
                                          <table class="table table-bordered"
                                             id="tbl_subsidiary_publishcation_no">
                                             <tr>
                                                <th> Name of the subsidiary book publisher and
                                                   distributor <span
                                                   class="text-danger maditory"> *</span>
                                                </th>
                                                <th> Name of the subsidiary book publication and
                                                   distribution<span
                                                   class="text-danger maditory"> *</span>
                                                </th>
                                                <th>Stock holder percentage<span
                                                   class="text-danger maditory"> *</span></th>
                                                <th>Document<span class="text-danger maditory"> *</span></th>
                                                <th>Add</th>

                                             </tr>
                                             <tr>
                                                <td><input type="text"
                                                   name="subsidiary_publisher_distributor[]"
                                                   placeholder="Enter the name of the subsidiary book publisher and distributor"
                                                   class="form-control name_list"
                                                   id="subsidiary_publisher_distributor" /></td>
                                                <td><input type="text"
                                                   name="subsidiary_publication_distribution[]"
                                                   placeholder="Enter the name of the subsidiary book publication and distribution"
                                                   class="form-control name_list"
                                                   id="subsidiary_publication_distribution" /></td>
                                                <td><input type="number"
                                                   id="subsidiary_stackpercentage"
                                                   name="subsidiary_stackpercentage[]"
                                                   placeholder="Enter the stock holder percentage"
                                                   class="form-control name_list" /></td>
                                                <td> <input class="form-control"
                                                   id="subsidiary_publication_distribution_file"
                                                   name="subsidiary_publication_distribution_file[]"
                                                   placeholder="Enter the document" type="file" accept="application/pdf,application/vnd.ms-excel" multiple
                                                   >
                                                   <span class="text-danger"><small>Please Ensure All File Are PDF Format Only</small></span>
                                                </td>
                                                <td><button type="button" name="sub_pub_name_op"
                                                   id="sub_pub_name_op"
                                                   class="btn btn-success">+</button>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <h4 class="fw-bold">Declaration:</h4>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                                 value="yes" required>
                              <label class="form-check-label">I, hereby, do solemnly declare and affirm that the information provided in this application form is true, complete, and accurate to the best of my knowledge and belief. I understand that any false or misleading information may result in the rejection of my application or other appropriate legal actions.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check2" name="declaration-two"
                                 value="yes" required>
                              <label class="form-check-label">Acknowledge that I will submit five copies each book for review and selection purposes.
Archiving purpose: To comply with the delivery of books (Public Libraries) Act, 1954, send one copy of all published books to Connemara Public Library. Additionally, send one copy to state libraries such as Anna Centenary Library,Chennai and Kalaignar Centenary Library in Madurai for archiving of Books.
Review purpose:  send two copies for review of books in Chennai for review. Address to be sent: Anna Centenary Library, Chennai.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check3" name="declaration-three"
                                 value="yes" required>
                              <label class="form-check-label">Acknowledge that I will send the purchased books to the central facility in Chennai, from where the delivery partner distributes the books to various libraries across Tamil Nadu.</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="check4" name="declaration-four"
                                 value="yes" required>
                              <label class="form-check-label">I acknowledge that a payment of an application fee is required for each book submission. This fee is necessary to ensure that submissions are taken seriously and to cover the costs associated with evaluating the submissions.</label>
                           </div>
                           <div class="col-12 text-end ">
                              <button type="submit" name="reg_publisher_and_distributor" class="btn btn-primary"
                                 id="reg_publisher_and_distributor">Submit</button>
                           </div>
                        </form>
                        <div id="loadingBar2" class="loading-bar" style="display: none;">
                           <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                         </div>
                <div class="loading-text">Loading...</div>
                     </div>
                     @endif
                  </div>
               </div>
            </section>
         </div>
        <!-- Your Content End Here -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>

            <script src="js/register.js"></script>
            <script>
                // password
                $(".toggle-password").click(function() {
                // alert('good');
                $(this).toggleClass("fa-eye fa-eye-slash");
                input = $(this).parent().find("input");
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
            </script>
</body>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.validation-errors').fadeOut('slow');
            }, 15000); 
        });
    </script>

@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
</html>

<style>
h5 {
    color: #ffffff;
    font-weight: 400;
    background: linear-gradient(58deg, #1e631e, #c8dac8);
    width: auto;
    font-size: 20px;
    line-height: 1;
    margin: 10px 10px 30px 0px;
    padding: 14px;
    border-left: 10px solid #ffc10799;
    box-shadow: 4px 2px 15px 0px rgb(199 199 199);
}

span.mt-055 {
    font-size: 14px;
    font-weight: 900;
}

span.mt-056 {
    font-size: 11px;
    font-weight: 200;
}
.toggle-password {
    float: right;
    cursor: pointer;
    margin-right: 10px;
    margin-top: -25px;
}
</style>
<style>
/* Style for loading bar */
.loading-bar {
    display: none; /* Initially hide the loading bar */
    position: fixed;
    top: 50%; /* Position from the top */
    left: 50%; /* Position from the left */
    transform: translate(-50%, -50%); /* Center the loading bar both horizontally and vertically */
    width: 200px; /* Adjust the width as needed */
    height: 40px; /* Adjust the height as needed */
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 5px; /* Add border radius for rounded corners */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999; /* Ensure loading bar is above other elements */
}

/* Style for loading spinner */
.spinner-border {
    width: 1.5rem; /* Adjust the width of the spinner */
    height: 1.5rem; /* Adjust the height of the spinner */
    color: #007bff; /* Set the color of the spinner */
}

</style>
<style>
        /* Style to make form semi-transparent when loading bar is shown */
        #form_publisher.loading {
            opacity: 0.5;
        }
    </style>
<style>
        /* Style to make form semi-transparent when loading bar is shown */
        #form_distriputor.loading1 {
            opacity: 0.5;
        }
    </style>
    <style>
        /* Style to make form semi-transparent when loading bar is shown */
        #reg_publisher_and_distributor_form.loading2 {
            opacity: 0.5;
        }
    </style>
