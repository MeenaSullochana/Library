<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">

    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- tagify-css -->
    <link href="/vendor/tagify/dist/tagify.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('librarian/css/style.css') }}" rel="stylesheet">

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
        @include ('librarian.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">


                        <div class="row">
                            @if (auth('librarian')->user()->metaChecker == 'no' &&
                            auth('librarian')->user()->allow_status ==0 && auth('librarian')->user()->libraryType
                            =="State Libraries")
                            <h4>Books</h4>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa fa-book text-primary"></i>
                                            </div>

                                            @php
                                            $bookcopies = DB::table('bookcopies')->get();
                                            @endphp

                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{ count($bookcopies) }}</h3>
                                                <span>Total Book</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa fa-book-open text-success"></i>
                                            </div>
                                            @php
                                            $bookcopies1 = DB::table('bookcopies')->get();
                                            $countre=0;
                                            foreach($bookcopies1 as $val){
                                                $copies= json_decode($val->copies);
                                            foreach($copies as $val1){
                                             if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){

                                            $countre = $countre +1;
                                             }
                                            }
                                            }
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $countre }}</h3>
                                                <span>Received Book </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-book-skull text-danger"></i>
                                                @php
                                                $bookcopies3 = DB::table('bookcopies')->get();
                                                $countre1=0;
                                                foreach($bookcopies3 as $val){
                                                    $copies= json_decode($val->copies);
                                                    foreach($copies as $val1){
                                                if($val1->librarytype == auth('librarian')->user()->libraryName &&
                                                $val1->status == "0"){

                                                $countre1 = $countre1 +1;

                                                }
                                                }
                                            }
                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">{{ $countre1 }}</h3>
                                                <span>Unreceived Book </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <h4>Book Copies</h4>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-book-bible text-primary"></i>
                                            </div>

                                            @php
                                            $bookcopies4 = DB::table('bookcopies')->get();
                                            $copiescount = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $copiescount = $copiescount + 3;
                                            }else{
                                                $copiescount = $copiescount + 1;
                                            }
                                            @endphp

                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{count($bookcopies4) * $copiescount }}</h3>
                                                <span>Total Book Copies</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-book-bookmark text-success"></i>
                                            </div>

                                            @php
                                            $bookcopies1 = DB::table('bookcopies')->get();
                                            $copiescount1 = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $copiescount1 = $copiescount1 + 3;
                                            }else{
                                                $copiescount1 = $copiescount1 + 1;
                                            }
                                            $countre=0;
                                            foreach($bookcopies1 as $val){
                                                $copies= json_decode($val->copies);
                                            foreach($copies as $val1){
                                             if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){

                                            $countre = $countre +1;
                                             }
                                            }
                                            }
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $countre * $copiescount1 }}</h3>
                                                <span>Received Book Copies</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-book-skull text-danger"></i>
                                                @php
                                                $bookcopies3 = DB::table('bookcopies')->get();
                                                $copiescount11 = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $copiescount11 = $copiescount11 + 3;
                                            }else{
                                                $copiescount11 = $copiescount11 + 1;
                                            }
                                                $countre1=0;
                                                foreach($bookcopies3 as $val){
                                                    $copies= json_decode($val->copies);
                                                    foreach($copies as $val1){
                                                if($val1->librarytype == auth('librarian')->user()->libraryName &&
                                                $val1->status == "0"){

                                                $countre1 = $countre1 +1;

                                                }
                                                }
                                            }
                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">{{ $countre1 * $copiescount11}}</h3>
                                                <span>Unreceived Book Copies</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>







                            <h4>Periodical</h4>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa fa-book text-primary"></i>
                                            </div>

                                            @php
                                            $periodicalcopies = DB::table('periodicalcopies')->get();
                                            @endphp

                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{ count($periodicalcopies) }}</h3>
                                                <span>Total Periodical</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa fa-book-open text-success"></i>
                                            </div>

                                            @php
                                            $periodicalcopies1 = DB::table('periodicalcopies')->get();
                                            $periodicalcountre=0;
                                            foreach($periodicalcopies1 as $val){
                                                $copies= json_decode($val->copies);
                                            foreach($copies as $val1){
                                             if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){

                                            $periodicalcountre = $periodicalcountre +1;
                                             }
                                            }
                                            }
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $periodicalcountre }}</h3>
                                                <span>Received Periodical </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-book-skull text-danger"></i>
                                                @php
                                                $periodicalcopies3 = DB::table('periodicalcopies')->get();
                                                $periodicalcountre1=0;
                                                foreach($periodicalcopies3 as $val){
                                                    $copies= json_decode($val->copies);
                                                    foreach($copies as $val1){
                                                if($val1->librarytype == auth('librarian')->user()->libraryName &&
                                                $val1->status == "0"){

                                                $periodicalcountre1 = $periodicalcountre1 +1;

                                                }
                                                }
                                            }
                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">{{ $periodicalcountre1 }}</h3>
                                                <span>Unreceived Periodical </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <h4>Periodical Copies</h4>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-book-bible text-primary"></i>
                                            </div>

                                            @php
                                            $periodicalcopies4 = DB::table('periodicalcopies')->get();
                                            $periodicalcopiescount = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $periodicalcopiescount = $periodicalcopiescount + 3;
                                            }else{
                                                $periodicalcopiescount = $periodicalcopiescount + 1;
                                            }
                                            @endphp

                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{count($periodicalcopies4) * $periodicalcopiescount }}</h3>
                                                <span>Total Periodical Copies</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-book-bookmark text-success"></i>
                                            </div>

                                            @php
                                            $periodicalcopies1 = DB::table('periodicalcopies')->get();
                                            $periodicalcopiescount1 = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $periodicalcopiescount1 = $periodicalcopiescount1 + 3;
                                            }else{
                                                $periodicalcopiescount1 = $periodicalcopiescount1 + 1;
                                            }
                                            $periodicalcountre=0;
                                            foreach($periodicalcopies1 as $val){
                                                $periodicalcopies= json_decode($val->copies);
                                            foreach($periodicalcopies as $val1){
                                             if($val1->librarytype  ==  auth('librarian')->user()->libraryName && $val1->status  == "1"){

                                            $periodicalcountre = $periodicalcountre +1;
                                             }
                                            }
                                            }
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $periodicalcountre * $periodicalcopiescount1 }}</h3>
                                                <span>Received Periodical Copies</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-book-skull text-danger"></i>
                                                @php
                                                $periodicalcopies3 = DB::table('periodicalcopies')->get();
                                                $periodicalcopiescount11 = 0;
                                            if(auth('librarian')->user()->libraryName == "Anna Centenary Library"){
                                                $periodicalcopiescount11 = $periodicalcopiescount11 + 3;
                                            }else{
                                                $periodicalcopiescount11 = $periodicalcopiescount11 + 1;
                                            }
                                                $periodicalcountre1=0;
                                                foreach($periodicalcopies3 as $val){
                                                    $periodicalcopies= json_decode($val->copies);
                                                    foreach($periodicalcopies as $val1){
                                                if($val1->librarytype == auth('librarian')->user()->libraryName &&
                                                $val1->status == "0"){

                                                $periodicalcountre1 = $periodicalcountre1 +1;

                                                }
                                                }
                                            }
                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">{{ $periodicalcountre1 * $periodicalcopiescount11}}</h3>
                                                <span>Unreceived Periodical Copies</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif



                            @if (auth('librarian')->user()->metaChecker == 'no' &&
                            auth('librarian')->user()->allow_status ==0 && auth('librarian')->user()->libraryType
                            =="District Library Office -DLO")
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $orders1 = DB::table('ordermagazines')->where('status', '=', '1')->get();
                                            $orders = [];

                                            foreach ($orders1 as $val) {
                                            $Librarian = DB::table('librarians')->where('id', '=', $val->librarianid)
                                            ->where('dlo_id', '=', auth('librarian')->user()->librarianId)
                                            ->get();

                                            if ($Librarian->isNotEmpty()) {
                                            array_push($orders, $val);
                                            }
                                            }

                                            $orders2 = count($orders);
                                            @endphp

                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $orders2 }}</h3>
                                                <span>Total Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $ordersdata = DB::table('ordermagazines')->where('status', '=', '2')->get();
                                            $orders4 = [];

                                            foreach ($ordersdata as $val) {
                                            $Librariandata = DB::table('librarians')->where('id', '=',
                                            $val->librarianid)
                                            ->where('dlo_id', '=', auth('librarian')->user()->librarianId)
                                            ->get();

                                            if ($Librariandata->isNotEmpty()) {
                                            array_push($orders4, $val);
                                            }
                                            }

                                            $orders3 = count($orders4);
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $orders3 }}</h3>
                                                <span>Total Cancel Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-cart-shopping text-primary"></i>
                                                @php
                                                $magazines = DB::table('magazines')->where('status', '=', '1')->get();

                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{ count($magazines) }}</h3>
                                                <span>Total Magazine</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4>Library</h4>
                            <div class="row">
                                <div class="col-xl-4 col-sm-4">
                                    <div class="card">
                                        <div class="card-body depostit-card">
                                            @php

                                            $librarian = DB::table('librarians')->where('dlo_id', '=',
                                            auth('librarian')->user()->librarianId)->where('allow_status','=','1')->count();

                                            $librarianactive = DB::table('librarians')->where('dlo_id', '=',
                                            auth('librarian')->user()->librarianId)->where('status','=','1')->where('allow_status','=','1')->count();

                                            $librarianinactive = DB::table('librarians')->where('dlo_id', '=',
                                            auth('librarian')->user()->librarianId)->where('status','=','0')->where('allow_status','=','1')->count();
                                            @endphp
                                            <div class="depostit-card-media d-flex justify-content-between style-1">
                                                <div>
                                                    <h6>Number of Library</h6>
                                                    <h3>{{$librarian}}</h3>
                                                </div>
                                                <div class="icon-box bg-secondary">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3_566)">
                                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z"
                                                                fill="#222B40" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3_566">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0">Status </p>
                                                    <p class="mb-0">{{$librarian}}</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:100%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4">
                                    <div class="card">
                                        <div class="card-body depostit-card">
                                            <div class="depostit-card-media d-flex justify-content-between style-1">
                                                <div>
                                                    <h6>Active Library</h6>
                                                    <h3>{{$librarianactive}}</h3>
                                                </div>
                                                <div class="icon-box bg-secondary">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3_566)">
                                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z"
                                                                fill="#222B40" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3_566">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0">Status</p>
                                                    <p class="mb-0">{{$librarian}}</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:{{ $librarianactive != 0 ? ($librarianactive / $librarian * 100) : 0 }}%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4">
                                    <div class="card">
                                        <div class="card-body depostit-card">
                                            <div class="depostit-card-media d-flex justify-content-between style-1">
                                                <div>
                                                    <h6>Inactive Librarian</h6>
                                                    <h3>{{$librarianinactive}}</h3>
                                                </div>
                                                <div class="icon-box bg-secondary">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_3_566)">
                                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z"
                                                                fill="#222B40" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z"
                                                                fill="#222B40" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3_566">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="progress-box mt-0">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0">Status</p>
                                                    <p class="mb-0">{{$librarian}}</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:{{ $librarianinactive != 0 ? ($librarianinactive / $librarian * 100) : 0 }}%; height:5px; border-radius:4px;"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                            @if (auth('librarian')->user()->metaChecker == 'no' &&
                            auth('librarian')->user()->allow_status ==1)
                            <h3>Book</h3>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $orderbooks = DB::table('orderbooks')
                                           
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $orderbooks }}</h3>
                                                <span>Total  Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-cart-shopping text-primary"></i>
                                                @php
                                                $books = DB::table('books')->where('negotiation_status', '=', '2')->get();

                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{ count($books) }}</h3>
                                                <span>Total Periodical</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-warning-light rounded">
                                                <i class="fa-solid fa-users text-warning"></i>
                                            </div>
                                            @php
                                            $carts = DB::table('cartbooks')
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->where('status', '=', '1')
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-warning count">{{ $carts }}</h3>
                                                <span>Total Cart Book</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $orderbooks1 = DB::table('orderbooks')
                                            ->where('status', '=','2')
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $orderbooks1 }}</h3>
                                                <span>Total Cancel Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Periodical</h3>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $ordermagazines = DB::table('ordermagazines')
                                          
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $ordermagazines }}</h3>
                                                <span>Total  Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-cart-shopping text-primary"></i>
                                                @php
                                                $magazines = DB::table('magazines')->where('status', '=', '1')->get();

                                                @endphp
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">{{ count($magazines) }}</h3>
                                                <span>Total Periodical</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-warning-light rounded">
                                                <i class="fa-solid fa-users text-warning"></i>
                                            </div>
                                            @php
                                            $carts = DB::table('carts')
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->where('status', '=', '1')
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-warning count">{{ $carts }}</h3>
                                                <span>Total Cart Periodical</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>

                                            @php
                                            $ordermagazines = DB::table('ordermagazines')
                                            ->where('status', '=','2')
                                            ->where('librarianid', '=', auth('librarian')->user()->id)
                                            ->count();
                                            @endphp
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">{{ $ordermagazines }}</h3>
                                                <span>Total Cancel Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-hand-holding-dollar text-danger"></i>
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">0</h3>
                                                <span>Total Stocks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            @endif
                           <h3> Book </h3>
                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-danger-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books = DB::table('books')
                                                    ->where('book_reviewer_id', '=', $id)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $books }}</h4>
                                                        <p class="mb-0">Total Meta Books</p>
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
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books1 = DB::table('books')
                                                    ->where('book_reviewer_id', $id)
                                                    ->where(function ($query) {
                                                    $query
                                                    ->whereNull('book_status')
                                                    ->orWhere('book_status', 2)
                                                    ->orWhere('book_status', 3);
                                                    })
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $books1 }}</h4>
                                                        <p class="mb-0">Pending Meta Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books3 = DB::table('books')
                                                    ->where('book_reviewer_id', '=', $id)
                                                    ->where('book_status', '=', 1)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $books3 }}</h4>
                                                        <p class="mb-0">Completed Books</p>
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
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books2 = DB::table('books')
                                                    ->where('book_reviewer_id', '=', $id)
                                                    ->where('book_status', '=', 0)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $books2 }}</h4>
                                                        <p class="mb-0">Rejected Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <h3> Periodical </h3>
                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-danger-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $magaziness = DB::table('magazines')
                                                    ->where('periodical_reviewer_id', '=', $id)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $books }}</h4>
                                                        <p class="mb-0">Total Meta Periodicals</p>
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
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $magazines1 = DB::table('magazines')
                                                    ->where('periodical_reviewer_id', $id)
                                                    ->where(function ($query) {
                                                    $query
                                                    ->whereNull('periodical_status')
                                                    ->orWhere('periodical_status', 2)
                                                    ->orWhere('periodical_status', 3);
                                                    })
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $magazines1 }}</h4>
                                                        <p class="mb-0">Pending Meta Periodicals</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $magazines3 = DB::table('magazines')
                                                    ->where('periodical_reviewer_id', '=', $id)
                                                    ->where('periodical_status', '=', 1)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $magazines3 }}</h4>
                                                        <p class="mb-0">Completed Periodicals</p>
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
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $magazines2 = DB::table('magazines')
                                                    ->where('periodical_reviewer_id', '=', $id)
                                                    ->where('periodical_status', '=', 0)
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{ $magazines2 }}</h4>
                                                        <p class="mb-0">Rejected Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects">
                                            <div class="tbl-caption">
                                                <h4 class="heading mb-0">Meta Check Book List</h4>
                                            </div>
                                            <table id="projects-tbl" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Book Name</th>
                                                        <th>Price</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $record = DB::table('books')
                                                    ->where('book_reviewer_id', '=', $id)
                                                    ->get();
                                                    @endphp
                                                    @foreach ($record as $val)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <img src="{{ asset('Books/front/' . $val->front_img) }}"
                                                                    class="avatar avatar-md rounded-circle" alt=""> -->
                                                                <p class="mb-0 ms-2">{{ $val->book_title }}
                                                                </p>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $val->price }}
                                                        </td>
                                                        @if ($val->book_status == 1)
                                                        <td>
                                                            <span
                                                                class="badge badge-success light border-0">Success</span>
                                                        </td>
                                                        @elseif($val->book_status == null)
                                                        <td>
                                                            <span
                                                                class="badge badge-warning light border-0">Pending</span>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <span
                                                                class="badge badge-danger light border-0">Reject</span>

                                                        </td>
                                                        @endif

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    @if (auth('librarian')->user()->metaChecker == 'yes')
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects">
                                            <div class="tbl-caption">
                                                <h4 class="heading mb-0">Meta Check Periodical List</h4>
                                            </div>
                                            <table id="projects-tbl1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Periodical Name</th>
                                                        <th>Price</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $recorddd = DB::table('magazines')
                                                    ->where('periodical_reviewer_id', '=', $id)
                                                    ->get();
                                                    @endphp
                                                    @foreach ($recorddd as $val)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <img src="{{ asset('Books/front/' . $val->front_img) }}"
                                                                    class="avatar avatar-md rounded-circle" alt=""> -->
                                                                <p class="mb-0 ms-2">{{ $val->title }}
                                                                </p>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $val->annual_cost_after_discount }}
                                                        </td>
                                                        @if ($val->periodical_status == 1)
                                                        <td>
                                                            <span
                                                                class="badge badge-success light border-0">Success</span>
                                                        </td>
                                                        @elseif($val->periodical_status == null)
                                                        <td>
                                                            <span
                                                                class="badge badge-warning light border-0">Pending</span>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <span
                                                                class="badge badge-danger light border-0">Reject</span>

                                                        </td>
                                                        @endif

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if (auth('librarian')->user()->metaChecker == 'no')
                            <!-- <div class="col-xl-6">
                                <div class="card p-3">
                                    <div class="card-header border-0">
                                        <h4 class="heading mb-0">New Book</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive active-projects">
                                            <table id="example3" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>BOOK NAME</th>
                                                        <th>PRICE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Diary of a Wimpy
                                                                            Kid: No Brainer</a></h6>
                                                                   
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 655</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d10.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Be Useful: Seven
                                                                            Tools for Life</a></h6>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 655</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d11.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Secret: Jack
                                                                            Reacher, Book 28</a></h6>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 699</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d12.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Kill the
                                                                            Lawyers</a></h6>
                                                             
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 955</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">A Curse for True
                                                                            Love</a></h6>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 655</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="heading mb-0">Top rating books</h4>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="table-responsive active-projects">
                                            <table id="example3" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>BOOK NAME</th>
                                                        <th>PRICE</th>
                                                        <th>SOLD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d1.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Remember Love:
                                                                            Words for Tender Times</a></h6>
                                                                   
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 655</td>
                                                        <td>55</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d10.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Way Forward</a>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 585</td>
                                                        <td>485</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d11.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Prequel: An
                                                                            American Fight Against Fascism</a></h6>
                                                                   
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 852</td>
                                                        <td>5525</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d12.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Secret: Jack
                                                                            Reacher, Book 28</a></h6>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 852</td>
                                                        <td>5985</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Unmaking of
                                                                            June Farrow: A Novel</a></h6>
                                                                  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="fa fa-inr" aria-hidden="true"></i> 182</td>
                                                        <td>525</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            @endif
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
    @include ('librarian.footer')
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

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Change Password</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate method="POST">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="currentPassword" id="currentPassword"
                                placeholder="Enter the Current Password" required>
                            <div class="invalid-feedback">Please Enter Current Password</div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword"
                                placeholder="Enter the New Password" required>
                            <div class="invalid-feedback">Please Enter New Password</div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Confirm Passowrd</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                placeholder="Enter the confirm Password" required>
                            <div class="invalid-feedback">Please Enter Confirm Password</div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter the email" required>
                            <div class="invalid-feedback">Please Enter Confirm Password</div>
                        </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button> -->
                    <button type="submit" id="submitButton" name="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('librarian/js/dashboard/dashboard-1.js') }}"></script>
    <script src="/vendor/draggable/draggable.js"></script>
    <script src="/vendor/swiper/js/swiper-bundle.min.js"></script>


    <!-- tagify -->
    <script src="/vendor/tagify/dist/tagify.js"></script>

    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables/js/jszip.min.js"></script>
    <script src="{{ asset('librarian/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Apex Chart -->

    <script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


    <!-- Vectormap -->
    <script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ asset('librarian/js/custom.js') }}"></script>
    <script src="{{ asset('librarian/js/deznav-init.js') }}"></script>
    <script src="{{ asset('librarian/js/demo.js') }}"></script>
    <script src="{{ asset('librarian/js/styleSwitcher.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
