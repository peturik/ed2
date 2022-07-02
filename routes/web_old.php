<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\PostCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCreateController;
use App\Http\Livewire\Post;
use App\Http\Livewire\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', [HomeController::class,'home'])->name('home');
//Route::post('/', [HomeController::class,'sendMessage'])->name('sendMessage');

Route::get('post/create', PostCreate::class)->middleware(['auth', 'isadmin']);
Route::get('post/{slug}/update', PostCreate::class)->middleware(['auth', 'isadmin']);
Route::get('post/{slug}', Post::class)->name('post');
Route::get('blog', Blog::class)->name('blog');
Route::get('blog/category/{slug}', [Blog::class, 'category'])->name('category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
