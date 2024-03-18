<
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
    <title>Government of Tamil Nadu - Book Procurement </title>
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
                                    <b>Add State</b>
                                </h3>
                                <a class="btn btn-primary  btn-sm" href="state_list.php">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> Back </a>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <!-- here Place your code  -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="h5">Add State</h5>
                            </div>

                            <div class="card-body">
                                <form class="row g-3" method="post">
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Country</label>
                                        <select id="inputState" class="form-select form-select rounded-0 bg-white"
                                            name="status">
                                            <option value="" selected> india</option>
                                            <option value="Active">india 1</option>
                                            <option value="Inactive">india 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Name of State</label>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Enter Your Name of State" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Status</label>
                                        <select id="inputState" class="form-select form-select rounded-0 bg-white"
                                            name="status">
                                            <option value="" selected> Active</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>

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
