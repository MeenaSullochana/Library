
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
        @include("publisher_and_distributor.navigation")

        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header bg-dark text-white fs-18 fw-bold border-1 rounded-2">
                            User Edit Details
                        </div>
                        <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data"
                            id="reg_publisher_and_distributor_form" autocomplete="on">
                            <h4>Publication Details - <span class="mt-055">பதிப்பு விவரம்</span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label"> Publisher Name / Distributor - <span
                                        class="mt-056">பதிப்பகத்தின் பெயர் / விற்பனையாளரின் </span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_name_dist_name"
                                    name="publication_name_dist_name" placeholder="Enter publication name / distributor"
                                    required>
                            </div>
                            <h4>Book Publisher and Distributor Details - <span class="mt-055"> புத்தக பதிப்பாளர்
                                    மற்றும் விற்பனையாளர் விவரங்கள்</span></h4>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First Name - <span class="mt-056">முதல்
                                        பெயர்</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_first_name"
                                    name="publication_first_name" placeholder=" Enter your first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last name - <span class="mt-056">கடைசி
                                        பெயர்</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_last_name"
                                    name="publication_last_name" placeholder=" Enter your last name" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id - <span class="mt-056">மின்னஞ்சல்
                                        முகவரி</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_email_id"
                                    name="publication_email_id" placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span
                                        class="mt-056">தொடர்பு எண்</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_contact_no"
                                    name="publication_contact_no" placeholder=" Enter your contact namber" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Publication Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_address"
                                    name="publication_address" placeholder="Enter your address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span class="text-danger maditory">*</span></label>
                                <select id="publication_country" class="form-select" name="publication_country"
                                    required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">India</option>
                                    <option value="">Canada</option>
                                    <option value="">Australia</option>
                                    <option value="">France</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">State - <span
                                        class="mt-056">மாநிலம்</span><span class="text-danger maditory">*</span></label>
                                <select id="publication_state" class="form-select" name="publication_state" required>
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
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_city_pub"
                                    name="publication_city" placeholder="Enter your city" required>
                            </div>
                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode - <span class="mt-056"> அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_pincode"
                                    name="publication_pincode" required>
                            </div>

                            <h4>Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள வேண்டிய</span></h4>
                            <small>Same as above - <span class="mt-056">நபரின் விவரங்கள் (மேற்கூறியவாறு)</span>
                                <input class="form-check-input" type="checkbox"
                                    id="book_publisher_and_distributor_check" name="distributor_check"
                                    onclick="publisher_and_distributor_details(this)" value="something"></small>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Contact Person Name - <span
                                        class="mt-056">தொடர்பு நபர் பெயர்</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_contact_person_name"
                                    name="publication_contact_person_name" placeholder="Enter contact person Name"
                                    required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputAddress" class="form-label">Email Id - <span class="mt-056">மின்னஞ்சல்
                                        முகவரி</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_person_email_id"
                                    name="publication_person_email_id" placeholder="Enter your email id" required>
                            </div>
                            <div class=" col-md-6">
                                <label for="inputEmail4" class="form-label">Contact Number - <span
                                        class="mt-056">தொடர்பு எண்</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="First Name" class="form-control" id="publication_contact_person_number"
                                    name="publication_contact_person_number" placeholder=" Enter your contact number"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Publication Address - <span
                                        class="mt-056">பதிப்பகத்தின் அலுவலக முகவரி</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_contact_person_address"
                                    name="publication_contact_person_address" placeholder="Enter your address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Country - <span
                                        class="mt-056">நாடு</span><span class="text-danger maditory">*</span></label>
                                <select id="publication_country" class="form-select" name="publication_country"
                                    required>
                                    <option value="selected">Choose anyone</option>
                                    <option value="">India</option>
                                    <option value="">Canada</option>
                                    <option value="">Australia</option>
                                    <option value="">France</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">State - <span
                                        class="mt-056">மாநிலம்</span><span class="text-danger maditory">*</span></label>
                                <select id="publication_state" class="form-select" name="publication_state" required>
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
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_city_pub"
                                    name="publication_city" placeholder="Enter your city" required>
                            </div>
                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Pincode - <span class="mt-056"> அஞ்சல்
                                        குறியீடு</span><span class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="publication_pincode"
                                    name="publication_pincode" required>
                            </div>
                            <h4>Other Details - <span class="mt-055"></span></h4>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Year of Establishment - <span
                                        class="mt-056">தொடங்கப்பட்ட ஆண்டு</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="text" class="form-control" id="year_of_establishment"
                                    name="year_of_establishment" placeholder="Enter year of establishment" min="0"
                                    max="4" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Number of Books Published so
                                    far - <span class="mt-056">இதுவரை பதிப்பித்துள்ள நூல்களின் எண்ணிக்கை</span><span
                                        class="text-danger maditory">*</span></label>
                                <input type="number" class="form-control" id="number_of_books_published_so_for"
                                    name="number_of_books_published_so_for"
                                    placeholder="Enter number of books published so for" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Number of Books Published in the last 3
                                    years - <span class="mt-056">கடைசி மூன்று வருடத்தில் பதிப்பித்துள்ள நூல்களின்
                                        எண்ணிக்கை</span><span class="text-danger maditory">*</span></label>
                                <input type="number" class="form-control" id="number_of_books_published_latest_year"
                                    name="number_of_books_published_latest_year"
                                    placeholder="Enter number of books published in the last 3 years" required>
                            </div>
                            <!-- <div class="col-md-6 ">
                                    <label for="inputAddress" class="form-label">Name Of Publisher Your are Distributed
                                        Books </label>
                                    <input type="text" class="form-control" id="name_pub_yr_dist_books"
                                        name="name_pub_yr_dist_books"
                                        placeholder="Enter name of publisher Your are distributed books" required>
                                </div> -->
                            <div class="col-md-6 ">
                                <label for="inputAddress" class="form-label">Number of Title Available in your shop
                                    - <span class="mt-056">உங்கள் கடையில் கிடைக்கும் புத்தகங்களின்
                                        எண்ணிக்கை</span><span class="text-danger maditory">*</span></label>
                                <input type="number" class="form-control" id="number_of_files_available_your_shop"
                                    name="number_of_files_available_your_shop"
                                    placeholder="Enter number of title available in your shop" required>
                            </div>

                            <h4>Name of Publishers in your Distribution other then your Publication - <span
                                    class="mt-055">உங்கள் விற்பனையாளர் உள்ள பதிப்பாளர் பெயர் மற்றொன்று உங்கள்
                                    வெளியீடு</span></h4>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name_dis_pub" id="add_name_dis_pub" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" name="distribution_dis_pub"
                                                    id="distribution_dis_pub">
                                                    <tr>
                                                        <th>Enter Publisher Name - <span class="mt-056"> பதிப்பாளர்
                                                                பெயர் அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span></th>
                                                        <th>Enter Place - <span class="mt-056">இடம்
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="publisher_name[]"
                                                                placeholder="Enter publisher name"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="publisher_place[]"
                                                                placeholder="Enter place" class="form-control name_list"
                                                                required /></td>
                                                        <td><button type="button" name="distribution2"
                                                                id="publisher_distribution_add"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4>Best 10 Titles In Your Publications - <span class="mt-055">உங்கள் பதிப்பகத்தில்
                                    வெளிவந்த சிறந்த 10 நூல்களின் தலைப்புகள்</span></h4>
                            <!-- <div class="row">
                                    <div class="col-md-4 mt-1">
                                        <small>Enter The Number of Input </small>
                                    </div>
                                    <div class="col-md-4"><input type="text" class="form-control" id="book_ten_pub_and_dis" name="title_book_ten_pub" placeholder="Enter The Number of Input ">
                                    </div>
                                </div> -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" names="public_titles"
                                                    id="pub_dis_publications">
                                                    <tr>
                                                        <th>Enter Title - <span class="mt-056">தலைப்பினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Enter Author - <span class="mt-056">ஆசிரியர் பெயரினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="publication_title[]"
                                                                placeholder="Enter title" class="form-control name_list"
                                                                required /></td>
                                                        <td><input type="text" name="publication_author[]"
                                                                placeholder="Enter author"
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="publisher_distribution_add_btn"
                                                                id="publisher_distribution_addb10"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Best 5 Translated Book - <span class="mt-055">உங்கள் பதிப்பகத்தில்
                                    மொழிப்பெயர்க்கப்பட்ட சிறந்த 5 நூல்கள்</span></h4>
                            <!-- <div class="row">
                                    <div class="col-md-4 mt-1">
                                        <small>Enter The Number of Input </small>
                                    </div>
                                    <div class="col-md-4"><input type="text" class="form-control" id="translated_book_pub_dis" name="title" placeholder="Enter the number of input ">
                                    </div>
                                </div> -->
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div name="add_name" id="add_name" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="trans_book_pub_dis">
                                                    <tr>
                                                        <th>Enter Title - <span class="mt-056">தலைப்பினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Enter Author - <span class="mt-056">ஆசிரியர் பெயரினை
                                                                அளிக்கவும்</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Language From - <span class="mt-056">எந்த
                                                                மொழியிலிருந்து</span><span
                                                                class="text-danger maditory">*</span>
                                                        </th>
                                                        <th>Language To - <span class="mt-056">எந்த மொழிக்கு</span>*
                                                        </th>
                                                        <th>Add</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="trans_title[]"
                                                                placeholder="Enter title" class="form-control name_list"
                                                                required /></td>
                                                        <td><input type="text" name="trans_author[]"
                                                                placeholder="Enter author"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trans_from[]"
                                                                placeholder="Enter language from"
                                                                class="form-control name_list" required /></td>
                                                        <td><input type="text" name="trans_to[]"
                                                                placeholder="Enter language to  "
                                                                class="form-control name_list" required /></td>
                                                        <td><button type="button" name="translated1"
                                                                id="translated_pub_dis"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-4 form-group">
                                <label for="text">Category of Books Published - <span class="mt-056">பதிப்பிக்கப்பட்ட
                                        நூல்களின் வகை</span><span class="text-danger maditory">*</span></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox11"
                                        name="pub_dis_category_of_books_published[]" value="Academic"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox11">Academic - <span
                                            class="mt-056">கல்வி சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox22"
                                        name="pub_dis_category_of_books_published[]" value="Treds"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox22">Trade Books - <span
                                            class="mt-056">வணிகரீதியான நூல்கள்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox33"
                                        name="pub_dis_category_of_books_published[]" value="Children"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox33">Children
                                        Books - <span class="mt-056">சிறுவர் நூல்கள்</span></label>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="text">Specialized Category Books - <span class="mt-056">தங்களின்
                                        பதிப்பகத்தின் குறிப்பிடத்தகுந்த பிரிவு</span><span
                                        class="text-danger maditory">*</span></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox10"
                                        name="pub_dis_specialized_category_books[]" value="Children"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox10">Children - <span
                                            class="mt-056">சிறுவர்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox20"
                                        name="pub_dis_specialized_category_books[]" value="Academic"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox20">Academic - <span
                                            class="mt-056">கல்வி சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox30"
                                        name="pub_dis_specialized_category_books[]" value="Competitive"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Competitive
                                        Examinations - <span class="mt-056">போட்டித்தேர்வு சார்ந்த</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox40"
                                        name="pub_dis_specialized_category_books[]" value="Literature"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Literature
                                        Examinations - <span class="mt-056">இலக்கியம் போட்டித்தேர்வு</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox50"
                                        name="pub_dis_specialized_category_books[]" value="Tanslated"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Translated - <span
                                            class="mt-056">மொழிப்பெயர்ப்பு</span>
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="pub_dis_specialized_category_books[]"
                                        id="specialized_category_check2" value="Other" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox30">Others - <span
                                            class="mt-056">பிற</span></label>
                                </div>
                                <div class="specialized_category_other2">
                                    <div class="col-md-12">
                                        <!-- <label for="inputAddress" class="form-label">Other Category Books</label> -->
                                        <input type="text" class="form-control" id="specialized_category_books_no2"
                                            name="other_pub_dis_specialized_category_books"
                                            placeholder="Enter Other Category Books">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="text">Primary Language of Publication - <span class="mt-056">
                                        வெளியீட்டின் முதன்மை மொழி</span><span
                                        class="text-danger maditory">*</span></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox"
                                        name="pub_dis_primary_language_of_publication[]" value="Tamil"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox">Tamil - <span
                                            class="mt-056">தமிழ்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="customCheckbox2"
                                        name="pub_dis_primary_language_of_publication[]" value="English"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox2">English - <span
                                            class="mt-056">ஆங்கிலம்</span></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_indian_lag3" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other Indian Languages
                                        - <span class="mt-056">மற்ற இந்தியர் மொழிகள்</span></label>
                                </div>

                                <div class="col-md-12 other_indian_lang3">
                                    <input type="text" class="form-control" id="other_indian_lang3"
                                        name="pub_dis_other_indian_lang" placeholder="Enter other indian languages">
                                </div>
                                <!--<div class="col-md-6">
                                 <input type="text" class="form-control" id="inother_indian_lang"
                                     name="other_indian_lang" placeholder="Enter Other Indian Languages">
                                 </div> -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="other_forign_lag3" value="foreign languages"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Other foreign
                                        languages - <span class="mt-056">மற்ற வெளிநாட்டு மொழிகள்</span></label>
                                </div>
                                <div class="col-md-12 mt-1 other_foreign_lang3">
                                    <input type="text" class="form-control" id="other_foreign_lang3"
                                        name="pub_dis_other_foreign_lang" placeholder="Enter other foreign languages">
                                </div>
                            </div>
                            <h4>Member in Publisher and Association - <span class="mt-055">பதிப்பாளர் சங்கத்தின்
                                    உறுப்பினராக</span></h4>
                            <hr>
                            <!-- <div class="col-md-6">
                                    <label for="inputState" class="form-label">Member In Publisher And
                                        Association<span class="text-danger maditory">*</span></label>
                                    <select id="member_in_publisher_and_association_dept" name="member_in_publisher_and_associationd_dept" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Bapasi</option>
                                        <option>Tamil Padhipu thurai </option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">Enter The Member Id<span class="text-danger maditory">*</span></label>
                                    <input type="text" class="form-control" id="member_in_publisher_and_association" name="dist_member_in_publisher_and_association" placeholder="Enter the member id" required>
                                </div> -->
                            <div class="col-md-4 form-group">
                                <label for="text">Member in Publishers
                                    Association - <span class="mt-056">பதிப்பாளர் சங்கத்தின் உறுப்பினராக</span><span
                                        class="text-danger maditory">*</span></label></label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="bapasi_member_pub_dist"
                                        name="member_in_publisher_Association_depart_pub_dist_ckbox[]"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox">Bapasi - <span
                                            class="mt-056"> பபாசி</span></label>
                                </div>
                                <div class="col-md-12 bapasi_en_pub_dist mb-2">
                                    <input type="text" class="form-control" id="bapasi_pub_dist" name="babsi_id"
                                        placeholder="Enter bapasi member id">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tamil_pathipu_thurai_new_pub_dist"
                                        name="member_in_publisher_Association_depart_pub_dist_ckbox[]" value="Other"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Tamil Padhipu thurai -
                                        <span class="mt-056">தமிழ் பதிப்பு துறை</span></label>
                                </div>

                                <div class="col-md-12 tamil_pathipu_thurai_en_pub_dist mb-2">
                                    <input type="text" class="form-control" id="tamil_pathipu_thurai_pub_dist"
                                        name="tamil_pathipu_pub_dst_value" placeholder="Tamil Padhipu thurai">
                                </div>
                                <div class="custom-control custom-checkbox others_new_pub_dist_old">
                                    <input type="checkbox" id="others_new_pub_dist"
                                        name="member_in_publisher_Association_depart_pub_dist_ckbox[]"
                                        value="foreign languages" class="custom-control-input">
                                    <label class="custom-control-label" for="customCheckbox3">Others - <span
                                            class="mt-056">பிற</span></label>
                                </div>
                                <!-- <div class="col-md-12 mt-1 other_name_id_en_pub_dist mb-2">
                                        <input type="text" class="form-control" id="other_id_pub_dist"
                                            name="member_in_publisher_association_other_name"
                                            placeholder="Enter member id">
                                    </div>
                                    <div class="col-md-12 mt-1 other_name_id_en_pub_dist mb-2">
                                        <input type="text" class="form-control" id="other_name_pub_dist"
                                            name="member_in_publisher_association_other_value"
                                            placeholder="Enter member name">
                                    </div> -->
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="other_name_id_en_dis_pub" name="pub_association_name_dis_pub"
                                            id="pub_association_name_dis_pub" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tbl_pub_member_no_dis_pub">

                                                    <tr>
                                                        <th>Enter member name - <span class="mt-056">உறுப்பினர்
                                                                பெயர்</span>*</th>
                                                        <th>Enter member id - <span class="mt-056">உறுப்பினர் அடையாள
                                                                எண்</span>*</th>
                                                        <!-- <th><button type="button" name="sub_pub_name_op"
                                                                    id="sub_pub_name_op" class="btn btn-success">+</button>
                                                            </th> -->
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="member_name_new_up_dis_pub[]"
                                                                placeholder="Enter member name"
                                                                class="form-control name_list"
                                                                id="member_name_new_dis_pub" /></td>
                                                        <td><input type="text" name="member_id_new_up_dis_pub[]"
                                                                placeholder="Enter member id"
                                                                class="form-control name_list"
                                                                id="member_id_new_dis_pub" /></td>
                                                        <td><button type="button" name="sub_pub_name_op_dis_pub"
                                                                id="member_name_new_id_dis_pub"
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
                                    <label for="formFileSm" class="form-label">Book Publisher And Distributor Proof
                                        - <span class="mt-056">புத்தக பதிப்பாளர் மற்றும் விற்பனையாளர் சான்றிதழ்
                                        </span><span class="text-danger maditory">*</span></label>
                                    <input class="form-control" id="publication_proof" type="file"
                                        name="publication_proof" required>
                                    <span class="text-danger"><small>Doc, PDF other format</small></span>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Latest Book Catalogue - <span
                                            class="mt-056">அண்மை புத்தக விலைப்பட்டியல்</span><span
                                            class="text-danger maditory">*</span></label>
                                    <input class="form-control" id="latest_book_categories" type="file"
                                        name="latest_book_categories" required>
                                    <span class="text-danger"><small>Pdf,Excel Only</small></span>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Associate Membership Proof - <span
                                            class="mt-056">இணை உறுப்பினர் சான்று</span><span
                                            class="text-danger maditory">*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" id="associate_membership_proof1" type="file"
                                                name="associate_membership_proof[]" required multiple>
                                            <span class="text-danger"><small>Doc, PDF other format</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group ">
                                <label for="text">Do you have any subsidiary publisher and distributor? If yes, list
                                    the subsidary publisher and distributor - <span class="mt-056">பதிப்பகத்திற்கு
                                        துணை பதிப்பகங்கள் உள்ளனவா? ஆமெனில், துணை பதிப்பகத்தின் பட்டியல்
                                        தரவும்</span><span class="text-danger maditory">*</span> </label>
                                <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input yes_qus" id="subsidiary_pub_yes"
                                            name="subsidiary_pub_yes" value="yes" required>Yes - <span
                                            class="mt-056">ஆம்</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input subsidiary_publications_no_yes"
                                            id="subsidiary_pub_yes" name="subsidiary_pub_yes" value="No">No - <span
                                            class="mt-056">இல்லை</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subsidiary_pub_name_bg" name="sub_pub_name_os" id="sub_pub_name_os"
                                            method="post">
                                            <div class="table-responsive">
                                                <table class="table table-bordered"
                                                    id="tbl_subsidiary_publishcation_no">

                                                    <tr>
                                                        <th>Enter name of the subsidiary book publisher and
                                                            distributor*</th>
                                                        <th>Enter name of the subsidiary book publication and
                                                            distribution*</th>
                                                        <!-- <th><button type="button" name="sub_pub_name_op"
                                                                    id="sub_pub_name_op" class="btn btn-success">+</button>
                                                            </th> -->
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text"
                                                                name="subsidiary_no_publications_content[]"
                                                                placeholder="Enter name of the subsidiary book publisher and distributor"
                                                                class="form-control name_list"
                                                                id="pub_dis_subsidiary_publication_name" /></td>
                                                        <td><input type="text"
                                                                name="subsidiary_name_publications_content[]"
                                                                placeholder="Enter name of the subsidiary book publication and distribution"
                                                                class="form-control name_list"
                                                                id="pub_dis_subsidiary_publication_conten" /></td>
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
                                                        <td><button type="button" name="sub_pub_name_op"
                                                                id="sub_pub_name_op" class="btn btn-success">+</button>
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
                                <label class="form-check-label">I hereby declare that all the information given
                                    above is true to the best of my knowledge.</label>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="reg_publisher_and_distributor" class="btn btn-primary"
                                    id="reg_publisher_and_distributor">Submit</button>
                            </div>
                        </form>
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
        @include("publisher_and_distributor.footer")

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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
    <script src="../website/js/register.js"></script>
</body>

</html>
