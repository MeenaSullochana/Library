<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries</title>
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

        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area grey-bg pt-50 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content text-center">
                            <h4 class="tp-breadcrumb__title"> Contact Us</h4>
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Address</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- location-area-start -->
        <div class="location-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tplocation mb-30">
                            <div class="tplocation__thumb w-img">
                                <img src="images/bg6.png" alt="">
                            </div>
                            <div class="tplocation__content">
                                <ul>
                                    <div class="row">
                                        <div class="col-md-6">
                                             <li>
                                        <a href="#"><b>Official Address </b>: Directorate of Public Libraries,
                                            737/1, Anna Salai, Chennai- 600 002, Tamil Nadu, India.
                                            </a>
                                    </li>
                                    <li>
                                        <a href="tel:044-28524263">Telephone : 044-28524263</a>                                    </a>
                                    </li>
                                    <li>
                                        <a href="tel:044-28412087">Fax : 044-28412087</a>                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:dplchn@tn.gov.in">Email : dplchn@tn.gov.in</a>
                                    </li>
                                        </div>
                                        <div class="col-md-6">
                                             <li>
                                        <a class="tplocation__button mt-15" href="https://maps.google.com/maps/dir//%E0%AE%A4%E0%AF%87%E0%AE%B5%E0%AE%A8%E0%AF%87%E0%AE%AF%E0%AE%AA%E0%AF%8D+%E0%AE%AA%E0%AE%BE%E0%AE%B5%E0%AE%BE%E0%AE%A3%E0%AE%B0%E0%AF%8D+%E0%AE%85%E0%AE%B0%E0%AE%99%E0%AF%8D%E0%AE%95%E0%AE%AE%E0%AF%8D+Old+No:742,New+No:202,+Ground+Floor+Anna+Salai,+opp.+to+TVS,+Anna+Salai+Chennai,+Tamil+Nadu+600002/@13.0585401,80.2581977,20z/data=!4m5!4m4!1m0!1m2!1m1!1s0x3a5267f821edb0bb:0xa50bd2ffb2776459">Get Directions</a>
                                    </li>
                                        </div>
                                    </div>


                                    <br>
                                    <li>
                                         <a href="#"><b>Technical Assistance:</b></a>
                                    </li>
                                    <li>
                                        <a href="#">The Chief Librarian & Information Officer,
                                            Anna Centenary Library,
                                            Kotturpuram, Chennai - 600025
                                            </a>
                                    </li>
                                    <li>
                                        <p>Email: lbrnioaclchn.dopl@tn.gov.in</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tpcontactmap mb-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d485.830062604229!2d80.2581976795314!3d13.058540093026274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267f821edb0bb%3A0xa50bd2ffb2776459!2z4K6k4K-H4K614K6o4K-H4K6v4K6q4K-NIOCuquCuvuCuteCuvuCuo-CusOCvjSDgroXgrrDgrpngr43grpXgrq7gr40!5e0!3m2!1sen!2sin!4v1710068632058!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- location-area-end -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>

</body>

</html>
