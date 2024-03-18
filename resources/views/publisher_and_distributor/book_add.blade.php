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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
    include 'publisher_and_distributor/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        @include ('publisher_and_distributor.navigation')
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
                                <b>Add Book</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('publisher_and_distributor/book_manage_all') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Book </a>
                        </div>
                    </div>
                </div>
                <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id ="ourFormId" action="/publisher_and_distributor/create/book"
                    autocomplete="on">
                    @csrf
                    <section class="bg-light-new">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book ISBN</h4>
                            </div>
                            <div class="col-md-10">
                                <!-- <P class="fs-4">Enter your title as it appears on the book cover. This field cannot
                                    be changed after your book is published.</P> -->
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                    <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">ISBN-10/ISBN-13<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="isbn"
                                                            name="isbn" placeholder="Enter ISBN-10/ISBN-13.."   onkeyup="checkBookISBN()"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                    <span id="bookTitleError" class="text-danger"></span>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Language of the Book</h4>
                            </div>
                            <div class="col-md-6 form-group">
                            <label for="text">Language of the Book<span class="text-danger maditory">*</span></label></label>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="lang1" name="language" class="custom-control-input" value="Tamil" required>
                                <label class="custom-control-label" for="lang1">Tamil</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="lang2" name="language" class="custom-control-input" value="English" required>
                                <label class="custom-control-label" for="lang2">English</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="book_primary_language_new" name="language" class="custom-control-input" value="Other_Indian" required>
                                <label class="custom-control-label" for="book_primary_language_new">Other Indian Languages (please specify)</label>
                            </div>
                            <div class="col-md-12 book_primary_lang mb-2">
                                <input type="text" class="form-control" id="other1" name="Other_Indian" placeholder="Enter Other Indian Languages (please specify)">
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="book_primary_language_new_forein" name="language" class="custom-control-input" value="Other_Foreign" required>
                                <label class="custom-control-label" for="book_primary_language_new_forein">Other Foreign Languages (please specify)</label>
                            </div>
                            <div class="col-md-12 book_primary_lang_forein mb-2">
                                <input type="text" class="form-control" id="other2" name="Other_Foreign" placeholder="Enter Other Foreign Languages (please specify)">
                            </div>
                        </div>

                        </div>
                    </section>
                    <section class="bg-light-new">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book Title</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">Enter the book title as it appears on the title page. This cannot be changed after the book is submitted for procurement.</P>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">Book
                                                Title <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                <input type="text" class="form-control" id="bookTitleInput"
                                                    name="book_title" placeholder="Enter the Book Title.." required
                                                    onkeyup="checkBookTitle()">

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">Subtitle
                                                (Optional) </label>
                                            <div class="input-group transparent-append">
                                                <!-- <span class="input-group-text"> <i class="fa fa-lock"></i> </span> -->
                                                <input type="text" name="subtitle" id="subtitle"
                                                    class="form-control" placeholder="Enter Subtitle..">
                                                <!-- <span class="input-group-text show-pass">
                                                            <i class="fa fa-eye-slash"></i>
                                                            <i class="fa fa-eye"></i>
                                                        </span> -->
                                                <!-- <div class="invalid-feedback">
                                                        Subtitle cannot be edited agter your book has been published.
                                                        Click here to learn more.
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book Author Details</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">Enter the author or contributor name as it appears on the title page, for example, "Willam Shaespaer" for William Shakespeare. Additional authors can be included.</P>
                                <div class="row">
                                    <!-- <div class="col-lg-12">
                                            <div class="basic-form">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Primary Author or Contributor
                                                        <span class="text-danger">*</span></label>
                                                    <div class="">

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mt-1"
                                                                    id="validationCustomUsername"
                                                                    placeholder="Enter the Primary Author or Contributor.."
                                                                    required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mt-1"
                                                                    id="validationCustomUsername"
                                                                    placeholder="Enter the Primary Author or Contributor.."
                                                                    required>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mt-1"
                                                                    id="validationCustomUsername"
                                                                    placeholder="Enter the Primary Author or Contributor.."
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Primary Author or Contributor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    <div class="col-lg-12">
                                        <div class="basic-form">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Primary Author or
                                                            Contributor
                                                            <span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="primaryauthor" name="primaryauthor[]"
                                                                placeholder="Enter Primary Author or Contributo.."
                                                                required>
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Secondary Author
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="primaryauthor" name="primaryauthor[]"
                                                                placeholder="Enter Secondary Author..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Tertiary Author
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="primaryauthor" name="primaryauthor[]"
                                                                placeholder="Enter Tertiary Author..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <div class="group_wrapper">
                                                        <table id="itemTable" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-black">Translator
                                                                        Contributor <span class="text-danger"></span>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="field_wrapper_new">
                                                                <tr class="item">
                                                                    <td><input type="text" class="form-control"
                                                                            id="trans_author" name="trans_author[]"
                                                                            placeholder="Translater Author or Contributor">
                                                                    </td>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="add_button btn btn-sm btn-primary"
                                                                            title="Add field"><i
                                                                                class="fa fa-plus"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Contributors cannot be edited agter your book has been
                                                        published.
                                                        Click here to learn more.
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translator One
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_author" name="trans_author[]"
                                                                placeholder="Enter Translator One..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translator Two
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_author" name="trans_author[]"
                                                                placeholder="Enter Translator Two..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translator Three
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_author" name="trans_author[]"
                                                                placeholder="Enter Translator Three..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translated to (1)
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_from" name="trans_from[]"
                                                                placeholder="Translated to.">
                                                            <div class="invalid-feedback">
                                                                Book title cannot be edited after your book has been published.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translated to (2)
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_from" name="trans_from[]"
                                                                placeholder="Translated to.">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Translation From Language Three
                                                            </label>
                                                        <div class="input-group">

                                                            <input type="text" class="form-control" id="primaryauthor"
                                                                name="primaryauthor" placeholder="Enter Translation From Language Three.." required>
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Series</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">If the book is part of a series, provide details to identify the specific series it belongs to (Optional).</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div name="" id="" method="post">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dynamic_field_series">
                                                            <thead>
                                                                <tr>
                                                                    <th>Series Title <span
                                                                            class="text-danger maditory"></span></th>
                                                                    <th> Current Series Number<span
                                                                            class="text-danger maditory"></span></th>
                                                                    <th>Total Number of Series <span
                                                                            class="text-danger maditory"></span></th>

                                                                    {{-- <th>Add</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody id="inputContainerseries">
                                                                <tr>
                                                                    <td><input type="text" name="series_title[]"
                                                                            placeholder="Series Title"
                                                                            class="form-control" >
                                                                        </td>
                                                                    <td>
                                                                        {{-- <small> <b class="text-danger">Note : </b>Sample Entry 2/10 total</small> --}}
                                                                        <input type="text" name="series_number[]"
                                                                            placeholder="Current Series Number"
                                                                            class="form-control" ></td>
                                                                    <td><input type="text" name="isbn_number[]"
                                                                            placeholder="Total Number of Series"
                                                                            class="form-control" ></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRowseries()">+</button></td> --}}
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
                    </section>

                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Volume</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">If the book is part of a volume, provide details to identify the specific volume it belongs to (Optional).</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div name="add_name" id="add_name" method="post">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="dynamic_field">
                                                            <thead>
                                                                <tr>
                                                                    <th>Volume Title <span
                                                                            class="text-danger maditory"></span></th>
                                                                    <th>Current  Volume Number <span
                                                                            class="text-danger maditory"></span></th>
                                                                    <th>Total Number of Volume <span
                                                                            class="text-danger maditory"></span></th>

                                                                    {{-- <th>Add</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody id="inputContainer">
                                                                <tr>
                                                                    <td><input type="text" name="volume_title[]"
                                                                            placeholder="Volume Title"
                                                                            class="form-control" >
                                                                    <td><input type="text" name="volume_number[]"
                                                                            placeholder="Current  Volume Number"
                                                                            class="form-control" ></td></td>
                                                                    <td><input type="text" name="isbn_number1[]"
                                                                            placeholder="Total Number of Volume"
                                                                            class="form-control" ></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRow()">+</button></td> --}}
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="basic-form">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">Add Series Details</label>

                                            <button id="rowAdder" type="button" class="btn btn-dark">
                                                <span class="bi bi-plus-square-dotted">
                                                </span> Add Series Details
                                            </button>
                                            <div id="newinput"></div>
                                            <div id="row">
                                                <div class="input-group m-3">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-danger" id="DeleteRow" type="button">
                                                            <i class="bi bi-trash"></i>
                                                            Delete
                                                        </button>
                                                    </div>
                                                    <input type="text" class="form-control m-input" id="series"
                                                        name="series[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                            </div>
                        </div>
                    </section>


                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Edition Number</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">Provide the edition number for new editions of existing books (e.g., 1st Edition, 2nd Edition).</p>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="edition_number">Edition
                                                Number (Optional) (ex : 1st Edition,
                                                2nd Edition)</label>
                                            <div class="input-group">
                                                <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                <input type="text" class="form-control" id="edition_number"
                                                    name="edition_number" placeholder="Enter the Edition Number..">
                                                <!-- <div class="invalid-feedback">
                                                        Edition Number cannot be edited agter your book has been
                                                        published.
                                                        Click here to learn more.
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                   
                    <!-- <section class="bg-light-new mt-4">

                            <div class="row p-3">
                                <div class="col-md-2">
                                    <h4>Ebook</h4>
                                </div>
                                <div class="col-md-10">
                                    <P class="fs-4"> If others contributed to your book, you can add them and they'll be
                                        listed on the Amazon product detail page. For multiple authours, They'll appear
                                        in
                                        the same sequence as you add them below.</P>
                                    <div class="col-lg-12">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Contributors (Optional) <span
                                                        class="text-danger">*</span></label>
                                                <div class="">
                                                    <div class="group_wrapper">
                                                        <table id="itemTable" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-black">Language</th>
                                                                    <th class="text-black">Other</th>
                                                                    <th class="text-black">File</th>
                                                                    <th class="text-black">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="field_wrapper">
                                                                <tr class="item">
                                                                    <td><select class="default-select wide form-control"
                                                                            id="validationCustom05">
                                                                            <option data-display="Select">Please select
                                                                            </option>
                                                                            <option value="html">tamil</option>
                                                                        </select></td>
                                                                    <td><input type="text" class="form-control"
                                                                            placeholder="First Name"></td>
                                                                    <td><input type="file" class="form-control"
                                                                            placeholder="Last Name"></td>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="add_button_new2 btn btn-sm btn-primary"
                                                                            title="Add field"><i
                                                                                class="fa fa-plus"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Contributors cannot be edited agter your book has been
                                                        published.
                                                        Click here to learn more.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                        <section class="bg-light-new">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Publication Details</h4>
                            </div>
                            <div class="col-md-10">

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">
                                                Name of Publisher <span class="text-danger">*</span></label>
                                                @if(auth('publisher')->user())
                                                    <div class="input-group">
                                                <input type="text" class="form-control" id="nameOfPublisher"
                                                    name="nameOfPublisher" placeholder="Enter the Name of Publisher" value="{{auth('publisher')->user()->publicationName}}" readonly
                                                  >
                                                    @else
                                                    <div class="input-group">
                                                <input type="text" class="form-control" id="nameOfPublisher"
                                                    name="nameOfPublisher" placeholder="Enter the Name of Publisher" required
                                                  >
                                                    @endif


                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                            for="validationCustomUsername"> Year Of Publication <span class="text-danger">*</span>
                                                </label>
                                            <div class="input-group transparent-append">
                                                <input type="text" name="yearOfPublication" id="yearOfPublication" class="form-control" placeholder="Enter Year Of Publication.." pattern="\d{4}" title="Please enter exactly 4 numbers" maxlength="4" required>
                                            </div>
                                        </div>
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Place of publication<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="text" class="form-control" id="place"
                                                            name="place" placeholder="Enter place of publication.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                         
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <section class="bg-light-new">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Categorization</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="col-lg-12">
                                     <div class="basic-form">
 
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Book Category <span
                                                            class="text-danger">*</span></label>
                                                    <select class="default-select wide form-control" id="category"
                                                        name="category" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('special_categories')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                </div>
                                         
                                          
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Subject <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                    <select class="form-control" id="subjects1" name="subject" required>
                                                        <option value="">Select One</option>
                                                     
                                                    </select>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                         
         
    </div>
</div>
</div>

                        </div>
                    </section>

                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book Details</h4>
                            </div>
                            <div class="col-md-10">
                                <!-- <P class="fs-4"> Enter the primary author or contributor. Pen names are allowed.
                                    Additional authors can be addedd in the contributors field. This field cannot be
                                    changed after your book is published. <a href="#">Learn more about
                                        authorship.</a>
                                </P> -->
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <!-- <h4>Book Details</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Book Binding <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">

                                                        <input type="number" class="form-control" id=""
                                                            name="" placeholder="Enter Book Binding.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Book Size <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">

                                                        <input type="number" class="form-control" id=""
                                                            name="" placeholder="Enter Book Size.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">GSM <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="gsm" name="gsm"
                                                            placeholder="Enter GSM.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                        <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Paper Quality <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="quality"
                                                            name="quality" placeholder="Enter Paper Quality.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Page <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="" placeholder="Enter Page.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Primary <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id=""
                                                            name="" placeholder="Enter Primary.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <h4>Binding</h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form>
                                                    <div class="mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    id="paperback1" name="type" value="Paperback"
                                                                    checked="">Paper Back
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    id="hardbound" name="type"
                                                                    value="Hardbound">Hard
                                                                Bound
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <h4>Dimension</h4>
                                        <hr>
                                        <div class="row">
                                        <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername"> Size <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <select class="default-select wide form-control" id="size"
                                                        name="size" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_sizes')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <!-- <input type="number" class="form-control" id="height_width"
                                                            name="height" placeholder="Enter Height.." required> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername"> Length x Breadth(in Centimeters) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <select class="default-select wide form-control" id="length_breadth"
                                                        name="length_breadth" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_dimensions')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <!-- <input type="number" class="form-control" id="height_width"
                                                            name="height" placeholder="Enter Height.." required> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Width(in Centimeters) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <!-- <input type="number" class="form-control" id="width"
                                                            name="width" placeholder="Enter Width.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <!-- </div> -->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Width(in Centimeters) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="width" step="0.01"
                                                            name="width" placeholder="Enter width.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Weight(in grams) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="weight" step="0.01"
                                                            name="weight" placeholder="Enter weight.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Size <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="size" step="0.01"
                                                            name="size" placeholder="Enter weight.." required>

                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <h4>Paper</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">GSM (Number)<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                    <select class="default-select wide form-control" id="gsm"
                                                        name="gsm" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_gsm')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <!-- <input type="text" class="form-control" id="gsm"
                                                            name="gsm" placeholder="Enter GSM.." required> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Type of Paper <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <select class="default-select wide form-control" id="quality"
                                                        name="quality" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_papertype')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <!-- <input type="text" class="form-control" id="quality"
                                                            name="quality" placeholder="Enter Paper Quality.."
                                                            required> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Paper Finishing <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <select class="default-select wide form-control" id="paper_finishing"
                                                        name="paper_finishing" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('book_paperfinishing')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <!-- <input type="text" class="form-control" id="quality"
                                                            name="quality" placeholder="Enter Paper Quality.."
                                                            required> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Total Number of Pages <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="number" class="form-control" id="pages"
                                                            name="pages" placeholder="Enter Total Number of Pages.."
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Number of Multicolor Pages <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="multicolor"
                                                            name="multicolor"
                                                            placeholder="Enter Number of Multicolor Pages.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label text-black"
                                                            for="validationCustomUsername">Paper Quality <span
                                                                class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                            <!-- <input type="text" class="form-control"
                                                                id="validationCustomUsername"
                                                                placeholder="Enter Paper Quality..">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited agter your book has been
                                                                published.
                                                                Click here to learn more.
                                                            </div>
                                                        </div> -->
                                            <!-- </div>
                                                </div> -->
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Number of Mono Color Pages <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="number" class="form-control" id="monocolor"
                                                            name="monocolor"
                                                            placeholder="Enter Number of Mono Color Pages.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">ISBN-10/ISBN-13<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="isbn"
                                                            name="isbn" placeholder="Enter ISBN-10/ISBN-13.."   onkeyup="checkBookISBN()"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                    <span id="bookTitleError" class="text-danger"></span>

                                                </div>
                                            </div> -->
                                   
                                            {{-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">ISBN-13 <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="isbn13"
                                                            name="isbn13" placeholder="Enter ISBN-13.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Stock <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="stock" name="stock"
                                                            placeholder="Enter stock.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername"> Currency Type <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <select class="default-select wide form-control" id="currency_type"
                                                        name="currency_type" required>
                                                        <option value="">Select One</option>
                                                        @php
                                                          $categori = DB::table('currency_type')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                    </select>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Price<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="text" class="form-control" id="price"
                                                            name="price" placeholder="Enter Price.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
    <div class="mb-3">
        <label class="text-label form-label text-black"
            for="validationCustomUsername">Discount(%) <span class="text-danger">*</span></label>
        <div class="input-group">
            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

            <input type="number" class="form-control" id="discount"
                name="discount" placeholder="Enter discount.." required>
            <div class="invalid-feedback">
                Book Title cannot be edited agter your book has been
                published.
                Click here to learn more.
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label class="text-label form-label text-black"
            for="validationCustomUsername">Discounted Price<span class="text-danger">*</span></label>
        <div class="input-group">
            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
            <input type="number" class="form-control" id="discountedprice1"
                name="discountedprice1" placeholder="Enter Discounted Price.." hidden>
            <input type="number" class="form-control" id="discountedprice"
                name="discountedprice" placeholder="Enter Discounted Price.." disabled>
            <div class="invalid-feedback">
                Book Title cannot be edited agter your book has been
                published.
                Click here to learn more.
            </div>
        </div>
    </div>
</div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black" for="validationCustomUsername">Short Description <span class="text-danger">*</span></label><br>
                                                    <span class="text-danger">Note: </span>Few lines only
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <textarea type="text" class="form-control" id="description" name="description" rows="3"
                                                            placeholder="Enter Description.." required></textarea>

                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                 
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book Tag</h4>
                            </div>
                            <div class="col-md-10">
                                <!-- <P class="fs-4">You can provide an edition number if this title is a new edition of
                                    an
                                    existing
                                    book.<a href="#">What counts as a new edition?</a></p> -->
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">Tag Name (Optional)</label>
                                            <div class="input-group">
                                                <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                <!-- <select id="tagSelect" name="booktag[]" multiple="multiple" style="width: 200px;">
                                                </select> -->
                                                <select id="multi-value-select" name="tag[]" multiple="multiple">
                                                @php
                                                          $categori = DB::table('special_categories')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Edition Number cannot be edited agter your book has been
                                                    published.
                                                    Click here to learn more.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- <section class="bg-light-new mt-4">
                            <div class="row p-3">
                                <div class="col-md-2">
                                    <h4>Add Book Images</h4>
                                </div>
                                <div class="col-md-10">
                                    <P class="fs-4">You can provide an edition number if this title is a new edition of
                                        an
                                        existing
                                        book.<a href="#">What counts as a new edition?</a></p>
                                    <div class="col-lg-12">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Tag Name (Optional)<span
                                                        class="text-danger">*</span></label>
                                                <div id="image-container">
                                                    <div id="image-slot">
                                                        Agregar nueva imagen
                                                        <input type="file" id="image-upload" multiple
                                                            style="display: none;">
                                                    </div>
                                                </div>

                                                <div id="fullscreen-modal">
                                                    <img id="fullscreen-image" src="" alt="">
                                                    <button id="prev-image">&#10094;</button>
                                                    <button id="next-image">&#10095;</button>
                                                    <button id="close-modal">X</button>
                                                </div>

                                                <div id="toast" style="display: none;">
                                                    Sólo es posible cargar hasta 8 imágenes
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Add Book Images</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">You can provide up to 8 images including some key illustrations with a minimum of 3 compulsory cover images</p>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Front<span
                                                        class="text-danger">*</span></label>
                                                <div class="small-12 medium-2 large-2 columns">
                                                    <div class="circle">
                                                        <img class="profile-pic"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button"></i>
                                                        <input class="file-upload" name="front_img" id="front"
                                                            type="file" accept="image/*" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Back<span
                                                        class="text-danger">*</span></label>
                                                <div class="small-12 medium-2 large-2 columns">
                                                    <div class="circle">
                                                        <img class="profile-pic_back"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button_back"></i>
                                                        <input class="file-upload_back" name="back_img"
                                                            id="back_img" type="file" accept="image/*"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Full Image<span
                                                        class="text-danger">*</span></label>
                                                <div class="small-12 medium-2 large-2 columns">
                                                    <div class="circle">
                                                        <img class="profile-pic_other"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Picture_icon_BLACK.svg/149px-Picture_icon_BLACK.svg.png?20180309172929">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button_other"></i>
                                                        <input class="file-upload_other" name="full_img"
                                                            id="full_img" type="file" accept="image/*"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="text-label form-label text-black"
                                                    for="validationCustomUsername">Other (Optional and Upload 8 Other
                                                    Images)<span class="text-danger"></span></label>
                                                <div class="small-12 medium-2 large-2 columns">
                                                    <!-- <div class="circle">
                                                        <img class="profile-pic_other"
                                                            src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*a3BHGbuAMpOaZj6HkTrNqA.png">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button_other"></i>
                                                        <input class="file-upload_other" name="other_img" id="other_img"
                                                            type="file" accept="image/*" multiple />
                                                    </div> -->
                                                    <input class="bg-white p-1" type="file" id="other_img"
                                                        name="other_img[]" accept="image/*" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>About the Author</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4">Please give a brief description about the author.</a>
                                </P>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Author Name <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="text" class="form-control"
                                                            id="author_name" name="author_name"
                                                            placeholder="Enter Author Name.." required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Author Image <span
                                                            class="text-danger"></span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input class="bg-white p-1" type="file" id="author_img"
                                                            name="author_img" accept="image/*">
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4>Description (Author's Bio)<span class="text-danger">*</span></h4>
                                            <!-- <div class="card-body custom-ekeditor">
                                                <div id="ckeditor" name="author_description" required></div>
                                            </div> -->
                                            <textarea name="author_description" id="author_description" ></textarea>

                                            <!-- <textarea name="author_description" required></textarea> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Book Highlights</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4"> Please mention some of the key highlights, Quotes, Phrases if any
                                    mentioned in the book.</a>
                                </P>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername"><span class="text-danger">Note:</span> Images of key highlights, Quotes, Phrases <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input class="bg-white p-1" type="file" id="banner_img"
                                                            name="banner_img[]" accept="image/*" multiple required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h4>Description<span class="text-danger">*</span></h4>
                                            <!-- <div class="card-body custom-ekeditor">
                                                <div id="ckeditor_new_new" name="bookdescription" required></div>
                                            </div> -->


                                            <table id="itemTable" class="table">
                                                <tbody class="field_wrapper_new_high">
                                                    <tr class="item">
                                                        <td>
                                                            <textarea name="bookdescription[]" class="form-control" required></textarea>
                                                        </td>
                                                        <td><a href="javascript:void(0);"
                                                                class="add_button_high btn btn-sm btn-primary"
                                                                title="Add field"><i class="fa fa-plus"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Blurb Description</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4"> Please Mention the summary / blurb of the book</a>
                                </P>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <!-- <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Book Images </label> -->
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <!-- <input class="bg-white p-1" type="file" id="product_img"
                                                            name="product_img" accept="image/*" multiple> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                       <h4>Description<span class="text-danger">*</span></h4>
                                        <textarea name="productdescription" id="productdescription" ></textarea>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Sample Book Details</h4>
                            </div>
                            <div class="col-md-10">
                                <P class="fs-4"> Please Mention the summary / Sample Book Details (Upload epub or pdf files only)</a>
                                </P>
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <!-- <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Book Images </label> -->
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <!-- <input class="bg-white p-1" type="file" id="product_img"
                                                            name="product_img" accept="image/*" multiple> -->
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 form-group mt-4 mb-4">
                                                <label for="sex">Select file format <span class="text-danger ms-2">*</span></label><br>
                                                <div class="div">
                                                    <input type="radio" class="ms-2" id="attendingYes" name="sample_file" value="Epub" required>
                                                    <label for="attendingYes">Epub file</label><br>
                                                    <input type="radio" class="ms-2" id="attendingNo" name="sample_file" value="Pdf">
                                                    <label for="attendingNo">PDF file</label><br>
                                                </div>
                                            </div>
                                                <div class="col-sm-12 col-md-6 form-group mt-2" style="display:none" id="fileInputYes" class="hidden">
                                                    <label for="fname">Upload Epub file <span class="text-danger ms-2">*</span></label><br>
                                                    <input type="file" id="sample_epub" name="sample_epub" >
                                                </div>

                                                <div class="col-sm-12 col-md-6  form-group mt-2" style="display:none" id="fileInputNo" class="hidden">
                                                    <label for="fname">Upload PDF file <span class="text-danger ms-2">*</span></label><br>
                                                    <input type="file" id="sample_pdf" name="sample_pdf" >
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <div class="row">
                        <div class="col-md-12 text-end mt-5">
                            <button type="submit" class="btn me-2 btn-primary" id="submitbutton">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
  <div class="modal-content">
    <h2 id="modalTitle"></h2>
    <p id="modalMessage"></p>
    <button id="modalCloseBtn">Close</button>
  </div>
</div>
    <!--**********************************
                Content body end
            ***********************************-->
    <!--**********************************
                Footer start
            ***********************************-->
    @include ('publisher_and_distributor.footer')
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
    include 'publisher_and_distributor/plugin/plugin_js.php';
    ?>
    <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <!-- <script>
    $(document).ready(function () {
        $("#submitbutton").click(function () {
            var seriesNumbers = document.getElementsByName('series_number[]');
            var seriesTitles = document.getElementsByName('series_title[]');
            var isbnNumbers = document.getElementsByName('isbn_number[]');

            if (!validateSeriesField(seriesNumbers[0].value.trim(), 'Series Number') ||
                !validateSeriesField(seriesTitles[0].value.trim(), 'Series Title') ||
                !validateSeriesField(isbnNumbers[0].value.trim(), 'ISBN Number')) {
                // Validation failed
                return;
            }

            // Proceed with form submission
            $('#imageForm').submit();
        });
    });

    function validateSeriesField(value, fieldName) {
        if (value) {
            toastr.error('Please enter series number series title and isbn number for the first series.');
            return false;
        }
        return true;
    }
</script> -->
<script>
    // JavaScript code
    function calculateDiscount() {
        var price = parseFloat(document.getElementById('price').value);
        var discount = parseFloat(document.getElementById('discount').value);
        
        if (!isNaN(price) && !isNaN(discount)) {
            var discountedPrice = Math.round(price - (price * discount / 100)); // Round to the nearest integer
            document.getElementById('discountedprice').value = discountedPrice;       
                 document.getElementById('discountedprice1').value = discountedPrice;


        } else {

            document.getElementById('discountedprice').value = '';
            document.getElementById('discountedprice1').value = '';

        }
    }
    
    document.getElementById('price').addEventListener('keyup', calculateDiscount);
    document.getElementById('discount').addEventListener('keyup', calculateDiscount);
</script>
<script>
    $(document).ready(function () {
        // Event listener for radio buttons
        $('input[name="sample_file"]').change(function () {
            if ($(this).val() === 'Epub') {
                $('#fileInputYes').show();
                $('#fileInputNo').hide();
            } else {
                $('#fileInputYes').hide();
                $('#fileInputNo').show();
            }
        });
    });
</script>
<!-- <script>
    $(document).ready(function () {
        $("#submitbutton").click(function () {
            var description = document.getElementById('author_name').value;
            console.log(description);
            if (description) {
                validateForm();
            }
        });
    });

    function validateForm() {
        if (!$('#front').val()) {
            toastr.error('Please upload front images.');
        } else if (!$('#back_img').val()) {
            toastr.error('Please upload back images.');
        } else if (!$('#full_img').val()) {
            toastr.error('Please upload full images.');
        } else {
            $('#imageForm').submit();
        }
    }
</script> -->
<script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {
            var descriptionValue1 = tinymce.get("author_description").getContent().trim();
            var descriptionValue = tinymce.get("productdescription").getContent().trim();
            if (descriptionValue1) {
            if (!descriptionValue) {
                toastr.error('Please enter a description.');
                event.preventDefault();
            } else {
                validateForm();
            }
        }
        });


        function validateForm() {
            if (!$('#front').val()) {
                toastr.error('Please upload front images.');
            } else if (!$('#back_img').val()) {
                toastr.error('Please upload back images.');
            } else if (!$('#full_img').val()) {
                toastr.error('Please upload full images.');
            } else {
                $('#imageForm').submit();
            }
        }
    });
</script>
<script>
$(document).ready(function () {
    $('#other_img').change(function() {
        var files = $(this)[0].files;
        if (files.length > 8) {
            toastr.error('You can only upload a maximum of 8 Other Image.');
            // Clear the file input
            $(this).val('');
        }
    });
});
</script>
<script>
$(document).ready(function () {
    $('#banner_img').change(function() {
        var files = $(this)[0].files;
        if (files.length > 8) {
            toastr.error('You can only upload a maximum of 8 Book Highlights Book Image.');
            // Clear the file input
            $(this).val('');
        }
    });
});
</script>


<script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {
            var description = document.getElementById('author_name').value;

            if (description) {
                var descriptionValue = tinymce.get("author_description").getContent().trim();
            if (!descriptionValue) {
                toastr.error('Please enter a Author description.');
                event.preventDefault();
            }
            }
        });
    });

</script>
<!-- <script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {
            var description = document.getElementById('width').value;


            if (!description) {
                toastr.error('Please enter Width.');
                event.preventDefault();
            }

        });
    });

