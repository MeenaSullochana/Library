
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
    <title>Government of Tamil Nadu - Book Procurement - View Publisher Distributor Feedback</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
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
        @include ('admin.navigation')
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
                                <b>View Publisher Distributor Feedback</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/feedback_publisher_distributor_list">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 card-profile">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="admin-user">
                                        <h4 class="">Profile Details</h4>
                                        <div class="img-wrraper">
                                            <div class="">
                                                @if($data->image != null)
                                                <img src="{{ asset("publisher_and_distributor/images/profile/".$data->image) }}" class="rounded-circle">
                                                @else
                                                <img src="{{ asset("images/default.png") }}" class="rounded-circle">
                                                @endif
                                            </div>

                                        </div>
                                        <div class="user-details">

                                            <div class="title">
                                                <a target="_blank" href="">
                                                    <h4>{{$data->firstname}}  {{$data->lastname}}</h4>
                                                </a>
                                                <h6>{{$data->userType}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-8">
                                <div class="card p-5">
                                <div class="card-head">
                                        <h4 class="text-start">Date  : {{$data->created_at->format('Y-m-d')}}  </h4>

                                    </div>
                                    <p class="text-justify">

                                        </p>
                                <div class="card-head">
                                        <h4 class="text-start">Subject </h4>
                                    </div>
                                    <div class="card-body ">
                                        <p class="text-justify indent">
                                        {{$data->subject}}
                                        </p>
                                    </div>
                                    <div class="card-head">
                                        <h4 class="text-start">Description </h4>
                                    </div>
                                    <div class="card-body ">
                                        <p class="text-justify indent">
                                              {{$data->description}}
                                        </p>
                                    </div>
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
        @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
    ?>
</body>

</html>
<style>
    span.small{
        font-size: 8px !important;
    }
    .pl-3{
        text-indent: 3em;
    }
</style>
<style>
    .indent {
        margin-left: 40px; /* Adjust the value based on your desired indentation */
    }
</style>
