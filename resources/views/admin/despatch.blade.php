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
    <title>Government of Tamil Nadu - Periodical Procurement </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Despatch Periodical</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="/admin/index">
                                <i class="fa fa-chevron-left"></i> Back To </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="">Despatch Periodical</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" action="/admin/despatch_periodical" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="class" for="test_email">
                                                Start date

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label class="class" for="test_email">
                                                End date

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                        </div>
                                    </div>
                                    @php
                                    $rev = DB::table('periodicaldates')->where('status', '=', '0')->first();
                                    $startdate = $enddate = null; // Initialize variables

                                    if ($rev) {
                                    $startdate = new \DateTime($rev->startdate);
                                    $enddate = new \DateTime($rev->enddate);
                                    }
                                    @endphp

                                    <div class="col-md-6">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input name="startdate" type="date" class="form-control mail-address-width"
                                                id="startdate"
                                                value="{{ $startdate ? $startdate->format('Y-m-d') : '' }}"
                                                placeholder="Enter Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input name="enddate" type="date" class="form-control mail-address-width"
                                                id="enddate" value="{{ $enddate ? $enddate->format('Y-m-d') : '' }}"
                                                placeholder="Enter Date">
                                        </div>
                                    </div>


                                    <div class="form-group mb-8 text-end mt-8">
                                        <button type="submit" class="btn btn-primary mb-2"><i
                                                class="far fa-paper-plane"></i>
                                            Submit</button>
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
<style>
label {
    color: black !important;
}
</style>