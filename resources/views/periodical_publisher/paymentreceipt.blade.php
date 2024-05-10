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
        include "periodical_publisher/plugin/plugin_css.php";
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
        @include ('periodical_publisher.navigation')
		<!--**********************************
            Sidebar end
        ***********************************-->
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Payment Acknowledgement </b>
                            </h3>
                            <div class="print-section">
                                <a class="btn btn-primary  btn-sm" href="/periodical_publisher/procurement_payment_list">
                                <i class="fa fa-angle-left"></i> Back </a>

                                <button type="button" class="btn btn-primary" id="print_invoice" onclick="generatePdf()"><span class="btn-icon-start text-primary"><i class="fas fa-file-pdf"></i></span>PDF</button>

                            </div>                                
                        </div>
                    </div>
                </div>

                <div class="card" id="print-pdf">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="data:image/jpeg;base64,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" class="mx-auto">
                            </div>
                            <h3 class="text-center pt-2">Directorate of Public Libraries<br> Chennai- 600 002</h3>
                            <h4 class="text-center pt-2" >Transparent Book Procurement Portal <br> Review Fee for Book Selection</h4>
                        </div>
                        <div class="row p-3 text-center">
                            <div class="col-6">
                                <p><b>Name </b>	: Selva A</p>
                            </div>
                            <div class="col-6 text-left">
                                <p class="p-0 m-0"><b>Acknowledgement  No</b> : 96369248 </p>
                                <p class="p-0 m-0">Date: 2024-05-07</p>
                            </div>
                        </div>
                        <table class="table responsive mt-5">
                            <thead>
                                <tr role="row">
                                    <th>S/No</th>
                                    <th>Book Id</th>
                                    <th>Title of the Book</th>
                                    <th>ISBN Number</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr role="row" class="odd">
                                        <td><span>1</span></td>
                                        <td>25563424</td>
                                        <td>இறுதிச் சொற்பொழிவு</td>
                                        <td>9788183223584</td>
                                        <td>1</td>
                                        <td><i class="fa fa-inr ms-2"></i> 450</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="fw-bold text-end" colspan="5">Total Amount</td>
                                        <td class="fw-bold">: <i class="fa fa-inr ms-2"></i> 1234</td>
                                    </tr>
                                </tbody>
                        </table>
                        <p class="text-center"><span class="text-danger ">Note:</span> Review Fee for Book Selection is Non Refundable.</p>
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
        @include ("periodical_publisher.footer")
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
               include "periodical_publisher/plugin/plugin_js.php";

    ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    function generatePdf() {
        let htmlElement = document.getElementById('print-pdf');
        html2pdf().from(htmlElement).save('book_receipt.pdf');
    }
</script>
</html>
