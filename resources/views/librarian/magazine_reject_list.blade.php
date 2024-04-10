
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Library Cancelled Orders</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item card">
                        <h2 class="accordion-header p-0 m-0 bg-white" id="headingOne">
                            <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="cpa">
									<i class="fa-sharp fa-solid fa-filter me-2"></i>Order Filter
								</div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">From Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">To Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
											<label class="form-label">Frequency</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">monhly</option>
                                                <option value="English">Year</option>
                                            </select>
										</div>
										<div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
											<label class="form-label">languvage</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">Tamil</option>
                                                <option value="English">English</option>
                                            </select>
										</div>
                                    </div>
									<div class="row">
										
                                        <div class="col-xl-3 col-sm-6 align-self-end mt-2">
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

                </div> -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <!-- <div class="d-flex justify-content-between align-items-end">
                                    <h6>Export Option</h6>
                                    <button type="button" class="btn btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
                                    </span>Add order</button>
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
                                        <button type="button" class="btn  btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><span
                                            class="btn-icon-start text-warning"><i class="fa fa-trash-o color-warning"></i>
                                        </span>Delete</button> 

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
                                </div> -->
                                {{-- <hr> --}}
                                @php
                                    $id = auth('librarian')->user()->id;
                                      $records = DB::table('ordermagazines')
                                        ->where('librarianid', '=', $id)
                                          ->where('status', '=', '2')
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
                                                <td class="py-2"> <span class="badge bg-primary">Cancelled</span></td>
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
                                                                <a class="dropdown-item" href="/librarian/magazine_order_view/{{$val->id}}"><i class="fa fa-eye p-2"></i>View Order</a>
                                                                <a class="dropdown-item" href="/librarian/magazine_invoice_view/{{$val->id}}"><i class="fa fa-pencil p-2"></i> View Order Invoice</a>
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
    <style>
        .modal-confirm {
      color: #636363;
      width: 400px;
    }
    .modal-confirm .modal-content {
      padding: 20px;
      border-radius: 5px;
      border: none;
      text-align: center;
      font-size: 14px;
    }
    .modal-confirm .modal-header {
      border-bottom: none;
      position: relative;
    }
    .modal-confirm h4 {
      text-align: center;
      font-size: 26px;
      margin: 30px 0 -10px;
    }
    .modal-confirm .close {
      position: absolute;
      top: -5px;
      right: -2px;
    }
    .modal-confirm .modal-body {
      color: #999;
    }
    .modal-confirm .modal-footer {
      border: none;
      text-align: center;
      border-radius: 5px;
      font-size: 13px;
      padding: 10px 15px 25px;
    }
    .modal-confirm .modal-footer a {
      color: #999;
    }
    .modal-confirm .icon-box {
      width: 80px;
      height: 80px;
      margin: 0 auto;
      border-radius: 50%;
      z-index: 9;
      text-align: center;
      border: 3px solid #f15e5e;
    }
    .modal-confirm .icon-box i {
      color: #f15e5e;
      font-size: 46px;
      display: inline-block;
      margin-top: 13px;
    }
    .modal-confirm .btn {
      color: #fff;
      border-radius: 4px;
      background: #60c7c1;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      min-width: 120px;
      border: none;
      min-height: 40px;
      border-radius: 3px;
      margin: 0 5px;
      outline: none !important;
    }
    .modal-confirm .btn-info {
      background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
      background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
      background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
      background: #ee3535;
    }
    .trigger-btn {
      display: inline-block;
      margin: 100px auto;
    }
    
    </style>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-exclamation"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
              </div>
              <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
      </div>
</body>
</html>
