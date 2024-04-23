
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
                <div class="content">
                    <div class="page-inner">

                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0 bc-title"><b>Edit Child Category</b> </h3>
                                        <a class="btn btn-primary btn-sm" href="manage_child_category.php"><i
                                                class="fas fa-chevron-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12">

                                    <div class="card o-hidden border-0 shadow-lg">
                                        <div class="card-body ">
                                            <!-- Nested Row within Card Body -->
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <form class="admin-form" action="#" method="POST"
                                                        enctype="multipart/form-data">

                                                        <input type="hidden" name="_token" value="">
                                                        <div class=" mt-3">
                                                            <label for="inp-name">Select Category</label>
                                                            <select class="form-select mb-3 bg-white" name="status">
                                                                <option value="" selected=""> Category Status</option>
                                                                <option value="1">Category 1</option>
                                                                <option value="0">Category 2</option>
                                                                <option value="0">Category 3</option>
                                                                <option value="0">Category 4</option>
                                                                <option value="0">Category 5</option>
                                                                <option value="0">Category 6</option>
                                                            </select>
                                                        </div>
                                                        <div class=" mt-3">
                                                            <label for="inp-name">Select subcategory</label>
                                                            <select class="form-select mb-3 bg-white" name="status">
                                                                <option value="" selected=""> Category Status</option>
                                                                <option value="1">Category 1</option>
                                                                <option value="0">Category 2</option>
                                                                <option value="0">Category 3</option>
                                                                <option value="0">Category 4</option>
                                                                <option value="0">Category 5</option>
                                                                <option value="0">Category 6</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="slug">Name *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Name" value="demo">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">Slug *</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Slug" value="demo">
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-secondary ">Submit</button>
                                                        </div>

                                                        <div>

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
<style>
.admin-form span {
    color: #777;
}

.file {
    max-width: 350px;
    display: block;
}
</style>
