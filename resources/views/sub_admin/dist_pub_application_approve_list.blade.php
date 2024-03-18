
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
                                <b>List Application</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="dist_pub_application_approve_view.php"> View Application </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example4_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example4" class="display table dataTable no-footer"
                                        style="min-width: 845px" role="grid" aria-describedby="example4_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example4"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Roll No: activate to sort column descending"
                                                    style="width: 85.0156px;">S.No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Event Name: activate to sort column ascending"
                                                    style="width: 130.469px;">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Contact Number : activate to sort column ascending"
                                                    style="width: 175.953px;">Contact Number </th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Status : activate to sort column ascending"
                                                    style="width: 85.9219px;">Status </th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Create at: activate to sort column ascending"
                                                    style="width: 161.469px;">Change Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Control: activate to sort column ascending"
                                                    style="width: 90.2812px;">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td>Demo</td>
                                                <td>+91 9900990099</td>
                                                <td>
                                                    <span class="badge bg-danger">Inactive</span>
                                                </td>
                                                <td class="sorting_1">
                                                    <form method="POST">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="statusId1" name="featured_status" value="Active" data-isprm="1">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                         </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="application_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

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