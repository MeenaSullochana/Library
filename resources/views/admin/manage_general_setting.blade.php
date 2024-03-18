
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Government of Tamil Nadu - Book Procurement - General Setting Page</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
    ?>
    <link href="
https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css
" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Basic Information</b>
                            </h3>
                            <a class="btn btn-primary btn-sm" href="/admin/index"><i
                                class="fas fa-chevron-left"></i> Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Column  -->
                    <div class="col-xl-12">
                        <div class="card dz-card" id="vertical-nav">
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade show active" id="VerticalNav" role="tabpanel"
                                    aria-labelledby="home-tab5">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="nav flex-column nav-pills mb-3">
                                                    <a href="#v-pills-home" data-bs-toggle="pill"
                                                        class="nav-link active show">Basic Information</a>
                                                    <a href="#v-pills-Logo" data-bs-toggle="pill"
                                                        class="nav-link">Logo</a>
                                                    <a href="#v-pills-Favicon" data-bs-toggle="pill"
                                                        class="nav-link">Favicon</a>
                                                    <a href="#v-pills-Loader" data-bs-toggle="pill"
                                                        class="nav-link">Loader</a>
                                                    <a href="#v-pills-messages" data-bs-toggle="pill"
                                                        class="nav-link">Seo</a>
                                                    <a href="#v-pills-settings" data-bs-toggle="pill"
                                                        class="nav-link">Scripts</a>
                                                    <a href="#v-pills-footer" data-bs-toggle="pill"
                                                        class="nav-link">Footer & Contact Page</a>
                                                    <a href="#v-pills-fbanner" data-bs-toggle="pill"
                                                        class="nav-link">News Feed</a>
                                                    <!-- <a href="#v-pills-sbanner" data-bs-toggle="pill"
                                                        class="nav-link">Second Banner</a> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-8 mt-3">
                                                <div class="tab-content">
                                                    <div id="v-pills-home" class="tab-pane fade active show">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="title">App Name <span class="text-danger">*</span></label>
                                                                <input type="text" name="title" class="form-control"
                                                                    id="title" placeholder="Enter Website Title"
                                                                    value="Book fair">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 mt-3">
                                                            <div class="form-group">
                                                                <label for="home_page_title">Home Page Title  <span class="text-danger">*</span></label>
                                                                <input type="text" name="home_page_title"
                                                                    class="form-control" id="home_page_title"
                                                                    placeholder="Enter Home Page Title"
                                                                    value="Home page title">
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="card-body mt-004 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- logo start -->

                                                    <div id="v-pills-Logo" class="tab-pane fade">

                                                        <!-- /Column  -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="clearfix">
                                                                        <div
                                                                            class="card card-bx profile-card author-profile m-b30">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 text-primary">
                                                                                        Website
                                                                                        Logo<span class="text-danger">*</span></div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="dropdown">
                                                                                           
                                                                                            <div class="dropdown-menu">
                                                                                               
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p-5">
                                                                                    <div class="author-profile">
                                                                                    <div class="form-group">
                                                                                           <label for="name">Set Image1 <span class="text-danger">*</span></label>
                                                                                                  <br>
                                                                                               <img class="admin-img" id="websitelogo" src="/assets/img/logo/logo.png" alt="No Image Found">
                                                                                                    <br>
                                                                                              <span class="mt-1">Image Size Should Be 270 x 340.</span>
                                                                                                     </div>

                                                                                            <div class="mb-3 file col-md-6 mx-auto">
                                                                                             <input class="form-control" type="file" id="formFile22" onchange="loadFile(event)">
                                                                                              </div>
                        
                        

                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <div class="row">
                                                                                            <div class="mx-auto col-md-6">
                                                                                                <div
                                                                                                    class="card-body mt-004">
                                                                                                    <button
                                                                                                        type="submit"
                                                                                                        id="submitbutton22" 
                                                                                                        class="btn btn-primary mt-3 text-center btn-block">Submit</button>
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
                                                    <!-- Logo End -->

                                                    <!-- Favicon Start -->

                                                    <div id="v-pills-Favicon" class="tab-pane fade">
                                                        <!-- /Column  -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="clearfix">
                                                                        <div
                                                                            class="card card-bx profile-card author-profile m-b30">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 text-primary">
                                                                                        Website
                                                                                        Favicon<span class="text-danger">*</span></div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="dropdown">
                                                                                            <!-- <button type="button"
                                                                                                class="btn btn-success light sharp btn-sm btn-rounded dropdown-toggle"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                Enabled
                                                                                            </button> -->
                                                                                            <div class="dropdown-menu"
                                                                                               >
                                                                                                <!-- Button trigger modal -->
                                                                                                <!-- <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Enabled</a>
                                                                                                <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Disable</a> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p-5">
                                                                                    <div class="author-profile">
                                                                                    <div class="form-group">
                                                                                           <label for="name">Set Image1 <span class="text-danger">*</span></label>
                                                                                                  <br>
                                                                                               <img class="admin-img" id="websitefavicon" src="images\avatar\11.png" alt="No Image Found">
                                                                                                    <br>
                                                                                              <span class="mt-1">Image Size Should Be 270 x 340.</span>
                                                                                                     </div>

                                                                                            <div class="mb-3 file col-md-6 mx-auto">
                                                                                             <input class="form-control" type="file" id="formFile33" onchange="loadFile(event)">
                                                                                              </div>
                        
                        

                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <div class="row">
                                                                                            <div class="mx-auto col-md-6">
                                                                                                <div
                                                                                                    class="card-body mt-004">
                                                                                                    <button
                                                                                                        type="submit"
                                                                                                        id="submitbutton33" 
                                                                                                        class="btn btn-primary mt-3 text-center btn-block">Submit</button>
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
                                                        <!-- /Column  -->
                                                    </div>
                                                    <!-- Favicon End -->


                                                    <!-- Loader Start -->

                                                    <div id="v-pills-Loader" class="tab-pane fade">

                                                        <!-- /Column  -->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="clearfix">
                                                                        <div
                                                                            class="card card-bx profile-card author-profile m-b30">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 text-primary">
                                                                                        Website Loader</div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="dropdown">
                                                                                            <button type="button"
                                                                                                class="btn btn-success light sharp btn-sm btn-rounded dropdown-toggle"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                Enabled
                                                                                            </button>
                                                                                            <div class="dropdown-menu"
                                                                                               >
                                                                                                <!-- Button trigger modal -->
                                                                                                <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Enabled</a>
                                                                                                <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Disable</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p-5">
                                                                                    <div class="author-profile">
                                                                                        <div class="author-media">
                                                                                            <img src="images/user.jpg"
                                                                                                alt="">
                                                                                            <div class="upload-link"
                                                                                                title=""
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="right"
                                                                                                data-original-title="update">
                                                                                                <input type="file"
                                                                                                    class="update-flie">
                                                                                                <i
                                                                                                    class="fa fa-camera"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="author-info">
                                                                                            <h6 class="title">Upload
                                                                                                Picture</h6>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    class="card-body mt-004">
                                                                                                    <button
                                                                                                        type="submit"
                                                                                                        id="submit-btn"
                                                                                                        class="btn btn-primary mt-3 text-center btn-block">Submit</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">

                                                                                    </div>
                                                                                    <div class="col-md-6"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="clearfix">
                                                                        <div
                                                                            class="card card-bx profile-card author-profile m-b30">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 text-primary">
                                                                                        Admin Loader</div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="dropdown">
                                                                                            <button type="button"
                                                                                                class="btn btn-success light sharp btn-sm btn-rounded dropdown-toggle"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                Enabled
                                                                                            </button>
                                                                                            <div class="dropdown-menu"
                                                                                                >
                                                                                                <!-- Button trigger modal -->
                                                                                                <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Enabled</a>
                                                                                                <a class="dropdown-item"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#unblock"
                                                                                                    href="#">Disable</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p-5">
                                                                                    <div class="author-profile">
                                                                                        <div class="author-media">
                                                                                            <img src="images/user.jpg"
                                                                                                alt="">
                                                                                            <div class="upload-link"
                                                                                                title=""
                                                                                                data-toggle="tooltip"
                                                                                                data-placement="right"
                                                                                                data-original-title="update">
                                                                                                <input type="file"
                                                                                                    class="update-flie">
                                                                                                <i
                                                                                                    class="fa fa-camera"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="author-info">
                                                                                            <h6 class="title">Upload
                                                                                                Picture</h6>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    class="card-body mt-004">
                                                                                                    <button
                                                                                                        type="submit"
                                                                                                        id="submit-btn"
                                                                                                        class="btn btn-primary mt-3 text-center btn-block">Submit</button>
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
                                                        <!-- /Column  -->
                                                    </div>

                                                    <!-- Loader End -->

                                                    <!-- seo start -->

                                                    <div id="v-pills-messages" class="tab-pane fade">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-4">
                                                                        <h4 class="card-title">Site Meta Keywords <span class="text-danger">*</span></h4>
                                                                    </div>

                                                                    <select id="multi-value-select" multiple="multiple">
                                                                        <option selected="selected">orange</option>
                                                                        <option>white</option>
                                                                        <option>white1</option>
                                                                        <option>white2</option>
                                                                        <option>white3</option>
                                                                        <option>white4</option>
                                                                        <option selected="selected">purple</option>
                                                                    </select>

                                                                    <div class="form-group card mb-4 mt-3">
                                                                        <label for="meta_description">Site Meta
                                                                            Description <span class="text-danger">*</span></label>
                                                                        <textarea name="meta_description"
                                                                            id="meta_description" class="form-control"
                                                                            rows="5"
                                                                            placeholder="Enter Site Meta Description">  Multipurpose eCommerce  Shopping Platform Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over .</textarea>
                                                                    </div>
                                                                 
                                                                   <div class="card mb-4 mt-3">
                                                                        

                                                                        <button type="submit" id="submit-btn"
                                                                            class="btn btn-primary mt-5 w-100">Submit</button>
                                                                    </div> 
                                                                    <div class="mt-3 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="v-pills-settings" class="tab-pane fade">
                                                        <div class="card mb-4 mt-3">
                                                            <div class="card-body">
                                                                <div class="col-sm-12 m-b30">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="flexSwitchCheckDefault">
                                                                        <label class="form-check-label"
                                                                            for="flexSwitchCheckDefault">Enable Google Analytics </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label>Google Analytics<span class="text-danger">*</span></label>
                                                                    <textarea name="google_analytics"
                                                                        class="form-control" id=""
                                                                        placeholder="Google Analytics"></textarea>
                                                                </div>
                                                                <div class="mt-3 d-flex justify-content-end">
                                                                    <button type="button" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php
     $homefooter = DB::table('homefooter')->first();
   
    @endphp
                                                    <div id="v-pills-footer" class="tab-pane fade">
                                                    <div class="row justify-content-center">

