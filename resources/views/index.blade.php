<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/assets/img/logo/fevi.svg') }}">
    <?php
         include "plugin/css.php";
      ?>
</head>
<style>
    .multiline {
  display: block;
  display: -webkit-box;
  margin: 0 auto;
  width: 100%;
  color: #cf6824;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
.text-resize{
  /* background-color: #dad4d2; */
  resize: horizontal;
}
.cutm-min-slider-height {
    asd
}
button.tp-menu-toggle {
    background-color: white;
}
.tpsideinfo.tp-sidebar-opened {
    z-index: 999999;
}
.tpproduct__thumb {
    padding: 20px 20px;
    overflow: hidden;
    border-radius: 10px;
    max-width: 100% !important;
    max-height: 150px !important;
}
.custm-slide-item {
    max-height: 250px !important;
    min-height: 250px !important;
}

strong.edate {
    display: block;
    color: #d94148;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
}

strong.etime {
    display: block;
    color: #aaaaaa;
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
}

a.title_up {
    color: #222222;
    margin: 0 0 7px;
    font-weight: 600;
    line-height: 22px;
}

a.joinnow {
    background: #fafafa;
    border: 1px solid #e1e1e1;
    line-height: 28px;
    display: inline-block;
    text-transform: uppercase;
    font-size: 14px;
    color: #a0a0a0;
    padding: 0 20px;
    border-radius: 15px;
}

a.joinnow:hover {
    background: #d94148;
    border-color: #d94148;
    color: #fff;
}
.icon-new{
    width: 60px;
    height: 60px;
}
.tpproduct__thumb img {
    height: 136px !important;
}
.tpproduct__thumb img{
    width: auto !important;
}
.tpmobile-menu {
    background-color: white !important;
}
</style>
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
        <!-- slider-area-start -->
        @include("slider.slider")
        <!-- slider-area-end -->
        @php
        $categories = DB::table('special_categories') ->where('status', '=', '1')->get();
        @endphp

        @if($categories->isNotEmpty())
        <section tion class="category-area grey-bg pb-40 pt-45 ">
            <div class="container">
                <div class="swiper-container category-active">

                    <div class="swiper-wrapper">
                        @foreach($categories as $val)
                        <div class="swiper-slide custm-slide-item">
                            <div class="category__item mb-30 cover-photo shadow-lg">
                                <div class="category__thumb fix mb-15">
                                    <a href="#"><img src="{{ asset('admin/categorieImage/' . $val->categorieImage) }}"
                                            alt="category-thumb"></a>
                                </div>
                                <div class="category__content">
                                    <h5 class="category__title"><a href="#">{{$val->name}} </a></h5>
                                    <!-- <span class="category__count">05-06-22</span> -->
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>


        @endif

        <!-- category-area-end -->


        <!-- about-area-start -->
        <section class="about-area grey-bg pt-100 pb-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="tpabout__inner-thumb-2 p-relative mb-30">
                            <img class="w-100" src="/images/bg6.png" alt="">
                            <div class="tpabout__inner-thumb-shape d-none d-md-block">
                                <div class="tpabout__inner-thumb-shape-one">
                                    <!-- <img src="assets/img/shape/tree-leaf-6.png" alt=""> -->
                                    <img src="assets/img/about/12.png" alt="">
                                </div>
                                <div class="tpabout__inner-thumb-shape-two">
                                    <!-- <img src="assets/img/shape/tree-leaf-7.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tpabout__inner-2 mb-30">
                            <div class="tpabout__inner-tag mb-10 mt-2">
                                <span class="active">About us</span>
                                <span>Welcome to Book Procurement</span>
                            </div>
                            <h4 class="tpabout__inner-title-2 fs-3 mb-25">WELCOME TO DIRECTORATE OF PUBLIC LIBRARIES
                            </h4>
                            <p style="text-align:justify">The Transparent Book Procurement Portal, created by the Directorate of Public Libraries, Government of Tamil Nadu, revolutionizes the procurement process by connecting publishers, publisher cum distributors, and distributors with public libraries across Tamil Nadu. Designed to streamline submissions and enhance the selection of books, this digital platform emphasizes transparency and efficiency. It supports a wide range of books, incorporating subject expert reviews, librarian and  user review, and relies on reader forum recommendations for purchase decisions.
                            </p>
                            <!--<div class="tpabout__inner-list">-->
                            <!--    <ul>-->
                            <!--        <li><i class="icon-check"></i> Track your daily activity.</li>-->
                            <!--        <li><i class="icon-check"></i> Start a private group video call.</li>-->
                            <!--        <li><i class="icon-check"></i> All the lorem ipsum generators on the Internet.</li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- choose-area-start -->
        <section class="choose-area tpchoose__bg pb-80 grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="tpsection mb-35">
                            <h4 class="tpsection__title">Registration </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tpchoose__item text-center mb-30">
                            <div class="tpchoose__icon mb-20">
                                <img class="icon-new" src="/images/icons/user.png" alt="">
                            </div>
                            <div class="tpchoose__content">
                                <h4 class="tpchoose__title">Publisher</h4>
                                <p></p>
                                <a href="/register"
                                    class="tpchoose__details d-flex align-items-center justify-content-center text-primary">Register
                                    Now<i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tpchoose__item text-center mb-30">
                            <div class="tpchoose__icon mb-20">
                                <img class="icon-new" src="/images/icons/user.png" alt="">
                            </div>
                            <div class="tpchoose__content">
                                <h4 class="tpchoose__title">Distributor</h4>
                                <p></p>
                                <a href="/register"
                                    class="tpchoose__details d-flex align-items-center justify-content-center text-primary">Register
                                    Now<i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tpchoose__item text-center mb-30">
                            <div class="tpchoose__icon mb-20">
                                <img class="icon-new" src="/images/icons/multi.png" alt="">
                            </div>
                            <div class="tpchoose__content">
                                <h4 class="tpchoose__title">Publisher cum Distributor</h4>
                                <p></p>
                                <a href="#"
                                    class="tpchoose__details d-flex align-items-center justify-content-center text-primary">Register
                                    Now<i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="tpchoose__item text-center mb-30">
                            <div class="tpchoose__icon mb-20">
                                <img class="icon-new" src="/images/icons/user.png" alt="">
                            </div>
                            <div class="tpchoose__content">
                                <h4 class="tpchoose__title">Other user login</h4>
                                <p></p>
                                <a href="/member/login/"
                                    class="tpchoose__details d-flex align-items-center justify-content-center text-primary">Register
                                    Now<i class="icon-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- choose-area-end -->

        @php
        $homepagebooks = DB::table('homepagebooks')->where('type', '=', 'topratedbooks')->where('status', '=',
        '1')->get();
        @endphp
        @if($homepagebooks->isNotEmpty())

        <!-- product-area-start -->
        <section class="product-area grey-bg pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="tpsection mb-35">
                            <!--<h4 class="tpsection__sub-title">~ Procurement ~</h4>-->
                            <h4 class="tpsection__title">Libraries</h4>
                            <!--<p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>-->
                        </div>
                    </div>
                </div>
                <div class="tpproduct__arrow p-relative">
                    <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/1.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/1.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">Connemara Public Library</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/2.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/2.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">Connemara Public Library</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/3.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/3.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">Connemara Public Library</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/4.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/4.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">மாவட்ட கிளை நூலகம் திருவொற்றியூர்</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/5.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/5.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">Connemara Public Library</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/6.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/6.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">மாவட்ட மைய நூலகம்  புதுக்கோட்டை</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="#"><img src="/images/new/7.jpeg"
                                                alt=""></a>
                                        <a class="tpproduct__thumb-img" href="#"><img
                                                src="/images/new/7.jpeg" alt=""></a>

                                    </div>
                                    <div class="tpproduct__content">
                                        <h4 class="tpproduct__title">
                                            {{-- <a href="#">மாவட்ட மைய நூலகம் கரூர்</a> --}}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tpproduct-btn">
                        <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i class="icon-chevron-left"></i></a>
                        </div>
                        <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i
                                    class="icon-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-area-end -->
        @endif

        <!-- banner-area-start -->
        <section class="banner-area pb-60 grey-bg">
            <div class="container">
                <div class="row">
                    <img src="assets/img/banner/2.png" alt="">
                </div>
            </div>
        </section>
        <!-- banner-area-end -->
        <div class="container mt-45 mb-45">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="tpvideo__wrapper p-4">
                        <div class="tpvideo__icon mb-5">
                        @php
                        $publishers = DB::table('publishers')->count();
                        @endphp
                            <i>
                                <img src="assets/img/shape/video-dots.svg" alt=""> {{$publishers}}+
                            </i>
                        </div>
                        <div class="tpvideo__content">
                            <h4 class="tpvideo__title pt-3">Publisher</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="tpvideo__wrapper p-4">
                        <div class="tpvideo__icon mb-5">
                        @php
                        $distributors = DB::table('distributors')->count();
                        @endphp
                            <i>
                                <img src="assets/img/shape/video-dots.svg" alt=""> {{$distributors}}+
                            </i>
                        </div>
                        <div class="tpvideo__content">
                            <h4 class="tpvideo__title pt-3">Distributor</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="tpvideo__wrapper p-4">
                        <div class="tpvideo__icon ">
                        @php
                        $publisher_distributors = DB::table('publisher_distributors')->count();
                        @endphp
                            <i>
                                <img src="assets/img/shape/video-dots.svg" alt=""> {{$publisher_distributors}}+
                            </i>
                        </div>
                        <div class="tpvideo__content">
                            <h4 class="tpvideo__title pt-3">Publisher cum Distributor</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @php
        $homepagebooks = DB::table('homepagebooks')->where('type', '=', 'popularcategory')->where('status', '=',
        '1')->get();
        @endphp
        @if($homepagebooks->isNotEmpty())
        <!-- product-area-start -->
        <section class="weekly-product-area grey-bg pb-70 mt-3  pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="tpsection mb-20">
                            <h4 class="tpsection__title">Our Youtube Videos</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tpnavtab__area pb-40">

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                    aria-labelledby="nav-all-tab" tabindex="0">
                                    <div class="tpproduct__arrow p-relative">
                                        <div class="swiper-container tpproduct-active tpslider-bottom p-relative">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide cutm-min-slider-height">
                                                    <div class="tpproduct p-relative">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                                    <div class="ratio ratio-16x9">
                                                                        <iframe src="https://www.youtube.com/embed/EwIUEK-1rZ0?si=nRqzDjGWuzU35w67" title="YouTube video"
                                                                            allowfullscreen></iframe>
                                                                    </div>
                                                                    <div class="ratio ratio-16x9 tpproduct__thumb-img">
                                                                        <iframe src="https://www.youtube.com/embed/EwIUEK-1rZ0?si=nRqzDjGWuzU35w67" title="YouTube video"
                                                                            allowfullscreen></iframe>
                                                                    </div>

                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <h4 class="tpproduct__title">
                                                                <a href="#">சென்னை இலக்கியத் திருவிழா - 2023 </a>

                                                            </h4>
                                                            <div class="tpproduct__price">
                                                                <p class="small text-resize multiline">சென்னை இலக்கியத் திருவிழா - 2023 I தமிழ்க் கவிதைகளில் ஆண் மையப்பாரவை  எனும் தலைப்பில்</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                 <div class="swiper-slide">
                                                    <div class="tpproduct p-relative">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                            <div class="ratio ratio-16x9">
                                                                <iframe src="https://www.youtube.com/embed/mzJ-7Rs4N2M?si=yXDlWJ_PeyJ4H2wI" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <div class="ratio ratio-16x9 tpproduct__thumb-img">
                                                                <iframe src="https://www.youtube.com/embed/mzJ-7Rs4N2M?si=yXDlWJ_PeyJ4H2wI" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <h4 class="tpproduct__title">
                                                                <a href="#">காவிரி இலக்கியத் திருவிழா - இலக்கியத்தில் சிற்றிலக்கியங்களின் பங்களிப்பு</a>
                                                            </h4>
                                                            <div class="tpproduct__price">
                                                                <p class="small text-resize multiline">காவிரி இலக்கியத் திருவிழா - இலக்கியத்தில் சிற்றிலக்கியங்களின் பங்களிப்பு : திருமிகு.சுதீர் செந்தில்</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="tpproduct p-relative">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                            <div class="ratio ratio-16x9">
                                                                <iframe src="https://www.youtube.com/embed/AtZMZOA9xvA?si=aCG8uk7RElITdJiz" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <div class="ratio ratio-16x9 tpproduct__thumb-img">
                                                                <iframe src="https://www.youtube.com/embed/AtZMZOA9xvA?si=aCG8uk7RElITdJiz" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <h4 class="tpproduct__title">
                                                                <a href="#">சென்னை இலக்கியத் திருவிழா -2024 | திருமிகு .சுகிர்தராணி |படைப்பு அரங்கம்</a>
                                                            </h4>
                                                            <div class="tpproduct__price">
                                                                <p class="small text-resize multiline">சென்னை  இலக்கியத் திருவிழா -2024  படைப்பு அரங்கில் “ இலக்கியமும் அழகியலும்  “  எனும் தலைப்பில் திருமிகு .சுகிர்தராணி அவர்களின் சிறப்புரை</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="tpproduct p-relative">
                                                        <div class="tpproduct__thumb p-relative text-center">
                                                            <div class="ratio ratio-16x9">
                                                                <iframe src="https://www.youtube.com/embed/jfV-JFxpcFk?si=W817QuA_BEyHUCFk" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                            <div class="ratio ratio-16x9 tpproduct__thumb-img">
                                                                <iframe src="https://www.youtube.com/embed/jfV-JFxpcFk?si=W817QuA_BEyHUCFk" title="YouTube video"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="tpproduct__content">
                                                            <h4 class="tpproduct__title">
                                                                <a href="#">சென்னை இலக்கியத் திருவிழா -2024 | சங்க உழவர்கள் | திருமிகு. அறிவுமதி</a>
                                                            </h4>
                                                            <div class="tpproduct__price">
                                                                <p class="small text-resize multiline">சென்னை  இலக்கியத் திருவிழா -2024 சங்க உழவர்கள் | திருமிகு. அறிவுமதி</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tpproduct-btn">
                                            <div class="tpprduct-arrow tpproduct-btn__prv"><a href="#"><i
                                                        class="icon-chevron-left"></i></a></div>
                                            <div class="tpprduct-arrow tpproduct-btn__nxt"><a href="#"><i
                                                        class="icon-chevron-right"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="tpproduct__all-item text-center">
                            <span>Discover thousands of other quality products.
                                <a href="#">Shop All Products <i class="icon-chevrons-right"></i></a>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        @endif
        <!-- product-area-end -->

        <!-- product-coundown-area-start -->
        <!-- <section class="product-coundown-area tpcoundown__bg grey-bg pb-25"
            data-background="assets/img/banner/1.png"> -->
        <section class="product-coundown-area tpcoundown__bg grey-bg pb-25">
            <div class="container">
                <div class="row">
                    <img src="assets/img/banner/1.png" alt="">
                </div>
            </div>
        </section>
        <!-- product-coundown-area-end -->

    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>
    <script>
    $(document).ready(function() {
        var items = ["var(--tp-grey-1)", "var(--tp-grey-2)", "var(--tp-grey-3)", "var(--tp-grey-4)",
            "var(--tp-grey-5)", "var(--tp-grey-6)", "var(--tp-grey-7)", "var(--tp-grey-8)",
            "var(--tp-grey-9)"
        ];
        var index = 0;
        var color;
        $(".cover-photo").each(function() {
            if (index == items.length)
                index = 0;

            color = items[index];
            $(this).css('background', color);
            index++;
        });
    });
    </script>
</body>

</html>

