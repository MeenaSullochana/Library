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
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item card">
                        <h2 class="accordion-header p-0 m-0 bg-white" id="headingOne">
                            <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="cpa">
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                            <label class="form-label">User</label>
                                            <select name="" id=""
                                                class="form-select bg-white p-2 border border-1 mb-3">
                                                <option value="tamil">Publisher</option>
                                                <option value="English">Distributor</option>
                                                <option value="English">Publisher cum Distributor</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">Frequency</label>
                                            <select name="" id=""
                                                class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">monhly</option>
                                                <option value="English">Year</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                            <label class="form-label">language</label>
                                            <select name="" id=""
                                                class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">Tamil</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-3 col-sm-6 align-self-end">
                                            <div>
                                                <button class="btn btn-primary me-2" title="Click here to Search"
                                                    type="button"><i class="fa fa-filter me-1"></i>Filter</button>
                                                <button class="btn btn-danger light" title="Click here to remove filter"
                                                    type="button">Remove Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="table-responsive p-3">
                        <table id="example3" class="display table" style="min-width: 200px">
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
                                            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1"><i
                                                    class="fa fa-eye "></i></a>
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">No magazines found.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
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
    @include ('publisher.footer')
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
    include 'publisher/plugin/plugin_js.php';
    ?>
</body>

</html>
