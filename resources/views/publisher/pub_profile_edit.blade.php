
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
                            <small>Same as above - நபரின் விவரங்கள் (மேற்கூறியவாறு) <input class="form-check-input"
                                    type="checkbox" id="publication_check" name="option1" onclick="myFunction(this)"
                                    value="something"></small>
                            <hr>
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

                            <h4>Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Year of Establishment - <span
                                        class="mt-056">தொடங்கப்பட்ட ஆண்டு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" oninput="numberOnly(this.id);"
                                    class="test_css" maxlength="4" id="inputAddress"
                                    name="publication_shop_established_year" maxlength="4"
                                    placeholder="Enter year of establishment" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Number of Books Published so far -
                                    <span class="mt-056">இதுவரை பதிப்பித்துள்ள நூல்களின் எண்ணிக்கை</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="inputAddress"
                                    name="number_of_books_published_so_for"
                                    placeholder="Enter number of books published so for" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Number of Books Published in the Last 3
                                    Years -<span class="mt-056"> கடைசி மூன்று வருடத்தில் பதிப்பித்துள்ள நூல்களின்
                                        எண்ணிக்கை</span><span class="text-danger maditory">*</span></label></label>
                                <input type="number" class="form-control" id="inputAddress"
                                    name="number_of_books_published_latest_year"
                                    placeholder="Enter number of books published in the last 3 years" required>
                            </div>
                            <h4 class="mt-4">Best Seller Titles in Your Publications - <span class="mt-055">நன்கு
                                    விற்பனையாகும் நூல்கள் </span>
                            </h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dynamic_field">
                                                    <tr>
                                                        <th>Enter Title - <span class="mt-056">தலைப்பினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Enter Author -<span class="mt-056"> ஆசிரியர் பெயரினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="publications_shope_book_title[]"
                                                                placeholder="Enter title*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="publications_shope_book_author[]"
                                                                placeholder="Enter author*"
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="add" id="add"
                                                                class="btn btn-success" onclick="">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Best 5 Translated Books -<span class="mt-055"> உங்கள் பதிப்பகத்தில்
                                    மொழிப்பெயர்க்கப்பட்ட சிறந்த 5 நூல்கள்</span>
                            </h4>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="practical_mark">
                                                    <tr>
                                                        <th>Enter Title - <span class="mt-056">தலைப்பினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Enter Author -<span class="mt-056"> ஆசிரியர் பெயரினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Language From - <span class="mt-056">எந்த
                                                                மொழியிலிருந்து</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Language To - <span class="mt-056">எந்த
                                                                மொழிக்கு</span><span
                                                                class="text-danger maditory">*</span></label>
                                                        </th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="trs_book_title[]"
                                                                placeholder="Enter title*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trs_book_author[]"
                                                                placeholder="Enter author*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trs_book_lan_one[]"
                                                                placeholder="Enter language from*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trs_book_lan_two[]"
                                                                placeholder="Enter language to*"
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="practical" id="practical"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Awarded Titles in The Publication -<span class="mt-055"> வெளியீட்டில் விருது பெற்ற
                                    தலைப்புகள்</span>
                            </h4>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="awarded_titles_name">
                                                    <tr>
                                                        <th>Enter State Awarded <span class="mt-056"></span><span
                                                                class="text-danger maditory">*</span></label></th>
                                                        <th>Enter Central Awarded <span class="mt-056"> </span><span
                                                                class="text-danger maditory">*</span></label></th>
                                                        <th>Language Other Awarded <span class="mt-056"></span><span
                                                                class="text-danger maditory">*</span></label></th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="trs_state_awarded[]"
                                                                placeholder="Enter State Awarded*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trs_central_awarded[]"
                                                                placeholder="Enter Central Awarded*"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trs_ohter_awarded[]"
                                                                placeholder="Enter Other Awarded*"
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="awarded_titles"
                                                                id="awarded_titles" class="btn btn-success">+</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4 form-group">
                                <label for="text">Category Of Books Published - <span class="mt-056">பதிப்பிக்கப்பட்ட
                                        நூல்களின் வகை</span><span class="text-danger maditory">*</span></label></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox11" name="category_of_books_published[]"
                                        value="Academic" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox11">Academic - <span
                                            class="mt-056">கல்வி சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox22" name="category_of_books_published[]"
                                        value="Treds" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox22">Trade Books - <span
                                            class="mt-056">வணிகரீதியான நூல்கள்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox33" name="category_of_books_published[]"
                                        value="Children" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox33">Children
                                        Books - <span class="mt-056">சிறுவர் நூல்கள்</span></label>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="text">Specialized Category Books - <span class="mt-056">தங்களின்
                                        பதிப்பகத்தின் குறிப்பிடத்தகுந்த பிரிவு</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox10" name="specialized_category_books[]"
                                        value="Children" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox10">Children - <span
                                            class="mt-056">சிறுவர்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox20" name="specialized_category_books[]"
                                        value="Academic" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox20">Academic - <span
                                            class="mt-056">கல்வி சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox30" name="specialized_category_books[]"
                                        value="Competitive" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Competitive Exams -
                                        <span class="mt-056">போட்டித்தேர்வு சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox40" name="specialized_category_books[]"
                                        value="literature" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Literature - <span
                                            class="mt-056">இலக்கியம்</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox50" name="specialized_category_books[]"
                                        value="Translate" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Translated - <span
                                            class="mt-056">மொழிப்பெயர்ப்பு</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="specialized_category_books[]"
                                        id="specialized_category_check" value="Other If Any"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Others -<span
                                            class="mt-056"> பிற</span>
                                    </label>
                                </div>
                                <div class="specialized_category_other">
                                    <div class="col-md-12">
                                        <!-- <label for="inputAddress" class="form-label">Other Category Books</label> -->
                                        <input type="text" class="form-control" id="specialized_category_books_no"
                                            name="specialized_category_books[]"
                                            placeholder="Enter other category books">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="text">Primary Language of Publication - <span class="mt-056">வெளியீட்டின்
                                        முதன்மை மொழி</span><span class="text-danger maditory">*</span></label></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox" name="primary_language_of_publication[]"
                                        value="Tamil" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                            class="mt-056">தமிழ்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox2" name="primary_language_of_publication[]"
                                        value="English" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox2">English - <span
                                            class="mt-056">ஆங்கிலம்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_indian_lag"
                                        name="primary_language_of_publication[]" value="Other"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other Indian
                                        Languages -<span class="mt-056"> மற்ற இந்தியர் மொழிகள்</span></label>
                                </div>
                                <div class="col-md-12 other_indian_lang">
                                    <input type="text" class="form-control" id="other_indian_lang"
                                        name="primary_language_of_publication[]"
                                        placeholder="Enter other indian languages">
                                </div>
                                <!--<div class="col-md-6">
                                 <input type="text" class="form-control" id="inother_indian_lang"
                                     name="other_indian_lang" placeholder="Enter Other Indian Languages">
                                 </div> -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_forign_lag"
                                        name="primary_language_of_publication[]" value="foreign languages"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other foreign
                                        languages - <span class="mt-056">மற்ற வெளிநாட்டு மொழிகள்</span></label>
                                </div>
                                <div class="col-md-12 mt-1 other_foreign_lang">
                                    <input type="text" class="form-control" id="other_foreign_lang"
                                        name="primary_language_of_publication[]"
                                        placeholder="Enter other foreign languages">
                                </div>
                            </div>
                            <h4>Member in Publishers Association - <span class="mt-055">பதிப்பாளர் சங்கத்தின்
                                    உறுப்பினராக </span>
                            </h4>
                            <hr>
                            <div class="col-md-6 form-group ">
                                <label for="text">Member in Publishers
                                    Association- <span class="mt-056">பதிப்பாளர் சங்கத்தின் உறுப்பினராக</span><span
                                        class="text-danger maditory">*</span> </label>
                                <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input yes_qus"
                                            id="member_in_publishers_yes" name="member_in_publishers_yes" value="yes"
                                            required>Yes - <span class="mt-056">ஆம்</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input member_in_publishers_no_yes"
                                            id="member_in_publishers_yes" name="member_in_publishers_yes" value="No">No
                                        - <span class="mt-056">இல்லை</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subsidiary_pub_name_bg" name="member_in_publishers"
                                            id="member_in_publishers_new" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tbl_subsidiary_pub_name_bg_no">
                                                    <tr>
                                                        <th>Enter Publishers Association Name*</th>
                                                        <th>Enter Publishers Association Id*</th>
                                                        <!-- <th><button type="button" name="sub_pub_name_op"
                                                   id="sub_pub_name_op" class="btn btn-success">+</button>
                                                   </th> -->
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="member_in_publishers_name[]"
                                                                placeholder="Enter Publishers Association Name"
                                                                class="form-control name_list"
                                                                id="pub_dis_subsidiary_publication_name" /></td>
                                                        <td><input type="text" name="member_in_publishers_id[]"
                                                                placeholder="Enter Publishers Association id"
                                                                class="form-control name_list"
                                                                id="pub_dis_subsidiary_publication_conten" /></td>
                                                        <td><button type="button" name="member_in_publishers_name_op"
                                                                id="member_in_publishers_name_op"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 form-group">
                              <label for="text">Member in Publishers
                                  Association<span class="text-danger maditory">*</span></label></label>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" id="bapasi_member" name="member_in_publisher_Association_depart_pub_book_pub[]" class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox">Bapasi - <span class="mt-056">பபாசி</span></label>
                              </div>
                              <div class="col-md-12 bapasi_en mb-2">
                                  <input type="text" class="form-control" id="bapasi" name="bapasi_value"
                                      placeholder="Enter bapasi member id">
                              </div>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" id="tamil_pathipu_thurai_new"
                                      name="member_in_publisher_Association_depart_pub_book_pub[]"
                                      class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox3">Tamil Padhipu thurai - <span class="mt-056">தமிழ் பதிப்பு துறை</span></label>
                              </div>

                              <div class="col-md-12 tamil_pathipu_thurai_en mb-2">
                                  <input type="text" class="form-control" id="tamil_pathipu_thurai"
                                      name="tamil_pathipu_value" placeholder="Tamil Padhipu thurai">
                              </div>
                              <div class="custom-control custom-checkbox others_new_pub_old">
                                  <input type="checkbox" id="others_new_pub"
                                      name="member_in_publisher_Association_depart_pub_book_pub[]"
                                      class="custom-control-input">
                                  <label class="custom-control-label" for="customCheckbox3">Others - <span class="mt-056">பிற</span></label>
                              </div>
                              </div>
                              <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="other_name_id_en" id="pub_association_name" >
                                          <div class="table-responsive">
                                              <table class="table table-bordered"
                                                  id="tbl_pub_member_no">

                                                  <tr>
                                                      <th>Enter member name*</th>
                                                      <th>Enter member id*</th> -->
                            <!-- <th><button type="button" name="sub_pub_name_op"
                              id="sub_pub_name_op" class="btn btn-success">+</button>
                              </th> -->
                            <!-- </tr>
                              <tr>
                                  <td><input type="text"
                                          name="member_name_new_up[]"
                                          placeholder="Enter member name"
                                          class="form-control name_list"
                                          id="member_name_new" /></td>
                                  <td><input type="text"
                                          name="member_id_new_up[]"
                                          placeholder="Enter member id"
                                          class="form-control name_list"
                                          id="member_id_new" /></td>
                                  <td><button type="button" name="sub_pub_name_op"
                                          id="member_name_new_id"
                                          class="btn btn-success">+</button></td>
                              </tr>

                              </table>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div> -->
                            <!-- <div class="col-md-6">
                              <label for="inputState" class="form-label">Member In Publisher's
                                  Association<span class="text-danger maditory">*</span></label></label>
                              <select id="inputState" class="form-select" name="member_in_publisher_Association_depart" required>
                                  <option selected>Choose...</option>
                                  <option>Bapasi</option>
                                  <option>Tamil Padhipu thurai </option>
                                  <option>Other</option>
                              </select>
                              </div>
                              <div class="col-md-6">
                              <label for="inputAddress" class="form-label">Enter The Member Id<span class="text-danger maditory">*</span></label></label>
                              <input type="text" class="form-control" id="other_member" name="member_in_publisher_Association_depart_values" placeholder="Enter the member id" required>
                              </div> -->
                            <h4>Required Documents -<span class="mt-055"> தேவைப்படும் ஆவணங்கள் </span></h4>
                            <hr>
                            <div class="col-md-6 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Publication Proof- <span
                                            class="mt-056">பதிப்பகத்தின் சான்றிதழ்</span><span
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
                                    <span class="text-danger"><small>Pdf,Excel Only</small></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Membership Proof - <span
                                            class="mt-056">உறுப்பினர் சான்றிதழ்</span><span
                                            class="text-danger maditory">*</span></label></label>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input class="form-control" id="associate_membership_proof" type="file"
                                                name="associate_membership_proof[]" multiple required>
                                            <span class="text-danger"><small>Doc, PDF other format</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Nature of Your Publication Ownership</h4>
                            <div class="col-md-6  form-group ">
                                <label for="inputState" class="form-label" for="for">
                                    Nature of Your Publication Ownership
                                    <span class="text-danger maditory">*</span>
                                </label>
                                <select name="passport" class="form-select" id="passport">
                                    <option value="yes">Proprietorship</option>
                                    <option value="yes">Partnership</option>
                                    <option value="yes">Private Limited Company</option>
                                    <option value="yes">Publication Limited Company</option>
                                </select>
                            </div>
                            <!-- <div class="col-lg-6 mb-3" id="passport_no">
                              <div class="mb-3">
                                 <label for="formFileSm" class="form-label">Relevant Documents Details - <span
                                    class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span
                                    class="text-danger maditory">*</span></label></label>
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                       <input class="form-control" id="passport_number" type="file" name=""
                                          multiple required>
                                       <span class="text-danger"><small> PDF format only </small></span>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
                            <div class="col-lg-6 mb-3" id="passport_no">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Relevant Documents Details - <span
                                            class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span
                                            class="text-danger maditory">*</span></label></label>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input class="form-control" id="passport_number" type="file" name=""
                                                multiple required>
                                            <span class="text-danger"><small> PDF format only </small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label for="text">Do you have any subsidiary publications? If yes, list the
                                    subsidary publication - <span class="mt-056">தங்கள் பதிப்பகத்திற்கு துணை
                                        பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                                        தரவும்</span><span class="text-danger maditory">*</span></label></label>
                                <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input yes_qus"
                                            id="subsidiary_publications" name="subsidiary_publications" value="yes"
                                            required>Yes - <span class="mt-056">ஆம்</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio"
                                            class="form-check-input subsidiary_publications_no_yes no_qus"
                                            id="subsidiary_publications" name="subsidiary_publications" value="No">No -
                                        <span class="mt-056">இல்லை</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 subsidiaryEnable">
                                <!-- <label for="inputAddress" class="form-label">If yes, Please mention the Subsidiary
                                 Publication</label> -->
                                <!-- <input type="text" class="form-control" id="subsidiary"
                                 name="subsidiary_no_publications_content"
                                 placeholder="Enter name of the  subsidiary publication">
                                 <input type="text" class="form-control mt-1" id="subsidiary"
                                 name="subsidiary_name_publications_content"
                                 placeholder="Enter name of the subsidiary Publisher"> -->
                                <!-- <div class="row">
                                 <div class="col-md-6 mt-1">
                                     <small>Enter The Number of Input </small>
                                 </div>
                                 <div class="col-md-6"><input type="text" class="form-control" id="subsidiary_publ_no"
                                         name="subsidiary_publ_no" placeholder="Enter The Number of Input ">
                                 </div>
                                 </div> -->
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subsidiary_pub_name" name="subsidiary_publishcation_no"
                                            id="subsidiary_publishcation_no" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered"
                                                    id="subsidiary_publishcation_no_tbl">
                                                    <tr>
                                                        <th>Enter name of the subsidiary publication<span
                                                                class="text-danger maditory">*</span></th>
                                                        <th>Enter name of the subsidiary Publisher<span
                                                                class="text-danger maditory">*</span></th>
                                                        <th>Stack Holder Percentage<span
                                                                class="text-danger maditory">*</span></th>
                                                        <th>Document<span class="text-danger maditory">*</span></th>
                                                        <th>Add</th>
                                                        <!-- <th><button type="button" name="sub_pub_add"
                                                   id="sub_pub_add" class="btn btn-success">+</button>
                                                   </th> -->
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" id="name_of_the_subsidiary_publication"
                                                                name="subsidiary_no_publications_content[]"
                                                                placeholder="Enter name of the subsidiary publication "
                                                                class="form-control name_list" /></td>
                                                        <td><input type="text"
                                                                id="content_of_the_subsidiary_publication"
                                                                name="subsidiary_name_publications_content[]"
                                                                placeholder="Enter name of the subsidiary publisher"
                                                                class="form-control name_list" /></td>
                                                        <td><input type="text"
                                                                id="content_of_the_subsidiary_publication"
                                                                name="subsidiary_name_publications_content[]"
                                                                placeholder="Enter Stack Holder Percentage"
                                                                class="form-control name_list" /></td>
                                                        <td> <input class="form-control"
                                                                id="content_of_the_subsidiary_publication"
                                                                name="subsidiary_name_publications_content[]"
                                                                placeholder="Enter Document" type="file" multiple
                                                                required>
                                                            <span class="text-danger"><small>Doc, PDF other
                                                                    format</small></span>
                                                        </td>
                                                        <td><button type="button" name="sub_pub_add" id="sub_pub_add"
                                                                class="btn btn-success">+</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6 mt-1">
                                      <small>Enter The Number of Input </small>
                                  </div>
                                  <div class="col-md-6"><input type="text" class="form-control" id="pub_title"
                                          name="pub_title" placeholder="Enter The Number of Input ">
                                  </div>
                              </div>
                              </div> -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check1" name="declaration"
                                    value="yes" required>
                                <label class="form-check-label">I hereby declare that all the information given
                                    above is true to the best of my knowledge.</label>
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
