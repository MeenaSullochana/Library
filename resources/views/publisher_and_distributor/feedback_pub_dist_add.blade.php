
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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
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
        @include("publisher_and_distributor.navigation")
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>Create Feedback</b>
                        </h3>
                        {{-- <a class="btn btn-primary  btn-sm" href="/publisher_and_distributor/feedbackadd">
                            <i class="fas fa-plus"></i> Create Feedback </a> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="container modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Create Feedback </h4>
                        </div>
                        <form id="emailreply1"  method="POST"  action="/publisher_and_distributor/feedbackadd" >
                        @csrf
                            <div class="modal-body">
                            <div class="form-group mb-2 ps-3">
                            <label class="form-label">Subject<span class="text-danger">*</span></label>
                             <textarea type="text" class="form-control" name="Enter your subject" value=""
                           placeholder="Subject" rows="3" autocomplete="off" required="">{{ old('subject') }}</textarea>
                            </div>
                                <div class="form-group">
                                    <label class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" value="" placeholder="Enter your description"  required
                                        rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
                            </div>


                        </form>
                    </div>

                </div>
                {{-- <div class="row p-2 bg-white">
                    <div class="col-xl-12">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                <div id="empoloyees-tbl3_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="example3" class="table dataTable no-footer" role="grid" aria-describedby="empoloyees-tbl3_info">
                                        <thead>
                                            <tr role="row">


                                                <th>S.No</th>
                                                <th>Subject</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">

                                                <td>1</td>
                                                <td> Subject </td>
                                                <td>Description</td>
                                                
                                                <td data-label="control">
                                                    <div class="d-flex mt-p0">
                                                        </a>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp me-1">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--************
            Content body end
        *************-->
        <!--************
            Footer start
        *************-->

        @include("publisher_and_distributor.footer")


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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>
</body>
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
</html>
<style>
.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #f8fafc;
    background-clip: padding-box;
    border: 1px solid transparent;
    border-radius: 4px;
    outline: 0;
}
</style>
