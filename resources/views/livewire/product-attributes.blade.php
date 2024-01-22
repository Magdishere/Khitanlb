<div>

@if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
    <h3>${{ App\Sale\Sale::calculateDiscountedPrice($product['id'])}} <span>{{ $calculatedPrice ? $calculatedPrice : $price }}</span></h3>
@else
    <h3>${{$calculatedPrice ? $calculatedPrice : $product->regular_price}}</h3>
@endif

    @if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
        <a href="#" class="primary-btn" wire:click.prevent="addToCart('{{ $product['id'] }}', '{{ $product['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($product['id']) }})"                                            >+ Add To Cart</a>
    @else
        <a href="#" class="primary-btn" wire:click.prevent="addToCart('{{ $product['id'] }}', '{{ $product['name'] }}', {{$product['regular_price']}})">Add To Cart</a>
    @endif
<p>{{$product->short_description}}

<div class="product__details__option">
    <div class="product__details__option__color">
        <span>@dump($this->selectedSize)</span>
        <span>Color:</span>
        @foreach($product->attributeOptions as $options)
            @if($options->attribute->name == 'color')
                @foreach($options->translations as $translation)
                    @if($translation->locale == app()->getLocale())
                        <label class="{{ $options->pivot->is_default === 1 ? 'active' : '' }} c-{{ $loop->index + 1 }}" for="{{ 'pc-' . $product->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                            <input type="radio" id="{{ 'pc-' . $product->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $product->id }}" value="{{ $translation->value }}">
                        </label>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

    <div class="product__details__option__size">
        <span>-</span>
        @foreach($product->attributeOptions as $options)
            @if($options->attribute->name !== 'color')
                @foreach($options->translations as $translation)
                    @if($translation->locale == 'en')
                        <label class="{{ ($selectedSize === $options->pivot->price || ($selectedSize === null && $options->pivot->is_default === 1)) ? 'active' : '' }}" for="{{ $translation->value }}">
                            {{ $translation->value }}
                            <input type="radio" id="{{ $translation->value }}" wire:model="selectedSize.{{ $product->id }}" value="{{ $translation->value }}">
                            {{ $options->pivot->price }}
                        </label>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
</div>
</div>
