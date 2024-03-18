<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">

    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css">
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- tagify-css -->
    <link href="/vendor/tagify/dist/tagify.css" rel="stylesheet">

    <!-- Style css -->
    <link href="{{asset('librarian/css/style.css')}}" rel="stylesheet">

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
                    <div class="col-xl-12">
                        <div class="row">
                            @if(auth('librarian')->user()->metaChecker =="no")
                            <div class="col-xl-3 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-success-light rounded">
                                                <i class="fa-solid fa-briefcase text-success"></i>
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-success count">0</h3>
                                                <span>Total Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-primary-light rounded">
                                                <i class="fa-solid fa-cart-shopping text-primary"></i>

                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-primary count">0</h3>
                                                <span>Total Books</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-warning-light rounded">
                                                <i class="fa-solid fa-users text-warning"></i>
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-warning count">0</h3>
                                                <span>Total Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="card box-hover">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-lg bg-danger-light rounded">
                                                <i class="fa-solid fa-hand-holding-dollar text-danger"></i>
                                            </div>
                                            <div class="total-projects ms-3">
                                                <h3 class="text-danger count">0</h3>
                                                <span>Total Stocks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if(auth('librarian')->user()->metaChecker =="yes")
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-danger-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books = DB::table('books')->where('book_reviewer_id', '=',
                                                    $id)->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{$books}}</h4>
                                                        <p class="mb-0">Total Meta Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-danger"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-primary-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books1 = DB::table('books')
                                                    ->where('book_reviewer_id', $id)
                                                    ->where(function ($query) {
                                                    $query->whereNull('book_status')
                                                    ->orWhere('book_status', 2)
                                                    ->orWhere('book_status', 3);
                                                    })
                                                    ->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{$books1}}</h4>
                                                        <p class="mb-0">Pending Meta Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="row">
                                    @if(auth('librarian')->user()->metaChecker =="yes")
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books3 = DB::table('books')->where('book_reviewer_id', '=',
                                                    $id)->where('book_status', '=', 1)->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{$books3}}</h4>
                                                        <p class="mb-0">Completed Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-md bg-info-light me-1">
                                                        <i class="fa fa-book ms-2 text-primary" aria-hidden="true"></i>
                                                    </div>
                                                    @php
                                                    $id = auth('librarian')->user()->id;
                                                    $books2 = DB::table('books')->where('book_reviewer_id', '=',
                                                    $id)->where('book_status', '=', 0)->count();
                                                    @endphp
                                                    <div class="ms-2">
                                                        <h4>{{$books2}}</h4>
                                                        <p class="mb-0">Rejected Books</p>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"><i
                                                        class="fa-solid fa-chevron-right text-info"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card">
                                    @if(auth('librarian')->user()->metaChecker =="yes")
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects">
                                            <div class="tbl-caption">
                                                <h4 class="heading mb-0">Meta Check Book List</h4>
                                            </div>
                                            <table id="projects-tbl" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Book Name</th>
                                                        <th>Price</th>
                                                        <th>Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $id=auth('librarian')->user()->id;
                                                    $record =
                                                    DB::table('books')->where('book_reviewer_id','=',$id)->get();
                                                    @endphp
                                                    @foreach($record as $val)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset("Books/front/".$val->front_img) }}"
                                                                    class="avatar avatar-md rounded-circle" alt="">
                                                                <p class="mb-0 ms-2">{{$val->book_title}}</p>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{$val->price}}
                                                        </td>
                                                        @if($val->book_status == 1)
                                                        <td>
                                                            <span
                                                                class="badge badge-success light border-0">Success</span>
                                                        </td>
                                                        @elseif($val->book_status == null)
                                                        <td>
                                                            <span
                                                                class="badge badge-warning light border-0">Pending</span>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <span
                                                                class="badge badge-danger light border-0">Reject</span>

                                                        </td>
                                                        @endif

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if(auth('librarian')->user()->metaChecker =="no")
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="heading mb-0">New Book</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects">
                                            <table id="projects-tbl4" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>BOOK NAME</th>
                                                        <th>PRICE</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Diary of a Wimpy
                                                                            Kid: No Brainer</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$655</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d10.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Be Useful: Seven
                                                                            Tools for Life</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$655</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d11.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Secret: Jack
                                                                            Reacher, Book 28</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$699</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d12.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Kill the
                                                                            Lawyers</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$955</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">A Curse for True
                                                                            Love</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$655</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="heading mb-0">Top rating books</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects">
                                            <table id="projects-tbl2" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>BOOK NAME</th>
                                                        <th>PRICE</th>
                                                        <th>SOLD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d1.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Remember Love:
                                                                            Words for Tender Times</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$655</td>
                                                        <td>55</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d10.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Way Forward</a>
                                                                    </h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$585</td>
                                                        <td>485</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d11.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">Prequel: An
                                                                            American Fight Against Fascism</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$852</td>
                                                        <td>5525</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d12.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Secret: Jack
                                                                            Reacher, Book 28</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$852</td>
                                                        <td>5985</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="products">
                                                                <img src="images/contacts/d14.jpg"
                                                                    class="avatar avatar-sm" alt="">
                                                                <div>
                                                                    <h6><a href="javascript:void(0)">The Unmaking of
                                                                            June Farrow: A Novel</a></h6>
                                                                    <!-- <i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star-fill"></i>
																	<i class="bi bi-star"></i> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$182</td>
                                                        <td>525</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('librarian/js/dashboard/dashboard-1.js')}}"></script>
    <script src="/vendor/draggable/draggable.js"></script>
    <script src="/vendor/swiper/js/swiper-bundle.min.js"></script>


    <!-- tagify -->
    <script src="/vendor/tagify/dist/tagify.js"></script>

    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables/js/jszip.min.js"></script>
    <script src="{{asset('librarian/js/plugins-init/datatables.init.js')}}"></script>

    <!-- Apex Chart -->

    <script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>


    <!-- Vectormap -->
    <script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{asset('librarian/js/custom.js')}}"></script>
    <script src="{{asset('librarian/js/deznav-init.js')}}"></script>
    <script src="{{asset('librarian/js/demo.js')}}"></script>
    <script src="{{asset('librarian/js/styleSwitcher.js')}}"></script>

</body>
@if (Session::has('success'))

<script>
toastr.success("{{ Session::get('success') }}", {
    timeout: 15000
});
</script>
@elseif (Session::has('error'))
<script>
toastr.error("{{ Session::get('error') }}", {
    timeout: 15000
});
</script>

@endif

</html>
<style>
.active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
    text-align: center;
}
</style>