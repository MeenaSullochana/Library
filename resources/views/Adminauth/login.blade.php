
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement  </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    {{-- <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css
" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<?php
        include "admin/plugin/plugin_css.php";
    ?>
</head>

<body class="vh-100">
    <div class="page-wraper">
        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url(images/background/bg6.png); height: 100vh;">
                <div class="row gx-0">
                    <div class="mx-auto col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">
                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="index.php" class="logo"><img src="/assets/img/logo/logo.png" alt=""
                                                    class=" light-logo"></a>
                                            <a href="index.php" class="logo"><img src="/assets/img/logo/logo.png" alt=""
                                                    class=" dark-logo"></a>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form class=" dz-form pb-2 pb-0" method="POST" action="{{route('admin.login')}}">
                                                            @csrf
                                                            <h3 class="form-title m-t0">Enter To Login</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address and your password. </p>
                                                            <div class="row">
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-primary">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="customRadioBox1" value="admin" name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox1">Admin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-secondary">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="customRadioBox2" value="subadmin" name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox2">Sub Admin</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="email" id="email" value="{{ old('email') }}" required name="email"
                                                                class="field form-control @error('email') is-invalid @enderror"
                                                                placeholder="{{ __('Enter the Email ID') }}">
                                                                   @error('email')
                                                                <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="password" class="form-control @error('password') is-invalid @enderror" pattern=".{6,}" required title="Password must be at least 6 characters" placeholder="Enter Your Password" name="password"
                                                                value="{{ old('password') }}" required>
                                                                @error('password')
                                                                 <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="form-group text-left mb-5 forget-main">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="login">Sign Me In</button>
                                                                </div>
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                <button
                                                                    class="nav-link m-auto btn tp-btn-light btn-primary forget-tab "
                                                                    id="nav-forget-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-forget" type="button"
                                                                    role="tab" aria-controls="nav-forget"
                                                                    aria-selected="false">Forget Password ?</button>
                                                                </div>
                                                            </div>




                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-forget" role="tabpanel"
                                                        aria-labelledby="nav-forget-tab">
                                                        <form class="dz-form">
                                                            <h3 class="form-title m-t0">Forget Password ?</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address below to reset your password.
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-primary">
                                                                        <input type="radio" class="form-check-input"
                                                                             value="admin" id="usertype"  name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox1" >Admin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-secondary">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="customRadioBox2" value="subadmin" name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox2">Sub Admin</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <input name="email" required="" class="form-control"
                                                                    placeholder="Email Address" id="emails" type="text" required>
                                                            </div>
                                                            <div class="form-group clearfix text-left">
                                                                <button class=" active btn btn-primary"
                                                                    id="nav-personal-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-personal" type="button"
                                                                    role="tab" aria-controls="nav-personal"
                                                                    aria-selected="true">Back</button>
                                                                <button
                                                                    class="btn btn-primary float-end" id="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                            <div class="col-lg-12 text-center">
                                              <span> Copyright © 2024 .Directorate of Public Libraries, பொது நூலக இயக்ககம். All rights reserved by Directorate of Public Libraries.</a></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Blog Page Contant -->
        </div>
        <!-- Content END-->
    </div>
    <!--************
         Scripts
         *************-->
    <!-- Required vendors -->
    {{-- <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./js/demo.js"></script>
    <script src="./js/styleSwitcher.js"></script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<?php
include "admin/plugin/plugin_js.php";
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


     $(document).on('click','#submit',function(e){
        e.preventDefault();
        console.log("hi");
        var data={
           'email':$('#emails').val(),
            'usertype':$("[name='usertype']:checked").val(),

        }

        console.log(data);
        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/admin/forgotpassword",
           data:data,
           dataType:"json",
           success: function(response) {
            if(response.success){
                    toastr.success(response.success,{timeout:25000});
                    setTimeout(function() {
                        window.location.href = "/admin/login";
                     }, 3000);
                }else{
                    toastr.error(response.error,{timeout:25000});
                }


        }
      });
  })



    </script>
</html>
