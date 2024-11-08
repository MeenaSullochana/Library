<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Periodical Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_publisher/images/fevi.svg') }}">
    <?php include 'periodical_publisher/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        table.dataTable thead th {
            text-transform: math-auto !important;
        }
    </style>
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
        @include ('periodical_publisher.navigation')
        <!--************
                Sidebar end
            *************-->
        <!--************
                Content body start
            *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body bg-white mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>Periodical list</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="/periodical_publisher/Magazine_add">
                            <i class="fa fa-plus"></i> Add </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row mb-4 d-flex">
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Category</label>
                                <select name="category_filter" id="category_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Category</option>
                                    @php
                                    $categori = DB::table('magazine_categories')->orderBy('created_at','ASC')->get();
                                    @endphp
                                    @foreach($categori as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select language</label>
                                <select name="language_filter" id="language_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Record</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-sm-6 mt-4 text-end">
                                <!-- <button type="button" class="btn btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-file-pdf-o"></i>
                                    </span>PDF</button> -->
                                <!-- <a href="exportexcelmagazine" class="btn btn-info">
                                    <span class="btn-icon-start text-info"><i class="fa fa-file-excel-o"></i></span>
                                    Export Excel
                                </a> -->

                                <!-- <button type="button" class="btn  btn-warning"><span
                                        class="btn-icon-start text-warning"><i
                                            class="fa fa-download color-warning"></i>
                                    </span>Download</button> -->
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive p-3">
                            <table id="example3" class="display table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title of the Magazine</th>
                                        <th>Language</th>
                                        <th>Category</th>
                                        <th>Periodicity</th>
                                        <th>Size of the Magazine</th>
                                        <th>Contact Person</th>
                                        <th>Phone</th>
                                        <th>Status </th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($magazines as $key => $magazine)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $magazine->title }}</td>
                                        <td>{{ $magazine->language }}</td>
                                        <td>{{ $magazine->category }}</td>
                                        <td>{{ $magazine->periodicity }}</td>
                                        <td>{{ $magazine->magazine_size }}</td>
                                        <td>{{ $magazine->contact_person }}</td>
                                        <td>{{ $magazine->phone }}</td>
                                        <td>
                                            <span class="badge bg-success text-white">Active</span>
                                        </td>
                                        <td data-label="control">
                                            <a href="/periodical_publisher/magazine_view/{{$magazine->id}}"
                                                class="btn btn-warning shadow btn-xs sharp me-1"><i
                                                    class="fa fa-eye "></i></a>
                                            <a href="/periodical_publisher/magazine_edit/{{$magazine->id}}"
                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger shadow btn-xs sharp delete-btn" data-id="{{ $magazine->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No magazines found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="/delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
    @include ('periodical_publisher.footer')
    <!--************
                Footer end
            *************-->

    <!--************
            Support ticket button start
            *************-->

    <!--************
            Support ticket button end
            *************-->
            <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

    </div>
    <!--************
            Main wrapper end
        *************-->
    <?php
    include 'periodical_publisher/plugin/plugin_js.php';
    ?>
</body>
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#example3').DataTable();

    // Function to handle category filter
    function filterCategory(category) {
        if (category === "") {
            table.column(3).search("").draw();
        } else {
            table.column(3).search(category).draw();
        }
    }

    // Call filterCategory function on change event of the select element
    $('#category_filter').on('change', function() {
        var category = $(this).val();
        filterCategory(category);
    });

    // Function to handle language filter
    function filterLanguage(language) {
        if (language === "") {
            // If language filter is empty, reset table to show all records
            table.column(2).search(language).draw();
        } else {
            // Apply language filter (assuming Language is in column index 2)
            table.column(2).search(language).draw();
        }
    }

    // Call filterLanguage function on change event of the language filter
    $('#language_filter').on('change', function() {
        var language = $(this).val();
        filterLanguage(language);
    });
});

</script>

<script>
    $(document).ready(function () {
        var deleteId;

        $('.delete-btn').on('click', function () {
            deleteId = $(this).data('id');
            $('#basicModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function () {
            $('#basicModal').modal('hide');
            $.ajax({
                url: '/periodical_publisher/magazine_delete',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'id': deleteId },
                success: function (response) {
                    if (response.success) {

                        toastr.success(response.success, { timeout: 2000 });
                        $('#basicModal').modal('hide');
                        setTimeout(function () {
                            window.location.href = "/periodical_publisher/magazine_list"
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
    });
</script>

</html>