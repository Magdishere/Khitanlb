<div>
    <section class="product spad">
        <div class="container">
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

                            <livewire:reviews-component :productId="$mostOrderedProduct->id" />

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

                            <livewire:reviews-component :productId="$lproduct->id" />

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

                            <livewire:reviews-component :productId="$sproduct->id" />

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
</div>
