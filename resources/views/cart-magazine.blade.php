<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php
    include 'plugin/css.php';
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
        @include('header.top_header')
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->

        @include('header.middile_navigation')
        @include('header.navigation')
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->

        @include('header.mobile_navigation')
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->

    <main>


        <!-- breadcrumb-area-start -->
        <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                            <div class="tp-breadcrumb__list">
                                <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                                <span class="dvdr">/</span>
                                <span>Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        @php
           $dataPoints = array(
                array("label"=> "Children", "y"=> 284935),
                array("label"=> "Competitive", "y"=> 256548),
                array("label"=> "Economics", "y"=> 245214),
                array("label"=> "Entertainment", "y"=> 233464),
                array("label"=> "General", "y"=> 200285),
                array("label"=> "Health", "y"=> 194422),
                array("label"=> "Literature", "y"=> 180337),
                array("label"=> "Religion", "y"=> 172340),
                array("label"=> "Science & Technology", "y"=> 118187),
                array("label"=> "Sports", "y"=> 107530),
                array("label"=> "Women", "y"=> 107530)
            );
        @endphp 
        <section class="budget-chat-data pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area -->
        <section class="cart-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Courses</th>
                                            <th class="cart-product-name">Subject</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @for ($i=0;$i<10;$i++)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="https://everyday-reading.com/wp-content/uploads/2015/01/Bestof2014-1.jpg" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">Summer Breakfast For Healthy Morning</a>
                                            </td>
                                            <td>
                                                children
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">₹130.00</span>
                                            </td>
                                            <td class="product-quantity">
                                                <span class="cart-minus">-</span>
                                                <input class="cart-input" type="text" value="1">
                                                <span class="cart-plus">+</span>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">₹130.00</span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endfor
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon2">
                                            <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                                type="submit">Update cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-5 ">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul class="mb-20">
                                            <li>Subtotal <span>₹250.00</span></li>
                                            <li>Total <span>₹250.00</span></li>
                                        </ul>
                                        <a href="checkout.html" class="tp-btn tp-color-btn banner-animation">Proceed to
                                            Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area end-->
    </main>

    <!-- footer-area-start -->
    @include('footer.footer')
    <!-- footer-area-end -->
    <?php
    include 'plugin/js.php';
    ?>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     exportEnabled: true,
     theme: "light1", // "light1", "light2", "dark1", "dark2"
     title:{
         text: "Budget for magazine procurement - 2024"
     },
     axisY:{
         includeZero: true
     },
     data: [{
         type: "column", //change type to bar, line, area, pie, etc
         //indexLabel: "{y}", //Shows y value on all Data Points
         indexLabelFontColor: "#5A5757",
         indexLabelPlacement: "outside",   
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
        </script>
</body>

</html>
