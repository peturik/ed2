<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $images = Post::query()->select(['image'])->limit(20)->get();
        return view('home', compact('images'));
    }
}
