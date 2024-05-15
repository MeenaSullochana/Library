
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
    <title>Government of Tamil Nadu - Book Procurement - Publisher Report Download</title>
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>User Books  Report Download</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="index">
                                    <i class="fas fa-plus"></i> Dashboard </a> -->
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Books Report Download</h4>

                                </div>
                                <div class="card-body">
                                <form    method="POST" enctype="multipart/form-data"  action="/admin/books_daycount">
                                            @csrf
                                    <div class="row">
                                       
                                        <div class="col-xl-6 mb-3">
                                            <div class="example">
                                                <p class="mb-1">From Date <span class="text-danger">*</span></p>
                                                <input class="form-control input-daterange-datepicker" type="date"
                                                    id="fromDate"    name="fromDate" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <div class="example">
                                                <p class="mb-1">To Date <span class="text-danger">*</span></p>
                                                <input type="date" class="form-control input-daterange-timepicker"
                                                    id="toDate" name="toDate"  required>
                                            </div>
                                        </div>
                                    
                                         <div class="col-xl-10 mt-3 text-center">
                                            <button class="btn btn-primary" id="submitBtn">
                                                 <span><i class="fa-solid fa-file-excel"></i> Export Report download</span>
                                            </button>
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

</html>