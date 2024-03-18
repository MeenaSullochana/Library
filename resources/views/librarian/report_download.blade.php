
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
	<link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
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
        @include ('librarian.navigation')

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
                                <b>Book Fair Report Download</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="fair_manage_add.php">
                                <i class="fas fa-plus"></i> Add </a> -->
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Date Picker</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 mb-3">
                                            <div class="example">
                                                <p class="mb-1">From Date</p>
                                                <input class="form-control input-daterange-datepicker" type="date"
                                                    name="daterange" value="01/01/2015 - 01/31/2015">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <div class="example">
                                                <p class="mb-1">To Date</p>
                                                <input type="date" class="form-control input-daterange-timepicker"
                                                    name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mt-3">
                                        <button class="dt-button buttons-excel buttons-html5 bg-primary text-white btn btn-sm border-0 mt-3" tabindex="0" aria-controls="projects-tbl" type="button"><span><i class="fa-solid fa-file-excel"></i> Export Report</span></button>
                                        </div>
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
        @include ("librarian.footer")
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
        include "librarian/plugin/plugin_js.php";
    ?>
</body>

</html>
