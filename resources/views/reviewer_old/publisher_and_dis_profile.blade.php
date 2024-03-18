
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="noindex, nofollow" />
      <!-- PAGE TITLE HERE -->
      <title>Government of Tamil Nadu - Book Procurement</title>

      <!-- FAVICONS ICON -->
      <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
      <?php
         include "plugin/plugin_css.php";
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
         <?php
            include "navigation.php";
            ?>
         <!--**********************************
            Sidebar end
            ***********************************-->
         <!--**********************************
            Content body start
            ***********************************-->
         <div class="content-body">
            <div class="container-fluid">
               <!-- row -->
               <div class="row">
                  <div class="col-lg-12">
                     <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                           <div class="photo-content">
                              <div class="cover-photo rounded"></div>
                           </div>
                           <div class="profile-info">
                              <div class="profile-photo">
                                 <img src="images/banner/book-fair2.png" class="img-fluid rounded-circle" alt="">
                              </div>
                              <div class="profile-details">
                                 <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">monisha</h4>
                                    <p>Publisher and Distributor</p>
                                 </div>
                                 <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">nisha25@gmail.com</h4>
                                    <p>Email</p>
                                    <?php
                                        //   echo "<pre>";
                                        //   print_r($userProfileData);
                                        //   echo "</pre>";
                                          ?>
                                 </div>
                                 <div class="dropdown ms-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true">
                                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24"></rect>
                                             <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                             <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                             <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                          </g>
                                       </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                       <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                       <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to close friends</li>
                                       <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                       <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-4">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="profile-interest">
                                    <h5 class="text-primary d-inline">Proof Links</h5>
                                    <div class="row mt-4 sp4" id="lightgallery">
                                       <p>Publication Proof</p>
                                       <a href="../upload/publisher_and_distributor/<?php echo $userProfileData['publication_proof']?>" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                       <img src="../upload/publisher_and_distributor/<?php echo $userProfileData['publication_proof']?>" alt="" class="px-1 py-1 img-fluid rounded">
                                       </a>
                                       <a href="../upload/publisher_and_distributor/<?php echo $userProfileData['latest_book_categories']?>" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                       <img src="../upload/publisher_and_distributor/<?php echo $userProfileData['latest_book_categories']?>" alt="" class="px-1 py-1 img-fluid rounded">
                                       </a>
                                       <a href="../upload/publisher_and_distributor/<?php echo $userProfileData['latest_book_categories']?>" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6" download="true">
                                       <img src="../upload/publisher_and_distributor/<?php echo $userProfileData['latest_book_categories']?>" alt="" class="px-1 py-1 img-fluid rounded">
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="profile-interest">
                                    <h5 class="text-primary d-inline">Selected District</h5><br>

                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Chennai</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-8">
                     <div class="card h-auto">
                        <div class="card-body">
                           <div class="profile-tab">
                              <div class="custom-tab-1">
                                 <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#info" data-bs-toggle="tab" class="nav-link">User Details</a>
                                    </li>
                                    <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab" class="nav-link active show">User Other Details</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div id="info" class="tab-pane fade">
                                       <div class="profile-personal-info">
                                          <h4 class="text-primary mb-4 pt-4 border-bottom-1 pb-3">Publisher Information</h4>

                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Publication Name <span class="pull-end">:</span>
                                                </h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Selva</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">First Name <span class="pull-end">:</span>
                                                </h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>T</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Last Name <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Selva</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email ID <span class="pull-end">:</span>
                                                </h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>info@gmail.com</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Contact Number <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>9988776655</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Vadapalani Chennai</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">City <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Vadapalani</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">State <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Tamil Nadu</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Pin Code <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>600 002.</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Country<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>India</span>
                                             </div>
                                          </div>
                                          <h4 class="text-primary mb-4">Contact Person Information</h4>
                                          <hr>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500"> Name<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Selva</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email ID<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>info@gmail.com</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Contact Number<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>9988776655</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Vadapalani Chennai</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">City<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>Vadapalani</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Pin Code<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>600 002</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Country<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span>India</span>
                                             </div>
                                          </div>
                                          <h4 class="text-primary mb-4">Publications Other Info</h4>
                                          <hr>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Year of Establishment<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span>1999</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Number of Books Published So For<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span>433</span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Number of Books Published Latest Year<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span>43</span>
                                             </div>
                                          </div>
										   <h4 class="text-primary mb-4">Subsidiary Publications</h4>
                                       <hr>
                                       <table id="example5" class="display table" style="min-width: 845px">
                                          <thead>
                                             <tr>
                                                <th>Subsidiary Name</th>
                                                <th>Subsidiary No</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>test</td>
                                                <td>test</td>
                                             </tr>
                                          </tbody>
                                       </table>

                                       </div>
                                    </div>
                                    <div id="other_Info" class="tab-pane fade active show">
                                       <div class="profile-about-me">
                                          <div class="pt-4 border-bottom-1 pb-3">
                                             <h4 class="text-primary">Member In Publisher's Association</h4>
                                             <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                   <h5 class="f-w-500">Papasi Id<span class="pull-end">:</span>
                                                   </h5>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>BAPASI1234888</span>
                                                </div>
                                             </div>
                                             <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                   <h5 class="f-w-500">Tamil Pathiputhurai Id<span class="pull-end">:</span>
                                                   </h5>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>TAMIL15444</span>
                                                </div>
                                             </div>
                                             <div class="row mb-2">
                                                <p>Other ID</p>
                                                <div class="col-sm-6 col-5">
                                                   <h5 class="f-w-500">Titles In Your Publications:<span class="pull-end">:</span>
                                                   </h5>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>Author</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="profile-skills mb-5">
                                          <h4 class="text-primary mb-2">Primary Language of Publication</h4>

                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Tamil</a>
                                       </div>
                                       <div class="profile-skills mb-5">
                                          <h4 class="text-primary mb-2">Specialized Category Books</h4>

                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Other</a>
                                       </div>
                                       <div class="profile-lang  mb-5">
                                          <h4 class="text-primary mb-2">Category of books published</h4>
                                          <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i>Academic</a>
                                       </div>
                                       <h4 class="text-primary mb-4">Best Titles Publications</h4>
                                       <hr>
                                       <table id="example4" class="display table" style="min-width: 845px">
                                          <thead>
                                             <tr>
                                                <th>Book Title</th>
                                                <th>Book Author</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Titles In Your Publications</td>
                                                <td>Author</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Modal -->
                           <div class="modal fade" id="replyModal">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">Post Reply</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                       <form>
                                          <textarea class="form-control h-50" rows="4">Message</textarea>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="profile card">
                        <div class="card-header">
                           <h4 class="text-primary">Best Translated Books</h4>
                        </div>
                        <div class="card-body">
                           <table id="example3" class="display table" style="min-width: 845px">
                              <thead>
                                 <tr>
                                    <th>Book Title</th>
                                    <th>Book Author</th>
                                    <th>Book Lang From</th>
                                    <th>Book To From</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Translated Book</td>
                                    <td>Translated Book</td>
                                    <td>English</td>
                                    <td>Tamil</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="profile card">
                        <div class="card-header">
                           <h4 class="text-primary">Name of Publisher's In Your Distribution</h4>
                        </div>
                        <div class="card-body">
                           <table id="example3" class="display table" style="min-width: 845px">
                              <thead>
                                 <tr>
                                    <th>Publisher Name</th>
                                    <th>Publisher Place</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Titles In Your Publications</td>
                                    <td>Author</td>
                                 </tr>
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
         <?php
            include "footer.php";
            ?>
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
         include "plugin/plugin_js.php";
         include 'error/error_handle.php';
         ?>
   </body>
</html>
