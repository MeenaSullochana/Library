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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <style>
    .disabled-row {
        color: gray;
        opacity: 0.5;
    }
    </style>
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>View Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>
                @php
                $magazinedata = $data[0]->magazine_id;
                $records = DB::table('magazines')
                ->find($magazinedata);
                @endphp


                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"
                                        style="background: url('{{ asset('Magazine/front/' . $records->front_img) }}'); background-size:cover;"
                                        id="output1"></div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <img src="" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0"></h4>
                                            {{-- <p>UX / UI Designer</p> --}}
                                        </div>
                                        {{-- <div class="dropdown ms-auto">
											<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
												<li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addCloseFriendModal"><i class="fa fa-users text-primary me-2"></i> Add to close
														friends</a></li>
												<li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#createGroupModal"><i class="fa fa-plus text-primary me-2"></i> Create group</a>
												</li>
												<li class="dropdown-item"><a href="javascript:void(0);" class="text-danger sweet-confirm"><i class="fa fa-ban text-danger me-2"></i> Block</a></li>
											
											</ul>
										</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <div class="row">
                        {{-- <div class="col-md-12 order-1">
                            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"
                                        aria-current="true" aria-label="First slide"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide">
                                    </li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('https://www.shutterstock.com/image-vector/orange-color-scheme-city-background-260nw-454640902.jpg') }}"
                        class="w-100 d-block" alt="Front Image" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('https://www.shutterstock.com/image-vector/orange-color-scheme-city-background-260nw-454640902.jpg') }}"
                            class="w-100 d-block" alt="Second slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('https://www.shutterstock.com/image-vector/orange-color-scheme-city-background-260nw-454640902.jpg') }}"
                            class="w-100 d-block" alt="Third slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div> --}}
        <div class="col-md-12 order-0">
            <div class="p-4">
                <h4 class="m-0 p-0">Prediction Patterns</h4>
                <small class="mb-2 text-danger">Grace Period time: 15 Days From Publication Date</small>
                <hr>
                <table class="table border">
                    <caption></caption>
                    <thead>
                        <th class="fw-bold text-center">S.No</th>
                        <!-- <th class="fw-bold text-center">Publication Date</th> -->
                        <th class="fw-bold text-center">Expected Date</th>
                        <th class="fw-bold text-center">Status</th>
                    
                    </thead>
                    <tbody>
                        @foreach($data as $val)
                        @if($val->status == "1")
                        <tr class="disabled-row">
                            @else
                        <tr>
                            @endif


                            <td class="p-0 m-0 text-center">{{$loop->index + 1}}</td>

                            <!-- <td class="p-0 m-0 text-center">01.01.2024</td> -->
                            <td class="p-0 m-0 text-center">{{$val->expected_date}}</td>
                            <td class="p-0 m-0 text-center">
                                @if($val->status == "1")
                                <span class="badge bg-warning badge-default m-2">Expected</span>

                                @elseif($val->status == "2")
                                <span class="badge bg-success badge-default m-2"> Arrived</span>
                                @elseif($val->status == "0")
                                <span class="badge bg-danger badge-default m-2"> pending</span>
                                @else
                                <span class="badge bg-danger badge-default m-2"> Not Arrived</span>
                                @endif
                            </td>
                       
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="row">
            <div class="col-md-12">
                <div class="magazine-title h3 fw-bold w-100 mt-4 mb-4">{{$records->title}}</div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6 fw-bolder p-2">Frequency</div>
                    <div class="col-6">: {{$records->periodicity}}</div>
                    <div class="col-6 fw-bolder p-2">Language</div>
                    <div class="col-6">: {{$records->language}}</div>

                    <div class="col-6 fw-bolder p-2">Category </div>
                    <div class="col-6">: {{$records->category}}</div>
                    <div class="col-6 fw-bolder p-2">Single Issue Rate</div>
                    <div class="col-6">: {{$records->single_issue_rate}}</div>

                    <div class="col-6 fw-bolder p-2">Annual Subscription</div>
                    <div class="col-6">: {{$records->annual_subscription}}</div>

                    <div class="col-6 fw-bolder p-2">Discount %</div>
                    <div class="col-6">: {{$records->discount}}</div>

                    <div class="col-6 fw-bolder p-2">Single Issue After Discount </div>
                    <div class="col-6">: {{$records->single_issue_after_discount}}</div>

                    <div class="col-6 fw-bolder p-2">Annual Subscription After Discount </div>
                    <div class="col-6">: {{$records->annual_cost_after_discount}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <!-- <div class="col-6 fw-bolder p-2">Difference in Amount :</div>
                                    <div class="col-6">90</div> -->

                    <div class="col-6 fw-bolder p-2">RNI Details </div>
                    <div class="col-6">: {{$records->rni_details}}</div>

                    <div class="col-6 fw-bolder p-2">Paper Quality </div>
                    <div class="col-6">: {{$records->paper_quality ?? 'Unknown'}}</div>


                    <div class="col-6 fw-bolder p-2">Total Number of Pages </div>
                    <div class="col-6">: {{$records->total_pages}}</div>

                    <div class="col-6 fw-bolder p-2">Number of Multicolour pages </div>
                    <div class="col-6">: {{$records->total_multicolour_pages}}</div>

                    <div class="col-6 fw-bolder p-2">Number of Monocolour Pages </div>
                    <div class="col-6">: {{$records->total_monocolour_pages}}</div>

                    <div class="col-6 fw-bolder p-2">Size of the Magazine </div>
                    <div class="col-6">: {{$records->magazine_size}}</div>

                    <div class="col-6 fw-bolder p-2">Subscription length </div>
                    <div class="col-6">: {{count($data)}}</div>
                    @php
                    $subscriptionid = $data[0]->subscription_id;
                    $records1 = DB::table('subscriptions')
                    ->find($subscriptionid);
                    @endphp
                    <div class="col-6 fw-bolder p-2">Subscription start date</div>
                    <div class="col-6">: {{$records1->issue_date}}</div>

                    <div class="col-6 fw-bolder p-2">Subscription End date</div>
                    <div class="col-6">: {{$records1->end_date}}</div>

                    <!-- <div class="col-6 fw-bolder p-2">Numbering pattern ( Volume Number)</div>
                                    <div class="col-6">: {{$records->rni_details}}</div> -->


                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-md-12">
                <h4>Read Sample PDF</h4>

            </div>
            <div class="col-md-12 mb-3">
                <a class="btn btn-primary " data-bs-toggle="modal" href="#exampleModalToggle" role="button">Read PDF</a>
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
<script>
$(document).ready(function() {
    $('.changestatus').change(function() {
        var id = $(this).data('id');
        var orderid = $(this).data('orderid');
        var magazineid = $(this).data('magazineid');
        var selectval = $(this).val();
        var data = {
            id: id,
            orderid: orderid,
            magazineid: magazineid,
            selectval: selectval,
        };

        console.log(data);
        $.ajax({
            url: '/librarian/magazinestatuschange',
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, {
                        timeout: 2000
                    });
                    setTimeout(function() {
                        window.location.href = response.url
                    }, 3000);

                } else {
                    toastr.error(response.error, {
                        timeout: 2000
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

</html>
<div class="modal fade" id="exampleModalToggle" aria-labelledby="exampleModalToggleLabel" tabindex="-1"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">
                    Read magazine Sample
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <iframe src="{{ asset('Magazine/pdf/' . $records->sample_pdf) }}" style="width:100%; height:1000px;"
                    frameborder="0"></iframe>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>