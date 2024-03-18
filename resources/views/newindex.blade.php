
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
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
                            {{-- <p class="modal-bottom-logo p-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum veritatis adipisci
                                voluptas maxime similique! Sed ea dolores voluptatibus alias distinctio.
                            </p> --}}
                            <div class="modal-bottom-logo"><img class="text-center w-100" src="assets/img/icon/border-top.png" alt="" title=""></div>
                            <!-- <ul class="modal-conatact-procedures">
                                <li>
                                    <a href="https://seedfund.startupindia.gov.in/" target="_blanck">
                                        <img src="/content/dam/invest-india/newhomepage/seed-fund-login1.png" alt="0"
                                            title="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://maarg.startupindia.gov.in/" target="_blanck">
                                        <img src="/content/dam/invest-india/newhomepage/maarg-login1.png" alt="0"
                                            title="">
                                    </a>
                                </li>

                            </ul> -->
                            {{-- <div class="social text-center">
                                <h5 class="social-title mb-5">Social Media:</h5>
                                <div class="social_icons">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="modal-bottom-logo"><img class="text-center w-100" src="assets/img/icon/border-top.png" alt="" title=""></div>
                            <div class="modal-bottom-logo mb-5">
                                <img src="assets/img/logo/gov-login-img.png" alt="0" title="0">
                            </div> --}}
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
                                                $rev = DB::table('hidelins_title')->where('userType', '=', 'publisher')->first();

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
                                                $rev = DB::table('hidelins_title')->where('userType', '=', 'distributor')->first();

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
                                                $rev = DB::table('hidelins_title')->where('userType', '=', 'publisher_and_distributor')->first();

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
                                <h3 class="text-center fw-bold">New Registration</h3>
                                <div class="static-tabs mt-5 mb-5">
                                    <img class="w-100" src="assets/img/logo/login-logo-welcom.jpeg" alt="img">
                                </div>
                                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                    <strong>!Sorry,</strong> You can't able to Register, You Definetly have office in tamil nadu
                                </div>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                    <strong>Success</strong><br> Please Wait... <Wait class="Wait">
                                        <div class="d-flex justify-content-start align-items-start">
                                            <div class="spinner-grow text-primary spinner-border-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>

                                    </Wait>
                                </div> -->

                                <form action="{{ route('userregister') }}" class="p-2"  method="POST">
                                @csrf
                                <p id="tooltip-1" title="Please Select Who You are" class="fs-5 fw-bold">Please Select Who You are?</p>
                                    <hr>
                                    <div class="row login_static">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1"  name="usertype" value="Publisher" checked>
                                                <label class="form-check-label" for="radio1"> Publisher</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2"  name="usertype" value="Distributor">
                                                <label class="form-check-label" for="radio2"> Distributor</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio3"  name="usertype" value="PublisherDistributor">
                                                <label class="form-check-label" for="radio3"> Publisher Cum
                                                    Distributor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br>
                                    <p class="reg-redirect mt-3 p-0 m-0">
                                        If you have an account <a class="text-primary" href="/login" id="tooltip-2" title="User Login"> Login</a>
                                    </p>
                                    <p class="reg-redirect p-0 m-0">
                                        <a class="text-primary" href="/forgotform" id="tooltip-3" title="Forgot User Password"> Forgot Password?</a>
                                    </p>
                                    <div class="tpabout__inner-btn login_static_new mb-5">
                                        <button class="g-recaptcha btn btn-dark bg-dark text-white"   id="submit" >Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>


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
    $(function() {
        $("#tooltip-1").tooltip();
        $("#tooltip-2").tooltip();
        $("#tooltip-3").tooltip();
    });
    </script>

</html>
<style>
.overflowTest.ms-3 li{
}
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
.overflowTest {
    width: 100%;
    height: 143px;
    overflow: scroll;
}
/* Hide scrollbar for Chrome, Safari and Opera */
.overflowTest::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.overflowTest {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
a.nav-link.active i {
    color: white !important;
}
</style>
