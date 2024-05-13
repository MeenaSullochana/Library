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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical/images/favicon.png') }}">

    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">

    <link href="{{ asset('vendor/tagify/dist/tagify.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('periodical_publisher/css/style.css') }}" rel="stylesheet">


</head>

<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black"
    data-headerbg="color_1">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="{{ asset('periodical_publisher/images/goverment_loader.gif') }}" alt="" width="25%">
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
        @include('periodical_publisher.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="any-card">
                                    <div class="c-con">
                                        @php
                                            $name =
                                                auth('periodical_publisher')->user()->firstName .
                                                "
                                        " .
                                                auth('periodical_publisher')->user()->lastName;
                                        @endphp
                                        <h4 class="heading mb-0">Congratulations
                                            <strong>{{ $name }}!!</strong><img src="images/crm/party-popper.png"
                                                alt=""></h4>


                                        <a href="/periodical_publisher/pub_profile_view"
                                            class="btn btn-primary btn-sm mt-4">View
                                            Profile</a>
                                    </div>
                                    <img src="images/analytics/developer_male.png" class="harry-img w-25"
                                        alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="card bg-primary">
                            <div class="card-header border-0">
                                <h4 class="heading mb-0 text-white">Overview of Sales </h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="sales-bx">
                                        <img src="images/analytics/sales.png" alt="">
                                        <h4><i class="fa fa-inr" aria-hidden="true"></i> 0</h4>
                                        <span>Year Sales</span>
                                    </div>
                                    <div class="sales-bx">
                                        <img src="images/analytics/shopping.png" alt="">
                                        <h4><i class="fa fa-inr" aria-hidden="true"></i> 0</h4>
                                        <span>Month Sales</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="row">
                            <div class="card p-3">
                                <div class="col-md-12">

                                    <h3>Steps to follow</h3>
                                    <div class="scroll-view">
                                        <ul style="list-style-type: none; padding-left: 30px;">


                                            <li>dtgdgdrg</li>
                                            <li>tertertertert</li>
                                            <p>No data available.</p>



                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="icon-box icon-box-md bg-danger-light me-1">
                                                <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                            </div>
                                            <div class="ms-2">
                                                <h4>512</h4>
                                                <p class="mb-0">Total Applied Magazine</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)"><i
                                                class="fa-solid fa-chevron-right text-danger"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="icon-box icon-box-md bg-primary-light me-1">
                                                <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                            </div>
                                            <div class="ms-2">
                                                <h4>98</h4>
                                                <p class="mb-0">Pending Magazine</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)"><i
                                                class="fa-solid fa-chevron-right text-primary"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="icon-box icon-box-md bg-info-light me-1">
                                                <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                            </div>
                                            <div class="ms-2">
                                                <h4>54</h4>
                                                <p class="mb-0">Rejected Magazine</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)"><i
                                                class="fa-solid fa-chevron-right text-info"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="icon-box icon-box-md bg-secondary-light me-1">
                                                <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                            </div>
                                            <div class="ms-2">
                                                <h4>34</h4>
                                                <p class="mb-0">Selected Magazine</p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)"><i
                                                class="fa-solid fa-chevron-right text-secondary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-primary-light analytics-card">
                                <div class="card-body mt-4 pb-1">
                                    <div class="row align-items-center">
                                        <div class="col-xl-2">
                                            <h3 class="mb-3">Order Details</h3>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <div class="card ov-card">
                                                        <div class="card-body">
                                                            <div class="ana-box">
                                                                <div class="ic-n-bx">
                                                                    <div
                                                                        class="icon-box bg-primary rounded-circle">
                                                                        <i class="fa fa-book text-white"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="anta-data">
                                                                    <h5>Completed Order List</h5>
                                                                    <h3>0</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <div class="card ov-card">
                                                        <div class="card-body">
                                                            <div class="ana-box">
                                                                <div class="ic-n-bx">
                                                                    <div
                                                                        class="icon-box bg-primary rounded-circle">
                                                                        <i class="fa fa-book text-white"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="anta-data">
                                                                    <h5>Pending Order List</h5>
                                                                    <h3>0</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    <div class="card ov-card">
                                                        <div class="card-body">
                                                            <div class="ana-box">
                                                                <div class="ic-n-bx">
                                                                    <div
                                                                        class="icon-box bg-primary rounded-circle">
                                                                        <i class="fa fa-book text-white"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="anta-data">
                                                                    <h5>Unsupplied Order List</h5>
                                                                    <h3>0</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div>
                                        <h4 class="heading mb-0">All Approved Magazine List</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    <ul class="country-sale dz-scroll">
                                        <div class="text-center">No records found</div>
                                            <li class="d-flex">
                                                <div class="">
                                                    1.
                                                </div>
                                                <div class="ms-3 country-flag">
                                                    <img src="https://bookprocurement.tamilnadupubliclibraries.org/publisher/images/analytics/developer_male.png" alt="">
                                                </div>
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    
                                                    <div class="ms-2">
                                                        <h6 class="mb-0">Test</h6>
                                                        <small>test one</small>
                                                    </div>
                                                    <span class="badge badge-primary  border-0 ms-2"><i class="fa fa-inr" aria-hidden="true"></i> 12</span>
                                                </div>
                                            </li>
                                        </div>
                                    </ul>
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
        @include('periodical_publisher.footer')
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('periodical_publisher/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('vendor/draggable/draggable.js') }}"></script>
    <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>


    <!-- tagify -->
    <script src="{{ asset('vendor/tagify/dist/tagify.js') }}"></script>

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('periodical_publisher/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Apex Chart -->

    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Vectormap -->
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('periodical_publisher/js/custom.js') }}"></script>
    <script src="{{ asset('periodical_publisher/js/deznav-init.js') }}"></script>
    <script src="{{ asset('periodical_publisher/js/demo.js') }}"></script>
    <script src="{{ asset('periodical_publisher/js/styleSwitcher.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('js/plugins-init/toastr-init.js') }}"></script>

    <script>
        $(document).ready(function(){
            toastr.success("This Is Success Message", "Top Full Width", {
                    positionClass: "toast-top-full-width",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
        });
    </script>
</body>
<style>
    .scroll-view {
        height: 190px;
        overflow: scroll;
    }

    @media only screen and (max-width: 61.9375rem) {
        .sales-bx {
            min-width: 115px !important;
        }
    }

    @media only screen and (max-width: 74.9375rem) {
        .sales-bx {
            padding: 10px 31px !important;
            min-width: 135px !important;
        }
    }
</style>

</html>
