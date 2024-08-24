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
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
    ?>
    <style>
    .tamil-font {
        font-family: 'Latha', sans-serif;
    }
    </style>

</head>
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
                                <b>Periodical Final Dispatch Report</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="/librarian/index">
                                <i class="fas fa-plus"></i> Dashboard </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Periodical Final Dispatch Report</h4>

                                            </div>
                                            <div class="card-body">
                                                <form class="needs-validation" novalidate method="Get"
                                                    action="/librarian/dispatch_final_report_pdf"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- Ensure CSRF token is generated -->
                                                    <div class="row">
                                                        <!-- <div class="col-md-4">
                                                           <label for="id">Periodical</label>
                                                           <div
                                                               class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                               <select id="id" name="id"
                                                                   class="default-select form-control wide form-control-sm">
                                                                   <option value="">Choose any one</option>
                                                                   @php
                                                                   $magazines =
                                                                   DB::table('magazines')->where('status','=','1')->get();
                                                                   @endphp
                                                                   @foreach($magazines as $val)
                                                                   <option value="{{$val->id}}">{{$val->title}}
                                                                   </option>
                                                                   @endforeach
                                                               </select>
                                                           </div>
                                                       </div> -->
                                                        <!-- <div class="col-md-4">
                                                            <label class="form-label">Type of District<span
                                                                    class="text-danger mandatory"></span></label>
                                                            <select class="form-select bg-white" name="district"
                                                                id="district">
                                                                <option value="">All District</option>
                                                                @php
                                                                $districts = DB::table('districts')->where('status',
                                                                '=', 1)->get();
                                                                @endphp
                                                                @foreach($districts as $val)
                                                                <option value="{{$val->name}}">{{$val->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div> -->
                                                        <div class="col-md-4">
                                                            <label for="monthyear">From Month and Year</label>
                                                            <input class="form-control input-daterange-datepicker"
                                                                type="month" id="monthyear" name="monthyear"
                                                                min="1918-03" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="monthyear">To Month and Year</label>
                                                            <input class="form-control input-daterange-datepicker"
                                                                type="month" id="monthyear1" name="monthyear1"
                                                                min="1918-03" required>
                                                        </div>
                                                        <!-- <div class="col-md-4">
                                                           <label for="Frequency">Frequency</label>
                                                           <div
                                                               class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                               <select id="Frequency" name="Frequency"
                                                                   class="default-select form-control wide form-control-sm">
                                                                   <option value="">Choose any one</option>
                                                                   @php
                                                                   $periodicities =
                                                                   DB::table('magazine_periodicities')
                                                                   ->where('status', '=', 1)
                                                                   ->orderBy('created_at', 'Asc')
                                                                   ->get();
                                                                   @endphp
                                                                   @foreach($periodicities as $val)
                                                                   <option value="{{$val->name}}">{{$val->name}}
                                                                   </option>
                                                                   @endforeach
                                                               </select>
                                                           </div>
                                                       </div> -->
                                                        <!-- <div class="col-md-4">
                                       <label for="librarytype">Library Type</label>
                                       <div
                                           class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                           <select id="librarytype" name="librarytype"
                                               class="default-select form-control wide form-control-sm" >
                                               <option value="">Choose any one</option>
                                               @php
                                                   $categories = DB::table('library_types')->get();
                                                   @endphp
                                               @foreach($categories as $val)
                                               <option value="{{$val->name}}">{{$val->name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div> -->



                                                        <!-- <div class="col-md-6">
                                       <label for="status">Status</label>
                                       <div
                                           class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                           <select id="status" name="status"
                                               class="default-select form-control wide form-control-sm" >
                                               <option value="">Choose any one</option>
                                               <option value="1">Received</option>
                                               <option value="0">Not Received</option>
                                             
                                           </select>
                                       </div>
                                   </div> -->

                                                        <div class="col-xl-12 mt-3 text-end">
                                                            <button type="submit"
                                                                class="dt-button buttons-excel buttons-html5 bg-primary text-white btn btn-sm border-0 mt-3">
                                                                <span><i class="fa-solid fa-file-excel"></i>

                                                                    Filter</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($data))
                            <div class="card-body">

                                <div class="col-xl-12 col-xxl-12 mt-5">

                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h4 class="heading mb-0">Book Report</h4>
                                            <div>
                                                <button type="button" class="btn btn-primary" id="print_invoice"
                                                    onclick="generatePdf()">
                                                    <span class="btn-icon-start text-primary"><i
                                                            class="fas fa-file-pdf"></i></span>PDF
                                                </button>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary print-button"
                                                    onclick="printDiv()">Print</button>
                                            </div>
                                        </div>
                                        <div class="card-body p-3 printableArea" id="print-pdf">
                                            <div class="table-responsive active-projects">
                                                <div class="tbl-caption text-center">
                                                    <img class="w-50" src="/assets/img/logo/logo.png" alt="logo">
                                                    <h4 class="heading mb-6">Directorate of Public Libraries</h4>
                                                    <h4 class="heading mb-6">Chennai - 2</h4>
                                                </div>
                                                <div class="tbl-caption d-flex justify-content-center">
                                                    <h4 class="heading mb-6">Transparent Periodical Procurement Delivery
                                                        Report</h4>
                                                    <!-- <h4 class="heading mb-">Date: 2024-08-21</h4> Static Date -->
                                                </div>
                                                <div>
                                                    @if(!empty($data) && isset($data[0]['District']))
                                                    <h4 class="heading mb-6">
                                                        Name Of The District:
                                                        {{ $data[0]['District'] ?? 'N/A' }}
                                                    </h4>
                                                    @else
                                                    <h4 class="heading mb-6">
                                                        Name Of The District: N/A
                                                    </h4>
                                                    @endif

                                                    @if(!empty($data) && isset($data[0]['month']))
                                                    <h4 class="heading mb-6">
                                                        Month & Year:
                                                        {{ $data[0]['month'] ?? 'N/A' }}
                                                    </h4>
                                                    @else
                                                    <h4 class="heading mb-6">
                                                        Month & Year: N/A
                                                    </h4>
                                                    @endif


                                                </div>
                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                S.No</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Name Of The Periodical</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Periodicity</th>
                                                            <!-- <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Language</th> -->
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Single Price As Per Order</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Discount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Single Price As Per Order After Discount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                As Per Order Concern District Total Order</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Amount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                No.Of Copies Received</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Amount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Not Received</th>

                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Amount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Non Entered</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 1px; text-align: center;">
                                                                Amount</th>
                                                            <th
                                                                style="border: 1px solid black; padding: 2px; text-align: center;">
                                                                Diff.Amt</th>

                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $amount = 0;
                                                    $amount1 = 0;
                                                    $amount2 = 0;
                                                    $amount3 = 0;
                                                    $diffrence = 0;
                                                    @endphp
                                                    <tbody>
                                                        @foreach($data as $val)
                                                        @if($val != null)
                                                        @php
                                                        $amount += $val['Amount'];
                                                        $amount1 += $val['Amount1'];
                                                        $amount2 += $val['Amount2'];
                                                        $amount3 += $val['Amount3'];
                                                        $diffrence += $val['Difference'];
                                                        @endphp
                                                        <tr>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$loop->index +1}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Magazine_Name']}}<br></td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Periodicity']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Single_Issue_Rate']}}<br></td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Discount']}}%</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Single_Issue_After_Discount']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Total_Subscription']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Amount']}}<br></td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Total_Received']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Amount1']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Total_Not_Received']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Amount2']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Pending']}}</td>

                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Amount3']}}</td>
                                                            <td
                                                                style="border: 1px solid black; padding:1px; text-align: center;">
                                                                {{$val['Difference']}}</td>
                                                        </tr>

                                                        @endif

                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-5"> </div>
                                                <div class="col-lg-6 col-sm-5 ms-auto">
                                                    <table class="table table-clear">
                                                        <tbody>
                                                            <tr>
                                                                <td class="center"><strong>Total Amount:</strong></td>
                                                                <td class="right"> ₹{{ $amount }}</td>





                                                            </tr>
                                                            <tr>
                                                                <td class="left"><strong>Received Amount:</strong></td>
                                                                <td class="right">₹{{ $amount1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="left"><strong>Not Received Amount:</strong>
                                                                </td>
                                                                <td class="right">₹{{ $amount2 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="left"><strong>Non Entered Amount:</strong>
                                                                </td>
                                                                <td class="right">₹{{ $amount3 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="left"><strong>Difference Amount:</strong>
                                                                </td>
                                                                <td class="right">₹{{ $diffrence }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>



                            </div>
                            @endif
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
@if (Session::has('success'))

<script>
toastr.success("{{ Session::get('success') }}", {
    timeout: 15000
});
</script>
@elseif (Session::has('error'))
<script>
toastr.error("{{ Session::get('error') }}", {
    timeout: 15000
});
</script>

@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
async function generatePdf() {
    const {
        jsPDF
    } = window.jspdf;

    try {
        const content = document.getElementById('print-pdf');

        if (!content) {
            throw new Error("Content element not found");
        }

        // Estimate the required page height
        const recordCount = 300;
        const recordHeight = 5; // Height of each record in mm
        const pageHeight = recordCount * recordHeight; // Total height of the page

        // Custom page width (adjust as needed)
        const customWidth = 250; // Set your desired width in mm

        // Create the PDF with custom width and height
        const pdf = new jsPDF('p', 'mm', [customWidth, pageHeight]);

        // Capture the content as an image using html2canvas
        const canvas = await html2canvas(content, {
            scale: 2
        });
        const imgData = canvas.toDataURL('image/png');

        // Get the image properties
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        // Add the image to the PDF
        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

        // Save the PDF
        pdf.save('periodical_receipt.pdf');
    } catch (error) {
        console.error("Error generating PDF:", error);
    }
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


<style>
.table thead th {
    text-transform: math-auto !important;
}

.table tbody tr td {
    text-transform: lowercase !important;
}

.table tbody tr td {
    white-space: break-spaces !important;
}
</style>

</html>