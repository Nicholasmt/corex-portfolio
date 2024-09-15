<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class BlogComments extends Component
{
    public $view,$name,$message,$id;

    public function render()
    {
        return view('livewire.blog-comments');
    }

    public function save()
    {
        
        $this->validate([
          'name'=>'required',
          'message'=>'required',
        ]);
        Comment::create([
             'blog_id'=>$this->view->id,
             'full_name'=>$this->name,
             'content'=>$this->message,
        ]);
        session()->flash('message','comment saved!');
        $this->reset();
    }
}
