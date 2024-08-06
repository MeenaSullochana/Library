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
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <style>
    .red-row {
        background-color: red !important;
    }
    </style>
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
</head>

<body>
    <!--*******
         Preloader start
         ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
         Preloader end
         ********-->
    <!--************
         Main wrapper start
         *************-->
    <div id="main-wrapper">
        <!--************
            Nav header start
            *************-->
        @include ('admin.navigation')
        <!--************
            Sidebar end
            *************-->
        <!--************
            Content body start
            *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Apply Periodical Meta Check</b>
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <button class="btn btn-info assignPro mb-5 justify-content-between" data-bs-toggle="modal"
                                data-bs-target="#basicModal">Assign</button>
                            <!-- <button class="btn btn-info mb-5 justify-content-between"  id="assign">Assign</button> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card dz-card" id="bootstrap-table2">
                            <div class="card-header flex-wrap d-flex justify-content-between  border-0">
                                <div>
                                    <h4 class="card-title">Meta Periodical List</h4>

                                </div>
                                <ul class="nav nav-tabs dzm-tabs" id="myTab-1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <!-- <button class="nav-link active" id="home-tab-1" data-bs-toggle="tab"
                                        data-bs-target="#bordered" type="button" role="tab"
                                        aria-selected="true">Preview</button> -->
                                    </li>

                                </ul>
                            </div>

                            <!-- tab-content -->
                            <div class="table-responsive p-3">
                                <table class="table table-responsive-md memeber_table" id="yourTableId">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAllperiodical"
                                                        required="">
                                                    <label class="form-check-label" for="checkAllperiodical"></label>
                                                </div>
                                            </th>
                                            <th><strong>S.no.</strong></th>
                                            <th>Periodical Title</th>
                                            <th>Periodical Language</th>
                                            <th>Periodical Category</th>
                                            <th>Periodical Periodicity</th>
                                            <th>Periodical RNI Details</th>
                                            <th>User Type</th>
                                            <th>Publication Name</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $val)

                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input periodicalitem"
                                                        id="customCheckBox{{ $loop->index + 2 }}" required=""
                                                        value="{{$val->id}}" data-periodical-id="{{ $val->id }}">
                                                    <label class="form-check-label"
                                                        for="customCheckBox{{ $loop->index + 2 }}"></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="products">
                                                    <div>
                                                        <h6><a class="text-left"
                                                                href="/admin/magazine_view/{{ $val->id }}">{{ $val->title }}</a>
                                                        </h6>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$val->language}}</td>

                                            <td>{{$val->category}}</td>
                                            <td>{{$val->periodicity}}</td>
                                            <td>{{$val->rni_details}}</td>
                                            <td>{{$val->user_type}}</td>
                                            <td>{{$val->publisher_name}}</td>
                                            <td data-label="controlq">
                                                <div class="d-flex mt-p0">
                                                    <a href="/admin/magazine_view/{{ $val->id }}"
                                                        class="btn btn-success shadow btn-xs sharp me-1">
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
                        <!-- /tab-content -->

                    </div>
                    <div class="col-xl-6">
                        <div class="card dz-card" id="bootstrap-table2">
                            <div class="card-header flex-wrap d-flex justify-content-between  border-0">
                                <div>
                                    <h4 class="card-title">Meta Checker List</h4>

                                </div>
                                <ul class="nav nav-tabs dzm-tabs" id="myTab-1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <!-- <button class="nav-link active" id="home-tab-1" data-bs-toggle="tab"
                                        data-bs-target="#bordered" type="button" role="tab"
                                        aria-selected="true">Preview</button> -->
                                    </li>

                                </ul>
                            </div>
                                    @php
                                         $metachecker = DB::table('librarians')->where('metaChecker','Yes')->get();
                                    @endphp
                            <!-- tab-content -->
                            <div class="table-responsive p-3">
                                <table class="table table-responsive-md memeber1_table" id="yourTableId1">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                      
                                            </th>
                                            <th><strong>S.no.</strong></th>
                                            <th>Librarian Name</th>
                                            <th>Library Name</th>
                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($metachecker as $key=>$val)

                                        <tr>
                                          
                                            <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input librarianitem"
                                                        id="customCheckBox{{ $loop->index + 2 }}" required=""
                                                        value="{{$val->id}}"  data-librarian-id="{{ $val->id }}">
                                                    <label class="form-check-label"
                                                        for="customCheckBox{{ $loop->index + 2 }}"></label>
                                                </div>
                                            </td>
                                            <td>{{$loop->index +1}}</td>
                                            <td><span>{{$val->librarianName}}</span></td>
                                            <td><span>{{$val->libraryName}}</span></td>
                                          
                                            <td data-label="controlq">
                                                <div class="d-flex mt-p0">
                                                    <a href="/admin/librarianview/{{$val->id}}"
                                                        class="btn btn-success shadow btn-xs sharp me-1">
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
                        <!-- /tab-content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!--************
            Content body end
            *************-->
    <!--************
            Footer start
            *************-->
    @include ("admin.footer")
    <!--************
            Footer end
            *************-->
    <!--************
            Support ticket button start
            *************-->
    <!--************
            Support ticket button end
            *************-->
    </div>
    <!--************
         Main wrapper end
         *************-->
    <?php
         include "admin/plugin/plugin_js.php";
     ?>
    <script>
    $(document).ready(function() {

        $('.memeber_table').dataTable();
        $('.memeber1_table').dataTable();

    });
    </script>
    <script>
    $(document).ready(function() {

        $('#checkAllperiodical').click(function() {
            $('.periodicalitem').prop('checked', this.checked);
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $('#selectAlllibrarian').click(function() {
            $('.libraianitem').prop('checked', this.checked);
        });
    });
    </script>
    <script>
    $('.submitbutton11').click(function() {
        var checkeperiodical = $('.periodicalitem:checked').map(function() {
            return $(this).data('periodical-id');
        }).get();

        var checkedLibrarian = $('.librarianitem:checked').map(function() {
            return $(this).data('librarian-id');
        }).get();

        var requestData = {
            periodicalId: checkeperiodical,
            metaLibraianId: checkedLibrarian,
        };
  console.log(requestData);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/assign/librarianperiodical',
            method: 'POST',
            data: requestData,
            success: function(response) {
                console.log(response.data);
                if (response.success) {
                    $('#basicModal').modal('hide'); // Corrected method name
                    setTimeout(function() {
                        window.location.href = "/admin/meta_periodical_list";
                    }, 3000);
                    toastr.success(response.success, {
                        timeout: 45000
                    });
                } else {
                    $('#basicModal').modal('hide'); // Corrected method name
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
    </script>
  
</body>

</html>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.previous.disabled,
.dataTables_wrapper .dataTables_paginate .paginate_button.next.disabled {
    color: var(--primary) !important;
    width: 70px;
}
</style>