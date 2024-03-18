
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <!-- PAGE TITLE HERE -->
    <title>Distriputor Profile</title>
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
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                @if($data->backgroundImage == Null)
                                    <div class="cover-photo rounded" style="background: url('{{asset("images/default.png")}}')" id="output1" ></div>
                                    @else
                                    <div class="cover-photo rounded" style="background: url('{{asset("distributor/images/profile/".$data->backgroundImage)}}')" id="output1" ></div>

                                        @endif
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        @if($data->profileImage == null)
                                            <img src="{{asset("images/default.png")}}" class="img-fluid rounded-circle" alt="">
                                        @else
                                        <img src="{{asset("distributor/images/profile/".$data->profileImage)}}" class="img-fluid rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                         <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                Name Of The Users
                                            </h4>
                                            <p>{{$data->firstName}}   {{$data->lastName}}</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">User Email ID
                                            </h4>
                                            <p>{{$data->email}} </p>
                                        </div>
                                        <div class="dropdown ms-auto">
                                            <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
                                                aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                    height="18px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                    </g>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li class="dropdown-item"><i
                                                        class="fa fa-user-circle text-primary me-2"></i> View profile
                                                </li>
                                                <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i>
                                                    Add to close friends</li>
                                                <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i>
                                                    Add to group</li>
                                                <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i>
                                                    Block</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            <h5 class="text-primary d-inline">Required Documents</h5>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <div class="row mt-4 sp4" id="lightgallery">
                                            <p>Distributor Proof</p>
                                                <a href="#" data-exthumbimage="{{asset("distributor/images/proof/Distribution/".$data->distributionProof)}}"
                                                    data-src="{{asset("distributor/images/proof/Distribution/".$data->distributionProof)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->distributionProof}} </h3>

                                                </a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <div class="row mt-4 sp4" id="lightgallery">
                                            <p>Latest Book Catalogue</p>
                                               
                                               <a href="#" data-exthumbimage="{{asset("distributor/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                   data-src="{{asset("distributor/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                   class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                   <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->bookCatalogue}} </h3>

                                               </a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#info" data-bs-toggle="tab"
                                                    class="nav-link">User Details</a>
                                            </li>
                                            <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab"
                                                    class="nav-link  active show">User Other Details</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="info" class="tab-pane fade">
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">Distribution
                                                        Details</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Book Distribution Company Name <span
                                                                    class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->distributionName}}</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">Book
                                                        Distributor Details</h4>
                                                        <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name <span
                                                                    class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->firstName}} </span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name <span
                                                                    class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->lastName}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->email}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number <span
                                                                    class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->mobileNumber}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->distributionAddress}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->city}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->District}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->state}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pin Code <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->postalCode}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>{{$data->country}}</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4">Contact Person Information</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500"> Name<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactName}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactEmail}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number<span
                                                                    class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactMobileNumber}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactAddress}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactCity}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactDistrict}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactState}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pin Code<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactPostalCode}}.</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$data->contactCountry}}</span>
                                                        </div>
                                                    </div>

                                                    <h4 class="text-primary mb-4">Distributor Other Info</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Year of Establishment<span
                                                                    class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>{{$data->yearOfEstablishment}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Books Available<span
                                                                    class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>{{$data->noOfBooksAvailable}}</span>
                                                        </div>
                                                    </div>
                                            
                                                    <!-- Subsidiary -->


                                                </div>
                                            </div>
                                            <div id="other_Info" class="tab-pane fade active show">

                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2 pt-4 border-bottom-1 pb-3">Language Of
                                                        Books You Dealing With</h4>
                                                        @foreach($data->language as $val)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endforeach
                                                </div>
                                                <h4 class="text-primary mb-4">Name Of Publisher In Your Distribution
                                                </h4>
                                                <hr>
                                                <table id="example4" class="display table" style="min-width: 845px">
                                                    <thead>
                                                        <tr>
                                                            <th>Publisher Name</th>
                                                            <th>Publisher Place</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data->publisher1 as $val)
                                                     <tr>
                                                        <td>{{$val->publisher_name}} </td>
                                                         <td>{{$val->publisher_place}}</td>
                                                      </tr>
                                                     @endforeach
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control h-50" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary mb-4">Name of the Subsidiary Publications
                                </h4>

                            </div>

                            <div class="card-body">
                                <h5 class="es-5">{{$data->haveSubsidiary}}</h5>
                                <table id="example1" class="display table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th class="fw-bold">name of the subsidiary distribution</th>
                                            <th class="fw-bold">Enter name of the subsidiary distribution</th>
                                            <th class="fw-bold">Stack Holder Percentage</th>
                                            <th class="fw-bold">Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->subsidiary1 != null)
                                    @foreach($data->subsidiary1 as $val)
                                        <tr>
                                            <td>{{$val->subsidiary_distribution_name}} </td>
                                            <td>{{$val->subsidiary_distributor_name}} </td>
                                            <td>{{$val->stack_holder_percentage}}</td>
                                            <td>
                                            <a href="#" data-exthumbimage="{{asset("distributor/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                    data-src="{{asset("distributor/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1">  {{$val->subsidiary_doc}} </h3>
                                                </a>
                                                </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

</html>