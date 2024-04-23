
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
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
               <div class="row p-3 bg-white rounded-2 mb-3">
                  <div class="col-md-12 d-flex justify-content-between">
                     <div class="item">
                        <h3>Create Announcement</h3>
                     </div>
                     <div class="item">
                       <a href="index.php"> <button type="button" class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"></i> Back</button></a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card mb-0 h-auto">
                        <div class="card-body py-0">
                           <div class="row gx-0">
                              <!-- column -->
                              <div class="col-xl-2 col-xxl-3 col-lg-3">
                                 <div class="email-left-box dz-scroll pt-3 ps-0" id="email-left">
                                    <div class="mail-list rounded ">
                                       <a  class="list-group-item active">
                                       <i class="fa-regular fa-envelope align-middle"></i>Create Announcement </a>
                                       <a href="/admin/anouncemenlist" class="list-group-item">
                                       <i class="fa-regular fa-paper-plane align-middle"></i>Announcement List</a>
                                    </div>
                                 </div>
                              </div>
                              <!-- /column -->
                              <div class="col-lg-9 col-xl-10 col-xxl-9">
                                 <div class="email-right-box ms-0 ">
                                    <div class="compose-wrapper mt-3 " id="compose-content">
                                       <div class="compose-content">
                                       <form id="email-form" enctype="multipart/form-data">
        <div class="form-group mt-4">
            <label class="form-label">To <span class="text-danger">*</span></label>
            <select class="form-control js-example-tokenizer" name="tag[]" multiple="multiple">
                <option value='subadmin'>Sub Admin</option>
                <option value='publisher'>Publisher</option>
                <option value='distributor'>Distributor</option>
                <option value='publisher_and_distributor'>Publisher Cum Distributor</option>
                <option value='reviewer'>Reviewer</option>
                <option value='librarian'>Librarian</option>
            </select>
        </div>
        <div class="separator">
            <div class="line"></div>
            <h2>Or</h2>
            <div class="line"></div>
        </div>
        <div class="mb-3">
            <textarea id="message" class="textarea_editor form-control bg-transparent" name="message" rows="5" placeholder="Enter message ..."></textarea>
        </div>
        <h5 class="my-3"><i class="fa fa-paperclip me-2"></i> Attachment</h5>
        <input type="file" name="attachment" class="form-control" id="attachment">
        <div class="text-start mt-4 mb-3">
            <button class="btn btn-primary btn-sl-sm me-2" id="submitbutton" type="button"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });
    </script>

<script>
        $(document).ready(function(){
            $("#submitbutton").click(function(){
                var formData = new FormData($("#email-form")[0]);
                $.ajax({
                    url: "/admin/announcementsend",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                     if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    setTimeout(function () {
                        window.location.href = "/admin/anoncement"
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 2000 });
                }
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
   </body>
   <style>
      .email-left-box {
      height: calc(58vh - 160px);
      }
      .separator{
      display:flex;
      align-items: center;
      }
      .separator .line{
      height: 3px;
      flex: 1;
      background-color: #000;
      }
      .separator h2{
      padding: 0 2rem;
      }
   </style>
</html>
