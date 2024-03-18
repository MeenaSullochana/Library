<?php
    @ob_start();
    include "core/event_create.core.php";
    include "activitymonitor.php";
    admin_logincheck();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Government of Tamil Nadu - Book Procurement</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no"> <!-- PAGE TITLE HERE -->
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/star-rating/star-rating-svg.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <?php
        include "plugin/plugin_css.php";
    ?>
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center"> <img src="images/goverment_loader.gif" alt="" width="25%"> </div>
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
        ***********************************--> <?php
			include "navigation.php";
		?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title"> <b> Book Store</b> </h3> <a class="btn btn-primary  btn-sm" href="#">
                            <i class="fas fa-plus"></i> List of Book </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="container">
                        <div class="card col-md-12">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h3 class="mb-0 bc-title"> <b> Book Store</b> </h3> <a class="btn btn-primary  btn-sm" href="#">
                                    <i class="fas fa-plus"></i> List of Book </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">Desktops (13)</a>
                            <a href="#" class="list-group-item list-group-item-action active">Laptops &amp;
                                Notebooks (5)</a>
                            <a href="#" class="list-group-item list-group-item-action">&nbsp;&nbsp;&nbsp;- Macs
                                (0)</a>
                            <a href="#" class="list-group-item list-group-item-action">&nbsp;&nbsp;&nbsp;- Windows
                                (0)</a>
                            <a href="#" class="list-group-item list-group-item-action">Components (2)</a>
                            <a href="#" class="list-group-item list-group-item-action">Tablets (1)</a>
                            <a href="#" class="list-group-item list-group-item-action">Software (0)</a>
                            <a href="#" class="list-group-item list-group-item-action">Phones &amp; PDAs (3)</a>
                            <a href="#" class="list-group-item list-group-item-action">Cameras (2)</a>
                            <a href="#" class="list-group-item list-group-item-action">MP3 Players (4)</a>
                        </div>
                    </div> -->
                        <div class="card card-new">
                            <div class="card-header">Filter</div>
                            <div class="card-body p-1">
                                <div class="card card-new border-0 b-3">
                                    <div class="card-header p-2 bg-white" data-toggle="collapse"
                                        data-target="#collapseExample1" aria-expanded="false">
                                        <p class="m-0 h6">Brand</p>
                                    </div>
                                    <div class="card-body p-0 collapse show" id="collapseExample1">
                                        <ul class="list-group list-group-flush" style="height:200px;overflow:auto;">
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Google</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Microsoft</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Apple</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Samsung</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Amazon</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Asus</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">LG</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Sony</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">MSI</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">HP</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">Compact</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card card-new border-0 b-3">
                                    <div class="card-header p-2 bg-white" data-toggle="collapse"
                                        data-target="#collapseExample2" aria-expanded="false">
                                        <p class="m-0 h6">Size</p>
                                    </div>
                                    <div class="card-body p-0 collapse show" id="collapseExample2">
                                        <ul class="list-group list-group-flush" style="height:200px;overflow:auto;">
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">XXS</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">XS</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">S</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">M</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">L</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">XL</label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">XXL</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card card-new border-0 b-3">
                                    <div class="card-header p-2 bg-white" data-toggle="collapse"
                                        data-target="#collapseExample3" aria-expanded="false">
                                        <p class="m-0 h6">Color</p>
                                    </div>
                                    <div class="card-body p-0 collapse show" id="collapseExample3">
                                        <ul class="list-group list-group-flush" style="height:200px;overflow:auto;">
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox w-100">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#E52B50"></div>
                                                        <span>Amaranth</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox w-100">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#FFBF00"></div>
                                                        <span>Amber</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#007FFF"></div>
                                                        <span>Azure</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#007BA7"></div>
                                                        <span>Cerulean</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#B87333"></div>
                                                        <span>Copper</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#DC143C"></div>
                                                        <span>Crimson</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#008000"></div>
                                                        <span>Green</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#808080"></div>
                                                        <span>Gray</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#FFD700"></div>
                                                        <span>Gold</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#D1E231"></div>
                                                        <span>Pear</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#800080"></div>
                                                        <span>Purple</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">
                                                        <div class="float-left p-2 mt-1 mr-1"
                                                            style="background-color:#C0C0C0"></div>
                                                        <span>Silver</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card card-new border-0 b-3">
                                    <div class="card-header p-2 bg-white" data-toggle="collapse"
                                        data-target="#collapseExample4" aria-expanded="false">
                                        <p class="m-0 h6">Price</p>
                                    </div>
                                    <div class="card-body p collapse show" id="collapseExample4">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Min</label>
                                                <input class="form-control" placeholder="$0" type="number">
                                            </div>
                                            <div class="form-group text-right col-md-6">
                                                <label>Max</label>
                                                <input class="form-control" placeholder="$1,0000" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-block btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent"> <img
                                                            class="img-fluid book_new-st" src="images/books/1.webp"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <span>Sponsored</span>
                                                    <h4><a href="#">What I Learned </a> </h4>
                                                    <div class="comment-review star-rating"> <span> By </span> <a
                                                            class="review-text" href=""> Pulak Prasad </a> | </span>13
                                                        March
                                                        2023 </div>
                                                    <div class="comment-review star-rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 reviews) / </span><a
                                                            class="product-review" href="" data-bs-toggle="modal"
                                                            data-bs-target="#reviewModal">Write a review?</a>
                                                    </div>
                                                    <p>Price: <span class="item fw-bold fs-24"> $325.00</span></p>
                                                    <p>Availability: <span class="item"> In stock <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>Product code: <span class="item">0405689</span> </p>
                                                    <p><span class="item">Kindle Edition</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent"> <img
                                                            class="img-fluid book_new-st" src="images/books/1.webp"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <span>Sponsored</span>
                                                    <h4><a href="#">What I Learned </a> </h4>
                                                    <div class="comment-review star-rating"> <span> By </span> <a
                                                            class="review-text" href=""> Pulak Prasad </a> | </span>13
                                                        March
                                                        2023 </div>
                                                    <div class="comment-review star-rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 reviews) / </span><a
                                                            class="product-review" href="" data-bs-toggle="modal"
                                                            data-bs-target="#reviewModal">Write a review?</a>
                                                    </div>
                                                    <p>Price: <span class="item fw-bold fs-24"> $325.00</span></p>
                                                    <p>Availability: <span class="item"> In stock <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>Product code: <span class="item">0405689</span> </p>
                                                    <p><span class="item">Kindle Edition</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row m-b-30">
                                            <div class="col-md-5 col-xxl-12">
                                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                                    <div class="new-arrivals-img-contnent"> <img
                                                            class="img-fluid book_new-st" src="images/books/1.webp"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xxl-12">
                                                <div class="new-arrival-content position-relative">
                                                    <span>Sponsored</span>
                                                    <h4><a href="#">What I Learned </a> </h4>
                                                    <div class="comment-review star-rating"> <span> By </span> <a
                                                            class="review-text" href=""> Pulak Prasad </a> | </span>13
                                                        March
                                                        2023 </div>
                                                    <div class="comment-review star-rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                        </ul>
                                                        <span class="review-text">(34 reviews) / </span><a
                                                            class="product-review" href="" data-bs-toggle="modal"
                                                            data-bs-target="#reviewModal">Write a review?</a>
                                                    </div>
                                                    <p>Price: <span class="item fw-bold fs-24"> $325.00</span></p>
                                                    <p>Availability: <span class="item"> In stock <i
                                                                class="fa fa-check-circle text-success"></i></span></p>
                                                    <p>Product code: <span class="item">0405689</span> </p>
                                                    <!-- <p>Brand: <span class="item">Lee</span></p> -->
                                                    <p><span class="item">Kindle Edition</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- review -->
                        <div class="modal fade" id="reviewModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Review</h5> <button type="button" class="btn-close"
                                            data-bs-dismiss="modal"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="text-center mb-4"> <img class="img-fluid      rounded"
                                                    width="78" src="./images/avatar/1.jpg" alt="DexignZone">
                                                <div>
                                                    <div class="mb-3">
                                                        <div class="rating-widget mb-4 text-center">
                                                            <!-- Rating Stars Box -->
                                                            <div class="rating-stars">
                                                                <ul id="stars">
                                                                    <li class="star" title="Poor" data-value="1"> <i
                                                                            class="fa fa-star fa-fw"></i> </li>
                                                                    <li class="star" title="Fair" data-value="2"> <i
                                                                            class="fa fa-star fa-fw"></i> </li>
                                                                    <li class="star" title="Good" data-value="3"> <i
                                                                            class="fa fa-star fa-fw"></i> </li>
                                                                    <li class="star" title="Excellent" data-value="4">
                                                                        <i class="fa fa-star fa-fw"></i> </li>
                                                                    <li class="star" title="WOW!!!" data-value="5"> <i
                                                                            class="fa fa-star fa-fw"></i> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea class="form-control" placeholder="Comment" rows="5">
                                                </textarea>
                                                    </div>
                                                    <button class="btn btn-success btn-block">RATE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="container">
                <div class="row mb-5">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-secondary active"><i
                                                    class="fas fa-th"></i></button>
                                            <button type="button" class="btn btn-secondary"><i
                                                    class="fas fa-th-list"></i></button>
                                            <button type="button" class="btn btn-secondary">
                                                <i class="fas fa-sync-alt"></i>
                                                <span>Product Compare (0)</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Category:</span>
                                            </div>
                                            <select class="form-control" id="" name="">
                                                <option value="">Default</option>
                                                <option value="">Name (A - Z)</option>
                                                <option value="">Name (Z - A)</option>
                                                <option value="">Price (Low &gt; High)</option>
                                                <option value="">Price (High &gt; Low)</option>
                                                <option value="">Rating (Highest)</option>
                                                <option value="">Rating (Lowest)</option>
                                                <option value="">Model (A - Z)</option>
                                                <option value="">Model (Z - A)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Show:</span>
                                            </div>
                                            <select class="form-control" id="" name="">
                                                <option value="">15</option>
                                                <option value="">25</option>
                                                <option value="">50</option>
                                                <option value="">75</option>
                                                <option value="">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00 <s class="lead text-muted">$943.00</s></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00 <s class="lead text-muted">$943.00</s></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00 <s class="lead text-muted">$943.00</s></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img class="card-img-top" src="images/books/1.webp" alt="" />
                                            <div class="card-body">
                                                <p class="h6"><small class="text-muted">Apple</small></br>Butterflies
                                                    Hand composite</p>
                                                <p class="m-0">
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                    <i class="fa-xs far fa-star"></i>
                                                </p>
                                                <p class="h5 m-0">$782.00 <s class="lead text-muted">$943.00</s></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="pagination m-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-right mb-0 mt-1">Showing 1 to 12 of 12 (1 Pages)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>


            </div> -->
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************--> <?php
            include "footer.php";
        ?>
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
    ***********************************--> <?php
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Rating -->
    <script src="./vendor/star-rating/jquery.star-rating-svg.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./js/deznav-init.js"></script>
    <script src="./js/demo.js"></script>
    <script src="./js/styleSwitcher.js"></script>
</body>

</html>
<style>
img.img-fluid.book_new-st {
    height: 210px !important;
}

.price {
    font-weight: 600;
    color: var(--primary);
    font-size: 1.5rem;
    margin-bottom: 0;
}

.card-new {
    margin-bottom: 1.563rem;
    background-color: #fff;
    transition: all .5s ease-in-out;
    position: relative;
    border: 0rem solid transparent;
    border-radius: 0.625rem;
    height: auto !important;
    border: 1px solid #E6E6E6;
}

.card.card-new.border-0.b-3 {
    height: auto;
}

.input-group-text {
    min-width: 3.125rem;
    justify-content: center;
    height: 39px;
    border-radius: 0.375rem;
    border-color: #CCCCCC;
}
p.m-0.h6 {
    font-size: 17px;
}
</style>
