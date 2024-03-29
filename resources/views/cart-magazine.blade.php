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
    <style>
   /* @property --p {
      syntax: '<number>';
      inherits: true;
      initial-value: 0;
   } */

   .pie {
      --p: 20;
      --b: 22px;
      --c: #6a0000;
      --w: 90px;

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
	  radial-gradient(farthest-side, var(--c) 98%, #0000) top / var(--b) var(--b) no-repeat, conic-gradient(var(--c) calc(var(--p)* 1%), #00000042 0);
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

   /* @keyframes p {
      from {
         --p: 0;
      }
   } */

   /* body {
      background: #f2f2f2;
   } */
   h3.main-bg.text-white {
    background-color: #030355;
	}
</style>
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




        <section class="budget-chat-data pb-80">
            <div class="container">
            <!-- "category" => $val->name,
              "budget_price" => $val->amount,
              "cart_price" => $cartdata,
              "percentage" => $percentage -->
                       <div class="row">
                       @if($bud_arr  != null)
                       @foreach ($bud_arr as $val) 
							<div class="col-xl-3 col-xxl-4 col-sm-6 mt-3">
								<div class="card">
									<div class="card-header">
										<p style="font-size:14px;" class="card-title text-center">{{$val->category}}</p>
									</div>
									<div class="card-body text-center">
									<div class="item">
                                    <div class="pie no-round" style="--p:{{ $val->percentage }};--c:#6a0000;--b:15px">{{ $val->percentage }}%</div>
                                    </div>
         
									</div>
									<div class="card-footer">
										<div class="d-flex justify-content-lg-between ">
                                           <p class="text-center">Total Amount <small> ₹{{$val->budget_price}}</small></p>
											<!-- <h6><i class="fa fa-inr" aria-hidden="true"></i>  876</h6> -->
                                            <p class="text-center">Purchase Amount <small> ₹ {{$val->cart_price}}</small></p>
											<!-- <h4><i class="fa fa-inr" aria-hidden="true"></i> ₹ 9854</h4> -->
										</div>
									</div>
								</div>
							</div>
                            @endforeach
@endif
                
						</div>
                   
           </div>
        </section>
        <!-- cart area -->
        <section class="cart-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <h4> All Selected Magazine List </h4>
                     <br>

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
                                    @if($cartdata === null || $cartdata->isEmpty())
                                            <tr>
                                     <td colspan="7">No records found</td>
                                         </tr>
                                 @else

                                       
                                       @foreach($cartdata as $val)
                                       <tr id="row_{{ $val->id }}">
                                            <td class="product-thumbnail" >
                                                <a href="#">
                                                    <img src="{{ asset('Magazine/front/' . $val->front_img) }}" alt="">
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
                                                <!-- <span class="cart-minus">-</span> -->
                                                <input class="cart-input"  value="{{$val->quantity}}" data-id="{{ $val->id }}" disabled>

                                                <!-- <span class="cart-plus">+</span> -->
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">₹{{$val->totalAmount}}</span>
                                            </td>
                                            <td class="product-remove">
                                            <button class="btn btn-danger delete-btn" data-id="{{ $val->id }}"><i class="fa fa-times"></i></button>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                       @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon2">
                                            <!-- <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                                type="submit">Update cart</button> -->
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
                                        <button class="tp-btn tp-color-btn banner-animation" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Proceed to Checkout</button>

                                    </div>
                                </div>
                            </div>
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- cart area end-->

    </main>

    <!-- model -->
    <div style="z-index: 9999999;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Delivery Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
                <div class="row gx-7">
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Door Number <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Door Number" id="door_no" value="{{auth('librarian')->user()->door_no}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Street Name <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Street Name" id="street" value="{{auth('librarian')->user()->street}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Place <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Place" id="place" value="{{auth('librarian')->user()->place}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Village <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Village" id="Village" value=" {{auth('librarian')->user()->Village}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Post  <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Post"  id="post" value=" {{auth('librarian')->user()->post}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Taluk <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Taluk" id="taluk" value=" {{auth('librarian')->user()->taluk}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                      <label class="form-label">District<span class="text-danger maditory">*</span></label>
                             <select name="district" class="form-select bg-white" id="district" Required>
                                <option value="{{auth('librarian')->user()->district}}">{{auth('librarian')->user()->district}}</option>
                                     @php
                                     $districts = DB::table('districts')->where('status', '=', 1)->where('name', '!=',auth('librarian')->user()->district)->get();
                                     @endphp

                                     @foreach($districts as $state)
                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                             @endforeach
                        </select>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">PIN Code <span class="text-danger">*</span></label>
                         <input type="number" placeholder="Enter the PIN Code"  id="district" value="{{auth('librarian')->user()->pincode}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Landmark  <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Landmark" value=" {{auth('librarian')->user()->landmark}}" required>
                      </div>
                   </div>
                </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="Checkoutid">Submit</button>
        </div>
      </div>
    </div>
  </div>
    <!-- footer-area-start -->
    @include('footer.footer')
    <!-- footer-area-end -->
    <?php
    include 'plugin/js.php';
    ?>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


<script>

$(document).ready(function() {
    $('#Checkoutid').on('click', function () {
         
        var data={
                  'door_no':$('#door_no').val(),
                 'street':$('#street').val(),
                  'place':$('#place').val(),
                 'Village':$('#Village').val(),
                 'landmark':$('#landmark').val(),
                 'taluk':$('#taluk').val(),
                 'post':$('#post').val(),
                 'pincode':$('#pincode').val(),
                 'state':$('#state').val(),
                 'district':$('#district').val(),
         }

        $.ajax({
            url: '/magazineCheckout',
            method: 'GET',
            data: { '_token': '{{ csrf_token() }}','data':data},
            success: function (response) {
                if (response.success) {
                  

                   toastr.success(response.success, { timeout: 2000 });
                   setTimeout(function() {
                        window.location.href = "/cart-magazine"
                    }, 3000);

                   
                } else {
                    toastr.error(response.error, { timeout: 2000 });
                }
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
              
            }
        });
    });
});
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
            if(response.error){
                toastr.error(response.error, { timeout: 2000 });
                }
                else{
            $('#row_' + itemId + ' .product-subtotal .amount').text('₹' + response.totalAmount);
            $('#cartdatacount').text(response.cartdatacount != 0 ? response.cartdatacount : '0');

                }
           
        }
    });
}

});


</script>


</body>

</html>
