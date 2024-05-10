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
    <title>Government of Tamil Nadu - Magazine Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <link href="
      https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
      " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('periodical_publisher/images/fevi.svg') }}">
    <?php
        include "periodical_publisher/plugin/plugin_css.php";
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
        @include ('periodical_publisher.navigation')
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
                                <b>procurement Copies Pending Magazine List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('periodical_publisher/procurement_samplemagazine') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> Sample Magazine Copies </a>
                        </div>
                    </div>
                </div>
                <div class="row bg-white p-2">
                    <div class="col-xl-12">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">

                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    {{-- empoloyees-tbl3 --}}
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">

                                                <th>S.No</th>
                                                <th>Magazine ID</th>
                                                <th>Title</th>
                                                <th>Issued Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">

                                                <td data-label="S/No">1</td>
                                                <td data-label="Book ID">27247521</td>
                                                <td style="white-space:normal;" data-label="Title">
                                                    <h6><a class="text-left"
                                                            href="#">இறுதிச் சொற்பொழிவு</a>
                                                    </h6>
                                                    <span class="text-left"><small>Vocabulary May 2024</small></span>
                                                </td>

                                                <td data-label="Status">
                                                    <a href="#" class="badge bg-primary text-white openModal"
                                                        id="">Send Magazine Copies</a>
                                                </td>
                                                <td data-label="control">

                                                    <a href="#"
                                                        class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
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
            @include ("periodical_publisher.footer")
        <!--**********************************
            Support ticket button end
            ***********************************-->
    </div>
    <!--**********************************
         Main wrapper end
         ***********************************-->
    <?php
         include "periodical_publisher/plugin/plugin_js.php";
     ?>
    <!-- Modal Confirm Apply Procurement-->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you send this Magazine to Magazine recurement Re-Appeal?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> Message sending failed.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success!</strong> Message has been sent.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        data-bs-target="#ModalConfirmCenter">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal inform Procurement-->
    <div class="modal fade" id="ModalConfirmCenter">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you send magazine Copies?</h5>
                    <button type="button" id="closedata" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hiddenId">
                    <input type="hidden" id="hiddentitle">
                    <h5 class="modal-title">
                        <p id="">Magazine Title:</p>
                    </h5>
                    </h5>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputNumber">Library Type</label>
                                <input type="text" class="form-control" value="Anna Centenary Library" id="librarytype1"
                                    name="" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputNumber"> Magazine Copies</label>
                                <input type="text" class="form-control" id="" value="3" name=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mt-2">
                                <label for="inputNumber">Upload Proof</label>
                                <input type="file" id="" name="" require>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputNumber">Library Type</label>
                                <input type="text" class="form-control" id=""
                                    value="Kalaignar Centenary Library" name="" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputNumber"> Magazine Copies</label>
                                <input type="text" class="form-control" id="copies2" value="1" name=""
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mt-2">
                                <label for="inputNumber"> Upload Proof</label>
                                <input type="file" id="" name="" require>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputNumber">Library Type</label>
                                <input type="text" class="form-control" id="librarytype3"
                                    value="Connemara Public Library" name="inputNumber" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputNumber"> Magazine Copies</label>
                                <input type="text" class="form-control" id="" value="1" name="inputNumber"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mt-2">
                                <label for="inputNumber"> Upload Proof</label>
                                <input type="file" id="" name="" require>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button> -->
                    <button type="button" id="" class="btn btn-primary">Confirm to submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    $('#closedata').on('click', function() {
        $('#ModalConfirmCenter input[type="checkbox"]').prop('checked', false);

    });
});
</script>
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

    .active-projects.style-1 .dt-buttons .dt-button {
        top: -50px;
        right: 0 !important;
    }

    .active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
</html>