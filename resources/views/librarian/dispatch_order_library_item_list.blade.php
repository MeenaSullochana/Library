
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
                                        <h3 class="text-success count text-start">Order magazine List</h3>
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
                                <label class="form-label">Select Category</label>
                                <select name="category_filter" id="category_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Category</option>
                                    @php
                                    $categori = DB::table('magazine_categories')->orderBy('created_at','ASC')->get();
                                    @endphp
                                    @foreach($categori as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select language</label>
                                <select name="language_filter" id="language_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Record</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                      
                    </div>
                </div>
                <!--End Total Leval For Buy item -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="table-responsive active-projects task-table">
                                <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title of the Periodical</th>
                                                <th>Language</th>
                                                <th>Category</th>
                                              
                                                <th>Periodicity</th>
                                                <th>price</th>
                                                <th>Total Order Qty</th>
                                                <th>Received Qty</th>
												<th>Not Received Qty</th>
												<th>Not Arrived Qty</th>
                                                <th>Status</th>
												<th>Control</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            @foreach($data as $val1)
                                            <tr class="btn-reveal-trigger">
                                            <td class="py-2">{{ $loop->index + 1}}</td>
                                            <td class="py-2">  <a href="/librarian/dispatch_magazine_view/{{$val1->id}}/{{$val1->orderid}}"> {{ $val1->title}} </a></td>
                                               
                                                <td class="py-2">{{$val1->language}}</td>
                                                <td class="py-2">{{$val1->category}}</td>
                                               
                                                <td class="py-2">{{$val1->periodicity}}</td>
                                                <td class="py-2">{{ $val1->annual_cost_after_discount}}</td>
                                                <td><span>{{$val1->totalorder}}</span></td>
                                                <td><span>{{$val1->recived}}</span></td>
											
												<td><span>{{$val1->notrecived}}</span></td>
												<td><span>{{$val1->totalorder   -$val1->recived -$val1->notrecived }}</span></td>
                                                @if($val1->totalorder  == $val1->recived)
											   <td>
													<!-- <span class="badge bg-success">Approved</span> -->
													<span class="badge bg-success">Completed</span>
													<!-- <span class="badge bg-danger">Cencelled</span> -->
												</td>
											   @else
											   <td>
													<!-- <span class="badge bg-success">Approved</span> -->
													<span class="badge bg-danger">Pending</span>
													<!-- <span class="badge bg-danger">Cencelled</span> -->
												</td>
											   @endif
												<td>
                                                    <a href="/librarian/dispatch_magazine_view/{{$val1->id}}/{{$val1->orderid}}"> <i class="fa fa-eye p-2"></i></a>
													<!-- <a href="#"><i class="fa fa-edit p-2"></i></a>
													<i class="fa fa-trash-o p-2" aria-hidden="true"></i> -->
												</td>
                                        
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

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#example3').DataTable();

    // Function to handle category filter
    function filterCategory(category) {
        if (category === "") {
            table.column(3).search("").draw();
        } else {
            table.column(3).search(category).draw();
        }
    }

    // Call filterCategory function on change event of the select element
    $('#category_filter').on('change', function() {
        var category = $(this).val();
        filterCategory(category);
    });

    // Function to handle language filter
    function filterLanguage(language) {
        if (language === "") {
            // If language filter is empty, reset table to show all records
            table.column(2).search(language).draw();
        } else {
            // Apply language filter (assuming Language is in column index 2)
            table.column(2).search(language).draw();
        }
    }

    // Call filterLanguage function on change event of the language filter
    $('#language_filter').on('change', function() {
        var language = $(this).val();
        filterLanguage(language);
    });
});
</script>
</html>