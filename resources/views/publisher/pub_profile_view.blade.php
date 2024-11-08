
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Publisher Profile view</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
    ?>
<style>
    .table thead th {
  border-bottom: 0.0625rem solid #E6E6E6;
    border-bottom-color: rgb(230, 230, 230);
  text-transform: full-size-kana !important;
  font-size: 1rem;
  white-space: nowrap;
  font-weight: 500;
  border-color: #E6E6E6 !important;
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
            @include ('publisher.navigation')

        <!--**********************************
            Sidebar end
            ***********************************-->
        <!--**********************************
            Content body start
            ***********************************-->
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
                                    <div class="cover-photo rounded" style="background: url('{{asset("publisher/images/profile/".$data->backgroundImage)}}'); background-size:cover;" id="output1" ></div>

                                        @endif
                                    <div class="b-image">
                                        <i class="fa fa-camera banner-upload-button"></i>
                                        <input class="banner-file-upload" type="file" id="backgroundImage" onchange="handleFileChange(event)" accept="image/*">
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <!-- User Profile Image -->
                                        <div class="avatar">

                                            @if($data->profileImage == Null)
                                            <img src="{{asset("images/default.png")}}" class="img-fluid rounded-circle" id="output" alt="">
                                        @else
                                          <img src="{{asset("publisher/images/profile/".$data->profileImage)}}" class="img-fluid rounded-circle" id="output" alt="">
                                        @endif
                                            <div class="p-image">
                                                <i class="fa fa-camera upload-button"></i>
                                                <input class="file-upload" type="file"  id="profileImage" onchange="loadFile(event)" accept="image/*" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                Name of the Publisher
                                            </h4>
                                            <p>{{$data->firstName}}   {{$data->lastName}}</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">Email
                                            </h4>
                                            <p>{{$data->email}} </p>
                                        </div>
                                     {{--   <div class="dropdown ms-auto">
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
                                                <a href="/publisher/pub_profile_edit">
                                                    <li class="dropdown-item"><i
                                                            class="fa fa-user-circle text-primary me-2"></i> Edit
                                                        profile
                                                    </li>
                                                </a>

                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">

                        <h3 class="text-primary d-inline mb-5">Required Documents</h3>
                        <!--<div class="row">-->
                        <!--    <div class="col-xl-12">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="profile-interest">-->
                        <!--                    <div class="row mt-4 sp4" id="lightgallery">-->
                        <!--                        <p>Publication Proof</p>-->
                        <!--                        <a href="#" data-exthumbimage="{{asset("public/publisher/images/proof/Publication/".$data->publicationProof)}}"-->
                        <!--                            data-src="{{asset("publisher/images/proof/Publication/".$data->publicationProof)}}"-->
                        <!--                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">-->

                        <!--                                <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->publicationProof}} </h3>-->
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                <p>Latest Book Catalogue</p>
                                                <a href="#" data-exthumbimage="{{asset("publisher/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                    data-src="{{asset("publisher/images/proof/BookCatalogue/".$data->bookCatalogue)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  {{$data->bookCatalogue}} </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-xl-12">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="profile-interest">-->
                        <!--                    <div class="row mt-4 sp4" id="lightgallery">-->
                        <!--                        <p>Membership Proof</p>-->
                        <!--                        <a href="#" data-exthumbimage="{{asset("public/publisher/images/proof/Membership/".$data->membershipProof)}}"-->
                        <!--                            data-src="{{asset("publisher/images/proof/Membership/".$data->membershipProof)}}"-->
                        <!--                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">-->
                        <!--                            <h3  class="btn btn-primary light btn-xs mb-1">  {{$data->membershipProof}} </h3>-->
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
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
                                                <a href="#" data-exthumbimage="{{asset("publisher/images/proof/gst/".$data->gstProof)}}"
                                                    data-src="{{asset("publisher/images/proof/gst/".$data->gstProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> GST Certificate</h3>
                                                </a>
                                                @endif
                                                 @if($data->panOrTanProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("publisher/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    data-src="{{asset("publisher/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  PAN / TAN  </h3>
                                                </a>
                                                @endif
                                                 @if($data->udyamProof != null)
                                                    <a href="#" data-exthumbimage="{{asset("publisher/images/proof/udayam/".$data->udyamProof)}}"
                                                    data-src="{{asset("publisher/images/proof/udayam/".$data->udyamProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Udyam Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationIncorporationProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("publisher/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    data-src="{{asset("publisher/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Certificate of Incorporation </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationRegistrationProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("publisher/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    data-src="{{asset("publisher/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Certificate of Registration </h3>
                                                </a>
                                                @endif
                                                @if($data->partnershipDeedProof != null)
                                                       <a href="#" data-exthumbimage="{{asset("publisher/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    data-src="{{asset("publisher/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Partnership Deed  </h3>
                                                </a>
                                                @endif
                                                  @if($data->moaProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/moa/".$data->moaProof)}}"
                                                    data-src="{{asset("publisher/images/proof/moa/".$data->moaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> MOA </h3>
                                                </a>
                                                @endif
                                                  @if($data->llpProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/llp_agre/".$data->llpProof)}}"
                                                    data-src="{{asset("publisher/images/proof/llp_agre/".$data->llpProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  LLP Agreement </h3>
                                                </a>
                                                @endif
                                                    @if($data->aoaProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/aoa/".$data->aoaProof)}}"
                                                    data-src="{{asset("publisher/images/proof/aoa/".$data->aoaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  AOA </h3>
                                                </a>
                                                @endif
                                                @if($data->privateTrustProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    data-src="{{asset("publisher/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Private Trust Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->privateSocietyProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    data-src="{{asset("publisher/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Private Society Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->institutionProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/institution/".$data->institutionProof)}}"
                                                    data-src="{{asset("publisher/images/proof/institution/".$data->institutionProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Institutional Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->trustFoundationProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    data-src="{{asset("publisher/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Trust/Foundation Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->societyProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("publisher/images/proof/society/".$data->societyProof)}}"
                                                    data-src="{{asset("publisher/images/proof/society/".$data->societyProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Government Society Publication Registration Certificate </h3>
                                                </a>
                                                @endif


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
                                                    class="nav-link active show">Info</a>
                                            </li>
                                            <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab"
                                                    class="nav-link">Other Info</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="info" class="tab-pane fade active show">
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">Users
                                                        Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Users Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->userName}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->firstName}} </b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->lastName}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->email}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->mobileNumber}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->publicationAddress}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City <span class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->city}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->District}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->state}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->postalCode}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->country}}</b></span>
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
                                                            <span>: <b class="ms-3">{{$data->contactName}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactEmail}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactMobileNumber}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactAddress}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City<span class="pull-end"></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactCity}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactDistrict}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactState}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactPostalCode}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactCountry}}</b></span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4">Publications Other Info</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Year of Establishment</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">{{$data->yearOfEstablishment}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Books Published So For</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">{{$data->bookCountSoFar}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Books Published Latest
                                                                Year</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">{{$data->bookCountLast3}}</b></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="other_Info" class="tab-pane fade">
                                                <!--<div class="profile-about-me">-->
                                                <!--    <div class="pt-4 border-bottom-1 pb-3">-->
                                                <!--        <h4 class="text-primary">Member in Publishers Association</h4>-->
                                                <!--        <div class="row mb-2">-->
                                                <!--            <div class="col-sm-6 col-5">-->
                                                <!--                <h5 class="f-w-500">{{$data->memberOfAssociation}}<span class="pull-end"> </span>-->
                                                <!--                </h5>-->
                                                <!--            </div>-->
                                                <!--            <hr>-->
                                                <!--            <table id="example1" class="display table"-->
                                                <!--                style="min-width: 845px">-->

                                                <!--                <thead>-->
                                                <!--                    <tr>-->
                                                <!--                        <th>Enter Member Name</th>-->
                                                <!--                        <th>Enter Member Id</th>-->
                                                <!--                    </tr>-->
                                                <!--                </thead>-->
                                                <!--                <tbody>-->
                                                <!--                    @if($data->association1 != null)-->
                                                <!--                 @foreach($data->association1 as $val)-->
                                                <!--                    <tr>-->
                                                <!--                        <td>{{$val->association_name}} </td>-->
                                                <!--                        <td>{{$val->association_id}}</td>-->
                                                <!--                    </tr>-->
                                                <!--                    @endforeach-->
                                                <!--                    @endif-->
                                                <!--                </tbody>-->
                                                <!--            </table>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Primary Language of Publication</h4>


                                                       @foreach($data->language as $val)
                                                        @if($val == "otherIndia")
                                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">{{ $data->otherIndian }}</a>
                                                        @elseif($val == "otherForeign")
                                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">{{ $data->otherForeign }}</a>
                                                        @else
                                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">{{ $val }}</a>
                                                        @endif
                                                    @endforeach


                                                </div>
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Specialized Category Books</h4>
                                                    @foreach($data->specialCategories as $val)
                                                       @if($val == "Other If Any")
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">$data->otherSpecial</a>
                                                       @else
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endif
                                                        @endforeach
                                                </div>
                                                <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Category of books published</h4>
                                                    @foreach($data->bookCategories as $val)
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$val}}</a>
                                                        @endforeach
                                                </div>
                                                <h4 class="text-primary mb-4">Best Seller Titles in Your Publications
                                                </h4>
                                                <hr>
                                                <table id="example3" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>Book Title</th>
                                                            <th>Book Author</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data->topTitles1 as $val)
                                                     <tr>
                                                        <td data-label="Book Title">{{$val->title}} </td>
                                                         <td data-label="Book Author">{{$val->author}}</td>
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
                                <h4 class="text-primary">Best 5 Translated Books</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display table">
                                    {{-- <table id="myTable" class="display table"> --}}
                                        <thead>
                                            <tr>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                                <th>Language From</th>
                                                <th>Language To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->topTranslatedBooks1 != null)
                                            @forelse($data->topTranslatedBooks1 as $val)
                                            <tr>
                                                <td data-label="Book Title">{{ $val->title }}</td>
                                                <td data-label="Book Author">{{ $val->author }}</td>
                                                <td data-label="Language From">{{ $val->lan_from }}</td>
                                                <td data-label="Language To">{{ $val->lan_to }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">No data available in table</td>
                                            </tr>
                                            @endforelse
                                            @else
                                            <tr>
                                                <td colspan="4">No data available in table</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary">Awarded Titles in the Publication</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display table" style="min-width: 200px">
                                    {{-- <table id="awarded-titles" class="display table" style="min-width: 200px"> --}}
                                        <thead>
                                            <tr>
                                                <th>Award Name</th>
                                                <th>Book Title</th>
                                                <!--<th>Language Other Awarded</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->awardTitle1 != null)
                                            @foreach($data->awardTitle1 as $val)
                                            <tr>
                                                <td style="white-space:normal;" data-label="Award Name">{{$val->award_name}} </td>
                                                <td style="white-space:normal;" data-label="Book Title">{{$val->book_title}}</td>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary mb-4">Name of the Subsidiary Publications</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="es-5">{{$data->haveSubsidiary}}</h5>
                                <div class="table-responsive">
                                    <table id="example3" class="display table">
                                    {{-- <table id="subsidiary-pub" class="display table"> --}}
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">Name of the Subsidiary Publication</th>
                                                <th class="fw-bold">Name of the Subsidiary Publisher</th>
                                                <th class="fw-bold">Stack Holder Percentage</th>
                                                <th class="fw-bold">Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data->subsidiary1 != null)
                                            @foreach($data->subsidiary1 as $val)
                                            <tr>
                                                <td>{{$val->subsidiary_publication_name}}</td>
                                                <td>{{$val->subsidiary_publisher_name}}</td>
                                                <td>{{$val->stack_holder_percentage}}</td>
                                                <td>
                                                    <a href="#" data-exthumbimage="{{asset("publisher/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                        data-src="{{asset("publisher/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                        class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                        <h3 class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> {{$val->subsidiary_doc}}</h3>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="4">No data available in table</td>
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
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
        <!--**********************************
            Footer start
            ***********************************-->
            @include ("publisher.footer")

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
        include "publisher/plugin/plugin_js.php";
        ?>
