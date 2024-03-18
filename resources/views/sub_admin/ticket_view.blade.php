
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Yeshadmin:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:title" content="Yeshadmin:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:description" content="Yeshadmin:Customer Relationship Management Admin Bootstrap 5 Template">
    <meta property="og:image" content="https://yeshadmin.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Yash Admin Sales Management System</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
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
        @include ('sub_admin.navigation')
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
                                <b>View Ticket</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="ticket_list.php">
                                <i class="fas fa-plus"></i> List of Ticket </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="right-box-padding p-0">
                                <div class="read-wapper dz-scroll" id="read-content">
                                    <div class="read-content">
                                        <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                            <div class="clearfix mb-3 d-flex">
                                            @if($data->image == null)
                                            <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="{{ asset("images/default.png") }}">
                                                    @elseif($data->ticketType == 'publisher')
                                                    <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="{{ asset("publisher/images/profile/".$data->image) }}">
                                                    @elseif($data->ticketType == 'distributor')
                                                    <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="{{ asset("distributor/images/profile/".$data->image) }}">
                                                       
                                                    @else
                                                    <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="{{ asset("publisher_and_distributor/images/profile/".$data->image) }}">
                                                      
                                                    @endif                          
                                                  

                                                <img class="me-3 rounded" width="70" height="70" alt="image"
                                                    src="images/avatar/1.jpg">
                                                <div class="media-body me-2">
                                                    <h5 class="text-primary mb-0 mt-1">{{$data->firstName}}  {{$data->lastname}}</h5>
                                                    <p class="mb-0">{{$data->date}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media mb-2 mt-3">
                                            <div class="media-body"><span class="pull-end">{{$data->time}}</span>
                                                <h4 class="my-1 text-primary"><b class="mt-2">Subject</b>  </h5>
                                                <P style="text-indent:50px;"> {{$data->subject}}</P>
                                                
                                            </div>
                                        </div>
                                        <div class="read-content-body">
                                        <h4 class="my-1 text-primary"><b class="mt-2">Description</b>  </h5>
                                            <p style="text-indent:50px;" class="mb-2 "> {{$data->description}}
                                            <!-- <p class="mb-2">Even the all-powerful Pointing has no control about the
                                                blind
                                                texts it is an almost unorthographic life One day however a small line
                                                of
                                                blind text by the name of Lorem Ipsum decided to leave for
                                                the far World of Grammar. Aenean vulputate eleifend tellus. Aenean leo
                                                ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem
                                                ante, dapibus in, viverra quis, feugiat a, tellus.
                                            </p>
                                            <p class="mb-2">Aenean vulputate eleifend tellus. Aenean leo ligula,
                                                porttitor
                                                eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in,
                                                viverra quis, feugiat a, tellus. Phasellus viverra nulla ut
                                                metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies
                                                nisi
                                                vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                                rhoncus. Maecenas tempus, tellus eget condimentum
                                                rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed
                                                ipsum.
                                                Nam quam nunc, blandit vel, luctus pulvinar,</p>
                                            <h5 class="pt-3 text-end">Kind Regards</h5>
                                            <p class="text-end">Mr Smith</p> -->
                                            <hr>
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
        @include ("sub_admin.footer")
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
        include "sub_admin/plugin/plugin_js.php";
        ?>
</body>

</html>s