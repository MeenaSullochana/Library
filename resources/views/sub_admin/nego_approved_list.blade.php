
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
      <title>Government of Tamil Nadu - Book Procurement - Negotiation Approved List </title>
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
                           <b>Approved Negotiation Books List</b>
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

               <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                            <div class="tbl-caption">
                            <span>
                                <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                <i class="fa fa-trash"></i>
                                </a>
                            </span>
                            {{-- <div>
                                <div class="btn-group bootstrap-select select-picker pr-2 d-tc">
                                    <div class="dropdown-menu open" role="combobox">
                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                        <li data-original-index="0" class="selected"><a tabindex="0" class=""
                                            data-tokens="null" role="option" aria-disabled="false"
                                            aria-selected="true"><span class="text">Date
                                            Descending</span><span
                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                        </li>
                                        <li data-original-index="1"><a tabindex="0" class="" data-tokens="null"
                                            role="option" aria-disabled="false" aria-selected="false"><span
                                            class="text">Date Ascending</span><span
                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        <li data-original-index="2"><a tabindex="0" class="" data-tokens="null"
                                            role="option" aria-disabled="false" aria-selected="false"><span
                                            class="text">Title Descending</span><span
                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        <li data-original-index="3"><a tabindex="0" class="" data-tokens="null"
                                            role="option" aria-disabled="false" aria-selected="false"><span
                                            class="text">Title Ascending</span><span
                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        <li data-original-index="4"><a tabindex="0" class="" data-tokens="null"
                                            role="option" aria-disabled="false" aria-selected="false"><span
                                            class="text">Year Descending</span><span
                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        <li data-original-index="5"><a tabindex="0" class="" data-tokens="null"
                                            role="option" aria-disabled="false" aria-selected="false"><span
                                            class="text">Year Ascending</span><span
                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        </ul>
                                    </div>
                                    <select name="sortColumn" id="books-sort" class="select-picker pr-2 d-tc"
                                        autocomplete="off" tabindex="-98">
                                        <option value="Books.creationDateTime" data-order="DESC">Date Descending
                                        </option>
                                        <option value="Books.creationDateTime" data-order="ASC">Date Ascending
                                        </option>
                                        <option value="Books.title" data-order="DESC">Title Descending</option>
                                        <option value="Books.title" data-order="ASC">Title Ascending</option>
                                        <option value="Books.publishingYear" data-order="DESC">Year Descending
                                        </option>
                                        <option value="Books.publishingYear" data-order="ASC">Year Ascending
                                        </option>
                                    </select>
                                </div>
                            </div> --}}
                            </div>
                            <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                            <table id="empoloyees-tbl3" class="table dataTable no-footer" role="grid"
                                aria-describedby="empoloyees-tbl3_info">
                                <thead>
                                    <tr role="row">

                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="ERoll No: activate to sort column ascending"
                                        style="width: 97.5156px;">Book No</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1"
                                        aria-label="Books: activate to sort column ascending"
                                        style="width: 145.219px;">Books</th>
                                        <!-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1"
                                        aria-label="Ratings: activate to sort column ascending"
                                        style="width: 109.984px;">Ratings</th> -->
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">book Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">Calculated Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">Accepted Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="Quantity: activate to sort column ascending"
                                        style="width: 65.3594px;">Add to Book List</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 87.4688px;">  Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $categori = DB::table('books')
                                ->where('marks', '>=', 40)
                               ->where('negotiation_status', '=', 2)
                               ->get();
                                             @endphp

                                             @foreach($categori as $val)
                                             <tr role="row" class="odd">

                                        <td><span>{{$loop->index +1}}</span></td>
                                        <td>
                                        <div class="products">
                                            <div>
                                                <h6><a class="text-left" href="book_manage_view.php">{{$val->book_title}}</a></h6>
                                                <span class="text-left">{{$val->subtitle}}</span>
                                            </div>
                                        </div>
                                        </td>
                                        <!-- <td data-label="controlq">
                                            <div class="d-flex mt-p0">
                                                <a href="#" class="btn shadow btn-xs sharp me-1">
                                                <i class="fa fa-star text-warning"></i>
                                                </a>
                                                <a href="#" class="btn shadow btn-xs sharp me-1">
                                                <i class="fa fa-star text-warning"></i>
                                                </a>
                                                <a href="#" class="btn shadow btn-xs sharp me-1">
                                                <i class="fa fa-star text-warning"></i>
                                                </a>
                                                <a href="#" class="btn shadow btn-xs sharp me-1">
                                                <i class="fa fa-star text-warning"></i>
                                                </a>
                                                <a href="#" class="btn shadow btn-xs sharp me-1">
                                                <i class="fa fa-star text-warning"></i>
                                                </a>
                                            </div>
                                        <td> -->
                                        <td>
                                        <span>Rs {{$val->price}}</span>
                                        </td>
                                        <td>
                                        <span>Rs {{$val->calculated_price}}</span>
                                        </td>
                                        <td>
                                        <span>Rs {{$val->final_price}}</span>
                                        </td>

                                        <td>
                                           <span><a href="#" class="btn btn-success shadow btn-xs me-1">
                                           Negotiation Approved
                                             </a></span>
                                        </td>
                                        <td data-label="controlq">
                                            <div class="d-flex mt-p0">
                                            <a href="/admin/book_manage_view/{{ $val->id }}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-book"></i>
                                                 </a>
                                                 @if($val->user_type === "publisher")
                                                 <a href="/admin/pub_profile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @elseif($val->user_type === "distributor")
                                                 <a href="/admin/dist_profile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @else
                                                    <a href="/admin/publisherdisprofile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @endif
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
      <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
                <!-- Hidden input field to store the data-id value -->
                <input type="hidden" id="modalDataId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton11" class="btn btn-primary submitbutton11">Confirm</button>
            </div>
        </div>
    </div>
