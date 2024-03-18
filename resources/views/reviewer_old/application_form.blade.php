
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
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <?php
        include "plugin/plugin_css.php";
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
        <?php
			include "navigation.php";
		?>
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
                            <h3 class="mb-0 bc-title">
                                <b>Application Management</b>
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="application.php">Application Management</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="">Publication </h5>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label"
                                                    for="validationCustom01">Publication Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Publication Name.." required=""
                                                        value="Publication Name" disabled>
                                                </div>
                                            </div>
                                            <h5 class="">Publisher Details</h5>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">First
                                                    Name <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a First Name.." required=""
                                                        value="First Name" disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Last
                                                    name <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Last name.." required="" value="Last name"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom04">Email Id
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Email Id.." required=""
                                                        value="info@gmail.com" disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Contact
                                                    Number <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Contact Number.." required=""
                                                        value="+91 9900990099" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label"
                                                    for="validationCustom04">Publication Address <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea type="text" class="form-control" id=""
                                                        placeholder="Enter a Publication Address.." required="" rows="3"
                                                        value="Vadapalani, Chennai - 600 040." disabled></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">City
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a City.." required="" value=" vadapalani"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom04">State
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a State.." required="" value="Tamil Nadu"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Pincode
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Pincode.." required="" value="600 404."
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom04">Country
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="validationCustom01"
                                                        placeholder="Enter a Country .." required="" value="india."
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-12 text-end">
                                            <button type="btn" name="" class="btn btn-primary "
                                                id="">Edit Details</button>
                                        </div>
                                    </div>
                                    </div>
                                    <br>
                                    <!-- part a -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container table-responsive py-5">
                                                <h3 class="text-left p-3">Part A</h3>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="coimbatore">
                                                            <h5 class="large"> Coimbatore</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="erode">
                                                            <h5 class="large"> Erode</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="madurai">
                                                            <h5 class="large"> Madurai</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="tiruchirappalli">
                                                            <h5 class="large"> Tiruchirappalli</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="salem">
                                                            <h5 class="large"> Salem</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="tirupur">
                                                            <h5 class="large"> Tirupur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="tirunelveli">
                                                            <h5 class="large"> Tirunelveli</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To
                                                                Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- part b -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container table-responsive py-t">
                                                <h3 class="text-left p-3">Part B</h3>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="thanjavur">
                                                            <h5 class="large"> Thanjavur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="karur">
                                                            <h5 class="large"> Karur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="thoothukudi">
                                                            <h5 class="large"> Thoothukudi</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="dindigul">
                                                            <h5 class="large"> Dindigul</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="kadalur">
                                                            <h5 class="large"> Kadalur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="nagercoil">
                                                            <h5 class="large"> Nagercoil</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="vellore">
                                                            <h5 class="large"> Vellore</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date <span><b>
                                                                        09-03-2023</b></span></P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- part C -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container table-responsive py-5">
                                                <h3 class="text-left p-3">Part C</h3>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="radio1">
                                                            <h5 class="large"> Dharmapuri</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="radio1">
                                                            <h5 class="large"> Nagapattinam</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="radio1">
                                                            <h5 class="large"> Krishnagiri</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="pudukkottai">
                                                            <h5 class="large"> Pudukkottai</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="tenkasi">
                                                            <h5 class="large"> Tenkasi</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="mayiladuthurai">
                                                            <h5 class="large"> Mayiladuthurai</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="ranipet">
                                                            <h5 class="large"> Ranipet</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="tirupattur">
                                                            <h5 class="large"> Tirupattur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="virudhunagar">
                                                            <h5 class="large"> Virudhunagar</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="kallakurichi">
                                                            <h5 class="large"> Kallakurichi</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="namakkal">
                                                            <h5 class="large"> Namakkal</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="kanchipuram">
                                                            <h5 class="large"> Kanchipuram</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="ramanathapuram">
                                                            <h5 class="large"> Ramanathapuram</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="theni">
                                                            <h5 class="large"> Theni</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="perambalur">
                                                            <h5 class="large"> Perambalur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="thiruvannamalai">
                                                            <h5 class="large"> Thiruvannamalai</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="thiruvarur">
                                                            <h5 class="large"> Thiruvarur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="sivagangai">
                                                            <h5 class="large"> Sivagangai</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="thiruvalluvar">
                                                            <h5 class="large"> Thiruvalluvar</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="neelagiri">
                                                            <h5 class="large"> Neelagiri</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="chengalpattu">
                                                            <h5 class="large"> Chengalpattu</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="ariyalur">
                                                            <h5 class="large"> Ariyalur</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="viluppuram">
                                                            <h5 class="large"> Viluppuram</h5>
                                                            <P class="small">From Date <span><b>
                                                                        09-03-2023</b></span><br> To Date
                                                                <span><b>
                                                                        09-03-2023</b></span>
                                                            </P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <button type="submit" name="" class="btn btn-primary "
                                                id="">Submit</button>
                                        </div>
                                    </div>
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
        <?php
            include "footer.php";
        ?>
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
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
</body>

</html>
<style>
h5.large {
    font-size: 17px !important;
}

.text-justify {
    text-align: justify;
}

h3.text-left.p-3 {
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

/* .card.p-5 {
    padding: 5px !important;
} */
/* h4.mt-09 {
    font-size: 12px;
} */
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .col-xs-4 {
        width: 33%;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {}
</style>
