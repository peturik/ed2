<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;

class Search extends Component
{
    public $search = '';
//    public $posts = '';

    public function render()
    {
//        $this->posts =
        return view('livewire.search',[
            'searchPosts' => Post::query()->where('title', 'like', '%' . $this->search . '%')->get(),
        ]);
    }
}
