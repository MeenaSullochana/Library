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
    include 'librarian/plugin/plugin_css.php';
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Order Scheme :{{ $data->libraryType }}<b>
                            </h3>
                            
                            <a class="btn btn-primary  btn-sm" href="index">
                                <i class="fas fa-home"></i> Home</a>
     </nav> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="card p-3">
                            <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                <div class="clearfix mb-3 d-flex">
                                    <img class="me-3 rounded" width="70" height="70" alt="image"
                                        src="{{ asset('admin/AdminImage/' . $data->admindata->adminImage) }}">
                                    <div class="media-body me-2">
                                        <h5 class="text-primary mb-0 mt-1">
                                            {{ $data->admindata->name }}</h5>
                                        <p class="mb-0">
                                            {{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="clearfix mb-3">

                                </div>
                            </div>
							<hr>
							<div class="media mb-2 mt-3">
								<div class="media-body ms-3"><span
										class="pull-end">{{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}</span>
									<h5 class="my-1 text-primary">Subject</h5>
									<p class="read-content-email">
									{{ $data->subject }}</p>
								</div>
							</div>
							<div class="card ms-2 p-3">
								<h3 class="text-gray">Total Amount</h3>
								<p class="fw-bold"><i class="fa fa-inr"
										aria-hidden="true"></i>
									{{ $data->totalAmount }}</p>
							</div>
							
							<h5 class="mb-2"><b>Description</b></h5>
							<p style="text-indent: 34px;" class="mb-2">
                            <?php echo $desc; ?>
							</p>
							<h5 class="pt-3">By Order</h5>
							<p style="text-indent: 34px;">
								For Director of Public Libraries
							<hr>
                        </div>
                    </div>
					<div class="col-md-12">
						
						<h3 class="text-gray">Categories Amount</h3>
					</div>
                    @foreach ($data->CategorieAmount1 as $val)
                        <div class="col-xl-2 col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title ca-name">{{ $val->name }} - Tamil</h4>

                                </div>
                             
                                <div class="card-body text-center">
                                    <div class="pie animate no-round"
                                        style="--p:{{ round(($val->tamilAmount / $data->totalAmount) * 100) }}">
                                        {{ round(($val->tamilAmount / $data->totalAmount) * 100) }}
                                        %</div>
                                    <p clas="fw-bold text-center"><i class="fa fa-inr" aria-hidden="true"></i>
                                        <b>{{ $val->tamilAmount }}</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title ca-name">{{ $val->name }} - English</h4>

                                </div>
                           
                                <div class="card-body text-center">
                                    <div class="pie animate no-round"
                                        style="--p:{{ round(($val->englishAmount / $data->totalAmount) * 100) }}">
                                        {{ round(($val->englishAmount / $data->totalAmount) * 100) }}
                                        %</div>
                                    <p clas="fw-bold text-center"><i class="fa fa-inr" aria-hidden="true"></i>
                                        <b>{{ $val->englishAmount }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    @include ('librarian.footer')
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
    include 'librarian/plugin/plugin_js.php';
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
            radial-gradient(farthest-side, #037106 98%, #037106) top / var(--b) var(--b) no-repeat, conic-gradient(#037106 calc(var(--p)* 1%), #00000036 0);
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

    p.ca-name {
        max-height: 100px;
    }
</style>

</html>
