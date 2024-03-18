
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
    <title>Government of Tamil Nadu - Book Procurement </title>
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
                <div class="card-header flex-wrap bg-white mb-5">
                    <div class="d-flex align-items-center justify-content-between py-3">
                        <h5 class=" mb-0 text-gray-800 pl-3">View Fair Management</h5>

                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ol class="breadcrumb py-0 m-0">
                            <li class="breadcrumb-item"><a href="fair_manage_list.php">List of Fair Management</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#">View Fair Management
                                </a></li>
                        </ol>
                    </ul>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card profile-card card-bx m-b30">
                            <form class="profile-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h3>Event Details</h3>
                                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b> Event Title :</b> {{$data->eventTitle}}
                                                            </label>

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Event Start Date Time:</b>
                                                        {{$data->startDate}}    {{ date('h:i A', strtotime($data->StartTime)) }} </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Event Clossingt Date Time:</b>
                                                        {{$data->clossingDate}}   {{ date('h:i A', strtotime($data->clossingTime)) }}</label>
                                                    </div>

                                                        <div class="col-sm-12">
                                                        <label class="form-label"><b>Application Apply From :</b> {{$data->applyFromDate}}
                                                           </label>
                                                       </div>
                                                       <div class="col-sm-12">
                                                        <label class="form-label"><b>Application Apply To :</b> {{$data->applyFromDate}}
                                                           </label>
                                                       </div>
                                                       <div class="col-sm-12">
                                                        <label class="form-label"><b>Number of Stall :</b> {{$data->totalStall}}
                                                           </label>
                                                       </div>


                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Location Details :</b> {{$data->location}}
                                                           </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Description :</b> {{$data->description}}
                                                            </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Comment :</b> {{$data->comment}}
                                                            </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>District :</b> {{$data->district}}
                                                            </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Contact Details</h3>
                                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Contact Person Name : </b>
                                                        {{$data->contactPersonName}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Phone (IND) : </b>+91
                                                        {{$data->mobileNumber}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Email :</b> {{$data->email}} </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Website :
                                                            </b>{{$data->website}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Address :</b> {{$data->address}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <h3>Emergency Contact Details</h3>
                                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Contact Person Name : </b>
                                                        {{$data->emergencyContactnName}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Phone (IND) : </b>+91
                                                        {{$data->emergencyMobileNumber}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Designation :
                                                            </b>{{$data->emergencyDesignation}}</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Authority Contact Details</h3>
                                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Contact Person Name : </b>
                                                        {{$data->authorityContactnName}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Phone (IND) : </b>+91
                                                        {{$data->authorityMobileNumber}}</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label"><b>Designation :
                                                            </b>{{$data->authorityDesignation}}</label>
                                                    </div>

                                                </div>
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

</html>
<style>
    .card{

    }
</style>

