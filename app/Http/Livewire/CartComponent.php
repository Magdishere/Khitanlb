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

        $this->emitTo('cart-icon-component', 'refreshComponent');


        // Refresh the cart content after the update
        $this->cartContent = Cart::instance('cart')->content();
    }

    public function decreaseQuantity($rowId)
{
    // Find the cart item by rowId
    $cartItem = Cart::instance('cart')->get($rowId);

    if ($cartItem) {
        // Decrease the quantity by 1
        $newQuantity = max(0, $cartItem->qty - 1);

        if ($newQuantity == 0) {
            // If the new quantity is 0, remove the item from the cart
            Cart::instance('cart')->remove($rowId);
        } else {
            // Update the cart item with the new quantity
            Cart::instance('cart')->update($rowId, $newQuantity);
        }


        $this->emitTo('cart-icon-component', 'refreshComponent');

    }

    // Refresh the cart content after the update
    $this->cartContent = Cart::instance('cart')->content();

}

    public function removeFromCart($rowId)
    {
        // Remove the entire row (product) from the cart
        Cart::instance('cart')->remove($rowId);

        $this->emitTo('cart-icon-component', 'refreshComponent');

        // Refresh the cart content after the removal
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
