
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- PAGE TITLE HERE -->
	<title>Government of Tamil Nadu - Book Procurement Edit Book Paper Type</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href= "{{ asset('admin/images/fevi.svg') }}">
    <?php
        include "admin/plugin/plugin_css.php";
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
        <div class="content-body">
            <div class="container-fluid">
                <div class="content">
                    <div class="page-inner">

                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0 bc-title"><b>Edit Book Paper Type</b> </h3>
                                        <a class="btn btn-primary btn-sm" href="/admin/bookpapertype_list"><i
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
                                            <form class="admin-form" id="formId"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="slug">Book Paper Type Name  <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{$data->name}}" Required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="adding">
                                                    <label for="slug">Status  <span class="text-danger">*</span></label>
                                                    <div class="dropdown bootstrap-select default-select form-control wide form-control-sm">
                                                        <select id="status" name="status" class="default-select form-control wide form-control-sm" Required>
                                                             @if($data->status == 1)
                                                            <option value="1">Active </option>
                                                            @else
                                                            <option value="0">Inactive</option>
                                                            @endif
                                                            @if($data->status == 1)
                                                            <option value="0">Inactive</option>
                                                            @else
                                                            <option value="1">Active </option>

                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mt-4">
                                                        <button type="button" class="btn btn-secondary" data-id="{{$data->id}}" id="submitbutton">Submit</button>
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
        <!--************
            Content body end
        *************-->
        <!--************
            Footer start
        *************-->
        @include ("admin.footer")

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
        include "admin/plugin/plugin_js.php";
    ?>
</body><script>
    $("#submitbutton").on("click", function(e) {
        e.preventDefault();

        var formData = {
            id: $(this).data('id'),
            name: $("#name").val(),
            status: $("#status").val()
        };

        console.log(formData);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/admin/book_papertype_edit",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    setTimeout(function () {
                        window.location.href = "/admin/bookpapertype_list"
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

</html>
<style>
    .admin-form span {
        color: #777;
    }

    .file {
        max-width: 350px;
        display: block;
    }
</style>
