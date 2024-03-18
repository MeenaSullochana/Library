
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
                                <b>List of State</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="state_add.php">
                                <i class="fas fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card dz-card" id="bootstrap-table2">
                        <!-- tab-content -->
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="bordered" role="tabpanel"
                                aria-labelledby="home-tab-1">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px;">
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkAll" required="">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 136.641px;">S.No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 215.156px;">Country Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 215.156px;">State Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                                        style="width: 54.625px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 103.766px;">Change Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 75.0781px;">Create At</th>

                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 75.0781px;">Update At</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 75.0781px;">Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox2" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="">1</td>
                                                    <td>India</td>
                                                    <td>Tamil Nadu</td>
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>
                                                    <td class="sorting_1">
                                                        <form method="POST">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="statusId1" name="featured_status" value="Active"
                                                                    data-isprm="1">
                                                                <label class="form-check-label"
                                                                    for="flexSwitchCheckDefault"></label>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td>23/05/20 04:43:03</td>
                                                    <td>23/05/20 04:44:05</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="state_edit.php"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
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
                        <!-- /tab-content -->
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
