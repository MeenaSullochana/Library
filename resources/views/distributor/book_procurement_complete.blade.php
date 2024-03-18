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
    <link href="
      https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
      "
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
    include 'distributor/plugin/plugin_css.php';
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
        @include ('distributor.navigation')
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Success Books List</b>
                            </h3>
                            <a onclick="javascript:window.history.back();" class="btn btn-primary  btn-sm"
                                href="/distributor/index">
                                <i class="fa fa-angle-double-left"></i> Go Back</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head p-3">
                        <span class="h5"><span class="h5 text-danger">Note: Your books are screened and is being
                                processed</span></span>
                    </div>
                    <div class="col-xl-12">
                        <div class="card-body p-3">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div class="tbl-caption">
                                    <span class="h5"><span class="h5 text-danger">Note:</span> Your applied books
                                        are under screening process.</span>
                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">
                                                <th>S.No</th>
                                                <th>Book Id</th>
                                                <th> Title</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                         colspan="1"
                                         aria-label="Stock: activate to sort column ascending"
                                         style="width: 109.984px;">Stock</th> --}}
                                                <th>Issued Status</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                         colspan="1" aria-label="Quantity: activate to sort column ascending"
                                         style="width: 65.3594px;">Quantity</th> --}}

                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $val)
                                                <tr role="row" class="odd">
                                                    <td data-label="S.No">{{ $loop->index + 1 }}</td>
                                                    <td data-label="Book Id">{{ $val->product_code }}</td>
                                                    <td data-label="Title">
                                                        <div>

                                                            <h6><a class="text-left"
                                                                    href="/distributor/book_manage_view/{{ $val->id }}">{{ $val->book_title }}</a>
                                                            </h6>
                                                            <span class="text-left">{{ $val->subtitle }}</span>

                                                        </div>
                                                    </td>
                                                    <td data-label="Issued Status">
                                                        <span><a href="#" class="badge bg-success">Completed</a>
                                                        </span>
                                                    </td>
                                                    <td data-label="control">

                                                        <a href="/distributor/book_manage_view/{{ $val->id }}"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>


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
        <!--**********************************
            Content body end
            ***********************************-->
        <!--**********************************
            Footer start
            ***********************************-->

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
    include 'distributor/plugin/plugin_js.php';
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you send this book to book recurement?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<style>
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .form-check.mt-p00.form-switch {
            display: flex;
            justify-content: flex-end;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }

        table td::before {
            /*
   * aria-label has no advantage, it won't be read inside a table
   content: attr(aria-label);
   */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }

        .d-flex.mt-p0 {
            display: flex;
            justify-content: flex-end;
        }
    }

    /* general styling */
    body {
        font-family: "Open Sans", sans-serif;
        line-height: 1.25;
    }
    .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
