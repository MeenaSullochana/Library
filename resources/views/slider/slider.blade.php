<style>
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
h4.tpslider__title.fw-bolder.mb-30 {
    font-size: 11px;
}
p.distru {
    font-size: 10px;
}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {...}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {...}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {...}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {...}

</style>
<section class="slider-area tpslider-delay">
    <div class="swiper-container slider-active">
        <div class="swiper-wrapper">
            <div class="swiper-slide ">
                <div class="tpslider pt-90 pb-0 grey-bg" data-background="assets/img/slider/shape-bg.jpg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xxl-5 col-lg-6 col-md-6 col-12 col-sm-6">
                            @php
                                                $thirukkural = DB::table('thirukkural')->where('status', '=', '1')->get();
                             @endphp
                                <div class="tpslider__content pt-20">
                                    <!-- <span class="tpslider__sub-title mb-35">Top Seller In The Week</span> -->
                                    <h4 class="tpslider__title fw-bolder mb-30">{{ $thirukkural[0]->thirukkuralFirstLine}}
                                    {{ $thirukkural[0]->thirukkuralSecondLine}}....</h4>
                                    <p class="distru">{{ $thirukkural[0]->shortDescription}}...</p>
                                    <div class="tpslider__btn">
                                        <!-- <a class="tp-btn" href="/thirukkural-view">Read More</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="tpslider__thumb p-relative pt-15">
                                    <img class="tpslider__thumb-img" src="assets/img/slider/slider-bg-1.png"
                                        alt="slider-bg">
                                    <div class="tpslider__shape d-none d-md-block">
                                        <img class="tpslider__shape-one" src="assets/img/slider/slider-shape-1.png"
                                            alt="shape">
                                        <img class="tpslider__shape-two" src="assets/img/slider/slider-shape-2.png"
                                            alt="shape">
                                        <!-- <img class="tpslider__shape-three" src="assets/img/slider/slider-shape-3.png" alt="shape"> -->
                                        <img class="tpslider__shape-four" src="assets/img/slider/slider-shape-4.png"
                                            alt="shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="tpslider pt-90 pb-0 grey-bg" data-background="assets/img/slider/shape-bg.jpg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xxl-5 col-lg-6 col-md-6 col-sm-6">
                        
                                <div class="tpslider__content pt-20">
                                    <!-- <span class="tpslider__sub-title mb-35">Top Seller In The Week</span> -->
                                    <h4 class="tpslider__title fw-bolder mb-30">{{ $thirukkural[1]->thirukkuralFirstLine}}
                                    {{ $thirukkural[1]->thirukkuralSecondLine}}....</h4>
                                    <p class="distru">{{ $thirukkural[1]->shortDescription}}...</p>
                                    <div class="tpslider__btn">
                                        <!-- <a class="tp-btn" href="/thirukkural-view">Read More</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 col-lg-6  col-md-6 col-sm-6">
                                <div class="tpslider__thumb p-relative">
                                    <img class="tpslider__thumb-img" src="assets/img/slider/slider-bg-2.png"
                                        alt="slider-bg">
                                    <div class="tpslider__shape d-none d-md-block">
                                        <img class="tpslider__shape-one" src="assets/img/slider/slider-shape-1.png"
                                            alt="shape">
                                        <img class="tpslider__shape-two" src="assets/img/slider/slider-shape-2.png"
                                            alt="shape">
                                        <!-- <img class="tpslider__shape-three" src="assets/img/slider/slider-shape-3.png" alt="shape"> -->
                                        <img class="tpslider__shape-four" src="assets/img/slider/slider-shape-4.png"
                                            alt="shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="tpslider pt-90 pb-0 grey-bg" data-background="assets/img/slider/shape-bg.jpg">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      
                                <div class="tpslider__content pt-20">
                                    <!-- <span class="tpslider__sub-title mb-35">Top Seller In The Week</span> -->
                                    <h4 class="tpslider__title fw-bolder mb-30">{{ $thirukkural[2]->thirukkuralFirstLine}}
                                    {{ $thirukkural[2]->thirukkuralSecondLine}}....</h4>
                                    <p class="distru">{{ $thirukkural[2]->shortDescription}}...</p>
                                    <div class="tpslider__btn">
                                        <!-- <a class="tp-btn" href="/thirukkural-view">Read More</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="tpslider__thumb p-relative">
                                    <img class="tpslider__thumb-img" src="assets/img/slider/slider-bg-3.png"
                                        alt="slider-bg">
                                    <div class="tpslider__shape d-none d-md-block">
                                        <img class="tpslider__shape-one" src="assets/img/slider/slider-shape-1.png"
                                            alt="shape">
                                        <img class="tpslider__shape-two" src="assets/img/slider/slider-shape-2.png"
                                            alt="shape">
                                        <!-- <img class="tpslider__shape-three" src="assets/img/slider/slider-shape-3.png" alt="shape">
                                       <img class="tpslider__shape-four" src="assets/img/slider/slider-shape-4.png" alt="shape"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tpslider__arrow d-none  d-xxl-block">
            <button class="tpsliderarrow tpslider__arrow-prv"><i class="icon-chevron-left"></i></button>
            <button class="tpsliderarrow tpslider__arrow-nxt"><i class="icon-chevron-right"></i></button>
        </div>
        <div class="slider-pagination d-xxl-none"></div>
    </div>
</section>
<style>
h4.tpslider__title.mb-30 {
    font-size: larger;
}

.form-control {
    padding-left: 51px !important;
}
</style>