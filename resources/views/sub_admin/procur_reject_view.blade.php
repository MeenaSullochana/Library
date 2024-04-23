
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
                     <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                           <b>All Books List</b>
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
                            <div>
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
                            </div>
                            </div>
                            <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                            <table id="empoloyees-tbl3" class="table dataTable no-footer" role="grid"
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
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="ERoll No: activate to sort column ascending"
                                        style="width: 97.5156px;">Book No</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1"
                                        aria-label="Books: activate to sort column ascending"
                                        style="width: 145.219px;">Books</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1"
                                        aria-label="Ratings: activate to sort column ascending"
                                        style="width: 109.984px;">Ratings</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">Final Cost</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">Negotiation Cost</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="Quantity: activate to sort column ascending"
                                        style="width: 65.3594px;">Add to Book List</th>
                                        <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 87.4688px;">  Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input"
                                                id="customCheckBox100" required="">
                                            <label class="form-check-label" for="customCheckBox100"></label>
                                        </div>
                                        </td>
                                        <td><span>01</span></td>
                                        <td>
                                        <div class="products">
                                            <div>
                                                <h6><a class="text-left" href="book_manage_view.php">Harry Potter a</a></h6>
                                                <span class="text-left">Web Designer</span>
                                            </div>
                                        </div>
                                        </td>
                                        <td data-label="controlq">
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
                                        <td>
                                        <span>Rs 315</span>
                                        </td>
                                        <td>
                                        <span>Rs 420</span>
                                        </td>
                                        <td>
                                        <span><a href="#" class="btn btn-danger shadow btn-xs me-1">
                                            Add
                                        </td>
                                        <td data-label="controlq">
                                            <div class="d-flex mt-p0">
                                                <a href="procur_complete_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                                <i class="fa fa-eye"></i>
                                                </a>
                                                <!-- <a href="book_manage_edit.php" class="btn btn-warning shadow btn-xs sharp me-1">
                                                <i class="fa fa-edit"></i>
                                                </a> -->
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                                <i class="fa fa-trash"></i></a>
                                                <!-- <a href="procur_book_assign.php" class="btn btn-primary shadow btn-sm m-0 me-1">
                                                Assign
                                                </a> -->
                                                <div class="dropdown custom-dropdown">
																<div class="btn sharp btn-primary tp-btn btn-xs" data-bs-toggle="dropdown" aria-expanded="false">
																	<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M13.5202 17.4167C13.5202 18.81 12.3927 19.9375 10.9994 19.9375C9.60601 19.9375 8.47852 18.81 8.47852 17.4167C8.47852 16.0233 9.60601 14.8958 10.9994 14.8958C12.3927 14.8958 13.5202 16.0233 13.5202 17.4167ZM9.85352 17.4167C9.85352 18.0492 10.3669 18.5625 10.9994 18.5625C11.6319 18.5625 12.1452 18.0492 12.1452 17.4167C12.1452 16.7842 11.6319 16.2708 10.9994 16.2708C10.3669 16.2708 9.85352 16.7842 9.85352 17.4167Z" fill="#2696FD"></path>
																	<path d="M13.5202 4.58369C13.5202 5.97699 12.3927 7.10449 10.9994 7.10449C9.60601 7.10449 8.47852 5.97699 8.47852 4.58369C8.47852 3.19029 9.60601 2.06279 10.9994 2.06279C12.3927 2.06279 13.5202 3.19029 13.5202 4.58369ZM9.85352 4.58369C9.85352 5.21619 10.3669 5.72949 10.9994 5.72949C11.6319 5.72949 12.1452 5.21619 12.1452 4.58369C12.1452 3.95119 11.6319 3.43779 10.9994 3.43779C10.3669 3.43779 9.85352 3.95119 9.85352 4.58369Z" fill="#2696FD"></path>
																	<path d="M13.5202 10.9997C13.5202 12.393 12.3927 13.5205 10.9994 13.5205C9.60601 13.5205 8.47852 12.393 8.47852 10.9997C8.47852 9.6063 9.60601 8.4788 10.9994 8.4788C12.3927 8.4788 13.5202 9.6063 13.5202 10.9997ZM9.85352 10.9997C9.85352 11.6322 10.3669 12.1455 10.9994 12.1455C11.6319 12.1455 12.1452 11.6322 12.1452 10.9997C12.1452 10.3672 11.6319 9.8538 10.9994 9.8538C10.3669 9.8538 9.85352 10.3672 9.85352 10.9997Z" fill="#2696FD"></path>
																	</svg>
																</div>
																<div class="dropdown-menu dropdown-menu-end" style="">
																	<a class="dropdown-item" href="javascript:void(0);">Approve Book</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Cancel Book</a>
																	<!-- <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
																	<a class="dropdown-item" href="javascript:void(0);">Option 3</a> -->
																</div>
															</div>
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
      <!--**********************************
         Main wrapper end
         ***********************************-->
         <?php
        include "admin/plugin/plugin_js.php";
    ?>
   </body>
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
</style>
