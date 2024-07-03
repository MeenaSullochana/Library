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
    <style>
    .profile-form .form-control,
    .profile-form .bootstrap-select .dropdown-toggle {
        height: 36px !important;
        font-size: 1rem;
        border-radius: 0.375rem;
        border-color: #E6E6E6;
    }
    </style>
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
                                <b>Edit Librarian Reviwer</b>
                            </h3>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="reviewer">
                                    <form class="profile-form" id="formId">
                                        @csrf
                                        <div class="form-validation">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Select Reviewer Type<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <select name="reviewer_type" id="reviewerType"
                                                                    class="form-select" required>
                                                                    <option value="internal">Librarian Reviewer</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">District</label>
                                                                <select name="district" class="form-select"
                                                                    id="district" required>
                                                                    @php
                                                                    $districts = DB::table('districts')->where('status',
                                                                    '=', 1)->get();
                                                                    @endphp
                                                                    <option></option>
                                                                    @foreach($districts as $state)
                                                                    <option value="{{ $state->name }}">
                                                                        {{ $state->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Librarian Name<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Librarian Name"
                                                                    id="Librarian_Name" required>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Librarian Code<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Librarian Code"
                                                                    id="Librarian_code" required>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Category<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <select id="limit-selection" name="Category[]" multiple
                                                                    class="select2">
                                                                    @php
                                                                    $categories =
                                                                    DB::table('special_categories')->where('status',
                                                                    '=', 1)->get();
                                                                    @endphp
                                                                    @foreach($categories as $val)
                                                                    <option value="{{ $val->name }}">{{ $val->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Library Type<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <select name="library_type" id="libraryType"
                                                                    class="form-select" required>
                                                                    @php
                                                                    $library_types =
                                                                    DB::table('library_types')->where('status', '=',
                                                                    1)->get();
                                                                    @endphp
                                                                    @foreach($library_types as $val)
                                                                    <option value="{{ $val->name }}">{{ $val->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Library Name<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Library Name" id="libraryName"
                                                                    required>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Designation<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Designation" id="designation"
                                                                    required>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Phone number<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Enter Phone number" id="phoneNumber"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <div class="clearfix">
                                                        <div class="card card-bx profile-card author-profile m-b30">
                                                            <div class="card-body">
                                                                <div class="p-5">
                                                                    <div class="author-profile">
                                                                        <div class="author-media">
                                                                            <img src="" alt="" id="output">
                                                                            <div class="upload-link" title=""
                                                                                data-toggle="tooltip"
                                                                                data-placement="right"
                                                                                data-original-title="update">
                                                                                <input type="file" class="update-flie"
                                                                                    id="profileImage"
                                                                                    onchange="loadFile(event)" required>
                                                                                <i class="fa fa-camera"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="author-info">
                                                                            <h6 class="title">Add Profile</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h3 class="">Login Details</h3>
                                                <div class="row">
                                                   
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Email" id="email" required>
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Password<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="password" class="form-control"
                                                                placeholder="Enter Password" id="password" required>
                                                        </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-end">
                                                        <button type="submit" class="btn btn-primary"
                                                            id="submitButton">Submit</button>
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
$(document).on('click', '#submitButton', function(e) {
    e.preventDefault();
    var password = $('#password').val();
    var email = $('#email').val();
    var phoneNumber = $('#phoneNumber').val();
    var Category = $('select[name="Category[]"]').val();
    var reviewerType = $('#reviewerType').val();
    var libraryType = $('#libraryType').val();
    var libraryName = $('#libraryName').val();
    var librarianname = $('#Librarian_Name').val();
    var district = $('#district').val();
    var designation = $('#designation').val();
    var Librarian_code = $('#Librarian_code').val();

    
    var profileImage = $('#profileImage')[0].files;
    let fd = new FormData();
    fd.append('password', password);
    fd.append('designation', designation);
    fd.append('email', email);
    fd.append('phoneNumber', phoneNumber);
    fd.append('Category', Category);
    fd.append('reviewerType', reviewerType);
    fd.append('libraryType', libraryType);
    fd.append('libraryName', libraryName);
    fd.append('profileImage', profileImage[0])
    fd.append('librarianName', librarianname);
    fd.append('district', district);
    fd.append('Librarian_code', Librarian_code);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "/admin/create_reviewer",
        data: fd,
        processData: false,
        contentType: false,

        success: function(response) {
            if (response.success) {
                toastr.success(response.success, {
                    timeout: 2000
                });

                setTimeout(function() {
                    window.location.href = "/admin/librarian_reviewer_create"
                }, 3000);

            } else {
                toastr.error(response.error, {
                    timeout: 2000
                });
            }


        }
    });

});
</script>

<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
</script>

</html>
<style>

</style>