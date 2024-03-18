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
            <div class="card">

                <div class="card mb-4 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Thirukkural</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/slider_setting">
                                <i class="fas fa-plus"></i> Create </a>
                        </div>
                    </div>
                </div>
               <div class="card-body">

               @php
     $thiru = DB::table('thirukkural')->get();
   
    @endphp
                  <div class="table-responsive">
                     <table id="example4" class="display table" style="min-width: 845px">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Thirukkural</th>
                              <th>Short Description</th>
                              <th>long Description</th>
                              <th>Status </th>
                              <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($thiru as $val)
                           <tr> 
                              <td>{{$loop->index +1}}</td>
                              <td>
                              <p> {!! $val->thirukkuralFirstLine !!}  </p>
                              <p> {!! $val->thirukkuralSecondLine !!}  </p>

                              </td>
                              
                              <td>
                              <p> {!! $val->shortDescription !!}  </p>
                              </td>
                              <td>
                              <p> {!! $val->longDescription !!}  </p>
                              

                              </td>
                              
                              
                              <td class="sorting_1">
                                                        <div class="form-check form-switch id="load">
                                                            <input class="form-check-input toggle-class" type="checkbox"
                                                                data-id="{{ $val->id }}" name="featured_status"
                                                                data-isprm="1" data-onstyle="success"
                                                                data-offstyle="danger" data-toggle="toggle"
                                                                data-on="Active" data-off="InActive"
                                                                {{ $val->status ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault"></label>
                                                        </div>
                                                    </td>
                          
                              <td>
                              <a class="btn btn-danger shadow btn-xs sharp delete-btn" data-id="{{ $val->id }}">
                                                   <i class="fa fa-trash"></i>
                                                 </a>
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
   <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

   <!--************
         Main wrapper end
         *************-->
         <?php
        include "admin/plugin/plugin_js.php";
         ?>
</body>

<script>
  $(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
        $.ajax({
            type: "post",
            dataType: "json",
            url: '/admin/thirukkuralstatus',
            data: {'status': status, 'id': id},
            success: function(response) {
               if(response.success){
                setTimeout(function() {
                    window.location.href ="/admin/slider_setting_list"
                     }, 3000);
                toastr.success(response.success,{timeout:45000});
               }else{
                toastr.error(response.error,{timeout:45000});
                setTimeout(function() {
                    window.location.href ="/admin/slider_setting_list"
                     }, 3000);
               }

            }
        });
    })
  })
</script>
<script>
    $(document).ready(function () {
        var deleteId;

        $('.delete-btn').on('click', function () {
            deleteId = $(this).data('id');
            $('#basicModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function () {
            $('#basicModal').modal('hide');
            $.ajax({
                url: '/admin/thirukkuraldelete',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'id': deleteId },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 2000 });
                        setTimeout(function () {
                            window.location.href = "/admin/slider_setting_list"
                        }, 3000);
                    } else {
                        toastr.error(response.error, { timeout: 2000 });
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
</html>
