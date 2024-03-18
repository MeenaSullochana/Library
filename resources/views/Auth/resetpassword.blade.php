<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Password Reset </title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                                $rev = DB::table('forgotpasswordhidelins_title')->where('userType', '=', 'publisher')->first();

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
                                                $rev = DB::table('forgotpasswordhidelins_title')->where('userType', '=', 'distributor')->first();

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
                                                $rev = DB::table('forgotpasswordhidelins_title')->where('userType', '=', 'publisher_and_distributor')->first();

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
                                                <p>No data available for publisher_and_distributor.</p>
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
                        <div class="col-md-6">
                            <div class="bg-color bg-gradient p-2">
                                <div class="static-tabs mt-5 mb-5">
                                    <img class="w-100" src="assets/img/logo/login-logo-welcom.jpeg" alt="">
                                </div>
                                <form action="" class="p-2" id="userloginForm" method="POST">
                                <div class="row login_static">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="usertype" id="publisher" value="publisher" @if($data->type == "publisher") checked @endif disabled>
                                        <label class="form-check-label" for="radio1"> Publisher</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="usertype" id="distributor" value="distributor" @if($data->type == "distributor") checked @endif disabled>
                                        <label class="form-check-label" for="radio2"> Distributor</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="usertype" id="publisherdistributor" value="publisherdistributor" @if($data->type == "publisherdistributor") checked @endif disabled>
                                        <label class="form-check-label" for="radio3"> Publisher And Distributor</label>
                                    </div>
                                </div>
                                    <div class="col-md-8 mt-2">
                                        <label for="inputEmail4" class="form-label">Enter Email ID<span
                                                class="text-danger maditory">*</span></label></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder=" Enter your User Name" value="{{$data->email}}" required>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label for="inputEmail4" class="form-label">Enter the New Password<span
                                                class="text-danger maditory">*</span></label></label>
                                        <input type="password" class="form-control" id="newpassword" name="newpassword"
                                            placeholder=" Enter your User Name" required>
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label for="inputPassword4" class="form-label">Enter the Confirm Password <span
                                                class="text-danger maditory">*</span></label></label>
                                        <input type="password" class="form-control" id="conformpassword" name="conformpassword"
                                            placeholder="Enter Password" required>
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                    </div>
                                    <p class="reg-redirect mt-3 p-0 ms-3 m-0">
                                        Don't have an account? <a class="text-primary" href="/register"> Register Now</a>
                                    </p>
                                    <p class="reg-redirect ms-3 p-0 m-0">
                                         <a class="text-primary" href="#"> Back To Login?</a>
                                    </p>
                                    <div class="tpabout__inner-btn login_static_new mb-5">
                                    <button class="g-recaptcha btn btn-dark bg-dark text-white"
                                        data-sitekey="6Lf0cxIpAAAAAHaHPbmPV8l4O6U5Iy1ZZvfNH3OZ"
                                        data-callback='onSubmit'
                                        data-action='submit'  id="submit">Submit</button>
                                    </div>

                                </form>
                            </div>
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
        // password
        $(".toggle-password").click(function() {
            {{-- alert('good'); --}}
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
      </script>
       <script>
   function onSubmit(token) {
     document.getElementById("userloginForm").submit();
   }
 </script>
 <script>
    $(document).on('click', '#submit', function (e) {
        e.preventDefault();

        // Get values from form inputs
        var data = {
            'email': $('#email').val(),
            'newpassword': $('#newpassword').val(),
            'conformpassword': $('#conformpassword').val(),
           ' usertype': $('input[name="usertype"]:checked').val()
        };

        console.log(data);

        // Set up CSRF token in headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Send Ajax POST request
        $.ajax({
            type: "post",
            url: "/password/change",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 25000 });

                    // Redirect after 3 seconds
                    setTimeout(function () {
                        window.location.href = "/login";
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 25000 });
                }
            }
        });
    });
</script>
</body>

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
.overflowTest{
    height: 250px;
    overflow: scroll;
}
div {
  -ms-overflow-style: none; /* for Internet Explorer, Edge */
  scrollbar-width: none; /* for Firefox */
  overflow-y: scroll;
}

div::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}
.toggle-password {
    float: right;
    cursor: pointer;
    margin-right: 10px;
    margin-top: -25px;
}
a.nav-link.active i {
    color: white !important;
}
</style>
