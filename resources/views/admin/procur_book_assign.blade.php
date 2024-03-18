
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
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- PAGE TITLE HERE -->
   <title>Government of Tamil Nadu - Book Procurement</title>
   <!-- FAVICONS ICON -->
   <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
   <?php
   include "admin/plugin/plugin_css.php";
   ?>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
                        <b>Book Assign to All Reviewer</b>
                     </h3>

                  </div>
               </div>
            </div>

            <div class="row">
                  <div class="col-md-10"></div>
                  <div class="col-md-2">
                     <div class="d-sm-flex align-items-center justify-content-between">
                        <button class="btn btn-info assignPro mb-5 justify-content-between" data-bs-toggle="modal"  data-bs-target="#basicModal">Assign</button>
                        <!-- <button class="btn btn-info mb-5 justify-content-between"  id="assign">Assign</button> -->
                     </div>
                  </div>
               </div>

            <div class="row">
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="table_header">
                           <h4>Book List</h4>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <!-- Button in the end -->
                              <div class="input-group mb-3">
                                 <div class="card-header-form">


                                       @php
                                        $categori = DB::table('book_subject')->where('status','=','1')->get();
                                       @endphp
                                       <select name="sortColumn" id="books-sort" class="form-control select-picker pr-2 d-tc" autocomplete="off" tabindex="-98">
                                       <option data-order="DESC" value="all"> <i class="fa fa-filter" aria-hidden="true"></i>All Books</option>
                                       @foreach($categori as $val)
                                          <option value="{{ $val->name }}" data-order="DESC">{{ $val->name }}</option>
                                       @endforeach
                                    </select>

                                 </div>
                              </div>
                           </div>
                           <div class="col-4"></div>
                           <div class="col-4"></div>
                        </div>
                     </div>
                     <div class="card-body text-center" style="width: 100%;OVERFLOW: scroll;">
                        <table class="display table table-striped memeber_table"  id="yourTableId" style="width: 100%;overflow: scroll;">
                           <thead>
                              <tr>
                                 <th>
                                       <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                          <input type="checkbox" class="form-check-input" id="selectAllIbook" required="">
                                          <label class="form-check-label" for="selectAllIbook"></label>
                                       </div>
                                 </th>
                                 <th>S.No</th>
                                 <th>Book Name</th>
                                 <th>Language</th>
                                 <th>Subject</th>
                                 <th>Publication Name</th>
                                        

                              </tr>
                           </thead>
                           <tbody>
                           @php
    $categori = [];
    $books = DB::table('books')
        ->where("book_procurement_status", '=', 1)
        ->where("book_reviewer_id", '!=', null)
        ->where('book_status', '=', '1')
        ->get(); 
    
    foreach ($books as $key => $val) {
        $datass = DB::table('book_review_statuses')
            ->where('book_id', $val->id)
            ->first();
         
        if ($datass == null) {
            array_push($categori, $val);
        }
    }
@endphp

    
    @foreach($categori as $val)
   
    <tr>
        <td>
            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                <input type="checkbox" class="form-check-input bookitem" id="checkItem_{{ $val->id }}" data-book-id="{{ $val->id }}" required="">
                <label class="form-check-label" for="checkItem_{{ $val->id }}"></label>
            </div>
        </td>
        <td>{{ $loop->index + 1 }}</td>
        <td><small>{{ $val->book_title }}</small></td>
        @if($val->language == "Other_Indian") 
                <td>{{  $val->other_indian }}</td>
            @elseif ($val->language == "other_foreign") 
                <td>{{ $val->other_foreign }}</td>
            @else 
                <td>{{ $val->language }}</td>
            @endif
            <td>{{ $val->subject }}</td>
            <td>{{$val->nameOfPublisher}}</td>
    </tr>
@endforeach
  
