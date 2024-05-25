<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Periodical  Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical/images/fevi.svg') }}">
    <?php
    include 'periodical_publisher/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <!--*******************
            Preloader start
        ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******************
            Preloader end
        ********************-->

    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
                Nav header start
            ***********************************-->
        @include ('periodical_publisher.navigation')
        <!--**********************************
                Sidebar end
            ***********************************-->
        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Add Periodical </b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('periodical_publisher/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Periodical  </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-body">
							<!-- <div class="d-flex align-items-center justify-content-between">
								<h3 class="mb-0 bc-title">
									<b>Add Magazine Form</b>
								</h3>
								<a class="btn btn-primary  btn-sm" href=" {{ url('admin/magazine_add') }}">
									<i class="fa fa-angle-double-left" aria-hidden="true"></i> Bulk CV Upload  </a>
							</div> -->
                            {{-- <p class="fs-4">The periodical added in "Periodicals in your distribution" with authorization from the respective publisher in the registration part are the only ones to be added for procurement. </p>
							<hr> --}}
                            <div class="">
                                <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="/periodical_publisher/magazine/add">
                                    @csrf
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            
                                            <div class="col-md-2">
                                                <h4>RNI Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="fs-4">Registration with the Registrar of Newspapers for India (RNI) is mandatory for applying for periodical registration on this portal. Periodicals with an ISSN (International Standard Serial Number) can also apply.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">RNI Details<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group">
                                                                <input type="text" class="form-control" id="rni" name="rni" placeholder="Enter the RNI details" required>
                                                                <div class="invalid-feedback"> Please enter RNI details. </div>
                         
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Proof<span class="text-danger"></span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file" accept="application/pdf,application/vnd.ms-excel" name="rni_attachment_proof" ID="rni_attachment_proof" class="form-control" aria-label="file example" required>
                                                                <div class="invalid-feedback">Please Upload RNI Attachment_Proof PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Language</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="fs-4">தமிழ் புத்தகங்களுக்கு தமிழில் மட்டுமே விவரங்கள் பதிவேற்றம் செய்ய வேண்டும்</p>
                                                <div class="col-lg-12">
                                                
                                                    <div class="basic-form">

                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Select Language <span class="text-danger">*</span></label>
                                                            <select class="default-select wide form-control" id="select-lang" name="language" required>
                                                            <option value="" selected>Select Language</option>
                                                                <option value="Tamil">Tamil</option>
                                                                <option value="English">English</option>
                                                               

                                                            </select>
                                                        </div>
                                                        <p class="fs-4">Please select the category of the magazine from the provided list</p>
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername"> Category <span class="text-danger">*</span></label>
                                                            <select class="select wide form-control" id="categories" name="category" required>
                                                                <!-- @php
                                                                $categori = DB::table('magazine_categories')->where('status','=','1')->get();
                                                                @endphp
                                                                <option value="">Select Category</option>
                                                                @foreach($categori as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                                @endforeach -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Magazine Title</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Enter the title of the Magazine</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Title of the Magazine <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="title_of_magazine" name="title" placeholder="Enter the title of the magazine" required>
                                                                <div class="invalid-feedback"> Please enter a magazine title. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                        
                                            <div class="col-md-2">
                                                <h4>Publisher Name </h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <p class="fs-4">Enter the Name of publisher</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Name of the Publisher  <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="name_of_publisher" name="name_of_publisher" placeholder="Enter the name of the publisher" value="{{auth('periodical_publisher')->user()->publicationName}}" readonly>
                                                                <div class="invalid-feedback"> Please enter the name of the publisher. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Editor Name</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="fs-4">Enter the Editor name if any</p>
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Name of the Editor <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="name_of_editor" name="name_of_editor" placeholder="Enter the name of the editor" required>
                                                                <div class="invalid-feedback"> Please enter the name of the publisher. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Periodicity</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Choose the Periodicity from the list </p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Periodicity <span class="text-danger">*</span></label>
                                                            <select class="form-select rounded-0" id="frequency" name="frequency" required>
                                                            @php
                                                                $periodicity = DB::table('magazine_periodicities')->where('status','=','1')->get();
                                                                @endphp
                                                                <option value="">Select Periodicity</option>
                                                                @foreach($periodicity as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback"> Please select periodicity. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>The Year of First Issue </h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Please provide the year of the first issue of the periodical.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">The Year of First Issue  <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            <input type="number" class="form-control" id="first_issue" name="first_issue" placeholder="Enter the year of first issue" required min="1000" max="9999">
                                                                <div class="invalid-feedback"> Please enter the year of first issue . </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Number of Issues Per Year</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Please specify the annual issue count for the periodical.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Number of Issues Per Year <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="per_year" name="per_year" placeholder="Enter total number of issues Per Year" required>
                                                                <div class="invalid-feedback"> Please enter total number of issues per year. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Date of Publication of Every Issue</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Please specify the date of publication for each issue, which will aid in predicting its publication frequency pattern for the year.</P>
                                                <div class="col-lg-12">
                                                <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Date of Publication of Every Issue <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            <input type="text" class="form-control" id="every_issue" name="every_issue" placeholder="Enter the date of publication of every issue (1-31)" required>
                                                                <div class="invalid-feedback"> Please enter date of publication of every issue. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Single Issue Rate</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Provide the single issue cover price</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Single Issue Rate <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="single_issue_rate" name="single_issue_rate" placeholder="Enter the single issue rate" required>
                                                                <div class="invalid-feedback"> Please enter the single issue rate. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Annual Subscription</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Enter the annual subscription amount </p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="annual_subscription" name="annual_subscription" placeholder="Enter the annual subscription" required>
                                                                <div class="invalid-feedback"> Please select annual subscription. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Discount %</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Enter the percentage discount offered to public libraries.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Discount % <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter the discount %" required>
                                                                <div class="invalid-feedback"> Please enter discount. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Single Issue After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Enter the discount percentage offered for a single issue</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Single Issue After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="single_issue_after_discount" name="single_issue_after_discount" placeholder="Enter the single issue after discount" required>
                                                                <div class="invalid-feedback"> Please enter single issue after discount. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Annual Subscription After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                            <p class="fs-4">Provide the annual subscription cost after applying the discount.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="annual_subscription_after_discount" name="annual_subscription_after_discount" placeholder="Enter the annual subscription After Discount" required>
                                                                <div class="invalid-feedback"> Please enter annual subscription after discount. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                               
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Short Description About the Periodical</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Short Description About the Periodical<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="periodical_short_info" name="periodical_short_info" rows="3" placeholder="Enter the short description about The periodical" required></textarea>
                                                                <div class="invalid-feedback"> Please enter the short description about the periodical. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>About Publisher/Editor</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Publisher/Editor Profile Image<span class="text-danger"></span></label>
                                                        <div class="small-12 medium-2 large-2 columns">
                                                            <input type="file" name="editor_profile_image" id="editor_profile_image"  accept="image/png, image/jpeg, image/jpg" class="form-control" aria-label="file example" required>
                                                            <div class="invalid-feedback">Please upload Editor Profile Image</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">About Publisher/Editor<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="about_editor" name="about_editor" rows="3" placeholder="Enter the about publisher/editor" required></textarea>
                                                                <div class="invalid-feedback"> Please enter the about publisher/editor. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Size of the Magazine</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Size of the Periodical (Length x Breadth)(in Centimeters) </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Size of the Magazine<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="magazine_size" name="magazine_size" placeholder="Enter the size of the magazine" required>
                                                                <div class="invalid-feedback"> Please Enter the Size of the Magazine. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Paper Quality</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">GSM<span class="text-danger">*</span></label>
                                                                <select class="form-select rounded-0" id="gsm" name="gsm" required>
                                                                <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_gsm')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                                </select>
                                                                <div class="invalid-feedback"> Please Select GSM. </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Type of Paper<span class="text-danger">*</span></label>
                                                                <select class="form-select rounded-0" id="type_paper" name="type_paper" required>
                                                                <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_papertype')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                                </select>
                                                                <div class="invalid-feedback"> Please Select Type Paper. </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Paper Finishing<span class="text-danger">*</span></label>
                                                                <select class="form-select rounded-0" id="paper_finishing" name="paper_finishing" required>
                                                                <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_paperfinishing')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                                </select>
                                                                <div class="invalid-feedback"> Please Select Paper Finishing. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>                                   
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Number of Pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Number of Pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="number_of_pages" name="number_of_pages" placeholder="Enter the total number of pages" required>
                                                                <div class="invalid-feedback"> Please enter the total number of pages. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Number of Multicolour pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Number of Multicolour pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="multicolour_pages" name="multicolour_pages" placeholder="Enter the number of multicolour pages" required>
                                                                <div class="invalid-feedback"> Please enter the number of multicolour pages </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Number of Monocolour Pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Number of Monocolour Pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="monocolour_pages" name="monocolour_pages" placeholder="Enter the number of nonocolour pages" required>
                                                                <div class="invalid-feedback"> Please enter the number of nonocolour pages. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Contact Person Details with Address</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">Contact Person Name <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Enter the contact person name" required>
                                                                    <div class="invalid-feedback"> Please enter  the contact person name. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black" for="validationCustomUsername"> Email Id <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter the email id" required>
                                                                    <div class="invalid-feedback"> Please enter the email id. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Phone Number <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter the phone number" required>
                                                                    <div class="invalid-feedback"> Please enter the phone number. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black" for="validationCustomUsername">Country  <span class="text-danger">*</span></label>
                                                                    <select class="form-select rounded-0" id="country" name="country" required>
                                                                    @php
                                                                      $country =  DB::table('countries')->where('status','=','1')->get();
                                                                    @endphp   
                                                                    <option value="" selected>Select Country</option>
                                                                    @foreach($country as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback"> Please select the country. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black" for="validationCustomUsername">State <span class="text-danger">*</span></label>
                                                                    <select class="form-select rounded-0" id="state" name="state" required>
                                                                    @php
                                                                      $states =  DB::table('states')->get();
                                                                    @endphp   
                                                                    <option value="" selected>Select State</option>
                                                                    @foreach($states as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback"> Please select the state. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black" for="validationCustomUsername">District <span class="text-danger">*</span></label>
                                                                    <select class="form-select rounded-0" id="district" name="district" required>
                                                                        <option value="" selected>Select One</option>
                                                                      
                                                                    </select>
                                                                    <div class="invalid-feedback"> Please select the district. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black" for="validationCustomUsername">City <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter the city" required>
                                                                        <div class="invalid-feedback"> Please enter the city. </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Pincode <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter the pincode" required>
                                                                    <div class="invalid-feedback"> Please enter the pincode. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Contact Person Address <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <textarea type="text" class="form-control" id="contact_person_address" name="contact_person_address" placeholder="Enter the contact person Address " required></textarea>
                                                                    <div class="invalid-feedback"> Please enter contact person address. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Official Address</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Official Address<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="offcial_address" name="offcial_address" rows="3" placeholder="Enter the official address" required></textarea>
                                                                <div class="invalid-feedback"> Please enter official address. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                  
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Highlights Please Mention some of the key Highlights</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Highlights Please Mention some of the key Highlights, Quotes, Phrases if any (Attachment)</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Some of The Key Highlights, Quotes, Phrases If Any<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="quotes_one" name="quotes_one" rows="3" placeholder="Enter highlights, quotes, phrases" required></textarea>
                                                                <div class="invalid-feedback"> Please enter highlights, quotes, phrases. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">File Attachment<span class="text-danger">*</span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file" name="clip_attachment" id="clip_attachment"  accept="image/png, image/jpeg, image/jpg"  class="form-control" aria-label="file example" accept="image/*" required>
                                                                <div class="invalid-feedback">Please upload file attachment PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new mt-4">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Add Magazine Images</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">You can provide up to 3 images including some key illustrations with a minimum of 3 compulsory cover images</p>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <div class="profile-pic">
                                                                    <img style="max-height: 150px !important;" class="front_image_preview" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">
                                                             
                                                                </div>
                                                                <div class="p-image">
                                                                    <i class="fa fa-camera  upload-button"></i>
                                                                        <input class="file-upload" name="front_img"  id="front_img" type="file" accept="image/png, image/jpeg, image/jpg" required/>
                                                                        <div class="invalid-feedback"> Please upload front image. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <div class="circle">
                                                                    <img style="max-height: 150px !important;" class="profile-pic_back" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">
                                                             
                                                                  </div>
                                                                  <div class="p-image">
                                                                    <i class="fa fa-camera upload-button_back"></i>
                                                                     <input class="file-upload_back" name="back_img" type="file" accept="image/png, image/jpeg, image/jpg" required/>
                                                                     <div class="invalid-feedback"> Please upload back image. </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <div class="circle">
                                                                    <img style="max-height: 150px !important;" class="profile-pic_other" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">
                                                             
                                                                  </div>
                                                                  <div class="p-image">
                                                                    <i class="fa fa-camera  upload-button_other"></i>
                                                                     <input class="file-upload_other" name="full_img" type="file" accept="image/png, image/jpeg, image/jpg" required>
                                                                     <div class="invalid-feedback"> Please upload full image. </div>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="bg-light-new mt-5">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Three Most Recent Issues. (full pdf)</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Issue 1<span class="text-danger"></span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file" name="pdf_content_one" id="pdf_content_one" accept="application/pdf, application/vnd.ms-excel" class="form-control" aria-label="file example" required>
                                                                <div class="invalid-feedback">Please upload PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Issue 2<span class="text-danger"></span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file" name="pdf_content_two" id="pdf_content_two" accept="application/pdf, application/vnd.ms-excel" class="form-control" aria-label="file example" required>
                                                                <div class="invalid-feedback">Please upload PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Issue 3<span class="text-danger"></span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file" name="pdf_content_three" id="pdf_content_three" accept="application/pdf, application/vnd.ms-excel" class="form-control" aria-label="file example" required>
                                                                <div class="invalid-feedback">Please upload PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Bank Account Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                            
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">IFSC Code <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text"class="form-control" id="ifsc_Code" name="ifsc_Code" placeholder="Enter the IFSC code" required>
                                                                        <div class="invalid-feedback"> Please Enter IFSC Code. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Account Number <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="ban_Acc_Num" name="ban_Acc_Num" placeholder="Enter the bank account number" required>
                                                                        <div class="invalid-feedback"> Please enter account number. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Name <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="bank_Name" name="bank_Name" placeholder="Enter the bank name" required>
                                                                        <div class="invalid-feedback"> Please enter bank name. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                       Account Holder Name <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="acc_Hol_Nam" name="acc_Hol_Nam" placeholder="Enter the account holder name" required>
                                                                        <div class="invalid-feedback"> Please Enter Account Holder Name. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <div class="row">
                                        <div class="col-md-12 text-end mt-5">
                                            <button type="submit" class="btn me-2 btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                Content body end
            ***********************************-->
    <!--**********************************
                Footer start
            ***********************************-->
    @include ('periodical_publisher.footer')
    <!--**********************************
                Footer end
            ***********************************-->

    <!--**********************************
            Support ticket button start
            ***********************************-->

    <!--**********************************
            Support ticket button end
            ***********************************-->


    </div>
    <!--**********************************
            Main wrapper end
        ***********************************-->
    <?php
    include 'periodical_publisher/plugin/plugin_js.php';
    ?>
    <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#select-lang').change(function () {
                var selectedSubject = $(this).val();
                // alert(selectedSubject);
                $('.tamil-category, .english-category').addClass('d-none');

                if (selectedSubject === 'english') {
                    $('.tamil-category').css('display','block');
                    $('.english-category').removeClass('d-none');
                } else if (selectedSubject === 'tamil') {
                    $('.tamil-category').removeClass('d-none');
                    $('.english-category').css('display','block');
                }
            });
            
            //Front Image upload
            var front_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.front_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".front_img").on('change', function(){
                front_image(this);
            });

            //Back Image upload
            var back_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.back_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".back_img").on('change', function(){
                back_image(this);
            });

            //Full Image upload
            var full_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.full_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".full_img").on('change', function(){
                full_image(this);
            });
        });
    </script>
    <script>
		(function () {
		  'use strict'

		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.querySelectorAll('.needs-validation')

		  // Loop over them and prevent submission
		  Array.prototype.slice.call(forms)
			.forEach(function (form) {
			  form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
				  event.preventDefault()
				  event.stopPropagation()
				}

				form.classList.add('was-validated')
			  }, false)
			})
		})()
	</script>

