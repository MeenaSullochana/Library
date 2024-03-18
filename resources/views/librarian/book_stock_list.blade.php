
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
				<div class="row">
				<div class="col-xl-12 col-sm-12">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
								<div class="icon-box icon-box-lg bg-success-light rounded-circle">
									<i class="bi bi-book" style="font-size: 30px;"></i>
									</div>
									<div class="total-projects ms-3">
										<h3 class="text-success count text-start">Book Stock List</h3>
										<!-- <span class="text-start">Total Completed</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="row task">
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-primary count">8</h2>
												<span>Total Order</span>
											</div>
											<p>Order Books</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-purple count">7</h2>
												<span>Total Stock</span>
											</div>
											<p>Order Books</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-warning count">13</h2>
												<span>Received Order</span>
											</div>
											<p>Order Books</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">11</h2>
												<span>Canceld Orders</span>
											</div>
											<p>Order Books</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-success count">21</h2>
												<span>Complete Orders</span>
											</div>
											<p>Order Books</p>
										</div>
									</div>
									<div class="col-xl-2 col-sm-4 col-6">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-danger count">16</h2>
												<span>Upcoming Order</span>
											</div>
											<p>Order Books</p>
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
										<h4 class="heading mb-0">Book Stock List</h4>
									</div>
									<table id="empoloyeestbl2" class="table">
										<thead>
											<tr>
												<th></th>
												<th>#</th>
												<th>Images</th>
												<th>Titile</th>
												<th>Author</th>
                                                <th>Category</th>
												<th>Date</th>
												<th class="text-end">Control</th>
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
												<td><span><img src="https://marketplace.canva.com/EAFKA0RgDtw/1/0/1003w/canva-brown-and-orange-elegant-simple-young-adult-fantasy-book-cover-Qb8uSVdJDzw.jpg" style="height: 75px;width: 75px;"></span></td>
												<td><span>03</span></td>
												<td>
													<div class="products">
														<div>
															<h6>Create Frontend WordPress</h6>
															<span>INV-100023456</span>
														</div>
													</div>
												</td>
												<td>Author</td>
                                                <td>Comics</td>
												<td><span>06 Feb 2023</span></td>
												<td>
                                                    <a href="store_book_view.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="book_profile.php"><i class="fa fa-edit p-2"></i></a>
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
												<td><span><img src="https://marketplace.canva.com/EAFKA0RgDtw/1/0/1003w/canva-brown-and-orange-elegant-simple-young-adult-fantasy-book-cover-Qb8uSVdJDzw.jpg" style="height: 75px;width: 75px;"></span></td>
												<td><span>03</span></td>
												<td>
													<div class="products">
														<div>
															<h6>Create Frontend WordPress</h6>
															<span>INV-100023456</span>
														</div>
													</div>
												</td>
												<td>Author</td>
                                                <td>Comics</td>
												<td><span>06 Feb 2023</span></td>
												<td>
                                                    <a href="store_book_view.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="book_profile.php"><i class="fa fa-edit p-2"></i></a>
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
				<div class="row">
				<div class="col-xl-12">
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <h5 class="mt-1 mb-2">No Records, !failed </h5>
                        <p class="mb-0">Again upload your server</p>
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
		@include ("librarian.footer")

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
        include "librarian/plugin/plugin_js.php";
    ?>
</body>
</html>
