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
    <link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
        include "reviewer/plugin/plugin_css.php";
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
        @include ('reviewer.navigation')
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
                                <b>Edit Profile</b>
                            </h3>


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
                                <div class="reviewer">
                                    <form form class="profile-form" id="formId">
                                        @csrf
                                        <div class="form-validation">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {{-- <hr> --}}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Select Reviewer Type<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <select name="reviewer_type" id="reviewerType"
                                                                    class="form-select bg-white" Readonly>

                                                                    <option value="internal">Librarian Reviewer</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">District</label>
                                                                <select name="district" class="form-select"
                                                                    id="district">
                                                                    <option value="$data->district" Readonly>
                                                                        {{$data->district}}</option>

                                                                    <!-- @php
                                                                $districts = DB::table('districts')->where('status', '=', 1)->where('name', '!=',$data->district)->get();
                                                                @endphp

                                                            @foreach($districts as $state)
                                                             <option value="{{ $state->name }}" Readonly>{{ $state->name }}</option>
                                                             @endforeach -->
                                                                </select>

                                                            </div>



                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Librarian Name<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter librarian name"
                                                                    value="{{$data->name}}" id="Librarian_Name">
                                                            </div>

                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Category<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <!-- <input type="text" class="form-control" placeholder="Enter Subject" id="subject" Required> -->
                                                                <select id="limit-selection" name="Category[]" multiple
                                                                    class="select2" disabled>
                                                                    @php
                                                                    $book_subject2 = DB::table('special_categories')
                                                                    ->where('status', '=', '1')
                                                                    ->get();

                                                                    $selectedSubjects = explode(',', $data->Category);
                                                                    @endphp

                                                                    @foreach ($selectedSubjects as $subject)
                                                                    <option value="{{ $subject }}" selected>
                                                                        {{ $subject }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <style>
                                                                /* Custom styling for disabled select to make it look readonly */
                                                                .select2-container--default .select2-selection--multiple {
                                                                    background-color: #e9ecef;
                                                                    /* Light gray background */
                                                                    border: 1px solid #ced4da;
                                                                    /* Border similar to enabled state */
                                                                    cursor: not-allowed;
                                                                    /* Show not-allowed cursor */
                                                                    color: #6c757d;
                                                                    /* Text color for the disabled select */
                                                                }

                                                                .select2-container--default .select2-selection--multiple .select2-selection__choice {
                                                                    background-color: #6c757d;
                                                                    /* Darker gray for selected options */
                                                                    border: 1px solid #ced4da;
                                                                    /* Border for selected options */
                                                                    padding: 0.25rem 0.5rem;
                                                                    /* Padding inside selected options */
                                                                    cursor: default;
                                                                    /* Default cursor */
                                                                    color: #ffffff;
                                                                    /* Text color for selected options */
                                                                }
                                                                </style>

                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Library Type<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <select name="library_type" id="libraryType"
                                                                    class="form-select bg-white">
                                                                    <option value="{{$data->libraryType}}" Readonly>
                                                                        {{$data->libraryType}}</option>
                                                                    <!-- @php
                                                          $categori = DB::table('library_types')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach -->
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Library Name<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter library name"
                                                                    value="{{$data->libraryName}}" id="libraryName"
                                                                    Readonly>
                                                            </div>


                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Phone number<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Enter phone number"
                                                                    value="{{$data->phoneNumber}}" id="phoneNumber"
                                                                    Required>
                                                            </div>
                                                            <div class="col-sm-12 mb-3">
                                                                <label class="form-label">Designation<span
                                                                        class="text-danger maditory">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="EnterLibrary Name"
                                                                    value="{{$data->designation}}" id="designation"
                                                                    readonly>
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
                                                                            @if($data->profileImage == null)
                                                                            <img src="{{ asset('reviewer/images/default.png') }}"
                                                                                alt="" id="output">
                                                                            @else
                                                                            <img src="{{ asset('reviewer/ProfileImage/' . $data->profileImage) }}"
                                                                                alt="" id="output">
                                                                            @endif
                                                                            <div class="upload-link" title=""
                                                                                data-toggle="tooltip"
                                                                                data-placement="right"
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


                                                <h3 class="">Login Details</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter email" value="{{$data->email}}"
                                                                id="email" Required>
                                                        </div>
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">New Password<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="password" class="form-control"
                                                                placeholder="Enter new password" id="password" Required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control"
                                                                placeholder="Enter confirm password"
                                                                id="Confirmpassword">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 ">
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
        <!--************
            Content body end
        *************-->
        <!--************
            Footer start
        *************-->
        @include ("reviewer.footer")
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
        include "reviewer/plugin/plugin_js.php";
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
    var subject = $('#subject').val();
    var reviewerType = $('#reviewerType').val();
    var libraryType = $('#libraryType').val();
    var libraryName = $('#libraryName').val();
    var librarianname = $('#Librarian_Name').val();
    var district = $('#district').val();
    var profileImage = $('#profileImage')[0].files;
    var id = $(this).data('id');
    var Confirmpassword = $('#Confirmpassword').val();
    var designation = $('#designation').val();




    let fd = new FormData();
    fd.append('newpassword', password);
    fd.append('email', email);
    fd.append('phoneNumber', phoneNumber);
    fd.append('subject', subject);
    fd.append('reviewerType', reviewerType);
    fd.append('designation', designation);

    fd.append('libraryType', libraryType);
    fd.append('libraryName', libraryName);
    fd.append('profileImage', profileImage[0])
    fd.append('librarianName', librarianname);
    fd.append('district', district);
    fd.append('confirmpassword', Confirmpassword);
    fd.append('id', id);
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

                setTimeout(function() {
                    window.location.href = "/reviewer/librarianedit"
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
.profile-form .form-control,
.profile-form .bootstrap-select .dropdown-toggle {
    height: 36px !important;
    font-size: 1rem;
    border-radius: 0.375rem;
    border-color: #E6E6E6;
}
</style>