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
        <!-- Your Content Use Here -->
         <!-- breadcrumb-area-start -->
         <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-breadcrumb__content">
                        <div class="tp-breadcrumb__list">
                           <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                           <span class="dvdr">/</span>
                           <span>Wishlist</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- breadcrumb-area-end -->

         <!-- wishlist-area-start -->
         <div class="cart-area pb-80">
            <div class="container">
            <div class="row">
               <div class="col-12">
                     <form action="#">
                        <div class="table-content table-responsive">
                           <table class="table">
                                 <thead>
                                    <tr>
                                       <th class="product-thumbnail">Images</th>
                                       <th class="cart-product-name">Book Name</th>
                                       <th class="product-price">Unit Price</th>
                                       <th class="product-quantity">Quantity</th>
                                       <th class="product-subtotal">Total</th>
                                       <th class="product-add-to-cart">Add To Cart</th>
                                       <th class="product-remove">Remove</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                             <img src="https://marketplace.canva.com/EAFKA0RgDtw/1/0/1003w/canva-brown-and-orange-elegant-simple-young-adult-fantasy-book-cover-Qb8uSVdJDzw.jpg" style="width:75px;height:75px" alt="">
                                          </a>
                                       </td>
                                       <td class="product-name">
                                          <a href="shop-details.html">Three Thousand Stitches: Ordinary People, Extraordinary Lives [Paperback] Murty, Sudha</a>
                                       </td>
                                       <td class="product-price">
                                          <span class="amount">$130.00</span>
                                       </td>
                                       <td class="product-quantity">
                                             <span class="cart-minus">-</span>
                                             <input class="cart-input" type="text" value="1">
                                             <span class="cart-plus">+</span>
                                       </td>
                                       <td class="product-subtotal">
                                          <span class="amount">$130.00</span>
                                       </td>
                                       <td class="product-add-to-cart">
                                          <button class="tp-btn tp-color-btn  tp-wish-cart banner-animation">Add To Cart</button>
                                       </td>
                                       <td class="product-remove">
                                          <a href="#"><i class="fa fa-times"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="product-thumbnail">
                                          <a href="shop-details.html">
                                             <img src="https://marketplace.canva.com/EAFKA0RgDtw/1/0/1003w/canva-brown-and-orange-elegant-simple-young-adult-fantasy-book-cover-Qb8uSVdJDzw.jpg"  style="width:75px;height:75px" alt="">
                                          </a>
                                       </td>
                                       <td class="product-name">
                                          <a href="shop-details.html">Three Thousand Stitches: Ordinary People, Extraordinary Lives [Paperback] Murty, Sudha</a>
                                       </td>
                                       <td class="product-price">
                                          <span class="amount">$120.50</span>
                                       </td>
                                       <td class="product-quantity">
                                             <span class="cart-minus">-</span>
                                             <input class="cart-input" type="text" value="1">
                                             <span class="cart-plus">+</span>
                                       </td>
                                       <td class="product-subtotal">
                                          <span class="amount">$120.50</span>
                                       </td>
                                       <td class="product-add-to-cart">
                                          <button class="tp-btn tp-color-btn tp-wish-cart banner-animation">Add To Cart</button>
                                       </td>
                                       <td class="product-remove">
                                          <a href="#"><i class="fa fa-times"></i></a>
                                       </td>

                                    </tr>
                                 </tbody>
                           </table>
                        </div>
                     </form>
               </div>
            </div>
            </div>
         </div>
         <!-- wishlist-area-end-->

        <!-- Your Content End Here -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
         include "plugin/js.php";
      ?>
</body>

</html>