<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/img/logo/fevi.svg') }}">
    <?php
         include "plugin/css.php";
      ?>
<style>
    .category__item {
    min-height: 230px;
    text-align: center;
    background-color: var(--tp-common-white);
    border-radius: 10px;
    padding: 30px 10px 25px 10px;
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
        @include("header.top_header")
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->

        @include("header.middile_navigation")
        @include("header.navigation")
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->

        @include("header.mobile_navigation")
    </header>
    <!-- header-area-end -->

    <main>

        <!-- slider-area-start -->

        <!-- slider-area-end -->

        <!-- Your Content Use Here -->
        <!-- shop-area-start -->
        <section class="shop-area-start grey-bg pb-200 mt-6">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-12 col-md-12">
                        <div class="tpshop__leftbar">
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">Book Categories</h4>
                                @php
                                $categori = DB::table('special_categories')->get();
                                @endphp
                                @foreach($categori as $val)
                                <div class="form-check">
                                    <input class="form-check-input category-checkbox" type="checkbox" value=""
                                        data-id="{{ $val->name }}" id="flexCheckDefault{{ $val->name }}">
                                    <label class="form-check-label" for="flexCheckDefault{{ $val->name }}">
                                        {{ $val->name }}
                                    </label>
                                </div>
                                @endforeach
                                <!-- <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                              <label class="form-check-label" for="flexCheckDefault2">
                              Fiction (12)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault3">
                              <label class="form-check-label" for="flexCheckDefault3">
                                Romance (09)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault4">
                              <label class="form-check-label" for="flexCheckDefault4">
                                Horror (05)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault5">
                              <label class="form-check-label" for="flexCheckDefault5">
                                Poetry (09)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                              <label class="form-check-label" for="flexCheckDefault6">
                                Biography (05)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                              <label class="form-check-label" for="flexCheckDefault7">
                                Non-fiction (04)
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                              <label class="form-check-label" for="flexCheckDefault8">
                                Children's literature (08)
                              </label>
                           </div> -->
                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">Product English Categories</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                                    <label class="form-check-label" for="flexCheckDefault6">
                                      Biography (05)
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                                    <label class="form-check-label" for="flexCheckDefault7">
                                      Non-fiction (04)
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
                                    <label class="form-check-label" for="flexCheckDefault8">
                                      Children's literature (08)
                                    </label>
                                 </div>

                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                {{-- <h4 class="tpshop__widget-title mb-20">FILTER BY PRICE</h4>
                                <div class="productsidebar">
                                    <div class="productsidebar__head">
                                    </div>
                                    <div class="productsidebar__range">
                                        <div id="slider-range"></div>
                                        <div class="price-filter mt-10"><input type="text" id="amount">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="productsidebar__btn mt-15 mb-15">
                                    <a href="#" id="filterButton">FILTER</a>
                                </div>
                            </div>
                            <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">FILTER BY AUTHOR</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
                                    <label class="form-check-label" for="flexCheckDefault18">
                                        Sanjeev Joshi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
                                    <label class="form-check-label" for="flexCheckDefault19">
                                        Sanjeev Joshi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault20">
                                    <label class="form-check-label" for="flexCheckDefault20">
                                        Sanjeev Joshi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault21">
                                    <label class="form-check-label" for="flexCheckDefault21">
                                        Sanjeev Joshi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                                    <label class="form-check-label" for="flexCheckDefault22">
                                        Sanjeev Joshi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault23">
                                    <label class="form-check-label" for="flexCheckDefault23">
                                        PSanjeev Joshi
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="tpshop__widget mb-30 pb-25">
                           <h4 class="tpshop__widget-title mb-20">Filter by Percentage</h4>
                           <div class="tpshop__widget-color-box">
                              <div class="form-check">
                                 <input class="form-check-input black-input" type="checkbox" value="" id="flexCheckDefault12">
                                 <label class="form-check-label" for="flexCheckDefault12">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input blue-input" type="checkbox" value="" checked id="flexCheckChecked13">
                                 <label class="form-check-label" for="flexCheckChecked13">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input brown-input" type="checkbox" value=""  checked id="flexCheckChecked18">
                                 <label class="form-check-label" for="flexCheckChecked18">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input grey-input" type="checkbox" value="" id="flexCheckChecked14">
                                 <label class="form-check-label" for="flexCheckChecked14">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input green-input" type="checkbox" value="" id="flexCheckChecked15">
                                 <label class="form-check-label" for="flexCheckChecked15">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input orange-input" type="checkbox" value="" id="flexCheckChecked16">
                                 <label class="form-check-label" for="flexCheckChecked16">
                                    10% Off Ore more
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input red-input" type="checkbox" value="" id="flexCheckChecked17">
                                 <label class="form-check-label" for="flexCheckChecked17">
                                    10% Off Ore more
                                 </label>
                              </div>
                           </div>
                        </div> -->
                            {{-- <div class="tpshop__widget mb-30 pb-25">
                                <h4 class="tpshop__widget-title">FILTER BY AUTHOR</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
                                    <label class="form-check-label" for="flexCheckDefault18">
                                        Chrome Hearts (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
                                    <label class="form-check-label" for="flexCheckDefault19">
                                        Dominique Aurientis (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault20">
                                    <label class="form-check-label" for="flexCheckDefault20">
                                        Galliano (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault21">
                                    <label class="form-check-label" for="flexCheckDefault21">
                                        Georgine (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
                                    <label class="form-check-label" for="flexCheckDefault22">
                                        Matthew Christopher (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault23">
                                    <label class="form-check-label" for="flexCheckDefault23">
                                        Paul Gaultier (15)
                                    </label>
                                </div>
                            </div> --}}
                            {{-- <div class="tpshop__widget">
                                <h4 class="tpshop__widget-title">FILTER BY RATING</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault24">
                                    <label class="form-check-label" for="flexCheckDefault24">
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        (45)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault25">
                                    <label class="form-check-label" for="flexCheckDefault25">
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        (10)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault26">
                                    <label class="form-check-label" for="flexCheckDefault26">
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        (05)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault27">
                                    <label class="form-check-label" for="flexCheckDefault27">
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        (02)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault28">
                                    <label class="form-check-label" for="flexCheckDefault28">
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        <i class="icon-star_rate"></i>
                                        (02)
                                    </label>
                                </div>
                            </div> --}}
                        </div>
                        <!-- <div class="tpshop__widget">
                            <div class="tpshop__sidbar-thumb mt-35">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>
                        </div> -->
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="tpshop__top ml-60">
                            <div class="tpshop__banner mb-30" style="background-size: 100%;"
                                data-background="https://img.lovepik.com/background/20211022/large/lovepik-a-book-that-blossomed-in-the-dark-background-image_500602193.jpg">
                                <div class="tpshop__content text-center">
                                    
                                    <h4 class="text-white">
                                        அகர முதல எழுத்தெல்லாம் ஆதி<br>
                                        பகவன் முதற்றே உலகு</h4>
                                        <p><b>குறள் விளக்கம் :</b><br>
                                             எழுத்துக்கள் எல்லாம் அகரத்தை அடிப்படையாக<br> கொண்டிருக்கின்றன. அதுபோல உலகம் கடவுளை<br> அடிப்படையாக கொண்டிருக்கிறது.</p>
                                </div>
                            </div>
       
                            <div class="tpshop__category">
                                <div class="swiper-container inner-category-active">
                                   <div class="swiper-wrapper">
                                    @foreach($categori as $val)
                                      <div class="swiper-slide">
                                         <div class="category__item mb-30">
                                            <div class="category__thumb fix mb-15">
                                               <a href="#"><img src="{{ asset('admin/categorieImage/' . $val->categorieImage) }}" alt="category-thumb"></a>
                                            </div>
                                            <div class="category__content">
                                               <h5 class="category__title"><a href="#">{{$val->name}}</a></h5>
                                            </div>
                                         </div>
                                      </div>
                                      @endforeach
                                      {{-- @foreach($categori1 as $val)
                                      <div class="swiper-slide">
                                         <div class="category__item mb-30">
                                            <div class="category__thumb fix mb-15">
                                               <a href="shop-details-3.html"><img src="https://static.vecteezy.com/system/resources/previews/004/540/871/original/vintage-slogan-typography-books-and-coffee-for-t-shirt-design-vector.jpg" alt="category-thumb"></a>
                                            </div>
                                            <div class="category__content">
                                               <h5 class="category__title"><a href="shop-details-3.html">{{$val->name}}</a></h5>
                                            </div>
                                         </div>
                                      </div>
                                      @endforeach --}}
                                   </div>
                                </div>
                             </div>
                            <div class="product__filter-content mb-30">
                                <div class="row align-items-center">
                                   <div class="col-sm-4">
                                      <div class="product__item-count">
                                         <span>Showing 1 - 18 of 40 Products</span>
                                      </div>
                                   </div>
                                   <div class="col-sm-4">
                                      <div class="tpproductnav tpnavbar product-filter-nav d-flex align-items-center justify-content-center">
                                         <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                               <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">
                                                  <i>
                                                     <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z" fill="currentColor"/>
                                                        <path d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z" fill="currentColor"/>
                                                        <path d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z" fill="currentColor"/>
                                                        <path d="M8 4C9.10457 4 10 3.10457 10 2C10 0.89543 9.10457 0 8 0C6.89543 0 6 0.89543 6 2C6 3.10457 6.89543 4 8 4Z" fill="currentColor"/>
                                                        <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" fill="currentColor"/>
                                                        <path d="M8 16C9.10457 16 10 15.1046 10 14C10 12.8954 9.10457 12 8 12C6.89543 12 6 12.8954 6 14C6 15.1046 6.89543 16 8 16Z" fill="currentColor"/>
                                                        <path d="M14 4C15.1046 4 16 3.10457 16 2C16 0.89543 15.1046 0 14 0C12.8954 0 12 0.89543 12 2C12 3.10457 12.8954 4 14 4Z" fill="currentColor"/>
                                                        <path d="M14 10C15.1046 10 16 9.10457 16 8C16 6.89543 15.1046 6 14 6C12.8954 6 12 6.89543 12 8C12 9.10457 12.8954 10 14 10Z" fill="currentColor"/>
                                                        <path d="M14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z" fill="currentColor"/>
                                                        <path d="M20 4C21.1046 4 22 3.10457 22 2C22 0.89543 21.1046 0 20 0C18.8954 0 18 0.89543 18 2C18 3.10457 18.8954 4 20 4Z" fill="currentColor"/>
                                                        <path d="M20 10C21.1046 10 22 9.10457 22 8C22 6.89543 21.1046 6 20 6C18.8954 6 18 6.89543 18 8C18 9.10457 18.8954 10 20 10Z" fill="currentColor"/>
                                                        <path d="M20 16C21.1046 16 22 15.1046 22 14C22 12.8954 21.1046 12 20 12C18.8954 12 18 12.8954 18 14C18 15.1046 18.8954 16 20 16Z" fill="currentColor"/>
                                                        </svg>
                                                  </i>
                                               </button>
                                               <button class="nav-link active" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="true">
                                                  <i>
                                                     <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z" fill="currentColor"/>
                                                        <path d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z" fill="currentColor"/>
                                                        <path d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z" fill="currentColor"/>
                                                        <path d="M8 4C9.10457 4 10 3.10457 10 2C10 0.89543 9.10457 0 8 0C6.89543 0 6 0.89543 6 2C6 3.10457 6.89543 4 8 4Z" fill="currentColor"/>
                                                        <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" fill="currentColor"/>
                                                        <path d="M8 16C9.10457 16 10 15.1046 10 14C10 12.8954 9.10457 12 8 12C6.89543 12 6 12.8954 6 14C6 15.1046 6.89543 16 8 16Z" fill="currentColor"/>
                                                        <path d="M14 4C15.1046 4 16 3.10457 16 2C16 0.89543 15.1046 0 14 0C12.8954 0 12 0.89543 12 2C12 3.10457 12.8954 4 14 4Z" fill="currentColor"/>
                                                        <path d="M14 10C15.1046 10 16 9.10457 16 8C16 6.89543 15.1046 6 14 6C12.8954 6 12 6.89543 12 8C12 9.10457 12.8954 10 14 10Z" fill="currentColor"/>
                                                        <path d="M14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z" fill="currentColor"/>
                                                        </svg>
                                                  </i>
                                               </button>
                                               <button class="nav-link" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="false">
                                                  <i>
                                                     <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4C3.10457 4 4 3.10457 4 2C4 0.89543 3.10457 0 2 0C0.89543 0 0 0.89543 0 2C0 3.10457 0.89543 4 2 4Z" fill="currentColor"/>
                                                        <path d="M2 10C3.10457 10 4 9.10457 4 8C4 6.89543 3.10457 6 2 6C0.89543 6 0 6.89543 0 8C0 9.10457 0.89543 10 2 10Z" fill="currentColor"/>
                                                        <path d="M2 16C3.10457 16 4 15.1046 4 14C4 12.8954 3.10457 12 2 12C0.89543 12 0 12.8954 0 14C0 15.1046 0.89543 16 2 16Z" fill="currentColor"/>
                                                        <path d="M20 2C20 2.552 19.553 3 19 3H7C6.448 3 6 2.552 6 2C6 1.448 6.448 1 7 1H19C19.553 1 20 1.447 20 2Z" fill="currentColor"/>
                                                        <path d="M20 8C20 8.552 19.553 9 19 9H7C6.448 9 6 8.552 6 8C6 7.448 6.448 7 7 7H19C19.553 7 20 7.447 20 8Z" fill="currentColor"/>
                                                        <path d="M20 14C20 14.552 19.553 15 19 15H7C6.448 15 6 14.552 6 14C6 13.447 6.448 13 7 13H19C19.553 13 20 13.447 20 14Z" fill="currentColor"/>
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
                                            <select class="form-control">
                                                <option>Default sorting</option>
                                                <option>Show 12</option>
                                                <option>Show 24</option>
                                                <option>Show 48</option>
                                            </select>
                                        </div>
                                    </div>
                                   </div>
                                </div>
                             </div>
                            
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                    aria-labelledby="nav-all-tab">
                                    <div
                                        class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">

                                        @php
                                        $book =
                                        DB::table('books')->where('negotiation_status','=',2)->where('book_active_status','=',1)
                                        ->orderBy('marks', 'desc')
                                        ->get();
                                        $budget = DB::table('libeaey_budgets')->where('libraryType',auth('librarian')->user()->libraryType)->orderBy('created_at','DESC')->first();
                            
                                        @endphp
                                        @foreach($books as $val)
                                        <div class="col">
                                            <div class="tpproduct p-relative">
                                                <div class="tpproduct__thumb p-relative text-center">
                                                    <a href="#"><img src="{{ asset("Books/full/".$val->full_img) }}"
                                                            class="w-100" alt=""></a>
                                                    <a class="tpproduct__thumb-img" href="/shope/{{$val->id}}"><img
                                                            src="{{ asset("Books/full/".$val->full_img) }}" alt=""></a>
                                                    <div class="tpproduct__info bage">

                                                    </div>
                                                    <div class="tpproduct__shopping">
                                                        <!-- <a class="tpproduct__shopping-wishlist" href="/wishlist"><i
                                                                class="icon-heart icons"></i></a>
                                                        <a class="tpproduct__shopping-wishlist" href="#"><i
                                                                class="icon-layers"></i></a> -->
                                                        <a class="tpproduct__shopping-cart" href="/shope/{{$val->id}}"><i
                                                                class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__content">
                                                    <span class="tpproduct__content-weight">
                                                        <a href="/shope/{{$val->id}}">{{$val->category}} </a>
                                                    </span>
                                                    <h4 class="tpproduct__title">
                                                        <a href="/shope/{{$val->id}}">{{$val->book_title}}</a>
                                                    </h4>
                                                    <p class="text-primary"><b>By</b> Name</p> |
                                                    {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}

                                                    <div class="tpproduct__price">
                                                        <span>${{$val->final_price}}</span>

                                                    </div>
                                                </div>
                                                @if($budget != null)
                                                <div class="tpproduct__hover-text">
                                                  
                                                    <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                        <a class="tp-btn-2" href="/product/add/cart/{{$val->id}}">Add to cart</a>
                                                    </div>
                                                   
                                                    <div class="tpproduct__descrip">
                                                        <ul>
                                                            <li>Subject:{{$val->subject}}</li>
                                                            <!-- <li>MFG: August 4.2021</li>
                                                            <li>LIFE: 60 days</li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="basic-pagination text-center mt-35">
                                        <nav>
                                            <ul>
                                                @if ($books->onFirstPage())
                                                <li><span class="current">1</span></li>
                                                @else
                                                <li><a href="{{ $books->previousPageUrl() }}">1</a></li>
                                                @endif

                                                @if ($books->currentPage() >= 2)
                                                <li><a href="{{ $books->url(2) }}">2</a></li>
                                                @endif

                                                @if ($books->currentPage() >= 3)
                                                <li><a href="{{ $books->url(3) }}">3</a></li>
                                                @endif

                                                @if ($books->hasMorePages())
                                                <li><a href="{{ $books->nextPageUrl() }}"><i
                                                            class="icon-chevrons-right"></i></a></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->
        <!-- Your Content End Here -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")

    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>

</body>


<script>
$(document).ready(function() {
    $(document).on('click', '#filterButton', function() {

    handlePaginationAndFiltering();

    const checkboxes = document.querySelectorAll('.category-checkbox');
        const checkedIds = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.getAttribute('data-id'));

        $.ajax({
            url: '/book_categories',
            method: 'get',
            data: {
                '_token': '{{ csrf_token() }}',
                'checkedIds': checkedIds
            },
            success: function(response) {
                $('#nav-all').html(response.success); 
                handlePaginationAndFiltering();
                
                if (response.pagination) {
                    $('#pagination-container').html(response.pagination);
                }
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
                    $('#nav-all').html(response.success); 
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    }

});
</script>

</html>