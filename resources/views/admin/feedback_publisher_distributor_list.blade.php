
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
    <title>Government of Tamil Nadu - Book Procurement - List of Publisher cum Distributor Feedback</title>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>List of Publisher cum Distributor Feedback</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="feedback_pub_dist_view.php">
                                <i class="fas fa-plus"></i> View Feedback </a> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example4_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example4" class="display table dataTable no-footer"
                                        style="min-width: 845px" role="grid" aria-describedby="example4_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example4"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Roll No: activate to sort column descending"
                                                    style="width: 85.0156px;">S.no</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: 130.469px;"> Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Email: activate to sort column ascending"
                                                    style="width: 153.641px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Mobile Number: activate to sort column ascending"
                                                    style="width: 153.641px;">Mobile Number</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Create at: activate to sort column ascending"
                                                    style="width: 161.469px;">Create at</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Control: activate to sort column ascending"
                                                    style="width: 90.2812px;">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($data as $val)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$loop->index +1}}</td>
                                                <td>
                                                        <div class="d-flex align-items-center">
                                                        @if($val->image != null)
                                                                <img src="{{ asset("publisher_and_distributor /images/profile/".$val->image) }}" class="rounded-lg me-2" width="24" alt="">
                                                            @else
                                                                <img src="{{ asset("images/default.png") }}" class="rounded-lg me-2" width="24" alt="">
                                                            @endif

                                                            <span class="w-space-no">Dr.{{$val->firstname}} {{$val->lastname}}</span>
                                                        </div>
                                                    </td>
                                                <td>{{$val->email}}</td>
                                                <td>+91 {{$val->phone}}</td>
                                                <td><span class="badge light badge-success">{{$val->created_at->format('Y-m-d')}}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                    <a href="/admin/feedback_publisher_distributor/{{$val->id}}"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="/admin/feedbackdelete/{{$val->id}}" class="btn btn-danger shadow btn-xs sharp">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
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
