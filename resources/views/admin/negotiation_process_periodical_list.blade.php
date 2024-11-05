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
    <title>Government of Tamil Nadu - Book Procurement - Negotiation Process List</title>
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
                                <b>Negotiation Process Periodical List</b>
                            </h3>
                          
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div class="tbl-caption">
                                    
                                    <div>
                                      
                                    </div>
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info"  style="min-width: 100px">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">S.No</th>
                                                <!-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">Book Code</th> -->
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Periodical Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Books: activate to sort column ascending" style="width: 145.219px;">Periodicity</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ERoll No: activate to sort column ascending" style="width: 97.5156px;">Category</th>

                                    
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">single Issue Rate</th>
                                         
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Single Issue After Discount</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Annual Cost After Discount Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Percentage</th>

                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiated Percentage</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiated Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Calculated Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="ISBN(10/13): activate to sort column ascending" style="width: 126.609px;">Negotiation Reason</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending" style="width: 65.3594px;">Negotiation Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 87.4688px;"> Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                            $magazines = DB::table('magazines')
                                            ->where('marks', '>=', 40)
                                            ->where('negotiation_status', '=', 1)
                                            ->get();
                                            @endphp

                                            @foreach($magazines as $val)
                                            <tr role="row" class="odd">

                                                <td><span>{{$loop->index +1}}</span></td>
                                                <td>
                                                    <div class="products">
                                                        <div>
                                                            <h6><a style="white-space:normal;" class="text-left" href="/admin/magazine_views/{{ $val->id }}">{{$val->title}}</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>{{$val->periodicity}}</span>
                                                </td>
                                                <td>
                                                    <span>Rs {{$val->category}}</span>
                                                </td>
                                                <td>
                                                    <span>Rs {{$val->single_issue_rate}}</span>
                                                </td>
                                                <td>
                                                    <span>{{$val->single_issue_after_discount}} %</span>
                                                </td>
                                                <td>
                                                    <span>Rs {{$val->annual_cost_after_discount}}</span>
                                                </td>
                                                <td>
                                                    @if(!is_null($val->calculated_percentage))
                                                    <span>{{$val->calculated_percentage}}%</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!is_null($val->calculated_price))
                                                    <span>Rs {{$val->calculated_price}}</span>
                                                    @else
                                                    <span>N/A</span>
                                                    @endif
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
                                                    <button type="button" id="successButton111" class="btn btn-primary btn-sm" data-id1="{{$val->calculated_reason}}">View</button>
                                                </td>
                                                <td data-label="Message">
                                                <button type="button" id="successButton11" class="btn btn-primary btn-sm" data-id="{{$val->negotiation_message}}">View</button>
                                                </td>
                                                <td>
                                                    <div class="col-sm-12 m-b30">
                                                        <select class="col-sm-12 m-b30" name="user_approval" data-id="{{$val->id}}">
                                                            <option></option>

                                                            <option style="color: green;">Approve</option>
                                                            <option style="color: blue;">Hold</option>
                                                        </select>
                                                    </div>
                                                </td>


                                                <td data-label="controlq">
                                                    <div class="d-flex mt-p0">
                                                        <a href="/admin/magazine_views/{{ $val->id }}" class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-book"></i>
                                                        </a>
                                                        @if($val->user_type === "periodical_publisher")
                                                        <a href="/admin/periodical_publisher_view/{{$val->user_id}}"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                        @elseif($val->user_type === "admin")
                                                        <a href="">
                                                            Admin
                                                        </a>
                                                        @else
                                                        <a href="/admin/periodical_distributor_view/{{$val->user_id}}"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                       
                                                        @endif
                                                     
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
    $('#example3').on('change', "select[name='user_approval']", function(e) {
        var approval_ = $(this).val();
        var id = $(this).data('id');
        if (approval_ == 'Hold') {
            $('#hiddenInput').val(id);
            $('#exampleModalCenter').modal('show');
        } else if (approval_ == 'Approve') {
            $('#hiddenInput').val(id);
            $('#basicModal').modal('show');
        }
    });
</script>


<script>
    $(document).ready(function() {

        $("#submitbutton11").click(function() {
            var periodicalId = $("#hiddenInput").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/approveperiodicalnegotiationstatus',
                method: 'POST',
                data: {
                    periodicalId: periodicalId
                },
                success: function(response) {
                    if (response.success) {
                        $('#basicModal').modal('hide');
                        setTimeout(function() {
                            window.location.href = "/admin/negotiation_process_periodical_list";
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
            var periodicalId = $("#hiddenInput").val();
            var Description = $("#Description").val();
            var data = {
                'periodicalId': periodicalId,
                'Description': Description,

            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/holdperiodicalnegotiationstatus',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        $('#exampleModalCenter').modal('hide');
                        setTimeout(function() {
                            window.location.href = "/admin/negotiation_process_periodical_list";
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