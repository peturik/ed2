<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Http\Livewire\Blog as BlogPost;

class Blog extends Component
{
    public function render()
    {

        $posts = Post::query()
            ->where('active', 1)
            ->latest()
//             ->orderBy('id', 'desc')
            ->paginate(10);
        
        $category = Category::all();
        return view('livewire.blog', compact('posts', 'category'))
            ->extends('layouts.main')
            ->section('content');
    }

    public function category($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        $posts = Post::query()
            ->where('category_id', $category->id)
            ->where('active', 1)
//             ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.blog', compact('posts', 'category'));
    }

}
