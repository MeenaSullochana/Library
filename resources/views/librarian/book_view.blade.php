<!DOCTYPE html>
<html lang="en">
{{-- @dd($data); --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <!-- PAGE TITLE HERE -->
    <title>Goverment of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->

    <link rel="stylesheet" href="{{ asset('path/to/examples.css') }}">

    <link href="
https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.css
" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('librarian/images/fevi.svg') }}">
    <?php
    include 'librarian/plugin/plugin_css.php';
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
        @include ('librarian.navigation')
        <!--**********************************
            Sidebar end
            ***********************************-->
        <!--**********************************
            Content body start
            ***********************************-->
        <div class="content-body bg-white">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Book View</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="#">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
                        </div>
                    </div>
                </div>
                <div class="contaiter-fluid bg-white">

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-6 col-md-6">
                                        <!-- Tab panes -->
                                        <!-- <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded" src="{{ asset('Books/front/' . $data->front_img) }}" alt="">
                                            </div>
                                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                                aria-labelledby="profile-tab" tabindex="0">
                                                <img class="img-fluid rounded " src="{{ asset('Books/back/' . $data->back_img) }}" alt="">
                                            </div>
                                           <div class="tab-pane fade" id="end-tab-pane" role="tabpanel"
                                                aria-labelledby="end-tab" tabindex="0">
                                                <img class="img-fluid rounded" src="{{ asset('Books/full/' . $data->full_img) }}" alt="">
                                            </div>
                                            @if ($data->other_img1 != null)
                                            @foreach ($data->other_img1 as $key => $val)
@if ($val != null)
<div class="tab-pane fade" id="contact-tab-pane{{ $key }}" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                                        <img class="img-fluid rounded" src="{{ asset('Books/other_img/' . $val) }}" alt="">
                                                    </div>
@endif
@endforeach
                                           @endif

                                        </div>
                                        <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">

                                            <ul class="nav nav-tabs slide-item-list mt-3" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a href="#first" class="nav-link active" id="home-tab"
                                                        data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab"
                                                        aria-controls="home-tab-pane" aria-selected="true"><img
                                                            class="img-fluid me-2 rounded" src="{{ asset('Books/front/' . $data->front_img) }}"
                                                            alt="" width="80"></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#second" class="nav-link" id="profile-tab"
                                                        data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                                                        role="tab" aria-controls="profile-tab-pane"
                                                        aria-selected="false"><img class="img-fluid me-2 rounded"
                                                            src="{{ asset('Books/back/' . $data->back_img) }}" alt="" width="80"></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#for" class="nav-link" id="end-tab" data-bs-toggle="tab"
                                                        data-bs-target="#end-tab-pane" role="tab"
                                                        aria-controls="end-tab-pane" aria-selected="false"><img
                                                            class="img-fluid  rounded" src="{{ asset('Books/full/' . $data->full_img) }}" alt=""
                                                            width="80"></a>
                                                </li>
                                                @if ($data->other_img1 != null)
                                                @foreach ($data->other_img1 as $key => $val)
<li class="nav-item" role="presentation">
                                                            <a href="#third" class="nav-link" id="contact-tab"
                                                                data-bs-toggle="tab" data-bs-target="#contact-tab-pane{{ $key }}"
                                                                role="tab" aria-controls="contact-tab-pane{{ $key }}"
                                                                aria-selected="false">
                                                                <img class="img-fluid me-2 rounded" src="{{ asset('Books/other_img/' . $val) }}" alt="" width="80">
                                                            </a>
                                                        </li>
@endforeach
                                                @endif
                                            </ul>

                                        </div> -->
                                        <div id="carouselExampleIndicators" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('Books/front/' . $data->front_img) }}"
                                                        class="d-block w-100" alt="Front Image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('Books/back/' . $data->back_img) }}"
                                                        class="d-block w-100" alt="Back Image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('Books/full/' . $data->full_img) }}"
                                                        class="d-block w-100" alt="Full Image">
                                                </div>
                                                @if ($data->other_img1 != null)
                                                @foreach ($data->other_img1 as $key => $val)
                                                @if ($val != null)
                                                <div class="carousel-item">
                                                    <img src="{{ asset('Books/other_img/' . $val) }}"
                                                        class="d-block w-100" alt="Other Image {{ $key + 1 }}">
                                                </div>
                                                @endif
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="0" class="active" aria-current="true">
                                                    <img src="{{ asset('Books/front/' . $data->front_img) }}"
                                                        class="d-block w-100" alt="Front Image">
                                                </button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="1">
                                                    <img src="{{ asset('Books/back/' . $data->back_img) }}"
                                                        class="d-block w-100" alt="Back Image">
                                                </button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="2">
                                                    <img src="{{ asset('Books/full/' . $data->full_img) }}"
                                                        class="d-block w-100" alt="Full Image">
                                                </button>
                                                @if ($data->other_img1 != null)
                                                @foreach ($data->other_img1 as $key => $val)
                                                @if ($val != null)
                                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                                    data-bs-slide-to="{{ $key + 3 }}">
                                                    <img src="{{ asset('Books/other_img/' . $val) }}"
                                                        class="d-block w-100" alt="Other Image {{ $key + 1 }}">
                                                </button>
                                                @endif
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 pt-2 ps-2 pe-2 mt-3">


                                            </div>
                                        </div>
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="product-info pr">
                                                <h4 class="product-title"> {{ $data->book_title }} –
                                                    {{ $data->edition_number }}</h4>
                                                <!-- <h5>December 2002</h5> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><span class="fs-6 fw-bold text-primary">Author :</span>
                                                            @php
                                                            $lastKey1 = count($data->primaryauthor1) - 1;
                                                            @endphp
                                                            @foreach ($data->primaryauthor1 as $key => $va11)
                                                            <strong>{{ $va11 }}</strong>
                                                            @if ($key < $lastKey1) , @endif @endforeach </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><span class="fs-6 fw-bold text-primary">Translate Author
                                                                :</span>
                                                            @php
                                                            $lastKey2 = count($data->trans_author1) - 1;
                                                            @endphp
                                                            @foreach ($data->trans_author1 as $key => $val2)
                                                            <strong>{{ $val2 }}</strong>
                                                            @if ($key < $lastKey2) , @endif @endforeach </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><span class="fs-6 fw-bold text-primary">Translated Languages
                                                                :</span>
                                                            @php
                                                            $lastKey = count($data->trans_from1) - 1;
                                                            @endphp

                                                            @foreach ($data->trans_from1 as $key => $val)
                                                            <strong>{{ $val }}</strong>
                                                            @if ($key < $lastKey) , @endif @endforeach </p>
                                                    </div>
                                                </div>
                                                <!-- <div class="comment-review star-rating d-flex">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <span class="review-text ms-3">(34 reviews) / </span><a
                                                        class="product-review" href="" data-bs-toggle="modal"
                                                        data-bs-target="#reviewModal">Write a review?</a>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            @if ($data->type == 'Paperback')
                                                            <span class="fs-30 text-danger">{{ $data->type }}
                                                                <br><b>₹
                                                                    {{ $data->price }}</b> </span>
                                                            @endif
                                                            @if ($data->type == 'Hardbound')
                                                            <span class="fs-30 text-danger">{{ $data->type }}<br><b>
                                                                    ₹{{ $data->price }}
                                                                </b> </span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="p-0 m-0"><span
                                                                class="fs-6 fw-bold text-primary">Category:</span> <span
                                                                class="item">{{ $data->category }}</span> </p>
                                                        <p class="p-0 m-0"><span
                                                                class="fs-6 fw-bold text-primary">Subject:</span> <span
                                                                class="item">{{ $data->subject }}</span> </p>
                                                        <p class="p-0 m-0"><span class="fs-6 fw-bold text-primary">Book
                                                                ID:</span> <span
                                                                class="item">{{ $data->product_code }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-header">
                                                            <h4 class="text-primary fw-bold fs-18">Description</h4>
                                                        </div>
                                                        <p class="short_desc" style="text-indent: 25px">
                                                            {{ $data->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="seven">
                                                    <h1>Read Sample Here</h1>
                                                </div>
                                                <!-- Modal trigger button -->
                                                <button type="button" class="btn btn-outline-primary w-100"
                                                    data-bs-toggle="modal" id="openModalBtn" data-bs-target="#modalId">
                                                    <i class="fa fa-book"></i> Read Sample
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="card-header bg-main text-white h3 p-2">Short Specification</div>
                                    <div class="slider">
                                        <div class="carousel-wrap">
                                            <div class="owl-carousel">
                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold">Dimensions</p>
                                                    <img src="https://cdn-icons-png.flaticon.com/128/2928/2928958.png"
                                                        style="width:50px">
                                                    <p>{{ $data->length_breadth }}cm</p>
                                                </div>

                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold">Language</p>
                                                    <img src="https://cdn-icons-png.flaticon.com/512/44/44386.png"
                                                        style="width:50px">

                                                    @if ($data->language == 'Other_Indian')
                                                    <p>{{ $data->other_indian }}</p>
                                                    @elseif($data->language == 'Other_Foreign')
                                                    <p>{{ $data->other_foreign }}</p>
                                                    @else
                                                    <p>{{ $data->language }}</p>
                                                    @endif
                                                </div>

                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold">ISBN</p>
                                                    <img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png"
                                                        style="width:50px">
                                                    <p>{{ $data->isbn }}</p>
                                                </div>

                                                <!-- <div class="item p-1">
                                                <p>ISBN-10</p>

                                                    <img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png" style="width:50px">
                                                    <p>{{ $data->isbn13 }}</p>
                                                </div> -->
                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold"> place of Origin</p>

                                                    <img src="https://cdn-icons-png.flaticon.com/512/44/44386.png"
                                                        style="width:50px">
                                                    <p>{{ $data->place }}</p>
                                                </div>
                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold"> Print length </p>
                                                    <img src="https://img.icons8.com/?size=50&id=1408&format=png"
                                                        style="width:50px">
                                                    <p>{{ $data->pages }}</p>
                                                </div>
                                                <div class="item p-1 text-center">

                                                    <p class="text-danger fw-bold">
                                                        {{ $data->user_type == 'publisher' ? 'Publisher' : ($data->user_type == 'distributor' ? 'Distributor' : 'Publisher Cum Distributor') }}
                                                    </p>

                                                    <img src="https://img.icons8.com/?size=80&id=uRnBBX2dPxsS&format=png"
                                                        style="width:50px">
                                                    <p>{{ $data->firstName }}</p>
                                                    <p>{{ $data->lastName }}</p>
                                                </div>
                                                <div class="item p-1 text-center">
                                                    <p class="text-danger fw-bold"> Pages</p>
                                                    <img src="https://img.icons8.com/?size=80&id=YffzRqpLwRhQ&format=png"
                                                        style="width:50px">
                                                    <p>{{ $data->pages }}</p>
                                                </div>
                                                <!-- <div class="item p-1"><img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png" class="w-100">
                                                </div>
                                                <div class="item p-1"><img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png" class="w-100">
                                                </div>
                                                <div class="item p-1"><img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png" class="w-100">
                                                </div>
                                                <div class="item p-1"><img src="https://cdn.pixabay.com/photo/2014/04/02/16/19/barcode-306926_1280.png" class="w-100">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header bg-main text-white h3 p-2">Specification</div>
                                    {{-- <div class="short-desc mt-2 mb-2">
                                            {{ $data->description }}
                                </div> --}}
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title h3">Product details</h3>
                                            <ul>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold d-flex justify-content-between">
                                                            <div class="text-title text-danger">
                                                                <b>
                                                                    {{ $data->user_type == 'publisher' ? 'Publisher' : ($data->user_type == 'distributor' ? 'Distributor' : 'Publisher Cum Distributor') }}</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->firstName . ' ' . $data->lastName }}</span>
                                                            </div>

                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="fs-5 p-1">
                                                    <span class="a-list-item">
                                                        <span
                                                            class="a-text-bold text-danger d-flex justify-content-between">
                                                            <div class="text-title text-danger"><b>Language</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                @if ($data->language == 'Other_Indian')
                                                                <span>{{ $data->other_indian }}</span>
                                                                @elseif($data->language == 'Other_Foreign')
                                                                <span>{{ $data->other_foreign }}</span>
                                                                @else
                                                                <span>{{ $data->language }}</span>
                                                                @endif
                                                            </div>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold d-flex justify-content-between">
                                                                <div class="text-title text-danger"><b>Size</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->size }}</span>
                                                                </div>
                                                            </span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1">
                                                        <span class="a-list-item">
                                                            <span class="a-text-bold d-flex justify-content-between">
                                                                <div class="text-title text-danger"><b>Length Breadth</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </div>
                                                                <div class="text-data text-right">
                                                                    <span>{{ $data->length_breadth }}</span>
                                                                </div>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="fs-5 p-1">
                                                    <span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="text-title text-danger"><b>Width</b>
                                                                &rlm;

                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->width }}</span>
                                                            </div>
                                                        </span>
                                                </li>
                                                <li class="fs-5 p-1">
                                                    <span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>Weight</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->weight }}</span>
                                                            </div>
                                                        </span>
                                                </li>
                                                <li class="fs-5 p-1">
                                                    <span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Type OF Paper</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->quality }}</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Gsm</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->gsm }}</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                </li>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Paper Finishing </b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->paper_finishing }}</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <h3 class="card-title">Book Location</h3> -->
                                            <ul>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Multi Color</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->multicolor }}</span>
                                                            </div>
                                                        </span>
                                                </li>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <span class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>Mono Color</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->monocolor }}</span>
                                                            </div>
                                                        </span>
                                                </li>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>Pages</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->pages }}</span>
                                                            </div>
                                                        </div>
                                                </li>
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger"><b>ISBN</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->isbn }}</span>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </li>
                                                <!-- <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                class="a-text-bold"><b>Isbn13</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </span> <span>{{ $data->isbn13 }}</span>
                                                        </span>
                                                    </li> -->
                                                <li class="fs-5 p-1"><span class="a-list-item">
                                                        <div class="a-text-bold  d-flex justify-content-between">
                                                            <div class="a-text-bold text-danger">
                                                                <b>Price</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </div>
                                                            <div class="text-data text-right">
                                                                <span>{{ $data->price }}</span>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne1" aria-expanded="true"
                                                    aria-controls="collapseOne1">
                                                    Book Series
                                                </button>
                                            </h2>
                                            <div id="collapseOne1" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                                <div class="accordion-body">

                                                    <h3 class="card-title">Series details</h3>
                                                    <ul>
                                                        @foreach ($data->series1 as $val)
                                                        <h3 class="card-title">Series: {{ $loop->index + 1 }}
                                                        </h3>
                                                        <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                    class="a-text-bold"><b>Series Number</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </span> <span> {{ $val->series_number }}</span>
                                                            </span>
                                                        </li>
                                                        <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                    class="a-text-bold"><b>Series Title</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </span> <span> {{ $val->series_title }}</span>
                                                            </span>
                                                        </li>
                                                        <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                    class="a-text-bold"><b>ISBN Number</b>
                                                                    &rlm;
                                                                    :
                                                                    &lrm;
                                                                </span> <span> {{ $val->isbn_number }}</span>
                                                            </span>
                                                        </li>
                                                        @endforeach



                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne2">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne2" aria-expanded="true"
                                                    aria-controls="collapseOne2">
                                                    Book Volume
                                                </button>
                                            </h2>
                                            <div id="collapseOne2" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
                                                <h3 class="card-title">Volume details</h3>
                                                <ul>
                                                    @foreach ($data->volume1 as $val)
                                                    <h3 class="card-title">Volume: {{ $loop->index + 1 }}</h3>
                                                    <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                class="a-text-bold"><b>Volume Number</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </span> <span> {{ $val->volume_number }}</span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                class="a-text-bold"><b>Series Title</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </span> <span> {{ $val->volume_title }}</span>
                                                        </span>
                                                    </li>
                                                    <li class="fs-5 p-1"><span class="a-list-item"> <span
                                                                class="a-text-bold"><b>ISBN Number</b>
                                                                &rlm;
                                                                :
                                                                &lrm;
                                                            </span> <span> {{ $val->isbn_number }}</span>
                                                        </span>
                                                    </li>
                                                    @endforeach



                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        {{-- <h3></h3> --}}
                        <div class="card-header bg-main text-white h3 p-2">Popular Highlights in this book</div>
                        <p>What are popular highlights?</p>
                        <div class="col-12">
                            <!-- Slider main container -->
                            <!-- Swiper -->
                            <div class="swiper mySwiper">

                                <div class="swiper-wrapper">
                                    @foreach ($data->bookdescription1 as $val)
                                    <div class="swiper-slide">
                                        <div class="outerBox d-flex">
                                            <div class="d-flex align-items-center">
                                                <p>{{ $val }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="outerBox d-flex">
                                                <div class="d-flex align-items-center">
                                                    <p>Everyone seems to have a clear idea of how other people should lead their lives, but none about his or her own.</p>
                                                </div>
                                            </div>
                                        </div> -->

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                            <!-- Swiper JS -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <hr>
                        {{-- <h3>Product description</h3> --}}
                        <div class="card-header bg-main text-white h3 p-2">Product Description</div>
                        <div class="col-12">
                            <div class="product_description">
                                <p style="text-indent:35px">{{ strip_tags($data->productdescription) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="card-header bg-main text-white h3 p-2">Book Banner Image</div>
                        {{-- <h3>Book Baner Image</h3> --}}
                        @foreach ($data->banner_img1 as $val)
                        <div class="row container ms-3 me-3 mt-3">

                            <div class="col-8 mx-auto">
                                <img class="center" src="{{ asset('Books/banner/' . $val) }}" alt="img" style="">
                            </div>


                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="row">
                            <hr>
                            <h3>About The Author</h3>
                            <div class="col-12">
                                <div class="mb-5">
                                    <div class="auth_details">
                                            <h5>{{ $data->author_name }}</h5>
                                        <div class="author_img">
                                            <img style="border-radius: 50% !important;" src="{{ asset('Books/author_img/' . $data->author_img) }}" class="w-25" style="width: 25px;" alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="auth_details">
                                       <div class="author_description">
                                         {{ $data->author_description }}
                                       </div>
                                    </div>
                                </div>


                            </div>
                        </div> -->
                    <div class="row">
                        <hr>
                        <div class="card-header bg-main text-white h3 p-2">About The Author</div>
                        {{-- <h3>About The Author</h3> --}}
                        <div class="col-12">
                            <div class="d-flex mb-5">
                                <div class="auth_details">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            @if ($data->author_img != null)
                                            <img src="{{ asset('Books/author_img/' . $data->author_img) }}"
                                                class="avatar avatar-md rounded-circle" alt="{{ $data->author_name }}">
                                            @else
                                            <img src="{{ asset('librarian/images/default.png') }}"
                                                class="avatar avatar-md rounded-circle" alt="{{ $data->author_name }}">
                                            @endif
                                        </div>


                                        <!-- <div class="d-flex align-items-center">
      <img src="{{ asset('Books/author_img/' . $data->author_img) }}" class="avatar avatar-md rounded-circle" alt="">
      <h5 class="mb-0 ms-2">{{ $data->author_name }}</h5>	<br>
                        <p>{{ strip_tags($data->author_description) }}</p><br>
     </div> -->
                                        <div class="col-md-8">

                                            <div class="author_description">
                                                <h3 class="mb-0 ms-2">{{ $data->author_name }}</h3>
                                                <p style="text-indent:35px" class="author-info">
                                                    @php
                                                    // Truncate the text to a certain length
                                                    $truncatedText = Str::limit($data->author_description, 300);
                                                    @endphp
                                                    {{ strip_tags($truncatedText) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- <div class="col-xl-3" style="height: 353px;">
                        <div class="card box-hover">
                            <div class="card-body">
                                <div class="products style-1">

                                    <div class="d-flex">
                                        <p>Buy new:</p>
                                        <h4>₹254.00</h4>
                                    </div>
                                </div>
                                <p class="my-3">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div>
                                    <p class=" mb-1 font-w500">Translator Authors</p>
                                    <div class="avatar-list avatar-list-stacked">
                                        <img src="images/contacts/pic666.jpg" class="avatar rounded-circle" alt="">
                                        <img src="images/contacts/pic555.jpg" class="avatar rounded-circle" alt="">
                                        <img src="images/contacts/pic1.jpg" class="avatar rounded-circle" alt="">
                                        <img src="images/contacts/pic555.jpg" class="avatar rounded-circle" alt="">
                                        <img src="images/contacts/pic666.jpg" class="avatar rounded-circle" alt="">
                                    </div>
                                </div>
                                <div class="progress mt-4">
                                    <div class="progress-bar bg-danger"
                                        style="width:60%; height:5px; border-radius:4px;" role="progressbar"></div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between flex-wrap">
                                <div class="due-progress">
                                    <p class="mb-0 text-black">Due <span class="text-dabger">: 2023-06-02</span></p>
                                </div>
                                <div class="dropdown bootstrap-select default-select status-select"><select
                                        class="default-select status-select">
                                        <option value="pending">Pending</option>
                                        <option value="progress">In Progress</option>
                                        <option value="testing">Testing</option>
                                        <option value="complete">Complete</option>
                                    </select>
                                    <div class="dropdown-menu ">
                                        <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Audio Book</h4>
                        <audio controls style="width:90%">
                            <source src="horse.ogg" type="audio/ogg">
                            <source src="horse.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <h4>Other Selling Books</h4>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Latest Books
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body bg-white">
                                        <div class="list-group">
                                            <a href="#"
                                                class="list-group-item list-group-item-action flex-column align-items-start active bg-body-secondary"
                                                aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Yoga: The Science of the Soul Paperback – 1</h5>
                                                    <small class="text-muted"><img src="images/contacts/pic666.jpg"
                                                            class="avatar" alt=""></small>
                                                </div>
                                                <p class="mb-1">
                                                    <ul class="d-flex w-100 justify-content-between">
                                                        <li><i class="fa fa-star active-start"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </p>
                                                <small class="text-muted">Short Content</small>
                                            </a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action flex-column align-items-start bg-body-secondary"
                                                aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Yoga: The Science of the Soul Paperback – 1</h5>
                                                    <small class="text-muted"><img src="images/contacts/pic666.jpg"
                                                            class="avatar" alt=""></small>
                                                </div>
                                                <p class="mb-1">
                                                    <ul class="d-flex w-100 justify-content-between">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </p>
                                                <small class="text-muted">Short Content</small>
                                            </a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action flex-column align-items-start bg-body-secondary"
                                                aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Yoga: The Science of the Soul Paperback – 1</h5>
                                                    <small class="text-muted"><img src="images/contacts/pic666.jpg"
                                                            class="avatar" alt=""></small>
                                                </div>
                                                <p class="mb-1">
                                                    <ul class="d-flex w-100 justify-content-between">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </p>
                                                <small class="text-muted">Short Content</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
                <!-- End Right 2nd Column -->
            </div>
        </div>
    </div>
    <!--**********************************
         Content body end
         ***********************************-->
    <!--**********************************
         Footer start
         ***********************************-->
    @include ('librarian.footer')
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
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Add your modal header content here -->
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-chevron-left"></i>Back to</button>
                    <!-- <h5 class="modal-title" id="modalTitleId">THREE THOUSAND STITCHES: ORDINARY PEOPLE, EXTRAORDINARY
                        LIVES</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="viewer" class="spreads"></div>

                </div>
                <div class="modal-footer" style="display: flex; justify-content: space-between;">
                    <div>
                        <a id="prev" href="#prev" class="arrow">Previous</a>
                        <a id="next" href="#next" class="arrow">Next</a>
                    </div>
                    <div>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    include 'librarian/plugin/plugin_js.php';
    ?>
    <!-- Optional: Place to the bottom of scripts -->
    <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/owl-carousel@1.0.0/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://unpkg.com/epubjs@0.3.93/dist/epub.legacy.js"></script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>
    <script>
    function showMore(link) {
        var shortNotes = link.parentNode.querySelector('.short_notes');
        var longNotes = link.parentNode.querySelector('.long_notes');
        var dots = link.parentNode.querySelector('.dots');

        if (shortNotes.style.display === "none") {
            shortNotes.style.display = "inline";
            longNotes.style.display = "none";
            dots.style.display = "inline";
            link.innerHTML = "See more";
        } else {
            shortNotes.style.display = "none";
            longNotes.style.display = "inline";
            dots.style.display = "none";
            link.innerHTML = "See less";
        }
    }
    </script>

    <script>
    var params = URLSearchParams && new URLSearchParams(document.location.search.substring(1));
    var url = params && params.get("url") && decodeURIComponent(params.get("url"));
    var currentSectionIndex = (params && params.get("loc")) ? params.get("loc") : undefined;

    var openModalBtn = document.getElementById('openModalBtn');
    var epubModal = document.getElementById('modalId');

    openModalBtn.addEventListener('click', function() {
        epubModal.style.display = 'flex';
        var data = @json($data - > sample_file);
        var data1 = @json($data - > sample_pdf);
        var data2 = @json($data - > sample_epub);

        var bookSource = data2;

        var book = ePub("{{ asset('Books/sampleepub') }}/" + bookSource);
        // Load the opf
        // var book = ePub("{{ asset('Books/sampleepub/Around the World in 28 Languages.epub') }}" || "https://s3.amazonaws.com/moby-dick/moby-dick.epub");
        var rendition = book.renderTo("viewer", {
            width: "100%",
            height: 600,
            spread: "always"
        });

        rendition.display(currentSectionIndex);

        book.ready.then(function() {
            var next = document.getElementById("next");

            next.addEventListener("click", function(e) {
                book.package.metadata.direction === "rtl" ? rendition.prev() : rendition.next();
                e.preventDefault();
            }, false);

            var prev = document.getElementById("prev");
            prev.addEventListener("click", function(e) {
                book.package.metadata.direction === "rtl" ? rendition.next() : rendition.prev();
                e.preventDefault();
            }, false);

            var keyListener = function(e) {
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
        });

        var title = document.getElementById("title");

        rendition.on("rendered", function(section) {
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

        rendition.on("relocated", function(location) {
            var next = book.package.metadata.direction === "rtl" ? document.getElementById("prev") :
                document.getElementById("next");
            var prev = book.package.metadata.direction === "rtl" ? document.getElementById("next") :
                document.getElementById("prev");

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

        window.addEventListener("unload", function() {
            console.log("unloading");
            this.book.destroy();
        });

        book.loaded.navigation.then(function(toc) {
            var $select = document.getElementById("toc"),
                docfrag = document.createDocumentFragment();

            toc.forEach(function(chapter) {
                var option = document.createElement("option");
                option.textContent = chapter.label;
                option.setAttribute("ref", chapter.href);

                docfrag.appendChild(option);
            });

            $select.appendChild(docfrag);

            $select.onchange = function() {
                var index = $select.selectedIndex,
                    url = $select.options[index].getAttribute("ref");
                rendition.display(url);
                return false;
            };
        });
    });

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function(e) {
        if (e.target === epubModal) {
            epubModal.style.display = 'none';
        }
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
    var openModalBtn = document.getElementById('openModalBtn');
    var pdfModal = document.getElementById('modalId');

    openModalBtn.addEventListener('click', function() {
        pdfModal.style.display = 'flex';
        var data1 = @json($data - > sample_pdf); // Assuming $data->sample_pdf contains the PDF file name
        var pdfUrl = "{{ asset('Books/samplepdf') }}/" + data1; // Adjust the path as necessary

        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js'; // Adjust the path to the PDF.js worker script

        var loadingTask = pdfjsLib.getDocument(pdfUrl);
        loadingTask.promise.then(function(pdf) {
            var totalPages = pdf.numPages;
            var currentPage = 1;

            var pdfViewer = document.getElementById('viewer');

            function renderPage(pageNumber) {
                pdf.getPage(pageNumber).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({
                        scale: scale
                    });

                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function() {
                        pdfViewer.innerHTML = ''; // Clear previous content
                        pdfViewer.appendChild(canvas);
                    });
                });
            }

            renderPage(currentPage);

            var nextBtn = document.getElementById('next');
            var prevBtn = document.getElementById('prev');

            nextBtn.addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderPage(currentPage);
                }
            });

            prevBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderPage(currentPage);
                }
            });
        });
    });

    window.addEventListener('click', function(e) {
        if (e.target === pdfModal) {
            pdfModal.style.display = 'none';
        }
    });
    </script>





    <script>
    // function myFunction() {
    //     var dots = document.getElementById("dots");
    //     var moreText = document.getElementById("more");
    //     var btnText = document.getElementById("myBtn");

    //     if (dots.style.display === "none") {
    //         dots.style.display = "inline";
    //         btnText.innerHTML = "Read more";
    //         moreText.style.display = "none";
    //     } else {
    //         dots.style.display = "none";
    //         btnText.innerHTML = "Read less";
    //         moreText.style.display = "inline";
    //     }
    // }
    // slider
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
    </script>
</body>

</html>
<style>
.outerBox {
    height: 300px;
    /* background-color: black; */
    background-image: url('{{ asset('Books/back.jpeg') }}');

    background-position: top;
    color: white;
    font-size: 16px;
    padding: 10px;
}

#more {
    display: none;
}

/* slider */
.carousel-wrap {
    margin: 10px auto;
    padding: 0 0;
    width: 100%;
    position: relative;
}

/* fix blank or flashing items on carousel */
.owl-carousel .item {
    position: relative;
    z-index: 100;
    -webkit-backface-visibility: hidden;
}

/* end fix */
.owl-nav>div {
    margin-top: -26px;
    position: absolute;
    top: 50%;
    color: #cdcbcd;
}

.owl-nav i {
    font-size: 52px;
}

.owl-nav .owl-prev {
    left: -30px;
}

.owl-nav .owl-next {
    right: -30px;
}

.list-group-item.active {
    background-color: #67635e !important
}

.active-start {
    color: yellow;
}
</style>
<style>
/* Style for the 'previous' button */
#prev {
    display: inline-block;
    padding: 10px;
    margin-right: 10px;
    color: white;
    background-color: blue;
    /* Change to your desired color for 'previous' button */
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

#prev:hover {
    background-color: darkblue;
    /* Change to your desired hover color for 'previous' button */
}

