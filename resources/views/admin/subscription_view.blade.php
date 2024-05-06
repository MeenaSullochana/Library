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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

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
                                <b>View Subscription</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('admin/Subscription_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Subscription </a>
                        </div>
                    </div>
                </div>
                <div class="row card p-1">
                    <p class="h3 p-3 bg-main text-white">Subscription Details</p>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Vendor</div>
                            <div class="col-6">: Contact Person Name</div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Biblio </div>
                            <div class="col-6">: Contact Person Name</div>
                        </div>
                        <div class="row">
                            <div class="col-12 fw-bolder p-2">Create an item record when receiving this serial or Do not create an iten record when receiving this serial </div>
                        </div>
                         <div class="row">
                            <div class="col-6 fw-bolder p-2">Manual History </div>
                            <div class="col-6">India </div>
                        </div> 
                         <div class="row">
                            <div class="col-6 fw-bolder p-2">State </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">District </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">City </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Pincode </div>
                            <div class="col-6">india </div>
                        </div> 
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Person Address </div>
                            <div class="col-6">: Contact Person Name </div>
                        </div>
                    </div>
                    <p class="h2 bg-main text-white">Official Address</p>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            Contact Person Name
                        </div>
                    </div>

                    <p class="h2 bg-main text-white mt-3">Bank Account Details</p>
                    <hr>
                    <div class="row">
                        <div class="col-6 fw-bolder p-2">IFSC Code </div>
                        <div class="col-6">: Contact Person Name</div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Account Number </div>
                        <div class="col-6">: Contact Person Name</div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Name </div>
                        <div class="col-6">: Contact Person Name</div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Account Holder Name </div>
                        <div class="col-6">: Contact Person Name</div>
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
    @include ('admin.footer')
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
    include 'admin/plugin/plugin_js.php';
    ?>
    </div>

    <style>
        .bg-main {
            background-color: #222B40;
        }
    </style>
