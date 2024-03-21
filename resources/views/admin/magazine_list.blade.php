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
                                    <th>Roll No</th>
                                    <th>Contact Person Name</th>
                                    <th>Title of the Magazine</th>
                                    <th>Frequency</th>
                                    <th>Type of Library</th>
                                    <th>Size of the Magazine</th>
                                    <th>Phone Number </th>
                                    <th>Status </th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="white-space:normal;" data-label="1">1</td>
                                    <td style="white-space:normal;" data-label="Contact Person Name">Contact Person Name
                                    </td>
                                    <td style="white-space:normal;" data-label="Title of the Magazine">
                                        Title of the Magazine
                                    </td>
                                    <td style="white-space:normal;" data-label="Frequency"> Frequency </td>
                                    <td style="white-space:normal;" data-label="Type of Library">Type of Library</td>
                                    <td style="white-space:normal;" data-label="Size of the Magazine">Size of the
                                        Magazine</td>
                                    <td style="white-space:normal;" data-label="Phone Number">9999999999</td>
                                    <td style="white-space:normal;" data-label="Status"> <span
                                            class="badge bg-success text-white">Active</span></td>


                                    {{-- <td style="white-space:normal;"> <span class="badge bg-danger text-white">Inactive</span></td> --}}


                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
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


