
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of   Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'plugin/css.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        
        <!-- Your Content Use Here -->
        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="/"> Home </a></span>
                                <span class="dvdr">/</span>
                                <a href="/librarian/index">Dashboard</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 text-right">
                        <button type="button" class="close btn-danger" aria-label="Close" onclick="showNavbar()">
                            <span aria-hidden="true">Show Budget</span>
                        </button>
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
                    
                    <div class="col-xl-3 col-lg-12 col-md-12">
                        <div class="accordion w-100" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-filter"></i> &nbsp; &nbsp;Filter
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="tpshop__leftbar w-100">
                                            <div class="tpshop__widget mb-30 pb-25">
                                                <h4 class="tpshop__widget-title">Periodicals Tamil Categories</h4>
                                                @foreach($categories as $key => $val)
                                                <div class="form-check">
                                                    <input class="form-check-input category-checkbox" type="checkbox" value="" data-id="{{ $val->name }}" id="flexCheckDefault{{ $val->name }}" data-key="{{ $key }}">
                                                    <label class="form-check-label" for="flexCheckDefault{{ $val->name }}"> {{ $val->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="tpshop__widget mb-30 pb-25">
                                                <h4 class="tpshop__widget-title">Periodicals English Categories</h4>
                                                @foreach($categories1 as $key => $val)
                                                <div class="form-check">
                                                    <input class="form-check-input category-checkbox" type="checkbox" value=""  data-key="{{ $key }}"
                                                        data-id="{{ $val->name }}" id="flexCheckDefault{{ $val->name }}">
                                                    <label class="form-check-label" for="flexCheckDefault{{ $val->name }}">
                                                        {{ $val->name }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            {{-- <div class="tpshop__widget mb-30 pb-25">
                                                <h4 class="tpshop__widget-title mb-20">FILTER BY PRICE</h4>
                                                <label for="price-min">Min Price:<div id="minpricevalue"></div> </label>
                                                <input type="range" name="price-min" id="price-min" value="{{$min}}" min="{{$min}}" max="{{$max}}">
                                                <label for="price-min">Max Price:<div id="maxpricevalue"></div></label>
                                                <input type="range" name="price-max" id="price-max" value="{{$max}}" min="{{$min}}" max="{{$max}}"> <!-- Add this line -->
                                                <div class="productsidebar__btn mt-15 mb-15">
                                                   <a href="#">FILTER</a>
                                                </div>
                                             </div> --}}
                                            <div class="tpshop__widget mb-30 pb-25">
                                                <h4 class="tpshop__widget-title">FILTER BY PERIODICITY</h4>
                                                
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
                                </div>
                            </div>
                        </div>
                        

                    </div>
                    <div class="col-xl-9 col-lg-12 col-md-12">
                        <div class="tpshop__top">
                            <div class="tpshop__category">
                                
                            <nav id="myNavbar" class="navbar fixed-bottom navbar-light bg-light myNavbar11">
                                    <div class="container">
                                        <button type="button" class="close btn-danger" aria-label="Close"
                                            onclick="closeNavbar()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="swiper budget ">
                                            <div class="swiper-wrapper budeget">
                                                @php
                                                    $bud_arr = Session::get('bud_arr');
                                                @endphp
                                                @foreach ($bud_arr as $val)
                                                    <div class="swiper-slide">
                                                        <div class="p-0 m-0" style="width:auto">
                                                            <div style="width:50px" class="total-amount w-100 p-0 m-0">
                                                                Total Amount: <i class="fa fa-rupee"></i> {{ $val->budget_price }}</div>
                                                            <div style="width:50px" class="pur-cmount w-100 p-0 m-0">Remaining Amount: <i class="fa fa-rupee"></i>{{ $val->budget_price - $val->cart_price }}
                                                            </div>

                                                            <div class="pie animate no-round"
                                                                style="--p:{{ $val->percentage }};--c:rgb(80, 180, 14);">
                                                                {{ $val->percentage }}%</div>
                                                            <p class="p-0 m-0">
                                                                {{ implode(' ', array_slice(explode(' ', $val->category), 0, 2)) }}
                                                            </p>
                                                            <div style="width:50px" class="pur-cmount w-100 p-0 m-0">Purchased Amount: <i class="fa fa-rupee"></i> {{ $val->cart_price }}</div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                             </nav>
                                <div class="swiper-container inner-category-three">
                                   <div class="swiper-wrapper">
                                    @foreach($categories as $val)
                                    <div class="swiper-slide">
                                        <div class="category__item mb-30">
                                        <div class="category__thumb fix mb-15">
                                                    <a href="#"><img
                                                            src="{{ asset('magazinecatimg/' . $val->image) }}"
                                                            alt="category-thumb"></a>
                                                </div>
                                            <div class="category__content">
                                                <h5 class="category__title"><a
                                                        href="#">{{$val->name}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach($categories1 as $val)
                                        <div class="swiper-slide">
                                            <div class="category__item mb-30">
                                            <div class="category__thumb fix mb-15">
                                                    <a href="#"><img
                                                            src="{{ asset('magazinecatimg/' . $val->image) }}"
                                                            alt="category-thumb"></a>
                                                </div>
                                                <div class="category__content">
                                                    <h5 class="category__title"><a
                                                            href="#">{{$val->name}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                   </div>
                                </div>
                             </div>

                            <div class="product__filter-content mb-30">
                                <div class="row align-items-center">
                                    
                                    <div class="col-md-3 col-sm-4">
                                        <div class="tpproductnav tpnavbar product-filter-nav d-flex align-items-center justify-content-center">
                                            <nav>
                                               <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                  <button class="nav-link active" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="true">
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
                                                  <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">
                                                     <i>
                                                        <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                           <path d="M26 4C27.1046 4 28 3.10457 28 2C28 0.89543 27.1046 0 26 0C24.8954 0 24 0.89543 24 2C24 3.10457 24.8954 4 26 4Z" fill="currentColor"/>
                                                           <path d="M26 10C27.1046 10 28 9.10457 28 8C28 6.89543 27.1046 6 26 6C24.8954 6 24 6.89543 24 8C24 9.10457 24.8954 10 26 10Z" fill="currentColor"/>
                                                           <path d="M26 16C27.1046 16 28 15.1046 28 14C28 12.8954 27.1046 12 26 12C24.8954 12 24 12.8954 24 14C24 15.1046 24.8954 16 26 16Z" fill="currentColor"/>
                                                           </svg>
                                                     </i>
                                                  </button>
                                                  <button class="nav-link" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="false">
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
                                               </div>
                                            </nav>
                                         </div>
                                    </div>
                                    <div class="col-md-6 col-sm-4">
                                        {{-- <div class="product__item-count">
                                            <span>Megazine Products</span>
                                        </div> --}}
                                        {{-- <div class="tpsearchbar__form">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search Product...">
                                                <button class="tpsearchbar__search-btn"><i class="icon-search"></i></button>
                                            </form>
                                        </div> --}}
                                        {{-- <div class="header-three__search">
                                            <form action="#">
                                               <input type="email" placeholder="Search books...">
                                               <i class="icon-search"></i>
                                               <button class="tpsearchbar__search-btn">Search<i class="icon-search"></i></button>
                                            </form>
                                         </div> --}}
                                        <div class="row">
                                            <div class="col-xs-8 col-xs-offset-2">
                                                <div class="input-group border-3">
                                                    <div class="btn-group">
                                                        <button style="border:1px solid #ced4da;" type="button" class="btn btn-default dropdown-toggle border-1 rounded-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                          All
                                                        </button>
                                                      </div>
                                                    <input type="hidden" name="search_param" value="all"
                                                        id="search_param">
                                                    <input type="text" class="form-control" name="x"
                                                        id="search" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-danger text-white rounded-0 " type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product__navtabs d-flex justify-content-center align-items-center">
                                            <div class="tp-shop-selector">
                                                <select class="form-control" id="showrecord">
                                                    <!-- <option value="">Default sorting</option> -->
                                                    {{-- <option value="12">Show 12</option> --}}
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
                            
                            <!-- Your HTML structure -->
                            <div id="loader" class="loader" style="display: none;"></div>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                                   <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item" id="magazine_eight">
                                      {{-- Eight Board --}}
                                      @include('magazine.magazine-eight');
                                      {{-- end Eight Board --}}
                                   </div>
                                </div>
                                <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                                   <div class="row" id="magazine_single">
                                      {{-- single Board --}}
                                      @include('magazine.magazine-single');
                                      {{-- single Board --}}
                                   </div>
                                </div>
                                <div class="tab-pane fade whight-product" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
                                   <div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item" id="magazine_four">
                                      {{-- single Board --}}
                                      @include('magazine.magazine-four');
                                      {{-- single Board --}}
                                   </div>
                                </div>
                             </div> 
                            <div id="pagination-two">
                                <ul>
                                   {{ $magazines->links() }}
                                </ul>
                             </div>
                             <div id="pagination"></div>
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
    {{-- search  --}}
    <script>
        $(document).ready(function(e) {
    
                // Get the selected minimum and maximum prices
                var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
    
                // Update the label text with the selected price range
                $('#minpricevalue').text(minPrice);
                $('#maxpricevalue').text(maxPrice);
    
            $('.search-panel .dropdown-menu').find('a').click(function(e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });
        // Function to show loading indicator
        function showLoader() {
            $('#loader').show();
        }
    
        // Function to hide loading indicator
        function hideLoader() {
            $('#loader').hide();
        }
    
        // Function to display default content
        function showDefaultContent() {
            // Display default content here
            // For example, you can show some placeholder or initial content
            // $('#default-content').show();
        }
    
        // Function to hide default content
        function hideDefaultContent() {
            // Hide default content here
            // For example, $('#default-content').hide();
        }
    
        // Ajax function for filtering products
        function filterProducts(page, searchQuery = '',minPrice = 0, maxPrice = 0,showrecord='') {
            // Show loading indicator
            showLoader();
    
            // Hide default content
            hideDefaultContent();   
    
            // Gather selected filter options
            var category = [];
            $('.category-checkbox:checked').each(function() {
                category.push($(this).data('id'));
            });
    
            // Convert the array to a comma-separated string
            var categoryString = category.join(',');
            // Make Ajax request
            $.ajax({
                url: '/tesproduct/filter?page=' + page,
                type: 'GET',
                data: {
                    category: categoryString, // Pass the string instead of the array
                    search: searchQuery, // Pass the search query
                    minPrice: minPrice, // Pass the minimum price
                    maxPrice: maxPrice, // Pass the maximum price
                    showrecord:showrecord // Pass Show Record
                },
                success: function(response) {
                    console.log(response);
                    // if (response.message) {
                    //        return toastr.error(response.message)
    
                    // }
                        // Update each product listing div with its respective view
                        if (response.hasOwnProperty('message')) {
                                // No data found, display a message
                                $('#magazine_eight').empty();
                                $('#magazine_four').empty();
                                $('#magazine_single').empty();
                                $('#pagination').empty().html('<p>No data found.</p>');
                            } else {
                                // Data found, update the HTML content
                                $('#magazine_eight').html(response.html.eight);
                                $('#magazine_four').html(response.html.four);
                                $('#magazine_single').html(response.html.single);
                                $('#pagination').html(response.pagination);
                            }
    
                        // Update pagination links
                        $('#pagination').empty();
                        $('#pagination-two').css('display','none');
                        $('#pagination').html(response.pagination);
                        // Modify pagination links to remove 'filter' segment from URL
                        // $('#pagination').find('a').each(function() {
                        //     var href = $(this).attr('href');
                        //     href = href.replace('/filter', ''); // Remove 'filter' segment
                        //     $(this).attr('href', href);
                        // });
    
                        // Hide loader
                        hideLoader();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    // Hide loader
                    hideLoader();
                },
                complete: function() {
                   // Hide loader
                    hideLoader();
                }
            });
        }
    
            // Function to modify URL
            function updateURL(page) {
                var currentUrl = window.location.href;
                if (currentUrl.includes('products/filter')) {
                    var newUrl = currentUrl.replace('products/filter', 'products');
                    history.pushState({}, null, newUrl + '?page=' + page);
                }
            }
        
            // Function for handling search
            function handleSearch() {
                var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
                var searchQuery = $('#search').val().trim();
                if (searchQuery === '') {
                    // If search query is empty, show all products
                    // filterProducts(1);
                    filterProducts(1,'',minPrice,maxPrice,'10'); // Reset pagination to first page when filters change
                } else {
                    // If search query is not empty, filter products by search query
                    filterProducts(1, searchQuery,minPrice,maxPrice,'10');
                }
            }
        
            // Listen for changes in filter options
            $('input[type=checkbox]').change(function() {
                var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
                // alert('good');
                filterProducts(1,'',minPrice,maxPrice,'10'); // Reset pagination to first page when filters change
            });
        
            // Listen for pagination link clicks
            $(document).on('click', '#pagination a', function(event) {
                var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
    
                event.preventDefault(); // Prevent default link behavior
                var currentPage = $(this).attr('href').split('page=')[1];
                var selectedPage = currentPage || 1; // If no page number, default to 1
                // filterProducts(selectedPage); // Call filterProducts without preventing default
                filterProducts(selectedPage,'',minPrice,maxPrice,'10'); // Reset pagination to first page when filters change
            });
        
            // Listen for input event on search field
            $('#search').on('input', handleSearch);
    
            // Add event listener for change event on the range slider
            $('#price-min, #price-max').on('input', function() {
    
                // Get the selected minimum and maximum prices
                var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
    
                // Update the label text with the selected price range
                $('#minpricevalue').text(minPrice);
                $('#maxpricevalue').text(maxPrice);
                
                // Call the filterProducts function with the selected minimum and maximum prices
                filterProducts(1, '', minPrice, maxPrice);
            });
    
            //handle record change
            $('#showrecord').on('change',function(){
                 var minPrice = $('#price-min').val();
                var maxPrice = $('#price-max').val();
                var recordValue = $(this).val();
                // alert(recordValue);
                // page, searchQuery = '',minPrice = 0, maxPrice = 0,showrecord=''
                 // Call the filterProducts function with the selected record value
                 filterProducts(1,'',minPrice,maxPrice,recordValue);
            });
    </script>
{{-- search  --}}
<script>
    $(document).ready(function() {

        $(document).on('click', '.Add-to-cart1', function() {
            $('.Add-to-cart1').prop('disabled',true);
            var id = $(this).data('id1');
            $.ajax({
                url: '/add-to-cart',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {

                    if (response.success) {
                        $('.Add-to-cart1').prop('disabled',false);
                        toastr.success(response.success, {
                            timeout: 2000
                        });

                    } else {
                        $('.Add-to-cart1').prop('disabled',false);
                        toastr.error(response.error, {
                            timeout: 2000
                        });

                    }
                    if (response.magazinecartcount) {
                        $('#magazinecartcount').text(response.magazinecartcount);
                        $(".myNavbar11").load(location.href + " .myNavbar11 > *",
                    function() {
                            var script = document.createElement('script');
                            script.textContent = `
        var swiper = new Swiper(".budget", {
            loop: true,
            slidesPerView: 7,
            spaceBetween: 20,
            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            breakpoints: {
                '1400': {
                    slidesPerView: 7,
                },
                '1200': {
                    slidesPerView: 6,
                },
                '992': {
                    slidesPerView: 5,
                },
                '768': {
                    slidesPerView: 4,
                },
                '576': {
                    slidesPerView: 3,
                },
                '0': {
                    slidesPerView: 2,
                },
            },
        });
    `;

                            document.head.appendChild(script);
                        });


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
    $(document).ready(function() {


        $(document).on('click', '.Add-to-cart2', function() {
            $('.Add-to-cart2').prop('disabled',true);
            var id = $(this).data('id2');
            $.ajax({
                url: '/add-to-cart',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {
                    if (response.success) {
                        $('.Add-to-cart2').prop('disabled',false);
                        toastr.success(response.success, {
                            timeout: 2000
                        });

                    } else {
                        $('.Add-to-cart2').prop('disabled',false);
                        toastr.error(response.error, {
                            timeout: 2000
                        });

                    }
                    if (response.magazinecartcount) {
                        $('#magazinecartcount').text(response.magazinecartcount);
                        $(".myNavbar11").load(location.href + " .myNavbar11 > *",
                    function() {

                            var script = document.createElement('script');

                            script.textContent = `
        var swiper = new Swiper(".budget", {
            loop: true,
            slidesPerView: 7,
            spaceBetween: 20,
            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            breakpoints: {
                '1400': {
                    slidesPerView: 7,
                },
                '1200': {
                    slidesPerView: 6,
                },
                '992': {
                    slidesPerView: 5,
                },
                '768': {
                    slidesPerView: 4,
                },
                '576': {
                    slidesPerView: 3,
                },
                '0': {
                    slidesPerView: 2,
                },
            },
        });
    `;

                            document.head.appendChild(script);
                        });


                    }



                },
                error: function(xhr, status, error) {
                    $('.Add-to-cart2').prop('disabled',false);
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        $(document).on('click', '.Add-to-cart3', function() {
            $('.Add-to-cart3').prop('disabled',true);
            var id = $(this).data('id3');
            $.ajax({
                url: '/add-to-cart',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(response) {
                    if (response.success) {
                        $('.Add-to-cart3').prop('disabled',false);
                        toastr.success(response.success, {
                            timeout: 2000
                        });

                    } else {
                        $('.Add-to-cart3').prop('disabled',false);
                        toastr.error(response.error, {
                            timeout: 2000
                        });

                    }
                    if (response.magazinecartcount) {
                        $('#magazinecartcount').text(response.magazinecartcount);
                        $(".myNavbar11").load(location.href + " .myNavbar11 > *",
                    function() {

                            var script = document.createElement('script');

                            script.textContent = `
        var swiper = new Swiper(".budget", {
            loop: true,
            slidesPerView: 7,
            spaceBetween: 20,
            autoplay: {
                delay: 3500,
                disableOnInteraction: true,
            },
            breakpoints: {
                '1400': {
                    slidesPerView: 7,
                },
                '1200': {
                    slidesPerView: 6,
                },
                '992': {
                    slidesPerView: 5,
                },
                '768': {
                    slidesPerView: 4,
                },
                '576': {
                    slidesPerView: 3,
                },
                '0': {
                    slidesPerView: 2,
                },
            },
        });
    `;

                            document.head.appendChild(script);
                        });


                    }



                },
                error: function(xhr, status, error) {
                    $('.Add-to-cart3').prop('disabled',false);
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
    });
</script>
<script>
    function closeNavbar() {
        var navbar = document.getElementById("myNavbar");
        navbar.style.display = "none";
    }

    function showNavbar() {
        var navbar = document.getElementById("myNavbar");
        navbar.style.display = "block";
    }
</script>
<script>
    var swiper = new Swiper(".budget", {
        loop: true,
        slidesPerView: 7,
        spaceBetween: 20,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            '1400': {
                slidesPerView: 7,
            },
            '1200': {
                slidesPerView: 6,
            },
            '992': {
                slidesPerView: 5,
            },
            '768': {
                slidesPerView: 4,
            },
            '576': {
                slidesPerView: 3,
            },
            '0': {
                slidesPerView: 2,
            },
        },
    });
</script>
<style>
    .tplist__content {
    padding: 25px;
}
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
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        position: fixed; /* Position fixed */
        top: 50%;
        left: 50%;
        margin-left: -60px; /* Negative half of width */
        margin-top: -60px; /* Negative half of height */
        z-index: 9999; /* Higher z-index */
        background: rgba(20, 6, 6, 0.5); /* Semi-transparent background */
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
    <style>
    @property --p{
      syntax: '<number>';
      inherits: true;
      initial-value: 0;
    }
    
    .pie {
      --p:20;
      --b:10px;
      --c:darkred;
      --w:70px;
      
      width:var(--w);
      aspect-ratio:1;
      position:relative;
      display:inline-grid;
      margin:5px;
      place-content:center;
      font-size:16px;
      font-weight:bold;
      font-family:sans-serif;
    }
    .pie:before,
    .pie:after {
      content:"";
      position:absolute;
      border-radius:50%;
    }
    .pie:before {
      inset:0;
      background:
      radial-gradient(farthest-side, var(--c) 98%, #0000) top / var(--b) var(--b) no-repeat, conic-gradient(var(--c) calc(var(--p)* 1%), #0000002e 0);
      -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
              mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
    }
    .pie:after {
      inset:calc(50% - var(--b)/2);
      background:var(--c);
      transform:rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
    }
    .animate {
      animation:p 1s .5s both;
    }
    .no-round:before {
      background-size:0 0,auto;
    }
    .no-round:after {
      content:none;
    }
    @keyframes p {
      from{--p:0}
    }
    div#pagination-two {
    width: 100%;
    overflow: scroll;
}
@media only screen and (max-width: 600px) {
    .tp-shop-selector{
        margin-top: 10px;
    }
}
    </style>
 </body>

</html>
