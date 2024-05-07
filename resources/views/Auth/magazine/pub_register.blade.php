<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Directorate of Public Libraries </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'plugin/css.php'; ?>
</head>
<style>
    h5 {
        color: #ffffff;
        font-weight: 400;
        background: linear-gradient(58deg, #1e631e, #c8dac8);
        width: auto;
        font-size: 20px;
        line-height: 1;
        margin: 10px 10px 30px 0px;
        padding: 14px;
        border-left: 10px solid #ffc10799;
        box-shadow: 4px 2px 15px 0px rgb(199 199 199);
    }
</style>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="icon-chevrons-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <header>
        <!-- header-area-start -->
        <!-- Start Top Header -->
        @include('header.top_header')
        <!-- End Top Header -->
        <!-- User Desktop navigation System -->
        {{-- @include("header.middile_navigation") --}}
        @include('header.navigation')
        <!-- End User Desktop navigation System -->

        <!-- mobile-menu-area -->
        @include('header.mobile_navigation')
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->
    <main>
        <div class="container mt-4">

            <div class="card">
                <h5>Transparent Magazine Procurement-2024</h5>
                <form class="row g-3 needs-validation" novalidate>
                    {{-- <div class="card-header p-3 fw-bold fs-4">Magazine Users Registeration</div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="pub_details">
                                <h6 class="fw-bold">Publication Details - <span class="mt-055"> பதிப்பு விவரம்</span>
                                </h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Publication Name - <span
                                                class="mt-056">பதிப்பகத்தின் பெயர்</span> <span
                                                class="text-danger maditory">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control " id="inputEmail4"
                                            name="publication_name" placeholder="Enter the publication name" required>
                                        <div class="invalid-feedback"> Please Enter publication Name. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_login_details">
                                <h6 class="fw-bold">Login Details - <span class="mt-055">உள்நுழைவு விவரங்கள்</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Username <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="Username" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Enter username. </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">Password <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="*********" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Password. </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">Re-Password <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="*********" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Password. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_publisher_details">
                                <h6 class="fw-bold">Publisher Details - <span class="mt-055">பதிப்பக உரிமையாளரின்
                                        விவரங்கள்</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01" class="form-label">First Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="First name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Enter First Name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Last Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Last name" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Last Name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">E-mail ID<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="email" class="form-control" id="validationCustom02"
                                            placeholder="E-mail ID" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter E-mail ID. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Contact Number<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="validationCustom02"
                                            placeholder="+919XXXXXXXX" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Mobile Number. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">Country<span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_country"
                                            required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Country.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">State <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_state" required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your State.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">District <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_district"
                                            required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your District.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">City <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_city" required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your City.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Pin Code <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Pin code" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Last Name. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTextarea" class="form-label">Publication Address<span
                                                class="text-danger maditory">*</span></label>
                                        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required Address" required>asd</textarea>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Address.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_publisher_contact_details">
                                <h6 class="fw-bold">Contact Person Details - <span class="mt-055">தொடர்பு கொள்ள
                                        வேண்டிய நபரின் விவரங்கள்</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01" class="form-label">First Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="First name" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Enter First Name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Last Name <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Last name" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Last Name. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">E-mail ID<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="email" class="form-control" id="validationCustom02"
                                            placeholder="E-mail ID" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter E-mail ID. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Contact Number<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="number" class="form-control" id="validationCustom02"
                                            placeholder="+919XXXXXXXX" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Mobile Number. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">Country<span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_country"
                                            required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Country.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">State <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_state" required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your State.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">District <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_district"
                                            required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your District.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">City <span
                                                class="text-danger maditory">*</span></label>
                                        <select id="pub_country" class="wide form-control" name="pub_city" required>
                                            <option value="India">India</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your City.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02" class="form-label">Pin Code <span
                                                class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="Pin code" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter Last Name. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationTextarea" class="form-label">Publication Address<span
                                                class="text-danger maditory">*</span></label>
                                        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required Address" required>asd</textarea>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Select your Address.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="other_details">
                                <h6 class="fw-bold">Other Details -<span class="mt-055"> பிற விவரங்கள் </span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01" class="form-label">Year of Establishment -
                                            தொடங்கப்பட்ட ஆண்டு <span class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="Year of Establishment" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Enter Year of Establishment. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02" class="form-label">years of experience in
                                            Periodical/magazine publication - பருவ இதழ் பதிப்பில் அனுபவம்(வருடங்களில்)
                                            <span class="text-danger maditory">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02"
                                            placeholder="years of experience in Periodical/magazine publication"
                                            required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter years of experience in
                                            Periodical/magazine publication. </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom02" class="form-label">Number of
                                            periodical/magazine circulation per year - ஒரு வருடத்தில் விற்கப்பட்ட பருவ
                                            இதழ்களின் எண்ணிக்கை ( பொது நூலகங்கள் அல்லாது)<span
                                                class="text-danger maditory">*</span></label>
                                        <input type="email" class="form-control" id="validationCustom02"
                                            placeholder="E-mail ID" required>
                                        <div class="valid-feedback"> Looks good!</div>
                                        <div class="invalid-feedback"> Please Enter E-mail ID. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="translated_magazine">
                                <h6>Best 5 Translated Books (if any) -<span class="mt-055"> சிறந்த 5 மொழிபெயர்க்கப்பட்ட
                                        புத்தகங்கள் (ஏதேனும் இருந்தால் குறிப்பிடவும்)</span></h6>
                                <div class="row mb-3 border border-0 p-2 m-2">
                                    <div class="col-md-6 form-group ">
                                        <!-- <label for="text">Do you have any subsidiary publications? </label> -->
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input yes_qus_old"
                                                    id="member_in_publishers_yes_old"
                                                    name="member_in_publishers_yes_old" value="yes"
                                                    required="">Yes - <span class="mt-056">ஆம்</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio"
                                                    class="form-check-input member_in_publishers_no_yes_old"
                                                    id="member_in_publishers_yes_old"
                                                    name="member_in_publishers_yes_old" value="No">No - <span
                                                    class="mt-056">இல்லை</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="subsidiary_pub_name_bg_old"
                                                    name="member_in_publishers_old" id="member_in_publishers_new_old"
                                                    method="post" style="display: none;">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="trans_book_pub_dis">
                                                            <tbody>
                                                                <tr>
                                                                    <th> Title - <span
                                                                            class="mt-056">தலைப்பு</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th> Author - <span
                                                                            class="mt-056">நூலாசிரியர்</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Language From - <span class="mt-056">எந்த
                                                                            மொழியிலிருந்து</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Language To - <span class="mt-056">எந்த
                                                                            மொழிக்கு</span><span
                                                                            class="text-danger maditory">*</span>
                                                                    </th>
                                                                    <th>Add</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="trans_title[]"
                                                                            placeholder="Enter title*"
                                                                            class="form-control name_list"></td>
                                                                    <td><input type="text" name="trans_author[]"
                                                                            placeholder="Enter author*"
                                                                            class="form-control name_list"></td>
                                                                    <td><input type="text" name="trans_from[]"
                                                                            placeholder="Enter language from*"
                                                                            class="form-control name_list"></td>
                                                                    <td><input type="text" name="trans_to[]"
                                                                            placeholder="Enter language to * "
                                                                            class="form-control name_list"></td>
                                                                    <td><button type="button" name="translated1"
                                                                            id="translated_pub_dis"
                                                                            class="btn btn-success">+</button></td>
                                                                </tr>
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
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
    </main>
    <!-- footer-area-start -->
    @include('footer.footer')
    <!-- footer-area-end -->
    <?php include 'plugin/js.php'; ?>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        $(document).ready(function() {
            /*************************************
             // Best 5 Translated Books
            ***************************************/

            $('#member_in_publishers_new_old').css('display', 'none');
            // $('#subsidiary_publications').css('display', 'none');

            var sra = 1;

            $('input[type=radio][name=member_in_publishers_yes_old]').on('change', function() {
                alert('good');
                switch ($(this).val()) {
                    case 'yes':
                        $('#member_in_publishers_yes_old').prop('required', true);

                        $('#member_in_publishers_new_old').css('display', 'block');
                        // alert('sub_pub_name_os');
                        $('#member_in_publishers_name_old').prop('required', true);
                        $('#member_in_publishers_id_old').prop('required', true);
                        $('#member_in_publishers_name_op_old').click(function() {
                            sra++;
                            $('#dynamic_field').
                            append('<tr id="row' + sra +
                                '" class="removecl"><td><input type="text" name="member_in_publishers_name_old[]" placeholder="Publishers Association Name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publishers_id_old[]" placeholder="Publishers Association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                                sra +
                                '" class="btn btn-danger btn_remove_old">X</button></td></tr>');

                        });
                        break;
                    case 'No':
                        // alert($(this).val());
                        sra = 0;
                        $('div#member_in_publishers_new_old').css('display', 'none')
                        $('#member_in_publishers_name_old').prop('required', false);
                        $('#member_in_publishers_name_old').prop('required', false);
                        $('#member_in_publishers_yes_old').prop('required', false);

                        $('.removecl').remove();
                        // alert('off')
                        break;
                }
            });


            $(document).on('click', '.btn_remove_best_five', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                if (pubtrsfivecounter <= 4) {
                    $('#practical').prop('disabled', false);
                }
                pubtrsfivecounter--;
            });
            /*************************************
             // End Best 5 Translated Books
            ***************************************/
        });
    </script>
</body>

</html>
