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
    <title>Government of Tamil Nadu - Book Procurement - Create Reviewer List</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

</head>

<body>

    <!--*******
        Preloader start
    ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
        Preloader end
    ********-->

    <!--************
        Main wrapper start
    *************-->
    <div id="main-wrapper">
        <!--************
            Nav header start
        *************-->
        @include ('admin.navigation')
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Slider Thirukkural Create</b>
                            </h3>
                            <div>
                                <a class="btn btn-primary  btn-sm" href="/admin/slider_setting_list">
                                    <i class="fas fa-arrow-left"></i>  List of Slider Thirukkural </a>
                                    
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card p-5">
                            <form class="admin-form" id="formId"  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="slug"> Thirukkural First Line  <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="thirukkuralFirstLine" name="thirukkuralFirstLine" placeholder="Enter Thirukkural" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="slug"> Thirukkural Second Line  <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="thirukkuralSecondLine" name="thirukkuralSecondLine" placeholder="Enter Thirukkural" rows="2" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="slug"> Shot Description   <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="shotDescription" name="shotDescription" placeholder="Enter Shot Description" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="slug"> Long Description   <span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="longDescription" name="longDescription" placeholder="Enter Long Description" rows="8" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="adding">
                                        <label for="slug">Status  <span class="text-danger">*</span></label>
                                        <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                            <select id="status" name="status" class="default-select form-control wide form-control-sm" required>
                                                <option value=""> </option>
                                                <option value="1">Active </option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-primary" id="submitbutton">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************
            Content body end
        *************-->
        <!--************
            Footer start
        *************-->
        @include ("admin.footer")
        <!--************
            Footer end
        *************-->

        <!--************
           Support ticket button start
        *************-->

        <!--************
           Support ticket button end
        *************-->


    </div>
    <!--************
        Main wrapper end
    *************-->
    <?php
        include "admin/plugin/plugin_js.php";
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#limit-selection').select2({
            minimumInputLength: 0 // Disable minimum input length
        });
    });
</script>
<script>

$(document).on('click','#submitbutton',function(e){
   e.preventDefault();
   

   
   var data = {
      'thirukkuralFirstLine': $('#thirukkuralFirstLine').val(),
      'thirukkuralSecondLine': $('#thirukkuralSecondLine').val(),
      'shortDescription': $('#shotDescription').val(),
      'longDescription': $('#longDescription').val(),
 

   
};
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/admin/thirukkuraladd",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             setTimeout(function() {
                    window.location.href ="/admin/slider_setting"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});

         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })

})

</script>
</body>
</html>
<style>

</style>