</script> -->

<script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {
            var description = document.getElementById('bookTitleInput').value;

            if (description) {
                var seriesTitle = document.getElementsByName('series_title[]')[0].value.trim();
                var seriesNumber = document.getElementsByName('series_number[]')[0].value.trim();
                var isbnNumber = document.getElementsByName('isbn_number[]')[0].value.trim();
                var isValid = false;

                if (seriesTitle === '' && seriesNumber === '' && isbnNumber === '') {
                    isValid = true;
                }
                if (seriesTitle !== '' && seriesNumber !== '' && isbnNumber !== '') {
                    isValid = true;
                }
                if (!isValid) {
                    event.preventDefault();
                    toastr.error('Please fill in all Series filed.');

                    return;
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {
            var description = document.getElementById('bookTitleInput').value;

            if (description) {
                var volumeTitle = document.getElementsByName('volume_title[]')[0].value.trim();
                var volumeNumber = document.getElementsByName('volume_number[]')[0].value.trim();
                var isbnNumber = document.getElementsByName('isbn_number1[]')[0].value.trim();
                var isValid = false;

                if (volumeTitle === '' && volumeNumber === '' && isbnNumber === '') {
                    isValid = true;
                }
                if (volumeTitle !== '' && volumeNumber !== '' && isbnNumber !== '') {
                    isValid = true;
                }
                if (!isValid) {
                    event.preventDefault();
                    toastr.error('Please fill in all volume filed.');

                    return;
                }
            }
        });
    });
