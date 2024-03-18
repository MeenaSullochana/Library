
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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Order Management List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="member_create">
                                <i class="fas fa-plus"></i> Add Librarian</a>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 active-p">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-colm" role="tabpanel"
                                aria-labelledby="pills-colm-tab">
                                <div class="card">
                                    <div class="card-body px-0">
                                        <div class="table-responsive active-projects user-tbl  dt-filter">
                                            <div id="user-tbl_wrapper" class="dataTables_wrapper no-footer">
                                                <div class=" text-right">
                                                    <div class="dt-buttons btn-group flex-wrap mb-3 p-3">
                                                        <!-- <button class="btn btn-secondary buttons-print" tabindex="0"
                                                            aria-controls="report_table" type="button"><span><i
                                                                    class="fas fa-print"></i> Print</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-excel buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="far fa-file-excel"></i>
                                                                Excel</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-csv buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="fas fa-file-csv"></i>
                                                                CSV</span>
                                                        </button>
                                                        <button class="btn btn-secondary buttons-pdf buttons-html5"
                                                            tabindex="0" aria-controls="report_table"
                                                            type="button"><span><i class="far fa-file-pdf"></i>
                                                                PDF</span>
                                                        </button> -->
                                                        <span>
                                    <button class="btn btn-info assignPro mb-5 justify-content-between active-btn" data-bs-toggle="modal" data-bs-target="#basicModal" data-state="active">Active</button>

                                     <!-- <button class="btn  btn-danger assignPro mb-5 justify-content-between inactive-btn" data-bs-toggle="modal" data-bs-target="#basicModal1" data-state="inactive">Inactive</button> -->

                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="user-tbl" class="table shorting dataTable no-footer" role="grid"
                                                aria-describedby="user-tbl_info">
                                                <thead>
                                                    <tr role="row">
                                                    <th>
                                                <div class="form-check custom-checkbox ms-0">
                                                 <input type="checkbox" class="form-check-input dataall" id="dataall" required="">
                                                  <label class="form-check-label" for="dataall"></label>
                                                 </div>
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="S.no: activate to sort column ascending"
                                                            style="width: 0px;">S.no</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Library Id: activate to sort column ascending"
                                                            style="width: 0px;">Library Id</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Library Name: activate to sort column ascending"
                                                            style="width: 0px;">Library Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date: activate to sort column ascending"
                                                            style="width: 0px;">Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Authority Person Name: activate to sort column ascending"
                                                            style="width: 0px;">Librarian Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label=" Status: activate to sort column ascending"
                                                            style="width: 0px;">Update Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label=" Status: activate to sort column ascending"
                                                            style="width: 0px;"> Status</th>

                                                        <th class="sorting" tabindex="0" aria-controls="user-tbl"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending"
                                                            style="width: 0px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                $rev = DB::table('librarians')->where('status','=','0')->get();
                                                @endphp
                                                @foreach($rev as $val)

                                                    <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input libraianitem" id="customCheckBox100" data-librarian-id="{{$val->id}}"  value="{{$val->id}}">
                                                    <label class="form-check-label" for="customCheckBox100"></label>
                                                </div>
                                            </td>
                                                        <td><span>{{$loop->index +1}}</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>{{$val->librarianId}}</h6>
                                                                    <!-- <span>INV-100023456</span> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <!-- <h6>#40597</h6> -->
                                                                    <span>{{$val->libraryName}}</span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <span>{{$val->libraryType}} </span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <span>{{$val->librarianName}}</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="sorting_1">
                               <div class="form-check form-switch id="load">
                                     <input class="form-check-input toggle-class" type="checkbox"
                                    data-id="{{$val->id}}" name="featured_status"
                                   data-isprm="1" data-onstyle="success"
                                   data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->status ? 'checked' : '' }}>
                                  <label class="form-check-label"
                                 for="flexSwitchCheckDefault"></label>
                             </div>
                          </td>
                          @if($val->status == 1)
                          <td>
                         <span class="badge badge-success light border-0 me-1">Active</span>
                         </td>
                         @else
                          <td>
                          <span class="badge badge-danger light border-0 me-1">Inctive</span>
                          </td>
                          @endif
                          <td>
                                                            <div class="d-flex">
                                                                <a href="/admin/librarianview/{{$val->id}}"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="/admin/libraryedit/{{$val->id}}" class="btn btn-danger shadow btn-xs sharp">
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

<!-- <div class="modal fade" id="basicModal1">
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
</div> -->
</body>
<script>
  $(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
        $.ajax({
            type: "put",
            dataType: "json",
            url: '/admin/librarianstatus',
            data: {'status': status, 'id': id},
            success: function(response) {
               if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/library_unactive_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/library_unactive_list"
                     }, 3000);
               }

            }
        });
    })
  })
</script>



<script>
$(document).ready(function() {
    $('#dataall').click(function() {
        $('.libraianitem').prop('checked', this.checked);
    });
});

</script>

<script>
   $('.submitbutton11').click(function () {
    var checkebook = $('.libraianitem:checked').map(function () {
        return $(this).data('librarian-id');
    }).get();


    var requestData = {
        librarianId: checkebook,

    };
    console.log(requestData);
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/multiple-librarianstatus',
            method: 'POST',
            data: { 'requestData': requestData, 'status': '1' },
            success: function (response) {
              console.log(response.data);
              if(response.success){
                $('#basicModal').modal('hide');
            //    $('#basicModal').hide();
                setTimeout(function() {
                    window.location.href ="/admin/library_unactive_list"
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
<!-- <script>
   $('.submitbutton22').click(function () {
    var checkebook = $('.libraianitem:checked').map(function () {
        return $(this).data('librarian-id');
    }).get();


    var requestData = {
        librarianId: checkebook,

    };
    console.log(requestData);
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/multiple-librarianstatus',
            method: 'POST',
            data: { 'requestData': requestData, 'status': '0' },
            success: function (response) {
              console.log(response.data);
              if(response.success){
                $('#basicModal1').modal('hide');
                setTimeout(function() {
                    window.location.href ="/admin/library_active_list"
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

</script> -->
</html>
<style>
    .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