@if (Session::has('success'))
<script>
toastr.success("{{ Session::get('success') }}", {
    timeout: 15000
});
</script>
@elseif (Session::has('error'))
<script>
toastr.error("{{ Session::get('error') }}", {
    timeout: 15000
});
</script>
@endif

</html>
<style>
.active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
    text-align: center;
}
</style>


<script>
$(document).ready(function() {
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
    })
    @if(auth('librarian') -> user() -> checkstatus == Null)
    $('#modalId').modal('show');
    @endif

});
</script>

<script>
$(document).on('click', '#submitButton', function(e) {
    e.preventDefault();
    var data = {
        'currentPassword': $('#currentPassword').val(),
        'newPassword': $('#newPassword').val(),
        'confirmPassword': $('#confirmPassword').val(),
        'email': $('#email').val(),


    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "/librarian/changepasswordnew",
        data: data,
        dataType: "json",
        success: function(response) {
            if (response.success) {
                toastr.success(response.success, {
                    timeout: 25000
                });
                document.getElementById('currentPassword').value = '';
                document.getElementById('newPassword').value = '';
                document.getElementById('confirmPassword').value = '';
                document.getElementById('email').value = '';


                $('#modalId').modal('hide');

            } else {
                toastr.error(response.error, {
                    timeout: 25000
                });
            }

        }
    })

})
</script>