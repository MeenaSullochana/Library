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
    <link href="{{asset('vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tagify-css -->
    <link href="{{asset('vendor/tagify/dist/tagify.css')}}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{asset('periodical_distributor/css/style.css')}}" rel="stylesheet">


</head>

<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black"
    data-headerbg="color_1">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="{{ asset('periodical_distributor/images/goverment_loader.gif') }}" alt="" width="25%">
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
        @include('periodical_distributor.navigation')
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
                                        $name = auth('periodical_distributor')->user()->firstName."
                                        ".auth('periodical_distributor')->user()->lastName;
                                        @endphp
                                        <h4 class="heading mb-0">Congratulations <strong>{{$name}}!!</strong><img
                                                src="images/crm/party-popper.png" alt=""></h4>


                                        <a href="/periodical_distributor/distributor_profile_view" class="btn btn-primary btn-sm mt-4">View
                                            Profile</a>
                                    </div>
                                    <img src="images/analytics/developer_male.png" class="harry-img w-25" alt="">

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
                                            @php
                                              $magazines = DB::table('magazines')->where('periodical_procurement_status','!=','0')
                                              ->where('user_id','=',auth('periodical_distributor')->user()->firstName) ->get();
                                            @endphp
                                            <div class="ms-2">
                                                <h4>{{count($magazines)}}</h4>
                                                <p class="mb-0">Total Applied Periodical</p>
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
                                                <h4>0</h4>
                                                <p class="mb-0">Pending Periodical</p>
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
                                                <h4>0</h4>
                                                <p class="mb-0">Rejected Periodical</p>
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
                                                <h4>0</h4>
                                                <p class="mb-0">Selected Periodical</p>
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
                                        <h4 class="heading mb-0">All Approved Periodical List</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    <ul class="country-sale dz-scroll">
                                    @if($magazines->isNotEmpty())
                                           @foreach($magazines as $val)
                                           <li class="d-flex">
                                                <div class="">
                                                  {{$loop->index +1}}
                                                </div>
                                                <div class="ms-3 country-flag">
                                                    <img src="{{ asset('Magazine/full/' . $val->full_img) }}" alt="">
                                                </div>
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    
                                                    <div class="ms-2">
                                                        <h6 class="mb-0">{{$val->title}}</h6>
                                                        <!-- <small>test one</small> -->
                                                    </div>
                                                    <span class="badge badge-primary  border-0 ms-2"><i class="fa fa-inr" aria-hidden="true"></i> {{$val->annual_cost_after_discount}}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <div class="text-center">No records found</div>

                                            @endif
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
        @include("periodical_distributor.footer")
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
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('periodical_distributor/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{asset('vendor/draggable/draggable.js')}}"></script>
    <script src="{{asset('vendor/swiper/js/swiper-bundle.min.js')}}"></script>


    <!-- tagify -->
    <script src="{{asset('vendor/tagify/dist/tagify.js')}}"></script>

    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/jszip.min.js')}}"></script>
    <script src="{{asset('periodical_distributor/js/plugins-init/datatables.init.js')}}"></script>

    <!-- Apex Chart -->

    <script src="{{asset('vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Vectormap -->
    <script src="{{asset('vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('periodical_distributor/js/custom.js')}}"></script>
    <script src="{{asset('periodical_distributor/js/deznav-init.js')}}"></script>
    <script src="{{asset('periodical_distributor/js/demo.js')}}"></script>
    <script src="{{asset('periodical_distributor/js/styleSwitcher.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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