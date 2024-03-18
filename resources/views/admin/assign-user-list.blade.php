
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
                                                                                    $reviewer = DB::table('reviewer')->find($val->reviewer_id);
                                                                                     @endphp 

                                                                                     @if( $reviewer !=null)
                                                                           <td><span>{{$reviewer->name}}</span></td>
                                                                           <td>
                                                                            @endif
                                                                                    {{$val->created_at->format('Y-m-d h:i A')}}
                                                                                    </td>
                                                                                    <td>
                                                                                   {{$val->review_type}}
                                                                                    </td>
                                                                                
                                                                                 @if($val->review_type != null)
                                                                                    <td class="py-2 "><span
                                                                                            class="badge badge-success badge-sm"> Complited<span
                                                                                                class="ms-1 fa fa-check"></span></span>
                                                                                    </td>
                                                                               
                                                                                @else
                                                                                <td class="py-2 "><span
                                                                                            class="badge badge-danger badge-sm"> Not Completed<span
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
                                                                       <td class="sorting_1">{{$loop->index 
                                                                           +1}} </td>
                                                                           @php
                                                                           $reviewer = DB::table('reviewer')->find($val->reviewer_id);
                                                                            @endphp 
@if( $reviewer !=null)
                                                                           <td><span>{{$reviewer->name}}</span></td>
                                                                           <td>
                                                                            @endif
                                                                           {{$val->created_at->format('Y-m-d h:i A')}}
                                                                           </td>
                                                                           <td>
                                                                          {{$val->review_type}}
                                                                           </td>
                                                                       
                                                                        @if($val->review_type != null)
                                                                           <td class="py-2 "><span
                                                                                   class="badge badge-success badge-sm"> Complited<span
                                                                                       class="ms-1 fa fa-check"></span></span>
                                                                           </td>
                                                                      
                                                                       @else
                                                                       <td class="py-2 "><span
                                                                                   class="badge badge-danger badge-sm"> Not Completed<span
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
                                                                           $reviewer = DB::table('reviewer')->find($val->reviewer_id);
                                                                            @endphp 

                                                                            @if( $reviewer !=null)
                                                                           <td><span>{{$reviewer->name}}</span></td>
                                                                           <td>
                                                                            @endif
                                                                           {{$val->created_at->format('Y-m-d h:i A')}}
                                                                           </td>
                                                                           <td>
                                                                          {{$val->review_type}}
                                                                           </td>
                                                                       
                                                                        @if($val->review_type != null)
                                                                           <td class="py-2 "><span
                                                                                   class="badge badge-success badge-sm"> Complited<span
                                                                                       class="ms-1 fa fa-check"></span></span>
                                                                           </td>
                                                                      
                                                                       @else
                                                                       <td class="py-2 "><span
                                                                                   class="badge badge-danger badge-sm"> Not Completed<span
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
       </section>
      <!--**********************************
        Main wrapper end
    ***********************************--> 
</div>
</div>
    <?php
        include "admin/plugin/plugin_js.php";
    ?>
  </body>
</html>