</tbody>


                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <h4>Expert Reviewer List</h4>

                     </div>
                     <div class="card-body text-center">
                        <div class="table-responsive">
                           <table class="display table table-striped externel_reviewer"  id="yourTableId11" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>
                                       <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                          <input type="checkbox" class="form-check-input" id="selectAllIexternel" required="">
                                          <label class="form-check-label" for="selectAllIexternel"></label>
                                       </div>
                                    </th>
                                    <th>S.No</th>
                                    <th>Expert Reviewer Name</th>
                                    <th>Subject</th>

                                 </tr>
                              </thead>
                              <tbody>

                                </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="table_header">
                           <h4>Librarian Reviewer List</h4>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <!-- Button in the end -->
                              <div class="input-group mb-3">

                              </div>
                           </div>
                           <div class="col-4"></div>
                           <div class="col-4"></div>
                        </div>
                     </div>
                     <div class="card-body text-center">
                        <div class="table-responsive">
                        <table class="display table table-striped internal_table" id="yourTableId22" style="width:100%">
                        <thead>
                           <tr>
                                 <th>
                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                       <input type="checkbox" class="form-check-input" id="selectAllinternal" required="">
                                       <label class="form-check-label" for="selectAllinternal"></label>
                                    </div>
                                 </th>
                                 <th>S.No</th>
                                 <th>Librarian Name </th>
                                 <th>Library Name </th>
                                 <th>Subject </th>

                           </tr>
                        </thead>
                        <tbody>
                           <!-- @php
                                 $categori = DB::table('reviewer')->where('reviewerType', '=', 'internal')->where('status', '=', '1')->get();
                           @endphp
                           @foreach($categori as $val)
                                 <tr>
                                    <td>
                                       <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                             <input type="checkbox" class="form-check-input internalitem" value="{{$val->id}}" required="">
                                             <label class="form-check-label" for="customCheckBox2"></label>
                                       </div>
                                    </td>
                                    <td>{{$loop->index +1}}</td>
                                    <td><small>{{$val->name}}</small></td>
                                 </tr>
                           @endforeach -->
                        </tbody>
                     </table>

                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                  <div class="card">
                  <div class="card-header">
                        <div class="table_header">
                           <h4>Public Reviewer List</h4>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <!-- Button in the end -->
                              <div class="input-group mb-3">

                              </div>
                           </div>
                           <div class="col-4"></div>
                           <div class="col-4"></div>
                        </div>
                     </div>
                     <div class="card-body text-center">
                        <div class="table-responsive">
                        <table class="display table table-striped public_table" id="yourTableId33" style="width:100%">
                        <thead>
                           <tr>
                                 <th>
                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                       <input type="checkbox" class="form-check-input" id="selectAllpublic" required="">
                                       <label class="form-check-label" for="selectAllpublic"></label>
                                    </div>
                                 </th>
                                 <th>S.No</th>
                                 <th>Public Reviewer Name</th>
                                 <th>Category</th>
                                 <th>District</th>

                           </tr>
                        </thead>
                        <tbody>
                           <!-- @php
                                 $categori = DB::table('reviewer')->where('reviewerType', '=', 'public')->where('status', '=', '1')->get();
                           @endphp
                           @foreach($categori as $val)
                                 <tr>
                                    <td>
                                       <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                             <input type="checkbox" class="form-check-input publicitem" value="{{$val->id}}" id ="publicreviewer" required="">
                                             <label class="form-check-label" for="customCheckBox4"></label>
                                       </div>
                                    </td>
                                    <td>{{$loop->index +1}}</td>
                                    <td><b> Name</b><br><small>{{$val->name}}</small></td>
                                 </tr>
                           @endforeach -->
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
            <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton11" class="btn btn-primary submitbutton11">Confirm</button>
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
      $(document).ready(function() {
         // alert('Good');
         // $('.memeber_table').Datatable();
         $('.memeber_table').dataTable();
         $('.public_table').dataTable();
         $('.externel_reviewer').dataTable();
         $('.internal_table').dataTable();





   //      $('#selectAllpublic').change(function () {
   //      $('.publicitem').prop('checked', $(this).prop('checked'));
   //  });

   //  $('.publicitem').change(function () {
   //      if ($('.publicitem:checked').length === $('.publicitem').length) {
   //          $('#selectAllpublic').prop('checked', true);
   //      } else {
   //          $('#selectAllpublic').prop('checked', false);
   //      }
   //  });


   //  $('#selectAllinternal').change(function () {
   //      $('.librarianitem').prop('checked', $(this).prop('checked'));
   //  });

   //  $('.librarianitem').change(function () {
   //      if ($('.librarianitem:checked').length === $('.librarianitem').length) {
   //          $('#selectAllinternal').prop('checked', true);
   //      } else {
   //          $('#selectAllinternal').prop('checked', false);
   //      }
   //  });
      });


   </script>
   
   <script>
    $(document).ready(function () {
        $('#selectAllpublic').on('click', function () {
         console.log('hi');
            var isChecked = $(this).prop('checked');
            $('.publiclitem').prop('checked', isChecked);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#selectAllinternal').on('click', function () {
         console.log('hi');
            var isChecked = $(this).prop('checked');
            $('.internalitem').prop('checked', isChecked);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#selectAllIbook').on('click', function () {
         console.log('hi');
            var isChecked = $(this).prop('checked');
            $('.bookitem').prop('checked', isChecked);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#selectAllIexternel').on('click', function () {

            var isChecked = $(this).prop('checked');
            $('.externel').prop('checked', isChecked);
        });
    });
