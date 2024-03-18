
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
	<!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
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
        @include ('admin.navigation')
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
                                <h4 class="card-title">View Event</h4>
                                <?php
                                    // echo "<pre>";
                                    // print_r($_POST);
                                    // echo "</pre>";
                                ?>
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
														<input type="text" class="form-control" id="validationCustom01" name="event_name"  placeholder="Enter Event name.." required value="<?php echo $eventData['event_name']?>">
														<div class="invalid-feedback">Enter Event name.</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Event Date Time <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="event_date_time" id="validationCustom02"  placeholder="Your valid email.." value="<?php echo $eventData['event_date_time']?>">
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
                                                        <input type="text" class="form-control" name="location" id="validationCustom03" placeholder="Choose a safe one.." value="<?php echo $eventData['location_detail']?>">
														<div class="invalid-feedback">
															Please enter a Location Details.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Description <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control h-50" id="validationCustom04" name="description"  rows="5" placeholder="What would you like to see?">
                                                            <?php echo $eventData['description']?>
                                                        </textarea>
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
                                                        <textarea class="form-control h-50" id="validationCustom04" name="comment"  rows="5" placeholder="What would you like to see?" readonly><?php echo $eventData['comment']?></textarea>
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
                                                        <input type="text" class="form-control" name="contact_name" id="validationCustom06" placeholder="Enter The Name" value="<?php echo $eventData['contact_name']?>">
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
                                                        <input type="text" class="form-control" name="contact_number" id="validationCustom08" placeholder="000-000-0000" value="<?php echo $eventData['contact_number']?>">
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
                                                        <input type="text" class="form-control" name="website"  id="validationCustom07"  placeholder="http://example.com" value="<?php echo $eventData['website']?>">
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
                                                        <input type="text" class="form-control" name="email" id="validationCustom10" placeholder="name@gmail.com" value="<?php echo $eventData['email']?>">
														<div class="invalid-feedback">
															Please enter a Email.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                    </div>
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
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
         ?>
</body>
</html>
