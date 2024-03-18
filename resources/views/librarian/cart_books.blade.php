
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
									<i class="bi bi-cart" style="font-size: 30px;"></i>
									</div>
									<div class="total-projects ms-3">
										<h3 class="text-success count text-start">Books Cart Quote List</h3>
										<!-- <span class="text-start">Total Completed</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						<strong>!Sorry</strong> Can't Purches Because Your Limit End
					</div>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						<strong>!Sucess</strong> Your Cart Item List here
					</div>
      			</div>

				<!-- Total Leval For Buy item -->
				<section class="cart-item-leval text-center">
					<div class="container">
						<h3 class="text-secondary text-start p-2">Purches Category Leval</h3>
						<div class="d-flex align-items-center">
						<div class="item">
							<p>Children</p>
							<div class="pie animate no-round" style="--p:20"> 20%</div>
						</div>
						<div class="item">
							<p>Children</p>
							<div class="pie" style="--p:40;--c:darkblue;--b:10px"> 40%</div>
						</div>
						<div class="item">
							<p>Children</p>
							<div class="pie no-round" style="--p:60;--c:purple;--b:15px"> 60%</div>
						</div>
						<div class="item">
							<p>Children</p>
							<div class="pie animate no-round" style="--p:80;--c:orange;"> 80%</div>
						</div>
						<div class="item">
							<p>Children</p>
							<div class="pie animate no-round" style="--p:60;--c:red;"> 60%</div>
						</div>
						<div class="item">
							<p>Children</p>
							<div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>
						</div>
						</div>
					</div>
				</section>
				<!--End Total Leval For Buy item -->
				<div class="row">
					<h3>Your Quote Item Details</h3>
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
										<h4 class="heading mb-0">Quote Book List</h4>
									</div>
									<table id="example3" class="table">
										<thead>
											<tr>
												<th>
												</th>
												<th>S.No</th>
												<th>Quote id</th>
												<th>Quote Date</th>
                                                <th>Status</th>
                                                <th>Quote Status</th>
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
															<span>INV-100023456</span>
														</div>
													</div>
												</td>
												<td><span>06 Feb 2023</span></td>
                                                <td>
													<span class="badge bg-success">Send Quote</span>
												</td>
                                                <td>
													<span class="badge bg-success">Approved</span>
												</td>
												<td>
                                                    <a href="order_item_list.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="order_item_list.php"><i class="fa fa-edit p-2"></i></a>
													<i class="fa fa-trash-o p-2" aria-hidden="true"></i>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="customCheckBox4" required>
														<label class="form-check-label" for="customCheckBox4"></label>
													</div>
												</td>
												<td><span>04</span></td>
												<td>
													<div class="products">
														<div>
															<!-- <h6>HTML To React Convert </h6> -->
															<span>INV-100023456</span>
														</div>
													</div>
												</td>
												<td><span>06 Feb 2023</span></td>
                                                <td>
													<span class="badge bg-danger">Re-send Quote</span>
												</td>
                                                <td>
													<span class="badge bg-danger">Reject</span>
												</td>
												<td>
                                                    <a href="order_item_list.php"> <i class="fa fa-eye p-2"></i></a>
													<a href="order_item_list.php"><i class="fa fa-edit p-2"></i></a>
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
<style>
   @property --p {
      syntax: '<number>';
      inherits: true;
      initial-value: 0;
   }

   .pie {
      --p: 20;
      --b: 22px;
      --c: darkred;
      --w: 150px;

      width: var(--w);
      aspect-ratio: 1;
      position: relative;
      display: inline-grid;
      margin: 5px;
      place-content: center;
      font-size: 25px;
      font-weight: bold;
      font-family: sans-serif;
   }

   .pie:before,
   .pie:after {
      content: "";
      position: absolute;
      border-radius: 50%;
   }

   .pie:before {
      inset: 0;
      background:
         radial-gradient(farthest-side, var(--c) 98%, #0000) top/var(--b) var(--b) no-repeat,
         conic-gradient(var(--c) calc(var(--p)*1%), #0000 0);
      -webkit-mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
      mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
   }

   .pie:after {
      inset: calc(50% - var(--b)/2);
      background: var(--c);
      transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
   }

   .animate {
      animation: p 1s .5s both;
   }

   .no-round:before {
      background-size: 0 0, auto;
   }

   .no-round:after {
      content: none;
   }

   @keyframes p {
      from {
         --p: 0
      }
   }

   body {
      background: #f2f2f2;
   }
</style>
</html>
