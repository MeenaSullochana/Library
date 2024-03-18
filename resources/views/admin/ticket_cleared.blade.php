
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
                <div class="card-body bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>List of Completed Ticket</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="ticket_create.php">
                            <i class="fas fa-plus"></i> Create Ticket </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-12">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card overflow-hidden">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">Top Products</h4>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="widget-media">
                                        <ul class="timeline">
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2">
                                                        <img alt="image" width="50" src="images\avatar\1.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">Dr sultads Send you Photo  <b class="badge bg-success text-white">Complited</b></h5>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary light sharp"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="ticket_view.php">View</a>
                                                            <a class="dropdown-item" href="ticker_reply.php">Reply</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img alt="image" width="50" src="images\avatar\1.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">Resport created successfully   <b class="badge bg-success text-white">Complited</b></h5>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="ticket_view.php">View</a>
                                                            <a class="dropdown-item" href="ticker_reply.php">Reply</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-success">
                                                        <img alt="image" width="50" src="images\avatar\1.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">Reminder : Treatment Time!  <b class="badge bg-success text-white">Complited</b></h5>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="ticket_view.php">View</a>
                                                            <a class="dropdown-item" href="ticker_reply.php">Reply</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chart_widget_10" width="1148" height="438"
                                        style="display: block; width: 574px; height: 219px;"
                                        class="chartjs-render-monitor"></canvas>
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
