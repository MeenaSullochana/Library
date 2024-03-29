
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">

<link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
<link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
<link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- tagify-css -->
<link href="/vendor/tagify/dist/tagify.css" rel="stylesheet">

<!-- Style css -->
<link href="{{asset('reviewer/css/style.css')}}" rel="stylesheet">
<style>
   .validation-errors {
    position: fixed;
    top: 250px;
    right: 20px;
    background-color: #ffcccc;
    border: 1px solid #ff0000;
    border-radius: 5px;
    padding: 10px;
    max-width: 500px;
    max-height: 200px; /* Set a fixed height */
    overflow-y: auto; /* Add vertical scrollbar */
    z-index: 1000; /* Ensure it appears above other content */
}

.validation-errors ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.validation-errors ul li {
    color: #ff0000;
    margin-bottom: 5px;
}

</style>

</head>

<body class="vh-100">
    <div class="page-wraper">
        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url('{{asset("reviewer/images/background/bg6.png")}}'); height: 100vh;">
                <div class="row gx-0">
                    <div class="mx-auto col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">
                                    <div class="card-body">
 @if (Session::has('validation_error'))
    <div class="validation-errors">
        <div class="error-list">
            <ul>
                @foreach (Session::get('validation_error')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
                                    <div class="logo-header">
                                        <a href="" class="logo"><img src="/assets/img/logo/logo.png" alt="" class="light-logo"></a>
                                        <a href="" class="logo"><img src="/assets/img/logo/logo.png" alt="" class="dark-logo"></a>
                                    </div>
                                  
                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form class=" dz-form pb-2 pb-0" method="POST" action="{{route('member.login')}}">
                                                            @csrf
                                                            <h3 class="form-title m-t0">Enter to login</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address and your password. </p>
                                                            <div class="row">
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-primary">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="customRadioBox1" value="reviewer" name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox1">Reviewer</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                    <div
                                                                        class="form-check custom-checkbox mb-3 checkbox-secondary">
                                                                        <input type="radio" class="form-check-input"
                                                                            id="customRadioBox2" value="librarian" name="usertype">
                                                                        <label class="form-check-label"
                                                                            for="customRadioBox2">Librarian</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="text" id="email" value="{{ old('email') }}" required name="email"
                                                                class="field form-control @error('email') is-invalid @enderror"
                                                                placeholder="{{ __('Enter Username/Email') }}">
                                                                   @error('email')
                                                                <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="password" class="form-control @error('password') is-invalid @enderror" pattern=".{8,}" required title="Password must be at least 6 characters" placeholder="Enter Your Password" name="password"
                                                                value="{{ old('password') }}" required>
                                                                @error('password')
                                                                 <span class="invalid-feedback" role="alert">{{ __($message) }}</span>
                                                                 @enderror
                                                            </div>
                                                            <div class="form-group text-left mb-5 forget-main">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="login">Sign In</button>
                                                                </div>
                                                                <div class="col-xl-4 col-xxl-6 col-6">
                                                                <button
                                                                    class="nav-link m-auto btn tp-btn-light btn-primary forget-tab p-0"
                                                                    id="nav-forget-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-forget" type="button"
                                                                    role="tab" aria-controls="nav-forget"
                                                                    aria-selected="false">Forget Password ?</button>
                                                                </div>
                                                            </div>




                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                            <div class="col-lg-12 text-center">
                                                <span> Copyright © 2024
                                                    Directorate of Public Libraries, பொது நூலக இயக்ககம் All rights reserved by Directorate of Public Libraries.</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Blog Page Contant -->
        </div>
        <!-- Content END-->
    </div>
    <!--************
         Scripts
         *************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
	<script src="/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('reviewer/js/dashboard/dashboard-1.js')}}"></script>
	<script src="/vendor/draggable/draggable.js"></script>
	<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>


	<!-- tagify -->
	<script src="/vendor/tagify/dist/tagify.js"></script>

	<script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
	<script src="/vendor/datatables/js/buttons.html5.min.js"></script>
	<script src="/vendor/datatables/js/jszip.min.js"></script>
	<script src="{{asset('reviewer/js/plugins-init/datatables.init.js')}}"></script>

	<!-- Apex Chart -->

	<script src="/vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


	<!-- Vectormap -->
	<script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
	<script src="/vendor/jqvmap/js/jquery.vmap.world.js"></script>
	<script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
	<script src="{{asset('reviewer/js/custom.js')}}"></script>
	<script src="{{asset('reviewer/js/deznav-init.js')}}"></script>
	<script src="{{asset('reviewer/js/demo.js')}}"></script>
	<script src="{{asset('reviewer/js/styleSwitcher.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.validation-errors').fadeOut('slow');
            }, 15000); 
        });
    </script>
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


     $(document).on('click','#submit',function(e){
        e.preventDefault();
        console.log("hi");
        var data={
           'email':$('#emails').val(),
            'usertype':$("[name='usertype']:checked").val(),

        }

        console.log(data);
        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/member/memberforgotpassword",
           data:data,
           dataType:"json",
           success: function(response) {
            if(response.success){
                    toastr.success(response.success,{timeout:25000});
                    setTimeout(function() {
                        window.location.href = "/member/login";
                     }, 3000);
                }else{
                    toastr.error(response.error,{timeout:25000});
                }


        }
      });
  })



    </script>
    <style>
    .logo-header {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .logo img {
        max-width: 100%;
        height: auto;
    }
</style>
</html>
