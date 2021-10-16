<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $saveSuccess = false;
    public $post;
    public $image ;


    protected $rules = [
        'post.title' => 'required|min:6',
        'post.body' => 'required|min:6',
    ];

    public function mount($slug = false)
    {
        if ($slug) {
            $this->post = Post::query()->where('slug', $slug)->first();
        } else {
            $this->post = new Post;
        }

    }

    public function imgResize(Request $request)
    {
//        $this->validate($request, [
//            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:1024',
//        ]);

        $manager = new ImageManager(array('driver' => 'gd'));
        $image = $manager->make($this->image);
        $image->resize(300, null, function ($img) {
            $img->aspectRatio();
            $img->upsize();
        });
    }


/*    public function updatedPhoto()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }*/

    public function savePost()
    {

        $this->post->user_id = auth()->user()->id;
        $this->post->slug = Str::slug($this->post->title);

        if ($this->image) {
            $filename = date('Y_m_d_') . substr(uniqid(rand(), true), 8, 8) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/uploads/images/' . $this->post->slug, $filename);
            $this->post->image = 'uploads/images/' . $this->post->slug . '/' . $filename;
        }

        $this->post->save();
        $this->saveSuccess = true;
    }


    public function render()
    {
        return view('livewire.post-create')
            ->extends('layouts.main')
            ->section('content');
    }
}