</script>

    <script>
        // volume start

        function addInputRow() {
            const inputContainer = document.getElementById("inputContainer");
            const newRow = document.createElement("tr");

            const titleCell = document.createElement("td");
            titleCell.innerHTML =
                '<input type="text" name="volume_number[]" placeholder="Volume Number *" class="form-control" required>';
            newRow.appendChild(titleCell);

            const authorCell = document.createElement("td");
            authorCell.innerHTML =
                '<input type="text" name="volume_title[]" placeholder="Volume Title *" class="form-control" required>';
            newRow.appendChild(authorCell);

            const languageFromCell = document.createElement("td");
            languageFromCell.innerHTML =
                '<input type="text" name="isbn_number[]" placeholder="ISBN *" class="form-control" required>';
            newRow.appendChild(languageFromCell);

            const actionCell = document.createElement("td");
            actionCell.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeInputRow(this)">-</button>';
            newRow.appendChild(actionCell);

            inputContainer.appendChild(newRow);
        }

        function removeInputRow(button) {
            const row = button.closest("tr");
            row.remove();
        }
            // volume end


            //  series series
            function addInputRowseries() {
            const inputContainerseries = document.getElementById("inputContainerseries");
            const newRow = document.createElement("tr");

            const titleCell = document.createElement("td");
            titleCell.innerHTML =
                '<input type="text" name="series_number[]" placeholder="Series Number *" class="form-control" required>';
            newRow.appendChild(titleCell);

            const authorCell = document.createElement("td");
            authorCell.innerHTML =
                '<input type="text" name="series_title[]" placeholder="Series Title *" class="form-control" required>';
            newRow.appendChild(authorCell);

            const languageFromCell = document.createElement("td");
            languageFromCell.innerHTML =
                '<input type="text" name="isbn_number[]" placeholder="ISBN *" class="form-control" required>';
            newRow.appendChild(languageFromCell);

            const actionCell = document.createElement("td");
            actionCell.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeInputRowseries(this)">-</button>';
            newRow.appendChild(actionCell);

            inputContainerseries.appendChild(newRow);
        }

        function removeInputRowseries(button) {
            const row = button.closest("tr");
            row.remove();
        }
            // volume end
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor_new_new_lby'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor_new'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor_new_new'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        // add Language

        // $("#rowLanguage").click(function() {
        //     newRowAdd =
        //         '<div id="row"> <div class="input-group m-3">' +
        //         '<div class="input-group-prepend">' +
        //         '<button class="btn btn-danger" id="DeleteRow" type="button">' +
        //         '<i class="bi bi-trash"></i> Delete</button> </div>' +
        //         '<input type="text" class="form-control m-input"> </div> </div>';

        //     $('#newrowLanguage').append(newRowAdd);
        // });
        // $("body").on("click", "#DeleteRow", function() {
        //     $(this).parents("#row").remove();
        // })

        // add series

        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button> </div>' +
                '<input type="text" class="form-control m-input" id="series" name="series[]"> </div> </div>';

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>

    <script>
        // <!-- Contributors -->
        //     var max_group = 5;
        // var add_group = $('.add_group');
        // var group_wrapper = $('.group_wrapper');


        var max_field = 10;
        var add_button_fisrt = $('.add_button_new2');
        var wrapper = $('.field_wrapper');
        var html_fields = '' +
            '<tr class="item">' +
            '<td><select class="default-select wide form-control" id="validationCustom05"> <option data-display="Select">Please select</option> <option value="html">HTML</option> <option value="css">CSS</option><option value="javascript">JavaScript</option> <option value="angular">Angular</option> <option value="angular">React</option><option value="vuejs">Vue.js</option> <option value="ruby">Ruby</option><option value="php">PHP</option><option value="asp">ASP.NET</option> <option value="python">Python</option>  <option value="mysql">MySQL</option></select></td>' +
            '<td> <div class="form-group mb-0"> <input type="text" class="form-control" placeholder="First Name"> </div> </td> ' +
            '<td> <div class="form-group mb-0"> <input type="text" class="form-control" placeholder="Last Name"> </div> </td> ' +
            '<td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger"><i class="fa fa-minus"></i></a> </td>' +
            '</tr>';

        var x = 1;
        var y = 1;

        // $(add_group).click(function(){
        //     if( y < max_group){
        //         y++;
        //         $(group_wrapper).append(html_group);
        //     }

        // });


        // $(group_wrapper).on('click', '.remove_group', function(e){
        //     e.preventDefault();
        //     $(this).closest('group_wrapper').parent('table').remove();
        //     y--;
        // });


        $(add_button_fisrt).click(function() {
            alert()
            if (x < max_field) {
                x++;
                $(this).closest(wrapper).append(html_fields);
            }
        });



        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            x--;
        });



        //     var max_field1 = 10;
        //     var add_button = $('.add_button');
        //     var wrapper1 = $('.field_wrapper_new');
        //     var html_fields1 = '' +
        //         '<tr class="item">' +
        //         '<td> <div class="form-group mb-0"> <input type="text" class="form-control" id="trans_author" name="trans_author[]" placeholder="Translater Author Or Contributor	"> </div> </td> ' +

        //         '<td> <a href="javascript:void(0);" class="remove_button_high btn btn-sm btn-danger"><i class="fa fa-minus"></i></a> </td>' +
        //         '</tr>';

        //     var x = 1;
        //     var y = 1;



        //     $(add_button).click(function() {
        //         if (x < max_field1) {
        //             x++;
        //             $(this).closest(wrapper1).append(html_fields1);
        //         }
        //     });

        //
        var max_field1 = 10;
        var add_button_high = $('.add_button_high');
        var wrapper_high = $('.field_wrapper_new_high');
        var html_fields_high = '' +
            '<tr class="item">' +
            '<td> <div class="form-group mb-0"> <textarea name="bookdescription[]" class="form-control" required></textarea> </div> </td> ' +

            '<td> <a href="javascript:void(0);" class="remove_button_high btn btn-sm btn-danger"><i class="fa fa-minus"></i></a> </td>' +
            '</tr>';

        var x1 = 1;
        var y = 1;



        $(add_button_high).click(function() {
            if (x1 < max_field1) {
                x++;
                $(this).closest(wrapper_high).append(html_fields_high);
            }
        });

        $(wrapper_high).on('click', '.remove_button_high', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            x1--;
        });

        $(wrapper1).on('click', '.remove_button_new', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            x--;
        });

        $('.js-example-responsive').select2({
            placeholder: 'Select an option'
        });
    </script>
    <script>
        // front
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
        // back
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic_back').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload_back").on('change', function() {
                readURL(this);
            });

            $(".upload-button_back").on('click', function() {
                $(".file-upload_back").click();
            });
        });
        // other
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic_other').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload_other").on('change', function() {
                readURL(this);
            });

            $(".upload-button_other").on('click', function() {
                $(".file-upload_other").click();
            });
        });
    </script>
    <script>