</script>

   <style>
      .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
      .dataTables_wrapper .dataTables_paginate .paginate_button.next {
         width: auto !important;
      }
   </style>
 </body>
 <script>

        $('#books-sort').change(function () {
            var selectedCategory = $(this).val();

            // Make an AJAX request to get books based on the selected category
            $.ajax({
                url: '/admin/get-books/' + selectedCategory,
                type: 'GET',
                success: function (data) {

                  if (data.success.trim() === '<tr><td colspan="3">No books found.</td></tr>') {
                     $('#yourTableId tbody').empty();
                    $('.memeber_table').DataTable().clear().destroy();
                     $('.memeber_table').dataTable();
                    }else{
                     $('#yourTableId tbody').empty();


                    $('.memeber_table').DataTable().clear().destroy();

                    $('#yourTableId tbody').html(data.success);
                    $('.memeber_table').dataTable();
                    }

                    if (data.success11.trim() === '<tr><td colspan="3">No external reviewers found.</td></tr>') {
                     $('#yourTableId11 tbody').empty();
                    $('.externel_reviewer').DataTable().clear().destroy();
                     $('.externel_reviewer').dataTable();
                    }else{
                     $('#yourTableId11 tbody').empty();
                    $('.externel_reviewer').DataTable().clear().destroy();
                    $('#yourTableId11 tbody').html(data.success11);
                    $('.externel_reviewer').dataTable();
                    }
                    if (data.success22.trim() === '<tr><td colspan="3">No external reviewers found.</td></tr>') {
                     $('#yourTableId22 tbody').empty();
                    $('.internal_table').DataTable().clear().destroy();
                     $('.internal_table').dataTable();
                    }else{
                     $('#yourTableId22 tbody').empty();
                    $('.internal_table').DataTable().clear().destroy();
                    $('#yourTableId22 tbody').html(data.success22);
                    $('.internal_table').dataTable();
                    }
                    if (data.success33.trim() === '<tr><td colspan="3">No external reviewers found.</td></tr>') {
                     $('#yourTableId33 tbody').empty();
                    $('.public_table').DataTable().clear().destroy();
                     $('.public_table').dataTable();
                    }else{
                     $('#yourTableId33 tbody').empty();
                    $('.public_table').DataTable().clear().destroy();
                    $('#yourTableId33 tbody').html(data.success33);
                    $('.public_table').dataTable();
                    }
                    
                },
                error: function () {

                    $('#yourTableId tbody').html('<tr><td colspan="3">Error loading books data.</td></tr>');
                    $('#yourTableId11 tbody').html('<tr><td colspan="3">Error loading reviewers data.</td></tr>');
                }
            });
        });

</script>

<script>
    $('.submitbutton11').click(function () {

        var checkepublic = $('.publiclitem:checked').map(function () {
         return $(this).data('public-id');
        }).get();


             var checkebook = $('.bookitem:checked').map(function () {
           return $(this).data('book-id');
                }).get();

        var checkeinternal = $('.internalitem:checked').map(function() {
    return $(this).data('librarian-id');
}).get();

      
        var checkeexternel = $('.externel:checked').map(function () {
         return $(this).data('externel-id')
        }).get();


        var requestData = {
            bookId: checkebook,
            LibrarianReviewverId: checkeinternal,
            expectReviewverId: checkeexternel,
            publicReviewverId: checkepublic,
        };
        console.log(requestData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/bookassign-data',
            method: 'POST',
            data: requestData,
            success: function (response) {
              console.log(response.data);
              if(response.success){
               $('#basicModal').modal('hide');


                setTimeout(function() {
                    window.location.href ="/admin/procur_book_assign"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                  $('#basicModal').modal('hide');
                toastr.error(response.error,{timeout:45000});
               //  setTimeout(function() {
               //      window.location.href =response.url
               //       }, 3000);
               }

            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });

    });
</script>

</html>
