
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
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
                                <b>Negotiation Books List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="book_manage_add.php">
                                <i class="fas fa-plus"></i> Add Book</a>
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
                                <span class="bulk-action">
                                    <a href="book_manage_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </span>
                                <div>
                                    <div class="btn-group bootstrap-select select-picker pr-2 d-tc">
                                        <div class="dropdown-menu open" role="combobox">
                                            <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                                <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Date
                                                            Descending</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                                </li>
                                                <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Date Ascending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Title Descending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Title Ascending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Year Descending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                                <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Year Ascending</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            </ul>
                                        </div>
                                        <select name="sortColumn" id="books-sort" class="select-picker pr-2 d-tc" autocomplete="off" tabindex="-98">
                                            <option value="Books.creationDateTime" data-order="DESC">Date Descending
                                            </option>
                                            <option value="Books.creationDateTime" data-order="ASC">Date Ascending
                                            </option>
                                            <option value="Books.title" data-order="DESC">Title Descending</option>
                                            <option value="Books.title" data-order="ASC">Title Ascending</option>
                                            <option value="Books.publishingYear" data-order="DESC">Year Descending
                                            </option>
                                            <option value="Books.publishingYear" data-order="ASC">Year Ascending
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                <table id="empoloyees-tbl3" class="table dataTable no-footer" role="grid" aria-describedby="empoloyees-tbl3_info">
                                    <thead>
                                        <tr role="row">


                                            <th>S.no</th>
                                            <th>Books</th>
                                            <th>book Cost</th>
                                            <th>Admin Cost</th>
                                            <th>Final Cost</th>
                                            <th>negotiation </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $id=auth('publisher')->user()->id;
                                $categori = DB::table('books')
                                ->where('marks', '>=', 40)
                                ->where('user_id', '=',$id)
                               ->where('negotiation_status', '=', 2)
                               ->get();
                                             @endphp

                                             @foreach($categori as $val)
                                        <tr role="row" class="odd">

                                            <td><span>{{$loop->index +1}}</span></td>
                                            <td>
                                                <div class="products">
                                                    <div>
                                                        <h6><a class="text-left" href="book_manage_view.php">{{$val->book_title}}</a></h6>
                                                        <span class="text-left">{{$val->subtitle}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0)" class="text-primary">Rs {{$val->price}}</a></td>
                                            <td>
                                                <span><a href="#" class="badge bg-info">Rs {{$val->calculated_price}}</a> </span>
                                            </td>
                                            <td>
                                                <span><a href="#" class="badge bg-info">Rs {{$val->final_price}}</a> </span>
                                            </td>
                                            <td>
                                            <button type="button" id="successButton" class="btn btn-success">Approve Book</button>

                                                 </td>

                                            <td data-label="controlq">
                                                <div class="d-flex mt-p0">
                                                    <a href="book_manage_view.php" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                                        <i class="fa fa-trash"></i>
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
