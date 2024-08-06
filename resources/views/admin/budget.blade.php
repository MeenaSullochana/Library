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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Create Budget</b>
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="row p-3 bg-white rounded-2 mb-3">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div class="item">
                                <h3>Create Budget</h3>
                            </div>
                            <div class="item">
                                <!-- <a href="index.php"> <button type="button" class="btn btn-primary"><i
                                            class="fa fa-backward" aria-hidden="true"></i> Back</button></a> -->
                            </div>
                        </div>
                    </div> --}}
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
                                    @php
                                    $categories =
                                    DB::table('special_categories')->where('status', '=',
                                    1)->get();
                                    @endphp

                                    @php
                                    $library_types =
                                    DB::table('library_types')->where('status', '=',
                                    1)->get();
                                    @endphp
                                    <!-- /column -->
                                    <div class="col-lg-9 col-xl-10 col-xxl-9">
                                        <div class="email-right-box ms-0 h-auto">
                                            <form id="formId">
                                                @csrf
                                                <div class="mt-3" id="compose-content">
                                                    <div class="compose-content p-3">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Library Type<span
                                                                            class="text-danger mandatory">*</span></label>
                                                                    <select name="library" id="libraryType"
                                                                        class="form-control">
                                                                        <option value="">Select One</option>
                                                                        @foreach($library_types as $val)
                                                                        <option value="{{$val->name}}"> {{$val->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Subject<span
                                                                            class="text-danger mandatory">*</span></label>
                                                                    <input type="text"
                                                                        class="form-control bg-transparent" id="subject"
                                                                        placeholder="Subject">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description<span
                                                                    class="text-danger mandatory">*</span></label>
                                                            <textarea
                                                                class="textarea_editor form-control bg-transparent"
                                                                id="description" rows="5"
                                                                placeholder="Enter description ..."></textarea>
                                                        </div>
                                                        <h3 class="my-3"><i class="fa fa-paperclip me-2"></i> Budget
                                                            Category</h3>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>Total Amount<span
                                                                        class="text-danger mandatory">*</span></p>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-inr"></i></span>
                                                                    <input type="number" class="form-control"
                                                                        id="totalAmount"
                                                                        aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @foreach($categories as $val)
                                                            <div class="category-row" data-name="{{ $val->name }}">
                                                                <p>{{ $val->name }}<span
                                                                        class="text-danger mandatory">*</span></p>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p>Tamil<span
                                                                                class="text-danger mandatory">*</span>
                                                                        </p>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1"><i
                                                                                    class="fa fa-inr"></i></span>
                                                                            <input type="number"
                                                                                class="form-control category-input"
                                                                                data-name="{{ $val->name }}"
                                                                                name="category[{{ $val->name }}][tamil]"
                                                                                aria-describedby="basic-addon1"
                                                                                placeholder="Tamil Amount">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>English<span
                                                                                class="text-danger mandatory">*</span>
                                                                        </p>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1"><i
                                                                                    class="fa fa-inr"></i></span>
                                                                            <input type="number"
                                                                                class="form-control category-input"
                                                                                data-name="{{ $val->name }}"
                                                                                name="category[{{ $val->name }}][english]"
                                                                                aria-describedby="basic-addon1"
                                                                                placeholder="English Amount">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="text-start mt-4 mb-3">
                                                            <button class="btn btn-primary btn-sl-sm me-2"
                                                                id="submitForm" type="button"><span class="me-2"><i
                                                                        class="fa fa-paper-plane"></i></span>Send</button>
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
            toastr.error("Select Library Type", {
                timeOut: 2000
            });
            return;
        }
        if ($("#subject").val() === '') {
            toastr.error("Enter Subject", {
                timeOut: 2000
            });
            return;
        }
        if ($("#description").val() === '') {
            toastr.error("Enter Description", {
                timeOut: 2000
            });
            return;
        }
        if ($("#totalAmount").val() === '') {
            toastr.error("Enter Total Amount", {
                timeOut: 2000
            });
            return;
        }

        var categoryData = [];
        var totalAmount = parseFloat($("#totalAmount").val());
        var calculatedAmount = 0;

        $('.category-row').each(function() {
            var name = $(this).data('name');
            var tamilAmount = parseFloat($('[name="category[' + name + '][tamil]"]').val()
                .trim());
            var englishAmount = parseFloat($('[name="category[' + name + '][english]"]').val()
                .trim());

            if (isNaN(tamilAmount) || isNaN(englishAmount)) {
                toastr.error("Please enter valid amounts for both Tamil and English for " +
                    name, {
                        timeOut: 2000
                    });
                return false;
            } else {
                calculatedAmount += tamilAmount + englishAmount;
                categoryData.push({
                    name: name,
                    tamilAmount: tamilAmount,
                    englishAmount: englishAmount
                });
            }
        });
     
    
        if (calculatedAmount !== totalAmount) {
            toastr.error("Total Amount and Category Amounts mismatch", {
                timeOut: 2000
            });
            return;
        }

        var data = {
            libraryType: $("#libraryType").val(),
            subject: $("#subject").val(),
            description: $("#description").val(),
            CategorieAmount: categoryData,
            totalAmount: totalAmount,
            type: "bookbudget"
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
                        timeOut: 2000
                    });
                    $('#formId')[0].reset();
                } else {
                    toastr.error(response.error, {
                        timeOut: 2000
                    });
                }
            }
        });
    });
});
</script>

</html>