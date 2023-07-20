<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Controller;

class Dashboard extends Component
{ 
    public $current;

    public function render()
    {
        $updated = Controller::where(['id'=>1])->first();
        $this->current = $updated->section;
         
         return view('livewire.dashboard');
    }

    public function dashboard()
    {
         
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>1]);
        }
        else
        {
            Controller::create(['section'=>1]);
        }

        session()->flash('message','1');

     }
    public function services()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>2]);
        }
        else
        {
            Controller::create(['section'=>2]);
        }

        
        session()->flash('message','2');

       
    }
    public function portfolio()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>3]);
        }
        else
        {
            Controller::create(['section'=>3]);
        }

        
        session()->flash('message','3');

         
    }
    public function settings()
    {
        $controller = Controller::where(['id'=>1])->first();
        if($controller)
        {
            Controller::where(['id'=>1])->update(['section'=>4]);
        }
        else
        {
            Controller::create(['section'=>4]);
        }

        
        session()->flash('message','4');
    }
}
