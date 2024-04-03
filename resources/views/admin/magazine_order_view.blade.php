<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                <b>Librarian Order View</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <h6>Librarian Order View</h6>
                                    <a href="magazine_add">
                                        <button type="button" class="btn btn-primary"><span
                                            class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
                                        </span>Add Order</button>
                                    </a>
                                </div>
                                <hr>
                                <div class="row mb-4 d-flex">
                                <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Category</label>
                                <select name="category_filter" id="category_filter" class="form-select bg-white p-2 border border-1 mb-3">
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
                                <select name="language_filter" id="language_filter" class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Record</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                    </select>
                            </div>
                                    <!-- <div class="col-xl-9 col-sm-6 mt-4 text-end">
                                        <a href="magazine_invoice">
                                        <button type="button" class="btn btn-primary"><span
                                            class="btn-icon-start text-primary"><i class="fa fa-file-invoice"></i>
                                        </span>View invoice</button></a>

                                        <button type="button" class="btn btn-primary"><span
                                            class="btn-icon-start text-primary"><i class="fa fa-file-pdf-o"></i>
                                        </span>PDF</button>
                                        <button type="button" class="btn  btn-info"><span
                                            class="btn-icon-start text-info"><i class="fa fa-file-excel-o"></i>
                                        </span>Excel</button>
                                        <button type="button" class="btn  btn-warning"><span
                                            class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                        </span>Download</button>    
                                    </div> -->
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                                <!-- <th class=" pe-3">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th> -->
                                                <th>S.Noe</th>
                                                <th>Magazine Title</th>
                                                <th>language</th>
                                                <th>Category</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <!-- <th class=" ps-5" style="min-width: 200px;">Name of the Company
                                                </th> -->
                                                <!-- <th>date</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                        @foreach($data->magazineProduct as $val)
                                            <tr class="btn-reveal-trigger">
                                                <!-- <td class="py-2">
                                                    <div class="form-check custom-checkbox mx-2">
                                                        <input type="checkbox" class="form-check-input" id="checkbox1">
                                                        <label class="form-check-label" for="checkbox1"></label>
                                                    </div>
                                                </td> -->
                                                <td class="py-2">{{$loop->index + 1}}</a></td>
                                                <td class="py-3">
                                                    <a href="#">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-sm me-2">
                                                                <div class=""><img
                                                                        class="rounded-circle img-fluid"
                                                                        src="{{ asset('Magazine/front/' . $val->image) }}" width="30"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 fs--1">{{$val->title}}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2">{{$val->language}}</a></td>
                                                <td class="py-2">{{$val->category}}</a></td>
                                               
                                                <td>{{$val->quantity}}</td>
                                                <td><i class="fa fa-rupee"></i>{{$val->magazine_price}}</th>
                                                <!-- <td class="py-2 ps-5">Company Name</td>
                                                <td class="py-2">30/03/2018</td> -->
                                                <td class="py-2 text-end">
                                                    <div class="dropdown"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><span
                                                                class="fs--1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24"
                                                                            height="24"></rect>
                                                                        <circle fill="#000000" cx="5"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="19"
                                                                            cy="12" r="2"></circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                            style="">
                                                            <div class="py-2">
                                                                <a class="dropdown-item" href="/admin/magazine_view/{{$val->magazineid}}"><i class="fa fa-eye p-2"></i>View</a>
                                                                <!-- <a class="dropdown-item" href="magazine_view"><i class="fa fa-file-invoice p-2"></i>Show invoice</a> -->
                                                        </div>
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
    </div>
    <!--************
                Content body end
            *************-->
    <!--************
                Footer start
            *************-->
    @include ('admin.footer')
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
    <?php
    include 'admin/plugin/plugin_js.php';
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
