<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php include 'admin/plugin/plugin_css.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
                                <b>Librarian Cancel order</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                <i class="fas fa-chevron-left"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item card">
                        <!-- <h2 class="accordion-header p-0 m-0 bg-white" id="headingOne">
                            <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="cpa">
									<i class="fa-sharp fa-solid fa-filter me-2"></i>Order Filter
								</div>
                            </button>
                        </h2> -->
                        <!-- <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">From Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label">To Date</label>
                                            <label class="sr-only">Date</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                                <input type="date" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                            <label class="form-label">User</label>
                                            <select name="" id="" class="form-select bg-white p-2 border border-1 mb-3">
                                                <option value="tamil">Publisher</option>
                                                <option value="English">Distributor</option>
                                                <option value="English">Publisher cum Distributor</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
											<label class="form-label">Frequency</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">monhly</option>
                                                <option value="English">Year</option>
                                            </select>
										</div>
										<div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
											<label class="form-label">languvage</label>
											<select name="" id="" class="form-select bg-white p-2 border border-1">
                                                <option value="tamil">Tamil</option>
                                                <option value="English">English</option>
                                            </select>
										</div>
                                    </div>
									<div class="row">
										
                                        <div class="col-xl-3 col-sm-6 align-self-end mt-2">
											<div>
												<button class="btn btn-primary me-2" title="Click here to Search" type="button"><i class="fa fa-filter me-1"></i>Filter</button>
												<button class="btn btn-danger light" title="Click here to remove filter" type="button">Remove Filter</button>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div> -->
                    </div>

                </div>
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                         <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <h6>Librarian Cancel order</h6>
                                    <!-- <button type="button" class="btn btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-plus"></i>
                                    </span>Add order</button> -->
                                </div>
                                <hr>
                                <div class="row mb-4 d-flex">
                               <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Library Types</label>
                                <select name="LibraryTypes_filter" id="LibraryTypes_filter" class="form-select bg-white p-2 border border-1 mb-3">
                                                <option value="">All Library Type</option>
                                                @php
                                             $categori = DB::table('library_types')->get();
                                             @endphp
                                             @foreach($categori as $val)
                                             <option value="{{$val->name}}">{{$val->name}}</option>
                                             @endforeach
                                            </select>
                               </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select District</label>
                                <select name="district_filter" id="district_filter" class="form-select bg-white p-2 border border-1 mb-3">
                                                <option value="">All District</option>
                                                @php
                                                                    $districts = DB::table('districts')->where('status', '=', 1)->get();
                                                                @endphp
                                             @foreach($districts as $val)
                                             <option value="{{$val->name}}">{{$val->name}}</option>
                                             @endforeach
                                            </select>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-6 mt-4 text-end">
                                
                            <a href="/admin/report_downl_order">
            <button class="btn btn-primary">
                <span><i class="fa-solid fa-file-excel"></i> Export Magazine Order</span>
            </button>
        </a>
                                    
                                        
                                        
                                    </div> -->
                             
                         </div>
                                <hr>
                                @php
                                  
                                      $records = DB::table('ordermagazines')
                                          ->where('status', '=', '2')
                                         ->orderBy('created_at', 'asc')
                                         ->get();
                                      
                                @endphp


                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl" id="example3">
                                        <thead>
                                            <tr>
                                         
                                                <th>S.No</th>
                                                <th>Library Id</th>
                                                <th>Library Type</th>
                                                <th>Library Name</th>

                                                <th>District</th>
                                                <th>Contack Number</th>
                                                <th>Order Id</th>
                                                <th>Qty</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Amount</th>
                                                <th>Order Status</th>
                                                <th>Order Date</th>
                                                <th>Readers Forum</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                       @foreach($records as $val)
                                       @php
                                  
                                  $librarians = DB::table('librarians')
                                       ->where('librarianId', '=', $val->libraryid)
                                     ->first();
                                        @endphp
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">{{$loop->index + 1}}</td>
                                                <td class="py-2">{{$val->libraryid}}</td>
                                                <td class="py-2">{{$val->libraryType}}</td>
                                                 <td class="py-2">{{ $librarians->libraryName ?? '' }}</td>
                                                <td class="py-2">{{ $librarians->district ?? '' }}</td>
                                                <td class="py-2">{{$librarians->phoneNumber}}</td>
                                                <td class="py-2">{{$val->orderid}}</td>
                                                <td class="py-2">{{$val->quantity}}</td>
                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalBudget}}</td>

                                                <td class="py-2"><i class="fa fa-rupee"></i> {{$val->totalPurchased}}</td>
                                                <td class="py-2"> <span class="badge bg-primary">Cancelled</span></td>
                                                <td class="py-2"> {{ \Carbon\Carbon::parse($val->created_at)->format('d-M-Y') }}</td>
                                                <td class="py-2"> 
                                                <button type="button" class="btn btn-primary" data-id="{{ asset('reviewer/readersForum/' . $val->readersForum) }}" data-bs-toggle="modal" data-bs-target="#modalId">VIew ReadersForum Report</button>

                                            </td>

                                                <td class="py-2 text-end">
                                                    <div class="dropdown"><button
                                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><span
                                                                class="fs--1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24"
                                                                            height="24"></rect>
                                                                        <circle fill="#000000" cx="5"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12"
                                                                            cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="19"
                                                                            cy="12" r="2"></circle>
                                                                    </g>
                                                                </svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                                            style="">
                                                            <div class="py-2">
                                                                <a class="dropdown-item" href="/admin/magazine_order_view/{{$val->id}}"><i class="fa fa-eye p-2"></i>View Order</a>
                                                                <a class="dropdown-item" href="/admin/magazine_invoice_view/{{$val->id}}"><i class="fa fa-pencil p-2"></i> View Order Invoice</a>
                                                                <!-- <a class="dropdown-item text-danger delete-status" data-id="{{$val->id}}" ><i class="fa fa-trash p-2"></i>Delete</a></div> -->
                                                        </div>
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
    </div>
    <!--************
                Content body end
            *************-->
    <!--************
                Footer start
            *************-->
    @include ('admin.footer')
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

    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-chevron-left"></i>Back to</button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
            <div class="modal-footer" style="display: flex; justify-content: space-between;">
                <div>
                    <a id="prev" href="#prev" class="arrow">Previous</a>
                    <a id="next" href="#next" class="arrow">Next</a>
                </div>
                <div>
                    <!-- Add any buttons you need in the footer -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-exclamation"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hiddenId">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="subdel" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>



    <!--************
            Main wrapper end
        *************-->
    <?php
    include 'admin/plugin/plugin_js.php';
    ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('#example3').on('click', '.delete-status', function() {
        var dataId = $(this).data('id');
        $('#hiddenId').val(dataId);
        $('#exampleModal').modal('show');
        console.log(dataId);
    });
});
</script>

