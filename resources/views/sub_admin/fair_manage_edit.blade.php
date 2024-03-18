
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
                        <h5 class=" mb-0 text-gray-800 pl-3">Update Fair Management</h5>

                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ol class="breadcrumb py-0 m-0">
                            <li class="breadcrumb-item"><a href="/sub_admin/fair_manage_list">List of Fair Management</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#">Update Fair Management
                                </a></li>
                        </ol>
                    </ul>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card profile-card card-bx m-b30">
                        <form class="profile-form" method="POST">
                        @csrf
                         
                            <div class="card-body">
                                <div class="row">
                            
                                    <div class="col-md-6">
                                        <h3 class="mb-5">Event Details</h3>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Event Title</label>
                                            <input type="text" class="form-control" id="eventTitle" placeholder="Enter Your Event Title" required
                                                value="{{$data->eventTitle}}">
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label">Event Start Date Time</label>
                                            <input type="datetime-local" class="form-control" id="startdatetime"
                                                 value="{{$data->startdatetime}}" placeholder="Your valid event date time.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a event date time.
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label">Event Clossing Date Time</label>
                                            <input type="datetime-local" class="form-control" id="clossingdatetime"
                                                 value="{{$data->clossingdatetime}}" placeholder="Your valid event date time.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a event date time.
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Application Apply From</label>
                                            <input type="date" class="form-control" placeholder="" id="applyFromDate" value="{{$data->applyFromDate}}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Application Apply To</label>
                                            <input type="date" class="form-control" placeholder="" id="applyToDate" value="{{$data->applyToDate}}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Number of Stall</label>
                                            <input type="number" class="form-control" placeholder="Enter Number of Stall " id="totalStall" value="{{$data->totalStall}}"
                                            required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Location Details  </label>
                                            <input type="text" class="form-control" id="location"
                                                placeholder="Enter Your Location Details " value="{{$data->location}}" required>
                                                <div class="invalid-feedback">
                                                Please enter a Location Details.
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control h-50" value="{{$data->description}}"  id="description" rows="3" placeholder="What would you like to see?" required="">{{$data->description}}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Comment</label>
                                            <textarea class="form-control h-50" value="{{$data->comment}}" id="comment" rows="3" placeholder="What would you like to see?" required="">{{$data->comment}}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                              <label for="inputState" class="form-label">District </label></label>
                                             <select  class="form-select" id="district"  required>
                                             <option name="" value="{{$data->district}}">{{$data->district}}</option>
                                             @foreach($data->District as $val)
                                             <option name="{{$val->name}}" >{{$val->name}}</option>
                                             @endforeach
                                             </select>
                                           </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-5">Contact Details</h3>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" id="contactPersonName"
                                                placeholder="Enter Your Contact  Person Name"value="{{$data->contactPersonName}}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" id="mobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter Your Phone" value="{{$data->mobileNumber}}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Email </label>
                                            <input type="email" class="form-control" id="email" placeholder="name@gmail.com" required
                                            value="{{$data->email}}">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Website</label>
                                            <input type="text" id="website" class="form-control" placeholder="http://example.com"
                                                value="{{$data->website}}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control h-50"  id="address" rows="4" placeholder="Enter your full Address " value="{{$data->address}}" required="">{{$data->address}}</textarea>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <h3 class="mb-4">Emergency Contact Details</h3>
                                            <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" id="emergencyContactnName"
                                                placeholder="Enter Emergency  Person Name" value="{{$data->emergencyContactnName}}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" id="emergencyMobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter  Emergency Phone" value="{{$data->emergencyMobileNumber}}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Designation</label>
                                            <input type="type" class="form-control" id="emergencyDesignation" placeholder="Enter Your Emergency Designation " value="{{$data->emergencyDesignation}}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <h3 class="mb-4">Authority Details</h3>
                                            <div class="col-sm-12 m-b30">
                                            <label class="form-label">Contact Person Name</label>
                                            <input type="text" class="form-control" id="authorityContactnName"
                                                placeholder="Enter  Authority  Person Name" value="{{$data->authorityContactnName}}" required>
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Phone (IND)</label>
                                            <input type="text" class="form-control" id="authorityMobileNumber"  pattern="\d{10}" required title="phone must be at least 10 number" 
                                                placeholder="Enter Authority Phone" value="{{$data->authorityMobileNumber}}" required="">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Designation</label>
                                            <input type="text" class="form-control" id="authorityDesignation" placeholder="Enter Authority Designation" value="{{$data->authorityDesignation}}" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button class="btn btn-primary " id="submitButton"  data-id="{{ $data->id }}" type="submit">Submit</button>
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

<script>
    $(document).ready(function () {
        $(document).on('click', '#submitButton', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var data = {
                'eventTitle': $('#eventTitle').val(),
                'startdatetime': $('#startdatetime').val(),
                'clossingdatetime': $('#clossingdatetime').val(),
                'location': $('#location').val(),
                'description': $('#description').val(),
                'comment': $('#comment').val(),
                'district': $('#district').val(),
                'contactPersonName': $('#contactPersonName').val(),
                'mobileNumber': $('#mobileNumber').val(),
                'email': $('#email').val(),
                'website': $('#website').val(),
                'address': $('#address').val(),
                'emergencyMobileNumber': $('#emergencyMobileNumber').val(),
                'authorityMobileNumber': $('#authorityMobileNumber').val(),
                'emergencyContactnName': $('#emergencyContactnName').val(),
                'emergencyDesignation': $('#emergencyDesignation').val(),
                'authorityContactnName': $('#authorityContactnName').val(),
                'authorityDesignation': $('#authorityDesignation').val(), // Added comma here
                'applyFromDate': $('#applyFromDate').val(),
                'applyToDate': $('#applyToDate').val(),
                'totalStall': $('#totalStall').val(),
            }
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: "/sub_admin/fairupdate/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 25000 });
                        setTimeout(function () {
                            window.location.href = "/sub_admin/fair_manage_list";
                        }, 3000);
                    } else {
                        toastr.error(response.error, { timeout: 25000 });
                    }
                }
            })
        })
    })
</script>

</html>