/* Style for the 'next' button */
#next {
    display: inline-block;
    padding: 10px;
    color: white;
    background-color: green;
    /* Change to your desired color for 'next' button */
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
}

#next:hover {
    background-color: darkgreen;
    /* Change to your desired hover color for 'next' button */
}
</style>
<style>
.carousel-indicators button.thumbnail {
    width: 100%;
}

.carousel-indicators button.thumbnail:not(.active) {
    opacity: 0.7;
}

.carousel-indicators {
    position: static;
}

@media screen and (min-width: 992px) {
    .carousel {
        max-width: 100%;
        margin: 0 auto;
    }
}


.product-title {
    font-size: 20px;
    font-family: 'Line Awesome Free';
    font-weight: 700;
}

.short_desc {
    font-family: 'Line Awesome Free';
    font-size: 14px;
    color: black;
}

/* Style 7
   ----------------------------- */
.seven h1 {
    text-align: center;
    font-size: 17px;
    font-weight: 300;
    color: #222;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: bold;
    display: grid;
    grid-template-columns: 1fr max-content 1fr;
    grid-template-rows: 27px 0;
    grid-gap: 20px;
    align-items: center;
}

.seven h1:after,
.seven h1:before {
    content: " ";
    display: block;
    border-bottom: 1px solid #452b90;
    border-top: 1px solid #452b90;
    height: 5px;
    background-color: #f8f8f8;
}

.bg-main {
    background-color: #222B40;
}

/* img {
  background-position: top;
  background-size: cover;
  height: 200px;
  width: 290px;
  box-shadow: 0 2px 10px #000;
  cursor: pointer;
  transition: all 0.2s;
}
img:hover {
  box-shadow: none;
  transform: scale(1.1);
} */
</style>