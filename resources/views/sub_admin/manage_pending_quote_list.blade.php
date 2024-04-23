
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
                                <b>Pending Quote Order Management List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="zone_type_add.php">
                                <i class="fas fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 active-p">
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
                                                            style="width: 0px;">Quote Id</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Customer Name: activate to sort column ascending"
                                                            style="width: 0px;">library/Customer Name</th>
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
                                                            style="width: 0px;">Quote Status</th>
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
                                                                <span>Library Name</span>
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
                                                            <select id="orderstatus" class="default-select status-select">

                                                                <option value="complete">Approve</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="testing">Disapprove</option>
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
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="manage_view_quote_details.php"
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

<!-- Model start -->
<!-- Modal Order Status-->

<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Model Order Status end -->


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
    <script>
        //Use the id of the form instead of #change
$('#orderstatus').change(function(){
  //this is just getting the value that is selected
  var title = $(this).val();
  $('.modal-title').html(title);
  $('.modal').modal('show');
});
        //Use the id of the form instead of #change
        $('#peymentstatus').change(function(){
  //this is just getting the value that is selected
  var title = $(this).val();
  $('.modal-title').html(title);
  $('.modal').modal('show');
});
    </script>
</body>

</html>
