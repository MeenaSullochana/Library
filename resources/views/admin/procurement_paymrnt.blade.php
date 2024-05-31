
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
   <title>Government of Tamil Nadu - Book Procurement - Payment List</title>
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
                           <b>Payment List</b>
                       </h3>
                       <a class="btn btn-primary  btn-sm" href="member_create">
                           <i class="fas fa-chevron-left"></i> Dashboard</a>
                   </div>
               </div>
           </div>
  
           <div class="col-xl-10 col-sm-6 mt-4 mb-4 text-end">

               <a href="exportexcelpayment/Book" class="btn btn-info">
                     <span class="btn-icon-start text-info"><i class="fa fa-file-excel-o"></i></span>
                     Export Excel
               </a>

            </div>
       
            <div class="card">
            <div class="col-xl-3 col-sm-6 mt-4 mb-4 text-center">
                   <label class="form-label"> Transection Type</label>
                    <select name="category_filter" id="category_filter"
                     class="form-select bg-white p-2 border border-1 mb-3">
                      <option value="">All Type</option>
                       <option value="Success">Success</option>
                       <option value="Failed">Failed</option>
                        <option value="Cancel">Cancel</option>
                    </select>
           </div>
               <div class="card-body">
               @php
               $payment = DB::table('procurement_paymrnts')->where('type','Book')->get();
               @endphp

                  <div class="table-responsive">
                     <table id="example4" class="display table" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>S/No</th>
                              <th>Name of Publication</th>
                              <th>User Type</th>
                              <th>Merchant Ref Number</th>
                              <th>Invoice Number</th>
                              <th>Amount</th>
                              <th>Total Book</th>
                              <th>Total Amount</th>
                              <th>Payment Status</th>
                              <th>Date</th>
                              <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>

                     @foreach($payment as $val)
                           <tr>
                              <td>{{$loop->index +1}}</td>
                              <td>{{$val->userName}}</td>
                              <td>{{$val->userType}}</td>
                              <td>{{$val->txnrefno}}</td>
                              <td>{{$val->invoiceNumber}}</td>
                              <td> <i class="fa fa-inr"></i> {{$val->amount}}</td>
                              <td>  {{$val->totalAmount /$val->amount }}</td>
                              <td> <i class="fa fa-inr"></i> {{$val->totalAmount}}</td>
                              <td>{{$val->paymentstatus}}</td>
                              <td>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d ') }}</td>
                              <td><a href="payment_invoice/{{$val->id}}" class="btn btn-primary shadow btn-sm  m-0 me-1" ><i class="fa fa-eye p-2 text-white"></i></a>

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
<script>
    $(document).ready(function() {
        var table = $('#example4').DataTable();

        function filterCategory(paymentstatus) {
            if (paymentstatus === "") {
                table.column(8).search("").draw();
            } else {
                table.column(8).search(paymentstatus).draw();
            }
        }

        $('#category_filter').on('change', function() {
            var paymentstatus = $(this).val();
            filterCategory(paymentstatus);
        });

      
    });
    </script>
</html>
<style>
   .active-projects.style-1 .dt-buttons .dt-button {
   top: -50px;
   right: 0 !important;
}

.active-projects tbody tr td:last-child {
       text-align: center;
   }
   table.dataTable thead th {
    text-transform: math-auto !important;
}
</style>
