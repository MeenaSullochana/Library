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
img.avatar.avatar-md.rounded-circle {
            height: 75px !important;
            width: 75px !important;
        }
</style>
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
                                                            <button class="tp-btn-2 mb-5 Add-to-cart"
                                                                data-id="{{$data->id}}">Add to cart</button>
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
                                                <div class="col-6 pt-2 ps-2 pe-2">
                                                    <!-- <img src="https://cdn.shopify.com/s/files/1/0280/8365/0642/files/Add_a_heading_480x480.png"
                                                        alt=""> -->
                                                    <button type="button" class="btn btn-outline-primary w-100"
                                                        data-bs-toggle="modal" id="openModalBtn"
                                                        data-bs-target="#modalId">
                                                        Read Sample
                                                    </button>

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
                                        <!-- <div class="tpdescription__content">
                                            <p>{{strip_tags($data->productdescription)}}. </p>
                                        </div>
                                        <div class="tpdescription__video">
                                            <h2 class="tpdescription__content">Author Details</h2>
                                            <h5 >Author name   </h5> &rlm;
                                                                
                                                                &lrm;<span> {{$data->author_name}} </span>
                                                                <h5 >Author Description   </h5> &rlm;
                                                                
                                                                &lrm;<span> {{strip_tags($data->author_description)}} </span>
                                           
                                        </div> -->
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
    <img src="{{ asset('Books/banner/' . json_decode($data->banner_img)[0]) }}" class="w-100" alt="">
</div>

                                        </div> -->
                                        <div class="tpdescription__video">
                                            <h5 class="tpdescription__product-title">About the author</h5>


                                            <div class="col-12">
                                                <div class="d-flex mb-5">
                                                    <div class="auth_details">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-auto mt-2 text-center">
                                                                @if ($data->author_img != null)
                                                                <img src="{{ asset('Books/author_img/' . $data->author_img) }}"
                                                                    class="avatar avatar-md rounded-circle"
                                                                    alt="{{ $data->author_name }}">
                                                                @else
                                                                <img src="{{ asset('distributor/images/default.png') }}"
                                                                    class="avatar avatar-md rounded-circle"
                                                                    alt="{{ $data->author_name }}">
                                                                @endif
                                                            </div>

                                                            <div class="col-md-auto">

                                                                <div class="author_description">
                                                                    <h3 class="mb-0 ms-2">{{ $data->author_name }}</h3>
                                                                    <p style="text-indent:35px" class="author-info">
                                                                        {!! $data->author_description !!} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="tpdescription__product-title">Product Description</h5>
                                            <p>{{strip_tags($data->productdescription)}}. </p>
                                        </div>
                                        <div class="row">
                                            <!-- <h5 class="tpdescription__product-title">Book Baner Image</h5> -->


                                            @foreach (json_decode($data->banner_img) as $val)
                                            <div class="row container ms-3 me-3 mt-3">

                                                <div class="col-8">
                                                    <img class="center w-100" src="{{ asset('Books/banner/' . $val) }}"
                                                        alt="img" style="">
                                                </div>


                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-information" role="tabpanel"
                                        aria-labelledby="nav-info-tab" tabindex="0">
                                        <div class="tpdescription__content">
                                            <p> {{ $data->description }}. </p>
                                        </div>
                                        <div class="row mt-2">
                                            
                                        <h3 class="card-title h3 mb-3">Product details</h3>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px"> Name of Publisher</b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->nameOfPublisher }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Language </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        @if ($data->language == 'Other_Indian')
                                                                        <span>{{ $data->other_indian }}</span>
                                                                        @elseif($data->language == 'Other_Foreign')
                                                                        <span>{{ $data->other_foreign }}</span>
                                                                        @else
                                                                        <span>{{ $data->language }}</span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Size</b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->size }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Length Breadth </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->length_breadth }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Width </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->width }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Weight </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->weight }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">Type of Paper </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->quality }}</span>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <div class="text-title text-danger">
                                                                        <b style="font-size:14px">GSM </b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-6 mt-2">
                                                                    <span style="font-size:14px">:
                                                                        {{ $data->gsm }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <div class="card mt-5">
                                                    <div class="card-body">

                                                        <div class="row">

                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Edition Number </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span style="font-size:14px">:
                                                                    {{ $data->edition_number }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Paper Finishing </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span style="font-size:14px">:
                                                                    {{ $data->paper_finishing }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Multi Color </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span>: {{ $data->multicolor }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Mono Color </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span>: {{ $data->monocolor }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Pages </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span>: {{ $data->pages }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">ISBN </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span>: {{ $data->isbn }}</span>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <div class="text-title text-danger">
                                                                    <b style="font-size:14px">Price </b>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6 mt-2">
                                                                <span>: {{ $data->price }}</span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                                            <img src="{{ asset('Books/front/' . $val->front_img) }}" alt="No Image">
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
                                                src="{{ asset('Books/front/' . $val->front_img) }}" alt="No Image"></a>
                                        <a class="tpproduct__thumb-img" href="/shope-book/{{$val->id}}"><img
                                                src="{{ asset('Books/back/' . $val->back_img) }}" alt="No Image"></a>
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
                                            <button class="tp-btn-2 Add-to-cart1" data-id1="{{$val->id}}"><i
                                                    class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    {{-- <div class="tpproduct__hover-text">
                                        <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                        <button class="tp-btn-2 Add-to-cart1" data-id1="{{$val->id}}">Add to
                                    cart</button>



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
    </main>


    @include('footer.footer')


    <?php
    include 'plugin/js.php';
    ?>
    <script>
    $(document).ready(function() {
        $('.Add-to-cart1').click(function() {
            $('.Add-to-cart1').prop('disabled', true);
            var id = $(this).data('id1');
            $.ajax({
                url: '/add-to-book-cart',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {
                    if (response.bookcartcount) {
                        $('#bookcartcount').text(response.bookcartcount);

                    }
                    if (response.success) {
                        $('.Add-to-cart1').prop('disabled', false);
                        toastr.success(response.success, {
                            timeout: 2000
                        });

                    } else {
                        $('.Add-to-cart1').prop('disabled', false);
                        toastr.error(response.error, {
                            timeout: 2000
                        });

                    }

                },
                error: function(xhr, status, error) {
                    $('.Add-to-cart1').prop('disabled', false);
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        $('.Add-to-cart').click(function() {
            $('.Add-to-cart').prop('disabled', true);
            var id = $(this).data('id');
            $.ajax({
                url: '/add-to-book-cart',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {
                    if (response.bookcartcount) {
                        $('#bookcartcount').text(response.bookcartcount);

                    }
                    if (response.success) {
                        $('.Add-to-cart').prop('disabled', false);
                        toastr.success(response.success, {
                            timeout: 2000
                        });

                    } else {
                        $('.Add-to-cart').prop('disabled', false);
                        toastr.error(response.error, {
                            timeout: 2000
                        });

                    }

                },
                error: function(xhr, status, error) {
                    $('.Add-to-cart').prop('disabled', false);
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
    });
    </script>


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