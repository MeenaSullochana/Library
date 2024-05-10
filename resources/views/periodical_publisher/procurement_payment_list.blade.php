
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
   <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_publisher/images/fevi.svg') }}">
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                       <h4>Payment Receipt List</h4>
                       {{-- <p class="text-right">View</p> --}}
                    </div>
                 </div>
            </div>
            <div class="card">

               <div class="card-body">

                  <div class="table-responsive">
                     <table id="all-export" class="display table" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>S/No</th>
                              <th>User Name</th>
                              <th>User Type</th>
                              <th>Acknowledgement Number</th>
                              <th>Payment Status</th>
                              <th>Date</th>
                              <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>
                              <td>1</td>
                              <td>Selva</td>
                              <td>Publisher</td>
                              <td>678899009</td>
                              <td>
                                <button type="button" class="btn btn-warning">Cancel</button>
                                <button type="button" class="btn btn-danger">Failed</button>
                                <button type="button" class="btn btn-success">Success</button>
                               </td>
                              <td>2024-05-07</td>
                              <td data-label="Control">
                                 <div class="d-flex mt-p0">
                                     <a href="\periodical_publisher\paymentreceipt" class="btn btn-success shadow btn-xs sharp me-1">
                                         <i class="fa fa-eye"></i>
                                         </a>
                                      {{-- <a href="#" class="btn btn-warning shadow btn-xs sharp me-1">
                                         <i class="fa fa-edit"></i>
                                         </a>
                                     <a class="btn btn-danger shadow btn-xs sharp delete-btn" >
                                         <i class="fa fa-trash"></i>
                                     </a> --}}
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
    </script>
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
