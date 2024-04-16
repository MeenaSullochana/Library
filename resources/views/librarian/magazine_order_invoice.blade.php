<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php include 'librarian/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Specify Tamil font family */
        body {
            font-family: 'Noto Sans Tamil', sans-serif;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil&display=swap" rel="stylesheet">
    <!-- Include necessary scripts -->
</head>

<body>

    <!--***
            Preloader start
        ****-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--***
            Preloader end
        ****-->

    <!--****
            Main wrapper start
        *****-->
    <div id="main-wrapper">
        <!--****
                Nav header start
            *****-->
        @include ('librarian.navigation')
        <!--****
                Sidebar end
            *****-->
        <!--****
                Content body start
            *****-->
        <div class="content-body">
            <div class="container">
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Periodicals recommendation list 2024-25</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/librarian/magazine-order-list">
                                <i class="fas fa-chevron-left"></i> Back </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-4 d-flex bg-white p-3">
                    <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                        <label class="form-label">Print Option</label>
                    </div>
                    <div class="col-xl-9 col-sm-6 mt-4 text-end">
                        <a href="magazine_invoice">
                        <button type="button" class="btn btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-file-pdf-o"></i>
                        </span>PDF</button>
                        <button type="button" class="btn  btn-info"><span class="btn-icon-start text-info"><i class="fa fa-print"></i>
                        </span>Print</button>
                        <button type="button" class="btn  btn-warning"><span class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                        </span>Download</button>    
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card mt-3">
                            <div class="card-header">                                     
                                <strong>Status : <span class="text-bold"> Pending</span></strong> 
                                <strong>{{ \Carbon\Carbon::parse($data->created_at)->format('d-M-Y') }}</strong> <span class="float-end">

                                <button type="button" class="btn btn-primary" id="print_invoice" onclick="generatePdf()"><span class="btn-icon-start text-primary"><i class="fas fa-file-pdf"></i></span>PDF</button>

                                <!-- <button type="button" class="btn  btn-info"><span class="btn-icon-start text-info"><i class="fas fa-file-excel"></i>
                                    </span>Excel</button> -->
                                {{-- <span class="badge bg-primary"><i class="fa fa-print"></i></span>
                                <span class="badge bg-primary"><i class="bi bi-file-earmark-excel-fill"></i></span> --}}
                                </strong> 
                            </div>
                            <div class="card-body" id="print-pdf">
                                <div class="row mb-5">
                                <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                @if(auth('librarian')->user()->allow_status ==0)

                                @php
                                $librarian = DB::table('librarians')->where('id','=',$data->librarianid)->first();
                                
                                @endphp
                                        <h6>From:</h6>
                                        <div> <strong>{{$librarian->libraryType}}</strong> </div>
                                        <div>{{$librarian->libraryName}}</div>
                                        <div>
                                            @if($librarian->door_no != null)
                                            {{$librarian->door_no}},
                                            @endif
                                        {{$librarian->street}}
                                        {{$librarian->place}}
                                        {{$librarian->Village}}
                                        {{$librarian->post}}
                                        {{$librarian->taluk}}
                                        {{$librarian->district}}
                                        {{$librarian->pincode}}
                                        {{$librarian->landmark}}
                                    </div>
                                        <!-- <div>Email: info@webz.com.pl</div> -->
                                        <div>Phone:{{$librarian->phoneNumber}}</div>
                                    </div>
                                  @else
                                  <h6>From:</h6>
                                        <div> <strong>{{auth('librarian')->user()->libraryType}}</strong> </div>
                                        <div>{{auth('librarian')->user()->libraryName}}</div>
                                        <div>
                                            @if(auth('librarian')->user()->door_no != null)
                                            {{auth('librarian')->user()->door_no}},
                                            @endif
                                       
                                        {{auth('librarian')->user()->street}}
                                        {{auth('librarian')->user()->place}}
                                        {{auth('librarian')->user()->Village}}
                                        {{auth('librarian')->user()->post}}
                                        {{auth('librarian')->user()->taluk}}
                                        {{auth('librarian')->user()->district}}
                                        {{auth('librarian')->user()->pincode}}
                                        {{auth('librarian')->user()->landmark}}
                                    </div>
                                        <!-- <div>Email: info@webz.com.pl</div> -->
                                        <div>Phone:{{auth('librarian')->user()->phoneNumber}}</div>
                                    </div>

                                  @endif
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                    <h6>To:</h6>
                                    <div> <strong>Directorate of Public Libraries</strong> </div>

                                    <div>737/1, Anna Salai,</div>
                                    <div>Chennai- 600 002,</div>
                                    <div>Tamil Nadu, India.</div>
                                    <div>Telephone: 044-28524263</div>
                                    <div> Fax: 044-28412087</div>
                                    <div> Email : dplchn@tn.gov.in</div>
                                </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="row align-items-center">
											<div class="col-sm-12"> 
												<div class="brand-logo mb-2 inovice-logo text-center">
                                                    <img src="https://bookprocurement.tamilnadupubliclibraries.org/assets/img/logo/logo.png" alt="" srcset="" style="width: 50%">
												</div>
                                               <p class="p-0 m-0 text-center"><span class="fw-bold">Date</span> : {{ \Carbon\Carbon::parse($data->created_at)->format('d-M-Y') }}</p>
                                               @if(auth('librarian')->user()->allow_status ==0)

                                               <p class="p-0 m-0 text-center"><span class="fw-bold">Library Id</span> : {{$librarian->librarianId}}</p>
                                               @else
                                               <p class="p-0 m-0 text-center"><span class="fw-bold">Library Id</span> : {{auth('librarian')->user()->librarianId}}</p>

                                               @endif
                                            </div>
                                            {{-- <div class="col-sm-3 mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/TamilNadu_Logo.svg/933px-TamilNadu_Logo.svg.png" alt="" srcset="" style="width: 70px"> </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-border">
                                        <thead>
                                            <tr>
                                                <th class="center">S.No</th>
                                                <!-- <th>Magazine Book id</th> -->
                                                <th>Magazine Title </th>
                                                <th>Category </th>
                                                <th>Cost</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data->magazineProduct as $val)
                                            <tr>
                                                <td class="center">{{$loop->index + 1}}</td>
                                                <td class="left strong">{{$val->title}}</td>
                                                <td class="left">{{$val->category}}</td>
                                                <td class="right"><i class="fa fa-inr"></i> {{$val->magazine_price}}</td>
                                                <td class="center">{{$val->quantity}}</td>
                                                <td class="right"><i class="fa fa-inr"></i> {{$val->magazine_price}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto table-margin">
                                        <table class="table table-clear">
                                            <tbody>
                                                <!-- <tr>
                                                    <td class="left"><strong class="text-dark">Subtotal</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Discount (20%)</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">GST (0%)</strong></td>
                                                    <td class="right"><i class="fa fa-rupee"></i> 679,76</td>
                                                </tr> -->
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Total : </strong></td>
                                                    <td class="right"><strong class="text-dark"><i class="fa fa-inr"></i> {{$data->totalPurchased}}</strong><br>
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
    <!--****
                Content body end
            *****-->
    <!--****
                Footer start
            *****-->
    @include ('librarian.footer')
    <!--****
                Footer end
            *****-->

    <!--****
            Support ticket button start
            *****-->

    <!--****
            Support ticket button end
            *****-->


    </div>
    <!--****
            Main wrapper end
        *****-->
        <?php
        include "librarian/plugin/plugin_js.php";
    ?>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;

        function generatePdf() {
            let jsPdf = new jsPDF('p', 'pt', 'letter');
            var htmlElement = document.getElementById('print-pdf');
            const opt = {
                    callback: function (jsPdf) {
                        // Save the PDF with a specified name
                        jsPdf.save("Test.pdf");
                    },
                    margin: [10, 10, 10, 10],
                    autoPaging: 'text',
                    html2canvas: {
                        allowTaint: true,
                        dpi: 300,
                        letterRendering: true,
                        logging: false,
                        scale: .8
                    }
                };

            jsPdf.html(htmlElement, opt);
        }
        $(document).ready(function(){
    $('#print_invoice').on('click',function(){
        $("#print-pdf").print();
    });
})
    </script>
  

</body>





</html>
                                  
                                  
                                  
                                  
                                 