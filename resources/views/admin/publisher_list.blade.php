
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
   <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
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
                                <b>Publisher List</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/index">
                                <i class="fas fa-chevron-left"></i> Dashboard </a>
                        </div>
                    </div>
                </div>
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="example4" class="display table" style="min-width: 100px">
                        <thead>
                           <tr>
                              <th>Roll No</th>
                              <th>Publisher Name</th>
                              <th>Publication Name</th>
                              <th>Contact Number</th>
                              <th>District </th>
                              <th>Book count </th>
                              <th>Paid Book count </th>
                              <th>Unpaid Book count </th>
                              <th>Status </th>
                            
                              <!-- <th>Update Status</th> -->
                              <th>Date</th>
                              <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($publisher as $val)
                           <tr>
                              <td style="white-space:normal;">{{$loop->index +1}}</td>
                              <td style="white-space:normal;">
                                 {{$val->firstName}} {{$val->lastName}}
                              </td>
                              <td style="white-space:normal;">{{$val->publicationName}}   </td>
                              <td style="white-space:normal;">{{$val->mobileNumber}}</td>
                              <td style="white-space:normal;">{{$val->District}}</td>
                              @php
                                   $records = DB::table('books')
                                    ->where('user_id', '=', $val->id)
                                   ->where('book_active_status', '=', '1')
                                   ->count();
                                   $displayCount = $records ?? 0; 

                                   $records1 = DB::table('books')
                                    ->where('user_id', '=', $val->id)
                                   ->where('book_procurement_status', '!=', '0')
                                   ->count();
                                   $displayCount1 = $records1 ?? 0; 
                            @endphp
                           <td>{{ $displayCount }}</td>
                           <td>{{ $displayCount1 }}</td>
                           <td>{{ $displayCount -  $displayCount1}}</td>
                          
                           @if($val->status == 1)

                           <td style="white-space:normal;"> <span class="badge bg-success text-white">Active</span></td>

                           @else
                           <td style="white-space:normal;"> <span class="badge bg-danger text-white">Inactive</span></td>
                           @endif

                           <td style="white-space:normal;"><span class="badge light badge-success">{{$val->created_at->format('Y-m-d')}}</span>
                              <td>
                                 <a href="/admin/pub_profile/{{$val->id}}"><i class="fa fa-eye p-2"></i></a>
                                 <!-- <i class="fa fa-pencil p-2"></i>
                                 <i class="fa fa-trash p-2"></i> -->
                                 <!-- <a href="/admin/pub_payment_list"><i class="fa fa-list-check p-2"></i></a> -->

                                
                                 <a href="/admin/book_manage/{{$val->id}}"><i class="fa fa-list-check p-2"></i></a>
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
         @include ("admin.footer")
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
        include "admin/plugin/plugin_js.php";
         ?>
         <script>
                 $('#example4').on( 'change', "select[name='user_approval']", function (e) {
                  var approval_ = $(this).val();
                  var publisherid = $(this).data('id');
                  if(approval_ == 'Reject'){
                     $('#hiddenInput').val(publisherid);
                     $('#staticBackdrop').modal('show');
                  }else if(approval_ == 'Approve'){

                     $.ajaxSetup({
                        headers:{
                           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                     });
                     $.ajax({
                        type: "post",
                        dataType: "json",
                        url: '/admin/publisherapprovestatus',
                        data: {'status': approval_ , 'publisherid': publisherid},
                        success: function(response) {

                           if(response.success){
                           setTimeout(function() {
                              window.location.href ="/admin/publisher_list"
                                 }, 3000);
                           toastr.success(response.success,{timeout:45000});
                           }else{
                           toastr.error(response.error,{timeout:45000});
                           setTimeout(function() {
                              window.location.href ="/admin/publisher_list"
                                 }, 3000);
                           }

                        }
                  });
                  }
                  });
            // $(document).ready(function () {

            //   $('#user_approval').on('change',function(){
            //    $('#user_approval').each(function(){
            //       alert('good');
            //       var approval_ = $(this).val();
            //       alert(approval_);
            //       var publisherid = $(this).data('id');
            //       if(approval_ == 'Reject'){
            //          $('#hiddenInput').val(publisherid);
            //          $('#staticBackdrop').modal('show');
            //       }else if(approval_ == 'Approve'){
            //         console.log(publisherid);
            //         console.log(approval_);
            //          $.ajaxSetup({
            //             headers:{
            //                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            //             }
            //          });
            //          $.ajax({
            //             type: "post",
            //             dataType: "json",
            //             url: '/admin/publisherapprovestatus',
            //             data: {'status': approval_ , 'publisherid': publisherid},
            //             success: function(response) {

            //                if(response.success){
            //                setTimeout(function() {
            //                   window.location.href ="/admin/publisher_list"
            //                      }, 3000);
            //                toastr.success(response.success,{timeout:45000});
            //                }else{
            //                toastr.error(response.error,{timeout:45000});
            //                setTimeout(function() {
            //                   window.location.href ="/admin/publisher_list"
            //                      }, 3000);
            //                }

            //             }
            //       });
            //       }
            //    });

            //   })
            // });
         </script>
</body>
<script>
  $(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var publisherid = $(this).data('id');
        console.log(publisherid);
        $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
        $.ajax({
            type: "post",
            dataType: "json",
            url: '/admin/publisherstatus',
            data: {'status': status, 'publisherid': publisherid},
            success: function(response) {
               if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/publisher_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/publisher_list"
                     }, 3000);
               }

            }
        });
    })
  })
</script>
<script>

      $(document).on('click','#submitButton',function(e){
        e.preventDefault();
        var data={
           'id':$('#hiddenInput').val(),
           'rejectmessage':$('#reject_remark').val(),

        }
        $('#staticBackdrop').modal('hide');
        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/admin/publisherrejectstatus",
           data:data,
           dataType:"json",
           success: function(response) {
              console.log(response);
              if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/publisher_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/publisher_list"
                     }, 3000);
               }

        }
      });
  })



    </script>
</html>
