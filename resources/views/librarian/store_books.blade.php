
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
    <meta name="format-detection" content="telephone=no"> <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/star-rating/star-rating-svg.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

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
        ***********************************-->
        @include ('librarian.navigation')

        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid bg-white">
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title"> <b> Book Store</b> </h3> <a class="btn btn-primary  btn-sm" href="#">
                            <i class="fas fa-plus"></i> List of Book </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="t-products p-2">
                            <h6 class="text-uppercase">Book Category</h6>
                            <div class="p-lists">
                                <div class="d-flex justify-content-between mt-2"> <span>Health,Family & Personal
                                        Development</span> <span>23</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>Bussines & Economy</span>
                                    <span>46</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>Literature & Fiction</span>
                                    <span>13</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>Religion & Spritituality</span>
                                    <span>33</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>Children Literature </span>
                                    <span>12</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>kindle Books</span>
                                    <span>53</span> </div>
                                <div class="d-flex justify-content-between mt-2"> <span>Office Papper Books</span>
                                    <span>203</span> </div>
                            </div>
                        </div>
                        <div class="processor p-2">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <h6 class="text-uppercase">Processor</h6> <span>--</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                        Intel Core i7
                                    </label> </div> <span>3</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Intel
                                        Core i6 </label> </div> <span>4</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Intel
                                        Core i3 </label> </div> <span>14</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Intel
                                        Centron </label> </div> <span>8</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Intel
                                        Pentinum </label> </div> <span>14</span>
                            </div>
                        </div>
                        <div class="brand p-2">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <h6 class="text-uppercase">Brand</h6> <span>--</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                        Apple
                                    </label> </div> <span>13</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Asus
                                    </label> </div> <span>4</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Dell
                                    </label> </div> <span>24</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked">
                                        Lenovo </label> </div> <span>18</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Acer
                                    </label> </div> <span>44</span>
                            </div>
                        </div>
                        <div class="type p-2 mb-2">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <h6 class="text-uppercase">Type</h6> <span>--</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                        Hybrid
                                    </label> </div> <span>23</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked">
                                        Laptop </label> </div> <span>24</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked">
                                        Desktop </label> </div> <span>14</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked"> Touch
                                    </label> </div> <span>28</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckChecked" checked> <label class="form-check-label"
                                        for="flexCheckChecked">
                                        Tablets </label> </div> <span>44</span>
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
                                                <a href="store_book_view.php">
                                                    <div class="new-arrival-content position-relative">
                                                        <span>Sponsored</span>
                                                        <h4><a href="#">What I Learned </a> </h4>
                                                        <div class="comment-review star-rating"> <span> By </span> <a
                                                                class="review-text" href=""> Pulak Prasad </a> |
                                                            </span>13
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
                                                                    class="fa fa-check-circle text-success"></i></span>
                                                        </p>
                                                        <p>Product code: <span class="item">0405689</span> </p>
                                                        <p><span class="item">Kindle Edition</span></p>
                                                    </div>
                                                </a>
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
                                                <a href="store_book_view.php">
                                                    <div class="new-arrival-content position-relative">
                                                        <span>Sponsored</span>
                                                        <h4><a href="#">What I Learned </a> </h4>
                                                        <div class="comment-review star-rating"> <span> By </span> <a
                                                                class="review-text" href=""> Pulak Prasad </a> |
                                                            </span>13
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
                                                                    class="fa fa-check-circle text-success"></i></span>
                                                        </p>
                                                        <p>Product code: <span class="item">0405689</span> </p>
                                                        <p><span class="item">Kindle Edition</span></p>
                                                    </div>
                                                </a>
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
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
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
