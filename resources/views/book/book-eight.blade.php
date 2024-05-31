@forelse ($books as $val)
<div class="col">
                                            <div class="tpproduct p-relative mb-20">
                                                <div class="tpproduct__thumb p-relative text-center">
                                                    <a href="/shope-book/{{$val->id}}"><img
                                                            src="{{ asset('Books/front/' . $val->front_img) }}"
                                                            alt="No Image"></a>
                                                    <a class="tpproduct__thumb-img" href="/shope-book/{{$val->id}}">
                                                        <img src="{{ asset('Books/back/' . $val->back_img) }}"
                                                            alt="No Image"></a>

                                                    <div class="tpproduct__shopping">

                                                        <a class="tpproduct__shopping-cart" href="/shope-book/{{$val->id}}"><i
                                                                class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="tpproduct__content">
                                                    <span class="tpproduct__content-weight">
                                                        <a href="#">{{ Illuminate\Support\Str::limit($val->category, 12) }}</a>,
                                                        <a href="#">{{$val->language}}</a>
                                                    </span>
                                                    <h4 class="tpproduct__title">
                                                        <a href="/shope-book/{{$val->id}}"> Book Title: {{$val->book_title}} </a>
                                                    </h4>

                                                    <div class="tpproduct__price d-flex justify-content-between ">
                                                        <span>₹{{$val->final_price}}</span>
                                                        <button class="tp-btn-2 Add-to-cart3"  data-id3="{{$val->id}}"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                {{-- <div class="tpproduct__hover-text">
                                                    <div
                                                        class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                        <button class="tp-btn-2 Add-to-cart3"  data-id3="{{$val->id}}">Add to cart</button>
                                                    </div>
                                                    <div class="tpproduct__descrip">
                                                        <ul>
                                                            <li>category: {{$val->category}}</li>
                                                            <li>Subject: {{$val->subject}}</li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
@empty
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Sorry!</strong>There no records available
        </div>
    </div>
@endforelse
