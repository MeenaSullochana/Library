<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html oncontextmenu="return false;">

<head>
    <title>Sale API</title>
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href=" {{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <style>
        .payment_option {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .payment_option {
                display: flex;
                justify-content: space-between;
                padding: 20px;
                flex-direction: column-reverse;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {}
    </style>
</head>

<body
    style="background-image:url('https://cardinsider.com/wp-content/uploads/2021/08/IDBI.jpg'); background-position:center;">
    <!--*******************
            Preloader start
        ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="{{ asset('assets/img/goverment_loader.gif') }}" alt="" width="25%">
        </div>
    </div>
    <!--*******************
                Preloader end
            ********************-->

    <div class="authincation fix-wrapper">
        <div class="container h-100 mt-3">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img class="p-3" style="width: 150px;height:auto;"
                                            src="{{ asset('assets\img\logo\idbi_logo.png') }}" alt=""
                                            srcset=""><br>
                                        <small>Secure Payment gateway System</small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="needs-validation" novalidate="" action="/process-sale"
                                            method="post" accept-charset="ISO-8859-1">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-6">
                                                <input class="textbox" type="text"  name="UDF01" id="UDF01" value="{{$user->usertype}}" size="40" maxlength="500" hidden/>
                                                <input class="textbox" type="text"  name="UDF02" id="UDF02" value="{{$user->email}}" size="40" maxlength="500" hidden/>
                                                <input class="textbox" type="text"  name="UDF03" id="UDF03" value="{{$user->password}}" size="40" maxlength="500" hidden/>
                                                <input class="textbox" type="text"  name="UDF04" id="UDF04" value="{{$books}}" hidden/>
                                                <input class="textbox" type="text"  name="UDF05" id="UDF05" value="{{$type}}" hidden/>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom01">
                                                            Merchant Txn. Ref. No: <span class="text-danger"> *</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="textbox" class="form-control" name="TxnRefNo"
                                                                id="TxnRefNo" value="{{$merchantrefno}}" size="40"
                                                                maxlength="40" placeholder="Enter a TxnRefNo" required>
                                                            <div class="invalid-feedback">
                                                                Please Enter Merchant Txn. Ref. No
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom02">Amount in rupees:<span
                                                                class="text-danger"> *</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="Amount"
                                                                id="Amount" value="{{$amount}}" size="40"
                                                                maxlength="12" placeholder="Your Amount.." required readonly>
                                                            <div class="invalid-feedback">
                                                                Please enter Amount in rupees
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom03">Currency Code:<span
                                                                class="text-danger"> *</span></label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="Currency"
                                                                id="Currency" value="356" size="40"
                                                                maxlength="40" placeholder="Currency Code.." required readonly>
                                                            <div class="invalid-feedback">
                                                                Please Enter Currency Code
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom04">Txn Type:<span class="text-danger">
                                                                *</span></label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="TxnType"
                                                                id="TxnType" value="Pay" size="40"
                                                                maxlength="40" placeholder="Txn Type.." required
                                                                readonly>
                                                            <div class="invalid-feedback">Please enter Txn Type</div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom04">Order Info:</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control"
                                                                name="OrderInfo" id="OrderInfo" size="40"
                                                                maxlength="40" placeholder="Order Info.." required
                                                                readonly>
                                                            <div class="invalid-feedback">Please Order Info</div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom04">CardHolder Email:</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="Email"
                                                                id="Email" value="" size="40"
                                                                maxlength="40" placeholder="CardHolder Email.."
                                                                required readonly>
                                                            <div class="invalid-feedback">Please Enter CardHolder Email
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label required"
                                                            for="validationCustom04">CardHolder Phone:</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="Phone"
                                                                id="Phone" value="" size="40"
                                                                maxlength="40" placeholder="CardHolder Phone.."
                                                                required readonly>
                                                            <div class="invalid-feedback">Please enter CardHolder Phone
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3 row">
                                                        <h3>PAYMENT METHOD: *</h3>
                                                        <div class="col-lg-12 payment_option">
                                                            <label for="one"><input type="radio"
                                                                    id="one" name="payOpt" value="cc"
                                                                    onchange="showhide(this.value);" /> Credit
                                                                card</label>
                                                            <label for="two"><input type="radio"
                                                                    id="two" name="payOpt" value="dc"
                                                                    onchange="showhide(this.value);" /> Debit
                                                                Card</label>
                                                            <label for="three"><input type="radio"
                                                                    id="three" name="payOpt" value="nb"
                                                                    onchange="showhide(this.value);" />
                                                                NetBanking</label>
                                                            <label for="four"><input type="radio"
                                                                    id="four" name="payOpt" value="wt"
                                                                    onchange="showhide(this.value);" /> Wallet </label>
                                                            <label for="seven"><input type="radio"
                                                                    checked="checked" id="seven" name="payOpt"
                                                                    value="" onchange="showhide(this.value);" />
                                                                3-Party</label>
                                                        </div>
                                                    </div>

                                                    <div id="CardNo">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Card Number*:</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    name="CardNumber" id="CardNumber"
                                                                    placeholder="66X 67XX 78XX 90XX" required>
                                                                <div class="invalid-feedback">Invalid Card Number
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Expiry Date*: (MMYYYY)</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    name="ExpiryDate" id="ExpiryDate"
                                                                    placeholder="MMYYYY" required>
                                                                <div class="invalid-feedback">Please enter Expire Date
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="CVV">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">CVV2/CVD2 Number*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="password"
                                                                    name="CardSecurityCode" id="CardSecurityCode"
                                                                    placeholder="Enter the CVV2/CVD2 Number.."
                                                                    required>
                                                                <div class="invalid-feedback">invalide CVV2/CVD2 Number
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="bankCodetr">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Bank ID for
                                                                NetBanking*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="bankCode" id="bankCode"
                                                                    placeholder="Enter the Bank ID for NetBanking.."
                                                                    required>
                                                                <div class="invalid-feedback">invalide Bank ID for
                                                                    NetBanking</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="Name">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">First name:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="FirstName" id="FirstName"
                                                                    placeholder="Enter the First Name.." required>
                                                                <div class="invalid-feedback">Enter First name</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Last name:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="LastName" id="LastName"
                                                                    placeholder="Enter the Last Name.." required>
                                                                <div class="invalid-feedback">Enter last name</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="Address">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Street name*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="Street" id="Street"
                                                                    placeholder="Enter the Street Name.." required>
                                                                <div class="invalid-feedback">Enter Street name</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">City name*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="City" id="City"
                                                                    placeholder="Enter the City Name.." required>
                                                                <div class="invalid-feedback">Enter City name</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">Zip Code*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="number"
                                                                    name="ZIP" id="ZIP"
                                                                    placeholder="Enter the Zip Code.." required>
                                                                <div class="invalid-feedback">Enter Zip Code</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label required"
                                                                for="validationCustom04">State name*:</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="State" id="State"
                                                                    placeholder="Enter the Last Name.." required>
                                                                <div class="invalid-feedback">Enter State</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-lg-8 ms-auto">
                                                            <button class="btn btn-primary" type="submit"
                                                                name="SubButL" value="Submit"><i class="fa fa-money"
                                                                    aria-hidden="true"></i> Paynow</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }} "></script>
    <script src="{{ asset('admin/js/deznav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script type="text/javascript">
        window.onload = function() {
            showhide("");
        }

        function showhide(payment_type) {
            // alert(payment_type);
            if (payment_type == "wt" || payment_type == "") {
                $("#Name, #CardNo, #CardExpiry, #CVV, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr")
                    .css('display', 'none');
                $('#CardNumber,#ExpiryDate,#CardSecurityCode').prop('required', false);
                $('#bankCode,#FirstName,#LastName,#Street,#State,#City,#ZIP').prop('required', false);

            } else if (payment_type == "nb") {
                $("#CardNo, #CardExpiry, #CVV").css('display', 'none');
                $("#Name, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr").css('display',
                    'table-row');

                $('#CardNumber,#ExpiryDate,#CardSecurityCode').prop('required', false);
                $('#bankCode,#FirstName,#LastName,#Street,#City,#State,#ZIP').prop('required', true);
            } else {
                $("#CardNo, #CardExpiry, #CVV").css('display', 'table-row');
                $("#Name, #FirstName, #LastName, #Address, #Street, #City, #ZIP, #State, #bankCodetr").css('display',
                    'none');

                $('#CardNumber,#ExpiryDate,#CardSecurityCode').prop('required', true);
                $('#bankCode,#FirstName,#LastName,#Street,#State,#City,#ZIP').prop('required', false);
            }
        }
    </script>
    <script type="text/javascript">
        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                alert('Sorry, you cant do this For Some Security Reasons 💔')
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                alert('Sorry, you cant do this For Some Security Reasons 💔')
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                alert('Sorry, you cant do this For Some Security Reasons💔')
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                alert('Sorry, you cant do this For Some Security Reasons 💔')
                return false;
            }
        }

        function checkDeveloperTools() {
            // Start a timer
            const start = performance.now();

            // Perform some complex operation or execute a script
            // For example, you can create a loop that runs for a certain duration
            for (let i = 0; i < 1000000; i++) {
                // Do something that takes time
            }

            // End the timer
            const end = performance.now();

            // Calculate the time taken for the operation
            const duration = end - start;

            // Check if the time taken exceeds a threshold
            // Adjust the threshold based on your application's needs
            if (duration > 100) {
                // This might indicate that developer tools are open
                console.log("Developer tools might be open");
            } else {
                // Developer tools are likely closed
                console.log("Developer tools are closed");
            }
        }

        // Call the function periodically to check
        setInterval(checkDeveloperTools, 1000); // Check every second
    </script>

</body>

</html>
