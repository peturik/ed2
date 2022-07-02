<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use App\Models\Post as BlogPost;

class Post extends Component
{
    public $post;

    public function mount($slug)
    {
        $this->post = BlogPost::where('slug', $slug)->first();
    }

    public function render()
    {
        $images = Gallery::query()->where('post_id', $this->post->id)->get();
        return view('livewire.post', compact('images'))
            ->extends('layouts.main')
            ->section('content');
    }
}
