
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <meta name="robots" content="noindex, nofollow" />

	<!-- PAGE TITLE HERE -->
	<title>Government of Tamil Nadu - Book Procurement - Event Create</title>
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
        <div class="content-body">
            <div class="container-fluid">

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Event</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate id="create_event" method="POST">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <p>Event Details</p>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Event Title
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" id="validationCustom01" name="event_name"  placeholder="Enter Event name.." required>
														<div class="invalid-feedback">Enter Event name.</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Event Date Time <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="datetime-local" class="form-control" name="event_date_time" id="validationCustom02"  placeholder="Your valid email.." required>
														<div class="invalid-feedback">
															Please enter a Email.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Location Details
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="location" id="validationCustom03" placeholder="Choose a safe one.." required>
														<div class="invalid-feedback">
															Please enter a password.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Description <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control h-50" id="validationCustom04" name="description"  rows="5" placeholder="What would you like to see?" required></textarea>
														<div class="invalid-feedback">
															Please enter a Suggestions.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Comment <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control h-50" id="validationCustom04" name="comment"  rows="5" placeholder="What would you like to see?" required></textarea>
														<div class="invalid-feedback">
															Please enter a Suggestions.
														</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <p>Contact Details</p>
                                                <hr>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom06">Contact Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="contact_name" id="validationCustom06" placeholder="Enter The Name" required>
														<div class="invalid-feedback">
															Please enter a Name.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (IND)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="contact_number" id="validationCustom08" placeholder="000-000-0000" required>
														<div class="invalid-feedback">
															Please enter a phone no.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom07">Website
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="website"  id="validationCustom07"  placeholder="http://example.com" required>
														<div class="invalid-feedback">
															Please enter a url.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom10">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="email" id="validationCustom10" placeholder="name@gmail.com" required>
														<div class="invalid-feedback">
															Please enter a Email.
														</div>
                                                    </div>
                                                </div>
                                                <!-- <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom11">Range [1, 5]
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="validationCustom11" placeholder="4" required>
														<div class="invalid-feedback">
															Please select a range.
														</div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label"><a
                                                            href="javascript:void()">Terms &amp; Conditions</a> <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <div class="form-check">
														  <input class="form-check-input" type="checkbox" value="" id="validationCustom12" required>
														  <label class="form-check-label" for="validationCustom12">
															Agree to terms and conditions
														  </label>
														</div>
                                                    </div>
                                                </div> -->
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Vertical Forms with icon</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label class="text-label form-label" for="validationCustomUsername">Username</label>
                                            <div class="input-group">
												<span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Enter a username.." required>
												<div class="invalid-feedback">
													Please Enter a username.
												  </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label" for="dz-password">Password *</label>
                                            <div class="input-group transparent-append">
												<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                <input type="password" class="form-control" id="dz-password" placeholder="Choose a safe one.." required>
												<span class="input-group-text show-pass">
													<i class="fa fa-eye-slash"></i>
													<i class="fa fa-eye"></i>
												</span>
                                                <div class="invalid-feedback">
													Please Enter a username.
												</div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
											  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
											  <label class="form-check-label" for="invalidCheck2">
												Check Me out
											  </label>
											</div>
                                        </div>
                                        <button type="submit" class="btn me-2 btn-primary">Submit</button>
                                        <button type="submit" class="btn btn-danger light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
</html>
