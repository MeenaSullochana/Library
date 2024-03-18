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
    <title>Book Fair </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
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
        @include ('sub_admin.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-header flex-wrap bg-white mb-5">
                    <div class="d-sm-flex align-items-center justify-content-between py-3">
                        <h5 class=" mb-0 text-gray-800 pl-3">Create Fair Management</h5>

                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ol class="breadcrumb py-0 m-0">
                            <li class="breadcrumb-item"><a href="/sub_admin/fair_manage_list">List of Fair
                                    Management</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#">Create Fair Management
                                </a></li>
                        </ol>
                    </ul>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card profile-card card-bx m-b30">
                        <form class="profile-form" method="POST"  action="/sub_admin/fairmanageadd">
                           @csrf
                            <div class="card-body">
                                <div class="row">
                            
                                    <div class="col-md-6">
                                        <h3 class="mb-5">Event Details</h3>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Event Title</label>
                                            <input type="text" class="form-control"  value="{{ old('eventTitle') }}" name="eventTitle" placeholder="Enter  Event Title" required
                                                value="">
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label">Event Start Date Time</label>
                                            <input type="datetime-local" class="form-control" name="startdatetime" value="{{ old('startdatetime') }}"
                                                id="validationCustom02"  placeholder=" valid event date time.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a event date time.
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label">Event Clossing Date Time</label>
                                            <input type="datetime-local" class="form-control" name="clossingdatetime" value="{{ old('clossingdatetime') }}"
                                                id="validationCustom02"  placeholder=" valid event date time.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a event date time.
                                            </div>
                                        </div>
                                     
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Application Apply From</label>
                                            <input type="date" class="form-control" placeholder="" name="applyFromDate" value="{{ old('applyFromDate') }}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Application Apply To</label>
                                            <input type="date" class="form-control" placeholder="" name="applyToDate" value="{{ old('applyToDate') }}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Number of Stall</label>
                                            <input type="number" class="form-control" placeholder="Enter Number of Stall " name="totalStall" value="{{ old('totalStall') }}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Location Details  </label>
                                            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                                placeholder="Enter  Location Details " value="" required>
                                                <div class="invalid-feedback">
                                                Please enter a Location Details.
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control h-50" id="validationCustom04" value=""  name="description" rows="3" placeholder="What would you like to see?" required="">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Comment</label>
                                            <textarea class="form-control h-50" id="validationCustom04" name="comment" rows="3" value=""  placeholder="What would you like to see?" required="">{{ old('comment') }}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                              <label for="inputState" class="form-label">District </label></label>
                                             <select id="pub_district" class="form-select"  name="district"  required>
                                             <option name="" value="{{ old('district') }}">{{ old('district') }}</option>
                                             @foreach($district as $val)
                                             <option name="{{$val->name}}" >{{$val->name}}</option>
                                             @endforeach
                                             </select>
                                           </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-5">Contact Details</h3>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" name="contactPersonName"
                                                placeholder="Enter  Contact  Person Name" value="{{ old('contactPersonName') }}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" name="mobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter  Phone" value="{{ old('mobileNumber') }}" >
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Email </label>
                                            <input type="email" class="form-control" name="email" placeholder="name@gmail.com" required
                                                value="{{ old('email') }}">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Website</label>
                                            <input type="text" name="website" class="form-control" placeholder="http://example.com"
                                                value="{{ old('website') }}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control h-50" id="validationCustom04" name="address" value="" rows="4" placeholder="Enter full Address " required="">{{ old('address') }}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <h3 class="mb-4">Emergency Contact Details</h3>
                                            <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" name="emergencyContactnName"
                                                placeholder="Enter Emergency  Person Name" value="{{ old('emergencyContactnName') }}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" name="emergencyMobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter  Emergency Phone" value="{{ old('emergencyMobileNumber') }}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Designation</label>
                                            <input type="type" class="form-control" name="emergencyDesignation" placeholder="Enter Your Emergency Designation " value="{{ old('emergencyDesignation') }}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <h3 class="mb-4">Authority Details</h3>
                                            <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" name="authorityContactnName"
                                                placeholder="Enter  Authority  Person Name" value="{{ old('authorityContactnName') }}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" name="authorityMobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter Authority Phone" value="{{ old('authorityMobileNumber') }}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" name="authorityDesignation" placeholder="Enter Authority Designation" value="{{ old('authorityDesignation') }}" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <!-- <a href="sub_admin_forgot_password.php" class="btn-link">Forgot your password?</a> -->
                                <button class="btn btn-primary text-end">Submit</button>
                            </div>
                        </form>
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
        @include ("sub_admin.footer")
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
        include "sub_admin/plugin/plugin_js.php";
         ?>
</body>
@if (Session::has('success'))

<script>
toastr.success("{{ Session::get('success') }}", {
    timeout: 15000
});
</script>
@elseif (Session::has('error'))
<script>
toastr.error("{{ Session::get('error') }}", {
    timeout: 15000
});
</script>

@endif

</html>