<script>
    // Function to load content into the modal body
    function loadContent(content) {
        document.getElementById('modalBody').innerHTML = content;
    }

    // Function to load content based on data-id
    function loadFile(dataId) {
        // Extract file extension from the data-id attribute
        var fileExtension = dataId.split('.').pop().toLowerCase();

        // Load content based on file extension
        switch (fileExtension) {
            case 'pdf':
                loadContent('<embed src="' + dataId + '" type="application/pdf" width="100%" height="600px" />');
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                loadContent('<img src="' + dataId + '" alt="Image" style="max-width: 100%; max-height: 600px;">');
                break;
            case 'html':
                fetch(dataId)
                    .then(response => response.text())
                    .then(html => {
                        loadContent(html);
                    })
                    .catch(error => console.error('Error loading HTML:', error));
                break;
            // Add more cases for other file types if needed
            default:
                loadContent('<p>File type not supported</p>');
                break;
        }
    }

    // Listen for the modal show event
    $('#modalId').on('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract data-id attribute from the button
        var dataId = button.data('id');

        // Load content based on the data-id
        loadFile(dataId);
    });
</script>



<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#example3').DataTable();

    // Function to handle category filter
    function filterCategory(libraryType) {
        if (libraryType === "") {
            table.column(2).search("").draw();
        } else {
            table.column(2).search(libraryType).draw();
        }
    }

    // Call filterCategory function on change event of the select element
    $('#LibraryTypes_filter').on('change', function() {
        var libraryType = $(this).val();
        filterCategory(libraryType);
    });

    // Function to handle district filter
    function filterDistrict(district) {
        if (district === "") {
            table.column(4).search(district).draw();
        } else {
            table.column(4).search(district).draw();
        }
    }

    // Call filterDistrict function on change event of the select element
    $('#district_filter').on('change', function() {
        var district = $(this).val();
        filterDistrict(district);
    });
});
</script>

<script>
    $('#subdel').on('click', function () {
        var id = $('#hiddenId').val();
        $('#exampleModal').modal('hide');

        $.ajax({
                type: 'POST',
                url: '/admin/order_delete',
                data: { '_token': '{{ csrf_token() }}','id': id },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 2000 });
                        setTimeout(function() {
                            window.location.href = "/admin/magazine_order"
                        }, 3000);

                    } else {
                        toastr.error(response.error, { timeout: 2000 });
                    }
                },
                error: function(error) {
                    toastr.error('Error occurred', { timeout: 2000 });
                }
            });
        });
    
</script>

</body>


<!-- Modal -->
<style>
    .modal-confirm {
  color: #636363;
  width: 400px;
}
.modal-confirm .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
  text-align: center;
  font-size: 14px;
}
.modal-confirm .modal-header {
  border-bottom: none;
  position: relative;
}
.modal-confirm h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -10px;
}
.modal-confirm .close {
  position: absolute;
  top: -5px;
  right: -2px;
}
.modal-confirm .modal-body {
  color: #999;
}
.modal-confirm .modal-footer {
  border: none;
  text-align: center;
  border-radius: 5px;
  font-size: 13px;
  padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
  color: #999;
}
.modal-confirm .icon-box {
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border-radius: 50%;
  z-index: 9;
  text-align: center;
  border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
  color: #f15e5e;
  font-size: 46px;
  display: inline-block;
  margin-top: 13px;
}
.modal-confirm .btn {
  color: #fff;
  border-radius: 4px;
  background: #60c7c1;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  min-width: 120px;
  border: none;
  min-height: 40px;
  border-radius: 3px;
  margin: 0 5px;
  outline: none !important;
}
.modal-confirm .btn-info {
  background: #c1c1c1;
}
.modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
  background: #a8a8a8;
}
.modal-confirm .btn-danger {
  background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
  background: #ee3535;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}

</style>


</html>
