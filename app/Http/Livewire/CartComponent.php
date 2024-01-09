<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public $cartContent = [];

    public function mount()
    {
        // Get the cart content and store it in $cartContent
        $this->cartContent = Cart::instance('cart')->content();
    }

    public function increaseQuantity($rowId)
    {
        // Find the cart item by rowId
        $cartItem = Cart::instance('cart')->get($rowId);

        if ($cartItem) {
            // Increment the quantity by 1
            $newQuantity = $cartItem->qty + 1;

            // Update the cart item with the new quantity
            Cart::instance('cart')->update($rowId, $newQuantity);
        }

        // Refresh the cart content after the update
        $this->cartContent = Cart::instance('cart')->content();
    }

    public function decreaseQuantity($rowId)
    {
        // Find the cart item by rowId
        $cartItem = Cart::instance('cart')->get($rowId);

        if ($cartItem && $cartItem->qty > 1) {
            // Decrease the quantity by 1, but ensure it doesn't go below 1
            $newQuantity = $cartItem->qty - 1;

            // Update the cart item with the new quantity
            Cart::instance('cart')->update($rowId, $newQuantity);
        }
        // Refresh the cart content after the update
        $this->cartContent = Cart::instance('cart')->content();

    }
    // Create similar methods for removing items and clearing the cart if needed
    public function render()
    {
        return view('livewire.cart-component', [
            'cartContent' => $this->cartContent,
        ]);
    }
}
