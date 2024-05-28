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
    <link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
        include "reviewer/plugin/plugin_css.php";
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
        @include ('reviewer.navigation')
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
                                <b>Edit Profile</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/reviewer/index">
                                <i class="fas fa-arrow-left"></i> Dashboard </a>
                        </div>
                    </div>
                </div>
                @php
                $id = auth('reviewer')->user()->id;
                $data = DB::table('reviewer')->find($id);

                @endphp
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form form="" class="profile-form" id="formId">
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
                                                                class="form-select bg-white" Disable>
                                                                @if($data->reviewerType == "internal")
                                                                <option value="internal">Internal</option>

                                                                @else

                                                                <option value="external">External</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Name<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter name" id="name"
                                                                value="{{$data->name}}" Required>
                                                        </div>
                                                        @if($data->reviewerType != "internal")
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Subject<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select id="limit-selection" name="subject[]" multiple
                                                                class="select2">
                                                                @php

                                                                $categori = DB::table('book_subject')->where('status',
                                                                '=', '1')->get();

                                                                $subject1 = json_decode($data->subject, true);
                                                               
                                                                $selectedSubjects = is_array($subject1) ? $subject1 :
                                                                [$subject1];
                                                                @endphp
                                                                @foreach($categori as $val)
                                                                <option value="{{$val->name}}"
                                                                    {{in_array($val->name, $selectedSubjects) ? 'selected' : ''}}>
                                                                    {{$val->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        @else
                                                        <div class="col-sm-12 mb-3">

                                                            <label class="form-label">Category<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Category" id="Category"
                                                                value="{{$data->Category}}" Required>
                                                        </div>

                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Designation<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter designation" id="designation"
                                                                value="{{$data->designation}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Organisation Details <span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter organisation details"
                                                                id="organisationDetails"
                                                                value="{{$data->organisationDetails}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Phone Number<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter phone number" id="phoneNumber"
                                                                value="{{$data->phoneNumber}}" Required>
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
                                                                        <img src="{{ asset("reviewer/ProfileImage/".$data->profileImage) }}"
                                                                            alt="" id="output">
                                                                        <div class="upload-link" title=""
                                                                            data-toggle="tooltip" data-placement="right"
                                                                            data-original-title="update">
                                                                            <input type="file" class="update-flie"
                                                                                id="profileImage"
                                                                                onchange="loadFile(event)" Required>
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
                                            @if($data->reviewerType != "internal")
                                            <div class="col-md-12" id="bankDetailsFields" style="display: block;">
                                                <h3 class="">Bank Details </h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Bank Name<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter bank name" id="bankName"
                                                                value="{{$data->bankName}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Account Number<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter account number" id="accountNumber"
                                                                value="{{$data->accountNumber}}" Required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Branch<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter branch" id="branch"
                                                                value="{{$data->branch}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">IFSC Number<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter IFSC number" id="ifscNumber"
                                                                value="{{$data->ifscNumber}}" Required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <h3 class="">Login Details</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Email<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter email" id="email"
                                                            value="{{$data->email}}" Required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter new password" id="newpassword">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter confirm password" id="confirmpassword">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary"
                                                        data-id="{{$data->id}}" id="submitButton">Submit</button>
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
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include ("reviewer.footer")
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#limit-selection').select2({
        minimumInputLength: 0 // Disable minimum input length
    });
});
</script>

<script>
$(document).on('click', '#submitButton', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var newpassword = $('#newpassword').val();
    var confirmpassword = $('#confirmpassword').val();
    var ifscNumber = $('#ifscNumber').val();
    var branch = $('#branch').val();
    var accountNumber = $('#accountNumber').val();
    var bankName = $('#bankName').val();
    var email = $('#email').val();
    var phoneNumber = $('#phoneNumber').val();
    var organisationDetails = $('#organisationDetails').val();
    var designation = $('#designation').val();
    var subject = $('select[name="subject[]"]').val();

    var name = $('#name').val();
    var reviewerType = $('#reviewerType').val();
    var profileImage = $('#profileImage')[0].files;
    let fd = new FormData();
    fd.append('newpassword', newpassword);
    fd.append('id', id);
    fd.append('confirmpassword', confirmpassword);
    fd.append('ifscNumber', ifscNumber);
    fd.append('branch', branch);
    fd.append('accountNumber', accountNumber);
    fd.append('bankName', bankName);
    fd.append('email', email);
    fd.append('organisationDetails', organisationDetails);
    fd.append('phoneNumber', phoneNumber);
    fd.append('designation', designation);
    fd.append('subject', subject);
    fd.append('name', name);
    fd.append('reviewerType', reviewerType);
    fd.append('profileImage', profileImage[0])
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "/reviewer/editreviewer",
        data: fd,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                toastr.success(response.success, {
                    timeout: 2000
                });
                $('#ProfileImage').val(response.type);
                $('#output').attr('src', response.type);
                setTimeout(function() {
                    window.location.href = "/reviewer/expertedit"
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