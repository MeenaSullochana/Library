
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
	<title>Government of Tamil Nadu - Book Procurement - Library Type List</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">
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
                                <b>Home page Book List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/banner_setting">
                                <i class="fas fa-plus"></i> Add Home page Book List</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card dz-card" id="bootstrap-table2">
                        <!-- tab-content -->
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="bordered" role="tabpanel"
                                aria-labelledby="home-tab-1">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="example3">
                                            <thead>
                                                <tr>
                                                 
                                                    <th>
                                                        <strong>S.No</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Images</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Slider</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Category</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Title</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Subtitle</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Description </strong>
                                                    </th>
                                                    <th>
                                                        <strong>Status </strong>
                                                    </th>
                                                    <th>
                                                        <strong>Action</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
     $homepagebooks = DB::table('homepagebooks')->where('type', '=', 'popularcategory')->get();
    @endphp
              @foreach($homepagebooks as $val)
                                                <tr>
                                                   
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('admin/bookImage/' . $val->bookImage) }}" class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td> <p class="mb-0 ms-2">{{$val->type}}</p></td>
                                                    <td> <p class="mb-0 ms-2">{{$val->category}}</p></td>
                                                    <td> <p class="mb-0 ms-2">	{{$val->booktitle}}</p></td>
                                                    <td> <p class="mb-0 ms-2">	{{$val->subtitle}}	</p></td>
                                                    <td> <p class="mb-0 ms-2">{{$val->description}}	</p></td>
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
                                                    <td>
                                                        <div class="d-flex">

                                                        <a href="/admin/banner_settingedit/{{$val->id}}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a  class="btn btn-danger shadow btn-xs sharp delete-btn"  id="delete" data-id="{{ $val->id }}">
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
                        <!-- /tab-content -->
                    </div>
                </div>
                <div class="card mb-4 mt-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Home page Book List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/banner_setting">
                                <i class="fas fa-plus"></i> Add Home page Book List</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card dz-card" id="bootstrap-table2">
                        <!-- tab-content -->
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="bordered" role="tabpanel"
                                aria-labelledby="home-tab-1">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="example3">
                                            <thead>
                                                <tr>
                                             
                                                    <th>
                                                        <strong>S.No</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Images</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Slider</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Category</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Title</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Subtitle</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Description </strong>
                                                    </th>
                                                    <th>
                                                        <strong>Status </strong>
                                                    </th>
                                                    <th>
                                                        <strong>Action</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
     $homepagebooks = DB::table('homepagebooks')->where('type', '=', 'topratedbooks')->get();
    @endphp
              @foreach($homepagebooks as $val)
                                                <tr>
                                                   
                                                    <td>{{$loop->index +1}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('admin/bookImage/' . $val->bookImage) }}" class="avatar avatar-md rounded-circle" alt="">
                                                        </div>
                                                    </td>
                                                    <td> <p class="mb-0 ms-2">{{$val->type}}</p></td>
                                                    <td> <p class="mb-0 ms-2">{{$val->category}}</p></td>
                                                    <td> <p class="mb-0 ms-2">	{{$val->booktitle}}</p></td>
                                                    <td> <p class="mb-0 ms-2">	{{$val->subtitle}}	</p></td>
                                                    <td> <p class="mb-0 ms-2">{{$val->description}}	</p></td>
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
                                                    <td>
                                                        <div class="d-flex">

                                                            <a href="/admin/banner_settingedit/{{$val->id}}"
                                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a  class="btn btn-danger shadow btn-xs sharp delete-btn"  id="delete" data-id="{{ $val->id }}">
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
<script>
    $(document).ready(function() {
        $('.change-status').on('click', function(e) {
            e.preventDefault();
            var status = $(this).data('status');
            var id = $(this).data('id');


            $.ajax({
                type: 'POST',
                url: '/admin/librarystatuschange',
                data: { '_token': '{{ csrf_token() }}', 'status': status, 'id': id },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 2000 });
                        setTimeout(function() {
                            window.location.href = "/admin/library_type_list"
                        }, 3000);

                    } else {
                        toastr.error(response.error, { timeout: 2000 });
                    }
                },
                error: function(error) {
                    toastr.error('Error occurred', { timeout: 2000 });
                }
            });
        });
    });
</script>
<script>

    $('.delete-btn').on('click', function () {

        var id = $(this).data('id');
         console.log(id);
        $.ajax({
            url: '/admin/library_type_delete',
            method: 'POST',
            data: { '_token': '{{ csrf_token() }}', 'id': id },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    setTimeout(function () {
                        window.location.href = "/admin/library_type_list"
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 2000 });
                }
            },
            error: function (xhr, status, error) {

                console.log('Error:', error);
            }
        });
    });

</script>
<script>
  $(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var bannerid = $(this).data('id');

        $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
        $.ajax({
            type: "post",
            dataType: "json",
            url: '/admin/bannerstatus',
            data: {'status': status, 'bannerid': bannerid},
            success: function(response) {
               if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/banner_setting_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/banner_setting_list"
                     }, 3000);
               }

            }
        });
    })
  })
</script>

<script>

    $('.delete-btn').on('click', function () {

        var id = $(this).data('id');
         console.log(id);
        $.ajax({
            url: '/admin/book_banner_delete',
            method: 'POST',
            data: { '_token': '{{ csrf_token() }}', 'id': id },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    setTimeout(function () {
                        window.location.href = "/admin/banner_setting_list"
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 2000 });
                }
            },
            error: function (xhr, status, error) {

                console.log('Error:', error);
            }
        });
    });

</script>
</html>
