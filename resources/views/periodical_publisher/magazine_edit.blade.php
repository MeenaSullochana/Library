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

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Periodical Edit</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_publisher/images/fevi.svg') }}">
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
                                <b>Edit Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('periodical_publisher/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="">
                                <form class="needs-validation" novalidate method="POST"
                                    action="/periodical_publisher/magazine/update/{{ $data->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <section class="bg-light-new">
                                        <div class="row p-3">

                                            <div class="col-md-2">
                                                <h4>RNI Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <p class="fs-4">Registration with the Registrar of Newspapers for
                                                    India (RNI) is mandatory for applying for periodical registration on
                                                    this portal. Periodicals with an ISSN (International Standard Serial
                                                    Number) can also apply.</p>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">RNI Details<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group">

                                                                    <input type="text" class="form-control"
                                                                        id="" name="rni_details"
                                                                        value="{{ $data->rni_details }}"
                                                                        placeholder="Enter the RNI Details" required>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Proof<span
                                                                    class="text-danger"></span></label>
                                                            <div class="small-12 medium-2 large-2 columns">
                                                                <input type="file"
                                                                    accept="application/pdf,application/vnd.ms-excel"
                                                                    name="" id="" class="form-control"
                                                                    aria-label="file example" required>
                                                                <div class="invalid-feedback">Please upload RNI
                                                                    attachment proof PDF</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        View RNI Details
                                                    </button>

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
                                                <div class="col-lg-12">
                                                    <P class="fs-4">தமிழ் புத்தகங்களுக்கு தமிழில் மட்டுமே விவரங்கள்
                                                        பதிவேற்றம் செய்ய வேண்டும்</P>
                                                    <div class="basic-form">

                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Select Language <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="default-select wide form-control"
                                                                id="select-lang" name="language" required>
                                                                @if ($data->language == 'Tamil')
                                                                    <option value="Tamil" selected>Tamil</option>
                                                                    <option value="English">English</option>
                                                                @else
                                                                    <option value="Tamil">Tamil</option>
                                                                    <option value="English" selected>English</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername"> Category <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="select wide form-control" id="categories"
                                                                name="category" required>
                                                                @php
                                                                    $categori = DB::table('magazine_categories')
                                                                        ->where('language', '=', $data->language)
                                                                        ->where('status', '=', '1')
                                                                        ->get();
                                                                @endphp
                                                                @foreach ($categori as $val)
                                                                    @if ($data->category == $val->name)
                                                                        <option value="{{ $val->name }}" selected>
                                                                            {{ $val->name }}</option>
                                                                    @else
                                                                        <option value="{{ $val->name }}">
                                                                            {{ $val->name }}</option>
                                                                    @endif
                                                                @endforeach
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
                                                <P class="fs-4">Enter the title of the Magazine
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Title of the Magazine
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    id="" value="{{ $data->title }}"
                                                                    name="title"
                                                                    placeholder="Enter the Title of the Magazine"
                                                                    required>

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
                                                <h4>Publisher Name</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the Name of publisher
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Name of the Publisher
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    id="" name="" value=""
                                                                    placeholder="Enter the name of the publisher"
                                                                    required>

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
                                                <P class="fs-4">Enter the Editor name if any
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Name of the Editor<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    id="" name="" value=""
                                                                    placeholder="Enter the name of the editor"
                                                                    required>

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
                                                <P class="fs-4">Choose the Periodicity from the list
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Periodicity <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    id="" name="periodicity"
                                                                    value="{{ $data->periodicity }}"
                                                                    placeholder="Enter the periodicity" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>

                                    {{-- <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Frequency</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Frequency <span class="text-danger">*</span></label>
                                                                <select class="default-select wide form-control"
                                                                id="select-lang" name="" required>
                                                                <option value="">Select One</option>
                                                                <option value="">Monthly</option>
                                                                <option value="">Quarterly</option>
                                                                <option value="">Annual</option>
                                                                <option value="">Weekly</option>
                                                                <option value="">Bi Monthly</option>
                                                                <option value="">Fortnight</option>
                                                                <option value="">BiMonthly</option>
                                                                <option value="">Bi weekly</option>
                                                                <option value="">Half yearly</option>
                                                                <option value="">Yearly</option>
                                                                <option value="">Bimonthly</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section> --}}
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>The Year of First Issue</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Please provide the year of the first issue of the
                                                    periodical.
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">The Year of First Issue
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="" value=""
                                                                    placeholder="Enter the year of first issue"
                                                                    required>

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
                                                <P class="fs-4">Please specify the annual issue count for the
                                                    periodical.
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Number of Issues
                                                                Per Year<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="" value=""
                                                                    placeholder="Enter the total number of issues per year"
                                                                    required>

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
                                                <P class="fs-4">Please specify the date of publication for each
                                                    issue, which will aid in predicting its publication frequency
                                                    pattern for the year.
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Date of Publication of
                                                                Every Issue<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="" value=""
                                                                    placeholder="Enter the date of publication of every issue"
                                                                    required>

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
                                                <P class="fs-4">Provide the single issue cover price
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Single Issue Rate <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="single_issue_rate"
                                                                    value="{{ $data->single_issue_rate }}"
                                                                    placeholder="Enter the Single Issue Rate" required>

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
                                                <P class="fs-4">Enter the annual subscription amount
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription
                                                                <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="annual_subscription"
                                                                    value="{{ $data->annual_subscription }}"
                                                                    placeholder="Enter the annual subscription"
                                                                    required>

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
                                                <P class="fs-4">Enter the percentage discount offered to public
                                                    libraries.
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Discount % <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="discount"
                                                                    value="{{ $data->discount }}"
                                                                    placeholder="Enter the discount %" required>

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
                                                <P class="fs-4">Enter the discount percentage offered for a single
                                                    issue
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Single Issue After
                                                                Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="single_issue_after_discount"
                                                                    value="{{ $data->single_issue_after_discount }}"
                                                                    placeholder="Enter the single issue after discount"
                                                                    required>

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
                                                <P class="fs-4">Provide the annual subscription cost after applying
                                                    the discount.
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription
                                                                After Discount <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    id="" name="annual_cost_after_discount"
                                                                    value="{{ $data->annual_cost_after_discount }}"
                                                                    placeholder="Enter the annual subscription after discount "
                                                                    required>

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
                                                <h4>Short Description</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Short Description About the Periodical
                                                </P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Short Description About
                                                                the Periodical<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group">

                                                                    <textarea type="text" class="form-control" id="" name="" value=""
                                                                        placeholder="Enter the short description about the periodical" rows="7" required></textarea>

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
                                                <h4>About Publisher/Editor</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Publisher/Editor Profile
                                                            Image<span class="text-danger"></span></label>
                                                        <div class="small-12 medium-2 large-2 columns">
                                                            <input type="file" name="editor_profile_image"
                                                                id="img_pro"
                                                                accept="image/png, image/jpeg, image/jpg"
                                                                class="form-control" aria-label="file example"
                                                                required>
                                                            <div class="invalid-feedback">Please upload Editor Profile
                                                                Image</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">About
                                                                Publisher/Editor<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="about_editor" name="about_editor" rows="8"
                                                                    placeholder="Enter the about publisher/editor" required></textarea>
                                                                <div class="invalid-feedback"> Please enter the about
                                                                    publisher/editor. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                {{-- <img class="w-75" src="/images/default.png" alt="">
                                                <canvas class="w-75" id= "canv1" ></canvas> --}}
                                                <div class="avatar-preview">
                                                    <img class="w-75" id="uploadedImage1" src="/images/default.png"
                                                        alt="Uploaded Image"
                                                        accept="image/png, image/jpg, image/jpeg">
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
                                        <P class="fs-4">
                                            Size of the Periodical (Length x Breadth)(in Centimeters)
                                        </P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Size of the Magazine<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="magazine_size" value="{{ $data->magazine_size }}"
                                                            placeholder="Enter the size of the magazine" required>

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
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">GSM<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id=""
                                                        name="" value="" placeholder="Enter the GSM"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Type of Paper<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id=""
                                                        name="paper_quality" value="{{ $data->paper_quality }}"
                                                        placeholder="Enter the Type of paper" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Paper Finishing<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id=""
                                                        name="" value=""
                                                        placeholder="Enter the Paper Finishing" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>

                            {{-- <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Type of Library</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Type of Library<span class="text-danger">*</span></label>
                                                                <select class="default-select wide  form-control" id="" name="" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="">DCL</option>
                                                                    <option value="">FTBL </option>
                                                                    <option value="">BL </option>
                                                                    <option value="">VL </option>
                                                                    <option value="">PTL </option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section> --}}
                            <section class="bg-light-new">
                                <div class="row p-3">
                                    <div class="col-md-2">
                                        <h4>Total Number of Pages </h4>
                                    </div>
                                    <div class="col-md-10">
                                        <P class="fs-4">Enter the Total Number of Pages
                                        </P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Total Number of Pages
                                                        <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="total_pages" value="{{ $data->total_pages }}"
                                                            placeholder="Enter the total number of pages" required>

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
                                        <P class="fs-4">Enter the Number of Multicolour pages.
                                        </P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Number of Multicolour
                                                        Pages <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="total_multicolour_pages"
                                                            value="{{ $data->total_multicolour_pages }}"
                                                            placeholder="Enter the number of multicolour pages"
                                                            required>

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
                                        <P class="fs-4">Enter the Number of Monocolour Pages.
                                        </P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Number of Monocolour
                                                        Pages <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="total_monocolour_pages"
                                                            value="{{ $data->total_monocolour_pages }}"
                                                            placeholder="Enter the number of monocolour pages"
                                                            required>

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
                                        <P class="fs-4">Enter the magazine title as it appears on the title page.
                                            This cannot be changed after the magazine is submitted for procurement.
                                        </P>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Contact Person Name
                                                            <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name="contact_person"
                                                                value="{{ $data->contact_person }}"
                                                                placeholder="Enter the contact person name" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Email Id <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id=""
                                                                name="email" value="{{ $data->email }}"
                                                                placeholder="Enter the email id" required>

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
                                                            <input type="text" class="form-control" id=""
                                                                name="phone" value="{{ $data->phone }}"
                                                                placeholder="Enter the phone number" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Country <span class="text-danger">*</span></label>
                                                        <select class="default-select wide  form-control"
                                                            id="" name="" required>
                                                            <option value="">Select One</option>
                                                            <option value="">test one</option>
                                                            <option value="">test two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            State <span class="text-danger">*</span></label>
                                                        <select class="default-select wide  form-control"
                                                            id="" name="" required>
                                                            <option value="">Select One</option>
                                                            <option value="">test one</option>
                                                            <option value="">test two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            District <span class="text-danger">*</span></label>
                                                        <select class="default-select wide  form-control"
                                                            id="" name="" required>
                                                            <option value="">Select One</option>
                                                            <option value="">test one</option>
                                                            <option value="">test two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            City <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name="" placeholder="Enter the city" required>
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
                                                            <input type="number" class="form-control" id=""
                                                                name="" placeholder="Enter the Pincode"
                                                                required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Contact Person Address <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <textarea type="text" class="form-control" id="" name="address" required
                                                                placeholder="Enter the contact person address " required>{{ $data->address }}</textarea>

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
                                        <P class="fs-4">Enter the book title as it appears on the title page. This
                                            cannot be changed after the book is submitted for procurement.</P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Official Address</label>
                                                    <div class="input-group">
                                                        <textarea type="number" class="form-control" id="" name="official_address" rows="3" required
                                                            placeholder="Enter the official address"></textarea>

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
                                    <div class="col-md-6">
                                        <P class="fs-4">Highlights Please Mention some of the key Highlights, Quotes,
                                            Phrases if any (Attachment)</P>
                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Some of The Key Highlights,
                                                        Quotes, Phrases If Any<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <textarea type="number" class="form-control" id="quotes_one" name="quotes_one" rows="6"
                                                            placeholder="Enter highlights, quotes, phrases" required></textarea>
                                                        <div class="invalid-feedback"> Please enter highlights, quotes,
                                                            phrases. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">File Attachment<span
                                                            class="text-danger">*</span></label>
                                                    <div class="small-12 medium-2 large-2 columns">
                                                        <input type="file" name="" id="readUrl"
                                                            accept="image/png, image/jpeg, image/jpg"
                                                            class="form-control" aria-label="file example"
                                                            accept="image/*" required>
                                                        <div class="invalid-feedback">Please upload file attachment PDF
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <img class="w-75" src="/images/default.png" alt=""> --}}
                                        <div class="avatar-preview">
                                            <img class="w-75" id="uploadedImage" src="/images/default.png"
                                                alt="Uploaded Image" accept="image/png, image/jpg, image/jpeg">
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
                                    <p class="fs-4">You can provide up to 8 images including some key
                                        illustrations with a minimum of 3 compulsory cover images</p>
                                    <div class="row">
                                        <!-- Front Image Upload -->
                                        <div class="col-lg-4">
                                            <div class="basic-form">
                                                {{-- <label class="text-label form-label text-black"
                                                    for="front_img">Front<span class="text-danger">*</span></label> --}}
                                                <div class="circle">
                                                    <img class="profile-pic"
                                                        src="{{ asset('Magazine/front/' . $data->front_img) }}"
                                                        class="w-100 d-block" alt="Front Image" />
                                                </div>
                                                <div class="p-image">
                                                    <i class="fa fa-camera upload-button"></i>
                                                    <input class="file-upload" name="front_img" id="front_img"
                                                        type="file" accept="image/*"  required/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Back Image Upload -->
                                        <div class="col-lg-4">
                                            <div class="basic-form">
                                                {{-- <label class="text-label form-label text-black"
                                                    for="back_img">Back<span class="text-danger">*</span></label> --}}
                                                <div class="circle">
                                                    <img class="profile-pic_back"
                                                        src="{{ asset('Magazine/back/' . $data->back_img) }}"
                                                        class="w-100 d-block" alt="Back Image" />
                                                </div>
                                                <div class="p-image">
                                                    <i class="fa fa-camera upload-button_back"></i>
                                                    <input class="file-upload_back" name="back_img" id="back_img"
                                                        type="file" accept="image/*" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Full Image Upload -->
                                        <div class="col-lg-4">
                                            <div class="basic-form">
                                                {{-- <label class="text-label form-label text-black" for="full_img">Full
                                                    Image<span class="text-danger">*</span></label>
                                                <div class="circle"> --}}
                                                    <img class="profile-pic_other"
                                                        src="{{ asset('Magazine/full/' . $data->full_img) }}"
                                                        class="w-100 d-block" alt="Full Image" />
                                                </div>
                                                <div class="p-image">
                                                    <i class="fa fa-camera upload-button_other"></i>
                                                    <input class="file-upload_other" name="full_img" id="full_img"
                                                        type="file" accept="image/*" required />
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
                                    <h4>Sample Copy In PDF 3 Copies (Latest issue)</h4>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalone">
                                                        Sample PDF One
                                            </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModaltwo">
                                                        Sample PDF Two
                                                    </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalthree">
                                                        Sample PDF Three
                                                    </button>
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
                                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot
                                        be changed after the book is submitted for procurement.</P>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">IFSC Code <span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name="" placeholder="Enter the IFSC code" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Bank Account Number <span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name=""
                                                                placeholder="Enter the bank account number" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Bank Name <span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name="" placeholder="Enter the bank name" required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">
                                                            Account Holder Name <span class="text-danger"> *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id=""
                                                                name=""
                                                                placeholder="Enter the account holder name" required>

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
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn me-2 btn-primary" id="submitbutton">Submit</button>
                            </div>
                        </div>
                        </form>
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
    @include ('publisher.footer')
    <!--**********************************
                    Footer end
                ***********************************-->
    {{-- modal --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">RNI Proof</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id="pdf-upload" accept="application/pdf" />
                    <button id="zoom-in">Zoom In</button>
                    <div id="zoom-percent">60</div>
                    <button id="zoom-out">Zoom Out</button>
                    <button id="zoom-reset">Reset Zoom</button>
                    <div id="pages"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- sample one start--}}
    <div class="modal fade" id="exampleModalone" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sample PDF One</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id="fileInput" accept=".pdf">
                    <div class="w-100" id="preview"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- sample one end--}}

    {{-- sample two start--}}
    <div class="modal fade" id="exampleModaltwo" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sample PDF Two</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id="fileInputtwo" accept=".pdf">
                    <div class="w-100" id="previewtwo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- sample two end--}}

    {{-- sample three start--}}
    <div class="modal fade" id="exampleModalthree" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sample PDF Three</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id="fileInputthree" accept=".pdf">
                    <div class="w-100" id="previewthree"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- sample three end--}}

    </div>
    <!--**********************************
            Main wrapper end
        ***********************************-->
    <?php
    include 'publisher/plugin/plugin_js.php';
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
    {{-- About Publisher/Editor --}}
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <script>
        document.getElementById('img_pro').addEventListener('change', function() {
            if (this.files[0]) {
                var picture = new FileReader();
                picture.readAsDataURL(this.files[0]);
                picture.addEventListener('load', function(event) {
                    document.getElementById('uploadedImage1').setAttribute('src', event.target.result);
                    document.getElementById('uploadedImage1').style.display = 'block';
                });
            }
        });
    </script>
    <script>
        document.getElementById('readUrl').addEventListener('change', function() {
            if (this.files[0]) {
                var picture = new FileReader();
                picture.readAsDataURL(this.files[0]);
                picture.addEventListener('load', function(event) {
                    document.getElementById('uploadedImage').setAttribute('src', event.target.result);
                    document.getElementById('uploadedImage').style.display = 'block';
                });
            }
        });

        // sample pdf view code start
        // sample pdf view code start one 
        $(document).ready(function() {
            $('#fileInput').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                var buffer = e.target.result;
                // Load PDF file
                pdfjsLib.getDocument({data: new Uint8Array(buffer)}).promise.then(function(pdf) {
                    // Render the first page
                    pdf.getPage(1).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({scale: scale});

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function() {
                        $('#preview').html(canvas);
                    });
                    });
                });
                };
                reader.readAsArrayBuffer(file);
            }
            });
        });
        // sample pdf view code start two 
        $(document).ready(function() {
            $('#fileInputtwo').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                var buffer = e.target.result;
                // Load PDF file
                pdfjsLib.getDocument({data: new Uint8Array(buffer)}).promise.then(function(pdf) {
                    // Render the first page
                    pdf.getPage(1).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({scale: scale});

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function() {
                        $('#previewtwo').html(canvas);
                    });
                    });
                });
                };
                reader.readAsArrayBuffer(file);
            }
            });
        });
        // sample pdf view code start three 
        $(document).ready(function() {
            $('#fileInputthree').on('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                var buffer = e.target.result;
                // Load PDF file
                pdfjsLib.getDocument({data: new Uint8Array(buffer)}).promise.then(function(pdf) {
                    // Render the first page
                    pdf.getPage(1).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({scale: scale});

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function() {
                        $('#previewthree').html(canvas);
                    });
                    });
                });
                };
                reader.readAsArrayBuffer(file);
            }
            });
        });
        // sample pdf view end start
    </script>
    {{-- RNI PROOF CODE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.worker.js';

        document.querySelector("#pdf-upload").addEventListener("change", function(e) {
            document.querySelector("#pages").innerHTML = "";
            zoomReset();
            var file = e.target.files[0]
            if (file.type != "application/pdf") {
                alert(file.name + " is not a pdf file.")
                return
            }

            var fileReader = new FileReader();

            fileReader.onload = function() {
                var typedarray = new Uint8Array(this.result);

                pdfjsLib.getDocument(typedarray).promise.then(function(pdf) {
                    // you can now use *pdf* here
                    console.log("the pdf has", pdf.numPages, "page(s).");
                    for (var i = 0; i < pdf.numPages; i++) {
                        (function(pageNum) {
                            pdf.getPage(i + 1).then(function(page) {
                                // you can now use *page* here
                                var viewport = page.getViewport(2.0);
                                var pageNumDiv = document.createElement("div");
                                pageNumDiv.className = "pageNumber";
                                pageNumDiv.innerHTML = "Page " + pageNum;
                                var canvas = document.createElement("canvas");
                                canvas.className = "page";
                                canvas.title = "Page " + pageNum;
                                document.querySelector("#pages").appendChild(pageNumDiv);
                                document.querySelector("#pages").appendChild(canvas);
                                canvas.height = viewport.height;
                                canvas.width = viewport.width;


                                page.render({
                                    canvasContext: canvas.getContext('2d'),
                                    viewport: viewport
                                }).promise.then(function() {
                                    console.log('Page rendered');
                                });
                                page.getTextContent().then(function(text) {
                                    console.log(text);
                                });
                            });
                        })(i + 1);
                    }

                });
            };

            fileReader.readAsArrayBuffer(file);
        });
        var curWidth = 60;

        function zoomIn() {
            if (curWidth < 150) {
                curWidth += 10;
                document.querySelector("#zoom-percent").innerHTML = curWidth;
                document.querySelectorAll(".page").forEach(function(page) {

                    page.style.width = curWidth + "%";
                });
            }
        }

        function zoomOut() {
            if (curWidth > 20) {
                curWidth -= 10;
                document.querySelector("#zoom-percent").innerHTML = curWidth;
                document.querySelectorAll(".page").forEach(function(page) {

                    page.style.width = curWidth + "%";
                });
            }
        }

        function zoomReset() {
            curWidth = 60;
            document.querySelector("#zoom-percent").innerHTML = curWidth;
            document.querySelectorAll(".page").forEach(function(page) {

                page.style.width = curWidth + "%";
            });
        }
        document.querySelector("#zoom-in").onclick = zoomIn;
        document.querySelector("#zoom-out").onclick = zoomOut;
        document.querySelector("#zoom-reset").onclick = zoomReset;
        window.onkeypress = function(e) {
            if (e.code == "Equal") {
                zoomIn();
            }
            if (e.code == "Minus") {
                zoomOut();
            }
        };
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
                url: '/periodical_publisher/getlanguage',
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
                        $('#categories').append('<option value="' + value.name + '">' + value
                            .name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            // $('#select-lang').change(function () {
            //     var selectedSubject = $(this).val();
            //     // alert(selectedSubject);
            //     if (selectedSubject === 'english') {
            //         $('.tamil-category').css('display','block');
            //         $('.english-category').removeClass('d-none');
            //     } else if (selectedSubject === 'tamil') {
            //         $('.tamil-category').removeClass('d-none');
            //         $('.english-category').css('display','block');
            //     }
            // });

            //Front Image upload
            var front_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.front_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".front_img").on('change', function() {
                front_image(this);
            });

            //Back Image upload
            var back_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.back_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".back_img").on('change', function() {
                back_image(this);
            });
            $(".upload-button_back").on('click', function() {
                $(".file-upload_back").click();
            });
            //Full Image upload
            var full_image = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.full_image_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".full_img").on('change', function() {
                full_image(this);
            });
        });
    </script> -->
    <script>
        // front
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
        // back
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic_back').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload_back").on('change', function() {
                readURL(this);
            });

            $(".upload-button_back").on('click', function() {
                $(".file-upload_back").click();
            });
        });
        // other
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic_other').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload_other").on('change', function() {
                readURL(this);
            });

            $(".upload-button_other").on('click', function() {
                $(".file-upload_other").click();
            });
        });
    </script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

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

    .table thead th {
        text-transform: initial !important;
    }

    img.profile-pic_other {
        /* max-width: 200px; */
        max-height: 200px !important;
    }

    img.profile-pic {
        /* max-width: 200px; */
        max-height: 200px !important;
    }

    img.profile-pic_back {
        /* max-width: 200px; */
        max-height: 200px !important;
    }



    /* CSS for responsive iframe */
    /* ========================= */

    #Iframe-Master-CC-and-Rs {
        max-width: 100%;
        max-height: 100%;
        overflow: hidden;
    }

    /* inner wrapper: make responsive */
    .responsive-wrapper {
        position: relative;
        height: 0;
        /* gets height from padding-bottom */


    }

    .responsive-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        border: none;
    }

    /* YouTube video aspect ratio */
    .responsive-wrapper-wxh-572x612 {
        padding-bottom: 80%;
    }

    /* general styles */
    /* ============== */
    /* /* .set-border {
    border: 5px inset #4f4f4f;
    } */
    .set-box-shadow {
        -webkit-box-shadow: 4px 4px 14px #4f4f4f;
        -moz-box-shadow: 4px 4px 14px #4f4f4f;
        box-shadow: 4px 4px 14px #4f4f4f;
    }

    */

    /* .set-padding {
    padding: 40px;
    } */
        /* .set-margin {
    margin: 30px;
    } */
    .center-block-horiz {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
<style>
    /* {{-- rni pfd view css code --}} */
    #pages {
        text-align: center;
    }

    .page {
        width: 60%;
        margin: 10px;
        box-shadow: 0px 0px 5px #000;
        animation: pageIn 1s ease;
        transition: all 1s ease, width 0.2s ease;
    }

    @keyframes pageIn {
        0% {
            transform: translateX(-300px);
            opacity: 0;
        }

        100% {
            transform: translateX(0px);
            opacity: 1;
        }
    }

    #zoom-in {}

    #zoom-percent {
        display: inline-block;
    }

    #zoom-percent::after {
        content: "%";
    }

    #zoom-out {}

    canvas {
    width: 100%;
}
</style>
