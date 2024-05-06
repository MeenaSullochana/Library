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
    <title>Government of Tamil Nadu - Book Procurement - Subscription Edit</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <style>
        .form-control {
            height: 33px !important;
        }
        .profile-form .form-label {
            color: #555555 !important;
            font-size: 13px !important;
            margin-bottom: 12px;
            font-weight: bolder !important;
        }
        .profile-form .form-control, .profile-form .bootstrap-select .dropdown-toggle {
            border-radius: 0px !important;
        }
    </style>
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Subscription Edit</b>
                            </h3>
                            <div>
                                <a class="btn btn-primary  btn-sm" href="/admin/subscription_list">
                                    <i class="fas fa-chevron-left"></i> List of Subscription </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="">Subscription Details </h3>
                                <hr>
                                <div class="reviewer">
                                    <form form class="profile-form" id="formId">
                                        <div class="form-validation">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Vendor<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select class="disabling-options">
                                                        <option value="selected">Select One</option>
                                                        <option value="one">First</option>
                                                        <option value="two">Second (disabled)</option>
                                                        <option value="three">Third</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Biblio<span
                                                            class="text-danger maditory">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter the Biblio"
                                                        id="" Required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="mb-3 mb-0 mt-4">
                                                        <div class="form-check custom-checkbox mb-2">
                                                            <input type="radio" class="form-check-input" id="" name="optradioCustom1">
                                                            <label class="form-check-label" for="customRadioBox7">Create an item record when receiving this serial</label>
                                                        </div>
                                                        <div class="form-check custom-checkbox mb-2">
                                                            <input type="radio" class="form-check-input" id="" name="optradioCustom1">
                                                            <label class="form-check-label" for="customRadioBox8">Do not create an iten record when receiving this serial</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">When there is an irregular issue <span
                                                        class="text-danger maditory"> *</span></label>
                                                        <div class="mb-3 mb-0">
                                                            <div class="form-check custom-checkbox mb-2">
                                                                <input type="radio" class="form-check-input" id="" name="optradioCustom1">
                                                                <label class="form-check-label" for="customRadioBox7">Skip issue number</label>
                                                            </div>
                                                            <div class="form-check custom-checkbox mb-2">
                                                                <input type="radio" class="form-check-input" id="" name="optradioCustom1">
                                                                <label class="form-check-label" for="customRadioBox8">Keep issue number</label>
                                                            </div>
                                                        </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                Manual History
                                                            </label>
                                                            <input class="form-check-input" type="checkbox">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Call Number <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control" placeholder="Enter the Call Number"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Select Library Type<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id=""
                                                        class="form-select bg-white" Required>
                                                        <option>Select One</option>
                                                        <option value="internal">Librarian Library</option>
                                                        <option value="external">Expert Library </option>
                                                        <option value="public">Public Library</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Public Note</label>
                                                        <textarea class="form-control" id="" rows="3"></textarea>
                                                      </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Nonpublic Note</label>
                                                        <textarea class="form-control" id="" cols="10" rows="3"></textarea>
                                                      </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Patron Natification<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id=""
                                                        class="form-select bg-white" Required>
                                                        <option>Select One</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two </option>
                                                        <option value="3">Three</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Location<span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter the Location"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Grace Period <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control" placeholder="Enter the Grace Period"
                                                        id="" required>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Number of Issues to Display to Staff <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control" placeholder="Enter the Number of issues to display to staff"
                                                        id="" required>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Number of Issues to Display to the Public <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control" placeholder="Enter the Number of issues to display to the public"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <h3>Serials Planning</h3>
                                                </div>
                                                <hr>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">First Issue Publication Date <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="date" class="form-control" placeholder="Enter the First Issue publication Date"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Frequency<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id=""
                                                        class="form-select bg-white" Required>
                                                        <option>Select One</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two </option>
                                                        <option value="3">Three</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="row">
                                                        <label class="form-label">Subscription Length <span
                                                            class="text-danger maditory">*</span></label>
                                                        <div class="col-md-6">
                                                                <input type="number" class="form-control" placeholder="Enter the Issues"
                                                                id="" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" placeholder="Enter the Amount in Numerals"
                                                                id="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Subscription Start Date <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="date" class="form-control" placeholder="Enter the Subscription Start Date"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Subscription End Date <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="date" class="form-control" placeholder="Enter the Subscription End Date"
                                                        id="" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Numbering Pattern<span
                                                            class="text-danger maditory">*</span></label>
                                                    <select name="" id=""
                                                        class="form-select bg-white" Required>
                                                        <option>Select One</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two </option>
                                                        <option value="3">Three</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Locale <span
                                                        class="text-danger maditory">*</span></label>
                                                        <input type="number" class="form-control" placeholder="Enter the Locale"
                                                        id="" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary"
                                            id="submitButton">Submit</button>
                                    </div>
                                </div>
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
    @include ('admin.footer')
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
    include 'admin/plugin/plugin_js.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="vendor/select2/js/select2.full.min.js"></script>
    <script src="js/plugins-init/select2-init.js"></script>
</body>

</html>
<script>
    //disabling options
    $('.disabling-options').select2();

    //disabling a select2 control
    $(".js-example-disabled").select2();
    $(".js-example-disabled-multi").select2();
    $("#js-programmatic-enable").on("click", function() {
        $(".js-example-disabled").prop("disabled", false);
        $(".js-example-disabled-multi").prop("disabled", false);
    });
    $("#js-programmatic-disable").on("click", function() {
        $(".js-example-disabled").prop("disabled", true);
        $(".js-example-disabled-multi").prop("disabled", true);
    });
</script>
