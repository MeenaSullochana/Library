<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item card">
                        <h2 class="accordion-header p-0 m-0 bg-white" id="headingOne">
                            <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="cpa">
									<i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
								</div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                            <label class="form-label">User</label>
                                            <select name="" id="" class="form-select bg-white p-2 border border-1 mb-3">
                                                <option value="tamil">Publisher</option>
                                                <option value="English">Distributor</option>
                                                <option value="English">Publisher cum Distributor</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
											<label class="form-label">Frequency</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">monhly</option>
                                                <option value="English">Year</option>
                                            </select>
										</div>
										<div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
											<label class="form-label">language</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">Tamil</option>
                                                <option value="English">English</option>
                                            </select>
										</div>
										<div class="col-xl-3 col-sm-6">
                                            <label class="form-label">Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										
                                        <div class="col-xl-3 col-sm-6 align-self-end">
											<div>
												<button class="btn btn-primary me-2" title="Click here to Search" type="button"><i class="fa fa-filter me-1"></i>Filter</button>
												<button class="btn btn-danger light" title="Click here to remove filter" type="button">Remove Filter</button>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <h6>Export Option</h6>
                                    <a href="magazine_add">
                                        <button type="button" class="btn btn-primary"><span
                                            class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
                                        </span>Add</button>
                                    </a>
                                </div>
                                <hr>
                                <div class="row mb-4 d-flex">
                                    <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Range</label>
                                        <select name="" id="" class="form-select bg-white p-2 border border-1">
                                            <option value="500">100</option>
                                            <option value="1000">1000</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-9 col-sm-6 mt-4 text-end">
                                        <button type="button" class="btn btn-primary"><span
                                            class="btn-icon-start text-primary"><i class="fa fa-file-pdf-o"></i>
                                        </span>PDF</button>
                                        <button type="button" class="btn  btn-info"><span
                                            class="btn-icon-start text-info"><i class="fa fa-file-excel-o"></i>
                                        </span>Excel</button>
                                        <button type="button" class="btn  btn-warning"><span
                                            class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                        </span>Download</button>    
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                                <th class=" pe-3">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>Magazine Name</th>
                                                <th>language</th>
                                                <th>User type</th>
                                                <th class=" ps-5" style="min-width: 200px;">Name of the Company
                                                </th>
                                                {{-- <th>Order Status</th> --}}
                                                <th>Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkbox1">
                                                        <label class="form-check-label" for="checkbox1"></label>
                                                    </div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="#">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-sm me-2">
                                                                <div class=""><img
                                                                        class="rounded-circle img-fluid"
                                                                        src="./images/avatar/5.png" width="30"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 fs--1">Ricky Antony</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a
                                                        href="mailto:ricky@example.com">info@example.com</a></td>
                                                <td class="py-2"> <a href="tel:2012001851">(201) 200-1851</a></td>
                                                <td class="py-2 ps-5">2392 Main Avenue, Penasauka</td>
                                                <td class="py-2">30/03/2018</td>
                                                {{-- <td class="py-2">Pending</td> --}}
                                                <td class="py-2 text-end">
                                                    <div class="dropdown"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><span
                                                                class="fs--1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24"
                                                                            height="24"></rect>
                                                                        <circle fill="#000000" cx="5"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="19"
                                                                            cy="12" r="2"></circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                            style="">
                                                            <div class="py-2">
                                                                <a class="dropdown-item" href="magazine_view"><i class="fa fa-eye p-2"></i>View</a>
                                                                <a class="dropdown-item" href="magazine_edit"><i class="fa fa-pencil p-2"></i> Edit</a>
                                                                <a class="dropdown-item text-danger" href="magazine_delete"><i class="fa fa-trash p-2"></i>Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
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
    <!--************
                Content body end
            *************-->
    <!--************
                Footer start
            *************-->
    @include ('publisher.footer')
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
    include 'publisher/plugin/plugin_js.php';
    ?>
</body>

</html>
