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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b> Meta Finalized Books List</b>
                            </h3>
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
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                            <div class="tbl-caption">
                                <span>

                                </span>
                                <div>
                                    <div class="btn-group bootstrap-select select-picker pr-2 d-tc">
                                        <div class="dropdown-menu open" role="combobox">

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card  p-3 bg-white">
                                <div >
                                    <table id="example4" >
                                        <thead>
                                            <tr>
                                           
                                                <th>S.No</th>
                                                <th>Book Name</th>
                                                <th>Language</th>
                                                <th>Category</th>
                                                <th>Subject</th>
                                                <th>Publication Name</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $categori = [];
                                            $books = DB::table('books')
                                            ->where("book_procurement_status", '=', 1)
                                            ->where("book_reviewer_id", '!=', null)
                                            ->where('book_status', '=', '1')
                                            ->get();

                                            foreach ($books as $key => $val) {
                                            $datass = DB::table('book_review_statuses')
                                            ->where('book_id', $val->id)
                                            ->first();

                                            if ($datass == null) {
                                            array_push($categori, $val);
                                            }
                                            }
                                            @endphp


                                            @foreach($categori as $val)

                                            <tr>
                                               
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><small>{{ $val->book_title }}</small></td>
                                                @if($val->language == "Other_Indian")
                                                <td>{{  $val->other_indian }}</td>
                                                @elseif ($val->language == "other_foreign")
                                                <td>{{ $val->other_foreign }}</td>
                                                @else
                                                <td>{{ $val->language }}</td>
                                                @endif
                                                <td>{{ $val->category }}</td>
                                                <td>{{ $val->subject }}</td>
                                                <td>{{$val->nameOfPublisher}}</td>

                                                <td data-label="controlq">
                                          <div class="d-flex mt-p0">
                                             <a href="/admin/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                             <i class="fa fa-eye"></i>
                                             </a>
                                          
                                          </div>
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
</style>