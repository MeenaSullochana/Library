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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <style>
        .disabled-row {
            color: gray;
            opacity: 0.5;
        }
    </style>
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
        @include ('librarian.navigation')
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
                                <b>View Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"
                                        style="background: url('{{ asset('https://www.shutterstock.com/shutterstock/photos/2064927065/display_1500/stock-vector-mega-collection-of-posters-poster-layout-design-letters-alphabet-template-poster-banner-2064927065.jpg') }}'); background-size:cover;"
                                        id="output1"></div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <img src="" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0"></h4>
                                            {{-- <p>UX / UI Designer</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <div class="row">
                        <div class="col-md-12 order-0">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="m-0 p-0">Frequency Received Patterns</h4>
                                        <small class="mb-2 text-danger">Grace Period time: 15 Days From Publication Date</small>
                                    </div>
                                    <div class="col-md-auto">
                                        <i class="fa fa-print"></i>
                                    </div>
                                </div>
                                <hr>
                                <div class="w-100 overflow-scroll">
                                    <table class="table table-responsive ">
                                        <thead>
                                            <tr>
                                                <th>S/No</th>
                                                <th>Magazine Name</th>
                                                <th>Number</th>
                                                <th>Volume No</th>
                                                <th>Publication Date</th>
                                                <th>Date of Received</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Then Citu</td>
                                                <td>121212</td>
                                                <td>Vol 2</td>
                                                <td>12/10/2024</td>
                                                <td>12/10/2024</td>
                                                <td>
                                                    <span class="badge bg-success">Arrived</span>
                                                    <span class="badge bg-danger">Not Received</span>
                                                    <span class="badge bg-info">Expected</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="magazine-title h3 fw-bold w-100 mt-4 mb-4"></div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6 fw-bolder p-2">Frequency</div>
                                    <div class="col-6">: </div>
                                    <div class="col-6 fw-bolder p-2">Language</div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Category </div>
                                    <div class="col-6">: </div>
                                    <div class="col-6 fw-bolder p-2">Single Issue Rate</div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Annual Subscription</div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Discount %</div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Single Issue After Discount </div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Annual Subscription After Discount </div>
                                    <div class="col-6">: </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-6 fw-bolder p-2">RNI Details </div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Paper Quality </div>
                                    <div class="col-6">:</div>


                                    <div class="col-6 fw-bolder p-2">Total Number of Pages </div>
                                    <div class="col-6">:</div>

                                    <div class="col-6 fw-bolder p-2">Number of Multicolour pages </div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Number of Monocolour Pages </div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Size of the Magazine </div>
                                    <div class="col-6">: </div>

                                    <div class="col-6 fw-bolder p-2">Subscription length </div>
                                    <div class="col-6">:</div>

                                    <div class="col-6 fw-bolder p-2">Subscription start date</div>
                                    <div class="col-6">:</div>

                                    <div class="col-6 fw-bolder p-2">Subscription End date</div>
                                    <div class="col-6">: </div>
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
                    @include ('librarian.footer')
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
                include 'librarian/plugin/plugin_js.php';
                ?>
</body>

</html>
