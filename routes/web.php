<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\PostCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Post;
use App\Http\Livewire\Blog;
use App\Http\Controllers\Admin\CommentAdminController;

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

Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth'])->name('admin');
Route::get('/admin/posts', [PostAdminController::class, 'posts'])->middleware(['auth'])->name('admin.posts');

Route::get('/admin/post/add', [PostAdminController::class, 'showAddPostForm'])->name('post.add');//->middleware(['auth', 'isadmin'])
Route::post('/admin', [PostAdminController::class, 'storePost'])->name('post.store');

Route::get('/admin/post/{post}/edit', [PostAdminController::class, 'showEditPostForm'])->name('post.edit')->middleware('can:update,post');
Route::patch('/admin/{post}', [PostAdminController::class, 'updatePost'])->name('post.update')->middleware('can:update,post');
Route::get('/admin/post/{post}/delete', [PostAdminController::class, 'showDeletePostForm'])->name('post.delete')->middleware('can:destroy,post');
Route::delete('/admin/post/{post}', [PostAdminController::class, 'destroyPost'])->name('post.destroy')->middleware('can:destroy,post');

Route::get('/admin/comments', [CommentAdminController::class, 'index'])->name('admin.comments')->middleware(['auth', 'isadmin']);
Route::get('/admin/comment/{comment}/delete', [CommentAdminController::class, 'showDeleteCommentForm'])->name('comment.delete')->middleware(['auth', 'isadmin']);
Route::delete('/admin/comment/{comment}', [CommentAdminController::class, 'destroyComment'])->name('comment.destroy')->middleware(['auth', 'isadmin']);

require __DIR__.'/auth.php';
