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
                                <span class="tp-breadcrumb__active"><a href="/librarian/index">Dashborad</a></span>
                                <span class="dvdr">/</span>
                                <a href="/product-two"><span>Website Home</span></a>
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
                                    <h3 class="tpdetails__title">Magazine Title: {{$data->title}}
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
                                                        <img src="{{ asset('Magazine/front/' . $data->front_img) }}"
                                                            alt="No Image">
                                                        <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-profile" role="tabpanel"
                                                        aria-labelledby="nav-profile-tab" tabindex="0">
                                                        <img src="{{ asset('Magazine/back/' . $data->back_img) }}"
                                                            alt="No Image">
                                                        <div class="tpproduct__info bage">
                                                            <span
                                                                class="tpproduct__info-discount bage__discount">-90%</span>
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade w-img" id="nav-contact" role="tabpanel"
                                                        aria-labelledby="nav-contact-tab" tabindex="0">
                                                        <img src="{{ asset('Magazine/full/' . $data->full_img) }}"
                                                            alt="No Image">
                                                        <div class="tpproduct__info bage">
                                                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <nav>
                                                    <div class="nav nav-tabs justify-content-center" id="nav-tab"
                                                        role="tablist">
                                                        <button class="nav-link active" id="nav-home-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-home"
                                                            type="button" role="tab" aria-controls="nav-home"
                                                            aria-selected="true">
                                                            <img src="{{ asset('Magazine/front/' . $data->front_img) }}"
                                                                alt="No Image">
                                                        </button>
                                                        <button class="nav-link" id="nav-profile-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-profile"
                                                            type="button" role="tab" aria-controls="nav-profile"
                                                            aria-selected="false">
                                                            <img src="{{ asset('Magazine/back/' . $data->back_img) }}"
                                                                alt="No Image">
                                                        </button>
                                                        <button class="nav-link" id="nav-contact-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-contact"
                                                            type="button" role="tab" aria-controls="nav-contact"
                                                            aria-selected="false">
                                                            <img src="{{ asset('Magazine/full/' . $data->full_img) }}"
                                                                alt="No Image">
                                                        </button>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product__details">
                                                <div class="product__details-price-box">
                                                    <h5 class="product__details-price">₹ {{$data->annual_cost_after_discount}}</h5>
                                                    <ul class="product__details-info-list">
                                                    <li> Magazine Title: {{$data->title}}</li>
                                                              <li>Language: {{$data->language}}</li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-cart">
                                                    <div
                                                        class="product__details-quantity d-flex align-items-center mb-15">
                                                        <b>Qty:</b>
                                                        <div class="product__details-count mr-10">
                                                            <span class="cart-minus"><i
                                                                    class="far fa-minus"></i></span>
                                                            <input class="tp-cart-input" type="text"
                                                                value="{{$data->quantity}}" id="quantity_{{$data->id}}">
                                                            <span class="cart-plus"><i class="far fa-plus"></i></span>
                                                        </div>
                                                        <div class="product__details-btn">
                                                        <button class="tp-btn-2 mb-5 Add-to-cart" data-id="{{$data->id}}">Add to cart</button>
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
                                                       
                                                        <li>Category: <span>{{$data->category}}</span></li>
                                                        <li>Periodicity: <span>{{$data->periodicity}}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="product__details-payment text-center">
                                                    <img src="https://cdn.shopify.com/s/files/1/0280/8365/0642/files/Add_a_heading_480x480.png"
                                                        alt="">
                                                    <button class="btn btn-primary">
                                                        <span class="btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#modalId"><i class="fa fa-book"></i> Read Sample PDF</span></button>

                                                    <!-- Modal Body -->
                                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                    <div class="modal fade" id="modalId" tabindex="-1"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        role="dialog" aria-labelledby="modalTitleId"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalTitleId">
                                                                        Read Sample Pdf
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <iframe
                                                                        src="http://docs.google.com/gview?url=http://www.pdf995.com/samples/pdf.pdf&embedded=true"
                                                                        style="width:100%; height:1000px;"
                                                                        frameborder="0"></iframe>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tpdescription__box">
                                <div
                                    class="tpdescription__box-center d-flex align-items-center justify-content-center">
                                    <nav>
                                        <div class="nav nav-tabs" role="tablist">
                                            <button class="nav-link active" id="nav-description-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-description" type="button"
                                                role="tab" aria-controls="nav-description"
                                                aria-selected="true">Magazine Description</button>
                                            <!-- <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-information" type="button" role="tab"
                                                aria-controls="nav-information" aria-selected="false">Addition
                                                information</button> -->
                                        </div>
                                    </nav>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab" tabindex="0">
                                        <!-- <div class="tpdescription__content">
                                            <p>Designed by Puik in 1949 as one of the first models created especially
                                                for Carl Hansen & Son, and produced since 1950. The last of a series of
                                                chairs wegner designed based on inspiration from antique chinese
                                                armchairs. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                qui officia eserunt mollit anim id est laborum. Sed ut perspiciatis unde
                                                omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                                totam rem aperiam, aque ipsa quae ab illo inventore veritatis et quasi
                                                architecto beatae vitae dicta sunt explicabo. </p>
                                        </div> -->
                                        <div
                                            class="tpdescription__product-wrapper mt-30 mb-30 d-flex justify-content-between align-items-center">
                                            <div class="tpdescription__product-info">
                                                <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                                <ul class="tpdescription__product-info">
                                                    <li>Magazine Title: {{$data->title}}</li>
                                                    <li>Category: {{$data->category}}</li>
                                                    <li>Language: {{$data->language}}</li>
                                                    <li>Periodicity: {{$data->periodicity}}</li>
                                                    <li>Peice: {{$data->annual_cost_after_discount}}</li>
                                                    <li>Rni: {{$data->rni_details}}</li>
                                                    <li>Total Pages: {{$data->total_pages}}</li>
                                                    <li>Total Multicolour Pages: {{$data->total_multicolour_pages}}</li>
                                                    <li>Total Monocolour Pages: {{$data->total_monocolour_pages}}</li>
                                                    <li>Paper Quality: {{$data->paper_quality}}</li>
                                                    <li>Magazine Size: {{$data->magazine_size}}</li>


                                                    
                                                    
                                                </ul>
                                                <!-- <p>Lemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    <br> fugit, sed quia consequuntur magni dolores eos qui ratione
                                                    voluptatem <br> sequi nesciunt.
                                                </p> -->
                                            </div>
                                            <div class="tpdescription__product-thumb">
                                                <img src="https://everyday-reading.com/wp-content/uploads/2015/01/Bestof2014-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- <div class="tpdescription__video">
                                            <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                            <p>Form is an armless modern chair with a minimalistic expression. With a
                                                simple and contemporary design Form Chair has a soft and welcoming
                                                ilhouette and a distinctly residential look. The legs appear almost as
                                                if they are growing out of the shell. This gives the design flexibility
                                                and makes it possible to vary the frame. Unika is a mouth blown series
                                                of small, glass pendant lamps, originally designed for the Restaurant
                                                Gronbech. Est eum itaque maiores qui blanditiis architecto. Eligendi
                                                saepe rem ut. Cumque quia earum eligendi. </p>
                                            <div class="tpdescription__video-wrapper p-relative mt-30 mb-35 w-img">
                                                <img src="assets/img/product/product-video1.jpg" alt="">
                                                <div class="tpvideo__video-btn">
                                                    <a class="tpvideo__video-icon popup-video"
                                                        href="https://www.youtube.com/watch?v=rLrV5Tel7zw">
                                                        <i>
                                                            <svg width="20" height="22" viewBox="0 0 20 22"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15.6499 6.58886L15.651 6.58953C17.8499 7.85553 18.7829 9.42511 18.7829 10.8432C18.7829 12.2613 17.8499 13.8308 15.651 15.0968L15.6499 15.0975L12.0218 17.195L8.3948 19.2919C8.3946 19.292 8.3944 19.2921 8.3942 19.2922C6.19546 20.558 4.36817 20.5794 3.13833 19.8697C1.9087 19.1602 1.01562 17.5694 1.01562 15.0382V10.8432V6.64818C1.01562 4.10132 1.90954 2.51221 3.13721 1.80666C4.36609 1.1004 6.1936 1.12735 8.3942 2.39416C8.3944 2.39428 8.3946 2.3944 8.3948 2.39451L12.0218 4.49135L15.6499 6.58886Z"
                                                                    stroke="white" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                            <h5 class="tpdescription__product-title">Product supreme quality</h5>
                                            <p>Form is an armless modern chair with a minimalistic expression. With a
                                                simple and contemporary design Form Chair has a soft and welcoming
                                                ilhouette and a distinctly residential look. The legs appear almost as
                                                if they are growing out of the shell. This gives the design flexibility
                                                and makes it possible to vary the frame. Unika is a mouth blown series
                                                of small, glass pendant lamps, originally designed for the Restaurant
                                                Gronbech. Est eum itaque maiores qui blanditiis architecto. Eligendi
                                                saepe rem ut. Cumque quia earum eligendi. </p>
                                            <p>Duis semper erat mauris, sed egestas purus commodo. Cras imperdiet est in
                                                nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt.
                                                Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                in voluptate.</p>
                                        </div> -->
                                    </div>
                                    <!-- <div class="tab-pane fade" id="nav-information" role="tabpanel"
                                        aria-labelledby="nav-info-tab" tabindex="0">
                                        <div class="tpdescription__content">
                                            <p>Designed by Puik in 1949 as one of the first models created especially
                                                for Carl Hansen & Son, and produced since 1950. The last of a series of
                                                chairs wegner designed based on inspiration from antique chinese
                                                armchairs. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                qui officia eserunt mollit anim id est laborum. Sed ut perspiciatis unde
                                                omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                                totam rem aperiam, aque ipsa quae ab illo inventore veritatis et quasi
                                                architecto beatae vitae dicta sunt explicabo. </p>
                                        </div>
                                        <div
                                            class="tpdescription__product-wrapper mt-30 mb-30 d-flex justify-content-between align-items-center">
                                            <div class="tpdescription__product-info">
                                                <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                                <ul class="tpdescription__product-info">
                                                    <li>Material: Plastic, Wood</li>
                                                    <li>Legs: Lacquered oak and black painted oak</li>
                                                    <li>Dimensions and Weight: Height: 80 cm, Weight: 5.3 kg</li>
                                                    <li>Length: 48cm</li>
                                                    <li>Depth: 52 cm</li>
                                                </ul>
                                                <p>Lemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    <br> fugit, sed quia consequuntur magni dolores eos qui ratione
                                                    voluptatem <br> sequi nesciunt.
                                                </p>
                                            </div>
                                            <div class="tpdescription__product-thumb">
                                                <img src="assets/img/product/product-single-1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="tpdescription__video">
                                            <h5 class="tpdescription__product-title">PRODUCT DETAILS</h5>
                                            <p>Form is an armless modern chair with a minimalistic expression. With a
                                                simple and contemporary design Form Chair has a soft and welcoming
                                                ilhouette and a distinctly residential look. The legs appear almost as
                                                if they are growing out of the shell. This gives the design flexibility
                                                and makes it possible to vary the frame. Unika is a mouth blown series
                                                of small, glass pendant lamps, originally designed for the Restaurant
                                                Gronbech. Est eum itaque maiores qui blanditiis architecto. Eligendi
                                                saepe rem ut. Cumque quia earum eligendi. </p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <div class="tpsidebar pb-30">
                        @php
                     $magazines = DB::table('magazines')
                   ->where('id', '!=', $data->id)
                   ->where('category', $data->category)
                   ->orderBy('created_at', 'asc')
                   ->take(5) 
                   ->get();
                    @endphp

                        @foreach( $magazines as $val)
                            <div class="tpsidebar__product">
                                <h4 class="tpsidebar__title mb-15">Recent Products</h4>
                                <div class="tpsidebar__product-item">
                                    <div class="tpsidebar__product-thumb p-relative">
                                    <a href="/shope-magazine/{{$val->id}}">
                                        <img src="{{ asset('Magazine/front/' . $val->front_img) }}"
                                            alt="No Image">
                                        <div class="tpsidebar__info bage">
                                            <!-- <span class="tpproduct__info-hot bage__hot">HOT</span> -->
                                        </div>
                                    </div>
                                    <div class="tpsidebar__product-content">
                                        <span class="tpproduct__product-category">
                                            <a href="/shope-magazine/{{$val->id}}">{{$val->category}}</a>,
                                            <a href="/shope-magazine/{{$val->id}}">{{$val->language}}</a>,
                                    
                                        </span>
                                        <h4 class="tpsidebar__product-title">
                                            <a href="/shope-magazine/{{$val->id}}">Magazine Title: {{$val->title}}</a>
                                        </h4>
                                        <div class="tpproduct__price">
                                        <span>₹{{$val->annual_cost_after_discount}}</span>

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
                           $magazine = DB::table('magazines')
                           ->where('id','!=', $data->id)
                           ->where('category', $data->category)
                           ->orderBy('created_at', 'Asc')
                            ->get();
                       @endphp
                        @foreach( $magazine as $val)
                            <div class="swiper-slide">
                                <div class="tpproduct p-relative">
                                    <div class="tpproduct__thumb p-relative text-center">
                                        <a href="/shope-magazine/{{$val->id}}"><img
                                                src="{{ asset('Magazine/front/' . $val->front_img) }}"
                                                alt="No Image"></a>
                                        <a class="tpproduct__thumb-img" href="/shope-magazine/{{$val->id}}"><img
                                                src="{{ asset('Magazine/back/' . $val->back_img) }}"
                                                alt="No Image"></a>
                                        <div class="tpproduct__info bage">
                                            <!-- <span class="tpproduct__info-discount bage__discount">-50%</span>
                                            <span class="tpproduct__info-hot bage__hot">HOT</span> -->
                                        </div>
                                        <div class="tpproduct__shopping">
                                            <a class="tpproduct__shopping-wishlist" href="wishlist.html"><i
                                                    class="icon-heart icons"></i></a>
                                            <a class="tpproduct__shopping-wishlist" href="/shope-magazine/{{$val->id}}"><i
                                                    class="icon-layers"></i></a>
                                            <!-- <a class="tpproduct__shopping-cart" href="#"><i
                                                    class="icon-eye"></i></a> -->
                                        </div>
                                    </div>
                                    <div class="tpproduct__content">
                                        <span class="tpproduct__content-weight">
                                        <a href="shop-details-3.html">{{$val->category}}</a>,
                                       <a href="shop-details-3.html">{{$val->language}}</a>
                                        </span>
                                        
                                        <h4 class="tpproduct__title">
                                            <a href="shop-details-top-.html">Magazine Title: {{$val->title}}</a>
                                        </h4>
                                        <div class="tpproduct__price">
                                            <span>₹{{$val->annual_cost_after_discount}}</span>
                                            <!-- <del>₹19.00</del> -->
                                        </div>
                                    </div>
                                    <div class="tpproduct__hover-text">
                                        <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                        <button class="tp-btn-2 Add-to-cart1" data-id1="{{$val->id}}">Add to cart</button>

                                  

                                        </div>
                                        <div class="tpproduct__descrip">
                                            <ul>
                                            <li>Category: {{$val->category}}</li>
                                            <li>Periodicity: {{$val->periodicity}}</li>
                                            </ul>
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
        <!-- product-area-end -->

    </main>

   
    @include('footer.footer')

    
    <?php
    include 'plugin/js.php';
    ?>
<script>
$(document).ready(function(){
    $('.Add-to-cart1').click(function(){
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
$(document).ready(function() {
    $('.Add-to-cart').click(function() {
        var productId = $(this).data('id');
        var quantity = $('#quantity_' + productId).val();
        console.log(quantity);
        console.log(productId);
        updateCart(productId, quantity);
    });

    function updateCart(productId, quantity) {
        $.ajax({
            type: "POST",
            url: "updatecart", 
            data: {
                '_token': '{{ csrf_token() }}',
                'id': productId,
                'quantity': quantity
            },
            success: function(response) {
                if (response.success) {
                    if(response.magazinecartcount){
                    $('#magazinecartcount').text(response.magazinecartcount);

                }
                } else {
                    toastr.error(response.error, { timeout: 2000 });

                }
            },
            error: function(xhr, status, error) {
              
            }
        });
    }
    
});
</script>
</body>

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

</html>
