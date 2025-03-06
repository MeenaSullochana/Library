
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
    <title>Government of Tamil Nadu - Book Procurement - Library Data Download</title>
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b> Library Data Report Download</b>
                            </h3>
                            {{-- <a class="btn btn-primary  btn-sm" href="index">
                                    <i class="fas fa-plus"></i> Dashboard </a> --}}
                        </div>
                    </div>
                </div>
@php


 $library=  DB::table('librarians')->where('metaChecker','no')
 ->where('allow_status','0')
 ->where('libraryType','District Library Office -DLO')->get();
   

    @endphp

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Library Data Report Download</h4>

                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST"
                                    action="/admin/report_downl_library" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                   
                                        <div class="col-xl-6 mb-6">
                                                     <label class="form-label">Dlo Wise Library <span
                                                                class="text-danger maditory"></span></label>
                                                        <select name="type" class="form-select bg-white" id="type" Required>
                                                           <option value="">Select type</option>
                                                           @foreach($library as $val   )

                                                           <option value="{{$val->librarianId}}">{{$val->libraryName}}  {{$val->dlo_district}}</option>

                                                           @endforeach
                                                         
                                                            </select>
                                             </div> 
                                               
                                             <div class="col-xl-6 mb-6">
                                            <label class="form-label">Library Type<span
                                                       class="text-danger maditory"></span></label>
                                               <select name="librarytype" class="form-select bg-white" id="librarytype" Required>
                                                  <option value="">Select type</option>
                                                  <option value="0">ALL Records</option>
                                                  <option value="1">Library</option>
                                                  <option value="2">DLO </option>
                                                  <option value="3">Metachecker</option>
                                             
                                                   </select>
                                    </div> 
                                                    <div class="col-xl-10 mt-3 text-center">
                                                        <button class="btn btn-primary" id="submitBtn">
                                                            <span><i class="fa-solid fa-file-excel"></i> Export Report
                                                                download</span>
                                                        </button>
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
</html>
