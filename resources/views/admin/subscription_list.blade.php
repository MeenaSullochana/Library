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
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Subscription List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/subscription_add">
                                <i class="fas fa-plus"></i> Add Subscription </a>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body mt-3">
                        <div class="table-responsive">
                            <table id="example4" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Vendor</th>
                                        <th>Date</th>
                                        <th>Status </th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            Vendor Name
                                        </td>
                                        <td>
                                            12.12.2024
                                        </td>

                                        <td> <span class="badge bg-success text-white">Active</span></td>
                                        <td>
                                            <a href="/admin/subscription_view"class="btn btn-success shadow btn-xs sharp me-1"><i class="fa fa-eye"></i></a>
                                            <a href="/admin/subscription_edit" class="btn btn-primary shadow btn-xs sharp me-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger shadow btn-xs sharp delete-btn" id="">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Application Reject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="userid" id="hiddenInput">
                    <label for="Reject remark">Please Enter Any Remark </label>
                    <textarea name="remark" id="reject_remark" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitButton">submit</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "admin/plugin/plugin_js.php";
         ?>
</body>

</html>