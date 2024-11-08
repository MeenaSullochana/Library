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
    <title>Government of Tamil Nadu - Book Procurement - Library List</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <style>
    .table thead th {
        text-transform: math-auto !important;

    }
    </style>
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
                                <b>Meta Checker Report</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/index">
                                <i class="fa fa-angle-double-left"></i> Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="" onclick="generatePdf()">
                            <span class="btn-icon-start text-primary"><i class="fas fa-file-pdf"></i></span>PDF
                        </button>
                        <button class="btn btn-primary print-button ms-2" onclick="printDiv()">Print</button>
                    </div>


                    <div class="card p-5 printableArea" id="print-pdf">
                        <div class="table-responsive">
                            <table class="table table-bordered">

                                <div class="tbl-caption text-center">
                                    <img class="w-50" src="/assets/img/logo/logo.png" alt="logo">
                                    <h4 class="heading mb-6">Directorate of Public Libraries</h4>
                                    <h4 class="heading mb-6">Chennai - 2</h4>
                                </div>

                                <div class="tbl-caption d-flex justify-content-between">
                                    <h4 class="heading mb-6">Transparent Book Procurement Report</h4>
                                    <h4 class="heading mb-6">Date: <?php echo date('Y-m-d'); ?></h4>

                                </div>
                                <thead class="bg-primary text-white">

                                    <tr>
                                        <th>No. of Books</th>
                                        <th>No. of Books Assigned</th>
                                        <th>No. of Books Completed</th>
                                        <th>No. of Books Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$reviewer->metBooktotal}}</td>
                                        <td>{{$reviewer->metassignooktotal}}</td>
                                        <td>{{$reviewer->metcomooktotal}} </td>
                                        <td>{{$reviewer->metnotcomooktotal}}</td>
                                    </tr>
                                </tbody>

                                <thead class="">

                                    <tr>
                                        <th colspan="4" class="text-center">Metachecker Details</th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;">Metachecker Name</th>
                                        <th style="font-weight: bold;">No. of Books Assigned</th>
                                        <th style="font-weight: bold;">No. of Books Completed</th>
                                        <th style="font-weight: bold;">No. of Books Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $val)
                                    <tr>
                                        <td>{{$val->librarianName}}</td>
                                        <td>{{$val->BookReview}}</td>
                                        <td>{{$val->BookReviewcom}} </td>
                                        <td>{{$val->BookReviewpen}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        @include ('admin.footer')

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
    include 'admin/plugin/plugin_js.php';
    ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
function generatePdf() {
    let htmlElement = document.getElementById('print-pdf');
    html2pdf().from(htmlElement).save('book_report.pdf');
}
</script>
<script>
function printDiv() {
    var printContents = document.querySelector('.printableArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    location.reload(); // Reload the page to restore the original content
}
</script>

</html>