<div>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($slides as $slide)
        <div class="hero__items set-bg" style="background-image: url('{{ asset('admin-assets/uploads/images/slides/' . $slide['image']) }}')">
            <div class="hero__overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h2 style="color: palevioletred;">{{$slide->title}}</h2>
                            <p class="text-white">{{$slide->description}}</p>
                            <a href="{{route('shop')}}" class="primary-btn slide-btn" style="background-color: transparent;">Shop now <span class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a class="socialmedia-btn" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="socialmedia-btn" href="#"><i class="fa fa-instagram"></i></a>
                                <a class="socialmedia-btn" href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="product spad">
        <div class="container-fluid">
            <div class="container">
                <div class="owl-carousel categories-carousel">
                    @foreach($categories as $category)
                    <div class="category-item">
                        <div class="circle-container">
                            <img src="{{ asset('admin-assets/uploads/images/categories/' . $category->image_path) }}" alt="Category Logo" class="img-inside-circle">
                        </div>
                        <h5 class="text-center pt-5">{{$category->name}}</h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>

<section class="product spad">
    <div class="tickerwrapper">
        <ul class='list'>
           <li class='listitem'>
             <span>Free & Fast Shipping</span>
           </li>
           <li class='listitem'>
            <span>High Quality</span>
           </li>
           <li class='listitem'>
            <span>14-Day Return</span>
           </li>
           <li class='listitem'>
            <span>24/7 Support</span>
           </li>
           <li class='listitem'>
            <span>Free & Fast Shipping</span>
          </li>
          <li class='listitem'>
           <span>High Quality</span>
          </li>
          <li class='listitem'>
           <span>14-Day Return</span>
          </li>
          <li class='listitem'>
           <span>24/7 Support</span>
          </li>
          <li class='listitem'>
           <span>Free & Fast Shipping</span>
          </li>
          <li class='listitem'>
           <span>High Quality</span>
          </li>
          <li class='listitem'>
           <span>14-Day Return</span>
          </li>
       </ul>
     </div>
