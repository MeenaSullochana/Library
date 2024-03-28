<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <!--*******
            Preloader start
        ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
            Preloader end
        ********-->

    <!--************
            Main wrapper start
        *************-->
    <div id="main-wrapper">
        <!--************
                Nav header start
            *************-->
        @include ('librarian.navigation')
        <!--************
                Sidebar end
            *************-->
        <!--************
                Content body start
            *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Quote</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 d-flex bg-white p-3">
                    <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                        <label class="form-label">Print Option</label>
                    </div>
                    <div class="col-xl-9 col-sm-6 mt-4 text-end">
                        <a href="magazine_invoice">
                        <button type="button" class="btn btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-file-pdf-o"></i>
                        </span>PDF</button>
                        <button type="button" class="btn  btn-info"><span class="btn-icon-start text-info"><i class="fa fa-print"></i>
                        </span>Print</button>
                        <button type="button" class="btn  btn-warning"><span class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                        </span>Download</button>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card mt-3">
                            <div class="card-header"> Quote <strong>24/01/2024</strong> <span class="float-end">
                                    <strong>Status:</strong> Pending</span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div> <strong>Library name</strong> </div>
                                        <div>Madalinskiego 8</div>
                                        <div>71-101 Szczecin, Poland</div>
                                        <div>Email: info@webz.com.pl</div>
                                        <div>Phone: +48 444 666 3333</div>
                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>To:</h6>
                                        <div> <strong>Publisher</strong> </div>
                                        <div>Attn: Daniel Marek</div>
                                        <div>43-190 Mikolow, Poland</div>
                                        <div>Email: marek@daniel.com</div>
                                        <div>Phone: +48 123 456 789</div>
                                    </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end">
                                        <div class="row align-items-center">
											<div class="col-sm-9"> 
												<div class="brand-logo mb-2 inovice-logo">
                                                    <img src="https://bookprocurement.tamilnadupubliclibraries.org/assets/img/logo/logo.png" alt="" srcset="" style="width: 150px">
												</div>
                                               <p class="p-0 m-0"><span class="fw-bold">Date:</span>12/12/2019</p>
                                               <p class="p-0 m-0"><span class="fw-bold">Quote No:</span>9000989988</p>
                                            </div>
                                            <div class="col-sm-3 mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/TamilNadu_Logo.svg/933px-TamilNadu_Logo.svg.png" alt="" srcset="" style="width: 70px"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-border">
                                        <thead>
                                            <tr>
                                                <th class="center">S/no</th>
                                                <th>Magazine Book id</th>
                                                <th>Magazine Name </th>
                                                <th class="right">Unit Cost</th>
                                                <th class="center">Qty</th>
                                                <th class="right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">MAG0001</td>
                                                <td class="left">Archoden</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 999,00</td>
                                                <td class="center">1</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 999,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">2</td>
                                                <td class="left">MAG0002</td>
                                                <td class="left">Augment</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 150,00</td>
                                                <td class="center">20</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 3.000,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">3</td>
                                                <td class="left">MAG0003</td>
                                                <td class="left">Barrons</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 499,00</td>
                                                <td class="center">1</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 499,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">4</td>
                                                <td class="left">MAG0003</td>
                                                <td class="left">Blueprint Chronicle</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 3.999,00</td>
                                                <td class="center">1</td>
                                                <td class="right"><i class="fa fa-rupee"></i> 3.999,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto table-margin">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Subtotal</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Discount (20%)</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">GST (0%)</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 679,76</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Total</strong></td>
                                                    <td class="right"><strong class="text-dark"><i class="fa fa-rupee"></i> 7.477,36</strong><br>
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
    <!--************
                Content body end
            *************-->
    <!--************
                Footer start
            *************-->
    @include ('publisher.footer')
    <!--************
                Footer end
            *************-->

    <!--************
            Support ticket button start
            *************-->

    <!--************
            Support ticket button end
            *************-->


    </div>
    <!--************
            Main wrapper end
        *************-->
        <?php
        include "librarian/plugin/plugin_js.php";
    ?>
</body>

</html>
