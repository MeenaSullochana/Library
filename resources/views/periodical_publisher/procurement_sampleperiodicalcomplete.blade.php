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
    <title>Government of Tamil Nadu - Periodical Procurement</title>
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
                            <b>Procurement Copies Complete  Periodicals List</b>
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
                                    <table id="example4" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">

                                                <th>S.No</th>
                                                <th>Periodicity</th>
                                                 <th> RNI </th>
                                                <th>Title</th>
                                                <th>Issued Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key=>$val)
                                            <tr role="row" class="odd">

                                                <td data-label="S/No">{{$loop->index+1}}</td>

                                                <td style="white-space:normal;" data-label="Title">
                                                    <h6><a class="text-left"
                                                            href="/periodical_publisher/magazine_view/{{$val->id}}">{{$val->title}}</a>
                                                    </h6>
                                                </td>
                                                <td data-label=""> {{$val->periodicity}}</td>
                                                 <td data-label="">{{$val->rni_details}}</td>
                                                <td data-label="Status">
                                                    <a href="#" class="badge bg-primary text-white openModal"
                                                        data-title="{{$val->book_title}}" data-id="{{$val->id}}"  data-copies="{{ json_encode($val->copies) }}"
                                                        id="openModal">Send Book Copies</a>
                                                </td>
                                                <td data-label="control">

                                                    <a href="/periodical_publisher/magazine_view/{{$val->id}}"
                                                        class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <!-- <a href="/periodical_publisher/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
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
         include "periodical_publisher/plugin/plugin_js.php";
     ?>
    <!-- Modal Confirm Apply Procurement-->

    <!-- Modal inform Procurement-->
    <div class="modal fade" id="ModalConfirmCenter">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title">Are you send book Copies?</h5> -->
                    <button type="button" id="closedata" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hiddenId">
                    <input type="hidden" id="hiddentitle">
                    <h5 class="modal-title">
                        <p id="periodicaltitle">Periodical Title</p>
                    </h5>
                    </h5>
                    <br>
                    <div  id="rowrecord">
                
                
                 </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">No</button> -->
                    <!-- <button type="button" id="sendbook" class="btn btn-primary">Confirm to submit</button> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-chevron-left"></i>Back to</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                </div>
                <div class="modal-footer" style="display: flex; justify-content: space-between;">
                    <div>
                        <a id="prev" href="#prev" class="arrow">Previous</a>
                        <a id="next" href="#next" class="arrow">Next</a>
                    </div>
                    <div>
                        <!-- Add any buttons you need in the footer -->
                    </div>
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
        var copies = $(this).data('copies');
        $('#periodicaltitle').text('Periodical Title: ' + title);
       
        var content = ""; 


        copies.forEach(function(val) {
            var assetUrl = '<?php echo asset("Magazine/copies/") ?>' + '/' + val.profileImage;
           
    content += '<div class="row">' +
        '<div class="col-md-4">' +
        '<div class="form-group">' +
        '<label for="inputNumberBooks1">Library Type</label>' +
        '<input type="text" class="form-control" value="' + val.librarytype + '" id="librarytype1" name="inputNumberBooks1" readonly>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<label for="inputNumberBooks1">Book Copies</label>' +
        '<input type="text" class="form-control" id="copies1" value="' + val.copies + '" name="inputNumberBooks1" readonly>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<div class="form-check">' +
        '<label for="inputNumberBooks1">Status</label>' +
        '<input type="button" ' + (val.status == "0" ? 'value="Unverified"' : 'value="Verified"') + ' class="btn btn-' + (val.status == "0" ? 'warning' : 'success') + '">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-check">' +
        '<label for="inputNumberBooks1">Proof</label>' +
        '<br>' +
        '<button type="button" class="btn btn-primary modalId" ' +
        'data-id="' + assetUrl + '" ' +
        'data-bs-toggle="modal" data-bs-target="#modalId">View Proof</button>' +
        '</div>' +
        '</div>' +
        '</div>';
});


        // Append the generated HTML content to the element with id 'rowrecord'
        $('#rowrecord').html(content);
        $('#hiddenId').val(id);
        $('#hiddentitle').val(title);

        $('#ModalConfirmCenter').modal('show');
        console.log(dataId);
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function loadContent(content) {
        document.getElementById('modalBody').innerHTML = content;
    }

    function loadFile(dataId) {
        var fileExtension = dataId.split('.').pop().toLowerCase();

        switch (fileExtension) {
            case 'pdf':
                loadContent('<embed src="' + dataId + '" type="application/pdf" width="100%" height="600px" />');
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                loadContent('<img src="' + dataId + '" alt="Image" style="max-width: 100%; max-height: 600px;">');
                break;
            case 'html':
                fetch(dataId)
                    .then(response => response.text())
                    .then(html => {
                        loadContent(html);
                    })
                    .catch(error => console.error('Error loading HTML:', error));
                break;
            default:
                loadContent('<p>File type not supported</p>');
                break;
        }
    }

    $('#modalId').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);

        var dataId = button.data('id');

        loadFile(dataId);
    });
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

