
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
    <title>Publisher - Login </title>
    <!-- FAVICONS ICON -->
    <!-- <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css
" rel="stylesheet"> -->
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
                style="background:#fff url(images/background/bg6.jpg); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">
                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="index.php" class="logo"><img src="images/logo.png" alt=""
                                                    width="100%" class=" light-logo"></a>
                                            <a href="index.php" class="logo"><img src="images/logo.png" alt=""
                                                    width="100%" class=" dark-logo"></a>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form class="dz-form">
                                                        @csrf
                                                            <h3 class="form-title m-t0">Change New Password ?</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address below to reset your password.
                                                            </p>
                                                            <div class="row">
                                                            <div class="col-xl-4 col-xxl-6 col-6">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-primary">
                                                                @if($data->type == "admin")
                                                                    <input type="radio" class="form-check-input" name="usertype" value="admin" name="usertype" checked disabled>
                                                                @else
                                                                    <input type="radio" class="form-check-input" name="usertype" value="admin" name="usertype" disabled>
                                                                @endif
                                                                <label class="form-check-label" for="customRadioBox1">Admin</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-4 col-xxl-6 col-6">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-secondary">
                                                                @if($data->type == "subadmin")
                                                                    <input type="radio" class="form-check-input" name="usertype" value="subadmin" name="usertype" checked disabled>
                                                                @else
                                                                    <input type="radio" class="form-check-input" name="usertype" value="subadmin" name="usertype" disabled>
                                                                @endif
                                                                <label class="form-check-label" for="customRadioBox2">Sub Admin</label>
                                                            </div>
                                                        </div>

                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="">Email Id</label>
                                                                <input  required="" class="form-control"
                                                                    placeholder="Email Address"  id="email" value="{{$data->email}}" type="text">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="">New Password</label>
                                                                <input  required="" class="form-control"
                                                                    placeholder="New Password" id="newpassword" type="password">
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label for="">Conform Password</label>
                                                                <input  required="" class="form-control"
                                                                    placeholder="Conform Password" id="conformpassword" type="password">
                                                            </div>
                                                            <div class="form-group clearfix text-left">

                                                                <button
                                                                    class="btn btn-primary float-end " id="submitdata" >Submit</button>
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
                                                <span> Copyright © 2023 Directorate of Public Libraries, பொது நூலக
                                                    இயக்ககம் <a href="#">| Design by Gladindia </a> </span>
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
    <!-- <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./js/demo.js"></script>
    <script src="./js/styleSwitcher.js"></script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js
"></script> -->
<?php
include "admin/plugin/plugin_js.php";
?>
<script>
    $(document).on('click', '#submitdata', function (e) {
        e.preventDefault();
       
        // Get values from form inputs
        var data = {
            'email': $('#email').val(),
            'newpassword': $('#newpassword').val(),
            'conformpassword': $('#conformpassword').val(),
            'usertype':$("[name='usertype']:checked").val(),
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
            url: "/admin/password/change",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 25000 });

                    // Redirect after 3 seconds
                    setTimeout(function () {
                        window.location.href = "/admin/login";
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