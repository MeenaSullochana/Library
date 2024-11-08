<div id="header-sticky" class="header__main-area d-none d-xl-block">
    <div class="container">
        <div class="header__for-megamenu p-relative">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="header__logo">
                        <a href="/"><img class="w-100" src="assets/img/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="header__menu main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li class=" has-homemenu">
                                    <a href="/">Home</a>
                                </li>

                                <li class=" has-megamenu">
                                    <a href="/about">About Us</a>
                                </li>
                                <li class="#">
                                    <a href="/procurement-policy">Procurement Policy</a>
                                </li>
                                <li class="#">
                                    <a href="/guidelines">Guidelines</a>
                                </li>
                                <li class="#">
                                    <a href="/contact-us">Contact Us</a>
                                </li>
                                <!-- <li class="#">
                                    <a href="#">Library Catalogue</a>
                                 </li> -->
                                @if(auth('librarian')->user())
                                @else
                                <li class="has-dropdown">
                                    <a href="#">Login</a>
                                    <ul class="sub-menu">
                                        <!-- <li><a href="#">Section</a></li>
                                       <li><a href="#">Rental Details</a></li> -->
                                        {{-- <li><a href="/login">Membership Login</a></li> --}}
                                        <li><a href="/login">Publisher Login</a></li>
                                        <li><a href="/login">Distributor Login</a></li>
                                        <li><a href="/login">Publisher Cum Distributor Login</a></li>
                                        <li><a href="/periodical/login">Periodical Publisher Login</a></li>
                                        <li><a href="/periodical/login">Periodical Distributor Login</a></li>
                                        <li><a href="/member/login">Reviewer Login</a></li>
                                        <li><a href="/member/login">Librarian Login</a></li>
                                        <li><a href="/member/login">User Login</a></li>
                                    </ul>
                                </li>
                                @endif


                                <!--<li class="#">-->
                                <!--   <a href="#">Section</a>-->
                                <!--</li>-->
                                <!-- <li class="#">
                                    <a href="#">Membership</a>
                                 </li>
                                 <li class="#">
                                    <a href="#">Reviewer</a>
                                 </li>
                                 <li class="#">
                                    <a href="#">Contact Us</a>
                                 </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-3 col-sm-5">
                    <div class="header__info d-flex align-items-center">
                        <div class="header__info-cart tpcolor__oasis ml-10 ">
                            @php
                            $user = auth('librarian')->user();
                            @endphp

                            @if($user && $user->metaChecker =="no")
                            @if(Session::has('magazinecartcount'))
                            <a href="/cart-magazine">
                                <button id="magazinecartcountId">
                                    <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <span id='magazinecartcount'>{{ Session::get('magazinecartcount') }}</span>
                                </button>

                            </a>
                            @else
                            <a href="#">
                                <button>
                                    <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <!-- <span>
                                 </span> -->
                                </button>
                            </a>
                            @endif
                            @endif
                          
                        </div>

                        <div class="header__info-cart tpcolor__oasis ml-10 ">
                            @php
                            $user = auth('librarian')->user();
                            @endphp
                        @if($user && $user->metaChecker =="no")
                            @if(Session::has('bookcartcount'))
                            <a href="/cart-book">
                                <button id="bookcartcountId">
                                    <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <span id='bookcartcount'>{{ Session::get('bookcartcount') }}</span>
                                </button>

                            </a>
                            @else
                            <a href="#">
                                <button>
                                    <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <!-- <span>
                                 </span> -->
                                </button>
                            </a>
                            @endif
                            @endif


                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- header-search -->
<div class="tpsearchbar tp-sidebar-area">
    <button class="tpsearchbar__close"><i class="icon-x"></i></button>
    <div class="search-wrap text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 pt-100 pb-100">
                    <h2 class="tpsearchbar__title">What Are You Looking For?</h2>
                    <div class="tpsearchbar__form">
                        <form action="#">
                            <input type="text" name="search" placeholder="Search Product...">
                            <button class="tpsearchbar__search-btn"><i class="icon-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search-body-overlay"></div>
<!-- header-search-end -->

<!-- header-cart-start -->
<div class="tpcartinfo tp-cart-info-area p-relative">
    <button class="tpcart__close"><i class="icon-x"></i></button>
    <div class="tpcart">
        <h4 class="tpcart__title">Your Cart</h4>
        <div class="tpcart__product">
            <div class="tpcart__product-list">
                <ul>
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="assets/img/product/products1-min.jpg" alt="">
                                <div class="tpcart__del">
                                    <a href="#"><i class="icon-x-circle"></i></a>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">Stacy's Pita Chips
                                        Parmesan Garlic & Herb From Nature</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">1 x</span>
                                    <span class="new-price">162.80</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="assets/img/product/products12-min.jpg" alt="">
                                <div class="tpcart__del">
                                    <a href="#"><i class="icon-x-circle"></i></a>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">Banana, Beautiful Skin,
                                        Good For Health 1Kg</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">1 x</span>
                                    <span class="new-price">138.00</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="tpcart__item">
                            <div class="tpcart__img">
                                <img src="assets/img/product/products3-min.jpg" alt="">
                                <div class="tpcart__del">
                                    <a href="#"><i class="icon-x-circle"></i></a>
                                </div>
                            </div>
                            <div class="tpcart__content">
                                <span class="tpcart__content-title"><a href="shop-details.html">Quaker Popped Rice
                                        Crisps Snacks Chocolate</a>
                                </span>
                                <div class="tpcart__cart-price">
                                    <span class="quantity">1 x</span>
                                    <span class="new-price">$162.8</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tpcart__checkout">
                <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                    <span> Subtotal:</span>
                    <span class="heilight-price"> 300.00</span>
                </div>
                <div class="tpcart__checkout-btn">
                    <a class="tpcart-btn mb-10" href="cart.html">View Cart</a>
                    <a class="tpcheck-btn" href="checkout.html">Checkout</a>
                </div>
            </div>
        </div>
        <div class="tpcart__free-shipping text-center">
            <span>Free shipping for orders <b>under 10km</b></span>
        </div>
    </div>
</div>
<div class="cartbody-overlay"></div>
<div class="header__top theme-bg-1 d-md-block border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                @php
                $news_feeds = DB::table('news_feeds')->first();
                $sentences = explode('.', $news_feeds->newsFeed);
                @endphp

                <div class="header__top-left text-white">
                    <marquee behavior="" direction="">
                        <ul class="d-flex">
                            @foreach($sentences as $sentence)
                            <li class="ms-5">{{ $sentence }}</li>
                            @endforeach
                        </ul>
                    </marquee>
                </div>

            </div>
        </div>
    </div>
    <!-- header-cart-end -->
<!-- <style>
        ul.d-flex {
    list-style: none;
}
</style> -->