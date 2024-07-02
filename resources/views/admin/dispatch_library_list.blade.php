
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
                    <div class="col-xl-12 col-sm-12">
                        <div class="card box-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box icon-box-lg bg-success-light rounded-circle">
                                        <i class="bi bi-book" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="total-projects ms-3">
                                        <h3 class="text-success count text-start">Library List</h3>
                                        <!-- <span class="text-start">Magazine Name-<b>Frequency</b></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                    <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Library Types</label>
                                        <select name="LibraryTypes_filter" id="LibraryTypes_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Library Type</option>
                                            @php
                                            $categori = DB::table('library_types')->get();
                                            @endphp
                                            @foreach($categori as $val)
                                            <option value="{{$val->name}}">{{$val->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                <div class="row">
                    <div class="row">
                        <!-- <div class="col-md-6 filter-elecment-one">
                            <select name="" id="" class="form-select bg-white p-3">
                                <option>Name Of Library</option>
                            </select>
                        </div> -->
                        <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
                                <!-- <input type="date" class="form-control m-2" name="from-date"> -->
                                <!-- <input type="date" class="form-control m-2" name="from-date">
                                <input type="button" class="btn btn-danger m-2" name="from-date" value="Check Now "> -->
                            </div>
                        </div>
                    </div>
                </div>
                @php
                                $records = DB::table('ordermagazines')
                                ->where('status', '=', '0')
                                ->orderBy('created_at', 'asc')
                                ->get();

                                @endphp

                <!--End Total Leval For Buy item -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-3">
                            <div class="table-responsive active-projects task-table">
								
                                <table id="example3" class="table">
                                        <thead>
                                            <tr>

                                                <th>S.No</th>
                                                <th>Library Id</th>
                                                <th>Library Type</th>
                                                <th>Library Name</th>

                                                <th>District</th>
                                                <th>Contack Number</th>
                                                <th>Order Id</th>
                                                <th>Qty</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Amount</th>
                                                <th>Order Status</th>
                                                <th>Order Date</th>
                                                <!-- <th>Readers Forum</th> -->
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            @foreach($records as $val)
                                            @php

                                            $librarians = DB::table('librarians')
                                            ->where('librarianId', '=', $val->libraryid)
                                            ->first();
                                            @endphp
                                         
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">{{$loop->index + 1}}</td>
                                                <td class="py-2">{{$val->libraryid}}</td>
                                                <td class="py-2">{{$val->libraryType}}</td>
                                                <td class="py-2">{{ $librarians->libraryName ?? '' }}</td>
                                                <td class="py-2">{{ $librarians->district ?? '' }}</td>
                                                <td class="py-2">{{$librarians->phoneNumber}}</td>
                                                <td class="py-2">{{$val->orderid}}</td>
                                                <td class="py-2">{{$val->quantity}}</td>
                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalBudget}}</td>

                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalPurchased}}
                                                </td>
                                                <td class="py-2"> <span class="badge bg-primary">Processing</span></td>
                                                <td class="py-2">
                                                    {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}</td>
                                                    <td>
                                                    <a href="/admin/order-library-item-list/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>

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
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#example3').DataTable();

        // Function to handle category filter
        function filterCategory(libraryType) {
            if (libraryType === "") {
                table.column(2).search("").draw();
            } else {
                table.column(2).search(libraryType).draw();
            }
        }

        // Call filterCategory function on change event of the select element
        $('#LibraryTypes_filter').on('change', function() {
            var libraryType = $(this).val();
            filterCategory(libraryType);
        });

      
    });
    </script>

</html>