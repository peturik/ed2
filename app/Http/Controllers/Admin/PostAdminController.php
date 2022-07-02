<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostAdminController extends AdminController
{
    public $image;

    public function posts()
    {
        return view('admin_panel.posts.posts', [
            'posts' => Auth::user()->post()->latest()->get(),
            'comments' => Comment::all(),
        ]);
        //метод user() возвращает объект модели User
        //метод post() возвращает объект "прямой" связи
    }

    /**
     * форма добавления поста
     */
    public function showAddPostForm()
    {
        $categories = Category::all();
        return view ('admin_panel.posts.post_add', compact('categories'));
    }

    private const POST_VALIDATOR = [
        'category' => 'required|numeric',
        'title' => 'required|min:6|max:50',
        'body' => 'required',
        'image' => 'image|max:2048|nullable',
    ];

    private const POST_ERROR_MESSAGES = [
        'title.required' => "The title field is required.",
        'body.required' => 'The body field is required.',
        'min' => 'Не меньше :min символов.',
    ];
    /**
     * сохранение поста в бд
     */
    public function storePost(Request $request)
    {
//        dd($request->image );
        $validated = $request->validate(self::POST_VALIDATOR,
            self::POST_ERROR_MESSAGES);

        $slug = Str::slug($validated['title'], '-');

        if ($request->image) {
            $this->saveImage($request->image, $slug);
        }

        Auth::user()->post()->create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'title' => $validated['title'],
            'slug' => $slug,
            'body' => $validated['body'],
            'image' => $this->image,
        ]);
        return redirect()->route('post', ['slug' => $slug]);
    }

    public function saveImage($img, $slug)
    {
        if (!empty($this->image)){
            unlink($_SERVER['DOCUMENT_ROOT'] . '/public/storage/' . $this->image);   // unlink() удалить файл
            $this->image = '';
        }

        $filename = date('Y_m_d_') . substr(uniqid(rand(), true), 8, 8) . '.' . $img->getClientOriginalExtension();
//            dd($this->image);
        $img->storeAs('public/uploads/images/' . $slug, $filename);
        $this->image = 'uploads/images/' . $slug . '/' . $filename;
    }

    /**
     * форма редактирования поста
     */
    public function showEditPostForm(Post $post)
    {
        $categories = Category::all();
        $this->image = $post->image;
//        dd($this->image);
        return view('admin_panel.posts.post_edit', compact('post', 'categories'));
    }

    /**
     * сохранение отредактированого поста
     */
    public function updatePost(Request $request, Post $post)
    {
//        dd($request);
        $validated = $request->validate(self::POST_VALIDATOR,
            self::POST_ERROR_MESSAGES);

        $this->image = $post->image;
        $slug = Str::slug($validated['title'], '-');

        if ($request->image) {
            $this->saveImage($request->image, $slug);
        }
// dd($this->image);
        $post->fill([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'title' => $validated['title'],
            'slug' => $slug,
            'body' => $validated['body'],
            'image' => $this->image,
        ]);
        $post->save();

        return redirect()->route('post', ['slug' => $post->slug]);
    }



    /**
     * форма удаления поста
     */
    public function showDeletePostForm(Post $post)
    {
        return view('admin_panel.posts.post_delete', compact('post'));
    }

    /**
     * удаление поста
     */
    public function destroyPost(Post $post)
    {
        $post->delete();
        return redirect()->route('posts');
    }
}
