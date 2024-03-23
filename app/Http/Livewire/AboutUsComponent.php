<?php

namespace App\Http\Livewire;

use App\Models\admin\Strings;
use Livewire\Component;

class AboutUsComponent extends Component
{
    public function render()
    {
<<<<<<< HEAD
        $strings = Strings::get();
        return view('livewire.about-component', ['strings' => $strings]);
=======
        $string = Strings::find(1);
        return view('livewire.about-component', ['string' => $string]);
>>>>>>> bc7fe8220bdfdd57fcb394cb46a27f7e813f1698
    }
}
