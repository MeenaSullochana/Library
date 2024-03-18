
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
				<div class="row gx-0">
					<div class="col-xl-12">
						<div class="card h-auto">
							<div class="card-body p-0">
								<div class="row gx-0">
									<!-- column -->
									<div class="col-xl-2 col-xxl-3 col-lg-3">
										<div class="email-left-box dz-scroll pt-3 ps-0" id="email-left">
											<div class="mail-list rounded ">

													<a class="list-group-item active">
													<i class="fa-regular fa-paper-plane align-middle"></i>Order Scheme View</a>
											</div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-xl-10 col-xxl-9">
										<div class="email-right-box">
											<div role="toolbar" class="toolbar ms-1 ms-sm-0">
												<div class="saprat ps-3">
													<div class="mail-tools ms-0">

													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="right-box-padding p-0">
														<div class="read-wapper dz-scroll" id="read-content">
															<div class="read-content">
																<div class="media pt-3 d-sm-flex d-block justify-content-between">
																	<div class="clearfix mb-3 d-flex">
																		<img class="me-3 rounded" width="70" height="70" alt="image" src="{{asset("admin/AdminImage/".$data->admindata->adminImage)}}">
																		<div class="media-body me-2">
																			<h5 class="text-primary mb-0 mt-1">{{$data->admindata->name}}</h5>
																			<p class="mb-0">{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</p>
																		</div>
																	</div>
																	<div class="clearfix mb-3">

																	</div>
																</div>
																<hr>
																<div class="media mb-2 mt-3">
																	<div class="media-body"><span class="pull-end">{{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}</span>
																		<h5 class="my-1 text-primary">Subject Content Here....</h5>
																		<p class="read-content-email">
																			To: {{$data->subject}}</p>
																	</div>
																</div>
																<div class="read-content-body">

																	<div class="card ms-2">
																		<h3 class="text-gray">Total Amount</h3>
																		<p class="fw-bold">Rs {{$data->totalAmount}}</p>
																	</div>
																	<h3 class="text-gray">Categorie Amount</h3>
																	<section class="cart-item-leval text-center">
																		<div class="container">
																			<div class="row align-items-center">
																				@foreach($data->CategorieAmount1 as $val)
																				<div class="item col-md-4">
																					<p>{{$val->name}}</p>
																					<div class="pie animate no-round" style="--p:{{round($val->amount/$data->totalAmount*100)}}">{{round($val->amount/$data->totalAmount*100)}} %</div>
																					<p clas="fw-bold">Rs{{$val->amount}}</p>
																				</div>
																				@endforeach

																			</div>
																		</div>
																	</section>
																	<p class="mb-2"><strong>Description</strong>
																	<p class="mb-2">{{$data->description}}
																	</p>
																	<h5 class="pt-3">Kind Regards</h5>
																	<p>Mr {{$data->admindata->name}}</p>
																	<hr>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
	.email-left-box {
    	height: calc(61vh - 160px) !important;
	}
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
        .active-projects.style-1 .dt-buttons .dt-button {
        top: -50px;
        right: 0 !important;
    }

    .active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>

</html>


