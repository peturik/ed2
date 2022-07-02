<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Livewire\WithFileUploads;
use function Psy\debug;
use App\Http\Livewire\Trix;


class PostCreate extends Component
{
    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'image', 'slug', 'active'];

    use WithFileUploads;

    public $saveSuccess = false;
    public $post;
    public $image;
    public $category;
    public $images = [];
    public $postGallery = [];
    public $body; 




    public $listeners = [ 
        Trix::EVENT_VALUE_UPDATED // trix_value_updated() 
    ]; 


    public function trix_value_updated($value)
    { 
//         dd($value);
        $this->body = $value; 
    }

    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => 'required|min:6',
        'post.category_id' => 'required',
        'post.image' => 'image',
    ];

    public function mount($slug = false)
    {

        if ($slug) {
            $this->post = Post::query()->where('slug', $slug)->first();
            $this->postGallery = $this->post->gallery;
            $this->body = $this->post->body;
        } else {
            $this->post = new Post();
        }
    }



    public function savePost()
    {
        $this->post->user_id = auth()->user()->id;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->body = $this->body;
        
        if ($this->category){
            $this->post->category_id = $this->category;
        }


        if ($this->image) {
            if ($this->post->image){
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/storage/' . $this->post->image);   // unlink() удалить файл
            }

            $filename = date('Y_m_d_') . substr(uniqid(rand(), true), 8, 8) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/uploads/images/' . $this->post->slug, $filename);
            $this->post->image = 'uploads/images/' . $this->post->slug . '/' . $filename;
        }

        $this->post->save();

        if ($this->images) $this->saveGallery();

        $this->saveSuccess = true;


        return redirect()->route('post', [$this->post->slug]);
    }

    public function saveGallery(){
        $this->validate([
            'images.*' => 'image|max:2048'
        ]);

        if(count($this->images)){

            foreach ($this->images as $item){
                $file = date('Y_m_d_') . substr(uniqid(rand(), true), 8, 8) . '.' . $item->getClientOriginalExtension();
                $item->storeAs('public/uploads/gallery/' . $this->post->slug, $file);
                $img = 'uploads/gallery/' . $this->post->slug . '/' . $file;

                $gallery = new Gallery();
                $gallery->post_id = $this->post->id;
                $gallery->image = $img;
                $gallery->save();
            }
        }
    }

    public function removeMe($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function removeG($index)
    {

        $id = $this->postGallery[$index]->id;
        unset($this->postGallery[$index]);
        if ($model = Gallery::query()->find($id)) {
            if (unlink($_SERVER['DOCUMENT_ROOT'] . '/public/storage/' . $model->image)) {
                $model->delete();
                return true;
            }
        }
        return true;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.post-create', compact('categories'))
            ->extends('layouts.main')
            ->section('content');
    }
}
