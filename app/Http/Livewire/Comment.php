<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $newComment;
    public $author;
    public $email;

    public $comments;
    public $postId;

    public $commentUser = [];

    public function mount()
    {
        $post_slug = trim(strrchr(url()->current(), '/'), '/');
        $this->postId = \App\Models\Post::where('slug', $post_slug)->select('id')->first();
//dd($post_id->id);
        $this->comments = \App\Models\Comment::where('post_id', $this->postId->id)->latest()->get();
    }

    protected $rules = [
        'author' => 'required|string',
        'email' => 'required|email',
        'newComment' => 'required|string',
    ];

    public function addComment()
    {
//        dd($this->author, $this->newComment, $this->author);
        $this->validate();

        $setComment = new \App\Models\Comment();

        $setComment->author = $this->author;
        $setComment->email = $this->email;
        $setComment->body = $this->newComment;
        $setComment->post_id = $this->postId->id;

        if ($setComment->save()) {
            array_unshift($this->commentUser, [
                'author' => $this->author,
                'email' => $this->email,
                'body' => $this->newComment,
                'created_at' => Carbon::now()->diffForHumans(),
            ]);
            $this->newComment = '';
        }
    }

    public function render()
    {
        return view('livewire.comment');
    }

}
