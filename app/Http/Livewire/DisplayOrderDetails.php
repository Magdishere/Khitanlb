<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DisplayOrderDetails extends Component
{

    public $orders;

    public function mount()
    {
        $this->orders = Auth::user()->orders;
    }

    public function render()
    {
        return view('livewire.display-order-details');
    }
}
