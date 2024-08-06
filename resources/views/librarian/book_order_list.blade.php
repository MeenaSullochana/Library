
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
										<h3 class="text-info count text-start">Books  Order List</h3>
										<!-- <span class="text-start">Total Completed</span> -->
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
                         
                                @php
                                    $id = auth('librarian')->user()->id;
                                      $records = DB::table('orderbooks')
                                        ->where('librarianid', '=', $id)
                                          ->where('status', '=', '1')
                                         ->orderBy('created_at', 'asc')
                                         ->get();
                                      
                                @endphp


                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                                <!-- <th class=" pe-3">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th> -->
                                                <th>S.No</th>
                                                <th>Order Id</th>
                                                <th>Qty</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Amount</th>
                                                <th>Order Status</th>
                                                <th>Order Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                       @foreach($records as $val)

                                            <tr class="btn-reveal-trigger">
                                                <!-- <td class="py-2">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkbox1">
                                                        <label class="form-check-label" for="checkbox1"></label>
                                                    </div>
                                                </td> -->
                                                <td class="py-2">{{$loop->index + 1}}</td>
                                                <td class="py-2">{{$val->orderid}}</td>
                                                <td class="py-2">{{$val->quantity}}</td>
                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalBudget}}</td>

                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalPurchased}}</td>
                                                <td class="py-2"> <span class="badge bg-primary">Submitted</span></td>
                                                <td class="py-2"> {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}</td>
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
                                                                <a class="dropdown-item" href="/librarian/book_order_view/{{$val->id}}"><i class="fa fa-eye p-2"></i>View Order</a>
                                                                <!-- <a class="dropdown-item" href="/librarian/magazine_invoice_view/{{$val->id}}"><i class="fa fa-pencil p-2"></i> View Order Invoice</a> -->
                                                                <!-- <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="magazine_delete"><i class="fa fa-trash p-2"></i>Delete</a></div> -->
                                                        </div>
                                                    </div>
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
