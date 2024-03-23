<?php

namespace App\Http\Livewire;

use App\Models\admin\Strings;
use Livewire\Component;

class AboutUsComponent extends Component
{


    public function render()
    {
        $strings = Strings::where('id', 3)->get();
        return view('livewire.about-component', ['strings' => $strings]);
    }
}
