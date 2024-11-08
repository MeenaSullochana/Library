
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
    <title>Government of Tamil Nadu - Book Procurement - Inactive Sub Admin List</title>
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
                                <b>Inactive Sub Admin List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/sub_admin_add">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Sub Admin </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card dz-card" id="bootstrap-table2">
                        <!-- tab-content -->
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="bordered" role="tabpanel" aria-labelledby="home-tab-1">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="example3">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px;">
                                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>S.No</th>
                                                    <th> Name</th>
                                                    <th>Phone</th>
                                                    <th>District Name</th>
                                                    <th>Status</th>
                                                    <th>Change Status</th>
                                                    <th>Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subadmin as $val)
                                                <tr class="odd">
                                                    <td>
                                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                            <label class="form-check-label" for="customCheckBox2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="">{{$loop->index +1}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                                <img src="{{asset("sub_admin/SubAdminImage/".$val->subadminImage)}}"
                                                                        class="avatar" alt="">
                                                            <span class="w-space-no"> {{$val->name}}</span>
                                                        </div>
                                                    </td>
                                                    <td>+91 {{$val->mobileNumber}}</td>
                                                    <td>{{$val->district}}</td>
                                                    @if($val->status=='1')
                                                     <td><span class="badge bg-success text-white">Active</span></td>
                                                    @else
                                                    <td> <span class="badge bg-danger text-white">Inactive</span></td>

                                                    @endif
                                                    <td class="sorting_1">
                                                        <div class="form-check form-switch" id="load">
                                                             <input class="form-check-input toggle-class" type="checkbox"
                                                                data-id="{{$val->id}}" name="featured_status"
                                                                     data-isprm="1" data-onstyle="success"
                                                                             data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->status ? 'checked' : '' }}>
                                                               <label class="form-check-label"
                                                                     for="flexSwitchCheckDefault"></label>
                                                               </div>
                                                           </td>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="/admin/sub_admin_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="/admin/sub_admin_edit/{{$val->id}}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                                <i class="fa fa-pencil"></i>
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
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
<script>
  $(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var subadminid = $(this).data('id');
        $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
        $.ajax({
            type: "put",
            dataType: "json",
            url: '/admin/subadminstatus',
            data: {'status': status, 'subadminid': subadminid},
            success: function(response) {
               if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/sub_admin_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/sub_admin_list"
                     }, 3000);
               }

            }
        });
    })
  })
</script>
</html>
