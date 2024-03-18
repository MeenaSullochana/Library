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
    <title>Government of Tamil Nadu - Book Procurement - Categories List</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
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
                                <b>List Of Categories</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="categories_add">
                                <i class="fas fa-plus"></i> Add Category</a>
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
                                        <table class="table table-responsive-md" id="refresh">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px;">
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkAll" required="">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <strong>S.No</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Name</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Status</strong>
                                                    </th>
                                                    <th>
                                                        <strong>Actions</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $categori = DB::table('special_categories')->get();
                                                @endphp
                                                @foreach ($categori as $val)
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox2" required="">
                                                                <label class="form-check-label"
                                                                    for="customCheckBox2"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <strong>{{ $loop->index + 1 }}</strong>
                                                        </td>
                                                        <td class="py-3">
                                                            <a href="#">
                                                                <div class="media d-flex align-items-left">

                                                                    <div class="avatar avatar-sm me-4">
                                                                        <div class=""><img
                                                                                class="rounded-circle img-fluid"
                                                                                src="{{ asset('admin/categorieImage/' . $val->categorieImage) }}"
                                                                                width="30" alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <h6 class="mb-0 fs--1">{{ $val->name }}</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if ($val->status == 1)
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-success light sharp btn-sm btn-rounded dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Active
                                                                    </button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger light sharp btn-sm btn-rounded dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Inactive
                                                                    </button>
                                                            @endif
                                                            <div class="dropdown-menu">
                                                                @if ($val->status == 1)
                                                                    <a class="dropdown-item change-status"
                                                                        data-status="0"
                                                                        data-id="{{ $val->id }}">Inactive</a>
                                                                @else
                                                                    <a class="dropdown-item change-status"
                                                                        data-status="1"
                                                                        data-id="{{ $val->id }}">Active</a>
                                                                @endif
                                                            </div>
                                    </div>




                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="/admin/categories_edit/{{ $val->id }}"
                                                class="btn btn-primary shadow btn-xs sharp me-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger shadow btn-xs sharp delete-btn" id="delete"
                                                data-id="{{ $val->id }}">
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
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include ('admin.footer')
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
    include 'admin/plugin/plugin_js.php';
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
                url: '/admin/change-status',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success, {
                            timeout: 2000
                        });
                        setTimeout(function() {
                            window.location.href = "/admin/categories_list"
                        }, 3000);

                    } else {
                        toastr.error(response.error, {
                            timeout: 2000
                        });
                    }
                },
                error: function(error) {
                    toastr.error('Error occurred', {
                        timeout: 2000
                    });
                }
            });
        });
    });
</script>
<script>
    $('.delete-btn').on('click', function() {

        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/admin/categories_delete',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, {
                        timeout: 2000
                    });
                    setTimeout(function() {
                        window.location.href = "/admin/categories_list"
                    }, 3000);
                } else {
                    toastr.error(response.error, {
                        timeout: 2000
                    });
                }
            },
            error: function(xhr, status, error) {

                console.log('Error:', error);
            }
        });
    });
</script>

</html>
