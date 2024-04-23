
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
   <link href="
   https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
   " rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                        <b>All Reviewer Assign</b>
                     </h3>
                     <!-- <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                           <i class="fas fa-plus"></i> Add Book</a> -->
                     <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                  </div>
               </div>
            </div>
            <div class="row">
               <h4>Apply For Internel Member Review</h4>
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                     {{-- <form >
                     <div class="row mt-2 p-2">

                        <div class="col">
                          <select class="form-select" name="library">
                           <option value="Part-time">Part-time</option>
                           <option value="Full-time Branch Library">Full-time Branch Library</option>
                           <option value="Branch Library">Branch Library</option>
                           <option value="Village Library">Village Library</option>
                           <option value="Part-Time Library">Part-Time Library</option>
                           <option value="Anna Centenary Library">Anna Centenary Library</option>
                           <option value="Kalaignar Centenary Library">Kalaignar Centenary Library</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="submit" class="btn btn-primary">
                        </div>

                      </div>
                     </form> --}}
                        <div class="card-header-form">
                           <!-- <form method="GET" action="http://localhost/watercan/watercan_super_admin/admin/bookings/search">
                                 <div class="input-group">
                                     <input type="text" class="form-control"  name="search">
                                     <div class="input-group-btn">
                                         <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                     </div>
                                 </div>
                                 </form> -->
                        </div>
                     <div class="card-body text-center">
                        <!-- <div class="table-responsive">
                           <table class="table table-striped memeber_table" id="memeber_table">
                              <tbody>
                                 <tr>
                                    <th>Sl</th>
                                    <th>Librarian Name</th>
                                    <th>Action</th>
                                 </tr>
                              </tbody>
                           </table>
                        </div> -->
                        <table class="display table table-striped memeber_table" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Sl</th>
                                 <th>Reviewer Name</th>
                                 <th>Type</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($internal as $key=>$val1)
                              <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$val1->name}}</td>
                                  <td>{{$val1->reviewerType}}</td>
                                 {{-- <td>Complete</td> --}}
                                 <td>
                                   {{-- <a href="procur_complete_view.php"> <i class="bi bi-eye p-2" style="font-size: 1.5em; color: #007bff;"></i></a>
                                    <i class="bi bi-trash p-2" style="font-size: 1.5em; color: #007bff;"></i> --}}
                                    @if($val1->assigned == 1)
                                    <button class="btn btn-primary" disabled >Assigned</button>
                                    @else
                                    <button class="btn btn-info assignPro" data-id="{{$val1->id}}" id="submit" data-bookid="{{$book->id}}" data-bs-toggle="modal" data-bs-target="#basicModal">Assign</button>
                                    @endif
                                 </td>
                              </tr>
                           @endforeach
                           </tbody>
                           <tfoot>

                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                     {{-- <form>
                     <div class="row mt-2 p-2">

                        <div class="col">
                          <select class="form-select" name="library">
                           <option value="Part-time">Part-time</option>
                           <option value="Full-time Branch Library">Full-time Branch Library</option>
                           <option value="Branch Library">Branch Library</option>
                           <option value="Village Library">Village Library</option>
                           <option value="Part-Time Library">Part-Time Library</option>
                           <option value="Anna Centenary Library">Anna Centenary Library</option>
                           <option value="Kalaignar Centenary Library">Kalaignar Centenary Library</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="submit" class="btn btn-primary">
                        </div>

                      </div>
                     </form> --}}
                     <div class="card-body text-center">
                        <div class="table-responsive">
                           <table class="display table table-striped" id="example2" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Sl</th>
                                    <th>Reviewer Name</th>
                               <th>Type</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              @foreach($external as $key=>$val2)
                                 <tr>
                                   <td>{{$loop->index+1}}</td>
                                   <td>{{$val2->name}}</td>
                                   <td>{{$val2->reviewerType}}</td>
                                    <td>
                                    {{-- <a href="procur_complete_view.php"> <i class="bi bi-eye p-2" style="font-size: 1.5em; color: #007bff;"></i></a>
                                    <i class="bi bi-trash p-2" style="font-size: 1.5em; color: #007bff;"></i> --}}
                                    @if($val2->assigned == 1)
                                    <button class="btn btn-primary" disabled >Assigned</button>
                                    @else
                                    <button class="btn btn-info assignPro" data-id1="{{$val2->id}}" id="submit1" data-bookid1="{{$book->id}}" data-bs-toggle="modal" data-bs-target="#basicModal1">Assign</button>
                                   @endif
                                 </td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                  <div class="card">
                     {{-- <form>
                     <div class="row mt-2 p-2">

                        <div class="col">
                          <select class="form-select" name="library">
                           <option value="Part-time">Part-time</option>
                           <option value="Full-time Branch Library">Full-time Branch Library</option>
                           <option value="Branch Library">Branch Library</option>
                           <option value="Village Library">Village Library</option>
                           <option value="Part-Time Library">Part-Time Library</option>
                           <option value="Anna Centenary Library">Anna Centenary Library</option>
                           <option value="Kalaignar Centenary Library">Kalaignar Centenary Library</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="submit" class="btn btn-primary">
                        </div>

                      </div>
                     </form> --}}
                     <div class="card-body text-center">
                        <div class="table-responsive">
                           <table class="display table table-striped public_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>Sl</th>
                                    <th>Reviewer Name</th>
                                    <th>Type</th>
                                    {{-- <th>District</th> --}}
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                              @foreach($public as $key=>$val3)
                                 <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$val3->name}}</td>
                                    <td>{{$val3->reviewerType}}</td>
                                    {{-- <td>Villupuram</td>
                                    <td>Complete</td> --}}
                                    <td>
                                       {{-- <a href="procur_complete_view.php"> <i class="bi bi-eye p-2" style="font-size: 1.5em; color: #007bff;"></i></a>
                                       <i class="bi bi-trash p-2" style="font-size: 1.5em; color: #007bff;"></i> --}}
                                       @if($val3->assigned == 1)
                                    <button class="btn btn-primary" disabled >Assigned</button>
                                    @else
                                       <button class="btn btn-info assignPro" data-id2="{{$val3->id}}" id="submit2" data-bookid2="{{$book->id}}" data-bs-toggle="modal" data-bs-target="#basicModal2">Assign</button>
                                   @endif
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
            {{-- internal --}}
      <div class="modal fade" id="basicModal">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                <input type="hidden" name="bookid" id="hiddenbook">
                  <input type="hidden" name="bookid" id="hiddenid">
                  <p>Do you want to proceed?</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="submitButton" class="btn btn-primary">Confirm</button>
               </div>
            </div>
         </div>
      </div>
      {{-- external --}}
       <div class="modal fade" id="basicModal1">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                <input type="hidden" name="bookid" id="hiddenbook1">
                  <input type="hidden" name="bookid" id="hiddenid1">
                  <p>Do you want to proceed?</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="submitButton1" class="btn btn-primary">Confirm</button>
               </div>
            </div>
         </div>
      </div>
      {{-- public --}}
       <div class="modal fade" id="basicModal2">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                <input type="hidden" name="bookid" id="hiddenbook2">
                  <input type="hidden" name="bookid" id="hiddenid2">
                  <p>Do you want to proceed?</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="submitButton2" class="btn btn-primary">Confirm</button>
               </div>
            </div>
         </div>
      </div>
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
   <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   <script>

      $(document).on('click','#submit',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var bookid = $(this).data('bookid');
        $('#hiddenbook').val(bookid);
        $('#hiddenid').val(id);
        $('#basicModal').modal('show');
   })
    </script>
    <script>
      $(document).on('click','#submitButton',function(e){
        e.preventDefault();
        var data={
           'bookid':$('#hiddenbook').val(),
           'id':$('#hiddenid').val()
        }
        $('#basicModal').modal('hide');


        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/admin/assign/reviewer",
           data:data,
           dataType:"json",
           success: function(response) {
              if(response.success){
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
               }

        }
      });
   })
    </script>

 {{-- //external --}}
  <script>

      $(document).on('click','#submit1',function(e){
        e.preventDefault();
        var id = $(this).data('id1');
        var bookid = $(this).data('bookid1');
        $('#hiddenbook1').val(bookid);
        $('#hiddenid1').val(id);
        $('#basicModal1').modal('show');
   })
    </script>
    <script>
      $(document).on('click','#submitButton1',function(e){
        e.preventDefault();
        var data={
           'bookid':$('#hiddenbook1').val(),
           'id':$('#hiddenid1').val()
        }
        $('#basicModal1').modal('hide');


        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/admin/assign/reviewer",
           data:data,
           dataType:"json",
           success: function(response) {
              if(response.success){
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
               }

        }
      });
   })
    </script>
    {{-- public --}}
     <script>

      $(document).on('click','#submit2',function(e){
        e.preventDefault();
        var id = $(this).data('id2');
        var bookid = $(this).data('bookid2');
        $('#hiddenbook2').val(bookid);
        $('#hiddenid2').val(id);
        $('#basicModal2').modal('show');
   })
    </script>
    <script>
      $(document).on('click','#submitButton2',function(e){
        e.preventDefault();
        var data={
           'bookid':$('#hiddenbook2').val(),
           'id':$('#hiddenid2').val()
        }
        $('#basicModal2').modal('hide');


        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/admin/assign/reviewer",
           data:data,
           dataType:"json",
           success: function(response) {
              if(response.success){
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href =response.url
                     }, 3000);
               }

        }
      });
   })
    </script>
   <script>
      $(document).ready(function() {
         // alert('Good');
         // $('.memeber_table').Datatable();
         $('.memeber_table').dataTable();
         $('.public_table').dataTable();

      });
   </script>
   <style>
      .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
      .dataTables_wrapper .dataTables_paginate .paginate_button.next {
         width: auto !important;
      }
   </style>
</body>

</html>
