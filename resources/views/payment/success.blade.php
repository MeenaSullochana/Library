<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html oncontextmenu="return false;">
   <head>
      <title>Sale API</title>
      <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="DexignZone">
      <meta name="robots" content="index, follow">
      <!-- MOBILE SPECIFIC -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/favicon.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href=" {{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
      <link class="main-css" href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
      <style>
         .payment_option {
         display: flex;
         justify-content: space-between;
         padding: 20px;
         }
         /* Extra small devices (phones, 600px and down) */
         @media only screen and (max-width: 600px) {
         .payment_option {
         display: flex;
         justify-content: space-between;
         padding: 20px;
         flex-direction: column-reverse;
         }
         }
         /* Small devices (portrait tablets and large phones, 600px and up) */
         @media only screen and (min-width: 600px) {}
      </style>
   </head>
   <body
      style="background-image:url('https://cardinsider.com/wp-content/uploads/2021/08/IDBI.jpg'); background-position:center;">
      <!--*******************
         Preloader start
         ********************-->
      <div id="preloader">
         <div class="text-center">
            <img src="{{ asset('assets/img/goverment_loader.gif') }}" alt="" width="25%">
         </div>
      </div>
      <!--*******************
         Preloader end
         ********************-->
      <div class="authincation fix-wrapper">
         <div class="container h-100 mt-3">
            <div class="row justify-content-center h-100 align-items-center">
               <div class="col-md-12">
                  <div class="authincation-content">
                     <div class="row no-gutters">
                        <div class="col-xl-12">
                           <div class="row">
                              <div class="col-md-10 text-left ps-5">
                                 <img class="p-3" style="width: 150px;height:auto;"
                                    src="{{ asset('assets\img\logo\idbi_logo.png') }}" alt=""
                                    srcset=""><br>
                                 <small>Secure Payment gateway System</small>
                              </div>
                              <div class="col-md-2 p-3 text-center">
                                 <i class="fa fa-print p-2"></i>
                                 <i class="fa fa-download p-2"></i>
                                 <a href="/"><i class="fa fa-home p-2"></i></a>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="form-validation">
                                 <form class="needs-validation" novalidate="" action="/process-sale"
                                    method="post" accept-charset="ISO-8859-1">
                                    @csrf
                                    <div class="row p-5">
                                       <div class="col-12 text-center">
                                          <img src="https://fcs3pub.s3.amazonaws.com/photo-book/images/payment/success.gif" alt="" srcset="" style="width:50px">
                                          <h2 class="fw-bold">Payment Successs</h2>
                                          <p>Your Transaction ID for Order<b> 3434 </b> is <b>240893839058</b>.<br>Your payment is not processed. Invalid bankid and itemcode combination</p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-xl-6">
                                          <div class="row">
                                             <label class="col-lg-4 col-form-label required" for="validationCustom01">Amount: </label>
                                             <div class="col-lg-6">
                                                	<p>2300</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom02">BankId:<span
                                                class="text-danger"> *</span>
                                             </label>
                                             <div class="col-lg-6">
                                               <p>	000004</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required p-0 m-0"
                                                for="validationCustom03">Currency:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>	356</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required p-0 m-0"
                                                for="validationCustom03">MerchantId:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>	101000000000781</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required p-0 m-0"
                                                for="validationCustom03">Message:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>Invalid bankid and itemcode combination</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">PassCode:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>SVPL4257</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">PaymentOption:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>wt</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xl-6">
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">ResponseCode:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>TRAVE0003</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">TerminalId:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>10100781</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">TxnRefNo:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>3434</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">payOpt:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>wt</p>
                                             </div>
                                          </div>
                                          <div class="row p-0 m-0">
                                             <label class="col-lg-4 col-form-label required"
                                                for="validationCustom03">pgTxnId:<span
                                                class="text-danger"> *</span></label>
                                             <div class="col-lg-6">
                                                <p>240893839058</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--**********************************
         Scripts
         ***********************************-->
      <!-- Required vendors -->
      <script src="{{ asset('vendor/global/global.min.js') }}"></script>
      <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }} "></script>
      <script src="{{ asset('admin/js/deznav-init.js') }}"></script>
      <script src="{{ asset('admin/js/custom.js') }}"></script>
      {{-- <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script> --}}
      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script type="text/javascript">
         document.onkeydown = function(e) {
             if (event.keyCode == 123) {
                 return false;
             }
             if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                 alert('Sorry, you cant do this For Some Security Reasons 💔')
                 return false;
             }
             if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                 alert('Sorry, you cant do this For Some Security Reasons 💔')
                 return false;
             }
             if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                 alert('Sorry, you cant do this For Some Security Reasons💔')
                 return false;
             }
             if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                 alert('Sorry, you cant do this For Some Security Reasons 💔')
                 return false;
             }
         }
         
         function checkDeveloperTools() {
             // Start a timer
             const start = performance.now();
         
             // Perform some complex operation or execute a script
             // For example, you can create a loop that runs for a certain duration
             for (let i = 0; i < 1000000; i++) {
                 // Do something that takes time
             }
         
             // End the timer
             const end = performance.now();
         
             // Calculate the time taken for the operation
             const duration = end - start;
         
             // Check if the time taken exceeds a threshold
             // Adjust the threshold based on your application's needs
             if (duration > 100) {
                 // This might indicate that developer tools are open
                 console.log("Developer tools might be open");
             } else {
                 // Developer tools are likely closed
                 console.log("Developer tools are closed");
             }
         }
         
         // Call the function periodically to check
         setInterval(checkDeveloperTools, 1000); // Check every second
      </script>
   </body>
</html>