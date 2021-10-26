<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\PostEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostCreate;
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

Route::get('post/create', PostCreate::class)->middleware(['auth']);
Route::get('post/{slug}/update', PostCreate::class)->middleware(['auth']);
Route::get('post/{slug}', Post::class);
Route::get('blog', Blog::class);
Route::post('post/create/image-resize', [PostCreate::class, 'imgResize'])->name('img-resize');
//Route::get('post/{slug}/update', PostEdit::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// категория блога (посты категории)
Route::get('category/{category:slug}', 'BlogController@category')
    ->name('category');
// тег блога (посты с этим тегом)
Route::get('tag/{tag:slug}', 'BlogController@tag')
    ->name('tag');

require __DIR__.'/auth.php';
