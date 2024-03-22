<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
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
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Magazine List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/index">
                                <i class="fas fa-chevron-left"></i> Dashborad </a>
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
                                        <a href="#" class="btn btn-warning shadow btn-xs sharp me-1"><i class="fa fa-eye "></i></a>
                                        <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
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
    @include ('admin.footer')
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
    include 'admin/plugin/plugin_js.php';
    ?>
    
</body>

</html>


