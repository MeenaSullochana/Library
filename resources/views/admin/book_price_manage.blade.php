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
    <title>Government of Tamil Nadu - Book Procurement - Book Price</title>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="mb-0 bc-title">
                                        <b>Manage Book Price Config</b>
                                    </h3>
                                    <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                        <i class="fa-solid fa-arrow-left"></i> Back </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row container">
                    <div class="col-md-12 bg-white">
                        <h3 class="text-left p-2">Set GSM Price Details </h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Enter GSM Value</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Enter GSM Price</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <input id="submit" name="submit" type="submit" class="btn btn-info" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-left p-2">Set GSM Price List </h3>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table" id="example3">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/No</th>
                                                <th scope="col">GSM Value</th>
                                                <th scope="col">GSM Price</th>
                                                <th scope="col">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav> --}}

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 bg-white mt-2">
                        <h3 class="text-left p-2">Set Color Paper Price </h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Paper Qty</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Color Paper Price</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <input id="submit" name="submit" type="submit" class="btn btn-info" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-left p-2">Set Color Paper List </h3>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table" id="example3">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/No</th>
                                                <th scope="col">GSM Value</th>
                                                <th scope="col">GSM Price</th>
                                                <th scope="col">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 bg-white mt-2">
                        <h3 class="text-left p-2">Set Inner Paper Price </h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Paper Qty</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label id="first_name_label" for="first_name">Paper Price</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-4">
                                            <input id="submit" name="submit" type="submit" class="btn btn-info" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-left p-2">Set Inner Paper List </h3>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table" id="example3">
                                        <thead>
                                            <tr>
                                                <th scope="col">S/No</th>
                                                <th scope="col">GSM Value</th>
                                                <th scope="col">GSM Price</th>
                                                <th scope="col">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td scope="row">1</td>
                                                <td>0.12</td>
                                                <td>12</td>
                                                <td>
                                                    <i class="bi bi-trash" class="fs-3 text-danger p-2"></i>
                                                    <i class="bi bi-eye" class="fs-3 text-danger p-2"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav> --}}
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