<script>
        $('#select-lang').change(function() {
            var lang = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                dataType: "json",
                url: '/periodical_publisher/getcategory',
                data: {
                    'lang': lang
                },
                success: function(response) {
                    console.log(response);
                    var subjects22 = response.categories;
                    console.log("asdfsdf");
                    $('#categories').empty();
                    $('#categories').append('<option value="">Select One</option>');
                    $.each(subjects22, function(key, value) {
                        $('#categories').append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
</script>
<script>
    $('#state').on('change', function() {
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
      url: '/periodical_publisher/getdistrict',
      data: {'state_id':stateId},
       success: function(response) {
           var districts = response.districts;
           $('#district').empty();
 $('#district').append('<option value="">Select District</option>');
           $.each(districts, function(key, value) {
               $('#district').append('<option value="' + value.name + '">' + value.name + '</option>');
           });
       },
       error: function(xhr, status, error) {
           console.error(error);
       }
   });
});
</script>

<script>
    document.getElementById("rni_attachment_proof").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload PDF files only.');

            // alert("Please upload PDF files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("clip_attachment").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>
<script>
    document.getElementById("editor_profile_image").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("front_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("back_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("full_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>


<script>
    document.getElementById("pdf_content_one").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload PDF files only.');

            // alert("Please upload PDF files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("pdf_content_two").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload PDF files only.');

            // alert("Please upload PDF files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
document.getElementById('every_issue').addEventListener('input', function(event) {
    let value = event.target.value;
    
    // If the value is empty, no need for further processing
    if (value === "") {
        return;
    }

    // Remove non-numeric characters and constrain between 1 and 31
    value = value.replace(/\D/g, '');
    value = Math.min(Math.max(parseInt(value), 1), 31);
    
    // Update the input field with the sanitized value
    event.target.value = value;
});
</script>
<script>
    // front
    $(document).ready(function() {
        var frontreadURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.front_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function() {
            frontreadURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
    // back
    $(document).ready(function() {
        var backreadURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic_back').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload_back").on('change', function() {
            backreadURL(this);
        });

        $(".upload-button_back").on('click', function() {
            $(".file-upload_back").click();
        });
    });
    // other
    $(document).ready(function() {

        var otherreadURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic_other').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload_other").on('change', function() {
            otherreadURL(this);
        });

        $(".upload-button_other").on('click', function() {
            $(".file-upload_other").click();
        });
    });
</script>

<script>
    document.getElementById("pdf_content_three").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload PDF files only.');

            // alert("Please upload PDF files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
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
</body>

<style>
    .drop_box {
        margin: 10px 0;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 3px dotted #a3a3a3;
        border-radius: 5px;
    }

    .drop_box h4 {
        font-size: 16px;
        font-weight: 400;
        color: #2e2e2e;
    }

    .drop_box p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #a3a3a3;
    }

    button.btn.csv-upload {
        text-decoration: none;
        background-color: #005af0;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        outline: none;
        transition: 0.3s;
    }

    /* .btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
} */
    .form input {
        margin: 10px 0;
        width: 100%;
        background-color: #e2e2e2;
        border: none;
        outline: none;
        padding: 12px 20px;
        border-radius: 4px;
    }
    /* .tamil-category, .english-category {
            display: none;
        } */
        .file-upload {
        display: none;
    }

    .file-upload_back {
        display: none;
    }

    .file-upload_other {
        display: none;
    }
    img {
        max-width: 100%;
        height: auto;
    }

    .p-image {
        position: absolute;
        /* top: 167px;
  right: 30px; */
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
    .table thead th{
        text-transform: initial !important;
    }
    img.profile-pic_other {
    /* max-width: 200px; */
    max-height: 200px !important;
    }
    img.profile-pic{
        /* max-width: 200px; */
    max-height: 200px !important;
    }
    img.profile-pic_back{
        /* max-width: 200px; */
    max-height: 200px !important;
    }

    
</style>
