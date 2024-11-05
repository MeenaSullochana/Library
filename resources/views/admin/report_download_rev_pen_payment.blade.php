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
    <title>Government of Tamil Nadu - Book Procurement - Master Expert Reviewer Data</title>
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
                                <b>Master Expert Reviewer Data</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-body">
                        <div>
                            <h1>Master Expert Reviewer Data Report Download</h1>
                            <form method="GET" action="/admin/master_expertrev_payment_datareport">
                                <div class="row mb-4 d-flex">
                                 
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Reviewer</label>
                                        <select name="reviewer_filter" id="reviewer_filter"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Reviewer</option>
                                            @php
                                            $reviewers = DB::table('reviewer')->where('reviewerType',
                                            'external')->get();
                                            @endphp
                                            @foreach($reviewers as $reviewer)
                                            <option value="{{$reviewer->id }}"
                                                {{ request('reviewer_filter') == $reviewer->name ? 'selected' : '' }}>
                                                {{ $reviewer->name }}</option>
                                            @endforeach
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

                        <h1>Master Expert Reviewer Data Filter</h1>
                        <form method="GET" action="/admin/master_expertrev_payment">
                            <div class="row mb-4 d-flex">
                                <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                    <label class="form-label">Select Reviewer</label>
                                    <select name="reviewer_filter" id="reviewer_filter"
                                        class="form-select bg-white p-2 border border-1 mb-3">
                                        <option value="">All Reviewer</option>
                                        @php
                                        $reviewers = DB::table('reviewer')->where('reviewerType',
                                        'external')->get();
                                        @endphp
                                        @foreach($reviewers as $reviewer)
                                        <option value="{{ $reviewer->id }}"
                                            {{ request('reviewer_filter') == $reviewer->name ? 'selected' : '' }}>
                                            {{ $reviewer->name }}</option>
                                        @endforeach
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
                                        <th>S No</th>
                                        <th>Expert Name</th>
                                        <th>Subject</th>
                                        <th>Email</th>
                                        <th>Mobile Number </th>
                                        <th>Designation</th>
                                        <th>Organisation Details </th>
                                        <th>Account Holder Name</th>
                                        <th>Bank Name</th>
                                        <th>Branch</th>
                                        <th>IFSC Number</th>
                                        <th>Account Number</th>
                                        <th>Number Of Books Assigned</th>
                                        <th>Number Of Books Completed</th>
                                        <th>Number Of Books Pending</th>
                                        <th>Amount Per Book(Rs.50)</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $val)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox3"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td><span>{{$loop->index + 1}}</span></td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <h6>{{$val->name}}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <!-- <h6>#40597</h6> -->
                                                    <span style="white-space:normal;">{{$val->subject}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <!-- <h6>#40597</h6> -->
                                                    <span>{{$val->email}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->phoneNumber}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <!-- <h6>#40597</h6> -->
                                                    <span>{{$val->designation}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->organisationDetails}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->acc_hol_name}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->bankName}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->branch}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->ifscNumber}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->accountNumber}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->book_reviews_count}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->BookReviewcom}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->BookReviewpen}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>50</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="products">
                                                <div>
                                                    <span>{{$val->BookReviewcom * 50 }}</span>
                                                </div>
                                            </div>
                                        </td>



                                    

                                     
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/member_edit/{{ $val->id }}" class="btn btn-warning shadow btn-xs sharp me-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $results->appends(request()->query())->links() }}
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