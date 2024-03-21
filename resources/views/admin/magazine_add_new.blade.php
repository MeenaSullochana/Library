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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Add Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('admin/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-body">
							<div class="d-flex align-items-center justify-content-between">
								<h3 class="mb-0 bc-title">
									<b>Add Magazine Form</b>
								</h3>
								<a class="btn btn-primary  btn-sm" href=" {{ url('admin/magazine_add') }}">
									<i class="fa fa-angle-double-left" aria-hidden="true"></i> Bulk CV Upload  </a>
							</div>
							<hr>
                            <div class="">
                                <form action="" method="post">
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Language</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="col-lg-12">
                                                    <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                    <div class="basic-form">

                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Select Subject <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="default-select wide form-control"
                                                                id="select-lang" name="" required>
                                                                <option value="">Select One</option>
                                                                <option value="tamil">Tamil</option>
                                                                <option value="english">English</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 tamil-category d-none">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername"> Category - Tamil<span
                                                                    class="text-danger">*</span></label>
                                                                    <select class="default-select wide form-control" id="tamil-category" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="குழந்தைகள்">குழந்தைகள்</option>
                                                                        <option value="போட்டித்தேர்வு">போட்டித்தேர்வு</option>
                                                                        <option value="பொருளாதாரம்">பொருளாதாரம்</option>
                                                                        <option value="பொழுதுபோக்கு">பொழுதுபோக்கு</option>
                                                                        <option value="பொது">பொது</option>
                                                                        <option value="உடல்நலம்">உடல்நலம்</option>
                                                                        <option value="இலக்கியம்">இலக்கியம்</option>
                                                                        <option value="சமயம்">சமயம்</option>
                                                                        <option value="அறிவியல் & தொழில்நுட்பம்">அறிவியல் & தொழில்நுட்பம்</option>
                                                                        <option value="விளையாட்டு">விளையாட்டு</option>
                                                                        <option value="பெண்கள்">பெண்கள்</option>
                                                                    </select>
                                                        </div>
                                                        <div class="mb-3 english-category d-none">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Category - English<span
                                                                    class="text-danger">*</span></label>
                                                                    <select class="default-select wide form-control" id="english-category" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="Children">Children</option>
                                                                        <option value="Competitive">Competitive</option>
                                                                        <option value="Economics">Economics</option>
                                                                        <option value="Entertainment">Entertainment</option>
                                                                        <option value="General">General</option>
                                                                        <option value="Health">Health</option>
                                                                        <option value="Literature">Literature</option>
                                                                        <option value="Religion">Religion</option>
                                                                        <option value="Science & Technology">Science & Technology</option>
                                                                        <option value="Sports">Sports</option>
                                                                        <option value="Women">Women</option>
                                                                    </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Title of the Magazine</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Title of the Magazine <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""
                                                                    name="" placeholder="Enter the Title of the Magazine" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Periodi City</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Periodi City <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id=""
                                                                    name="" placeholder="Enter the Periodi City" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Frequency</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Frequency <span class="text-danger">*</span></label>
                                                                <select class="default-select wide form-control"
                                                                id="select-lang" name="" required>
                                                                <option value="">Select One</option>
                                                                <option value="">Monthly</option>
                                                                <option value="">Quarterly</option>
                                                                <option value="">Annual</option>
                                                                <option value="">Weekly</option>
                                                                <option value="">Bi Monthly</option>
                                                                <option value="">Fortnight</option>
                                                                <option value="">BiMonthly</option>
                                                                <option value="">Bi weekly</option>
                                                                <option value="">Half yearly</option>
                                                                <option value="">Yearly</option>
                                                                <option value="">Bimonthly</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Single Issue Rate</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Single Issue Rate <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id=""
                                                                    name="" placeholder="Enter the Single Issue Rate" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Annual Subscription</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id=""
                                                                    name="" placeholder="Enter the Annual Subscription" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Discount %</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Discount % <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id=""
                                                                    name="" placeholder="Enter the Discount %" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Single Issue After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Single Issue After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id=""
                                                                    name="" placeholder="Enter the Single Issue after discount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Annual Subscription After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Annual Subscription After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Annual Subscription After Discount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Subscription Before Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Subscription Before Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Total Subscription Before Discount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Subscription After Discount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Subscription After Discount <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Total Subscription After Discount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Difference in Amount</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Difference in Amount<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Difference in Amount" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>RNI Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">RNI Details<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group">
                                                                    <textarea type="text" class="form-control" id="" name="" placeholder="Enter the RNI Details" required></textarea>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Paper Quality</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Paper Quality<span class="text-danger">*</span></label>
                                                                <select class="default-select wide  form-control" id="" name="" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="">GSM</option>
                                                                    <option value="">Map Litho</option>
                                                                    <option value="">Art Paper</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>

                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Type of Library</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Type of Library<span class="text-danger">*</span></label>
                                                                <select class="default-select wide  form-control" id="" name="" required>
                                                                    <option value="">Select One</option>
                                                                    <option value="">DCL</option>
                                                                    <option value="">FTBL </option>
                                                                    <option value="">BL </option>
                                                                    <option value="">VL </option>
                                                                    <option value="">PTL </option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Total Number of Pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Total Number of Pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Total Number of Pages" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Number of Multicolour pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Number of Multicolour pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Number of Multicolour pages" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Number of Monocolour Pages</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Number of Monocolour Pages <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Number of Monocolour Pages" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Size of the Magazine</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Size of the Magazine<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" id="" name="" placeholder="Enter the Size of the Magazine" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Contact Person Details with Address</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">Contact Person Name <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="" name="" placeholder="Enter the Contact Person Name" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Email Id <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control" id="" name="" placeholder="Enter the Email Id" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Phone Number <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="" name="" placeholder="Enter the Phone Number" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Country  <span class="text-danger">*</span></label>
                                                                    <select class="default-select wide  form-control" id="" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="">test one</option>
                                                                        <option value="">test two</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    State <span class="text-danger">*</span></label>
                                                                    <select class="default-select wide  form-control" id="" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="">test one</option>
                                                                        <option value="">test two</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    District <span class="text-danger">*</span></label>
                                                                    <select class="default-select wide  form-control" id="" name="" required>
                                                                        <option value="">Select One</option>
                                                                        <option value="">test one</option>
                                                                        <option value="">test two</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    City <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the City" required>

                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Pincode <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="" name="" placeholder="Enter the Pincode" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">
                                                                    Contact Person Address <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <textarea type="text" class="form-control" id="" name="" placeholder="Enter the Contact Person Address " required></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Official Address</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="basic-form">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label text-black"
                                                                for="validationCustomUsername">Official Address<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <textarea type="number" class="form-control" id="" name="" rows="3" placeholder="Enter the Official Address" required></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Bank Account Details</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">IFSC Code <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the IFSC Code" required>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Account Number <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Bank Account Number" required>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                        Bank Name <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Bank Name" required>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="basic-form">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label text-black"
                                                                        for="validationCustomUsername">
                                                                       Account Holder Name <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="" name="" placeholder="Enter the Account Holder Name" required>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section>
                                    <section class="bg-light-new mt-4">
                                        <div class="row p-3">
                                            <div class="col-md-2">
                                                <h4>Add Magazine Images</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <P class="fs-4">You can provide up to 8 images including some key illustrations with a minimum of 3 compulsory cover images</p>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">Front<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="small-12 medium-2 large-2 columns">
                                                                    <div class="circle">
                                                                        <img class="profile-pic"
                                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                                    </div>
                                                                    <div class="p-image">
                                                                        <i class="fa fa-camera upload-button"></i>
                                                                        <input class="file-upload" name="front_img" id="front"
                                                                            type="file" accept="image/*" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">Back<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="small-12 medium-2 large-2 columns">
                                                                    <div class="circle">
                                                                        <img class="profile-pic_back"
                                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                                    </div>
                                                                    <div class="p-image">
                                                                        <i class="fa fa-camera upload-button_back"></i>
                                                                        <input class="file-upload_back" name="back_img"
                                                                            id="back_img" type="file" accept="image/*"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">Full Image<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="small-12 medium-2 large-2 columns">
                                                                    <div class="circle">
                                                                        <img class="profile-pic_other"
                                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                                    </div>
                                                                    <div class="p-image">
                                                                        <i class="fa fa-camera upload-button_other"></i>
                                                                        <input class="file-upload_other" name=""
                                                                            id="" type="file" accept="image/*"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="basic-form">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label text-black"
                                                                    for="validationCustomUsername">PDF<span class="text-danger"></span></label>
                                                                <div class="small-12 medium-2 large-2 columns">
                                                                    <input class="bg-white p-1 w-100" type="file" id=""
                                                                        name="" accept="" multiple>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="row">
                                        <div class="col-md-12 text-end mt-5">
                                            <button type="submit" class="btn me-2 btn-primary" id="submitbutton">Submit</button>
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
    @include ('publisher.footer')
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
    include 'publisher/plugin/plugin_js.php';
    ?>
    <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#select-lang').change(function () {
                var selectedSubject = $(this).val();
                // alert(selectedSubject);
                $('.tamil-category, .english-category').addClass('d-none');

                if (selectedSubject === 'english') {
                    $('.tamil-category').css('display','block');
                    $('.english-category').removeClass('d-none');
                } else if (selectedSubject === 'tamil') {
                    $('.tamil-category').removeClass('d-none');
                    $('.english-category').css('display','block');
                }
            });
        });
    </script>

   



