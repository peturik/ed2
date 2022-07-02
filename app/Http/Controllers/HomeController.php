<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $slug;
    
    public $isSuccess = false;
    public function home()
    {
        $images = Post::query()
            ->select(['image'])
            ->inRandomOrder()
            ->where('active', 1)
            ->limit(20)
            ->get();
        return view('home', ['images' => $images, 'isSuccess' => $this->isSuccess, 'slug' => $this->slug]);
    }

}

