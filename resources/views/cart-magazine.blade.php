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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                <a href="/librarian/index">Dashborad</a></span>
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
                       <div class="row">
                       @if($bud_arr  != null)
                       @foreach ($bud_arr as $val) 
                      
							<div class="col-xl-3 col-xxl-4 col-sm-6 mt-3">
                            <a  href="/product-two">
								<div class="card">
									<div class="card-header">
										<p style="font-size:14px;" class="card-title text-center">{{$val->category}}</p>
                                        <p style="font-size:14px;" class="card-title text-center">Total Amount <small> ₹{{$val->budget_price}}</small></p>

									</div>
                                    
									<div class="card-body text-center">
									<div class="item">
                                    <div class="pie no-round" style="--p:{{ $val->percentage }};--c:#6a0000;--b:15px">{{ $val->percentage }}%</div>
                                    </div>
         
									</div>
									<div class="card-footer">
										<div class="d-flex justify-content-lg-between ">
                                           <p class="text-center">Remaining Amount <small> <i class="fa fa-rupee"></i> {{ $val->budget_price  - $val->cart_price}}</small></p>
											<!-- <h6><i class="fa fa-inr" aria-hidden="true"></i>  876</h6> -->
                                            <p class="text-center">Purchased Amount <small> <i class="fa fa-rupee"></i> {{$val->cart_price}}</small></p>
											<!-- <h4><i class="fa fa-inr" aria-hidden="true"></i> ₹ 9854</h4> -->
										</div>
									</div>
								</div>
                                </a>
							</div>

                            @endforeach
@endif
                
						</div>
                   
           </div>
        </section>
        <!-- cart area -->
        <section class="container card cart-area pb-80 bg-gray-500">
                <div class="row">
                    <div class="col-12">
                    <h4> All Selected Magazine List </h4>
                     <br>

                            <div class="table-content table-responsive" >
                               
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="cart-product-name">Magazine Title</th>
                                            <th class="cart-product-name">Subject</th>
                                            <th class="product-price">Unit Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($cartdata === null )
                                            <tr>
                                     <td colspan="7">No records found</td>
                                         </tr>
                                 @else

                                       
                                       @foreach($cartdata as $val)
                                       <tr id="row_{{ $val->id }}">
                                            <td class="product-thumbnail" >
                                                <a href="#">
                                                    <img style="width:75px;hight:75px;" src="{{ asset('Magazine/front/' . $val->image) }}" alt="">
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
                                         <a href="/cartpdfview">   <button class="btn btn-info""  type="submit"><i class="fa fa-file-pdf"></i> Generate PDF</button> </a>
                                        <button class="btn btn-dark" id="exceldata" type="submit"><i class="fa fa-file-excel"></i> Download Excel</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-7" id="amountdata">
                                    <p class="p-0 m-0" id="TotalBudget">Total Budget Allocated Amount: <i class="fa fa-rupee"></i><b>{{$totalbudgetcount}}</b></p>
                                    <p class="p-0 m-0" id="SelectedAmount">Selected Amount: <i class="fa fa-rupee"></i><b>{{$cartdatacount}}</b></p>
                                    <p class="p-0 m-0" id="RemainingAmount">Remaining  Amount: <i class="fa fa-rupee"></i><b>{{$totalbudgetcount - $cartdatacount}}</b></p>
                                </div>
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
                        <label for="">Door Number <span class="text-danger"></span></label>
                         <input type="text" placeholder="Enter the Door Number" id="door_no" value="{{auth('librarian')->user()->door_no}}" >
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
                        <label for="">Pincode <span class="text-danger">*</span></label>
                         <input type="number" placeholder="Enter the Pincode"  id="pincode" value="{{auth('librarian')->user()->pincode}}" required>
                      </div>
                   </div>
                   <div class="col-lg-6">
                      <div class="tpform__input mb-20">
                        <label for="">Landmark  <span class="text-danger">*</span></label>
                         <input type="text" placeholder="Enter the Landmark" id="landmark"  value=" {{auth('librarian')->user()->landmark}}" required>
                      </div>
                   </div>
                   <div class="col-lg-12">

    <div class="tpform__input mb-20">
    <label for="file">Readers Forum (Proof [ attachment])</label>

        <p>☑ Approved by Readers Forum: The magazine list has been carefully selected with input from our dedicated readers' forum. </p>
        <input type="file" id="readersForum" accept=".pdf,.doc,.docx,.txt" required>
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
          
            $('#exampleModal').modal('hide');
            var door_no=$('#door_no').val();
            var street=$('#street').val();
            var place=$('#place').val();
            var Village=$('#Village').val();
            var landmark=$('#landmark').val();
            var taluk=$('#taluk').val();
            var post=$('#post').val();
            var pincode=$('#pincode').val();
            var district=$('#district').val();
            var readersForum = $('#readersForum')[0].files;
            let fd = new FormData();
            fd.append('door_no',door_no);
            fd.append('street',street);
            fd.append('place',place);
            fd.append('Village',Village);
            fd.append('landmark',landmark);
            fd.append('taluk',taluk);
            fd.append('post',post);
            fd.append('pincode',pincode);
            fd.append('district',district);
            fd.append('readersForum',readersForum[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/magazineCheckout',
                method: 'post',
                data: fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.success, { timeout: 2000 });
                        setTimeout(function() {
                            window.location.href = "/cart-magazine"
                        }, 3000);
                    } else {
                        toastr.error(response.error, { timeout: 2000 });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    toastr.error('An error occurred while processing your request.', { timeout: 2000 });
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
                   var totalBudgetParagraph = $('<p>').addClass('p-0 m-0').attr('id', 'TotalBudget').html('Total Budget Allocated Amount: <i class="fa fa-rupee"></i><b>' + response.budgetcount + '</b>');


var selectedAmountParagraph = $('<p>').addClass('p-0 m-0').attr('id', 'SelectedAmount').html('Selected Amount: <i class="fa fa-rupee"></i><b>' + response.cartdatacount + '</b>');


var remainingAmountParagraph = $('<p>').addClass('p-0 m-0').attr('id', 'RemainingAmount').html('Remaining  Amount: <i class="fa fa-rupee"></i><b>' + (response.budgetcount - response.cartdatacount) + '</b>');
$('#amountdata').empty().append(totalBudgetParagraph, selectedAmountParagraph, remainingAmountParagraph);
                   
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


<script>
    $(document).ready(function() {
        $("#exceldata").click(function() {
            var fromDate = $("#fromDate").val();
            var toDate = $("#toDate").val();
            var documentType = $("#type").val();

            var data = {
                fromDate: fromDate,
                toDate: toDate,
                documentType: documentType
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          
                $.ajax({
                    type: "get",
                    url: "/report_downl_cart",
                  
                    success: function(response) {
                      

                        if (response.excelData) {
                            toastr.success(response.success,{timeout:45000});

                            downloadExcel(response.excelData);
                        } else {
                            toastr.error(response.error,{timeout:45000});

                           
                        }
                    },
                    error: function(xhr, status, error) {
                      
                        console.error(error);
                    }
                });
          
        });
    });

    function downloadExcel(data) {
        var csvContent = "data:text/csv;charset=utf-8,";

        data.forEach(function(rowArray) {
            var row = rowArray.join(",");
            csvContent += row + "\r\n";
        });

        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "publishers.csv");
        document.body.appendChild(link);

        link.click();
    }
</script>
</body>

</html>