</body>
<style>
    /* data table start */
    /* data table end */
    
    .file-upload {
        display: none;
    }
    .banner-file-upload {
        display: none;
    }

    .circle {
        border-radius: 1000px !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 8px solid rgba(255, 255, 255, 0.7);
        position: absolute;
        top: 72px;
    }

    .avatar {
        width: 120px;
        height: 120px;
        position: relative;
        border: 8px solid rgba(255, 255, 255, 0.7);
        border-radius: 50%;
    }

    img.profile-pic.img-circle {
        width: 120px;
        height: 120px;
    }
    .b-image {
    position: absolute;
    top: 10px;
    right: 22px;
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .profile .profile-photo {
    max-width: 6.25rem;
    position: relative;
    z-index: 1;
    margin-top: -4.5rem;
    margin-right: 6.625rem;
    }
    .p-image {
        position: absolute;
        top: 65px;
        right: 2px;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .photo-content {
  position: relative; }
  .photo-content .cover-photo {
    /* background: url('../images/banner/book-fair2.png'); */
    background-size: cover;
    background-position: center;
    min-height: 15.625rem;
    width: 100%;
    background-repeat: no-repeat !important;
    border-top-left-radius: 0.625rem;
    border-top-right-radius: 0.625rem; }
    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .b-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .banner-upload-button {
        font-size: 1.2em;
    }

    .banner-upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
</style>
<script>
    $(document).ready(function () {




        $(".banner-file-upload").on('change', function () {

            var backgroundImage = $('#backgroundImage')[0].files;
         let fd = new FormData();
        fd.append('backgroundImage',backgroundImage[0])
            console.log(backgroundImage);
            $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             url:"/publisher/pubbackgroundimg",
             data:fd,
             processData: false,
             contentType: false,
             success: function(response) {
                if(response.success){
                    toastr.success(response.success,{timeout:25000});

                }else{
                    toastr.error(response.error,{timeout:25000});
                }
            }
          })
        });

        $(".banner-upload-button").on('click', function () {
            $(".banner-file-upload").click();
        });


        $(".file-upload").on('change', function () {

            var profileImage = $('#profileImage')[0].files;
         let fd = new FormData();
        fd.append('profileImage',profileImage[0])
            console.log(profileImage);
            $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             url:"/publisher/pubprofileimg",
             data:fd,
             processData: false,
             contentType: false,
             success: function(response) {
                if(response.success){
                    toastr.success(response.success,{timeout:25000});
                    // navprofileImage
                    var newProfileImageFilename = response.profileImageFilename;
                   var newProfileImageUrl = "{{ asset('publisher/images/profile/') }}/" + newProfileImageFilename;
                     document.getElementById('navprofileImage').src = newProfileImageUrl;

                }else{
                    toastr.error(response.error,{timeout:25000});
                }
            }
          })
        });

        $(".upload-button").on('click', function () {
            $(".file-upload").click();
        });
    });
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

<script>
  var handleFileChange = function(event) {
    var output = document.getElementById('output1');

    // Check if files are selected
    if (event.target.files && event.target.files.length > 0) {
      output.style.backgroundImage = "url('" + URL.createObjectURL(event.target.files[0]) + "')";
      output.onload = function() {
        URL.revokeObjectURL(output.src); // free memory
      }
    }
  };
</script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        $('#awarded-titles').DataTable();

        $('#subsidiary-pub').DataTable();
    });
</script>


</html>

