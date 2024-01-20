<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
class CheckoutsComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $city;
    public $street_address;
    public $state;
    public $country;
    public $zipcode;


    public function updated($field)
    {
        $this->validateOnly($field,[
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);

        // Retrieve checkout data from the session
        $checkoutData = session()->get('checkout', []);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = Cart::subtotal(); // Use default value if not set
        $order->discount = $order->discount = $checkoutData['discount'] ?? 0;  // Use default value if not set
        $order->tax = Cart::tax(); // Use default value if not set
        $order->total = Cart::total(); // Use default value if not set
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->street_address = $this->street_address;
        $order->city = $this->city;
        $order->state = $this->state;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id; // Use the newly created order's ID
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
    }


    public function render()
    {
        return view('livewire.checkouts-component');
    }
}
