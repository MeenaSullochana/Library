
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
      <title>Government of Tamil Nadu - Book Procurement - Reject Books List</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
      <link href="
      https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
      " rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
               <div class="card mb-4">
                  <div class="card-body">
                     <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                           <b>Return Books List</b>
                        </h3>
                        {{-- <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                        <i class="fas fa-plus"></i> Add Book</a> --}}
                        <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                     </div>
                  </div>
               </div>
            <div class="row bg-white p-2 rounded" >
               <div class="col-xl-12">
                  <div class="card-body p-0">
                     <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">

                           <table id="example4" class="dataTable no-footer" role="grid"
                              aria-describedby="empoloyees-tbl3_info">
                              <thead>
                                 <tr role="row">
                                 <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                    colspan="1" aria-label="ERoll No: activate to sort column ascending"
                                    style="width: 97.5156px;">S.No</th>
                                    <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1" aria-label="ERoll No: activate to sort column ascending"
                                       style="width: 97.5156px;">Book ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1"
                                       aria-label="Books: activate to sort column ascending"
                                       style="width: 145.219px;">Title</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1"
                                       aria-label="Stock: activate to sort column ascending"
                                       style="width: 109.984px;">Stock</th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1"
                                       aria-label="ISBN(10/13): activate to sort column ascending"
                                       style="width: 126.609px;">Issued Status</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1" aria-label="Quantity: activate to sort column ascending"
                                       style="width: 65.3594px;">Quantity</th> --}}
                                       <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1" aria-label="Action: activate to sort column ascending"
                                       style="width: 87.4688px;">Return Applay</th>
                                       <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1" aria-label="Action: activate to sort column ascending"
                                       style="width: 87.4688px;">  Correction</th>
                                    <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                       colspan="1" aria-label="Action: activate to sort column ascending"
                                       style="width: 87.4688px;">  Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php
                                 $id=auth('publisher')->user()->id;
                                   $data=DB::table('books')->where('user_id','=',$id)->where('book_procurement_status','=',1)->where('book_status','=',2)->get();
                                 @endphp
                                 @foreach($data as $key=>$val)
                                 <tr role="row" class="odd">
                                 <td>{{$loop->index+1}}></td>
                                    <td>{{$val->product_code}}</td>
                                    <td>
                                       <div >

                                             <h6><a class="text-left" href="/publisher/book_manage_view/{{$val->id}}">{{$val->book_title}}</a></h6>
                                             <span class="text-left">{{$val->subtitle}}</span>

                                       </div>
                                    </td>
                                  

                           

                                    <td>
                                            <span><a href="#" class="badge bg-danger">Return</a></span>
                                           </td>

                                           <td>
                                        <a class="badge bg-success delete-btn" data-id="{{ $val->id }}" data-bs-toggle="modal" data-bs-target="#myModal22">Send Return Book</a>
                                                   </td>
                                               </a>
                                               <td>
                                          <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-id="{{$val->return_message}}" data-bs-target="#myModal">View</a>
                                     </td>
                                    <td data-label="controlq">

                                          <a href="/publisher/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                          <i class="fa fa-eye"></i>
                                          <a href="/publisher/book_edit/{{$val->id}}" class="btn btn-warning shadow btn-xs sharp me-1">
                                                <i class="fa fa-edit"></i>
                                                </a>
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


      </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Return Book Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <p id="modalBodyContent"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
      <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
         include "publisher/plugin/plugin_js.php";
     ?>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Are you send this book to book recurement?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
               </div>
               <div class="modal-body">
                  <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary">Yes</button>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script>
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var rejectMessage = button.data('id');
            var modal = $(this);

            // Update modal body with the reject message
            modal.find('#modalBodyContent').html(rejectMessage);
        });
    });
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
                url: '/publisher/bookupdatedandreturn',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'id': deleteId },
                success: function (response) {
                    if (response.success) {

                        toastr.success(response.success, { timeout: 2000 });
                        $('#basicModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = "/publisher/book_updatelist"
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
   .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
    }
    .active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
