
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
                                <b>Apply Book Meta Check</b>
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10"></div>
                  <div class="col-md-2">
                     <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-info assignPro mb-5 justify-content-between" data-bs-toggle="modal"  data-bs-target="#basicModal">Assign</button>
                        <!-- <button class="btn btn-info mb-5 justify-content-between"  id="assign">Assign</button> -->
                     </div>
                  </div>
               </div>
              <div class="row">
              <div class="col-xl-6">
                    <div class="card dz-card" id="bootstrap-table2">
                        <div class="card-header flex-wrap d-flex justify-content-between  border-0">
                            <div>
                                <h4 class="card-title">Meta Book List</h4>

                            </div>
                            <ul class="nav nav-tabs dzm-tabs" id="myTab-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <!-- <button class="nav-link active" id="home-tab-1" data-bs-toggle="tab"
                                        data-bs-target="#bordered" type="button" role="tab"
                                        aria-selected="true">Preview</button> -->
                                </li>

                            </ul>
                        </div>
                        <div class="input-group mb-3">
                                 <div class="card-header-form">

                                       <select name="sortColumn" id="books-sort" class="form-control select-picker pr-2 d-tc" autocomplete="off" tabindex="-98">
                                       <option value="All"> <i class="fa fa-filter" aria-hidden="true"></i>All Record</option>

                                          @php
                                                          $categori = DB::table('book_subject')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}" data-order="DESC">{{$val->name}}</option>

                                                            @endforeach

                                    </select>

                                 </div>
                              </div>
                        <!-- tab-content -->
                        <div class="table-responsive p-3">
                        <table class="table table-responsive-md memeber_table" id="yourTableId">
                                <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="checkAllbook" required="">
                                                <label class="form-check-label" for="checkAllbook"></label>
                                            </div>
                                        </th>
                                        <th><strong>S.no.</strong></th>
                                        <th>Book Title</th>
                                        <th>Book Language</th>