$("input[name='language']").change(function () {

   var lang = $(this).val();
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type: "post",
      dataType: "json",
      url: '/publisher_and_distributor/getlanguage',
      data: {'lang':lang},
       success: function(response) {
           var subjects22 = response.subjects;
           $('#subjects1').empty();
           $('#subjects1').append('<option value="">Select One</option>');
           $.each(subjects22, function(key, value) {
               $('#subjects1').append('<option value="' + value.name + '">' + value.name + '</option>');
           });
           if(lang == "Tamil"){
            var customMessage = "தமிழ் புத்தகங்களுக்கு தமிழில் மட்டுமே விவரங்கள் பதிவேற்றம் செய்ய வேண்டும்";
           }else{
            var customMessage =  "Details for English or other language books should be submitted in English.";
           }
           
           var customTitle = "";
       

  customAlert(customTitle, customMessage);

  var closeButton = document.getElementById("modalCloseBtn");
  closeButton.addEventListener("click", closeModal);
       },
       error: function(xhr, status, error) {
           console.error(error);
       }
   });
});
function customAlert(title, message) {
    var modal = document.getElementById("myModal");
    var titleElement = document.getElementById("modalTitle");
    var messageElement = document.getElementById("modalMessage");

    titleElement.textContent = title;
    messageElement.textContent = message;

    modal.style.display = "block";
  }

  // Function to close the modal
  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }

    </script>
    <!-- book tag -->
    <script>
        // Initialize Select2 for tagging
        $(document).ready(function() {
            $('#tagSelect').select2({
                tags: true,
                tokenSeparators: [',', ' '],
            });
        });


        $('#tagSelect').on('select2:select select2:unselect', function(e) {
            var selectedTags = $('#tagSelect').val();
            console.log('Selected Tags: ' + selectedTags);
            $('#selectedTags').text('Selected Tags: ' + selectedTags.join(', '));
        });
    </script>
