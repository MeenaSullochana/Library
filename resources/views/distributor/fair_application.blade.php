
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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
        include "distributor/plugin/plugin_css.php";
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
        @include("distributor.navigation")
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3>Directorate of public libraries</h3>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                            <p class="fw-bold h5">User Type</p>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">User Type - பயனர் வகை<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="user_type" value="{{$data->distributorrecord->usertype}}" name="first_name" placeholder="name" readonly>
                            </div>
                            <p class="fw-bold h5">User Details</p>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name - முதல் பெயர்<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name"  value="{{$data->distributorrecord->firstName}}" name="first_name"  placeholder="First name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last name - கடைசி பெயர்<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name"  value="{{$data->distributorrecord->lastName}}" placeholder="Last name" readonly>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Email Id - மின்னஞ்சல் முகவரி<span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_address" value="{{$data->distributorrecord->email}}" name="email"
                                    placeholder="example@gmail.com" readonly>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Contact Number - தொடர்பு எண்<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_numer" placeholder="" value="{{$data->distributorrecord->mobileNumber}}" readonly>
                            </div>
                            <div class="col-6">
                                <label for="inputAddress2" class="form-label">Publication Address - பதிப்பகத்தின் அலுவலக
                                    முகவரி<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact_numer"
                                    placeholder="Enter Your publication Address" value="{{$data->distributorrecord->publicationAddress}}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_country" class="form-select" name="pub_country" Disabled>
                                    <option value="selected">{{$data->distributorrecord->country}}</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">State - <span
                                        class="mt-056">மாநிலம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_state" required Disabled>
                                    <option value="selected">{{$data->distributorrecord->state}}</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">District - <span
                                        class="mt-056">மாவட்டம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_district" required Disabled>
                                    <option value="selected">{{$data->distributorrecord->District}}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">City -<span class="mt-056">
                                        நகரம்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control " id="pub_city" name="pub_city"
                                    placeholder="Enter your city" value="{{$data->distributorrecord->city}}" required readonly>
                            </div>

                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode -<span class="mt-056"> அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="pub_pin_code" name="pub_pin_code" value="{{$data->distributorrecord->postalCode}}" readonly>
                            </div>
                            <hr>

                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-underline h4 text-center">Event Details</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-underline h4 text-center">Event Contact Details</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 border-1">
                                    <!-- <img class="card-img-top" src="holder.js/100x180/" alt="Card image cap"> -->
                                    <div class="card-body">
                                        <h4 class="card-title">Event Title (நிகழ்வு தலைப்பு)</h4>
                                        <p class="card-text">{{$data->eventTitle}}</p>
                                    </div>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title">Event Date Time(நிகழ்வு தேதி நேரம்)</h4>
                                        <p class="card-text">12-19-2023 10:10 Am</p>
                                    </div> -->
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
                                        <h4 class="card-title">Event location(நிகழ்வு இருப்பிட விவரங்கள்)</h4>
                                        <p class="card-text">{{$data->location}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Comment(கருத்து)</h4>
                                        <p class="card-text"> {{$data->comment}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">location(இடம்)</h4>
                                        <p class="card-text"> {{$data->location}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">District(மாவட்டம்)</h4>
                                        <p class="card-text"> {{$data->district}}</p>
                                    </div>
                                    <hr>
                                    <h3 class="ps-2">Emergency Contact Details</h3>
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                        <p class="card-text">{{$data->emergencyContactnName}}</p>

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Number(தொடர்பு எண்)</h4>
                                        <p class="card-text">{{$data->emergencyMobileNumber}}</p>

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Designation(பதவி)</h4>
                                        <p class="card-text">{{$data->emergencyDesignation}}</p>
                                        <hr>
                                    </div>

                                </div>
                            <div class="col-6 border-1">
                                <!-- <img class="card-img-top" src="holder.js/100x180/" alt="Card image cap"> -->
                                <div class="card-body">
                                    <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                    <p class="card-text">{{$data->contactPersonName}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Phone(தொடர்பு எண்)</h4>
                                    <p class="card-text">{{$data->mobileNumber}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Email(மின்னஞ்சல்)</h4>
                                    <p class="card-text">{{$data->email}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Website(இணையதளம்)</h4>
                                    <p class="card-text">{{$data->website}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Address(முகவரி)</h4>
                                    <p class="card-text">{{$data->address}}</p>
                                </div>
                                <hr>
                                <h3 class="ps-2">Authority Details</h3>
                                <div class="card-body">
                                    <h4 class="card-title">Contact Person Name(தொடர்பு நபர் பெயர்)</h4>
                                    <p class="card-text">{{$data->authorityContactnName}}</p>

                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number(தொடர்பு எண்)</h4>
                                    <p class="card-text">{{$data->authorityMobileNumber}}</p>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Designation(பதவி)</h4>
                                    <p class="card-text">{{$data->authorityDesignation}}</p>

                                </div>
                            </div>
                    </div>
                    <hr>
                    <p class="h3">Seat Allocation</p>

                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <h4 class="card-title">Total Seat Count(மொத்த இருக்கை எண்ணிக்கை)</h4>
                                <h1 class="">{{$data->totalStall}}</h1>
                                <br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-body">
                                <h4 class="card-title">How many seats you want ?(
உங்களுக்கு எத்தனை இருக்கைகள் வேண்டும்?)</h4>
                                <p>{{$data->description}}</p>
                                <input type="number" id="totalStall" class="form-control"
                                    placeholder="Please Enter Seat you want" required>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input was-validated" type="checkbox" id="gridCheck" required>
                            <label class="form-check-label" for="gridCheck">
                                <a href="#"> I agree to the terms and conditions as set out by the user agreement.</a>
                            </label>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <input type="submit" id="submit"  data-eventid="{{$data->id}}"  data-id="{{$data->distributorrecord->id}}" class="btn btn-primary">
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
        @include("distributor.footer")
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
    include "distributor/plugin/plugin_js.php";
?>
</body>
<script>

       $(document).on('click','#submit',function(e){
        e.preventDefault();
           var event_id = $(this).data('eventid');
           var apply_id = $(this).data('id');
           var  totalStall=$('#totalStall').val();
           var status = $('#gridCheck').prop('checked');
          $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             dataType: "json",
             data:{'event_id': event_id,'apply_id': apply_id,'totalStall': totalStall,'status': status},
             url: "/distributor/distapplyadd",
             success: function(response) {
                console.log(response);
                if(response.success){
                    toastr.success(response.success,{timeout:25000});
                    setTimeout(function() {
                        window.location.href = "/distributor/fair_application_apply";
                     }, 3000);
                }else{
                    toastr.error(response.error,{timeout:25000});
                }

            }
          })

       });

      </script>
</html>
