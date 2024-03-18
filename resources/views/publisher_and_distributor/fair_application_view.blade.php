
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
        @include("publisher_and_distributor.navigation")

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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Application Management</b>
                            </h3>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ol class="breadcrumb py-0 m-0">
                            <li class="breadcrumb-item"><a href="fair_application_list.php">List of Applied Details</a>
                            </li>

                            <li class="breadcrumb-item"><a href="#">Application Management
                                </a></li>
                        </ol>
                    </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="">Application Status</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Application Number
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: {{$data->record->applicationNumber}}</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Application Date
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>: {{$data->record->created_at->format('Y-m-d')}}</p>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Apply stall
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>:{{$data->record->totalStall}}</p>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">Allocated stall
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <p>:{{$data->record->allocatedStall}}</p>
                                                    </div>
                                                </div>
                                                <div class="shadow-sm shadow-lg p-3 mb-5  ">
                                                    <h4>Application Status</h4>
                                                    <p class="badge badge-danger light border-0">{{$data->record->status}}</p>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <h5 class="">publication And Distribution Details</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom01">publication Distribution Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Publication Name.." value="{{$data->record1->publicationDistributionName}}" required=""
                                                            value="Publication Name" disabled>
                                                    </div>
                                                </div>
                                                <h5 class="">Publisher And Distributor Details</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">First Name <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a First Name.." value="{{$data->record1->firstName}}" required=""
                                                            value="First Name" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Last
                                                        name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Last name.." value="{{$data->record1->lastName}}" required=""
                                                            value="Last name" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">Email Id <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Email Id.." value="{{$data->record1->email}}" required=""
                                                            value="info@gmail.com" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">Contact Number <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Contact Number.." value="{{$data->record1->mobileNumber}}" required=""
                                                            value="+91 9900990099" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">Publisher And Distributor Address <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control" id=""
                                                            placeholder="Enter a Publication Address.." required=""
                                                            rows="3" value=""
                                                            disabled>{{$data->record1->publicationDistributionAddress}}</textarea>
                                                    </div>
                                                </div>
                                                <!-- <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">City
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a City.." required="" value=" vadapalani"
                                                            disabled>
                                                    </div>
                                                </div> -->
                                            </div>
                        <div class="card-header">
                            <h4>Event Details</h4>
                        </div>
                            <div class="row">
                                <div class="col-6 border-1">
                                    <!-- <img class="card-img-top" src="holder.js/100x180/" alt="Card image cap"> -->
                                    <div class="card-body">
                                        <h4 class="card-title">Event Title (நிகழ்வு தலைப்பு)</h4>
                                        <p class="card-text">{{$data->eventTitle}}</p>
                                    </div>

                                    <div class="card-body">
                                        <h4 class="card-title">Event Duration From(நிகழ்வின் காலம்)</h4>
                                        <p class="card-text">{{$data->startDate}}  {{$data->startTime}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Event Duration To(நிகழ்வின் காலம்)</h4>
                                        <p class="card-text">{{$data->clossingDate}}  {{$data->clossingTime}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Application Deadline(விண்ணப்பிப்பதற்கான கால அவகாசம்)</h4>
                                        <p class="card-text">{{$data->applyFromDate}} to {{$data->applyToDate}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Number of Stalls(ஸ்டால்களின் எண்ணிக்கை)</h4>
                                        <p class="card-text">{{$data->totalStall}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Event location(நிகழ்வு இருப்பிட விவரங்கள்)</h4>
                                        <p class="card-text">{{$data->location}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Description(விளக்கம்)</h4>
                                        <p class="card-text">{{$data->description}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Comment(கருத்து)</h4>
                                        <p class="card-text">{{$data->comment}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">District(மாவட்டம்)</h4>
                                        <p class="card-text">{{$data->district}}</p>
                                    </div>
                                    <hr>
                                    <h3 class="ps-2">Emergency Contact Details</h3>
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                        <p class="card-text">>{{$data->emergencyContactnName}}</p>

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Number(தொடர்பு எண்)</h4>
                                        <p class="card-text">>{{$data->emergencyContactnName}}</p>

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Designation(பதவி)</h4>
                                        <p class="card-text">>{{$data->emergencyDesignation}}</p>
                                        <hr>
                                    </div>

                                </div>
                            <div class="col-6 border-1">
                                <!-- <img class="card-img-top" src="holder.js/100x180/" alt="Card image cap"> -->
                                <div class="card-body">
                                    <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                    <p class="card-text">>{{$data->contactPersonName}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Phone(தொடர்பு எண்)</h4>
                                    <p class="card-text">>{{$data->mobileNumber}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Email(மின்னஞ்சல்)</h4>
                                    <p class="card-text">>{{$data->email}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Website(இணையதளம்)</h4>
                                    <p class="card-text">>{{$data->website}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Address(முகவரி)</h4>
                                    <p class="card-text">>{{$data->address}}</p>
                                </div>
                                <hr>
                                <h3 class="ps-2">Authority Details</h3>
                                <div class="card-body">
                                    <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                    <p class="card-text">>{{$data->authorityContactnName}}</p>

                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number(தொடர்பு எண்)</h4>
                                    <p class="card-text">>{{$data->authorityMobileNumber}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Designation(பதவி)</h4>
                                    <p class="card-text">>{{$data->authorityDesignation}}</p>

                                </div>
                            </div>
                    </div>
                                            <!-- <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">State <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control"
                                                            id="validationCustom01" placeholder="Enter a State.."
                                                            required="" rows="3" value="Tamil Nadu" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">Pincode <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Pincode.." required="" value="600 404."
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom04">Country <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea type="text" class="form-control"
                                                            id="validationCustom01" placeholder="Enter a Country .."
                                                            required="" rows="3" value="india." disabled></textarea>
                                                    </div>
                                                </div>
                                                <h5>Other Details</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Year
                                                        of Establishment <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Year of Establishment .." required=""
                                                            value="1995" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">Number of Books Published so far<span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Number of Books Published so far .."
                                                            required="" value="995" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"
                                                        for="validationCustom02">Number of Books Published in the Last 3
                                                        Years<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom01"
                                                            placeholder="Enter a Number of Books Published in the Last 3 Years .."
                                                            required="" value="1500" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </form>
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
        @include("publisher_and_distributor.footer")
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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
</body>

</html>
<style>
</style>