<script>
    // Hide initially
    $('.book_primary_lang, .book_primary_lang_forein').hide();

    // Function to hide visibility and required attribute
    function hideVisibility(element, input) {
        $(element).hide();
        $(input).prop('required', false);
    }

    // Radio button click event handlers
    $("input[name='language']").change(function () {
        if ($(this).val() === 'Other_Indian') {
            $('.book_primary_lang_forein').hide();
            $('#other2').prop('required', false);
            $('.book_primary_lang').show();
            $('#other1').prop('required', true);
        } else if ($(this).val() === 'Other_Foreign') {
            $('.book_primary_lang').hide();
            $('#other1').prop('required', false);
            $('.book_primary_lang_forein').show();
            $('#other2').prop('required', true);
        } else {
            $('.book_primary_lang, .book_primary_lang_forein').hide();
            $('#other1, #other2').prop('required', false);
        }
    });
</script>

<script>
    $(document).ready(function () {
        $("#submitbutton").click(function (event) {

                const selectedFormat = document.querySelector('input[name="sample_file"]:checked').value;

                if (selectedFormat === 'Epub') {
                    const epubFileInput = document.getElementById('samle_epub');
                    if (!epubFileInput.files.length || !isEpubFile(epubFileInput.files[0])) {
                        // alert('Please select a valid EPUB file.');
                        toastr.error('Please upload valid EPUB file.');

                        event.preventDefault();
                        return false;
                    }
                } else if (selectedFormat === 'Pdf') {
                    const pdfFileInput = document.getElementById('sample_pdf');
                    if (!pdfFileInput.files.length || !isPdfFile(pdfFileInput.files[0])) {
                        // alert('Please select a valid PDF file.');
                        toastr.error('Please upload valid PDF file.');

                        event.preventDefault();
                        return false;
                    }
                } else {
                    alert('Please select either EPUB or PDF format.');
                    event.preventDefault();
                    return false;
                }



            return true;
        });

        function isEpubFile(file) {
            return file && file.type === 'application/epub+zip';
        }

        function isPdfFile(file) {
            return file && file.type === 'application/pdf';
        }
    });
