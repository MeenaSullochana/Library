
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
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
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                @if($data->backgroundImage == Null)
                                    <div class="cover-photo rounded" style="background: url('{{asset("images/default.png")}}'); background-size:cover;" id="output1" ></div>
                                    @else
                                    <div class="cover-photo rounded" style="background: url('{{asset("publisher_and_distributor/images/profile/".$data->backgroundImage)}}'); background-size:cover;" id="output1" ></div>

                                        @endif
                                </div>
                                <div class="profile-info">
                                <div class="profile-photo">
                                        @if($data->profileImage == null)
                                            <img src="{{asset("images/default.png")}}" class="img-fluid rounded-circle" alt="">
                                        @else
                                        <img src="{{asset("publisher_and_distributor/images/profile/".$data->profileImage)}}" class="img-fluid rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                Name of Publisher/Distributor
                                            </h4>
                                            <p>{{$data->firstName}}   {{$data->lastName}}</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">Email
                                            </h4>
                                            <p>{{$data->email}} </p>
                                        </div>
                                        <div class="dropdown ms-auto">
                                            {{--<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
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
                                            </ul>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                                <!-- <h3 class="text-primary d-inline">Required Documents</h3>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <h5 class="text-primary d-inline">Book Publisher And Distributor Proof</h5>
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                <a href=""
                                                    data-exthumbimage="{{asset("publisher_and_distributor/images/proof/Pub_Dis_Proof/".$data->publicationProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/Pub_Dis_Proof/".$data->publicationProof)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">

                                                        <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->publicationProof}} </h3>

                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">

                                        <h5 class="text-primary d-inline">Latest Book Catalogue</h5>
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                <div class="col-md-12">
                                                    <a href="{{asset("publisher_and_distributor/images/proof/BookCatalogue/".$data->bookCatalogue)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                        data-src="{{asset("publisher_and_distributor/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                        class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download>
                                                            <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  {{$data->bookCatalogue}} </h3>
    
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <h5 class="text-primary d-inline">Associate Membership Proof</h5>
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                <a href="#" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/Membership/".$data->membershipProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/Membership/".$data->membershipProof)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">

                                                        <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->membershipProof}} </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <h5 class="text-primary d-inline">Nature of Your Publication Ownership</h5>
                                            <div class="row mt-4 sp4" id="lightgallery">
                                            @if($data->pubOwnership == 'Publication')
                                                <p>Public Limited</p>
                                                @elseif($data->pubOwnership =='Private' )
                                                <p>Private Limited</p>
                                                @elseif($data->pubOwnership == 'limited')
                                                <p>Limited Liability Partnership(LLP)</p>
                                                @elseif($data->pubOwnership == 'Partnership' )
                                                <p>Partnership Firm</p>
                                                @elseif($data->pubOwnership == 'oneperson' )
                                                <p>Proprietorship</p>
                                                @elseif($data->pubOwnership == 'trust')
                                                <p>Private Trust</p>
                                                @elseif($data->pubOwnership == 'society')
                                                <p>Private Society</p>
                                                @elseif($data->pubOwnership == 'institutional')
                                                <p>Government Institutional Publication</p>
                                                @elseif($data->pubOwnership == 'trust-foundation')
                                                <p>Government Trust/Foundation Publication</p>
                                                @elseif($data->pubOwnership == 'government-society')
                                                <p>Government Society Publication</p>
                                                @endif
                                                 @if($data->gstProof != null)
                                                <a href="{{asset("publisher_and_distributor/images/proof/gst/".$data->gstProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/gst/".$data->gstProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/gst/".$data->gstProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> GST Certificate</h3>
                                                </a>
                                                @endif
                                              
                                                 @if($data->panOrTanProof != null)
                                                      <a href="{{asset("publisher_and_distributor/images/proof/pan_tan/".$data->panOrTanProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  PAN / TAN  </h3>
                                                </a>
                                                @endif
                                                 @if($data->udyamProof != null)
                                                    <a href="{{asset("publisher_and_distributor/images/proof/udayam/".$data->udyamProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/udayam/".$data->udyamProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/udayam/".$data->udyamProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Udyam Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationIncorporationProof != null)
                                                      <a href="{{asset("publisher_and_distributor/images/proof/certification_incon/".$data->certificationIncorporationProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Certificate of Incorporation </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationRegistrationProof != null)
                                                      <a href="{{asset("publisher_and_distributor/images/proof/cgReg/".$data->certificationRegistrationProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  Certificate of Registration </h3>
                                                </a>
                                                @endif
                                                @if($data->partnershipDeedProof != null)
                                                       <a href="{{asset("publisher_and_distributor/images/proof/pan_deed/".$data->partnershipDeedProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  Partnership Deed  </h3>
                                                </a>
                                                @endif
                                                  @if($data->moaProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/moa/".$data->moaProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/moa/".$data->moaProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/moa/".$data->moaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> MOA </h3>
                                                </a>
                                                @endif
                                                  @if($data->llpProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/llp_agre/".$data->llpProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/llp_agre/".$data->llpProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/llp_agre/".$data->llpProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  LLP Agreement </h3>
                                                </a>
                                                @endif
                                                    @if($data->aoaProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/aoa/".$data->aoaProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/aoa/".$data->aoaProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/aoa/".$data->aoaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  AOA </h3>
                                                </a>
                                                @endif
                                                @if($data->privateTrustProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/privatetrust/".$data->privateTrustProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  Private Trust Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->privateSocietyProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/privatesociety/".$data->privateSocietyProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  Private Society Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->institutionProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/institution/".$data->institutionProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/institution/".$data->institutionProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/institution/".$data->institutionProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Government Institutional Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->trustFoundationProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/trustfoundation/".$data->trustFoundationProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Government Trust/Foundation Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->societyProof != null)
                                                        <a href="{{asset("publisher_and_distributor/images/proof/society/".$data->societyProof)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/society/".$data->societyProof)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/society/".$data->societyProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Government Society Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                     <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#info" data-bs-toggle="tab"
                                                    class="nav-link active show ">Info</a>
                                            </li>
                                            <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab"
                                                    class="nav-link">Other Info</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="info" class="tab-pane fade active show">
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">User
                                                        Information</h4>
                                                        <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">User Name 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: Name</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->firstName}} </span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->lastName}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->email}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->mobileNumber}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->publicationDistributionAddress}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->city}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->District}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->state}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pin Code
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->postalCode}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->country}}</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4">Contact Person Information</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500"> Name
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactName}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactEmail}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactMobileNumber}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactAddress}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactCity}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactDistrict}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactState}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pin Code 
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactPostalCode}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: {{$data->contactCountry}}</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4">Publications Other Info</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Year of Establishment</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: {{$data->yearOfEstablishment}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Books Published So For</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: {{$data->bookCountSoFar}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Books Published in the last 3
                                                                years</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: {{$data->bookCountLast3}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Title Available in your
                                                                shop</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: {{$data->noOfBooksAvailable}}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="other_Info" class="tab-pane fade">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <h4 class="text-primary">Member in Publishers Association</h4>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-6 col-5">
                                                                <h5 class="f-w-500">{{$data->memberOfAssociation}}<span class="pull-end"> </span>
                                                                </h5>
                                                            </div>
                                                            <hr>
                                                            <table id="example1" class="display table"
                                                                style="min-width: 845px">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Member Name</th>
                                                                        <th>Member Id</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if($data->association1 !=null)
                                                                @foreach($data->association1 as $val)
                                                                <tr>
                                                                    <td>{{$val->association_name}} </td>
                                                                    <td>{{$val->association_id}}</td>
                                                                </tr>
                                                                @endforeach
                                                                @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Primary Language of Publication</h4>

                                                    @foreach($data->language as $val)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endforeach

                                                </div>
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Specialized Category Books</h4>
                                                    @foreach($data->specialCategories as $val)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endforeach
                                                </div>
                                                <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Category of books published</h4>
                                                    @foreach($data->bookCategories as $val)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endforeach
                                                </div>
                                                <h4 class="text-primary mb-4">Name of Publishers in your Distribution other then your Publication</h4>
                                                <hr>
                                                <table id="example4" class="display table" style="min-width: 200px">
                                                    <thead>
                                                        <tr>
                                                            <th style="white-space:normal;">Title</th>
                                                            <th style="white-space:normal;">Author</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data->topTitles1 as $val)
                                                     <tr>
                                                         <td style="white-space:normal;">{{$val->title}} </td>
                                                          <td style="white-space:normal;">{{$val->author}}</td>
                                                    </tr>
                                                     @endforeach
                                                    </tbody>
                                                </table>
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
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary">Best 5 Translated Book</h4>
                            </div>
                            <div class="card-body">
                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">

                                    <table id="example3" class="display table dataTable no-footer"
                                        style="min-width: 200px" role="grid" aria-describedby="example3_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="white-space:normal;">Book Title</th>
                                                <th style="white-space:normal;">Book Author</th>
                                                <th style="white-space:normal;">Language From</th>
                                                <th style="white-space:normal;">Language To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->topTranslatedBooks1 != null)
                                        @foreach($data->topTranslatedBooks1 as $val)
                                        <tr>
                                        <td style="white-space:normal;">{{$val->title}} </td>
                                        <td style="white-space:normal;">{{$val->author}}</td>
                                        <td style="white-space:normal;">{{$val->lan_from}} </td>
                                        <td style="white-space:normal;">{{$val->lan_to}}</td>
                                      </tr>
                                       @endforeach
                                       @else
                                   <tr>
                                    <td colspan="2">No data available in table</td>
                                         </tr>

                                       @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary">Best Seller Titles in Your Publications</h4>
                            </div>
                            <div class="card-body">
                            <table id="example3" class="display table dataTable no-footer" style="min-width: 200px"
                                    role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="white-space:normal;">Publisher Name</th>
                                            <th style="white-space:normal;">Publisher Place</th>

                                                <th style="white-space:normal;">Authorization Letter From Publisher</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data->publishers1 as $val)
                                        <tr role="row" class="odd">
                                            <td style="white-space:normal;" class="sorting_1">{{$val->publisher_name}}</td>
                                            <td style="white-space:normal;">{{$val->publisher_place}}</td>

                                            <td style="white-space:normal;">
                                                         <a href="{{asset("publisher_and_distributor/images/proof/authorization/".$val->authorization_letter)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/authorization/".$val->authorization_letter)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/authorization/".$val->authorization_letter)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i> Authorization  Letter</h3>
                                                </a>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary">Awarded Titles in The Publication</h4>
                            </div>
                            <div class="card-body">
                                <table id="example3" class="display table" style="min-width: 200px">
                                <thead>
                                        <tr>
                                            <th style="white-space:normal;">Award Name</th>
                                            <th style="white-space:normal;">Book Title</th>
                                            <!--<th>Language Other Awarded</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($data->awardTitle1 != null)
                                    @foreach($data->awardTitle1 as $val)
                                     <tr>
                                     <td style="white-space:normal;">{{$val->award_name}} </td>
                                      <td style="white-space:normal;">{{$val->book_title}}</td>

                                      </tr>
                                   @endforeach
                                   @else
                                   <tr>
                                   <td colspan="2">No data available in table</td>
                                     </tr>
                                   @endif
                                    </tbody>
                                </table>
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
                                <p>Having Subsidiary Publication</p>
                                @if($data->haveSubsidiary == 'yes')
                                <h5 class="es-5">Yes</h5>
                                @else
                                <h5 class="es-5">No</h5>
                                @endif
                         
                                <table id="example1" class="display table" style="min-width: 200px">
                                    <thead>
                                        <tr>
                                            <th style="white-space:normal;" class="fw-bold">Subsidiary book publisher and distributor</th>
                                            <th style="white-space:normal;" class="fw-bold">Subsidiary book publication and distribution</th>
                                            <th style="white-space:normal;" class="fw-bold">Stack Holder Percentage</th>
                                            <th style="white-space:normal;" class="fw-bold">Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->subsidiary1 !=null)
                                    @foreach($data->subsidiary1 as $val)
                                        <tr>
                                            <td style="white-space:normal;">{{$val->subsidiary_publisher_distributor_name}} </td>
                                            <td style="white-space:normal;">{{$val->subsidiary_publication_distribution_name}} </td>
                                            <td style="white-space:normal;">{{$val->stack_holder_percentage}}</td>
                                            <td style="white-space:normal;">
                                            <a href="{{asset("publisher_and_distributor/images/proof/sub_doc/".$val->subsidiary_doc)}}" data-exthumbimage="{{asset("publisher_and_distributor/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                    data-src="{{asset("publisher_and_distributor/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                    class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"><i class="fa fa-download" aria-hidden="true"></i>  {{$val->subsidiary_doc}} </h3>
                                                </a>
                                                </td>
                                        </tr>
                                        @endforeach
                                        @else
                                   <tr>
                                      <td colspan="2">No data available in table</td>
                                           </tr>

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
            @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
         ?>
</body>

</html>
