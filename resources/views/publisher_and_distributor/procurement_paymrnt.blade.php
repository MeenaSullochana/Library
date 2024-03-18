
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
   <title>Government of Tamil Nadu - Book Procurement - Payment Receipt List</title>
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                       <h4>Payment Receipt List </h4>
                       {{-- <p class="text-right">View</p> --}}
                    </div>
                 </div>
            </div>
            <div class="card">

               <div class="card-body">
               @php
                        $payment = DB::table('procurement_paymrnts')->where('userId','=',auth('publisher_distributor')->user()->id)->get();
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

                     @foreach($payment as $val)
                           <tr>
                              <td>{{$loop->index +1}}</td>
                              <td>{{$val->userName}}</td>
                              <td>{{$val->userType}}</td>
                              <td>{{$val->invoiceNumber}}</td>

                              <td>{{ \Carbon\Carbon::parse($val->created_at)->format('Y-m-d ') }}</td>
                              <td><a href="/publisher_and_distributor/payment_recept/{{$val->id}}"><i class="fa fa-eye p-2"></i></a>

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
         <?php
        include "publisher_and_distributor/plugin/plugin_js.php";
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
