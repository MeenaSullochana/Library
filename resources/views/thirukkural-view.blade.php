<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
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

        <!-- about-area-start -->
        <section class="about-area tpabout__inner-bg pt-175 pb-170 mb-50" data-background="assets/img/banner/3.png">
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

                 <!-- blog-details-area-start -->
                 @php
                                                $thirukkural = DB::table('thirukkural')->where('status', '=', '1')->get();
                             @endphp
                  @foreach($thirukkural as $thirukkural)
                 <section class="blog-details-area pb-50">
                    <div class="container">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12">
                             <div class="tp-blog-details__wrapper">
                                <div class="tp-blog-details__content">
                                   <h2 class="tp-blog-details__title mb-25">{{$thirukkural->thirukkuralFirstLine}}</h2>
                                   <h2 class="tp-blog-details__title mb-25">{{$thirukkural->thirukkuralSecondLine}}</h2>
                                   <p>
                                   {{$thirukkural->shortDescription}}
                                   </p>
                                   <!-- <p>
                                      Large tiles were arranged on the counter top plate near the window of the living room, they were connected to the kitchen counter through the opening in the existing building wall. For me, the most important part of improving at photography has been sharing it. Sign up for an Exposure account, or post regularly to Tumblr, or both. Tell people you’re trying to get better at photography. 
                                   </p> -->
                                   <!-- <div class="tp-blog-details__quation pt-15 pb-40 text-center">
                                      <i>“  The disk at the bottom of the bowl can be turned counterclockwise to <br> drain water when washing vegetables and it can be turned.  ” </i>
                                   </div> -->
                                   <!-- <p>
                                      Form is an armless modern with a minimalistic expression. With a simple and contemporary design form Foody has a soft and welcoming silhouette and a distinctly residential look. The legs appear almost as if they are growing out of the shell. This gives the design flexibility and makes it possible to vary the frame. Unika is a mouth blown an series of small, glass pendant lamps, originally designed for the restaurant. 
                                   </p> -->
                                </div>
                                
                                <div class="tp-blog-details__content">
                                   <p>
                                   {{$thirukkural->longDescription}}
                                   </p>
                                   <!-- <p>
                                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione sequi nesciunt. They’ll come on photo walks with you.
                                   </p> -->
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </section>
                 <br>
@endforeach
                 <!-- blog-details-area-end -->
                 
               

    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>
</body>

</html>