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
	<link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php include "admin/plugin/plugin_css.php";?>
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
                <div class="row">
                    <div class="row">
                        <div class="col-md-6 filter-elecment-one">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Scheme" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-success m-2"><i class="fa fa-file-excel"></i> Export Excel</button>
                                <button class="btn btn-outline-light m-2"><i class="fa fa-file-pdf"></i> PDF Export</button>
                                <button class="btn btn-outline-danger m-2"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="row">
					{{-- <h3>Your Order Magazine</h3> --}}
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects task-table">
									{{-- <div class="tbl-caption">
										<h4 class="heading mb-0">Order Book List</h4>
									</div> --}}
									<table id="example3" class="table">
										<thead>
											<tr>
												<th>
												</th>
												<th>S.No</th>
												<th>Scheme Name</th>
												<th>Scheme Year</th>
                                                <th>Status</th>
                                                <th>Date</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="customCheckBox3" required>
														<label class="form-check-label" for="customCheckBox3"></label>
													</div>
												</td>
												<td><span>03</span></td>
												<td>
													<div class="products">
														<div>
															<!-- <h6>Create Frontend WordPress</h6> -->
															<span>2024 New Order</span>
														</div>
													</div>
												</td>
												<td><span>06 Feb 2023</span></td>
                                                <td>
													<span class="badge bg-success">Approved</span>
													<span class="badge bg-warning">Pending</span>
													<span class="badge bg-danger">Rejected</span>
												</td>
                                                <td><span>2024-2025</span></td>
												<td>
                                                    <a href="magazine-overview-list"> <i class="fa fa-eye p-2"></i></a>
													<a href="#"><i class="fa fa-trash p-2"></i></a>
													<i class="fa fa-trash-o p-2" aria-hidden="true"></i>
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