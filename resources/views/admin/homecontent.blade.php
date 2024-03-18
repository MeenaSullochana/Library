
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
    <title>Government of Tamil Nadu - Book Procurement - User Register Page Content</title>
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
                <div class="content">
                    <div class="page-inner">

                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0 bc-title"><b>Add Register Page Content</b> </h3>
                                        <a class="btn btn-primary btn-sm" href="/index"><i
                                                class="fas fa-chevron-left"></i> Dashboard</a>
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
                                                <form class="admin-form" id="myForm" action="#" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="">

                                                    <div class="row">
                                                        <div class="mt-3 file mb-3">
                                                            <label for="inp-name" id="userType">User Type  <span class="text-danger">*</span></label>
                                                            <select name="form_builder[9][type]" class="form-select rounded-0 bg-white form-select-md">
                                                            <option value=""> Select User Type</option>
                                                                <option value="publisher"> Publisher </option>
                                                                <option value="distributor"> Distributor </option>
                                                                <option value="publisher_and_distributor"> Publisher Cum Distributor </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="slug">Headline Title  <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Hidelins Title" id="hidelins">
                                                    </div>

                                                    <div class="table-responsive">
                                                        <label for="slug">Description</label>
                                                        <table class="table table-bordered" id="titles_name">
                                                            <tr>
                                                                <th>Description Content</th>
                                                                <th>Add</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="subject[]" placeholder="Enter Description Content" class="form-control name_list" /></td>
                                                                <td><button type="button" name="awarded_titles" class="btn btn-success add_row">+</button></td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <button type="button" class="btn btn-primary" id="submitForm">Submit</button>
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
</body>
<script>
$(document).ready(function(){
    var max_rows = 11; // Maximum allowed rows
    var table = $("#titles_name"); // Table
    var add_button = $(".add_row"); // Button to add rows

    $(add_button).click(function(e){
        e.preventDefault();
        if(table.find('tr').length < max_rows){
            var newRow = '<tr>' +
                '<td><input type="text" name="subject[]" placeholder="Enter Discription Content" class="form-control name_list" /></td>' +
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
$(document).ready(function(){
    $("#submitForm").click(function(){
        var formData = {
            '_token': $('input[name=_token]').val(),
            'userType': $('select[name="form_builder[9][type]"]').val(),
            'hidelineTitle': $('#hidelins').val(),
            'hidelineContent': $('input[name="subject[]"]').map(function(){return $(this).val();}).get()
        };


     console.log(formData);
        $.ajax({
            type: 'POST',
            url: '/admin/hidelins_title',
            data: formData,
            success: function(response) {
                if(response.success){
                toastr.success(response.success,{timeout:45000});
                setTimeout(function() {
                        window.location.href = "/admin/homecontent"
                    }, 3000);

               }else{
                toastr.error(response.error,{timeout:45000});

               }
            },
            error: function(error) {

            }
        });
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
