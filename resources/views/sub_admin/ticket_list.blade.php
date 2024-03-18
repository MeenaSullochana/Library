
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
    <title>Book Fair </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
    ?>
</head>

<body>

  <!--*******
        Preloader start
    ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
        Preloader end
    ********-->

    <!--************
        Main wrapper start
    *************-->
    <div id="main-wrapper">
        <!--************
            Nav header start
        *************-->
        @include ('sub_admin.navigation')
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>List of Ticket</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="index.php">
                            <i class="fas fa-plus"></i> Dashboard </a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-12  col-lg-12">
                    @if($data !=null)
                        <div class="card border-0 pb-0">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Issue Ticket List</h4>
                            </div>
                            <div class="card-body p-0">
                                <div id="DZ_W_Todo3" class="widget-media my-4 px-4">
                                    <ul class="timeline">
                                    @foreach($data as $val)
                                        <li>
                                            <div class="timeline-panel">
                                                <!-- Icon -->
                                                <div class="pe-3">
                                                    <button type="button" class="icon-button">
                                                    @if($val->image == null)
                                                        <img alt="image" width="50" src="{{ asset("images/default.png") }}">
                                                    @elseif($val->ticketType == 'publisher')
                                                        <img alt="image" width="50" src="{{ asset("publisher/images/profile/".$val->image) }}">
                                                    @elseif($val->ticketType == 'distributor')
                                                        <img alt="image" width="50" src="{{ asset("distributor/images/profile/".$val->image) }}">
                                                    @else
                                                        <img alt="image" width="50" src="{{ asset("publisher_and_distributor/images/profile/".$val->image) }}">
                                                    @endif

                                                        @if(0<$val->messagecount)
                                                        <span class="icon-button__badge">{{$val->messagecount}}</span>
                                                        @endif
                                                    </button>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">{{$val->firstname}} {{$val->lastname}} <small class="">{{$val->date}}</small></h5>
                                                    <p class="mb-1">{{$val->subject}}..</p>
                                                    <a href="#" class="btn btn-primary btn-xxs shadow"><i class="fa fa-user p-1"></i>{{$val->ticketType}}</a>
                                                    @if($val->status=="1")
                                                    <a href="/sub_admin/changestatus/{{$val->id}}" class="btn btn-danger btn-xxs"><i class="fa fa-warning p-1"></i>pending</a>
                                                        @else
                                                        <a href="/sub_admin/changestatus/{{$val->id}}" class="btn btn-success btn-xxs"><i class="fa fa-check p-1"></i>Complete</a>
                                                        @endif
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                     <div class="dropdown-menu dropdown-menu-end">
                                                      <a class="dropdown-item" href="/sub_admin/ticket_chat/{{$val->id}}">Chat</a>
                                                      <a class="dropdown-item" href="/sub_admin/ticket_view/{{$val->id}}">View</a>
                                                      <a class="dropdown-item" href="/sub_admin/ticketdelete/{{$val->id}}">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else
                                <div class="container">
                                    <div class="alert alert-danger solid alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong>  No Record Found.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                    </div>
                                </div>
                                        @endif
                    </div>
                </div>
            </div>
            <!--************
            Content body end
        *************-->
            <!--************
            Footer start
        *************-->
        @include ("sub_admin.footer")
            <!--************
            Footer end
        *************-->

            <!--************
           Support ticket button start
        *************-->

            <!--************
           Support ticket button end
        *************-->


        </div>
        <!--************
        Main wrapper end
    *************-->
    <?php
        include "sub_admin/plugin/plugin_js.php";
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