
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
    include "reviewer/plugin/plugin_css.php";
?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        @include("reviewer.navigation")
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Change Password</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="view_profile.php">
                                <i class="fas fa-plus"></i> View Profile </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Column starts -->
                    <div class="col-xl-12 col12">

                        <div class="card-body bg-white">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Current
                                                    Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="currentPassword"
                                                        placeholder="Enter Current Password" required="" value="">
                                                    <div class="invalid-feedback">
                                                        Please enter a CurrentPassword.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">New
                                                    Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="newPassword"
                                                        placeholder="Enter New Password" required="" value="">
                                                    <div class="invalid-feedback">
                                                        Please enter New Password .
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Confirm Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="confirmPassword"
                                                        placeholder="Enter Confirm Password" required="" value="">
                                                    <div class="invalid-feedback">
                                                        Please enter Confirm Password .
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-3 ms-auto">
                                            <button type="submit" class="btn btn-primary " id="submitButton">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column ends -->
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        @include("reviewer.footer")
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php
    include "reviewer/plugin/plugin_js.php";
?>
</body>

<script>

       $(document).on('click','#submitButton',function(e){
          e.preventDefault();
          var data={
             'currentPassword':$('#currentPassword').val(),
             'newPassword':$('#newPassword').val(),
             'confirmPassword':$('#confirmPassword').val(),
          }
          $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             url:"/reviewer/changepassword",
             data:data,
             dataType:"json",
             success: function(response) {
                if(response.success){
                    toastr.success(response.success,{timeout:25000});
                    document.getElementById('currentPassword').value = '';
                    document.getElementById('newPassword').value = '';
                    document.getElementById('confirmPassword').value = '';
                }else{
                    toastr.error(response.error,{timeout:25000});
                }

            }
          })

       })

      </script>
</html>
