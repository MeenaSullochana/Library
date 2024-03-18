
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
                                <b>Application View</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="application_list.php">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 card-profile">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <div class="card ">
                                    <div class="admin-user">
                                        <div class="img-wrraper">
                                            <div class="">
                                                <img src="images/user1.jpg" class="rounded-circle">
                                            </div>
                                            <a class="icon-wrapper" href="edit-profile.html">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="user-details">
                                            <div class="title">
                                                <a target="_blank" href="">
                                                    <h4>Thomas Fleming</h4>
                                                </a>
                                                <h6>Publisher</h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="admin-user">
                                        <h4 class="">Profile Details</h4>
                                        <div class="img-wrraper">
                                            <div class="">
                                                <img src="images/user1.jpg" class="rounded-circle">
                                            </div>
                                            <a class="icon-wrapper" href="edit-profile.html">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="user-details">

                                            <div class="title">
                                                <a target="_blank" href="">
                                                    <h4>Thomas Fleming</h4>
                                                </a>
                                                <h6>Publisher</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="admin-user">
                                        <h4 class="text-start">Contact Details</h4>
                                        <P class="text-start"><b>Email Id :</b> info@gmail.com </P>
                                        <P class="text-start"><b>Contact Number  :</b> +91 9988998899 </P>
                                        <!-- <P class="text-start"><b>Publication Address  :</b> Vadapalani, Chennai - 600 060. </P> -->
                                        <P class="text-start"><b>City  :</b> Vadapalani </P>
                                        <P class="text-start"><b>State  :</b> Tamil Nadu </P>
                                        <P class="text-start"><b>Pincode  :</b> 600 230. </P>
                                        <P class="text-start"><b>Country  :</b> india </P>
                                        <!-- <div class="user-details">
                                            <div class="title">
                                                <a target="_blank" href="">
                                                    <h4>Thomas Fleming</h4>
                                                </a>
                                                <h6>Publisher</h6>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="card ">
                                    <div class="admin-user">
                                        <h4 class="text-start">Other Details</h4>
                                        <P class="text-start"><b>Year of Establishment  :</b> Vadapalani </P>
                                        <P class="text-start"><b>Number of Books Published so far  :</b> Tamil Nadu </P>
                                        <P class="text-start"><b>Number of Books Published in the Last 3 Years  :</b> 600 230. </P>
                                        <P class="text-start"><b>Primary Language of Publication  :</b> Tamil, English </P>
                                        <!-- <div class="user-details">
                                            <div class="title">
                                                <a target="_blank" href="">
                                                </a>
                                                <h6>Publisher</h6>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body profile-accordion pb-0">
                                        <div class="accordion" id="accordionExample1">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne1">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne1"
                                                        aria-expanded="true" aria-controls="collapseOne1"> A Zone
                                                    </button>
                                                </h2>
                                                <div id="collapseOne1" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                                    <div class="accordion-body">
                                                        <div class="about-me">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Lived In Usa</h6>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <div>
                                                                        <h6>Blood Group</h6>
                                                                    </div>
                                                                </li>

                                                            </ul>
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
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body profile-accordion pb-0">
                                        <div class="accordion" id="accordionExample2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne2">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne2"
                                                        aria-expanded="false" aria-controls="collapseOne2"> B Zone
                                                    </button>
                                                </h2>
                                                <div id="collapseOne2" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne2" data-bs-parent="#accordionExample2"
                                                   >
                                                    <div class="accordion-body">
                                                        <div class="accordion-body">
                                                            <div class="about-me">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body profile-accordion pb-0">
                                        <div class="accordion" id="accordionExample3">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne3">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne3"
                                                        aria-expanded="false" aria-controls="collapseOne3"> C Zone
                                                    </button>
                                                </h2>
                                                <div id="collapseOne3" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne3" data-bs-parent="#accordionExample3">
                                                    <div class="accordion-body">
                                                        <div class="accordion-body">
                                                            <div class="about-me">
                                                                <ul>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                        <div>
                                                                            <h6>Lived In Usa</h6>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
