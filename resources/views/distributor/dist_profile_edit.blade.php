
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
    include "distributor/plugin/plugin_css.php";
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
            @include("distributor.navigation")
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
                        <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id="form_distriputor"
                            action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="on">
                            <h4>Distribution Details - <span class="mt-055">புத்தக விற்பனையாளர்</span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Book Distribution Company Name - <span
                                        class="mt-056"></span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="book_disttion_company_name"
                                    name="book_disttion_company_name" placeholder="Enter book distribution company name"
                                    required>
                            </div>
                            <h4>Book Distributor Details - <span class="mt-055">புத்தக விற்பனையாளரின் </span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                                        பெயர் </span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_first_name" name="distn_first_name"
                                    placeholder=" Enter your first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last name - <span class="mt-056">
                                        கடைசி பெயர்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_last_name" name="distn_last_name"
                                    placeholder=" Enter your last name" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id - <span class="mt-056">மின்னஞ்சல்
                                        முகவரி</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_email_id" name="distn_email_id"
                                    placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span class="mt-056">
                                        தொடர்பு எண்</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_contact_number"
                                    name="distn_contact_number" placeholder=" Enter your contact number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Distribution Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_address" name="distn_address"
                                    placeholder="Enter your address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="distn_country" class="form-select" name="distn_country" required>
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
                                <select id="distn_state" class="form-select" name="distn_state" required>
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
                                <select id="distn_state" class="form-select" name="distn_state" required>
                                <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">City - <span class="mt-056">நகரம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_city" name="distn_city"
                                    placeholder="Enter your city" required>
                            </div>

                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_pincode" name="distn_pincode"
                                    required>
                            </div>

                            <h4>Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய</span></h4>
                            <hr>
                            <small>Same as above - <span class="mt-056">நபரின் விவரங்கள்
                                    (மேற்கூறியவாறு)</span><input class="form-check-input" type="checkbox"
                                    id="distributor_check" name="distributor_check" onclick="dustrubutir_details(this)"
                                    value="something"></small>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Contact Person Name - <span
                                        class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="con_contact_person_name"
                                    name="contact_person_name" placeholder="Enter contact person name" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id - <span class="mt-056">மின்னஞ்சல்
                                        முகவரி</span><span class="text-danger maditory">*</span></label></label>
                                <input type="email" class="form-control" id="cont_per_email_id" name="cont_per_email_id"
                                    placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span
                                        class="mt-056">தொடர்பு எண்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="cont_per_contact_no"
                                    name="cont_per_contact_no" placeholder=" Enter your contact number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Publication Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="cont_per_address" name="cont_per_address"
                                    placeholder="Enter your address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <select id="distn_country" class="form-select" name="distn_country" required>
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
                                <select id="distn_state" class="form-select" name="distn_state" required>
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
                                <select id="distn_state" class="form-select" name="distn_state" required>
                                <option value="selected">Choose anyone</option>
                                    <option value="">Assam</option>
                                    <option value="">Maharashtra</option>
                                    <option value="">Karnataka</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">City - <span class="mt-056">நகரம்</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_city" name="distn_city"
                                    placeholder="Enter your city" required>
                            </div>

                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode - <span class="mt-056">அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label></label>
                                <input type="text" class="form-control" id="distn_pincode" name="distn_pincode"
                                    required>
                            </div>
                            <h4>Other Details - <span class="mt-055">பிற விவரங்கள்</span></h4>
                            <hr>
                            <div class="col-md-6 ">
                                <label for="inputAddress" class="form-label">Year of Establishment - <span
                                        class="mt-056">தொடங்கப்பட்ட ஆண்டு</span> <span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="yr_of_establishment"
                                    name="yr_of_establishment" placeholder="Enter year of establishment" required>
                            </div>
                            <div class="col-md-6 ">
                                <label for="inputAddress" class="form-label">Number of Books available in your shop
                                    - <span class="mt-056">உங்கள் கடையில் கிடைக்கும் புத்தகங்களின்
                                        எண்ணிக்கை</span><span class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="number_of_files_available_in_shop"
                                    name="number_of_files_available_in_shop"
                                    placeholder="Enter number of Books available in your shop" required>
                            </div>
                            <h4>Language Details - <span class="mt-055">மொழி விவரங்கள்</span></h4>
                            <hr>
                            <div class="col-md-4 form-group">
                                <label for="text">Language of Books you are dealing with - <span class="mt-056">நீங்கள்
                                        கையாளும் புத்தகங்களின் மொழி</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="language_of_books_you_dealing_with"
                                        name="language_of_books_you_dealing_with[]" value="Tamil"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                            class="mt-056">தமிழ்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox2"
                                        name="language_of_books_you_dealing_with[]" value="English"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox2">English - <span
                                            class="mt-056">ஆங்கிலம்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                </div>
                                <!-- <div class="col-md-12 other_indian_lang2">
                                 <input type="text" class="form-control" id="other_indian_lang2"
                                     name="other_indian_lang2" placeholder="Enter other indian languages">
                                 </div> -->
                                <!--<div class="col-md-6">
                                 <input type="text" class="form-control" id="inother_indian_lang"
                                     name="other_indian_lang" placeholder="Enter Other Indian Languages">
                                 </div> -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_indian_lang3" value="foreign languages"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other india
                                        languages - <span class="mt-056"> மற்ற இந்தியர் மொழிகள்</span></label>
                                </div>
                                <div class="col-md-12 mt-1 mb-1 other_indian_lang2">
                                    <input type="text" class="form-control" id="other_indian_lang2"
                                        name="other_indian_lang2" placeholder="Enter other india languages">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_forign_lag2" value="foreign languages"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other foreign
                                        languages - <span class="mt-056"> மற்ற வெளிநாட்டு மொழிகள்</span></label>
                                </div>
                                <div class="col-md-12 mt-1 other_foreign_lang2">
                                    <input type="text" class="form-control" id="other_foreign_lang"
                                        name="other_foreign_lang" placeholder="Enter other foreign languages">
                                </div>
                            </div>
                            <h4>Name of Publishers in your Distribution - <span class="mt-055">உங்கள் விநியோகத்தில்
                                    உள்ள வெளியீட்டாளர்களின் பெயர்</span>
                            </h4>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="distribution_table"
                                                    class="distribution_table">
                                                    <tr>
                                                        <th>Enter Publishers Name - <span
                                                                class="mt-056">வெளியீட்டாளர்களின் பெயர்</span><span
                                                                class="text-danger maditory">*</span></label></th>
                                                        <th>Enter Place - <span class="mt-056">இடம்</span><span
                                                                class="text-danger maditory">*</span></label></th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="publisher_name[]"
                                                                placeholder="Enter publisher name*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="publisher_place[]"
                                                                placeholder="Enter place*"
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="distribution_book"
                                                                id="distribution_book"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Required Documents - <span class="mt-055">தேவைப்படும் ஆவணங்கள்</span></h4>
                            <hr>
                            <div class="col-md-6 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Distributor Proof - <span
                                            class="mt-056">விற்பனையாளர் சான்றிதழ்</span><span
                                            class="text-danger maditory">*</span></label></label>
                                    <input class="form-control" id="publication_proof" type="file"
                                        name="publication_proof" required>
                                    <span class="text-danger"><small>Doc, PDF other format</small></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Latest Book Catalogue - <span
                                            class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                            class="text-danger maditory">*</span></label></label>
                                    <input class="form-control" id="latest_book_categories" type="file"
                                        name="latest_book_categories" required>
                                    <span class="text-danger"><small>Download Format </small></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="text">Do you have any subsidiary Distributors? If yes, list the
                                    subsidary Distributor - <span class="mt-056">தங்கள் பதிப்பகத்திற்கு துணை
                                        பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                                        தரவும்</span><span class="text-danger maditory">*</span></label></label>
                                <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input yes_qus"
                                            id="subsidiary_distributor_dis" name="subsidiary_distributor_dis"
                                            value="yes" required>Yes - <span class="mt-056">ஆம்</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio"
                                            class="form-check-input subsidiary_distributor_dis_no_yes no_qus"
                                            id="subsidiary_distributor_dis" name="subsidiary_distributor_dis"
                                            value="No">No - <span class="mt-056">இல்லை</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subsidiary_pub_name_new"
                                            name="subsidiary_distributor_distribution_no"
                                            id="subsidiary_distributor_distribution_no" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered"
                                                    id="subsidiary_subsidiary_distributor_no_tbl">
                                                    <tr>
                                                        <th>Enter name of the subsidiary distributor*</th>
                                                        <th>Enter name of the subsidiary distribution*</th>
                                                        <th>Stack Holder Percentage<span
                                                                class="text-danger maditory">*</span></th>
                                                        <th>Document<span class="text-danger maditory">*</span></th>
                                                        <th>Add</th>
                                                        <!-- <th><button type="button" name="sub_pub_add"
                                                   id="sub_pub_add" class="btn btn-success">+</button>
                                                   </th> -->
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" id="name_of_the_subsidiary_distributor"
                                                                name="substidiary_name_account_transaction_content_distributor[]"
                                                                placeholder="Enter name of the subsidiary distributor "
                                                                class="form-control name_list" /></td>
                                                        <td>
                                                            <input type="text"
                                                                id="content_of_the_subsidiary_account_transaction"
                                                                name="substidiary_name_account_transaction_content_distribution[]"
                                                                placeholder="Enter name of the subsidiary distribution"
                                                                class="form-control name_list" />
                                                        </td>
                                                        <td><input type="text"
                                                                id="content_of_the_subsidiary_distributor"
                                                                name="subsidiary_name_distributor_content[]"
                                                                placeholder="Enter Stack Holder Percentage"
                                                                class="form-control name_list" /></td>
                                                        <td> <input class="form-control"
                                                                id="content_of_the_subsidiary_distributor"
                                                                name="subsidiary_name_distributor_content[]"
                                                                placeholder="Enter Document" type="file" multiple
                                                                required>
                                                            <span class="text-danger"><small>Doc, PDF other
                                                                    format</small></span>
                                                        </td>
                                                        <td><button type="button" name="sub_dis_add_newdis"
                                                                id="sub_dis_add_newdis"
                                                                class="btn btn-success">+</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                                    value="yes" required>
                                <label class="form-check-label">I here by declare that all the information given
                                    above is true to the best of my knowledge.</label>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="book_distributor" class="btn btn-primary"
                                    id="submitbtn_book_distributor">Next</button>
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
            @include("distributor.footer")

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
    include "distributor/plugin/plugin_js.php";
?>
        <script src="../website/js/register.js"></script>
</body>

</html>
