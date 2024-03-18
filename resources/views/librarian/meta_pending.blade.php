
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
    <title>Government of Tamil Nadu - Book Procurement - All Meta Book Check List</title>

    <!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
        include "librarian/plugin/plugin_css.php";
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h3 class="mb-0 bc-title">
                                    <b>Pending Meta Book Check List</b>
                                </h3>
                                <a class="btn btn-primary  btn-sm" href="index">
                                    <i class="fas fa-home"></i> Home</a>
                                <!-- <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="allocated_location_view.php">View Allocated Location</a></li>
                               <li class="breadcrumb-item active" aria-current="page">Allocated Location List</li>
                           </ol>
                           </nav> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row task">
                                    <div class="col-xl-3 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-primary count">

                                                @php
                                                 $id=auth('librarian')->user()->id;
                                                 $recordCount = DB::table('books')->where('book_reviewer_id','=',$id)->where('book_status','!=','Null')->count();
                                                  @endphp
                                                  {{ $recordCount }}
                                                </h2>
                                                <span>Total Review Books</span>
                                            </div>
                                            <p>Review Book</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-purple count">

                                                @php
                                                $id=auth('librarian')->user()->id;
                                                 $recordCount = DB::table('books')->where('book_reviewer_id','=',$id)->where('book_status','=',Null)->count();
                                                  @endphp
                                                  {{ $recordCount }}

                                                </h2>
                                                <span>Pending Review Books</span>
                                            </div>
                                            <p>Pending </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-warning count">

                                                @php
                                                 $id=auth('librarian')->user()->id;
                                                 $recordCount = DB::table('books')->where('book_reviewer_id','=',$id)->where('book_status','=','1')->count();
                                                  @endphp
                                                  {{ $recordCount }}
                                                </h2>
                                                <span>Completed Review Books</span>
                                            </div>
                                            <p>Completed</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-danger count">

                                                @php
                                                 $id=auth('librarian')->user()->id;
                                                 $recordCount = DB::table('books')->where('book_reviewer_id','=',$id)->where('book_status','=','0')->count();
                                                  @endphp
                                                  {{ $recordCount }}
                                                </h2>
                                                <span>Rejected Review Books</span>
                                            </div>
                                            <p>Rejected</p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-success count">21</h2>
                                                <span>Complete</span>
                                            </div>
                                            <p>Tasks assigne</p>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="task-summary">
                                            <div class="d-flex align-items-baseline">
                                                <h2 class="text-danger count">16</h2>
                                                <span>pending</span>
                                            </div>
                                            <p>Tasks assigne</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="table-responsive active-projects task-table">
                                    <div class="tbl-caption">
                                        <h4 class="heading mb-0"><i class="fa fa-trash p-2" aria-hidden="true"></i></h4>
                                    </div>
                                    <table id="example4" class="table">
                                        <thead>

                                            <tr>
                                               
                                                <th>S.No</th>
                                                <th>Book Name</th>
                                                <th>Book Number</th>
                                                <th>Meta Check</th>
                                                <th class="text-end">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($book as $key=>$val)
                                            <tr>
                                              
                                                <td><span>{{$loop->index +1}}</span></td>
                                                <td>
                                                    <div class="products">
                                                        <div>
                                                            <h6>{{$val->book_title}}</h6>
                                                            <!-- <span>INV-100023456</span> -->
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>{{$val->product_code}}</span>
                                                </td>

                                                 @if($val->book_status==Null)
                          <td>
                              <div class="col-sm-12 m-b30">
                                  <select  class="col-sm-12 m-b30"  name="user_approval" id="user_approval"   data-id="{{$val->id}}">
                                  <option style="color: red;" value="Pending">Pending</option>
                                 <option style="color: green;" value="Approve">Approve</option>
                                 <option style="color: orange;" value="return">Return To 
                                 @if($val->user_type == "publisher_distributor") 
                                 publisher cum distributor
                                @else
                                {{$val->user_type}}
                            @endif    </option>
                                 <option style="color: blue;" value="Reject">Reject</option>
                                  </select>
                                  </div>
                           </td>
                           @elseif($val->book_status=='1')

                          <td> <span class="badge bg-success text-white">Approved</span></td>
                          @elseif($val->book_status=='2')

                          <td> <span class="badge bg-danger text-white">Returned To 
                                 @if($val->user_type == "publisher_distributor") 
                                 publisher cum distributor
                                @else
                                {{$val->user_type}}
                            @endif </span></td>
                            @else
                           <td> <span class="badge bg-danger text-white">Rejected</span></td>
                           @endif

                                                <td>
                                                    <a href="/librarian/book_view/{{$val->id}}"> <i class="fa fa-eye p-2"></i></a>
                                                    @if($val->book_status=='0')
                                                    <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-id="{{$val->reject_message}}" data-bs-target="#myModal">View</a>
                                                    @endif
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
      <div class="modal fade" id="staticBackdrop22" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Correction</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="userid" id="hiddenInput22">
               <label for="return_message">Please Enter Any Correction </label>
               <textarea name="return_message" id="return_message" cols="800" rows="30" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submitButton33" >submit</button>
            </div>
         </div>
      </div>

      </div>


      <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Approve </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <label>Are you sure you want to approve? </label>
               <input type="hidden" name="userid" id="hiddenInput1">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="submitButton1" >submit</button>
            </div>
         </div>
      </div>
      </div>
    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBodyContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
   <?php
        include "librarian/plugin/plugin_js.php";
    ?>
