

<body>
   <!-- Page Preloder -->
   <div id="preloder">
       <img src="{{asset('assets/img/loader.gif')}}" style="width: 250px" class="loader-img">
   </div>


    <audio id="music">
        <source src="{{asset('assets/music/katana-lofive.mp3')}}" loop type="audio/mp3">
        <!-- Add more source elements for additional songs -->
    </audio>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="{{route('login')}}">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a>
            @livewire('cart-icon-component')
            @livewire('wishlist-icon-component')
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Cash on delivery, we delivery all over Lebanon.</p>
        </div>
    </div>
    {{-- <div id="global-loader">
        <img src="{{asset('assets/img/loading.gif')}}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- Offcanvas Menu End -->
