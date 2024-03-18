
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="noindex, nofollow" />

      <!-- PAGE TITLE HERE -->
      <title>Government of Tamil Nadu - Book Procurement - Event List</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
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
            @include ('publisher.navigation')
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
                    <h4>Event List</h4>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="example4" class="display table" style="min-width: 845px">
                           <thead>
                              <tr>
                                 <th>Roll No</th>
                                 <th>Event Name</th>
                                 <th>Contact Name</th>
                                 <th>Contact Number </th>
                                 <th>Status </th>
                                 <th>Create at</th>
                                 <th>Control</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach($viewEventList as $eventListData){
                                 $i++;
                                 ?>
                                  <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $eventListData['event_name'];?></td>
                                    <td><?php echo $eventListData['contact_name'];?></td>
                                    <td><?php echo $eventListData['contact_number'];?></td>
                                    <td><?php echo $eventListData['status'];?></td>
                                    <td><span class="badge light badge-success"><?php echo $eventListData['create_at'];?></span></td>
                                    <td><a href="event_view.php?event_id=<?php echo $eventListData['event_id']?>"><i class="fa fa-eye p-2"></i></a>
                                       <a href="event_update.php?event_id=<?php echo $eventListData['event_id']?>"><i class="fa fa-edit p-2"></i></a>
                                    </td>

                                 </tr>
                                 <?php
                              }
                              ?>

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
            @include ("publisher.footer")
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
        include "publisher/plugin/plugin_js.php";
        ?>
   </body>
</html>
