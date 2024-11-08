
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
   <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
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
            @include ('sub_admin.navigation')

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
                           <b>Periodical Payment List</b>
                       </h3>
                       <!-- <a class="btn btn-primary  btn-sm" href="member_create">
                           <i class="fas fa-chevron-left"></i> Dashboard</a> -->
                   </div>
               </div>
           </div>

           <div class="col-xl-10 col-sm-6 mt-4 text-end">
                        
                        <a href="/sub_admin/exportexcelpayment/Periodical" class="btn btn-info">
                            <span class="btn-icon-start text-info"><i class="fa fa-file-excel-o"></i></span>
                            Export Excel
                        </a>

                    </div>
            <div class="card">
               <div class="card-body">
               @php
                        $payment = DB::table('procurement_paymrnts')->where('type','Periodical')->get();
               @endphp

                  <div class="table-responsive">
                     <table id="example4" class="display table" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>S/No</th>
                              <th>User Name</th>
                              <th>User Type</th>
                              <th>Invoice Number</th>
                              <th>Amount</th>
                              <th>Total Periodical</th>
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
                              <td>{{$val->invoiceNumber}}</td>
                              <td> <i class="fa fa-inr"></i> {{$val->amount}}</td>
                              <td >  {{$val->totalAmount /$val->amount }}</td>
                              <td> <i class="fa fa-inr"></i> {{$val->totalAmount}}</td>
                              <td>{{$val->paymentstatus}}</td>
                              <td>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d ') }}</td>
                              <td><a href="payment_periodical_invoice/{{$val->id}}"><i class="fa fa-eye p-2 text-primary"></i></a>

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
         @include ("sub_admin.footer")
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
        include "sub_admin/plugin/plugin_js.php";
    ?>
</body>

</html>
<style>
   .active-projects.style-1 .dt-buttons .dt-button {
   top: -50px;
   right: 0 !important;
}

.active-projects tbody tr td:last-child {
       text-align: center;
   }
</style>
