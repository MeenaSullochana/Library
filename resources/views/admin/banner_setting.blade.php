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
    include 'admin/plugin/plugin_css.php';
    ?>
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
        {{-- <div class="content-body">
            <div class="container-fluid">
            <div class="content">
                    <div class="page-inner">

                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0 bc-title"><b>Banner Change</b> </h3>
                                        <a class="btn btn-primary btn-sm"
                                            href="/admin/index"><i
                                                class="fas fa-chevron-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12">

                                    <div class="card o-hidden border-0 shadow-lg">
                                        <div class="card-body ">
                                            <!-- Nested Row within Card Body -->
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <form class="admin-form"
                                                        action="#"
                                                        method="POST" enctype="multipart/form-data">

                                                        <input type="hidden" name="_token"
                                                            value="">

                                                        <!-- banner 2 -->

                                                        <div class="form-group">
                                                            <label for="name">Set Image1  <span class="text-danger">*</span></label>
                                                            <br>
                                                            <img class="admin-img"
                                                                src="images\avatar\11.png"
                                                                alt="No Image Found">
                                                            <br>
                                                            <span class="mt-1">Image Size Should Be 496 x 204.</span>
                                                        </div>

                                                        <div class="mb-3 file">
                                                            <input class="form-control" type="file" id="formFile">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">Title  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Title " value="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">Subtitle  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Subtitle" value="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">URL 1  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter URL 1" value="">
                                                        </div>

                                                        <!-- banner 2 -->

                                                        <div class="form-group">
                                                            <label class="mt-5" for="name">Set Image2  <span class="text-danger">*</span></label>
                                                            <br>
                                                            <img class="admin-img"
                                                                src="images\avatar\11.png"
                                                                alt="No Image Found">
                                                            <br>
                                                            <span class="mt-1">Image Size Should Be 496 x 204.</span>
                                                        </div>

                                                        <div class="mb-3 file">
                                                            <input class="form-control" type="file" id="formFile">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">Title  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Title " value="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">Subtitle  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Subtitle" value="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="slug">URL 1  <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter URL 1" value="">
                                                        </div>


                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="btn btn-secondary ">Submit</button>
                                                        </div>

                                                        <div>

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
        </div> --}}
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Home Page Setting</b>
                            </h3>
                           <div>
                            {{-- <a class="btn btn-primary btn-sm" href="/admin/banner_setting_list"><i class="fas fa-arrow-left"></i>
                                List of Popular Category</a> --}}
                                <a class="btn btn-primary btn-sm" href="/admin/banner_setting_list"><i class="fas fa-arrow-left"></i>
                                    List of Books</a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-5">


                <div class="card mt-3">
                    <div class="card-body">
                      

                            <input type="hidden" name="_token" value="">

                            <!-- banner 2 -->

                            {{-- <div class="form-group">
                                <label for="name">Set Image1 <span class="text-danger">*</span></label>
                                <br>
                                <img class="admin-img" src="images\avatar\11.png" alt="No Image Found">
                                <br>
                                <span class="mt-1">Image Size Should Be 496 x
                                    204.</span>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 file">
                                        <input class="form-control" type="file" id="formFile" required>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label for="name">Set Image1 <span class="text-danger">*</span></label>
                                <br>
                                <img class="admin-img" id="bookimage" src="images\avatar\11.png" alt="No Image Found">
                                <br>
                                <span class="mt-1">Image Size Should Be 270 x 340.</span>
                            </div>

                            <div class="mb-3 file">
                                <input class="form-control" type="file" id="formFile" onchange="loadFile(event)">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="slug">Slider Type <span class="text-danger">*</span></label>
                                    <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                        <select id="type" name="type" class="default-select form-control wide form-control-sm" required>
                                            <option value=""> </option>
                                            <option value="popularcategory"> Popular Category Book </option>
                                            <option value="topratedbooks">Latest Top Rated Books </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Category <span class="text-danger">*</span></label>
                                    <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                        <select id="category" name="category" class="default-select form-control wide form-control-sm" required>
                                        <option value=""></option>
                                        @php
                                                          $categori = DB::table('special_categories')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3 mt-3 ">
                                        <label for="slug"> Book Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter  Book Title "
                                        id="booktitle" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3 ">
                                        <label for="slug">Subtitle </label>
                                        <input type="text" class="form-control" placeholder="Enter Book Subtitle"
                                        id="subtitle" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 mt-3">
                                        <label for="meta_description">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="meta_description" id="description" class="form-control" rows="5"
                                            placeholder="Enter Description" required> </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-contant-end">
                                <button type="submit" id="submitbutton" class="btn btn-primary ">Submit</button>
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
    <!--************
        Main wrapper end
    *************-->
    <?php
    include 'admin/plugin/plugin_js.php';
    ?>
    
<script>
        document.getElementById('formFile').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('bookimage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('bookimage').src = 'images\avatar\11.png'; // Default image
            }
        });
    </script>
   <script>
        $(document).ready(function() {
            $("#submitbutton").on("click", function (e) {
                e.preventDefault();
                var type = $("#type").val();
                var booktitle = $("#booktitle").val();
                var subtitle = $("#subtitle").val();
                var description = $("#description").val();
                var category = $("#category").val();

                var bookimage = document.querySelector('input[type=file]').files[0];

                let fd = new FormData();
                fd.append('slidertype', type);
                fd.append('booktitle', booktitle);
                fd.append('subtitle', subtitle);
                fd.append('description', description);
                fd.append('category', category);
                fd.append('bookImage', bookimage); 

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/admin/homepageboookadd",
                    type: "POST",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.success, {timeout: 2000});
                            setTimeout(function () {
                                window.location.href = "/admin/banner_setting";
                            }, 3000);
                        } else {
                            toastr.error(response.error, {timeout: 2000});
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
<style>
    .admin-img {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }
    .admin-form span {
        color: #777;
    }

    .file {
        max-width: 350px;
        display: block;
    }
</style>
<style>
    .nav-pills .nav-link {
        border-radius: 4px;
        padding: 15px 15px;
        font-size: 13px;
        border: 1px solid;
        top: 10px !important;
        margin-top: 2px;
    }
</style>