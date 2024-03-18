
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
			<div class="row p-3 bg-white rounded-2 mb-3">
                  <div class="col-md-12 d-flex justify-content-between">
                     <div class="item">
                        <h3>Notification List</h3>
                     </div>
                     <div class="item">
                       <a href="index.php"> <button type="button" class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"></i> Back</button></a>
                     </div>
                  </div>
               </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card mb-0 h-auto rounded-0">
							<div class="card-body py-0 pe-0">
								<div class="row gx-0">
									<!-- column -->
									<div class="col-xl-2 col-xxl-3 col-lg-3">
										<div class="email-left-box dz-scroll pt-3 ps-0" id="email-left">
											<div class="mail-list rounded ">

												<a class="list-group-item active">
													<i class="fa-regular fa-paper-plane align-middle"></i>Notification List</a>
											</div>
										</div>
									</div>

									<div class="col-xl-10 col-xxl-9 col-lg-9">
										<div class="email-right-box">
											<div role="toolbar" class="toolbar ms-1 ms-sm-0">
												<div class="saprat">
													<div class="d-flex align-items-center">
														<div class="btn-group ">
															<div class="form-check custom-checkbox">
																<input type="checkbox" class="form-check-input" id="checkAll">
																<label class="form-check-label" for="checkAll"></label>
															</div>
														</div>

													</div>
													<div class="mail-tools">
														<a href="javascrip:void(0);"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18.1667 25.5C18.4098 25.5 18.6429 25.4035 18.8148 25.2316C18.9868 25.0596 19.0833 24.8265 19.0833 24.5834V19.0834C19.0833 18.8403 18.9868 18.6071 18.8148 18.4352C18.6429 18.2633 18.4098 18.1667 18.1667 18.1667C17.9236 18.1667 17.6904 18.2633 17.5185 18.4352C17.3466 18.6071 17.25 18.8403 17.25 19.0834V24.5834C17.25 24.8265 17.3466 25.0596 17.5185 25.2316C17.6904 25.4035 17.9236 25.5 18.1667 25.5ZM27.3333 14.5H23.6667V13.5834C23.6667 12.854 23.3769 12.1546 22.8612 11.6388C22.3455 11.1231 21.646 10.8334 20.9167 10.8334H19.0833C18.354 10.8334 17.6545 11.1231 17.1388 11.6388C16.6231 12.1546 16.3333 12.854 16.3333 13.5834V14.5H12.6667C12.4236 14.5 12.1904 14.5966 12.0185 14.7685C11.8466 14.9404 11.75 15.1736 11.75 15.4167C11.75 15.6598 11.8466 15.893 12.0185 16.0649C12.1904 16.2368 12.4236 16.3334 12.6667 16.3334H13.5833V26.4167C13.5833 27.1461 13.8731 27.8455 14.3888 28.3612C14.9045 28.877 15.604 29.1667 16.3333 29.1667H23.6667C24.396 29.1667 25.0955 28.877 25.6112 28.3612C26.1269 27.8455 26.4167 27.1461 26.4167 26.4167V16.3334H27.3333C27.5764 16.3334 27.8096 16.2368 27.9815 16.0649C28.1534 15.893 28.25 15.6598 28.25 15.4167C28.25 15.1736 28.1534 14.9404 27.9815 14.7685C27.8096 14.5966 27.5764 14.5 27.3333 14.5ZM18.1667 13.5834C18.1667 13.3403 18.2632 13.1071 18.4352 12.9352C18.6071 12.7633 18.8402 12.6667 19.0833 12.6667H20.9167C21.1598 12.6667 21.3929 12.7633 21.5648 12.9352C21.7368 13.1071 21.8333 13.3403 21.8333 13.5834V14.5H18.1667V13.5834ZM24.5833 26.4167C24.5833 26.6598 24.4868 26.893 24.3148 27.0649C24.1429 27.2368 23.9098 27.3334 23.6667 27.3334H16.3333C16.0902 27.3334 15.8571 27.2368 15.6852 27.0649C15.5132 26.893 15.4167 26.6598 15.4167 26.4167V16.3334H24.5833V26.4167ZM21.8333 25.5C22.0764 25.5 22.3096 25.4035 22.4815 25.2316C22.6534 25.0596 22.75 24.8265 22.75 24.5834V19.0834C22.75 18.8403 22.6534 18.6071 22.4815 18.4352C22.3096 18.2633 22.0764 18.1667 21.8333 18.1667C21.5902 18.1667 21.3571 18.2633 21.1852 18.4352C21.0132 18.6071 20.9167 18.8403 20.9167 19.0834V24.5834C20.9167 24.8265 21.0132 25.0596 21.1852 25.2316C21.3571 25.4035 21.5902 25.5 21.8333 25.5Z" fill="var(--primary)"></path>
															</svg>
														</a>
														<a href="javascrip:void(0);">

														</a>
														<a href="javascrip:void(0);">

														</a>
													</div>
												</div>
											</div>
											<!-- tab-content -->
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="email-list dz-scroll" id="emails">
                                                        @php
                                                            $notifications = DB::table('notifications')->where('to','=',auth('admin')->user()->id)->paginate(10);
                                                        @endphp

                                                        @forelse($notifications as $notification)
                                                            <div class="message">
                                                                <div>
                                                                    <div class="d-flex message-single">
                                                                        <div class="ps-1 align-self-center">
                                                                            <div class="form-check custom-checkbox">
                                                                                <input type="checkbox" class="form-check-input" id="checkbox{{ $notification->id }}">
                                                                                <label class="form-check-label" for="checkbox{{ $notification->id }}"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ms-2">
                                                                            <label class="bookmark-btn">
                                                                                <input type="checkbox">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="/admin/Notification_virw/{{$notification->id}}/{{$notification->type}}" class="col-mail col-mail-2">
                                                                        <div class="head">{{ $notification->message }}</div>
                                                                        @if($notification->type == "publisher_distributor")
                                                                            <div class="subject">Pub&Dist</div>
                                                                        @else
                                                                             <div class="subject">{{ $notification->type }}</div>
                                                                        @endif
                                                                        <div class="date">{{ \Carbon\Carbon::parse($notification->created_at)->format('Y-m-d h:i A') }}</div>
                                                                    </a>
                                                                    <div class="icon">
                                                                        <a href="javascript:void(0);" class="ms-2">
                                                                            <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">

                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <p>No notifications found.</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ps-3">
                                                    <div class="table-pagination">
                                                        <p class="mb-0">Showing <span>{{ $notifications->firstItem() }}-{{ $notifications->lastItem() }}</span> from <span>{{ $notifications->total() }}</span> notifications</p>
                                                        <nav>
                                                            <ul class="pagination pagination-sm">
                                                                <li class="page-item {{ $notifications->previousPageUrl() ? '' : 'disabled' }}">
                                                                    <a class="page-link" href="{{ $notifications->previousPageUrl() }}" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                </li>

                                                                @for ($i = 1; $i <= $notifications->lastPage(); $i++)
                                                                    <li class="page-item {{ $i == $notifications->currentPage() ? 'active' : '' }}">
                                                                        <a class="page-link" href="{{ $notifications->url($i) }}">{{ $i }}</a>
                                                                    </li>
                                                                @endfor

                                                                <li class="page-item {{ $notifications->nextPageUrl() ? '' : 'disabled' }}">
                                                                    <a class="page-link" href="{{ $notifications->nextPageUrl() }}" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
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

</html>
