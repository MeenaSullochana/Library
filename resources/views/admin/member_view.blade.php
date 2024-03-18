
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
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
         @include ('admin.navigation')
        <!--************
         Sidebar end
         *************-->
        <!--************
         Content body start
         *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                            <h5 class="text-primary">Reviwer Information</h5>
                                <!-- <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item">Create</li>
                                    <li class="breadcrumb-item">patient</li>
                                </ol> -->
                            </div>
                            <!-- <h3 class="mb-0 bc-title">
                        <b>Create Patient</b>
                        </h3> -->
                            <a class="btn btn-primary  btn-sm" href="/admin/member_list">
                                <i class="bi bi-card-checklist"></i> List </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="bg-white overflow-hidden mb-3">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Reviwer Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="https://doctorly.themesbrand.website/build/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                    @if($data->profileImage != null)
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{ asset('reviewer/ProfileImage/'.$data->profileImage) }}" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        @else
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src='{{ asset("images/default.png") }}' alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        @endif
                                        <h5 class="font-size-12">Reviewer Name:</h5>
                                        <h5 class="font-size-15 text-truncate"> {{$data->name}}
                                        </h5>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="font-size-12">Join Date :</h5>
                                                    <p class="text-muted mb-0"> {{ $data->created_at->format('Y-m-d') }} </p>
                                                </div>
                                            </div>
                                            <!-- <div class="mt-4">
                                                <a href="patiend_edit.php" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profile
                                                    <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="bg-white">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Personal Information</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>


                                            <tr>
                                                <th scope="row">Reviwer type:</th>

                                                @if ($data->reviewerType == 'internal')
                                                <td><span class="badge bg-primary">Librarian</span></td>

                                                            
                                                            @elseif ($data->reviewerType == 'external')
                                                            <td><span class="badge bg-primary">Expert</span></td>

                                                            @else
                                                            <td><span class="badge bg-primary">Public</span></td>

                                                            @endif

                                            </tr>
                                            <tr>
                                               <th scope="row">Reviwer Id:</th>
                                               <td><span>{{$data->reviewerId}}</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Name:</th>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                            @if($data->reviewerType == "external")
                                            <tr>
                                                <th scope="row">Designation:</th>
                                                <td> {{$data->designation}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Organisation Details:</th>
                                                <td> {{$data->organisationDetails}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Subject:</th>
                                                <td> {{$data->subject}}</td>
                                            </tr>
                                            @endif

                                            @if($data->reviewerType == "internal")
                                            <tr>
                                                <th scope="row">Library Type:</th>
                                                <td> {{$data->libraryType}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Library Name:</th>
                                                <td> {{$data->libraryName}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">District:</th>
                                                <td> {{$data->district}}</td>
                                            </tr>
                                          
                                            @endif
                                            @if($data->reviewerType == "public")
                                            <tr>
                                                <th scope="row">District:</th>
                                                <td> {{$data->district}} </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Category:</th>
                                                <td> {{$data->Category}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Membership Id:</th>
                                                <td> {{$data->membershipId}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td> {{$data->email}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone number:</th>
                                                <td>{{$data->phoneNumber}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <h4> User Details</h4>
                                </div>
                                <div class="col-md-6 ">
                                    <!-- Button trigger modal -->
                                    <div class=" d-flex justify-content-end p-4">
                                        <!-- <a class="btn btn-primary btn-sm" href="member_list">
                                            <i class="fa fa-angle-double-left" aria-hidden="true"></i> List </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Medical_info" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Basic Information</span>
                                        </a>
                                    </li>
                                    @if($data->reviewerType == "external")
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#AppointmentList" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Bank Information</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ExaminationList" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Review Details</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active show" id="Medical_info" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                <tr>
                                                <th scope="row">Reviwer type:</th>
                                                @if ($data->reviewerType == 'internal')
                                                <td><span class="badge bg-primary">Librarian</span></td>

                                                            
                                                            @elseif ($data->reviewerType == 'external')
                                                            <td><span class="badge bg-primary">Expert</span></td>

                                                            @else
                                                            <td><span class="badge bg-primary">Public</span></td>

                                                            @endif
                                            </tr>
                                            <tr>
                                               <th scope="row">Reviwer Id:</th>
                                               <td><span>{{$data->reviewerId}}</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Name:</th>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                            <!-- <tr>
                                                <th scope="row">Designation:</th>
                                                <td> {{$data->designation}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Organisation Details:</th>
                                                <td> {{$data->organisationDetails}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Subject:</th>
                                                <td> {{$data->subject}}</td>
                                            </tr> -->
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td> {{$data->email}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone number:</th>
                                                <td>{{$data->phoneNumber}} </td>
                                            </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="AppointmentList" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 p-4">
                                                <h4> Bank Information Details</h4>
                                            </div>
                                            <div class="col-md-6 ">
                                                <!-- Button trigger modal -->
                                                <div class=" d-flex justify-content-end p-4">
                                                    <!-- <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bd-example-modal-lg" href="#"> -->
                                                        <!-- <i class="fa fa-plus" aria-hidden="true"></i> Edit Bank Information </a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="w-75">Bank Name</th>
                                                        <td> {{$data->bankName}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">Branch Name</th>
                                                        <td> {{$data->branch}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">Account Number</th>
                                                        <td> {{$data->accountNumber}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">IFSC Number</th>
                                                        <td> {{$data->ifscNumber}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ExaminationList" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 p-4">
                                                <h4> Book Details</h4>
                                            </div>
                                            <div class="col-md-6 ">
                                                <!-- Button trigger modal -->
                                                <!-- <div class=" d-flex justify-content-end p-4">
                                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bd-example-modal-lg-examination" href="#">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> Add Examination
                                                    </a>
                                                </div> -->

                                            </div>
                                            <table class="table table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No</th>
                                                        <th>Book Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if ($data->record !== null)
                                              @foreach($data->record as $key => $val)

                                                <tr>
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>{{$val->bookname}} <span>({{$val->subbookname}})<br> </span></td>
                                                    <td>{{ $val->created_at->format('Y-m-d') }}</td>
                                                    @if($val->mark !=Null)
                                                    <td>
                                                        <span class="badge bg-success">Complete!</span>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <span class="badge bg-danger">Pending</span>
                                                    </td>
                                                    @endif
                                                    <td>
                                                    <button type="button" class="btn btn-primary mb-2 mb-md-0 fetch-review-btn"
                                                    data-remark="{{$val->remark}}"
                                                    data-review_type="{{$val->review_type}}"
                                                    data-bookname="{{$val->bookname}}"
                                                    data-subbookname="{{$val->subbookname}}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#view_information">
                                                    <i class="fa fa-eye"></i> View Details
                                                </button>
                                                    </td>
                                                </tr>

                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                            <div class="col-md-12 text-center mt-3">
                                                <div class="d-flex justify-content-start">
                                                    Showing to
                                                    of 0 entries
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!--************
            Content body end
            *************-->
        <!--************
            Footer start
            *************-->
            @include ("admin.footer")
        <!--************
            Footer end
            *************-->
        <!--************
            Support ticket button start
            *************-->


            <div class="modal fade" id="view_information">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Details View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5><b>Book Name: <span id="bookName"></span> (<span id="subBookName"></span>)</b></h5>
                                <h5><b>Valuable Feedback: <span id="reviewType"></span></b></h5>
                                <h5><b>Comment: <span id="remark"></span></b></h5>
                            </div>
                            <p>Other Info:</p>
                            <hr>
                            <h5><b>Payment Status: <span class="badge bg-primary">Paid!</span></b></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

         <?php
        include "admin/plugin/plugin_js.php";
    ?>
<script>
    // Attach a click event to the button
    $('.fetch-review-btn').on('click', function () {
        // Retrieve data attributes
        var remark = $(this).data('remark');
        var reviewType = $(this).data('review_type');
        var bookName = $(this).data('bookname');
        var subBookName = $(this).data('subbookname');

        // Update modal content with fetched data
        $('#view_information #bookName').text(bookName);
        $('#view_information #reviewType').text(reviewType);
        $('#view_information #remark').text(remark);
        $('#view_information #subBookName').text(subBookName);
        // You can similarly update other elements as needed

        // Trigger the modal
        $('#view_information').modal('show');
    });
</script>

</body>
</html>
<style>
    .avatar-title {
        align-items: center;
        background-color: #556ee6;
        color: #fff;
        display: flex;
        font-weight: 500;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    .bg-primary-subtle {
        background-color: rgba(85, 110, 230, .25);
    }

    .avatar-md {
        height: 4.5rem;
        width: 4.5rem;
    }

    .profile-user-wid {
        margin-top: -26px;
    }
</style>
