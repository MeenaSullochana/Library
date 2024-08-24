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
    <title>Book fair</title>
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
                <div class="card-header flex-wrap bg-white mb-5">
                    <div class="d-sm-flex align-items-center justify-content-between py-3">
                        <h5 class=" mb-0 text-gray-800 pl-3">Reviewer List</h5>

                    </div>
                </div>
                <section class="content pr-3 pl-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="table-responsive-lg table-responsive-sm table-responsive-md">

                                        <div class="container">

                                            <ul class="nav nav-pills mb-4 light">
                                                <li class=" nav-item">
                                                    <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab"
                                                        aria-expanded="false">Expert Reviewer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#navpills-2" class="nav-link" data-bs-toggle="tab"
                                                        aria-expanded="false">Librarian Reviewer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#navpills-3" class="nav-link" data-bs-toggle="tab"
                                                        aria-expanded="false">public Reviewer</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10"></div>
                                            <div class="col-md-2">
                                                <div class="d-sm-flex align-items-center justify-content-between">
                                                    <button class="btn btn-info assignPro mb-5 justify-content-between"
                                                        data-bs-toggle="modal" id="assign"
                                                        data-bs-target="#basicModal">Delete reviewers</button>
                                                    <!-- <button class="btn btn-info mb-5 justify-content-between"  id="assign">Assign</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div id="navpills-1" class="tab-pane active">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div
                                                                    class="table-responsive active-projects task-table">
                                                                    <div class="tbl-caption">
                                                                        <h4 class="heading mb-0">Reviewer Details
                                                                        </h4>
                                                                    </div>
                                                                    <div id="empoloyeestbl2_wrapper"
                                                                        class="dataTables_wrapper no-footer">
                                                                        <div class="dt-buttons"><button
                                                                                class="dt-button buttons-excel buttons-html5 btn btn-sm border-0"
                                                                                tabindex="0"
                                                                                aria-controls="empoloyeestbl2"
                                                                                type="button"><span><i
                                                                                        class="fa-solid fa-file-excel"></i>
                                                                                    Export Report</span></button>
                                                                        </div>
                                                                        <table id="empoloyeestbl2"
                                                                            class="table dataTable no-footer"
                                                                            role="grid"
                                                                            aria-describedby="empoloyeestbl2_info">
                                                                            <thead>
                                                                                <tr role="row">

                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="S.No: activate to sort column ascending"
                                                                                        style="width: 24.25px;">S.No
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="User name: activate to sort column ascending"
                                                                                        style="width: 222.562px;">
                                                                                        Reviewer Name</th>


                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Assign Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Complete Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Bank: activate to sort column ascending"
                                                                                        style="width: 73.4688px;">
                                                                                        Reviewer Remark</th>

                                                                                    <th class="text-end sorting"
                                                                                        tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Status: activate to sort column ascending"
                                                                                        style="width: 91px;">
                                                                                        Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($data->external as $val)

                                                                                <tr role="row" class="odd">
                                                                                    <td class="sorting_1">{{$loop->index 
                                                                                    +1}} </td>
                                                                                    @php
                                                                                    $reviewer =
                                                                                    DB::table('reviewer')->find($val->reviewer_id);
                                                                                    @endphp

                                                                                    @if( $reviewer !=null)
                                                                                    <td><span>{{$reviewer->name}}</span>
                                                                                    </td>
                                                                                    @endif
                                                                                    <td>

                                                                                        {{$val->created_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @if($val->review_type != null)
                                                                                    <td>
                                                                                        {{$val->updated_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @else
                                                                                    <td>
                                                                                        No Review
                                                                                    </td>

                                                                                    @endif
                                                                                    <td>
                                                                                        {{$val->review_type}}
                                                                                    </td>
                                                                                    @if($val->review_type != null)
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-success badge-sm">
                                                                                            Complited<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @else
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-danger badge-sm">
                                                                                            Not Completed<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @endif
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
                                            <div id="navpills-2" class="tab-pane">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div
                                                                    class="table-responsive active-projects task-table">
                                                                    <div class="tbl-caption">
                                                                        <h4 class="heading mb-0">User Details
                                                                        </h4>
                                                                    </div>
                                                                    <div id="empoloyeestbl2_wrapper"
                                                                        class="dataTables_wrapper no-footer">
                                                                        <div class="dt-buttons"><button
                                                                                class="dt-button buttons-excel buttons-html5 btn btn-sm border-0"
                                                                                tabindex="0"
                                                                                aria-controls="empoloyeestbl2"
                                                                                type="button"><span><i
                                                                                        class="fa-solid fa-file-excel"></i>
                                                                                    Export Report</span></button>
                                                                        </div>
                                                                        <table id="empoloyeestbl2"
                                                                            class="table dataTable no-footer"
                                                                            role="grid"
                                                                            aria-describedby="empoloyeestbl2_info">
                                                                            <thead>
                                                                                <tr role="row">
                                                                                    <th>
                                                                                        <div
                                                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                id="selectAllIbook"
                                                                                                required="">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="selectAllIbook"></label>
                                                                                        </div>
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="S.No: activate to sort column ascending"
                                                                                        style="width: 24.25px;">S.No
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="User name: activate to sort column ascending"
                                                                                        style="width: 222.562px;">
                                                                                        Reviewer Name</th>

                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Assign Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Complete Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Bank: activate to sort column ascending"
                                                                                        style="width: 73.4688px;">
                                                                                        Reviewer Remark</th>

                                                                                    <th class="text-end sorting"
                                                                                        tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Status: activate to sort column ascending"
                                                                                        style="width: 91px;">
                                                                                        Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                                @foreach($data->internal as $val)

                                                                                <tr role="row" class="odd">
                                                                                    @if($val->review_type == null)
                                                                                    <td>
                                                                                        <div
                                                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input bookitem"
                                                                                                id="checkItem_{{ $val->id }}"
                                                                                                data-book-id="{{ $val->id }}"
                                                                                                required="">
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="checkItem_{{ $val->id }}"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                    @else
                                                                                    <td>
                                                                                    </td>
                                                                                    @endif
                                                                                    <td class="sorting_1">{{$loop->index 
                                                                           +1}} </td>
                                                                                    @php
                                                                                    $reviewer =
                                                                                    DB::table('reviewer')->find($val->reviewer_id);
                                                                                    @endphp
                                                                                    @if( $reviewer !=null)
                                                                                    <td><span>{{$reviewer->name}}</span>
                                                                                    </td>
                                                                                    @endif
                                                                                    <td>

                                                                                        {{$val->created_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @if($val->review_type != null)
                                                                                    <td>
                                                                                        {{$val->updated_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @else
                                                                                    <td>
                                                                                        No Review
                                                                                    </td>
                                                                                    @endif
                                                                                    <td>
                                                                                        {{$val->review_type}}
                                                                                    </td>
                                                                                    @if($val->review_type != null)
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-success badge-sm">
                                                                                            Completed<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @else
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-danger badge-sm">
                                                                                            Not Completed<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @endif
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
                                            <div id="navpills-3" class="tab-pane">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div
                                                                    class="table-responsive active-projects task-table">
                                                                    <div class="tbl-caption">
                                                                        <h4 class="heading mb-0">Public Details
                                                                        </h4>
                                                                    </div>
                                                                    <div id="empoloyeestbl2_wrapper"
                                                                        class="dataTables_wrapper no-footer">
                                                                        <div class="dt-buttons"><button
                                                                                class="dt-button buttons-excel buttons-html5 btn btn-sm border-0"
                                                                                tabindex="0"
                                                                                aria-controls="empoloyeestbl2"
                                                                                type="button"><span><i
                                                                                        class="fa-solid fa-file-excel"></i>
                                                                                    Export Report</span></button>
                                                                        </div>
                                                                        <table id="empoloyeestbl2"
                                                                            class="table dataTable no-footer"
                                                                            role="grid"
                                                                            aria-describedby="empoloyeestbl2_info">
                                                                            <thead>
                                                                                <tr role="row">
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="S.No: activate to sort column ascending"
                                                                                        style="width: 24.25px;">S.No
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="User name: activate to sort column ascending"
                                                                                        style="width: 222.562px;">
                                                                                        Reviewer Name</th>

                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Assign Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Account Name: activate to sort column ascending"
                                                                                        style="width: 109px;">
                                                                                        Complete Date
                                                                                    </th>
                                                                                    <th class="sorting" tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Bank: activate to sort column ascending"
                                                                                        style="width: 73.4688px;">
                                                                                        Reviewer Remark</th>

                                                                                    <th class="text-end sorting"
                                                                                        tabindex="0"
                                                                                        aria-controls="empoloyeestbl2"
                                                                                        rowspan="1" colspan="1"
                                                                                        aria-label="Status: activate to sort column ascending"
                                                                                        style="width: 91px;">
                                                                                        Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($data->public as $val)

                                                                                <tr role="row" class="odd">
                                                                                    <td class="sorting_1">{{$loop->index 
                                                                           +1}} </td>
                                                                                    @php
                                                                                    $reviewer =
                                                                                    DB::table('reviewer')->find($val->reviewer_id);
                                                                                    @endphp

                                                                                    @if( $reviewer !=null)
                                                                                    <td><span>{{$reviewer->name}}</span>
                                                                                    </td>
                                                                                    @endif
                                                                                    <td>

                                                                                        {{$val->created_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @if($val->review_type != null)
                                                                                    <td>
                                                                                        {{$val->updated_at->format('Y-m-d h:i A')}}
                                                                                    </td>

                                                                                    @else
                                                                                    <td>
                                                                                        No Review
                                                                                    </td>
                                                                                    @endif
                                                                                    <td>
                                                                                        {{$val->review_type}}
                                                                                    </td>
                                                                                    @if($val->review_type != null)
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-success badge-sm">
                                                                                            Complited<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @else
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-danger badge-sm">
                                                                                            Not Completed<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>

                                                                                    @endif
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row-->

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 bc-title">
                                    <b>Periodical Reassign to All Reviewer</b>
                                </h3>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <button class="btn btn-info assignPro mb-5 justify-content-between"
                                    data-bs-toggle="modal" id="assign22"
                                    data-bs-target="#basicModal22">Reassign</button>
                                <!-- <button class="btn btn-info mb-5 justify-content-between"  id="assign">Assign</button> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="table_header">
                                        <h4>Book List</h4>
                                    </div>
                                    <div class="row">

                                        <div class="col-4"></div>
                                        <div class="col-4"></div>
                                    </div>
                                </div>
                                <div class="card-body text-center" style="width: 100%;OVERFLOW: scroll;">
                                    <table class="display table table-striped memeber_table" id="yourTableId"
                                        style="width: 100%;overflow: scroll;">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div
                                                        class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="selectAllIbook22" required="">
                                                        <label class="form-check-label" for="selectAllIbook22"></label>
                                                    </div>
                                                </th>
                                                <th>S.No</th>
                                                <th>Periodical Name</th>
                                                <th>Periodicity</th>
                                                <th>Language</th>
                                                <th>Category</th>

                                                <th>Publication Name</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $categori1 = [];
                                            $magazines = DB::table('magazines')

                                            ->find($data->periodicalid);


                                            if ($magazines != null) {
                                            array_push($categori1, $magazines);
                                            }

                                            @endphp


                                            @foreach($categori1 as $val)

                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                        <input type="checkbox" class="form-check-input bookitem22"
                                                            id="checkItem_{{ $val->id }}" data-book-id1="{{ $val->id }}"
                                                            required="">
                                                        <label class="form-check-label"
                                                            for="checkItem_{{ $val->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><small>{{ $val->title }}</small></td>
                                                <td>{{ $val->periodicity }}</td>
                                                <td>{{ $val->language }}</td>

                                                <td>{{ $val->category }}</td>

                                                <td>{{$val->publisher_name}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>

                        @php
                        $reviewers1 = DB::table('reviewer')
                        ->where('reviewerType', '=', 'external')
                        ->where('status', '=', 1)
                        ->get();
                        $reviewers=[];


                        foreach ($reviewers1 as $val1) {
                        $categories = json_decode($val1->per_category, true);
                        $cat= $magazines->category;
                        if (is_array($categories) && in_array($cat, $categories)) {
                        $reviewers[] = $val1;
                        }
                        }



                        @endphp

                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Expert Reviewer List</h4>

                                </div>
                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="display table table-striped externel_reviewer" id="yourTableId11"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="selectAllIexternel" required="">
                                                            <label class="form-check-label"
                                                                for="selectAllIexternel"></label>
                                                        </div>
                                                    </th>
                                                    <th>S.No</th>
                                                    <th>Expert Reviewer Name</th>
                                                    <th>Subject</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviewers as $key => $val)

                                                @php
                                                $categories = json_decode($val->per_category, true);
                                                $recdata = '';

                                                if (is_array($categories)) {
                                                foreach ($categories as $category) {
                                                $recdata .= htmlspecialchars($category) . ' ';
                                                }
                                                }
                                                $book_review_statuses = DB::table('periodical_review_statuses')
                                                ->where('periodical_id', $data->periodicalid)->where('reviewer_id',
                                                $val->id)
                                                ->first();
                                                @endphp
                                                <tr>
                                                   
                                                    @if($book_review_statuses ==null)
                                                    <td>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input externel"
                                                                id="checkItem_{{ $val->id}}"
                                                                data-externel-id="{{$val->id}}" required="">
                                                            <label class="form-check-label" for="customCheckBox2"
                                                                value="{{$val->id}}"></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td> </td>
                                                    @endif
                                                    <td> {{$key + 1}} </td>
                                                    <td>{{ $val->name}} </td>
                                                    <td> {{trim($recdata)}} </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="table_header">
                                        <h4>Librarian Reviewer List</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Button in the end -->
                                            <div class="input-group mb-3">

                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4"></div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="display table table-striped internal_table" id="yourTableId22"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="selectAllinternal" required="">
                                                            <label class="form-check-label"
                                                                for="selectAllinternal"></label>
                                                        </div>
                                                    </th>
                                                    <th>S.No</th>
                                                    <th>Librarian Name </th>
                                                    <th>Library Name </th>
                                                    <th>Category </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $internalsdat = DB::table('reviewer')
                                                ->where('reviewerType', '=', 'internal')
                                                ->where('status', '=', 1)
                                                ->get();
                                                $internalsdat1 = [];
                                                foreach ($internalsdat as $val1) {
                                                $categories = json_decode($val1->per_category, true);
                                                $cat= $magazines->category;
                                                if (is_array($categories) && in_array($cat, $categories)) {
                                                $internalsdat1[] = $val1;
                                                }
                                                }

                                                @endphp

                                                @foreach ($internalsdat1 as $key => $val)

                                                @php
                                                $categories = json_decode($val->per_category, true);
                                                $recdata = '';

                                                if (is_array($categories)) {
                                                foreach ($categories as $category) {
                                                $recdata .= htmlspecialchars($category) . ' ';
                                                }
                                                }
                                                $periodical_review_statuses = DB::table('periodical_review_statuses')
                                                ->where('periodical_id', $data->periodicalid)->where('reviewer_id',
                                                $val->id)
                                                ->first();
                                                @endphp
                                                <tr>
                                                   
                                                    @if($periodical_review_statuses ==null)
                                                    <td>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">

                                                            <input type="checkbox" class="form-check-input internalitem"
                                                                id="customCheckBox{{$loop->index + 1 }}" required=""
                                                                data-librarian-id="{{ $val->id}} "
                                                                value="{{$val->id}} ">
                                                            <label class="form-check-label"
                                                                for="customCheckBox{{$loop->index + 1}} "></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td> </td>
                                                    @endif
                                                    <td>{{$loop->index + 1}} </td>
                                                    <td><span>{{$val->name}}</span></td>
                                                    <td><span>{{$val->libraryName}} </span></td>



                                                    <td><span> {{trim($recdata)}} </span></td>




                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="table_header">
                                        <h4>Public Reviewer List</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Button in the end -->
                                            <div class="input-group mb-3">

                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4"></div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="display table table-striped public_table" id="yourTableId33"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="selectAllpublic" required="">
                                                            <label class="form-check-label"
                                                                for="selectAllpublic"></label>
                                                        </div>
                                                    </th>
                                                    <th>S.No</th>
                                                    <th>Public Reviewer Name</th>
                                                    <th>Category</th>
                                                    <th>District</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $internals11 = DB::table('reviewer')
                                               ->where('reviewerType', '=', 'public')->where('status', '=',
                                                1)->get();
                                                $internalsdat123 = [];
                                                foreach ($internals11 as $val1) {
                                                $categories = json_decode($val1->per_category, true);
                                                $cat= $magazines->category;
                                                if (is_array($categories) && in_array($cat, $categories)) {
                                                $internalsdat123[] = $val1;
                                                }
                                                }
                                                @endphp
                                                @foreach($internalsdat123 as $val)
                                                @php
                                                $categories = json_decode($val->per_category, true);
                                                $recdata = '';

                                                if (is_array($categories)) {
                                                foreach ($categories as $category) {
                                                $recdata .= htmlspecialchars($category) . ' ';
                                                }
                                                }
                                                $book_review_statuses2 = DB::table('periodical_review_statuses')
                                                ->where('periodical_id', $data->periodicalid)->where('reviewer_id',
                                                $val->id)
                                                ->first();
                                                @endphp
                                                <tr>
                                                    @if($book_review_statuses2 ==null)
                                                    <td>
                                                        <div
                                                            class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                            <input type="checkbox" class="form-check-input publiclitem"
                                                                id="customCheckBox{{$loop->index + 1}}" required=""
                                                                data-public-id="{{ $val->id }}" value="{{$val->id }}">
                                                            <label class="form-check-label"
                                                                for="customCheckBox{{$loop->index + 1}}"></label>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td> </td>
                                                    @endif
                                                    <td>{{$loop->index + 1}} </td>
                                                    <td><span>{{$val->name}} </span></td>
                                                    <td><span>{{$val->Category}} </span></td>
                                                    <td> <span>{{$val->district}} </span></td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
                <!--**********************************
        Main wrapper end
    ***********************************-->
            </div>
        </div>


        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Do you want to proceed?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="submitbutton11"
                            class="btn btn-primary submitbutton11">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="basicModal22">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Do you want to proceed?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="submitbutton22"
                            class="btn btn-primary submitbutton22">Confirm</button>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include "admin/plugin/plugin_js.php";
    ?>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {

            $('.memeber_table').dataTable();
            $('.public_table').dataTable();
            $('.externel_reviewer').dataTable();
            $('.internal_table').dataTable()
        });
        </script>

        <script>
        $(document).ready(function() {
            $('#selectAllpublic').on('click', function() {
                console.log('hi');
                var isChecked = $(this).prop('checked');
                $('.publiclitem').prop('checked', isChecked);
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#selectAllinternal').on('click', function() {
                console.log('hi');
                var isChecked = $(this).prop('checked');
                $('.internalitem').prop('checked', isChecked);
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#selectAllIbook22').on('click', function() {
                console.log('hi');
                var isChecked = $(this).prop('checked');
                $('.bookitem22').prop('checked', isChecked);
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#selectAllIexternel').on('click', function() {

                var isChecked = $(this).prop('checked');
                $('.externel').prop('checked', isChecked);
            });
        });
        </script>

        <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
        .dataTables_wrapper .dataTables_paginate .paginate_button.next {
            width: auto !important;
        }
        </style>
</body>
<script>
$(document).ready(function() {
    $('#selectAllIbook').on('click', function() {
        console.log('hi');
        var isChecked = $(this).prop('checked');
        $('.bookitem').prop('checked', isChecked);
    });
});
</script>

<script>
$('.submitbutton11').click(function() {
    $('.submitbutton11').prop('disabled', true);
    $('#assign').prop('disabled', true);

    var checkebook = $('.bookitem:checked').map(function() {
        return $(this).data('book-id');
    }).get();


    var rec = @json($data -> periodicalid);



    var requestData = {
        reviewerId: checkebook,
        periodicalid: rec
    };

    console.log(requestData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin/periodical-delete-reviewer-data',
        method: 'POST',
        data: requestData,
        success: function(response) {
            $('.submitbutton11').prop('disabled', false);
            $('#assign').prop('disabled', false);

            if (response.success) {
                $('#basicModal').modal('hide');


                setTimeout(function() {
                    window.location.href = "/admin/periodical_review"
                }, 3000);
                toastr.success(response.success, {
                    timeout: 45000
                });
            } else {
                $('#basicModal').modal('hide');
                toastr.error(response.error, {
                    timeout: 45000
                });

            }

        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });

});
</script>
<script>
$('.submitbutton22').click(function() {

    $('.submitbutton22').prop('disabled', true);
    $('#assign22').prop('disabled', true);


    var checkepublic = $('.publiclitem:checked').map(function() {
        return $(this).data('public-id');
    }).get();


    var checkebook = $('.bookitem22:checked').map(function() {
        return $(this).data('book-id1');
    }).get();

    var checkeinternal = $('.internalitem:checked').map(function() {
        return $(this).data('librarian-id');
    }).get();


    var checkeexternel = $('.externel:checked').map(function() {
        return $(this).data('externel-id')
    }).get();


    var requestData = {
        periodicalId: checkebook,
        LibrarianReviewverId: checkeinternal,
        expectReviewverId: checkeexternel,
        publicReviewverId: checkepublic,
    };
    console.log(requestData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin/periodicalreassign-data',
        method: 'POST',
        data: requestData,
        success: function(response) {
            $('.submitbutton22').prop('disabled', false);
            $('#assign22').prop('disabled', false);

            if (response.success) {
                $('#basicModal22').modal('hide');


                setTimeout(function() {
                    window.location.href = "/admin/periodical_review"
                }, 3000);
                toastr.success(response.success, {
                    timeout: 45000
                });
            } else {
                $('#basicModal22').modal('hide');
                toastr.error(response.error, {
                    timeout: 45000
                });
                //  setTimeout(function() {
                //      window.location.href =response.url
                //       }, 3000);
            }

        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });

});
</script>

</html>