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
                            <form method="GET" action="/admin/expert_review_assessment_report">
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
                                        <label class="form-label">Select Review</label>
                                        <select name="review_Type" id="review_Type"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Review</option>
                                            <option value="Highly Recommended" {{ request('review_Type') == 'Highly Recommended' ? 'selected' : '' }}>
                                                Highly Recommended
                                            </option>
                                            <option value="May Be Considered" {{ request('review_Type') == 'May Be Considered' ? 'selected' : '' }}>
                                                May Be Considered
                                            </option>
                                            <option value="Not Recommended" {{ request('review_Type') == 'Not Recommended' ? 'selected' : '' }}>
                                                Not Recommended
                                            </option>
                                        </select>
                                



                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3 mb-xl-0">
                                        <label class="form-label">Select Reviewer</label>
                                        <select name="status" id="status"
                                            class="form-select bg-white p-2 border border-1 mb-3">
                                            <option value="">All Review</option>
                                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="Complete" {{ request('status') == 'Complete' ? 'selected' : '' }}>
                                                Complete
                                            </option>
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
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

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

table.dataTable thead th {
    text-transform: math-auto !important;
}
</style>