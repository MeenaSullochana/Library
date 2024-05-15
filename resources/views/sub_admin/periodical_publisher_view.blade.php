
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
                                    <div class="cover-photo rounded" style="background: url('{{asset("images/default.png")}}'); background-size:cover;" id="output1" ></div>
                                    @else
                                    <div class="cover-photo rounded" style="background: url('{{asset("periodical_publisher/images/profile/".$data->backgroundImage)}}'); background-size:cover;" id="output1" ></div>

                                        @endif
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        @if($data->profileImage == null)
                                            <img src="{{asset("images/default.png")}}" class="img-fluid rounded-circle" alt="">
                                        @else
                                        <img src="{{asset("periodical_publisher/images/profile/".$data->profileImage)}}" class="img-fluid rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                Name of Publisher
                                            </h4>
                                            <p>{{$data->publicationName}}</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">Email
                                            </h4>
                                            <p>{{$data->email}} </p>
                                        </div>
                                        <div class="dropdown ms-auto">
                                           {{-- <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
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
                                            </a>--}}
                                            {{-- <ul class="dropdown-menu dropdown-menu-end">
                                                <li class="dropdown-item"><i
                                                        class="fa fa-user-circle text-primary me-2"></i> View profile
                                                </li>
                                                <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i>
                                                    Add to close friends</li>
                                                <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i>
                                                    Add to group</li>
                                                <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i>
                                                    Block</li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">

                        <h4 class="text-primary d-inline mb-5 ">Nature of Your Publication Ownership</h4>
                        
                        <div class="row mt-3">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                        <!-- <h5 class="text-primary d-inline">Nature of Your Publication Ownership</h5> -->
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                @if($data->pubOwnership == 'Publication')
                                               <h5 class="text-primary d-inline">Public Limited</h5>
                                                @elseif($data->pubOwnership =='Private' )
                                               <h5 class="text-primary d-inline">Private Limited</h5>
                                                @elseif($data->pubOwnership == 'limited')
                                               <h5 class="text-primary d-inline">Limited Liability Partnership(LLP)</h5>
                                                @elseif($data->pubOwnership == 'Partnership' )
                                               <h5 class="text-primary d-inline">Partnership Firm</h5>
                                                @elseif($data->pubOwnership == 'oneperson' )
                                               <h5 class="text-primary d-inline">Proprietorship</h5>
                                                @elseif($data->pubOwnership == 'trust')
                                               <h5 class="text-primary d-inline">Private Trust</h5>
                                                @elseif($data->pubOwnership == 'society')
                                               <h5 class="text-primary d-inline">Private Society</h5>
                                                @elseif($data->pubOwnership == 'institutional')
                                               <h5 class="text-primary d-inline">Government Institutional Publication</h5>
                                                @elseif($data->pubOwnership == 'trust-foundation')
                                               <h5 class="text-primary d-inline">Government Trust/Foundation Publication</h5>
                                                @elseif($data->pubOwnership == 'government-society')
                                               <h5 class="text-primary d-inline">Government Society Publication</h5>
                                                @endif
                                                 @if($data->gstProof != null)
                                                <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/gst/".$data->gstProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/gst/".$data->gstProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> GST Certificate</h3>
                                                </a>
                                                @endif
                                                 @if($data->panOrTanProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/pan_tan/".$data->panOrTanProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  PAN / TAN  </h3>
                                                </a>
                                                @endif
                                                 @if($data->udyamProof != null)
                                                    <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/udayam/".$data->udyamProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/udayam/".$data->udyamProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Udyam Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationIncorporationProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/certification_incon/".$data->certificationIncorporationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Certificate of Incorporation </h3>
                                                </a>
                                                @endif
                                                @if($data->certificationRegistrationProof != null)
                                                      <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/cgReg/".$data->certificationRegistrationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Certificate of Registration </h3>
                                                </a>
                                                @endif
                                                @if($data->partnershipDeedProof != null)
                                                       <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/pan_deed/".$data->partnershipDeedProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Partnership Deed  </h3>
                                                </a>
                                                @endif
                                                  @if($data->moaProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/moa/".$data->moaProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/moa/".$data->moaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> MOA </h3>
                                                </a>
                                                @endif
                                                  @if($data->llpProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/llp_agre/".$data->llpProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/llp_agre/".$data->llpProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  LLP Agreement </h3>
                                                </a>
                                                @endif
                                                    @if($data->aoaProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/aoa/".$data->aoaProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/aoa/".$data->aoaProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  AOA </h3>
                                                </a>
                                                @endif
                                                @if($data->privateTrustProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/privatetrust/".$data->privateTrustProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Private Trust Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->privateSocietyProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/privatesociety/".$data->privateSocietyProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>  Private Society Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->institutionProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/institution/".$data->institutionProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/institution/".$data->institutionProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Institutional Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->trustFoundationProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/trustfoundation/".$data->trustFoundationProof)}}"
                                                    class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download="true">
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Trust/Foundation Publication Registration Certificate </h3>
                                                </a>
                                                @endif
                                                @if($data->societyProof != null)
                                                        <a href="#" data-exthumbimage="{{asset("periodical_publisher/images/proof/society/".$data->societyProof)}}"
                                                    data-src="{{asset("periodical_publisher/images/proof/society/".$data->societyProof)}}"
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
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->country}}</b></span>
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
                                                            <h5 class="f-w-500">District
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->District}}</b></span>
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
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->postalCode}}</b></span>
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
                                                    <h4 class="text-primary mb-4">Contact Person Information</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactfirstName}} </b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactlastName}}</b></span>
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
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactCountry}}</b></span>
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
                                                            <h5 class="f-w-500">District</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactDistrict}}</b></span>
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
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactPostalCode}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Publication Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">{{$data->contactAddress}}</b></span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4 mt-4">Other Details</h4>
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
                                                            <h5 class="f-w-500">Years of Experience in Periodical/Magazine Publication</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">{{$data->yearofexp}}</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Periodical/Magazine Circulation Per Year</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">{{$data->numberPerYear}}</b></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="other_Info" class="tab-pane fade ">

                                                <div class="profile-skills mt-3 mb-3">
                                                    <h4 class="text-primary mb-2">Primary Language of Publication</h4>
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$data->language[0]}}</a>
                                                </div>
                                                
                                                <div class="profile-skills mt-3 mb-3">

                                                   @if($data->otherSpecial  == null)
                                                    <h4 class="text-primary mb-2">Specialized Category Magazine</h4>
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$data->specialCategories[0]}}</a>
                                                   @else
                                                   <h4 class="text-primary mb-2">Specialized Category Magazine</h4>
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">{{$data->otherSpecial}}</a>
                                            
                                                   @endif


                                                </div>
                                                <h4 class="text-primary mb-4">Awards if Any
                                                </h4>
                                                <hr>
                                                <table id="example3" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Award Name</th>
                                                            <th>Periodical Title </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($data->have_award_title == "yes")
                                                        @php
                                                         $rec=json_decode($data->awardTitle)
                                                        @endphp
                                                        @foreach($rec as $val)
                                                     <tr>
                                                        <td data-label="S.No"> {{$loop->index + 1}}</td>
                                                        <td data-label="Award Name"> {{$val->award_name}}</td>
                                                         <td data-label="Book Title ">{{$val->book_title  }}</td>
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
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary mb-4">Subsidiary Publications</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="es-5">{{$data->haveSubsidiary}}</h5>
                                <div class="table-responsive">
                                    <table id="example3" class="display table">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold"> S.No</th>
                                                <th class="fw-bold">Name of the Subsidiary Publication</th>
                                                <th class="fw-bold">Name of the Subsidiary Publisher</th>
                                                <th class="fw-bold">Stack Holder Percentage</th>
                                                <th class="fw-bold">Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($data->haveSubsidiary == "yes")
                                                        @php
                                                         $rec1=json_decode($data->subsidiary)
                                                        @endphp
                                                        @foreach($rec1 as $val)

                                            <tr>
                                                <td data-label="S.No"> {{$loop-> index +1}}</td>
                                                <td data-label="Name of the Subsidiary Publication">{{$val->subsidiary_publication_name}}</td>
                                                <td data-label="Name of the Subsidiary Publisher">{{$val->subsidiary_publisher_name}}</td>
                                                <td data-label="Stack Holder Percentage">{{$val->stack_holder_percentage}}</td>
                                                <td data-label="Document">
                                                    <a href="{{asset("periodical_publisher/images/proof/sub_doc/".$val->subsidiary_doc)}}"
                                                        class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                        <h3 class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Download</h3>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,

            });
        });
        $(document).ready(function() {
            $('#awarded-titles').DataTable({
                "processing": true,
                "serverSide": true,

            });
        });
        $(document).ready(function() {
            $('#subsidiary-pub').DataTable({
                "processing": true,
                "serverSide": true,

            });
        });
    </script>
</body>

</html>