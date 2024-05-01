        <!--**********************************
            Nav header start
        ***********************************-->

        <head>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- ... other head elements ... -->
        </head>
        <div class="nav-header">
            <a href="" class="brand-logo">
                <img src="/assets/img/logo/logo.png" width="111" height="24">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.7468 5.58925C11.0722 5.26381 11.0722 4.73617 10.7468 4.41073C10.4213 4.0853 9.89369 4.0853 9.56826 4.41073L4.56826 9.41073C4.25277 9.72622 4.24174 10.2342 4.54322 10.5631L9.12655 15.5631C9.43754 15.9024 9.96468 15.9253 10.3039 15.6143C10.6432 15.3033 10.6661 14.7762 10.3551 14.4369L6.31096 10.0251L10.7468 5.58925Z"
                                fill="#452B90" />
                            <path opacity="0.3"
                                d="M16.5801 5.58924C16.9056 5.26381 16.9056 4.73617 16.5801 4.41073C16.2547 4.0853 15.727 4.0853 15.4016 4.41073L10.4016 9.41073C10.0861 9.72622 10.0751 10.2342 10.3766 10.5631L14.9599 15.5631C15.2709 15.9024 15.798 15.9253 16.1373 15.6143C16.4766 15.3033 16.4995 14.7762 16.1885 14.4369L12.1443 10.0251L16.5801 5.58924Z"
                                fill="#452B90" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <h4 class="ms-5 header-leftone"><b>{{auth('librarian')->user()->libraryName}} -
                                    {{auth('librarian')->user()->libraryType}}</b></h4>
                            {{-- <h4 class=" header-lefttwo"><b>{{auth('librarian')->user ()->libraryName}} -
                            {{auth('librarian')->user()->libraryType, 10}}</b></h4> --}}
                            <h4 class="ms-3 header-lefttwo">
                                <b>{{ Illuminate\Support\Str::limit(auth('librarian')->user()->libraryName, 11) }} -
                                    {{ Illuminate\Support\Str::limit(auth('librarian')->user()->libraryType, 11) }}</b>
                            </h4>
                        </div>
                        <div class="header-right d-flex align-items-center">
                            <!-- <div class="input-group search-area">
								<input type="text" class="form-control" placeholder="Search here...">
								<span class="input-group-text"><a href="javascript:void(0)">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_1_450)">
										<path opacity="0.3" d="M14.2929 16.7071C13.9024 16.3166 13.9024 15.6834 14.2929 15.2929C14.6834 14.9024 15.3166 14.9024 15.7071 15.2929L19.7071 19.2929C20.0976 19.6834 20.0976 20.3166 19.7071 20.7071C19.3166 21.0976 18.6834 21.0976 18.2929 20.7071L14.2929 16.7071Z" fill="#452B90"/>
										<path d="M11 16C13.7614 16 16 13.7614 16 11C16 8.23859 13.7614 6.00002 11 6.00002C8.23858 6.00002 6 8.23859 6 11C6 13.7614 8.23858 16 11 16ZM11 18C7.13401 18 4 14.866 4 11C4 7.13402 7.13401 4.00002 11 4.00002C14.866 4.00002 18 7.13402 18 11C18 14.866 14.866 18 11 18Z" fill="#452B90"/>
										</g>
										<defs>
										<clipPath id="clip0_1_450">
										<rect width="24" height="24" fill="white"/>
										</clipPath>
										</defs>
									</svg>
								</a></span>
							</div> -->
                            <ul class="navbar-nav">
                                {{-- <li class="nav-item dropdown notification_dropdown">
									<a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
										<svg id="icon-light" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" fill-rule="nonzero"/>
												<path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											</g>
										</svg>
										<svg id="icon-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M12.0700837,4.0003006 C11.3895108,5.17692613 11,6.54297551 11,8 C11,12.3948932 14.5439081,15.9620623 18.9299163,15.9996994 C17.5467214,18.3910707 14.9612535,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C12.0233848,4 12.0467462,4.00010034 12.0700837,4.0003006 Z" fill="#000000"/>
										</g>
										</svg>	
									</a>
								</li> --}}
                                <li class="nav-item dropdown notification_dropdown notify">
                                    <a class="nav-link notification" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown">
                                        <span><svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17.5 12H19C19.8284 12 20.5 12.6716 20.5 13.5C20.5 14.3284 19.8284 15 19 15H6C5.17157 15 4.5 14.3284 4.5 13.5C4.5 12.6716 5.17157 12 6 12H7.5L8.05827 6.97553C8.30975 4.71226 10.2228 3 12.5 3C14.7772 3 16.6903 4.71226 16.9417 6.97553L17.5 12Z"
                                                    fill="#222B40" />
                                                <path opacity="0.3"
                                                    d="M14.5 18C14.5 16.8954 13.6046 16 12.5 16C11.3954 16 10.5 16.8954 10.5 18C10.5 19.1046 11.3954 20 12.5 20C13.6046 20 14.5 19.1046 14.5 18Z"
                                                    fill="#222B40" />
                                            </svg></span>
                                        <span class="badge bg-danger" id="count"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div id="DZ_W_Notification1" class="widget-media dz-scroll p-2"
                                            style="height:380px;">
                                            <ul class="timeline" name="record">
                                                <li>

                                                    <h6 class="mb-0">No Notification Found</h6>

                                                </li>
                                            </ul>
                                        </div>
                                        <a class="all-notification" href="javascript:void(0);">See all notifications <i
                                                class="ti-arrow-end"></i></a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown notification_dropdown">
									<a class="nav-link bell-link" href="javascript:void(0);">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_1_463)">
										<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M6.5 2H18.5C19.0523 2 19.5 2.44772 19.5 3V13C19.5 13.5523 19.0523 14 18.5 14H6.5C5.94772 14 5.5 13.5523 5.5 13V3C5.5 2.44772 5.94772 2 6.5 2ZM14.3 4C13.6562 4 12.9033 4.72985 12.5 5.2C12.0967 4.72985 11.3438 4 10.7 4C9.5604 4 8.9 4.88887 8.9 6.02016C8.9 7.27339 10.1 8.6 12.5 10C14.9 8.6 16.1 7.3 16.1 6.1C16.1 4.96871 15.4396 4 14.3 4Z" fill="#222B40"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M4.29275 6.57254L12.5 12.5L20.7073 6.57254C20.9311 6.41086 21.2437 6.46127 21.4053 6.68514C21.4669 6.77034 21.5 6.87278 21.5 6.97788V17C21.5 18.1046 20.6046 19 19.5 19H5.5C4.39543 19 3.5 18.1046 3.5 17V6.97788C3.5 6.70174 3.72386 6.47788 4 6.47788C4.10511 6.47788 4.20754 6.511 4.29275 6.57254Z" fill="#222B40"/>
										</g>
										<defs>
										<clipPath id="clip0_1_463">
										<rect width="24" height="24" fill="white" transform="translate(0.5)"/>
										</clipPath>
										</defs>
									</svg>
									</a>
								</li> -->
                                {{-- <li class="nav-item dropdown notification_dropdown">
									<a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 16.87V9.257H21.5V16.931C21.5 20.07 19.5241 22 16.3628 22H8.62733C5.49561 22 3.5 20.03 3.5 16.87ZM8.45938 14.41C8.00494 14.431 7.62953 14.07 7.60977 13.611C7.60977 13.151 7.96542 12.771 8.41987 12.75C8.86443 12.75 9.22997 13.101 9.23985 13.55C9.2596 14.011 8.90395 14.391 8.45938 14.41ZM12.5198 14.41C12.0653 14.431 11.6899 14.07 11.6701 13.611C11.6701 13.151 12.0258 12.771 12.4802 12.75C12.9248 12.75 13.2903 13.101 13.3002 13.55C13.32 14.011 12.9643 14.391 12.5198 14.41ZM16.5505 18.09C16.096 18.08 15.7305 17.7 15.7305 17.24C15.7206 16.78 16.0862 16.401 16.5406 16.391H16.5505C17.0148 16.391 17.3902 16.771 17.3902 17.24C17.3902 17.71 17.0148 18.09 16.5505 18.09ZM11.6701 17.24C11.6899 17.7 12.0653 18.061 12.5198 18.04C12.9643 18.021 13.32 17.641 13.3002 17.181C13.2903 16.731 12.9248 16.38 12.4802 16.38C12.0258 16.401 11.6701 16.78 11.6701 17.24ZM7.59989 17.24C7.61965 17.7 7.99506 18.061 8.44951 18.04C8.89407 18.021 9.24973 17.641 9.22997 17.181C9.22009 16.731 8.85456 16.38 8.40999 16.38C7.95554 16.401 7.59989 16.78 7.59989 17.24ZM15.7404 13.601C15.7404 13.141 16.096 12.771 16.5505 12.761C16.9951 12.761 17.3507 13.12 17.3705 13.561C17.3804 14.021 17.0247 14.401 16.5801 14.41C16.1257 14.42 15.7503 14.07 15.7404 13.611V13.601Z" fill="#222B40"/>
										<path opacity="0.4" d="M3.50336 9.2569C3.5162 8.6699 3.5656 7.5049 3.65846 7.1299C4.13267 5.0209 5.74298 3.6809 8.04485 3.4899H16.9559C19.238 3.6909 20.8681 5.0399 21.3423 7.1299C21.4342 7.4949 21.4836 8.6689 21.4964 9.2569H3.50336Z" fill="#222B40"/>
										<path d="M8.80489 6.59C9.23958 6.59 9.56559 6.261 9.56559 5.82V2.771C9.56559 2.33 9.23958 2 8.80489 2C8.3702 2 8.04419 2.33 8.04419 2.771V5.82C8.04419 6.261 8.3702 6.59 8.80489 6.59Z" fill="#222B40"/>
										<path d="M16.195 6.59C16.6198 6.59 16.9557 6.261 16.9557 5.82V2.771C16.9557 2.33 16.6198 2 16.195 2C15.7603 2 15.4343 2.33 15.4343 2.771V5.82C15.4343 6.261 15.7603 6.59 16.195 6.59Z" fill="#222B40"/>
									</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 p-3 height370">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="javascript:void(0);">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li> --}}
                                <li class="nav-item ps-3">
                                    <div class="dropdown header-profile2">
                                        <a class="nav-link" href="javascript:void(0);" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="header-info2 d-flex align-items-center">
                                                <div class="header-media">
                                                    <img src="{{asset("images/default.png")}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="card border-0 mb-0">
                                                <div class="card-header py-2">
                                                    <div class="products">
                                                        <img src="{{asset("images/default.png")}}"
                                                            class="avatar avatar-md" alt="">
                                                        <div>
                                                            <h6>{{auth('librarian')->user()->librarianName }}</h6>
                                                            <span>{{auth('librarian')->user()->email }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body px-0 py-2">
                                                    <a href="/librarian/library_edit" class="dropdown-item ai-icon ">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z"
                                                                stroke="var(--primary)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z"
                                                                stroke="var(--primary)" stroke-width="1.42857"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <span class="ms-2">Profile </span>
                                                    </a>

                                                    <a href="/librarian/change_password" class="dropdown-item ai-icon ">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M20.8066 7.62355L20.1842 6.54346C19.6576 5.62954 18.4907 5.31426 17.5755 5.83866V5.83866C17.1399 6.09528 16.6201 6.16809 16.1307 6.04103C15.6413 5.91396 15.2226 5.59746 14.9668 5.16131C14.8023 4.88409 14.7139 4.56833 14.7105 4.24598V4.24598C14.7254 3.72916 14.5304 3.22834 14.17 2.85761C13.8096 2.48688 13.3145 2.2778 12.7975 2.27802H11.5435C11.0369 2.27801 10.5513 2.47985 10.194 2.83888C9.83666 3.19791 9.63714 3.68453 9.63958 4.19106V4.19106C9.62457 5.23686 8.77245 6.07675 7.72654 6.07664C7.40418 6.07329 7.08843 5.98488 6.8112 5.82035V5.82035C5.89603 5.29595 4.72908 5.61123 4.20251 6.52516L3.53432 7.62355C3.00838 8.53633 3.31937 9.70255 4.22997 10.2322V10.2322C4.82187 10.574 5.1865 11.2055 5.1865 11.889C5.1865 12.5725 4.82187 13.204 4.22997 13.5457V13.5457C3.32053 14.0719 3.0092 15.2353 3.53432 16.1453V16.1453L4.16589 17.2345C4.41262 17.6797 4.82657 18.0082 5.31616 18.1474C5.80575 18.2865 6.33061 18.2248 6.77459 17.976V17.976C7.21105 17.7213 7.73116 17.6515 8.21931 17.7821C8.70746 17.9128 9.12321 18.233 9.37413 18.6716C9.53867 18.9488 9.62708 19.2646 9.63043 19.5869V19.5869C9.63043 20.6435 10.4869 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9088 18.6 15.2681 18.2407C15.6274 17.8814 16.1154 17.6806 16.6236 17.6831C16.9451 17.6917 17.2596 17.7797 17.5389 17.9393V17.9393C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8066 16.1453C21.0617 15.7074 21.1317 15.1859 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6717 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8872 19.1602 11.3658 19.4153 10.9279C19.5812 10.6383 19.8213 10.3981 20.111 10.2322V10.2322C21.0161 9.70283 21.3264 8.54343 20.8066 7.63271V7.63271V7.62355Z"
                                                                stroke="var(--primary)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <circle cx="12.175" cy="11.889" r="2.63616"
                                                                stroke="var(--primary)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <span class="ms-2">change Password </span>
                                                    </a>
                                                    <!-- <a href="app-profile-2.html" class="dropdown-item ai-icon ">
														<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>

														<span class="ms-2">My Project</span><span class="badge badge-sm badge-primary rounded-circle text-white ms-2">4</span>
													</a>
													<a href="javascript:void(0);" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M17.9026 8.85114L13.4593 12.4642C12.6198 13.1302 11.4387 13.1302 10.5992 12.4642L6.11844 8.85114" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>

														<span class="ms-2">Message </span>
													</a> -->
                                                    <a href="/librarian/notification" class="dropdown-item ai-icon ">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z"
                                                                stroke="var(--primary)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M14.3888 20.8572C13.0247 22.372 10.8967 22.3899 9.51947 20.8572"
                                                                stroke="var(--primary)" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <span class="ms-2">Notification </span>
                                                    </a>
                                                </div>
                                                <div class="card-footer px-0 py-2">
                                                    <!-- <a href="javascript:void(0);" class="dropdown-item ai-icon ">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M20.8066 7.62355L20.1842 6.54346C19.6576 5.62954 18.4907 5.31426 17.5755 5.83866V5.83866C17.1399 6.09528 16.6201 6.16809 16.1307 6.04103C15.6413 5.91396 15.2226 5.59746 14.9668 5.16131C14.8023 4.88409 14.7139 4.56833 14.7105 4.24598V4.24598C14.7254 3.72916 14.5304 3.22834 14.17 2.85761C13.8096 2.48688 13.3145 2.2778 12.7975 2.27802H11.5435C11.0369 2.27801 10.5513 2.47985 10.194 2.83888C9.83666 3.19791 9.63714 3.68453 9.63958 4.19106V4.19106C9.62457 5.23686 8.77245 6.07675 7.72654 6.07664C7.40418 6.07329 7.08843 5.98488 6.8112 5.82035V5.82035C5.89603 5.29595 4.72908 5.61123 4.20251 6.52516L3.53432 7.62355C3.00838 8.53633 3.31937 9.70255 4.22997 10.2322V10.2322C4.82187 10.574 5.1865 11.2055 5.1865 11.889C5.1865 12.5725 4.82187 13.204 4.22997 13.5457V13.5457C3.32053 14.0719 3.0092 15.2353 3.53432 16.1453V16.1453L4.16589 17.2345C4.41262 17.6797 4.82657 18.0082 5.31616 18.1474C5.80575 18.2865 6.33061 18.2248 6.77459 17.976V17.976C7.21105 17.7213 7.73116 17.6515 8.21931 17.7821C8.70746 17.9128 9.12321 18.233 9.37413 18.6716C9.53867 18.9488 9.62708 19.2646 9.63043 19.5869V19.5869C9.63043 20.6435 10.4869 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9088 18.6 15.2681 18.2407C15.6274 17.8814 16.1154 17.6806 16.6236 17.6831C16.9451 17.6917 17.2596 17.7797 17.5389 17.9393V17.9393C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8066 16.1453C21.0617 15.7074 21.1317 15.1859 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6717 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8872 19.1602 11.3658 19.4153 10.9279C19.5812 10.6383 19.8213 10.3981 20.111 10.2322V10.2322C21.0161 9.70283 21.3264 8.54343 20.8066 7.63271V7.63271V7.62355Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<circle cx="12.175" cy="11.889" r="2.63616" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>

														<span class="ms-2">Settings </span>
													</a> -->
                                                    <a href="/member/logout" class="dropdown-item ai-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                            viewBox="0 0 24 24" fill="none" stroke="var(--primary)"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                            <polyline points="16 17 21 12 16 7"></polyline>
                                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                                        </svg>
                                                        <span class="ms-2">Logout </span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="menu-title">Librarian</li>

                    <li><a href="/" class="" aria-expanded="false">
                            <div class="menu-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.756 22 16.0829 22H18.0438C18.9596 22.0024 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z"
                                        fill="#90959F" />
                                </svg>
                            </div>
                            <span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li><a href="/librarian/index" class="" aria-expanded="false">
                            <i class="bi bi-speedometer2"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @if(auth('librarian')->user()->metaChecker =="no" && auth('librarian')->user()->allow_status ==0 &&
                    auth('librarian')->user()->libraryType =="State Libraries")

                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-book"></i>
                            <span class="nav-text">book Copies Management </span>
                        </a>
                        <ul aria-expanded="false">
                            <!-- <li><a href="library_manage_create">Create Library   </a></li> -->
                            <li><a href="/librarian/bookcopies_pendinglist">Bookcopies Pending List </a></li>
                            <li><a href="/librarian/bookcopies_completelist">Bookcopies Complete List </a></li>
                        </ul>
                    </li>

              

              
                    @endif
                    @if(auth('librarian')->user()->metaChecker =="no" && auth('librarian')->user()->allow_status ==0 &&
                    auth('librarian')->user()->libraryType =="District Library Office -DLO")

                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-book"></i>
                            <span class="nav-text">Library Management </span>
                        </a>
                        <ul aria-expanded="false">
                            <!-- <li><a href="library_manage_create">Create Library   </a></li> -->
                            <li><a href="/librarian/library_list">List Library </a></li>
                            <li><a href="/librarian/library_active_list">Active Library </a></li>
                            <li><a href="/librarian/library_unactive_list">Inactive Library </a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-bag"></i>
                            <span class="nav-text">Order Management</span>
                        </a>
                        <ul aria-expanded="false">

                            <li><a class="has-arrow" href="#" aria-expanded="false">Magazine Order
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="/librarian/magazine_order">Order List </a></li>
                                    <!-- <li><a href="magazine_order_pending">Pending Order List</a></li>
                                        <li><a href="manage_completed_order_list">Completed Order List</a></li> -->
                                    <li><a href="/librarian/magazine_cancel_list">Cancelled Order List</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="#" aria-expanded="false">Magazines</a>
                                <ul aria-expanded="false">
                                    <li><a href="/librarian/magazine_order_list">Magazine Order List </a></li>

                                </ul>
                            </li>


                        </ul>
                    </li>

                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-printer"></i>
                            <span class="nav-text">Report Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/librarian/report_download_oedermagazine">Order Magazine Download</a></li>
                            <li><a href="report_download_order_magazine">Report Download Order Magazine</a></li>

                        </ul>
                    </li>
                    @endif
                    @if(auth('librarian')->user()->metaChecker =="no" && auth('librarian')->user()->allow_status ==1)
                    <!-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="bi bi-book"></i>	
							<span class="nav-text">Books Management</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="/librarian/book_stock_list">Stock Book list</a></li>
							<li><a href="/librarian/book_return_list">Return Book list</a></li>
						</ul>
					</li> -->

                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-blockquote-left"></i>
                            <span class="nav-text">Quote Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/librarian/order_scheme">Orders Scheme</a></li>
                            <!-- <li><a href="/librarian/cart_books">Cart Books</a></li>
							<li><a href="/librarian/quote_pending">Pending Quote</a></li>							
							<li><a href="/librarian/quote_reject_list">Cancelled Quote</a></li>
							<li><a href="../website/">Visit Book Store</a></li> -->
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-chat-dots"></i>
                            <span class="nav-text">Website</span>
                        </a>
                        <ul aria-expanded="false">
                            <!-- <li><a href="/product">Book List</a></li> -->
                            <li><a href="/product-two">Magazine List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-bag"></i>
                            <span class="nav-text">Order Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <!-- <li><a class="has-arrow" href="#" aria-expanded="false">Book Orders
                                </a>
                                    <ul aria-expanded="false">
                                        <li><a href="/librarian/book_order_list">Received  Order</a></li>
										<li><a href="/librarian/book_order_pending">Pending Order</a></li>							
										<li><a href="/librarian/book_order_cancel_list">Cancelled Order</a></li>
										<li><a href="../website/">Visit Book Store</a></li>
                                    </ul>
                            </li> -->
                            <li><a class="has-arrow" href="#" aria-expanded="false">Magazine Order
                                </a>
                                <ul aria-expanded="false">
                                    <li><a href="/librarian/magazine-order-list">Order List </a></li>
                                    <li><a href="/librarian/magazine_order_reject">Cancelled Order List</a></li>

                                    <!-- <li><a href="/librarian/magazine_order_pending">Pending Order List</a></li>
                                        <li><a href="/librarian/manage_completed_order_list">Completed Order List</a></li>
                                        <li><a href="/librarian/magazine_order_reject">Rejected Order List</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    @endif

                    @if(auth('librarian')->user()->metaChecker =="yes")
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-card-checklist"></i>
                            <span class="nav-text">Meta Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/librarian/meta_book_list">Meta Book Check List</a></li>
                            <li><a href="/librarian/meta_pending">Pending Book</a></li>
                            <li><a href="/librarian/meta_complete_book_list">Completed Book</a></li>
                            <li><a href="/librarian/meta_return">Return Book</a></li>
                            <li><a href="/librarian/meta_update_return">Return Updated Book</a></li>

                            <li><a href="/librarian/meta_reject">Reject Book</a></li>

                        </ul>
                    </li>



                    @endif
                    <!-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="bi bi-bag-plus"></i>	
							<span class="nav-text">Review Management</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="/librarian/review_book_list">Review Book List</a></li>
							<li><a href="/librarian/book_complete_list">Completed Book</a></li>							
							<li><a href="/librarian/book_pending_list">Pending Book</a></li>
							<li><a href="/librarian/book_cancel_list">Reject Book</a></li>
						</ul>
					</li> -->
                    <!-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="bi bi-gear-wide-connected"></i>		
							<span class="nav-text">Setting</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="/librarian/change_password">Change Password</a></li>
						</ul>
					</li> -->
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="bi bi-blockquote-left"></i>
                        <span class="nav-text">Dispatch Magazine</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/librarian/dispatch-year-list">Magazine List</a></li>
                            <li><a href="/librarian/magazine-overview">Overview</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                            <i class="bi bi-chat-dots"></i>
                            <span class="nav-text">Feedback Manage</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/librarian/feedback_librarian_add">Create Feedback</a></li>

                        </ul>
                    </li>
            </div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->
        <style>
.notification {
    background-color: #555;
    color: white;
    text-decoration: none;
    padding: 15px 26px;
    position: relative;
    display: inline-block;
    border-radius: 2px;
}

.notification:hover {
    background: red;
}

.notification .badge {
    position: absolute;
    top: -10px;
    right: -10px;
    padding: 0px 5px;
    border-radius: 50%;
    background: red;
    color: white;
}

@media only screen and (max-width: 600px) {
    .header-leftone {
        display: none;
    }

    .header-lefttwo {
        display: block;
    }
}

@media only screen and (min-width: 768px) {
    .header-lefttwo {
        display: none;
    }

    .header-leftone {
        display: block;
    }
}
        </style>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
// Your JavaScript file

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/librarian/notifications',
        type: 'GET',
        success: function(response) {
            console.log(response);
            if (response.record) {

                $('ul[name="record"]').empty();
                $('ul[name="record"]').html(response.record);
                if (response.count == 0) {
                    $('#count').empty();
                } else {
                    $('#count').empty();
                    $('#count').html(response.count);
                }



            }

        },

    });
});
        </script>
        <script>
$(document).on('click', '.notify', function(e) {
    $('#count').empty();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "get",

        url: "/librarian/notificationstatus",
        success: function(response) {
            console.log(response);
            //     if(response.success){
            //            $('ul[name="record"]').empty();
            //            $('ul[name="record"]').html(response.success);
            //            document.getElementById('datas').value = '';
            //    }else{
            //          document.getElementById('datas').value = '';
            //        toastr.error(response.error,{timeout:25000});

            //    }

        }
    });

});
</script>