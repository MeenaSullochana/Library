
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
										<h3 class="text-success count text-start">Library List</h3>
										 <span class="text-start">Magazine Name-<b>Frequency</b></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="row">
                        <div class="col-md-6 filter-elecment-one">
						<div class="col-md-6 filter-elecment-one">
                           <select name="" id="" class="form-select bg-white p-3">
								<option>Name Of Library</option>
						   </select>
                        </div>
                        </div>
                        <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-success m-2"><i class="fa fa-file-excel"></i> Export Excel</button>
                                <!-- <button class="btn btn-outline-light m-2"><i class="fa fa-file-pdf"></i> PDF Export</button>
                                <button class="btn btn-outline-danger m-2"><i class="fa fa-print"></i> Print</button> -->
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="row">
                    
                        <!-- <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
								<input type="date" class="form-control m-2" name="from-date">
                                <input type="date" class="form-control m-2" name="from-date">
								<input type="button" class="btn btn-danger m-2" name="from-date" value="Check Now ">
                            </div>
                        </div> -->
                    </div>
                </div>
				<!--End Total Leval For Buy item -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects task-table">
								
									<table id="example3" class="table">
										<thead>
											<tr>
												<th></th>
												<th>S.No</th>
												<th>Library id</th>
												<th>Library Type</th>
												<th>Library Name</th>
                                                <th>Total Order Qty</th>
                                                <th>Received Qty</th>
												<th>Not Received Qty</th>
												<th>Not Arrived Qty</th>
                                                <th>Status</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $val)
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input" id="customCheckBox3" required>
														<label class="form-check-label" for="customCheckBox3"></label>
													</div>
												</td>
												<td><span>{{ $loop->index + 1 }}</span></td>
												<td>
													<div class="products">
														<div>
															<!-- <h6>Create Frontend WordPress</h6> -->
															<span>{{$val->libraryid}}</span>
														</div>
													</div>
												</td>
												<td><span>{{$val->libraryType}}</span></td>
												<td><span>{{$val->libraryname}}</span></td>
                                                <td><span>{{$val->totalorder}}</span></td>
                                                <td><span>{{$val->recived}}</span></td>
											
												<td><span>{{$val->notrecived}}</span></td>
												<td><span>{{$val->totalorder   -$val->recived -$val->notrecived }}</span></td>
                                                <td>
													<!-- <span class="badge bg-success">Approved</span> -->
													<span class="badge bg-warning">Pending</span>
													<!-- <span class="badge bg-danger">Cencelled</span> -->
												</td>
												<td>
                                                    <a href="/librarian/magazine-over-library-list"> <i class="fa fa-eye p-2"></i></a>
													<!-- <a href="#"><i class="fa fa-edit p-2"></i></a>
													<i class="fa fa-trash-o p-2" aria-hidden="true"></i> -->
												</td>
											</tr>
											@endforeach
											
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
</html>