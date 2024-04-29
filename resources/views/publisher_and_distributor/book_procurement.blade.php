
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
      <title>Government of Tamil Nadu - Book Procurement - Apply For Procurement</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
      <link href="
      https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
      " rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
            @include("publisher_and_distributor.navigation")
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
                           <b>Apply For Procurement</b>
                        </h3>
                        {{-- <a class="btn btn-primary  btn-sm" href="book_manage_add.php"> --}}
                        {{-- <i class="fas fa-plus"></i> Add Book</a> --}}
                        <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                     </div>
                  </div>
               </div>
              <div class="row bg-white p-2 ">
               <div class="col-xl-12">
                  <div class="card-body p-0">
                     <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                        <div class="tbl-caption">

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
                        <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                           <table id="example3" class="table dataTable no-footer" role="grid"
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
                                    <th>S.No</th>
                                    <th>Book ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th> ISBN</th>
                                    <th> Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($data as $key=>$val)
                                 <tr role="row" class="odd">
                                 <td class="sorting_1">
                                <div class="form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input"
                                      id="customCheckBox100" data-book-id="{{$val->id}}" required="">
                                       <label class="form-check-label" for="customCheckBox100"></label>
                                    </div>
                                 </td>
                                 <td data-label="S/No">{{$loop->index+1}}</td>
                                    <td data-label="Book ID">{{$val->product_code}}</td>
                                    <td style="white-space:normal;" data-label="Title">
                                       <h6><a class="text-left" href="/publisher_and_distributor/book_manage_view/{{$val->id}}">{{$val->book_title}}</a></h6>
                                       <span class="text-left">{{$val->subtitle}}</span>
                                    </td>
                                    <td data-label="Author"> {{$val->author_name}}</td>
                                    <td data-label="ISBN">{{$val->isbn}}</td>
                                    <!-- <td>
                                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-id="{{$val->id}}" data-bs-target="#exampleModalCenter" id="procurement">Send Procurement</button>
                                    </td> -->
                                    <td data-label="control">

                                          <a href="/publisher_and_distributor/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                          <i class="fa fa-eye"></i>
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
      <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
      <!-- Modal Confirm Apply Procurement-->
      <div class="modal fade" id="exampleModalCenter">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <input type="hidden" name="bookid" id="hiddenInput">
                  <h5 class="modal-title">Are you send this book to book recurement?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
               </div>
               <div class="modal-footer mt-0">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary" id="submitButton" data-bs-dismiss="modal" data-bs-target="#ModalConfirmCenter">Yes</button>
               </div>
            </div>
         </div>
      </div>
            <!-- Modal inform Procurement-->
            <div class="modal fade" id="ModalConfirmCenter">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <input type="hidden" name="bookid" id="hiddenInput">
                  <h5 class="modal-title">Are you send this book to book recurement?</h5>
                  <button type="button" class="btn-close" >
                  </button>
               </div>
               <div class="modal-body">
                  <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal">Yes</button>
               </div>
            </div>
         </div>
      </div>

      </div>  <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
            <!-- <p>Our payment gateway is currently being set up. Book procurement applications will be possible once it's fully functional. We'll notify you when it's ready.</p> -->
                <!-- <p>Comming Zoon</p> -->
                <p>Number Of Books Selected : </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton11" class="btn btn-primary submitbutton11">Confirm</button>
            </div>
        </div>
    </div>
</div>

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
</style>
<script>
    $(document).ready(function() {
        $('#basicModal').on('shown.bs.modal', function () {
            $('#basicModal').modal('show');


        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#checkAll2').click(function() {
            $('.customCheckBox100').prop('checked', this.checked);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#basicModal').on('shown.bs.modal', function () {
            var checkedBooks = $('#customCheckBox100:checked').length;
            $('#basicModal .modal-body p:last').text('Number Of Book Selected: ' + checkedBooks);
        });
    });
</script>
<script>
   $('.submitbutton11').click(function () {


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
            url: '/publisher_and_distributor/applay_procurment',
            method: 'POST',
            data: requestData,
            success: function (response) {
               $('#basicModal').modal('hide');
                if(response.success){
                    setTimeout(function() {
                        window.location.href = "/publisher_and_distributor/payment";
                    }, 3000);
                    toastr.success(response.success, { timeout: 45000 });
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

   $(document).on('click','#procurement',function(e){
     e.preventDefault();
     var bookid = $(this).data('id');
     $('#hiddenInput').val(bookid);
   $('#exampleModalCenter').modal('show')
})
 </script>
 <script>
   $(document).on('click','#submitButton',function(e){
     e.preventDefault();
     var data={
        'id':$('#hiddenInput').val()
     }
     $('#exampleModalCenter').modal('hide');
     $.ajaxSetup({
        headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
     });
     $.ajax({
        type:"post",
        url:"/publisher_and_distributor/procurement",
        data:data,
        dataType:"json",
        success: function(response) {
           if(response.success){
             setTimeout(function() {
                 window.location.href ="/publisher_and_distributor/procurement"
                  }, 3000);
             toastr.success(response.success,{timeout:45000});
            }else{
             toastr.error(response.error,{timeout:45000});
             setTimeout(function() {
                 window.location.href ="/publisher_and_distributor/procurement"
                  }, 3000);
            }

     }
   });
})



 </script>
