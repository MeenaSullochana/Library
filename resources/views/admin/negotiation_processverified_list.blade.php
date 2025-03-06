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
    <title>Government of Tamil Nadu - Book Procurement - Renegotiation By Vendor Vwerfied list</title>
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
                                <b>Renegotiation By Vendor Vwerfied list</b>
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
                                    
                                    <div>
                                        <!-- <div class="btn-group bootstrap-select select-picker pr-2 d-tc">
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
                                </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <button class="btn btn-info assignPro mb-5 justify-content-between" data-bs-toggle="modal" data-bs-target="#basicModal1">Send Renegotiation </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info"  style="min-width: 100px">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 25.375px;">
                                                    <div class="form-check custom-checkbox ms-0">
                                                        <input type="checkbox" class="form-check-input checkAllInput" id="checkAll2" required="">
                                                        <label class="form-check-label" for="checkAll2"></label>
                                                    </div>
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">S.No</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">Book Code</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Book Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">ISBN</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Publication Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Vendor Name</th>
                                                <!-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                        colspan="1"
                                        aria-label="Ratings: activate to sort column ascending"
                                        style="width: 109.984px;">Ratings</th> -->
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Actual Price</th>
                                                <!-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1"
                                        aria-label="ISBN(10/13): activate to sort column ascending"
                                        style="width: 126.609px;">Negotiation Cost</th> -->
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Discount <br> Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Discounted <br> Price</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Percentage</th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated <br> Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Renegotiation <br> Vendor Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Renegotiation <br> Vendor Price</th>

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Renegotiation <br> Vendor Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Renegotiation <br> Admin Price</th>

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Renegotiation <br> Admin Reason</th>

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending" style="width: 65.3594px;">Negotiation Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 87.4688px;"> Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                            $categori = DB::table('books')
                                            ->where('marks', '>=', 40)
                                            ->where('negotiation_status', '=', 1)
                                            ->whereNotNull('renegotiation_price')
                                            ->whereNotNull('renegotiation_message')
                                            ->leftJoin('publishers', 'books.user_id', '=', 'publishers.id')
                                    ->leftJoin('distributors', 'books.user_id', '=', 'distributors.id')
                                    ->leftJoin('publisher_distributors', 'books.user_id', '=', 'publisher_distributors.id')
                                    ->select('books.*', 
                                        DB::raw('COALESCE(publishers.publicationName, distributors.distributionName, publisher_distributors.publicationDistributionName) as vendorname')
                                    )
                                    ->get();
                                            @endphp

                                            @foreach($categori as $val)
                                            <tr role="row" class="odd">

                                                <td class="sorting_1">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input bookitem" id="bookitem{{ $val->id }}" value="{{ $val->id }}" data-book-id="{{ $val->id }}" required="">
                                                        <label class="form-check-label" for="bookitem{{ $val->id }}"></label>
                                                    </div>
                                                </td>


                                                <td><span>{{$loop->index +1}}</span></td>
                                                <td><span>{{$val->product_code}}</span></td>
                                                <td>
                                                    <div class="products">
                                                        <div>
                                                            <h6><a style="white-space:normal;" class="text-left" href="book_manage_view.php">{{$val->book_title}}</a></h6>
                                                            <span style="white-space:normal;" class="text-left">{{$val->subtitle}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>{{$val->isbn}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$val->nameOfPublisher}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$val->vendorname}}</span>
                                                </td>
                                                <td>
                                                    <span>Rs {{$val->price}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$val->discount}} %</span>
                                                </td>
                                                <td>
                                                    <span>Rs {{$val->discountedprice}}</span>
                                                </td>
                                                {{-- <td>
                                                    @if(!is_null($val->calculated_percentage))
                                                    <span>{{$val->calculated_percentage}}%</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    @if(!is_null($val->calculated_price))
                                                    <span>Rs {{$val->calculated_price}}</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                    
                                                </td>

                                                <td data-label="Message">
                                                 
                                                    <button type="button" id="successButton11" class="btn btn-primary btn-sm" data-id="{{$val->calculated_reason}}">View</button>
                                                 
                                                </td>

                                                <td>
                                                    @if(!is_null($val->negotiation_percentage))
                                                    <span>{{$val->negotiation_percentage}}%</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!is_null($val->negotiation_price))
                                                    <span>Rs {{$val->negotiation_price}}</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                            
                                                <td data-label="Message">
                                                <button type="button" id="successButton11" class="btn btn-primary btn-sm" data-id="{{$val->negotiation_message}}">View</button>
                                                </td>
                                                <td>
                                                    @if(!is_null($val->renegotiation_price))
                                                    <span>Rs {{$val->renegotiation_price}}</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                            
                                                <td data-label="Message">
                                                <button type="button" id="successButton1122" class="btn btn-primary btn-sm" data-id="{{$val->renegotiation_message}}">View</button>
                                                </td>
                                                <td data-label="Negotiation">
                                                    <button type="button"  class="btn btn-success">Renegotiation Verified </button>
    
                                                         </td>


                                                <td data-label="controlq">
                                                    <div class="d-flex mt-p0 justify-content-between">
                                                     
                                                      
                                                       
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
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason For Negotiation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBodyContent1"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to send this book to negotiation?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">

                    <div class="row">
                        <div class="tbl-caption alert alert-danger alert-dismissible fade show">

                            <h6>
                                <span id="row-1" style="float: left;"></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                <span id="row-2" style="float: right;"></span>
                            </h6>
                            <h6>
                                <span id="row-3" style="float: left;"></span> &nbsp; &nbsp; &nbsp;  
                                <span id="row-4" style="float: right;"></span>
                            </h6>
                            <h6>
                                <span id="row-5" style="float: left;"></span> &nbsp; &nbsp; &nbsp;  
                                <span id="row-6" style="float: right;"></span>
                            </h6>
                        </div>
                        
                        


                        <div class="col-12">
                            {{-- <div class="mb-3 mt-2 mx-sm-2">
                                <label for="percentage">Percentage</label>
                                <input type="number" class="form-control" id="percentage" placeholder="Enter the Percentage(example: 10)" required>
                            </div> --}}
                            <div class="mb-3 mt-2 mx-sm-2">
                                <label for="amount">Offered Price By Admin</label>
                                <input type="number" class="form-control" id="amount1" placeholder="Enter the Amount" required >

                                {{-- <input type="hidden" name="amount1" id="amount1">
                                <input type="number" class="form-control" id="amount" placeholder="Enter the Amount" required readonly> --}}
                            </div>
                            <div>
                                <input type="hidden" name="userid" id="hiddenInput">
                                <input type="hidden" name="price" id="hiddenInputprice">
                                <input type="hidden" name="discount" id="hiddenInputdiscount">
                                <input type="hidden" name="disprice" id="hiddenInputdisprice">
                                <input type="hidden" name="calprice" id="hiddenInputcalprice">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3 mt-2 mx-sm-2">
                                <label class="">Description</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter the Description"> -->
                                <textarea name="Description" id="Description" cols="30" rows="10" placeholder="Enter the Description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#ModalConfirmCenter">Close</button>
                <button type="submit" id="submitbutton22" class="btn btn-primary"> Submit</button>
            </div>

        </div>
    </div>
</div>


    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure you want to send this book to be put on hold?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 mt-2 mx-sm-2">
                                    <label class="">Description</label>
                                    <!-- <input type="text" class="form-control" placeholder="Enter the Description"> -->
                                    <textarea name="Description" id="Description" cols="30" rows="10" placeholder="Enter the Description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12">

                                <div> <input type="hidden" name="userid" id="hiddenInput"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-target="#ModalConfirmCenter">Close</button>
                    <button type="submit" id="submitbutton" class="btn btn-primary"> Submit</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to proceed?</p>

                    <input type="hidden" id="hiddenInput" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitbutton11" class="btn btn-primary submitbutton11">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "admin/plugin/plugin_js.php";
    ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">negotiation Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBodyContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">negotiation Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBodyContent22"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="basicModal1submitbutton" class="btn btn-primary submitbutton11">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('#example3').on('click', '#successButton111', function() {
     
            var message = $(this).data('id1');
            console.log(message);
            $('#modalBodyContent1').html(message);
            $('#myModal1').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example3').on('click', '#successButton11', function() {

  
            var message = $(this).data('id');

            $('#modalBodyContent').html(message);
            $('#myModal').modal('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#example3').on('click', '#successButton1122', function() {

  
            var message = $(this).data('id');

            $('#modalBodyContent22').html(message);
            $('#myModal22').modal('show');
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
    $(document).ready(function() {
        $("#basicModal1submitbutton").click(function() {
            // Check if at least one checkbox is checked
            var checkedBooks = $('.bookitem:checked');
            if (checkedBooks.length === 0) {
                toastr.error('Please select at least one book.');
                return;
            }

            // Get the book IDs
            var bookIds = checkedBooks.map(function() {
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
                url: '/admin/multirenegotiation',
                method: 'POST',
                data: requestData,
                success: function(response) {
                    console.log(response.data);
                    if (response.success) {
                        $("#basicModal1").modal("hide");
                        setTimeout(function() {
                            window.location.href = "/admin/negotiation_processverified_list";
                        }, 3000);
                        toastr.success(response.success, {
                            timeout: 45000
                        });
                    } else {
                        toastr.error(response.error, {
                            timeout: 45000
                        });
                    }
                },
                error: function(xhr, status, error) {
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

    .btn-sm,
    .btn-group-sm>.btn {
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