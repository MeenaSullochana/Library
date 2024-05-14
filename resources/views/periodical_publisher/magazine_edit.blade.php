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
    <title>Government of Tamil Nadu - Book Procurement - Book Edit</title>
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
                                <form class="needs-validation" novalidate method="POST" action="/periodical_publisher/magazine/update/{{$data->id}}" enctype="multipart/form-data">
                                @csrf  
                                   <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Language</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="col-lg-12">
                                                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                    <div class="basic-form">

                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Select Language <span class="text-danger">*</span></label>
                                                            <select class="default-select wide form-control" id="select-lang" name="language" required>
                                                                @if($data->language == "Tamil")
                                                                <option value="Tamil" selected>Tamil</option>
                                                                <option value="English">English</option>
                                                                @else
                                                                <option value="Tamil">Tamil</option>
                                                                <option value="English" selected>English</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername"> Category <span class="text-danger">*</span></label>
                                                            <select class="select wide form-control" id="categories" name="category" required>
                                                                @php
                                                                $categori = DB::table('magazine_categories')->where('language','=',$data->language)->where('status','=','1')->get();
                                                                @endphp
                                                                @foreach($categori as $val)
                                                                @if($data->category == $val->name)
                                                                <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                                @else
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
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
                                                <h4>Title of the Magazine</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Title of the Magazine <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="" value="{{$data->title}}" name="title" placeholder="Enter the Title of the Magazine" required>

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
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Periodicity <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="" name="periodicity" value="{{$data->periodicity}}" placeholder="Enter the Periodicity" required>

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
                                                <h4>Single Issue Rate</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black" for="validationCustomUsername">Single Issue Rate <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="single_issue_rate" value="{{$data->single_issue_rate}}" placeholder="Enter the Single Issue Rate" required>

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
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id=""
                                                                    name="annual_subscription" value="{{$data->annual_subscription}}" placeholder="Enter the Annual Subscription" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Discount % <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="discount" value="{{$data->discount}}" placeholder="Enter the Discount %" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Single Issue After Discount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="single_issue_after_discount" value="{{$data->single_issue_after_discount}}" placeholder="Enter the Single Issue after discount" required>

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
                    <h4>Annual Cost After Discount</h4>
                </div>
                <div class="col-md-10">
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Annual Cost After Discount <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="annual_cost_after_discount" value="{{$data->annual_cost_after_discount}}" placeholder="Enter the Annual Cost After Discount" required>

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
                                                <h4>Total Cost Before Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Cost Before Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Total Cost Before Discount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>--}}
        {{-- <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Subscription After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Subscription After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Total Subscription After Discount" required>

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
                                                <h4>Difference in Amount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Difference in Amount<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Difference in Amount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>--}}
        <section class="bg-light-new">
            <div class="row p-3">
                <div class="col-md-2">
                    <h4>RNI Details</h4>
                </div>
                <div class="col-md-10">
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">RNI Details<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group">

                                        <input type="text" class="form-control" id="" name="rni_details" value="{{$data->rni_details}}" placeholder="Enter the RNI Details" required>

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
                    <h4>Paper Quality</h4>
                </div>
                <div class="col-md-10">
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Paper Quality<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" name="paper_quality" value="{{$data->paper_quality}}" placeholder="Enter the RNI Details" required>
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
                    <h4>Total Number of Pages</h4>
                </div>
                <div class="col-md-10">
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Total Number of Pages <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="total_pages" value="{{$data->total_pages}}" placeholder="Enter the Total Number of Pages" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Number of Multicolour pages <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="total_multicolour_pages" value="{{$data->total_multicolour_pages}}" placeholder="Enter the Number of Multicolour pages" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Number of Monocolour Pages <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="total_monocolour_pages" value="{{$data->total_monocolour_pages}}" placeholder="Enter the Number of Monocolour Pages" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="col-lg-12">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label class="text-label form-label text-black" for="validationCustomUsername">Size of the Magazine<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="" name="magazine_size" value="{{$data->magazine_size}}" placeholder="Enter the Size of the Magazine" required>

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
                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label class="text-label form-label text-black" for="validationCustomUsername">Contact Person Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="" name="contact_person" value="{{$data->contact_person}}" placeholder="Enter the Contact Person Name" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label class="text-label form-label text-black" for="validationCustomUsername">
                                        Email Id <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="" name="email" value="{{$data->email}}" placeholder="Enter the Email Id" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label class="text-label form-label text-black" for="validationCustomUsername">
                                        Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="" name="phone" value="{{$data->phone}}" placeholder="Enter the Phone Number" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Country  <span class="text-danger">*</span></label>
                                                                    <select class="default-select wide  form-control" id="" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="">test one</option>
                                                                        <option value="">test two</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                        {{-- <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    State <span class="text-danger">*</span></label>
                                                                    <select class="default-select wide  form-control" id="" name="" required>
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
                                                                    <select class="default-select wide  form-control" id="" name="" required>
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
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the City" required>

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
                                                                    <input type="number" class="form-control" id="" name="" placeholder="Enter the Pincode" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                        <div class="col-lg-12">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label class="text-label form-label text-black" for="validationCustomUsername">
                                        Contact Person Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <textarea type="text" class="form-control" id="" name="address" placeholder="Enter the Contact Person Address " required>{{$data->address}}</textarea>

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
                {{-- <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Official Address</label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="" name="official_address" rows="3" placeholder="Enter the Official Address" ></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>--}}

            </div>
        </section>
        {{-- <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Bank Account Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">IFSC Code </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the IFSC Code" >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Account Number </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Bank Account Number" >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Name </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Bank Name" >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                       Account Holder Name </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Account Holder Name" >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>--}}
        <section class="bg-light-new mt-4">
            <div class="row p-3">
                <div class="col-md-2">
                    <h4>Add Magazine Images</h4>
                </div>
                <div class="col-md-10">
    <p class="fs-4">You can provide up to 8 images including some key illustrations with a minimum of 3 compulsory cover images</p>
    <div class="row">
        <!-- Front Image Upload -->
        <div class="col-lg-3">
            <div class="basic-form">
                <label class="text-label form-label text-black" for="front_img">Front<span class="text-danger">*</span></label>
                <div class="circle">
                    <img class="profile-pic" src="{{ asset('Magazine/front/' . $data->front_img) }}" class="w-100 d-block" alt="Front Image" />
                </div>
                <div class="p-image">
                    <i class="fa fa-camera upload-button"></i>
                    <input class="file-upload" name="front_img" id="front_img" type="file" accept="image/*" />
                </div>
            </div>
        </div>
        <!-- Back Image Upload -->
        <div class="col-lg-3">
            <div class="basic-form">
                <label class="text-label form-label text-black" for="back_img">Back<span class="text-danger">*</span></label>
                <div class="circle">
                    <img class="profile-pic_back" src="{{ asset('Magazine/back/' . $data->back_img) }}" class="w-100 d-block" alt="Back Image" />
                </div>
                <div class="p-image">
                    <i class="fa fa-camera upload-button_back"></i>
                    <input class="file-upload_back" name="back_img" id="back_img" type="file" accept="image/*" />
                </div>
            </div>
        </div>
        <!-- Full Image Upload -->
        <div class="col-lg-3">
            <div class="basic-form">
                <label class="text-label form-label text-black" for="full_img">Full Image<span class="text-danger">*</span></label>
                <div class="circle">
                    <img class="profile-pic_other" src="{{ asset('Magazine/full/' . $data->full_img) }}" class="w-100 d-block" alt="Full Image" />
                </div>
                <div class="p-image">
                    <i class="fa fa-camera upload-button_other"></i>
                    <input class="file-upload_other" name="full_img" id="full_img" type="file" accept="image/*" />
                </div>
            </div>
        </div>
        <!-- PDF Upload -->
        <div class="col-lg-3">
            <div class="basic-form">
                <label class="text-label form-label text-black" for="sample_pdf">PDF<span class="text-danger"></span></label>
                <input class="bg-white p-1 w-100" type="file" id="sample_pdf" name="sample_pdf" accept="application/pdf" />
            </div>
        </div>
    </div>
    <!-- Display PDF -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                    @if($data->sample_pdf == null)
                        <iframe src="" style="width:100%; height:1000px;" frameborder="0"></iframe>
                    @else
                        @if(file_exists(public_path('Magazine/pdf/' . $data->sample_pdf)))
                            <iframe src="{{ asset('Magazine/pdf/' . $data->sample_pdf) }}" style="width:100%; height:1000px;" frameborder="0"></iframe>
                        @else
                            <iframe src="" style="width:100%; height:1000px;" frameborder="0"></iframe>
                        @endif
                    @endif
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
    include 'publisher/plugin/plugin_js.php';
    ?>

    <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
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
                        $('#categories').append('<option value="' + value.name + '">' + value.name + '</option>');
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