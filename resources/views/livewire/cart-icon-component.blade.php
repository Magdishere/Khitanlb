


<div class="header__nav__option">
    <a href="#" class="search-switch"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
    <a href="#"><img src="{{asset('assets/img/icon/cart.png')}}" alt="">
        @if(Cart::instance('cart')->count() > 0)
        <span class="pro-count blue">{{Cart::count()}}</span>
        @endif
    </a>
    @foreach(Cart::instance('cart')->content() as $item)
    <div class="price">{{$item->qty}} × </span>${{$item->regular_price}}</div>
    @endforeach
</div>
