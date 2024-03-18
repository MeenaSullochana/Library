
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
      <title>Government of Tamil Nadu - Book Procurement - All Book List</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
    include "distributor/plugin/plugin_css.php";
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
            @include("distributor.navigation")
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
                           <b>All Book List</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="\distributor\book_add">
                        <i class="fas fa-plus"></i> Add Book</a>
                        <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                     </div>
                  </div>
               </div>
               <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                               <div class="tbl-caption">
                                  <span>
                                  <a href="#" class="btn btn-danger shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#deleteModal11">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                  </span>
                               </div>
                               <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer p-3">
                                  <table id="example3" class=" table dataTable no-footer" role="grid"
                                  {{-- <table id="empoloyees-tbl3" class="table dataTable no-footer" role="grid" --}}
                                     aria-describedby="empoloyees-tbl3_info">
                                     <thead>
                                        <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="empoloyees-tbl3"
                                              rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 25.375px;">
                                              <div class="form-check custom-checkbox ms-0">
                                                 <input type="checkbox" class="form-check-input checkAllInput"
                                                    id="checkAll2" required="">
                                                 <label class="form-check-label" for="checkAll2"></label>
                                              </div>
                                           </th>
                                           <th>Book ID</th>
                                           <th>Title</th>
                                            <th>Primary Language</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                           <th>ISBN(10/13)</th>

                                           <!-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                              colspan="1" aria-label="Issued: activate to sort column ascending"
                                              style="width: 72.7031px;"> Issued</th> -->
                                           <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                              colspan="1" aria-label="Action: activate to sort column ascending"
                                              style="width: 87.4688px;">  Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($data as $val)
                                        <tr role="row" class="odd">
                                        <td class="sorting_1">
                                       <div class="form-check custom-checkbox">
                                       <input type="checkbox" class="form-check-input"
                                             id="customCheckBox100" data-book-id="{{$val->id}}" required="">
                                              <label class="form-check-label" for="customCheckBox100"></label>
                                           </div>
                                        </td>
                                           <td data-label="Book ID"><span>{{$val->product_code}}</span></td>
                                           <td data-label="Title">
                                              <div class="products">
                                                 <div>
                                                    <h6><a class="text-left" href="book_manage_view.php">{{$val->book_title}}</a></h6>
                                                    <span class="text-left">{{$val->subtitle}}</span>
                                                 </div>
                                              </div>
                                           </td>
                                           <td data-label="Auther">
                                            <span>{{$val->author_name}}</span>
                                            </td>
                                            <td data-label="Language">
                                                <span>{{$val->language}}</span>
                                            </td>
                                            <td data-label="Price"><a href="javascript:void(0)" class="text-primary">{{$val->price}}</a></td>

                                           <td data-label="isbn">
                                              <span>{{$val->isbn}}</span>
                                           </td>
                                           <!-- <td>
                                              <span>0</span>
                                           </td> -->
                                           <td data-label="control">
                                              <div class="d-flex mt-p0">
                                                 <a href="/distributor/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                 <i class="fa fa-eye"></i>
                                                 </a>

                                                 <a href="/distributor/book_edit/{{$val->id}}" class="btn btn-warning shadow btn-xs sharp me-1">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                 <a class="btn btn-danger shadow btn-xs sharp delete-btn" data-id="{{ $val->id }}">
                                                   <i class="fa fa-trash"></i>
                                                 </a>
                                              </div>
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
            @include("distributor.footer")
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

      <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal11" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmDeleteBtn11">Confirm</button>
            </div>
        </div>
    </div>
</div>
      <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
    include "distributor/plugin/plugin_js.php";
?>
   </body>
   <script>

    $(document).ready(function() {

        $('#checkAll2').click(function() {
            $('.customCheckBox100').prop('checked', this.checked);
        });
    });
</script>
<script>
    $('#confirmDeleteBtn11').click(function () {

        var checkebook = $('#customCheckBox100:checked').map(function () {
            return $(this).data('book-id');
        }).get();

        var requestData = {
            bookId: checkebook,
        };

        console.log(requestData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/distributor/multibookdelete',
            method: 'POST',
            data: requestData,
            success: function (response) {
                console.log(response.data);
                if(response.success){
                  $('#deleteModal11').modal('hide');
                  toastr.success(response.success, { timeout: 2000 });

                    setTimeout(function() {
                        window.location.href ="/distributor/book_manage_all"
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 45000 });
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    });
</script>

   <script>
    // $(document).ready(function () {
    //     $('.example3').dataTable();
    // });
   </script>
   <script>
    $(document).ready(function () {
        var deleteId;

        $('.delete-btn').on('click', function () {
            deleteId = $(this).data('id');
            $('#basicModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function () {
            $('#basicModal').modal('hide');
            $.ajax({
                url: '/distributor/bookdelete',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'id': deleteId },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 2000 });
                        setTimeout(function () {
                            window.location.href = "/distributor/book_manage_all"
                        }, 3000);
                    } else {
                        toastr.error(response.error, { timeout: 2000 });
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
</html>
<style>
   table {
   border: 1px solid #ccc;
   border-collapse: collapse;
   margin: 0;
   padding: 0;
   width: 100%;
   table-layout: fixed;
   }
   table caption {
   font-size: 1.5em;
   margin: .5em 0 .75em;
   }
   table tr {
   background-color: #f8f8f8;
   border: 1px solid #ddd;
   padding: .35em;
   }
   table th,
   table td {
   padding: .625em;
   text-align: center;
   }
   table th {
   font-size: .85em;
   letter-spacing: .1em;
   text-transform: uppercase;
   }
   @media screen and (max-width: 600px) {
   table {
   border: 0;
   }
   table caption {
   font-size: 1.3em;
   }
   table thead {
   border: none;
   clip: rect(0 0 0 0);
   height: 1px;
   margin: -1px;
   overflow: hidden;
   padding: 0;
   position: absolute;
   width: 1px;
   }
   .form-check.mt-p00.form-switch {
   display: flex;
   justify-content: flex-end;
   }
   table tr {
   border-bottom: 3px solid #ddd;
   display: block;
   margin-bottom: .625em;
   }
   table td {
   border-bottom: 1px solid #ddd;
   display: block;
   font-size: .8em;
   text-align: right;
   }
   table td::before {
   /*
   * aria-label has no advantage, it won't be read inside a table
   content: attr(aria-label);
   */
   content: attr(data-label);
   float: left;
   font-weight: bold;
   text-transform: uppercase;
   }
   table td:last-child {
   border-bottom: 0;
   }
   .d-flex.mt-p0 {
   display: flex;
   justify-content: flex-end;
   }
   }
   /* general styling */
   body {
   font-family: "Open Sans", sans-serif;
   line-height: 1.25;
   }
   th{
    font-weight: bolder;
   }
   .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
    }
    .active-projects tbody tr td:last-child {
        text-align: center;
    }

</style>
