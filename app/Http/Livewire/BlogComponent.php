<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Posts;


class BlogComponent extends Component
{


    public function render()
    {

        $posts = Posts::orderBy('created_at', 'DESC')->get()->take(8);
        return view('livewire.blog-component', ['posts' => $posts]);
    }
}
