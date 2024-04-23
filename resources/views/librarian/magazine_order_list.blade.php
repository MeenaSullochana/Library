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
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php include 'librarian/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
        @include ('librarian.navigation')
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
                                <b>Librarian  order</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a> -->
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item card">
                        <h2 class="accordion-header p-0 m-0 bg-white" id="headingOne">
                            <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="cpa">
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Librarian  order Filter
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="row">
                                        <form class="needs-validation" novalidate method="get"
                                            action="/librarian/magazine_order_list" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Language Type<span
                                                            class="text-danger mandatory"></span></label>
                                                    <select class="form-select bg-white" name="language" id="language">
                                                        <option value="">Select type</option>
                                                        <option value="Tamil">Tamil</option>
                                                        <option value="English">English</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Category Type<span
                                                            class="text-danger mandatory"></span></label>
                                                    <select class="form-select bg-white" name="category" id="category">
                                                        <option value="">All Category</option>
                                                        @php
                                                        $categories =
                                                        DB::table('magazine_categories')->orderBy('created_at',
                                                        'ASC')->get();
                                                        @endphp
                                                        @foreach($categories as $val)
                                                        <option value="{{$val->name}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label">Type of Library<span
                                                            class="text-danger mandatory"></span></label>
                                                    <select class="form-select bg-white" name="librarytype"
                                                        id="librarytype">
                                                        <option value="">All Library Type</option>
                                                        @php
                                                        $categories = DB::table('library_types')->get();
                                                        @endphp
                                                        @foreach($categories as $val)
                                                        <option value="{{$val->name}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                         
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-6 align-self-end mt-2">
                                                    <div>
                                                        <button class="btn btn-primary me-2"
                                                            title="Click here to Search" type="submit"><i
                                                                class="fa fa-filter me-1"></i>Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-3">

                                <hr>
                                @php

                                $records = DB::table('ordermagazines')
                                ->where('status', '=', '1')
                                ->orderBy('created_at', 'asc')
                                ->get();

                                @endphp


                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Language</th>
                                                <th>Category</th>
                                                <th>Title of the Magazine</th>
                                                <th>Periodicity</th>
                                                <th>Type of Library</th>
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
                                                <th>Size of Magazine</th>
                                                <th>Contact Person</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            @foreach($datas as $val1)
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">{{ $loop->index + 1}}</td>
                                                <td class="py-2">{{$val1->language}}</td>
                                                <td class="py-2">{{$val1->category}}</td>
                                                <td class="py-2">{{ $val1->title}}</td>
                                                <td class="py-2">{{$val1->periodicity}}</td>
                                                <td class="py-2">{{ $val1->librarytype }}</td>
                                                <!-- <td class="py-2">{{$val1->district }}</td> -->
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
                                                <td class="py-2">{{  $val1->contact_person}}</td>
                                                <td class="py-2">{{ $val1->phone}}</td>
                                                <td class="py-2">{{ $val1->email}}</td>
                                                <td class="py-2">{{   $val1->address}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 align-self-end mt-2 text-center">
                                            <div>
                                                <p><strong>Total Amount: {{$totalAmount}}</strong> </p>
                                            </div>
                                        </div>

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
        @include ('librarian.footer')
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
    include 'librarian/plugin/plugin_js.php';
    ?>
</body>
<!-- Modal -->
<style>
.modal-confirm {
    color: #636363;
    width: 400px;
}

.modal-confirm .modal-content {
    padding: 20px;
    border-radius: 5px;
    border: none;
    text-align: center;
    font-size: 14px;
}

.modal-confirm .modal-header {
    border-bottom: none;
    position: relative;
}

.modal-confirm h4 {
    text-align: center;
    font-size: 26px;
    margin: 30px 0 -10px;
}

.modal-confirm .close {
    position: absolute;
    top: -5px;
    right: -2px;
}

.modal-confirm .modal-body {
    color: #999;
}

.modal-confirm .modal-footer {
    border: none;
    text-align: center;
    border-radius: 5px;
    font-size: 13px;
    padding: 10px 15px 25px;
}

.modal-confirm .modal-footer a {
    color: #999;
}

.modal-confirm .icon-box {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    z-index: 9;
    text-align: center;
    border: 3px solid #f15e5e;
}

.modal-confirm .icon-box i {
    color: #f15e5e;
    font-size: 46px;
    display: inline-block;
    margin-top: 13px;
}

.modal-confirm .btn {
    color: #fff;
    border-radius: 4px;
    background: #60c7c1;
    text-decoration: none;
    transition: all 0.4s;
    line-height: normal;
    min-width: 120px;
    border: none;
    min-height: 40px;
    border-radius: 3px;
    margin: 0 5px;
    outline: none !important;
}

.modal-confirm .btn-info {
    background: #c1c1c1;
}

.modal-confirm .btn-info:hover,
.modal-confirm .btn-info:focus {
    background: #a8a8a8;
}

.modal-confirm .btn-danger {
    background: #f15e5e;
}

.modal-confirm .btn-danger:hover,
.modal-confirm .btn-danger:focus {
    background: #ee3535;
}

.trigger-btn {
    display: inline-block;
    margin: 100px auto;
}
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-exclamation"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

</html>