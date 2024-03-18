
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
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>List of Pending Ticket</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="ticket_create.php">
                            <i class="fas fa-plus"></i> Create Ticket </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-12">
                        <div class="col-xl-12 col-lg-12">

                        @if($data !=null)
                            <div class="card overflow-hidden">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title">Ticket List</h4>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="widget-media">
                                        <ul class="timeline">
                                        @foreach($data as $val)

                                            <li>
                                                <div class="timeline-panel">
                                                <div class="pe-3">
                                                    <button type="button" class="icon-button">
                                                    @if(auth('publisher_distributor')->user()->profileImage == Null)
                                                        <img alt="image" width="50" src="{{asset("images/default.png")}}">

                                                        @else
                                                        <img alt="image" width="50" src="{{asset("publisher_and_distributor/images/profile/".auth('publisher_distributor')->user()->profileImage)}}">

                                                        @endif
                                                         @if(0<$val->messagecount)
                                                        <span class="icon-button__badge">{{$val->messagecount}}</span>
                                                        @endif
                                                    </button>
                                                </div>
                                                    <div class="media-body mb-3">
                                                    <h5 class="mb-1 new_com ">{{auth('publisher_distributor')->user()->firstName}}  {{auth('publisher_distributor')->user()->lastName}}

                                                        <small class="d-block">{{$val->date}}</small>
                                                        <br>
                                                        <h5 class="mb-1 new_com ">{{$val->subject}}</h5>
                                                        @if($val->status=="1")
                                                        <span class="badge bg-danger text-white">Pending</span>
                                                        @else
                                                        <span class="badge bg-success text-white">Completed</span>
                                                        @endif
                                                    </div>
                                                    <div class="stute_new d-flex">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-primary light sharp"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                                        </circle>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="/publisher_and_distributor/ticket_chat/{{$val->id}}">Chat</a>
                                                                <a class="dropdown-item" href="/publisher_and_distributor/ticket_view/{{$val->id}}">View</a>
                                                                <a class="dropdown-item" href="/publisher_and_distributor/ticketdelete/{{$val->id}}">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            @endforeach
                                            <!-- <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-info">
                                                        <img alt="image" width="50" src="images\avatar\1.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">Resport created successfully <span class="badge bg-danger text-text">Danger</span></h5>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="live_chat.php">Chat</a>
                                                            <a class="dropdown-item" href="ticket_view.php">View</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media me-2 media-success">
                                                        <img alt="image" width="50" src="images\avatar\1.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-1">Reminder : Treatment Time! <span class="badge bg-warning text-white">warning</span></h5>
                                                        <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="live_chat.php">Chat</a>
                                                            <a class="dropdown-item" href="ticket_view.php">View</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="chart-wrapper">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chart_widget_10" width="1148" height="438"
                                        style="display: block; width: 574px; height: 219px;"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            @else
                                <div class="container">
                                    <div class="alert alert-danger solid alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong>No Ticket Created.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    </div>
                                </div>
                                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <ul class="text-center d-flex p-5">
                    <li><p><i class="fa fa-window-restore p-3" aria-hidden="true"></i></p></li>
                    <li><p><i class="fa fa-window-restore p-3" aria-hidden="true"></i></p></li>
                    <li><p><i class="fa fa-window-restore p-3" aria-hidden="true"></i></p></li>
                    <li><p><i class="fa fa-window-restore p-3" aria-hidden="true"></i></p></li>
                    <li><p><i class="fa fa-window-restore p-3" aria-hidden="true"></i></p></li>
                </ul>
            </div> -->
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
<style>
            .icon-button {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50px;
                height: 50px;
                color: #333333;
                background: #dddddd;
                border: none;
                outline: none;
                border-radius: 50%;
            }

            .icon-button:hover {
                cursor: pointer;
            }

            .icon-button:active {
                background: #cccccc;
            }

            .icon-button__badge {
                position: absolute;
                top: -10px;
                right: -10px;
                width: 25px;
                height: 25px;
                background: red;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
            }
        </style>
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
