
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
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
        @include("publisher_and_distributor.navigation")
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
                                <b>Application Management</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="fair_manage_add.php">
                                <i class="fas fa-plus"></i> Add </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 bg-success text-white p-3">
                        <marquee behavior="" direction=""><img src="images\avatar\new.gif" alt="new gif Image"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi et temporibus architecto sint nesciunt necessitatibus itaque ratione, odio ullam, atque nulla accusantium aspernatur excepturi reprehenderit cumque quae maiores deserunt vel.<img src="images\avatar\new.gif" alt="new gif Image"></marquee>
                    </div>
                </div>
                <div class="row">
                    <div class="card mt-5">
                        <div class="col-md-12">
                            <div class="panel panel-primary panel-table">
                                <div class="panel-heading mt-3">
                                    <h3 class="panel-title" style="font-weight:700;">Notifications/Advertisements
                                        Details</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="9%">
                                                        <strong>S.No.</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="9%">
                                                        <strong>Event Tittle.</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="9%">
                                                        <strong>District</strong>
                                                    </th>
                                                    <th class="text-center text-white" colspan="2" valign="middle" width="10%">
                                                        <strong>Fair Date</strong>
                                                    </th>
                                                    <th class="text-center text-white" colspan="2" valign="middle" width="10%">
                                                        <strong>Application Date</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="10%">
                                                        <strong>Contect Persion Name</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="10%">
                                                        <strong>Contect Number</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="7%">
                                                        <strong>Total Stall</strong>
                                                    </th>
                                                    <th class="text-center text-white" rowspan="3" valign="middle" width="10%">
                                                        <strong>Activity</strong>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center text-white" valign="middle"><strong>Start</strong></th>
                                                    <th class="text-center text-white" valign="middle"><strong>End</strong></th>
                                                    <th class="text-center text-white" valign="middle"><strong>Start</strong></th>
                                                    <th class="text-center text-white" valign="middle"><strong>End</strong></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($events as $val)
                                                <tr>
                                                <td class="text-center" valign="middle">{{$loop->index +1}}</td>
                                                <td valign="middle" class="text-center">{{$val->eventTitle}}</td>
                                                    <td class="text-center" valign="middle">{{$val->district}}</td>
                                                    <td valign="middle" class="text-center">{{$val->startDate}}</td>
                                                    <td valign="middle" class="text-center">{{$val->clossingDate}}</td>
                                                    <td valign="middle" class="text-center">{{$val->applyFromDate}}</td>
                                                    <td valign="middle" class="text-center">{{$val->applyToDate}}</td>

                                                    <td valign="middle" class="text-center">
                                                      {{$val->contactPersonName}}
                                                    </td>
                                                    <td valign="middle" class="text-center">
                                                       {{$val->mobileNumber}}
                                                    </td>
                                                    <td valign="middle" class="text-center">
                                                       {{$val->totalStall}}
                                                    </td>
                                                    <td valign="middle" class="text-center">
                                                        <a class="text-danger" data-id="C00085" href="/publisher_and_distributor/fair_application/{{$val->id}}">Apply Now</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
        @include("publisher_and_distributor.footer")
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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
</body>

</html>
<style>
.panel-primary {
    border-color: #337ab7;
}

.table tbody tr td {
    vertical-align: middle;
    border-color: #E6E6E6;
    text-wrap: pretty !important;
    background: transparent !important;
}

</style>
