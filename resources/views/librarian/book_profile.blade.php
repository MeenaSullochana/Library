
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>View Order List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="book_stock_list.php">
                                <i class="fas fa-plus"></i> List of Order</a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid bg-white">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="clearfix">
                                <div class="card card-bx profile-card author-profile m-b30">
                                    <div class="card-body">
                                        <div class="p-5">
                                            <div class="author-profile">
                                                <div class="author-media">
                                                    <img class="rounded" src="images/user.jpg" alt="">
                                                </div>
                                                <div class="author-info">
                                                    <h6 class="title">Images</h6>
                                                    <span>Subtitle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive payment-tbl">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6>Title</h6>
                                                    </td>
                                                    <td>
                                                        <span>Demo</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Subtitle</h6>
                                                    </td>
                                                    <td>
                                                        <span>Subtitle demo </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>ISBN 10</h6>
                                                    </td>
                                                    <td>
                                                        <span>ISBN 10 demo</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>ISBN 13</h6>
                                                    </td>
                                                    <td>
                                                        <span>ISBN 13 demo</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Series</h6>
                                                    </td>
                                                    <td>
                                                        <span>522</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Publisher</h6>
                                                    </td>
                                                    <td>
                                                        <span>Selva</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="clearfix">
                                <div class="card card-bx profile-card author-profile m-b30">
                                    <div class="card-body">
                                        <div class="p-5">
                                            <div class="author-profile">
                                                <div class="author-media">
                                                    <img class="rounded" src="images/user.jpg" alt="">
                                                </div>
                                                <div class="author-info">
                                                    <h6 class="title">Images</h6>
                                                    <span>Subtitle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive payment-tbl">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6>Authors</h6>
                                                    </td>
                                                    <td>
                                                        <span>Authors one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Genres</h6>
                                                    </td>
                                                    <td>
                                                        <span>Genres one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Tags</h6>
                                                    </td>
                                                    <td>
                                                        <span>Tags one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Edition</h6>
                                                    </td>
                                                    <td>
                                                        <span>Edition one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Published Year</h6>
                                                    </td>
                                                    <td>
                                                        <span>1992</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Pages</h6>
                                                    </td>
                                                    <td>
                                                        <span>Pages one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>physical Status</h6>
                                                    </td>
                                                    <td>
                                                        <span>Digital</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Status</h6>
                                                    </td>
                                                    <td>
                                                        <span>Available</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Size</h6>
                                                    </td>
                                                    <td>
                                                        <span>cm</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <h6>Binding</h6>
                                                    </td>
                                                    <td>
                                                        <span>Hard Cover</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Stock</h6>
                                                    </td>
                                                    <td>
                                                        <span>Stock one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Location</h6>
                                                    </td>
                                                    <td>
                                                        <span>Location one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Price (MYR)</h6>
                                                    </td>
                                                    <td>
                                                        <span>3564</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Description</h6>
                                                    </td>
                                                    <td>
                                                        <span>Description one</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Notes</h6>
                                                    </td>
                                                    <td>
                                                        <span>Notes one</span>
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
        @include ("librarian.footer")
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
        include "librarian/plugin/plugin_js.php";
    ?>
</body>

</html>
