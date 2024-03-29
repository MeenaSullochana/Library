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
.category__item {
    text-align: center;
    background-color: var(--tp-common-white);
    border-radius: 10px;
    padding: 30px 10px 25px 10px;
    min-height: 234px;
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
.tpproduct__hover-text{
    z-index: 1;
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
        <!-- Your Content Use Here -->
        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/"> Home </a></span>
                                <span class="dvdr">/</span>
                                <a href="/librarian/index">Dashborad</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        @php
        $categories = DB::table('magazine_categories')
        ->where('status', '=', 1)
        ->where('language', '=', 'Tamil')
        ->orderBy('created_at', 'Asc')
        ->get();
        $categories1 = DB::table('magazine_categories')
        ->where('status', '=', 1)
        ->where('language', '=', 'English')
        ->orderBy('created_at', 'Asc')
        ->get();
     
        $periodicities = DB::table('magazine_periodicities')
        ->where('status', '=', 1)
        ->orderBy('created_at', 'Asc')
        ->get();
        @endphp
        <!-- shop-area-start -->
        <section class="shop-area-start grey-bg pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-12 col-md-12">
                        <div class="tpshop__leftbar">
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">Product Tamil Categories</h4>
                                @foreach($categories as $val)
                                <div class="form-check">
                                    <input class="form-check-input category-checkbox" type="checkbox" value=""
                                        data-id="{{ $val->name }}" id="flexCheckDefault{{ $val->name }}">
                                    <label class="form-check-label" for="flexCheckDefault{{ $val->name }}">
                                        {{ $val->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">Product English Categories</h4>
                                @foreach($categories1 as $val)
                                <div class="form-check">
                                    <input class="form-check-input category-checkbox" type="checkbox" value=""
                                        data-id="{{ $val->name }}" id="flexCheckDefault{{ $val->name }}">
                                    <label class="form-check-label" for="flexCheckDefault{{ $val->name }}">
                                        {{ $val->name }}
                                    </label>
                                </div>
                                @endforeach


                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                <!-- <h4 class="tpshop__widget-title mb-20">FILTER BY PRICE</h4>
                                <div class="productsidebar">
                                    <div class="productsidebar__head">
                                    </div>
                                    <div class="productsidebar__range">
                                        <div id="slider-range"></div>
                                        <div class="price-filter mt-10"><input type="text" id="amount">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="productsidebar__btn mt-15 mb-15">
                                    <a href="#" id="filterButton">FILTER</a>
                                </div>
                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">FILTER BY PERIODICITIE</h4>
                                
                                @foreach($periodicities as $val)
                                <div class="form-check">
                                    <input class="form-check-input category-checkbox1" type="checkbox" value=""   
                                      data-id11="{{ $val->name }}" id="flexCheckDefault11{{ $val->name }}">
                                    <label class="form-check-label" for="flexCheckDefault11{{ $val->name }}">
                                        {{$val->name}}
                                    </label>
                                </div>
                                @endforeach
                       
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="tpshop__top ml-60">
                            <div class="tpshop__category">
                                <div class="swiper-container inner-category-active">
                                    <div class="swiper-wrapper">
                                        @foreach($categories as $val)
                                        <div class="swiper-slide">
                                            <div class="category__item mb-30">
                                                <div class="category__thumb fix mb-15">
                                                    <a href="#"><img
                                                            src="https://static.vecteezy.com/system/resources/previews/004/540/871/original/vintage-slogan-typography-books-and-coffee-for-t-shirt-design-vector.jpg"
                                                            alt="category-thumb"></a>
                                                </div>
                                                <div class="category__content">
                                                    <h5 class="category__title"><a
                                                            href="shop-details-3.html">{{$val->name}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($categories1 as $val)
                                        <div class="swiper-slide">
                                            <div class="category__item mb-30">
                                                <div class="category__thumb fix mb-15">
                                                    <a href="#"><img
                                                            src="https://static.vecteezy.com/system/resources/previews/004/540/871/original/vintage-slogan-typography-books-and-coffee-for-t-shirt-design-vector.jpg"
                                                            alt="category-thumb"></a>
                                                </div>
                                                <div class="category__content">
                                                    <h5 class="category__title"><a
                                                            href="shop-details-3.html">{{$val->name}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="product__filter-content mb-30">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="product__item-count">
                                            <span>Megazine Products</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div
                                            class="tpproductnav tpnavbar product-filter-nav d-flex align-items-center justify-content-center">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-all-tab"
                                                        data-bs-toggle="tab" data-bs-target="#nav-all" type="button"
                                                        role="tab" aria-controls="nav-all" aria-selected="true">
                                                        <i>
                                                            <svg width="22" height="16" viewBox="0 0 22 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 4C9.10457 4 10 3.10457 10 2C10 0.89543 9.10457 0 8 0C6.89543 0 6 0.89543 6 2C6 3.10457 6.89543 4 8 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 16C9.10457 16 10 15.1046 10 14C10 12.8954 9.10457 12 8 12C6.89543 12 6 12.8954 6 14C6 15.1046 6.89543 16 8 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 4C15.1046 4 16 3.10457 16 2C16 0.89543 15.1046 0 14 0C12.8954 0 12 0.89543 12 2C12 3.10457 12.8954 4 14 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 10C15.1046 10 16 9.10457 16 8C16 6.89543 15.1046 6 14 6C12.8954 6 12 6.89543 12 8C12 9.10457 12.8954 10 14 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 4C21.1046 4 22 3.10457 22 2C22 0.89543 21.1046 0 20 0C18.8954 0 18 0.89543 18 2C18 3.10457 18.8954 4 20 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 10C21.1046 10 22 9.10457 22 8C22 6.89543 21.1046 6 20 6C18.8954 6 18 6.89543 18 8C18 9.10457 18.8954 10 20 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 16C21.1046 16 22 15.1046 22 14C22 12.8954 21.1046 12 20 12C18.8954 12 18 12.8954 18 14C18 15.1046 18.8954 16 20 16Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </i>
                                                    </button>
                                                    <button class="nav-link " id="nav-popular-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-popular" type="button" role="tab"
                                                        aria-controls="nav-popular" aria-selected="false">
                                                        <i>
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 4C9.10457 4 10 3.10457 10 2C10 0.89543 9.10457 0 8 0C6.89543 0 6 0.89543 6 2C6 3.10457 6.89543 4 8 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M8 16C9.10457 16 10 15.1046 10 14C10 12.8954 9.10457 12 8 12C6.89543 12 6 12.8954 6 14C6 15.1046 6.89543 16 8 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 4C15.1046 4 16 3.10457 16 2C16 0.89543 15.1046 0 14 0C12.8954 0 12 0.89543 12 2C12 3.10457 12.8954 4 14 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 10C15.1046 10 16 9.10457 16 8C16 6.89543 15.1046 6 14 6C12.8954 6 12 6.89543 12 8C12 9.10457 12.8954 10 14 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </i>
                                                    </button>
                                                    <button class="nav-link" id="nav-product-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-product" type="button" role="tab"
                                                        aria-controls="nav-product" aria-selected="false">
                                                        <i>
                                                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 2C20 2.552 19.553 3 19 3H7C6.448 3 6 2.552 6 2C6 1.448 6.448 1 7 1H19C19.553 1 20 1.447 20 2Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 8C20 8.552 19.553 9 19 9H7C6.448 9 6 8.552 6 8C6 7.448 6.448 7 7 7H19C19.553 7 20 7.447 20 8Z"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M20 14C20 14.552 19.553 15 19 15H7C6.448 15 6 14.552 6 14C6 13.447 6.448 13 7 13H19C19.553 13 20 13.447 20 14Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </i>
                                                    </button>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product__navtabs d-flex justify-content-end align-items-center">
                                        <div class="tp-shop-selector">
                                         <select class="form-control" id="showrecord" onchange="sendAjax()">
                                           <!-- <option value="">Default sorting</option> -->
                                           <option value="12">Show 12</option>
                                           <option value="24">Show 24</option>
                                           <option value="48">Show 48</option>
                                           <option value="98">Show 96</option>
                                         </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade fade show active" id="nav-all" role="tabpanel"
                                    aria-labelledby="nav-all-tab">
                                    <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                                    
                                    @foreach($magazines as $val)
                                        <div class="col">
                                            <div class="tpproduct p-relative mb-20">
                                                <div class="tpproduct__thumb p-relative text-center">
                                                    <a href="/shope-magazine/{{$val->id}}"><img
                                                            src="{{ asset('Magazine/front/' . $val->front_img) }}"
                                                            alt="No Image"></a>
                                                    <a class="tpproduct__thumb-img" href="/shope-magazine/{{$val->id}}">
                                                        <img src="{{ asset('Magazine/back/' . $val->back_img) }}"
                                                            alt="No Image"></a>

                                                    <div class="tpproduct__shopping">

                                                        <a class="tpproduct__shopping-cart" href="/shope-magazine/{{$val->id}}"><i
                                                                class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__content">
                                                    <span class="tpproduct__content-weight">
                                                        <a href="shop-details-3.html">{{$val->category}}</a>,
                                                        <a href="shop-details-3.html">{{$val->language}}</a>
                                                    </span>
                                                    <h4 class="tpproduct__title">
                                                        <a href="/shope-magazine/{{$val->id}}"> Magazine Title: {{$val->title}} </a>
                                                    </h4>

                                                    <div class="tpproduct__price">
                                                        <span>₹{{$val->annual_cost_after_discount}}</span>
                                                        <!-- <del>₹19.00</del> -->
                                                    </div>
                                                </div>
                                                <div class="tpproduct__hover-text">
                                                    <div
                                                        class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                        <button class="tp-btn-2 Add-to-cart3"  data-id3="{{$val->id}}">Add to cart</button>
                                                    </div>
                                                    <div class="tpproduct__descrip">
                                                        <ul>
                                                            <li>category: {{$val->category}}</li>
                                                            <li>periodicity: {{$val->periodicity}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane whight-product" id="nav-popular" role="tabpanel"
                                    aria-labelledby="nav-popular-tab">
                                    <div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                               
                                    @foreach($magazines as $val) 
                                        <div class="col">
                                            <div class="tpproduct p-relative mb-20">
                                                <div class="tpproduct__thumb p-relative text-center">
                                                    <a href="/shope-magazine/{{$val->id}}"><img
                                                            src="{{ asset('Magazine/front/' . $val->front_img) }}"
                                                            alt="No Image "></a>
                                                    <a class="tpproduct__thumb-img" href="/shope-magazine/{{$val->id}}"><img
                                                            src="{{ asset('Magazine/back/' . $val->back_img) }}"
                                                            alt="No Image"></a>

                                                    <div class="tpproduct__shopping">

                                                        <a class="tpproduct__shopping-cart" href="/shope-magazine/{{$val->id}}"><i
                                                                class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__content">
                                                    <span class="tpproduct__content-weight">
                                                        <a href="shop-details-3.html">{{$val->category}}</a>,
                                                        <a href="shop-details-3.html">{{$val->language}}</a>
                                                    </span>
                                                    <h4 class="tpproduct__title">
                                                        <a href="/shope-magazine/{{$val->id}}">Magazine Title: {{$val->title}}</a>
                                                    </h4>

                                                    <div class="tpproduct__price">
                                                        <span>₹{{$val->annual_cost_after_discount}}</span>
                                                        <!-- <del>₹19.00</del> -->
                                                    </div>
                                                </div>
                                                <div class="tpproduct__hover-text">
                                                    <div
                                                        class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                        <button  class="tp-btn-2  Add-to-cart2"  data-id2="{{$val->id}}">Add to cart</button>
                                                    </div>
                                                    <div class="tpproduct__descrip">
                                                        <ul>
                                                            <li>category: {{$val->category}}</li>
                                                            <li>periodicity: {{$val->periodicity}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade whight-product" id="nav-product" role="tabpanel"
                                    aria-labelledby="nav-product-tab">
                                
                                    @foreach($magazines as $val)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tplist__product d-flex align-items-center justify-content-between mb-20">
                                                <div class="tplist__product-img">
                                                    <a href="/shope-magazine/{{$val->id}}" class="tplist__product-img-one"><img
                                                            src="{{ asset('Magazine/front/' . $val->front_img) }}"
                                                            alt="No Image"></a>
                                                    <a class="tplist__product-img-two" href="/shope-magazine/{{$val->id}}"><img
                                                            src="{{ asset('Magazine/back/' . $val->back_img) }}"
                                                            alt="No Image"></a>

                                                </div>
                                                <div class="tplist__content">
                                                    <span>{{$val->category}}</span>,
                                                    <span>{{$val->language}}</span>
                                                    <h4 class="tplist__content-title"><a href="/shope-magazine/{{$val->id}}">Magazine
                                                            Title: {{$val->title}}</a></h4>

                                                    <ul class="tplist__content-info">
                                                        <li>category: {{$val->category}}</li>
                                                        <li>periodicity: {{$val->periodicity}}</li>

                                                    </ul>
                                                </div>
                                                <div class="tplist__price justify-content-end">
                                                    <!-- <h4 class="tplist__instock">Availability: <span>92 in stock</span>
                                            </h4> -->
                                                    <h3 class="tplist__count mb-15">
                                                        ₹{{$val->annual_cost_after_discount}}</h3>
                                                        <button class="tp-btn-2 mb-10 Add-to-cart1" data-id1="{{$val->id}}">Add to cart</button>
                                                    <div class="tplist__shopping">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="basic-pagination text-center mt-35">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
            {{$magazines->links()}}
</li>
</ul>
</nav>
        </div>

                            </div>
                            <!-- <div class="basic-pagination text-center mt-35">
    <nav>
        <ul>

            @if ($magazines->onFirstPage())
                <li><span class="disabled"><i class="icon-chevron-left"></i></span></li>
            @else
                <li><a href="{{ $magazines->previousPageUrl() }}"><i class="icon-chevron-left"></i></a></li>
            @endif

            @for ($i = max(1, $magazines->currentPage() - $magazines->onEachSide); $i <= min($magazines->lastPage(), $magazines->currentPage() + $magazines->onEachSide); $i++)
                @if ($magazines->currentPage() == $i)
                    <li><span class="current">{{ $i }}</span></li>
                @else
                    <li><a href="{{ $magazines->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($magazines->hasMorePages())
                <li><a href="{{ $magazines->nextPageUrl() }}"><i class="icon-chevron-right"></i></a></li>
            @else
                <li><span class="disabled"><i class="icon-chevron-right"></i></span></li>
            @endif

        </ul>
    </nav>
</div> -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->
        <!-- Your Content End Here -->
    </main>

    <!-- footer-area-start -->
    @include('footer.footer')

    <!-- footer-area-end -->
    <?php
    include 'plugin/js.php';
    ?>
 </body>


<script>
$(document).ready(function() {
    $(document).on('click', '#filterButton', function() {

    handlePaginationAndFiltering();
    var selectedValue = document.getElementById("showrecord").value;
    

    const checkedIds = $('.category-checkbox:checked').map(function() {
            return $(this).data('id');
        }).get();
        const checkedIds1 = $('.category-checkbox1:checked').map(function() {
            return $(this).data('id11');
        }).get();
    
        
        $.ajax({
            url: '/megazine_categories',
            method: 'get',
            data: {
                '_token': '{{ csrf_token() }}',
                'checkedIds': checkedIds,
                'checkedIds1': checkedIds1,
                'selectedValue':selectedValue,
            },
            success: function(response) {
                $('.basic-pagination').html('');
                $('#nav-tabContent').html(response); 
                handlePaginationAndFiltering();
                
             
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    });

    function handlePaginationAndFiltering() {
        $('body').on('click', '.basic-pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            $.ajax({
                url: url,
                method: 'get',
                success: function(response) {
                    $('#nav-tabContent').html(response); 
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    }

});
</script>
<script>
    function sendAjax() {
        var selectedValue = document.getElementById("showrecord").value;
        if (selectedValue !== "") {
            handlePaginationAndFiltering();
            
          const checkedIds = $('.category-checkbox:checked').map(function() {
            return $(this).data('id');
        }).get();
        const checkedIds1 = $('.category-checkbox1:checked').map(function() {
            return $(this).data('id11');
        }).get();
            console.log(selectedValue);
            $.ajax({
                url: '/megazine_categories',
                method: 'get',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'checkedIds': checkedIds,
                    'checkedIds1': checkedIds1,
                    'selectedValue': selectedValue,
                    
                },
                success: function(response) {
                    $('.basic-pagination').html('');
                    $('#nav-tabContent').html(response);
                    handlePaginationAndFiltering(); 
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        } else {
            toastr.error("Select Type", { timeout: 2000 });
        }
    }

    function handlePaginationAndFiltering() {
        $('body').on('click', '.basic-pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            $.ajax({
                url: url,
                method: 'get',
                success: function(response) {
                    $('#nav-tabContent').html(response); 
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    }
    
</script>






<script>
$(document).ready(function(){

        $(document).on('click', '.Add-to-cart1', function(){

        var id = $(this).data('id1');
        $.ajax({
            url: '/add-to-cart',
            method: 'POST', 
            data: {
                '_token': '{{ csrf_token() }}',
               'id': id
               },
            success: function(response) {
                if(response.magazinecartcount){
                    $('#magazinecartcount').text(response.magazinecartcount);

                }
                if(response.success){
                    toastr.success(response.success, { timeout: 2000 });

                }
                else{
                    toastr.error(response.error, { timeout: 2000 });

                }
               
            },
            error: function(xhr, status, error) {
              
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>
<script>
$(document).ready(function(){


        $(document).on('click', '.Add-to-cart2', function(){

        var id = $(this).data('id2');
        $.ajax({
            url: '/add-to-cart', 
            method: 'POST', 
            data: {
             '_token': '{{ csrf_token() }}',
            'id': id
               },
            success: function(response) {
                if(response.magazinecartcount){
                    $('#magazinecartcount').text(response.magazinecartcount);

                }

                if(response.success){
                    toastr.success(response.success, { timeout: 2000 });

                }
                else{
                    toastr.error(response.error, { timeout: 2000 });

                }
               
            },
            error: function(xhr, status, error) {
              
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>
<script>
$(document).ready(function(){

        $(document).on('click', '.Add-to-cart3', function(){

        var id = $(this).data('id3');
        $.ajax({
            url: '/add-to-cart',
            method: 'POST', 
            data: {
                  '_token': '{{ csrf_token() }}',
                 'id': id
                   },
            success: function(response) {
                if(response.magazinecartcount){
                    $('#magazinecartcount').text(response.magazinecartcount);

                }

                if(response.success){
                    toastr.success(response.success, { timeout: 2000 });

                }
                else{
                    toastr.error(response.error, { timeout: 2000 });

                }
               
            },
            error: function(xhr, status, error) {
              
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>


</html>