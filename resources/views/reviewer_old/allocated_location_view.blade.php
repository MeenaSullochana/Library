
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
        ***********************************-->
        <?php
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Allocated Location View</b>
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="allocated_location_list.php">Allocated Location List</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Allocated Location </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="">Application Status</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Application Number
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: 874033</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Application Id
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: USR98949</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Application Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: 15/09/2023</p>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">District
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: Vellore</p>
                                                    </div>
                                                </div>
                                                <div class="shadow-sm shadow-lg p-3 mb-5 ">
                                                    <h4>Application Status</h4>
                                                    <div class="card-body">
                                                        <p class="badge badge-success light border-0">Success</p>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <h4>Selected District Name</h4>
                                                        <div class="col-lg-6   ">
                                                            <p class="badge badge-warning light border-0 ">Vellore</p>
                                                            <p class="badge badge-warning light border-0">Thirupathur
                                                            </p>
                                                            <p class="badge badge-warning light border-0">Dharmapuri</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <h4>Amount</h4>
                                                        <div class="col-lg-6   ">
                                                            <p class="badge badge-primary light border-0 ">1,00,000</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <h5 class="">Publication Details</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Publication Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Publication Name.." required=""
                                                            value="Publication Name" disabled>
                                                    </div>
                                                </div>
                                                <h5 class="">Publisher Details</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">First Name <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a First Name.." required=""
                                                            value="First Name" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Last
                                                        name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Last name.." required=""
                                                            value="Last name" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">Email Id <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Email Id.." required=""
                                                            value="info@gmail.com" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">Contact Number <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Contact Number.." required=""
                                                            value="+91 9900990099" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">Publication Address <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control" id=""
                                                            placeholder="Enter a Publication Address.." required=""
                                                            rows="3" value="Vadapalani, Chennai - 600 040."
                                                            disabled></textarea>
                                                    </div>
                                                </div>
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
        <?php
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
    ***********************************-->
    <?php
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
</body>

</html>
<style>
</style>
