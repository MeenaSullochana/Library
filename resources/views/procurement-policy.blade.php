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

        <!-- about-area-start -->
        <section class="about-area tpabout__inner-bg pt-75 pb-170 mb-50" data-background="assets/img/banner/2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tpabout__inner text-center">
                            <!-- <h5 class="tpabout__inner-sub mb-15">About for Orfarm</h5>
                            <h3 class="tpabout__inner-title mb-35">Unique People</h3>
                            <p>Over 25 years of experience, we have crafted thousands of strategic discovery process
                                that <br> enables us to peel back the layers which enable us to understand, connect.</p> -->
                            <div class="tpabout__inner-btn mt-4">
                                {{-- <a href="procurement-policy">Procurement Policy</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

       <section>
                <h2 class="pt-25 text-center fw-bolder">Directorate of Public Libraries Transparent Book Procurement Policy</h2>
             <iframe src="/assets/pdf/Book Procurement Policy Document.pdf" frameborder="0" height="900px" width="100%"></iframe> 
             {{-- <h2 class="pt-25 text-center fw-bolder">English DPL Transparent Book Procurement Policy</h2>
             <iframe src="/assets/pdf/english.pdf" frameborder="0" height="900px" width="100%"></iframe>  --}}
       </section>

	<section>
 	</section>

    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>
</body>

</html>
<style>
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
section.about-area.tpabout__inner-bg.pt-75.pb-170.mb-50 {
    padding: 42px !important;
}
}

</style>
