<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Order;
class CheckoutsComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public function updated($field)
    {
        $this->validateOnly($field,[
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'line1' => 'required|numeric',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'line1' => 'required|numeric',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
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
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
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