</script>


 <script>
    function checkBookISBN() {
        var bookisbn = $('#isbn').val();
        console.log(bookisbn);
        $.ajax({
            type: 'POST',
            url: '/publisher_and_distributor/isbn',
            data: {
                '_token': '{{ csrf_token() }}',
                'bookisbn': bookisbn
            },
            success: function(response) {
                if (response.error) {
                    $('#bookTitleError').text(response.error);
                } else {
                    $('#bookTitleError').text('');
                }
            }
        });
    }

    function submitForm(event) {
        checkBookISBN();

        var errorSpan = $('#bookTitleError');
        if (errorSpan.text().trim() !== "") {
            event.preventDefault();

            toastr.error(errorSpan.text());
        } else {
            errorSpan.text('');
            // document.forms[0].submit();
        }
    }

    $(document).ready(function() {
        $('#submitbutton').on('click', submitForm);
    });
</script>




</body>

<script>
function numberOnly(id) {
   var element = document.getElementById(id);
   element.value = element.value.replace(/[^0-9]/gi, "");
}
</script>

@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}", {
            timeout: 15000
        });
    </script>
@elseif (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}", {
            timeout: 15000
        });
    </script>
@endif
<script>
      $(document).ready(function () {
    tinymce.init({
        selector: "#productdescription",
        plugins: 'advlist lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | removeformat | link image | charmap | print preview anchor | searchreplace visualblocks code fullscreen | insertdatetime media table | paste code help wordcount',
    });
});
</script>
<script>
      $(document).ready(function () {
    tinymce.init({
        selector: "#author_description",
        plugins: 'advlist lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | removeformat | link image | charmap | print preview anchor | searchreplace visualblocks code fullscreen | insertdatetime media table | paste code help wordcount',
    });
});
</script>
</html>
<style>
    section.bg-light-new {
        background-color: #d7dadd80;
    }

    #image-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .image-wrapper,
    #image-slot {
        flex: 0 0 calc(25% - 10px);
        aspect-ratio: 1/1;
        /* Para mantenerlo cuadrado */
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .image-options {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 255, 255, 0.5);
        padding: 5px;
        cursor: pointer;
    }

    .context-menu {
        position: absolute;
        top: 0;
        left: 100%;
        display: none;
        background-color: white;
        border: 1px solid #ccc;
        z-index: 10;
    }

    #image-slot {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f7f7f7;
        border: 2px dashed #ccc;
        cursor: pointer;
    }

    #fullscreen-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 100;
    }

    #fullscreen-image {
        max-width: 80%;
        max-height: 80%;
    }

    #prev-image,
    #next-image,
    #close-modal {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.7);
        border: none;
        cursor: pointer;
        z-index: 101;
    }

    #prev-image {
        left: 10px;
    }

    #next-image {
        right: 10px;
    }

    #close-modal {
        top: 10px;
        right: 10px;
    }

    .toast {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .sortable-ghost {
        opacity: 0.5;
    }

    .sortable-chosen {
        transform: scale(1.05);
    }

    .file-upload {
        display: none;
    }

    .file-upload_back {
        display: none;
    }

    .file-upload_other {
        display: none;
    }

    .circle {
        /* border-radius: 100% !important; */
        overflow: hidden;
        width: 128px;
        /* height: 128px; */
        border: 2px solid rgba(255, 255, 255, 0.2);
        /* position: absolute; */
        /* top: 72px; */
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .p-image {
        position: absolute;
        /* top: 167px;
  right: 30px; */
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .upload-button {
        font-size: 1.2em;
    }

    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
    .table thead th {
    border-bottom: 0.0625rem solid #E6E6E6;
    text-transform: inherit !important;
    font-size: 1rem;
    white-space: nowrap;
    font-weight: 500;
    border-color: #E6E6E6 !important;
}
.tox-promotion {
    display: none;
}
span.tox-statusbar__branding {
    display: none;
}
input#other_img {
    width: 100%;
}

    /* image uplode end */
</style>
<style>
    /* Styles for the modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    /* Styles for the modal content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Adjust width as needed */
      max-width: 300px; /* Set a maximum width */
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 10px; /* Rounded corners */
    }

    /* Close button styles */
    .modal-footer {
      text-align: center;
      margin-top: 20px;
    }

    #modalCloseBtn {
      background-color: #007bff; /* Button color */
      color: #fff; /* Button text color */
      border: none;
      padding: 5px 10px; /* Adjust button size */
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px; /* Adjust font size */
    }
  </style>