</section>
{{-- <section class="product spad">
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
</section> --}}
    @if($flashSale)
        <!-- Services Section Begin -->
        <section class="product spad">
            <div class="container">
                <header class="row" style="color:#FFFFFF;background:rgba(0, 0, 0);">
                    <div class="col-md-6">
                        <h4 class="-m -fs20 -elli mt-1" style="color: rgb(240, 102, 166); text-shadow: 0 0 10px pink;">Flash sales, Up to 50%.</h4>

                    </div>
                    <div class="col-md-6" style="font-size: 24px; text-align: right;">
                        Time Left:
                        <time id="countdownTimer" class="-b -ws-p" datetime="{{$flashSale->start_date}}" data-cd="true">{{$flashSale->start_date}}</time>
                        <a href="{{route('sale.product', ['id'=>$flashSale->id])}}" class="-df -i-ctr -upp -m -mls -pvxs" style="color: rgb(240, 102, 166); text-shadow: 0 0 10px pink;"> >>
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
                                @if($flashSale == 'category')
                                    @php
                                        $categoryProducts = \App\Models\admin\Product::where('category_id', $flashSale->categories->first()->id)->get();
                                    @endphp
                                    @foreach($categoryProducts->chunk(3) as $key => $chunk)
                                        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                                    @endforeach
                                @elseif($flashSale == 'product')
                                    @foreach($flashSale->products->chunk(3) as $key => $chunk)
                                        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                                    @endforeach
                                @endif
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                @php
                                    $items = Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                                @if($flashSale->target_type == 'product')
                                @foreach($flashSale->products->chunk(3) as $key => $chunk)
                                    <div class="item carousel-item {{$key == 0 ? 'active' : ''}}">
                                        <div class="row product__filter">
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
                                @elseif($flashSale->target_type == 'category')
                                    @php
                                        $categoryProducts = \App\Models\admin\Product::where('category_id', $flashSale->categories->first()->id)->get();
                                    @endphp
                                    @foreach($categoryProducts ->chunk(3) as $key => $chunk)
                                    <div class="item carousel-item {{$key == 0 ? 'active' : ''}}">
                                        <div class="row product__filter">
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
                                @endif
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
    @endif

 @if($bannerSale)
   <section class="product spad">
            <div class="container">
                <div class="col-lg-12">
                    <div class="section-title centered-paragraph">
                        <h2>ٍSales</h2>
                        <p>Discover our beautiful crocheted products. Each piece is carefully handmade to add warmth and charm to your space. Explore the artistry in every stitch.</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($bannerSale as $banners)
                        <div class="col-lg-6 col-md-6 col-sm-12 pb-1">
                            <div class="d-flex align-items-center bg-light mb-4 text-center gradient-border" style="padding: 15px;">
                                <a href="{{route('sale.product', ['id'=>$banners->id])}}">
                                    <img src="{{asset($banners->banner)}} " style="height: 300px; width: 600px">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@endif

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
                    <li data-filter=".best_sellers">Best Sellers</li>
                    <li class="active" data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @php
                $items = Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($mostOrderedProducts as $mostOrderedProduct)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best_sellers">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin-assets/uploads/images/products/' . $mostOrderedProduct['image']) }}" style="background-image: url({{ asset('admin-assets/uploads/images/products/' . $mostOrderedProduct['image']) }})">
                        <span class="label">Trending</span>
                        <ul class="product__hover">
                            <li>
                        @if($items->contains($mostOrderedProduct->id))
                            <a href="#" class="add-cart" wire:click.prevent="removeFromWishlist('{{ $mostOrderedProduct['id'] }}')"><img class="heart" src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                        @else
                            @if (App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id']) != '-')
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $mostOrderedProduct['id'] }}', '{{ $mostOrderedProduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id']) }})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @else
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $mostOrderedProduct['id'] }}', '{{ $mostOrderedProduct['name'] }}', {{$mostOrderedProduct['regular_price']}})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @endif
                        @endif
                            </li>
                            <li><a href=""><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                            </li>
                            <li><a href="{{route('product.details', ['slug'=>$mostOrderedProduct->slug])}}"><img class="p_details" src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$mostOrderedProduct->name}}</h6>
                        @if (App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id']) != '-')
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $mostOrderedProduct['id'] }}', '{{ $mostOrderedProduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id']) }})"                                            >+ Add To Cart</a>
                        @else
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $mostOrderedProduct['id'] }}', '{{ $mostOrderedProduct['name'] }}', {{$mostOrderedProduct['regular_price']}})"                                            >+ Add To Cart</a>
                        @endif
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        @if (App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id']) != '-')
                                    <span class="text-1000 fw-bold">
                                    <del>${{ $mostOrderedProduct['regular_price'] + (new \App\Models\admin\Product())->getDefaultSizePrice($mostOrderedProduct) }}</del>
                                    </span>
                                    <span class="text-1000" style="font-weight: bold;">${{ App\Sale\Sale::calculateDiscountedPrice($mostOrderedProduct['id'])}}</span>
                                    @else
                                        <span class="text-1000" style="font-weight: bold;">${{$mostOrderedProduct['regular_price']}}</span>
                                    @endif
                        <div class="product__color__select">
                            @foreach($mostOrderedProduct->attributeOptions as $options)
                                @if($options->attribute->name == 'color')
                                    @foreach($options->translations as $translation)
                                        @if($translation->locale == app()->getLocale())
                                            <label class="{{ ($selectedColors[$mostOrderedProduct->id] === $translation->value || ($selectedColors[$mostOrderedProduct->id] === null && $options->pivot->is_default === 1)) ? 'active ' . $translation->value : $translation->value  }}" for="{{ 'pc-' . $mostOrderedProduct->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                                                <input type="radio" id="{{ 'pc-' . $mostOrderedProduct->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $mostOrderedProduct->id }}" value="{{ $translation->value }}">
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
            @foreach($sproducts as $sproduct)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('admin-assets/uploads/images/products/' . $sproduct['image']) }}" style="background-image: url({{ asset('admin-assets/uploads/images/products/' . $sproduct['image']) }})">
                        <span class="label">Sale</span>
                        <ul class="product__hover">
                            <li>
                        @if($items->contains($sproduct->id))
                            <a href="#" class="add-cart" wire:click.prevent="removeFromWishlist('{{ $sproduct['id'] }}')"><img class="heart" src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                        @else
                            @if (App\Sale\Sale::calculateDiscountedPrice($sproduct['id']) != '-')
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $sproduct['id'] }}', '{{ $sproduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($sproduct['id']) }})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @else
                                <a href="#" class="add-cart" wire:click.prevent="addToWishlist('{{ $sproduct['id'] }}', '{{ $sproduct['name'] }}', {{$sproduct['regular_price']}})"><img src="{{asset('assets/img/icon/heart.png')}}" alt=""></a>
                            @endif
                        @endif
                            </li>
                            <li><a href=""><img src="{{asset('assets/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                            </li>
                            <li><a href="{{route('product.details', ['slug'=>$sproduct->slug])}}"><img class="p_details" src="{{asset('assets/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$sproduct->name}}</h6>
                        @if (App\Sale\Sale::calculateDiscountedPrice($sproduct['id']) != '-')
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $sproduct['id'] }}', '{{ $sproduct['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($sproduct['id']) }})"                                            >+ Add To Cart</a>
                        @else
                            <a href="#" class="add-cart" wire:click.prevent="addToCart('{{ $sproduct['id'] }}', '{{ $sproduct['name'] }}', {{$sproduct['regular_price']}})"                                            >+ Add To Cart</a>
                        @endif
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        @if (App\Sale\Sale::calculateDiscountedPrice($sproduct['id']) != '-')
                                    <span class="text-1000 fw-bold">
                                    <del>${{ $sproduct['regular_price'] + (new \App\Models\admin\Product())->getDefaultSizePrice($sproduct) }}</del>
                                    </span>
                                    <span class="text-1000" style="font-weight: bold;">${{ App\Sale\Sale::calculateDiscountedPrice($sproduct['id'])}}</span>
                                    @else
                                        <span class="text-1000" style="font-weight: bold;">${{$sproduct['regular_price']}}</span>
                                    @endif
                        <div class="product__color__select">
                            @foreach($sproduct->attributeOptions as $options)
                                @if($options->attribute->name == 'color')
                                    @foreach($options->translations as $translation)
                                        @if($translation->locale == app()->getLocale())
                                            <label class="{{ ($selectedColors[$sproduct->id] === $translation->value || ($selectedColors[$sproduct->id] === null && $options->pivot->is_default === 1)) ? 'active ' . $translation->value : $translation->value  }}" for="{{ 'pc-' . $sproduct->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                                                <input type="radio" id="{{ 'pc-' . $sproduct->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $sproduct->id }}" value="{{ $translation->value }}">
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
@if($countdownSale)
<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-3">--}}
{{--                <div class="categories__text">--}}
{{--                    <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{$countdownSale->banner}}" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        @if($countdownSale->sale_type = 'fixed')
                            <h5>${{$countdownSale->value}}</h5>
                        @elseif('percent')
                            <h5>%{{$countdownSale->value}}</h5>
                        @else
                            <h5>{{$countdownSale->value}}</h5>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>{{$countdownSale->name}}</h2>
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
    @endif
<!-- Instagram Section Begin -->
<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/insta.jpg')}}" alt=""></div>
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/insta2.jpg')}}" alt=""></div>
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/insta3.jpg')}}" alt=""></div>
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/4.jpg')}}" alt=""></div>
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/5.jpg')}}" alt=""></div>
                    <div class="instagram__pic__item set-bg"><img src="{{asset('assets/img/instagram/6.jpg')}}" alt=""></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2>Instagram</h2>
                    <p>Visit our Instagram and explore our latest posts!</p>
                    <h6 style="color: #d87093;">@khitanlb_2</h6>
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


    var $tickerWrapper = $(".tickerwrapper");
    var $list = $tickerWrapper.find("ul.list");
    var $clonedList = $list.clone();
    var listWidth = 10;

    $list.find("li").each(function (i) {
        listWidth += $(this, i).outerWidth(true);
    });

    var endPos = $tickerWrapper.width() - listWidth;

    $list.add($clonedList).css({
        "width" : listWidth + "px"
    });

    $clonedList.addClass("cloned").appendTo($tickerWrapper);

    //TimelineMax
    var infinite = new TimelineMax({repeat: -1, paused: true});
    var time = 20;

    infinite

        .fromTo($list, time, {rotation:0.01,x:0}, {force3D:true, x: -listWidth, ease: Linear.easeNone}, 0)
        .fromTo($clonedList, time, {rotation:0.01, x:listWidth}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
        .set($list, {force3D:true, rotation:0.01, x: listWidth})
        .to($clonedList, time, {force3D:true, rotation:0.01, x: -listWidth, ease: Linear.easeNone}, time)
        .to($list, time, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time)
        .progress(1).progress(0)
        .play();

    //Pause/Play
    $tickerWrapper.on("mouseenter", function(){
        infinite.pause();
    }).on("mouseleave", function(){
        infinite.play();
    });

</script>


