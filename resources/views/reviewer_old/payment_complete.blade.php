
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
    <title>Government of Tamil Nadu - Book Procurement - Complete Payment List</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
        include "reviewer/plugin/plugin_css.php";
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
        @include ('reviewer.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row task bg-white">
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-primary count">8</h2>
                                <span>Total Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-purple count">7</h2>
                                <span>On Going Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-warning count">13</h2>
                                <span>Completed Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-danger count">11</h2>
                                <span>Canceld Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-success count">21</h2>
                                <span>Complete Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="task-summary">
                            <div class="d-flex align-items-baseline">
                                <h2 class="text-danger count">16</h2>
                                <span>pending Payment</span>
                            </div>
                            <p>Payment Transection</p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 bg-white mt-3">
                    <div class="table-responsive active-projects">
                        <div class="tbl-caption">
                            <h4 class="heading mb-0">Complete Payment List</h4>
                        </div>
                        <table id="projects-tbl" class="table">
                            <thead>
                                <tr>
                                    <th>Book No.</th>
                                    <th>Book Name</th>
                                    <th>Date</th>
                                    <th>Ref</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-primary">#00001</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="images/contacts/pic1.jpg" class="avatar avatar-md rounded-circle" alt="">
                                            <p class="mb-0 ms-2">Liam Risher</p>
                                        </div>
                                    </td>
                                    <td>2 Feb 2023</td>
                                    <td class="text-primary">HA-22533</td>
                                    <td>$5,5225</td>
                                    <td>
                                        <span class="badge badge-danger light border-0">Pending</span>
                                    </td>
                                    <td>
                                        <a href="payment_raciept.php">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-primary">#00501</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="images/contacts/pic1.jpg" class="avatar avatar-md rounded-circle" alt="">
                                            <p class="mb-0 ms-2">William Risher</p>
                                        </div>
                                    </td>
                                    <td>2 Feb 2023</td>
                                    <td class="text-primary">HA-22533</td>
                                    <td>$5,5225</td>
                                    <td>
                                        <span class="badge badge-success light border-0">Sueecss</span>
                                    </td>
                                    <td>
                                        <a href="payment_raciept.php">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
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
        @include ("reviewer.footer")
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
        include "reviewer/plugin/plugin_js.php";
    ?>
</body>

</html>