<div class="col-lg-12">
    <div class="form-group mt-3">
        <label for="footer_content"> About Content <span class="text-danger">*</span></label>
        <textarea type="text" name="footer_about"
            class="form-control" id="footer_about"
            placeholder=" About Content" rows="3" value="{{$homefooter->about}}"
            >{{$homefooter->about}}</textarea>
    </div>
    <div class="form-group mt-3">
        <label for="footer_address"> Address <span class="text-danger">*</span></label>
        <textarea type="text" name="footer_address"
            class="form-control" id="footer_address"
            placeholder=" Address" rows="3"
            value="{{$homefooter->address}}">{{$homefooter->address}}</textarea>
    </div>

    <div class="form-group mt-3">
        <label for="footer_phone"> Phone Number
            <span class="text-danger">*</span></label>
        <input type="text" name="footer_phone"
            class="form-control" id="footer_phone"
            placeholder=" Phone Number" value="{{$homefooter->phoneNumber}}"
           >
    </div>
    <div class="form-group mt-3">
        <label for="footer_Fax"> Fax Number
            <span class="text-danger">*</span></label>
        <input type="text" name="footer_Fax"
            class="form-control" id="footer_Fax"
            placeholder=" Fax Number"  value="{{$homefooter->faxNumber}}"
            >
    </div>
    

    <div class="form-group mt-3">
        <label for="footer_email"> Email <span class="text-danger">*</span></label>
        <input type="email" name="footer_email"
            class="form-control" id="footer_email"
            placeholder="Enter Email"  value="{{$homefooter->email}}"
            >
    </div>

    <h4 class="card-title mt-3">Social Icons</h4>
        
    <div
                                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                                           
                                                                        </div>

                                                                        <div class="card-body">
                                                                            <div class="gocover"
                                                                                style="background: url(https://product.geniusocean.com/genius-bank/assets/images/33CiUFaI1641808748.gif) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                                                            </div>

                                                                            <div class="alert alert-success alert-dismissible"
                                                                                style="display: none;">
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="alert">×</button>
                                                                                <p class="m-0"></p>
                                                                            </div>


                                                                            <div class="alert alert-danger alert-dismissible"
                                                                                style="display: none;" role="alert">
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="alert">×</button>
                                                                                <p class="m-0"></p>
                                                                            </div>


                                                                            <input type="hidden" name="_token"
                                                                                value="pMgt3K6hw7NqfFlt9rk5QhdcHvYvSbeuo47lqFVX">

                                                                            <div class="row mb-2">
                                                                                <label class="control-label col-sm-3"
                                                                                    for="facebook">Facebook
                                                                                    </label>
                                                                                <div class="col-sm-6">
                                                                                    <input class="form-control"
                                                                                        name="footer_facebook" id="footer_facebook"
                                                                                        placeholder="http://facebook.com/"
                                                                                        type="text"  value="{{$homefooter->facebook}}"
                                                                                       >
                                                                                </div>
                                                                                
                                                                            </div>


                                                                            <div class="row mb-2">
                                                                                <label class="control-label col-sm-3"
                                                                                    for="twitter">Twitter </label>
                                                                                <div class="col-sm-6">
                                                                                    <input class="form-control"
                                                                                        name="footer_twitter" id="footer_twitter"
                                                                                        placeholder="http://twitter.com/"
                                                                                        type="text" value="{{$homefooter->twitter}}"
                                                                                       >
                                                                                </div>
                                                                                
                                                                            </div>

                                                                            <div class="row mb-2">
                                                                                <label class="control-label col-sm-3"
                                                                                    for="linkedin">Youtube
                                                                                    </label>
                                                                                <div class="col-sm-6">
                                                                                    <input class="form-control"
                                                                                        name="footer_youtube" id="footer_youtube"
                                                                                        placeholder="http://youtube.com/"
                                                                                        type="text"  value="{{$homefooter->youtube}}"
                                                                                       >
                                                                                </div>
                                                                            
                                                                            </div>
                                                                        </div>

    <div class="form-group mt-3">
        <label for="copy_right">Copyright<span class="text-danger">*</span></label>
        <textarea name="footer_copyright" id="footer_copyright"
            class="form-control" rows="3"
            placeholder="Enter Copyright"  value="{{$homefooter->copyright}}">{{$homefooter->copyright}}</textarea>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        <button type="button" id="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</div>
                                                    </div>
                                                    <div id="v-pills-fbanner" class="tab-pane fade">
                                                     
                                                    @php
     $news_feeds = DB::table('news_feeds')->first();
   
    @endphp

                                                    <div class="form-group mt-3">
        <label for="copy_right">News feed<span class="text-danger">*</span></label>
        <textarea name="newsFeed" id="newsFeed"
            class="form-control" rows="5"
            placeholder="Enter News feed" value="{{$news_feeds->newsFeed}}">{{$news_feeds->newsFeed}}</textarea>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        <button type="button" id="submit3232" class="btn btn-primary">Submit</button>
    </div>

                        
                                                    </div>

                                                    <!-- logo start -->

                                                    <div id="v-pills-sbanner" class="tab-pane fade">

                                                        <form class="admin-form" action="#" method="POST"
                                                            enctype="multipart/form-data">

                                                            <input type="hidden" name="_token" value="">

                                                            <!-- banner 2 -->

                                                            <div class="form-group">
                                                                <label for="name">Set Image1 <span
                                                                        class="text-danger">*</span></label>
                                                                <br>
                                                                <img class="admin-img" src="images\avatar\11.png"
                                                                    alt="No Image Found">
                                                                <br>
                                                                <span class="mt-1">Image Size Should Be 496 x
                                                                    204.</span>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3 file">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group d-flex justify-contant-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary ">Submit</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <!-- Logo End -->
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
        <!-- /Column  -->
    </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
        @include ("admin.footer")
        </div>
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

    <script src="/vendor/select2/js/select2.full.min.js"></script>
    <script src= "{{ asset('admin//js/plugins-init/select2-init.js') }}"></script>
    <script>
        $(document).ready(function(){
            var max_rows = 11; // Maximum allowed rows
            var table = $("#titles_name"); // Table
            var add_button = $(".add_row"); // Button to add rows

            $(add_button).click(function(e){
                e.preventDefault();
                if(table.find('tr').length < max_rows){
                    var newRow = '<tr>' +
                        '<td><input type="text" name="subject[]" placeholder="Enter Social Name" class="form-control name_list" /></td>' +
                        '<td><input type="text" name="subject[]" placeholder="Enter https://www.facebook.com/" class="form-control name_list" /></td>' +
                        '<td><button type="button" class="btn btn-danger remove_row">-</button></td>' +
                        '</tr>';
                    table.append(newRow); // Add row
                } else {
                  return  toastr.error('Maximum allowed rows reached 5',{timeout:2000});
                    // alert(');
                }
            });

            $(table).on("click", ".remove_row", function(e){
                e.preventDefault();
                $(this).closest('tr').remove(); // Remove row
            });
        });
        </script>
          <script>

