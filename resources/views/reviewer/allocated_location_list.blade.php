
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
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <?php
        include "plugin/plugin_css.php";
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Allocated Location List</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="fair_manage_add.php">
                                <i class="fas fa-plus"></i> Add </a> -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example4_wrapper   " class="dataTables_wrapper no-footer">
                                    <table id="example4" class="display table dataTable no-footer"
                                        style="min-width: 845px" role="grid" aria-describedby="example4_info">
                                        <thead>
                                        <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example4"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Roll No: activate to sort column descending"
                                                    style="width: 85.0156px;">Roll No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Event Name: activate to sort column ascending"
                                                    style="width: 130.469px;"> Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Contact Name: activate to sort column ascending"
                                                    style="width: 153.641px;">Contact Number</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Contact Number : activate to sort column ascending"
                                                    style="width: 175.953px;">District </th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Status : activate to sort column ascending"
                                                    style="width: 85.9219px;">Status </th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Status : activate to sort column ascending"
                                                    style="width: 85.9219px;">Change Status </th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Create at: activate to sort column ascending"
                                                    style="width: 161.469px;">Create at</th>
                                                <th class="sorting" tabindex="0" aria-controls="example4" rowspan="1"
                                                    colspan="1" aria-label="Control: activate to sort column ascending"
                                                    style="width: 90.2812px;">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="1">1	</td>
                                                <td data-label="Book fair">Book fair	</td>
                                                <td data-label="Amount">+91 9900990099</td>
                                                <td data-label="Chennai"> <span class="badge light badge-success">Chennai</span></td>
                                                <td data-label="Inactive">
                                                    <span class="badge bg-danger">Inactive</span>
                                                </td>
                                                <td data-label="switch">
                                                    <form method="POST">
                                                        <div class="form-check mt-p00 form-switch">
                                                            <input class="form-check-input" type="checkbox" id="statusId2" name="featured_status" value="Active" data-isprm="2">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td data-label="Period"><span class="badge light badge-success">23-08-23 12:27:01</span>
                                                </td>
                                                <td data-label="controlq">
                                                    <div class="d-flex mt-p0">
                                                        <a href="fair_application_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
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
    <?php
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
</body>

</html>
<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }

  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  .form-check.mt-p00.form-switch {
    display: flex;
    justify-content: flex-end;
}

  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }

  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }

  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }

  table td:last-child {
    border-bottom: 0;
  }
  .d-flex.mt-p0 {
    display: flex;
    justify-content: flex-end;
}
}

/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
</style>
