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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sub_admin/images/fevi.svg') }}">
    <?php
        include "sub_admin/plugin/plugin_css.php";
    ?>
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
        @include ('sub_admin.navigation')
        <!--************
            Sidebar end
            *************-->
        <!--************
            Content body start
            *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card">

                    <div class="card mb-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h3 class="mb-0 bc-title">
                                    <b>Publisher Inactive List</b>
                                </h3>
                                <a class="btn btn-primary  btn-sm" href="/sub_admin/publisher_list">
                                    <i class="fas fa-plus"></i> List of Publisher </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="example4" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Publisher Name</th>
                                        <th>Contact Number</th>
                                        <th>District </th>
                                        <th>Status </th>
                                        <!-- <th>Update Status</th> -->
                                        <th>Date</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($publisher as $val)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>
                                            {{$val->firstName}} {{$val->lastName}}
                                        </td>
                                        <td>{{$val->mobileNumber}}</td>
                                        <td>{{$val->District}}</td>
                                        <!-- <td class="sorting_1">
                               <div class="form-check form-switch id="load">
                                     <input class="form-check-input toggle-class" type="checkbox"
                                    data-id="{{$val->id}}" name="featured_status"
                                   data-isprm="1" data-onstyle="success"
                                   data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->status ? 'checked' : '' }}>
                                  <label class="form-check-label"
                                 for="flexSwitchCheckDefault"></label>
                             </div>
                          </td> -->
                                        <!-- @if($val->approved_status=='pending')
                          <td>
                              <div class="col-sm-12 m-b30">
                                  <select  class="col-sm-12 m-b30"  name="district">
                                  <option style="color: red;">Pending</option>
                                 <option style="color: green;">Approve</option>
                                 <option style="color: blue;">Reject</option>
                                  </select>
                                  </div>
                           </td>
                           @elseif($val->approved_status=='approve')

                          <td> <span class="badge bg-success text-white">Approve</span></td>

                            @else
                           <td> <span class="badge bg-danger text-white">Reject</span></td>
                           @endif -->
                                        @if($val->status == 1)

                                        <td> <span class="badge bg-success text-white">Active</span></td>

                                        @else
                                        <td> <span class="badge bg-danger text-white">Inactive</span></td>
                                        @endif

                                        <td><span
                                                class="badge light badge-success">{{$val->created_at->format('d-m-Y')}}</span>
                                        <td>
                                            <a href="/sub_admin/pub_profile/{{$val->id}}"><i
                                                    class="fa fa-eye p-2"></i></a>
                                            <a href="/sub_admin/book_manage/{{$val->id}}"><i
                                                    class="fa fa-list-check p-2"></i></a>
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
    <!--************
         Content body end
         *************-->
    <!--************
         Footer start
         *************-->
    @include ("sub_admin.footer")
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
        include "sub_admin/plugin/plugin_js.php";
         ?>
</body>


</html>