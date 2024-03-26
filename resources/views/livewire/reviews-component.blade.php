<div>
    <div class="rating">
        @php
        $roundedRating = round($averageRating); // Round the average rating to the nearest whole number
        @endphp

        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $roundedRating)
                <i class="fa fa-star ratings-stars" wire:click="rateProduct({{ $i }})"></i> <!-- Full star -->
            @else
                <i class="fa fa-star-o ratings-stars" wire:click="rateProduct({{ $i }})"></i> <!-- Empty star -->
            @endif
        @endfor
            <span> - {{ $totalReviews }} Reviews</span>
    </div>
    @if(auth()->check())
        <!-- No need for the form -->
    @else
        <p>Please <a href="{{ route('login') }}" style="color:#d78093">login</a> to leave a rating.</p>
    @endif
</div>
