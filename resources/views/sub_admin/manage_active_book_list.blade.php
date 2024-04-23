
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
    <title>Government of Tamil Nadu - Book Procurement - Active Book List</title>
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
                                <b>Active Books List</b>
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
                        <div class="card-body p-3">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div class="tbl-caption">
                                    <span>
                                    <button class="btn btn-info assignPro mb-5 justify-content-between active-btn" data-bs-toggle="modal" data-bs-target="#basicModal" data-state="active">Active</button>

                                     <button class="btn  btn-danger assignPro mb-5 justify-content-between inactive-btn" data-bs-toggle="modal" data-bs-target="#basicModal1" data-state="inactive">Inactive</button>

                                    </span>
                                    <div>

                                        <div class="btn-group bootstrap-select select-picker pr-2 d-tc">
                                            <!-- <div class="dropdown-menu open" role="combobox">
                                                <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                                    <li data-original-index="0" class="selected"><a tabindex="0"
                                                            class="" data-tokens="null" role="option"
                                                            aria-disabled="false" aria-selected="true"><span
                                                                class="text">Date
                                                                Descending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="1"><a tabindex="0" class=""
                                                            data-tokens="null" role="option" aria-disabled="false"
                                                            aria-selected="false"><span class="text">Date
                                                                Ascending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="2"><a tabindex="0" class=""
                                                            data-tokens="null" role="option" aria-disabled="false"
                                                            aria-selected="false"><span class="text">Title
                                                                Descending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="3"><a tabindex="0" class=""
                                                            data-tokens="null" role="option" aria-disabled="false"
                                                            aria-selected="false"><span class="text">Title
                                                                Ascending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="4"><a tabindex="0" class=""
                                                            data-tokens="null" role="option" aria-disabled="false"
                                                            aria-selected="false"><span class="text">Year
                                                                Descending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                    <li data-original-index="5"><a tabindex="0" class=""
                                                            data-tokens="null" role="option" aria-disabled="false"
                                                            aria-selected="false"><span class="text">Year
                                                                Ascending</span><span
                                                                class="glyphicon glyphicon-ok check-mark"></span></a>
                                                    </li>
                                                </ul>
                                            </div> -->

                                            @php
                                        $categori = DB::table('book_subject')->where('status','=','1')->get();
                                       @endphp
                                       <select name="sortColumn" id="books-sort" class="form-control select-picker pr-2 d-tc" autocomplete="off" tabindex="-98">
                                       <option data-order="DESC"> <i class="fa fa-filter" aria-hidden="true"></i>Select One</option>
                                       @foreach($categori as $val)
                                          <option value="{{ $val->name }}" data-order="DESC">{{ $val->name }}</option>
                                       @endforeach
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer memeber1_table" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">
                                                <th>
                                                <div class="form-check custom-checkbox ms-0">
    <input type="checkbox" class="form-check-input dataall" id="dataall" required="">
    <label class="form-check-label" for="dataall"></label>
</div>

                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="ERoll No: activate to sort column ascending"
                                                    style="width: 97.5156px;"> S.No</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Books: activate to sort column ascending"
                                                    style="width: 145.219px;">Books</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Review Rating: activate to sort column ascending"
                                                    style="width: 109.984px;">Book Cost</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Ranking: activate to sort column ascending"
                                                    style="width: 126.609px;">User Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                colspan="1" aria-label="Status: activate to sort column ascending"
                                                style="width: 65.3594px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                colspan="1" aria-label="Change Status: activate to sort column ascending"
                                                style="width: 72.7031px;"> Change Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 87.4688px;"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                $books = DB::table('books')
                                ->where('marks', '>=', 40)
                               ->where('negotiation_status', '=', 2)
                               ->where('book_active_status', '=', 1)
                               ->get();
                                             @endphp

                                             @foreach($books as $val)
                                            <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input bookitem" id="customCheckBox100" data-book-id="{{$val->id}}"  value="{{$val->id}}">
                                                    <label class="form-check-label" for="customCheckBox100"></label>
                                                </div>
                                            </td>
                                                <td><span>{{$loop->index+1}}</span></td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset("Books/front/".$val->front_img)}}" class="avatar avatar-md"
                                                            alt="">
                                                        <p class="mb-0 ms-2">{{$val->book_title}}</p>
                                                    </div>
                                                </td>
                                                <td >
                                                {{$val->final_price}}

                                                @if($val->user_type == "publisher_distributor")
                                                <td>
                                                    <span> publisher cum distributor</span>
                                                </td>
                                                @else
                                                <td>
                                                    <span> {{$val->user_type}}</span>
                                                </td>
                                                @endif

                                                @if($val->book_active_status == 1)
                                                <td>
                                                        <span class="btn btn-success shadow btn-xs me-1>Active">Active</span>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>

                                                    @endif

                                                    <td class="sorting_1">
                                                        <div class="form-check form-switch" id="load">
                                                             <input class="form-check-input toggle-class" type="checkbox"
                                                                data-id="{{$val->id}}" name="featured_status"
                                                                     data-isprm="1" data-onstyle="success"
                                                                             data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->book_active_status ? 'checked' : '' }}>
                                                               <label class="form-check-label"
                                                                     for="flexSwitchCheckDefault"></label>
                                                               </div>
                                                           </td>
                                                    </td>

                                                <td data-label="controlq text-center">
                                                    <div class="d-flex mt-p0">
                                                        <a href="../website/shope.php"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-danger  shadow btn-xs sharp me-1">
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

