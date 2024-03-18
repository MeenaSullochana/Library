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
    <link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
        include "reviewer/plugin/plugin_css.php";
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
        @include ('reviewer.navigation')

        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="min-height: 989px;">
            <!-- row -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row gx-0">
                    <div class="col-xl-12">
                        <div class="card h-auto">
                            <div class="card-body p-0">
                                <div class="row gx-0">
                                    <!-- column -->
                                    <div class="col-xl-2 col-xxl-3">
                                        <div class="email-left-body">
                                            <div class="email-left-box dz-scroll" id="email-left">
                                                <div class="p-0">

                                                </div>
                                                <div class="mail-list rounded " >
                                                <a class="list-group-item " href="/reviewer/notification">
													<i class="fa-regular fa-paper-plane align-middle"></i>Notification List</a>

                                                    <a href="email-inbox.html" class="list-group-item active"><i
                                                            class="fa-regular fa-envelope align-middle"></i>Notification  View
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-xl-10 col-xxl-9">
                                        <div class="email-right-box">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="right-box-padding p-0">
                                                        <div class="read-wapper dz-scroll" id="read-content">
                                                            <div class="read-content">
                                                                <div
                                                                    class="media pt-3 d-sm-flex d-block justify-content-between">
                                                                    <div class="clearfix mb-3 d-flex">
                                                                    @if($data->profileImage == null){
                                                                        <img class="me-3 rounded" width="70" height="70"
                                                                            alt="image" src="{{asset("admin/images/default.png")}}">
                                                                       @else

                                                                       <img class="me-3 rounded" width="70" height="70"
                                                                            alt="image" src="{{asset("/admin/AdminImage/".$data->profileImage)}}">
@endif
                                                                        <div class="media-body me-2">
                                                                            <h5 class="text-primary mb-0 mt-1">{{$data->firstName}}</h5>
                                                                            <p class="mb-0">{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d ') }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix mb-3">

                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="media mb-2 mt-3">
                                                                    <div class="media-body"><span class="pull-end">{{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}</span>
                                                                        <h5 class="my-1 text-primary">Message</h5>
                                                                        @if($data->subject !=null)
                                                                        <p class="read-content-email">
                                                                            {{$data->subject}}</p>
                                                                            @else

                                                                            <p class="read-content-email">
                                                                            {{$data->message}}</p>
                                                                            @endif

                                                                            @if($data->attachment != null)
                                                                            <h5 class="my-1 text-primary">Attachment</h5>
                                                                             <div class="read-content-attachment">
                                                                                   <div class="row attachment">

                                                                                    <div class="col-auto">
                                                                                <a href="{{ asset('/attachment/' . $data->attachment) }}" class="text-muted"> {{ $data->attachment}}</a>
                                                                                 </div>

                                                                                   </div>
                                                                                </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        @include ("reviewer.footer")

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
        include "reviewer/plugin/plugin_js.php";
    ?>
</body>

</html>
