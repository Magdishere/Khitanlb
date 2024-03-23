<?php

namespace App\Http\Livewire;

use App\Models\admin\Strings;
use Livewire\Component;

class AboutUsComponent extends Component
{
    public function render()
    {
        $string = Strings::find(1);
        return view('livewire.about-component', ['string' => $string]);
    }
}
