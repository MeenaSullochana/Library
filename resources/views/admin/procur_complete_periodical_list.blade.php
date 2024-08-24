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
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
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
        @include ('admin.navigation')

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
                                <b>Completed Periodical List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/procur_book_assign">
                                <i class="fas fa-chevron-left"></i> Back</a>
                            <!-- <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                        <i class="fas fa-plus"></i> Add Book</a> -->
                            <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                              
                             
                                <div class="col-xl-3 col-sm-6 mt-4 text-end">

                                    <a href="/admin/review/periodical">
                                        <button class="btn btn-primary">
                                            <span><i class="fa-solid fa-file-excel"></i> >Export Rewiew Count</span>
                                        </button>
                                    </a>



                                </div>
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info"  style="min-width: 100px">
                                        <thead>
                                            <tr role="row">
                                               
                                                <th>S.No</th>
                                              
                                                <th>periodical Title</th>
                                                <th>Periodicity</th>
                                                <th>Category</th>
                                                <th>Subject</th>
                                                <th>UserType</th>
                                                <th>
                                                    <h6>Librarian</h6>
                                                    <span class="text-left">Review/Assign</span>
                                                </th>
                                                <th>
                                                    <h6>Expert</h6>
                                                    <span class="text-left">Review/Assign</span>
                                                </th>
                                                <th>
                                                    <h6>Public</h6>
                                                    <span class="text-left">Review/Assign</span>
                                                </th>

                                                <th>Librarian</th>
                                                <th>Expert</th>
                                                <th>Public</th>
                                                <th>Total</th>
                                                <th> Action</th>
                                                <th> reviewer List</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($record as $key=>$val)
                                            <tr role="row" class="odd">
                                     
                                                <td>{{$loop->index+1}}</td>
                                              
                                                <td style="white-space:normal;">
                                                    <div class="products" style="white-space:normal;">
                                                        <div style="white-space:normal;">
                                                            <h6 style="white-space:normal;"><a
                                                                    style="white-space:normal;" class="text-left"
                                                                    href="/admin/magazine_view/{{$val->Magazine->id}}">{{$val->Magazine->title}}</a>
                                                            </h6>
                                                          
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span>{{$val->Magazine->periodicity}}</span></td>
                                                <td><span>{{$val->Magazine->category}}</span></td>
                                                <td><span>{{$val->Magazine->subject}}</span></td>
                                                <td><span>{{$val->Magazine->user_type}}</span></td>
                                                <td><span>{{$val->rinternalcount}}/{{$val->internalcount}}</span></td>
                                                <td><span>{{$val->rexternalcount}}/{{$val->externalcount}}</span></td>
                                                <td><span>{{$val->rpubliccount}}/{{$val->publiccount}}</span></td>
                                                <td><span>{{$val->avginternal}}</span></td>
                                                <td><span>{{$val->avgexternal}}</span></td>
                                                <td><span>{{$val->avgpublic}}</span></td>
                                                <td><span>{{$val->total}}</span></td>
                                             
                                    
                                                <td data-label="controlq">
                                                    <div class="d-flex mt-p0">
                                                        <a href="/admin/procur_complete_view/{{$val->Magazine->id}}"
                                                            class="btn btn-success shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                        </a>



                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="/admin/periodical_reviewerlist/{{$val->Magazine->id}}"
                                                        class="btn btn-primary shadow btn-sm m-0 me-1"> <i
                                                            class="fa fa-list" aria-hidden="true"></i>
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
        @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
    ?>
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

.btn-sm,
.btn-group-sm>.btn {
    font-size: 0.813rem !important;
    padding: 2px 12px !important;
    font-weight: 400;
    border-radius: 0.25rem;
    line-height: 18px;
    border-radius: 0.25rem;
}

.active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
    text-align: center;
}
</style>