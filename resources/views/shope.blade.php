<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'plugin/css.php'; ?>

    {{-- @include(asset('pl')) --}}
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
        @include('header.top_header')
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->

        @include('header.middile_navigation')
        @include('header.navigation')
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->

        @include('header.mobile_navigation')
    </header>
    <!-- header-area-end -->

    <main>
        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <span class="tp-breadcrumb__active"><a href="/librarian/index">Dashboard</a></span>
                                <span class="dvdr">/</span>
                                <a href="/product"><span>Website Home</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area-start -->
        <section class="shopdetails-area grey-bg pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12">
                        <div class="tpdetails__area mr-60 pb-30">
                            <div class="tpdetails__product mb-30">
                                <div class="tpdetails__title-box">
                                    <h3 class="tpdetails__title">Book Title: {{$data->book_title}}
                                    </h3>
                                    <ul class="tpdetails__brand">
                                        <li> Category: <a href="#">{{$data->category}}</a> </li>
                                        <li>
                                        Language: <span> {{$data->language}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tpdetails__box">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tpproduct-details__nab">
                                                <div class="tab-content" id="nav-tabContents">
                                                    <div class="tab-pane fade show active w-img" id="nav-home"
                                                        role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                        <img src="{{ asset('Books/front/' . $data->front_img) }}"
                                                            alt="front Image">
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-profile" role="tabpanel"
                                                        aria-labelledby="nav-profile-tab" tabindex="0">
                                                        <img src="{{ asset('Books/back/' . $data->back_img) }}"
                                                            alt="back Image">
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-contact" role="tabpanel"
                                                        aria-labelledby="nav-contact-tab" tabindex="0">
                                                        <img src="{{ asset('Books/full/' . $data->full_img) }}"
                                                            alt="full Image">
                                                    </div>
                                                </div>
                                                <nav>
                                                    <div class="nav nav-tabs justify-content-center" id="nav-tab"
                                                        role="tablist">
                                                        <button class="nav-link active" id="nav-home-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-home"
                                                            type="button" role="tab" aria-controls="nav-home"
                                                            aria-selected="true">
                                                            <img src="{{ asset('Books/front/' . $data->front_img) }}"
                                                                alt="front Image">
                                                        </button>
                                                        <button class="nav-link" id="nav-profile-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-profile"
                                                            type="button" role="tab" aria-controls="nav-profile"
                                                            aria-selected="false">
                                                            <img src="{{ asset('Books/back/' . $data->back_img) }}"
                                                                alt="back Image">
                                                        </button>
                                                        <button class="nav-link" id="nav-contact-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-contact"
                                                            type="button" role="tab" aria-controls="nav-contact"
                                                            aria-selected="false">
                                                            <img src="{{ asset('Books/full/' . $data->full_img) }}"
                                                                alt="full Image">
                                                        </button>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="product__details-price">₹ {{$data->final_price}}</h5>
                                                    <ul class="product__details-info-list">
                                                    <li> Book Title : {{$data->book_title}}</li>
                                                              <li>Language : {{$data->language}}</li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <div
                                                        class="product__details-quantity d-flex align-items-center mb-15">
                                                        <!-- <b>Qty:</b>
                                                        <div class="product__details-count mr-10">
                                                            <span class="cart-minus"><i
                                                                    class="far fa-minus"></i></span>
                                                            <input class="tp-cart-input" type="text"
                                                                value="{{$data->quantity}}" id="quantity_{{$data->id}}">
                                                            <span class="cart-plus"><i class="far fa-plus"></i></span>
                                                        </div> -->
                                                        <div class="product__details-btn">
                                                        <button class="tp-btn-2 mb-5 Add-to-cart" data-id="{{$data->id}}">Add to cart</button>
                                                        </div>
                                                    </div>
                                                    <ul class="product__details-check">
                                                        {{-- <li>
                                                            <a href="#"><i class="icon-heart icons"></i> add to
                                                                wishlist</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="icon-layers"></i> Add to
                                                                Compare</a>
                                                        </li> --}}
                                                        <!-- <li>
                                                            <a href="#"><i class="icon-share-2"></i> Share</a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                                <div class="product__details-stock mb-25">
                                                    <ul>
                                                       
                                                        <li>Category : <span>{{$data->category}}</span></li>
                                                        <li>Subject : <span>{{$data->subject}}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-payment text-center">
                                                    <!-- <img src="https://cdn.shopify.com/s/files/1/0280/8365/0642/files/Add_a_heading_480x480.png"
                                                        alt=""> -->
                                                    <button class="btn btn-primary">
                                                        <span class="btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#modalId"><i class="fa fa-book"></i> Read Sample PDF</span></button>

                                                    <!-- Modal Body -->
                                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                    <div class="modal fade" id="modalId" tabindex="-1"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        role="dialog" aria-labelledby="modalTitleId"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalTitleId">
                                                                        Read Sample Pdf
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if($data->sample_pdf == null)
                                                                    <iframe
                                                                    src=""
                                                                        style="width:100%; height:1000px;"
                                                                        frameborder="0"></iframe>
                                                                    @else
                                                                     @if(file_exists(public_path('Magazine/pdf/' . $data->sample_pdf)))
                                                                            <iframe src="{{ asset('Magazine/pdf/' . $data->sample_pdf) }}"
                                                                                    style="width:100%; height:1000px;" frameborder="0"></iframe>
                                                                     @else
                                                                                <iframe
                                                                                src=""
                                                                                    style="width:100%; height:1000px;"
                                                                                    frameborder="0"></iframe>
                                                                     @endif
                                                                  
                                                                    @endif
                                            

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
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
                            <h4 class="tpsidebar__title mb-15">Recent Products</h4>
                        @php
                     $Books = DB::table('books')
                   ->where('id', '!=', $data->id)
                   ->where('category', $data->category)
                   ->orderBy('created_at', 'asc')
                   ->take(5) 
                   ->get();
                    @endphp

                        @foreach( $Books as $val)
                            <div class="tpsidebar__product mt-3">
                                <div class="tpsidebar__product-item">
                                    <div class="tpsidebar__product-thumb p-relative">
                                    <a href="/shope-book/{{$val->id}}">
                                        <img src="{{ asset('Books/front/' . $val->front_img) }}"
                                            alt="No Image">
                                    </div>
                                    <div class="tpsidebar__product-content">
                                        <span class="tpproduct__product-category">
                                            <a href="/shope-book/{{$val->id}}">{{$val->category}}</a>,
                                            <a href="/shope-book/{{$val->id}}">{{$val->language}}</a>,
                                    
                                        </span>
                                        <h4 class="tpsidebar__product-title">
                                            <a href="/shope-book/{{$val->id}}">Book Title : {{$val->book_title}}</a>
                                        </h4>
                                        <div class="tpproduct__price">
                                        <span>₹{{$val->final_price}}</span>

                                            <!-- <del>₹19.00</del> -->
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- product-area-start -->
        <section class="product-area whight-product pt-75 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="tpdescription__product-title mb-20">Related Book</h5>
                    </div>
                </div>
                <div class="tpproduct__arrow double-product p-relative">
                    <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                        <div class="swiper-wrapper">
                        @php
                           $Books = DB::table('Books')
                           ->where('id','!=', $data->id)
                           ->where('category', $data->category)
                           ->orderBy('created_at', 'Asc')
                            ->get();
                       @endphp
                       @foreach( $Books as $val)
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="/shope-book/{{$val->id}}"><img
                                                src="{{ asset('Books/front/' . $val->front_img) }}"
                                                alt="No Image"></a>
                                        <a class="tpproduct__thumb-img" href="/shope-book/{{$val->id}}"><img
                                                src="{{ asset('Books/back/' . $val->back_img) }}"
                                                alt="No Image"></a>
                                        <div class="tpproduct__shopping">
                                            {{-- <a class="tpproduct__shopping-wishlist" href="#"><i
                                                    class="icon-heart icons"></i></a> --}}
                                            <a class="tpproduct__shopping-wishlist" href="/shope-book/{{$val->id}}"><i
                                                    class="icon-layers"></i></a>
                                             <a class="tpproduct__shopping-cart" href="/shope-book/{{$val->id}}"><i
                                                    class="icon-eye"></i></a> 
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <span class="tpproduct__content-weight">
                                        <a href="#">{{$val->category}}</a>,
                                       <a href="#">{{$val->language}}</a>
                                        </span>
                                        
                                        <h4 class="tpproduct__title">
                                            <a href="#">Book Title: {{$val->book_title}}</a>
                                        </h4>
                                        <div class="tpproduct__price d-flex justify-content-between">
                                            <span>₹{{$val->final_price}}</span>
                                            <button class="tp-btn-2 Add-to-cart1" data-id1="{{$val->id}}"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    {{-- <div class="tpproduct__hover-text">
                                        <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                        <button class="tp-btn-2 Add-to-cart1" data-id1="{{$val->id}}">Add to cart</button>

                                  

                                        </div>
                                        <div class="tpproduct__descrip">
                                            <ul>
                                            <li>Category: {{$val->category}}</li>
                                            <li>Subject: {{$val->subject}}</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                         @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-area-end -->

    </main>

   
    @include('footer.footer')

    
    <?php
    include 'plugin/js.php';
    ?>
<script>
$(document).ready(function(){
    $('.Add-to-cart1').click(function(){
        $('.Add-to-cart1').prop('disabled',true);
        var id = $(this).data('id1');
        $.ajax({
            url: '/add-to-book-cart', 
            method: 'POST', 
            data: {
             '_token': '{{ csrf_token() }}',
            'id': id
               },
            success: function(response) {
                if(response.bookcartcount){
                    $('#bookcartcount').text(response.bookcartcount);

                }
                if(response.success){
                    $('.Add-to-cart1').prop('disabled',false);
                    toastr.success(response.success, { timeout: 2000 });

                }
                else{
                    $('.Add-to-cart1').prop('disabled',false);
                    toastr.error(response.error, { timeout: 2000 });

                }
               
            },
            error: function(xhr, status, error) {
                $('.Add-to-cart1').prop('disabled',false);
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>


<script>
$(document).ready(function(){
    $('.Add-to-cart').click(function(){
        $('.Add-to-cart').prop('disabled',true);
        var id = $(this).data('id');
        $.ajax({
            url: '/add-to-book-cart', 
            method: 'POST', 
            data: {
             '_token': '{{ csrf_token() }}',
            'id': id
               },
            success: function(response) {
                if(response.bookcartcount){
                    $('#bookcartcount').text(response.bookcartcount);

                }
                if(response.success){
                    $('.Add-to-cart').prop('disabled',false);
                    toastr.success(response.success, { timeout: 2000 });

                }
                else{
                    $('.Add-to-cart').prop('disabled',false);
                    toastr.error(response.error, { timeout: 2000 });

                }
               
            },
            error: function(xhr, status, error) {
                $('.Add-to-cart').prop('disabled',false);
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>
</body>

<style>
    .tpproduct__thumb {
        padding: 20px 20px;
        overflow: hidden;
        border-radius: 10px;
        min-height: 270px;
        max-height: 270px;
    }

    .tplist__product-img {
        height: 200px;
        width: 100px;
    }

    .tplist__product-img-one img {
        height: 200px;
        width: 100px;
    }

    .tplist__product-img-two img {
        height: 200px;
        width: 100px;
    }
</style>

</html>
