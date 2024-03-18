
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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
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
        <div class="content-body" style="min-height: 728px;">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Public Reviewer</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/member_list">
                                <i class="fas fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card dz-card" id="bootstrap-table2">
                        <!-- tab-content -->
                        <main>
                            <!-- Your Content Use Here -->
                            <div class="container">
                                <div class="reviewer mt-3 mb-5">
                                    <h3 class="fw-bold">Public Reviewer</h3>

                                    <div class="form-validation">

                                        <form action="">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Name<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Name"  value="{{$data->name}}"
                                                            id="name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Mobile number<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter  Mobile Number" id="phoneNumber"  value="{{$data->phoneNumber}}"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="">Membership Details</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">District<span
                                                                class="text-danger maditory">*</span></label>
                                                        <select name="library_type" class="form-select" id="district"
                                                            required="">
                                                            <option value="{{ $data->district }}">{{ $data->district }}</option>

                                                      @php
                                                      $selectedState = $data->district;
                                                       $districts = DB::table('districts')->where('status', '=', 1)->where('name', '!=', $selectedState)->get();
                                                      @endphp

                                                       @foreach($districts as $state)
                                                       <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                        @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Membership Id<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Id"  value="{{$data->membershipId}}"
                                                            id="membershipId" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="">Login Details</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Email<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter Email" id="email"  value="{{$data->email}}" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter Password" id="newpassword" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                                class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Enter Password" id="confirmpassword" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="submitButton"  data-id="{{$data->id}}">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- Your Content End Here -->
                                </div>
                            </div>
                        </main>
                        <!-- /tab-content -->
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
</body>

<script>
    $(document).on('click', '#submitButton', function (e) {
        e.preventDefault();
        var data = {
            'id':$(this).data('id'),
            'district': $('#district').val(),
            'membershipId': $('#membershipId').val(),
            'email': $('#email').val(),
            'password': $('#password1').val(),
            'phoneNumber': $('#phoneNumber').val(),
            'name': $('#name').val(),
            'newpassword': $('#newpassword').val(),
            'confirmpassword': $('#confirmpassword').val(),

        };
        console.log(data);
        $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/admin/publicedit",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
             window.location.href ="/admin/member_list"
         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })


        // Additional logic or Ajax request can be added here
    });
</script>

</html>
