
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
   <title>Government of Tamil Nadu - Book Procurement - Payment List</title>
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
                                   <b>Master Book Data</b>
                               </h3>
                               <a class="btn btn-primary  btn-sm" href="javascript:history.back()">
                                   <i class="fas fa-chevron-left"></i> Back </a>
                           </div>
                       </div>
                   </div>
                   
                   <div class="card">
                       <div class="card-body">
                           <div class="row mb-4 d-flex">
                      

                            
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select language</label>
                                <select name="language_filter" id="language_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Record</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Subject</label>
                                <select name="subject_filter" id="subject_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Subject</option>
                                    @php
                                    $subject = DB::table('book_subject')->where('type','Tamil')->get();
                                    $subject1 = DB::table('book_subject')->where('type','English')->get();

                                    @endphp
                                    @foreach($subject as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                    @foreach($subject1 as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Category</label>
                                <select name="category_filter" id="category_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Category</option>
                                    @php
                                    $categori = DB::table('special_categories')->orderBy('created_at','ASC')->get();
                                    @endphp
                                    @foreach($categori as $val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Payment</label>
                                <select name="Payment_filter" id="Payment_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Payment</option>
                                  
                                
                                    <option value="Success">Success</option>
                                    <option value="No Payment">No Payment</option>

                                    

                                </select>
                            </div>
                            <div class="col-xl-3  col-sm-6 mb-3 mb-xl-0">
                                <label class="form-label">Select Meta checking</label>
                                <select name="Metachecking_filter" id="Metachecking_filter"
                                    class="form-select bg-white p-2 border border-1 mb-3">
                                    <option value="">All Meta checking</option>
                                  
                                
                                    <option value="Success">Success</option>
                                    <option value="Reject">Reject</option>
                                    <option value="Returned To User Correction">Returned To User Correction</option>
                                    <option value="Book Update To Return">Book Update To Return</option>
                                    <option value="No Review">No Review</option>

   


  

                                </select>
                            </div>
                          
                               <!-- <div class="col-xl-9 col-sm-6 mt-4 text-end">
                                  <a href="pdf-book-order.php"> <button type="button" class="btn btn-primary"><span class="btn-icon-start text-primary"><i class='fas fa-file-pdf'></i>
                                       </span>PDF</button></a>
                                   <button type="button" class="btn  btn-info"><span class="btn-icon-start text-info"><i class='fas fa-file-excel'></i>
                                       </span>Excel</button>
                                       <a href="pdf-book-order.php"><button type="button" class="btn  btn-warning"><span class="btn-icon-start text-warning"><i class="fa fa-download color-warning"></i>
                                       </span>Download</button></a>
   
   
                               </div> -->
                           </div>
   
                           <div class="table-responsive">
                               <table id="user-tbl" class="table shorting dataTable no-footer" role="grid" aria-describedby="user-tbl_info">
                                   <thead>
                                       <tr role="row">
                                           <th class="sorting_desc" tabindex="0" aria-controls="user-tbl" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 0px;" aria-sort="descending">
                                               <div class="form-check custom-checkbox ms-0">
                                                   <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                   <label class="form-check-label" for="checkAll"></label>
                                               </div>
                                           </th>
                                           <th>S No</th>
                                           <th>Book ID</th>
                                           <th>Book Title</th>
                                           <th>Book ISBN</th>
                                           <th>Language of the Book</th>
                                           <th>Author Details</th>
                                            <th>Edition Number</th>
                                           <th>Name of Publisher</th>
                                           <th>Year of Publication</th>
                                           <th>Place of Publication</th>
                                           <th>Subject</th>
                                           <th>Category</th>
                                           <th>Binding</th>
                                           <th>Size </th>
                                           <th>Length x Breadth(in Centimeters) </th>
                                           <th>Width(in Centimeters) </th>
                                           <th>Weight(in grams)</th>
                                           <th>GSM (Number)</th>
                                           <th>Type of Paper</th>
                                           <th>Paper Finishing</th>

                                           <th>Total Number of Pages</th>
                                           <th>Number of Multicolor Pages</th>
                                           <th>Number of Mono Color Pages</th>
                                           <th>Currency Type</th>
                                           <th>Price</th>
                                           <th>Discount Offer(%)</th>
                                           <th>Discounted Price</th>
                                           
                                           <th>Payment Status </th>
                                           <th>Meta checking Status </th>
                                           <th>Meta checker Name</th>
                                           <th>Book View</th>
                                           <th>User View</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                  @foreach($data as $val)
   
                                       <tr role="row" class="odd">
                                           <td class="sorting_1">
                                               <div class="form-check custom-checkbox">
                                                   <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                                   <label class="form-check-label" for="customCheckBox3"></label>
                                               </div>
                                           </td>
                                           <td><span>{{$loop->index + 1}}</span></td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <h6>{{$val->product_code}}</h6>
                                                      
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <!-- <h6>#40597</h6> -->
                                                       <span>{{$val->book_title}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <!-- <h6>#40597</h6> -->
                                                       <span>{{$val->isbn}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->language}}</span>
                                                   </div>
                                               </div>
                                           </td>
   
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->author_name}}</span>
                                                   </div>
                                               </div>
                                           </td>

                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->edition_number}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->nameOfPublisher}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->yearOfPublication}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->place}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->subject}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->category}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->type}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->size}}</span>
                                                   </div>
                                               </div>
                                           </td>



                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->length  *  $val->breadth}}</span>
                                                   </div>
                                               </div>
                                           </td>


                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->width}}</span>
                                                   </div>
                                               </div>
                                           </td>

                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->weight}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->gsm}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->quality}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->paper_finishing}}</span>
                                                   </div>
                                               </div>
                                           </td>



                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->pages}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->multicolor}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->monocolor}}</span>
                                                   </div>
                                               </div>
                                           </td>


                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->currency_type}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->price}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->discount}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                           <td>
                                               <div class="products">
                                                   <div>
                                                       <span>{{$val->discountedprice}}</span>
                                                   </div>
                                               </div>
                                           </td>
                                       


                                           <td>

                                           <div class="products">
                                                   <div>
                                                       <span>{{$val->paystatus}}</span>
                                                   </div>
                                               </div>
                                               <!-- <div class="dropdown bootstrap-select default-select status-select">
                                                   <select class="default-select status-select">
                                                       <option value="complete">Complete</option>
                                                       <option value="pending">Pending</option>
                                                       <option value="testing">Testing</option>
                                                       <option value="progress">In Progress</option>
                                                   </select>
                                                   <div class="dropdown-menu ">
                                                       <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1">
                                                           <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                       </div>
                                                   </div>
                                               </div> -->
                                           </td>
                                           <td class="text-center">
                                           <div>
                                                       <span>{{$val->revstatus}}</span>
                                                   </div>
                                               </div>
                                               <!-- <div class="dropdown bootstrap-select default-select status-select">
                                                   <select class="default-select status-select">
                                                       <option value="pending">Pending</option>
                                                       <option value="complete">Complete</option>
                                                       <option value="progress">Progress</option>
                                                   </select>
                                                   <div class="dropdown-menu ">
                                                       <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                                           <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                       </div>
                                                   </div>
                                               </div> -->
                                           </td>
                                           <td>

                                           <div>
                                                       <span>{{$val->reviewername}}</span>
                                                   </div>
                                               </div>
                                               <!-- <div class="dropdown bootstrap-select default-select status-select">
                                                   <select class="default-select status-select">
                                                       <option value="complete">Complete</option>
                                                       <option value="pending">Pending</option>
                                                       <option value="testing">Testing</option>
                                                       <option value="progress">In Progress</option>
                                                   </select>
                                                   <div class="dropdown-menu ">
                                                       <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1">
                                                           <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                       </div>
                                                   </div>
                                               </div> -->
                                           </td>
                                           <td>
                                               <div class="d-flex">
                                               <a href="/admin/book_manage_view/{{$val->id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                             <i class="fa fa-eye"></i>
                                             </a>
                                               </div>
                                           </td>

                                           <td data-label="controlq">
                                            <div class="d-flex mt-p0">
                                          
                                                 @if($val->user_type === "publisher")
                                                 <a href="/admin/pub_profile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @elseif($val->user_type === "distributor")
                                                 <a href="/admin/dist_profile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @else
                                                    <a href="/admin/publisherdisprofile/{{$val->user_id}}" class="btn btn-success shadow btn-xs sharp me-1">
                                                        <i class="fa fa-user"></i>
                                                 </a>
                                                 @endif
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
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#user-tbl').DataTable();
    // Function to handle category filter
    function filtersubject(subject) {
        if (subject === "") {
            table.column(11).search("").draw();
        } else {
            table.column(11).search(subject).draw();
        }
    }

    // Call filtesubject function on change event of the select element
    $('#subject_filter').on('change', function() {
        var subject = $(this).val();
        filtersubject(subject);
    });



    function filterPayment(Payment) {
        if (Payment === "") {
            table.column(28).search("").draw();
        } else {
            table.column(28).search(Payment).draw();
        }
    }

    // Call filtePayment function on change event of the select element
    $('#Payment_filter').on('change', function() {
        var Payment = $(this).val();
        filterPayment(Payment);
    });

    
    
    function filterMetachecking(Metachecking) {
        if (Metachecking === "") {
            table.column(29).search("").draw();
        } else {
            table.column(29).search(Metachecking).draw();
        }
    }

    // Call filteMetachecking function on change event of the select element
    $('#Metachecking_filter').on('change', function() {
        var Metachecking = $(this).val();
        filterMetachecking(Metachecking);
    });
    // Function to handle category filter
    function filterCategory(category) {
        if (category === "") {
            table.column(12).search("").draw();
        } else {
            table.column(12).search(category).draw();
        }
    }

    // Call filterCategory function on change event of the select element
    $('#category_filter').on('change', function() {
        var category = $(this).val();
        filterCategory(category);
    });

    // Function to handle language filter
    function filterLanguage(language) {
        if (language === "") {
            // If language filter is empty, reset table to show all records
            table.column(5).search(language).draw();
        } else {
            // Apply language filter (assuming Language is in column index 2)
            table.column(5).search(language).draw();
        }
    }

    // Call filterLanguage function on change event of the language filter
    $('#language_filter').on('change', function() {
        var language = $(this).val();
        filterLanguage(language);
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
   table.dataTable thead th {
    text-transform: math-auto !important;
}
</style>
