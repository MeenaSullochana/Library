
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
          <div class="row">
            <!-- Column  -->
            <div class="col-xl-12">
              <div class="card dz-card">
                <div class="card-header flex-wrap border-0" id="default-tab">
                  <ul class="nav nav-tabs dzm-tabs" id="myTab" role="tablist">
                    <!-- <li class="nav-item" role="presentation"><button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#DefaultTab" type="button" role="tab" aria-controls="home" aria-selected="true">Preview</button></li><li class="nav-item" role="presentation"><button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#DefaultTab-html" type="button" role="tab">HTML</button></li> -->
                  </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body pt-0">
                      <div class="col-lg-12">
                        <div class="card dz-card" id="buttons-with-icon">
                          <div class="card-header flex-wrap d-flex justify-content-between border-0 ">
                            <div>
                              <h4 class="card-title">Control panel</h4>
                            </div>
                            <ul class="nav nav-tabs dzm-tabs" id="myTab-1" role="tablist">
                              <li class="nav-item" role="presentation">
                              <a href="book_section.php"><button
                                                class="nav-link active " type="button" role="tab" aria-controls="home"
                                                aria-selected="true">
                                                << Back</button></a>
                              </li>
                              <li class="nav-item" role="presentation">
                              <button class="nav-link " type="button"
                                            role="tab">Admin</button>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="Buttons-Icon" role="tabpanel" aria-labelledby="home-tab-1">
                              <div class="card-body pt-0">
                                <a href="book_section_add_new.php">
                                  <button type="button" class="btn btn-primary">
                                    <i class="fa-brands fa-plus me-2"></i>Add New </button>
                                </a>
                                <a href="book_section_print.php">
                                  <button type="button" class="btn btn-secondary">
                                    <i class="fa-solid fa-print me-2"></i>Print Preview </button>
                                </a>
                                <a href="#">
                                  <button type="button" class="btn btn-success">
                                    <i class="fa-solid fa-download me-2"></i> Save CSV </button>
                                </a>
                                <a href="#">
                                  <button type="button" class="btn btn-danger">
                                    <i class="fa-solid fa-filter me-2"></i>Filter </button>
                                </a>
                                <a href="#">
                                  <button type="button" class="btn btn-warning">
                                    <i class="fa-solid fa-times me-2"></i>Show All </button>
                                </a>
                              </div>
                            </div>
                            <div class="tab-pane fade " id="Buttons-Icon-html" role="tabpanel" aria-labelledby="home-tab">
                              <div class="card-body p-0 code-area"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /Column  -->
                      <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive active-projects task-table">
                                            <!-- <div class="tbl-caption">
                                                <h4 class="heading mb-0">Task</h4>
                                            </div> -->
                                            <table id="empoloyeestbl2" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                        <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </th>
                                                        <th> No</th>
                                                        <th>Language </th>
                                                        <th>Name  </th>
                                                        <th>Date of Receipt </th>
                                                        <th>Date Published</th>
                                                        <th>Pages </th>
                                                        <th>Price</th>
                                                        <th>Type</th>
                                                        <th>Publisher</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>1</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>English</h6>
                                                                    <span>INV-100023456</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>The Standard</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <!-- <td>
                                                            <select class="default-select status-select">
                                                                <option value="complete">Complete</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="testing">Testing</option>
                                                                <option value="progress">In Progress</option>
                                                            </select>
                                                        </td> -->
                                                        <td><span>02/24/2023</span></td>
                                                        <td>
                                                            <span>35</span>
                                                        </td>
                                                        <!-- <td>
                                                            <div class="avatar-list avatar-list-stacked">
                                                                <img src="images/contacts/pic666.jpg"
                                                                    class="avatar avatar-md rounded-circle" alt="">
                                                                <img src="images/contacts/pic555.jpg"
                                                                    class="avatar avatar-md rounded-circle" alt="">
                                                                <img src="images/contacts/pic666.jpg"
                                                                    class="avatar avatar-md rounded-circle" alt="">
                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <span
                                                                class="badge badge-primary light border-0 me-1">300,00</span>
                                                            <!-- <span
                                                                class="badge badge-secondary light border-0 ms-1">HTML</span> -->
                                                        </td>
                                                        <td>
                                                        <span>News</span>
                                                        </td>
                                                        <td><span>Standard Group Media</span></td>
                                                        <!-- <td class="text-end">
                                                            <select class="default-select status-select">
                                                                <option value="Medium">Medium</option>
                                                                <option value="High">High</option>
                                                                <option value="Low">Low</option>
                                                            </select>
                                                        </td> -->
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>2</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>English</h6>
                                                                    <span>INV-100023456</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>The Standard</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td>
                                                            <span>35</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-primary light border-0 me-1">300,00</span>
                                                        </td>
                                                        <td>
                                                        <span>News</span>
                                                        </td>
                                                        <td><span>Standard Group Media</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>3</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>English</h6>
                                                                    <span>INV-100023456</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>The Standard</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td>
                                                            <span>35</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-primary light border-0 me-1">300,00</span>
                                                        </td>
                                                        <td>
                                                        <span>News</span>
                                                        </td>
                                                        <td><span>Standard Group Media</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>4</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>English</h6>
                                                                    <span>INV-100023456</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>The Standard</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td>
                                                            <span>35</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-primary light border-0 me-1">300,00</span>
                                                        </td>
                                                        <td>
                                                        <span>News</span>
                                                        </td>
                                                        <td><span>Standard Group Media</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox3" required>
                                                                <label class="form-check-label"
                                                                    for="customCheckBox3"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>5</span></td>
                                                        <td>
                                                            <div class="products">
                                                                <div>
                                                                    <h6>English</h6>
                                                                    <span>INV-100023456</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span>The Standard</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td><span>02/24/2023</span></td>
                                                        <td>
                                                            <span>35</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-primary light border-0 me-1">300,00</span>
                                                        </td>
                                                        <td>
                                                        <span>News</span>
                                                        </td>
                                                        <td><span>Standard Group Media</span></td>
                                                    </tr>
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
            <!-- /Column  -->
            <!-- Column  -->
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
</html>