</body>

<style>
    .drop_box {
        margin: 10px 0;
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 3px dotted #a3a3a3;
        border-radius: 5px;
    }

    .drop_box h4 {
        font-size: 16px;
        font-weight: 400;
        color: #2e2e2e;
    }

    .drop_box p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #a3a3a3;
    }

    button.btn.csv-upload {
        text-decoration: none;
        background-color: #005af0;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        outline: none;
        transition: 0.3s;
    }

    /* .btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
} */
    .form input {
        margin: 10px 0;
        width: 100%;
        background-color: #e2e2e2;
        border: none;
        outline: none;
        padding: 12px 20px;
        border-radius: 4px;
    }
    /* .tamil-category, .english-category {
            display: none;
        } */
        .file-upload {
        display: none;
    }

    .file-upload_back {
        display: none;
    }

    .file-upload_other {
        display: none;
    }
    img {
        max-width: 100%;
        height: auto;
    }

    .p-image {
        position: absolute;
        /* top: 167px;
  right: 30px; */
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
    .table thead th{
        text-transform: initial !important;
    }
    img.profile-pic_other {
    /* max-width: 200px; */
    max-height: 200px !important;
    }
    img.profile-pic{
        /* max-width: 200px; */
    max-height: 200px !important;
    }
    img.profile-pic_back{
        /* max-width: 200px; */
    max-height: 200px !important;
    }

    
</style>
