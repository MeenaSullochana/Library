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
                    <div class="row p-3 bg-white rounded-2 mb-3">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="item">
                                <h3>Create Budget</h3>
                            </div>
                            <div class="item">
                                <a href="index.php"> <button type="button" class="btn btn-primary"><i
                                            class="fa fa-backward" aria-hidden="true"></i> Back</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-0 h-auto">
                            <div class="card-body py-0">
                                <div class="row gx-0">
                                    <!-- column -->
                                    <div class="col-xl-2 col-xxl-3 col-lg-3">
                                        <div class="email-left-box h-auto dz-scroll pt-3 ps-0" id="email-left">
                                            <div class="mail-list rounded ">
                                                <a class="list-group-item active">
                                                    <i class="fa-solid fa-money-bill"></i>Create Library
                                                    Budget </a>
                                                <a href="/admin/budgetlist" class="list-group-item">
                                                    <i class="fa-solid fa-list-check"></i>Library Budget List<span
                                                        class="badge badge-purple badge-sm float-end rounded">2</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-lg-9 col-xl-10 col-xxl-9">
                                        <div class="email-right-box ms-0 h-auto">
                                            <form id="formId">
                                                @csrf
                                                <div class="mt-3 " id="compose-content">
                                                    <div class="compose-content">
                                                        <div class="mb-3">
                                                            <label class="form-label">Library Type<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <select name="library" id="libraryType"
                                                                class="form-control">
                                                                <option value="">Select One</option>
                                                                <option value="Part-time">Part-time</option>
                                                                <option value="Full-time Branch Library">Full-time
                                                                    Branch Library</option>
                                                                <option value="Branch Library">Branch Library</option>
                                                                <option value="Village Library">Village Library</option>
                                                                <option value="Part-Time Library">Part-Time Library
                                                                </option>
                                                                <option value="Anna Centenary Library">Anna Centenary
                                                                    Library</option>
                                                                <option value="Kalaignar Centenary Library">Kalaignar
                                                                    Centenary Library</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Subject<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <input type="text" class="form-control bg-transparent"
                                                                id="subject" placeholder=" Subject:">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description<span
                                                                    class="text-danger maditory">*</span></label>
                                                            <textarea
                                                                class="textarea_editor form-control bg-transparent"
                                                                id="description" rows="5"
                                                                placeholder="Enter description ..."></textarea>
                                                        </div>

                                                        <h5 class="my-3"><i class="fa fa-paperclip me-2"></i> Budget
                                                            Category</h5>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>Total Amount<span class="text-danger maditory">*</p>
                                                                Rs.<input type="number" class="form-control"
                                                                    id="totalAmount">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @php
                                                            $categories =
                                                            DB::table('special_categories')->where('status', '=',
                                                            1)->get();
                                                            @endphp

                                                            @foreach($categories as $val)
                                                            <div class="col-md-4">
                                                                <p>{{ $val->name }}<span
                                                                        class="text-danger maditory">*</span></p>
                                                                Rs.<input type="number"
                                                                    class="form-control category-input"
                                                                    data-name="{{ $val->name }}"
                                                                    name="category[{{ $val->name }}]">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="text-start mt-4 mb-3">
                                                            <button class="btn btn-primary btn-sl-sm me-2"
                                                                id="submitForm" type="button"><span class="me-2"><i
                                                                        class="fa fa-paper-plane"></i></span>Send</button>
                                                            <!-- <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button> -->
                                                        </div>
                                                    </div>
                                                    <form>
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
$(document).ready(function() {
    $('#submitForm').on('click', function() {
        if ($("#libraryType").val() === '') {
            toastr.error("Select Librarytype ", {
                timeOut: 2000
            });
            return;
        }
        if ($("#subject").val() === '') {
            toastr.error("Enter subject ", {
                timeOut: 2000
            });
            return;
        }
        if ($("#description").val() === '') {
            toastr.error("Enter description ", {
                timeOut: 2000
            });
            return;
        }
        if ($("#totalAmount").val() === '') {
            toastr.error("Enter totalAmount ", {
                timeOut: 2000
            });
            return;
        }
        var categoryData = [];


        $('.category-input').each(function() {
            var name = $(this).data('name');
            var amount = $(this).val().trim();

            if (amount === '') {

                toastr.error("Please enter an amount for " + name, {
                    timeOut: 2000
                });
                dd();
            } else {
                var category = {
                    name: name,
                    amount: amount
                };
                categoryData.push(category);
            }
        });



        var data = {
            libraryType: $("#libraryType").val(),
            subject: $("#subject").val(),
            description: $("#description").val(),
            CategorieAmount: categoryData,
            totalAmount: $("#totalAmount").val(),
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/budgetadd",
            type: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    toastr.success(response.success, {
                        timeout: 2000
                    });
                    $('#formId')[0].reset();

                } else {
                    toastr.error(response.error, {
                        timeout: 2000
                    });
                }
            }
        });

    });
});
</script>



</html>