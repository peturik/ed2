<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Feedback extends Component
{
    public $isSuccess = false;
    public $name;
    public $email;
    public $body;

    public function render()
    {
        return view('livewire.feedback');
    }

  protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];


    public function sendMessage(Request $request)
    {
//       dd($request);
       $this->validate();

        $mess = "Name: $this->name \nE-mail: $this->email \nMassage: $this->body";

   //  dd($mess);
        $send = mail('peturik@gmail.com', 'message petra-art', $mess,);
        if ($send) {

            $this->isSuccess = true;

        } else {
            $this->isSuccess = true;
            echo 'error';

        }


    }
}
