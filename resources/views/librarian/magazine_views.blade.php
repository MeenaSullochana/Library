
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
    <title>Government of Tamil Nadu - Book Procurement - Periodical View</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
    ?>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Custom modal size */
    .modal-lg-custom {
        max-width: 90%;
        /* Adjust the percentage for larger or smaller size */
    }

    .modal-body-custom {
        max-height: 800vh;
        /* Adjust the height to control scrolling */
        overflow-y: auto;
        /* Enable vertical scrolling */
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
                                <b>View Periodical</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href=" {{ url('librarian/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Periodical </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    @if($data->full_img == Null)
                                    <div class="cover-photo rounded"
                                        style="background: url('{{asset("images/default.png")}}'); background-size:cover;"
                                        id="output1"></div>
                                    @else
                                    <div class="cover-photo rounded"
                                        style="background: url('{{asset("Magazine/full/".$data->full_img)}}'); background-size:cover;"
                                        id="output1"></div>

                                    @endif

                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <img src="" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">{{$data->title}}</h4>
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
                        <div class="col-md-6">
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
                                        <img src="{{ asset('Magazine/front/' . $data->front_img) }}"
                                            class="w-100 d-block" alt="Front Image" />
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('Magazine/back/' . $data->back_img) }}" class="w-100 d-block"
                                            alt="Second slide" />
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('Magazine/full/' . $data->full_img) }}" class="w-100 d-block"
                                            alt="Third slide" />
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div> -->
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="magazine-title h3 fw-bold w-100 mt-4 mb-4">{{$data->title}}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span class="fs-6 fw-bold text-primary">Frequency </span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->periodicity}}</span> </p>
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span
                                            class="fs-6 fw-bold text-primary">Language  </span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->language}}</span> </p>
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span
                                            class="fs-6 fw-bold text-primary">Category  </span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->category}}</span> </p>
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span class="fs-6 fw-bold text-primary">Single Issue Rate  </span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->single_issue_rate}}</span> </p>
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span
                                            class="fs-6 fw-bold text-primary">Annual Subscription  </span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->annual_subscription}}</span> </p>
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <p class="p-0 m-0"><span class="fs-6 fw-bold text-primary">Discount %</span></p>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><span
                                            class="item">: {{$data->discount}}</span> </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h4>Read Sample PDF</h4>
    
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Open Modal with Tabs
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row card p-1">
                    <p class="h3 p-3 bg-main text-white">RNI Details</p>
                    <hr>
                    <div class="col-12">
                        <div class="row mt-4 mb-4">
                            <div class="col-md-4 col-4">
                                <div class="text-title text-danger">
                                    <b style="font-size:14px">RNI Details </b>
                                </div>
                            </div>
                            <div class="col-md-8 col-8">
                                <span style="font-size:14px">: {{$data->rni_details}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a class="btn btn-primary " data-bs-toggle="modal" href="#exampleModalTogglerni"
                            role="button">Read PDF</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <h3 class="h3 p-3 bg-main text-white">Periodical Details</h3>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px"> Single Issue After Discount</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->single_issue_after_discount}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Annual Subscription After Discount </b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->annual_cost_after_discount}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Total Number of Pages </b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->total_pages}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Editor Name</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">:{{$data->editor_name}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Periodicity</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->periodicity}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">The Year of First Issue</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->first_issue_year}}</span>
                                        </div>
                                        
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Total Number of Issues Per Year</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->issue_per_year}}</span>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <div class="text-title text-danger">
                                                <b style="font-size:14px">Date of Publication of Every Issue</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 mt-4">
                                            <span style="font-size:14px">: {{$data->every_issue_date}}</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h3 class="card-title">Book Location</h3> -->
                                <div class="row">
                                    
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Number of Multicolour Pages </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->total_multicolour_pages}}</span>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Number of Monocolour Pages </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->total_monocolour_pages}}</span>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Size of the Magazine</b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->magazine_size}}</span>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">GSM </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->gsm}}</span>
                                    </div>
                                    
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Type of Paper </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->papertype}}</span>
                                    </div>
                                    
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Paper Finishing </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->paperfinishing}}</span>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <div class="text-title text-danger">
                                            <b style="font-size:14px">Total Number of Pages
                                            </b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 mt-4">
                                        <span style="font-size:14px">: {{$data->total_pages}}</span>
                                    </div>
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row card p-1">
                    <p class="h3 p-3 bg-main text-white">Short Description About The Periodical</p>
                    <hr>
                    <div class="col-12">
                        <p style="text-indent: 50px;">{{$data->periodical_short_info}}.</p>
                    </div>
                </div>
                <div class="row card p-1">
                    <p class="h3 p-3 bg-main text-white">Contact Person Details with Address</p>
                    <hr>
                    <div class="col-md-12 p-3">
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Person Name</div>
                            <div class="col-6">: {{$data->contact_person}}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Email Id </div>
                            <div class="col-6">: {{$data->email}}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Number </div>
                            <div class="col-6">: {{$data->phone}} </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Country </div>
                            <div class="col-6">: {{$data->country}} </div>
                        </div> 
                       <div class="row">
                            <div class="col-6 fw-bolder p-2">State </div>
                            <div class="col-6">: {{$data->state}} </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">District </div>
                            <div class="col-6">: {{$data->district}} </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">City </div>
                            <div class="col-6">: {{$data->city}} </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Pincode </div>
                            <div class="col-6">: {{$data->pincode}} </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Person Address </div>
                            <div class="col-6">: {{$data->address}} </div>
                        </div>
                    </div>
                    <p class="h2 bg-main text-white">Official Address</p>
                    <hr>
                    
                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Official Address</div>
                        <div class="col-6">: {{$data->official_address}} </div>
                    </div>
                    <div class="row card p-1">
                        <p class="h3 p-3 bg-main text-white">Highlights Please mention some of the key highlights</p>
                        <hr>
                        <div class="col-12">
                            <p style="text-indent: 50px;">{{$data->highlights}}.</p>
                        </div>
                        <div class="row container ms-3 me-3 mt-3">

                            <div class="col-8">
                                <img class="center newbanner w-100" src="{{ asset('Magazine/highlightimg/' . $data->highlightimg) }}" alt="img" style="">
                            </div>


                        </div>
                    </div>
                    <p class="h2 bg-main text-white mt-3">Bank Account Details</p>
                    <hr>
                                        </br>
                    <div class="row">
                        <div class="col-6 fw-bolder p-2">IFSC Code </div>
                        <div class="col-6">: {{$data->ifsc_Code}} </div>
                    </div>
                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Account Number </div>
                        <div class="col-6">: {{$data->ban_Acc_Num}} </div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Name </div>
                        <div class="col-6">:  {{$data->bank_Name}}</div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Account Holder Name </div>
                        <div class="col-6">: {{$data->acc_Hol_Nam}} </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="card-header bg-main text-white h3 p-2">About Publisher/Editor</div>
                        {{-- <h3>About The Author</h3> --}}
                        <div class="col-12">
                            <div class="d-flex mb-5">
                                <div class="auth_details">
                                    <div class="row align-items-center">
                                        <div class="col-md-auto mt-2">
                                            <img src="{{ asset('Magazine/editorprofile/' . $data->editorprofile) }}"
                                                class="avatar avatar-md rounded-circle" alt="author image">
                                        </div>

                                        <div class="col-md-8">

                                            <div class="author_description">
                                                <h3 class="mb-0 ms-2">{{$data->editor_name}}</h3>
                                                <p style="text-indent:35px" class="author-info">
                                                   {{$data->about_editor}}.
                                                </p>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal with Tabs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-custom">
                    <!-- Nav tabs -->
                  
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sample Issue One </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sample Issue Two</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Sample Issue Three</a>
                        </li>
                    </ul>
                 
                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="pdf-viewer" id="viewer-home"></div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="pdf-viewer" id="viewer-profile"></div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="pdf-viewer" id="viewer-contact"></div>
                        </div>
                    </div>
                        <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="pdf-viewer" id="viewer-home"></div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="pdf-viewer" id="viewer-profile"></div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="pdf-viewer" id="viewer-contact"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" id="saveButton" data-dataid="{{ $data->id }}"
                            data-revid="{{$data->revid }}" class="btn btn-primary">Review</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--**********************************
            Main wrapper end
        ***********************************-->
    <?php
    include 'librarian/plugin/plugin_js.php';
    ?>





    <div class="modal fade" id="exampleModalTogglerni" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">
                    Read Rni Proof Sample
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


              

                <iframe src="{{ asset('Magazine/rniproof/' . $data->rniproof) }}" style="width:100%; height:1000px;"
                    frameborder="0"></iframe>
               

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalTogglerni" data-bs-toggle="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#saveButton').click(function() {
                var dataId = $(this).data('dataid');
                var librarianId = $(this).data('revid');


                window.location.href = '/librarian/review_post_periodical/' + dataId + '/' + librarianId;
            });
        });
        </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

        function renderPDF(url, viewerId) {
            var loadingTask = pdfjsLib.getDocument(url);
            loadingTask.promise.then(function(pdf) {
                var totalPages = pdf.numPages;
                var viewer = document.getElementById(viewerId);
                viewer.innerHTML = ''; // Clear previous content

                function renderPage(pageNumber) {
                    pdf.getPage(pageNumber).then(function(page) {
                        var scale = 1.9;
                        var viewport = page.getViewport({ scale: scale });

                        var canvas = document.createElement('canvas');
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };

                        page.render(renderContext).promise.then(function() {
                            viewer.appendChild(canvas); // Append each page's canvas
                            if (pageNumber < totalPages) {
                                renderPage(pageNumber + 1); // Render the next page
                            }
                        });
                    });
                }

                renderPage(1); // Start rendering from the first page
            }).catch(function(error) {
                console.error('Error loading PDF:', error);
                var viewer = document.getElementById(viewerId);
                viewer.innerHTML = '<p>Error loading PDF. Please try again later.</p>';
            });
        }

        function getPdfUrls() {
            return {
                home: "{{ asset('Magazine/pdf1/' . $data->pdf1) }}",
                profile: "{{ asset('Magazine/pdf2/' . $data->pdf2) }}",
                contact: "{{ asset('Magazine/pdf3/' . $data->pdf3) }}"
            };
        }

        // Initial rendering of all PDFs when the modal is shown
        var modalEl = document.getElementById('exampleModal');
        modalEl.addEventListener('shown.bs.modal', function() {
            var pdfUrls = getPdfUrls();
            for (var key in pdfUrls) {
                if (pdfUrls.hasOwnProperty(key)) {
                    var viewerId = 'viewer-' + key;
                    // Check if the PDF has not been rendered yet
                    if (document.getElementById(viewerId) && !document.getElementById(viewerId).hasChildNodes()) {
                        renderPDF(pdfUrls[key], viewerId);
                    }
                }
            }
        });
    });
</script>


    <style>
    .bg-main {
        background-color: #222B40;
    }
    img.avatar.avatar-md.rounded-circle {
        height: 75px !important;
        width: 75px !important;
    }
    </style>
    <style>
    .tab-content {
        position: relative;
    }

    .pdf-viewer {
        max-height: 500px; /* Adjust this height as needed */
        overflow-y: auto;
    }

    .tab-pane {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tab-content::-webkit-scrollbar {
        width: 12px; /* Adjust scrollbar width if needed */
    }

    .tab-content::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.5); /* Adjust color if needed */
        border-radius: 6px;
    }

    .tab-content::-webkit-scrollbar-track {
        background-color: #f1f1f1; /* Adjust track color if needed */
    }
</style>
