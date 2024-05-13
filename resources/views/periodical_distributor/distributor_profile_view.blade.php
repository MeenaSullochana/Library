
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
    <title>Government of Tamil Nadu - Book Procurement - Profile view</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_distributor/images/fevi.svg') }}">
    <?php
        include "periodical_distributor/plugin/plugin_css.php";
    ?>
<style>
    .table thead th {
  border-bottom: 0.0625rem solid #E6E6E6;
    border-bottom-color: rgb(230, 230, 230);
  text-transform: full-size-kana !important;
  font-size: 1rem;
  white-space: nowrap;
  font-weight: 500;
  border-color: #E6E6E6 !important;
}
table.dataTable thead th {
    text-transform: math-auto !important ;
}
</style>
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
            @include ('periodical_distributor.navigation')

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
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded" style="background: url('images/default.png'); background-size:cover;" id="output1" ></div>

                                    <div class="b-image">
                                        <i class="fa fa-camera banner-upload-button"></i>
                                        <input class="banner-file-upload" type="file" id="backgroundImage" onchange="handleFileChange(event)" accept="image/*">
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">
                                        <!-- User Profile Image -->
                                        <div class="avatar">

                                            <img src="images/default.png" class="img-fluid rounded-circle" id="output" alt="">
                                       
                                            <div class="p-image">
                                                <i class="fa fa-camera upload-button"></i>
                                                <input class="file-upload" type="file"  id="profileImage" onchange="loadFile(event)" accept="image/*" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0">
                                                Distribution Name
                                            </h4>
                                            <p>Selva A</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">Email
                                            </h4>
                                            <p>Selva@gmail.com </p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">

                        <h4 class="text-primary d-inline mb-5 ">Nature of Your Publication Ownership</h4>
                        
                        <div class="row mt-3">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-interest">
                                            <div class="row mt-4 sp4" id="lightgallery">
                                                <p>Public Limited</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i>Public Limited</h3>
                                                </a>
                                                <p>Private Limited</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Private Limited</h3>
                                                </a>
                                                <p>Limited Liability Partnership(LLP)</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Limited Liability Partnership(LLP)</h3>
                                                </a>
                                                <p>Partnership Firm</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Partnership Firm</h3>
                                                </a>
                                                <p>Proprietorship</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Proprietorship</h3>
                                                </a>
                                                <p>Private Trust</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Private Trust</h3>
                                                </a>
                                                <p>Private Society</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Private Society</h3>
                                                </a>
                                                <p>Government Institutional Publication</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Institutional Publication</h3>
                                                </a>
                                                <p>Government Trust/Foundation Publication</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Trust/Foundation Publication</h3>
                                                </a>
                                                <p>Government Society Publication</p>
                                                <a href="#" class="mb-1 col-lg-12 col-xl-12 col-sm-12 col-12" download>
                                                    <h3  class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Government Society Publication</h3>
                                                </a>
                                                     


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#info" data-bs-toggle="tab"
                                                    class="nav-link active show">Info</a>
                                            </li>
                                            <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab"
                                                    class="nav-link">Other Info</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="info" class="tab-pane fade active show">
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">Users
                                                        Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Users Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Selva</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Selva </b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">A</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">selva@gmail.com</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">9988776655</b></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">India</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Tamil Nadu</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Chennai</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City <span class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Vadapalani</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">600 003</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Distribution Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Vadapalani, Chennai - 600 003</b></span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4">Contact Person Information</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">First Name <span
                                                                    class="pull-end"></span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Selva </b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Last Name </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">A</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email ID
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">selva@gmail.com</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">9988776655</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Country
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">India</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">State
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Tamil Nadu</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">District</h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Chennai</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">City<span class="pull-end"></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Vadapalani</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pincode
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">600232</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Distribution Address
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7">
                                                            <span>: <b class="ms-3">Vadapalani, Chennai - 600 006</b></span>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-primary mb-4 mt-4">Other Details</h4>
                                                    <hr>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Year of Establishment</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">1998</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Years of experience in Periodical/Magazine Distribution</h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">56</b></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-6 col-5">
                                                            <h5 class="f-w-500">Number of Periodical/Magazine Circulation Per Year </h5>
                                                        </div>
                                                        <div class="col-sm-6 col-7">
                                                            <span>: <b class="ms-3">56</b></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="other_Info" class="tab-pane fade ">

                                                <div class="profile-skills mt-3 mb-3">
                                                    <h4 class="text-primary mb-2">Primary Language of Distribution</h4>
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">Academic</a>
                                                </div>
                                                
                                                <div class="profile-skills mt-3 mb-3">
                                                    <h4 class="text-primary mb-2">Specialized Category Magazine</h4>
                                                       <a href="javascript:void(0);"
                                                        class="btn btn-primary light btn-xs mb-1">Academic</a>
                                                </div>
                                                <h4 class="text-primary mb-4">Awards if Any
                                                </h4>
                                                <hr>
                                                
                                                <div class="card-body">
                                                    <h5 class="es-5">yes or no</h5>
                                                    <div class="table-responsive">
                                                        <table id="example3" class="display table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Award Name</th>
                                                                    <th>Book Title </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td data-label="S.No"> S.No</td>
                                                                <td data-label="Award Name"> selva</td>
                                                                <td data-label="Book Title ">Kavithai</td>
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
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            <div class="card-header">
                                <h4 class="text-primary mb-4">The periodical added in "Periodicals in your distribution" with authorization from the respective publisher in the registration part are the only ones to be added for procurement</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="es-5">yes or no</h5>
                                <div class="table-responsive">
                                    <table class="display table" id="awarded-titles">
                                    {{-- <table id="subsidiary-pub" class="display table"> --}}
                                        <thead>
                                            <tr>
                                                <th class="fw-bold"> S.No</th>
                                                <th class="fw-bold">Periodical Name</th>
                                                <th class="fw-bold">Place</th>
                                                <th class="fw-bold">Authorization Letter From Publisher</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="S.No"> S.No</td>
                                                <td data-label="Periodical Name">Selva Periodical</td>
                                                <td data-label="Place">Chennai</td>
                                                <td data-label="Authorization Letter From Publisher">Authorization Letter</td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">No data available in table</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile card">
                            
                            <div class="card-header">
                                <h4 class="text-primary mb-4"><b>Subsidiary Publications</b> - Do you have any subsidiary publications? If yes, list the subsidiary Distribution</h4><br>
                                
                            </div>
                            <div class="card-body">
                                <h5 class="es-5">yes or no</h5>
                                <div class="table-responsive">
                                    <table id="subsidiary-pub" class="display table">
                                    {{-- <table id="subsidiary-pub" class="display table"> --}}
                                        <thead>
                                            <tr>
                                                <th class="fw-bold"> S.No</th>
                                                <th class="fw-bold">Name of the Subsidiary Publication</th>
                                                <th class="fw-bold">Name of the Subsidiary Publisher</th>
                                                <th class="fw-bold">Stack Holder Percentage</th>
                                                <th class="fw-bold">Document</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="S.No"> S.No</td>
                                                <td data-label="Name of the Subsidiary Publication">Selva Publication</td>
                                                <td data-label="Name of the Subsidiary Publisher">Selva</td>
                                                <td data-label="Stack Holder Percentage">87</td>
                                                <td data-label="Document">
                                                    <a href="#"
                                                        class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                                        <h3 class="btn btn-primary light btn-xs mb-1"> <i class="fa fa-download"></i> Download</h3>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center" colspan="4">No data available in table</td>
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
        <!--**********************************
            Content body end
            ***********************************-->
        <!--**********************************
            Footer start
            ***********************************-->
            @include ("periodical_distributor.footer")

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
        include "periodical_distributor/plugin/plugin_js.php";
        ?>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
        
                $('#awarded-titles').DataTable();
        
                $('#subsidiary-pub').DataTable();
            });
        </script>
