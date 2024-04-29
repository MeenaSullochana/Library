
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
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">
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
				<div class="row gx-0">
					<div class="col-xl-12">
						<div class="card h-auto">
							<div class="card-body p-0">
								<div class="row gx-0">
									<!-- column -->
									<div class="col-xl-2 col-xxl-3 col-lg-3">
										<div class="email-left-box dz-scroll pt-3 ps-0" id="email-left">
											<div class="mail-list rounded ">
												<a href="/admin/magazinebudget_add" class="list-group-item">
													<i class="fa-regular fa-envelope align-middle"></i>Create Library
                                                    Magazine Budget </a>
												<a href="/admin/magazinebudget_list" class="list-group-item ">
													<i class="fa-regular fa-paper-plane align-middle"></i>Library
                                                    Magazine Budget List</a>
													<a class="list-group-item active">
													<i class="fa-regular fa-paper-plane align-middle"></i>Library
                                                    Magazine Budget View</a>
											</div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-xl-10 col-xxl-9">
										<div class="email-right-box">
											<div role="toolbar" class="toolbar ms-1 ms-sm-0">
												<div class="saprat ps-3">
													<div class="mail-tools ms-0">
														<!-- <a href="javascrip:void(0);"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.1667 25.5C18.4098 25.5 18.6429 25.4035 18.8148 25.2316C18.9868 25.0596 19.0833 24.8265 19.0833 24.5834V19.0834C19.0833 18.8403 18.9868 18.6071 18.8148 18.4352C18.6429 18.2633 18.4098 18.1667 18.1667 18.1667C17.9236 18.1667 17.6904 18.2633 17.5185 18.4352C17.3466 18.6071 17.25 18.8403 17.25 19.0834V24.5834C17.25 24.8265 17.3466 25.0596 17.5185 25.2316C17.6904 25.4035 17.9236 25.5 18.1667 25.5ZM27.3333 14.5H23.6667V13.5834C23.6667 12.854 23.3769 12.1546 22.8612 11.6388C22.3455 11.1231 21.646 10.8334 20.9167 10.8334H19.0833C18.354 10.8334 17.6545 11.1231 17.1388 11.6388C16.6231 12.1546 16.3333 12.854 16.3333 13.5834V14.5H12.6667C12.4236 14.5 12.1904 14.5966 12.0185 14.7685C11.8466 14.9404 11.75 15.1736 11.75 15.4167C11.75 15.6598 11.8466 15.893 12.0185 16.0649C12.1904 16.2368 12.4236 16.3334 12.6667 16.3334H13.5833V26.4167C13.5833 27.1461 13.8731 27.8455 14.3888 28.3612C14.9045 28.877 15.604 29.1667 16.3333 29.1667H23.6667C24.396 29.1667 25.0955 28.877 25.6112 28.3612C26.1269 27.8455 26.4167 27.1461 26.4167 26.4167V16.3334H27.3333C27.5764 16.3334 27.8096 16.2368 27.9815 16.0649C28.1534 15.893 28.25 15.6598 28.25 15.4167C28.25 15.1736 28.1534 14.9404 27.9815 14.7685C27.8096 14.5966 27.5764 14.5 27.3333 14.5ZM18.1667 13.5834C18.1667 13.3403 18.2632 13.1071 18.4352 12.9352C18.6071 12.7633 18.8402 12.6667 19.0833 12.6667H20.9167C21.1598 12.6667 21.3929 12.7633 21.5648 12.9352C21.7368 13.1071 21.8333 13.3403 21.8333 13.5834V14.5H18.1667V13.5834ZM24.5833 26.4167C24.5833 26.6598 24.4868 26.893 24.3148 27.0649C24.1429 27.2368 23.9098 27.3334 23.6667 27.3334H16.3333C16.0902 27.3334 15.8571 27.2368 15.6852 27.0649C15.5132 26.893 15.4167 26.6598 15.4167 26.4167V16.3334H24.5833V26.4167ZM21.8333 25.5C22.0764 25.5 22.3096 25.4035 22.4815 25.2316C22.6534 25.0596 22.75 24.8265 22.75 24.5834V19.0834C22.75 18.8403 22.6534 18.6071 22.4815 18.4352C22.3096 18.2633 22.0764 18.1667 21.8333 18.1667C21.5902 18.1667 21.3571 18.2633 21.1852 18.4352C21.0132 18.6071 20.9167 18.8403 20.9167 19.0834V24.5834C20.9167 24.8265 21.0132 25.0596 21.1852 25.2316C21.3571 25.4035 21.5902 25.5 21.8333 25.5Z" fill="var(--primary)"></path>
															</svg>
														</a>
														<a href="javascrip:void(0);"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M28.5435 17.7542L26.811 17.1767L27.6268 15.545C27.7095 15.3742 27.7372 15.182 27.706 14.9948C27.6748 14.8076 27.5863 14.6347 27.4527 14.5L25.5002 12.5475C25.3647 12.4119 25.1902 12.3222 25.0011 12.2909C24.812 12.2597 24.6179 12.2885 24.446 12.3733L22.8143 13.1892L22.2368 11.4567C22.1758 11.2761 22.0601 11.119 21.9056 11.0073C21.7512 10.8955 21.5658 10.8347 21.3752 10.8333H18.6252C18.433 10.8328 18.2455 10.8927 18.0893 11.0046C17.933 11.1165 17.8158 11.2746 17.7543 11.4567L17.1768 13.1892L15.5452 12.3733C15.3744 12.2906 15.1821 12.263 14.995 12.2942C14.8078 12.3254 14.6349 12.4139 14.5002 12.5475L12.5477 14.5C12.4121 14.6354 12.3224 14.81 12.2911 14.9991C12.2599 15.1882 12.2887 15.3823 12.3735 15.5542L13.1893 17.1858L11.4568 17.7633C11.2762 17.8243 11.1192 17.9401 11.0074 18.0945C10.8957 18.249 10.8349 18.4344 10.8335 18.625V21.375C10.833 21.5672 10.8929 21.7546 11.0048 21.9109C11.1166 22.0672 11.2748 22.1843 11.4568 22.2458L13.1893 22.8233L12.3735 24.455C12.2908 24.6258 12.2631 24.818 12.2943 25.0052C12.3255 25.1924 12.414 25.3653 12.5477 25.5L14.5002 27.4525C14.6356 27.5881 14.8102 27.6778 14.9992 27.709C15.1883 27.7403 15.3825 27.7115 15.5543 27.6267L17.186 26.8108L17.7635 28.5433C17.825 28.7254 17.9422 28.8835 18.0984 28.9954C18.2547 29.1072 18.4422 29.1672 18.6343 29.1667H21.3843C21.5765 29.1672 21.764 29.1072 21.9202 28.9954C22.0765 28.8835 22.1937 28.7254 22.2552 28.5433L22.8327 26.8108L24.4643 27.6267C24.634 27.7073 24.8244 27.7338 25.0097 27.7027C25.1949 27.6715 25.3662 27.5842 25.5002 27.4525L27.4527 25.5C27.5883 25.3645 27.678 25.19 27.7092 25.0009C27.7405 24.8118 27.7116 24.6177 27.6268 24.4458L26.811 22.8142L28.5435 22.2367C28.7241 22.1757 28.8812 22.0599 28.9929 21.9055C29.1046 21.751 29.1654 21.5656 29.1668 21.375V18.625C29.1673 18.4328 29.1074 18.2454 28.9956 18.0891C28.8837 17.9328 28.7256 17.8157 28.5435 17.7542ZM27.3335 20.715L26.2335 21.0817C25.9805 21.1637 25.7485 21.2998 25.5534 21.4805C25.3583 21.6612 25.2048 21.8822 25.1037 22.1281C25.0025 22.374 24.9561 22.639 24.9675 22.9047C24.979 23.1704 25.0482 23.4304 25.1702 23.6667L25.6927 24.7117L24.6843 25.72L23.6668 25.17C23.4318 25.0529 23.1743 24.9876 22.9118 24.9787C22.6493 24.9697 22.388 25.0173 22.1455 25.1181C21.9029 25.2189 21.6849 25.3707 21.5062 25.5631C21.3274 25.7555 21.1921 25.9841 21.1093 26.2333L20.7427 27.3333H19.2852L18.9185 26.2333C18.8364 25.9804 18.7004 25.7483 18.5197 25.5532C18.339 25.3581 18.118 25.2047 17.8721 25.1035C17.6261 25.0023 17.3611 24.9559 17.0955 24.9674C16.8298 24.9789 16.5698 25.048 16.3335 25.17L15.2885 25.6925L14.2802 24.6842L14.8302 23.6667C14.9522 23.4304 15.0213 23.1704 15.0328 22.9047C15.0443 22.639 14.9978 22.374 14.8967 22.1281C14.7955 21.8822 14.642 21.6612 14.4469 21.4805C14.2519 21.2998 14.0198 21.1637 13.7668 21.0817L12.6668 20.715V19.285L13.7668 18.9183C14.0198 18.8363 14.2519 18.7002 14.4469 18.5195C14.642 18.3388 14.7955 18.1178 14.8967 17.8719C14.9978 17.626 15.0443 17.361 15.0328 17.0953C15.0213 16.8296 14.9522 16.5696 14.8302 16.3333L14.3077 15.3158L15.316 14.3075L16.3335 14.83C16.5698 14.952 16.8298 15.0211 17.0955 15.0326C17.3611 15.0441 17.6261 14.9977 17.8721 14.8965C18.118 14.7953 18.339 14.6419 18.5197 14.4468C18.7004 14.2517 18.8364 14.0196 18.9185 13.7667L19.2852 12.6667H20.7152L21.0818 13.7667C21.1639 14.0196 21.3 14.2517 21.4807 14.4468C21.6614 14.6419 21.8824 14.7953 22.1283 14.8965C22.3742 14.9977 22.6392 15.0441 22.9049 15.0326C23.1706 15.0211 23.4305 14.952 23.6668 14.83L24.7118 14.3075L25.7202 15.3158L25.1702 16.3333C25.053 16.5684 24.9878 16.8259 24.9789 17.0884C24.9699 17.3509 25.0174 17.6122 25.1183 17.8547C25.2191 18.0972 25.3709 18.3152 25.5633 18.494C25.7557 18.6727 25.9842 18.8081 26.2335 18.8908L27.3335 19.2575V20.715ZM20.0002 16.3333C19.275 16.3333 18.5661 16.5484 17.9631 16.9513C17.3601 17.3542 16.8901 17.9268 16.6126 18.5968C16.3351 19.2668 16.2625 20.0041 16.404 20.7153C16.5454 21.4266 16.8946 22.0799 17.4074 22.5927C17.9202 23.1055 18.5736 23.4547 19.2848 23.5962C19.9961 23.7377 20.7333 23.6651 21.4033 23.3876C22.0733 23.11 22.646 22.6401 23.0489 22.0371C23.4518 21.4341 23.6668 20.7252 23.6668 20C23.6668 19.0275 23.2805 18.0949 22.5929 17.4073C21.9053 16.7196 20.9726 16.3333 20.0002 16.3333ZM20.0002 21.8333C19.6376 21.8333 19.2831 21.7258 18.9816 21.5244C18.6801 21.3229 18.4451 21.0366 18.3064 20.7016C18.1676 20.3666 18.1313 19.998 18.2021 19.6423C18.2728 19.2867 18.4474 18.96 18.7038 18.7036C18.9602 18.4472 19.2869 18.2726 19.6425 18.2019C19.9981 18.1312 20.3668 18.1675 20.7018 18.3062C21.0367 18.445 21.3231 18.68 21.5245 18.9815C21.726 19.2829 21.8335 19.6374 21.8335 20C21.8335 20.4862 21.6403 20.9525 21.2965 21.2964C20.9527 21.6402 20.4864 21.8333 20.0002 21.8333Z" fill="var(--primary)"></path>
															</svg>
														</a>
														<a href="javascrip:void(0);"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
																<g clip-path="url(#clip0_725_283)">
																	<path d="M22.8101 19.5011C22.8101 19.1976 22.7503 18.897 22.6341 18.6167C22.518 18.3363 22.3478 18.0815 22.1332 17.8669C21.9186 17.6523 21.6638 17.4821 21.3834 17.3659C21.103 17.2498 20.8025 17.19 20.499 17.19C20.1955 17.19 19.895 17.2498 19.6146 17.3659C19.3342 17.4821 19.0795 17.6523 18.8649 17.8669C18.6503 18.0815 18.48 18.3363 18.3639 18.6167C18.2477 18.897 18.188 19.1976 18.188 19.5011C18.1881 20.114 18.4317 20.7018 18.8652 21.1351C19.2987 21.5684 19.8866 21.8117 20.4995 21.8116C21.1125 21.8114 21.7002 21.5678 22.1335 21.1343C22.5668 20.7008 22.8102 20.1129 22.8101 19.5L22.8101 19.5011ZM22.8101 12.1511C22.8101 11.8476 22.7503 11.5471 22.6341 11.2667C22.518 10.9863 22.3478 10.7315 22.1332 10.5169C21.9186 10.3023 21.6638 10.1321 21.3834 10.0159C21.103 9.89979 20.8025 9.84001 20.499 9.84001C20.1955 9.84001 19.895 9.89979 19.6146 10.0159C19.3342 10.1321 19.0795 10.3023 18.8649 10.5169C18.6503 10.7315 18.48 10.9863 18.3639 11.2667C18.2477 11.5471 18.188 11.8476 18.188 12.1511C18.1881 12.764 18.4317 13.3518 18.8652 13.7851C19.2987 14.2184 19.8866 14.4617 20.4995 14.4616C21.1125 14.4614 21.7002 14.2178 22.1335 13.7843C22.5668 13.3508 22.8102 12.7629 22.8101 12.15L22.8101 12.1511ZM22.8101 26.8511C22.8101 26.5476 22.7503 26.247 22.6341 25.9667C22.518 25.6863 22.3478 25.4315 22.1332 25.2169C21.9186 25.0023 21.6638 24.8321 21.3834 24.7159C21.103 24.5998 20.8025 24.54 20.499 24.54C20.1955 24.54 19.895 24.5998 19.6146 24.7159C19.3342 24.8321 19.0795 25.0023 18.8649 25.2169C18.6502 25.4315 18.48 25.6863 18.3639 25.9667C18.2477 26.247 18.188 26.5476 18.188 26.8511C18.1881 27.464 18.4317 28.0518 18.8652 28.4851C19.2987 28.9184 19.8866 29.1617 20.4995 29.1616C21.1125 29.1614 21.7002 28.9178 22.1335 28.4843C22.5668 28.0508 22.8102 27.4629 22.8101 26.85L22.8101 26.8511Z" fill="var(--primary)"></path>
																</g>
																<defs>
																	<clipPath id="clip0_725_283">
																		<rect width="21" height="21" fill="white" transform="translate(31 9) rotate(90)"></rect>
																	</clipPath>
																</defs>
															</svg>
														</a> -->
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="right-box-padding p-0">
														<div class="read-wapper dz-scroll" id="read-content">
															<div class="read-content">
																<div class="media pt-3 d-flex d-block justify-content-between">
																	<div class="clearfix mb-3 d-flex">
																		<img class="me-3 rounded" width="70" height="70" alt="image" src="{{asset("admin/AdminImage/".auth('admin')->user()->adminImage)}}">
																		<div class="media-body me-2">
																			<h5 class="text-primary mb-0 mt-1">{{auth('admin')->user()->name}}</h5>
																			<p class="mb-0">{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</p>
																		</div>
																	</div>
																	<div class="clearfix mb-3">
																		<!-- <a href="javascript:void(0);" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-trash"></i></a> -->
																	</div>
																</div>
																<hr>
																<div class="media mb-2 mt-3">
																	<div class="media-body"><span class="pull-end">{{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}</span>
																		<h5 class="my-1 text-primary">Subject</h5>
																		<p class="read-content-email">
																			To: {{$data->subject}}</p>
																	</div>
																</div>
																<div class="read-content-body">

																	<div class="card ms-2 p-2">
																		<h3 class="text-gray">Total Amount</h3>
																		<p class="fw-bold"><i class="fa fa-inr"></i> {{$data->totalAmount}}</p>
																	</div>
																	<h5 class="mb-2"><b>Description</b></h5>
							<p style="text-indent: 34px;" class="mb-2">
                            <?php echo $desc; ?>
							</p>
							<h5 class="pt-3">By Order</h5>
							<p style="text-indent: 34px;">
								For Director of Public Libraries
							<hr>
																	<h3 class="text-gray">Category Amount</h3>
																	<section class="cart-item-leval text-center">
																		<div class="container">
																			<div class="row align-items-center">
																				{{-- @foreach($data->CategorieAmount1 as $val)
																				<div class="item col-md-4">
																					<p>{{$val->name}}</p>
																					<div class="pie animate no-round" style="--p:{{round($val->amount/$data->totalAmount*100)}}">{{round($val->amount/$data->totalAmount*100)}} %</div>
																					<p clas="fw-bold">Rs{{$val->amount}}</p>
																				</div>
																				@endforeach --}}
																				@foreach($data->CategorieAmount1 as $val)
																				<div class="col-xl-4 col-xxl-4 col-sm-6">
																					<div class="card">
																						<div style="justify-content: space-around !important;"	 class="card-header">
																							<h4 class="card-title ca-name" >{{ $val->name }}</h4>
																						</div>
																						<div class="card-body text-center">
																							<div class="pie animate no-round" style="--p:{{round($val->amount/$data->totalAmount*100)}}">{{round($val->amount/$data->totalAmount*100)}} %</div>
																							<p clas="fw-bold text-center"><i class="fa fa-inr" aria-hidden="true"></i>
																								<b>{{ $val->amount }}</b></p>
																						</div>
																					</div>
																				</div>
																				@endforeach
																				<!-- <div class="item col-md-4">
																					<p>Children</p>
																					<div class="pie" style="--p:40;--c:darkblue;--b:10px"> 40%</div>
																					<p clas="fw-bold">Rs 100000</p>
																				</div>
																				<div class="item col-md-4">
																					<p>Children</p>
																					<div class="pie no-round" style="--p:60;--c:purple;--b:15px"> 60%</div>
																					<p clas="fw-bold">Rs 100000</p>
																				</div>
																				<div class="item col-md-4">
																					<p>Children</p>
																					<div class="pie animate no-round" style="--p:80;--c:orange;"> 80%</div>
																					<p clas="fw-bold">Rs 100000</p>
																				</div>
																				<div class="item col-md-4">
																					<p>Children</p>
																					<div class="pie animate no-round" style="--p:60;--c:red;"> 60%</div>
																					<p clas="fw-bold">Rs 100000</p>
																				</div>
																				<div class="item col-md-4">
																					<p>Children</p>
																					<div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>
																					<p clas="fw-bold">Rs 100000</p>
																				</div> -->
																			</div>
																		</div>
																	</section>
																
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
		radial-gradient(farthest-side, var(--c) 98%, #0000) top / var(--b) var(--b) no-repeat, conic-gradient(var(--c) calc(var(--p)* 1%), #12121224 0);
		-webkit-mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
		mask: radial-gradient(farthest-side, #0000 calc(99% - var(--b)), #000 calc(100% - var(--b)));
	}

	.pie:after {
		inset: calc(50% - var(--b)/2);
		background: var(--c);
		transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
	}
	.read-wapper {
    height: 100%;
    padding: 0 1.25rem;
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
