<div>
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
@if($flashSale)
<section class="product spad">
    <div class="container">
        <header class="row" style="color:#FFFFFF;background:rgba(253,45,125,0.6);">
            <div class="col-md-4">
                <h4 class="-m -fs20 -elli">Flash Sales Don't Miss !!</h4>
            </div>
            <div class="col-md-4">
                Time Left:
                <time id="countdownTimer" class="-b -ws-p" datetime="{{$flashSale->start_date}}" data-cd="true">{{$flashSale->start_date}}</time>
            </div>
            <div class="col-md-4">
                <a href="/flash-sales/" class="-df -i-ctr -upp -m -mls -pvxs">See All
                    <svg style="fill:#FFFFFF;" viewBox="0 0 24 24" class="ic" width="24" height="24">
                        <use xlink:href="https://www.jumia.com.eg/assets_he/images/i-icons.a66628fd.svg#arrow-right"></use></svg>
                </a>
            </div>
        </header>
        <div class="row" style="
    background-color: white;
    box-shadow: 5px 5px 10px rgb(0 0 0 / 7%);
    border-radius: 12px;
">
            <div class="col-md-12">
                <h2>Trending <b>Products</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="row">
                                @foreach($flashSale->products as $product)
                                    <div class="col-sm-3">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product.details', ['slug'=>$product->slug])}}">
                                                        <img class="default-img" src="{{asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                                        <img class="hover-img" src="{{asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                        <i class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop.html">Music</a>
                                                </div>
                                                <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                                <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>${{$product->regular_price}}</span>
                                                    {{-- <span class="old-price">$245.8</span> --}}
                                                </div>
                                                <div class="product-action-1 show">
                                                    {{--@if($witems->contains($product->id))
                                                        <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent='removeFromWishlist({{$product->id}})'><i class="fi-rs-heart"></i></a>
                                                    @else
                                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
                                                    @endif--}}
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">
                                @foreach($flashSale->products as $products)

                                @endforeach
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="https://www.boostmobile.com/content/dam/boostmobile/en/products/phones/samsung/galaxy-s8/black/device-front.png.transform/pdpCarousel/image.jpg" class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Samsung Galaxy S8</h4>
                                            <p class="item-price"><strike>$599.00</strike> <span>$569.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="http://www.tozostore.com/wp-content/uploads/2017/03/%E6%9C%AA%E6%A0%87%E9%A2%98-1-1.jpg" class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Apple iPhone</h4>
                                            <p class="item-price"><strike>$369.00</strike> <span>$349.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="https://www.bhphotovideo.com/images/images2500x2500/canon_0020c003_eos_rebel_t6s_dslr_1116104.jpg" class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Canon DSLR</h4>
                                            <p class="item-price"><strike>$315.00</strike> <span>$250.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="https://images-na.ssl-images-amazon.com/images/I/81CM3aNz%2B-L._SX569_.jpg" class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Google Pixel</h4>
                                            <p class="item-price"><strike>$450.00</strike> <span>$418.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="https://www.att.com/catalog/en/skus/Apple/Apple%20Watch%20Series%203%2042mm/overview/344802-PDP-watch-S3-img1@2x.jpg" class="img-responsive img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Apple Watch</h4>
                                            <p class="item-price"><strike>$350.00</strike> <span>$330.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@endif
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
            @php
                $items = Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($lproducts as $lproduct)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin-assets/uploads/images/products/' . $lproduct['image']) }}" style="background-image: url({{ asset('admin-assets/uploads/images/products/' . $lproduct['image']) }})">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li>
                        @if($items->contains($lproduct->id))
                            <a href="#" class="add-cart" wire:click.prevent="removeFromWishlist('{{ $lproduct['id'] }}')"><img class="heart" src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                        @else
                            @if (App\Sale\Sale::calculateDiscountedPrice($lproduct['id']) != '-')
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $lproduct['id'] }}', '{{ $lproduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($lproduct['id']) }})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @else
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $lproduct['id'] }}', '{{ $lproduct['name'] }}', {{$lproduct['regular_price']}})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @endif
                        @endif
                            </li>
                            <li><a href=""><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                            </li>
                            <li><a href="{{route('product.details', ['slug'=>$lproduct->slug])}}"><img class="p_details" src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$lproduct->name}}</h6>
                        @if (App\Sale\Sale::calculateDiscountedPrice($lproduct['id']) != '-')
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $lproduct['id'] }}', '{{ $lproduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($lproduct['id']) }})"                                            >+ Add To Cart</a>
                        @else
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $lproduct['id'] }}', '{{ $lproduct['name'] }}', {{$lproduct['regular_price']}})"                                            >+ Add To Cart</a>
                        @endif
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        @if (App\Sale\Sale::calculateDiscountedPrice($lproduct['id']) != '-')
                                    <span class="text-1000 fw-bold">
                                    <del>${{ $lproduct['regular_price'] + (new \App\Models\admin\Product())->getDefaultSizePrice($lproduct) }}</del>
                                    </span>
                                    <span class="text-1000" style="font-weight: bold;">${{ App\Sale\Sale::calculateDiscountedPrice($lproduct['id'])}}</span>
                                    @else
                                        <span class="text-1000" style="font-weight: bold;">${{$lproduct['regular_price']}}</span>
                                    @endif
                        <div class="product__color__select">
                            @foreach($lproduct->attributeOptions as $options)
                                @if($options->attribute->name == 'color')
                                    @foreach($options->translations as $translation)
                                        @if($translation->locale == app()->getLocale())
                                            <label class="{{ ($selectedColors[$lproduct->id] === $translation->value || ($selectedColors[$lproduct->id] === null && $options->pivot->is_default === 1)) ? 'active ' . $translation->value : $translation->value  }}" for="{{ 'pc-' . $lproduct->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                                                <input type="radio" id="{{ 'pc-' . $lproduct->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $lproduct->id }}" value="{{ $translation->value }}">
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
</div>
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
