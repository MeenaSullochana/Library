<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
   include "plugin/css.php";
   ?>
</head>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->
        @include("header.top_header")
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->

        @include("header.middile_navigation")
        @include("header.navigation")
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->

        @include("header.mobile_navigation")
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->
    <main>
        <!-- Your Content Use Here -->
        <section class="shopdetails-area grey-bg pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <div class="tpdetails__area mr-60 pb-30">
                            <div class="tpdetails__product mb-30">
                                <div class="tpdetails__title-box">
                                    <h3 class="tpdetails__title">{{$data->book_title}}</h3>
                                    <ul class="tpdetails__brand">
                                        <li> Author: <a href="#">{{$data->author_name}}</a> </li>

                                        <li>
                                            Book Code: <span>{{$data->product_code}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tpdetails__box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset("Books/front/".$data->front_img) }}"
                                                            class="d-block w-100" alt="Front Image">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset("Books/back/".$data->back_img) }}"
                                                            class="d-block w-100" alt="Back Image">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset("Books/full/".$data->full_img) }}"
                                                            class="d-block w-100" alt="Full Image">
                                                    </div>
                                                    @if($data->other_img1 != null)
                                                    @foreach($data->other_img1 as $key => $val)
                                                    @if($val != null)
                                                    <div class="carousel-item">
                                                        <img src="{{ asset("Books/other_img/".$val) }}"
                                                            class="d-block w-100" alt="Other Image {{ $key + 1 }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="0" class="active" aria-current="true">
                                                        <img src="{{ asset("Books/front/".$data->front_img) }}"
                                                            class="d-block w-100" alt="Front Image">
                                                    </button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="1">
                                                        <img src="{{ asset("Books/back/".$data->back_img) }}"
                                                            class="d-block w-100" alt="Back Image">
                                                    </button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="2">
                                                        <img src="{{ asset("Books/full/".$data->full_img) }}"
                                                            class="d-block w-100" alt="Full Image">
                                                    </button>
                                                    @if($data->other_img1 != null)
                                                    @foreach($data->other_img1 as $key => $val)
                                                    @if($val != null)
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="{{ $key + 3 }}">
                                                        <img src="{{ asset("Books/other_img/".$val) }}"
                                                            class="d-block w-100" alt="Other Image {{ $key + 1 }}">
                                                    </button>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <hr>
                                            <!-- Modal trigger button -->
                                            <div class="row">

                                                <div class="col-12 pt-2 ps-2 pe-2">
                                                    <!-- Modal trigger button -->
                                                    <button type="button" class="btn btn-outline-primary w-100"
                                                        data-bs-toggle="modal" id="openModalBtn"
                                                        data-bs-target="#modalId">
                                                        Read Sample
                                                    </button>
                                                </div>
                                                <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 order-0">
                                       <div class="w-75">
                                       <p>Read Audio Book</p>
                                          <audio controls>
                                             <source src="horse.ogg" type="audio/ogg">
                                             <source src="horse.mp3" type="audio/mpeg">
                                             Your browser does not support the audio element.
                                          </audio>
                                       </div>
                                    </div> -->
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="product__details-price">Rs.{{$data->final_price}}.00</h5>
                                                    <ul class="product__details-info-list">
                                                        <li>{{$data->category}}</li>

                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <div
                                                        class="product__details-quantity d-flex align-items-center mb-15">
                                                        <b>Qty:</b>
                                                        <div class="product__details-count mr-10">
                                                            <span class="cart-minus"><i class="far fa-minus"></i></span>
                                                            <input class="tp-cart-input" type="text" value="1">
                                                            <span class="cart-plus"><i class="far fa-plus"></i></span>
                                                        </div>
                                                        <div class="product__details-btn">
                                                            <a href="/cart">add to cart</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="product__details-stock mb-25">
                                                    <ul>

                                                        <li>Categories: <span>{{$data->category}}
                                                            </span></li>

                                                        <li>Subject: <span>{{$data->subject}}
                                                            </span></li>
                                                        @php
                                                        $tags = json_decode($data->booktag);
                                                        @endphp

                                                        <li>Tags:
                                                            <span>
                                                                @foreach($tags as $tag)
                                                                {{ $tag }},
                                                                @endforeach
                                                            </span>
                                                        </li>




                                                    </ul>
                                                </div>
                                                <!-- <div class="product__details-payment text-center">
                                                    <img src="assets/img/shape/payment-2.png" alt="">
                                                    <span>Guarantee safe & Secure checkout</span>
                                                </div>
                                                <p class="p-0 m-0">All Format Of Edition</p>
                                                <hr> -->
                                                <div class="d-flex">
                                                    <div class="border-3 rounded-4 bg-light p-2 m-1">
                                                        <p class="p-0 m-0">{{$data->type}}</p>
                                                        <p><i class="fas fa-rupee-sign"></i>{{$data->final_price}}</p>
                                                    </div>
                                                    <!-- <div class="border-3 rounded-4 bg-light p-2 m-1">
                                                        <p class="p-0 m-0">Hard Cover</p>
                                                        <p><i class="fas fa-rupee-sign"></i>2500</p>
                                                    </div>
                                                    <div class="border-3 rounded-4 bg-light p-2 m-1">
                                                        <p class="p-0 m-0">Paperback</p>
                                                        <p><i class="fas fa-rupee-sign"></i>2500</p>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tpdescription__box">
                                <div class="tpdescription__box-center d-flex align-items-center justify-content-center">
                                    <nav>
                                        <div class="nav nav-tabs" role="tablist">
                                            <button class="nav-link active" id="nav-description-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-description" type="button"
                                                role="tab" aria-controls="nav-description" aria-selected="true">Product
                                                Description</button>
                                            <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-information" type="button" role="tab"
                                                aria-controls="nav-information" aria-selected="false">ADDITIONAL
                                                INFORMATION</button>
                                            <!-- <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-review" type="button" role="tab"
                                                aria-controls="nav-review" aria-selected="false">Reviews (1)</button> -->
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab" tabindex="0">
                                        <div class="tpdescription__content">
                                            <p>{{strip_tags($data->productdescription)}}. </p>
                                        </div>
                                        <div class="tpdescription__video">
                                            <h2 class="tpdescription__content">Author Details</h2>
                                            <h5 >Author name   </h5> &rlm;
                                                                
                                                                &lrm;<span> {{$data->author_name}} </span>
                                                                <h5 >Author Description   </h5> &rlm;
                                                                
                                                                &lrm;<span> {{strip_tags($data->author_description)}} </span>
                                           
                                        </div>
                                        <!-- <div
                                            class="tpdescription__product-wrapper mt-30 mb-30 d-flex justify-content-between align-items-center">
                                            <div class="tpdescription__product-info">
                                                <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                                <ul class="tpdescription__product-info">
                                                    <li>Publisher : Penguin Random House India (14 July 2017)</li>
                                                    <li>Language : English</li>
                                                    <li>Paperback : 192 pages</li>
                                                    <li>ISBN-10 : 140 g</li>
                                                    <li>Dimensions : 19.8 x 12.9 x 1.18 cm</li>
                                                    <li>Country of Origin : 235 in Books (See Top 100 in Books)
                                                        #2 in Anthologies (Books)</li>
                                                </ul>
                                                <p>Lemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    <br> fugit,
                                                    sed quia consequuntur magni dolores eos qui ratione voluptatem <br>
                                                    sequi
                                                    nesciunt.
                                                </p>
                                            </div>
                                            <div class="tpdescription__product-thumb">
                                                <img src="https://images.pexels.com/photos/904620/pexels-photo-904620.jpeg"
                                                    class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="tpdescription__video">
                                            <h5 class="tpdescription__product-title">About the author</h5>
                                            <p>Form is an armless modern chair with a minimalistic expression. With a
                                                simple and
                                                contemporary design Form Chair has a soft and welcoming ilhouette and a
                                                distinctly
                                                residential look. The legs appear almost as if they are growing out of
                                                the shell.
                                                This gives the design flexibility and makes it possible to vary the
                                                frame. Unika is
                                                a mouth blown series of small, glass pendant lamps, originally designed
                                                for the
                                                Restaurant Gronbech. Est eum itaque maiores qui blanditiis architecto.
                                                Eligendi
                                                saepe rem ut. Cumque quia earum eligendi. </p>
                                            <div class="tpdescription__video-wrapper p-relative mt-30 mb-35 w-img">
                                                <img src="https://images.pexels.com/photos/904620/pexels-photo-904620.jpeg"
                                                    class="w-100" alt="">
                                                <div class="tpvideo__video-btn">
                                                    <a class="tpvideo__video-icon popup-video"
                                                        href="https://www.youtube.com/watch?v=rLrV5Tel7zw">
                                                        <i>
                                                            <svg width="20" height="22" viewBox="0 0 20 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15.6499 6.58886L15.651 6.58953C17.8499 7.85553 18.7829 9.42511 18.7829 10.8432C18.7829 12.2613 17.8499 13.8308 15.651 15.0968L15.6499 15.0975L12.0218 17.195L8.3948 19.2919C8.3946 19.292 8.3944 19.2921 8.3942 19.2922C6.19546 20.558 4.36817 20.5794 3.13833 19.8697C1.9087 19.1602 1.01562 17.5694 1.01562 15.0382V10.8432V6.64818C1.01562 4.10132 1.90954 2.51221 3.13721 1.80666C4.36609 1.1004 6.1936 1.12735 8.3942 2.39416C8.3944 2.39428 8.3946 2.3944 8.3948 2.39451L12.0218 4.49135L15.6499 6.58886Z"
                                                                    stroke="white" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                            <h5 class="tpdescription__product-title">Product supreme quality</h5>
                                            <p>Form is an armless modern chair with a minimalistic expression. With a
                                                simple and
                                                contemporary design Form Chair has a soft and welcoming ilhouette and a
                                                distinctly
                                                residential look. The legs appear almost as if they are growing out of
                                                the shell.
                                                This gives the design flexibility and makes it possible to vary the
                                                frame. Unika is
                                                a mouth blown series of small, glass pendant lamps, originally designed
                                                for the
                                                Restaurant Gronbech. Est eum itaque maiores qui blanditiis architecto.
                                                Eligendi
                                                saepe rem ut. Cumque quia earum eligendi. </p>
                                            <p>Duis semper erat mauris, sed egestas purus commodo. Cras imperdiet est in
                                                nunc
                                                tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt.
                                                Suspendisse velit
                                                ex, aliquet vel ornare vel, dignissim a tortor. Ut enim ad minim veniam,
                                                quis
                                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis
                                                aute irure dolor in reprehenderit in voluptate.</p>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane fade" id="nav-information" role="tabpanel"
                                        aria-labelledby="nav-info-tab" tabindex="0">
                                        <div class="tpdescription__content">
                                            <p> {{ $data->description }}. </p>
                                        </div>
                                        <div
                                            class="tpdescription__product-wrapper mt-30 mb-30 d-flex justify-content-between align-items-center">
                                            <div class="tpdescription__product-info">
                                                <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                                <ul class="tpdescription__product-info">
                                               
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold text-danger d-flex justify-content-between">
                                                                <div class="text-title text-danger"><b>Language</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    @if ($data->language == 'Other_Indian')
                                                                        <span>{{ $data->other_indian }}</span>
                                                                    @elseif($data->language == 'Other_Foreign')
                                                                        <span>{{ $data->other_foreign }}</span>
                                                                    @else
                                                                        <span>{{ $data->language }}</span>
                                                                    @endif
                                                                </div>
                                                        </span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold text-danger d-flex justify-content-between">
                                                                <div class="text-title text-danger"><b>Length Breadth</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->length_breadth }}</span>
                                                                </div>
                                                            </span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold  d-flex justify-content-between">
                                                                <div class="text-title text-danger"><b>Width</b>
                                                                    &rlm;

                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->width }}</span>
                                                                </div>
                                                            </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold  d-flex justify-content-between">
                                                                <div class="a-text-bold text-danger"><b>Weight</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->weight }}</span>
                                                                </div>
                                                            </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold  d-flex justify-content-between">
                                                                <div class="a-text-bold text-danger">
                                                                    <b>Type OF Paper</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->quality }}</span>
                                                                </div>
                                                            </span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                                <div class="a-text-bold text-danger">
                                                                <b>Gsm</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                     <span>{{ $data->gsm }}</span>
                                                                </div>
                                                            </span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Paper Finishing </b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->paper_finishing }}</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Multi Color</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->multicolor }}</span>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>Mono Color</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->monocolor }}</span>
                                                                </div>
                                                            </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>Pages</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->pages }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>ISBN</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->isbn }}</span>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    <!-- <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                class="a-text-bold"><b>Isbn13</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </span> <span>{{ $data->isbn13 }}</span>
                                                        </span>
                                                    </li> -->
                                                    <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Price</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->price }}</span>
                                                            </div>
                                                        </div>
                                                        </span>
                                                        </li>
                                                </ul>
                                            
                                            </div>
                                            <!-- <div class="tpdescription__product-thumb">
                                                <img src="assets/img/product/product-single-1.png" class="w-25" alt="">
                                            </div> -->
                                        </div>
                                     
                                    </div>
                                    <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                        aria-labelledby="nav-review-tab" tabindex="0">
                                        <div class="tpreview__wrapper">
                                            <h4 class="tpreview__wrapper-title">1 review for Cheap and delicious fresh
                                                chicken</h4>
                                            <div class="tpreview__comment">
                                                <div class="tpreview__comment-img mr-20">
                                                    <img src="assets/img/testimonial/test-avata-1.png" alt="">
                                                </div>
                                                <div class="tpreview__comment-text">
                                                    <div
                                                        class="tpreview__comment-autor-info d-flex align-items-center justify-content-between">
                                                        <div class="tpreview__comment-author">
                                                            <span>admin</span>
                                                        </div>
                                                        <div class="tpreview__comment-star">
                                                            <i class="icon-star_outline1"></i>
                                                            <i class="icon-star_outline1"></i>
                                                            <i class="icon-star_outline1"></i>
                                                            <i class="icon-star_outline1"></i>
                                                            <i class="icon-star_outline1"></i>
                                                        </div>
                                                    </div>
                                                    <span class="date mb-20">--April 9, 2022: </span>
                                                    <p>very good</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <div class="tpsidebar pb-30">
                            <!-- <div class="tpsidebar__warning mb-30">
                                <ul>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-package"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>Free shipping apply to all <br> orders over $90</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-shield"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>Guaranteed 100% Organic <br> from nature farms</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tpsidebar__warning-item">
                                            <div class="tpsidebar__warning-icon">
                                                <i class="icon-package"></i>
                                            </div>
                                            <div class="tpsidebar__warning-text">
                                                <p>60 days returns if you change <br> your mind</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tpsidebar__banner mb-30">
                                <img src="https://res.cloudinary.com/bloomsbury-atlas/image/upload/w_568,c_scale/jackets/9781526644473.jpg"
                                    alt="">
                            </div> -->
                            <div class="tpsidebar__product">
                                <h4 class="tpsidebar__title mb-15">Recent Products</h4>
                                @php
                                $book = DB::table('books')
                                ->where('negotiation_status', '=', 2)
                                ->where('book_active_status', '=', 1)
                                ->where('id', '!=', $data->id)
                                ->where('category', '=', $data->category)
                                ->orderBy('marks', 'desc')
                                ->limit(5)
                                ->get();
                                @endphp

                                @foreach ($book as $val)
                                <div class="tpsidebar__product-item">
                                    <div class="tpsidebar__product-thumb p-relative">
                                    <a href="/shope/{{$val->id}}">  <img src="{{ asset("Books/full/".$val->full_img) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="tpsidebar__product-content">
                                        <span class="tpproduct__product-category">
                                            <a href="/shope/{{$val->id}}">{{$val->book_title}}</a>
                                        </span>
                                        <h4 class="tpsidebar__product-title">
                                            <a href="/shope/{{$val->id}}">{{$val->category}}</a>
                                        </h4>
                                        <!-- <div class="tpproduct__rating mb-5">
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                        </div> -->
                                        <div class="tpproduct__price">
                                            <span>Rs.{{$val->final_price}}.00</span>
                                            <!-- <del>$19.00</del> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="tpsidebar__product-item">
                                    <div class="tpsidebar__product-thumb p-relative">
                                        <img src="https://res.cloudinary.com/bloomsbury-atlas/image/upload/w_568,c_scale/jackets/9781526644473.jpg"
                                            alt="">
                                        <div class="tpsidebar__info bage">
                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                        </div>
                                    </div>
                                    <div class="tpsidebar__product-content">
                                        <span class="tpproduct__product-category">
                                            <a href="shope.php">Fresh Fruits</a>
                                        </span>
                                        <h4 class="tpsidebar__product-title">
                                            <a href="shope.php">Fresh Mangosteen 100% Organic From VietNamese</a>
                                        </h4>
                                        <div class="tpproduct__rating mb-5">
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                        </div>
                                        <div class="tpproduct__price">
                                            <span>$56.00</span>
                                            <del>$19.00</del>
                                        </div>
                                    </div>
                                </div>
                                <div class="tpsidebar__product-item">
                                    <div class="tpsidebar__product-thumb p-relative">
                                        <img src="https://res.cloudinary.com/bloomsbury-atlas/image/upload/w_568,c_scale/jackets/9781526644473.jpg"
                                            alt="">
                                        <div class="tpsidebar__info bage">
                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                        </div>
                                    </div>
                                    <div class="tpsidebar__product-content">
                                        <span class="tpproduct__product-category">
                                            <a href="shope.php">Fresh Fruits</a>
                                        </span>
                                        <h4 class="tpsidebar__product-title">
                                            <a href="shop-details-grid.html">Fresh Mangosteen 100% Organic From
                                                VietNamese</a>
                                        </h4>
                                        <div class="tpproduct__rating mb-5">
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                            <a href="#"><i class="icon-star_outline1"></i></a>
                                        </div>
                                        <div class="tpproduct__price">
                                            <span>$56.00</span>
                                            <del>$19.00</del>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Add your modal header content here -->
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa fa-chevron-left"></i>Back to</button>
                        <!-- <h5 class="modal-title" id="modalTitleId">THREE THOUSAND STITCHES: ORDINARY PEOPLE, EXTRAORDINARY
                        LIVES</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div id="viewer" class="spreads"></div>

                    </div>
                    <div class="modal-footer" style="display: flex; justify-content: space-between;">
                        <div>
                            <a id="prev" href="#prev" class="arrow">Previous</a>
                            <a id="next" href="#next" class="arrow">Next</a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" id="saveButton" data-dataid="{{ $data->id }}"
                            data-revid="{{$data->revid }}" class="btn btn-primary">Review</button> -->
                        </div>


                    </div>
                </div>
            </div>

            <!-- Your Content End Here -->
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <!-- <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"            data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">THREE THOUSAND STITCHES: ORDINARY PEOPLE,
                            EXTRAORDINARY
                            LIVES</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="chcp_font_size" class="input-group">
                                    <span class="input-group-btn">
                                        <button id="btn-decrease" class="btn btn-default" type="button"><i
                                                class="fa fa-font" aria-hidden="true"></i>-</button>
                                        <button id="btn-orig" class="btn btn-default" type="button"><i
                                                class="fa fa-font" aria-hidden="true"></i></button>
                                        <button id="btn-increase" class="btn btn-default" type="button"><i
                                                class="fa fa-font" aria-hidden="true"></i>+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <ul class="nav nav-tabs flex-column" id="myTab">
                                    <li class="nav-item">
                                        <a href="#home" class="nav-link active" data-bs-toggle="tab">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" class="nav-link" data-bs-toggle="tab">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#messages" class="nav-link" data-bs-toggle="tab">Messages</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home">
                                        <h4 class="mt-2">Home tab content</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content
                                            of a page when looking at its layout. The point of using Lorem Ipsum is that
                                            it has a
                                            more-or-less normal distribution of letters, as opposed to using 'Content
                                            here, content
                                            here', making it look like readable English. Many desktop publishing
                                            packages and web
                                            page editors now use Lorem Ipsum as their default model text, and a search
                                            for 'lorem
                                            ipsum' will uncover many web sites still in their infancy. Various versions
                                            have
                                            evolved over the years, sometimes by accident, sometimes on purpose
                                            (injected humour
                                            and the like).</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown
                                            printer took a galley of type and scrambled it to make a type specimen book.
                                            It has
                                            survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently with
                                            desktop
                                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <h4 class="mt-2">Profile tab content</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content
                                            of a page when looking at its layout. The point of using Lorem Ipsum is that
                                            it has a
                                            more-or-less normal distribution of letters, as opposed to using 'Content
                                            here, content
                                            here', making it look like readable English. Many desktop publishing
                                            packages and web
                                            page editors now use Lorem Ipsum as their default model text, and a search
                                            for 'lorem
                                            ipsum' will uncover many web sites still in their infancy. Various versions
                                            have
                                            evolved over the years, sometimes by accident, sometimes on purpose
                                            (injected humour
                                            and the like).</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown
                                            printer took a galley of type and scrambled it to make a type specimen book.
                                            It has
                                            survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently with
                                            desktop
                                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="messages">
                                        <h4 class="mt-2">Messages tab content</h4>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content
                                            of a page when looking at its layout. The point of using Lorem Ipsum is that
                                            it has a
                                            more-or-less normal distribution of letters, as opposed to using 'Content
                                            here, content
                                            here', making it look like readable English. Many desktop publishing
                                            packages and web
                                            page editors now use Lorem Ipsum as their default model text, and a search
                                            for 'lorem
                                            ipsum' will uncover many web sites still in their infancy. Various versions
                                            have
                                            evolved over the years, sometimes by accident, sometimes on purpose
                                            (injected humour
                                            and the like).</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum
                                            has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown
                                            printer took a galley of type and scrambled it to make a type specimen book.
                                            It has
                                            survived not only five centuries, but also the leap into electronic
                                            typesetting,
                                            remaining essentially unchanged. It was popularised in the 1960s with the
                                            release of
                                            Letraset sheets containing Lorem Ipsum passages, and more recently with
                                            desktop
                                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
   include "plugin/js.php";
   ?>
    <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://unpkg.com/epubjs@0.3.93/dist/epub.legacy.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
    <script>
    function showMore(link) {
        var shortNotes = link.parentNode.querySelector('.short_notes');
        var longNotes = link.parentNode.querySelector('.long_notes');
        var dots = link.parentNode.querySelector('.dots');

        if (shortNotes.style.display === "none") {
            shortNotes.style.display = "inline";
            longNotes.style.display = "none";
            dots.style.display = "inline";
            link.innerHTML = "See more";
        } else {
            shortNotes.style.display = "none";
            longNotes.style.display = "inline";
            dots.style.display = "none";
            link.innerHTML = "See less";
        }
    }
    </script>

    <script>
    var params = URLSearchParams && new URLSearchParams(document.location.search.substring(1));
    var url = params && params.get("url") && decodeURIComponent(params.get("url"));
    var currentSectionIndex = (params && params.get("loc")) ? params.get("loc") : undefined;

    var openModalBtn = document.getElementById('openModalBtn');
    var epubModal = document.getElementById('modalId');

    openModalBtn.addEventListener('click', function() {
        epubModal.style.display = 'flex';
        var data = @json($data -> sample_file);
        var data1 = @json($data -> sample_pdf);
        var data2 = @json($data -> sample_epub);

        var bookSource = data2;

        var book = ePub("{{ asset('Books/sampleepub') }}/" + bookSource);
        // Load the opf
        // var book = ePub("{{ asset('Books/sampleepub/Around the World in 28 Languages.epub') }}" || "https://s3.amazonaws.com/moby-dick/moby-dick.epub");
        var rendition = book.renderTo("viewer", {
            width: "100%",
            height: 600,
            spread: "always"
        });

        rendition.display(currentSectionIndex);

        book.ready.then(function() {
            var next = document.getElementById("next");

            next.addEventListener("click", function(e) {
                book.package.metadata.direction === "rtl" ? rendition.prev() : rendition
                    .next();
                e.preventDefault();
            }, false);

            var prev = document.getElementById("prev");
            prev.addEventListener("click", function(e) {
                book.package.metadata.direction === "rtl" ? rendition.next() : rendition
                    .prev();
                e.preventDefault();
            }, false);

            var keyListener = function(e) {
                // Left Key
                if ((e.keyCode || e.which) == 37) {
                    book.package.metadata.direction === "rtl" ? rendition.next() : rendition
                        .prev();
                }

                // Right Key
                if ((e.keyCode || e.which) == 39) {
                    book.package.metadata.direction === "rtl" ? rendition.prev() : rendition
                        .next();
                }
            };

            rendition.on("keyup", keyListener);
            document.addEventListener("keyup", keyListener, false);
        });

        var title = document.getElementById("title");

        rendition.on("rendered", function(section) {
            var current = book.navigation && book.navigation.get(section.href);

            if (current) {
                var $select = document.getElementById("toc");
                var $selected = $select.querySelector("option[selected]");
                if ($selected) {
                    $selected.removeAttribute("selected");
                }

                var $options = $select.querySelectorAll("option");
                for (var i = 0; i < $options.length; ++i) {
                    let selected = $options[i].getAttribute("ref") === current.href;
                    if (selected) {
                        $options[i].setAttribute("selected", "");
                    }
                }
            }
        });

        rendition.on("relocated", function(location) {
            var next = book.package.metadata.direction === "rtl" ? document.getElementById("prev") :
                document.getElementById("next");
            var prev = book.package.metadata.direction === "rtl" ? document.getElementById("next") :
                document.getElementById("prev");

            if (location.atEnd) {
                next.style.visibility = "hidden";
            } else {
                next.style.visibility = "visible";
            }

            if (location.atStart) {
                prev.style.visibility = "hidden";
            } else {
                prev.style.visibility = "visible";
            }
        });

        rendition.on("layout", function(layout) {
            let viewer = document.getElementById("viewer");

            if (layout.spread) {
                viewer.classList.remove('single');
            } else {
                viewer.classList.add('single');
            }
        });

        window.addEventListener("unload", function() {
            console.log("unloading");
            this.book.destroy();
        });

        book.loaded.navigation.then(function(toc) {
            var $select = document.getElementById("toc"),
                docfrag = document.createDocumentFragment();

            toc.forEach(function(chapter) {
                var option = document.createElement("option");
                option.textContent = chapter.label;
                option.setAttribute("ref", chapter.href);

                docfrag.appendChild(option);
            });

            $select.appendChild(docfrag);

            $select.onchange = function() {
                var index = $select.selectedIndex,
                    url = $select.options[index].getAttribute("ref");
                rendition.display(url);
                return false;
            };
        });
    });

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function(e) {
        if (e.target === epubModal) {
            epubModal.style.display = 'none';
        }
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
    var openModalBtn = document.getElementById('openModalBtn');
    var pdfModal = document.getElementById('modalId');

    openModalBtn.addEventListener('click', function() {
        pdfModal.style.display = 'flex';
        var data1 = @json($data -> sample_pdf); // Assuming $data->sample_pdf contains the PDF file name
        var pdfUrl = "{{ asset('Books/samplepdf') }}/" + data1; // Adjust the path as necessary

        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js'; // Adjust the path to the PDF.js worker script

        var loadingTask = pdfjsLib.getDocument(pdfUrl);
        loadingTask.promise.then(function(pdf) {
            var totalPages = pdf.numPages;
            var currentPage = 1;

            var pdfViewer = document.getElementById('viewer');

            function renderPage(pageNumber) {
                pdf.getPage(pageNumber).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({
                        scale: scale
                    });

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function() {
                        pdfViewer.innerHTML = ''; // Clear previous content
                        pdfViewer.appendChild(canvas);
                    });
                });
            }

            renderPage(currentPage);

            var nextBtn = document.getElementById('next');
            var prevBtn = document.getElementById('prev');

            nextBtn.addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderPage(currentPage);
                }
            });

            prevBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderPage(currentPage);
                }
            });
        });
    });

    window.addEventListener('click', function(e) {
        if (e.target === pdfModal) {
            pdfModal.style.display = 'none';
        }
    });
    </script>
    <script>
    var $affectedElements = $("p, h1, h2, h3, h4, h5, h6"); // Can be extended, ex. $("div, p, span.someClass")

    // Storing the original size in a data attribute so size can be reset
    $affectedElements.each(function() {
        var $this = $(this);
        $this.data("orig-size", $this.css("font-size"));
    });

    $("#btn-increase").click(function() {
        changeFontSize(1);
    })

    $("#btn-decrease").click(function() {
        changeFontSize(-1);
    })

    $("#btn-orig").click(function() {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", $this.data("orig-size"));
        });
    })

    function changeFontSize(direction) {
        $affectedElements.each(function() {
            var $this = $(this);
            $this.css("font-size", parseInt($this.css("font-size")) + direction);
        });
    }
    </script>
</body>

</html>

<style>
.carousel-indicators button.thumbnail {
    width: 100%;
}

.carousel-indicators button.thumbnail:not(.active) {
    opacity: 0.7;
}

.carousel-indicators {
    position: static;
}

@media screen and (min-width: 992px) {
    .carousel {
        max-width: 100%;
        margin: 0 auto;
    }
}

.avatar.avatar-md {
    height: 100px !important;
    width: 100px !important;
}
</style>

<style>
/* Style for the 'previous' button */
#prev {
    display: inline-block;
    padding: 10px;
    margin-right: 10px;
    color: white;
    background-color: blue;
    /* Change to your desired color for 'previous' button */
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

#prev:hover {
    background-color: darkblue;
    /* Change to your desired hover color for 'previous' button */
}

/* Style for the 'next' button */
#next {
    display: inline-block;
    padding: 10px;
    color: white;
    background-color: green;
    /* Change to your desired color for 'next' button */
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

#next:hover {
    background-color: darkgreen;
    /* Change to your desired hover color for 'next' button */
}
</style>