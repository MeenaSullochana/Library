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
                <div class="row">
                    <div class="col-xl-12 col-sm-12">
                        <div class="card box-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box icon-box-lg bg-success-light rounded-circle">
                                        <i class="bi bi-book" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="total-projects ms-3">
                                        <h3 class="text-success count text-start">Periodical List</h3>
                                        <!-- <span class="text-start">Total Completed</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                    <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Category</label>
                                <select name="category_filter" id="category_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Category</option>
                                    @php
                                    $categori = DB::table('magazine_categories')->orderBy('created_at','ASC')->get();
                                    @endphp
                                    @foreach($categori as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select language</label>
                                <select name="language_filter" id="language_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Record</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                        <div class="col-md-6 filter-elecment-one">
                            <!-- <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Scheme" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                            </div> -->
                        </div>
                   
                        <div class="col-md-6 filter-elecment-two text-right">
                            <div class="d-flex justify-content-end">
                                <!-- <button class="btn btn-outline-success m-2"><i class="fa fa-file-excel"></i> Export
                                    Excel</button> -->
                                <!-- <button class="btn btn-outline-light m-2"><i class="fa fa-file-pdf"></i> PDF Export</button>
                                <button class="btn btn-outline-danger m-2"><i class="fa fa-print"></i> Print</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Total Leval For Buy item -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="table-responsive active-projects task-table">
                                    {{-- <div class="tbl-caption">
										<h4 class="heading mb-0">Order Book List</h4>
									</div> --}}
                                    <table id="example3" class="table">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title of the Periodical</th>
                                                <th>Language</th>
                                                <th>Category</th>
                                             
                                                <th>Periodicity</th>

                                                <!-- <th>District</th> -->
                                                <th>No.of Subscription</th>
                                                <th>Cover Price</th>
                                                <th>Annual Subscription</th>
                                                <th>Discount</th>
                                                <th>Single Issue After Discount</th>
                                                <th>Annual Subscription After Discount</th>
                                                <th>RNI Details</th>
                                                <th>Total No.of Pages</th>
                                                <th>Total No.of Multicolour Pages</th>
                                                <th>Total No.of Monocolour Pages</th>
                                                <th>Paper Quality</th>
                                                <th>Size of Periodical</th>
                                                <th>Status</th>
                                                <th>Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datas as $val1)
                                            <tr>
                                                <td class="py-2">{{ $loop->index + 1}}</td>
                                                <td class="py-2">  <a
                                                 href="/librarian/dispatch_library_magazine/{{$val1->id}}/{{ implode(',', $val1->orderid) }}">
                                        
                                                {{ $val1->title}} </a></td>
                                                <td class="py-2">{{$val1->language}}</td>
                                                <td class="py-2">{{$val1->category}}</td>
                                               
                                            
                                             
                                                <td class="py-2">{{$val1->periodicity}}</td>

                                                <td class="py-2">{{ $val1->count}}</td>
                                                <td class="py-2">{{ $val1->single_issue_rate}}</td>
                                                <td class="py-2">{{ $val1->annual_subscription}}</td>
                                                <td class="py-2">{{  $val1->discount}}</td>
                                                <td class="py-2">{{  $val1->single_issue_after_discount}}</td>
                                                <td class="py-2">{{ $val1->annual_cost_after_discount}}</td>
                                                <td class="py-2">{{  $val1->rni_details}}</td>
                                                <td class="py-2">{{ $val1->total_pages}}</td>
                                                <td class="py-2">{{  $val1->total_multicolour_pages}}</td>
                                                <td class="py-2">{{  $val1->total_monocolour_pages}}</td>
                                                <td class="py-2">{{  $val1->paper_qualitity}}</td>
                                                <td class="py-2">{{  $val1->magazine_size}}</td>
                                                <td>
                                                    <span class="badge bg-success">Approved</span>

                                                </td>
                                                <td>
                                                    <a
                                                        href="/librarian/dispatch_library_magazine/{{$val1->id}}/{{ implode(',', $val1->orderid) }}">
                                                        <i class="fa fa-eye p-2"></i>
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
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
    @include ("librarian.footer")
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
</body>
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#example3').DataTable();

    // Function to handle category filter
    function filterCategory(category) {
        if (category === "") {
            table.column(3).search("").draw();
        } else {
            table.column(3).search(category).draw();
        }
    }

    // Call filterCategory function on change event of the select element
    $('#category_filter').on('change', function() {
        var category = $(this).val();
        filterCategory(category);
    });

    // Function to handle language filter
    function filterLanguage(language) {
        if (language === "") {
            // If language filter is empty, reset table to show all records
            table.column(2).search(language).draw();
        } else {
            // Apply language filter (assuming Language is in column index 2)
            table.column(2).search(language).draw();
        }
    }

    // Call filterLanguage function on change event of the language filter
    $('#language_filter').on('change', function() {
        var language = $(this).val();
        filterLanguage(language);
    });
});
</script>
</html>