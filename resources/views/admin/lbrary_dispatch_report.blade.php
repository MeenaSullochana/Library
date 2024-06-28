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
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
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
                                <b>Library Dispatch Report</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/index">
                                <i class="fas fa-plus"></i> Dashboard </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Library Dispatch Report</h4>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="slug">Magazine </label>
                                        <div
                                            class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="status" name="status"
                                                    class="default-select form-control wide form-control-sm"
                                                    required="" tabindex="null">
                                                    <option value="">Choose any one</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-3">
                                        <div class="mb-3 row">
                                            <p class="mb-1"> Month and Year</p>
                                            <input class="form-control input-daterange-datepicker" type="month"
                                                name="daterange"min="1918-03" value="01/01/2015 - 01/31/2015">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="slug">Library Type </label>
                                        <div
                                            class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="" name=""
                                                    class="default-select form-control wide form-control-sm"
                                                    required="" tabindex="null">
                                                    <option value=""> Choose any one</option>
                                                    <option value="1">1 </option>
                                                    <option value="0">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <label for="slug">Frequency </label>
                                        <div
                                            class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="" name=""
                                                    class="default-select form-control wide form-control-sm"
                                                    required="" tabindex="null">
                                                    <option value=""> Choose any one</option>
                                                    <option value="1">1 </option>
                                                    <option value="0">2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <label for="slug">Status </label>
                                        <div
                                            class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="status" name="status"
                                                    class="default-select form-control wide form-control-sm"
                                                    required="" tabindex="null">
                                                    <option value=""> Choose any one</option>
                                                    <option value="1">Received </option>
                                                    <option value="0">Not Received</option>
                                                    <option value="0"> Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mt-3 text-end">
                                        <button
                                            class="dt-button buttons-excel buttons-html5 bg-primary text-white btn btn-sm border-0 mt-3"
                                            tabindex="0" aria-controls="projects-tbl" type="button"><span><i
                                                    class="fa-solid fa-file-excel"></i> Export Report
                                                download</span></button>
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
</body>

</html>
