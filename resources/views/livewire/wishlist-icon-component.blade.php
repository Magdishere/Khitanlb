


    <a href="/wishlist"><img src="{{asset('assets/img/icon/heart.png')}}" alt="">
        @if(Cart::instance('wishlist')->count() > 0)
        <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
        @endif
    </a>
