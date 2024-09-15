<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;

class ContactMe extends Component
{
    public $name,$email,$subject,$message;

    public function render()
    {
        return view('livewire.contact-me');
    }

    public function submit()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
            
        ]);
       Message::create([
             'full_name'=>$this->name,
             'email'=>$this->email,
             'subject'=>$this->subject,
             'message'=>$this->message,
         ]);
        session()->flash('message','Your message has been sent.Thank you!');
        $this->reset();
    }
}
