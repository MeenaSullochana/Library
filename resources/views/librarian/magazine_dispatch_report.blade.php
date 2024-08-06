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

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Periodical Dispatch Report</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="/librarian/index">
                                <i class="fas fa-plus"></i> Dashboard </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Periodical Dispatch Report</h4>

                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST"
                                    action="/librarian/Dispatch_magazinereport" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Ensure CSRF token is generated -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="id">Periodical</label>
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="id" name="id"
                                                    class="default-select form-control wide form-control-sm" >
                                                    <option value="">Choose any one</option>
                                                    @php
                                            $magazines = DB::table('magazines')->where('status','=','1')->get();
                                            @endphp
                                                    @foreach($magazines as $val)
                                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="monthyear">From Month and Year</label>
                                            <input class="form-control input-daterange-datepicker" type="month"
                                                id="monthyear" name="monthyear" min="1918-03" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="monthyear">To Month and Year</label>
                                            <input class="form-control input-daterange-datepicker" type="month"
                                                id="monthyear1" name="monthyear1" min="1918-03" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Frequency">Frequency</label>
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="Frequency" name="Frequency"
                                                    class="default-select form-control wide form-control-sm" >
                                                    <option value="">Choose any one</option>
                                                    @php
                                                    $periodicities = DB::table('magazine_periodicities')
                                                        ->where('status', '=', 1)
                                                          ->orderBy('created_at', 'Asc')
                                                           ->get();
                                                            @endphp
                                                    @foreach($periodicities as $val)
                                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="librarytype">Library Type</label>
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="librarytype" name="librarytype"
                                                    class="default-select form-control wide form-control-sm" >
                                                    <option value="">Choose any one</option>
                                                    @php
                                                        $categories = DB::table('library_types')->get();
                                                        @endphp
                                                    @foreach($categories as $val)
                                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> -->

                              

                                        <!-- <div class="col-md-6">
                                            <label for="status">Status</label>
                                            <div
                                                class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                <select id="status" name="status"
                                                    class="default-select form-control wide form-control-sm" >
                                                    <option value="">Choose any one</option>
                                                    <option value="1">Received</option>
                                                    <option value="0">Not Received</option>
                                                  
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="col-xl-12 mt-3 text-end">
                                            <button type="submit"
                                                class="dt-button buttons-excel buttons-html5 bg-primary text-white btn btn-sm border-0 mt-3">
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
    @include ('librarian.footer')
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
    include 'librarian/plugin/plugin_js.php';
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