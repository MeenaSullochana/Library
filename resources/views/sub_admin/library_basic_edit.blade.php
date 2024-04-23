
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
    <title>Government of Tamil Nadu - Book Procurement </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

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
        @include ('admin.navigation')
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Edit Member</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="member_list.php">
                                <i class="fas fa-plus"></i> List Of Member </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form form="" class="profile-form" id="formId1">
                                @csrf
                                    <div class="form-validation">
                                       
                                        <div class="row">
                                        <h3 class="">Login Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Email<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="email" class="form-control" placeholder="Enter Email" value="{{$data->email}}"
                                                        id="email" required="">
                                                </div>
                                                <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter New Password" id="newpassword" >
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                               
                                                    <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Phone number<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Phone number" id="mobileNumber"  value="{{$data->phoneNumber}}" required="">
                                               
                                                       </div>
                                               
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirmpassword"  >
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary "   data-id="{{$data->id}}" id="submit">Submit</button>
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
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
        @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#limit-selection').select2({
            minimumInputLength: 0 // Disable minimum input length
        });
    });
</script>
<script>

$(document).on('click','#submit',function(e){
   e.preventDefault();
   var data={

        'id':$(this).data('id'),
      'phoneNumber':$('#mobileNumber').val(),
      'email':$('#email').val(),
      'newpassword':$('#newpassword').val(),
      'confirmpassword':$('#confirmpassword').val(),

   }

   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/admin/librarianeditnew",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
             $('#formId1')[0].reset();
             setTimeout(function() {
                        window.location.href = "/admin/library_list"
                    }, 3000);
         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })

})

</script>
</html>
