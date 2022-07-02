<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class ImagePostAdmin extends Component
{
    use WithFileUploads;

    public $image;
    public $post;
    public $postImage;

    public function mount()
    {
        if (trim(strrchr(url()->current(), '/'), '/') == 'edit'){
            $ar = explode('/', url()->current());
            $postId = $ar[5];

            $this->post = Post::query()->where('id', $postId)->select('image')->first();
            $this->postImage = '/storage/' . $this->post->image;
        }

    }

    public function render()
    {
        return view('livewire.image-post-admin');
    }
}
