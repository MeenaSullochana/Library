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
    <title>Government of Tamil Nadu - Book Procurement - Negotiation Failed Periodical List</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_distributor/images/fevi.svg') }}">
    <?php
    include "periodical_distributor/plugin/plugin_css.php";
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
        @include ('periodical_distributor.navigation')
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
                                <b>Negotiation - Rejected Periodical List</b>
                            </h3>
                            <a onclick="javascript:window.history.back();" class="btn btn-primary  btn-sm" href="/periodical_distributor/index">
                                <i class="fa fa-angle-double-left"></i> Go Back</a>
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
                        <div class="card-body p-3">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div class="tbl-caption">
                                    {{-- <span class="bulk-action">
                                        <a href="book_manage_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </span> --}}
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example4" class="table dataTable no-footer" role="grid" aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">S.No</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Periodical Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Periodicity</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">Category</th>
    
                                    
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">single Issue Rate</th>
                                         
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Single Issue <br> After Discount</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Annual Cost After <br> Discount Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated <br> Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiation Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiation Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiation Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Reject Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiation Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Action</th>
                                             
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $id=auth('periodical_distributor')->user()->id;
                                            $categori = DB::table('magazines')
                                            ->where('marks', '>=', 40)
                                            ->where('user_id', '=',$id)
                                            ->where('negotiation_status', '=', 3)
                                            ->get();
                                            @endphp

                                            @foreach($categori as $val)
                                            <tr role="row" class="odd">

                                                <td data-label="S.No"><span>{{ $loop->iteration }}</span></td>
                                                <td data-label="Title">
                                                    <div class="products">
                                                        <h6><a class="text-left" href="/periodical_distributor/magazine_view">{{ $val->title }}</a></h6>
                                                    </div>
                                                </td>
                                                <td data-label="Periodicity"><span>{{ $val->periodicity }}</span></td>
                                                <td data-label="Category"><span>{{ $val->category }}</span></td>
                                                <td data-label="Single Issue Rate">Rs {{ $val->single_issue_rate }}</td>
                                                <td data-label="Single Issue After Discount">{{ $val->single_issue_after_discount }}%</td>
                                                <td data-label="Annual Cost After Discount Price">Rs {{ $val->annual_cost_after_discount }}</td>
                                                <td data-label="Calculated Percentage">
                                                    {{ $val->calculated_percentage ? $val->calculated_percentage . '%' : 'N/A' }}
                                                </td>
                                                <td data-label="Calculated Price">
                                                    {{ $val->calculated_price ? 'Rs ' . $val->calculated_price : 'N/A' }}
                                                </td>
                                                <td data-label="Admin Price">
                                                    @if(!is_null($val->negotiation_percentage))
                                                    <span><a href="#">{{$val->negotiation_percentage}}%</a> </span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                                <td data-label="Admin Price">
                                                    @if(!is_null($val->negotiation_price))
                                                    <span><a href="#">Rs {{$val->negotiation_price}}</a> </span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                                <td data-label="Negotiation Message">
                                                    <button type="button" id="successButton111" class="btn btn-primary btn-sm" data-id="{{$val->calculated_reason}}">View</button>
                                                </td>

                                                <td data-label="Negotiation Message">
                                                    <button type="button" id="successButton11" class="btn btn-primary btn-sm" data-id="{{$val->negotiation_message}}">View</button>
                                                </td>
                                                <td data-label="Negotiation Message">
                                                    <button type="button" id="successButton112" class="btn btn-primary btn-sm" data-id="{{$val->negotiation_reject_message}}">View</button>
                                                </td>
                                                <td data-label="Negotiation">
                                                    <button type="button" id="successButton" class="btn btn-danger">Reject Book</button>

                                                </td>
                                                <td data-label="control">
                                                    <div class="d-flex justify-content-center align-items-center mt-p0">
                                                        <a href="/periodical_distributor/magazine_view/{{ $val->id }}" class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
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
        @include ("periodical_distributor.footer")
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
    include "periodical_distributor/plugin/plugin_js.php";
    ?>
    <!-- Modal Confirm Apply Procurement-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Negotiation Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBodyContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Calculation Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBodyContent1"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBodyContent2"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('#example3').on('click', '#successButton11', function() {
            var message = $(this).data('id');
            console.log(message);
            $('#modalBodyContent').html(message);
            $('#myModal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#example3').on('click', '#successButton111', function() {
            var message = $(this).data('id');
            console.log(message);
            $('#modalBodyContent1').html(message);
            $('#myModal1').modal('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#example3').on('click', '#successButton112', function() {
            var message = $(this).data('id');
            console.log(message);
            $('#modalBodyContent2').html(message);
            $('#myModal2').modal('show');
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