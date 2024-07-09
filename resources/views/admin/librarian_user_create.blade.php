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
                                <!-- <a class="btn btn-primary  btn-sm" href="/admin/member_list">
                                    <i class="fas fa-chevron-left"></i> List of Reviewer </a> -->
                                <a class="btn btn-primary  btn-sm" href="/admin/library_list">
                                    <i class="fas fa-chevron-left"></i> List of Library </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                             
                        
                         
                                <div class="library">
                                    <form class="profile-form needs-validation" novalidate id="formId1">
                                        @csrf
                                        <div class="form-validation">
                                            <h3 class="">Library Details </h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Library Type<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select name="library_type" id="libraryType1"
                                                                class="form-select bg-white" Required>
                                                                <option value="">Select One</option>
                                                                @php
                                                                $categori =
                                                                DB::table('library_types')->where('status','=','1')->get();
                                                                @endphp
                                                                @foreach($categori as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Library Name<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter the Library Name" id="libraryName1"
                                                                Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label"> Library Code <span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="library_code"
                                                                placeholder="Enter the Library Code" id="library_code"
                                                                Required>
                                                        </div>

                                                      
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">State<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select name="library_type" class="form-select bg-white"
                                                                id="state" Required>
                                                                <option value="">Select State</option>
                                                                @php
                                                                $states = DB::table('states')->where('status', '=',
                                                                1)->get();
                                                                @endphp

                                                                @foreach($states as $state)
                                                                <option value="{{ $state->name }}">{{ $state->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">District<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select name="library_type" class="form-select bg-white"
                                                                id="district1" Required>
                                                                <option value="">Select District</option>
                                                                @php
                                                                $districts = DB::table('districts')->where('status',
                                                                '=', 1)->get();
                                                                @endphp

                                                                @foreach($districts as $state)
                                                                <option value="{{ $state->name }}">{{ $state->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                    

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Village<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Your Village" id="Village" Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Taluk<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Your Taluk" id="taluk" Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Door No<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="door_no"
                                                                placeholder="Enter Your Door No" id="door_no" Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Street Name<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="street_name"
                                                                placeholder="Enter Your Street Name" id="street_name"
                                                                Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Place<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="place"
                                                                placeholder="Enter Your Place" id="place" Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Landmark <span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="landmark"
                                                                placeholder="Enter Your Landmark" id="landmark"
                                                                Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Post <span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" name="post"
                                                                placeholder="Enter Your Post" id="post" Required>
                                                        </div>

                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label">Pin Code <span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="number" class="form-control" name="pin_code"
                                                                placeholder="Enter Your Pincode" id="pin_code" Required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="">Contact Person Details</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Librarian Name<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter the Librarian Name" id="librarianName1"
                                                            Required>
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Librarian Code<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter the Librarian Code" id="librariancode"
                                                            Required>
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Are You Meta Checker<span
                                                                class="text-danger maditory">*</span></label>
                                                        <select name="" id="metaChecker" class="form-select bg-white"
                                                            Required>
                                                            <option value="">Select One</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Librarian Designation<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Your Librarian Designation"
                                                            id="librarianDesignation" Required>
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Phone Number<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter Your Phone Number" id="mobileNumber"
                                                            Required>
                                                    </div>
                                                    <div class="col-sm-12 mb-3" id = "basic1" style="display: none;">
                                                            <label class="form-label">Subject<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select id="limit-selection1" name="subject[]" multiple
                                                                class="select2 ">
                                                                @php
                                                               
                                                                $book_subject2 = DB::table('book_subject')
                                                                ->where('status', '=', '1')
                                                                ->where('type', '=', 'Tamil')
                                                               
                                                                  ->get();
                                                                @endphp
                                                                @php
                                                               
                                                               $book_subject3 = DB::table('book_subject')
                                                               ->where('status', '=', '1')
                                                               ->where('type', '=', 'English')
                                                              
                                                                 ->get();
                                                               @endphp
                                                                @foreach($book_subject2 as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                                @endforeach
                                                                @foreach($book_subject3 as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <h3 class="">Login Details</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Email<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter Your Email" id="email1" Required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Password<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter Your Password" id="password1" Required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary"
                                                    id="submit">Submit</button>
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
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
    <script>
    $(document).ready(function() {
        $('#limit-selection').select2({
            minimumInputLength: 0 // Disable minimum input length
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#limit-selection1').select2({
            minimumInputLength: 0 // Disable minimum input length
        });
    });
    </script>
</body>


<script>
$(document).on('click', '#submit', function(e) {
    e.preventDefault();



    var data = {
        'libraryType': $('#libraryType1').val(),
        'metaChecker': $('#metaChecker').val(),
        'libraryName': $('#libraryName1').val(),
        'state': $('#state').val(),
        'district': $('#district1').val(),
        'Village': $('#Village').val(),
        'taluk': $('#taluk').val(),
        'door_no': $('#door_no').val(),
        'street_name': $('#street_name').val(),
        'place': $('#place').val(),
        'landmark': $('#landmark').val(),
        'post': $('#post').val(),
        'pin_code': $('#pin_code').val(),
        'librarianName': $('#librarianName1').val(),
        'librariancode': $('#librariancode').val(),
        'librarianDesignation': $('#librarianDesignation').val(),
        'phoneNumber': $('#mobileNumber').val(),
        'subject': $('select[name="subject[]"]').val(), 
        'email': $('#email1').val(),
        'password': $('#password1').val()
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "/admin/librarian",
        data: data,
        dataType: "json",
        success: function(response) {
            if (response.success) {
                toastr.success(response.success, {
                    timeout: 25000
                });
                $('#formId1')[0].reset();
                $('select[name="subject[]"]').val(null).trigger('change');

            } else {
                toastr.error(response.error, {
                    timeout: 25000
                });
            }

        }
    })

})
</script>
<script>
document.getElementById('metaChecker').addEventListener('change', function() {
    var basic1 = document.getElementById('basic1'); // Corrected this line

    if (this.value === 'yes') {
        basic1.style.display = 'block';
        $('select[name="subject[]"]').val(null).trigger('change');
    } else {
        basic1.style.display = 'none';
        $('select[name="subject[]"]').val(null).trigger('change');
    }
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
    height: 35px !important;
    font-size: 1rem;
    border-radius: 0.375rem;
    border-color: #E6E6E6;
}
</style>