<div class="modal fade" id="basicModal1">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton22" class="btn btn-primary submitbutton22">Confirm</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
        $(document).ready(function () {


            $('.memeber1_table').dataTable();

        });
    </script>
<script>
    $(document).ready(function() {
        $('#example3').on('change', '.toggle-class', function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var bookid = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "put",
                dataType: "json",
                url: '/admin/bookstatuschange',
                data: { 'status': status, 'bookid': bookid },
                success: function(response) {
                    if (response.success) {
                        setTimeout(function() {
                            window.location.href = "/admin/manage_active_book_list";
                        }, 3000);
                        toastr.success(response.success, { timeout: 45000 });
                    } else {
                        toastr.error(response.error, { timeout: 45000 });
                        setTimeout(function() {
                            window.location.href = "/admin/manage_active_book_list";
                        }, 3000);
                    }
                }
            });
        });
    });


</script>
<script>
$(document).ready(function () {
    $('#books-sort').change(function () {
        var sortColumn = $(this).val();

        $.ajax({
            url: '/admin/get-activebooks/' + sortColumn,
            data: { 'status': 'all' },
            type: 'GET',
            success: function (data) {
                console.log(data);

                if (data.html.trim() === '<tr><td colspan="5" class="text-center">No records found</td></tr>') {
                    $('#example3 tbody').empty();
                    $('.memeber1_table').DataTable().clear().destroy();
                    $('.memeber1_table').dataTable();
                } else {
                    $('#example3 tbody').empty();
                    $('.memeber1_table').DataTable().clear().destroy();
                     $('#example3 tbody').html(data.html);
                     $('.memeber1_table').dataTable();
                }
            },
            error: function () {
                $('#example3 tbody').html('<tr><td colspan="5" class="text-center">Error loading data.</td></tr>');
                $('#example3 tbody').html('<tr><td colspan="5" class="text-center">Error loading data.</td></tr>');
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    $('#dataall').click(function() {
        $('.bookitem').prop('checked', this.checked);
    });
});

</script>

<script>
   $('.submitbutton11').click(function () {
    var checkebook = $('.bookitem:checked').map(function () {
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
            url: '/admin/multiple-statuschangebook',
            method: 'POST',
            data: { 'requestData': requestData, 'status': '1' },
            success: function (response) {
              console.log(response.data);
              if(response.success){
                $('#basicModal').modal('hide');
            //    $('#basicModal').hide();
                setTimeout(function() {
                    window.location.href ="/admin/manage_active_book_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                $('#basicModal').modal('hide');
                //   $('#basicModal').hide();
                toastr.error(response.error,{timeout:45000});

               }

            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });

});

</script>
<script>
   $('.submitbutton22').click(function () {
    var checkebook = $('.bookitem:checked').map(function () {
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
            url: '/admin/multiple-statuschangebook',
            method: 'POST',
            data: { 'requestData': requestData, 'status': '0' },
            success: function (response) {
              console.log(response.data);
              if(response.success){
                $('#basicModal1').modal('hide');
                setTimeout(function() {
                    window.location.href ="/admin/manage_active_book_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                $('#basicModal1').modal('hide');
                toastr.error(response.error,{timeout:45000});

               }

            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
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
