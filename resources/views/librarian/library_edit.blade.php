
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
    <style>
        .profile-form .form-control, .profile-form .bootstrap-select .dropdown-toggle {
            height: 36px !important;
            font-size: 1rem;
            border-radius: 0.375rem;
            border-color: #E6E6E6;
        }
    </style>
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
                                                        <label class="form-label">Type of Library<span
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
                                                        <input type="text" class="form-control" placeholder="Enter the library name" value="{{$data->libraryName}}" id="libraryName" Required>
                                          </div>
                                          <div class="col-sm-6 mb-3">
                                            <label class="form-label"> Library Code <span class="text-danger maditory">*</span></label>
                                            <input type="text" class="form-control" name="library_code" value="{{$data->librarianId}}"placeholder="Enter Library Code" id="library_code" readonly>
                                        </div>
                                        @if($data->metaChecker == "yes")
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
@endif

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
                                                        <label class="form-label">Village<span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="Village" class="form-control" placeholder="Enter the Village" id="Village" value="{{$data->Village}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Taluk<span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="taluk" class="form-control" placeholder="Enter the Taluk" id="taluk" value="{{$data->taluk}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Door No<span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="door_no" class="form-control" placeholder="Enter the Door No" id="door_no" value="{{$data->door_no}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Street Name<span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="street" class="form-control"  placeholder="Enter the Street Name" id="street" value="{{$data->street}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Place<span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="place" class="form-control" placeholder="Enter the Place" id="place" value="{{$data->place}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Landmark <span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="landmark" class="form-control" placeholder="Enter the Landmark" id="landmark" value="{{$data->landmark}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Post <span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="post" class="form-control" placeholder="Enter the Post" id="post" value="{{$data->post}}" Required>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Pin Code <span class="text-danger maditory">*</span></label>
                                                        <input type="text" name="pincode" class="form-control"  placeholder="Enter the Pin code" id="pincode" value="{{$data->pincode}}" Required>
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
                                                        placeholder="Enter the librarian name" id="librarianName" value="{{$data->librarianName}}"
                                                        required="">
                                                </div>
                                                @if($data->metaChecker == "yes")
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Are You Meta Checker<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id="metaChecker" class="form-select bg-white" required="">
                                                       @if($data->metaChecker == "yes")
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                        @else
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Librarian Designation<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the librarian designation" value="{{$data->librarianDesignation}}"
                                                        id="librarianDesignation" required="">
                                                </div>
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Phone number<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter the phone number" name="phoneNumber"  id="phoneNumber"  value="{{$data->phoneNumber}}" required="">
                                                </div>

                                            </div>
                                        </div>
                                        <h3 class="">Login Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-sm-12 mb-3">
                                                    <label class="form-label">Email<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="email" class="form-control" placeholder="Enter the email" value="{{$data->email}}"
                                                        id="email" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">New Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter the new password" id="newpassword" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Confirm Password<span
                                                          class="text-danger maditory">*</span></label>
                                                        <input type="password" class="form-control" placeholder="Enter the confirm password" id="confirmpassword"  >
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
      'door_no':$('#door_no').val(),
      'street':$('#street').val(),
      'place':$('#place').val(),
      'Village':$('#Village').val(),
      'landmark':$('#landmark').val(),
      'taluk':$('#taluk').val(),
      'post':$('#post').val(),
      'pincode':$('#pincode').val(),
      'state':$('#state').val(),
      'district':$('#district').val(),
      'librarianName':$('#librarianName').val(),
      'librarianDesignation':$('#librarianDesignation').val(),
      'phoneNumber':$('#phoneNumber').val(),
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
