
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="noindex, nofollow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- PAGE TITLE HERE -->
	<title>Government of Tamil Nadu - Book Procurement </title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">

	<link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
	<link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
	<link href="/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

	<!-- tagify-css -->
	<link href="/vendor/tagify/dist/tagify.css" rel="stylesheet">

	<!-- Style css -->
	<link href="{{asset('reviewer/css/style.css')}}" rel="stylesheet">

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
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-success-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9715 29.3168C15.7197 29.3168 9.52686 30.4132 9.52686 34.8043C9.52686 39.1953 15.6804 40.331 22.9715 40.331C30.2233 40.331 36.4144 39.2328 36.4144 34.8435C36.4144 30.4543 30.2626 29.3168 22.9715 29.3168Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9714 23.0537C27.7304 23.0537 31.5875 19.1948 31.5875 14.4359C31.5875 9.67694 27.7304 5.81979 22.9714 5.81979C18.2125 5.81979 14.3536 9.67694 14.3536 14.4359C14.3375 19.1787 18.1696 23.0377 22.9107 23.0537H22.9714Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$record1 = DB::table('book_review_statuses')->where('reviewer_id', $id)->count();
									@endphp
										<h3 class="text-success count">{{$record1}}</h3>
										<span>Total Book</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-primary-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M32.8961 26.5849C34.1612 26.5849 35.223 27.629 35.0296 28.8783C33.8947 36.2283 27.6026 41.6855 20.0138 41.6855C11.6178 41.6855 4.8125 34.8803 4.8125 26.4862C4.8125 19.5704 10.0664 13.1283 15.9816 11.6717C17.2526 11.3579 18.5553 12.252 18.5553 13.5605C18.5553 22.4263 18.8533 24.7197 20.5368 25.9671C22.2204 27.2145 24.2 26.5849 32.8961 26.5849Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M41.1733 19.2019C41.2739 13.5059 34.2772 4.32428 25.7509 4.48217C25.0877 4.49402 24.5568 5.04665 24.5272 5.70783C24.3121 10.3914 24.6022 16.4605 24.764 19.2118C24.8134 20.0684 25.4864 20.7414 26.341 20.7907C29.1693 20.9526 35.4594 21.1736 40.0759 20.4749C40.7035 20.3802 41.1634 19.8355 41.1733 19.2019Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>

									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$record2 = DB::table('book_review_statuses')->where('reviewer_id', $id)->where('remark', null)->count();
									@endphp
										<h3 class="text-primary count">{{$record2}}</h3>
										<span>Total In Progress</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-purple-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9717 41.0539C22.9717 41.0539 37.3567 36.6983 37.3567 24.6908C37.3567 12.6814 37.878 11.7439 36.723 10.5889C35.5699 9.43391 24.858 5.69891 22.9717 5.69891C21.0855 5.69891 10.3736 9.43391 9.21863 10.5889C8.0655 11.7439 8.58675 12.6814 8.58675 24.6908C8.58675 36.6983 22.9717 41.0539 22.9717 41.0539Z" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M26.4945 26.4642L19.4482 19.4179" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M19.4487 26.4642L26.495 19.4179" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$record3 = DB::table('book_review_statuses')->where('reviewer_id', $id)->where('remark','!=', null)->count();
									@endphp
										<h3 class="text-purple count">{{$record3}}</h3>
										<span>Total Completed</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@if( auth('reviewer')->user()->reviewerType == "internal")
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-success-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9715 29.3168C15.7197 29.3168 9.52686 30.4132 9.52686 34.8043C9.52686 39.1953 15.6804 40.331 22.9715 40.331C30.2233 40.331 36.4144 39.2328 36.4144 34.8435C36.4144 30.4543 30.2626 29.3168 22.9715 29.3168Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9714 23.0537C27.7304 23.0537 31.5875 19.1948 31.5875 14.4359C31.5875 9.67694 27.7304 5.81979 22.9714 5.81979C18.2125 5.81979 14.3536 9.67694 14.3536 14.4359C14.3375 19.1787 18.1696 23.0377 22.9107 23.0537H22.9714Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$rec = DB::table('reviewer')->where('creater', $id)->count();
									@endphp
										<h3 class="text-success count">{{$rec}}</h3>
										<span>Total Public Reviewer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-primary-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M32.8961 26.5849C34.1612 26.5849 35.223 27.629 35.0296 28.8783C33.8947 36.2283 27.6026 41.6855 20.0138 41.6855C11.6178 41.6855 4.8125 34.8803 4.8125 26.4862C4.8125 19.5704 10.0664 13.1283 15.9816 11.6717C17.2526 11.3579 18.5553 12.252 18.5553 13.5605C18.5553 22.4263 18.8533 24.7197 20.5368 25.9671C22.2204 27.2145 24.2 26.5849 32.8961 26.5849Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M41.1733 19.2019C41.2739 13.5059 34.2772 4.32428 25.7509 4.48217C25.0877 4.49402 24.5568 5.04665 24.5272 5.70783C24.3121 10.3914 24.6022 16.4605 24.764 19.2118C24.8134 20.0684 25.4864 20.7414 26.341 20.7907C29.1693 20.9526 35.4594 21.1736 40.0759 20.4749C40.7035 20.3802 41.1634 19.8355 41.1733 19.2019Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>

									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$rec1 = DB::table('reviewer')->where('creater', $id)->where('status', 1)->count();
									@endphp
										<h3 class="text-primary count">{{$rec1}}</h3>
										<span>Total Active Reviewer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-purple-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9717 41.0539C22.9717 41.0539 37.3567 36.6983 37.3567 24.6908C37.3567 12.6814 37.878 11.7439 36.723 10.5889C35.5699 9.43391 24.858 5.69891 22.9717 5.69891C21.0855 5.69891 10.3736 9.43391 9.21863 10.5889C8.0655 11.7439 8.58675 12.6814 8.58675 24.6908C8.58675 36.6983 22.9717 41.0539 22.9717 41.0539Z" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M26.4945 26.4642L19.4482 19.4179" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M19.4487 26.4642L26.495 19.4179" stroke="#BB6BD9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="total-projects ms-3">
									@php
										$id = auth('reviewer')->user()->id;
										$rec2 = DB::table('reviewer')->where('creater', $id)->where('status', 0)->count();
									@endphp
										<h3 class="text-purple count">{{$rec2}}</h3>
										<span>Total Inactive Reviewer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					<!-- <div class="col-xl-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between">
									<div class="icon-box icon-box-lg bg-danger-light rounded-circle">
										<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M34.0396 20.974C36.6552 20.6065 38.6689 18.364 38.6746 15.6471C38.6746 12.9696 36.7227 10.7496 34.1633 10.3296" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M37.4912 27.262C40.0243 27.6407 41.7925 28.5276 41.7925 30.3557C41.7925 31.6139 40.96 32.4314 39.6137 32.9451" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.7879 28.0373C16.7616 28.0373 11.6147 28.9504 11.6147 32.5973C11.6147 36.2423 16.7297 37.1817 22.7879 37.1817C28.8141 37.1817 33.9591 36.2779 33.9591 32.6292C33.9591 28.9804 28.846 28.0373 22.7879 28.0373Z" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M22.7876 22.8325C26.742 22.8325 29.9483 19.6281 29.9483 15.6719C29.9483 11.7175 26.742 8.51123 22.7876 8.51123C18.8333 8.51123 15.627 11.7175 15.627 15.6719C15.612 19.6131 18.7939 22.8194 22.7351 22.8325H22.7876Z" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M11.5344 20.974C8.91691 20.6065 6.90504 18.364 6.89941 15.6471C6.89941 12.9696 8.85129 10.7496 11.4107 10.3296" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M8.0825 27.262C5.54937 27.6407 3.78125 28.5276 3.78125 30.3557C3.78125 31.6139 4.61375 32.4314 5.96 32.9451" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="total-projects ms-3">
										<h3 class="text-danger count">5,855k</h3>
										<span>Total Not Started</span>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="col-xl-4 col-lg-5">
						<div class="card">
							<div class="card-header border-0">
								<h4 class="heading mb-0">Total Reviews</h4>
							</div>
							<div class="card-body py-0">
								<div id="redial"></div>
								<div class="text-center">
									<h5 class="mb-0">Total Amount Review made week</h5>
									<h4>$86</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
								</div>
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-sm-4 tg-base">
										<div class="card text-center">
											<div class="card-body p-2">
												<span class="mb-1 d-block">Target</span>
												<h4 class="mb-0"><i class="fa-solid fa-arrow-up me-1 text-success"></i>$15k</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-sm-4 tg-base">
										<div class="card text-center">
											<div class="card-body p-2">
												<span class="mb-1 d-block">Last week</span>
												<h4 class="mb-0"><i class="fa-solid fa-arrow-down me-1 text-danger"></i>$55k</h4>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-4 col-sm-4 tg-base">
										<div class="card text-center">
											<div class="card-body p-2">
												<span class="mb-1 d-block">Last Year</span>
												<h4 class="mb-0"><i class="fa-solid fa-arrow-up me-1 text-success"></i>$65k</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="col-xl-12 col-lg-7">
						<div class="row">
							<!-- <div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>456</h4>
												<h5>Review Rasdio</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(255, 97, 117)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/8</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 14.64466094067263 85.35533905932738 L 26.665476220843935 73.33452377915607 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(255, 97, 117)"></path>
														<path d="M 14.64466094067263 85.35533905932738 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 26.665476220843935 73.33452377915607" data-value="3" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>38%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>653</h4>
												<h5>Events</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/7</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(59, 215, 225)"></path>
														<path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="2" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>62%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>653</h4>
												<h5>Events</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/7</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(59, 215, 225)"></path>
														<path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="2" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>62%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">

										@php
										$id = auth('reviewer')->user()->id;
										$record = DB::table('book_review_statuses')->where('reviewer_id', $id)->count();
									@endphp
										<div>
												<h4>Total Books</h4>
												<h5>{{$record}}</h5>
											</div>
											<div>
											@php
											$total =2;
                                   $percentage = ($record / $total) * 100;

                                     @endphp

                                     <div class="d-inline-block position-relative donut-chart-sale mb-3">
                                        <span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1)&quot;], &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10 }" style="display: none;">{{ $record }}/{{ $total }}</span>
                                           <svg class="peity" height="100" width="100">
                                          <path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="{{ $record }}" fill="rgb(59, 215, 225)"></path>
                                         <path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="{{ $total - $record }}" fill="rgba(245, 245, 245, 1)"></path>
                                              </svg>

                                     <small>{{ $percentage }}%</small>
                                               </div>

											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>653</h4>
												<h5>Events</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/7</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(59, 215, 225)"></path>
														<path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="2" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>62%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>653</h4>
												<h5>Events</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/7</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(59, 215, 225)"></path>
														<path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="2" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>62%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="col-xl-4  col-lg-6 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="students1 d-flex align-items-center justify-content-between flex-wrap">
											<div>
												<h4>653</h4>
												<h5>Events</h5>
											</div>
											<div>
												<div class="d-inline-block position-relative donut-chart-sale mb-3">
													<span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(59, 215, 225)&quot;, &quot;rgba(245, 245, 245, 1&quot;],   &quot;innerRadius&quot;: 33, &quot;radius&quot;: 10}" style="display: none;">5/7</span><svg class="peity" height="100" width="100">
														<path d="M 50 0 A 50 50 0 1 1 1.2536043909088193 61.126046697815724 L 17.82737889799982 57.34319082055838 A 33 33 0 1 0 50 17" data-value="5" fill="rgb(59, 215, 225)"></path>
														<path d="M 1.2536043909088193 61.126046697815724 A 50 50 0 0 1 49.99999999999999 0 L 49.99999999999999 17 A 33 33 0 0 0 17.82737889799982 57.34319082055838" data-value="2" fill="rgba(245, 245, 245, 1"></path>
													</svg>
													<small>62%</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<!-- <div class="row">
							<div class="col-12">
							<div class="col-xl-6 col-lg-6  col-md-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<div class="clearfix">
											<h3 class="card-title">Glucose Rate</h3>
											<span>In the normal</span>
										</div>
										<div class="clearfix text-center">
											<h3 class="text-success mb-0">97</h3>
											<span>mg/dl</span>
										</div>
									</div>
									<div class="card-body text-center">
										<div class="ico-sparkline">
											<div id="sparkline8"><canvas width="331" height="50" style="display: inline-block; width: 331.25px; height: 50px; vertical-align: top;"></canvas></div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div> -->
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects">
									<div class="tbl-caption">
										<h4 class="heading mb-0">Active Review Books</h4>
									</div>
									<table id="example3" class="table">
										<thead>
											<tr>

												<th>Book Name</th>
												<th>Status</th>
												<th>Due Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										@php
										$id = auth('reviewer')->user()->id;
										$record = DB::table('book_review_statuses')->where('reviewer_id', $id)->where('review_type','=', null)->get();
									       @endphp

												  @foreach($record  as $val)
											<tr>
											@php
											$records = DB::table('books')->where('id', $val->book_id)->first();
											@endphp

												<td>
													<div class="d-flex align-items-center">
														<img src="{{ asset("Books/front/".$records->front_img) }}" class="avatar avatar-md rounded-circle" alt="">
														<p class="mb-0 ms-2">{{$records->book_title}}</p>
													</div>
												</td>


												<td class="pe-0">
													<span class="badge badge-primary light border-0">Inprogress</span>
												</td>
												<td>
													<span>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d') }}</span>
												</td>
												<td>
												<a href="/reviewer/book_view/{{$records->id}}/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-body p-3">
								<div class="table-responsive active-projects">
									<div class="tbl-caption">
										<h4 class="heading mb-0">Review Book History</h4>
									</div>
									<table id="example3" class="table">
										<thead>
											<tr>
												<th>Book Name</th>
												<th>Date</th>
												<th>Review Type</th>
												<th>Status</th>
												<!-- <th>Action</th> -->
											</tr>
										</thead>
										<tbody>
									@php
											$id = auth('reviewer')->user()->id;
											$record = DB::table('book_review_statuses')->where('reviewer_id', $id)->where('review_type','!=', null)->get();
										@endphp

												  @foreach($record  as $val)
											<tr>
											@php
											$records = DB::table('books')->where('id', $val->book_id)->first();
											@endphp
												<td>
												<div class="d-flex align-items-center">
														<img src="{{ asset("Books/front/".$records->front_img) }}" class="avatar avatar-md rounded-circle" alt="">
														<p class="mb-0 ms-2"> {{$records->book_title}} : {{ substr($val->remark, 0, 19) }}</p>
													</div></td>
												<td>{{ \Carbon\Carbon::parse($val->updated_at)->format('Y-m-d') }}</td>
												<td>{{$val->review_type}}</td>
												@if($val->review_type == null)
												<td><span class="badge badge-danger border-0">Pending</span></td>

												@else
												<td><span class="badge badge-success border-0">Completed</span></td>
												@endif
												<!-- <td class="edit-action">
													<div class="icon-box icon-box-xs bg-primary me-1">
														<i class="fa-solid fa-pencil text-white"></i>
													</div>
													<div class="icon-box icon-box-xs bg-danger  ms-1">
														<i class="fa-solid fa-trash text-white"></i>
													</div>
												</td> -->
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

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="/vendor/global/global.min.js"></script>
	<script src="/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/vendor/apexchart/apexchart.js"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('reviewer/js/dashboard/dashboard-1.js')}}"></script>
	<script src="/vendor/draggable/draggable.js"></script>
	<script src="/vendor/swiper/js/swiper-bundle.min.js"></script>


	<!-- tagify -->
	<script src="/vendor/tagify/dist/tagify.js"></script>

	<script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
	<script src="/vendor/datatables/js/buttons.html5.min.js"></script>
	<script src="/vendor/datatables/js/jszip.min.js"></script>
	<script src="{{asset('reviewer/js/plugins-init/datatables.init.js')}}"></script>

	<!-- Apex Chart -->

	<script src="/vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


	<!-- Vectormap -->
	<script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
	<script src="/vendor/jqvmap/js/jquery.vmap.world.js"></script>
	<script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
	<script src="{{asset('reviewer/js/custom.js')}}"></script>
	<script src="{{asset('reviewer/js/deznav-init.js')}}"></script>
	<script src="{{asset('reviewer/js/demo.js')}}"></script>
	<script src="{{asset('reviewer/js/styleSwitcher.js')}}"></script>



</body>
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
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
