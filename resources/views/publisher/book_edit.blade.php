@php
  $bookhighlights = $data->banner_img1;
$booktag = $data->booktag1;
$otherImages = $data->other_img1;
$bookdescription = $data->bookdescription1;

@endphp
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
    include 'publisher/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #title {
        width: 900px;
        min-height: 18px;
        margin: 10px auto;
        text-align: center;
        font-size: 16px;
        color: #E2E2E2;
        font-weight: 400;
        }

        #title:hover {
        color: #777;
        }

        #viewer.spreads {
        width: 900px;
        height: 600px;
        box-shadow: 0 0 4px #ccc; */
        border-radius: 5px;
        padding: 0;
        margin: 10px auto;
        background: white url('ajax-loader.gif') center center no-repeat;
        top: calc(50vh - 400px);
        }

        #viewer.spreads .epub-view > iframe {
            background: white;
        }

        #viewer.scrolled {
        overflow: hidden;
        width: 800px;
        margin: 0 auto;
        position: relative;
        background: url('ajax-loader.gif') center center no-repeat;

        }

        #viewer.scrolled .epub-container {
        background: white;
        box-shadow: 0 0 4px #ccc;
        margin: 10px;
        padding: 20px;
        }

        #viewer.scrolled .epub-view > iframe {
            background: white;
        }

        #prev {
        left: 0;
        }

        #next {
        right: 0;
        }

        #toc {
        display: block;
        margin: 10px auto;
        }

        @media (min-width: 1000px) {
        #viewer.spreads:after {
            position: absolute;
            width: 1px;
            height: auto;
            border-right: 1px #000 solid;
            z-index: 1;
            left: 50%;
            margin-left: -1px;
            top: 5%;
            opacity: .15;
            box-shadow: -2px 0 15px rgba(0, 0, 0, 1);
            content:  "";
        }

        #viewer.spreads.single:after {
            display: none;
        }

        #prev {
            left: 73px;
        }

        #next {
            right: 0px;
        }
        }

        .arrow {
        top: 50%;
        margin-top: -32px;
        font-size: 64px;
        color: #000000;
        font-family: arial, sans-serif;
        font-weight: bold;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        text-decoration: none;
        }

        .navlink {
        margin: 14px;
        display: block;
        text-align: center;
        text-decoration: none;
        color: #ccc;
        }

        .arrow:hover, .navlink:hover {
        color: #777;
        }

        .arrow:active, .navlink:hover {
        color: #000;
        }

        /* #book-wrapper {
        width: 480px;
        height: 640px;
        overflow: hidden;
        border: 1px solid #ccc;
        margin: 28px auto;
        background: #fff;
        border-radius: 0 5px 5px 0;
        position: absolute;
        } */

        /* #book-viewer {
        width: 480px;
        height: 660px;
        margin: -30px auto;
        -moz-box-shadow:      inset 10px 0 20px rgba(0,0,0,.1);
        -webkit-box-shadow:   inset 10px 0 20px rgba(0,0,0,.1);
        box-shadow:           inset 10px 0 20px rgba(0,0,0,.1);
        } */

        #book-viewer iframe {
        padding: 40px 40px;
        }

        #controls {
        position: absolute;
        bottom: 16px;
        left: 50%;
        width: 400px;
        margin-left: -200px;
        text-align: center;
        display: none;
        }

        #controls > input[type=range] {
            width: 400px;
        }

        #navigation {
        width: 400px;
        height: 100vh;
        position: absolute;
        overflow: auto;
        top: 0;
        left: 0;
        background: #777;
        -webkit-transition: -webkit-transform .25s ease-out;
        -moz-transition: -moz-transform .25s ease-out;
        -ms-transition: -moz-transform .25s ease-out;
        transition: transform .25s ease-out;

        }

        #navigation.fixed {
        position: fixed;
        }

        #navigation h1 {
        width: 200px;
        font-size: 16px;
        font-weight: normal;
        color: #fff;
        margin-bottom: 10px;
        }

        #navigation h2 {
        font-size: 14px;
        font-weight: normal;
        color: #B0B0B0;
        margin-bottom: 20px;
        }

        #navigation ul {
        padding-left: 36px;
        margin-left: 0;
        margin-top: 12px;
        margin-bottom: 12px;
        width: 340px;
        }

        #navigation ul li {
        list-style: decimal;
        margin-bottom: 10px;
        color: #cccddd;
        font-size: 12px;
        padding-left: 0;
        margin-left: 0;
        }

        #navigation ul li a {
        color: #ccc;
        text-decoration: none;
        }

        #navigation ul li a:hover {
        color: #fff;
        text-decoration: underline;
        }

        #navigation ul li a.active {
        color: #fff;
        }

        #navigation #cover {
        display: block;
        margin: 24px auto;
        }

        #navigation #closer {
        position: absolute;
        top: 0;
        right: 0;
        padding: 12px;
        color: #cccddd;
        width: 24px;
        }

        #navigation.closed {
        -webkit-transform: translate(-400px, 0);
        -moz-transform: translate(-400px, 0);
        -ms-transform: translate(-400px, 0);
        }

        svg {
        display: block;
        }

        .close-x {
        stroke: #cccddd;
        fill: transparent;
        stroke-linecap: round;
        stroke-width: 5;
        }

        .close-x:hover {
        stroke: #fff;
        }

        #opener {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px;
        stroke: #E2E2E2;
        fill: #E2E2E2;

        }

        #opener:hover {
        stroke: #777;
        fill: #777;
        }
    </style>
    <style>
        .avatar-preview {
        width: 150px;
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
            display: none !important;
        }
    
        .file-upload_back {
            display: none !important;
        }
    
        .file-upload_other {
            display: none !important;
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
    
        /* Book Highlights */
    
        input[type="file"] {
            display: block;
        }
    
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
    
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
    
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
    
        .remove:hover {
            background: white;
            color: black;
        }
    
        /* Other images Css */
    
        input[type="file"] {
            display: block;
        }
    
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
    
        /* .other_image_files {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
     */
        .remove_other_images {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
    
        .remove_other_images:hover {
            background: white;
            color: black;
        }
    
        .toast-error {
        background-color: red !important;
        }
        .tox-promotion {
                display: none;
            }
            span.tox-statusbar__branding {
                display: none;
            }
            a.dropdown-item.ai-icon{
                display: flex;
            }
        @media screen and (max-width: 600px) {
            .custom-control.custom-radio.newother {
                display: flex;
            }
         }
    </style>
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
        @include ('publisher.navigation')
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
                                <b>Edit Book</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('publisher/book_manage_all') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Book </a>
                        </div>
                    </div>
                </div>
                <form class="row g-3 mt-2" method="POST" enctype="multipart/form-data" id ="ourFormId" action="/publisher/update/book"
                    autocomplete="on">
                    @csrf
                    <input type="text" value="{{$data->id}}" name="id" hidden>
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
                                                            name="isbn" placeholder="Enter ISBN-10/ISBN-13.." value="{{$data->isbn}}"  onkeyup="checkBookISBN()"
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
                            <label for="text">Language of the book<span class="text-danger maditory">*</span></label></label>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="lang1" name="language" class="custom-control-input" value="Tamil" @if($data->language == "Tamil") checked @endif required>
                                <label class="custom-control-label" for="lang1">Tamil</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="lang2" name="language" class="custom-control-input" value="English" @if($data->language == "English") checked @endif  required>
                                <label class="custom-control-label" for="lang2">English</label>
                            </div>
                            <div class="custom-control custom-radio newother">
                                <input type="radio" id="book_primary_language_new" name="language" class="custom-control-input" value="Other_Indian" @if($data->language == "Other_Indian") checked @endif required>
                                <label class="custom-control-label" for="book_primary_language_new">Other Indian Languages (please specify)</label>
                            </div>
                            <div class="col-md-12 book_primary_lang mb-2">
                                <input type="text" class="form-control" id="other1" name="Other_Indian" placeholder="Enter Other Indian Languages (please specify)" value="@if($data->Other_Indian != null) {{$data->Other_Indian}} @endif">
                            </div>
                            <div class="custom-control custom-radio newother">
                                <input type="radio" id="book_primary_language_new_forein" name="language" class="custom-control-input" value="Other_Foreign" @if($data->language == "Other_Foreign") checked @endif required>
                                <label class="custom-control-label" for="book_primary_language_new_forein">Other Foreign Languages (please specify)</label>
                            </div>
                            <div class="col-md-12 book_primary_lang_forein mb-2">
                                <input type="text" class="form-control" id="other2" name="Other_Foreign" placeholder="Enter Other Foreign Languages (please specify)" value="@if($data->Other_Foreign != null) {{$data->Other_Foreign}} @endif">
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
                                                    name="book_title" placeholder="Enter the Book Title.." value="{{$data->book_title}}" required
                                                    onkeyup="checkBookTitle()">

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername">Subtitle
                                                (Optional) </label>
                                            <div class="input-group transparent-append">
                                            <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Enter Subtitle.." value="@if($data->subtitle != null) {{ $data->subtitle }} @endif">

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
                                                                placeholder="Enter Primary Author or
                                                                Contributor" value="@if($data->primaryauthor1[0] != null) {{ $data->primaryauthor1[0] }} @endif"
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
                                                                placeholder="Enter Secondary Author" value="@if($data->primaryauthor1[1] != null) {{ $data->primaryauthor1[1] }} @endif">
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
                                                                placeholder="Enter Tertiary Author" value="@if($data->primaryauthor1[2] != null) {{ $data->primaryauthor1[2] }} @endif">
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
                                                            for="validationCustomUsername">Translator One
                                                        </label>
                                                        <div class="input-group">
                                                            <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                            <input type="text" class="form-control"
                                                                id="trans_author" name="trans_author[]"
                                                                placeholder="Enter Translator One.." value="@if($data->trans_author1 != null && $data->trans_author1[0] != null) {{ $data->trans_author1[0] }} @endif">
                                                            <div class="invalid-feedback">
                                                                Book Title cannot be edited after your book has been
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
                                                                placeholder="Enter Translator Two.." value="@if($data->trans_author1 != null && $data->trans_author1[1] != null) {{ $data->trans_author1[1] }} @endif">
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
                                                                placeholder="Enter Translator Three.." value="@if($data->trans_author1 != null && $data->trans_author1[2] != null) {{ $data->trans_author1[2] }} @endif">
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
                                                                placeholder="Translated to." value="@if($data->trans_from1 != null && $data->trans_from1[0] != null) {{ $data->trans_from1[0] }} @endif">
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
                                                                placeholder="Translated to." value="@if($data->trans_from1 != null && $data->trans_from1[1] != null) {{ $data->trans_from1[1] }} @endif">
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
                        </div>
                    </section>
                    <section class="bg-light-new mt-4">
                        <div class="row p-3">
                            <div class="col-md-2">
                                <h4>Series</h4>
                            </div>
                            <div class="col-md-10">
                               <P class="fs-4">If the book is part of a series, provide details to identify the specific series it belongs to (Optional).</P>
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
                                                                    <th>Total Number Series <span
                                                                            class="text-danger maditory"></span></th>

                                                                    {{-- <th>Add</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody id="inputContainerseries">
                                                                @if($data->series == null)
                                                                <tr>
                                                                    <td><input type="text" name="series_title[]"
                                                                            placeholder="Series Title"
                                                                            class="form-control" >
                                                                        </td>
                                                                    <td>
                                                                        {{-- <small> <b class="text-danger">Note : </b>Sample Entry 2/10 total</small> --}}
                                                                        <input type="text" name="series_number[]"
                                                                            placeholder="Current Series Number"
                                                                            class="form-control"></td>
                                                                    <td><input type="text" name="isbn_number[]"
                                                                            placeholder="Total Number Series"
                                                                            class="form-control" ></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRowseries()">+</button></td> --}}
                                                                </tr>
                                                                @else
                                                                <tr>
                                                                    <td><input type="text" name="series_title[]"
                                                                            placeholder="Series Title" value="{{$data->series1[0]->series_title}}"
                                                                            class="form-control" >
                                                                        </td>
                                                                    <td>
                                                                        {{-- <small> <b class="text-danger">Note : </b>Sample Entry 2/10 total</small> --}}
                                                                        <input type="text" name="series_number[]"
                                                                            placeholder="Current Series Number"
                                                                            class="form-control" value="{{$data->series1[0]->series_number}}"></td>
                                                                    <td><input type="text" name="isbn_number[]"
                                                                            placeholder="Total Number Series"
                                                                            class="form-control" value="{{$data->series1[0]->isbn_number}}"></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRowseries()">+</button></td> --}}
                                                                </tr>
                                                                @endif
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
                                <P class="fs-4">If the book is part of a volume, provide details to identify the specific volume it belongs to (Optional).</P>
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
                                                                    <th>Total Number Volume <span
                                                                            class="text-danger maditory"></span></th>

                                                                    {{-- <th>Add</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody id="inputContainer">
                                                                @if($data->volume1 == null)
                                                                <tr>
                                                                    <td><input type="text" name="volume_title[]"
                                                                            placeholder="Volume Title"
                                                                            class="form-control" >
                                                                    <td><input type="text" name="volume_number[]"
                                                                            placeholder="Current Volume Number"
                                                                            class="form-control" ></td></td>
                                                                    <td><input type="text" name="isbn_number1[]"
                                                                            placeholder="Total Number Volume"
                                                                            class="form-control" ></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRow()">+</button></td> --}}
                                                                </tr>
                                                                @else
                                                                <tr>
                                                                    <td><input type="text" name="volume_title[]"
                                                                            placeholder="Volume Title"
                                                                            class="form-control" value="{{$data->volume1[0]->volume_title}}">
                                                                    <td><input type="text" name="volume_number[]"
                                                                            placeholder="Current Volume Number"
                                                                            class="form-control" value="{{$data->volume1[0]->volume_number}}" ></td></td>
                                                                    <td><input type="text" name="isbn_number1[]"
                                                                            placeholder="Total Number Volume"
                                                                            class="form-control"  value="{{$data->volume1[0]->isbn_number}}"></td>

                                                                    {{-- <td><button type="button" class="btn btn-success"
                                                                            onclick="addInputRow()">+</button></td> --}}
                                                                </tr>
                                                                @endif
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
                                                    name="edition_number" placeholder="Enter the Edition
                                                    Number.." value="@if($data->edition_number != null) {{ $data->edition_number }} @endif">
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
                                                    name="nameOfPublisher" placeholder="Enter the Name of Publisher" value="{{$data->nameOfPublisher}}" required
                                                  >
                                                    @endif


                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                            for="validationCustomUsername"> Year of Publication
                                                </label>
                                            <div class="input-group transparent-append">
                                                <input type="text" name="yearOfPublication" id="yearOfPublication" class="form-control" placeholder="Enter Year of Publication.." pattern="\d{4}" title="Please enter exactly 4 numbers" maxlength="4" value="{{$data->yearOfPublication}}" required>
                                            </div>
                                        </div>

                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Place of publication<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="text" class="form-control" id="place"
                                                            name="place" placeholder="Enter Place of publication.." value="{{$data->place}}" required>
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
                                                        @php
                                                          $categori = DB::table('special_categories')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                          @if($data->category == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                          @else
                                                          <option value="{{$val->name}}">{{$val->name}}</option>
                                                          @endif
                                                            @endforeach
                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">Subject <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <select class=" wide form-control" id="subjects1"
                                                        name="subject" required>

                                                        @php
                                                          $categori = DB::table('book_subject')->where('type','=',$data->language)->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                          @if($data->subject == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                          @else
                                                          <option value="{{$val->name}}">{{$val->name}}</option>
                                                          @endif

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
                                <div class="col-lg-12">
                                    <div class="basic-form">

                                        <h4>Binding</h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form>
                                                    <div class="mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">

                                                            <input type="radio" class="form-check-input" id="paperback1" name="type" value="Paperback" @if($data->type == "Paperback") checked @endif> Paperback

                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"
                                                                    id="hardbound" name="type"
                                                                    value="Hardbound" @if($data->type == "Hardbound") checked @endif>Hard
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

                                                        @php
                                                          $categori = DB::table('book_sizes')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            @if($data->size == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                            @else
                                                            <option value="{{$val->name}}">{{$val->name}}</option>
                                                            @endif
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

                                                        @php
                                                          $categori = DB::table('book_dimensions')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            @if($data->length_breadth == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                            @else
                                                            <option value="{{$val->name}}">{{$val->name}}</option>
                                                            @endif
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
                                                        for="validationCustomUsername">Width(in Centimeters) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="width" step="0.01"
                                                            name="width" placeholder="Enter width.." value="{{$data->width}}" required>
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
                                                        for="validationCustomUsername">Weight(in Grams) <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="number" class="form-control" id="weight" step="0.01"
                                                            name="weight" placeholder="Enter weight.." value="{{$data->weight}}" required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

                                                        @php
                                                          $categori = DB::table('book_gsm')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                          @if($data->gsm == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                         @else
                                                         <option value="{{$val->name}}">{{$val->name}}</option>
                                                         @endif
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

                                                        @php
                                                          $categori = DB::table('book_papertype')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            @if($data->quality == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                         @else
                                                         <option value="{{$val->name}}">{{$val->name}}</option>
                                                         @endif
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

                                                        @php
                                                          $categori = DB::table('book_paperfinishing')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                          @if($data->paper_finishing == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                         @else
                                                         <option value="{{$val->name}}">{{$val->name}}</option>
                                                         @endif

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
                                                            name="pages" placeholder="Enter Total Number of Pages.." value="{{$data->pages}}"
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
                                                            placeholder="Enter Number of Multicolor Pages.." value="{{$data->multicolor}}" required>
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
                                                        for="validationCustomUsername">Number of Mono Color Pages <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <input type="number" class="form-control" id="monocolor"
                                                            name="monocolor"
                                                            placeholder="Enter Number of Mono Color Pages.." value="{{$data->monocolor}}" required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          {{--  <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="text-label form-label text-black"
                                                        for="validationCustomUsername">ISBN-10/ISBN-13<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->
                                                        <input type="text" class="form-control" id="isbn"
                                                            name="isbn" placeholder="Enter ISBN-10/ISBN-13.." value="{{$data->isbn}}"  onkeyup="checkBookISBN()"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Book Title cannot be edited agter your book has been
                                                            published.
                                                            Click here to learn more.
                                                        </div>
                                                    </div>
                                                    <span id="bookTitleError" class="text-danger"></span>

                                                </div>
                                            </div>--}}



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

                                                        @php
                                                          $categori = DB::table('currency_type')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                          @if($data->currency_type == $val->name)
                                                            <option value="{{$val->name}}" selected>{{$val->name}}</option>
                                                          @else
                                                          <option value="{{$val->name}}">{{$val->name}}</option>
                                                          @endif

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
                                                            name="price" placeholder="Enter Price.." value="{{$data->price}}" required>
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

            <input type="number" class="form-control" value="{{$data->discount}}" id="discount"
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
            <input type="number" class="form-control" value="{{$data->discountedprice}}" id="discountedprice1"
                name="discountedprice1" placeholder="Enter Discounted Price.." hidden>
            <input type="number" class="form-control" id="discountedprice"
                name="discountedprice" placeholder="Enter Discounted Price.." value="{{$data->discountedprice}}" disabled>
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
                                                    <label class="text-label form-label text-black" for="validationCustomUsername">Short Description <span class="text-danger">*</span></label><br>
                                                    <span class="text-danger">Note: </span>Few lines only
                                                    <div class="input-group">
                                                        <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                        <textarea type="text" class="form-control" id="description" name="description" rows="3"
                                                            placeholder="Enter Description.."  required>{{$data->description}}</textarea>

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
                                                @if($booktag == null)
                                                <select id="multi-value-select" name="tag[]" multiple="multiple">
                                                @php
                                                          $categori = DB::table('special_categories')->where('status','=','1')->get();
                                                          @endphp
                                                          @foreach($categori as $val)
                                                            <option value="{{$val->name}}">{{$val->name}}</option>

                                                            @endforeach
                                                </select>
                                                @else
                                                <select id="multi-value-select" name="tag[]" multiple="multiple">
    @php
    $categori = DB::table('special_categories')->where('status','=','1')->get();
    @endphp
    @foreach($categori as $val)
        <option value="{{ $val->name }}" @if(in_array($val->name, $booktag)) selected @endif>{{ $val->name }}</option>
    @endforeach
</select>
                                                @endif
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
                                                            src="{{ url('Books/front/'.$data->front_img) }}">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button"></i>
                                                        <input class="file-upload" name="front_img" id="front"
                                                            type="file" accept="image/*"/>
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
                                                            src="{{ url('Books/back/'.$data->back_img) }}">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button_back"></i>
                                                        <input class="file-upload_back" name="back_img"
                                                            id="back_img" type="file" accept="image/*"
                                                           />
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
                                                            src="{{ url('Books/full/'.$data->full_img) }}">

                                                    </div>
                                                    <div class="p-image">
                                                        <i class="fa fa-camera upload-button_other"></i>
                                                        <input class="file-upload_other" name="full_img"
                                                            id="full_img" type="file" accept="image/*"
                                                            />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                <div class="basic-form">
                                    <div class="mb-3 mt-5">
                                        <label class="text-label form-label text-black"
                                            for="validationCustomUsername">Other (Optional and Upload 8 Other
                                            Images)<span class="text-danger"></span></label>
                                        <div id="otherImagesContainer"class="small-12 medium-2 large-2 columns">

                                            <input class="bg-white p-1" type="file" id="other_img"
                                                name="other_img[]" accept="image/*" multiple>
                                            @if (!empty($otherImages))
                                                @forelse ($otherImages as $otherimg)
                                                    <span class="other_image_files" data-bookid="{{ $data->id }}" data-filename="{{ $otherimg }}">
                                                        <img class="imageThumb"
                                                        src="{{ url('Books/other_img/'.$otherimg) }}">

                                                        <span class="remove_other_images delete_image" >Remove image</span>
                                                    </span>
                                                @empty
                                                @endforelse
                                            @else
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                    <strong>Sorry!</strong> No Records
                                                </div>

                                            @endif


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
                                <h4>About the author</h4>
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
                                                            placeholder="Enter Author Name.." value="{{$data->author_name}}" required>
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
                                                for="validationCustomUsername">Upload Author Image <span
                                                    class="text-danger"></span></label>
                                            <div class="input-group">
                                                <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                <input class="bg-white p-1" type="file" id="author_img" name="author_img" accept="image/*">
                                                <div class="invalid-feedback">
                                                    Book Title cannot be edited agter your book has been
                                                    published.
                                                    Click here to learn more.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-label form-label text-black" for="validationCustomUsername">Author Image <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <div class="avatar-preview">
                                                <img src="{{ url('/Books/author_img/'.$data->author_img) }}" alt="" srcset="" id="author_image" class="mb-3">
                                            </div>

                                        </div>
                                </div>
                                <br>
                                        <div class="row">
                                            <h4>Description (Author's Bio)<span class="text-danger">*</span></h4>
                                            <!-- <div class="card-body custom-ekeditor">
                                                <div id="ckeditor" name="author_description" required></div>
                                            </div> -->
                                            <textarea name="author_description" id="author_description">{{$data->author_description}}</textarea>

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

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="text-label form-label text-black"
                                                for="validationCustomUsername"><span
                                                    class="text-danger">Note:</span> Images of key highlights, Quotes,
                                                Phrases <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <!-- <span class="input-group-text"> <i class="fa fa-user"></i> </span> -->

                                                {{-- <input class="bg-white p-1" type="file" id="banner_img"
                                                            name="banner_img[]" accept="image/*" multiple required> --}}
                                                <input accept="image/*" type="file" id="files" name="banner_img[]" multiple />
                                                @if (!empty($bookhighlights))
                                                    @forelse ($bookhighlights as $highlighImages)
                                                        <span class="pip" data-bookid="{{ $data->id }}" data-filename="{{ $highlighImages }}"><img class="imageThumb"
                                                                src="{{ url('/Books/banner/' . $highlighImages) }}">
                                                            <br>
                                                            <span class="remove highlights_delete">Remove image</span>
                                                        </span>
                                                    @empty
                                                    @endforelse
                                                @else
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert" aria-label="Close"></button>

                                                        <strong>Sorry!</strong>No Records
                                                    </div>

                                                @endif

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
                                                    <textarea name="bookdescription[]" class="form-control" required>
                                                        @php
                                                            if(isset($bookdescription[0])){
                                                                echo $bookdescription[0];
                                                            }
                                                        @endphp
                                                    </textarea>
                                                </td>
                                                <td><a href="javascript:void(0);"
                                                        class="add_button_high btn btn-sm btn-primary"
                                                        title="Add field"><i class="fa fa-plus"></i></a>
                                                </td>
                                            </tr>
                                            @if (!empty($bookdescription))
                                                @foreach ($bookdescription as $index => $description)
                                                    @if ($index === 0)
                                                        @continue
                                                    @endif
                                                    <tr class="item">
                                                        <td>
                                                            <div class="form-group mb-0">
                                                                <textarea name="bookdescription[]" class="form-control" required="">{{ $description }}</textarea>
                                                            </div>
                                                        </td>
                                                        <td> <a href="javascript:void(0);"
                                                                class="remove_button_high btn btn-sm btn-danger">
                                                                <i class="fa fa-minus"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                                    <strong>Sorry!</strong> No Record
                                                </div>

                                            @endif
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
                        <P class="fs-4"> Please ensure that a minimum of 25 pages or 25% of the total pages is uploaded</a>
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
                                    <textarea name="productdescription" id="productdescription">{{$data->productdescription}}</textarea>
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
                        <P class="fs-4">Please ensure that a minimum of 25 pages or 25% of the total pages is uploaded / Sample Book Details (Upload epub or pdf files only)</a>
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
                                        <label for="sex">Select file format <span
                                                class="text-danger ms-2">*</span></label><br>
                                        <div class="div">
                                            <input type="radio" class="ms-2" id="attendingYes"
                                                name="sample_file" value="Epub" >
                                            <label for="attendingYes">Epub file</label><br>
                                            <input type="radio" class="ms-2" id="attendingNo"
                                                name="sample_file" value="Pdf">
                                            <label for="attendingNo">PDF file</label><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group mt-2" style="display:none"
                                        id="fileInputYes" class="hidden">
                                        <label for="fname">Upload Epub file <span
                                                class="text-danger ms-2">*</span></label><br>
                                        <input type="file" id="sample_epub" name="sample_epub">
                                    </div>

                                    <div class="col-sm-12 col-md-6  form-group mt-2" style="display:none"
                                        id="fileInputNo" class="hidden">
                                        <label for="fname">Upload PDF file <span
                                                class="text-danger ms-2">*</span></label><br>
                                        <input type="file" id="sample_pdf" accept="application/pdf,application/vnd.ms-excel" value="Pdf" name="sample_pdf">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row container d-flex justify-content-between">
                    {{-- {{ $data->sample_pdf }} --}}
                    @isset($data->sample_pdf)
                    <div class="d-flex text-left"> Download here <a href="{{url('/Books/samplepdf/'.$data->sample_pdf)}}" class="p-2" target="_blank" rel="noopener noreferrer" download="true">{{ $data->sample_pdf }}</a></div>
                        <!-- <iframe src="https://docs.google.com/viewer?url={{url('/Books/samplepdf/'.$data->sample_pdf)}}&embedded=true" frameborder="0" height="500px" width="100%"></iframe> -->
                    @endisset

                    @isset($data->sample_epub)
                        <p class="h3">Select Your Topic</p>
                        <select id="toc" class="form-control"></select>
                        <div class="container m-0 p-0">
                            <a id="prev" href="#prev" class="arrow">‹</a>
                            <a id="next" href="#next" class="arrow">›</a>
                        </div>
                        <div id="viewer" class="spreads w-100"></div>
                    @endisset



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
    <!--**********************************
                Content body end
            ***********************************-->
    <!--**********************************
                Footer start
            ***********************************-->
    @include ('publisher.footer')
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
        include 'publisher/plugin/plugin_js.php';
    ?>
     <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://futurepress.github.io/epub.js/dist/epub.js"></script>
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
    document.getElementById("front").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>
<script>
    document.getElementById("back_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>
<script>
    document.getElementById("full_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("other_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("author_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("files").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>
<script>
    document.getElementById("banner_img").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i; // Allow JPG, PNG, and JPEG files
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload JPG, PNG, or JPEG files only.');
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');
            fileInput.value = '';
            return false;
        }
    });
</script>
<script>
    document.getElementById("sample_pdf").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload PDF files only.');

            // alert("Please upload PDF files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
    });
</script>

<script>
    document.getElementById("sample_epub").addEventListener("change", function() {
        var fileInput = this;
        var allowedExtensions = /(\.epub)$/i;
        if (!allowedExtensions.exec(fileInput.value)) {
            toastr.error('Please upload EPUB files only.');

            // alert("Please upload EPUB files only.");
            fileInput.value = '';
            return false;
        }
        var maxSize = 5 * 1024 * 1024; // 5 MB in bytes
        if (fileInput.files[0].size > maxSize) {
            toastr.error('File size exceeds the limit of 5MB.');

            // alert("File size exceeds the limit of 5MB.");
            fileInput.value = '';
            return false;
        }
    });
</script>

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
        $(document).ready(function() {
            // Event listener for radio buttons
            $('input[name="sample_file"]').change(function() {
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
        $(document).ready(function() {
            $("#submitbutton").click(function() {
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
        $(document).ready(function() {
            $("#submitbutton").click(function(event) {
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


            // function validateForm() {
            //     if (!$('#front').val()) {
            //         toastr.error('Please upload front images.');
            //     } else if (!$('#back_img').val()) {
            //         toastr.error('Please upload back images.');
            //     } else if (!$('#full_img').val()) {
            //         toastr.error('Please upload full images.');
            //     } else {
            //         $('#imageForm').submit();
            //     }
            // }
        });
    </script>
    <script>
        $(document).ready(function() {
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
        $(document).ready(function() {
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

    {{-- Book Highlights --}}
    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>").insertAfter("#files");

                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });

                            // Old code here
                            /*$("<img></img>", {
                              class: "imageThumb",
                              src: e.target.result,
                              title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

                        });
                        fileReader.readAsDataURL(f);
                    }
                    // console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }

            $("#other_img").on("change", function(e) {
                // alert('Good');
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"other_image_files\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<span class=\"remove_other_images\">Remove image</span>" +
                            "</span>").insertAfter("#other_img");

                        $(".remove_other_images").click(function() {
                            // alert('good');
                            $(this).parent(".other_image_files").remove();
                        });

                        // Old code here
                        /*$("<img></img>", {
                          class: "imageThumb",
                          src: e.target.result,
                          title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
                // console.log(files);
            });

            $(".remove_other_images").click(function() {
                // alert('good');
                $(this).parent(".other_image_files").remove();
            });

            $(".remove").click(function() {
                $(this).parent(".pip").remove();
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
      url: '/publisher/getlanguage',
      data: {'lang':lang},
       success: function(response) {
           var subjects22 = response.subjects;
           $('#subjects1').empty();
           $('#subjects1').append('<option value="">Select One</option>');
           $.each(subjects22, function(key, value) {
               $('#subjects1').append('<option value="' + value.name + '">' + value.name + '</option>');
           });
       },
       error: function(xhr, status, error) {
           console.error(error);
       }
   });
});

    </script>
<script>
$(document).on('click', '.delete_image', function () {
    var removeButton = $(this);
    var imageThumb = removeButton.prev('.imageThumb');
    var imageFileName = imageThumb.attr('src').split('/').pop();
    var bookId = removeButton.closest('.other_image_files').data('bookid');

    $.ajax({
        url: '/publisher/remove-image',
        type: 'POST',
        data: {
            bookId: bookId,
            imageFileName: imageFileName,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            if (response.success) {
                console.log("Image Removed Successfully");

            } else {
                alert('Failed to remove image.');
            }
        },
        error: function () {
            alert('Failed to remove image. Please try again later.');
        }
    });
});
</script>
<script>
$('.highlights_delete').on('click', function() {
    var bookId = $(this).closest('.pip').data('bookid');
    var filename = $(this).closest('.pip').data('filename');

    $.ajax({
        url: "/publisher/remove-image-highlights",
        type: "POST",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            bookId: bookId,
            imageFileName: filename
        },
        success: function(response) {
            // Remove the image container from the DOM
            $(this).closest('.pip').remove();
            // Optionally, display a success message or perform other actions
        },
        error: function(xhr, status, error) {
            // Handle errors if any
        }
    });
});
</script>
    @isset($data->sample_epub)
    <script>
        var params = URLSearchParams && new URLSearchParams(document.location.search.substring(1));
        var url = params && params.get("url") && decodeURIComponent(params.get("url"));
        var currentSectionIndex = (params && params.get("loc")) ? params.get("loc") : undefined;

        // Load the opf
        var book = ePub(url || '{{ url("/Books/sampleepub/".$data->sample_epub) }}');
        // var book = ePub(url || "https://s3.amazonaws.com/moby-dick/moby-dick.epub");
        var rendition = book.renderTo("viewer", {
          width: "100%",
          height: 600,
          spread: "always"
        });

        rendition.display(currentSectionIndex);

        book.ready.then(() => {

          var next = document.getElementById("next");

          next.addEventListener("click", function(e){
            book.package.metadata.direction === "rtl" ? rendition.prev() : rendition.next();
            e.preventDefault();
          }, false);

          var prev = document.getElementById("prev");
          prev.addEventListener("click", function(e){
            book.package.metadata.direction === "rtl" ? rendition.next() : rendition.prev();
            e.preventDefault();
          }, false);

          var keyListener = function(e){

            // Left Key
            if ((e.keyCode || e.which) == 37) {
              book.package.metadata.direction === "rtl" ? rendition.next() : rendition.prev();
            }

            // Right Key
            if ((e.keyCode || e.which) == 39) {
              book.package.metadata.direction === "rtl" ? rendition.prev() : rendition.next();
            }

          };

          rendition.on("keyup", keyListener);
          document.addEventListener("keyup", keyListener, false);

        })

        var title = document.getElementById("title");

        rendition.on("rendered", function(section){
          var current = book.navigation && book.navigation.get(section.href);

          if (current) {
            var $select = document.getElementById("toc");
            var $selected = $select.querySelector("option[selected]");
            if ($selected) {
              $selected.removeAttribute("selected");
            }

            var $options = $select.querySelectorAll("option");
            for (var i = 0; i < $options.length; ++i) {
              let selected = $options[i].getAttribute("ref") === current.href;
              if (selected) {
                $options[i].setAttribute("selected", "");
              }
            }
          }

        });

        rendition.on("relocated", function(location){
        //   console.log(location);

          var next = book.package.metadata.direction === "rtl" ?  document.getElementById("prev") : document.getElementById("next");
          var prev = book.package.metadata.direction === "rtl" ?  document.getElementById("next") : document.getElementById("prev");

          if (location.atEnd) {
            next.style.visibility = "hidden";
          } else {
            next.style.visibility = "visible";
          }

          if (location.atStart) {
            prev.style.visibility = "hidden";
          } else {
            prev.style.visibility = "visible";
          }

        });

        rendition.on("layout", function(layout) {
          let viewer = document.getElementById("viewer");

          if (layout.spread) {
            viewer.classList.remove('single');
          } else {
            viewer.classList.add('single');
          }
        });

        window.addEventListener("unload", function () {
        //   console.log("unloading");
          this.book.destroy();
        });

        book.loaded.navigation.then(function(toc){
                var $select = document.getElementById("toc"),
                        docfrag = document.createDocumentFragment();

                toc.forEach(function(chapter) {
                    var option = document.createElement("option");
                    option.textContent = chapter.label;
                    option.setAttribute("ref", chapter.href);

                    docfrag.appendChild(option);
                });

                $select.appendChild(docfrag);

                $select.onchange = function(){
                        var index = $select.selectedIndex,
                                url = $select.options[index].getAttribute("ref");
                        rendition.display(url);
                        return false;
                };

            });

    </script>
    @endisset
    <script>
        $(document).ready(function() {
            $("#submitbutton").click(function(event) {
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
            actionCell.innerHTML =
                '<button type="button" class="btn btn-danger" onclick="removeInputRowseries(this)">-</button>';
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
                // console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor_new'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                // console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor_new_new'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                // console.error(error);
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

        // Initialize an array to store the values of checked gender checkboxes
            var checkedGenders = [];
            // Check if any gender checkbox is checked
            if ($('input[name="language"]:checked').length > 0) {
                // Iterate over each checked gender checkbox
                $('input[name="language"]:checked').each(function() {
                    // Push the value of the checked checkbox to the array
                    checkedGenders.push($(this).val());
                    if($(this).val() == 'Other_Indian'){
                        $('.book_primary_lang_forein').hide();
                        $('#other2').prop('required', false);
                        $('.book_primary_lang').show();
                        $('#other1').prop('required', true);
                    }else if($(this).val() == 'Other_Foreign'){
                        $('.book_primary_lang').hide();
                        $('#other1').prop('required', false);
                        $('.book_primary_lang_forein').show();
                        $('#other2').prop('required', true);
                    }else {
                        $('.book_primary_lang, .book_primary_lang_forein').hide();
                        $('#other1, #other2').prop('required', false);
                    }
                });
                // Log the values of the checked gender checkboxes
                console.log('Checked genders: ' + checkedGenders.join(', '));
            } else {
                console.log('No gender checkbox is checked');
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
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#author_image').css('background-image', 'url('+e.target.result +')');
                $('#author_image').attr('src', e.target.result);
                $('#author_image').hide();
                $('#author_image').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }
        $("#author_img").change(function() {
            readURL(this);
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#submitbutton").click(function(event) {        
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







</body>
<script>
    // Function to check book ISBN via AJAX
    function checkBookISBN() {
        var bookisbn = $('#isbn').val();
        // console.log(bookisbn);
        // AJAX request to Laravel backend
        $.ajax({
            type: 'POST',
            url: '/publisher/isbn', // The route to your Laravel controller method
            data: {
                '_token': '{{ csrf_token() }}',
                'bookisbn': bookisbn
            },
            success: function(response) {
                if (response.error) {
                    // Display error message
                    $('#bookTitleError').text(response.error);
                } else {
                    // Clear previous error message
                    $('#bookTitleError').text('');
                }
            }
        });
    }

    // Function to handle form submission
    function submitForm(event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Check the book ISBN before submitting the form
        checkBookISBN();

        // Check if there is any error message
        var errorSpan = $('#bookTitleError');
        if (errorSpan.text().trim() !== "") {
            // Display the error message
            toastr.error(errorSpan.text());
        } else {
            // Clear the error message and submit the form
            errorSpan.text('');
            // Submit the form (replace this with your actual form submission code)
            document.forms[0].submit(); // Assuming it's the first form on the page
        }
    }

    // Attach event listener to the submit button
    $(document).ready(function() {
        $('#submitbutton').on('click', submitForm);
    });
</script>
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
@elseif(Session::has('imageerror'))
    <script>
                toastr.error("{{ Session::get('imageerror') }}", {
            timeout: 15000,
            toastClass: 'toast-error'
        });
    </script>

@endif
<script>
    $(document).ready(function() {
        tinymce.init({
            selector: "#productdescription",
            plugins: 'advlist lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | removeformat | link image | charmap | print preview anchor | searchreplace visualblocks code fullscreen | insertdatetime media table | paste code help wordcount',
        });
    });
</script>
<script>
    $(document).ready(function() {
        tinymce.init({
            selector: "#author_description",
            plugins: 'advlist lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | removeformat | link image | charmap | print preview anchor | searchreplace visualblocks code fullscreen | insertdatetime media table | paste code help wordcount',
        });
    });
</script>



</html>



