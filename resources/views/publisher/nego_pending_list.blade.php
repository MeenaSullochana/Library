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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
    include 'publisher/plugin/plugin_css.php';
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
                                <b>Negotiation Books List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-arrow-left"></i> Back</a>
                            <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                        </div>
                    </div>
                </div>
                <div class="row p-2 rounded bg-white">
                    <div class="col-xl-12">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div class="tbl-caption">
                                    <span class="bulk-action">
                                        <!-- <a href="book_manage_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                    </span>
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    {{-- empoloyees-tbl3 --}}
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">


                                                <th>S.no</th>
                                                <th>Title</th>
                                                <th>Book Price</th>
                                                <th>Discount Offer(%)</th>
                                                <th>Discounted Price</th>
                                                <th>Calculated Price</th>
                                                <th>Negotiation </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $id = auth('publisher')->user()->id;
                                                $categori = DB::table('books')->where('marks', '>=', 40)->where('user_id', '=', $id)->where('negotiation_status', '=', 0)->get();
                                            @endphp

                                            @foreach ($categori as $val)
                                                <tr role="row" class="odd">

                                                    <td data-label="S/No"><span>{{ $loop->index + 1 }}</span></td>
                                                    <td data-label="Title">
                                                        <div class="products">
                                                            <div>
                                                                <h6><a class="text-left"
                                                                        href="book_manage_view.php">{{ $val->book_title }}</a>
                                                                </h6>
                                                                <span class="text-left">{{ $val->subtitle }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-label="Book Price"><a href="javascript:void(0)" class="text-primary">Rs
                                                            {{ $val->price }}</a></td>
                                                <td data-label="Discount Offer(%)"><a href="javascript:void(0)" class="text-primary">{{$val->discount}}%</a></td>
                                                <td data-label="Discounted Price"><a href="javascript:void(0)" class="text-primary">Rs {{$val->discountedprice}}</a></td>
                                                    <td data-label="Calculated Price">
                                                        <span><a href="#" class="badge bg-info">Rs
                                                                {{ $val->calculated_price }}</a> </span>
                                                    </td>
                                                    <td data-label="Negotiation">
                                                        <div class="col-sm-12 m-b30">
                                                            <select class="col-sm-12 m-b30" name="user_approval"
                                                                data-id="{{ $val->id }}">
                                                                <option>Select Anyone</option>
                                                                <option style="color: green;">Accept</option>
                                                                <option style="color: blue;">Not Accept</option>
                                                                <option style="color: red;">Negotiation</option>
                                                              
                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td data-label="control">
                                                        <div class="d-flex mt-p0">
                                                            <a href="/publisher/book_manage_view/{{$val->id}}"
                                                                class="btn btn-success shadow btn-xs sharp me-1">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <!-- <a href="#"
                                                                class="btn btn-danger shadow btn-xs sharp me-1">
                                                                <i class="fa fa-trash"></i>
                                                            </a> -->
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
        @include ('publisher.footer')
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
    include 'publisher/plugin/plugin_js.php';
    ?>
    <!-- Modal Confirm Apply Procurement-->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you send this book to book recurement Negotiation ?</h5>
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
                                    <textarea name="Description" id="Description" cols="30" rows="10" placeholder="Enter the Description"
                                        class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3 mt-2 mx-sm-2">
                                    <label class="">Amount</label>
                                    <input type="Number" class="form-control" id="amount"
                                        placeholder="Enter the Amount" required>
                                </div>
                                <div> <input type="hidden" name="userid" id="hiddenInput"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        data-bs-target="#ModalConfirmCenter">Close</button>
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
                    <!-- Hidden input field to store the data-id value -->
                    <input type="hidden" id="hiddenInput" value="">
                    <input type="hidden" id="hiddenInput1" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitbutton11"
                        class="btn btn-primary submitbutton11">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#example3').on('change', "select[name='user_approval']", function(e) {
        var approval_ = $(this).val();
        var pubdistid = $(this).data('id');
        if (approval_ == 'Reject') {
            $('#hiddenInput1').val(approval_);
            $('#hiddenInput').val(pubdistid);
            $('#basicModal').modal('show');
        } else if (approval_ == 'Approve') {
            $('#hiddenInput1').val(approval_);
            $('#hiddenInput').val(pubdistid);
            $('#basicModal').modal('show');
        } else {

            $('#hiddenInput').val(pubdistid);
            $('#exampleModalCenter').modal('show');
        }
    });
</script>


<script>
    $(document).ready(function() {

        $("#submitbutton11").click(function() {
            var bookId = $("#hiddenInput").val();
            var status = $("#hiddenInput1").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/publisher/sendnegotiationstatus',
                method: 'POST',
                data: {
                    bookId: bookId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        $('#basicModal').modal('hide');
                        setTimeout(function() {
                            window.location.href = "/publisher/nego_pending_list";
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


                error: function(error) {

                    console.error('Failed to create record:', error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#submitbutton").click(function() {
            var bookId = $("#hiddenInput").val();
            var Description = $("#Description").val();
            var amount = $("#amount").val();

            // Create an array
            var data = {
                'bookId': bookId,
                'Description': Description,
                'amount': amount
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/publisher/sendnegotiationsamount',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#exampleModalCenter').modal('hide');
                        setTimeout(function() {
                            window.location.href = "/publisher/nego_pending_list";
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

                error: function(error) {
                    console.error('Failed to create record:', error);
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
