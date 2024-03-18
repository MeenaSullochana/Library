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
      <!-- <div class="container">
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         
            <strong>!Sorry</strong> Can't Purchase Because Your Limit End
         </div>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         
            <strong>!Sucess</strong> Your Cart Item List here
         </div>
      </div> -->
      
      <!-- Total Leval For Buy item -->
      <section class="cart-item-leval text-center bg-gray">
         <div class="container">
            <h3 class="text-secondary text-start p-3 fs-4 p-4 fw-bold">Purchase Category Level</h3>
            <div class="d-flex-wrap align-items-center row" id="budArrContainer">
            @php
             $bud_arr = Session::get('bud_arr');
             $total = Session::get('total');
            @endphp

            @foreach($bud_arr as $val)
               <div class="item col-sm-6 col-md-6 col-lg-3 card rounded p-2 max-h-350 m-2">
                  <p>{{ $val->category }}</p>
                 <div class="pie animate no-round" style="--p:{{ $val->percentage }}">{{ $val->percentage }}</div>
                 <p class="p-0 m-0">Allotted Amount : {{$val->budget_price}}</p>
                 <p>Purchased Amount : {{$val->cart_price}}</p> 
                </div>
         @endforeach
            </div>
         </div>
      </section>
      <!--End Total Leval For Buy item -->
      <!-- cart area -->
      <section class="cart-area pb-80">
         <div class="container">
            <h3 class="p-3">Cart Section</h3>
            <div class="row">
               <div class="col-12">
                  <form action="#">
                     <div class="table-content table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th class="product-thumbnail">Images</th>
                                 <th class="cart-product-name">Book Name</th>
                                 <th class="cart-product-name">Category</th>
                                 <th class="product-price">Unit Price</th>
                                 <th class="product-quantity">Quantity</th>
                                 <th class="product-subtotal">Total</th>
                                 <th class="product-remove">Remove</th>
                              </tr>
                           </thead>
                           <tbody>
                           @forelse($cart ?? [] as $key => $val)
        <tr>
            <td class="product-thumbnail">
                <a href="shope.php">
                    <img src="{{ asset('Books/front/' . $val['image']) }}" style="width:75px;height:75px" alt="">
                </a>
            </td>
            <td class="product-name" style="width:250px">
                <a href="shope.php">{{ $val['name'] }}</a>
            </td>
            <td class="Category-name">
                <span class="Category">{{ $val['subject'] }}</span>
            </td>
            <td class="unitprice">
                <input class="unit-price" type="text" value="{{ $val['price'] }}" hidden>
                <input class="productid" type="text" value="{{ $val['id'] }}" hidden>
                <span class="amount">{{ $val['price'] }}</span>
            </td>
            <td class="product-quantity">
                <span class="cart-minus">-</span>
                <input class="cart-input" type="text" value="{{ $val['qty'] }}">
                <span class="cart-plus ">+</span>
            </td>
            <td class="product-subtotal">
                <span class="amount product-price">{{ $val['price'] * $val['qty'] }}</span>
            </td>
            <td class="product-remove">
                <a href="/product/destroy/cart/{{ $val['id'] }}"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No items in the cart</td>
        </tr>
        @endforelse
                           </tbody>
                        </table>
                     </div>
                     <!-- <div class="row">
                        <div class="col-12">
                           <div class="coupon-all">
                              <div class="coupon">
                                 <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                 <button class="tp-btn tp-color-btn banner-animation" name="apply_coupon" type="submit">Apply
                                    Coupon</button>
                              </div>
                              <div class="coupon2">
                                 <button class="tp-btn tp-color-btn banner-animation" name="update_cart" type="submit">Update cart</button>
                              </div>
                           </div>
                        </div>
                     </div> -->
                     <div class="row mx-auto">
                        <div class="col-md-5 ">
                           <div class="cart-page-total">
                              <h2>Cart totals</h2>
                              <ul class="mb-20" id="total">
                                 <!-- <li>Subtotal <span>0</span></li> -->
                                 <li>Total <span>{{$total}}</span></li>
                              </ul>
                              <a href="/checkout" class="tp-btn tp-color-btn banner-animation">Proceed to Checkout</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- cart area end-->

      <!-- Your Content End Here -->
   </main>

   <!-- footer-area-start -->
   @include("footer.footer")
   <!-- footer-area-end -->
   <?php
   include "plugin/js.php";
   ?>
