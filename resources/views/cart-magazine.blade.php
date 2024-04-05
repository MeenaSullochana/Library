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
            .accordion-button:focus {
                z-index: 3;
                border-color: white !important;
                outline: 0;
                box-shadow: white !important;
            }
            .accordion-button:not(.collapsed){
                color: black;
                    background-color: !important;
                    box-shadow: !important;
                }
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
                                <a href="/librarian/index">Dashboard</a></span>
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
                    @if ($bud_arr != null)
                        @foreach ($bud_arr as $val)
                            <div class="col-xl-3 col-xxl-4 col-sm-6 mt-3">
                                <a href="/product-two">
                                    <div class="card">
                                        <div class="card-header">
                                            <p style="font-size:14px;" class="card-title text-center">
                                                {{ $val->category }}</p>
                                            <p style="font-size:14px;" class="card-title text-center">Total Amount
                                                <small> ₹{{ $val->budget_price }}</small></p>

                                        </div>

                                        <div class="card-body text-center">
                                            <div class="item">
                                                <div class="pie no-round"
                                                    style="--p:{{ $val->percentage }};--c:#6a0000;--b:15px">
                                                    {{ $val->percentage }}%</div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-lg-between ">
                                                <p class="text-center">Remaining Amount <small> <i
                                                            class="fa fa-rupee"></i>
                                                        {{ $val->budget_price - $val->cart_price }}</small></p>
                                                <!-- <h6><i class="fa fa-inr" aria-hidden="true"></i>  876</h6> -->
                                                <p class="text-center">Purchased Amount <small> <i
                                                            class="fa fa-rupee"></i> {{ $val->cart_price }}</small></p>
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
        <section class="container cart-area bg-gray-500">
            
            <div class="row">
                <div class="col-md-9">
                            <h4> All Selected Magazine List </h4>
                            <br>
        
                            <div class="table-content table-responsive">
        
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
                                        @if ($cartdata === null)
                                            <tr>
                                                <td colspan="7">No records found</td>
                                            </tr>
                                        @else
                                            @foreach ($cartdata as $val)
                                                <tr id="row_{{ $val->id }}">
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img style="width:75px;hight:75px;"
                                                                src="{{ asset('Magazine/front/' . $val->image) }}"
                                                                alt="">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="#">{{ $val->title }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $val->category }}
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="amount">₹{{ $val->amount }}</span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <!-- <span class="cart-minus">-</span> -->
                                                        <input class="cart-input" value="{{ $val->quantity }}"
                                                            data-id="{{ $val->id }}" disabled>
        
                                                        <!-- <span class="cart-plus">+</span> -->
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="amount">₹{{ $val->totalAmount }}</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <button class="btn btn-danger delete-btn"
                                                            data-id="{{ $val->id }}"><i class="fa fa-times"></i></button>
        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
    
                </div>
                
                <div class="col-lg-3 col-md-3">
                    <div style="padding-top: 100px;" class="sticky-top">
                    <h4>Shopping Cart</h4>
                    <div class="pb-30">
                        <div class="tpsidebar__product mt-3 p-0">
                            <div class="tpsidebar__product-item">
                                <div class="tpsidebar__product-content">
                                    <div class="card p-3 d-flex justify-content-center">
                                        {{-- <div>
                                            <a href="/procurement-policy" style="font-size: 20px !important;"><i class="fa fa-check-circle text-success" aria-hidden="true"></i><span class="text-success"> Procurment Policy</span></a>
                                            <p class="mb-2 mt-2">Subtotal (1 item):<span><b> <i class="fa fa-inr"></i> 14,999.00 </b></span></p>
                                        </div> --}}
                                        <div class="" id="amountdata">
                                            <a href="/procurement-policy" style="font-size: 20px !important;"><i class="fa fa-check-circle text-success" aria-hidden="true"></i><span class="text-success"> Procurment Policy</span></a>
                                            {{-- <p class="mb-2 mt-2">Subtotal (1 item):<span><b> <i class="fa fa-inr"></i> 14,999.00 </b></span></p> --}}
                                            <p class="mb-2 mt-2" id="TotalBudget">Total Budget Allocated Amount: <i
                                                    class="fa fa-rupee"></i><b>{{ $totalbudgetcount }}</b></p>
                                            <p class="mb-2 mt-2" id="SelectedAmount">Selected Amount: <i
                                                    class="fa fa-rupee"></i><b>{{ $cartdatacount }}</b></p>
                                            <p class="mb-2 mt-2" id="RemainingAmount">Remaining Amount: <i
                                                    class="fa fa-rupee"></i><b>{{ $totalbudgetcount - $cartdatacount }}</b></p>
                                        </div>
                                        <form action="" method="post">
                                            <input type="checkbox" name="vehicle1" value="Bike" required>
                                            <label for="vehicle1" class="p-0 fs-7"> Accept terms and conditions</label><br>
                                            {{-- <button class="tp-btn tp-color-btn banner-animation mt-3" id="Checkoutid">Proceed to Buy</button> --}}
                                            <button class="btn btn-danger text-white mt-3" type="submit" id="Checkoutid"> Proceed to Buy</button>
                                            
                                        </form>
                                        <div class="accordion mt-3" id="accordionExample">
                                            <div class="accordion-item">
                                              <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Guidelines
                                                </button>
                                              </h2>
                                              <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>Policy and Government Order Review Regularly review the Transparent Book Procurement Policy and government orders for updates <a class="text-center text-success" href="/guidelines">Read More</a></p>
                                                  
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
                
            </div>
            </div>
        </section>
        <!-- cart area end-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon2">
                                <a href="/cartpdfview"> <button class="btn btn-info mt-2" type="submit"><i
                                            class="fa fa-file-pdf"></i> Generate PDF</button> </a>
                                <button class="btn btn-dark mt-2" id="exceldata" type="submit"><i
                                        class="fa fa-file-excel"></i> Download Excel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mb-5 mt-2">
                    <div class="col-md-7" id="amountdata">
                        <p class="p-0 m-0" id="TotalBudget">Total Budget Allocated Amount: <i
                                class="fa fa-rupee"></i><b>{{ $totalbudgetcount }}</b></p>
                        <p class="p-0 m-0" id="SelectedAmount">Selected Amount: <i
                                class="fa fa-rupee"></i><b>{{ $cartdatacount }}</b></p>
                        <p class="p-0 m-0" id="RemainingAmount">Remaining Amount: <i
                                class="fa fa-rupee"></i><b>{{ $totalbudgetcount - $cartdatacount }}</b></p>
                    </div>
                    <div class="col-md-5 mb-5">
                        <div class="cart-page-total">
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <!-- <li>Subtotal <span>₹250.00</span></li> -->
                                <li>Total <span id="cartdatacount">₹{{ $cartdatacount }}</span></li>
                            </ul>
                            <button class="tp-btn tp-color-btn banner-animation" id="Checkoutid">Proceed to
                                Checkout</button>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- model -->
    <div style="z-index: 9999999;" class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" placeholder="Enter the Door Number" id="door_no"
                                    value="{{ auth('librarian')->user()->door_no }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Street Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Street Name" id="street"
                                    value="{{ auth('librarian')->user()->street }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Place <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Place" id="place"
                                    value="{{ auth('librarian')->user()->place }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Village <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Village" id="Village"
                                    value=" {{ auth('librarian')->user()->Village }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Post <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Post" id="post"
                                    value=" {{ auth('librarian')->user()->post }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Taluk <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Taluk" id="taluk"
                                    value=" {{ auth('librarian')->user()->taluk }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label class="form-label">District<span class="text-danger maditory">*</span></label>
                                <select name="district" class="form-select bg-white" id="district" Required>
                                    <option value="{{ auth('librarian')->user()->district }}">
                                        {{ auth('librarian')->user()->district }}</option>
                                    @php
                                        $districts = DB::table('districts')
                                            ->where('status', '=', 1)
                                            ->where('name', '!=', auth('librarian')->user()->district)
                                            ->get();
                                    @endphp

                                    @foreach ($districts as $state)
                                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Pincode <span class="text-danger">*</span></label>
                                <input type="number" placeholder="Enter the Pincode" id="pincode"
                                    value="{{ auth('librarian')->user()->pincode }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="tpform__input mb-20">
                                <label for="">Landmark <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter the Landmark" id="landmark"
                                    value=" {{ auth('librarian')->user()->landmark }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="tpform__input mb-20">
                                <label for="file">Readers Forum (Proof [ attachment])</label>

                                <p>☑ Approved by Readers Forum: The magazine list has been carefully selected with input
                                    from our dedicated readers' forum. </p>
                                <input type="file" id="readersForum" accept=".pdf,.doc,.docx,.txt" required>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="Checkout111id">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-area-start -->
    @include('footer.footer')
    <!-- footer-area-end -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="modalTitleId">
                      
                    </h5> -->
                    <button type="button" id="closwdata" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="message"> </p>
                    <input type="hidden" id="budgetValue">
                    <input type="hidden" id="categoryValue">
                    <input type="hidden" id="messageValue">


                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="yesNoRadio" id="flexRadioDefault1"
                            value="yes">
                        <label class="form-check-label" for="flexRadioDefault1" value="no">ஆம்</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="yesNoRadio" id="flexRadioDefault2"
                            value="no">
                        <label class="form-check-label" for="flexRadioDefault2"> இல்லை</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button> -->
                    <button type="button" id="Checkoutdata" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="myModal2" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="modalTitleId">
                        Alert
                    </h5> -->
                    <button type="button" class="btn-close" id="closwdata11" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <input type="hidden" id="budgetValue1">
                <input type="hidden" id="categoryValue2">
                <input type="hidden" id="categoryValue2">
                <input type="hidden" id="messageValue2">
                <input type="hidden" id="amount2">


                <div class="modal-body">
                    <p>
                        <label for="">ஆம் எனில் எதற்காக என்று தேர்வு செய்யவும்</label>
                    <div class="form-check mt-3 w-100">
                        <input class="form-check-input" type="radio" name="overflow_amount" id="option11"
                            value="1">
                        <label class="form-check-label" for="option1">தமிழ் நாடு பாடநூல் மற்றும் கல்வியியல் பணிகள்
                            கழகத்தால் வழங்கப்படும் தொகையிலிருந்து அண்ணா நூற்றாண்டு நூலகம் மூலம் பெறப்படுகிறது.</label>
                    </div>
                    <div class="form-check mt-3 w-100">
                        <input class="form-check-input" type="radio" name="overflow_amount" id="option22"
                            value="0">
                        <label class="form-check-label" for="option2">மேலும் பிற பருவ இதழ்கள் வாங்கப் போதுமான நிதி
                            இல்லாததால் நிதி ஒப்படைக்கப்படுகிறது.</label>
                    </div>
                    <div class="form-check mt-3 w-100">
                        <input class="form-check-input" type="radio" name="overflow_amount" id="option33"
                            value="0">
                        <label class="form-check-label" for="option3">இந்த பிரிவில் தேவையான இதழ்கள் தேர்வு
                            செய்துவிட்டதால் நிதி ஒப்படைக்கப்படுகிறது.</label>
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button> -->
                    <button type="button" class="btn btn-primary" id="catsubmit">submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <!-- <div class="modal fade" id="myModal3" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Notice Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Note:</p>
                    <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                    <label class="mt-3">Please Enter Opinion Content</label>
                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <!-- <div class="modal fade" id="myModal4" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Notice information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Note:</p>
                    <small>போட்டித்தேர்வு பிரிவில் ₹ 1632 நிதி எஞ்சியுள்ளது. இந்த நிதி வரம்புக்கு உட்பட்ட பருவ இதழ்கள் போட்டித்தேர்வு பிரிவில் உள்ளன. எனவே, நிதி ஒப்பளிப்பு செய்ய இயலாது.  மீண்டும் இதழ்களைத் தேர்வு செய்க</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div> -->



    <?php
    include 'plugin/js.php';
    ?>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#closwdata').on('click', function() {
                $('#modalId input[type="radio"]').prop('checked', false);

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#closwdata11').on('click', function() {
                $('#myModal2 input[type="radio"]').prop('checked', false);

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#Checkoutdata').on('click', function() {
                var budgetValue = $('#budgetValue').val();
                var categoryValue = $('#categoryValue').val();
                var messageValue = $('#messageValue').val();
                var status = '0';


                if ($('input[name="yesNoRadio"]:checked').length === 0) {
                    toastr.error('Please select an option', {
                        timeout: 2000
                    });
                } else {
                    $('#modalId').modal('hide');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/budgetcategurystatus',
                        method: 'POST',
                        data: {
                            budget: budgetValue,
                            category: categoryValue,
                            status: status,
                            messageValue: messageValue,


                        },
                        success: function(response) {
                            $('#modalId input[type="radio"]').prop('checked', false);

                            toastr.error(response.error, {
                                timeout: 2000
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error occurred while submitting data to the server:',
                                error);
                        }
                    });
                }


            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#catsubmit').on('click', function() {
                var budgetValue = $('#budgetValue').val();
                var categoryValue = $('#categoryValue').val();
                var messageValue = $('#messageValue').val();
                var amount2 = $('#amount2').val();

                if ($('input[name="overflow_amount"]:checked').length === 0) {
                    toastr.error('Please select an option', {
                        timeout: 2000
                    });
                } else {
                    $('#myModal2').modal('hide');

                    var status = $('input[name="overflow_amount"]:checked').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/budgetcategurystatus',
                        method: 'POST',
                        data: {
                            budget: budgetValue,
                            category: categoryValue,
                            status: status,
                            messageValue: messageValue,
                            amount2: amount2,


                        },
                        success: function(response) {
                            if (response.error) {
                                $('#myModal2 input[type="radio"]').prop('checked', false);

                                toastr.error(response.error, {
                                    timeout: 2000
                                });
                            } else {
                                toastr.success(response.success, {
                                    timeout: 2000
                                });
                                $('#myModal2 input[type="radio"]').prop('checked', false);

                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error occurred while submitting data to the server:',
                                error);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#Checkout111id').on('click', function() {

                // $('#exampleModal').modal('hide'); 
                var door_no = $('#door_no').val();
                var street = $('#street').val();
                var place = $('#place').val();
                var Village = $('#Village').val();
                var landmark = $('#landmark').val();
                var taluk = $('#taluk').val();
                var post = $('#post').val();
                var pincode = $('#pincode').val();
                var district = $('#district').val();
                var specialcat = '1';


                var readersForum = $('#readersForum')[0].files;
                let fd = new FormData();
                fd.append('door_no', door_no);
                fd.append('street', street);
                fd.append('place', place);
                fd.append('Village', Village);
                fd.append('landmark', landmark);
                fd.append('taluk', taluk);
                fd.append('post', post);
                fd.append('pincode', pincode);
                fd.append('district', district);
                fd.append('readersForum', readersForum[0]);

                fd.append('specialcat', specialcat);


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
                        if (response.success) {
                            toastr.success(response.success, {
                                timeout: 2000
                            });
                            setTimeout(function() {
                                window.location.href = "/cart-magazine"
                            }, 3000);

                        } else {
                            toastr.error(response.error, {
                                timeout: 2000
                            });

                        }



                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        toastr.error('An error occurred while processing your request.', {
                            timeout: 2000
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#Checkoutid').on('click', function() {


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/magazineCheckout',
                    method: 'POST',
                    data: {
                        specialcat: '0',
                    },
                    success: function(response) {
                        if (response.spccat == '1') {
                            $('#exampleModal').modal('show');


                        } else {



                            if (response.success) {
                                toastr.success(response.success, {
                                    timeout: 2000
                                });

                            } else {
                                if (response.status == '2') {
                                    $('#modalId').modal('show');
                                    document.getElementById('message').innerHTML = response
                                        .message;

                                    document.getElementById('budgetValue').value = response
                                        .budgetid;
                                    document.getElementById('categoryValue').value = response
                                        .category;
                                    document.getElementById('messageValue').value = response
                                        .error;

                                    document.getElementById('budgetValue2').value = response
                                        .budgetid;
                                    document.getElementById('categoryValue2').value = response
                                        .category;
                                    document.getElementById('messageValue2').value = response
                                        .error;
                                    document.getElementById('amount2').value = response.amount;


                                } else {
                                    toastr.error(response.error, {
                                        timeout: 2000
                                    });

                                }
                            }

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        toastr.error('An error occurred while processing your request.', {
                            timeout: 2000
                        });
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Add event listener for change event on each radio button
            $('input[name="overflow_amount"]').change(function() {
                // Check which radio button is selected
                if ($(this).is(':checked')) {
                    // Perform actions based on the selected radio button value
                    var selectedValue = $(this).val();
                    switch (selectedValue) {
                        case '1':
                            // Action for Option 1
                            console.log('Option 1 selected');
                            // $('#myModal3').modal('show');
                            // $('#myModal2').modal('hide');
                            break;
                        case '2':
                            // Action for Option 2
                            console.log('Option 2 selected');
                            // $('#myModal2').modal('hide');
                            // $('#myModal4').modal('show');
                            break;
                        case '3':
                            // Action for Option 3
                            console.log('Option 3 selected');
                            // $('#myModal2').modal('hide');
                            // $('#myModal4').modal('show');
                            break;
                        default:
                            // Default action if none of the options match
                            console.log('Invalid option selected');
                            break;
                    }
                }
            });
        });

        $(document).ready(function() {

            // Add event listener for change event
            $('#myCheckbox').change(function() {
                // Check if the checkbox is checked
                if ($(this).is(':checked')) {
                    // If checked, show the modal
                    $('#modalId').modal('show');
                } else {
                    // If unchecked, hide the modal
                    $('#modalId').modal('hide');
                }
            });

            // Add event listener for change event on radio buttons
            $('input[name="yesNoRadio"]').change(function() {
                // alert($(this).val());
                // Check which radio button is checked
                if ($(this).val() === 'yes') {
                    // If "Yes" is selected, show the second modal
                    $('#myModal2').modal('show');

                    // If unchecked, hide the modal
                    $('#modalId input[type="radio"]').prop('checked', false);

                    $('#modalId').modal('hide');

                } else {
                    // If "No" is selected, hide the second modal

                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: '/delete-to-cart',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#row_' + id).remove();

                            toastr.success(response.success, {
                                timeout: 2000
                            });
                            $('#magazinecartcount').text(response.magazinecartcount != 0 ?
                                response.magazinecartcount : '0');
                            $('#cartdatacount').text(response.cartdatacount != 0 ? response
                                .cartdatacount : '0');
                            var totalBudgetParagraph = $('<p>').addClass('p-0 m-0').attr('id',
                                'TotalBudget').html(
                                'Total Budget Allocated Amount: <i class="fa fa-rupee"></i><b>' +
                                response.budgetcount + '</b>');


                            var selectedAmountParagraph = $('<p>').addClass('p-0 m-0').attr(
                                'id', 'SelectedAmount').html(
                                'Selected Amount: <i class="fa fa-rupee"></i><b>' + response
                                .cartdatacount + '</b>');


                            var remainingAmountParagraph = $('<p>').addClass('p-0 m-0').attr(
                                'id', 'RemainingAmount').html(
                                'Remaining  Amount: <i class="fa fa-rupee"></i><b>' + (
                                    response.budgetcount - response.cartdatacount) + '</b>');
                            $('#amountdata').empty().append(totalBudgetParagraph,
                                selectedAmountParagraph, remainingAmountParagraph);

                        } else {
                            toastr.error('Failed to delete item', {
                                timeout: 2000
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                        toastr.error('Error occurred while deleting item', {
                            timeout: 2000
                        });
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
                        if (response.error) {
                            toastr.error(response.error, {
                                timeout: 2000
                            });
                        } else {
                            $('#row_' + itemId + ' .product-subtotal .amount').text('₹' + response
                                .totalAmount);
                            $('#cartdatacount').text(response.cartdatacount != 0 ? response
                                .cartdatacount : '0');

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
                            toastr.success(response.success, {
                                timeout: 45000
                            });

                            downloadExcel(response.excelData);
                        } else {
                            toastr.error(response.error, {
                                timeout: 45000
                            });


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
