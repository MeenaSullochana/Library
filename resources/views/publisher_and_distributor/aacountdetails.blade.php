
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
      <title>Government of Tamil Nadu - Book Procurement</title>
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
      <link href="
      https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
      " rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
      <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
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
            @include ('publisher_and_distributor.navigation')
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
                     <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                           <b>Bank Account Details</b>
                        </h3>
                    
                     </div>
                  </div>
               </div>
               <div class="row bg-white p-2 rounded">
               <div class="col-xl-12">
                  <div class="card-body p-0">
                     <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                     
                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="pan_num" class="form-label">Pan Number</label>
                                        <input type="text" class="form-control" name="pan_num" id="pan_num"
                                            placeholder="Enter the Pan Number" value="{{$data->pan_num}}" required>
                                        <div class="invalid-feedback">Please Enter Pan Number</div>
                                    </div>
                               
                                    <div class="col-md-6 mb-3">
                                        <label for="acc_num" class="form-label">Bank Account Number</label>
                                        <input type="text" class="form-control" name="acc_num" id="acc_num"
                                            placeholder="Enter the Bank Account Number"  value="{{$data->acc_num}}" required>
                                        <div class="invalid-feedback">Please Enter Bank Account Number</div>
                                    </div>
                                </div>
                                <div class="row">
                                
        
                                    <div class="col-md-6 mb-3">
                                        <label for="pan_num" class="form-label">IFSC Code</label>
                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc_code"
                                            placeholder="Enter the IFSC Code" value="{{$data->ifsc_code}}" required>
                                        <div class="invalid-feedback">Please Enter IFSC Code</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name"
                                            placeholder="Enter the Bank Name" value="{{$data->bank_name}}" required>
                                        <div class="invalid-feedback">Please Enter Bank Name</div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="branch" class="form-label">Branch</label>
                                        <input type="text" class="form-control" name="branch" id="branch"
                                            placeholder="Enter the Branch" value="{{$data->branch}}" required>
                                        <div class="invalid-feedback">Please Enter Branch</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="acc_type" class="form-label">Account Type</label>
                                        <input type="text" class="form-control" name="acc_type" id="acc_type"
                                            placeholder="Enter the Account Type" value="{{$data->acc_type}}" required>
                                        <div class="invalid-feedback">Please Enter Account Type</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="acc_hol_name" class="form-label">Account Holder Name</label>
                                        <input type="text" class="form-control" name="acc_hol_name" id="acc_hol_name"
                                            placeholder="Enter the Holder Name" value="{{$data->acc_hol_name}}" required>
                                        <div class="invalid-feedback">Please Enter Account Holder Name</div>
                                    </div>
                                </div>
        
                              
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button> -->
                                    <button type="submit" id="submitButton" name="submit" class="btn btn-primary">Update</button>
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
            @include ("publisher_and_distributor.footer")
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
         include "publisher_and_distributor/plugin/plugin_js.php";
     ?>
 
   </body>
</html>

<script>
    $(document).on('click', '#submitButton', function(e) {
        e.preventDefault();
        
        // Basic validation
        if($.trim($('#pan_num').val()) === ''){
            toastr.error("PAN Number field is required");
        } else if($.trim($('#acc_num').val()) === '') {
            toastr.error("Account Number field is required");
        } else if($.trim($('#ifsc_code').val()) === '') {
            toastr.error("IFSC Code field is required");
        } else if($.trim($('#bank_name').val()) === '') {
            toastr.error("Bank Name field is required");
        } else if($.trim($('#branch').val()) === '') {
            toastr.error("Branch field is required");
        } else if($.trim($('#acc_type').val()) === '') {
            toastr.error("Account Type field is required");
        } else if($.trim($('#acc_hol_name').val()) === '') {
            toastr.error("Account Holder Name field is required");
        } else {
            // Gather data
            var data = {
                'pan_num': $('#pan_num').val(),
                'acc_num': $('#acc_num').val(),
                'ifsc_code': $('#ifsc_code').val(),
                'bank_name': $('#bank_name').val(),
                'branch': $('#branch').val(),
                'acc_type': $('#acc_type').val(),
                'acc_hol_name': $('#acc_hol_name').val(),
            };

            // Optional: Show loader
            $('#submitButton').prop('disabled', true); // Disable button to prevent multiple submits
            $('#loader').show(); // Assuming you have a loader with id 'loader'

            // Set up CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Make AJAX request
            $.ajax({
                type: "post",
                url: "/publisher_and_distributor/accountdetails", // Update with your actual route
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success, { timeout: 25000 });

                    
                    } else {
                        toastr.error(response.error, { timeout: 25000 });
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error("An error occurred. Please try again.", { timeout: 25000 });
                },
                complete: function() {
                    // Re-enable button and hide loader
                    $('#submitButton').prop('disabled', false);
                    $('#loader').hide();
                }
            });
        }
    });
</script>
<style>
   table {
   border: 1px solid #ccc;
   border-collapse: collapse;
   margin: 0;
   padding: 0;
   width: 100%;
   table-layout: fixed;
   }
   table caption {
   font-size: 1.5em;
   margin: .5em 0 .75em;
   }
   table tr {
   background-color: #f8f8f8;
   border: 1px solid #ddd;
   padding: .35em;
   }
   table th,
   table td {
   padding: .625em;
   text-align: center;
   }
   table th {
   font-size: .85em;
   letter-spacing: .1em;
   text-transform: uppercase;
   }
   @media screen and (max-width: 600px) {
   table {
   border: 0;
   }
   table caption {
   font-size: 1.3em;
   }
   table thead {
   border: none;
   clip: rect(0 0 0 0);
   height: 1px;
   margin: -1px;
   overflow: hidden;
   padding: 0;
   position: absolute;
   width: 1px;
   }
   .form-check.mt-p00.form-switch {
   display: flex;
   justify-content: flex-end;
   }
   table tr {
   border-bottom: 3px solid #ddd;
   display: block;
   margin-bottom: .625em;
   }
   table td {
   border-bottom: 1px solid #ddd;
   display: block;
   font-size: .8em;
   text-align: right;
   }
   table td::before {
   /*
   * aria-label has no advantage, it won't be read inside a table
   content: attr(aria-label);
   */
   content: attr(data-label);
   float: left;
   font-weight: bold;
   text-transform: uppercase;
   }
   table td:last-child {
   border-bottom: 0;
   }
   .d-flex.mt-p0 {
   display: flex;
   justify-content: flex-end;
   }
   }
   /* general styling */
   body {
   font-family: "Open Sans", sans-serif;
   line-height: 1.25;
   }
   .active-projects.style-1 .dt-buttons .dt-button {
    top: -50px;
    right: 0 !important;
}

.active-projects tbody tr td:last-child {
        text-align: center;
    }
</style>
