
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
                                                            <select name="reviewer_type" id="reviewerType" class="form-select" Disable>
                                                              @if($data->reviewerType  == "internal")
                                                                <option value="internal">Internal</option>

                                                             @else

                                                                <option value="external">External</option>
                                                               @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Name<span
                                                             class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Name" id="name" value="{{$data->name}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Subject<span
                                                              class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Subject" id="subject" value="{{$data->subject}}" Required>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Designation<span
                                                              class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter designation" id="designation"  value="{{$data->designation}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Organisation Details <span
                                                             class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter OrganisationDetails" id="organisationDetails"  value="{{$data->organisationDetails}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Phone number<span
                                                               class="text-danger maditory">*</span></label>
                                                            <input type="number" class="form-control" placeholder="Enter  Phonenumber" id="phoneNumber" value="{{$data->phoneNumber}}"  Required>
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
                                                                        <img src="{{ asset("reviewer/ProfileImage/".$data->profileImage) }}" alt="" id="output" >
                                                                        <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                                                            <input type="file" class="update-flie" id="profileImage" onchange="loadFile(event)" Required>
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
                                        <div class="row" >
                                        @if($data->reviewerType  != "internal")
                                            <div class="col-md-12" id="bankDetailsFields" style="display: block;">
                                                 <h3 class="">Bank Details </h3>
                                                   <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Bank Name<span
                                                             class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Bank Name"  id= "bankName" value="{{$data->bankName}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Account Number<span
                                                               class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Account Number" id="accountNumber" value="{{$data->accountNumber}}" Required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Branch<span
                                                                class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Branch" id="branch" value="{{$data->branch}}" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">IFSC Number<span
                                                               class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter IFSC Number" id="ifscNumber" value="{{$data->ifscNumber}}" Required>
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
                                                        <input type="text" class="form-control" placeholder="Enter Email" id="email"  value="{{$data->email}}" Required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter Password" id="newpassword" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter Password" id="confirmpassword"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary" data-id="{{$data->id}}" id="submitButton">Submit</button>
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
        var subject = $('#subject').val();
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
            url: "/admin/editreviewer",
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    $('#ProfileImage').val(response.type);
                    $('#output').attr('src', response.type);
                    setTimeout(function() {
                        window.location.href = "/admin/member_list"
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 2000 });
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
