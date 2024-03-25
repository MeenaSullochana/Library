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
                                <span class="tp-breadcrumb__active"><a href="/">Home</a></span>
                                <span class="dvdr">/</span>
                                <a href="/product-two"><span>Website Home</span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        
        @php
    $dataPoints = array();
    foreach ($magazinebudget->CategorieAmount1 as $category) {
        $dataPoints[] = array("label"=> $category->name, "y"=> $category->amount);
    }
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
                       
                            <div class="table-content table-responsive" >
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
                                    <!-- cartdata -->
                                       @foreach($cartdata as $val)
                                       <tr id="row_{{ $val->id }}">
                                            <td class="product-thumbnail" >
                                                <a href="#">
                                                    <img src="https://everyday-reading.com/wp-content/uploads/2015/01/Bestof2014-1.jpg" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">{{$val->title}}</a>
                                            </td>
                                            <td>
                                            {{$val->category}}
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">₹{{$val->amount}}</span>
                                            </td>
                                            <td class="product-quantity">
                                                <span class="cart-minus">-</span>
                                                <input class="cart-input" type="text" value="{{$val->quantity}}" data-id="{{ $val->id }}">
                                                <span class="cart-plus">+</span>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">₹{{$val->totalAmount}}</span>
                                            </td>
                                            <td class="product-remove">
                                            <button class="btn btn-danger delete-btn" data-id="{{ $val->id }}"><i class="fa fa-times"></i></button>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                       
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
                                            <!-- <li>Subtotal <span>₹250.00</span></li> -->
                                            <li>Total <span id="cartdatacount">₹{{$cartdatacount}}</span></li>
                                        </ul>
                                        <a href="checkout.html" class="tp-btn tp-color-btn banner-animation">Proceed to
                                            Checkout</a>
                                    </div>
                                </div>
                            </div>
                    
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
    var currentYear = <?php echo date('Y'); ?>;
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title:{
            text: "Budget for magazine procurement - " + currentYear
        },
        axisX:{
            title: "Categories", 
            interval: 1,
            labelAngle: 0 
        },
        axisY:{
            title: "Budget (in INR)", // Y-axis label
            includeZero: true
        },
        data: [{
            type: "column", 
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",   
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>

<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function () {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/delete-to-cart',
            method: 'POST',
            data: { '_token': '{{ csrf_token() }}', 'id': id },
            success: function (response) {
                if (response.success) {
                    $('#row_' + id).remove();

                   toastr.success(response.success, { timeout: 2000 });
                   $('#magazinecartcount').text(response.magazinecartcount != 0 ? response.magazinecartcount : '0');
                   $('#cartdatacount').text(response.cartdatacount != 0 ? response.cartdatacount : '0');

                   
                } else {
                    toastr.error('Failed to delete item', { timeout: 2000 });
                }
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
                toastr.error('Error occurred while deleting item', { timeout: 2000 });
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
   
    $('.cart-plus').click(function() {
        var input = $(this).siblings('.cart-input');
        var quantity = parseInt(input.val());
        var itemId = input.data('id');
        updateCart(itemId, quantity, input);
       
    });

    $('.cart-minus').click(function() {
        var input = $(this).siblings('.cart-input');
        var quantity = parseInt(input.val());
        if (quantity < 1) return;
    var itemId = input.data('id');
    updateCart(itemId, quantity, input);
    });
    
    function updateCart(itemId, quantity, input) {
    $.ajax({
        type: "POST",
        url: "/updateQuantity",
        data: {
            '_token': '{{ csrf_token() }}',
            'id': itemId,
            'quantity': quantity
        },
        success: function(response) {
           
            $('#row_' + itemId + ' .product-subtotal .amount').text('₹' + response.totalAmount);
            $('#cartdatacount').text(response.cartdatacount != 0 ? response.cartdatacount : '0');


           
        }
    });
}

});


</script>


</body>

</html>
