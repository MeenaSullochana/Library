<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Verification </title>
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
        <section class="pt-50 pb-100">
            <div class="container mt-5">
                <div class="card mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="modal-bottom-logo">
                                <img class="w-100" src="assets/img/logo/logo.png" alt="">
                            </div>
                            <div class="modal-bottom-logo"><img class="text-center w-100" src="assets/img/icon/border-top.png" alt="" title=""></div>
                            <div class="container">
                                <ul class="nav nav-pills mb-4 light justify-content-center">
                                    <li class=" nav-item">
                                        <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false"><i class="fa fa-user p-2 text-success"></i>Publisher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false"><i class="fa fa-user-circle p-2 text-success"></i>Distributor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true"><i class="fa fa-users p-2 text-success"></i>Publisher Cum Distributor</a>
                                    </li>
                                </ul>
                                <div class="tab-content" >
                                    <div id="navpills-1" class="tab-pane overflowTest active">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="overflowTest ms-3">
                                               @php
                                                $rev = DB::table('mailconfirm_title')->where('userType', '=', 'publisher')->first();

                                                if ($rev !== null) {
                                                    $data1 = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data1 = [];
                                                }
                                            @endphp

                                            <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>

                                            @if ($data1)
                                                @foreach($data1 as $val)
                                                    <!-- hidelineContent -->
                                                    <li>{{$val}}.</li>
                                                @endforeach
                                            @else
                                                <p>No data available for publisher.</p>
                                            @endif

                                              <!-- <li>Publisher Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                <li>Publisher Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                <li>Publisher Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li> -->

                                                <!-- <p>
                                                    <br /> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p> -->
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane overflowTest">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="overflowTest ms-3">
                                                @php
                                                $rev = DB::table('mailconfirm_title')->where('userType', '=', 'distributor')->first();

                                                if ($rev !== null) {
                                                    $data1 = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data1 = []; // Set a default value or handle accordingly
                                                }
                                                @endphp
                                                <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>
                                                @if ($rev !== null)


                                                    @foreach($data1 as $val)
                                                        <!-- hidelineContent -->
                                                        <li>{{$val}}.</li>
                                                    @endforeach
                                                @else
                                                    <p>No data available for distributor.</p>
                                                @endif

                                                    <!-- <h6 class="text-danger"><b>About the Guideline Distributor</b></h6>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <p>
                                                        <br /> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="navpills-3" class="tab-pane overflowTest">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="overflowTest ms-3">
                                                @php
                                                $rev = DB::table('mailconfirm_title')->where('userType', '=', 'publisher_and_distributor')->first();

                                                if ($rev !== null) {
                                                    $data1 = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data1 = []; // Set a default value or handle accordingly
                                                }
                                            @endphp
                                            <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>

                                            @if ($rev !== null)

                                                @foreach($data1 as $val)
                                                    <!-- hidelineContent -->
                                                    <li>{{$val}}.</li>
                                                @endforeach
                                            @else
                                                <p>No data available for publisher cum distributor.</p>
                                            @endif

                                                    <!-- <h6 class="text-danger"><b>About the Guideline Publisher Cum Distributor</b></h6> -->
                                                    <!-- <li>Publisher Cum Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <li>Distributor Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</li>
                                                    <p>
                                                        <br /> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <form>
                                @csrf
                                <div class="container height-100 d-flex justify-content-center align-items-center">
                                    <div class="position-relative">
                                        <div class="card p-2 text-center">
                                            <h6>Please enter the one time otp<br> to verify your account</h6>

                                            <div> <span>A code has been sent to</span> <small id="emailPlaceholder">{{$data->email}}</small> </div>
                                            <h1>Welcome Back!</h1>
                                            <p>It looks like you're trying to login from a new device. As an added security mesure, please enter the 4-character code sent to your email.</p>
                                            <div id="otp" class="">
                                                <label for="opt_field" class="text-start">Enter the OTP</label>
                                                <input class="m-2 text-center form-control rounded" type="text" id="otps" maxlength="4"  />
                                                </div>
                                                <p class="text-start resend-code" data-userid="{{ $data->id }}" data-userrole="{{ $data->usertype }}" > <span style="color: blue;">Resend Code</span></p>

                                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-start change-mail-id"
   data-userid="{{ $data->id }}" data-userrole="{{ $data->usertype }}" data-email="{{ $data->email }}">
   Did not get Code? <span style="color: blue;">Change Email</span>
