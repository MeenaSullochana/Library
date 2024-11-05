
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
	<title>Government of Tamil Nadu - Book Procurement - Review Book List</title>

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
                           <b>Maximum Review Reached Books List</b>
                        </h3>
                        {{-- <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                        <i class="fas fa-home"></i> Home</a> --}}
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
									<div class="col-xl-4 col-sm-6 col-12">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-primary count">{{$totalreview}}</h2>
												<span>Total Review Book</span>
											</div>
											<p>Review Book</p>
										</div>
									</div>
									<div class="col-xl-4 col-sm-6 col-12">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-purple count">{{$pendingreview}}</h2>
												<span>On Going Review</span>
											</div>
											<p>Current Review</p>
										</div>
									</div>
									@if(auth('reviewer')->user()->reviewerType == "public" || auth('reviewer')->user()->reviewerType == "internal" )
									<div class="col-xl-4 col-sm-6 col-12">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-purple count">{{$recordcont}}</h2>
												<span>Hold Review</span>
											</div>
											<p>Maximum  Review Reached</p>
										</div>
									</div>
									@endif
									<div class="col-xl-4 col-sm-6 col-12">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-warning count">{{$completedreview}}</h2>
												<span>Completed Review</span>
											</div>
											<p>Completed</p>
										</div>
									</div>
									{{-- <div class="col-xl-2 col-sm-4 col-6">
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
									</div> --}}
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects task-table">
									{{-- <div class="tbl-caption">
										<h4 class="heading mb-0"><i class="fa fa-trash p-2" aria-hidden="true"></i></h4>
									</div> --}}
									<table id="example3" class="table">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Book No</th>
												<th>Book Title</th>
												<th>Subject</th>
												<th>Category</th>
												<th>ISBN</th>
												<th>Assign Date</th>
											
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
										
											@foreach($data as $key=>$val)
										
										
											<tr>

												<td data-label="S/No">{{$loop->index+1}}</td>
												<td data-label="Book No"><span>{{$val->book->product_code}}</span></td>
												<td style="white-space:normal;" data-label="Book Title">
												<a href="/reviewer/book_view/{{$val->book->id}}/{{$val->id}}"> 
												<h6>{{$val->book->book_title}}</h6> </a>
															<!-- <span>INV-100023456</span> -->
													</div>
												</td>

												<td data-label="isbn">
													<span>{{ $val->book->subject }}</span>
												</td>
												<td data-label="isbn">
													<span>{{ $val->book->category }}</span>
												</td>
												<td data-label="isbn">
													<span>{{ $val->book->isbn }}</span>
												</td>
												<td data-label="Date">
													<span>{{ \Carbon\Carbon::parse($val->created_at)->format('d-m-Y') }}</span>
												</td>
											
											 
										
												<td data-label="Control">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#bookReviewModal">
														<i class="fa fa-eye p-2" style="color: red;"></i>
													</a>
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

	<div class="modal fade" id="bookReviewModal" tabindex="-1" aria-labelledby="bookReviewModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="bookReviewModalLabel">Book Review Details</h5>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <!-- Content of the modal goes here -->
			  <!-- For example, you can load dynamic content here using PHP or JavaScript -->
			  <p>இந்த நூல் குறைந்த பட்ச மதிப்பீடுகளைப் பெற்றுள்ளது. மேலும் பல நூல்கள் மதிப்பீடு செய்ய வேண்டி இருப்பதால் பிற நூல்களை மதிப்பீடு செய்யவும் நன்றி..</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		  </div>
		</div>
	  </div>

    <!--**********************************
        Main wrapper end
    ***********************************-->
	<?php
        include "reviewer/plugin/plugin_js.php";
    ?>
</body>
</html>

<style>
        .active-projects.style-1 .dt-buttons .dt-button {
        top: -50px;
        right: 0 !important;
    }

    .active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>