$(document).on('click','#submit',function(e){
   e.preventDefault();
   

   
   var data = {
      'about': $('#footer_about').val(),
      'address': $('#footer_address').val(),
      'phoneNumber': $('#footer_phone').val(),
      'faxNumber': $('#footer_Fax').val(),
      'email': $('#footer_email').val(),
      'facebook': $('#footer_facebook').val(),
      'twitter': $('#footer_twitter').val(),
      'youtube': $('#footer_youtube').val(),
      'copyright': $('#footer_copyright').val(),

   
};
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/admin/footeradd",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
  

         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })

})

</script>

<script>
        document.getElementById('formFile22').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('websitelogo').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('websitelogo').src = 'images\avatar\11.png'; // Default image
            }
        });
    </script>
    <script>
        document.getElementById('formFile33').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('websitefavicon').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('websitefavicon').src = 'images\avatar\11.png'; // Default image
            }
        });
    </script>

<script>
        $(document).ready(function() {
            $("#submitbutton22").on("click", function (e) {
                e.preventDefault();
            
                var websitelogo = $('#formFile22')[0].files;
              
                let fd = new FormData();
                fd.append('type', type);
                fd.append('websitelogo',websitelogo[0]);  
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/admin/websitelogo",
                    type: "POST",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.success, {timeout: 2000});
                            setTimeout(function () {
                                window.location.href = "/admin/manage_general_setting";
                            }, 3000);
                        } else {
                            toastr.error(response.error, {timeout: 2000});
                        }
                    }
                });
            });
        });
    </script>
    
    <script>

$(document).on('click','#submit3232',function(e){
   e.preventDefault();
   

   
   var data = {
      'newsFeed': $('#newsFeed').val(),


   
};
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type:"post",
      url:"/admin/newsfeedadd",
      data:data,
      dataType:"json",
      success: function(response) {
         if(response.success){
             toastr.success(response.success,{timeout:25000});
  

         }else{
             toastr.error(response.error,{timeout:25000});
         }

     }
   })

})

</script>




</body>

</html>
<style>
    .nav-pills .nav-link {
    border-radius: 4px;
    padding: 15px 15px;
    font-size: 13px;
    border: 1px solid;
    top: 10px !important;
    margin-top: 2px;
}
img#websitelogo {
    max-height: 100px;
    max-width: 450px;
    /* border: 1px solid #452b90; */
}
#websitefavicon {
    max-height: 100px;
    max-width: 450px;
    /* border: 1px solid #452b90; */
}
</style>
