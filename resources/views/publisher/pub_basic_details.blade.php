
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
    <title>Government of Tamil Nadu - Book Procurement - Publisher Profile Edit</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
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
            @include ('publisher.navigation')

        <!--**********************************
            Sidebar end
            ***********************************-->
        <!--**********************************
            Content body start
            ***********************************-->
        <div class="content-body bg-white">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header bg-dark text-white fs-18 fw-bold border-1 rounded-2">
                            User Edit Details
                        </div>
                        <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id="form_publisher"
                            action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="on">
                            <h4>Publication Details - <span class="mt-055"> பதிப்பு விவரம்</span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Publication Name - <span
                                        class="mt-056">பதிப்பகத்தின் பெயர்</span> <span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="inputEmail4" name="publication_name_or_distributor_name" placeholder="Enter publication name"
                                    required />
                            </div>
                            <h4>Publisher Details - <span class="mt-055">பதிப்பகத்தின் விவரங்கள் </span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                                        பெயர் </span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="pub_first_name" name="pub_first_name"
                                    placeholder=" Enter your first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last name - <span class="mt-056">கடைசி
                                        பெயர்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="pub_last_name" name="pub_last_name"
                                    placeholder=" Enter your last name" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id -<span class="mt-056">
                                        மின்னஞ்சல் முகவரி </span><span class="text-danger maditory">*</span></label>
                                <input type="email" class="form-control" id="pub_email_id" name="pub_email_id"
                                    placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span
                                        class="mt-056">தொடர்பு எண்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="contact_number" name="contact_number"
                                    placeholder=" Enter your contact number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Publication Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="pub_address" name="pub_address"
                                    placeholder="Enter your address">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_country" class="form-select" name="pub_country" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">India</option>
                                    <option value="">Canada</option>
                                    <option value="">Australia</option>
                                    <option value="">France</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">State - <span
                                        class="mt-056">மாநிலம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_state" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">District - <span
                                        class="mt-056">மாவட்டம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_district" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">City -<span class="mt-056">
                                        நகரம்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control " id="pub_city" name="pub_city"
                                    placeholder="Enter your city" required>
                            </div>

                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode -<span class="mt-056"> அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="pub_pin_code" name="pub_pin_code">
                            </div>
                            <hr>
                            <h4>Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய </span> </h4>
                         
                         
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Contact Person Name - <span
                                        class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="contact_person_name"
                                    name="contact_person_name" placeholder="Enter contact person name" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id - <span class="mt-056">மின்னஞ்சல்
                                        முகவரி</span><span class="text-danger maditory">*</span></label></label>
                                <input type="email" class="form-control" id="con_email_id" name="con_email_id"
                                    placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span
                                        class="mt-056">தொடர்பு எண்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="First Name" class="form-control" id="con_contact_number"
                                    name="con_contact_number" placeholder=" Enter your contact number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Publication Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="con_publication_address"
                                    name="con_publication_address" placeholder="Enter your address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_country" class="form-select" name="pub_country" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">India</option>
                                    <option value="">Canada</option>
                                    <option value="">Australia</option>
                                    <option value="">France</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">State - <span
                                        class="mt-056">மாநிலம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_state" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">District - <span
                                        class="mt-056">மாவட்டம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="pub_state" class=" form-select" name="pub_district" required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">City -<span class="mt-056">
                                        நகரம்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control " id="pub_city" name="pub_city"
                                    placeholder="Enter your city" required>
                            </div>

                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode -<span class="mt-056"> அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="pub_pin_code" name="pub_pin_code">
                            </div>

                       
                        
                            <div class="col-12">
                                <button type="submit" name="reg_publisher" class="btn btn-primary"
                                    id="submitBtnPublisher">Next</button>
                            </div>
                        </form>
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
        <script src="../js/register.js"></script>
</body>

</html>
