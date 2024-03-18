
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
	<link rel="shortcut icon" type="image/png" href="{{ asset('reviewer/images/fevi.svg') }}">
    <?php
        include "reviewer/plugin/plugin_css.php";
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
		@include ('reviewer.navigation')
		<!--**********************************
            Sidebar end
        ***********************************-->
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
				<div class="card mb-4">
                  <div class="card-body">
                     <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                           <b>All Books List</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                        <i class="fas fa-home"></i> Home</a>
                        <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                     </div>
                  </div>
               </div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="row task">
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-primary count">8</h2>
												<span>Total Review Book</span>
											</div>
											<p>Review Book</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-purple count">7</h2>
												<span>On Going Review</span>
											</div>
											<p>Current Review</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-warning count">13</h2>
												<span>Completed Review</span>
											</div>
											<p>Completed</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">11</h2>
												<span>Canceld Review</span>
											</div>
											<p>Tasks assigne</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-success count">21</h2>
												<span>Complete</span>
											</div>
											<p>Tasks assigne</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">16</h2>
												<span>pending</span>
											</div>
											<p>Tasks assigne</p>
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
										<h4 class="heading mb-0"><i class="fa fa-trash p-2" aria-hidden="true"></i></h4>
									</div>
									<table id="empoloyeestbl2" class="table">
										<thead>
											<tr>
												<th>
												</th>
												<th>#</th>
												<th>Name</th>
												<th>Status</th>
												<th>Date</th>
												<th class="text-end">Priority</th>
												<th class="text-end">Controle</th>
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
															<h6>12 Rules for Life: An Antidote to Chaos</h6>
															<!-- <span>INV-100023456</span> -->
														</div>
													</div>
												</td>
												<td>
													<span class="badge bg-success">success</span>
												</td>
												<td>
													<span>19 Feb 2023</span>
												</td>
												<td class="text-end">
													<span class="badge bg-info">high</span>
												</td>
												<td>
													<a href="review_post_book.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="book_view.php"><i class="fa fa-edit p-2"></i></a>
													<i class="fa fa-trash-o p-2" aria-hidden="true"></i>
												</td>
											</tr>
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
															<h6>12 Rules for Life: An Antidote to Chaos</h6>
															<!-- <span>INV-100023456</span> -->
														</div>
													</div>
												</td>
												<td>
													<span class="badge bg-info">Pending</span>
												</td>
												<td>
													<span>19 Feb 2023</span>
												</td>
												<td class="text-end">
													<span class="badge bg-info">high</span>
												</td>
												<td>
													<a href="review_post_book.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="book_view.php"><i class="fa fa-edit p-2"></i></a>
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
		@include ("reviewer.footer")
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
        include "reviewer/plugin/plugin_js.php";
    ?>
</body>
</html>
