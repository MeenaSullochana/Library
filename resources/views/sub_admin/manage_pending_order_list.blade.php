
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Pending Order List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="zone_type_add.php">
                                <i class="fas fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 active-p">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-colm" role="tabpanel"
                                aria-labelledby="pills-colm-tab">
                                <div class="card">
                                    <div class="card-body px-0">
                                        <div class="table-responsive active-projects user-tbl  dt-filter">
                                            <div id="user-tbl_wrapper" class="dataTables_wrapper no-footer">
                                                <div class=" text-right">
                                                    <div class="dt-buttons btn-group flex-wrap mb-3 p-3">
                                                        <button class="btn btn-secondary buttons-print" tabindex="0"
                                                            aria-controls="report_table" type="button"><span><i
                                                                    class="fas fa-print"></i> Print</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-excel buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="far fa-file-excel"></i>
                                                                Excel</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-csv buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="fas fa-file-csv"></i>
                                                                CSV</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-pdf buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="far fa-file-pdf"></i>
                                                                PDF</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="user-tbl" class="table shorting dataTable no-footer" role="grid"
                                                aria-describedby="user-tbl_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_desc" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 0px;" aria-sort="descending">
                                                            <div class="form-check custom-checkbox ms-0">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="checkAll" required="">
                                                                <label class="form-check-label" for="checkAll"></label>
                                                            </div>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="#: activate to sort column ascending"
                                                            style="width: 0px;">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Order Id: activate to sort column ascending"
                                                            style="width: 0px;">Order Id</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer Name: activate to sort column ascending"
                                                            style="width: 0px;">Customer Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date: activate to sort column ascending"
                                                            style="width: 0px;">Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Payment Gateway: activate to sort column ascending"
                                                            style="width: 0px;">Payment</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Order Status: activate to sort column ascending"
                                                            style="width: 0px;">Order Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Payment Status: activate to sort column ascending"
                                                            style="width: 0px;">Payment Status</th>

                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending"
                                                            style="width: 0px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox3" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox3"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>01</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>#40597</h6>
                                                                <!-- <span>INV-100023456</span> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <!-- <h6>#40597</h6> -->
                                                                <span> library name</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>2023-10-15 11:01 pm</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>Card</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="complete">Complete</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="testing">Testing</option>
                                                                <option value="progress">In Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-1"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="pending">Pending</option>
                                                                <option value="complete">Complete</option>
                                                                <option value="progress">Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-2"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="manage_view_order_details.php"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr role="row" class="even">
                                                    <td class="sorting_1">
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox3" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox3"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>02</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>#40597</h6>
                                                                <!-- <span>INV-100023456</span> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <!-- <h6>#40597</h6> -->
                                                                <span>Selva</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>2023-10-15 11:01 pm</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>LOCAL</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="complete">Complete</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="testing">Testing</option>
                                                                <option value="progress">In Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-1"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="pending">Pending</option>
                                                                <option value="complete">Complete</option>
                                                                <option value="progress">Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-2"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="manage_view_order_details.php"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        <div class="form-check custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox3" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox3"></label>
                                                        </div>
                                                    </td>
                                                    <td><span>03</span></td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <h6>#40597</h6>
                                                                <!-- <span>INV-100023456</span> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <!-- <h6>#40597</h6> -->
                                                                <span>Selva</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>2023-10-15 11:01 pm</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="products">
                                                            <div>
                                                                <span>LOCAL</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="complete">Complete</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="testing">Testing</option>
                                                                <option value="progress">In Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-1"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div
                                                            class="dropdown bootstrap-select default-select status-select">
                                                            <select class="default-select status-select">
                                                                <option value="pending">Pending</option>
                                                                <option value="complete">Complete</option>
                                                                <option value="progress">Progress</option>
                                                            </select>
                                                            <div class="dropdown-menu ">
                                                                <div class="inner show" role="listbox" id="bs-select-2"
                                                                    tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"
                                                                        role="presentation"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="manage_view_order_details.php"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
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
