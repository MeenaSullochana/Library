
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
            <div class="row">
				<div class="col-xl-12 col-sm-12">
						<div class="card box-hover">
							<div class="card-body">
								<div class="d-flex align-items-center">
								<div class="icon-box icon-box-lg bg-success-light rounded-circle">
									<i class="bi bi-cart" style="font-size: 30px;"></i>
									</div>
									<div class="total-projects ms-3">
										<h3 class="text-success count text-start">Order Scheme</h3>
										<!-- <span class="text-start">Total Completed</span> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive active-projects task-table">
                                    <div class="tbl-caption">
                                        <h4 class="heading mb-0">Scheme List</h4>
                                    </div>
                                    <table id="example3" class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                </th>
                                                <th>S.No</th>
                                                <th>Library Type</th>
                                                <th>Total Amount</th>

                                                <th>Date</th>
                                                <th class="text-end">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $user=auth('librarian')->user()->libraryType;
                                                              $categories = DB::table('libeaey_budgets')->where('libraryType','=', $user)->get();
                                                               @endphp

                                                        @foreach($categories as $val)
                                            <tr>
                                                <td>
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" required>
                                                        <label class="form-check-label" for="customCheckBox3"></label>
                                                    </div>
                                                </td>
                                                <td><span>{{$loop->index +1}}</span></td>
                                                <td>
                                                    <div class="products">
                                                        <div>
                                                            <!-- <h6>Create Frontend WordPress</h6> -->
                                                            <span>{{$val->libraryType}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">{{$val->totalAmount}}</span>
                                                </td>
                                                <td><span>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d') }}</span></td>
                                                <td>
                                                    <a href="/librarian/order_scheme_read/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>
                                                    <i class="fa fa-trash-o p-2" aria-hidden="true"></i>
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
