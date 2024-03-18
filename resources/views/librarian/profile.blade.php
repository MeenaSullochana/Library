
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
    <title>Government of Tamil Nadu - Book Procurement </title>
    <!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
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
         @include ('librarian.navigation')

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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item">Create</li>
                                    <li class="breadcrumb-item">patient</li>
                                </ol>
                            </div>
                            <!-- <h3 class="mb-0 bc-title">
                        <b>Create Patient</b>
                        </h3> -->
                            <a class="btn btn-primary  btn-sm" href="member_list.php">
                                <i class="bi bi-card-checklist"></i> List </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="bg-white overflow-hidden mb-3">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Library Information</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="https://doctorly.themesbrand.website/build/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="https://doctorly.themesbrand.website/storage/images/users/avatar-8.jpg" alt="Jermaine" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate"> Jermaine
                                            Murphy
                                        </h5>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="font-size-12">Last Login :</h5>
                                                    <p class="text-muted mb-0"> 2023-11-28 10:06:36 </p>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="patiend_edit.php" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profile
                                                    <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="bg-white">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Personal Information</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Library Type:</th>
                                                <td><span class="badge bg-primary">Branch!</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Library Name:</th>
                                                <td>Central Library</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Select State:</th>
                                                <td>Tamil Nadu </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Select District:</th>
                                                <td> Villupuram </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Enter City:</th>
                                                <td> Chennai </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Enter Village:</th>
                                                <td> Village </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone number:</th>
                                                <td> 999999999</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <h4> User Details</h4>
                                </div>
                                <div class="col-md-6 ">
                                    <!-- Button trigger modal -->
                                    <div class=" d-flex justify-content-end p-4">
                                        <a class="btn btn-primary btn-sm" href="member_list.php">
                                            <i class="fa fa-angle-double-left" aria-hidden="true"></i> List </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Medical_info" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Basic Information</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#AppointmentList" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Bank Information</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ExaminationList" role="tab" aria-selected="false" tabindex="-1">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Review Details</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active show" id="Medical_info" role="tabpanel">
                                        <div class="table-responsive">
										<table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Library Type:</th>
                                                <td><span class="badge bg-primary">Branch!</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Library Name:</th>
                                                <td>Central Library</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Select State:</th>
                                                <td>Tamil Nadu </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Select District:</th>
                                                <td> Villupuram </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Enter City:</th>
                                                <td> Chennai </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Enter Village:</th>
                                                <td> Village </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone number:</th>
                                                <td> 999999999</td>
                                            </tr>
                                        </tbody>
                                    </table>
											<p class="fs-5 fw-bold mt-3">Contact Person Details</p>
											<hr>
											<table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">librarian Name:</th>
                                                <td>Branch!</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone number:</th>
                                                <td>Central Library</td>
                                            </tr>
											<tr>
                                                <th scope="row">librarian Designation:</th>
                                                <td>Central Library</td>
                                            </tr>
											<tr>
                                                <th scope="row">Email:</th>
                                                <td>Central Library</td>
                                            </tr>
											<tr>
                                                <th scope="row">Email:</th>
                                                <td>email@gmail.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="AppointmentList" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 p-4">
                                                <h4> Update Madical Information Details</h4>
                                            </div>
                                            <div class="col-md-6 ">
                                                <!-- Button trigger modal -->
                                                <div class=" d-flex justify-content-end p-4">
                                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bd-example-modal-lg" href="#">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> Edit Bank Information </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="w-75">Bank Name</th>
                                                        <td> Bank Name</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">Branch Name</th>
                                                        <td> Branch Name</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">Account Number</th>
                                                        <td> Account Number</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-75">IFSC Number</th>
                                                        <td> IFSC Number</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ExaminationList" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 p-4">
                                                <h4> Book Details</h4>
                                            </div>
                                            <div class="col-md-6 ">
                                                <!-- Button trigger modal -->
                                                <!-- <div class=" d-flex justify-content-end p-4">
                                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bd-example-modal-lg-examination" href="#">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> Add Examination
                                                    </a>
                                                </div> -->

                                            </div>
                                            <table class="table table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No</th>
                                                        <th>Book Name</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Ruthless Vows (Letters of Enchantment, Book 2)<span><br>The epic conclusion to the intensely </span></td>
                                                        <td>19.12.2023</td>
                                                        <td> <span class="badge bg-success">Complete!</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary mb-2 mb-md-0" data-id="29" data-bs-toggle="modal" data-bs-target="#view_information"><i class="fa fa-eye"></i></button>

                                                            <button type="button" class="btn btn-danger mb-2 mb-md-0" data-id="29"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-md-12 text-center mt-3">
                                                <div class="d-flex justify-content-start">
                                                    Showing to
                                                    of 0 entries
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
        <!--**********************************
            Footer start
            ***********************************-->
            @include ("librarian.footer")
        <!--**********************************
            Footer end
            ***********************************-->
        <!--**********************************
            Support ticket button start
            ***********************************-->

        <div class="modal fade" id="bd-example-modal-lg">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bank Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="w-25">Bank Name<span class="text-danger">*</span></th>
                                                            <td> <input type="text" name="" id="" class="form-control"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="w-25">Branch Name<span class="text-danger">*</span></th>
                                                            <td> <input type="text" name="" id="" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="w-25">Account Number<span class="text-danger">*</span></th>
                                                            <td> <input type="text" name="" id="" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="w-25">IFSC Number<span class="text-danger">*</span></th>
                                                            <td> <input type="text" name="" id="" class="form-control"></td>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="prescription_add">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Prescription Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">Name : </label>
                                        <input name="" id="" placeholder="Enter Name" value="Selva" class="form-control" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">Age : </label>
                                        <input name="" id="" placeholder="Enter Age" value="34" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="formmessage">Prescription Details <span class="text-danger">*</span></label>
                                        <textarea name="" id="" placeholder="Enter Prescription Details" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">
                                                                                Add New Examination
                                                                            </button>
                                                                        </div>
                                                                    </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal  -->
        <div class="modal fade" id="Prescription_view_information">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Prescription Details View
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <h5> <b>Book name : </b> House of Flame and Shadow</h5>
                                        <h5> <b>Valueable Feedback : </b> Very Imaportant</h5>
                                        <h5> <b>Prescription Details : </b> Lorem Ipsum
                                            is simply dummy text of the
                                            printing and typesetting
                                            industry. Lorem Ipsum has been
                                            the industry's standard dummy
                                            text ever since the 1500s, when
                                            an unknown printer took a galley
                                            of type and scrambled it to make
                                            a type specimen book.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
            <!--**********************************
            Support ticket button end
            ***********************************-->
        </div>
        <div class="modal fade" id="bd-example-modal-lg-examination">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bank Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">BP <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="first_name" id="" tabindex="1" value="" placeholder="Enter BP">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">Weight<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " tabindex="5" name="email" id="" value="" placeholder="Enter Weight">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">Doppler <span class="text-danger">*</span></label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">EXAM<span class="text-danger">*</span></label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="formmessage">Dignosis<span class="text-danger">*</span></label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary">
                                        Add New Examination
                                    </button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add New Examination</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal  -->
        <div class="modal fade" id="view_information">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Review Details View
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <h5> <b>Book Name : </b> Ruthless Vows (Letters of Enchantment, Book 2)The epic conclusion to the intensely</h5>
                                        <h5> <b>Valuable Feedback : </b> Very Important</h5>
                                        <h5> <b>Comment : </b> Lorem Ipsum
                                            is simply dummy text of the
                                            printing and typesetting
                                            industry. Lorem Ipsum has been
                                            the industry's standard dummy
                                            text ever since the 1500s, when
                                            an unknown printer took a galley
                                            of type and scrambled it to make
                                            a type specimen book.</h5>
                                    </div>
                                    <p>Other Info:</p>
                                    <hr>
                                    <h5> <b>Payment Status : </b> <span
                                            class="badge bg-primary">Paid!</span>
                                         </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
        include "librarian/plugin/plugin_js.php";
    ?>

</html>
<style>
    .avatar-title {
        align-items: center;
        background-color: #556ee6;
        color: #fff;
        display: flex;
        font-weight: 500;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    .bg-primary-subtle {
        background-color: rgba(85, 110, 230, .25);
    }

    .avatar-md {
        height: 4.5rem;
        width: 4.5rem;
    }

    .profile-user-wid {
        margin-top: -26px;
    }
</style>
