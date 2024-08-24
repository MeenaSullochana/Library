<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Payment List</title>
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
                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Master Periodical Data</b>
                            </h3>
                            <!-- <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a> -->
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div>
                            <h1>Periodical Data Report Download</h1>
                            <form method="GET" action="/admin/master_periodical_datareport">
                                <div class="row mb-4 d-flex">
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Language</label>
                                        <select name="language_filter" id="language_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Record</option>
                                            <option value="Tamil"
                                                {{ request('language_filter') == 'Tamil' ? 'selected' : '' }}>Tamil
                                            </option>
                                            <option value="English"
                                                {{ request('language_filter') == 'English' ? 'selected' : '' }}>English
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Periodicity</label>
                                        <select name="periodicity_filter" id="periodicity_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Periodicity</option>
                                            @php
                                            $subjects = DB::table('magazine_periodicities')->get();
                                            @endphp
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->name }}"
                                                {{ request('periodicity_filter') == $subject->name ? 'selected' : '' }}>
                                                {{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Category</label>
                                        <select name="category_filter" id="category_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Category</option>
                                            @php
                                            $categories = DB::table('magazine_categories')->orderBy('created_at',
                                            'ASC')->get();
                                            @endphp
                                            @foreach($categories as $category)
                                            <option value="{{ $category->name }}"
                                                {{ request('category_filter') == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Payment</label>
                                        <select name="payment_filter" id="payment_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Payment</option>
                                            <option value="Success"
                                                {{ request('payment_filter') == 'Success' ? 'selected' : '' }}>Success
                                            </option>
                                            <option value="No Payment"
                                                {{ request('payment_filter') == 'No Payment' ? 'selected' : '' }}>No
                                                Payment
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Meta Checking</label>
                                        <select name="metachecking_filter" id="metachecking_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Meta Checking</option>
                                            <option value="Success"
                                                {{ request('metachecking_filter') == 'Success' ? 'selected' : '' }}>
                                                Success
                                            </option>
                                            <option value="Reject"
                                                {{ request('metachecking_filter') == 'Reject' ? 'selected' : '' }}>
                                                Reject
                                            </option>
                                            <option value="Returned To User Correction"
                                                {{ request('metachecking_filter') == 'Returned To User Correction' ? 'selected' : '' }}>
                                                Returned To User Correction</option>
                                            <option value="Book Update To Return"
                                                {{ request('metachecking_filter') == 'Book Update To Return' ? 'selected' : '' }}>
                                                Book Update To Return</option>
                                            <option value="No Review"
                                                {{ request('metachecking_filter') == 'No Review' ? 'selected' : '' }}>No
                                                Review</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Negotiation</label>
                                        <select name="negostatus_filter" id="negostatus_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Negotiation </option>
                                            <option value="Negotiation from admin"
                                                {{ request('negostatus_filter') == 'Negotiation from admin' ? 'selected' : '' }}>
                                                Negotiation from admin
                                            </option>
                                            <option value="Negotiation from user"
                                                {{ request('negostatus_filter') == 'Negotiation from user' ? 'selected' : '' }}>
                                                Negotiation from user
                                            </option>
                                            <option value="Accepted"
                                                {{ request('negostatus_filter') == 'Accepted' ? 'selected' : '' }}>
                                                Accepted</option>
                                            <option value="Rejected"
                                                {{ request('negostatus_filter') == 'Rejected' ? 'selected' : '' }}>
                                                Rejected</option>
                                            <option value="Hold"
                                                {{ request('negostatus_filter') == 'Hold' ? 'selected' : '' }}>
                                                Hold</option>
                                            <option value="No negotiation"
                                                {{ request('negostatus_filter') == 'No negotiation' ? 'selected' : '' }}>
                                                No negotiation</option>


                                        </select>
                                    </div> -->
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Mark Range</label>
                                        <select name="mark_range" id="mark_range"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Mark Range </option>

                                            <option value="0-100">0 to 100</option>
                                            <option value="10-100">10 to 100</option>
                                            <option value="20-100">20 to 100</option>
                                            <option value="30-100">30 to 100</option>
                                            <option value="40-100">40 to 100</option>
                                            <option value="50-100">50 to 100</option>
                                            <option value="60-100">60 to 100</option>
                                            <option value="70-100">70 to 100</option>
                                            <option value="80-100">80 to 100</option>
                                            <option value="90-100">90 to 100</option>

                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Search</label>
                                        <input type="text" name="search" id="search" class="form-control"
                                            value="{{ request('search') }}" placeholder="Search">
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0 mt-4">
                                        <button type="submit" class="btn btn-primary">Download</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <h1>Master Periodical Data Filter</h1>
                        <form method="GET" action="/admin/master_periodical_data">
                            <div class="row mb-4 d-flex">
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Language</label>
                                    <select name="language_filter" id="language_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Record</option>
                                        <option value="Tamil"
                                            {{ request('language_filter') == 'Tamil' ? 'selected' : '' }}>Tamil</option>
                                        <option value="English"
                                            {{ request('language_filter') == 'English' ? 'selected' : '' }}>English
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Periodicity</label>
                                    <select name="periodicity_filter" id="periodicity_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Periodicity</option>
                                        @php
                                        $subjects = DB::table('magazine_periodicities')->get();
                                        @endphp
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->name }}"
                                            {{ request('periodicity_filter') == $subject->name ? 'selected' : '' }}>
                                            {{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Category</label>
                                    <select name="category_filter" id="category_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Category</option>
                                        @php
                                        $categories = DB::table('magazine_categories')->orderBy('created_at',
                                        'ASC')->get();
                                        @endphp
                                        @foreach($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ request('category_filter') == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Payment</label>
                                    <select name="payment_filter" id="payment_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Payment</option>
                                        <option value="Success"
                                            {{ request('payment_filter') == 'Success' ? 'selected' : '' }}>Success
                                        </option>
                                        <option value="No Payment"
                                            {{ request('payment_filter') == 'No Payment' ? 'selected' : '' }}>No Payment
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Meta Checking</label>
                                    <select name="metachecking_filter" id="metachecking_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Meta Checking</option>
                                        <option value="Success"
                                            {{ request('metachecking_filter') == 'Success' ? 'selected' : '' }}>Success
                                        </option>
                                        <option value="Reject"
                                            {{ request('metachecking_filter') == 'Reject' ? 'selected' : '' }}>Reject
                                        </option>
                                        <option value="Returned To User Correction"
                                            {{ request('metachecking_filter') == 'Returned To User Correction' ? 'selected' : '' }}>
                                            Returned To User Correction</option>
                                        <option value="Book Update To Return"
                                            {{ request('metachecking_filter') == 'Book Update To Return' ? 'selected' : '' }}>
                                            Book Update To Return</option>
                                        <option value="No Review"
                                            {{ request('metachecking_filter') == 'No Review' ? 'selected' : '' }}>No
                                            Review</option>
                                    </select>
                                </div>

                                <!-- <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Negotiation</label>
                                    <select name="negostatus_filter" id="negostatus_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Negotiation </option>
                                        <option value="Negotiation from admin"
                                            {{ request('negostatus_filter') == 'Negotiation from admin' ? 'selected' : '' }}>
                                            Negotiation from admin
                                        </option>
                                        <option value="Negotiation from user"
                                            {{ request('negostatus_filter') == 'Negotiation from user' ? 'selected' : '' }}>
                                            Negotiation from user
                                        </option>
                                        <option value="Accepted"
                                            {{ request('negostatus_filter') == 'Accepted' ? 'selected' : '' }}>
                                            Accepted</option>
                                        <option value="Rejected"
                                            {{ request('negostatus_filter') == 'Rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="Hold"
                                            {{ request('negostatus_filter') == 'Hold' ? 'selected' : '' }}>
                                            Hold</option>
                                        <option value="No negotiation"
                                            {{ request('negostatus_filter') == 'No negotiation' ? 'selected' : '' }}>No
                                            negotiation</option>


                                    </select>
                                </div> -->

                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Mark Range</label>
                                    <select name="mark_range" id="mark_range"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Mark Range </option>

                                        <option value="0-100">0 to 100</option>
                                        <option value="10-100">10 to 100</option>
                                        <option value="20-100">20 to 100</option>
                                        <option value="30-100">30 to 100</option>
                                        <option value="40-100">40 to 100</option>
                                        <option value="50-100">50 to 100</option>
                                        <option value="60-100">60 to 100</option>
                                        <option value="70-100">70 to 100</option>
                                        <option value="80-100">80 to 100</option>
                                        <option value="90-100">90 to 100</option>

                                    </select>
                                </div>

                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Search</label>
                                    <input type="text" name="search" id="search" class="form-control"
                                        value="{{ request('search') }}" placeholder="Search">
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table shorting dataTable no-footer" role="grid"
                                aria-describedby="user-tbl_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_desc" tabindex="0" aria-controls="user-tbl" rowspan="1"
                                            colspan="1" aria-label=": activate to sort column ascending"
                                            style="width: 0px;" aria-sort="descending">
                                            <div class="form-check custom-checkbox ms-0">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>S.No</th>
                                        <th>Language</th>
                                        <th>Category</th>
                                        <th>Title of the Periodical</th>
                                        <th>Periodicity</th>
                                        <th>Publication Name </th>
                                        <th>Editor Name </th>
                                        <th>First Issue Year </th>
                                        <th>Issue Per Year </th>
                                        <th>Everyv Issue Date </th>
                                        <th>Gsm </th>
                                        <th>Paper Type </th>
                                        <th>Paper Finishing </th>
                                        <!-- <th>Type of Library</th> -->
                                        <!-- <th>District</th> -->
                                        <!-- <th>No.of Subscription</th> -->
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


                                        <th>Payment Status </th>
                                        <th>Payment Date </th>

                                        <th>Meta checking Status </th>
                                        <th>Meta checker Name</th>
                                        <th>Mark</th>
                                        <!-- <th>Negotiation Status</th> -->
                                        <th>Book View</th>
                                        <th>User View</th>
                                        <!-- <th> Book Edit</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $val)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox3"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">{{ $loop->index + 1}}</td>
                                        <td class="py-2">{{$val->language}}</td>
                                        <td class="py-2">{{$val->category}}</td>
                                        <td class="py-2">{{ $val->title}}</td>
                                        <td class="py-2">{{$val->periodicity}}</td>
                                        <td class="py-2">{{$val->publisher_name}}</td>
                                        <td class="py-2">{{$val->editor_name}}</td>
                                        <td class="py-2">{{$val->first_issue_year}}</td>
                                        <td class="py-2">{{$val->issue_per_year}}</td>
                                        <td class="py-2">{{$val->every_issue_date}}</td>
                                        <td class="py-2">{{$val->gsm}}</td>
                                        <td class="py-2">{{$val->papertype}}</td>
                                        <td class="py-2">{{$val->paperfinishing}}</td>

                                        
                                        <!-- <td class="py-2">{{ $val->librarytype }}</td> -->
                                        <!-- <td class="py-2">{{$val->district }}</td> -->
                                        <!-- <td class="py-2">{{ $val->count}}</td> -->
                                        <td class="py-2">{{ $val->single_issue_rate}}</td>
                                        <td class="py-2">{{ $val->annual_subscription}}</td>
                                        <td class="py-2">{{  $val->discount}}</td>
                                        <td class="py-2">{{  $val->single_issue_after_discount}}</td>
                                        <td class="py-2">{{ $val->annual_cost_after_discount}}</td>
                                        <td class="py-2">{{  $val->rni_details}}</td>
                                        <td class="py-2">{{ $val->total_pages}}</td>
                                        <td class="py-2">{{  $val->total_multicolour_pages}}</td>
                                        <td class="py-2">{{  $val->total_monocolour_pages}}</td>
                                        <td class="py-2">{{  $val->paper_qualitity}}</td>
                                        <td class="py-2">{{  $val->magazine_size}}</td>
                                        <td class="py-2">{{  $val->contact_person}}</td>
                                        <td class="py-2">{{ $val->phone}}</td>
                                        <td class="py-2">{{ $val->email}}</td>
                                        <td class="py-2">{{   $val->address}}</td>


                                        <td>

                                            <div class="products">
                                                <div>
                                                    <span>{{$val->paystatus}}</span>
                                                </div>
                                            </div>

                                        </td>


                                        <td>

                                            <div class="products">
                                                <div>
                                                    <span>{{$val->paymentdate}}</span>
                                                </div>
                                            </div>

                                        </td>

                                        <td class="text-center">
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->revstatus}}</span>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->reviewername}}</span>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->marks}}</span>
                                                </div>
                                            </div>

                                        </td>
                                        <!-- <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->negostatus}}</span>
                                                </div>
                                            </div>

                                        </td> -->
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/magazine_views/{{$val->id}}"
                                                    class="btn btn-success shadow btn-xs sharp me-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>

                                        <td data-label="controlq">
                                            <div class="d-flex mt-p0">

                                                @if($val->user_type === "periodical_publisher")
                                                <a href="/admin/periodical_publisher_view/{{$val->user_id}}"
                                                    class="btn btn-success shadow btn-xs sharp me-1">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                                @elseif($val->user_type === "admin")
                                                <a href="">
                                                    Admin
                                                </a>
                                                @else
                                                <a href="/admin/periodical_distributor_view/{{$val->user_id}}"
                                                    class="btn btn-success shadow btn-xs sharp me-1">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                                @endif
                                                </a>

                                            </div>
                                        </td>
                                        <!-- <td>
                <div class="d-flex">
                    <a href="/admin/book_edit/{{$val->id}}" class="btn btn-warning shadow btn-xs sharp me-1">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
            </td> -->

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $data->appends(request()->query())->links() }}
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
.active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
    text-align: center;
}

table.dataTable thead th {
    text-transform: math-auto !important;
}
</style>