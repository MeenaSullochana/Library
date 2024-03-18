<?php
@ob_start();
include "core/index.core.php";
?>
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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="./vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- tagify-css -->
    <link href="./vendor/tagify/dist/tagify.css" rel="stylesheet">

    <!-- Style css -->
    <link href="./css/style.css" rel="stylesheet">

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
        <?php
			include "navigation.php";
		?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-xxl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <!-- <div class="col-xl-6">

                                    </div>
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-success rainbow-box"
                                            style="background-image: url(images/rainbow.gif);background-size: cover;background-blend-mode: luminosity;">
                                            <div class="card-header border-0">
                                                <svg width="43" height="40" viewBox="0 0 43 40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M41.605 3.94728L34.9548 0.107383C34.7065 -0.0357944 34.4007 -0.0357944 34.1525 0.107383C26.172 4.71641 16.338 4.71713 8.35679 0.108821L8.35391 0.107383C8.10569 -0.0357944 7.7999 -0.0357944 7.55168 0.107383L0.901472 3.94656C0.65325 4.08974 0.5 4.35451 0.5 4.64159V12.3207C0.5 12.6077 0.65325 12.8725 0.901472 13.0157C8.88345 17.6225 13.8004 26.1384 13.8004 35.355V35.3579C13.8004 35.6442 13.9537 35.9097 14.2019 36.0529L20.8521 39.8928C20.9766 39.9647 21.1147 40 21.2536 40C21.3924 40 21.5306 39.964 21.655 39.8928L28.3053 36.0529C28.5535 35.9097 28.7067 35.645 28.7067 35.3579C28.706 26.1413 33.623 17.6247 41.605 13.0164L41.6064 13.0157C41.8546 12.8725 42.0079 12.6077 42.0079 12.3207V4.6423C42.0057 4.35523 41.8532 4.09046 41.605 3.94728ZM40.4013 11.858L20.8514 23.1453C20.6032 23.2885 20.4499 23.5533 20.4499 23.8403V29.8891C19.8168 30.2013 19.3923 30.8712 19.439 31.6345C19.4944 32.5325 20.2139 33.2627 21.1118 33.3304C22.1788 33.4109 23.0696 32.5684 23.0696 31.5187C23.0696 30.8035 22.6559 30.1848 22.0551 29.8883C22.0551 26.4319 23.8991 23.2381 26.8922 21.5099L27.0994 21.3905L27.1001 34.8952L21.2521 38.2718L15.4042 34.8952V12.3214C15.4042 12.035 15.2509 11.7695 15.0027 11.6264L9.76338 8.60163C9.76626 8.56206 9.7677 8.52249 9.7677 8.4822C9.7677 7.45549 8.91583 6.62736 7.88049 6.66694C6.93868 6.70291 6.17171 7.46988 6.13573 8.41169C6.09616 9.44703 6.92429 10.2996 7.951 10.2996C8.32513 10.2996 8.67264 10.1867 8.96115 9.99312C11.9542 11.7213 13.7983 14.9151 13.7983 18.3715V18.6097L2.10229 11.8587V5.10637L7.95028 1.72982L27.5002 13.0171C27.7484 13.1603 28.0542 13.1603 28.3024 13.0171L33.541 9.9924C33.8324 10.1881 34.1842 10.3011 34.5619 10.2989C35.5526 10.2931 36.3664 9.47581 36.3678 8.48508C36.3693 7.47996 35.5555 6.66549 34.5511 6.66549C33.5474 6.66549 32.7344 7.47923 32.7344 8.4822C32.7344 8.52249 32.7359 8.56206 32.7387 8.60163C29.745 10.3298 26.0569 10.3298 23.0631 8.60163L22.8573 8.48292L34.5511 1.72982L40.3991 5.10637V11.858H40.4013Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="finance">
                                                    <h4>Your Finances, safe and Secure</h4>
                                                    <p>
                                                        It is a long established fact that a reader will be distracted
                                                        by the readable content of a page when looking at its layout.
                                                    </p>
                                                </div>
                                                <div class="d-flex pt-3">
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <img src="images/contacts/pic555.jpg"
                                                            class="avatar rounded-circle" alt="">
                                                        <img src="images/contacts/pic666.jpg"
                                                            class="avatar rounded-circle" alt="">
                                                        <img src="images/contacts/pic777.jpg"
                                                            class="avatar rounded-circle" alt="">
                                                    </div>
                                                    <div class="ratting-data">
                                                        <h4>15k+</h4>
                                                        <span>Happy Clients</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                        <!-- <div class="col-xl-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="redial"></div>
                                                <span class="right-sign">
                                                    <svg width="93" height="93" viewBox="0 0 93 93" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_3_700)">
                                                            <circle cx="46.5" cy="31.5" r="16.5" fill="#F8B940" />
                                                        </g>
                                                        <g clip-path="url(#clip0_3_700)">
                                                            <path
                                                                d="M52.738 25.3524C53.0957 24.9315 53.7268 24.8804 54.1476 25.2381C54.5684 25.5957 54.6196 26.2268 54.2619 26.6476L45.7619 36.6476C45.3986 37.0751 44.7549 37.1201 44.3356 36.7474L39.8356 32.7474C39.4228 32.3805 39.3857 31.7484 39.7526 31.3356C40.1195 30.9229 40.7516 30.8857 41.1643 31.2526L44.9002 34.5733L52.738 25.3524Z"
                                                                fill="#222B40" />
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_3_700" x="0" y="0" width="93"
                                                                height="93" filterUnits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0"
                                                                    result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha" />
                                                                <feOffset dy="15" />
                                                                <feGaussianBlur stdDeviation="15" />
                                                                <feComposite in2="hardAlpha" operator="out" />
                                                                <feColorMatrix type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow_3_700" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow_3_700" result="shape" />
                                                            </filter>
                                                            <clipPath id="clip0_3_700">
                                                                <rect width="24" height="24" fill="white"
                                                                    transform="translate(35 19)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <div class="redia-date text-center">
                                                    <h4>My Progress</h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur
                                                    </p>
                                                    <a href="crm.html" class="btn btn-secondary text-black">More
                                                        Details</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div> -->
                                        <div class="col-xl-8">
                                            <div class="row">
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card bg-primary text-white">
                                                        <div class="card-header border-0 flex-wrap">
                                                            <div class="revenue-date">
                                                                <span>revenue</span>
                                                                <h4 class="text-white">$310.435</h4>
                                                            </div>
                                                            <div class="avatar-list avatar-list-stacked me-2">
                                                                <img src="images/contacts/pic555.jpg"
                                                                    class="avatar rounded-circle" alt="">
                                                                <img src="images/contacts/pic666.jpg"
                                                                    class="avatar rounded-circle" alt="">
                                                                <span class="avatar rounded-circle bg-white">25+</span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="card-body pb-0 custome-tooltip d-flex align-items-center">
                                                            <div id="chartBar" class="chartBar"></div>
                                                            <div>
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="10" cy="10" r="10" fill="white" />
                                                                    <g clip-path="url(#clip0_3_443)">
                                                                        <path opacity="0.3"
                                                                            d="M13.0641 7.54535C13.3245 7.285 13.3245 6.86289 13.0641 6.60254C12.8038 6.34219 12.3817 6.34219 12.1213 6.60254L6.46445 12.2594C6.2041 12.5197 6.2041 12.9419 6.46445 13.2022C6.7248 13.4626 7.14691 13.4626 7.40726 13.2022L13.0641 7.54535Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M7.40729 7.26921C7.0391 7.26921 6.74062 6.97073 6.74062 6.60254C6.74062 6.23435 7.0391 5.93587 7.40729 5.93587H13.0641C13.4211 5.93587 13.7147 6.21699 13.7302 6.57358L13.9659 11.9947C13.9819 12.3626 13.6966 12.6737 13.3288 12.6897C12.961 12.7057 12.6498 12.4205 12.6338 12.0526L12.4258 7.26921H7.40729Z"
                                                                            fill="black" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_3_443">
                                                                            <rect width="16" height="16" fill="white"
                                                                                transform="matrix(-1 0 0 -1 18 18)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <span class="d-block font-w600">45%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card bg-secondary text-white">
                                                        <div class="card-header border-0">
                                                            <div class="revenue-date">
                                                                <span class="text-black">Expenses</span>
                                                                <h4 class="text-black">$920.035</h4>
                                                            </div>
                                                            <div class="avatar-list avatar-list-stacked me-2">
                                                                <span class="avatar rounded-circle bg-white">
                                                                    <a href="#">
                                                                        <svg width="14" height="15" viewBox="0 0 14 15"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M5.83333 6.27083V1.60417C5.83333 0.959834 6.35567 0.4375 7 0.4375C7.64433 0.4375 8.16667 0.959834 8.16667 1.60417V6.27083H12.8333C13.4777 6.27083 14 6.79317 14 7.4375C14 8.08183 13.4777 8.60417 12.8333 8.60417H8.16667V13.2708C8.16667 13.9152 7.64433 14.4375 7 14.4375C6.35567 14.4375 5.83333 13.9152 5.83333 13.2708V8.60417H1.16667C0.522334 8.60417 0 8.08183 0 7.4375C0 6.79317 0.522334 6.27083 1.16667 6.27083H5.83333Z"
                                                                                fill="#222B40" />
                                                                        </svg>
                                                                    </a>
                                                                </span>
                                                            </div>

                                                        </div>
                                                        <div
                                                            class="card-body pb-0 custome-tooltip d-flex align-items-center">
                                                            <div id="expensesChart" class="chartBar"></div>
                                                            <div>
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="10" cy="10" r="10" fill="#222B40" />
                                                                    <g clip-path="url(#clip0_3_473)">
                                                                        <path opacity="0.3"
                                                                            d="M13.0641 7.54535C13.3245 7.285 13.3245 6.86289 13.0641 6.60254C12.8038 6.34219 12.3817 6.34219 12.1213 6.60254L6.46446 12.2594C6.20411 12.5197 6.20411 12.9419 6.46446 13.2022C6.72481 13.4626 7.14692 13.4626 7.40727 13.2022L13.0641 7.54535Z"
                                                                            fill="white" />
                                                                        <path
                                                                            d="M7.40728 7.26921C7.03909 7.26921 6.74061 6.97073 6.74061 6.60254C6.74061 6.23435 7.03909 5.93587 7.40728 5.93587H13.0641C13.4211 5.93587 13.7147 6.21699 13.7302 6.57358L13.9659 11.9947C13.9819 12.3626 13.6966 12.6737 13.3288 12.6897C12.9609 12.7057 12.6498 12.4205 12.6338 12.0526L12.4258 7.26921H7.40728Z"
                                                                            fill="white" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_3_473">
                                                                            <rect width="16" height="16" fill="white"
                                                                                transform="matrix(-1 0 0 -1 18 18)" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                                <span class="d-block font-w600 text-black">45%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body depostit-card">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between style-1">
                                                                <div>
                                                                    <h6>Tasks Not Finisheds</h6>
                                                                    <h3>20</h3>
                                                                </div>
                                                                <div class="icon-box bg-secondary">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_3_566)">
                                                                            <path opacity="0.3" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z"
                                                                                fill="#222B40" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z"
                                                                                fill="#222B40" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z"
                                                                                fill="#222B40" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_3_566">
                                                                                <rect width="24" height="24"
                                                                                    fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="progress-box mt-0">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="mb-0">Complete Task</p>
                                                                    <p class="mb-0">20/28</p>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-secondary"
                                                                        style="width:50%; height:5px; border-radius:4px;"
                                                                        role="progressbar"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card same-card">
                                                        <div class="card-body depostit-card p-0">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between pb-0">
                                                                <div>
                                                                    <h6>Total Deposit</h6>
                                                                    <h3>$1200.00</h3>
                                                                </div>
                                                                <div class="icon-box bg-primary">
                                                                    <svg width="12" height="20" viewBox="0 0 12 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z"
                                                                            fill="#fff" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div id="NewExperience"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card bg-success rainbow-box"
                                                        style="background-image: url(images/rainbow.gif);background-size: cover;background-blend-mode: luminosity;">
                                                        <div class="card-header border-0">
                                                            <svg width="43" height="40" viewBox="0 0 43 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M41.605 3.94728L34.9548 0.107383C34.7065 -0.0357944 34.4007 -0.0357944 34.1525 0.107383C26.172 4.71641 16.338 4.71713 8.35679 0.108821L8.35391 0.107383C8.10569 -0.0357944 7.7999 -0.0357944 7.55168 0.107383L0.901472 3.94656C0.65325 4.08974 0.5 4.35451 0.5 4.64159V12.3207C0.5 12.6077 0.65325 12.8725 0.901472 13.0157C8.88345 17.6225 13.8004 26.1384 13.8004 35.355V35.3579C13.8004 35.6442 13.9537 35.9097 14.2019 36.0529L20.8521 39.8928C20.9766 39.9647 21.1147 40 21.2536 40C21.3924 40 21.5306 39.964 21.655 39.8928L28.3053 36.0529C28.5535 35.9097 28.7067 35.645 28.7067 35.3579C28.706 26.1413 33.623 17.6247 41.605 13.0164L41.6064 13.0157C41.8546 12.8725 42.0079 12.6077 42.0079 12.3207V4.6423C42.0057 4.35523 41.8532 4.09046 41.605 3.94728ZM40.4013 11.858L20.8514 23.1453C20.6032 23.2885 20.4499 23.5533 20.4499 23.8403V29.8891C19.8168 30.2013 19.3923 30.8712 19.439 31.6345C19.4944 32.5325 20.2139 33.2627 21.1118 33.3304C22.1788 33.4109 23.0696 32.5684 23.0696 31.5187C23.0696 30.8035 22.6559 30.1848 22.0551 29.8883C22.0551 26.4319 23.8991 23.2381 26.8922 21.5099L27.0994 21.3905L27.1001 34.8952L21.2521 38.2718L15.4042 34.8952V12.3214C15.4042 12.035 15.2509 11.7695 15.0027 11.6264L9.76338 8.60163C9.76626 8.56206 9.7677 8.52249 9.7677 8.4822C9.7677 7.45549 8.91583 6.62736 7.88049 6.66694C6.93868 6.70291 6.17171 7.46988 6.13573 8.41169C6.09616 9.44703 6.92429 10.2996 7.951 10.2996C8.32513 10.2996 8.67264 10.1867 8.96115 9.99312C11.9542 11.7213 13.7983 14.9151 13.7983 18.3715V18.6097L2.10229 11.8587V5.10637L7.95028 1.72982L27.5002 13.0171C27.7484 13.1603 28.0542 13.1603 28.3024 13.0171L33.541 9.9924C33.8324 10.1881 34.1842 10.3011 34.5619 10.2989C35.5526 10.2931 36.3664 9.47581 36.3678 8.48508C36.3693 7.47996 35.5555 6.66549 34.5511 6.66549C33.5474 6.66549 32.7344 7.47923 32.7344 8.4822C32.7344 8.52249 32.7359 8.56206 32.7387 8.60163C29.745 10.3298 26.0569 10.3298 23.0631 8.60163L22.8573 8.48292L34.5511 1.72982L40.3991 5.10637V11.858H40.4013Z"
                                                                    fill="white"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="card-body pt-0">
                                                            <div class="finance">
                                                                <h4>Your Finances, safe and Secure</h4>
                                                                <p>
                                                                    It is a long established fact that a reader will be
                                                                    distracted by the readable content of a page when
                                                                    looking at its layout.
                                                                </p>
                                                            </div>
                                                            <div class="d-flex pt-3">
                                                                <div class="avatar-list avatar-list-stacked">
                                                                    <img src="images/contacts/pic555.jpg"
                                                                        class="avatar rounded-circle" alt="">
                                                                    <img src="images/contacts/pic666.jpg"
                                                                        class="avatar rounded-circle" alt="">
                                                                    <img src="images/contacts/pic777.jpg"
                                                                        class="avatar rounded-circle" alt="">
                                                                </div>
                                                                <div class="ratting-data">
                                                                    <h4>15k+</h4>
                                                                    <span>Happy Clients</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body" style="position: relative;">
                                                            <div id="redial" style="min-height: 141px;">
                                                                <div id="apexchartsazlfy9u6"
                                                                    class="apexcharts-canvas apexchartsazlfy9u6 apexcharts-theme-light"
                                                                    style="width: 239px; height: 141px;"><svg
                                                                        id="SvgjsSvg1148" width="239" height="141"
                                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        xmlns:svgjs="http://svgjs.com/svgjs"
                                                                        class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                                        transform="translate(0, 0)"
                                                                        style="background: transparent;">
                                                                        <g id="SvgjsG1150"
                                                                            class="apexcharts-inner apexcharts-graphical"
                                                                            transform="translate(44.5, -10)">
                                                                            <defs id="SvgjsDefs1149">
                                                                                <clipPath id="gridRectMaskazlfy9u6">
                                                                                    <rect id="SvgjsRect1152" width="156"
                                                                                        height="162" x="-3" y="-1"
                                                                                        rx="0" ry="0" opacity="1"
                                                                                        stroke-width="0" stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="gridRectMarkerMaskazlfy9u6">
                                                                                    <rect id="SvgjsRect1153" width="154"
                                                                                        height="164" x="-2" y="-2"
                                                                                        rx="0" ry="0" opacity="1"
                                                                                        stroke-width="0" stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <linearGradient
                                                                                    id="SvgjsLinearGradient1158" x1="1"
                                                                                    y1="0" x2="0" y2="1">
                                                                                    <stop id="SvgjsStop1159"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(241,234,255,1)"
                                                                                        offset="0.64"></stop>
                                                                                    <stop id="SvgjsStop1160"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(243,237,255,1)"
                                                                                        offset="0.43"></stop>
                                                                                    <stop id="SvgjsStop1161"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(243,237,255,1)"
                                                                                        offset="0.64"></stop>
                                                                                    <stop id="SvgjsStop1162"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(241,234,255,1)"
                                                                                        offset="0.005"></stop>
                                                                                </linearGradient>
                                                                                <linearGradient
                                                                                    id="SvgjsLinearGradient1169" x1="1"
                                                                                    y1="0" x2="0" y2="1">
                                                                                    <stop id="SvgjsStop1170"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(122,132,155,1)"
                                                                                        offset="0.64"></stop>
                                                                                    <stop id="SvgjsStop1171"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(142,150,170,1)"
                                                                                        offset="0.43"></stop>
                                                                                    <stop id="SvgjsStop1172"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(142,150,170,1)"
                                                                                        offset="0.64"></stop>
                                                                                    <stop id="SvgjsStop1173"
                                                                                        stop-opacity="1"
                                                                                        stop-color="rgba(122,132,155,1)"
                                                                                        offset="0.005"></stop>
                                                                                </linearGradient>
                                                                            </defs>
                                                                            <g id="SvgjsG1154"
                                                                                class="apexcharts-radialbar">
                                                                                <g id="SvgjsG1155">
                                                                                    <g id="SvgjsG1156"
                                                                                        class="apexcharts-tracks">
                                                                                        <g id="SvgjsG1157"
                                                                                            class="apexcharts-radialbar-track apexcharts-track"
                                                                                            rel="1">
                                                                                            <path
                                                                                                id="apexcharts-radialbarTrack-0"
                                                                                                d="M 74.99999999999999 127.71951219512195 A 52.71951219512196 52.71951219512196 0 1 1 75.0920128600705 127.71943189873346"
                                                                                                fill="none"
                                                                                                fill-opacity="1"
                                                                                                stroke="rgba(241,234,255,0.85)"
                                                                                                stroke-opacity="1"
                                                                                                stroke-linecap="butt"
                                                                                                stroke-width="11.634146341463415"
                                                                                                stroke-dasharray="0"
                                                                                                class="apexcharts-radialbar-area"
                                                                                                data:pathOrig="M 74.99999999999999 127.71951219512195 A 52.71951219512196 52.71951219512196 0 1 1 75.0920128600705 127.71943189873346">
                                                                                            </path>
                                                                                        </g>
                                                                                    </g>
                                                                                    <g id="SvgjsG1164">
                                                                                        <g id="SvgjsG1168"
                                                                                            class="apexcharts-series apexcharts-radial-series"
                                                                                            seriesName="AveragexResults"
                                                                                            rel="1" data:realIndex="0">
                                                                                            <path id="SvgjsPath1174"
                                                                                                d="M 74.99999999999999 127.71951219512195 A 52.71951219512196 52.71951219512196 0 1 1 127.71951219512195 75"
                                                                                                fill="none"
                                                                                                fill-opacity="0.85"
                                                                                                stroke="url(#SvgjsLinearGradient1169)"
                                                                                                stroke-opacity="1"
                                                                                                stroke-linecap="butt"
                                                                                                stroke-width="11.634146341463415"
                                                                                                stroke-dasharray="0"
                                                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                                                data:angle="270"
                                                                                                data:value="75"
                                                                                                index="0" j="0"
                                                                                                data:pathOrig="M 74.99999999999999 127.71951219512195 A 52.71951219512196 52.71951219512196 0 1 1 127.71951219512195 75">
                                                                                            </path>
                                                                                        </g>
                                                                                        <circle id="SvgjsCircle1165"
                                                                                            r="26.902439024390247"
                                                                                            cx="75" cy="75"
                                                                                            class="apexcharts-radialbar-hollow"
                                                                                            fill="transparent"></circle>
                                                                                        <g id="SvgjsG1166"
                                                                                            class="apexcharts-datalabels-group"
                                                                                            transform="translate(0, 0) scale(1)"
                                                                                            style="opacity: 1;"><text
                                                                                                id="SvgjsText1167"
                                                                                                font-family="Helvetica, Arial, sans-serif"
                                                                                                x="75" y="80"
                                                                                                text-anchor="middle"
                                                                                                dominant-baseline="auto"
                                                                                                font-size="24px"
                                                                                                font-weight="600"
                                                                                                fill="#000000"
                                                                                                class="apexcharts-text apexcharts-datalabel-value"
                                                                                                style="font-family: Helvetica, Arial, sans-serif;">75%</text>
                                                                                        </g>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                            <line id="SvgjsLine1175" x1="0" y1="0"
                                                                                x2="150" y2="0" stroke="#b6b6b6"
                                                                                stroke-dasharray="0" stroke-width="1"
                                                                                class="apexcharts-ycrosshairs"></line>
                                                                            <line id="SvgjsLine1176" x1="0" y1="0"
                                                                                x2="150" y2="0" stroke-dasharray="0"
                                                                                stroke-width="0"
                                                                                class="apexcharts-ycrosshairs-hidden">
                                                                            </line>
                                                                        </g>
                                                                        <g id="SvgjsG1151"
                                                                            class="apexcharts-annotations">
                                                                        </g>
                                                                    </svg>
                                                                    <div class="apexcharts-legend"></div>
                                                                </div>
                                                            </div>
                                                            <span class="right-sign">
                                                                <svg width="93" height="93" viewBox="0 0 93 93"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g filter="url(#filter0_d_3_700)">
                                                                        <circle cx="46.5" cy="31.5" r="16.5"
                                                                            fill="#F8B940">
                                                                        </circle>
                                                                    </g>
                                                                    <g clip-path="url(#clip0_3_700)">
                                                                        <path
                                                                            d="M52.738 25.3524C53.0957 24.9315 53.7268 24.8804 54.1476 25.2381C54.5684 25.5957 54.6196 26.2268 54.2619 26.6476L45.7619 36.6476C45.3986 37.0751 44.7549 37.1201 44.3356 36.7474L39.8356 32.7474C39.4228 32.3805 39.3857 31.7484 39.7526 31.3356C40.1195 30.9229 40.7516 30.8857 41.1643 31.2526L44.9002 34.5733L52.738 25.3524Z"
                                                                            fill="#222B40"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <filter id="filter0_d_3_700" x="0" y="0"
                                                                            width="93" height="93"
                                                                            filterUnits="userSpaceOnUse"
                                                                            color-interpolation-filters="sRGB">
                                                                            <feFlood flood-opacity="0"
                                                                                result="BackgroundImageFix"></feFlood>
                                                                            <feColorMatrix in="SourceAlpha"
                                                                                type="matrix"
                                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                                result="hardAlpha"></feColorMatrix>
                                                                            <feOffset dy="15"></feOffset>
                                                                            <feGaussianBlur stdDeviation="15">
                                                                            </feGaussianBlur>
                                                                            <feComposite in2="hardAlpha" operator="out">
                                                                            </feComposite>
                                                                            <feColorMatrix type="matrix"
                                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0">
                                                                            </feColorMatrix>
                                                                            <feBlend mode="normal"
                                                                                in2="BackgroundImageFix"
                                                                                result="effect1_dropShadow_3_700">
                                                                            </feBlend>
                                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                                in2="effect1_dropShadow_3_700"
                                                                                result="shape"></feBlend>
                                                                        </filter>
                                                                        <clipPath id="clip0_3_700">
                                                                            <rect width="24" height="24" fill="white"
                                                                                transform="translate(35 19)"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <div class="redia-date text-center">
                                                                <h4>My Progress</h4>
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur
                                                                </p>
                                                                <a href="crm.html"
                                                                    class="btn btn-secondary text-black">More
                                                                    Details</a>
                                                            </div>
                                                            <div class="resize-triggers">
                                                                <div class="expand-trigger">
                                                                    <div style="width: 275px; height: 329px;"></div>
                                                                </div>
                                                                <div class="contract-trigger"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="card overflow-hidden">
											<div class="card-header border-0 pb-0 flex-wrap">
												<h4 class="heading mb-0">Projects Overview</h4>
												<ul class="nav nav-pills mix-chart-tab" id="pills-tab" role="tablist">
												  <li class="nav-item" role="presentation">
													<button class="nav-link active" data-series="week" id="pills-week-tab" data-bs-toggle="pill" data-bs-target="#pills-week" type="button" role="tab"  aria-selected="true">Week</button>
												  </li>
												  <li class="nav-item" role="presentation">
													<button class="nav-link" data-series="month" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab"  aria-selected="false">Month</button>
												  </li>
												  <li class="nav-item" role="presentation">
													<button class="nav-link" data-series="year" id="pills-year-tab" data-bs-toggle="pill" data-bs-target="#pills-year" type="button" role="tab"  aria-selected="false">Year</button>
												  </li>
												   <li class="nav-item" role="presentation">
													<button class="nav-link" data-series="all" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-selected="false">All</button>
												  </li>
												</ul>
											</div>
											<div class="card-body custome-tooltip p-0">
													<div id="overiewChart"></div>
												<div class="ttl-project">
													<div class="pr-data">
														<h5>12,721</h5>
														<span>Number of Projects</span>
													</div>
													<div class="pr-data">
														<h5 class="text-primary">721</h5>
														<span>Active Projects</span>
													</div>
													<div class="pr-data">
														<h5>$2,50,523</h5>
														<span>Revenue</span>
													</div>
													<div class="pr-data">
														<h5 class="text-success">12,275h</h5>
														<span>Working Hours</span>
													</div>
												</div>
											</div>
										</div> -->
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <div class="card-header border-0 flex-wrap">
                                                    <h4 class="heading mb-0">My To Do Items</h4>
                                                    <div>
                                                        <a href="javascript:void(0);" class="text-primary me-2">View
                                                            All</a>
                                                        <a href="javascript:void(0);" class="text-black"> + Add To
                                                            Do</a>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="dt-do-bx">
                                                        <div
                                                            class="draggable-zone dropzoneContainer to-dodroup dz-scroll">
                                                            <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <span
                                                                                class="text-warning dang d-block mb-2">
                                                                                Dr. Jackson
                                                                            </span>
                                                                            <div
                                                                                class="d-flex justify-content-between flex-wrap">
                                                                                <div class="d-items-2">
                                                                                    <div class="svg-icon">
                                                                                        <svg width="9" height="16"
                                                                                            viewBox="0 0 9 16"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                        </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div
                                                                                            class="form-check custom-checkbox">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="customCheckBox1"
                                                                                                required>
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="customCheckBox1">Publisher</label>
                                                                                        </div>
                                                                                        <span>2023-12-26 07:15:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="new-1 mt-4">
                                                                                <input type="text" class="form-control"
                                                                                    id="usr">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <span
                                                                                class="text-success dang d-block mb-2">
                                                                                Dr. Vino
                                                                            </span>
                                                                            <div
                                                                                class="d-flex justify-content-between flex-wrap">
                                                                                <div class="d-items-2">
                                                                                    <div class="svg-icon">
                                                                                        <svg width="9" height="16"
                                                                                            viewBox="0 0 9 16"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="3"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="6"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="9"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="12"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="15"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="3"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="6"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="9"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="12"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="15"
                                                                                                width="1" height="1"
                                                                                                fill="#888888" />
                                                                                        </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div
                                                                                            class="form-check custom-checkbox">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="customCheckBox2"
                                                                                                required>
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="customCheckBox2">Distributor</label>
                                                                                        </div>
                                                                                        <span>2023-12-26
                                                                                            07:15:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="new-1 mt-4">
                                                                                <input type="text"
                                                                                    class="form-control" id="usr">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <span
                                                                                class="text-primary dang d-block mb-2">
                                                                                Dr. Jackson
                                                                            </span>
                                                                            <div
                                                                                class="d-flex justify-content-between flex-wrap">
                                                                                <div class="d-items-2">
                                                                                    <div class="svg-icon">
                                                                                        <svg width="9" height="16"
                                                                                            viewBox="0 0 9 16"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect width="1" height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="4" y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="3" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="6" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="9" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="12" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                            <rect x="8" y="15" width="1"
                                                                                                height="1"
                                                                                                fill="#888888" />
                                                                                        </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div
                                                                                            class="form-check custom-checkbox">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="customCheckBox1"
                                                                                                required>
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="customCheckBox1">Publisher And Distributor</label>
                                                                                        </div>
                                                                                        <span>2023-12-26 07:15:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="new-1 mt-4">
                                                                                <input type="text" class="form-control"
                                                                                    id="usr">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!-- <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-wrap">
                                                                        <div class="d-items-2">
                                                                            <div class="svg-icon">
                                                                                <svg width="9" height="16"
                                                                                    viewBox="0 0 9 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="3" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="6" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="9" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="12" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="15" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="8" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                </svg>
                                                                            </div>
                                                                            <div>
                                                                                <div class="form-check custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="customCheckBox3" required>
                                                                                    <label class="form-check-label"
                                                                                        for="customCheckBox3">Compete
                                                                                        this
                                                                                        projects</label>
                                                                                </div>
                                                                                <span>2023-12-26 07:15:00</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-danger-light me-1">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path d="M13.8055 4.1598H2.50012"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M11.6271 4.1598C11.1037 4.1598 10.6531 3.7898 10.5504 3.27713L10.3884 2.46647C10.2884 2.09247 9.94974 1.8338 9.56374 1.8338H6.74174C6.35574 1.8338 6.01707 2.09247 5.91707 2.46647L5.75507 3.27713C5.65241 3.7898 5.20174 4.1598 4.67841 4.1598"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-primary-light">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9.16492 13.6286H14"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M8.52001 2.52986C9.0371 1.91186 9.96666 1.82124 10.5975 2.32782C10.6324 2.35531 11.753 3.22586 11.753 3.22586C12.446 3.64479 12.6613 4.5354 12.2329 5.21506C12.2102 5.25146 5.87463 13.1763 5.87463 13.1763C5.66385 13.4393 5.34389 13.5945 5.00194 13.5982L2.57569 13.6287L2.02902 11.3149C1.95244 10.9895 2.02902 10.6478 2.2398 10.3849L8.52001 2.52986Z"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M7.34723 4.00059L10.9821 6.79201"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-wrap">
                                                                        <div class="d-items-2">
                                                                            <div class="svg-icon">
                                                                                <svg width="9" height="16"
                                                                                    viewBox="0 0 9 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="3" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="6" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="9" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="12" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="15" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="8" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                </svg>
                                                                            </div>
                                                                            <div>
                                                                                <div class="form-check custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="customCheckBox4" required>
                                                                                    <label class="form-check-label"
                                                                                        for="customCheckBox4">Compete
                                                                                        this
                                                                                        projects Monday</label>
                                                                                </div>
                                                                                <span>2023-12-26 07:15:00</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-danger-light me-1">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path d="M13.8055 4.1598H2.50012"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M11.6271 4.1598C11.1037 4.1598 10.6531 3.7898 10.5504 3.27713L10.3884 2.46647C10.2884 2.09247 9.94974 1.8338 9.56374 1.8338H6.74174C6.35574 1.8338 6.01707 2.09247 5.91707 2.46647L5.75507 3.27713C5.65241 3.7898 5.20174 4.1598 4.67841 4.1598"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-primary-light">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9.16492 13.6286H14"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M8.52001 2.52986C9.0371 1.91186 9.96666 1.82124 10.5975 2.32782C10.6324 2.35531 11.753 3.22586 11.753 3.22586C12.446 3.64479 12.6613 4.5354 12.2329 5.21506C12.2102 5.25146 5.87463 13.1763 5.87463 13.1763C5.66385 13.4393 5.34389 13.5945 5.00194 13.5982L2.57569 13.6287L2.02902 11.3149C1.95244 10.9895 2.02902 10.6478 2.2398 10.3849L8.52001 2.52986Z"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M7.34723 4.00059L10.9821 6.79201"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="sub-card draggable-handle draggable">
                                                                <div class="d-items">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-wrap">
                                                                        <div class="d-items-2">
                                                                            <div class="svg-icon">
                                                                                <svg width="9" height="16"
                                                                                    viewBox="0 0 9 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <rect width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="3" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="6" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="9" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="12" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect y="15" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="4" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="4" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" width="1" height="1"
                                                                                        fill="#888888" />
                                                                                    <rect x="8" y="3" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="6" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="9" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="12" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                    <rect x="8" y="15" width="1"
                                                                                        height="1" fill="#888888" />
                                                                                </svg>
                                                                            </div>
                                                                            <div>
                                                                                <div class="form-check custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        id="customCheckBox5" required>
                                                                                    <label class="form-check-label"
                                                                                        for="customCheckBox5">Compete
                                                                                        this
                                                                                        projects Monday</label>
                                                                                </div>
                                                                                <span>2023-12-26 07:15:00</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-danger-light me-1">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path d="M13.8055 4.1598H2.50012"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M11.6271 4.1598C11.1037 4.1598 10.6531 3.7898 10.5504 3.27713L10.3884 2.46647C10.2884 2.09247 9.94974 1.8338 9.56374 1.8338H6.74174C6.35574 1.8338 6.01707 2.09247 5.91707 2.46647L5.75507 3.27713C5.65241 3.7898 5.20174 4.1598 4.67841 4.1598"
                                                                                        stroke="#FF5E5E"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </div>
                                                                            <div
                                                                                class="icon-box icon-box-sm bg-primary-light">
                                                                                <svg width="16" height="16"
                                                                                    viewBox="0 0 16 16" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M9.16492 13.6286H14"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M8.52001 2.52986C9.0371 1.91186 9.96666 1.82124 10.5975 2.32782C10.6324 2.35531 11.753 3.22586 11.753 3.22586C12.446 3.64479 12.6613 4.5354 12.2329 5.21506C12.2102 5.25146 5.87463 13.1763 5.87463 13.1763C5.66385 13.4393 5.34389 13.5945 5.00194 13.5982L2.57569 13.6287L2.02902 11.3149C1.95244 10.9895 2.02902 10.6478 2.2398 10.3849L8.52001 2.52986Z"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M7.34723 4.00059L10.9821 6.79201"
                                                                                        stroke="#0D99FF"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- publisher -->
                        <div class="col-xl-12 col-xxl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Publisher</h4>
                                        </div>
                                        <table id="projects-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User Type</th>
                                                    <th>District</th>
                                                    <th>Date</th>
                                                    <th>Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Batman</td>
                                                    <td>Publisher</td>
                                                    <td class="pe-0">
                                                        <span class="badge badge-danger light border-0">Vellore</span>
                                                    </td>
                                                    <!-- <td>Publisher</td> -->
                                                    <td class="text-success">
                                                        06 Sep 2021
                                                    </td>
                                                    <td>
                                                        <a href="pub_profile.php"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Distributor -->
                        <div class="col-xl-12 col-xxl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Distributor</h4>
                                        </div>
                                        <table id="projects-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User Type</th>
                                                    <th>District</th>
                                                    <th>Date</th>
                                                    <th>Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Batman</td>
                                                    <td>Distributor</td>
                                                    <!-- <td>Publisher And Distributor</td> -->
                                                    <td class="pe-0">
                                                        <span class="badge badge-danger light border-0">Vellore</span>
                                                    </td>
                                                    <!-- <td>Publisher</td> -->
                                                    <td class="text-success">
                                                        06 Sep 2021
                                                    </td>
                                                    <td>
                                                        <a href="dist_profile.php"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Publisher And Distributor -->
                        <div class="col-xl-12 col-xxl-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Publisher And Distributor</h4>
                                        </div>
                                        <table id="projects-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User Type</th>
                                                    <th>District</th>
                                                    <th>Date</th>
                                                    <th>Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Batman</td>
                                                    <td>Publisher And Distributor</td>
                                                    <td class="pe-0">
                                                        <span class="badge badge-danger light border-0">Vellore</span>
                                                    </td>
                                                    <!-- <td>Publisher</td> -->
                                                    <td class="text-success">
                                                        06 Sep 2021
                                                    </td>
                                                    <td>
                                                        <a href="publisher_and_dis_profile.php"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>

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
        <?php
            include "footer.php";
        ?>
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
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="./vendor/draggable/draggable.js"></script>
    <script src="./vendor/swiper/js/swiper-bundle.min.js"></script>


    <!-- tagify -->
    <script src="./vendor/tagify/dist/tagify.js"></script>

    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="./vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="./vendor/datatables/js/jszip.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

    <!-- Apex Chart -->

    <script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


    <!-- Vectormap -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./js/deznav-init.js"></script>
    <script src="./js/demo.js"></script>
    <script src="./js/styleSwitcher.js"></script>



</body>

</html>
