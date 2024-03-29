    <div id="header-sticky-2" class="tpmobile-menu d-xl-none">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-2 col-2 col-sm-2">
                    <div class="mobile-menu-icon">
                        <button class="tp-menu-toggle"><i class="icon-menu1"></i></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-8 col-sm-8">
                    <div class="header__logo text-center">
                        <a href="/"><img class="w-100" src="assets/img/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-2 col-2 col-sm-2">
                     <div class="header__info d-flex align-items-center">
                        <div class="header__info-cart tpcolor__oasis ml-10 ">
                        @php
                            $user = auth('librarian')->user();
                            @endphp

                            @if($user && $user->metaChecker =="no")
                            @if(Session::has('magazinecartcount'))
                            <a href="/cart-magazine">
                            <button id="magazinecartcountId">
                              <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                               <span id='magazinecartcount'>{{ Session::get('magazinecartcount') }}</span>
                             </button>

                            </a>
                            @else
                            <a href="#">
                                <button>
                                    <i><img src="assets/img/icon/cart-1.svg" alt=""></i>
                                    <!-- <span>
                                 </span> -->
                                </button>
                            </a>
                            @endif
                            @endif
                        </div>
                     </div> 
                 </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- sidebar-menu-area -->
    <div class="tpsideinfo">
        <button class="tpsideinfo__close">Close<i class="fal fa-times ml-10"></i></button>
        <div class="tpsideinfo__search text-center pt-35">
            <!-- <span class="tpsideinfo__search-title mb-20">What Are You Looking For?</span> -->
            <form action="#">
                <input type="text" placeholder="Search ...">
                <button><i class="icon-search"></i></button>
            </form>
        </div>
        <div class="tpsideinfo__nabtab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Menu</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="mobile-menu"></div>
                </div>
                
            </div>
        </div>
        <div class="tpsideinfo__account-link">
        @if (auth('publisher')->user())
    <a href="/publisher/index"><i class="icon-user icons"></i> Dashboard</a>
@elseif (auth('distributor')->user())
    <a href="/distributor/index"><i class="icon-user icons"></i> Dashboard</a>
@elseif (auth('admin')->user())
    <a href="/admin/index"><i class="icon-user icons"></i> Dashboard</a>
@elseif (auth('publisher_distributor')->user())
    <a href="/publisher_distributor/index"><i class="icon-user icons"></i> Dashboard</a>
@elseif (auth('librarian')->user())
    <a href="/librarian/index"><i class="icon-user icons"></i> Dashboard</a>
@elseif (auth('reviewer')->user())
    <a href="/reviewer/index"><i class="icon-user icons"></i> Dashboard</a>
@else
    <a href="/login"><i class="icon-user icons"></i> Login</a>
@endif

        </div>
        <div class="tpsideinfo__wishlist-link">
            <a href="/register"><i class="icon-user icons"></i> Register</a>
        </div>
        <div class="tpsideinfo__wishlist-link">
            <a href="/faq"><i class="fas fa-question-circle"></i> FAQs</a>
        </div>
    </div>
    <!-- sidebar-menu-area-end -->

<style>
.tpsideinfo.tp-sidebar-opened {
    transform: translateX(0);
    z-index: 99999;
}
button.tp-menu-toggle {
    background-color: white;
}
div#header-sticky-2 {
    background-color: white;
}

</style>