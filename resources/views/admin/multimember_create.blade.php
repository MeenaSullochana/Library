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
                                <b>Create Member</b>
                            </h3>
                            <div>
                                <a class="btn btn-primary  btn-sm" href="/admin/member_list">
                                    <i class="fas fa-chevron-left"></i> List Of Reviewer </a>
                                    <a class="btn btn-primary  btn-sm" href="/admin/library_list">
                                        <i class="fas fa-chevron-left"></i> List Of Library  </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="">Select The Role </h3>
                                <hr>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label">Select the Role<span
                                 class="text-danger maditory">*</span></label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="2">Select Role</option>
                                            <option value="0">Reviewer</option>
                                            <option value="1">Library</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="reviewer">
                                    <form class="profile-form" id="formId" action="/admin/reviewer/import" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-validation">
                                            <h3 class="mb-3">Reviewer Excel Upload</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file" class="form-label">Choose Excel File</label>
                                                        <input type="file" class="form-control mb-2" name="file_reviewer" id="file" accept=".xls, .xlsx" required>
                                                        <small class="form-text text-muted mt-3"><img style="width: 30px; height=30px;" src="images/excel.png" alt="" width="25%"><b class="ms-3">Select .csv files only.</b></small>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="library">
                                    <form form class="profile-form" id="formId1">
                                         @csrf
                                        <div class="form-validation">
                                        <div class="row" >

                            
<h3 class=""> Library Excel Upload</h3>
<div class="row">
    <div class="col-md-6">
        <div class="col-sm-12 mb-3">
            <label class="form-label"></label>
             <input type="file" class="form-control mb-3" id="file" accept=".xls, .xlsx" multiple required>
             <small class="form-text text-muted mt-3 ms-"><img style="width: 30px; height=30px;" src="images/excel.png" alt="" width="25%"><b class="ms-3">Select .csv files only.</b></small>
        </div>
    </div>
   
</div>
<div class="row">
    <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
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

</body>


    <script>
        $(document).ready(function() {
            $('.library').css('display','none');
            $('.reviewer').css('display','none');
            var value;
            $('#role').on('change', function() {

                value = $(this).find(":selected").val();


                if (value == 0) {
                    $('.library').css('display','none');
                    $('.reviewer').css('display','block');
                } else if (value == 1) {
                    $('.reviewer').css('display','none');
                    $('.library').css('display','block');
                }
            });
        });
    </script>


</html>
<style>

</style>
