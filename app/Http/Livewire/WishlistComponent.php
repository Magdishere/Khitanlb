<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistComponent extends Component
{

    public $wishlistContent = [];

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\admin\Product");
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($rowId)
    {
        // Remove the entire row (product) from the cart
        Cart::instance('wishlist')->remove($rowId);

        $this->emitTo('wishlist-icon-component', 'refreshComponent');

        // Refresh the cart content after the removal
        $this->wishlistContent = Cart::instance('wishlist')->content();
    }
    //


    public function increaseQuantity($rowId)
    {
        // Find the cart item by rowId
        $cartItem = Cart::instance('wishlist')->get($rowId);

        if ($cartItem) {
            // Increment the quantity by 1
            $newQuantity = $cartItem->qty + 1;

            // Update the cart item with the new quantity
            Cart::instance('wishlist')->update($rowId, $newQuantity);
        }

        $this->emitTo('wishlist-icon-component', 'refreshComponent');


        // Refresh the cart content after the update
        $this->wishlistContent = Cart::instance('wishlist')->content();
    }

    public function decreaseQuantity($rowId)
{
    // Find the cart item by rowId
    $cartItem = Cart::instance('wishlist')->get($rowId);

    if ($cartItem) {
        // Decrease the quantity by 1
        $newQuantity = max(0, $cartItem->qty - 1);

        if ($newQuantity == 0) {
            // If the new quantity is 0, remove the item from the cart
            Cart::instance('wishlist')->remove($rowId);
        } else {
            // Update the cart item with the new quantity
            Cart::instance('wishlist')->update($rowId, $newQuantity);
        }


        $this->emitTo('wishlist-icon-component', 'refreshComponent');

    }

    // Refresh the cart content after the update
    $this->wishlistContent = Cart::instance('wishlist')->content();

}


    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
