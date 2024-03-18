
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
    ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="{{ asset('publisher_and_distributor/images/goverment_loader.gif') }}" alt="" width="25%">
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
        @include("publisher_and_distributor.navigation")
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
                                <b>Application Management</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="fair_manage_add.php">
                                <i class="fas fa-plus"></i> Add </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <h3 class="bg-success text-white p-2">Latest News</h3>
                                    </div>
                                    <div class="col-xl-12  col-lg-12">
                                        <div class="card">
                                            <div class="card-header border-0 pb-0">
                                                <h4 class="card-title">Book Fair Management</h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div id="DZ_W_TimeLine11"
                                                    class="widget-timeline dz-scroll style-1 height370 my-4 px-4">
                                                    <ul class="timeline">
                                                        <li>
                                                            <div class="timeline-badge primary"></div>
                                                            <a class="timeline-panel" href="application_form.php">
                                                                <span>10 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">Youtube, a video-sharing website, goes
                                                                    live <strong class="text-primary">$500</strong>.
                                                                </h6>
                                                                <span>11/09/2023</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge info">
                                                            </div>
                                                            <a class="timeline-panel" href="#">
                                                                <span>20 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">New order placed <strong
                                                                        class="text-info">#XF-2356.</strong></h6>
                                                                <p class="mb-0">Quisque a consequat ante Sit amet magna
                                                                    at volutapt...</p>
                                                                <span>11/09/2023</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge danger">
                                                            </div>
                                                            <a class="timeline-panel" href="#">
                                                                <span>30 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">john just buy your product <strong
                                                                        class="text-warning">Sell $250</strong></h6>
                                                                <span>11/09/2023</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge success">
                                                            </div>
                                                            <a class="timeline-panel " href="#">
                                                                <span>15 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">StumbleUpon is acquired by eBay. </h6>
                                                                  <span>11/09/2023</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge warning">
                                                            </div>
                                                            <a class="timeline-panel " href="#">
                                                                <span>20 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">Mashable, a news website and blog, goes
                                                                    live.</h6>
                                                                <span>11/09/2023</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge dark">
                                                            </div>
                                                            <a class="timeline-panel " href="#">
                                                                <span>20 minutes ago</span>
                                                                <h6 class="mb-0"><img src="images\avatar\new.gif" alt="new gif Image">Mashable, a news website and blog, goes
                                                                    live.</h6>
                                                                <span>11/09/2023</span>
                                                            </a>
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
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        @include("publisher_and_distributor.footer")
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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
</body>

</html>
<style>

</style>