</div>


</div>  <div class="modal fade" id="basicModal1">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton" class="btn btn-primary submitbutton11">Confirm</button>
            </div>
        </div>
    </div>
</div>
      <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
        include "admin/plugin/plugin_js.php";
    ?>
   </body>
   <script>
    $(document).ready(function () {

        $("#openModalBtn").click(function () {

            var dataId = $(this).data("id");
            $("#modalDataId").val(dataId);
            $("#basicModal").modal("show");
        });
        $("#submitbutton11").click(function () {

            var dataId = $("#modalDataId").val();



            $("#basicModal").modal("hide");
        });
    });
</script>

<script>
    $(document).ready(function () {

        $("#submitbutton11").click(function () {
            var dataId = $("#modalDataId").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/admin/sendnegotiation',
                method: 'POST',
                data: { dataId: dataId, _token: csrfToken },
                success: function (response) {

                    setTimeout(function() {
                    window.location.href ="/admin/negotiation_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
                },

                error: function (error) {

                    console.error('Failed to create record:', error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#checkAllInput').click(function() {
            $('.bookitem').prop('checked', this.checked);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#submitbutton").click(function () {
            // Check if at least one checkbox is checked
            var checkedBooks = $('.bookitem:checked');
            if (checkedBooks.length === 0) {
                toastr.error('Please select at least one book.');
                return;
            }

            // Get the book IDs
            var bookIds = checkedBooks.map(function () {
                return $(this).data('book-id');
            }).get();

            var requestData = {
                bookId: bookIds,
            };

            // Set up CSRF token in headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Make the AJAX request
            $.ajax({
                url: '/admin/multisendnegotiation',
                method: 'POST',
                data: requestData,
                success: function (response) {
                    console.log(response.data);
                    if (response.success) {
                        $("#basicModal1").modal("hide");
                        setTimeout(function () {
                            window.location.href = "/admin/negotiation_list";
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
   .btn-sm, .btn-group-sm > .btn {
    font-size: 0.813rem !important;
    padding: 2px 12px !important;
    font-weight: 400;
    border-radius: 0.25rem;
    line-height: 18px;
    border-radius: 0.25rem;
}
.active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}
   .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
