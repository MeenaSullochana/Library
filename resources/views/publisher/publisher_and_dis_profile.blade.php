
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
      <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
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
            @include ('publisher.navigation')
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
                                    <h4 class="text-primary mb-0"><?php echo $userProfileData['publication_name_or_distributor_name']?></h4>
                                    <p>Publisher and Distributor</p>
                                 </div>
                                 <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0"><?php echo $userProfileData['publication_email_id']?></h4>
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
                     <?php
                     if($userProfileData['checked_district'] != ''){
                        $selectDistrict = json_decode($userProfileData['checked_district']);
                        ?>
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="profile-interest">
                                    <h5 class="text-primary d-inline">Selected District</h5><br>
                                    <?php
                                    // print_r($selectDistrict);
                                    foreach($selectDistrict as $district){
                                       ?>
                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1"><?php echo $district;?></a>
                                       <?php

                                    }
                                    ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                     }
                     ?>
                  </div>
                  <div class="col-xl-8">
                     <div class="card h-auto">
                        <div class="card-body">
                           <div class="profile-tab">
                              <div class="custom-tab-1">
                                 <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#info" data-bs-toggle="tab" class="nav-link">Info</a>
                                    </li>
                                    <li class="nav-item"><a href="#other_Info" data-bs-toggle="tab" class="nav-link active show">Other Info</a>
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
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_name_or_distributor_name']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">First Name <span class="pull-end">:</span>
                                                </h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['pub_first_name']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Last Name <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['pub_last_name']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email ID <span class="pull-end">:</span>
                                                </h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_email_id']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Contact Number <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_no']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_no']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">City <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_city']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">State <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_state']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Pin Code <span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_pincode']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Country<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_country']?></span>
                                             </div>
                                          </div>
                                          <h4 class="text-primary mb-4">Contact Person Information</h4>
                                          <hr>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500"> Name<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_name']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email ID<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_person_email_id']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Contact Number<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_number']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Address<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_address']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">City<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_city']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Pin Code<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_pincode']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Country<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-9 col-7"><span><?php echo $userProfileData['publication_contact_person_country']?></span>
                                             </div>
                                          </div>
                                          <h4 class="text-primary mb-4">Publications Other Info</h4>
                                          <hr>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Year of Establishment<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span><?php echo $userProfileData['year_of_establishment']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Number of Books Published So For<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span><?php echo $userProfileData['number_of_books_published_so_for']?></span>
                                             </div>
                                          </div>
                                          <div class="row mb-2">
                                             <div class="col-sm-6 col-5">
                                                <h5 class="f-w-500">Number of Books Published Latest Year<span class="pull-end">:</span></h5>
                                             </div>
                                             <div class="col-sm-6 col-7"><span><?php echo $userProfileData['number_of_books_published_latest_year']?></span>
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
                                             <?php
                                                $subsciDetails=array();
                                                // print_r($userProfileData['publications_shope_book_title']);
                                                // print_r($userProfileData['publications_shope_book_author']);

                                                $subsciDetails['title'] = json_decode($userProfileData['subsidiary_no_publications_content']);
                                                $subsciDetails['content'] = json_decode($userProfileData['subsidiary_name_publications_content']);
                                                // echo "<pre>";
                                                // print_r($bookDetails);
                                                // echo "</pre>";

                                                foreach($subsciDetails['title'] as $i=>$subbook){
                                                	?>
                                             <tr>
                                                <td><?php echo $subsciDetails['title'][$i];?></td>
                                                <td><?php echo $subsciDetails['content'][$i];?></td>
                                             </tr>
                                             <?php
                                                }
                                                ?>
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
                                                <div class="col-sm-6 col-7"><span><?php echo $userProfileData['babsi_id']?></span>
                                                </div>
                                             </div>
                                             <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                   <h5 class="f-w-500">Tamil Pathiputhurai Id<span class="pull-end">:</span>
                                                   </h5>
                                                </div>
                                                <div class="col-sm-6 col-7"><span><?php echo $userProfileData['tamil_pathipu_thurai_id']?></span>
                                                </div>
                                             </div>
                                             <div class="row mb-2">
                                                <p>Other ID</p>
                                                <?php
                                                $poblication_details=array();
                                                // print_r($userProfileData['publications_shope_book_title']);
                                                // print_r($userProfileData['publications_shope_book_author']);

                                                $publication_details['publication_title'] = json_decode($userProfileData['publication_title']);
                                                $publication_details['publication_author'] = json_decode($userProfileData['publication_author']);
                                                // echo "<pre>";
                                                // print_r($bookDetails);
                                                // echo "</pre>";

                                                foreach($publication_details['publication_title'] as $key=>$publicationData){
                                                ?>
                                                <div class="col-sm-6 col-5">
                                                   <h5 class="f-w-500"><?php echo $publication_details['publication_title'][$key]?><span class="pull-end">:</span>
                                                   </h5>
                                                </div>
                                                <div class="col-sm-6 col-7"><span><?php echo $publication_details['publication_author'][$key]?></span>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="profile-skills mb-5">
                                          <h4 class="text-primary mb-2">Primary Language of Publication</h4>
                                          <?php
                                             $primary_language_of_publication = json_decode($userProfileData['primary_language_of_publication']);
                                             	if(!empty($primary_language_of_publication)){
                                             	foreach($primary_language_of_publication as $primary_book){
                                             		?>
                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1"><?php echo $primary_book;?></a>
                                          <?php
                                             }
                                             }else{
                                             echo "No Data";
                                             }
                                             ?>
                                       </div>
                                       <div class="profile-skills mb-5">
                                          <h4 class="text-primary mb-2">Specialized Category Books</h4>
                                          <?php
                                             $specialized_Category_Books = json_decode($userProfileData['specialized_category_books']);
                                             	if(!empty($specialized_Category_Books)){
                                             	foreach($specialized_Category_Books as $sp_book){
                                             		?>
                                          <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1"><?php echo $sp_book;?></a>
                                          <?php
                                             }
                                             }else{
                                             echo "No Data";
                                             }
                                             ?>
                                       </div>
                                       <div class="profile-lang  mb-5">
                                          <h4 class="text-primary mb-2">Category of books published</h4>
                                          <?php
                                             $category_of_books_published = json_decode($userProfileData['category_of_books_published']);
                                             	if(!empty($category_of_books_published)){
                                             	foreach($category_of_books_published as $j=>$pup_book){
                                             		?>
                                          <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i><?php echo $pup_book;?></a>
                                          <?php
                                             }
                                             }
                                             ?>
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
                                             <?php
                                                $bookDetails=array();
                                                // print_r($userProfileData['publications_shope_book_title']);
                                                // print_r($userProfileData['publications_shope_book_author']);

                                                $bookDetails['title'] = json_decode($userProfileData['publication_title']);
                                                $bookDetails['author'] = json_decode($userProfileData['publication_author']);
                                                // echo "<pre>";
                                                // print_r($bookDetails);
                                                // echo "</pre>";

                                                foreach($bookDetails['title'] as $i=>$book){
                                                	?>
                                             <tr>
                                                <td><?php echo $bookDetails['title'][$i];?></td>
                                                <td><?php echo $bookDetails['author'][$i];?></td>
                                             </tr>
                                             <?php
                                                }
                                                ?>
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
                                 <?php
                                    $trsbookDetails=array();
                                    // print_r($userProfileData['publications_shope_book_title']);
                                    // print_r($userProfileData['publications_shope_book_author']);

                                    $trsbookDetails['title'] = json_decode($userProfileData['trs_book_title']);
                                    $trsbookDetails['author'] = json_decode($userProfileData['trs_book_author']);
                                    $trsbookDetails['lan_one'] = json_decode($userProfileData['trans_from']);
                                    $trsbookDetails['lan_two'] = json_decode($userProfileData['trans_to']);
                                    // echo "<pre>";
                                    // print_r($bookDetails);
                                    // echo "</pre>";

                                    foreach($trsbookDetails['title'] as $i=>$book){
                                    	?>
                                 <tr>
                                    <td><?php echo $trsbookDetails['title'][$i];?></td>
                                    <td><?php echo $trsbookDetails['author'][$i];?></td>
                                    <td><?php echo $trsbookDetails['lan_one'][$i];?></td>
                                    <td><?php echo $trsbookDetails['lan_two'][$i];?></td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
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
                                 <?php
                                    $distributionDetails=array();
                                    // print_r($userProfileData['publications_shope_book_title']);
                                    // print_r($userProfileData['publications_shope_book_author']);

                                    $distributionDetails['publication_title'] = json_decode($userProfileData['publication_title']);
                                    $distributionDetails['publication_author'] = json_decode($userProfileData['publication_author']);
                                    // echo "<pre>";
                                    // print_r($bookDetails);
                                    // echo "</pre>";

                                    foreach($distributionDetails['publication_title'] as $i=>$detailsDistr){
                                    	?>
                                 <tr>
                                    <td><?php echo $distributionDetails['publication_title'][$i];?></td>
                                    <td><?php echo $distributionDetails['publication_author'][$i];?></td>
                                 </tr>
                                 <?php
                                    }
                                    ?>
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
            @include ("publisher.footer")
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
        include "publisher/plugin/plugin_js.php";
        ?>
   </body>
</html>
