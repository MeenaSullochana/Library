@forelse ($books as $val)
                                        <div class="col-lg-12">
                                            <div class="tplist__product d-flex align-items-center justify-content-between mb-20">
                                                <div class="tplist__product-img">
                                                    <a href="/shope-book/{{$val->id}}" class="tplist__product-img-one"><img
                                                            src="{{ asset('Books/front/' . $val->front_img) }}"
                                                            alt="No Image"></a>
                                                    <a class="tplist__product-img-two" href="/shope-book/{{$val->id}}"><img
                                                            src="{{ asset('Books/back/' . $val->back_img) }}"
                                                            alt="No Image"></a>

                                                </div>
                                                
                                                <div class="tplist__content">
                                                    <!-- <span>{{$val->category}}</span>,
                                                    <span>{{$val->language}}</span> -->
                                                    <h4 class="tplist__content-title"  style="width: 350.709px;"><a href="/shope-book/{{$val->id}}">Book
                                                            Title: {{$val->book_title}}</a></h4>

                                                    <ul class="tplist__content-info">
                                                        <li>Language: {{$val->language}}</li>
                                                        <li>Category: {{$val->category}}</li>
                                                        <li style="width: 326.709px;">Subject: {{$val->subject}}</li>

                                                    </ul>
                                                </div>
                                                <div class="tplist__price justify-content-end">
                                                    <!-- <h4 class="tplist__instock">Availability: <span>92 in stock</span>
                                            </h4> -->
                                                    <h3 class="tplist__count mb-15">
                                                        ₹{{$val->final_price}}</h3>
                                                        <button class="tp-btn-2 mb-10 Add-to-cart1" data-id1="{{$val->id}}">Add to cart</button>
                                                    <div class="tplist__shopping">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
@empty
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Sorry!</strong>There no records available
        </div>
    </div>
@endforelse
