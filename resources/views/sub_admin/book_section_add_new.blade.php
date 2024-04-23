
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
    <meta name="format-detection" content="telephone=no"> <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title> <!-- FAVICONS ICON -->
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
        <div class="text-center"> <img src="images/goverment_loader.gif" alt="" width="25%"> </div>
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
                <div class="row">
                    <!-- Column  -->
                    <div class="col-xl-12">
                        <div class="card dz-card">
                            <div class="card-header flex-wrap border-0" id="default-tab">
                                <h2 class="card-title">Control panel</h2>
                                <ul class="nav nav-tabs dzm-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation"><a href="book_section.php"><button class="nav-link active " type="button" role="tab" aria-controls="home" aria-selected="true">
                                                << Back</button></a></li>
                                    <li class="nav-item" role="presentation"><button class="nav-link " type="button" role="tab">Admin</button></li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="p-3">Book Details</h3>
                                    <div class="card-body pt-0">
                                        <div class="pt-4">
                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="needs-validation" novalidate>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom01">ISBN No<span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom01" required>
                                                                        <div class="invalid-feedback"> Please enter a ISBN No. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom02">Book Title<span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom02" required>
                                                                        <div class="invalid-feedback"> Please enter a Book Title. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom05">Best Skill <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <select class="default-select wide form-control" id="validationCustom05">
                                                                            <option data-display="Select">Please select </option>
                                                                            <option value="">Action and Adventure </option>
                                                                            <option value="">Biographies and Autobiographies</option>
                                                                            <option value="">Detective and Mystery </option>
                                                                            <option value="">Fantasy</option>
                                                                            <option value="">Historical Fiction </option>
                                                                            <option value="">Novel</option>
                                                                            <option value="">Romance</option>
                                                                            <option value="">Science Fiction</option>
                                                                            <option value="">Short Story</option>
                                                                            <option value="">Suspense and Thrillers </option>
                                                                        </select>
                                                                        <div class="invalid-feedback"> Please select a one. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom03">Athour Name <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom03" required>
                                                                        <div class="invalid-feedback"> Please enter a Athour Name. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom03">Quantity <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom03" required>
                                                                        <div class="invalid-feedback"> Please enter a Quantity. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label" for="validationCustom06">Purchase Date <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input name="datepicker" class="datepicker-default form-control" id="datepicker">
                                                                        <div class="invalid-feedback"> Please enter a Purchese Date. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label class="col-lg-4 col-form-label" for="validationCustom06">Purchase Date <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input name="datepicker" class="datepicker-default form-control" id="datepicker">
                                                                        <div class="invalid-feedback"> Please enter a Purchese Date. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom03">Edition <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom03" required>
                                                                        <div class="invalid-feedback"> Please enter a Edition. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom06">Price <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom06" required>
                                                                        <div class="invalid-feedback"> Please enter a Price. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom07">Pages  <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom07"  required>
                                                                        <div class="invalid-feedback"> Please enter a Pages . </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row"> <label class="col-lg-4 col-form-label" for="validationCustom08">Publisher <span class="text-danger">*</span> </label>
                                                                    <div class="col-lg-6"> <input type="text" class="form-control" id="validationCustom08" required>
                                                                        <div class="invalid-feedback"> Please enter a Publisher. </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <div class="col-lg-8 ms-auto">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
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
                    </div>
                </div>
            </div>
        </div> <!-- /Column  -->
        <!-- Column  -->
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
