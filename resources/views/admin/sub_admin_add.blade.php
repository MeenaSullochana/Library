
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
    <title>Government of Tamil Nadu - Book Procurement - Create Sub Admin</title>
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
                <div class="card-header flex-wrap bg-white mb-5">
                    <div class="d-flex align-items-center justify-content-between py-3">
                        <h4 class=" mb-0 text-gray-800 pl-3">Create Sub Admin</h4>

                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ol class="breadcrumb py-0 m-0">
                            <li class="breadcrumb-item"><a href="/admin/sub_admin_list">Sub Admin List</a>
                            </li>

                            <li class="breadcrumb-item"><a href="/admin/sub_admin_add">Create Sub Admin
                                </a></li>
                        </ol>
                    </ul>
                </div>


                <form class="profile-form" method="POST"  action="/admin/subadminadd" enctype='multipart/form-data'>
                    @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="clearfix">
                            <div class="card card-bx profile-card author-profile m-b30">
                                <div class="card-body">
                                    <div class="p-5">
                                        <div class="author-profile">
                                            <div class="author-media">
                                                <img src="{{ old('subadminImage','images/user.jpg') }}" alt="" id="output">
                                                <div class="upload-link" title="" data-toggle="tooltip"
                                                    data-placement="right" data-original-title="update" >
                                                    <input type="file" name="subadminImage"  class="update-flie" onchange="loadFile(event)" required>

                                                    <i class="fa fa-camera"></i>
                                                </div>
                                            </div>
                                            <div class="author-info">
                                                <h6 class="title">Upload Picture</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card profile-card card-bx m-b30">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                                                value="{{ old('name') }}" required>
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">User Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Your User Name" name="userName"
                                                    value="{{ old('userName') }}" required>
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Designation <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Your Designation"  value="{{ old('designation') }}" name="designation" required>
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"  placeholder="Enter Your Phone" pattern="\d{10}" required title="phone must be at least 10 number" placeholder="Enter Your phone" name="mobileNumber"
                                                    value="{{ old('mobileNumber') }}"required>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" pattern=".{8,}" required title="Password must be at least 8 characters long" placeholder="Enter Your Password" name="password"
                                                    value="{{ old('password') }}" required>
                                                    @error('password')
                                                <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                <input  type="password" class="form-control @error('confirmPassword') is-invalid @enderror" pattern=".{8,}" required title="Password must be at least 8 characters long" placeholder="Enter Your Password" placeholder="Enter Your Confirm Password" name="confirmPassword"
                                                value="{{ old('confirmPassword') }}" required>
                                                    @error('confirmPassword')
                                                <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                            @enderror
                                            </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Your Address" name="address"
                                                    value="{{ old('address') }}" required>
                                            </div>

                                            <div class="col-sm-12 m-b30">
                                              <label for="inputState" class="form-label">District  <span class="text-danger">*</span></label></label>
                                                <select id="pub_district" class="form-select bg-white" name="district"  required>
                                                <option name="" value="{{ old('district') }}">{{ old('district') }}</option>
                                                @foreach($district as $val)
                                                <option name="{{$val->name}}" >{{$val->name}}</option>
                                                @endforeach
                                                </select>
                                           </div>
                                            <div class="col-sm-12 m-b30">
                                                <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control"
                                                    placeholder="Enter Your Postal Code" name="postalCode" value="{{ old('postalCode') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">

                                    <button class="btn btn-primary text-end">Submit</button>
                                </div>

                        </div>
                    </div>
                </div>
                </form>
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
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<script>
    function loadFile(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</html>
