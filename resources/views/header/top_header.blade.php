<div class="header__top theme-bg-1 d-none d-md-block p-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="header__top-left">
                    {{-- <span>Due to the <strong>COVID-19</strong> epidemic, orders may be processed with a slight delay.</span> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="header__top-right d-flex align-items-center">
                    <div class="header__top-link">
                        @if (auth('publisher')->user())
                        <a class="text-white fw-bold" href="/publisher/index">Dashboard</a>
                        @elseif (auth('distributor')->user())
                        <a class="text-white fw-bold" href="/distributor/index">Dashboard</a>
                        @elseif (auth('admin')->user())
                        <a class="text-white fw-bold" href="/admin/index">Dashboard</a>
                        @elseif (auth('publisher_distributor')->user())
                        <a class="text-white fw-bold" href="/publisher_distributor/index">Dashboard</a>
                        @elseif (auth('librarian')->user())
                        <a class="text-white fw-bold" href="/librarian/index">Dashboard</a>
                        @elseif (auth('reviewer')->user())
                        <a class="text-white fw-bold" href="/reviewer/index">Dashboard</a>
                        @else
                        <a class="text-white fw-bold" href="/login">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        <a class="text-white fw-bold" href="/register"><i class="fa fa-registered"
                                aria-hidden="true"></i>
                            New Registration</a>
                        @endif

                        <a href="/faq">FAQs</a>
                    </div>
                    <div class="header__lang">
                        <!-- <span class="header__lang-select">English </span> -->
                        <!-- {{-- <span class="header__lang-select">English <i class="far fa-angle-down"></i></span> --}} -->
                        <!-- <ul class="header__lang-submenu">
                            -->
                        <li>
                            <span class="header__lang-select">English </span>
                        </li>
                        </ul>
                    </div>
                    <!-- <div class="header__lang">
                   <span class="header__lang-select">INR <i class="far fa-angle-down"></i></span>
                    <ul class="header__lang-submenu">
                       <li>
                          <span class="header__lang-select text-dark">INR </span>
                       </li>
                    </ul>
                 </div> -->
                    {{-- <div class="header__top-price">
                   <select>
                      <option>INR</option> --}}
                    {{-- <option>ARS</option>
                      <option>AUD</option>
                      <option>BRL</option>
                      <option>GBP</option>
                      <option>DKK</option>
                      <option>EUR</option> --}}
                    {{-- </select>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
