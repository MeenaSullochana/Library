<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - List of Payment Receipt</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
    include 'distributor/plugin/plugin_css.php';
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
        @include ('distributor.navigation')

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
                                <b>List of Payment Receipt</b>
                            </h3>
                            <a onclick="javascript:window.history.back();" class="btn btn-primary  btn-sm" href="/distributor/index">
                                <i class="fa fa-angle-double-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-5">
                            @php
                                $payment = DB::table('procurement_paymrnts')
                                    ->where('userId', '=', auth('distributor')->user()->id)
                                    ->get();
                            @endphp

                            <div class="table-responsive">
                                <table id="example4" class="display table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th>User Name</th>
                                            <th>User Type</th>
                                            <th>Invoice Number</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($payment as $val)
                                            <tr>
                                                <td data-label="S/No">{{ $loop->index + 1 }}</td>
                                                <td data-label="User Name">{{ $val->userName }}</td>
                                                <td data-label="User Type">{{ $val->userType }}</td>
                                                <td data-label="Invoice Number">{{ $val->invoiceNumber }}</td>

                                                <td data-label="Date">{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d ') }}</td>
                                                <td data-label="Control"><a href="/distributor/payment_recept/{{ $val->id }}"><i
                                                            class="fa fa-eye p-2"></i></a>

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
    <!--**********************************
         Content body end
         ***********************************-->
    <!--**********************************
         Footer start
         ***********************************-->
    @include ('distributor.footer')
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
    include 'distributor/plugin/plugin_js.php';
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
    th{
     font-weight: bolder;
    }
    .active-projects.style-1 .dt-buttons .dt-button {
     top: -50px;
     right: 0 !important;
     }
     .active-projects tbody tr td:last-child {
         text-align: center;
     }

 </style>
