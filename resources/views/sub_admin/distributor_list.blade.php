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
            <div class="card mb-4 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>Distributor List</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="/sub_admin/index">
                            <i class="fas fa-chevron-left"></i> Dashboard </a>
                    </div>
                </div>
            </div>
            <div class="card">
               <div class="card-body">


                  <div class="table-responsive">
                     <table id="example4" class="display table" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>Roll No</th>
                              <th>Distributor Name</th>
                              <th>Distribution Name</th>
                              <th>Contact Number</th>
                              <th>District </th>
                              <th>Book Count </th>
                              <th>Status </th>
                              <!-- <th>Update Status</th> -->
                              <th>Date</th>
                              <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($distributor as $val)
                           <tr>
                              <td>{{$loop->index +1}}</td>
                              <td>{{$val->firstName}} {{$val->lastName}}</td>
                              <td>{{$val->distributionName}}</td>
                              <td>{{$val->mobileNumber}}</td>
                              <td>{{$val->District}}</td>
                              @php
                                                           $records = DB::table('books')
                                                           ->where('user_id', '=', $val->id)
                                                            ->where('book_active_status', '=', '1')
                                                             ->count();
                                                           $displayCount = $records ?? 0; 
                                                              @endphp
                                                        <td>{{ $displayCount }}</td>
                              <!-- <td class="sorting_1">
                                 <div class="form-check form-switch" id="load">
                                    <input class="form-check-input toggle-class" type="checkbox"
                                          data-id="{{$val->id}}" name="featured_status"
                                          data-isprm="1" data-onstyle="success"
                                          data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $val->status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                 </div>
                              </td> -->


                              <!-- @if($val->approved_status=='pending')
                          <td>
                              <div class="col-sm-12 m-b30">
                                  <select  class="col-sm-12 m-b30"  name="user_approval" id="user_approval"   data-id="{{$val->id}}">
                                  <option style="color: red;" value="Pending">Pending</option>
                                 <option style="color: green;" value="Approve">Approve</option>
                                 <option style="color: blue;" value="Reject">Reject</option>
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
                           <td><span class="badge light badge-success">{{$val->created_at->format('d-m-Y')}}</span>
                              <td>
                                 <a href="/sub_admin/dist_profile/{{$val->id}}"><i class="fa fa-eye p-2"></i></a>
                                 <!-- <i class="fa fa-pencil p-2"></i>
                                 <i class="fa fa-trash p-2"></i> -->
                                 <!-- <a href="/sub_admin/pub_payment_list"><i class="fa fa-list-check p-2"></i></a> -->
                                 <a href="/sub_admin/book_manage/{{$val->id}}"><i class="fa fa-list-check p-2"></i></a>

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
           <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Application Reject</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="userid" id="hiddenInput">
               <label for="Reject remark">Please Enter Any Remark </label>
               <textarea name="remark" id="reject_remark" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submitButton" >submit</button>
            </div>
         </div>
      </div>
      </div>
         <?php
        include "sub_admin/plugin/plugin_js.php";
         ?>

</body>

</html>
