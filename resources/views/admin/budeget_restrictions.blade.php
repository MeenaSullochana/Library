
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
	<title>Government of Tamil Nadu - Book Procurement - Website Budeget Restriction</title>
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
                                        <h3 class="mb-0 bc-title"><b>Website Budeget Restriction </b> </h3>
                                         {{-- <a class="btn btn-primary btn-sm" href="bookpapertype_list"><i
                                                class="fas fa-chevron-left"></i> Back</a> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Form -->
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-12">

                                    <div class="card o-hidden border-0 shadow-lg">
                                        <div class="card-body ">
                                            <!-- Nested Row within Card Body -->
                                            @php
                                                $budeget = DB::table('budeget_restrictions')->first();
                                                @endphp
                                               <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="vendor">Vendor Wise Restriction (%) <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="vendor" name="vendor" 
                                                            value="{{ $budeget->vendor ?? '' }}" placeholder="Enter Vendor (%)" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="publication">Publication Name Wise Restriction (%) <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="publication" name="publication" 
                                                            value="{{ $budeget->publication ?? '' }}" placeholder="Enter Publication Name (%)" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="author">Author Wise Restriction (%) <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="author" name="author" 
                                                            value="{{ $budeget->author ?? '' }}" placeholder="Enter Author (%)" required>
                                                    </div>
                                                </div>
                                            </div>
                                                    
      
                                                <div class="row justify-content-center">
                                                    <div class="col-md-4">
                                                        <div class="form-group mt-4 text-center">
                                                            <!-- Submit Button to trigger the form submission -->
                                                            <button type="submit" class="btn btn-secondary" id="submitbutton">Update</button>
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
</body>
<script>
    $("#submitbutton").on("click", function (e) {
        e.preventDefault();
        
        // Create form data object
        var formData = {
            vendor: $("#vendor").val(),
            publication: $("#publication").val(),
            author: $("#author").val(),
        };


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Send AJAX request
        $.ajax({
            url: "/admin/budeget_restriction", // Corrected URL (fixed typo)
            type: "POST",
            data: formData,
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success, { timeout: 2000 });
                    setTimeout(function() {
                        window.location.href = "/admin/budeget_restrictions"; // Fixed typo in URL
                    }, 3000);
                } else {
                    toastr.error(response.error, { timeout: 2000 });
                }
            },
            error: function (xhr, status, error) {
                // Error handling in case AJAX request fails
                toastr.error('Something went wrong. Please try again.', { timeout: 2000 });
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
