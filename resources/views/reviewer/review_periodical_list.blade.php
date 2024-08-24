
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
	<title>Government of Tamil Nadu - Book Procurement - Review Periodical List</title>

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
                           <b>All Review Periodicals List</b>
                        </h3>
                      
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
												<span>Total Review Periodical</span>
											</div>
											<p>Review Periodical</p>
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
									<div class="col-xl-4 col-sm-6 col-12">
										<div class="task-summary">
											<div class="d-flex align-items-baseline">
												<h2 class="text-warning count">{{$completedreview}}</h2>
												<span>Completed Review</span>
											</div>
											<p>Completed</p>
										</div>
									</div>
				
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects task-table">
							
									<table id="example3" class="table">
										<thead>
											<tr>
												<th>S.No</th>
												
												<th>Periodical Title</th>
                                                <th>Periodicity</th>
												<th>RNI Dedails</th>
												<th>Category</th>
											
												<th>Assign Date</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data as $key=>$val)
											<tr>

												<td data-label="S/No">{{$loop->index+1}}</td>
												<td style="white-space:normal;" data-label="periodical Title">
												<a href="/reviewer/magazine_view/{{$val->periodical->id}}/{{$val->id}}"> 
												<h6>{{$val->periodical->title}}</h6> </a>
															<!-- <span>INV-100023456</span> -->
													</div>
												</td>
												<td data-label="Book No"><span>{{$val->periodical->periodicity}}</span></td>

												<td data-label="isbn">
													<span>{{ $val->periodical->rni_details }}</span>
												</td>
												<td data-label="isbn">
													<span>{{ $val->periodical->category }}</span>
												</td>
											
												<td data-label="Date">
													<span>{{ $val->created_at->format('d-m-Y') }}</span>
												</td>

												<td data-label="Control">
											<a href="/reviewer/magazine_view/{{$val->periodical->id}}/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>


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