</a>
                                            <div class="mt-4"> <button class="btn btn-danger px-4 validate" id="submitButton"  data-id="{{$data->id}}" data-roleid="{{$data->usertype}}">Submit</button> </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>



        <!-- Your Content End Here -->

    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
    include "plugin/js.php";
    ?>
    <script>
        function onSubmit(token) {
            document.getElementById("userloginForm").submit();
        }
    </script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Email</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label id="email_label" for="email">YOUR Email Address</label>
            <input id="current_email" name="current_email" type="email" class="form-control" readonly />
        </div>
        <div class="mb-3">
            <label id="new_email_label" for="new_email">Please Enter New Email Address</label>
            <input id="new_email" name="new_email" type="email" class="form-control" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="sendButton">Send</button>
      </div>
    </div>
  </div>
</div>
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
    $(document).on('click', '#submitButton', function (e) {
        e.preventDefault();

        var data = {
            'id': $(this).data('id'),
            'usertype': $(this).data('roleid'),
            'otp': $('#otps').val(),
        };



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: "/otpverification",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                if (response.type == "reviewer") {
                    toastr.success(response.success, { timeout: 25000 });


                      window.location.href = "/member/login";

                 } else {
                    toastr.success(response.success, { timeout: 25000 });


                       window.location.href = "/login";

                  }

                } else {
                    toastr.error(response.error, { timeout: 25000 });
                }
            }
        });
    });
</script>
<script>
    $(document).on('click', '.resend-code', function() {
        var userId = $(this).data('userid');
        var userType = $(this).data('userrole');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Your AJAX request here
        $.ajax({
            type: "post",
            url: "/resendcode",
            data: {
                'id': userId,
                'usertype': userType,
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 25000 });
                } else {
                    toastr.error(response.error, { timeout: 25000 });
                }
            }
        });
    });
</script>
<script>
    $(document).on('click', '.change-mail-id', function() {
        var userId = $(this).data('userid');
        var userRole = $(this).data('userrole');
        var userEmail = $(this).data('email');
        console.log(userEmail);
        // Set the values of input fields in the modal
        $('#current_email').val(userEmail);
        $('#new_email').val('');

        // Show the modal
        $('#exampleModal').modal('show');
    });

    // AJAX request when the "Send" button is clicked
    $(document).on('click', '#sendButton', function() {
        var currentEmail = $('#current_email').val();
        var newEmail = $('#new_email').val();
        var userId = $('.change-mail-id').data('userid');
        var userRole = $('.change-mail-id').data('userrole');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/changemail",
            data: {
                'id': userId,
                'usertype': userRole,
                'current_email': currentEmail,
                'email': newEmail,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.success) {
                    console.log(response.email);
                    toastr.success(response.success, { timeout: 25000 });
                    $('#emailPlaceholder').text(response.email);
                    var anchorElement = $('.change-mail-id'); // Select the anchor element
        anchorElement.data('email', response.email); // Update the data-email attribute
        anchorElement.find('span').text('Change mail Id');
                    $('#exampleModal').modal('hide');
                } else {
                    toastr.error(response.error, { timeout: 25000 });
                }
            }
        });
    });
</script>
</html>
<style>
    .modal-logo-desc {
        margin: 0px;
        color: rgb(103, 103, 103);
        font-size: 15px;
        padding: 5px 0px 20px;
        font-family: Montserrat, sans-serif;
    }

    .fab {
        font-size: 30px;
        margin-top: 10px;
    }

    .modal-conatact-procedures {
        list-style: none;
        padding: 0px 0px 10px;
        display: flex;
        margin: 0px auto;
        width: 80%;
    }

    .modal-bottom-logo {
        padding: 15px 0px 0px;
        margin: 0px auto;
        text-align: center;
        width: 95%;
    }

    .static-tabs {
        width: 67%;
        margin: 0px auto;
        padding: 25px 0px 0px !important;
        text-align: center !important;
    }

    .login_static {
        margin-top: 32px;
    }

    .reg-redirect {
        margin: 0px 0px 3px;
        font-size: 14px;
        width: 100%;
        text-align: left !important;
    }

    .login_static_new {
        margin-top: 32px;
        margin-bottom: 34px !important;
    }

    .bg-gradient {
        --bs-gradient: linear-gradient(180deg, rgb(167 97 97 / 15%), rgba(2, 0, 95, 0.06));
    }

    i.fab.fa-facebook-f {
        color: #1873eb;
    }

    i.fab.fa-twitter {
        color: #0097e7;
    }

    i.fab.fa-youtube {
        color: red;
    }

    i.fab.fa-pinterest-p {
        color: #ef0000;
    }

    i.fab.fa-instagram {
        color: #ff00a3;
    }

    .card h6 {
        color: red;
        font-size: 20px
    }

    .inputs input {
        width: 40px;
        height: 40px
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .card-2 {
        background-color: #fff;
        padding: 10px;
        width: 350px;
        height: 100px;
        bottom: -50px;
        left: 20px;
        position: absolute;
        border-radius: 5px
    }

    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid red
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: red;
        border: 1px solid red;
        width: 140px
    }
</style>
