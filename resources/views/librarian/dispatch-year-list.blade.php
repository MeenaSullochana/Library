
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
										<h3 class="text-success count text-start">Periodical Year Order List</h3>
										<!-- <span class="text-start">Total Completed</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--End Total Leval For Buy item -->
                <div class="row">
                    <div class="row">
                        <div class="col-md-6 filter-elecment-one">
                            <!-- <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Scheme" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                            </div> -->
                        </div>
                        <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
                                <!-- <button class="btn btn-outline-success m-2"><i class="fa fa-file-excel"></i> Export Excel</button> -->
                                <!-- <button class="btn btn-outline-light m-2"><i class="fa fa-file-pdf"></i> PDF Export</button>
                                <button class="btn btn-outline-danger m-2"><i class="fa fa-print"></i> Print</button> -->
                            </div>
                        </div>
                    </div>
                </div>
				@php
				$id = auth('librarian')->user()->id;
                                      $records = DB::table('ordermagazines')
                                        ->where('librarianid', '=', $id)
                                          ->where('status', '=', '0')
                                         ->orderBy('created_at', 'asc')
                                         ->get();
                                      

                                @endphp
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
												
												<th>S.No</th>
                                                <th>Order Id</th>
                                                <th>Qty</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Amount</th>
                                                <th>Order Status</th>
                                              
                                                <th>Order Date</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
										@foreach($records as $val)
                 
                                          
                                            <tr class="btn-reveal-trigger">
											<td class="py-2">{{$loop->index + 1}}</td>
                                                <td class="py-2">{{$val->orderid}}</td>
                                                <td class="py-2">{{$val->quantity}}</td>
                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalBudget}}</td>

                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalPurchased}}</td>                                              
                     
												<td>
													<span class="badge bg-success">Approved</span>
													<!-- <span class="badge bg-warning">Pending</span>
													<span class="badge bg-danger">Rejected</span> -->
												</td>
												<td class="py-2">
                                                    {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}</td>
												<td>
                                                    <a href="/librarian/dispatch-magazine-list/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>
													<!-- <a href="#"><i class="fa fa-trash p-2"></i></a>
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