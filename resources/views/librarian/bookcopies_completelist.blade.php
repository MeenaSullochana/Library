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
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
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
        @include ('librarian.navigation')
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
                                <b>sample Complete Books List</b>
                            </h3>

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
                                                <th>Book Title</th>
                                                <th>User Type</th>
                                                <th>Name</th>
                                                <th>Total Book Copies</th>
                                                <th>Issued Status</th>
                                                <th>Book Copies Send Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key=>$val)
                                      
                                            <tr role="row" class="odd">

                                                <td data-label="">{{$loop->index+1}}</td>
                                                <td data-label="">{{$val->booktitle}}</td>
                                                @if($val->usertype == "publisher_distributor")
                                                <td data-label="">publisher cum distributor</td>
                                                @else
                                                <td data-label="">{{$val->usertype}}</td>

                                                @endif
                                                <td data-label="">{{$val->name}}</td>
                                                <td data-label="">{{$val->copiesrec->copies}}</td>

                                             
                                                <td> <span class="badge bg-success text-white">Received</span></td>

                                              
                                                <td data-label="">
                                                {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}
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
         include "librarian/plugin/plugin_js.php";
     ?>

    <!-- Modal inform Procurement-->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Approve </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Are you sure you want to approve? </label>
                    <input type="hidden" name="id" id="hiddenInput1">
                    <input type="hidden" name="librarytype" id="hiddenInput2">
                    <input type="hidden" name="bookid" id="hiddenInput3">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitButton1">submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
$('#example3').on('change', "select[name='user_approval']", function(e) {
    var approval_ = $(this).val();

    var id = $(this).data('id');
    var libraryname = $(this).data('libraryname');
    var bookid = $(this).data('bookid');

    
        $('#hiddenInput1').val(id);
        $('#hiddenInput2').val(libraryname);
        $('#hiddenInput3').val(bookid);
        $('#staticBackdrop1').modal('show');
});
</script>

<script>
$(document).on('click', '#submitButton1', function(e) {
    e.preventDefault();
    var data = {
        'id': $('#hiddenInput1').val(),
        'librarytype': $('#hiddenInput2').val(),
        'bookid': $('#hiddenInput3').val(),


    }

    $('#staticBackdrop1').modal('hide');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        dataType: "json",
        url: '/librarian/bookcopiesstatus',
        data: data,
        success: function(response) {

            if (response.success) {
                setTimeout(function() {
                    window.location.href = "/librarian/bookcopies_pendinglist"
                }, 3000);
                toastr.success(response.success, {
                    timeout: 45000
                });
            } else {
                toastr.error(response.error, {
                    timeout: 45000
                });
                setTimeout(function() {
                    window.location.href = "/librarian/bookcopies_pendinglist"
                }, 3000);
            }

        }
    });
})
</script>
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