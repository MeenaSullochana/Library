
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
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
        @include ('publisher.navigation')
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
                                <b>Update Profile</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="pub_profile.php?userid=154">
                                <i class="fas fa-plus"></i> View Profile </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="clearfix">
                            <div class="card card-bx profile-card author-profile m-b30">
                                <div class="card-body">
                                    <div class="p-5">
                                        <div class="author-profile">
                                            <div class="author-media">
                                                <img src="images/user.jpg" alt="">
                                                <div class="upload-link" title="" data-toggle="tooltip"
                                                    data-placement="right" data-original-title="update">
                                                    <input type="file" class="update-flie">
                                                    <i class="fa fa-camera"></i>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <h6 class="title">Nella Vita</h6>
                                                <span>Publisher</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card profile-card card-bx m-b30">
                            <form class="profile-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="John">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Last name</label>
                                            <input type="text" class="form-control" value="H">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Email Id</label>
                                            <input type="email" class="form-control" value="demo@gmail.com">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" class="form-control" value="+91 9988998899">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Publication Address</label>
                                            <input type="text" class="form-control" value="vadapalani chennai-600 090.">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" value="Vadapalani">
                                        </div>

                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">State </label>
                                            <input type="text" class="form-control" value="Tamil Nadu">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Pincode </label>
                                            <input type="text" class="form-control" value="600 002.">
                                        </div>
                                        <div class="col-sm-6 m-b30">
                                            <label class="form-label">Country </label>
                                            <input type="text" class="form-control" value="India">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary text-end">UPDATE</button>
                                    <!-- <a href="page-register.html" class="btn-link">Forgot your password?</a> -->
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
        @include ("publisher.footer")
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
        include "publisher/plugin/plugin_js.php";
    ?>
</body>

</html>s
