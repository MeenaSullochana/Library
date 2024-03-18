<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registration For Public To Review Books </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php
    include "plugin/css.php";
    ?>
</head>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->
        @include("header.top_header")
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->
        @include("header.middile_navigation")
        @include("header.navigation")
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->
        @include("header.mobile_navigation")
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->

    <main>
        <!-- Your Content Use Here -->
        <div class="container">
            <div class="reviewer mt-3">
                <h3 class="fw-bold">Registration For Public To Review Books</h3>
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Success!</strong> You should check in on some of
                    those fields below.
                </div>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Failed!</strong> You should check in on some of
                    those fields below.
                </div> -->

                <div class="form-validation">
                <form form class="profile-form" id="formId">
                 @csrf
                <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="col-sm-12 mb-3">
                                     <label class="form-label">Name<span
                                     class="text-danger maditory">*</span></label>
                                     <input type="text" class="form-control" placeholder="Enter Name" id="name" Required>
                                     </div>

                                    </div>
                                    <div class="col-md-6">
                                        
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Mobile number<span
                                         class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" placeholder="Enter  Mobile Number" id="phoneNumber" Required>
                                    </div>

                                </div>
                                    </div>
                                     </div>
                                     <div class="row">
                                            <h3 class="">Membership Details</h3>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="col-sm-12 mb-3">
                                                        <label class="form-label">District<span
                                                     class="text-danger maditory">*</span></label>
                                                        <select name="library_type" class="form-select" id="district" Required>
                                                        <option value="">Select District</option>

                                                               @php
                                                                $districts = DB::table('districts')->where('status', '=', 1)->get();
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
                                     <input type="text" class="form-control" placeholder="Enter Id" id="membershipId" Required>
                                     </div>
                                         </div>
                                     </div>

                                    <div class="row">
                                            <h3 class="">Login Details</h3>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="col-sm-12 mb-3">
                                                 <label class="form-label">Email<span
                                                  class="text-danger maditory">*</span></label>
                                                  <input type="email" class="form-control" placeholder="Enter Email" id="email" Required>
                                             </div>
                                             </div>
                                             <div class="col-md-6">
                                             <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Password<span
                                                     class="text-danger maditory">*</span></label>
                                                    <input type="password" class="form-control" placeholder="Enter Password" id="password1" Required>
                                                </div>
                                         </div>
                                     </div>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                           </div>
                </form>
            </div>
        </div>
        <!-- Your Content End Here -->
    </main>

    <!-- footer-area-start -->
    @include("footer.footer")
    <!-- footer-area-end -->
    <?php
    include "plugin/js.php";
    ?>
  <script>
    $(document).ready(function() {
        $('#uploadInput').on('change', function(e) {
            var input = e.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profileImage').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="path/to/main.js"></script>

<script>
    $(document).on('click', '#submitButton', function (e) {
        e.preventDefault();
        var data = {
            'district': $('#district').val(),
            'membershipId': $('#membershipId').val(),
            'email': $('#email').val(),
            'password': $('#password1').val(),
            'phoneNumber': $('#phoneNumber').val(),
            'name': $('#name').val(),
           
        };
        $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/publicregister",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
             window.location.href = '/mailconfirmation';

         }else{
             toastr.error(response.error,{timeout:25000});
         }
       
     }
   })
       

        // Additional logic or Ajax request can be added here
    });
</script>

<style>

</style>

</html>