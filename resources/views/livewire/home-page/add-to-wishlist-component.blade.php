<div x-data="{ isWishlist: {{ $items->contains($product->id) ? 'true' : 'false' }} }">
    <li>
        <template x-if="isWishlist">
            <a href="#" class="add-cart" x-bind:class="{ 'heart': isWishlist }" wire:click.prevent="removeFromWishlist('{{ $product['id'] }}')" @click="isWishlist = false"><img class="heart" src="{{ asset('assets/img/icon/heart.png') }}" alt=""></a>
        </template>
        <template x-if="!isWishlist">
            @if (App\Sale\Sale::calculateDiscountedPrice($product['id']) != '-')
                <a href="#" class="add-cart" x-bind:class="{ '': isWishlist }" wire:click.prevent="addToWishlist('{{ $product['id'] }}', '{{ $product['name'] }}', {{ App\Sale\Sale::calculateDiscountedPrice($product['id']) }})" @click="isWishlist = true"><img src="{{ asset('assets/img/icon/heart.png') }}" alt=""></a>
            @else
                <a href="#" class="add-cart" x-bind:class="{ '': isWishlist }" wire:click.prevent="addToWishlist('{{ $product['id'] }}', '{{ $product['name'] }}', {{ $product['regular_price'] }})" @click="isWishlist = true"><img src="{{ asset('assets/img/icon/heart.png') }}" alt=""></a>
            @endif
        </template>
    </li>
</div>

