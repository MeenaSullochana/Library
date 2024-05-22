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
      " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
    ?>
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
        @include ('publisher.navigation')
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
                                <b>Procurement Send sample Books List</b>
                            </h3>

                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold">Copies to be Submitted for Review and Selection: 5 copies</h6>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong> Archiving Purpose:</strong> To comply with the Delivery of Books (Public Libraries) Act, 1954, send one copy of all published books to Connemara Public Library. Additionally, send one copy to state libraries such as Anna Centenary Library,Chennai and Kalaignar Centenary Library in Madurai for archiving of Books.<br><br>
                            <p><strong>Review Purpose: </strong> Send two copies for review of books to Anna Centenary Library, Chennai.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="row">
                            <div class="col-md-12 border mb-3">
                            <p class=" mt-3"><b>Note 1 :</b> Copies send proof, such as postal/courier receipts or acknowledgments (for direct submissions), should be attached as evidence in " Send Book Copies".</p>
                            <p><b>Note 2 :</b> Books should be send with the "Payment acknowledgement" which is downloadable at "Procurement Receipt".</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="ms-3 mb-0"><strong class="text-primary">3 Copy</strong></h5><br>
                                <b>Transparent Book Procurement</b> <br>
                                Book Selection Committee<br>
                                Anna Centenary Library <br>
                                Kotturpuram , Chennai - 600 085<br>
                                Tamil Nadu<br>
                                Ph. No. : 044-22201011<br>

                            </div>
                            <div class="col-md-4 border-start">
                                <h5 class="ms-3 mb-0"><strong class="text-primary">1 Copy</strong></h5><br>
                                <b>Transparent Book Procurement</b> <br>
                                Book Selection Committee<br>
                                Connemara Public Library Chennai<br>
                                Museum Compound, Pantheon Road, Egmore, <br>
                                Chennai - 600 008<br>
                                Tamil Nadu <br>
                                Ph. No. : 044-28193751<br>

                            </div>
                            <div class="col-md-4 border-start">
                                <h5 class="ms-3 mb-0"><strong class="text-primary">1 Copy</strong></h5><br>
                                <b>Transparent Book Procurement</b><br> 
                                Book Selection Committee<br>
                                Kalaignar Centenary Library,<br>
                                Reserve Line, Madurai - 625 002<br>
                                Tamil Nadu <br>
                                Ph. No. : 0452-2535400 <br>

                            </div>
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
                                                <th>Book ID</th>
                                                <th>Title</th>
                                                <th>Issued Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key=>$val)
                                            <tr role="row" class="odd">

                                                <td data-label="S/No">{{$loop->index+1}}</td>
                                                <td data-label="Book ID">{{$val->product_code}}</td>
                                                <td style="white-space:normal;" data-label="Title">
                                                    <h6><a class="text-left"
                                                            href="/publisher/book_manage_view/{{$val->id}}">{{$val->book_title}}</a>
                                                    </h6>
                                                    <span class="text-left">{{$val->subtitle}}</span>
                                                </td>

                                                <td data-label="Status">
                                                    <a href="#" class="badge bg-primary text-white openModal"
                                                        data-title="{{$val->book_title}}" data-id="{{$val->id}}"
                                                        id="openModal">Send Book Copies</a>
                                                </td>
                                                <td data-label="control">

                                                    <a href="/publisher/book_manage_view/{{$val->id}}"
                                                        class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <!-- <a href="/publisher/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                            <i class="fa fa-eye-slash"></i>
                                            </a> -->

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
           
            @include ("publisher.footer")
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
         include "publisher/plugin/plugin_js.php";
     ?>
    <!-- Modal Confirm Apply Procurement-->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you send this book to book recurement Re-Appeal?</h5>
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
                    <h5 class="modal-title">Are you send book Copies?</h5>
                    <button type="button" id="closedata" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hiddenId">
                    <input type="hidden" id="hiddentitle">
                    <h5 class="modal-title">
                        <p id="booktitle">Book Title :</p>
                    </h5>
                    </h5>
                    <br>
                    <div class="row">
                        {{-- <div class="row">
                            <div class="col-md-8"></div>
                             <div class="col-md-4 col-sm-12">
                                <p class="text-danger">Postal/Courier receipts <br> or Acknowledgment Proof</p>
                            </div>
                        </div> --}}
                        <div class="col-md-2 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1">Library Type</label>
                                <input type="text" class="form-control" value="Anna Centenary Library" id="librarytype1"
                                    name="inputNumberBooks1" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1"> Book Copies</label>
                                <input type="text" class="form-control" id="copies1" value="3" name="inputNumberBooks1"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group mt-2">
                                <label for="inputNumberBooks1">Postal/Courier receipts
                                    or Acknowledgment Proof</label>
                                <input type="file" id="uplode1" name="" require>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- <div class="row">
                            <div class="col-md-8"></div>
                             <div class="col-md-4">
                                <p class="text-danger">Postal/Courier receipts <br> or Acknowledgment Proof</p>
                            </div>
                        </div> --}}
                        <div class="col-md-2 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1">Library Type</label>
                                <input type="text" class="form-control" id="librarytype2"
                                    value="Kalaignar Centenary Library" name="inputNumberBooks1" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1">Book Copies</label>
                                <input type="text" class="form-control" id="copies2" value="1" name="inputNumberBooks1"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group mt-2">
                                <label for="inputNumberBooks1"> Postal/Courier receipts
                                    or Acknowledgment Proof</label>
                                <input type="file" id="uplode2" name="" require>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- <div class="row">
                            <div class="col-md-8"></div>
                             <div class="col-md-3 col-sm-12">
                                <p class="text-danger">Postal/Courier receipts <br> or Acknowledgment Proof</p>
                            </div>
                        </div> --}}
                        <div class="col-md-2 col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1">Library Type</label>
                                <input type="text" class="form-control" id="librarytype3"
                                    value="Connemara Public Library" name="inputNumberBooks1" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label for="inputNumberBooks1"> Book Copies</label>
                                <input type="text" class="form-control" id="copies3" value="1" name="inputNumberBooks1"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group mt-2">
                                <label for="inputNumberBooks1"> Postal/Courier receipts
                                    or Acknowledgment Proof</label>
                                <input type="file" id="uplode3" name="" require>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button> -->
                    <button type="button" id="sendbook" class="btn btn-primary">Confirm to submit</button>
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
<script>
$(document).ready(function() {
    $('.openModal').on('click', function() {
        var title = $(this).data('title');
        var id = $(this).data('id');
        $('#booktitle').text('Book Title : ' + title);

        $('#hiddenId').val(id);
        $('#hiddentitle').val(title);

        $('#ModalConfirmCenter').modal('show');
      
    });
});
</script>
<!-- 
<script>
$(document).ready(function() {
    $('#sendbook').on('click', function() {

        var profileImage = $('#uplode1')[0].files[0];
        var profileImage1 = $('#uplode2')[0].files[0];
        var profileImage2 = $('#uplode3')[0].files[0];

        var checkedCount = $('#ModalConfirmCenter input[type="checkbox"]:checked').length;
        if (checkedCount != 3) {
            toastr.error("Please Select All Checkbox", {
                timeout: 45000
            });

        } else {
            var datarec = [];
            var data1 = {
                'librarytype': $('#librarytype1').val(),
                'copies': $('#copies1').val(),
                'status': '0',
                'profileImage' = profileImage[0],
            };
            var data2 = {
                'librarytype': $('#librarytype2').val(),
                'copies': $('#copies2').val(),
                'status': '0',
                'profileImage1' = profileImage1[0],
            };
            var data3 = {
                'librarytype': $('#librarytype3').val(),
                'copies': $('#copies3').val(),
                'status': '0'
                'profileImage2' = profileImage2[0],

            };
            datarec.push(data1, data2, data3);

            var datarecJsonString = JSON.stringify(datarec);

            var formData = new FormData();

            formData.append('datarec', datarecJsonString);
            formData.append('bookid', $('#hiddenId').val());
            formData.append('booktitle', $('#hiddentitle').val());
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/publisher/procurementbokkcopies",
                data: formData,
                processData: false, 
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#ModalConfirmCenter').modal('hide');
                        setTimeout(function() {
                 window.location.href ="/publisher/procurement_samplebook"
                  }, 3000);
                        toastr.success(response.success, {
                            timeout: 45000
                        });
                    } else {
                        $('#ModalConfirmCenter').modal('hide');

                        toastr.error(response.error, {
                            timeout: 45000
                        });
                        setTimeout(function() {
                 window.location.href ="/publisher/procurement_samplebook"
                  }, 3000);

                    }

                }
            });

        }

    });
});
</script> -->
<script>
$(document).ready(function() {
    $('#sendbook').on('click', function() {
        $('#sendbook').prop('disabled',true);

        var profileImage = $('#uplode1')[0].files[0];
        var profileImage1 = $('#uplode2')[0].files[0];
        var profileImage2 = $('#uplode3')[0].files[0];




        var checkedCount = $('#ModalConfirmCenter input[type="checkbox"]:checked').length;
        if (checkedCount != 3) {
            $('#sendbook').prop('disabled',false);

            toastr.error("Please Select All Checkbox", {
                timeout: 45000
            });
        } else {
            if (!profileImage || !profileImage1 || !profileImage2) {
                $('#sendbook').prop('disabled',false);

                toastr.error("Please select all three PDF files", {
                    timeout: 45000
                });
                return;
            }

            if (!isPDF(profileImage) || !isPDF(profileImage1) || !isPDF(profileImage2)) {
                $('#sendbook').prop('disabled',false);

                toastr.error("Please select PDF files only", {
                    timeout: 45000
                });
                return;
            }

            function isPDF(file) {
                return file.type === 'application/pdf';
            }
            var datarec = [];
            var data1 = {
                'librarytype': $('#librarytype1').val(),
                'copies': $('#copies1').val(),
                'status': '0',
                
            };
            var data2 = {
                'librarytype': $('#librarytype2').val(),
                'copies': $('#copies2').val(),
                'status': '0',
               
            };
            var data3 = {
                'librarytype': $('#librarytype3').val(),
                'copies': $('#copies3').val(),
                'status': '0',
                
            };
            datarec.push(data1, data2, data3);

            var datarecJsonString = JSON.stringify(datarec);

            var formData = new FormData();

            formData.append('datarec', datarecJsonString);
            formData.append('bookid', $('#hiddenId').val());
            formData.append('booktitle', $('#hiddentitle').val());
            formData.append('profileImage0', profileImage);
            formData.append('profileImage1', profileImage1);
            formData.append('profileImage2', profileImage2);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/publisher/procurementbokkcopies",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#ModalConfirmCenter').modal('hide');
                        setTimeout(function() {
                            window.location.href =
                                "/publisher/procurement_samplebook";
                        }, 3000);
                      
                        toastr.success(response.success, {
                            timeout: 45000
                        });
                    } else {
                        $('#sendbook').prop('disabled',false);

                        toastr.error(response.error, {
                            timeout: 45000
                        });

                    }
                }
            });
        }
    });
});
</script>

</html>