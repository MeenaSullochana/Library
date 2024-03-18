
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
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Select Reviewer Type<span
                                                               class="text-danger maditory">*</span></label>
                                                            <select name="reviewer_type" id="reviewerType" class="form-select" Required>
                                                          
                                                                <option value="internal">Librarian Reviewer</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 mb-3" id="basic9" style="display: none;">
                                                        <label class="form-label">District</label>
                                                        <select name="district" class="form-select" id="district" Required>
                                                        <option value="$data->district">{{$data->district}}</option>

                                                               @php
                                                                $districts = DB::table('districts')->where('status', '=', 1)->where('name', '!=',$data->district)->get();
                                                                @endphp

                                                            @foreach($districts as $state)
                                                             <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                             @endforeach
                                                        </select>

                                                    </div>
                                                       
                                                        
                                                       
                                                        <div class="col-sm-12 mb-3" >
                                                            <label class="form-label">Librarian Name<span
                                                             class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Librarian Name" value="{{$data->name}}" id="Librarian_Name" Required>
                                                        </div>
                                                    
                                                        <div class="col-sm-12 mb-3" >
                                                            <label class="form-label">Subject<span
                                                              class="text-danger maditory">*</span></label>
                                                            <!-- <input type="text" class="form-control" placeholder="Enter Subject" id="subject" Required> -->
                                                            <select class="form-select" id="subject"
                                                        name="subject" required>
                                                        <option value="{{$data->subject}}">{{$data->subject}}</span></option>
                                                        @php
                                                          $categori = DB::table('book_subject')->where('status','=','1')->where('name','=',$data->subject)->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        </div>
                                                   
                                                       
                                                    </div>
                                                    <div class="col-md-6">
                                                      
                                       <div class="col-sm-12 mb-3" >
                                                        <label class="form-label">Library Type<span
                                 class="text-danger maditory">*</span></label>
                                                        <select name="library_type" id="libraryType"  class="form-select" Required>
                                                        <option value="{{$data->libraryType}}">{{$data->libraryType}}</option>
                                                        @php
                                                          $categori = DB::table('library_types')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 mb-3" >
                                                            <label class="form-label">Library Name<span
                                                             class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control" placeholder="EnterLibrary Name"  value="{{$data->libraryName}}" id="libraryName" Required>
                                                        </div>
           
                                                     
                                                        <div class="col-sm-12 mb-3">
                                                            <label class="form-label">Phone number<span
                                                               class="text-danger maditory">*</span></label>
                                                            <input type="number" class="form-control" placeholder="Enter  Phonenumber" value="{{$data->phoneNumber}}" id="phoneNumber" Required>
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
        <img src="{{ asset('reviewer/images/default.png') }}" alt="" id="output">
    @else
        <img src="{{ asset('reviewer/ProfileImage/' . $data->profileImage) }}" alt="" id="output">
    @endif 
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

                                            
                                            <h3 class="">Login Details</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" placeholder="Enter Email" value="{{$data->email}}" id="email" Required>
                                                    </div>
                                                    <div class="col-sm-12 mb-6">
                                                        <label class="form-label">New Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter New Password" id="password" Required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="col-sm-12 mb-6">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="Confirmpassword">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-primary"  data-id="{{$data->id}}" id="submitButton">Submit</button>
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
       $(document).on('click','#submitButton',function(e){
        e.preventDefault();
         var password=$('#password').val();
         var email=$('#email').val();
         var phoneNumber=$('#phoneNumber').val();
         var subject=$('#subject').val();
         var reviewerType=$('#reviewerType').val();
         var libraryType=$('#libraryType').val();
         var libraryName=$('#libraryName').val();
         var librarianname=$('#Librarian_Name').val();
         var district=$('#district').val();
         var profileImage = $('#profileImage')[0].files;
         var id = $(this).data('id');
         var Confirmpassword=$('#Confirmpassword').val();

         let fd = new FormData();
         fd.append('newpassword',password);  
        fd.append('email',email);
        fd.append('phoneNumber',phoneNumber);
        fd.append('subject',subject);
        fd.append('reviewerType',reviewerType);
        fd.append('libraryType',libraryType);
        fd.append('libraryName',libraryName);
        fd.append('profileImage',profileImage[0])
         fd.append('librarianName',librarianname);
        fd.append('district',district);
        fd.append('confirmpassword',Confirmpassword);
        fd.append('id', id);
          $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             url:"/reviewer/editreviewer",
             data:fd,
             processData: false,
             contentType: false,

             success: function(response) {
                if(response.success){
                    toastr.success(response.success,{timeout:2000});

                    setTimeout(function() {
                    window.location.href ="/reviewer/librarianedit"
                     }, 3000);
                    
                }else{
                    toastr.error(response.error,{timeout:2000});
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

</style>