<th>Book Subject</th>
                                        <th>Book ISBN</th>
                                        <th>Book Author</th>
                                        <th>User Type</th>
                                        <th>Publication Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $val)
                                    @if($val->check == "unique")
                                        <tr>
                                        <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input bookitem" id="customCheckBox{{ $loop->index + 2 }}" required=""
                                                    value="{{$val->id}}" data-book-id="{{ $val->id }}"  >
                                                    <label class="form-check-label" for="customCheckBox{{ $loop->index + 2 }}" ></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="products">
                                                    <div>
                                                        <h6><a class="text-left" href="/admin/book_manage_view/{{ $val->id }}">{{ $val->book_title }}</a></h6>
                                                        <span class="text-left">{{ $val->subtitle }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            @if($val->language == 'Other_Indian')
                                            <td>{{$val->other_indian}}</td>
                                                           @elseif($val->language == 'Other_Foreign')
                                                           <td>{{$val->other_foreign}}</td>
                                                           @else
                                                           <td>{{$val->language}}</td>
                                                           @endif
<td>{{$val->subject}}</td>
                                                           <td>{{$val->isbn}}</td>
                                                           <td>{{$val->author_name}}</td>

                                                           <td>{{$val->user_type}}</td>
                                                           <td>{{$val->nameOfPublisher}}</td>

                                            <td data-label="controlq">
                                                <div class="d-flex mt-p0">
                                                    <a href="/admin/book_manage_view/{{ $val->id }}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @else
                                    <tr class="red-row">
                                        <td>
                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                    <input type="checkbox" class="form-check-input bookitem" id="customCheckBox{{ $loop->index + 2 }}" required=""
                                                    value="{{$val->id}}" data-book-id="{{ $val->id }}"  >
                                                    <label class="form-check-label" for="customCheckBox{{ $loop->index + 2 }}" ></label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="products">
                                                    <div>
                                                        <h6><a class="text-left" href="/admin/book_manage_view/{{ $val->id }}">{{ $val->book_title }}</a></h6>
                                                        <span class="text-left">{{ $val->subtitle }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            @if($val->language == 'Other_Indian')
                                            <td>{{$val->other_indian}}</td>
                                                           @elseif($val->language == 'Other_Foreign')
                                                           <td>{{$val->other_foreign}}</td>
                                                           @else
                                                           <td>{{$val->language}}</td>
                                                           @endif
<td>{{$val->subject}}</td>
                                                           <td>{{$val->isbn}}</td>
                                                           <td>{{$val->author_name}}</td>
                                                           <td>{{$val->user_type}}</td>
                                                           <td>{{$val->nameOfPublisher}}</td>
                                            <td data-label="controlq">
                                                <div class="d-flex mt-p0">
                                                    <a href="/admin/book_manage_view/{{ $val->id }}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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

                        <!-- tab-content -->
                        <div class="table-responsive p-3">
                        <table class="table table-responsive-md memeber1_table" id="yourTableId1">
                            <thead>
                                <tr>
                                    <th style="width:50px;">
                                        <!-- <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="selectAlllibrarian" required="">
                                            <label class="form-check-label" for="selectAlllibrarian"></label>
                                        </div> -->
                                    </th>
                                    <th><strong>S.no.</strong></th>
                                    <th>Librarian Name</th>
                                    <th>Library Name</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @php
                                    $rev = DB::table('librarians')->where('status','=','1')->where('metaChecker','=','yes')->get();
                                @endphp
                                @foreach($rev as $val)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input libraianitem" id="customCheckBox{{$loop->index + 3}}" required=""
                                                    data-librarian-id="{{$val->id}}" value="{{$val->id}}">
                                                <label class="form-check-label" for="customCheckBox{{$loop->index + 3}}"></label>
                                            </div> 
                                        </td>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>
                                            <span>{{$val->librarianName}}</span>
                                        </td>
                                        <td>
                                            <span>{{$val->libraryName}}</span>
                                        </td>
<td>
    @php
        $subject1 = json_decode($val->subject); 
    @endphp
    <span>
        @foreach($subject1 as $subject)
            {{ $subject }}
        @endforeach
    </span>
</td>

                                        <td data-label="controlq">
                                            <div class="d-flex mt-p0">
                                                <a href="/admin/librarianview/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- /tab-content -->

                </div>
              </div>
            </div>
        </div>
    </div>  <div class="modal fade" id="basicModal">
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
        $(document).ready(function () {

            $('.memeber_table').dataTable();
            $('.memeber1_table').dataTable();

        });
    </script>
    <script>
    $(document).ready(function() {

        $('#checkAllbook').click(function() {
            $('.bookitem').prop('checked', this.checked);
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
   $('.submitbutton11').click(function () {
    var checkebook = $('.bookitem:checked').map(function () {
        return $(this).data('book-id');
    }).get();

    var checkedLibrarian = $('.librarianitem:checked').map(function() {
    return $(this).data('librarian-id');
}).get();

    var requestData = {
        bookId: checkebook,
        metaLibraianId: checkedLibrarian,
    };
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/assign/librarian',
            method: 'POST',
            data: requestData,
            success: function (response) {
              console.log(response.data);
              if(response.success){
                    $('#basicModal').modal('hide'); // Corrected method name
                    setTimeout(function() {
                        window.location.href = "/admin/meta_book_list";
                    }, 3000);
                    toastr.success(response.success, {timeout: 45000});
                } else {
                    $('#basicModal').modal('hide'); // Corrected method name
                    toastr.error(response.error, {timeout: 45000});
                }


            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });

});

</script>
<script>
$(document).ready(function () {
    $('#books-sort').change(function () {
        var sortColumn = $(this).val();
        $.ajax({
            url: '/admin/get-metabooks/' + sortColumn,
            type: 'GET',
            success: function (data) {
                console.log(data);

                if (data.success.trim() === '<tr><td colspan="5" class="text-center">No records found</td></tr>') {
                    $('#yourTableId tbody').empty();
                    $('.memeber_table').DataTable().clear().destroy();
                    $('.memeber_table').dataTable();
                } else {
                    $('#yourTableId tbody').empty();
                    $('.memeber_table').DataTable().clear().destroy();
                    $('#yourTableId tbody').html(data.success);
                    $('.memeber_table').dataTable();
                }

                if (data.success2.trim() === '<tr><td colspan="5" class="text-center">No records found</td></tr>') {
                    $('#yourTableId1 tbody').empty();
                    $('.memeber1_table').DataTable().clear().destroy();
                    $('.memeber1_table').dataTable();
                } else {
                    $('#yourTableId1 tbody').empty();
                    $('.memeber1_table').DataTable().clear().destroy();
                    $('#yourTableId1 tbody').html(data.success2);
                    $('.memeber1_table').dataTable();
                }
                
            },
            error: function () {
                $('#yourTableId tbody').html('<tr><td colspan="5" class="text-center">Error loading data.</td></tr>');
                $('#yourTableId11 tbody').html('<tr><td colspan="5" class="text-center">Error loading data.</td></tr>');
            }
        });
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