</body>
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>


@endif
<script>
   $(document).ready(function() {
    // Plus button click event
    $('.cart-plus').on('click', function() {
        var input = $(this).siblings('.cart-input');
        var currentValue = parseInt(input.val());
        updateTotalPrice(input);
        updateSession(input);
    });

    // Minus button click event
    $('.cart-minus').on('click', function() {
        var input = $(this).siblings('.cart-input');
        var currentValue = parseInt(input.val());
        if (currentValue >= 1) {
            updateTotalPrice(input);
            updateSession(input);
        }
    });

    // Function to update total price
    function updateTotalPrice(input) {
        var unitPriceElement = input.closest('tr').find('.unit-price');
        var unitPriceValue = unitPriceElement.val();
        var unitPrice = parseFloat(unitPriceValue);
        var quantity = parseInt(input.val()); 
        var totalPrice = unitPrice * quantity; 
        input.closest('tr').find('.product-price').text(totalPrice); 
    }


    function updateSession(input) {
        var id = input.closest('tr').find('.productid').val();
        var quantity = input.val();

        $.ajax({
    url: '/product/update/cart',
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
        _token: $('meta[name="csrf-token"]').attr('content'), // Alternative way to include CSRF token
        id: id,
        quantity: quantity
    },
    success: function(response) {
      if(response.success != "true"){
         toastr.error(response.msg,{timeout:25000});
      }
  
     
             $('#budArrContainer').empty();

                // Populate the container with the updated session data
                response.bud_arr.forEach(function(val) {
                    $('#budArrContainer').append(
                        // `<div class="item">
                        //     <p>${val.category}</p>
                        //     <div class="pie animate no-round" style="--p:${val.percentage}">${val.percentage}</div>
                        //     <p>Allotted Amount : ${val.budget_price}</p>
                        //     <p>Purchased Amount : ${val.cart_price}</p>
                        //     </div>`

               ` <div class="item col-sm-6 col-md-6 col-lg-3 card rounded p-2 max-h-350 m-2">
                  <p>${val.category}</p>
                 <div class="pie animate no-round" style="--p:${val.percentage}">${val.percentage}</div>
                 <p class="p-0 m-0">Allotted Amount : ${val.budget_price}</p>
                 <p>Purchased Amount : ${val.cart_price}</p> 
                </div>`
                    );
                });

                $('#total').html(`<li>Total <span>${response.total}</span></li>`);
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
});
    }

    // On input change event
    $('.cart-input').on('input', function() {
        updateTotalPrice($(this));
    });
});
</script>
<style>
   .bg-gray{
      background-color: #f2f2f6;
   }
   @property --p {
      syntax: '<number>';
      inherits: true;
      initial-value: 0;
   }

   .pie {
      --p: 20;
      --b: 22px;
      --c: darkred;
      --w: 150px;

      width: var(--w);
      aspect-ratio: 1;
      position: relative;
      display: inline-grid;
      margin: 5px;
      place-content: center;
      font-size: 25px;
      font-weight: bold;
      font-family: sans-serif;
   }

   .pie:before,
   .pie:after {
      content: "";
      position: absolute;
      border-radius: 50%;
   }

   .pie:before {
      inset: 0;
      background:
         radial-gradient(farthest-side, var(--c) 98%, #0000) top/var(--b) var(--b) no-repeat,
         conic-gradient(var(--c) calc(var(--p)*1%), #0000 0);
      -webkit-mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
      mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
   }

   .pie:after {
      inset: calc(50% - var(--b)/2);
      background: var(--c);
      transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
   }

   .animate {
      animation: p 1s .5s both;
   }

   .no-round:before {
      background-size: 0 0, auto;
   }

   .no-round:after {
      content: none;
   }
   .max-h-350{
      max-height: 310px;
      min-height: 310px;
   }
   @keyframes p {
      from {
         --p: 0
      }
   }
   .d-flex-wrap{
      display: flex !important;
    justify-content: space-evenly;
    flex-wrap: wrap;
    flex-direction: row;
    align-content: center;
    align-items: stretch;
   }
   .cart-area{
      padding-bottom: 80px;
    background-color: #f2f2f6;
    margin-top: 10px;
    margin-bottom: 10px;
   }
</style>

</html>
