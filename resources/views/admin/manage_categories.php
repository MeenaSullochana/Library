<?php
    @ob_start();
    include "core/event_create.core.php";
    include "activitymonitor.php";
    admin_logincheck();
?>
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
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg"> 
    <?php
        include "plugin/plugin_css.php";
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
        ***********************************--> <?php
			include "navigation.php";
		?>
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
                                <b>Categories</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="manage_categories_add.php">
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
                                                    <th>
                                                        <strong>S.No</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Name</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Status</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Actions</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox2" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <strong>1</strong>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="images\avatar\1.png" class="rounded-lg me-2"
                                                                width="24" alt="">
                                                            <span class="w-space-no">Biography</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-success light sharp btn-sm btn-rounded dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Enabled
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <!-- Button trigger modal -->
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#unblock" href="#">Enabled</a>
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#unblock" href="#">Disable</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="manage_categories_edit.php"
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
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************--> <?php
            include "footer.php";
        ?>
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
    ***********************************--> <?php
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
</body>

</html>
