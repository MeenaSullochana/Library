
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
    <title>Book Fair </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
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
        @include ('sub_admin.navigation')
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>View Distributor Feedback</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="feedback_public_list.php">
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
                                                <img src="images/user1.jpg" class="rounded-circle">
                                            </div>
                                            <a class="icon-wrapper" href="edit-profile.html">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="user-details">

                                            <div class="title">
                                                <a target="_blank" href="">
                                                    <h4>Thomas Fleming</h4>
                                                </a>
                                                <h6>Public</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card p-5">
                                    <div class="card-head">
                                        <h4 class="text-start">Comment </h4>
                                        <span class="small pl-3">12/09/2023</span>
                                        
                                    </div>
                                    <div class="card-body ">
                                        <p class="text-justify">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime rerum,
                                            eveniet distinctio nostrum deserunt eos exercitationem harum debitis velit
                                            tempore incidunt aspernatur possimus alias voluptas sit expedita. Voluptas,
                                            veritatis vel.
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
        @include ("sub_admin.footer")
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
        include "sub_admin/plugin/plugin_js.php";
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