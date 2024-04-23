
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
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="row task">
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-primary count">8</h2>
												<span>Total Amount</span>
											</div>
											<p>Total Payment</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-purple count">7</h2>
												<span>Pending Payment</span>
											</div>
											<p>Payment</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-warning count">13</h2>
												<span>Complete Payment</span>
											</div>
											<p>Payment</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">11</h2>
												<span>Cancel Payment</span>
											</div>
											<p>Payment</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-success count">21</h2>
												<span>Complete</span>
											</div>
											<p>Payment</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">16</h2>
												<span>Total Transection</span>
											</div>
											<p>Payment</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-0">
								<div class="table-responsive active-projects task-table">
									<div class="tbl-caption">
										<h4 class="heading mb-0">Task</h4>
									</div>
									<table id="empoloyeestbl2" class="table">
										<thead>
											<tr>
												<th></th>
												<th>#</th>
                                                <th>Total Amount</th>
                                                <th>Name</th>
												<th>Approval</th>
												<th>Transection Number</th>
												<th>Date</th>
												<th>Request ID</th>
												<th>Tags</th>
												<th class="text-end">Priority</th>
                                                <th>Contrle</th>
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
                                                <td><span>12555</span></td>
												<td>
													<div class="products">
														<div>
															<h6>Request To Payment</h6>
															<span>10-10-2023</span>
														</div>
													</div>
												</td>
												<td>
													<select class="default-select status-select">
													  <option value="complete">Complete</option>
													  <option value="pending">Pending</option>
													  <option value="progress">In Progress</option>
													</select>
												</td>
												<td><span>343343</span></td>
												<td>
													<span>19 Feb 2023</span>
												</td>
												<td>343343</td>
												<td>
													<span class="badge badge-primary light border-0 me-1">Issue</span>
													<span class="badge badge-secondary light border-0 ms-1">HTML</span>
												</td>
												<td class="text-end">
													<select class="default-select status-select">
													  <option value="Medium">Medium</option>
													  <option value="High">High</option>
													  <option value="Low">Low</option>
													</select>
												</td>
                                                <td><i class="fa fa-pencil p-2"></i>
                                                <a href="review_view_data.php"><i class="fa fa-eye p-2"></i></td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="customCheckBox4" required>
														<label class="form-check-label" for="customCheckBox4"></label>
													</div>
												</td>
												<td><span>04</span></td>
                                                <td><span>12555</span></td>
												<td>
													<div class="products">
														<div>
                                                            <h6>Request To Payment</h6>
															<span>10-10-2023</span>
														</div>
													</div>
												</td>
												<td>
													<select class="default-select status-select">
                                                        <option value="complete">Complete</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="progress">In Progress</option>
													</select>
												</td>
												<td><span>343343</span></td>
												<td>
													<span>19 Feb 2023</span>
												</td>
												<td>
                                                343343
												</td>
												<td>
													<span class="badge badge-primary light border-0 me-1">Issue</span>
													<span class="badge badge-secondary light border-0 ms-1">HTML</span>
												</td>
												<td class="text-end">
													<select class="default-select status-select">
													  <option value="High">High</option>
													  <option value="Medium">Medium</option>
													  <option value="Low">Low</option>
													</select>
												</td>
                                                <td><i class="fa fa-pencil p-2"></i>
                                                <a href="review_view_data.php"><i class="fa fa-eye p-2"></i></td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="customCheckBox5" required>
														<label class="form-check-label" for="customCheckBox5"></label>
													</div>
												</td>
												<td><span>05</span></td>
                                                <td><span>12555</span></td>
												<td>
													<div class="products">
														<div>
                                                            <h6>Request To Payment</h6>
															<span>10-10-2023</span>
														</div>
													</div>
												</td>
												<td>
													<select class="default-select status-select">
                                                        <option value="complete">Complete</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="progress">In Progress</option>
													</select>
												</td>
												<td><span>343343</span></td>
												<td>
													<span>19 Feb 2023</span>
												</td>
												<td>
                                                343343
												</td>
												<td>
													<span class="badge badge-primary light border-0 me-1">Issue</span>
													<span class="badge badge-secondary light border-0 ms-1">HTML</span>
												</td>
												<td class="text-end">
													<select class="default-select status-select">
													  <option value="High">High</option>
													  <option value="Medium">Medium</option>
													  <option value="Low">Low</option>
													</select>
												</td>
                                                <td><i class="fa fa-pencil p-2"></i>
                                                <a href="review_view_data.php"><i class="fa fa-eye p-2"></i></td>
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
