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
        {{-- @include("header.middile_navigation") --}}
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
                            <div class="modal-bottom-logo mt-5">
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
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="overflowTest ms-3">
                                               @php
                                                $rev = DB::table('loginhidelins_title')->where('userType', '=', 'publisher')->first();

                                                if ($rev !== null) {
                                                    $data = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data = [];
                                                }
                                            @endphp

                                            <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>

                                            @if ($data)
                                                @foreach($data as $val)
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
                                    <div id="navpills-2" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="overflowTest ms-3">
                                                @php
                                                $rev = DB::table('loginhidelins_title')->where('userType', '=', 'distributor')->first();

                                                if ($rev !== null) {
                                                    $data = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data = []; // Set a default value or handle accordingly
                                                }
                                            @endphp
                                            <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>
                                            @if ($rev !== null)


                                                @foreach($data as $val)
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
                                    <div id="navpills-3" class="tab-pane">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="overflowTest ms-3">
                                                @php
                                                $rev = DB::table('loginhidelins_title')->where('userType', '=', 'publisher_and_distributor')->first();

                                                if ($rev !== null) {
                                                    $data = json_decode($rev->hidelineContent);
                                                } else {
                                                    $data = []; // Set a default value or handle accordingly
                                                }
                                            @endphp
                                            <h6 class="text-danger"><b>{{$rev ? $rev->hidelineTitle : 'Default Title'}}</b></h6>

                                            @if ($rev !== null)

                                                @foreach($data as $val)
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
                            <div class="bg-color bg-gradient p-1">
                                <div class="static-tabs mt-5 mb-5">
                                    <img class="w-100" src="assets/img/logo/login-logo-welcom.jpeg" alt="img">
                                </div>
                                <form action="/login" class="p-2" id="userloginForm" method="POST">
                                    @csrf
                                    <p id="tooltip-1" title="Please Select Who You are" class="fs-5 fw-bold">Please select who you are?</p>
                                    <hr>
                                    <div class="row login_static">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="type"
                                                    value="publisher" checked>
                                                <label class="form-check-label" for="radio1"> Publisher</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="type"
                                                    value="distributor">
                                                <label class="form-check-label" for="radio2"> Distributor</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio3"
                                                    name="type" value="publisher_distributor">
                                                <label class="form-check-label" for="radio3"> Publisher Cum
                                                    Distributor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label for="inputEmail4" class="form-label">User Name / Email<span
                                                class="text-danger maditory">*</span></label></label>
                                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name"
                                            placeholder=" Enter your User Name" required>
                                            @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <label for="inputPassword4" class="form-label">Password <span
                                                class="text-danger maditory">*</span></label></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Password" required>
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                    </div>
                                    <p class="reg-redirect mt-3 p-0 m-0">
                                        Don't have an account? <a class="text-primary" href="/register" id="tooltip-2" title="User Login"> Register Now</a>
                                    </p>
                                    <p class="reg-redirect p-0 m-0">
                                         <a class="text-primary" href="/forgotform" id="tooltip-3" title="Forgot User Password"> Forgot Password</a>
                                    </p>
                                    <div class="tpabout__inner-btn login_static_new mb-5">
                                    <button class="g-recaptcha btn btn-dark bg-dark text-white"
                                        data-sitekey="6Lf0cxIpAAAAAHaHPbmPV8l4O6U5Iy1ZZvfNH3OZ"
                                        data-callback='onSubmit'
                                        data-action='submit'>Submit</button>
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
</body>
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>
<script>
    $(function() {
        $("#tooltip-1").tooltip();
        $("#tooltip-2").tooltip();
        $("#tooltip-3").tooltip();
    });

    </script>
@endif
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