</body>
<style>
    /* data table start */
    /* data table end */
    
    .file-upload {
        display: none;
    }
    .banner-file-upload {
        display: none;
    }

    .circle {
        border-radius: 1000px !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 8px solid rgba(255, 255, 255, 0.7);
        position: absolute;
        top: 72px;
    }

    .avatar {
        width: 120px;
        height: 120px;
        position: relative;
        border: 8px solid rgba(255, 255, 255, 0.7);
        border-radius: 50%;
    }

    img.profile-pic.img-circle {
        width: 120px;
        height: 120px;
    }
    .b-image {
    position: absolute;
    top: 10px;
    right: 22px;
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .profile .profile-photo {
    max-width: 6.25rem;
    position: relative;
    z-index: 1;
    margin-top: -4.5rem;
    margin-right: 6.625rem;
    }
    .p-image {
        position: absolute;
        top: 65px;
        right: 2px;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .photo-content {
  position: relative; }
  .photo-content .cover-photo {
    /* background: url('../images/banner/book-fair2.png'); */
    background-size: cover;
    background-position: center;
    min-height: 15.625rem;
    width: 100%;
    background-repeat: no-repeat !important;
    border-top-left-radius: 0.625rem;
    border-top-right-radius: 0.625rem; }
    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .b-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .banner-upload-button {
        font-size: 1.2em;
    }

    .banner-upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
</style>
</html>

