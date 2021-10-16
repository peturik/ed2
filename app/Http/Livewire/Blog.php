<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $posts = \App\Models\Post::all();
        return view('livewire.blog', compact('posts'))
            ->extends('layouts.main')
            ->section('content');
    }
}
