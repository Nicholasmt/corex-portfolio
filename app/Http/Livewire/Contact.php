<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class Contact extends Component
{

    public $name,$email,$subject,$message;

    public function render()
    {
        return view('livewire.contact');
    }

    

    public function store_message()
    {

        $validation = $this->validate(['name'=>'required',
                                        'email'=>'required',
                                        'subject'=>'required',
                                        'message'=>'required',
                                     ]);
    
               Message::create(['full_name'=>$this->name,
                                'email'=>$this->email,
                                'subject'=>$this->subject,
                                'message'=>$this->message,
                               ]);

         session()->flash('message','Message Sent!');
         $this->reset();
         $this->emit('alert_remove');

    }
}