</body>
<script>
                 $('#example4').on( 'change', "select[name='user_approval']", function (e) {
                  var approval_ = $(this).val();

                  var id = $(this).data('id');
                  if(approval_ == 'Reject'){
                     $('#hiddenInput').val(id);
                     $('#staticBackdrop').modal('show');
                  }else if(approval_ == 'Approve'){
                    $('#hiddenInput1').val(id);
                     $('#staticBackdrop1').modal('show');

                  }else if(approval_ == 'return'){
                    $('#hiddenInput22').val(id);
                     $('#staticBackdrop22').modal('show');

                  }
                  });
                  </script>

<script>
      $(document).on('click','#submitButton33',function(e){
        e.preventDefault();
        var data={
           'id':$('#hiddenInput22').val(),
           'returnmessage':$('#return_message').val(),

        }
         console.log(data);
        $('#staticBackdrop22').modal('hide');
        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/librarian/librarianreturnmessage",
           data:data,
           dataType:"json",
           success: function(response) {
              console.log(response);
              if(response.success){
                setTimeout(function() {
                    window.location.href ="/librarian/meta_pending"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/librarian/meta_pending"
                     }, 3000);
               }

        }
      });
  })



    </script>
<script>
      $(document).on('click','#submitButton',function(e){
        e.preventDefault();
        var data={
           'id':$('#hiddenInput').val(),
           'rejectmessage':$('#reject_remark').val(),

        }
        console.log(data);
        $('#staticBackdrop').modal('hide');
        $.ajaxSetup({
           headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $.ajax({
           type:"post",
           url:"/librarian/librarianrejectstatus",
           data:data,
           dataType:"json",
           success: function(response) {
              console.log(response);
              if(response.success){
                setTimeout(function() {
                    window.location.href ="/librarian/meta_pending"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/librarian/meta_pending"
                     }, 3000);
               }

        }
      });
  })



    </script>

<script>
      $(document).on('click','#submitButton1',function(e){
        e.preventDefault();
        var data={
           'id':$('#hiddenInput1').val(),
        }
        console.log(data);
        $('#staticBackdrop1').modal('hide');

                  $.ajaxSetup({
                        headers:{
                           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                     });
                     $.ajax({
                        type: "post",
                        dataType: "json",
                        url: '/librarian/librarianapprovestatus',
                        data: data,
                        success: function(response) {

                           if(response.success){
                           setTimeout(function() {
                              window.location.href ="/librarian/meta_pending"
                                 }, 3000);
                           toastr.success(response.success,{timeout:45000});
                           }else{
                           toastr.error(response.error,{timeout:45000});
                           setTimeout(function() {
                              window.location.href ="/librarian/meta_pending"
                                 }, 3000);
                           }

                        }
                  });
  })



    </script>

<script>
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var rejectMessage = button.data('id');
            var modal = $(this);

            // Update modal body with the reject message
            modal.find('#modalBodyContent').html(rejectMessage);
        });
    });
</script>
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
