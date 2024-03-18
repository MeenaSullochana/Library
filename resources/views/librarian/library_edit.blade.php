
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

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
        @include ('librarian.navigation')
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
                                <b>Edit Profile</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="">
                                <i class="fas fa-plus"></i> List Of Member </a> -->
                        </div>
                    </div>
                </div>
                @php
    $id = auth('librarian')->user()->id;
    $data = DB::table('librarians')->find($id);
    $data->subject1= json_decode($data->subject); 
@endphp


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form form="" class="profile-form" id="formId1">
                                @csrf
                                    <div class="form-validation">
                                        <h3 class="">Library Details </h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Library Type<span
                                                          class="text-danger maditory">*</span></label>
                                                        <select name="library_type" id="libraryType" class="form-select bg-white" Required>
                                                        <option value="{{$data->libraryType}}">{{$data->libraryType}}</option>
                                                        @php
                                                          $categori = DB::table('library_types')->where('name','!=',$data->libraryType)->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Library Name<span
                                                       class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Library Name" value="{{$data->libraryName}}" id="libraryName" Required>
                                          </div>
                                          <div class="col-sm-6 mb-3">
                                                     <label class="form-label">Subject<span
                                                                class="text-danger maditory">*</span></label>
                                          <select id="limit-selection" name="subject[]" multiple class="select2">
    @php
        $categori = DB::table('book_subject')->where('status','=','1')->get();
        $selectedSubjects = is_array($data->subject1) ? $data->subject1 : [$data->subject1];
    @endphp
    @foreach($categori as $val)
        <option value="{{$val->name}}" {{in_array($val->name, $selectedSubjects) ? 'selected' : ''}}>{{$val->name}}</option>
    @endforeach
</select>
</div>

                                                    <div class="col-sm-6 mb-3">
                                                     <label class="form-label">State<span
                                                                class="text-danger maditory">*</span></label>
                                                        <select name="library_type" class="form-select bg-white" id="state" Required>
                                                           <option value="{{$data->state}}">{{$data->state}}</option>

                                                          @php
                                                             $states = DB::table('states')->where('name', '!=', $data->state)->where('status', '=', 1)->get();
                                                           @endphp

                                                          @foreach($states as $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                            @endforeach
                                                            </select>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">District<span
                                                     class="text-danger maditory">*</span></label>
                                                        <select name="library_type" class="form-select bg-white" id="district" Required>
                                                        <option value="{{$data->district}}">{{$data->district}}</option>

                                                               @php
                                                                $districts = DB::table('districts')->where('name', '!=',$data->district)->where('status', '=', 1)->get();
                                                                @endphp

                                                            @foreach($districts as $state)
                                                             <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                             @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">City<span
                                                         class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter City" value="{{$data->city}}" id="city" Required>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Village<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Village" value="{{$data->Village}}" id="Village" Required>
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
                                                        placeholder="Enter librarian Name" id="librarianName" value="{{$data->librarianName}}"
                                                        required="">
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Are You Meta Checker<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id="metaChecker" class="form-select" required="">
                                                       @if($data->metaChecker == "yes")
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        @else
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Librarian Designation<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter librarian Designation" value="{{$data->librarianDesignation}}"
                                                        id="librarianDesignation" required="">
                                                </div>
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Phone number<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Phone number" id="mobileNumber"  value="{{$data->phoneNumber}}" required="">
                                                </div>

                                            </div>
                                        </div>
                                        <h3 class="">Login Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Email<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="email" class="form-control" placeholder="Enter Emaile" value="{{$data->email}}"
                                                        id="email" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter New Password" id="newpassword" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="confirmpassword"  >
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary "   data-id="{{$data->id}}" id="submit">Submit</button>
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
        @include ("librarian.footer")
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
        include "librarian/plugin/plugin_js.php";
    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#limit-selection').select2({
            minimumInputLength: 0 // Disable minimum input length
        });
    });
</script>
<script>

$(document).on('click','#submit',function(e){
   e.preventDefault();
   var data={

        'id':$(this).data('id'),
      'libraryType':$('#libraryType').val(),
      'metaChecker':$('#metaChecker').val(),
      'libraryName':$('#libraryName').val(),
      'state':$('#state').val(),
      'district':$('#district').val(),
      'city':$('#city').val(),
      'Village':$('#Village').val(),
      'librarianName':$('#librarianName').val(),
      'librarianDesignation':$('#librarianDesignation').val(),
      'phoneNumber':$('#mobileNumber').val(),
      'email':$('#email').val(),
      'subject': $('select[name="subject[]"]').val(),
      'newpassword':$('#newpassword').val(),
      'confirmpassword':$('#confirmpassword').val(),

   }

   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/librarian/librarianedit",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
             $('#formId1')[0].reset();
             setTimeout(function() {
                        window.location.href = "/librarian/library_edit"
                    }, 3000);
         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })

})

</script>
</html>
