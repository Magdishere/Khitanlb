<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="{{asset('assets/img/hero/hero1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="{{asset('assets/img/hero/h4.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Summer Collection</h6>
                            <h2>Fall - Winter Collections 2030</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Services Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 30px;">
                    <img src="{{asset('../assets/img/icon/fast-delivery.png')}} " style="width: 50px; height:50px;">
                    <h5 class="font-weight-bold mx-2">Free & Fast Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 30px;">
                    <img src="{{asset('../assets/img/icon/yarn-ball.png')}} " style="width: 50px; height:50px;">
                    <h5 class="font-weight-bold mx-2">High Quality</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 30px;">
                    <img src="{{asset('../assets/img/icon/cashback.png')}} " style="width: 50px; height:50px;">
                    <h5 class="font-weight-bold mx-2">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 30px;">
                    <img src="{{asset('../assets/img/icon/support.png')}} " style="width: 50px; height:50px;">
                    <h5 class="font-weight-bold mx-2">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section Begin -->
<section class="product spad">
    <div class="container">
        <header class="row" style="color:#FFFFFF;background:rgba(253,45,125,0.6);">
            <div class="col-md-6">
                <h4 class="-m -fs20 -elli" style="color: white">Flash Sales Don't Miss !!</h4>
            </div>
            <div class="col-md-6" style="font-size: 24px; text-align: right;">
                Time Left:
                <time id="countdownTimer" class="-b -ws-p" datetime="{{$flashSale->start_date}}" data-cd="true">{{$flashSale->start_date}}</time>
                <a href="/flash-sales/" class="-df -i-ctr -upp -m -mls -pvxs" style="color: #0b2e13"> >>
                    <svg style="fill:#FFFFFF;" viewBox="0 0 24 24" class="ic" width="24" height="24">
                        <use xlink:href="https://www.jumia.com.eg/assets_he/images/i-icons.a66628fd.svg#arrow-right"></use></svg>
                </a>
            </div>
        </header>
        <div class="row" style="background-color: white; box-shadow: 5px 5px 10px rgb(0 0 0 / 7%); border-radius: 12px;">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        @foreach($flashSale->products->chunk(4) as $key => $chunk)
                            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        @foreach($flashSale->products->chunk(4) as $key => $chunk)
                            <div class="item carousel-item {{$key == 0 ? 'active' : ''}}">
                                <div class="row product__filter">
                                    @php
                                        $items = Cart::instance('wishlist')->content()->pluck('id');
                                    @endphp
                                @foreach($chunk as $product)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" data-setbg="{{ asset('admin-assets/uploads/images/products/' . $product['image']) }}" style="background-image: url({{ asset('admin-assets/uploads/images/products/' . $product['image']) }})">
                                                    <ul class="product__hover">
                                                        <li>
                                                            @if($items->contains($product->id))
                                                                <a href="#" class="add-cart" wire:click.prevent="removeFromWishlist('{{ $product['id'] }}')"><img class="heart" src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                                                            @else
                                                                @if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
                                                                    <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $product['id'] }}', '{{ $product['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($product['id']) }})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                                                                @else
                                                                    <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $product['id'] }}', '{{ $product['name'] }}', {{$product['regular_price']}})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                                                                @endif
                                                            @endif
                                                        </li>
                                                        <li><a href=""><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                                        </li>
                                                        <li><a href="{{route('product.details', ['slug'=>$product->slug])}}"><img class="p_details" src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__item__text">
                                                    <h6>{{$product['name']}}</h6>
                                                    @if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
                                                        <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $product['id'] }}', '{{ $product['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($product['id']) }})"                                            >+ Add To Cart</a>
                                                    @else
                                                        <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $product['id'] }}', '{{ $product['name'] }}', {{$product['regular_price']}})"                                            >+ Add To Cart</a>
                                                    @endif
                                                    <div class="rating">

                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>

                                                    @if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
                                                        <span class="text-1000 fw-bold">
    <del>${{ $product['regular_price'] + (new \App\Models\admin\Product())->getDefaultSizePrice($product) }}</del>
                                    </span>
                                                        <span class="text-1000" style="font-weight: bold;">${{ App\Sale\Sale::calculateDiscountedPrice($product['id'])}}</span>
                                                    @else
                                                        <span class="text-1000" style="font-weight: bold;">${{$product['regular_price']}}</span>
                                                    @endif


                                                    <div class="product__color__select">
                                                        @foreach($product->attributeOptions as $options)
                                                            @if($options->attribute->name == 'color')
                                                                @foreach($options->translations as $translation)
                                                                    @if($translation->locale == app()->getLocale())
                                                                        <label class="{{ ($selectedColors[$product->id] === $translation->value || ($selectedColors[$product->id] === null && $options->pivot->is_default === 1)) ? 'active ' . $translation->value : $translation->value  }}" for="{{ 'pc-' . $product->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                                                                            <input type="radio" id="{{ 'pc-' . $product->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $product->id }}" value="{{ $translation->value }}">
                                                                        </label>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title centered-paragraph">
                <h2>ٍSales</h2>
                <p>Discover our beautiful crocheted products. Each piece is carefully handmade to add warmth and charm to your space. Explore the artistry in every stitch.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 15px;">
                    <img src="{{asset('../assets/img/banner/banner-9.jpg')}} " style="height: 300px; width: 600px">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 15px;">
                    <img src="{{asset('../assets/img/banner/banner-5.jpg')}} "  style="height: 300px; width: 600px">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 15px;">
                    <img src="{{asset('../assets/img/banner/banner-8.jpg')}} " style="height: 300px; width: 600px">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 15px;">
                    <img src="{{asset('../assets/img/banner/banner-7.jpg')}} "  style="height: 300px; width: 600px">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title centered-paragraph">
                    <h2>Check Our Poducts</h2>
                    <p>Discover our beautiful crocheted products. Each piece is carefully handmade to add warmth and charm to your space. Explore the artistry in every stitch.</p>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-1.jpg')}}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Piqué Biker Jacket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$67.24</h5>
                        <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-2.jpg')}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Piqué Biker Jacket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$67.24</h5>
                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-3.jpg')}}">
                        <span class="label">Sale</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Multi-pocket Chest Bag</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$43.48</h5>
                        <div class="product__color__select">
                            <label for="pc-7">
                                <input type="radio" id="pc-7">
                            </label>
                            <label class="active black" for="pc-8">
                                <input type="radio" id="pc-8">
                            </label>
                            <label class="grey" for="pc-9">
                                <input type="radio" id="pc-9">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-4.jpg')}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Diagonal Textured Cap</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$60.9</h5>
                        <div class="product__color__select">
                            <label for="pc-10">
                                <input type="radio" id="pc-10">
                            </label>
                            <label class="active black" for="pc-11">
                                <input type="radio" id="pc-11">
                            </label>
                            <label class="grey" for="pc-12">
                                <input type="radio" id="pc-12">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-5.jpg')}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Lether Backpack</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$31.37</h5>
                        <div class="product__color__select">
                            <label for="pc-13">
                                <input type="radio" id="pc-13">
                            </label>
                            <label class="active black" for="pc-14">
                                <input type="radio" id="pc-14">
                            </label>
                            <label class="grey" for="pc-15">
                                <input type="radio" id="pc-15">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-6.jpg')}}">
                        <span class="label">Sale</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Ankle Boots</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$98.49</h5>
                        <div class="product__color__select">
                            <label for="pc-16">
                                <input type="radio" id="pc-16">
                            </label>
                            <label class="active black" for="pc-17">
                                <input type="radio" id="pc-17">
                            </label>
                            <label class="grey" for="pc-18">
                                <input type="radio" id="pc-18">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-7.jpg')}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>T-shirt Contrast Pocket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$49.66</h5>
                        <div class="product__color__select">
                            <label for="pc-19">
                                <input type="radio" id="pc-19">
                            </label>
                            <label class="active black" for="pc-20">
                                <input type="radio" id="pc-20">
                            </label>
                            <label class="grey" for="pc-21">
                                <input type="radio" id="pc-21">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('assets/img/product/product-8.jpg')}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Basic Flowing Scarf</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$26.28</h5>
                        <div class="product__color__select">
                            <label for="pc-22">
                                <input type="radio" id="pc-22">
                            </label>
                            <label class="active black" for="pc-23">
                                <input type="radio" id="pc-23">
                            </label>
                            <label class="grey" for="pc-24">
                                <input type="radio" id="pc-24">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{asset('assets/img/product-sale.png')}}" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>$29.99</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>Multi-pocket Chest Bag Black</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-1.jpg')}}"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-2.jpg')}}"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-3.jpg')}}"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-4.jpg')}}"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-5.jpg')}}"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="{{asset('assets/img/instagram/instagram-6.jpg')}}"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Instagram</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <h3>#Male_Fashion</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest News</span>
                    <h2>Fashion New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('assets/img/blog/blog-1.jpg')}}"></div>
                    <div class="blog__item__text">
                        <span><img src="{{asset('assets/img/icon/calendar.png')}}" alt=""> 16 February 2020</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('assets/img/blog/blog-2.jpg')}}"></div>
                    <div class="blog__item__text">
                        <span><img src="{{asset('assets/img/icon/calendar.png')}}" alt=""> 21 February 2020</span>
                        <h5>Eternity Bands Do Last Forever</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{asset('assets/img/blog/blog-3.jpg')}}"></div>
                    <div class="blog__item__text">
                        <span><img src="{{asset('assets/img/icon/calendar.png')}}" alt=""> 28 February 2020</span>
                        <h5>The Health Benefits Of Sunglasses</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->

<script>
    // Function to update the countdown timer
    function updateCountdown() {
        // Get the current date and time
        var now = new Date().getTime();

        // Get the start date of the flash sale from the HTML element
        var startDate = new Date(document.getElementById('countdownTimer').getAttribute('datetime')).getTime();

        // Calculate the time remaining in milliseconds
        var timeRemaining = startDate - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        // Update the HTML element with the countdown values
        document.getElementById('countdownTimer').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // Update the countdown every second
        setTimeout(updateCountdown, 1000);
    }

    // Call the updateCountdown function to start the countdown
    updateCountdown();
</script>
