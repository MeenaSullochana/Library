
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
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
        @include ('publisher_and_distributor.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
            </div>
            <table class="body-wrap mx-auto bg-white">
                <tbody>
                    <tr>
                        <td></td>
                        <td class="container" width="600">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td class="content-wrap aligncenter">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="content-block">
                                                                <h2>Thanks for Applying Procurement</h2>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="content-block">
                                                                <table class="invoice">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{ auth('publisher_distributor')->user()->firstName }} {{ auth('publisher_distributor')->user()->lastName }}<br>Invoice #{{$data->invoiceNumber}}<br>{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d ') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                    <thead>
                                                                                    @foreach($data->bookdata as $val)
                                                                                        <th>{{$val['bookname']}} </th>
                                                                                        <th  class="alignright">${{$data->amount}} </th>

                                                                                   </thead>
                                                                                   @endforeach
                                                                                        <tr class="total">
                                                                                            <td class="alignright" width="80%">Total</td>
                                                                                            <td class="alignright">$ {{$data->totalAmount}}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="content-block">
                                                                <a href="#">View in browser</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="content-block">
                                                                Company Inc. India
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="footer">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@company.inc</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
        @include ("publisher_and_distributor.footer")
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
    <style>
        /* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
        a {
            color: #1ab394;
            text-decoration: underline;
        }

        .btn-primary {
            text-decoration: none;
            color: #FFF;
            background-color: #1ab394;
            border: solid #1ab394;
            border-width: 5px 10px;
            line-height: 2;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 5px;
            text-transform: capitalize;
        }

        /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .aligncenter {
            text-align: center;
        }

        .alignright {
            text-align: right;
        }

        .alignleft {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        /* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
        .alert {
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            padding: 20px;
            text-align: center;
            border-radius: 3px 3px 0 0;
        }

        .alert a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .alert.alert-warning {
            background: #f8ac59;
        }

        .alert.alert-bad {
            background: #ed5565;
        }

        .alert.alert-good {
            background: #1ab394;
        }

        /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
        .invoice {
            margin: 40px auto;
            text-align: left;
            width: 80%;
        }

        .invoice td {
            padding: 5px 0;
        }

        .invoice .invoice-items {
            width: 100%;
        }

        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }

        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
        @media only screen and (max-width: 640px) {

            h1,
            h2,
            h3,
            h4 {
                font-weight: 600 !important;
                margin: 20px 0 5px !important;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .container {
                width: 100% !important;
            }

            .content,
            .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }
    </style>
  <?php
        include "publisher_and_distributor/plugin/plugin_js.php";
    ?>
</body>

</html>
