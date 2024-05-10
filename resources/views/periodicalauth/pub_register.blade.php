<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'plugin/css.php'; ?>
</head>
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
    
</style>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->
        @include('header.top_header')
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->
        {{-- @include("header.middile_navigation") --}}
        @include('header.navigation')
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->
        @include('header.mobile_navigation')
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->
    <main>
        <div class="container mt-4">

            <div class="card">
                <h5>Transparent Periodical Procurement-2024</h5>
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
                       
                <form class="row g-3 needs-validation" id="magazine_publisher_register" novalidate method="POST" enctype="multipart/form-data"  action="/periodical/create/publisher" autocomplete="on">
                @csrf   
                {{-- <div class="card-header p-3 fw-bold fs-4">Magazine Users Registeration</div> --}}
                    <div class="card-body">
                        <div class="row">

                            <div class="pub_details">
                                <h6 class="fw-bold">Publication Details - <span class="mt-055"> பதிப்பு விவரம்</span>
                                </h6>
                                <!-- <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Publication Name - <span
                                                class="mt-056">பதிப்பகத்தின் பெயர்</span> <span
                                                class="text-danger maditory">*</span></label>
                                    </div>
                                  <div class="col-md-6">
                                        <input type="text" class="form-control " id="inputEmail4"
                                            name="publication_name" placeholder="Enter the publication name" required>
                                        <div class="invalid-feedback"> Please Enter publication Name. </div>
                                    </div>
                                </div> -->

                                {{-- <div class="row mb-3 border border-0 p-2 m-2">
                                    <input type="text" class="form-control" name="usertype" hidden value="publisher" required />
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Name of the Periodical/Magazine  - <span
                                                    class="mt-056">பருவ இதழ் பெயர்</span> <span
                                                    class="text-danger maditory">*</span></label>
                                        </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " id="inputEmail4"
                                            name="name_periodical" placeholder="Enter the name of the periodical/magazine" required>
                                        <div class="invalid-feedback"> Please enter name of the periodical/magazine. </div>
                                    </div>
                                </div> --}}
                                <input type="text" class="form-control"
                           name="usertype" hidden value="publisher"
                           required />
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Name Of the Publication  <span
                                                class="mt-056"></span> <span
                                                class="text-danger maditory">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " id="inputEmail5"
                                            name="publication_name" placeholder="Enter the Name Of the Publication" required>
                                        <div class="invalid-feedback"> Please Enter Name Of the Publication</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_login_details">
                                <h6 class="fw-bold">Login Details - <span class="mt-055">உள்நுழைவு விவரங்கள்</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">User Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="user_name"
                                            placeholder="Enter your user name" name="userName" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter username. </div>
                                        <p id="checkusername" style="color: rgb(202, 14, 14)"></p>
                                        <input id="usernameval" type="text" name="usernameval" value="" hidden/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">Password <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="*********" required name="password" autocomplete="false">
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter password. </div>
                                        <p id="divCheckPasswordMatch" style="color: rgb(202, 14, 14)"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">Confirm Password <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                            placeholder="*********" required autocomplete="false">
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter password. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_publisher_details">
                                <h6 class="fw-bold">Publisher Details - <span class="mt-055">பதிப்பக உரிமையாளரின்
                                        விவரங்கள்</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01" class="form-label">First Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="pub_first_name"
                                            placeholder="Enter your first name" name="pub_first_name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter first name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Last Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="pub_last_name"
                                            placeholder="Enter your last name" required name="pub_last_name">
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter last name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">E-mail ID<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="email" class="form-control" id="pub_email_id" name="email"
                                            placeholder="Enter your e-mail id" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter e-mail id. </div>
                                        <p id="checkemail" style="color: rgb(202, 14, 14)"></p>
                                 <input id="emailval" type="text" name="emailval" value="" hidden/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Contact Number<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="contact_number"
                                        name="contact_number" placeholder="+919XXXXXXXX" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter mobile number. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">Country<span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_country"
                                            required>
                                            @foreach ($country as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Country.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">State <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_state" class="wide form-control" name="pub_state" required>
                                        <option value="" selected>Select State</option>
                                        @foreach ($state as $val)
                                 <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your State.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">District <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_district" class="wide form-control" name="pub_district"
                                            required>
                                            <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                  <option value="{{$val->name}}">{{$val->name}}</option>
                               @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your District.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">City <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text"  class="form-control" id="pub_city" name="pub_city"
                                 placeholder="Enter your city" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please select your city.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Pincode <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="pub_pin_code"
                                        name="pub_pin_code" placeholder="Enter your pincode" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter last name. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTextarea" class="form-label">Publication Address<span
                                                class="text-danger maditory">*</span></label>
                                        <textarea class="form-control" name="pub_address" id="pub_address" placeholder="Enter your publication address" required></textarea>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter your address.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_publisher_contact_details">
                                <h6 class="fw-bold">Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள
                                        வேண்டிய நபரின் விவரங்கள்</span></h6>
                                        <small>Same as above - நபரின் விவரங்கள் (மேற்கூறியவாறு) 
                                            <input class="form-check-input" type="checkbox" id="publication_check" name="option1" onclick="myFunction(this)" value="samething"></small>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01" class="form-label">First Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="con_first_name"
                                            placeholder="Enter your first name" name="contact_first_name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter first name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Last Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="con_last_name" name="contact_last_name"
                                            placeholder="Enter your last name" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter last name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">E-mail ID<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="email" class="form-control" id="con_email_id" name="con_email_id"
                                            placeholder="Enter your e-mail id" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter e-mail id. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Contact Number<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="con_contact_number"
                                        name="con_contact_number" placeholder="+919XXXXXXXX" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter mobile number. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">Country<span
                                                class="text-danger maditory">*</span></label>
                                        <select id="con_country" class="wide form-control" name="con_country"
                                            required>
                                            @foreach ($country as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Country.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">State <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="con_state" class="wide form-control" name="con_state" required>
                                        <option value="" selected>Select State</option>
                                        @foreach ($state as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please select your state.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">District <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="con_district" class="wide form-control" name="con_district"
                                            required>
                                            <option value="" selected>Select District</option>
                                @foreach ($district as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                  @endforeach
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your District.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">City <span
                                                class="text-danger maditory">*</span></label>
                                                <input type="text"  class="form-control" id="con_city" name="con_city"
                                 placeholder="Enter your city" required>
                                        
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please select your city.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Pincode <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="con_pin_code" name="con_pin_code"
                                            placeholder="Enter your pincode" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter last name. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTextarea" class="form-label">Publication Address<span
                                                class="text-danger maditory">*</span></label>
                                        <textarea class="form-control" name="con_publication_address" id="con_publication_address" placeholder="Enter your publication address" required></textarea>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter publication address.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="other_details">
                                <h6 class="fw-bold">Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01" class="form-label">Year of Establishment -
                                            தொடங்கப்பட்ட ஆண்டு <span class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="validationCustom09"
                                        name="publication_shop_established_year" placeholder="Enter the year of establishment" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter year of establishment. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02" class="form-label">Years of Experience in
                                            Periodical/Magazine Publication - பருவ இதழ் பதிப்பில் அனுபவம்(வருடங்களில்)
                                            <span class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="validationCustom01"
                                        name="year_of_experience" placeholder="Enter the years of experience in periodical/magazine publication"
                                            required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter years of experience in
                                            periodical/magazine publication. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom02" class="form-label">Number of
                                            Periodical/Magazine Circulation Per Year - ஒரு வருடத்தில் விற்கப்பட்ட பருவ
                                            இதழ்களின் எண்ணிக்கை ( பொது நூலகங்கள் அல்லாது)<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="validationCustom090"
                                        name="number_of_magazines_year"  placeholder="Enter the number of periodical/magazine circulation per year" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please enter number of
                                            periodical/magazine circulation per year. </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="translated_magazine">
                                <h6 class="fw-bold">Translated Versions of the periodical/Magazine (if any) <span class="mt-055"> -  பருவ இதழ் பிற மொழியில் மொழிபெயர்க்கப்பட்டுள்ளதா (ஏதேனும் இருந்தால் குறிப்பிடவும்) </span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 form-group ">
                                        <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input trs_qus_yes" id="translated_book_yes" name="translated_book" value="yes"
                                                    required="">Yes - <span class="mt-056">ஆம்</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input trs_qus_no" id="translated_book_no" name="translated_book" value="No">No - <span
                                                    class="mt-056">இல்லை</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="subsidiary_pub_name_bg_old"  id="magazine_member_in_publishers"  style="display: none;">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="trans_book_pub_dis">
                                                            <tbody class="removecl">
                                                                <tr>
                                                                    <th> Title - <span
                                                                            class="mt-056">தலைப்பு</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th> Author - <span
                                                                            class="mt-056">நூலாசிரியர்</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Language From - <span class="mt-056">எந்த
                                                                            மொழியிலிருந்து</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Language To - <span class="mt-056">எந்த
                                                                            மொழிக்கு</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Add</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="trans_title[]" placeholder="Enter the title*" class="form-control name_list" required></td>
                                                                    <td><input type="text" name="trans_author[]" placeholder="Enter the author*" class="form-control name_list" required></td>
                                                                    <td><input type="text" name="trans_from[]" placeholder="Enter the language from*" class="form-control name_list" required></td>
                                                                    <td><input type="text" name="trans_to[]" placeholder="Enter the language to * " class="form-control name_list" required></td>
                                                                    <td><button type="button" name="translated1" id="translated_pub_dis" class="btn btn-success">+</button></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="awarded_titles">
                                <h6 class="fw-bold">Awards if Any - <span class="mt-055"> பருவ இதழ் பெற்ற விருது/விருதுகள் (ஏதேனும் இருந்தால் குறிப்பிடவும்)</span>
                                 </h6>
                                 <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 form-group ">

                                        <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input yes_qus_old_asrmy"
                                                    id="member_in_publishers_yes_old_asrmy_yes"
                                                    name="member_in_publishers_yes_old_asrmy" value="yes" required>Yes -
                                                <span class="mt-056">ஆம்</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio"
                                                    class="form-check-input"
                                                    id="member_in_publishers_yes_old_asrmy_no"
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
                                                                <th> Award Name  <span class="mt-056"></span><span class="text-danger maditory">*</span> </th>
                                                                <th> Book Title <span class="mt-056"></span><span class="text-danger maditory">*</span> </th>
                                                                <th>Add</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="trs_state_awarded[]" id="pub_test" placeholder="Enter the award name*" class="form-control award_name_list" /></td>
                                                                <td><input type="text" name="trs_central_awarded[]" id="pub_testone" placeholder="Enter the title*" class="form-control award_name_list" /></td>
                                                                <td><button type="button" name="trs_central_awarded" id="translated_pub_dis_asrmy" class="btn btn-success">+</button></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="subject_category_periodical">
                                <h6 class="fw-bold">Specialized Category Magazine  -<span class="mt-055"> தங்களின்
                                    பதிப்பகத்தின் குறிப்பிடத்தகுந்த பிரிவு</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 form-group">

                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox10" name="specialized_category_magazine[]" value="General" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox10">பொது  - General</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox20" name="specialized_category_magazine[]" value="Children Magazine" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox20">சிறார் இதழ்கள் - Children Magazine</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox30" name="specialized_category_magazine[]" value="Economics" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox30">பொருளாதாரம் -  Economics</label>
                                    </div>
                                    
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox40" name="specialized_category_magazine[]" value="Young" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox40">இளைஞர் - Young</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox41" name="specialized_category_magazine[]" value="Sports" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox41">விளையாட்டு -Sports</label>
                                    </div>
                                    
                                    
                                 </div>
                                 <div class="col-md-6 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox42" name="specialized_category_magazine[]" value="Health" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox42">Health - உடல் நலம்</label>
                                     </div>

                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox44" name="specialized_category_magazine[]" value="Entertainment" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox44">Entertainment - பொழுதுபோக்கு</label>
                                     </div>

                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox45" name="specialized_category_magazine[]" value="Competitive" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox45">Competitive - போட்டித்தேர்வு</label>
                                     </div>

                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox46" name="specialized_category_magazine[]" value="Religion" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox46">Religion - சமயம்</label>
                                     </div>

                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox47" name="specialized_category_magazine[]" value="Science & Technology" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox47"> Science & Technology - அறிவியல் மற்றும் தொழில் நுட்பம்  </label>
                                     </div>
                                     <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox49" name="specialized_category_magazine[]" value="Women" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox49"> Women - பெண்கள்
                                        </label>
                                     </div>

                                     <div class="specialized_category_other" style="display: none;">
                                        <div class="col-md-12">
                                           <!-- <label for="inputAddress" class="form-label">Other Category Books</label> -->
                                           <input type="text" class="form-control" id="specialized_category_books_no" name="other_specialized_category_books" placeholder="Enter the other category books">
                                        </div>
                                     </div>
                                 </div>

                                 <div class="col-md-6 form-group">
                                    {{-- <label for="text">Primary Language of Publication - <span class="mt-056">வெளியீட்டின் முதன்மை மொழி</span><span class="text-danger maditory">*</span></label> --}}
                                    <h6 class="fw-bold mt-3 mb-3">Primary Language of Publication -<span class="mt-055"> வெளியீட்டின் முதன்மை மொழி</span></h6>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox" name="primary_language_of_publication[]" value="Tamil" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox">Tamil - <span class="mt-056">தமிழ்</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="customCheckbox2" name="primary_language_of_publication[]" value="English" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox2">English - <span class="mt-056">ஆங்கிலம்</span></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="other_indian_lag" name="primary_language_of_publication[]" value="Other" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox3">Other Indian
                                       Languages -<span class="mt-056"> மற்ற இந்திய மொழிகள்</span></label>
                                    </div>
                                    <div class="col-md-12 other_indian_lang mb-2 mt-2" style="display: none;">
                                       <input type="text" class="form-control" id="other_indian_lang" name="other_indian_language" placeholder="Enter the other indian languages">
                                    </div>
                                    <!--<div class="col-md-6">
                                       <input type="text" class="form-control" id="inother_indian_lang"
                                           name="other_indian_lang" placeholder="Enter Other Indian Languages">
                                       </div> -->
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" id="other_forign_lag" name="primary_language_of_publication[]" value="foreign languages" class="custom-control-input">
                                       <label class="custom-control-label" for="customCheckbox3">Other Foreign
                                       Languages - <span class="mt-056">மற்ற வெளிநாட்டு மொழிகள்</span></label>
                                    </div>
                                    <div class="col-md-12 mt-1 other_foreign_lang mb-2 mt-2" style="display: none;">
                                       <input type="text" class="form-control" id="other_foreign_lang" name="other_foreign_language" placeholder="Enter the other foreign languages">
                                    </div>
                                 </div>

                                </div>
                            </div>
                            <div class="nature_of_ownership">
                                <h6 class="fw-bold">Nature of Your Publication Ownership</h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6  form-group ">
                                        <label for="inputState" class="form-label">
                                        Nature of Your Publication Ownership
                                        <span class="text-danger maditory">*</span><br>
                                        <small class="text-danger">Please upload the file in PDF format and ensure that it is below 5 MB</small>
                                        </label>
                                        <select name="pub_ownership" class="wide form-control" id="pub_ownership" required="">
                                        
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
                                </div>
                            </div>
                            <div class="subsidiary_publications">
                                <h6 class="fw-bold">Subsidiary Publications</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                <div class="col-md-6 form-group ">
                                    <label for="text">Do you have any subsidiary publications? If yes, list the subsidiary publication - <span class="mt-056">தங்கள் பதிப்பகத்திற்கு துணை
                                    பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                                    தரவும்</span><span class="text-danger maditory">*</span></label>
                                    <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                    <div class="form-check">
                                       <label class="form-check-label">
                                       <input type="radio" class="form-check-input yes_qus" id="subsidiary_publications_no" name="subsidiary_publications" value="yes" required="">Yes - <span class="mt-056">ஆம்</span>
                                       </label>
                                    </div>
                                    <div class="form-check">
                                       <label class="form-check-label">
                                       <input type="radio" class="form-check-input subsidiary_publications_no_yes no_qus" id="subsidiary_publications_yes" name="subsidiary_publications" value="No">No -
                                       <span class="mt-056">இல்லை</span>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="col-md-6 subsidiaryEnable" style="display: none;">
                                 </div>
                                 <div class="col-md-12">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="subsidiary_pub_name" name="subsidiary_publishcation_no" id="subsidiary_publishcation_no" method="post" style="display: none;">
                                             <div class="table-responsive">
                                                <table class="table table-bordered" id="subsidiary_publishcation_no_tbl">
                                                   <tbody><tr>
                                                      <th>Name of the subsidiary publication<span class="text-danger maditory">*</span></th>
                                                      <th>Name of the subsidiary Publisher<span class="text-danger maditory">*</span></th>
                                                      <th>Stock holder percentage<span class="text-danger maditory">*</span></th>
                                                      <th>Document<span class="text-danger maditory">*</span></th>
                                                      <th>Add</th>
                                                   </tr>
                                                   <tr>
                                                      <td><input type="text" id="name_of_the_subsidiary_publication" name="name_of_the_subsidiary_publication[]" placeholder="Enter the name of the subsidiary publication " class="form-control sub_name_list" required></td>
                                                      <td><input type="text" id="content_of_the_subsidiary_publication" name="name_of_the_subsidiary_publisher[]" placeholder="Enter the name of the subsidiary publisher" class="form-control sub_name_list" required></td>
                                                      <td><input type="number" id="content_of_the_subsidiary_publication_stack" name="stack_holder_percentage[]" placeholder="Enter the stock holder percentage" class="form-control sub_name_list" required></td>
                                                      <td> <input class="form-control sub_name_list" id="content_of_the_subsidiary_publication_file" name="subsidiary_doc[]" accept="application/pdf,application/vnd.ms-excel" placeholder="Enter the document"  type="file" multiple="" required>
                                                         <span class="text-danger"><small>Please upload the file in PDF format and ensure that it is below 5 MB</small></span>
                                                      </td>
                                                      <td><button type="button" name="sub_pub_add" id="sub_pub_add" class="btn btn-success">+</button>
                                                      </td>
                                                   </tr>
                                                </tbody></table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                </div>
                            </div>
                            <div class="document_agrement mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declaration" name="declaration" value="yes" required="">
                                    <label class="form-check-label">I, hereby, do solemnly declare and affirm that the information provided in this application form is true, complete, and accurate to the best of my knowledge and belief. I understand that any false or misleading information may result in the rejection of my application or other appropriate legal actions.</label>
                                 </div>

                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declarationtwo" name="declaration-two" value="yes" required="">
                                    <label class="form-check-label">Acknowledge that I will submit  3 copies (Latest) of each periodical for review and selection purposes to Anna Centenary Library, Chennai</label>
                                 </div>

                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declarationthree" name="declaration-three" value="yes" required="">
                                    <label class="form-check-label">Acknowledge that I will send the purchased periodicals to the selected libraries across Tamil Nadu.</label>
                                 </div>

                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="declarationfour" name="declaration-four" value="yes" required="">
                                    <label class="form-check-label">I acknowledge that a payment of an application fee is required for each periodical submission. This fee is necessary to ensure that submissions are taken seriously and to cover the costs associated with evaluating the submissions.</label>
                                 </div>
                            </div>
                        <div class="card-footer text-muted text-end">
                            <button type="submit" class="btn btn-primary" id="btn_publisher_submit_form"> Submit</button>
                        </div>
                        <div id="loadingBar" class="loading-bar" style="display: none;">
                           <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                         </div>
                <div class="loading-text">Loading...</div>
                     </div>
                    </div>
                </form>
            </div>
    </main>
    <!-- footer-area-start -->
    @include('footer.footer')
    <!-- footer-area-end -->
    <?php include 'plugin/js.php'; ?>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            // Check if the form is empty
            var isEmpty = true;
            form.querySelectorAll('input, textarea').forEach(function(input) {
                if (input.value.trim() !== '') {
                    isEmpty = false;
                }
            });

            // If the form is empty, prevent submission and scroll to the first empty input field
            if (isEmpty) {
                event.preventDefault();
                event.stopPropagation();
                var firstEmptyInput = form.querySelector('input[value=""], textarea[value=""]');
                if (firstEmptyInput) {
                    firstEmptyInput.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                // If the form is not empty, check if it's valid
                if (!form.checkValidity()) {
                    // Prevent form submission if it's not valid
                    event.preventDefault();
                    event.stopPropagation();
                }
            }

            // Add Bootstrap's validation styles to the form
            form.classList.add('was-validated');
        }, false);
    });
})();
    </script>
    <script>
        $(document).ready(function() {
            /*************************************
             // Translated Books
            ***************************************/
            // $('#magazine_member_in_publishers').css('display', 'none');
            // // $('#subsidiary_publications').css('display', 'none');
            // var sra = 1;
            // $('input[type=radio][name=translated_book]').on('change', function() {
            //     switch ($(this).val()) {
            //         case 'yes':
            //             $('#magazine_member_in_publishers').css('display', 'block');
            //             $("input.name_list").prop('required', true);
            //             break;
            //         case 'No':
            //             sra = 0;
            //             $('div#magazine_member_in_publishers').css('display', 'none')
            //             $("input.name_list").prop('required', false);
            //             // $('.removecl').empty();
            //             break;
            //     }
            // });

            //     var trs_pub_sit = 0;
            //     $('#translated_pub_dis').click(function () {
            //         trs_pub_sit++;
            //         if (trs_pub_sit < 5) {
            //             $('#trans_book_pub_dis').
            //                 append('<tr id="row' + trs_pub_sit +
            //                 '"><td><input type="text" name="trans_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter the language from*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter the language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
            //                     trs_pub_sit + '" class="btn btn-danger btn_remove_trs">X</button></td></tr>');
            //         } else {
            //             // $('#translated_pub_dis').prop('disabled', true);
            //             alert('Allowed 5 input only ');

            //         }
            //     });


            // $(document).on('click', '.btn_remove_trs', function() {
            //     var button_id = $(this).attr("id");
            //     $('#row' + button_id + '').remove();
            //     trs_pub_sit --;
            // });
            /*************************************
             // End Best 5 Translated Books
            ***************************************/

               /*************************************
                // Awarded Titles in The Publication
              ***************************************/
                // var i='';
                // var pubtrsfivecounter = 0;
                // $('#awarded_titles').click(function () {
                //     // alert('good');
                //     if (pubtrsfivecounter < 5) {
                //         i++;
                //         pubtrsfivecounter++;
                //         $('#awarded_titles_name').
                //             append('<tr id="row' + i +
                //             '"><td><input type="text" name="trs_state_awarded[]" placeholder="Award Name*" class="form-control" required/></td><td><input type="text" name="trs_central_awarded[]" placeholder=" Title *" class="form-control" required/></td><td><button type="button" name="remove" id="' +
                //             i + '" class="btn btn-danger btn_remove_awarded">X</button></td></tr>');
                //     } else {
                //         $('#awarded_titles').prop('disabled', true);
                //         alert('Allowed 5 input only ');
                //     }
                // });

                // $(document).on('click', '.btn_remove_awarded', function () {
                //     var button_id = $(this).attr("id");
                //     $('#row' + button_id + '').remove();
                //     if (pubtrsfivecounter <= 5) {
                //         $('#awarded_titles').prop('disabled', false);
                //     }
                //     pubtrsfivecounter--;
                // });


                var sramy = 3;
                $('#member_in_publishers_new_old_asrmy').css('display', 'none');
                $('input[type=radio][name=member_in_publishers_yes_old_asrmy]').on('change', function () {
                    switch ($(this).val()) {
                        case 'yes':
                        $('#member_in_publishers_new_old_asrmy').css('display', 'block');
                        $('input.award_name_list').prop('required', true);
                            break;
                        case 'No':
                        $('#member_in_publishers_new_old_asrmy').css('display', 'none');
                        $('input.award_name_list').prop('required', false);
                            break;
                    }
                });

                
                $('#translated_pub_dis_asrmy').click(function () {
                    sramy++;
                    $('#trans_book_pub_dis_asrmy').
                    append('<tr id="row' + sramy +
                    '"  class="removecl"><td><input type="text" name="trs_state_awarded_dis_pub[]" placeholder="Enter the award name*" class="form-control award_name_list" required/></td><td><input type="text" name="trs_central_awarded_dis_pub[]" placeholder="Enter the title *" class="form-control award_name_list" required/></td><td><button type="button" name="remove" id="' +
                    sramy + '" class="btn btn-danger btn_remove_best_five_my">X</button></td></tr>');

                });
                $(document).on('click', '.btn_remove_best_five_my', function () {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                    if (pubtrsfivecounter <= 4) {
                    $('#awarded_titles_dis_pub').prop('disabled', false);
                    }
                    pubtrsfivecounter--;
                });
                /*************************************
                 // End Awarded Titles in The Publication
                ***************************************/

                   // Specialized Category Books
                $('input[name="specialized_category_magazine[]"]').on('change', function () {
                    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
                });

                $('#btn_publisher_submit_form').on('click', function () {
                    $("#magazine_publisher_register").submit(function (e) {
                        var pd_s_ctg_book = $("[name='specialized_category_magazine[]']:checked").length; // count the checked rows
                        var pd_p_lan_book = $("[name='primary_language_of_publication[]']:checked").length; // count the checked rows

                        if (pd_s_ctg_book != 0) {
                            if (pd_p_lan_book != 0) {

                            } else {
                                toastr.error("Please select any One Primary Language");
                                e.preventDefault();
                            }
                            } else {
                                toastr.error("Please select any One Spacial Category of Magazine Published");
                            e.preventDefault();
                        }
                    });
                });
                
                /*************************************
                 // specialized_category_other
                ***************************************/
                $('.specialized_category_other2').css('display', 'none');
                $('.other_indian_lang').css('display', 'none');
                $('.other_foreign_lang').css('display', 'none');
                $('.subsidiaryEnable2').css('display', 'none');

                $("#specialized_category_check2").click(function () {
                    var checkValue = $(this).is(":checked");
                    // alert(checkValue);
                    if (checkValue == true) {
                        $('.specialized_category_other2').css('display', 'block');
                        $('#specialized_category_books_no2').prop('required', true);
                    } else if (checkValue == false) {
                        $('.specialized_category_other2').css('display', 'none');
                        $('#specialized_category_books_no2').prop('required', false);
                    }
                });

                $("#other_indian_lag").click(function () {
                    var checkValue = $(this).is(":checked");
                    // alert(checkValue);
                    if (checkValue == true) {
                        $('.other_indian_lang').css('display', 'block');
                        $('input#other_indian_lang').prop('required', true);
                    } else if (checkValue == false) {
                        $('.other_indian_lang').css('display', 'none');
                        $('input#other_indian_lang').prop('required', false);
                    }

                });


                $("#other_forign_lag").click(function () {
                    var checkValue = $(this).is(":checked");
                    // alert(checkValue);
                    if (checkValue == true) {
                        $('.other_foreign_lang').css('display', 'block');
                        $('input#other_foreign_lang').prop('required', true);
                    } else if (checkValue == false) {
                        $('.other_foreign_lang').css('display', 'none');
                        $('input#other_foreign_lang').prop('required', false);
                    }
                });

                $('#member_in_publishers_new').css('display', 'none');
                // $('#subsidiary_publications').css('display', 'none');
                /*************************************
                 // End specialized_category_other
                ***************************************/

                /*************************************
                 // Ownershipt Data
                ***************************************/
                $('#ownership_doc').css('display','none');

                $('#pub_ownership').on('change',function(){
                var value = $(this).val();
                //   alert(value);
                if(value == 'Proprietorship'){
                    //  $('#ownership_doc').css('display','block');
                    $('.user_file_input').append('<div id="proprietorship_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" placeholder="Enter the udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter the GST" class="form-control name_list"/></div>');

                    $("#partnership_input").remove();
                    $("#private_input").remove();
                    $("#publication_input").remove();
                    $("#oneperson_input").remove();
                    $('#limited_input').remove();
                    $('#society_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }
                else if(value == 'Partnership'){
                    // $('#ownership_doc').css('display','block');
                    $('.user_file_input').append('<div id="partnership_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list"/><label for="formFileSm" class="form-label">Partnership Deed <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input accept="application/pdf,application/vnd.ms-excel" type="file" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input accept="application/pdf,application/vnd.ms-excel" type="file" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $("#private_input").remove();
                    $("#publication_input").remove();
                    $("#oneperson_input").remove();
                    $('#limited_input').remove();
                    $('#society_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }
                else if(value == 'Private'){
                $('.user_file_input').append('<div id="private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span><span class="text-danger "></span></label><input type="file" name="moa" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list"/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span><span class="text-danger"></span></label><input type="file" name="aoa"accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" /><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                $("#proprietorship_input").remove();
                $("#partnership_input").remove();
                $("#publication_input").remove();
                $("#oneperson_input").remove();
                $('#limited_input').remove();
                $('#society_input').remove();
                $('#trust_input').remove();
                $('#institutional_input').remove();
                $('#trust-foundation_input').remove();
                $('#government-society_input').remove();

                }
                else if(value == 'Publication'){
                    //  $('#ownership_doc').css('display','block');
                    $('.user_file_input').append('<div id="publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" placeholder="Enter the award author*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter the award author*" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" placeholder="Enter the award author*" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $("#partnership_input").remove();
                    $("#private_input").remove();
                    $("#user_file_input").remove();
                    $("#oneperson_input").remove();
                    $('#limited_input').remove();
                    $('#society_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }else if(value == 'oneperson'){
                    //  $('#ownership_doc').css('display','block');
                    $('.user_file_input').append('<div id="oneperson_input"><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" /><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    //  $("#proprietorship_input").remove();
                    $('#proprietorship_input').remove();
                    $('#partnership_input').remove();
                    $("#private_input").remove();
                    $("#user_file_input").remove();
                    $('#limited_input').remove();
                    $('#publication_input').remove();
                    $('#society_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();


                }else if(value == 'limited'){

                    $('.user_file_input').append('<div id="limited_input"><label for="formFileSm" class="form-label">LLP Agreement  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#society_input').remove();
                    $('#publication_input').remove();
                    $('#oneperson_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();



                }else if(value == 'trust'){

                    $('.user_file_input').append('<div id="trust_input"><label for="formFileSm" class="form-label">Private Trust Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_trust" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#limited_input').remove();
                    $('#oneperson_input').remove();
                    $('#publication_input').remove();
                    $('#society_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }else if(value == 'society'){

                    $('.user_file_input').append('<div id="society_input"><label for="formFileSm" class="form-label">Private Society Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#limited_input').remove();
                    $('#oneperson_input').remove();
                    $('#publication_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }else if(value == 'institutional'){

                    $('.user_file_input').append('<div id="institutional_input"><label for="formFileSm" class="form-label">Government Institutional Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="institution" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#limited_input').remove();
                    $('#oneperson_input').remove();
                    $('#publication_input').remove();
                    $('#trust_input').remove();
                    $('#society_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();

                }else if(value == 'trust-foundation'){

                    $('.user_file_input').append('<div id="trust-foundation_input"><label for="formFileSm" class="form-label">Government Trust/Foundation Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="trust_foundation" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#limited_input').remove();
                    $('#oneperson_input').remove();
                    $('#publication_input').remove();
                    $('#trust_input').remove();
                    $('#society_input').remove();
                    $('#institutional_input').remove();
                    $('#government-society_input').remove();

                }else if(value == 'government-society'){

                    $('.user_file_input').append('<div id="government-society_input"><label for="formFileSm" class="form-label">Government Society Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $('#limited_input').remove();
                    $('#oneperson_input').remove();
                    $('#publication_input').remove();
                    $('#trust_input').remove();
                    $('#society_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();

                }else{
                    $("#proprietorship_input").remove();
                    $('#partnership_input').remove();
                    $("#user_file_input").remove();
                    $("#private_input").remove();
                    $("#publication_input").remove();
                    $("#oneperson_input").remove();
                    $('#limited_input').remove();
                    $('#society_input').remove();
                    $('#trust_input').remove();
                    $('#institutional_input').remove();
                    $('#trust-foundation_input').remove();
                    $('#government-society_input').remove();
                }
                });
                /*************************************
                 //End Ownershipt Data
                ***************************************/

                /*************************************
                 //Subssidary Application 
                ***************************************/

                $('#subsidiary_publishcation_no').css('display', 'none');
                var w = 0;
                $('#name_of_the_subsidiary_publication').attr('required', false);
                $('input[type=radio][name=subsidiary_publications]').on('change', function () {
                    switch ($(this).val()) {
                        case 'yes':
                            $('input.sub_name_list').prop('required', true);
                            $('.subsidiary_pub_name').css('display', 'block');
                            break;
                        case 'No':
                            $('input.sub_name_list').prop('required', false);
                            $('.subsidiary_pub_name').css('display', 'none');
                            break;
                    }
                });

                $('#sub_pub_add').click(function () {
                            w++;
                            $('#subsidiary_publishcation_no_tbl').
                                append('<tr id="row' + w +
                                    '" class="removecl"><td><input type="text" name="name_of_the_subsidiary_publication[]" placeholder="Enter name of the subsidiary publication *" class="form-control sub_name_list" required/></td><td><input type="text" name="name_of_the_subsidiary_publisher[]" placeholder="Enter name of the subsidiary publisher*" class="form-control sub_name_list" required/></td><td><input type="number" id="content_of_the_subsidiary_publication" name="stack_holder_percentage[]" placeholder="Enter Stock Holder Percentage" class="form-control sub_name_list" required /></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_doc[]" placeholder="Enter the document" accept="application/pdf,application/vnd.ms-excel" type="file" multiple required> <span class="text-danger"><small>Please upload the file in PDF format and ensure that it is below 5 MB</small></span> </td><td><button type="button" name="remove" id="' +
                                    w + '" class="btn btn-danger btn_remove">X</button></td></tr>');

                            });

                $(document).on('click', '.btn_remove', function () {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

                /*************************************
                 //End Subssidary Application 
                ***************************************/
        });

        function myFunction() {
            var checkBox = document.getElementById("publication_check");
            var pub_ft_nm = document.getElementById("pub_first_name");
            var pub_lst_nm = document.getElementById("pub_last_name");
            var pub_el_id = document.getElementById("pub_email_id");
            var pub_con_no = document.getElementById("contact_number");
            var pub_add = document.getElementById("pub_address");
            var pub_ct = document.getElementById("pub_city");
            var pub_district = document.getElementById("pub_district");
            var pub_st = document.getElementById("pub_state");
            var pub_pn_cd = document.getElementById("pub_pin_code");
            var pub_cnty = document.getElementById("pub_country");

            var con_ft_nm = document.getElementById("con_first_name");
            var con_lst_nm = document.getElementById("con_last_name");
            var con_el_id = document.getElementById("con_email_id");
            var con_con_no = document.getElementById("con_contact_number");
            var con_add = document.getElementById("con_publication_address");
            var con_ct = document.getElementById("con_city");
            var con_district= document.getElementById("con_district");
            var con_st = document.getElementById("con_state");
            var con_pn_cd = document.getElementById("con_pin_code");
            var con_cnty = document.getElementById("con_country");
            // alert(pub_ft_nm.value);
            if (checkBox.checked == true) {
                con_ft_nm.value = pub_ft_nm.value;
                con_lst_nm.value = pub_lst_nm.value;
                con_el_id.value = pub_el_id.value;
                con_con_no.value = pub_con_no.value;
                con_add.value = pub_add.value;
                con_ct.value = pub_ct.value;
                con_district.value = pub_district.value;
                con_st.value = pub_st.value;
                con_pn_cd.value = pub_pn_cd.value;
                con_cnty.value = pub_cnty.value;

            } else {
                con_ft_nm.value = "";
                con_el_id.value = "";
                con_con_no.value = "";
                con_add.value = "";
                con_ct.value = "";
                con_district.value="";
                con_st.value = "";
                con_pn_cd.value = "";
                con_cnty.value = "";
            }
            }

    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.validation-errors').fadeOut('slow');
            }, 15000); 
        });
    </script>
         <script>
            $(document).on('change', "input[type='file']", function(){
               var selectedFile = this.files[0]; // Get the selected file
               var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
    
               if (selectedFile.size > maxSize) {
                  toastr.error("Sorry, the file exceeds the maximum size limit of 5 MB",{timeout:15000});
                  // alert('Sorry, the file exceeds the maximum size of 5 MB!');
                  // Clear the file input
                  $(this).val("");
               } else {
                  // File size is within limit, continue processing
                  toastr.success("File size is within the limit.",{timeout:15000});
                  // alert('File size is within the limit.');
                  console.log("File selected: ", selectedFile.name);
               }
            });
               
            </script>

           <script>
            $(document).ready(function () {

//***************************************************** */
//###################Book Publisher#######################
//***************************************************** */
//Publisher-username check
$('#pub_state').on('change', function() {
// alert('asfasd');
            var stateId = $(this).val();
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            type: "post",
            dataType: "json",
            url: '/periodical/getdistrict',
            data: {'state_id':stateId},
                success: function(response) {
                    var districts = response.districts;
                    $('#pub_district').empty();
            $('#pub_district').append('<option value="">Select District</option>');
                    $.each(districts, function(key, value) {
                        $('#pub_district').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
});

$('#con_state').on('change', function() {
            // alert('asfasd');
            var stateId = $(this).val();
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            type: "post",
            dataType: "json",
            url: '/periodical/getdistrict',
            data: {'state_id':stateId},
                success: function(response) {
                    var districts = response.districts;
                    $('#con_district').empty();
            $('#con_district').append('<option value="">Select District</option>');
                    $.each(districts, function(key, value) {
                        $('#con_district').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
});
var typingTimer;
var doneTypingInterval = 1000;
$('#user_name').keyup(function(){
            clearTimeout(typingTimer);
            if ($('#user_name').val) {
                typingTimer = setTimeout(function(){
                    var v = $("#user_name").val();
                    if(v.length == 0){
                        $("#checkusername").html("Username required");
                        toastr.error('Username required!');
                    }else{
            //ajax
            $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            type: "post",
            dataType: "json",
            url: '/periodical/check/username',
            data: {'userName':v},
            success: function(response) {
            if(response.success){
            var username = document.getElementById("usernameval");
            username.value = 1;
            $("#checkusername").html("");
            }else{
            var username = document.getElementById("usernameval");
            username.value = 0;
            $("#checkusername").html("Username already taken");
            toastr.error('Username already taken!');
            }

            }
            });
                    }
                


                }, doneTypingInterval);
            }

});
//email check
var typingTimer;
var doneTypingInterval = 1000;
$('#pub_email_id').keyup(function(){
            clearTimeout(typingTimer);
            if ($('#pub_email_id').val) {
                typingTimer = setTimeout(function(){
                    var v = $("#pub_email_id").val();
                    if(v.length == 0){
                        $("#checkemail").html("Email Required!!");
                        toastr.error('Email Required!');
                    }else{
                        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                        if (reg.test(v) == false)
                        {
                        var email = document.getElementById("emailval");
                            email.value = 2;
                        $("#checkemail").html("Invalid Email!!");
                        toastr.error('Invalid Email!');
                        }else{
                            $("#checkemail").html("");
                                $.ajaxSetup({
                                headers:{
                                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                                }
                                });
                            $.ajax({
                                type: "post",
                                dataType: "json",
                                url: '/periodical/check/email',
                                data: {'email':v},
                                success: function(response) {
                                if(response.success){
                                    var email = document.getElementById("emailval");
                                    email.value = 1;
                                    $("#checkemail").html("");
                                }else{
                                    var email = document.getElementById("emailval");
                                    email.value = 0;
                                    $("#checkemail").html("Email already taken");
                                    toastr.error('Email already taken!');
                                }

                                }
                            });
                    }
                    
                    }
                }, doneTypingInterval);
            }

});

//Password Check
function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            if(password.length == 0){
            $("#divCheckPasswordMatch").html("Password is required!");
            toastr.error('Passwords required!');
            }else{
            if (password != confirmPassword){
                $("#divCheckPasswordMatch").html("Passwords does not match!");
                toastr.error('Passwords does not match!');
                }
                else {
                $("#divCheckPasswordMatch").html("");
                }
            }
            
}

  $('#password_confirmation').keyup( function() {
   if( this.value.length < 8 ) return;
   checkPasswordMatch();
});

var i = 1;

 function showLoading() {

     // Show loading bar
     document.getElementById('loadingBar').style.display = 'block';
     // Add 'loading' class to the form to make it semi-transparent
     document.getElementById('magazine_publisher_register').classList.add('loading');
 }

 function hideLoadingBar() {
   document.getElementById('loadingBar').style.display = 'none';
   document.getElementById('magazine_publisher_register').classList.remove('loading');
}

//Publisher final form submit
$('#btn_publisher_submit_form').on('click', function () {
   $("#magazine_publisher_register").submit(function (e) {
      showLoading();
      //username
     var uname =  $("#user_name").val();
     if(uname.length == 0){
      hideLoadingBar();
      toastr.error("Username required!!!");
      e.preventDefault();
     }else{
      var username1 = $("#usernameval").val();
     if(username1 && username1 == 0){
        hideLoadingBar();
        toastr.error("Username already taken!!!");
        e.preventDefault();
     }
   }
   
//password
   var password = $("#password").val();
   var confirmPassword = $("#password_confirmation").val();
   if(password.length == 0){
      hideLoadingBar();
      toastr.error("Password is required!!");
     e.preventDefault();
   }else if(confirmPassword.length == 0){
      hideLoadingBar();
      toastr.error("Confirm Password is required!!");
     e.preventDefault();
   }else{
      if(password != confirmPassword){
         hideLoadingBar();
          toastr.error("Password and confirm password doesn't match!!");
         e.preventDefault();
      }
   }
 

//email
var uemail =  $("#pub_email_id").val();
if (uemail.length === 0){
   hideLoadingBar();
   toastr.error('Email Required!!');
   e.preventDefault();
}else{
   var email = $("#emailval").val();
   if(email == 0){
      hideLoadingBar();
      toastr.error('Email already taken!!');
      e.preventDefault();
   }
   else if(email == 2){
      hideLoadingBar();
      toastr.error('Invalid Email!!');
      e.preventDefault();
   }
}
//category check 

  




//Pubownership proof
var ownership = $("#pub_ownership").val();

if (ownership == 'Partnership') {
 var gst = $("[name='gst']").prop('files')[0];
 var udayam = $("[name='udayam']").prop('files')[0];
 var pan_deed = $("[name='pan_deed']").prop('files')[0];
 var pan_tan = $("[name='pan_tan']").prop('files')[0];
      if (udayam.type !== 'application/pdf') {
         toastr.error('Udyam Certificate must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

         }
      if (pan_deed.type !== 'application/pdf') {
      toastr.error('Partnership Deed must be a PDF file.');
      hideLoadingBar();
      e.preventDefault();
         }
      if (gst.type !== 'application/pdf') {
         toastr.error('GST Certificate must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

      }
      if (pan_tan.type !== 'application/pdf') {
         toastr.error('PAN / TAN must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

      }
}
else if (ownership == 'Private') {
var certification_incon = $("[name='certification_incon']").prop('files')[0];
var moa = $("[name='moa']").prop('files')[0];
var aoa = $("[name='aoa']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];

     if (certification_incon.type !== 'application/pdf') {
        toastr.error('Certificate of incorporation must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (moa.type !== 'application/pdf') {
      toastr.error('MOA must be a PDF file.');
      hideLoadingBar();
      e.preventDefault();

      }
   if (aoa.type !== 'application/pdf') {
   toastr.error('AOA must be a PDF file.');
   hideLoadingBar();
   e.preventDefault();
      }
     if (gst.type !== 'application/pdf') {
      toastr.error('GST Certificate must be a PDF file.');
      hideLoadingBar();
      e.preventDefault();

   }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();
     }
}
else if (ownership == 'Publication') {
var certification_incon = $("[name='certification_incon']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
     if (certification_incon.type !== 'application/pdf') {
        toastr.error('Certificate of incorporation must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (gst.type !== 'application/pdf') {
      toastr.error('GST Certificate must be a PDF file.');
      hideLoadingBar();
      e.preventDefault();

   }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();
     }
}
else if (ownership == 'oneperson') {

var udayam = $("[name='udayam']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
     if (udayam.type !== 'application/pdf') {
        toastr.error('Udyam Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

        }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN / TAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }


}
else if (ownership == 'limited') {
var llp = $("[name='llp_agre']").prop('files')[0];
var udayam = $("[name='udayam']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];

        if (llp.type !== 'application/pdf') {
           toastr.error('LLP Agreement must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (udayam.type !== 'application/pdf') {
        toastr.error('Udyam Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

        }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN / TAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }

}
else if (ownership == 'trust') {
var society = $("[name='private_trust']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
        if (society.type !== 'application/pdf') {
           toastr.error('Private Trust Registration Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }


}
else if (ownership == 'society') {
var society = $("[name='private_society']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];

        if (society.type !== 'application/pdf') {
           toastr.error('Private Society Registration Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }


}
else if (ownership == 'institutional') {
var society = $("[name='institution']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
        if (society.type !== 'application/pdf') {
           toastr.error('Government Institutional Publication Registration Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }


}
else if (ownership == 'trust-foundation') {
var society = $("[name='trust_foundation']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];
        if (society.type !== 'application/pdf') {
           toastr.error('Government Trust/Foundation Publication Registration Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
}
else if (ownership == 'government-society') {
var society = $("[name='society']").prop('files')[0];
var gst = $("[name='gst']").prop('files')[0];
var pan_tan = $("[name='pan_tan']").prop('files')[0];

        if (society.type !== 'application/pdf') {
           toastr.error('Government Society Publication Registration Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
   }
     if (gst.type !== 'application/pdf') {
        toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }
     if (pan_tan.type !== 'application/pdf') {
        toastr.error('PAN must be a PDF file.');
        hideLoadingBar();
        e.preventDefault();

     }

}
//Sub-Doc
var doc = document.getElementById('subsidiary_publications');
var doc_name = doc.value;
var docstatus = "true";
var arr = [];
if (doc_name === "yes") {
 var documents = $("[name='subsidiary_doc[]']");
 documents.each(function (index, element) {
     var file = element.files[0];
     if (file.type !== 'application/pdf') {
         arr.push(file);
     }
 });
}
if (arr.length !== 0) {
 toastr.error('Subsidiary Document must be a PDF file.');
 hideLoadingBar();
 e.preventDefault();
 return false;
}
    


      // if (bapasi_id_name != 0) {
      // } else {
      //    alert("Please select member in publisher's association");
      //    e.preventDefault();
      // }

   });
});
            });
            </script>

  



</body>

</html>
