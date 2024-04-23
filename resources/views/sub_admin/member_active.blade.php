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
    <title>Government of Tamil Nadu - Book Procurement - Active Reviewer List</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
    include 'sub_admin/plugin/plugin_css.php';
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
        @include ('sub_admin.navigation')

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
                                <b>Active Reviewer List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/sub_admin/member_create">
                                <i class="fas fa-plus"></i> Add Reviewer</a>

                        </div>
                    </div>

                </div>
                <div>
                    <span>
                        <!-- <button class="btn btn-info assignPro mb-5 justify-content-between active-btn" data-bs-toggle="modal" data-bs-target="#basicModal" data-state="active">Active</button> -->

                        <!-- <button class="btn  btn-danger assignPro mb-5 justify-content-between inactive-btn"
                            data-bs-toggle="modal" data-bs-target="#basicModal1" data-state="inactive">Inactive</button> -->

                    </span>
                </div>
                <div class="card">
                    <div class="col-xl-12">
                        <div class="card-body p-3">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid"
                                        aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">
                                            <!-- <th>
                                                    <div class="form-check custom-checkbox ms-0">
                                                     <input type="checkbox" class="form-check-input dataall" id="dataall" required="">
                                                      <label class="form-check-label" for="dataall"></label>
                                                     </div>
                                                    </th> -->
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1" aria-label="ERoll No: activate to sort column ascending"
                                                    style="width: 97.5156px;">Roll No</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Profile: activate to sort column ascending"
                                                    style="width: 145.219px;">Profile</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Email: activate to sort column ascending"
                                                    style="width: 109.984px;">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Phone No: activate to sort column ascending"
                                                    style="width: 126.609px;">Phone No</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1" aria-label="Role Type: activate to sort column ascending"
                                                    style="width: 65.3594px;">Reviewer Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                                    style="width: 72.7031px;"> Active Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                                    style="width: 72.7031px;"> Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="empoloyees-tbl3" rowspan="1"
                                                    colspan="1" aria-label="Action: activate to sort column ascending"
                                                    style="width: 87.4688px;">  Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                   @php
                                                    $rev = DB::table('reviewer')->where('status','=','1')->get();
                                                    @endphp
                                                    @foreach($rev as $val)
                                            <tr role="row" class="odd">
                                            <!-- <td class="sorting_1">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input revieweritem" id="customCheckBox100" data-reviewer-id="{{$val->id}}"  value="{{$val->id}}">
                                                        <label class="form-check-label" for="customCheckBox100"></label>
                                                    </div>
                                                </td> -->
                                                <td><span>{{$loop->index +1}}</span></td>
                                                    <td class="py-3">
                                                        <a href="#">
                                                            <div class="media d-flex align-items-left">
                                                            @if($val->profileImage != null)
                                                                    <div class="avatar avatar-sm me-2">
                                                                        <div class=""><img class="rounded-circle img-fluid" src="{{ asset("reviewer/ProfileImage/".$val->profileImage) }}" width="30" alt="">
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="avatar avatar-sm me-2">
                                                                        <div class=""> <img class="rounded-circle img-fluid" src='{{ asset("sub_admin/images/default.png") }}' width="30" alt="">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 fs--1">{{$val->name}}</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                <td>
                                                    <div class="products">
                                                        <div>
                                                            <span class="text-left">{{$val->email}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">{{$val->phoneNumber}}</a></td>
                                                @if ($val->reviewerType == 'internal')
                                                    <td>
                                                        <span>Librarian </span>
                                                    </td>
                                                            
                                                            @elseif ($val->reviewerType == 'external')
                                                            <td>
                                                        <span>Expert </span>
                                                    </td>
                                                            @else
                                                            <td>
                                                        <span>Public </span>
                                                    </td>
                                                            @endif
                                                <td class="sorting_1">
                                   <div class="form-check form-switch id="load">
                                         <input class="form-check-input toggle-class" type="checkbox"
                                        data-id="{{$val->id}}" name="featured_status"
                                       data-isprm="1" data-onstyle="success"
                                       data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->status ? 'checked' : '' }}>
                                      <label class="form-check-label"
                                     for="flexSwitchCheckDefault"></label>
                                 </div>
                              </td>
                              @if($val->status == 1)
                              <td>
                             <span class="badge badge-success light border-0 me-1">Active</span>
                             </td>
                             @else
                              <td>
                              <span class="badge badge-danger light border-0 me-1">Inctive</span>
                              </td>
                              @endif



                                                <td data-label="controlq">
                                                    <div class="d-flex mt-p0">
                                                        <a href="/sub_admin/memberview/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
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
        @include ('sub_admin.footer')
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
    include 'sub_admin/plugin/plugin_js.php';
    ?>

    <!-- <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitbutton11" class="btn btn-primary submitbutton11">Confirm</button>
            </div>
        </div>
    </div>
</div> -->

    <div class="modal fade" id="basicModal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitbutton22" class="btn btn-primary submitbutton22">Confirm</button>
                </div>
            </div>
        </div>
    </div>
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
</style>
